<?php
/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

    /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
    CSF::createMetabox(
        "EGNS_TOURS_META_ID",
        array(
            'id'              => 'tours_meta_option',
            'title'           => esc_html__('Add Tours Custom Informations', 'triprex-core'),
            'post_type'       => 'tours',
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
        "EGNS_TOURS_META_ID",
        array(
            'parent' => 'tours_general_info',
            'title'  => esc_html__('General Info', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('General Information', 'triprex-core'),
                ),
                array(
                    'id'    => 'tours_gallery',
                    'type'  => 'gallery',
                    'title' => esc_html__('Image Gallery', 'triprex-core'),
                ),

                array(
                    'id'      => 'tour_more_image',
                    'type'    => 'text',
                    'title'   => esc_html__('Image Gallery Label', 'triprex-core'),
                    'default' => 'View More Images',
                ),
                array(
                    'id'    => 'tour_view_poster',
                    'type'  => 'media',
                    'title' => esc_html__('Image Gallery Poster', 'triprex-core'),
                ),
                array(
                    'id'         => 'tour_video_type_select',
                    'type'       => 'radio',
                    'title'      => esc_html__('Video Type', 'triprex-core'),
                    'options'    => array(
                        'upload' => 'Upload',
                        'url'    => 'URL',
                    ),
                    'default'    => 'url'
                ),
                array(
                    'id'    => 'tour_view_poster_video',
                    'type'  => 'media',
                    'title' => esc_html__('Video Poster', 'triprex-core'),
                ),
                array(
                    'id'         => 'tour_video_uplaod',
                    'type'       => 'media',
                    'title'      => esc_html__('Upload Video', 'triprex-core'),
                    'library'    => 'video',
                    'dependency' => array('tour_video_type_select', '==', 'upload')
                ),
                array(
                    'id'         => 'tour_video_link',
                    'type'       => 'link',
                    'title'      => esc_html__('Video Link', 'triprex-core'),
                    'dependency' => array('tour_video_type_select', '==', 'url')
                ),
                array(
                    'id'      => 'tour_more_video_label',
                    'type'    => 'text',
                    'title'   => esc_html__('Video Label', 'triprex-core'),
                    'default' => 'Watch Video',
                ),
                array(
                    'id'      => 'tour_featured_batch',
                    'type'    => 'text',
                    'title'   => esc_html__('Featured Badge', 'triprex-core'),
                ),
                array(
                    'id'      => 'tour_featured_batch_bg',
                    'type'    => 'select',
                    'title'   => esc_html__('Select Featured Badge Background', 'triprex-core'),
                    'options'    => array(
                        'green_color'   => esc_html__('Green', 'triprex-core'),
                        'yellow_color'  => esc_html__('Yellow', 'triprex-core'),
                        'black_color'   => esc_html__('Black', 'triprex-core'),
                        'white_color'   => esc_html__('White', 'triprex-core'),
                        'orange_color'  => esc_html__('Orange', 'triprex-core'),
                    ),
                ),

                array(
                    'id'          => 'tour_destination_select',
                    'type'        => 'select',
                    'title'       => esc_html__('Select Tour Destination', 'triprex-core'),
                    'placeholder' => esc_html__('Select Tour Destination', 'triprex-core'),
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
                    'id'          => 'tour_destination_location_select',
                    'type'        => 'select',
                    'title'       => esc_html__('Select Tour Location', 'triprex-core'),
                    'placeholder' => esc_html__('Select Tour Locations', 'triprex-core'),
                    'chosen'      => true,
                    'ajax'        => true,
                    'multiple'    => true,
                    'options'     => 'categories',
                    'query_args'  => array(
                        'taxonomy' => 'city-location',
                        'value'    => 'slug',
                    ),
                    'width'       => '100%',
                ),

                array(
                    'id'      => 'tour_duration',
                    'type'    => 'text',
                    'title'   => esc_html__('Duration', 'triprex-core'),
                ),
                array(
                    'id'      => 'tour_max_people',
                    'type'    => 'text',
                    'title'   => esc_html__('Max People', 'triprex-core'),
                ),
            )
        )
    );
    // tours pricing Map
    CSF::createSection(
        "EGNS_TOURS_META_ID",
        array(
            'parent' => 'tours_pricing_meta_option',
            'title'  => esc_html__('Pricing Section', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Pricing Section', 'triprex-core'),
                ),
                array(
                    'id'      => 'tours_pricing_label_before_price',
                    'type'    => 'text',
                    'title'   => esc_html__('Label Before Price', 'triprex-core'),
                    'default' => 'Starting From:',
                ),
                array(
                    'id'      => 'tours_pricing_label_after_price',
                    'type'    => 'text',
                    'title'   => esc_html__('Label After Price', 'triprex-core'),
                    'default' => 'TAXES INCL/PERS',
                ),
                array(
                    'id'     => 'tours_booking_date',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Add Tour Booking Date', 'triprex-core'),
                    'fields' => array(
                        array(
                            'id'       => 'tours_booking_date',
                            'type'     => 'datetime',
                            'title'    => esc_html__('Tour Booking Date', 'triprex-core'),
                            'subtitle' => esc_html__('Add Tour Booking Date', 'triprex-core'),
                            'from_to'  => true,
                            'text_from' => esc_html__('Check In', 'triprex-core'),
                            'text_to'   => esc_html__('Check Out', 'triprex-core'),
                            'settings' => array(
                                'minDate' => '0',
                            )
                        )
                    )
                ),
                array(
                    'id'     => 'tours_booking_re',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Add Tour Pricing', 'triprex-core'),
                    'fields' => array(
                        array(
                            'id'          => 'tour_pricing_category',
                            'type'        => 'radio',
                            'title'       => esc_html__('Select Pricing Category', 'triprex-core'),
                            'placeholder' => esc_html__('Select a Pricing Category', 'triprex-core'),
                            'chosen'      => true,
                            'ajax'        => true,
                            'options'     => 'categories',
                            'query_args'  => array(
                                'taxonomy' => 'pricing-category',
                                'value'    => 'slug',
                            ),
                            'width'       => '100%',
                            'default'     => 1,
                        ),
                        array(
                            'id'      => 'tour_minimum_quantity',
                            'type'    => 'number',
                            'title'   => esc_html__('Minimum Quantity', 'triprex-core'),
                            'default' => 1,
                        ),
                        array(
                            'id'      => 'tours_price',
                            'type'    => 'number',
                            'title'   => esc_html__('Regular Price', 'triprex-core'),
                            'default' => 50,
                            'desc' => wp_kses(__('Do not use any currency here. To Change Your Currency <a href="/wp-admin/admin.php?page=wc-settings#pricing_options-description" target="_blank">Click Here</a>', 'triprex-core'), wp_kses_allowed_html('post')),

                        ),
                        array(
                            'id'      => 'tours_service_t_price_sale_check',
                            'type'    => 'checkbox',
                            'title'   => esc_html__('Enable Sale Price', 'triprex-core'),
                            'label'   => esc_html__('Need Discount Sale Price?', 'triprex-core'),
                            'default' => false,
                        ),
                        array(
                            'id'      => 'tours_service__t_price_sale',
                            'type'    => 'number',
                            'title'   => esc_html__('Sale Price', 'triprex-core'),
                            'default' => 30,
                            'dependency' => array('tours_service_t_price_sale_check', '==', 'true'),
                        ),
                        array(
                            'id'         => 'tours_service_per_p',
                            'type'       => 'radio',
                            'title'      => esc_html__('Pricing Type', 'triprex-core'),
                            'options'    => array(
                                'perperson' => esc_html__('Per Person', 'triprex-core'),
                                'pergroup' => esc_html__('Per Group', 'triprex-core'),
                            ),
                            'default'    => 'perperson'
                        ),
                        array(
                            'id'      => 'tours_service_total_member',
                            'type'    => 'number',
                            'title'   => esc_html__('Group Size', 'triprex-core'),
                            'default' => 30,
                            'dependency' => array('tours_service_per_p', '==', 'pergroup'),
                        ),
                    ),
                ),

                array(
                    'id'    => 'extra_service_switcher',
                    'type'  => 'switcher',
                    'title' => esc_html__('Extra Service', 'triprex-core'),
                ),

                array(
                    'id'     => 'tours_extra_service_re',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Add Extra Services', 'triprex-core'),
                    'dependency' => array('extra_service_switcher', '==', 'true'),
                    'fields' => array(
                        array(
                            'id'      => 'tours_extra_service',
                            'type'    => 'text',
                            'title'   => esc_html__('Service Title', 'triprex-core'),
                            'default' => 'Home Pickup',

                        ),
                        array(
                            'id'      => 'tours_service_price',
                            'type'    => 'number',
                            'title'   => esc_html__('Service Price', 'triprex-core'),
                            'default' => 50,
                        ),
                    ),
                ),

            ),
        )
    );
    // tours includes and excludes
    CSF::createSection(
        "EGNS_TOURS_META_ID",
        array(
            'parent' => 'tours_include_exclude_meta_option',
            'title'  => esc_html__('Include And Exclude', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Include And Exclude', 'triprex-core'),
                ),
                array(
                    'id'      => 'tours_include_ex_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Included and Excluded',
                ),
                array(
                    'id'      => 'tours_include_label_text',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Includes', 'triprex-core'),
                    'desc'    => 'Enter A List Of Includes Separated By <mark>Line Breaks</mark>',
                ),

                array(
                    'id'      => 'tours_exclude_label_text',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Excludes', 'triprex-core'),
                    'desc'    => 'Enter A List Of Excludes Separated By <mark>Line Breaks</mark>',
                ),

            ),
        )
    );
    // tours highlights
    CSF::createSection(
        "EGNS_TOURS_META_ID",
        array(
            'parent' => 'tours_highlights_meta_option',
            'title'  => esc_html__('Tour Highlights', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Highlights Of Tour', 'triprex-core'),
                ),
                array(
                    'id'      => 'tours_highlights_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Highlights of the Tour',
                ),
                array(
                    'id'      => 'tours_highlights_title_list',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Content', 'triprex-core'),
                    'desc'    => 'Enter A List Of Highlights Separated By <mark>Line Breaks</mark>',
                ),
            ),
        )
    );
    // tours itinerary
    CSF::createSection(
        "EGNS_TOURS_META_ID",
        array(
            'parent' => 'tours_itinerary_meta_option',
            'title'  => esc_html__('Itinerary', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Itinerary', 'triprex-core'),
                ),
                array(
                    'id'      => 'tours_itinerary_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Itinerary',
                ),
                array(
                    'id'     => 'itinerary_repeater',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Itinerary List', 'triprex-core'),
                    'default' => array(
                        array(

                            'itinerary_counter_title'      => 'Day 01 :',
                            'itinerary_content_title'     => 'Departure',
                            'itinerary_content'     => 'Arrive Cairo airport, welcome greeting by our representative who will assist you and provide tra nsfers to your Hotel in Cairo. (the clients will inform us about their arrival time minimum 7 days before)',
                            'itinerary_content_title'     => 'Admire Big Ben, Buckingham Palace And St Paul’s Cathedral',
                        ),
                    ),
                    'fields' => array(
                        array(
                            'id'    => 'itinerary_counter_title',
                            'type'  => 'text',
                            'title' => esc_html__('Counter Title', 'triprex-core'),
                        ),
                        array(
                            'id'    => 'itinerary_content_title',
                            'type'  => 'text',
                            'title' => esc_html__('Content Title', 'triprex-core'),
                        ),
                        array(
                            'id'    => 'itinerary_content',
                            'type'  => 'wp_editor',
                            'title' => esc_html__('Content', 'triprex-core'),
                        ),
                        array(
                            'id'    => 'itinerary_content_list',
                            'type'  => 'textarea',
                            'title' => esc_html__('List Content', 'triprex-core'),
                            'desc'    => 'Enter A List Of itinerary Separated By <mark>Line Breaks</mark>',
                        ),
                    ),
                ),
            ),
        )
    );
    // tours Location Map
    CSF::createSection(
        "EGNS_TOURS_META_ID",
        array(
            'parent' => 'tours_location_meta_option',
            'title'  => esc_html__('Location Map', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Map Location', 'triprex-core'),
                ),
                array(
                    'id'      => 'tours_location_enable_disable_option',
                    'title'   => esc_html__('Enable/Disable', 'triprex-core'),
                    'type'    => 'switcher',
                    'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable location area', 'triprex-core'), wp_kses_allowed_html('post')),
                    'default' => true,
                ),
                array(
                    'id'      => 'tours_location_map_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Location Map',
                    'dependency' => array('tours_location_enable_disable_option', '==', 'true'),
                ),
                array(
                    'id'    => 'tours_iframe_code',
                    'type'  => 'code_editor',
                    'title' => esc_html__('Map iFrame Code', 'triprex-core'),
                    'default' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193325.0481540361!2d-74.06757856146028!3d40.79052383652264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1660366711448!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                    'sanitize' => false,
                    'dependency' => array('tours_location_enable_disable_option', '==', 'true'),
                ),
            ),
        )
    );
    // tours FAQ
    CSF::createSection(
        "EGNS_TOURS_META_ID",
        array(
            'parent' => 'tours_faq_meta_option',
            'title'  => esc_html__('FAQ Section', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Frequently Asked Questions', 'triprex-core'),
                ),
                array(
                    'id'      => 'tours_faq_enable_disable_option',
                    'title'   => esc_html__('Enable/Disable', 'triprex-core'),
                    'type'    => 'switcher',
                    'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable FAQ area', 'triprex-core'), wp_kses_allowed_html('post')),
                    'default' => true,
                ),
                array(
                    'id'      => 'tours_faq_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Heading Title', 'triprex-core'),
                    'default' => 'Frequently Asked & Question',
                    'dependency' => array('tours_faq_enable_disable_option', '==', 'true'),
                ),
                array(
                    'id'     => 'tours_faq_repeater',
                    'type'   => 'repeater',
                    'title'  => esc_html__('FAQ List', 'triprex-core'),
                    'dependency' => array('tours_faq_enable_disable_option', '==', 'true'),
                    'default' => array(
                        array(
                            'tours_faq_qustion'      => '01.  How do I book a trip on your website?',
                            'tours_faq_answer'     => 'Aptent taciti sociosqu ad litora torquent per conubia nostra, per inci only Integer purus onthis felis non aliquam.Mauris nec just vitae ann auctor tol euismod sit amet non ipsul growing this.',
                        ),
                    ),
                    'fields' => array(
                        array(
                            'id'      => 'tours_faq_qustion',
                            'type'    => 'text',
                            'title'   => esc_html__('Question', 'triprex-core'),

                        ),
                        array(
                            'id'      => 'tours_faq_answer',
                            'type'    => 'textarea',
                            'title'   => esc_html__('Answer', 'triprex-core'),

                        ),
                    ),
                ),
            ),
        )
    );
}
