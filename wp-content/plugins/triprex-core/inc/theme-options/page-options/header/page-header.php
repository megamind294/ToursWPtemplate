<?php

/*-----------------------------------
PAGE MENU SECTION
------------------------------------*/
CSF::createSection(
    $prefix,
    array(
        'title'  => esc_html__('Page Header', 'triprex-core'),
        'parent' => 'page_meta_option',
        'fields' => array(
            //Page Header Options
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Header Options', 'triprex-core'),
            ),
            array(
                'id'            => 'page_main_header_enable',
                'type'          => 'select',
                'title'           => esc_html__('Main Header', 'triprex-core'),
                'desc'            => wp_kses(__('you can enable/disable <mark>Main Header </mark> for header section', 'triprex-core'), wp_kses_allowed_html('post')),
                'options'         => array(
                    'enable'          => esc_html('Enable'),
                    'disable'          => esc_html('Disable'),
                ),
                'default'       => 1
            ),
            array(
                'id'              => 'page_header_menu_style',
                'title'           => esc_html__('Select Style', 'triprex-core'),
                'type'            => 'image_select',
                'options'             => array(
                    'default'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/default.png'),
                    'header_one'      => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header1.jpg'),
                    'header_two'      => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header2.jpg'),
                    'header_three'    => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header3.jpg'),
                    'header_four'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header4.jpg'),
                    'header_five'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header5.jpg'),
                    'header_six'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header6.jpg'),
                ),
                'desc'            => wp_kses(__('you can select <mark>Header Style </mark> for header section', 'triprex-core'), wp_kses_allowed_html('post')),
                'default'         => 'default',
                'dependency'    => array('page_main_header_enable', '==', 'enable'),
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header One)', 'triprex-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_one'),
            ),
            array(
                'id'      => 'page_header_one_logo',
                'title'   => esc_html__('Upload  Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_one'),
            ),
            array(
                'id'      => 'page_header_one_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_one'),
            ),
            // Two

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header Two)', 'triprex-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_two'),
            ),
            array(
                'id'      => 'page_header_two_logo',
                'title'   => esc_html__('Upload  Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_two'),
            ),
            array(
                'id'      => 'page_header_two_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_two'),
            ),
            // Three
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header Three)', 'triprex-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_three'),
            ),
            array(
                'id'      => 'page_header_three_logo',
                'title'   => esc_html__('Upload  Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_three'),
            ),
            array(
                'id'      => 'page_header_three_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_three'),
            ),


            // Four
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header Four)', 'triprex-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_four'),
            ),
            array(
                'id'      => 'page_header_four_logo',
                'title'   => esc_html__('Upload  Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_four'),
            ),
            array(
                'id'      => 'page_header_four_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_four'),
            ),


            // Five
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header Five)', 'triprex-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_five'),
            ),
            array(
                'id'      => 'page_header_five_logo',
                'title'   => esc_html__('Upload  Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_five'),
            ),
            array(
                'id'      => 'page_header_five_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_five'),
            ),
            // Six
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header Six)', 'triprex-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_six'),
            ),
            array(
                'id'      => 'page_header_six_logo',
                'title'   => esc_html__('Upload  Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_six'),
            ),
            array(
                'id'      => 'page_header_six_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'triprex-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_six'),
            ),


        ),
    )
);
