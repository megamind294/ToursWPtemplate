<?php

namespace Egns\Helper;

use Egns_Helpers as GlobalEgns_Helpers;
use Elementor\Plugin;

if (!class_exists('Egns_Helper')) {

	/**
	 * Helper handlers class
	 */
	class Egns_Helper
	{

		/**
		 * Helper Class constructor
		 */
		function __construct()
		{
			// Before, After page load
			$this->actions();

			// Fire hook to include main header template
			add_action('egns_action_page_header_template', array($this, 'egns_load_page_header'));

			// Ajax hook to include
			add_action('wp_enqueue_scripts', array($this, 'egns_enqueue_scripts'));

			add_filter('post_row_actions',  array($this, 'remove_permalink_row_action'), 10, 2);

			add_filter('triprex_price_info_update_by_dependency', array($this, 'update_pricing_info'), 10, 3);

			add_action('save_post', [$this, 'save_meta_data'], 100, 3);
		}

		public function save_meta_data($post_id, $post, $update)
		{
			if ($post->post_type == 'tours') {
				$meta_value = get_post_meta($post_id, 'EGNS_TOURS_META_ID', true);
				$price = 0;
				if (!empty($meta_value['tours_booking_re']) && !empty($meta_value['tours_booking_re'][0]) && !empty($meta_value['tours_booking_re'][0]['tours_price'])) {
					if (!empty($meta_value['tours_booking_re'][0]['tours_service_t_price_sale_check']) && !empty($meta_value['tours_booking_re'][0]['tours_service__t_price_sale'])) {
						$price = $meta_value['tours_booking_re'][0]['tours_service__t_price_sale'];
					} else {
						$price = $meta_value['tours_booking_re'][0]['tours_price'];
					}
				}
				update_post_meta($post_id, 'tour_price', $price);
			} else if ($post->post_type == 'hotel') {
				$meta_value = get_post_meta($post_id, 'EGNS_HOTEL_META_ID', true);
				$price = 0;
				if (!empty($meta_value['hotel_room_price'])) {
					$price = $meta_value['hotel_room_price'];
				}
				update_post_meta($post_id, 'hotel_room_price', $price);
			} else if ($post->post_type == 'transport') {
				$meta_value = get_post_meta($post_id, 'EGNS_TRANSPORT_META_ID', true);
				$price = 0;
				if (!empty($meta_value['transport_booking_re']) && !empty($meta_value['transport_booking_re'][0]) && !empty($meta_value['transport_booking_re'][0]['transport_price'])) {
					if (!empty($meta_value['transport_booking_re'][0]['transport_service_t_price_sale_check']) && !empty($meta_value['transport_booking_re'][0]['transport_service__t_price_sale'])) {
						$price = $meta_value['transport_booking_re'][0]['transport_service__t_price_sale'];
					} else {
						$price = $meta_value['transport_booking_re'][0]['transport_price'];
					}
				}
				update_post_meta($post_id, 'transport_price', $price);
			} else {
				return;
			}
		}


		public function update_pricing_info($prev_price, $qty, $dep_qty)
		{
			return intval($prev_price) * intval($dep_qty);
		}

		/**
		 * Calculates the number of days and nights from a given date range string.
		 *
		 * @param string $dateRange The date range in "DD-MMM - DD-MMM" format.
		 * @param string $year The year to which the date range applies.
		 * @return array An associative array with 'days' and 'nights' calculated.
		 */
		public static function calculate_days_and_nights($dateRange, $year = '')
		{
			// Use the current year if none specified
			if (empty($year)) {
				$year = date("Y");
			}

			// Split the date range into start and end dates
			list($startDateStr, $endDateStr) = explode(" - ", $dateRange);

			// Append the year to your dates to ensure proper parsing
			$startDateStr .= "-" . $year;
			$endDateStr .= "-" . $year;

			// Create DateTime objects
			$startDate = \DateTime::createFromFormat("d-M-Y", $startDateStr);
			$endDate = \DateTime::createFromFormat("d-M-Y", $endDateStr);

			// Calculate the difference
			$diff = $startDate->diff($endDate);

			// Days difference
			$days = $diff->days;

			// Nights are typically one less than the days in a hotel stay scenario
			$nights = max($days + 1, 0); // Ensure nights never go below 0

			return [
				'days' => $days,
				'nights' => $nights,
			];
		}

		public function remove_permalink_row_action($actions, $post)
		{
			if ($post->post_type === 'auction-bidding') {
				unset($actions['view']);
			}
			return $actions;
		}


		public function egns_load_page_header()
		{
			// Include header template
			echo apply_filters('egns_filter_header_template', self::egns_header_template());
		}

		/**
		 * Method that echo module template part.
		 *
		 * @param string $module name of the module from inc folder
		 * @param string $template full path of the template to load
		 * @param string $slug
		 * @param array  $params array of parameters to pass to template
		 */
		public static function egns_template_part($module, $template, $slug = '', $params = array())
		{
			echo self::egns_get_template_part($module, $template, $slug, $params);
		}

		/**
		 * Method that load module template part.
		 *
		 * @param string $module name of the module from inc folder
		 * @param string $template full path of the template to load
		 * @param string $slug
		 * @param array  $params array of parameters to pass to template
		 *
		 * @return string - string containing html of template
		 */
		public static function egns_get_template_part($module, $template, $slug = '', $params = array())
		{

			//HTML Content from template
			$html          = '';
			$template_path = EGNS_INC_ROOT_DIR . '/' . $module;

			$temp = $template_path . '/' . $template;
			if (is_array($params) && count($params)) {
				extract($params);
			}

			$template = '';

			if (!empty($temp)) {
				if (!empty($slug)) {
					$template = "{$temp}-{$slug}.php";

					if (!file_exists($template)) {
						$template = $temp . '.php';
					}
				} else {
					$template = $temp . '.php';
				}
			}

			if ($template) {
				ob_start();
				include($template);
				$html = ob_get_clean();
			}

			return $html;
		}

		/**
		 * Method that check file exists or not.
		 *
		 * @param string $module name of the module from inc folder
		 * @param string $template full path of the template to load
		 * @param string $slug
		 *
		 * @return boolean - if exists then return true or false
		 */
		public static function egns_check_template_part($module, $template, $slug = '', $params = array())
		{

			//HTML Content from template
			$html          = '';
			$template_path = EGNS_INC_ROOT_DIR . '/' . $module;

			$temp = $template_path . '/' . $template;
			if (is_array($params) && count($params)) {
				extract($params);
			}

			$template = '';

			if (!empty($temp)) {
				if (!empty($slug)) {
					$template = "{$temp}-{$slug}.php";

					if (!file_exists($template)) {
						return false;
					} else {
						return true;
					}
				} else {
					$template = $temp . '.php';
					if (!file_exists($template)) {
						return false;
					} else {
						return true;
					}
				}
			}
		}

		/**
		 * Method that checks if forward plugin installed
		 *
		 * @param string $plugin - plugin name
		 *
		 * @return bool
		 */
		public static function egns_is_installed($plugin)
		{

			switch ($plugin) {
				case 'egns-core';
					return class_exists('Egns_Core');
					break;
				case 'woocommerce';
					return class_exists('WooCommerce');
					break;
				default:
					return false;
			}
		}
		/***
		 * Egns Sanitize Array
		 * @param array
		 * @return array
		 */
		public static function egns_sanitize_array_recursive(&$array)
		{
			array_walk_recursive($array, function (&$value) {
				$value = is_string($value) ? sanitize_text_field($value) : $value;
			});
			return $array;
		}

		/**
		 * Overwrite the theme option when page option is available.
		 *
		 * @param mixed theme option value.
		 * @param mixed page option value.
		 * @since   1.1.0
		 * @return bool 
		 */
		public static function is_enabled($theme_option, $page_option)
		{

			if (class_exists('CSF')) {

				if ($theme_option == 1) {

					if ($page_option == 1) {
						return true;
					} elseif (is_singular('destination') || is_singular('hotel') || is_singular('activities') || is_singular('visa') || is_singular('tours') || is_singular('transport') || is_singular('post') || is_single('post') || self::drivco_is_blog_pages() || is_404()) {
						return true;
					} elseif ($theme_option == 1 && empty($page_option) && $page_option != 0) {
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return true;
			}
		}





		/**
		 * Get first category with link
		 *
		 * @since   1.1.0
		 */
		public static function the_first_category()
		{
			$categories = get_the_category();
			if (!empty($categories)) {
				echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
			}
		}

		public static function egns_sanitize_array_fields(&$array)
		{
			array_walk_recursive($array, function (&$value) {
				$value = is_string($value) ? sanitize_text_field($value) : $value;
			});
			return $array;
		}

		/**
		 * Option Dynamic Styles (Header)
		 *
		 * @since   1.1.0
		 */
		public function egns_header_template()
		{
			$egns_enable_preloader = self::egns_get_theme_option('preloader_enable');


			if (1 == $egns_enable_preloader) {
				get_template_part('inc/common/templates/preloader'); // Preloader
			}

			$get_header_style 	  	 	= self::egns_get_theme_option('header_menu_style');
			$get_page_header_style 		= self::egns_page_option_value('page_header_menu_style');
			$page_main_header_enable 	= self::egns_page_option_value('page_main_header_enable');
			// Page Header Layout
			if (!empty($page_main_header_enable) && ($page_main_header_enable == 'disable') && class_exists('CSF')) {
				$get_header_style = 'no_header';
			} else {
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_one' && class_exists('CSF')) {
					$get_header_style = 'header_one';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_two' && class_exists('CSF')) {
					$get_header_style = 'header_two';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_three' && class_exists('CSF')) {
					$get_header_style = 'header_three';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_four' && class_exists('CSF')) {
					$get_header_style = 'header_four';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_five' && class_exists('CSF')) {
					$get_header_style = 'header_five';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_six' && class_exists('CSF')) {
					$get_header_style = 'header_six';
				}
			}

			switch ($get_header_style) {
				case 'header_one':
					get_template_part('inc/header/templates/parts/header_one');
					break;
				case 'header_two':
					get_template_part('inc/header/templates/parts/header_two');
					break;
				case 'header_three':
					get_template_part('inc/header/templates/parts/header_three');
					break;
				case 'header_four':
					get_template_part('inc/header/templates/parts/header_four');
					break;
				case 'header_five':
					get_template_part('inc/header/templates/parts/header_five');
					break;
				case 'header_six':
					get_template_part('inc/header/templates/parts/header_six');
					break;
				case 'no_header':
					break;
				default:
					get_template_part('inc/header/templates/parts/header_one');
					break;
			}
		}



		/**
		 * Login or Register & Dashboard
		 *
		 * @since   1.1.0
		 */
		public static function login_register()
		{
			if (is_user_logged_in()) : ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('My Account', 'triprex'); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
						<path d="M26 13.5C26 20.4036 20.4035 26 13.5 26C6.59632 26 1 20.4036 1 13.5C1 6.59632 6.59632 1 13.5 1C20.4035 1 26 6.59632 26 13.5Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M18.5001 11.8333C18.5001 14.5947 16.2616 16.8333 13.5001 16.8333C10.7384 16.8333 8.5 14.5947 8.5 11.8333C8.5 9.07189 10.7384 6.8333 13.5001 6.8333C16.2616 6.8333 18.5001 9.07189 18.5001 11.8333Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M6.04297 23.5324C6.44287 19.7667 9.62917 16.8333 13.5008 16.8333C17.3725 16.8333 20.5588 19.7669 20.9585 23.5325" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			<?php else : ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('Login / Register', 'triprex'); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
						<path d="M26 13.5C26 20.4036 20.4035 26 13.5 26C6.59632 26 1 20.4036 1 13.5C1 6.59632 6.59632 1 13.5 1C20.4035 1 26 6.59632 26 13.5Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M18.5001 11.8333C18.5001 14.5947 16.2616 16.8333 13.5001 16.8333C10.7384 16.8333 8.5 14.5947 8.5 11.8333C8.5 9.07189 10.7384 6.8333 13.5001 6.8333C16.2616 6.8333 18.5001 9.07189 18.5001 11.8333Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M6.04297 23.5324C6.44287 19.7667 9.62917 16.8333 13.5008 16.8333C17.3725 16.8333 20.5588 19.7669 20.9585 23.5325" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			<?php endif;
		}
		/**
		 * Login or Register & Dashboard
		 *
		 * @since   1.1.0
		 */
		public static function mobile_login_register()
		{
			if (is_user_logged_in()) : ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="modal-btn header-cart-btn" title="<?php _e('My Account', 'triprex'); ?>">
					<svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M14.4311 12.759C15.417 11.4291 16 9.78265 16 8C16 3.58169 12.4182 0 8 0C3.58169 0 0 3.58169 0 8C0 12.4182 3.58169 16 8 16C10.3181 16 12.4058 15.0141 13.867 13.4387C14.0673 13.2226 14.2556 12.9957 14.4311 12.759ZM13.9875 12C14.7533 10.8559 15.1999 9.48009 15.1999 8C15.1999 4.02355 11.9764 0.799983 7.99991 0.799983C4.02355 0.799983 0.799983 4.02355 0.799983 8C0.799983 9.48017 1.24658 10.8559 2.01245 12C2.97866 10.5566 4.45301 9.48194 6.17961 9.03214C5.34594 8.45444 4.79998 7.49102 4.79998 6.39995C4.79998 4.63266 6.23271 3.19993 8 3.19993C9.76729 3.19993 11.2 4.63266 11.2 6.39995C11.2 7.49093 10.654 8.45444 9.82039 9.03206C11.5469 9.48194 13.0213 10.5565 13.9875 12ZM13.4722 12.6793C12.3495 10.8331 10.3188 9.59997 8.00008 9.59997C5.68126 9.59997 3.65049 10.8331 2.52776 12.6794C3.84829 14.2222 5.80992 15.2 8 15.2C10.1901 15.2 12.1517 14.2222 13.4722 12.6793ZM8 8.79998C9.32551 8.79998 10.4 7.72554 10.4 6.39995C10.4 5.07444 9.32559 3.99992 8 3.99992C6.6744 3.99992 5.59997 5.07452 5.59997 6.40003C5.59997 7.72554 6.67449 8.79998 8 8.79998Z">
						</path>
					</svg>
					<?php echo esc_html__('MY ACCOUNT', 'triprex') ?>
				</a>
			<?php else : ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="modal-btn header-cart-btn" title="<?php _e('Login / Register', 'triprex'); ?>">
					<svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M14.4311 12.759C15.417 11.4291 16 9.78265 16 8C16 3.58169 12.4182 0 8 0C3.58169 0 0 3.58169 0 8C0 12.4182 3.58169 16 8 16C10.3181 16 12.4058 15.0141 13.867 13.4387C14.0673 13.2226 14.2556 12.9957 14.4311 12.759ZM13.9875 12C14.7533 10.8559 15.1999 9.48009 15.1999 8C15.1999 4.02355 11.9764 0.799983 7.99991 0.799983C4.02355 0.799983 0.799983 4.02355 0.799983 8C0.799983 9.48017 1.24658 10.8559 2.01245 12C2.97866 10.5566 4.45301 9.48194 6.17961 9.03214C5.34594 8.45444 4.79998 7.49102 4.79998 6.39995C4.79998 4.63266 6.23271 3.19993 8 3.19993C9.76729 3.19993 11.2 4.63266 11.2 6.39995C11.2 7.49093 10.654 8.45444 9.82039 9.03206C11.5469 9.48194 13.0213 10.5565 13.9875 12ZM13.4722 12.6793C12.3495 10.8331 10.3188 9.59997 8.00008 9.59997C5.68126 9.59997 3.65049 10.8331 2.52776 12.6794C3.84829 14.2222 5.80992 15.2 8 15.2C10.1901 15.2 12.1517 14.2222 13.4722 12.6793ZM8 8.79998C9.32551 8.79998 10.4 7.72554 10.4 6.39995C10.4 5.07444 9.32559 3.99992 8 3.99992C6.6744 3.99992 5.59997 5.07452 5.59997 6.40003C5.59997 7.72554 6.67449 8.79998 8 8.79998Z">
						</path>
					</svg>
					<?php echo esc_html__('REGISTER/ LOGIN', 'triprex') ?>
				</a>
			<?php endif;
		}



		/**
		 * This function will return tour count by desctiont ID
		 * @return integer
		 */

		public static function get_tour_count_by_destination_id($destinationID = '')
		{

			$args_two = array(
				'post_type'  => 'tours',
				'meta_query' => array(
					array(
						'key' 		=> 'EGNS_TOURS_META_ID',
						'compare' 	=> 'LIKE',
						'value' 	=> get_the_ID()
					)
				)
			);
			$tourCount = get_posts($args_two);
			return count($tourCount);
		}


		/**
		 * Is Pages
		 *
		 * @since   1.1.0
		 */
		public static function egns_is_blog_pages()
		{
			return ((((is_search()) || (is_404()) || is_archive()) || (is_single()) || (is_singular())  ||  (is_author()) || (is_category()) || (is_home()) || (is_tag()))) ? true : false;
		}

		/**
		 * Is Blog Pages
		 *
		 * @since   1.2.0
		 */
		public static function drivco_is_blog_pages()
		{
			return ((((is_search()) || is_archive()) ||  (is_author()) || (is_category()) || (is_home()) || (is_tag()))) ? true : false;
		}

		/**
		 * Get theme options.
		 *
		 * @param string $opts Required. Option name.
		 * @param string $key Required. Option key.
		 * @param string $default Optional. Default value.
		 * @since   1.1.0
		 */

		public static function egns_get_theme_option($key, $key2 = '', $default = '')
		{
			$egns_theme_options = get_option('egns_theme_options');

			if (!empty($key2)) {
				return	isset($egns_theme_options[$key][$key2]) ? $egns_theme_options[$key][$key2] : $default;
			} else {
				return isset($egns_theme_options[$key]) ? $egns_theme_options[$key] : $default;
			}
		}

		/**
		 * Css Minifier.
		 * @param $css get css
		 * @since   1.1.0
		 */
		public static function cssminifier($css)
		{
			$css = str_replace(
				["\r\n", "\r", "\n", "\t", '    '],
				'',
				preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', trim($css))
			);
			return str_replace(
				['{ ', ' }', ' {', '} ', ' screen and '],
				['{', '}', '{', '}', ''],
				$css
			);
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Page Option Value.
		 */
		public static function  egns_page_option_value($key1, $key2 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'egns_page_options', true);

			if (isset($page_options[$key1][$key2])) {

				return $page_options[$key1][$key2];
			} else {
				if (isset($page_options[$key1])) {

					return  $page_options[$key1];
				} else {
					return $default;
				}
			}
		}



		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Page Option Value.
		 */
		public static function  egns_product_tab_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_PRODUCT_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		public static function  egns_destination_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_DESTINATION_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}
		/**
		 * Get all Destination
		 *
		 * @return array
		 */

		public static function egns_get_tour_destination()
		{
			$destination = [];
			$args = array(
				'post_type'  		=> 'destination',
				'posts_per_page'	=> -1
			);
			$tourDestination = get_posts($args);

			foreach ($tourDestination as $destination_row) {
				$destination[$destination_row->ID] = $destination_row->post_title;
			}
			return $destination;
		}



		public static function  egns_transport_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_TRANSPORT_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		public static function  egns_transport_value_by_id($post_id, $key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta($post_id, 'EGNS_TRANSPORT_META_ID', true);
			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		public static function  egns_tours_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_TOURS_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		public static function  egns_tours_value_by_id($id, $key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta($id, 'EGNS_TOURS_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		public static function  egns_hotel_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_HOTEL_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		public static function  egns_hotel_value_by_id($id, $key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta($id, 'EGNS_HOTEL_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		public static function egns_activities_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_ACTIVITIES_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		public static function egns_activities_value_by_id($id, $key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta($id, 'EGNS_ACTIVITIES_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}




		public static function  egns_visa_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_VISA_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * calculating reading times
		 *
		 * @return void
		 */
		public function calculate_reading_time($content)
		{
			// Count the number of words in the content.
			$word_count = str_word_count(strip_tags($content));

			// Minimum reading time is 1 minute.
			$reading_time = max(1, round($word_count / 200));

			return $reading_time;
		}

		/**
		 * Get Blog layout
		 *
		 * @since   1.1.0
		 */
		public static function egns_post_layout()
		{
			$egns_theme_options = get_option('egns_theme_options');

			$blog_layout = !empty($egns_theme_options['blog_layout_options']) ? $egns_theme_options['blog_layout_options'] : 'default';

			return $blog_layout;
		}

		/**
		 * Escape any String with Translation
		 *
		 * @since   1.1.0
		 */

		public static function egns_translate($value)
		{
			echo sprintf(__('%s', 'triprex'), $value);
		}
		/**
		 * Escape any String with Translation
		 *
		 * @since   1.1.0
		 */

		public static function egns_translate_with_escape_($value)
		{
			$value = esc_html($value);
			echo sprintf(__('%s', 'triprex'), $value);
		}

		/**
		 * Dynamic blog layout for post archive pages.
		 *
		 * @since   1.1.0
		 */
		public static function egns_dynamic_blog_layout()
		{
			$blog_layout = self::egns_post_layout();
			if (!empty($blog_layout)) {
				if ('default' == $blog_layout) {
					get_template_part('template-parts/blog/blog-standard');
				} elseif ($blog_layout == 'layout-01') {
					get_template_part('template-parts/blog/blog-grid-sidebar');
				}
			} else {
				get_template_part('template-parts/blog/blog-standard');
			}
		}

		/**
		 * 
		 * @return [string] audio url for audio post
		 */
		public static function egns_embeded_audio($width, $height)
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', 1));
			if (!empty($url)) {
				return '<div class="post-media">' . wp_oembed_get($url, array('width' => $width, 'height' => $height)) . '</div>';
			}
		}

		/**
		 * @return [string] Checks For Embed Audio In The Post.
		 */
		public static function egns_has_embeded_audio()
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', 1));
			if (!empty($url)) {
				return true;
			} else {
				return false;
			}
		}


		/**
		 * Post Meta Box Key Information
		 *
		 * @param  String $meta_key
		 */

		public static function egns_post_meta_box_value($meta_key, $meta_key_value)
		{
			if (isset(get_post_meta(get_the_ID(), $meta_key, true)[$meta_key_value])) {
				return get_post_meta(get_the_ID(), $meta_key, true)[$meta_key_value];
			}
		}

		/**
		 * Post Meta Box Key Information
		 *
		 * @param  String $meta_key
		 */

		public static function egns_post_meta_box_value_by_id($post_id, $meta_key, $meta_key_value)
		{
			if (isset(get_post_meta($post_id, $meta_key, true)[$meta_key_value])) {
				return get_post_meta($post_id, $meta_key, true)[$meta_key_value];
			}
		}



		/**
		 * Get Status based on Rating
		 * @return string
		 */
		public static function egns_get_avg_rating_status_by_tour_id($avg_rating_point)
		{
			switch ($avg_rating_point) {
				case $avg_rating_point >= 80:
					return esc_html__('Excellent', 'triprex');
					break;
				case $avg_rating_point >= 60:
					return esc_html__('Very Good', 'triprex');
					break;
				case $avg_rating_point >= 40:
					return esc_html__('Good', 'triprex');
					break;
				case $avg_rating_point >= 20:
					return esc_html__('Avarage', 'triprex');
					break;
				case $avg_rating_point >= 0:
					return esc_html__('Below Avarage', 'triprex');
					break;
				default:
					return esc_html__('Excellent', 'triprex');
			}
		}



		/**
		 * Find Related Project
		 *
		 * @param  int $post_id
		 * @param  String $post_type
		 * @param  String $custom_post_taxonomy
		 * 
		 */

		public static function egns_find_related_project($post_id, $post_type, $custom_post_taxonomy)
		{
			//get the taxonomy terms of custom post type
			$customTaxonomyTerms = wp_get_object_terms($post_id, $custom_post_taxonomy, array('fields' => 'ids'));

			//query arguments
			$args = array(
				'post_type' => $post_type,
				'post_status' => 'publish',
				'posts_per_page' => 5,
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => $custom_post_taxonomy,
						'field' => 'id',
						'terms' => $customTaxonomyTerms
					)
				),
				'post__not_in' => array($post_id),
			);
			return $args;
		}

		/**
		 * Find Project Categories
		 *
		 * @param  String $custom_post_taxonomy
		 */
		public static function egns_find_project_categories($custom_post_taxonomy)
		{
			$project_categories = get_the_terms(get_the_ID(), $custom_post_taxonomy);
			return $project_categories;
		}

		/**
		 * Find Project Categories By Post ID
		 *
		 * @param  String $post_id
		 * @param  String $custom_post_taxonomy
		 */
		public static function egns_find_project_categories_by_post_id($post_id, $custom_post_taxonomy)
		{
			$project_categories = get_the_terms($post_id, $custom_post_taxonomy);
			return $project_categories;
		}

		/**
		 * Find Project Categories
		 *
		 * @param  String $custom_post_type
		 * @param  String $custom_post_taxonomy
		 * @param  String $order_by
		 * @param  String $order
		 */
		public static function egns_find_all_project_categories($custom_post_type, $custom_post_taxonomy, $order_by = 'name', $order = 'ASC')
		{
			$args = array(
				'type'                     => $custom_post_type,
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => $order_by,
				'order'                    => $order,
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'taxonomy'                 => $custom_post_taxonomy,
				'pad_counts'               => false
			);
			$categories = get_categories($args);

			return $categories;
		}
		/**
		 * @return [string] Embed gallery for the post.
		 */
		public static function egns_gallery_images()
		{
			$images = get_post_meta(get_the_ID(), 'egns_gallery_images', 1);

			$images = explode(',', $images);
			if ($images && count($images) > 1) {
				$gallery_slide = '<div class="swiper blog-archive-slider">';
				$gallery_slide .= '<div class="swiper-wrapper">';
				foreach ($images as $image) {
					$gallery_slide .= '<div class="swiper-slide"><a href="' . get_the_permalink() . '"><img src="' . wp_get_attachment_image_url($image, 'full') . '" alt="' . esc_attr(get_the_title()) . '"></a></div>';
				}
				$gallery_slide .= '</div>';
				$gallery_slide .= '</div>';

				$gallery_slide .= '<div class="slider-arrows arrows-style-2 sibling-3 text-center d-flex flex-row justify-content-between align-items-center w-100">';
				$gallery_slide .= '<div class="blog1-prev swiper-prev-arrow" tabindex="0" role="button" aria-label="' . esc_html('Previous slide') . '"> <i class="bi bi-arrow-left"></i> </div>';

				$gallery_slide .= '<div class="blog1-next swiper-next-arrow" tabindex="0" role="button" aria-label="' . esc_html('Next slide') . '"><i class="bi bi-arrow-right"></i></div>';
				$gallery_slide .= '</div>';

				return $gallery_slide;
			}
		}

		/**
		 * @return [string] Has Gallery for Gallery post.
		 */
		public static function has_egns_gallery()
		{
			$images = get_post_meta(get_the_ID(), 'egns_gallery_images', 1);
			if (!empty($images)) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * @return string get the attachment image.
		 */
		public static function egns_thumb_image()
		{
			$image = get_post_meta(get_the_ID(), 'egns_thumb_images', 1);
			echo '<a href="' . get_the_permalink() . '"><img src="' . isset($image['url']) . '" alt="' . esc_attr(get_the_title()) . ' "class="img-fluid wp-post-image"></a>';
		}

		/**
		 * @return [quote] text for quote post
		 */
		public static function egns_quote_content()
		{
			$text =  get_post_meta(get_the_ID(), 'egns_quote_text', 1);
			if (!empty($text)) {
				return sprintf(esc_attr__('%s', 'triprex'), $text);
			}
		}

		/**
		 * @return [string] video url for video post
		 */
		public static function egns_embeded_video($width = '', $height = '')
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_video_url', 1));
			if (!empty($url)) {
				return wp_oembed_get($url, array('width' => $width, 'height' => $height));
			}
		}

		/**
		 * @return [string] Has embed video for video post.
		 */
		public static function has_egns_embeded_video()
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_video_url', 1));
			if (!empty($url)) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Audio layout for post formet audio.
		 *
		 * @since   1.1.0
		 */
		public static function dynamic_audio_layout()
		{

			$blog_layout = self::egns_post_layout();
			$layout = self::egns_embeded_audio(400, 275);
			if (is_single()) {
				$layout = self::egns_embeded_audio(850, 550);
			} elseif ($blog_layout == 'layout-02') {
				$layout = self::egns_embeded_audio(500, 450);
			} elseif ($blog_layout == 'layout-01') {
				$layout = self::egns_embeded_audio(400, 275);
			} else {
				$layout = self::egns_embeded_audio(400, 275);
			}
			return $layout;
		}

		/**
		 * Video layout for post formet video.
		 *
		 * @since   1.1.0
		 */
		public static function dynamic_video_layout()
		{

			$blog_layout = self::egns_post_layout();
			$layout = self::egns_embeded_video(400, 275);
			if (is_single()) {
				$layout = self::egns_embeded_video(1050, 474);
			} elseif ($blog_layout == 'layout-02') {
				$layout = self::egns_embeded_video(600, 550);
			} elseif ($blog_layout == 'layout-01') {
				$layout = self::egns_embeded_video(400, 275);
			} else {
				$layout = self::egns_embeded_video(400, 275);
			}
			return $layout;
		}

		public static function get_theme_logo($logo_url, $echo = true)
		{
			if (has_custom_logo()) :
				the_custom_logo();
			elseif (!empty($logo_url)) :
			?>
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
					<?php if (!empty($logo_url)) : ?>
						<img class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></a>
			<?php endif ?>
			<?php
			else : {
			?>
				<div class="site-title">
					<h3><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html(get_bloginfo('name')); ?></a></h3>
				</div>

			<?php
				}
			endif;
		}

		/**
		 * Get Tour Package ID by Product price
		 */
		public static function egns_get_tour_package_by_product_price($min_price = '', $max_price = '')
		{
			$post_in = [];
			$args = array(
				'post_type'  		=> 'tours',
				'posts_per_page'	=> -1
			);
			$tourList = get_posts($args);
			foreach ($tourList as $key => $tour) {
				if (!empty($min_price) && !empty($max_price)) {
					$product_id = Egns_Helpers::egns_post_meta_box_value_by_id($tour->ID, EGNS_TOUR_META_ID, 'tour_product');
					if (!empty($product_id)) {
						$product = wc_get_product($product_id);
						if (Egns_Helpers::egns_calculate_product_price($product->get_id()) >= $min_price &&  Egns_Helpers::egns_calculate_product_price($product->get_id()) <= $max_price) {
							$post_in[] .= $tour->ID;
						}
					}
				}
			}
			return $post_in;
		}

		public static function get_copyright_theme_logo($logo_url, $echo = true)
		{
			if (has_custom_logo()) :
				the_custom_logo();
			elseif (!empty($logo_url)) :
			?>
			<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
				<?php if (!empty($logo_url)) : ?>
					<img class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></a>
		<?php endif ?>
		<?php
			endif;
		}

		/**
		 * Menu links.
		 *
		 * @param   string $theme_location menu type.
		 * @param   string $container_class main class.
		 * @param   string $after icon tag.
		 * @param   string $menu_class .
		 * @param   string $depth.
		 * @since   1.1.0
		 */

		public static function  egns_get_theme_menu($theme_location = 'primary-menu', $container_class = 'main-nav-wrapper menu-list', $after = '<i class="bi bi-plus dropdown-icon"></i>', $menu_class = 'ul', $depth = 3, $echo = true)
		{
			if (has_nav_menu('primary-menu')) {
				wp_nav_menu(
					array(
						'theme_location'  => $theme_location,
						'container_class' => $container_class,
						'link_before'     => '',
						'link_after'      => '',
						'after'           => $after,
						'container_id'    => '',
						'menu_class'      => $menu_class,
						'fallback_cb'     => '',
						'menu_id'         => '',
						'depth'           => $depth,
					)
				);
			} else {
				if (is_user_logged_in()) { ?>
			<div class="set-menu">
				<h4>
					<a href="<?php echo admin_url(); ?>nav-menus.php">
						<?php echo esc_html('Set Menu Here...', 'triprex'); ?>
					</a>
				</h4>
			</div>
		<?php }
			}
		}


		/**
		 * Post Details Pagination
		 * @since   1.1.0
		 */

		public static function egns_get_post_pagination()
		{
			wp_link_pages(
				array(
					'before'           => '<ul class="pagination d-flex justify-content-center align-items-center"><span class="page-title">' . esc_html__('Pages: ', 'triprex') . '</span><li>',
					'after'            => '</li></ul>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'separator'        => '</li><li>',
					'pagelink'         => '%',
					'echo'             => 1
				)
			);
		}

		/**
		 * Option Dynamic Styles.
		 *
		 * @since   1.1.0
		 */
		public function egns_enqueue_scripts()
		{
			$objects = array(
				'sticky_header_enable'            => self::sticky_header_enable(),
				'animation_enable'                => self::animation_enable(),
				'is_egns_core_enable'  			  => class_exists('CSF') ? true : false,
				'admin_ajax'				 	  => admin_url('admin-ajax.php'),

			);
			wp_localize_script('custom', 'egns_localize', $objects);
		}


		public static function sticky_header_enable()
		{
			$page_sticky_option = Egns_Helper::egns_page_option_value('sticky_header_enable');
			$sticky_header = Egns_Helper::egns_get_theme_option('header_sticky_enable');

			if (Egns_Helper::is_enabled($sticky_header, $page_sticky_option)) {
				return true;
			} else {
				return false;
			}
		}

		public static function animation_enable()
		{
			$animation_enable = Egns_Helper::egns_get_theme_option('animation_enable');

			if ($animation_enable == 1) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Get Page Options Value
		 *
		 * @since   1.1.0
		 */

		public static function egns_get_options_value($theme_option, $page_option)
		{
			if (!empty($page_option)) {
				return $page_option;
			} else {
				return $theme_option;
			}
		}



		/**
		 * Define the core functionality of the.
		 *
		 * @since   1.1.0
		 */
		public function actions()
		{
			add_action('egns_page_before', array($this, 'open_container'));
			add_action('egns_page_after', array($this, 'close_container'));
			add_action('egns_post_before', array($this, 'post_open_container'));
			add_action('egns_post_after', array($this, 'post_close_container'));
			add_action('egns_header_template', [$this, 'egns_header_template']);
		}


		/**
		 * Is elementor.
		 *
		 * @since   1.1.0
		 */
		public static function is_elementor()
		{
			if (self::drivco_is_blog_pages()) {
				return false;
			}
			if (did_action('elementor/loaded')) {
				return Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor();
			} else {
				return false;
			}
		}

		/**
		 * Open Page Container.
		 *
		 * @since   1.1.0
		 */
		public function open_container()
		{
			if (!self::is_elementor()) : ?>
		<div class="container">
		<?php
			endif;
			if (self::egns_get_theme_option('header_menu_style') == 'header_three' || self::egns_page_option_value('page_header_menu_style') == 'header_three') {
		?>
			<div class="main-container">
				<div class="main-content">
				<?php
			}
		}

		/**
		 * Close Page Container.
		 *
		 * @since   1.1.0
		 */
		public function close_container()
		{
			if (!self::is_elementor()) :
				?>
				</div> <!-- end .container -->
			</div>
		</div> <!-- End Main Content Area  -->
	<?php endif;
		}

		/**
		 * Post Open Container.
		 *
		 * @since   1.1.0
		 */
		public function post_open_container()
		{
			if (is_single()) {
	?>
		<div class="blog-details">
		<?php
			} else {
		?>
			<div>
			<?php
			}
		}

		/**
		 * Post Close Container.
		 *
		 * @since   1.1.0
		 */
		public function post_close_container()
		{
			?>
			</div>
<?php
		}

		/**
		 * Get formatted package price with or without sale price.
		 * @param float $price             The regular price of the package.
		 * @param float|null $sale_price   Optional. The sale price of the package. Defaults to null if not provided.
		 * @param string $currency_position Optional. The position of the currency symbol ('left' or 'right'). Defaults to 'left'.
		 * @return string The formatted package price with or without sale price.
		 */
		public static function egns_get_package_price($price, $sale_price = null, $currency_position = 'left')
		{
			$currency = class_exists('WooCommerce') ? get_woocommerce_currency_symbol() : self::egns_get_theme_option('global_currency_set');

			$formatted_price = ($currency_position == 'left') ? "$currency$price" : "$price$currency";
			$formatted_sale_price = '';
			if ($sale_price) {
				$formatted_sale_price = ($currency_position == 'left') ? "$currency$sale_price" : "$sale_price$currency";
			}
			if ($sale_price) {
				return "<span> $formatted_sale_price <del>$formatted_price</del></span>";
			} else {
				return "<span>$formatted_price</span>";
			}
		}

		public static function helper_get_taxonomy__by_slug($term_slug)
		{
			$term_object = "";
			$taxonomies = get_taxonomies();
			foreach ($taxonomies as $taxonomy) {
				if ($term_object = get_term_by('slug', $term_slug, $taxonomy)) {
					break;
				}
			}
			return $term_object;
		}

		/**
		 * Get taxonomy name by taxonomy ID.
		 *
		 * This function retrieves the name of a taxonomy based on its taxonomy ID.
		 *
		 * @param int $id The ID of the taxonomy.
		 *
		 * @return object|null The name of the taxonomy if found, or null if the taxonomy is not found.
		 */
		public static function egns_get_taxonomy_data($id_or_slug, $only_name = false)
		{
			if (is_numeric($id_or_slug)) {
				$taxonomy_info = get_term((int)$id_or_slug);
			} else {
				$taxonomy_info = self::helper_get_taxonomy__by_slug($id_or_slug);
			}
			if (!is_object($taxonomy_info)) {
				return;
			}
			if ($only_name) {
				return $taxonomy_info->name;
			}
			return $taxonomy_info;
		}

		/**
		 * Retrieves the Hotel room price
		 *
		 * @param int|string $post_id The ID of the tour post.
		 * @return string|null Returns the sale price if on sale, otherwise the regular price, or null if not found.
		 */
		public static function egns_get_hotel_price_by_id($post_id)
		{
			if (empty($post_id)) {
				return __('Your Post ID is missing!', 'triprex');
			}
			$room_offer_check = self::egns_hotel_value_by_id($post_id, 'hotel_room_price_sale_check');
			if ($room_offer_check) {
				$room_offer_check = self::egns_hotel_value_by_id($post_id, 'hotel_room_price_sale_check');
				return self::egns_hotel_value_by_id($post_id, 'hotel_room_price_sale');
			} else {
				return self::egns_hotel_value_by_id($post_id, 'hotel_room_price');
			}
			return null;
		}


		/**
		 * Method string_to_boolean
		 * Convert string to boolean
		 * @return boolean
		 */
		public static function string_to_boolean($value)
		{
			if ($value === 'false') {
				return false;
			}
			return filter_var($value, FILTER_VALIDATE_BOOLEAN);
		}

		/**
		 * Retrieves the tour price for a specific category ID.
		 *
		 * @param int|string $post_id The ID of the tour post.
		 * @param int|string $categoryId Category ID to find the price for.
		 * @return string|null Returns the sale price if on sale, otherwise the regular price, or null if not found.
		 */
		public static function egns_get_price_by_category_id($post_id, $categoryId)
		{
			if (empty($post_id) && empty($categoryId)) {
				return __('Your Post ID & Category ID is missing!', 'triprex');
			}
			$package_info = self::egns_tours_value_by_id($post_id, 'tours_booking_re');
			foreach ($package_info as $item) {
				if (isset($item['tour_pricing_category']) && $item['tour_pricing_category'] == $categoryId) {
					// Check if the category has a special sale price
					if (isset($item['tours_service_t_price_sale_check']) && $item['tours_service_t_price_sale_check'] == 1) {
						return $item['tours_service__t_price_sale'];
					} else {
						return $item['tours_price'];
					}
				}
			}
			return null;
		}

		/**
		 * Fetches transport price based on category ID from a package.
		 *
		 * @param int|string $post_id The ID of the post where transport info is stored.
		 * @param int|string $package_id Specific package ID within the post.
		 * @param int|string $categoryId The category ID to lookup price for.
		 * @return string|null Transport price for the category, sale price if applicable, or null if not found.
		 */
		public static function egns_get_transport_price_by_category_id($post_id, $package_id, $categoryId)
		{
			if (empty($post_id) && empty($categoryId)) {
				return __('Your Post ID & Category ID is missing!', 'triprex');
			}
			$package_info = self::egns_transport_value_by_id($post_id, 'transport_main_pricing_re', $package_id, 'transport_booking_re');
			foreach ($package_info as $item) {
				if (isset($item['Transport_pricing_category']) && $item['Transport_pricing_category'] == $categoryId) {
					// Check if the category has a special sale price
					if (isset($item['transport_service_t_price_sale_check']) && $item['transport_service_t_price_sale_check'] == 1) {
						return $item['transport_service__t_price_sale'];
					} else {
						return $item['transport_price'];
					}
				}
			}
			return null;
		}

		/**
		 * Fetches activities price based on category ID from a package.
		 *
		 * @param int|string $post_id The ID of the post where activities info is stored.
		 * @param int|string $package_id Specific package ID within the post.
		 * @param int|string $categoryId The category ID to lookup price for.
		 * @return string|null Activities price for the category, sale price if applicable, or null if not found.
		 */
		public static function egns_get_activities_price_by_category_id($post_id, $package_id, $categoryId)
		{
			if (empty($post_id) && empty($categoryId)) {
				return __('Your Post ID & Category ID is missing!', 'triprex');
			}
			$package_info = self::egns_activities_value_by_id($post_id, 'activities_booking_re');
			foreach ($package_info as $item) {
				if (isset($item['activities_pricing_category']) && $item['activities_pricing_category'] == $categoryId) {
					// Check if the category has a special sale price
					if (isset($item['activities_service_t_price_sale_check']) && $item['activities_service_t_price_sale_check'] == 1) {
						return $item['activities_service__t_price_sale'];
					} else {
						return $item['activities_price'];
					}
				}
			}
			return null;
		}

		/**
		 * Retrieves specific service details or price by key for a tour post.
		 *
		 * @param int|string $post_id The tour post ID.
		 * @param string $service_key The key identifying the specific service.
		 * @param bool $get_name Whether to return the service name (true) or price (false).
		 * @return string|null Service name, price, or error message if inputs are missing, null if not found.
		 */
		public static function egns_get_service_info_by_key($post_id, $service_key, $get_name = false, $package_id = null)
		{
			if (empty($post_id) && empty($service_key)) {
				return __('Your Post ID & Service Key is missing!', 'triprex');
			}
			$post_type = get_post_type($post_id);
			if ('tours' == $post_type) {
				$service_info = self::egns_tours_value_by_id($post_id, 'tours_extra_service_re');
				if (!empty($service_info[$service_key])) {
					$service = $service_info[$service_key];
					if (!empty($service['tours_extra_service']) && !empty($service['tours_service_price'])) {
						if ($get_name) {
							return $service['tours_extra_service'];
						}
						return $service['tours_service_price'];
					}
				}
			} else if ('transport' == $post_type) {
				$service_info = self::egns_transport_value_by_id($post_id, 'transport_main_pricing_re', $package_id, 'transport_extra_service_re');
				if (!empty($service_info[$service_key])) {
					$service = $service_info[$service_key];
					if (!empty($service['transport_extra_service']) && !empty($service['transport_service_price'])) {
						if ($get_name) {
							return $service['transport_extra_service'];
						}
						return $service['transport_service_price'];
					}
				}
			} else if ('hotel' == $post_type) {
				$service_info = self::egns_hotel_value_by_id($post_id, 'hotel_extra_service_re');
				if (!empty($service_info[$service_key])) {
					$service = $service_info[$service_key];
					if (!empty($service['hotel_extra_service']) && !empty($service['hotel_service_price'])) {
						if ($get_name) {
							return $service['hotel_extra_service'];
						}
						return $service['hotel_service_price'];
					}
				}
			} else if ('activities' == $post_type) {
				$service_info = self::egns_activities_value_by_id($post_id, 'activities_extra_service_re');
				if (!empty($service_info[$service_key])) {
					$service = $service_info[$service_key];
					if (!empty($service['activities_extra_service']) && !empty($service['activities_service_price'])) {
						if ($get_name) {
							return $service['activities_extra_service'];
						}
						return $service['activities_service_price'];
					}
				}
			}

			return null;
		}

		public static function egns_transport_cart_info($pricing, $transports_pricing, $key, $post_id = null)
		{
			if (!empty($transports_pricing[$key]['transport_booking_re'])) {
				foreach ($transports_pricing[$key]['transport_booking_re'] as $transport_package) {
					if (empty($transport_package['Transport_pricing_category'])) {
						continue;
					}
					$pricing_category_info = \Egns\Helper\Egns_Helper::egns_get_taxonomy_data($transport_package['Transport_pricing_category']);
					if ($post_id) {
						$package_info      = \Egns\Helper\Egns_Helper::egns_get_transport_price_by_category_id($post_id, $key, $transport_package['Transport_pricing_category']);
					} else {
						$package_info      = \Egns\Helper\Egns_Helper::egns_get_transport_price_by_category_id(get_the_ID(), $key, $transport_package['Transport_pricing_category']);
					}
					if (empty($pricing_category_info) && empty($package_info)) {
						return;
					}
					if (intval($transport_package['transport_minimum_quantity']) > 0) {
						$pricing[$pricing_category_info->slug] = [
							'price'    => $package_info,
							'quantity' => $transport_package['transport_minimum_quantity'],
							'label'    => $pricing_category_info->name,
						];
					}
				}
			}
			return $pricing;
		}




		public static function egns_activities_cart_info($pricing, $transports_pricing, $key, $post_id = null)
		{
			if (!empty($transports_pricing[$key])) {
				$pricing_category_info = \Egns\Helper\Egns_Helper::egns_get_taxonomy_data($transports_pricing[$key]['activities_pricing_category']);
				if ($post_id) {
					$package_info      = \Egns\Helper\Egns_Helper::egns_get_activities_price_by_category_id($post_id, $key, $transports_pricing[$key]['activities_pricing_category']);
				} else {
					$package_info      = \Egns\Helper\Egns_Helper::egns_get_activities_price_by_category_id(get_the_ID(), $key, $transports_pricing[$key]['activities_pricing_category']);
				}
				if (intval($transports_pricing[$key]['activities_minimum_quantity']) > 0) {
					$pricing[$pricing_category_info->slug] = [
						'price'    => $package_info,
						'quantity' => $transports_pricing[$key]['activities_minimum_quantity'],
						'label'    => $pricing_category_info->name,
					];
				}
			}
			return $pricing;
		}

		/**
		 * Converts a string into a URL-friendly slug.
		 *
		 * @param string $value The string to be slugified.
		 * @return string The slugified string.
		 */
		public static function egns_slugify($value)
		{
			$string = strtolower(trim($value));
			$string = preg_replace('/[^a-z0-9-]/', '_', $string);
			$string = preg_replace('/-+/', '-', $string);
			return $string;
		}

		/**
		 * Sanitizes data recursively, applying to both arrays and single values.
		 *
		 * @param mixed $data Input data to sanitize.
		 * @return mixed Sanitized data.
		 */
		public static function sanitize_recursive($data)
		{
			if (is_array($data)) {
				foreach ($data as $key => $value) {
					$data[$key] = self::sanitize_recursive($value);
				}
			} else {
				$data = sanitize_text_field($data);
			}
			return $data;
		}

		/**
		 * Fetches and formats the price of a tour package by its ID, showing sale price if applicable.
		 * @param int|string $post_id The ID of the tour package.
		 * @param string $currency_position Optional. 'left' (default) or 'right' for the currency symbol position.
		 * 
		 * @return string|null Formatted price string or null if no pricing info is found.
		 */
		public static function egns_get_tour_package_price_by_id($post_id, $currency_position = 'left')
		{
			$get_pricing_categories = self::egns_tours_value_by_id($post_id, 'tours_booking_re');
			if (!empty($get_pricing_categories) && count($get_pricing_categories)) {
				$price_output = '';
				$price = number_format($get_pricing_categories[0]['tours_price']);
				$currency = class_exists('WooCommerce') ? get_woocommerce_currency_symbol() : self::egns_get_theme_option('global_currency_set');

				if (isset($get_pricing_categories[0]['tours_service_t_price_sale_check']) && $get_pricing_categories[0]['tours_service_t_price_sale_check'] == 1) {
					$sale_price = number_format($get_pricing_categories[0]['tours_service__t_price_sale']);
					if ($currency_position == 'left') {
						$price_output = "<span>$currency$sale_price<del>$currency$price</del></span>";
					} else {
						$price_output = "<span>$sale_price$currency<del>$price$currency</del></span>";
					}
				} else {
					if ($currency_position == 'left') {
						$price_output = "<span>$currency$price</span>";
					} else {
						$price_output = "<span>$price$currency</span>";
					}
				}
				return $price_output;
			}
		}

		public static function egns_get_tour_package_without_currency_price_by_id($post_id)
		{
			$get_pricing_categories = self::egns_tours_value_by_id($post_id, 'tours_booking_re');
			if (!empty($get_pricing_categories) && count($get_pricing_categories)) {
				$price_output = '';
				$price = number_format($get_pricing_categories[0]['tours_price']);

				if (isset($get_pricing_categories[0]['tours_service_t_price_sale_check']) && $get_pricing_categories[0]['tours_service_t_price_sale_check'] == 1) {
					$sale_price = number_format($get_pricing_categories[0]['tours_service__t_price_sale']);
					$price_output = "$sale_price";
				} else {
					$price_output = "$price";
				}
				return $price_output;
			}
		}

		// Activities price
		public static function egns_get_activities_package_price_by_id($post_id, $currency_position = 'left')
		{
			$get_pricing_categories = self::egns_activities_value_by_id($post_id, 'activities_booking_re');
			if (!empty($get_pricing_categories) && count($get_pricing_categories)) {
				$price_output = '';
				$price = number_format($get_pricing_categories[0]['activities_price']);
				$currency = class_exists('WooCommerce') ? get_woocommerce_currency_symbol() : self::egns_get_theme_option('global_currency_set');

				if (isset($get_pricing_categories[0]['activities_service_t_price_sale_check']) && $get_pricing_categories[0]['activities_service_t_price_sale_check'] == 1) {
					$sale_price = number_format($get_pricing_categories[0]['activities_service__t_price_sale']);
					if ($currency_position == 'left') {
						$price_output = "<span>$currency$sale_price<del>$currency$price</del></span>";
					} else {
						$price_output = "<span>$sale_price$currency<del>$price$currency</del></span>";
					}
				} else {
					if ($currency_position == 'left') {
						$price_output = "<span>$currency$price</span>";
					} else {
						$price_output = "<span>$price$currency</span>";
					}
				}
				return $price_output;
			}
		}
		// End Activities price 

		public static function egns_hotel_date_range($date_range)
		{
			return 3;
			$year = date('Y');
			$dates = explode(' - ', $date_range);
			if (count($dates) == 2) {
				// Ensure the dates array has exactly two elements: start and end dates
				$startDate = date_create_from_format('M d Y', trim($dates[0]) . ' ' . $year);
				$endDate = date_create_from_format('M d Y', trim($dates[1]) . ' ' . $year);

				if ($startDate && $endDate) {
					// Calculate the difference and get days
					$diff = date_diff($startDate, $endDate);
					echo sprintf('%s', $diff->days); // This will output the number of days
				} else {
					echo "Invalid dates";
				}
			}
			return $diff->days;
		}

		// Get Hotel price
		public static function egns_get_hotel_pack_price($currency_position = 'left', $dep = '')
		{
			$get_genarel_price = self::egns_hotel_value('hotel_room_price');
			$get_sale_price = self::egns_hotel_value('hotel_room_price_sale');

			if (!empty($get_genarel_price)) {

				$price_output = '';

				$price = number_format($get_genarel_price);
				if (!empty($dep['date_range'])) {
					$price = self::egns_hotel_date_range($dep['date_range']) * $price;
				}
				$currency = class_exists('WooCommerce') ? get_woocommerce_currency_symbol() : self::egns_get_theme_option('global_currency_set');

				if (!empty(self::egns_hotel_value('hotel_room_price_sale_check')) && self::egns_hotel_value('hotel_room_price_sale_check') == 1) {

					$sale_price = number_format($get_sale_price);
					if (!empty($dep['date_range'])) {
						$sale_price = self::egns_hotel_date_range($dep['date_range']) * $sale_price;
					}

					if ($currency_position == 'left') {
						$price_output = "<span>$currency$sale_price <del>$currency$price</del></span>";
					} else {
						$price_output = "<span>$sale_price$currency <del>$price$currency</del></span>";
					}
				} else {
					if ($currency_position == 'left') {
						$price_output = "<span>$currency$price</span>";
					} else {
						$price_output = "<span>$price$currency</span>";
					}
				}
				return $price_output;
			}
		}
		public static function egns_get_hotel_package_without_currency_price_by_id($post_id)
		{
			$get_genarel_price = self::egns_hotel_value_by_id($post_id, 'hotel_room_price');
			$get_sale_price = self::egns_hotel_value_by_id($post_id, 'hotel_room_price_sale');

			if (!empty($get_genarel_price)) {

				$price_output = '';

				$price = number_format($get_genarel_price);

				if (!empty(self::egns_hotel_value_by_id($post_id, 'hotel_room_price_sale_check')) && self::egns_hotel_value_by_id($post_id, 'hotel_room_price_sale_check') == 1) {

					$sale_price = number_format($get_sale_price);

					$price_output = "$sale_price";
				} else {
					$price_output = "$price";
				}
				return $price_output;
			}
		}

		public static function egns_get_transport_package_without_currency_price_by_id($post_id)
		{
			$get_pricing_categories = self::egns_transport_value_by_id($post_id, 'transport_booking_re');
			if (!empty($get_pricing_categories) && count($get_pricing_categories)) {
				$price_output = '';
				$price = number_format($get_pricing_categories[0]['transport_price']);
				if (isset($get_pricing_categories[0]['transport_service_t_price_sale_check']) && $get_pricing_categories[0]['transport_service_t_price_sale_check'] == 1) {
					$sale_price = number_format($get_pricing_categories[0]['transport_service__t_price_sale']);
					$price_output = "$sale_price";
				} else {
					$price_output = "$price";
				}
				return $price_output;
			}
		}

		public static function package_price_type($data)
		{
			if ('perperson' == $data) {

				echo 'Per Person';
			} else {
				echo 'Per Group';
			}
		}

		/**
		 * Converts a date string to a human-readable format.
		 *
		 * This function takes a date string as input and returns it in a more readable
		 * format, specifically "day Month, Year" (e.g., "14 Feb, 2024").
		 *
		 * @param string $date The input date in a format recognized by PHP's strtotime() function.
		 * @return string The formatted date as "d M, Y".
		 */
		public static function egns_format_to_date_readable($date, $format = null)
		{
			if ($format) {
				return date($format, strtotime($date));
			}
			return date('d F, Y', strtotime($date));
		}

		/**
		 * Get formated todays date
		 * @return string The formatted date as "d M, Y".
		 */
		public static function get_gmt_formatted_date($format = null)
		{
			if ($format) {
				return gmdate($format, current_time('timestamp', true));
			}
			return gmdate('j F, Y', current_time('timestamp', true));
		}

		public static function is_post_type_single($post_id, $post_type = ['tours', 'hotel', 'transport', 'visa', 'activities'])
		{
			if (in_array(get_post_type($post_id), $post_type) && is_singular(get_post_type($post_id))) {
				return true;
			}
			return false;
		}

		public static function is_post_type_archive($post_type = ['tours', 'hotels', 'transport', 'visa', 'activities'])
		{
			if (in_array(get_query_var('post_type'), $post_type)) {
				return true;
			}
			return false;
		}


		/**

		 * Displays SVG content.

		 * This function retrieves SVG content from a file URL and displays it. If a filesystem object

		 * is provided, it uses it to fetch the file contents. Otherwise, it uses WordPress functions

		 * to fetch the contents remotely. The SVG content is then echoed directly.

		 * @since 1.1.0

		 * @param string $file_url The URL of the SVG file.

		 * @param object $filesystem Optional. The filesystem object. Defaults to null.
		 */
		public static function display_svg($file_url, $filesystem = null)
		{
			if (is_null($filesystem) && function_exists('WP_Filesystem')) {
				global $wp_filesystem;
				$filesystem = $wp_filesystem;
			} elseif (is_null($filesystem)) {
				include_once ABSPATH . 'wp-admin/includes/file.php';
			}

			$file_contents = '';
			if ($filesystem) {
				$file_contents = $filesystem->get_contents($file_url);
			} else {
				$response = wp_remote_get($file_url);
				if (!is_wp_error($response) && $response['response']['code'] === 200) {
					$file_contents = wp_remote_retrieve_body($response);
				}
			}

			if (!empty($file_contents)) {
				echo sprintf('%s', $file_contents);
			}
		}
	} // end Main Egns Helper class

}
