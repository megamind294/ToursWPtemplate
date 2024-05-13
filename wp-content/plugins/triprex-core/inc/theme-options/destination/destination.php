<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

    /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
    CSF::createMetabox(
        "EGNS_DESTINATION_META_ID",
        array(
            'id'              => 'destination_meta_option',
            'title'           => esc_html__('Add Destination Custom Informations', 'triprex-core'),
            'post_type'       => 'destination',
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
        "EGNS_DESTINATION_META_ID",
        array(
            'parent' => 'destination_general_info',
            'title'  => esc_html__('General Info', 'triprex-core'),
            'fields' => array(
                array(
                    'id'    => 'destination_general_icon_image',
                    'type'  => 'media',
                    'title' => esc_html__('Icon Image'),
                    'desc'  => esc_html__('Need This Image Icon For Home Six Hero Banner', 'triprex-core'),
                ),
                array(
                    'id'     => 'destination_general_info_re',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Destination Info List', 'triprex-core'),
                    'default' => array(
                        array(


                            'destination_info_label_text'     => 'Destination',
                            'destination_info_content_text'     => 'Bangladesh',
                        ),
                    ),
                    'fields' => array(

                        array(
                            'id'      => 'destination_info_label_text',
                            'type'    => 'text',
                            'title'   => esc_html__('Label', 'triprex-core'),
                        ),
                        array(
                            'id'      => 'destination_info_content_text',
                            'type'    => 'text',
                            'title'   => esc_html__('Content', 'triprex-core'),
                        ),
                    ),
                ),
            ),
        )
    );


    // Destination Activities
    CSF::createSection(
        "EGNS_DESTINATION_META_ID",
        array(
            'parent' => 'destination_activities_meta_option',
            'title'  => esc_html__('Destination Activities', 'triprex-core'),
            'fields' => array(
                array(
                    'id'      => 'destination_activities_switcher',
                    'type'    => 'switcher',
                    'title'   => esc_html__('Turn On/Off Activities', 'triprex-core'),
                    'label'   => esc_html__('Do You Want To Active It?', 'triprex-core'),
                    'default' => true
                ),
                array(
                    'id'      => 'destination_activities',
                    'type'    => 'text',
                    'title'   => esc_html__('Title', 'triprex-core'),
                    'default' => 'Our Destination Highlight',
                    'dependency' => array('destination_activities_switcher', '==', 'true')
                ),
                array(
                    'id'     => 'destination_activity_re',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Activities List', 'triprex-core'),
                    'dependency' => array('destination_activities_switcher', '==', 'true'),
                    'default' => array(
                        array(
                            'destination_activity_logo'      => 'fas fa-assistive-listening-systems',
                            'destination_activity_title'     => 'Outdoor Adventure',
                        ),
                    ),
                    'fields' => array(
                        array(
                            'id'      => 'destination_activity_thumbnail',
                            'type'    => 'media',
                            'title'   => esc_html__('Thumbnail', 'triprex-core'),
                        ),
                        array(
                            'id'      => 'destination_activity_icon_image',
                            'type'    => 'media',
                            'title'   => esc_html__('Icon Image', 'triprex-core'),
                        ),
                        array(
                            'id'      => 'destination_activity_title',
                            'type'    => 'text',
                            'title'   => esc_html__('Activities Title', 'triprex-core'),
                            'default' => 'Outdoor Adventure',
                        ),
                    ),
                ),
            ),
        )
    );
}
