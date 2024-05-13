<?php

namespace Egns_Core;

/**
 * Class EGNS_Add_To_Cart
 
 */
class EGNS_Add_To_Cart
{
     public $textdomain     = '';
     public $id             = '';
     public $is_woocommerce = false;
     public $shortcode      = 'egns-add-to-cart';
     public $is_advance     = true;
     public $prefix         = 'egns';
     public function __construct()
     {
          $this->textdomain = 'triprex-core';
          if (class_exists('WooCommerce')) {
               $this->is_woocommerce = true;
          }

          add_shortcode($this->shortcode, [$this, 'egns_add_to_cart_shortcode']);

          // AJAX action to add item into cart
          add_action('wp_ajax_' . $this->prefix . '_add_to_cart', [$this, 'egns_add_to_cart']);
          add_action('wp_ajax_nopriv_' . $this->prefix . '_add_to_cart', [$this, 'egns_add_to_cart']);

          // Calculate cart total
          add_action('woocommerce_before_calculate_totals', [$this, 'egns_calc_cart_total'], 30, 1);

          add_action('woocommerce_get_item_data', [$this, 'egns_cart_item_custom_data'], 30, 2);
     }

     public function egns_cart_item_custom_data($item_data, $cart_item)
     {
          if( !$this->is_woocommerce ) {
               return __('Please install & activate woocommerce first!', 'triprex-core');
          }

          $cart_data = [];

          if (isset($cart_item['egns_cart_data'])) {
               $egns_cart_data = $cart_item['egns_cart_data'];

               $pricing_labels = isset($egns_cart_data['labels']['pricing']) ? $egns_cart_data['labels']['pricing'] : '';
               $services_label = isset($egns_cart_data['labels']['services']) ? $egns_cart_data['labels']['services'] : '';
               $pricing        = isset($egns_cart_data['pricing']) ? $egns_cart_data['pricing'] : [];
               $services       = isset($egns_cart_data['services']) ? $egns_cart_data['services'] : [];
               $meta           = isset($egns_cart_data['meta']) ? $egns_cart_data['meta'] : [];
       
               if( !empty( $pricing_labels ) && isset( $pricing_labels['title'] ) && isset( $pricing_labels['name'] ) && $pricing_labels['visibility'] ) {
                    if( $pricing_labels['visibility'] ) {
                         $cart_data[] = array(
                              'name'    => $pricing_labels['title'],
                              'value'   => $pricing_labels['name'],
                              'class'   => 'pricing-heading',
                         );
                    }
               }

               foreach ($pricing as $item) {
                    $label = isset($item['label']) ? $item['label'] : '';
                    $quantity = isset($item['quantity']) ? $item['quantity'] : '';
                    $price = isset($item['price']) ? get_woocommerce_currency_symbol() . $item['price'] : '';

                    // Display dependency information if present
                    if (!empty($item['dependency']) && count($item['dependency']) > 0) {
                         foreach ($item['dependency'] as $dependency) {
                              $dependency_label    = isset($dependency['label']) ? $dependency['label'] : '';
                              $dependency_quantity = isset($dependency['quantity']) ? $dependency['quantity'] : '';
                              $quantity_label      = isset($dependency['quantity_label']) ? $dependency['quantity_label'] : '';
                              $visibility          = isset($dependency['visibility']) ? $dependency['visibility'] : '';
                              if ($visibility) {
                                   $cart_data[] = array(
                                        'name'    => $label . ' (' . $dependency_label . ': ' . $dependency_quantity . $quantity_label . ')',
                                        'value'   => $price . ' X ' . $quantity,
                                        'display' => '',
                                   );
                              }
                         }
                    } elseif (!empty($label) && !empty($quantity)) {
                         $cart_data[] = array(
                              'name'    => $label,
                              'value'   => $price . ' X ' . $quantity,
                              'display' => '',
                         );
                    }
               }

               if (!empty($services_label) && isset($services_label['title']) && $services_label['visibility'] && !empty($services)) {
                    $cart_data[] = array(
                         'name'    => $services_label['title'],
                    );
               }

               if (!empty($services) && count($services) > 0) {
                    foreach ($services as $service) {
                         $service_label = isset($service['label']) ? $service['label'] : '';
                         $service_price = isset($service['price']) ? get_woocommerce_currency_symbol() . $service['price'] . ' ' : '';

                         if (!empty($service_label) && !empty($service_price)) {
                              $cart_data[] = array(
                                   'name'    => $service_label,
                                   'value'   => $service_price,
                                   'display' => '',
                              );
                         }
                    }
               }

               if (!empty($meta)) {
                    foreach ($meta as $single_meta) {
                         $single_meta_label = isset($single_meta['label']) ? $single_meta['label'] : '';
                         $single_meta_value = isset($single_meta['value']) ? $single_meta['value'] : '';
                         if (!empty($single_meta_label) && !empty($single_meta_value)) {
                             $cart_data[] = array(
                                 'name'    => $single_meta_label,
                                 'value'   => $single_meta_value,
                                 'display' => '',
                             );
                         }
                    }
               }
          }

          return $cart_data;
     }

     public function egns_calc_cart_total($cart)
     {
          if (is_admin() && !defined('DOING_AJAX')) {
               return;
          }

          if (did_action('woocommerce_before_calculate_totals') >= 2) {
               return;
          }

          if (empty($cart->get_cart())) {
               return;
          }

          foreach ($cart->get_cart() as $item_values) {
               if (empty($item_values['egns_cart_data']['pricing'])) {
                    return;
               }
               $ultimatePrice = 0;
               foreach ($item_values['egns_cart_data']['pricing'] as $item) {
                    if( is_object( $item ) || is_array( $item ) ) {
                         $itemPrice = $item['price'];
                         $itemQuantity = $item['quantity'];
                         if (isset($item['dependency'])) {
                              $dependency = $item['dependency'];
                              $dependencyDateQuantity = $dependency['date']['quantity'];
                              // $itemQuantity = $itemQuantity + $dependencyDateQuantity;
                         }
                         $ultimatePrice += $itemPrice * $itemQuantity;
                    }
               }
               if (isset($item_values['egns_cart_data']['services'])) {
                    foreach ($item_values['egns_cart_data']['services'] as $service) {
                         $ultimatePrice += $service['price'];
                    }
               }
               $item_values['data']->set_price($ultimatePrice);
          }
     }

     public function egns_add_to_cart()
     {
          $cart_data = array();
          $cart_data['egns_cart_data'] = \Egns\Helper\Egns_Helper::sanitize_recursive($_POST['data']);
          $post_id = !empty(sanitize_text_field($_POST['post_id'])) ? sanitize_text_field($_POST['post_id']) : null;
          if ($post_id === null) {
               return __('Missing Post ID', 'triprex-core');
          }
          // Add product to cart with the custom cart item data
          WC()->cart->add_to_cart($post_id, 1, '0', array(), $cart_data);
     }


     public function egns_add_to_cart_shortcode()
     {
          if (!$this->is_woocommerce) {
               return sprintf(__('Please Install & Activate WooCommerce plugin first!', $this->textdomain));
          }
          $this->render_cart_btn();
     }

     public function render_cart_btn()
     {
?>
          <button class="egns_add_to_cart primary-btn1 two" type="submit"><?php echo esc_html__('Book Now', 'triprex-core') ?></button>
<?php
     }
}
