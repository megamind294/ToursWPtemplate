<?php

/*-------------------------------------------------------
		  ** Breadcrumbs Options
	--------------------------------------------------------*/

CSF::createSection($prefix, array(
	'title'  => esc_html__('Breadcrumb', 'triprex-core'),
	'id'     => 'breadcrumb_options',
	'icon'   => 'fa fa-ellipsis-h',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Breadcrumb Options', 'triprex-core') . '</h3>'
		),
		array(
			'id'      => 'breadcrumb_enable',
			'title'   => esc_html__('Enable Breadcrumb', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'triprex-core'), wp_kses_allowed_html('triprex-core')),
			'default' => true,
		),
		array(
			'id'    => 'breadcrumb_title_typography',
			'type'  => 'typography',
			'title' => esc_html__('Title Typography', 'triprex-core'),
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'    => 'breadcrumb_link_typography',
			'type'  => 'typography',
			'title' => esc_html__('Link Typography', 'triprex-core'),
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'    => 'breadcrumb_active_title_typography',
			'type'  => 'typography',
			'title' => esc_html__('Navigation Typography', 'triprex-core'),
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'type'    => 'subheading',
			'content' => '<h4>' . esc_html__('Breadcrumb Background', 'triprex-core') . '</h4>',
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'                => 'breadcrumb_bg_image',
			'type'              => 'media',
			'title'             => esc_html__('Background Image', 'triprex-core'),
			'desc'              => esc_html__('set the banner background image', 'triprex-core'),
			'dependency'        => array('breadcrumb_enable', '==', 'true'),
			'default'			=> array(
				'url'         	=> esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/breadcrumb/inner-banner-bg.jpg'),
				'id'          	=> 'breadcrumb-img',
				'thumbnail'   	=> esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/breadcrumb/inner-banner-bg.jpg'),
				'alt'         	=> esc_attr('breadcrumb-img'),
				'title'       	=> esc_html('Breadcrumb'),
			),
		),
		array(
			'id'      => 'breadcump_normal_color_background',
			'type'    => 'color',
			'title'   => 'Background Color',
			'desc'    => esc_html__('set the banner background color', 'triprex-core'),
			'dependency' => array('breadcrumb_enable', '==', 'true'),
		),
		array(
			'id'      => 'breadcrumb_bg_padding',
			'type'    => 'spacing',
			'title'   => 'Breadcrumb Background Padding',
			'desc'    => 'Set the spacing values for top, right, bottom, and left.',
			'dependency' => array('breadcrumb_enable', '==', 'true'),
			'default' => array(
				'top'    => '120',
				'right'  => '0',
				'bottom' => '130',
				'left'   => '0',
				'unit'   => 'px',
			),
		),
	)
));
