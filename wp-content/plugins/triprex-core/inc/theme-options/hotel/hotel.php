<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

    // Pricing Type 
    $pricing_type = '';
    if (function_exists('get_woocommerce_currency_symbol')) {
        $pricing_type =  'Hotel Room Price' . '(' . get_woocommerce_currency_symbol() . ')';
    } else {
        $pricing_type =  'Hotel Room Price';
    }

    /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
    CSF::createMetabox(
        "EGNS_HOTEL_META_ID",
        array(
            'id'              => 'hotel_meta_option',
            'title'           => esc_html__('Add Hotels Custom Informations', 'triprex-core'),
            'post_type'       => 'hotel',
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
        "EGNS_HOTEL_META_ID",
        array(
            'parent' => 'hotel_general_info',
            'title'  => esc_html__('General Info', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('General Informations', 'triprex-core'),
                ),
                array(
                    'id'    => 'hotel_gallery',
                    'type'  => 'gallery',
                    'title' => esc_html__('Image Gallery', 'triprex-core'),
                ),

                array(
                    'id'      => 'hotel_more_image',
                    'type'    => 'text',
                    'title'   => esc_html__('Image Gallery Label', 'triprex-core'),
                    'default' => 'View More Images',
                ),
                array(
                    'id'    => 'hotel_view_poster',
                    'type'  => 'media',
                    'title' => esc_html__('Image Gallery Poster', 'triprex-core'),
                ),
                array(
                    'id'         => 'hotel_video_type_select',
                    'type'       => 'radio',
                    'title'      => esc_html__('Video Type', 'triprex-core'),
                    'options'    => array(
                        'upload' => 'Upload',
                        'url'    => 'URL',
                    ),
                    'default'    => 'url'
                ),
                array(
                    'id'    => 'hotel_view_poster_video',
                    'type'  => 'media',
                    'title' => esc_html__('Video Poster', 'triprex-core'),
                ),
                array(
                    'id'         => 'hotel_video_uplaod',
                    'type'       => 'media',
                    'title'      => esc_html__('Upload Video', 'triprex-core'),
                    'library'    => 'video',
                    'dependency' => array('hotel_video_type_select', '==', 'upload')
                ),
                array(
                    'id'         => 'hotel_video_link',
                    'type'       => 'link',
                    'title'      => esc_html__('Video Link', 'triprex-core'),
                    'dependency' => array('hotel_video_type_select', '==', 'url')
                ),
                array(
                    'id'      => 'hotel_more_video_label',
                    'type'    => 'text',
                    'title'   => esc_html__('Video Label', 'triprex-core'),
                    'default' => 'Watch Video',
                ),
                array(
                    'id'      => 'hotel_exclusive_facilities_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Exclusive Facility', 'triprex-core'),
                    'default' => 'Breakfast Included',
                ),
                array(
                    'id'      => 'hotel_location_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Hotel Address', 'triprex-core'),
                    'default' => 'New York, USA',
                ),
                array(
                    'id'    => 'hotel_location_link',
                    'type'  => 'link',
                    'title' => esc_html__('Map Label & location Link', 'triprex-core'),
                ),
                array(
                    'id'      => 'hotel_room_info',
                    'type'    => 'text',
                    'title'   => esc_html__('Room Info', 'triprex-core'),
                    'default' => '1 king bed',
                ),
                array(
                    'id'      => 'hotel_duration_person',
                    'type'    => 'text',
                    'title'   => esc_html__('Duration & Person', 'triprex-core'),
                    'default' => '1 Night, 2 Adults',
                ),
                array(
                    'id'      => 'hotel_distance',
                    'type'    => 'text',
                    'title'   => esc_html__('Distance', 'triprex-core'),
                    'default' => '2 km to city center',
                ),
                array(
                    'id'      => 'hotel_cancellation_label',
                    'type'    => 'text',
                    'title'   => esc_html__('Hotel Cancellation Label', 'triprex-core'),
                    'default' => 'Free cancellation',
                ),
                array(
                    'id'      => 'hotel_cancellation_duration',
                    'type'    => 'text',
                    'title'   => esc_html__('Hotel Cancellation Duration', 'triprex-core'),
                    'default' => 'before 48 hours',
                ),

            )
        )
    );
    // hotel pricing
    CSF::createSection(
        "EGNS_HOTEL_META_ID",
        array(
            'parent' => 'hotel_pricing_meta_option',
            'title'  => esc_html__('Pricing Section', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Pricing Section', 'triprex-core'),
                ),
                array(
                    'id'      => 'hotel_room_price',
                    'type'    => 'number',
                    'title'   => esc_html__($pricing_type, 'triprex-core'),
                    'default' => 20,
                    'desc' => wp_kses(__('Change global currency <a href="/wp-admin/admin.php?page=wc-settings#pricing_options-description" target="_blank">Click Here</a>', 'triprex-core'), wp_kses_allowed_html('post')),
                ),
                array(
                    'id'      => 'hotel_room_price_sale_check',
                    'type'    => 'checkbox',
                    'title'   => esc_html__('Sale Price', 'triprex-core'),
                    'label'   => esc_html__('Add Discount', 'triprex-core'),
                    'default' => false,
                    'desc' => wp_kses(__('Need hotel room sale price ?', 'triprex-core'), wp_kses_allowed_html('post')),
                ),
                array(
                    'id'      => 'hotel_room_price_sale',
                    'type'    => 'number',
                    'title'   => esc_html__('Discount Price', 'triprex-core'),
                    'default' => 30,
                    'dependency' => array('hotel_room_price_sale_check', '==', 'true'),
                ),
                array(
                    'id'      => 'hotel_room_duration',
                    'type'    => 'text',
                    'title'   => esc_html__('Room Duration tag', 'triprex-core'),
                    'default' => esc_html__('Per Night', 'triprex-core'),

                ),
                array(
                    'id'      => 'hotel_room_quantity',
                    'type'    => 'number',
                    'title'   => esc_html__('Hotel Room Quantity', 'triprex-core'),
                    'default' => 1,
                ),
                array(
                    'id'      => 'hotel_room_person_capability',
                    'type'    => 'number',
                    'title'   => esc_html__('Room Person Capability', 'triprex-core'),
                    'default' => 5,
                ),
                array(
                    'id'    => 'hotel_extra_service_switcher',
                    'type'  => 'switcher',
                    'title' => esc_html__('Extra Service', 'triprex-core'),
                ),

                array(
                    'id'     => 'hotel_extra_service_re',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Add Extra Services', 'triprex-core'),
                    'dependency' => array('hotel_extra_service_switcher', '==', 'true'),
                    'fields' => array(
                        array(
                            'id'      => 'hotel_extra_service',
                            'type'    => 'text',
                            'title'   => esc_html__('Service Title', 'triprex-core'),
                            'default' => 'Home Pickup',

                        ),
                        array(
                            'id'      => 'hotel_service_price',
                            'type'    => 'number',
                            'title'   => esc_html__('Service Price', 'triprex-core'),
                            'default' => 50,
                        ),
                    ),
                ),

            ),
        )
    );

    //highlights
    CSF::createSection(
        "EGNS_HOTEL_META_ID",
        array(
            'parent' => 'hotel_highlights_meta_option',
            'title'  => esc_html__('Highlights', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Add Highlights', 'triprex-core'),
                ),
                array(
                    'id'      => 'hotel_highlights_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Highlights',
                ),
                array(
                    'id'     => 'hotel_highlights_repeater',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Highlights List', 'triprex-core'),
                    'default' => array(
                        array(

                            'hotel_highlights_title' => 'TV',
                        ),
                    ),
                    'fields' => array(
                        array(
                            'id'    => 'hotel_highlights_media',
                            'type'  => 'media',
                            'title' => esc_html__('Icon', 'triprex-core'),
                        ),
                        array(
                            'id'    => 'hotel_highlights_title',
                            'type'  => 'text',
                            'title' => esc_html__('Content', 'triprex-core'),
                        ),
                    ),
                ),
            ),
        )
    );
    //facilities
    CSF::createSection(
        "EGNS_HOTEL_META_ID",
        array(
            'parent' => 'hotel_facilities_meta_option',
            'title'  => esc_html__('Facilities', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Add Hotel Facilities', 'triprex-core'),
                ),
                array(
                    'id'      => 'hotel_facitilies_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Facilities',
                ),
                array(
                    'id'      => 'hotel_facilities_list',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Facilities List', 'triprex-core'),
                    'default' => 'Airport transfer',
                    'desc' => 'Enter each facility on a <mark>new line.</mark>',
                ),
            ),
        ),
    );
    // hotel Location Map
    CSF::createSection(
        "EGNS_HOTEL_META_ID",
        array(
            'parent' => 'hotel_location_meta_option',
            'title'  => esc_html__('Location Map', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Map Location', 'triprex-core'),
                ),
                array(
                    'id'      => 'hotel_location_enable_disable_option',
                    'title'   => esc_html__('Enable/Disable', 'triprex-core'),
                    'type'    => 'switcher',
                    'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable location area', 'triprex-core'), wp_kses_allowed_html('post')),
                    'default' => true,
                ),
                array(
                    'id'      => 'hotel_location_map_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Location Map',
                    'dependency' => array('tours_location_enable_disable_option', '==', 'true'),
                ),
                array(
                    'id'    => 'hotel_iframe_code',
                    'type'  => 'code_editor',
                    'title' => esc_html__('Map iFrame Code', 'triprex-core'),
                    'default' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193325.0481540361!2d-74.06757856146028!3d40.79052383652264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1660366711448!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                    'sanitize' => false,
                    'dependency' => array('hotel_location_enable_disable_option', '==', 'true'),
                ),
            ),
        )
    );
}
