<?php
/*-------------------------------------------------------
		   ** Footer  Options
	--------------------------------------------------------*/
CSF::createSection($prefix, array(
	'title'  => esc_html__('Footer', 'triprex-core'),
	'id'     => 'footer_options',
	'icon'   => 'fa fa-copyright',
	'fields' => array(

		//------------------------- Footer Newsletter Option--------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Footer Newsletter', 'triprex-core') . '</h3>'
		),
		array(
			'id'      => 'footer_newsletter_enable',
			'title'   => esc_html__('Enable Footer Newsletter', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Footer Newsletter Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => true,
		),
		array(
			'id'    => 'footer_newsletter_title',
			'title' => esc_html__('Newsletter Title', 'triprex-core'),
			'desc'  => wp_kses(__('write your <mark>Newsletter Title</mark> here', 'triprex-core'), wp_kses_allowed_html('post')),
			'type'  => 'text',
			'default' => wp_kses(('Join The Newsletter'), wp_kses_allowed_html('post')),
			'dependency' => array('footer_newsletter_enable', '==', 'true'),
		),
		array(
			'id'    => 'footer_newsletter_desc',
			'title' => esc_html__('Newsletter Description', 'triprex-core'),
			'desc'  => wp_kses(__('write your <mark>Newsletter Description</mark> here', 'triprex-core'), wp_kses_allowed_html('post')),
			'type'  => 'text',
			'default' => wp_kses(('To receive our best monthly deals'), wp_kses_allowed_html('post')),
			'dependency' => array('footer_newsletter_enable', '==', 'true'),
		),
		array(
			'id'    => 'footer_newsletter_shortcode',
			'type'  => 'text',
			'title' => esc_html__('Newsletter Shortcode', 'triprex-core'),
			'default' => wp_kses(('[mc4wp_form id=233]'), wp_kses_allowed_html('post')),
			'dependency' => array('footer_newsletter_enable', '==', 'true'),
		),


		//------------------------- Footer Options--------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Footer Options', 'triprex-core') . '</h3>'
		),

		array(
			'id'      => 'footer_widget_area_background_color',
			'type'    => 'color',
			'title'   => 'Footer Background Color',
			'desc'    	=> wp_kses(__('you can select <mark>Footer Background Color </mark> for footer section', 'triprex-core'), wp_kses_allowed_html('post')),
		),
		array(
			'id'      => 'footer_widget_area_background_img',
			'title'   => esc_html__('Footer Background Image', 'triprex-core'),
			'type'    => 'media',
			'desc'    	=> wp_kses(__('you can select <mark>Footer Background Image </mark> for footer section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'	=> array(
				'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-bg.png'),
				'id'          => 'footer-bg',
				'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-bg.png'),
				'alt'         => esc_attr('footer-bg'),
				'title'       => esc_html('footer-bg'),
			),
		),
		//------------------------- Footer Copyright Area Text--------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Footer Copyright Area', 'triprex-core') . '</h3>'
		),

		array(
			'id'    => 'copyright_text',
			'title' => esc_html__('Copyright Area Text', 'triprex-core'),
			'desc'  => wp_kses(__('write your <mark>Footer Copyright Text</mark> here', 'triprex-core'), wp_kses_allowed_html('post')),
			'type'  => 'textarea',
			'default' => wp_kses(('©Copyright 2024 TripRex | Design By <a href="https://www.egenslab.com/">Egens Lab</a>'), wp_kses_allowed_html('post')),
		),

		//------------------------- Footer Social Link--------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Footer Social Links', 'triprex-core') . '</h3>'
		),
		array(
			'id'      => 'footer_social_enable',
			'title'   => esc_html__('Enable Social Links', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Social Links Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => true,
		),
		array(
			'id'     => 'footer_bottom_social',
			'type'   => 'repeater',
			'title'  => esc_html__('Social Links', 'triprex-core'),
			'dependency' => array(
				array('footer_social_enable', '==', 'true'),
			),
			'fields' => array(
				array(
					'id'      => 'footer_social_icon_class',
					'type'    => 'icon',
					'title'   =>  esc_html('Icon Class ( Bootstrap/Box Icon/Font Awesome )'),
					'default' => 'fa fa-heart'
				),
				array(
					'id'    => 'footer_social_icon_url',
					'type'  => 'link',
					'title' => esc_html__('Social Link', 'triprex-core'),
					'default'  => array(
						'url'    => '#',
						'target' => '_blank'
					),
				),
			),
			'default'   => array(
				array(
					'footer_social_icon_url' => array(
						'url'   => esc_url('https://www.facebook.com/'),
						'target' => '_blank'
					),
					'footer_social_icon_class' => 'fab fa-facebook-f',
				),
				array(
					'footer_social_icon_url' => array(
						'url'   => esc_url('https://twitter.com/'),
						'target' => '_blank'
					),
					'footer_social_icon_class' => 'fab fa-twitter',
				),
				array(
					'footer_social_icon_url' => array(
						'url'   => esc_url('https://www.linkedin.com/'),
						'target' => '_blank'
					),
					'footer_social_icon_class' => 'fab fa-linkedin-in',
				),
				array(
					'footer_social_icon_url' => array(
						'url'   => esc_url('https://www.instagram.com/'),
						'target' => '_blank'
					),
					'footer_social_icon_class' => 'fab fa-instagram',
				),
			)
		),

		//------------------------- Footer Privacy Area--------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Footer Privacy Area', 'triprex-core') . '</h3>'
		),
		array(
			'id'      => 'footer_privacy_area_enable',
			'title'   => esc_html__('Enable Privacy Area', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Privacy Area Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => true,
		),
		array(
			'id'     => 'footer_privacy_area',
			'type'   => 'repeater',
			'title'  => esc_html__('Privacy Area Lists', 'triprex-core'),
			'dependency' => array(
				array('footer_privacy_area_enable', '==', 'true'),
			),
			'fields' => array(
				array(
					'id'      => 'footer_privacy_area_txt',
					'type'    => 'text',
					'title'   =>  esc_html('Text'),
					'default' => 'Privacy Policy'
				),
				array(
					'id'    => 'footer_privacy_area_url',
					'type'  => 'link',
					'title' => esc_html__('Link', 'triprex-core'),
					'default'  => array(
						'url'    => '#',
						'target' => '_blank'
					),
				),
			),
			'default'   => array(
				array(
					'footer_privacy_area_url' => array(
						'url'   => esc_url('#'),
						'target' => '_blank'
					),
					'footer_privacy_area_txt' => 'Privacy Policy',
				),
				array(
					'footer_privacy_area_url' => array(
						'url'   => esc_url('#'),
						'target' => '_blank'
					),
					'footer_privacy_area_txt' => 'Terms & Condition',
				),
			)
		),

	)
));
