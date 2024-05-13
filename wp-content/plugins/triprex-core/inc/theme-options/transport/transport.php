<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

    /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
    CSF::createMetabox(
        "EGNS_TRANSPORT_META_ID",
        array(
            'id'              => 'transport_meta_option',
            'title'           => esc_html__('Add Transport Custom Informations', 'triprex-core'),
            'post_type'       => 'transport',
            'context'         => 'normal',
            'priority'        => 'high',
            'show_restore'    => true,
            'enqueue_webfont' => true,
            'async_webfont'   => false,
            'output_css'      => false,
            'nav'             => 'normal',
            'theme'           => 'dark',
        )
    );


    /*-----------------------------------
		REQUIRE META FILES
	------------------------------------*/

    // General Info
    CSF::createSection(
        "EGNS_TRANSPORT_META_ID",
        array(
            'parent' => 'transport_general_info',
            'title'  => esc_html__('General Info', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('General Informations', 'triprex-core'),
                ),
                array(
                    'id'     => 'transport_tab_info_re',
                    'type'   => 'repeater',
                    'title'  =>  esc_html__('Gallery Section', 'triprex-core'),
                    'default' => array(
                        array(
                            'transport_info_label_text'  => 'Bangladesh',
                        ),
                    ),
                    'fields' => array(
                        array(
                            'id'      => 'transport_tab_image',
                            'type'    => 'media',
                            'title'   =>  esc_html__('Tab Image', 'triprex-core'),
                            'library' => 'image',
                            'upload_type' => 'image',
                        ),
                        array(
                            'id'     => 'transport_tab_slider_image_re',
                            'type'   => 'repeater',
                            'title'  =>  esc_html__('Transport Slider Images', 'triprex-core'),
                            'fields' => array(
                                array(
                                    'id'      => 'transport_slider_images',
                                    'type'    => 'media',
                                    'title'   =>  esc_html__('Slider Image', 'triprex-core'),
                                    'library' => 'image',
                                    'upload_type' => 'image',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'id'          => 'transport_location_from',
                    'type'        => 'select',
                    'title'       => esc_html__('Location From', 'triprex-core'),
                    'placeholder' => esc_html__('Location From', 'triprex-core'),
                    'chosen'      => true,
                    'ajax'        => true,
                    'multiple'    => true,
                    'options'     => 'posts',
                    'query_args'  => array(
                        'post_type' => 'destination'
                    ),
                    'width'       => '100%',
                ),
                array(
                    'id'     => 'transport_general_info_re',
                    'type'   => 'repeater',
                    'title'  =>  esc_html__('Transport Informations', 'triprex-core'),
                    'default' => array(
                        array(
                            'transport_info_label_text'     => 'Free Cancellation',
                        ),
                    ),
                    'fields' => array(
                        array(
                            'id'      => 'transport_info_icon',
                            'type'    => 'media',
                            'title'   =>  esc_html__('Icon', 'triprex-core'),
                            'library' => 'image',
                            'upload_type' => 'image',
                            'desc' => 'Upload an image or SVG file for the icon.',
                        ),
                        array(
                            'id'      => 'transport_info_label_text',
                            'type'    => 'text',
                            'title'   =>  esc_html__('Label', 'triprex-core'),
                        ),
                    ),
                ),
                array(
                    'id'      => 'transport_distance_field',
                    'type'    => 'text',
                    'title'   =>  esc_html__('Distance', 'triprex-core'),
                    'default' => '45km',
                ),
            ),
        )
    );

    // tours pricing Map
    CSF::createSection(
        "EGNS_TRANSPORT_META_ID",
        array(
            'parent' => 'transport_pricing_meta_option',
            'title'  => esc_html__('Pricing Section', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Pricing Section', 'triprex-core'),
                ),
                array(
                    'id'     => 'transport_main_pricing_re',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Add Transport Pricing', 'triprex-core'),
                    'fields' => array(
                        array(
                            'id'    => 'transport_main_preicing_icon',
                            'type'  => 'media',
                            'title' => esc_html__('Transport Image', 'triprex-core'),
                        ),
                        array(
                            'id'      => 'transport_main_title_price',
                            'type'    => 'text',
                            'title'   => esc_html__('Title', 'triprex-core'),
                            'default' => 'Train',
                        ),
                        array(
                            'id'     => 'transport_booking_re',
                            'type'   => 'repeater',
                            'title'  => esc_html__('Add Transport Pricing', 'triprex-core'),
                            'fields' => array(
                                array(
                                    'id'          => 'Transport_pricing_category',
                                    'type'        => 'radio',
                                    'title'       => esc_html__('Select Pricing Category', 'triprex-core'),
                                    'placeholder' => esc_html__('Select a Pricing Category', 'triprex-core'),
                                    'chosen'      => true,
                                    'ajax'        => true,
                                    'options'     => 'categories',
                                    'query_args'  => array(
                                        'taxonomy' => 'pricing-category-transport',
                                        'value'    => 'slug',
                                    ),
                                    'width'       => '100%',
                                    'default'     => 1,
                                ),
                                array(
                                    'id'      => 'transport_minimum_quantity',
                                    'type'    => 'number',
                                    'title'   => esc_html__('Minimum Quantity', 'triprex-core'),
                                    'default' => 1,
                                ),
                                array(
                                    'id'      => 'transport_price',
                                    'type'    => 'number',
                                    'title'   => esc_html__('Regular Price', 'triprex-core'),
                                    'default' => 50,
                                    'desc' => wp_kses(__('Do not use any currency here. To Change Your Currency <a href="/wp-admin/admin.php?page=wc-settings#pricing_options-description" target="_blank">Click Here</a>', 'triprex-core'), wp_kses_allowed_html('post')),
                                ),
                                array(
                                    'id'      => 'transport_service_t_price_sale_check',
                                    'type'    => 'checkbox',
                                    'title'   => esc_html__('Enable Sale Price', 'triprex-core'),
                                    'label'   => esc_html__('Need Discount Sale Price?', 'triprex-core'),
                                    'default' => false,
                                ),
                                array(
                                    'id'      => 'transport_service__t_price_sale',
                                    'type'    => 'number',
                                    'title'   => esc_html__('Sale Price', 'triprex-core'),
                                    'dependency' => array('transport_service_t_price_sale_check', '==', 'true'),
                                ),
                                array(
                                    'id'         => 'transport_service_per_p',
                                    'type'       => 'radio',
                                    'title'      => esc_html__('Pricing Type', 'triprex-core'),
                                    'options'    => array(
                                        'perperson' => esc_html__('Per Person', 'triprex-core'),
                                        'pergroup' => esc_html__('Per Group', 'triprex-core'),
                                    ),
                                    'default'    => 'perperson'
                                ),
                                array(
                                    'id'      => 'transport_service_total_member',
                                    'type'    => 'number',
                                    'title'   => esc_html__('Group Size', 'triprex-core'),
                                    'dependency' => array('transport_service_per_p', '==', 'pergroup'),
                                ),
                            ),
                        ),
                        array(
                            'id'    => 'transport_extra_service_switcher',
                            'type'  => 'switcher',
                            'title' => esc_html__('Extra Service', 'triprex-core'),
                        ),

                        array(
                            'id'     => 'transport_extra_service_re',
                            'type'   => 'repeater',
                            'title'  => esc_html__('Add Extra Services', 'triprex-core'),
                            'dependency' => array('transport_extra_service_switcher', '==', 'true'),
                            'fields' => array(
                                array(
                                    'id'      => 'transport_extra_service',
                                    'type'    => 'text',
                                    'title'   => esc_html__('Service Title', 'triprex-core'),
                                    'default' => esc_html__('Home Pickup', 'triprex-core'),

                                ),
                                array(
                                    'id'      => 'transport_service_price',
                                    'type'    => 'number',
                                    'title'   => esc_html__('Service Price', 'triprex-core'),
                                    'default' => 50,
                                ),
                            ),
                        ),
                    ),
                ),



            ),
        )
    );

    // tours includes and excludes
    CSF::createSection(
        "EGNS_TRANSPORT_META_ID",
        array(
            'parent' => 'transport_include_exclude_meta_option',
            'title'  => esc_html__('Include And Exclude', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Add Include And Exclude', 'triprex-core'),
                ),
                array(
                    'id'      => 'transport_include_ex_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Included and Excluded',
                ),
                array(
                    'id'      => 'transport_include_label_text',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Includes', 'triprex-core'),
                    'desc'    => 'Enter A List Of Includes Separated By <mark>Line Breaks</mark>',
                ),

                array(
                    'id'      => 'transport_exclude_label_text',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Excludes', 'triprex-core'),
                    'desc'    => 'Enter A List Of Excludes Separated By <mark>Line Breaks</mark>',
                ),

            ),
        )
    );

    // tours FAQ
    CSF::createSection(
        "EGNS_TRANSPORT_META_ID",
        array(
            'parent' => 'transport_faq_meta_option',
            'title'  => esc_html__('FAQ Section', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Frequently Asked Question', 'triprex-core'),
                ),
                array(
                    'id'      => 'transport_faq_enable_disable_option',
                    'title'   => esc_html__('Enable/Disable', 'triprex-core'),
                    'type'    => 'switcher',
                    'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable faq area', 'triprex-core'), wp_kses_allowed_html('post')),
                    'default' => true,
                ),
                array(
                    'id'      => 'transport_faq_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Frequently Asked & Question',
                    'dependency' => array('transport_faq_enable_disable_option', '==', 'true'),
                ),
                array(
                    'id'     => 'transport_faq_repeater',
                    'type'   => 'repeater',
                    'title'  => esc_html__('FAQ List', 'triprex-core'),
                    'dependency' => array('transport_faq_enable_disable_option', '==', 'true'),
                    'default' => array(
                        array(
                            'transport_faq_qustion'      => '01.  How do I book a trip on your website?',
                            'transport_faq_answer'     => 'Aptent taciti sociosqu ad litora torquent per conubia nostra, per inci only Integer purus onthis felis non aliquam.Mauris nec just vitae ann auctor tol euismod sit amet non ipsul growing this.',
                        ),
                    ),
                    'fields' => array(
                        array(
                            'id'      => 'transport_faq_qustion',
                            'type'    => 'text',
                            'title'   => esc_html__('Question', 'triprex-core'),

                        ),
                        array(
                            'id'      => 'transport_faq_answer',
                            'type'    => 'textarea',
                            'title'   => esc_html__('Answer', 'triprex-core'),

                        ),
                    ),
                ),
            ),
        )
    );
}
