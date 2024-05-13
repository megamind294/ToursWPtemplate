<?php

/*-----------------------------------
    PAGE FOOTER SECTION
------------------------------------*/
CSF::createSection(
	$prefix,
	array(
		'title'  => esc_html__('Page Footer', 'triprex-core'),
		'parent' => 'page_meta_option',
		'fields' => array(

			array(
				'type'    => 'subheading',
				'content' => esc_html__('Footer Options', 'triprex-core'),
			),
			array(
				'id'      => 'page_footer_newsletter_enable',
				'title'   => esc_html__('Enable Footer Newsletter', 'triprex-core'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Footer Newsletter Options', 'triprex-core'),  wp_kses_allowed_html('post')),
				'default' => true,
			),
			array(
				'id'      => 'footer_widget_enable',
				'type'    => 'switcher',
				'title'   => esc_html__('Footer Widget Area', 'triprex-core'),
				'desc'    => wp_kses(__('If you want to <mark>show the footer widget area</mark> you can set here by ( YES / NO )', 'triprex-core'), wp_kses_allowed_html('post')),
				'default' => true,
			),
			array(
				'id'              => 'footer_page_bg_image',
				'type'            => 'media',
				'title'           => esc_html__('Footer Background Image', 'triprex-core'),
				'desc'            => wp_kses(__('Set the <mark>footer background </mark>image', 'triprex-core'), wp_kses_allowed_html('post')),
				'dependency'      => array('footer_widget_enable', '==', 'true'),
			),
		)
	)
);
