<?php
/*-----------------------------------
		Header Style
	------------------------------------*/

CSF::createSection($prefix, array(
	'parent' => 'header_options',
	'title'  => esc_html__('Header Style', 'triprex-core'),
	'id'     => 'theme_header_style_options',
	'icon'   => 'fab fa-algolia',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Select Header Style', 'triprex-core') . '</h3>'
		),
		array(
			'id'      => 'header_menu_style',
			'title'   => esc_html__('Select Style', 'triprex-core'),
			'type'    => 'image_select',
			'options' => array(
				'header_one'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header1.jpg'),
				'header_two'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header2.jpg'),
				'header_three' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header3.jpg'),
				'header_four'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header4.jpg'),
				'header_five'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header5.jpg'),
				'header_six'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header6.jpg'),
			),
			'desc'    => wp_kses(__('you can select <mark>Header Style </mark> for header section', 'triprex-core'), wp_kses_allowed_html('triprex-core')),
			'default' => 'header_one',
		),

	),

));
