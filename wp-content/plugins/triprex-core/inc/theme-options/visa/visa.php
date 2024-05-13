<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

    /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
    CSF::createMetabox(
        "EGNS_VISA_META_ID",
        array(
            'id'              => 'visa_meta_option',
            'title'           => esc_html__('Add Visa Custom Informations', 'triprex-core'),
            'post_type'       => 'visa',
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
        "EGNS_VISA_META_ID",
        array(
            'parent' => 'visa_general_info',
            'title'  => esc_html__('General Info', 'triprex-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('General Informations', 'triprex-core'),
                ),
                array(
                    'id'      => 'visa_cost_heading',
                    'type'    => 'text',
                    'title'   => esc_html__('Add Cost Title', 'triprex-core'),
                    'default' => esc_html__('Cost Summary', 'triprex-core'),
                ),
                array(
                    'id'      => 'visa_cost_select',
                    'type'    => 'radio',
                    'title'   => esc_html__('Select Price Category', 'triprex-core'),
                    'options' => array(
                        'perperson' => esc_html__('Per Person', 'triprex-core'),
                        'pergroup'  => esc_html__('Per Group', 'triprex-core'),
                    ),
                    'default' => 'perperson',
                ),
                array(
                    'id'      => 'visa_service_total_member',
                    'type'    => 'number',
                    'title'   => esc_html__('Group Size', 'triprex-core'),
                    'default' => 30,
                    'dependency' => array('visa_cost_select', '==', 'pergroup'),
                ),
                array(
                    'id'         => 'visa_pack_cost',
                    'type'       => 'number',
                    'title'      => esc_html__('Add Visa Price', 'triprex-core'),
                    'default'    => 50,
                    'dependency' => array('visa_cost_select', 'any', 'perperson,pergroup')
                ),
                array(
                    'id'      => 'visa_pack_cost_sale_check',
                    'type'    => 'checkbox',
                    'title'   => esc_html__('Sale Price', 'triprex-core'),
                    'label'   => esc_html__('Add Discount', 'triprex-core'),
                    'default' => false,
                    'desc' => wp_kses(__('Need visa sale price ?', 'triprex-core'), wp_kses_allowed_html('post')),
                ),
                array(
                    'id'      => 'visa_pack_cost_sale',
                    'type'    => 'number',
                    'title'   => esc_html__('Discount Price', 'triprex-core'),
                    'default' => 30,
                    'dependency' => array('visa_pack_cost_sale_check', '==', 'true'),
                ),
                array(
                    'id'      => 'visa_short_desc',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Short Description', 'triprex-core'),
                    'default' => esc_html__('Arrange your trip in advance - book this room now!', 'triprex-core'),
                ),

                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Visa Informations', 'triprex-core'),
                ),
                array(
                    'id'      => 'visa_general_info_re',
                    'type'    => 'repeater',
                    'title'   => esc_html__('Visa Info List', 'triprex-core'),
                    'default' => array(
                        array(
                            'visa_info_label_text'   => 'Maximum Sta Ys :',
                            'visa_info_content_text' => '30 Days',
                        ),
                    ),
                    'fields' => array(
                        array(
                            'id'    => 'visa_info_label_text',
                            'type'  => 'text',
                            'title' => esc_html__('Label', 'triprex-core'),
                        ),
                        array(
                            'id'    => 'visa_info_content_text',
                            'type'  => 'text',
                            'title' => esc_html__('Content', 'triprex-core'),
                        ),
                    ),
                ),
            ),
        )
    );
}
// Document Content
CSF::createSection(
    "EGNS_VISA_META_ID",
    array(
        'parent' => 'visa_document_content',
        'title'  => esc_html__('Required Documents', 'triprex-core'),
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Visa Documents', 'triprex-core'),
            ),
            array(
                'id'      => 'visa_document_heading_title',
                'type'    => 'text',
                'title'   => esc_html__('Heading Title', 'triprex-core'),
                'default' => 'View Required Documents',
            ),
            array(
                'id'      => 'visa_document_heading_subtitle',
                'type'    => 'text',
                'title'   => esc_html__('Heading Subtitle', 'triprex-core'),
                'default' => 'Required Documents for Electronic Visa (Adult) with Insurance',
            ),
            array(
                'id'     => 'visa_document_re',
                'type'   => 'repeater',
                'title'  => esc_html__('Visa Document Title', 'triprex-core'),
                'fields' => array(
                    array(
                        'id'      => 'visa_document_content_text',
                        'type'    => 'text',
                        'title'   => esc_html__('Content', 'triprex-core'),
                        'default' => 'Passport Scan Copy: Clearly scanned Passport copy required. Minimum of 6 months validity required from the arrival date.',
                    ),
                ),
                'default' => array(
                    array(
                        'visa_document_content_text' => 'Passport Scan Copy: Clearly scanned Passport copy required. Minimum of 6 months validity required from the arrival date.',
                    ),
                ),
            ),
        ),
    )
);

// FAQ
CSF::createSection(
    "EGNS_VISA_META_ID",
    array(
        'parent' => 'visa_faq',
        'title'  => esc_html__('FAQ', 'triprex-core'),
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Frequently Asked Question', 'triprex-core'),
            ),
            array(
                'id'      => 'visa_faq_heading',
                'type'    => 'text',
                'title'   => esc_html__('FAQ Heading Title', 'triprex-core'),
                'default' => 'FAQ - General Visa Information',
            ),
            array(
                'id'     => 'visa_faq_re',
                'type'   => 'repeater',
                'title'  => esc_html__('Visa FAQ List', 'triprex-core'),
                'fields' => array(
                    array(
                        'id'      => 'visa_faq_qustion',
                        'type'    => 'text',
                        'title'   => esc_html__('Question', 'triprex-core'),
                        'default' => 'Can I fill in my visa application in a language other than English?',
                    ),
                    array(
                        'id'      => 'visa_faq_answer',
                        'type'    => 'text',
                        'title'   => esc_html__('Answer', 'triprex-core'),
                        'default' => 'No. At Present our online application system only supports applications made in English.',
                    ),
                ),
                'default' => array(
                    array(
                        'visa_faq_qustion' => 'Can I fill in my visa application in a language other than English?',
                        'visa_faq_answer'  => 'No. At Present our online application system only supports applications made in English.',
                    ),
                ),
            ),
        ),
    )
);
