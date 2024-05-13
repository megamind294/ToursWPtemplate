<?php
/*-------------------------------------------------------
		   ** WooCommerce page options
	--------------------------------------------------------*/
CSF::createSection($prefix, array(
    'id'     => 'woocommerce_options',
    'title'  => esc_html__('WooCommerce', 'triprex-core'),
    'icon'   => 'fa fa-shopping-bag',
));


// Create a section
CSF::createSection($prefix, array(
    'parent'     => 'woocommerce_options',
    'id'    => 'woo_shop',
    'title'  => esc_html__('Shop Page', 'triprex-core'),
    'icon'   => 'fa fa-cart-plus',
    'fields' => array(

        array(
            'id'      => 'woo_sidebar',
            'type'    => 'switcher',
            'title'   => esc_html__('Shop Sidebar', 'triprex-core'),
            'label'   => 'Do you want activate it ?',
            'default' => true
        ),
        array(
            'id'          => 'shop_column',
            'type'        => 'select',
            'title'       => esc_html__('Shop product Column', 'triprex-core'),
            'placeholder' => 'Select an column',
            'options'     => array(
                '2'  => 'Two column',
                '3'  => 'Three column',
                '4'  => 'Four column',
            ),
            'default'     => '3'
        ),

        array(
            'id'      => 'flash_sale',
            'type'    => 'switcher',
            'title'   => esc_html__('Flash Sale Tag', 'triprex-core'),
            'label'   => esc_html__('Show/Hide', 'triprex-core'),
            'default' => true
        ),

    )
));


/*-------------------------------------------------------
		  ** Woocommerce Product Options
	--------------------------------------------------------*/

CSF::createSection($prefix, array(
    'id'     => 'woocommerce_options_product',
    'parent' => 'woocommerce_options',
    'title'  => esc_html__('Details Page Options', 'triprex-core'),
    'icon'   => 'fa fa-cogs',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Options Of Product Details Page', 'triprex-core') . '</h3>',
        ),
        array(
            'id'      => 'payment_method_widget_enable',
            'title'   => esc_html__('Enable Payment Method Widget', 'triprex-core'),
            'type'    => 'switcher',
            'desc'    => wp_kses(__('You can set <mark>Yes / No</mark> to enable/disable payment method options', 'triprex-core'),  wp_kses_allowed_html('post')),
            'default' => true,
        ),
        array(
            'id'         => 'payment_method_heading',
            'title'      => esc_html__('Payment Method Heading', 'triprex-core'),
            'type'       => 'text',
            'info'       => wp_kses(__('Guaranteed Safe Checkout', 'triprex-core'), wp_kses_allowed_html('post')),
            'default'    => wp_kses(__("Guaranteed Safe Checkout", 'triprex-core'), wp_kses_allowed_html('post')),
            'dependency' => array(
                array('payment_method_widget_enable',  '==', '1'),
            ),
        ),
        array(
            'id'          => 'image_gallery',
            'type'        => 'gallery',
            'title'       => 'Payment Method Images',
            'add_title'   => 'Add Images',
            'edit_title'  => 'Edit Images',
            'clear_title' => 'Remove Images',
            'dependency'  => array(
                array('payment_method_widget_enable',  '==', '1'),
            ),
        ),
        array(
            'id'         => 'shipping_text',
            'title'      => esc_html__('Shipping label', 'triprex-core'),
            'type'       => 'text',
            'info'       => wp_kses(__('Free Worldwide Shipping On All Orders Over $100', 'triprex-core'), wp_kses_allowed_html('post')),
            'default'    => wp_kses(__("Free Worldwide Shipping On All Orders Over $100", 'triprex-core'), wp_kses_allowed_html('post')),
            'dependency' => array(
                array('payment_method_widget_enable',  '==', '1'),
            ),
        ),
        array(
            'id'         => 'delivers_text',
            'title'      => esc_html__('Delivers duration', 'triprex-core'),
            'type'       => 'text',
            'info'       => wp_kses(__('Delivers In: 3-7 Working Days', 'triprex-core'), wp_kses_allowed_html('post')),
            'default'    => wp_kses(__("Delivers In: 3-7 Working Days", 'triprex-core'), wp_kses_allowed_html('post')),
            'dependency' => array(
                array('payment_method_widget_enable',  '==', '1'),
            ),
        ),
        array(
            'id'         => 'delivers_btn_text',
            'title'      => esc_html__('Delivers button label', 'triprex-core'),
            'type'       => 'text',
            'info'       => wp_kses(__('Shipping & Return', 'triprex-core'), wp_kses_allowed_html('post')),
            'default'    => wp_kses(__("Shipping & Return", 'triprex-core'), wp_kses_allowed_html('post')),
            'dependency' => array(
                array('payment_method_widget_enable',  '==', '1'),
            ),
        ),
        array(
            'id'         => 'delivers_btn_url',
            'type'       => 'text',
            'title'      => esc_html__('Delivers button Link ', 'triprex-core'),
            'default'    => wp_kses(__('#', 'triprex-core'), wp_kses_allowed_html('post')),
            'dependency' => array(
                array('payment_method_widget_enable',  '==', '1'),
            ),

        ),
    ),
));
