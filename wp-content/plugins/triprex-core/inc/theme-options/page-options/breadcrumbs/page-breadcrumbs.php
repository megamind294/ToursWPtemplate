<?php

/*-----------------------------------
    PAGE BARNER SECTION
------------------------------------*/
CSF::createSection(
	$prefix,
	array(
		'title'  => esc_html__('Breadcrumb', 'triprex-core'),
		'parent' => 'page_meta_option',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Breadcrumb Options', 'triprex-core'),
			),
			array(
				'id'      => 'breadcrumb_enable_page',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Breadcrumb', 'triprex-core'),
				'desc'    => wp_kses(__('If you want to <mark>show or hide</mark> page banner you can set here by toggle ( YES / NO ).', 'triprex-core'), wp_kses_allowed_html('post')),
				'default' => true,
			),
			array(
				'id'              => 'breadcrumb_page_bg_image',
				'type'            => 'media',
				'title'           => esc_html__('Breadcrumb Background Image', 'triprex-core'),
				'desc'            => wp_kses(__('Set the <mark>banner background </mark>image', 'triprex-core'), wp_kses_allowed_html('post')),
				'dependency'      => array('breadcrumb_enable_page', '==', 'true'),
			),
			array(
				'id'      		  => 'page_breadcrumb_bg_padding',
				'type'   		  => 'spacing',
				'title'  		  => 'Breadcrumb Background Padding',
				'desc'            => wp_kses(__('Set the spacing values for top, right, bottom, and left <mark>(Please input all values)</mark>', 'triprex-core'), wp_kses_allowed_html('post')),
				'dependency'      => array('breadcrumb_enable_page', '==', 'true'),
			),
		)
	)
);
