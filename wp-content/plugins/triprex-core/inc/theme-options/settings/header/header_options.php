<?php
/*-----------------------------------
		Header Options
	------------------------------------*/

CSF::createSection($prefix, array(
	'parent' => 'header_options',
	'title'  => esc_html__('Header Options', 'triprex-core'),
	'id'     => 'theme_header_options',
	'icon'   => 'fa fa-id-card-o',
	'fields' => array(

		//------------------------- Header Topbar Options --------------------------//
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Topbar Options ', 'triprex-core') . '</h3>',

		),
		array(
			'id'      => 'header_topbar_enable',
			'title'   => esc_html__('Enable Topbar ', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to enable/disable topbar section', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => true,
		),
		//Contact Info
		array(
			'type'    => 'subheading',
			'content' => '<h4>' . esc_html__('Contact Info', 'triprex-core') . '</h4>',
			'dependency' => array(
				array('header_topbar_enable', '==', 'true'),
			),
		),
		// Header Topbar Contact Info Show Hide 
		array(
			'id'         => 'header_topbar_contact_info_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Topbar Contact Info', 'triprex-core'),
			'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Contact Info options', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_topbar_enable', '==', 'true'),
			),
		),

		array(
			'id'      => 'header_top_contact_info',
			'type'    => 'repeater',
			'title'   => esc_html__('Contact Information', 'triprex-core'),
			'dependency' => array(
				array('header_topbar_enable', '==', 'true'),
				array('header_topbar_contact_info_show', '==', '1'),
			),
			'fields' => array(
				array(
					'id'      => 'contact_top_type',
					'type'    => 'radio',
					'title'   => esc_html__('Contact Type', 'triprex-core'),
					'options' => array(
						'phone'  => esc_html('Phone'),
						'email'  => esc_html('Email'),
						'others' => esc_html('Others'),
					),
					'default' => 'phone',
				),
				// Fields for phone contact type
				array(
					'id'         => 'phone_top_icon_svg',
					'type'       => 'media',
					'title'      => esc_html__('Icon (SVG) for Phone', 'triprex-core'),
					'dependency' => array('contact_top_type', '==', 'phone'),
				),
				array(
					'id'         => 'phone_top_info_text',
					'type'       => 'text',
					'title'      => esc_html__('Contact Info Text for Phone', 'triprex-core'),
					'default'    => esc_html__('Phone:', 'triprex-core'),
					'dependency' => array('contact_top_type', '==', 'phone'),
				),
				array(
					'id'         => 'phone_top_info',
					'type'       => 'text',
					'title'      => esc_html__('Phone Number', 'triprex-core'),
					'default'    => esc_html__('+91 656 786 53', 'triprex-core'),
					'dependency' => array('contact_top_type', '==', 'phone'),
				),
				// Fields for email contact type
				array(
					'id'         => 'email_top_icon_svg',
					'type'       => 'media',
					'title'      => esc_html__('Icon (SVG) for Email', 'triprex-core'),
					'dependency' => array('contact_top_type', '==', 'email'),
				),
				array(
					'id'         => 'email_top_info_text',
					'type'       => 'text',
					'title'      => esc_html__('Contact Info Text for Email', 'triprex-core'),
					'default'    => esc_html__('Email:', 'triprex-core'),
					'dependency' => array('contact_top_type', '==', 'email'),
				),
				array(
					'id'         => 'email_top_info',
					'type'       => 'text',
					'title'      => esc_html__('Email Address', 'triprex-core'),
					'default'    => esc_html__('info@example.com', 'triprex-core'),
					'dependency' => array('contact_top_type', '==', 'email'),
				),
				// Fields for others contact type
				array(
					'id'         => 'custom_top_icon_svg',
					'type'       => 'media',
					'title'      => esc_html__('Icon (SVG) for Others', 'triprex-core'),
					'dependency' => array('contact_top_type', '==', 'others'),
				),
				array(
					'id'         => 'custom_top_info_txt',
					'type'       => 'text',
					'title'      => esc_html__('Custom Info Text', 'triprex-core'),
					'dependency' => array('contact_top_type', '==', 'others'),
				),
				array(
					'id'         => 'custom_top_info',
					'type'       => 'text',
					'title'      => esc_html__('Custom Information', 'triprex-core'),
					'dependency' => array('contact_top_type', '==', 'others'),
				),
			),
			'default' => array(
				array(
					'contact_top_type' => 'email',
					'phone_top_icon_svg' => array(
						'url' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-top-icon.svg'),
						'id' => 'phone_icon',
						'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-top-icon.svg'),
						'alt' => esc_attr('content-icons'),
						'title' => esc_html('Icon'),
					),
					'phone_top_info_text' => esc_html__('Phone:', 'triprex-core'),
					'phone_top_info' => esc_html__('+91 656 786 53', 'triprex-core'),

					'email_top_icon_svg' => array(
						'url' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-top-icon.svg'),
						'id' => 'email_icon',
						'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-top-icon.svg'),
						'alt' => esc_attr('content-icons'),
						'title' => esc_html('Icon'),
					),
					'email_top_info_text' => esc_html__('Email:', 'triprex-core'),
					'email_top_info' => esc_html__('info@example.com', 'triprex-core'),
				),
			),
		),


		//------------------------- Promotional Message --------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h4>' . esc_html__('Promotional Message', 'triprex-core') . '</h4>',
			'dependency' => array(
				array('header_topbar_enable', '==', 'true'),
			),
		),
		// Promotional Message Show Hide 
		array(
			'id'         => 'promotional_msg_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Promotional Message', 'triprex-core'),
			'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Promotional Message options', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_topbar_enable', '==', 'true'),
			),
		),
		array(
			'id'         => 'promotional_msg',
			'type'       => 'textarea',
			'title'      => esc_html__('Message', 'triprex-core'),
			'default' 	 => wp_kses(__('50% Off Your Next Trip. Hurry Up For your new Tour! <a href="/tour">Book Your Tour</a>', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_topbar_enable', '==', 'true'),
				array('promotional_msg_show', '==', '1'),
			),
		),

		//------------------------- Topbar Social Link --------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h4>' . esc_html__('Social Links', 'triprex-core') . '</h4>',
			'dependency' => array(
				array('header_topbar_enable', '==', 'true'),
			),
		),
		array(
			'id'      => 'topbar_social_enable',
			'title'   => esc_html__('Enable Social Links', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to enable/disable Social Links Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => true,
			'dependency' => array(
				array('header_topbar_enable', '==', 'true'),
			),
		),
		array(
			'id'     => 'topbar_bottom_social',
			'type'   => 'repeater',
			'title'  => esc_html__('Social Link Lists', 'triprex-core'),
			'dependency' => array(
				array('header_topbar_enable', '==', 'true'),
				array('topbar_social_enable', '==', 'true'),
			),
			'fields' => array(
				array(
					'id'    => 'topbar_social_icon_url',
					'type'  => 'link',
					'title' => esc_html__('Social Link', 'triprex-core'),
				),
				array(
					'id'    => 'topbar_social_icon_class',
					'type'  => 'text',
					'title' => esc_html('Icon Class ( Bootstrap/Box Icon/Font Awesome )'),
				),
			),
			'default'   => array(
				array(
					'topbar_social_icon_url' => array(
						'url'   => esc_url('https://www.facebook.com/'),
						'target' => '_blank'
					),
					'topbar_social_icon_class' => 'bx bxl-facebook',
				),
				array(
					'topbar_social_icon_url' => array(
						'url'   => esc_url('https://twitter.com/'),
						'target' => '_blank'
					),
					'topbar_social_icon_class' => 'bx bxl-twitter',
				),
				array(
					'topbar_social_icon_url' => array(
						'url'   => esc_url('https://www.pinterest.com/'),
						'target' => '_blank'
					),
					'topbar_social_icon_class' => 'bx bxl-pinterest-alt',
				),
				array(
					'topbar_social_icon_url' => array(
						'url'   => esc_url('https://www.instagram.com/'),
						'target' => '_blank'
					),
					'topbar_social_icon_class' => 'bx bxl-instagram',
				),
			)
		),

		//------------------------- Header Options --------------------------//
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Options ', 'triprex-core') . '</h3>',

		),
		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_signin_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Options', 'triprex-core'),
			'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide SignIn/SignUp options', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
		),
		//Contact Info
		array(
			'type'    => 'subheading',
			'content' => '<h4>' . esc_html__('Header Contact Info', 'triprex-core') . '</h4>',
		),
		// Header Topbar Contact Info Show Hide 
		array(
			'id'         => 'header_contact_info_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Contact Info', 'triprex-core'),
			'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Contact Info options', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
		),

		array(
			'id'      => 'header_contact_info',
			'type'    => 'repeater',
			'title'   => esc_html__('Header Contact Information', 'triprex-core'),
			'dependency' => array(
				array('header_contact_info_show', '==', '1'),
			),
			'fields' => array(
				array(
					'id'      => 'contact_type',
					'type'    => 'radio',
					'title'   => esc_html__('Contact Type', 'triprex-core'),
					'options' => array(
						'phone'  => esc_html('Phone'),
						'email'  => esc_html('Email'),
						'others' => esc_html('Others'),
					),
					'default' => 'phone',
				),
				array(
					'id'         => 'phone_icon_svg',
					'type'       => 'media',
					'title'      => esc_html__('Icon (SVG)', 'triprex-core'),
					'dependency' => array(
						array('contact_type', '==', 'phone'),
					),
				),
				array(
					'id'         => 'phone_info_text',
					'type'       => 'text',
					'title'      => esc_html__('Contact Info Text', 'triprex-core'),
					'default' => esc_html__('To More Inquiry', 'triprex-core'),
					'dependency' => array(
						array('contact_type', '==', 'phone'),
					),
				),
				array(
					'id'         => 'phone_info',
					'type'       => 'text',
					'title'      => esc_html__('Phone Number', 'triprex-core'),
					'default' => esc_html__('+91 656 786 53', 'triprex-core'),
					'dependency' => array(
						array('contact_type', '==', 'phone'),
					),
				),
				array(
					'id'         => 'email_icon_svg',
					'type'       => 'media',
					'title'      => esc_html__('Icon (SVG)', 'triprex-core'),
					'dependency' => array(
						array('contact_type', '==', 'email'),
					),
				),
				array(
					'id'         => 'email_info_text',
					'type'       => 'text',
					'default' => esc_html__('Email:', 'triprex-core'),
					'title'      => esc_html__('Contact Info Text', 'triprex-core'),
					'dependency' => array(
						array('contact_type', '==', 'email'),
					),
				),
				array(
					'id'         => 'email_info',
					'type'       => 'text',
					'title'      => esc_html__('Email Address', 'triprex-core'),
					'default' => esc_html__('info@example.com', 'triprex-core'),
					'dependency' => array(
						array('contact_type', '==', 'email'),
					),
				),
				array(
					'id'         => 'custom_icon_svg',
					'type'       => 'media',
					'title'      => esc_html__('Icon (SVG)', 'triprex-core'),
					'dependency' => array(
						array('contact_type', '==', 'others'),
					),
				),
				array(
					'id'         => 'custom_info_text',
					'type'       => 'text',
					'title'      => esc_html__('Custom Info Text', 'triprex-core'),
					'dependency' => array(
						array('contact_type', '==', 'others'),
					),
				),
				array(
					'id'         => 'custom_info',
					'type'       => 'text',
					'title'      => esc_html__('Custom Information', 'triprex-core'),
					'dependency' => array(
						array('contact_type', '==', 'others'),
					),
				),
			),
			'default' => array(
				array(
					'contact_type' => 'phone',
					'phone_icon_svg' => array(
						'url' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
						'id' => 'phone_icon',
						'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
						'alt' => esc_attr('content-icons'),
						'title' => esc_html('Icon'),
					),
					'phone_info_text' => esc_html__('To More Inquiry', 'triprex-core'),
					'phone_info' => esc_html__('+990-737 621 432', 'triprex-core'),

					'email_icon_svg' => array(
						'url' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-icon.svg'),
						'id' => 'email_icon',
						'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-icon.svg'),
						'alt' => esc_attr('content-icons'),
						'title' => esc_html('Icon'),
					),
					'email_info_text' => esc_html__('To More Inquiry', 'triprex-core'),
					'email_info' => esc_html__('info@example.com', 'triprex-core'),
				),
			),
		),

		//------------------------- Button Options --------------------------//
		array(
			'type'    		=> 'subheading',
			'content' 		=> '<h4>' . esc_html__('Header Button Options', 'triprex-core') . '</h4>',
		),
		array(
			'id'      => 'header_button_enable',
			'title'   => esc_html__('Enable Button', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to enable/disable Button Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => true,
		),
		array(
			'id'    		=> 'header_button_text',
			'type'  		=> 'text',
			'title'   		=> esc_html__('Button Label', 'triprex-core'),
			'default' 		=> esc_html__('Book A Trip', 'triprex-core'),
			'desc'    => wp_kses(__('write your <mark>Button Label</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_button_enable',   '==', '1'),
			),
		),
		array(
			'id'    		=> 'header_button_link',
			'type'  		=> 'link',
			'title'   		=> esc_html__('Button Link', 'triprex-core'),
			'desc'    => wp_kses(__('add your <mark>Button Link</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'target' => '_blank',
			'dependency' => array(
				array('header_button_enable',   '==', '1'),
			),
		),

		//------------------------- Header Sidebar Options --------------------------//
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Sidebar Options ', 'triprex-core') . '</h3>',
		),
		// Sidebar Show Hide 
		array(
			'id'         => 'header_sidebar_icon_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Sidebar Options', 'triprex-core'),
			'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Sidebar options', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
		),
		// Sidebar Background Image
		array(
			'id'      => 'sidebar_area_bg_img',
			'title'   => esc_html__('Sidebar Background Image', 'triprex-core'),
			'type'    => 'media',
			'desc'    	=> wp_kses(__('you can select <mark>Sidebar Background Image </mark> for sidebar section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'	=> array(
				'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/h-sidebar-bg.png'),
				'id'          => 'h-sidebar-bg',
				'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/h-sidebar-bg.png'),
				'alt'         => esc_attr('h-sidebar-bg'),
				'title'       => esc_html('h-sidebar-bg'),
			),
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
			),
		),
		// Sidebar Background Color
		array(
			'id'      => 'sidebar_area_bg_color',
			'type'    => 'color',
			'title'   => 'Sidebar Background Color',
			'desc'    	=> wp_kses(__('you can select <mark>Sidebar Background Color </mark> for sidebar section', 'triprex-core'), wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
			),
		),
		array(
			'type'       => 'subheading',
			'content'    => '<h4>' . esc_html__('Sidebar Logo Image Options ', 'triprex-core') . '</h4>',
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
			),
		),
		// Sidebar Logo Image
		array(
			'id'         => 'header_sidebar_logo_img_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Sidebar Logo Image', 'triprex-core'),
			'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Sidebar Logo Image', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
			),
		),
		array(
			'id'         => 'header_sidebar_logo_img',
			'type'       => 'media',
			'title'      => esc_html__('Sidebar Logo Image', 'triprex-core'),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/sidebar-logo.svg'),
				'id'        => 'sidebar_logo',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/sidebar-logo.svg'),
				'alt'       => esc_attr('sidebar-logo'),
				'title'     => esc_html('Sidebar Logo'),
			),
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
				array('header_sidebar_logo_img_show',   '==', '1'),
			),
		),
		array(
			'id'    		=> 'header_sidebar_logo_link',
			'type'  		=> 'link',
			'title'   		=> esc_html__('Logo Link', 'triprex-core'),
			'desc'    => wp_kses(__('add your <mark>Logo Link</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'target' => '_blank',
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
				array('header_sidebar_logo_img_show',   '==', '1'),
			),
		),
		//------------------------- Sidebar Tour Type Options --------------------------//
		array(
			'type'    		=> 'subheading',
			'content' 		=> '<h4>' . esc_html__('Sidebar Tour Type Options', 'triprex-core') . '</h4>',
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
			),
		),
		array(
			'id'      => 'header_sidebar_tour_type_options',
			'title'   => esc_html__('Show Tour Type Area', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Tour Type Area', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => true,
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
			),
		),
		array(
			'id'    => 'max_tour_types',
			'type'  => 'text',
			'title' => 'Max Tour Types',
			'desc'    => wp_kses(__('Enter the <mark>maximum number</mark> of tour types to display.', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => '6',
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
				array('header_sidebar_tour_type_options',  '==', '1'),
			),
		),
		//------------------------- Sidebar Destination Options --------------------------//
		array(
			'type'    		=> 'subheading',
			'content' 		=> '<h4>' . esc_html__('Sidebar Destination Options', 'triprex-core') . '</h4>',
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
			),
		),
		array(
			'id'      => 'header_sidebar_destination_options',
			'title'   => esc_html__('Show Destination Area', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Destination Area', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => true,
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
			),
		),
		array(
			'id'    => 'sidebar_destination_num_of_post',
			'type'  => 'number',
			'title' => 'Number of Posts',
			'desc'    => wp_kses(__('Enter the <mark>maximum number</mark> of posts to display.', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => 5,
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
				array('header_sidebar_destination_options',  '==', '1'),
			),
		),
		array(
			'id'    => 'sidebar_destination_order',
			'type'  => 'text',
			'title' => 'Posts Order',
			'desc'    => wp_kses(__('Enter the <mark>order</mark> of posts to display.', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => 'DESC',
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
				array('header_sidebar_destination_options',  '==', '1'),
			),
		),
		//------------------------- Sidebar Button Options --------------------------//
		array(
			'type'    		=> 'subheading',
			'content' 		=> '<h4>' . esc_html__('Sidebar Button Options', 'triprex-core') . '</h4>',
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
				array('header_sidebar_destination_options',  '==', '1'),
			),
		),
		array(
			'id'      => 'header_sidebar_button_enable',
			'title'   => esc_html__('Enable Button', 'triprex-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to enable/disable Button Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default' => true,
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
				array('header_sidebar_destination_options',  '==', '1'),
			),
		),
		array(
			'id'    		=> 'header_sidebar_button_text',
			'type'  		=> 'text',
			'title'   		=> esc_html__('Button Label', 'triprex-core'),
			'default' 		=> esc_html__('View All', 'triprex-core'),
			'desc'    => wp_kses(__('write your <mark>Button Label</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
				array('header_sidebar_button_enable',   '==', '1'),
				array('header_sidebar_destination_options',   '==', '1'),
			),
		),
		array(
			'id'    		=> 'header_sidebar_button_link',
			'type'  		=> 'link',
			'default'  => array(
				'url'    => '/destination',
				'target' => '_blank'
			),
			'title'   		=> esc_html__('Button Link', 'triprex-core'),
			'desc'    => wp_kses(__('add your <mark>Button Link</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'target' => '_blank',
			'dependency' => array(
				array('header_sidebar_icon_show',  '==', '1'),
				array('header_sidebar_button_enable',   '==', '1'),
				array('header_sidebar_destination_options',   '==', '1'),
			),
		),

		// Sidebar Contact Info
		array(
			'type'      => 'subheading',
			'content'   => '<h4>' . esc_html__('Sidebar Contact Info', 'triprex-core') . '</h4>',
			'dependency' => array(
				array('header_sidebar_icon_show', '==', '1'),
			),
		),

		// Header Sidebar Contact Info Show Hide 
		array(
			'id'         => 'header_sidebar_contact_info_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Show Sidebar Contact Info', 'triprex-core'),
			'desc'       => wp_kses(__('You can set <mark>On / Off</mark> to show/hide Sidebar Contact Info options', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_sidebar_icon_show', '==', '1'),
			),
		),

		array(
			'id'         => 'header_sidebar_contact_info',
			'type'       => 'repeater',
			'title'      => esc_html__('Header Sidebar Contact Information', 'triprex-core'),
			'dependency' => array(
				array('header_sidebar_icon_show', '==', '1'),
				array('header_sidebar_contact_info_show', '==', '1'),
			),
			'fields'     => array(
				array(
					'id'      => 'contact_sidebar_type',
					'type'    => 'radio',
					'title'   => esc_html__('Contact Type', 'triprex-core'),
					'options' => array(
						'phone'  => esc_html('Phone'),
						'email'  => esc_html('Email'),
						'others' => esc_html('Others'),
					),
					'default' => 'phone',
				),
				// Fields for phone contact type
				array(
					'id'         => 'phone_sidebar_icon_svg',
					'type'       => 'media',
					'title'      => esc_html__('Icon (SVG) for Phone', 'triprex-core'),
					'dependency' => array('contact_sidebar_type', '==', 'phone'),
				),
				array(
					'id'         => 'phone_sidebar_info_text',
					'type'       => 'text',
					'title'      => esc_html__('Contact Info Text for Phone', 'triprex-core'),
					'default'    => esc_html__('To More Inquiry', 'triprex-core'),
					'dependency' => array('contact_sidebar_type', '==', 'phone'),
				),
				array(
					'id'         => 'phone_sidebar_info',
					'type'       => 'text',
					'title'      => esc_html__('Phone Number', 'triprex-core'),
					'default'    => esc_html__('+990-737 621 432', 'triprex-core'),
					'dependency' => array('contact_sidebar_type', '==', 'phone'),
				),
				// Fields for email contact type
				array(
					'id'         => 'email_sidebar_icon_svg',
					'type'       => 'media',
					'title'      => esc_html__('Icon (SVG) for Email', 'triprex-core'),
					'dependency' => array('contact_sidebar_type', '==', 'email'),
				),
				array(
					'id'         => 'email_sidebar_info_text',
					'type'       => 'text',
					'title'      => esc_html__('Contact Info Text for Email', 'triprex-core'),
					'default'    => esc_html__('Email:', 'triprex-core'),
					'dependency' => array('contact_sidebar_type', '==', 'email'),
				),
				array(
					'id'         => 'email_sidebar_info',
					'type'       => 'text',
					'title'      => esc_html__('Email Address', 'triprex-core'),
					'default'    => esc_html__('info@example.com', 'triprex-core'),
					'dependency' => array('contact_sidebar_type', '==', 'email'),
				),
				// Fields for Others contact type
				array(
					'id'         => 'custom_sidebar_icon_svg',
					'type'       => 'media',
					'title'      => esc_html__('Icon (SVG) for Custom', 'triprex-core'),
					'dependency' => array('contact_sidebar_type', '==', 'others'),
				),
				array(
					'id'         => 'custom_sidebar_info_text',
					'type'       => 'text',
					'title'      => esc_html__('Custom Info Text', 'triprex-core'),
					'default'    => esc_html__('others:', 'triprex-core'),
					'dependency' => array('contact_sidebar_type', '==', 'others'),
				),
				array(
					'id'         => 'custom_sidebar_info',
					'type'       => 'text',
					'title'      => esc_html__('Custom Address', 'triprex-core'),
					'default'    => esc_html__('info@example.com', 'triprex-core'),
					'dependency' => array('contact_sidebar_type', '==', 'others'),
				),
			),
			'default'    => array(
				array(
					'contact_sidebar_type'    => 'phone',
					'phone_sidebar_icon_svg' => array(
						'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
						'id'        => 'phone_icon',
						'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
						'alt'       => esc_attr('content-icons'),
						'title'     => esc_html('Icon'),
					),
					'phone_sidebar_info_text' => esc_html__('To More Inquiry', 'triprex-core'),
					'phone_sidebar_info'      => esc_html__('+990-737 621 432', 'triprex-core'),
				),
				array(
					'contact_sidebar_type'    => 'email',
					'email_sidebar_icon_svg' => array(
						'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-top-icon.svg'),
						'id'        => 'email_icon',
						'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-top-icon.svg'),
						'alt'       => esc_attr('content-icons'),
						'title'     => esc_html('Icon'),
					),
					'email_sidebar_info_text' => esc_html__('Email:', 'triprex-core'),
					'email_sidebar_info'      => esc_html__('info@example.com', 'triprex-core'),
				),
			),
		),















		// -------------------------------------------------------------------

		// Search show Hide 
		array(
			'id'         => 'header_search_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Search', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),

		// Sell show Hide 
		array(
			'id'         => 'header_sell_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Sell Button', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'         => 'header_sell_label',
			'type'       => 'text',
			'title'      => esc_html__('Sell Button Label', 'triprex-core'),
			'default'    => esc_html__('SELL WITH US', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_sell_show',  '==|==', 'header_one|true'),
			),
		),
		array(
			'id'          => 'header_sell_form',
			'type'        => 'textarea',
			'title'       => esc_html__('Add Sell Form Shortcode', 'triprex-core'),
			'placeholder' => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'default'     => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'dependency'  => array(
				array('header_menu_style|header_sell_show',  '==|==', 'header_one|true'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Button Search', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'         => 'header_wishlist_label',
			'type'       => 'text',
			'title'      => esc_html__('Wishlist Button Label', 'triprex-core'),
			'default'    => esc_html__('SAVE', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_wishlist_show',  '==|==', 'header_one|true'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Button', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'         => 'header_signIn_label',
			'type'       => 'text',
			'title'      => esc_html__('SignIn/SignUp Button Label', 'triprex-core'),
			'default'    => esc_html__('Sign Up', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_signIn_show',  '==|==', 'header_one|true'),
			),
		),


		//Cart Button Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Cart & Contact Options', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),

		// Cart show Hide 
		array(
			'id'         => 'header_cart_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Mini Cart', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark> Mini Cart </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'         => 'header_cart_label',
			'type'       => 'text',
			'title'      => esc_html__('Mini Cart Label', 'triprex-core'),
			'default'    => esc_html__('Cart', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_cart_show',  '==|==', 'header_one|true'),
			),
		),

		// Button Enabel
		array(
			'id'         => 'header_one_button_enable',
			'title'      => esc_html__('Enable Contact', 'triprex-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'      => 'header_one_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'triprex-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
				array('header_one_button_enable',   '==', '1'),
			),

		),
		array(
			'id'         => 'header_one_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
				array('header_one_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_one_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'triprex-core'),
			'default'    => esc_html__('To More Inquiry', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
				array('header_one_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_one_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'triprex-core'),
			'default'    => esc_html__('+990-737 621 432', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
				array('header_one_button_enable',   '==', '1'),
			),
		),


		/*************************** Header Two *************************/

		// Header Top Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Top Options ', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Search show Hide 
		array(
			'id'         => 'header_two_search_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Search', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Enquery Button Hide 
		array(
			'id'         => 'header_two_button_enable',
			'title'      => esc_html__('Enable Contact', 'triprex-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'      => 'header_two_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'triprex-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_two_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_two_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'triprex-core'),
			'default'    => esc_html__('To More Inquiry', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_two_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'triprex-core'),
			'default'    => esc_html__('+990-737 621 432', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_button_enable',   '==', '1'),
			),
		),
		/*************************** Header Two *************************/

		// Header Sidebar Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Sidebar Options ', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		// Enquery Button Hide 
		array(
			'id'         => 'header_two_sidebar_button_enable',
			'title'      => esc_html__('Enable Contact', 'triprex-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'      => 'header_two_sidebar_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'triprex-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_sidebar_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_two_sidebar_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_sidebar_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_two_sidebar_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'triprex-core'),
			'default'    => esc_html__('To More Inquiry', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_sidebar_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_two_sidebar_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'triprex-core'),
			'default'    => esc_html__('+990-737 621 432', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_sidebar_button_enable',   '==', '1'),
			),
		),
		// Header Bottom Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Bottom Options ', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Slide Menu show Hide 
		array(
			'id'         => 'header_two_menu_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Slide Menu', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Mega Menu show Hide 
		array(
			'id'         => 'header_two_mega_menu_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Mega Menu', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		//Cart Button Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Cart & Button Options', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Cart show Hide 
		array(
			'id'         => 'header_two_cart_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Mini Cart', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark> Mini Cart </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'         => 'header_two_cart_label',
			'type'       => 'text',
			'title'      => esc_html__('Mini Cart Label', 'triprex-core'),
			'default'    => esc_html__('Cart', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_two_cart_show',  '==|==', 'header_two|true'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_two_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Button Search', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'         => 'header_two_wishlist_label',
			'type'       => 'text',
			'title'      => esc_html__('Wishlist Button Label', 'triprex-core'),
			'default'    => esc_html__('SAVE', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_two_wishlist_show',  '==|==', 'header_two|true'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_two_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Button', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'         => 'header_two_signIn_label',
			'type'       => 'text',
			'title'      => esc_html__('SignIn/SignUp Button Label', 'triprex-core'),
			'default'    => esc_html__('Sign Up', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_two_signIn_show',  '==|==', 'header_two|true'),
			),
		),



		/*************************** Header Three *************************/

		// Header Top Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Top Options ', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),

		// Search show Hide 
		array(
			'id'         => 'header_three_search_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Small Device Search', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_three_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Button Search', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),
		array(
			'id'         => 'header_three_wishlist_label',
			'type'       => 'text',
			'title'      => esc_html__('Wishlist Button Label', 'triprex-core'),
			'default'    => esc_html__('SAVE', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_three_wishlist_show',  '==|==', 'header_three|true'),
			),
		),

		// Sell show Hide 
		array(
			'id'         => 'header_three_sell_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Sell Button', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),
		array(
			'id'         => 'header_three_sell_label',
			'type'       => 'text',
			'title'      => esc_html__('Sell Button Label', 'triprex-core'),
			'default'    => esc_html__('SELL WITH US', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_three_sell_show',  '==|==', 'header_three|true'),
			),
		),
		array(
			'id'          => 'header_three_sell_form',
			'type'        => 'textarea',
			'title'       => esc_html__('Add Sell Form Shortcode', 'triprex-core'),
			'placeholder' => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'default'     => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'dependency'  => array(
				array('header_menu_style|header_three_sell_show',  '==|==', 'header_three|true'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_three_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Button', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),
		array(
			'id'         => 'header_three_signIn_label',
			'type'       => 'text',
			'title'      => esc_html__('SignIn/SignUp Button Label', 'triprex-core'),
			'default'    => esc_html__('Sign Up', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_three_signIn_show',  '==|==', 'header_three|true'),
			),
		),

		//Header Bottom Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Bottom Options', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),

		// Search Filter show Hide 
		array(
			'id'         => 'header_three_search_filter_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Search Filter', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),

		// Enquery Button show Hide 
		array(
			'id'         => 'header_three_button_enable',
			'title'      => esc_html__('Enable Contact', 'triprex-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),
		array(
			'id'      => 'header_three_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'triprex-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
				array('header_three_button_enable',   '==', '1'),
			),

		),
		array(
			'id'         => 'header_three_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
				array('header_three_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_three_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'triprex-core'),
			'default'    => esc_html__('To More Inquiry', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
				array('header_three_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_three_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'triprex-core'),
			'default'    => esc_html__('+990-737 621 432', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
				array('header_three_button_enable',   '==', '1'),
			),
		),



		/*************************** Header Four *************************/

		// Header Top Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Top Options ', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// Slide Menu show Hide 
		array(
			'id'         => 'header_four_menu_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Slide Menu', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// Search show Hide 
		array(
			'id'         => 'header_four_search_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Search Icon', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_four_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Icon', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_four_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Icon', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// Enquery Button show Hide 
		array(
			'id'         => 'header_four_button_enable',
			'title'      => esc_html__('Enable Contact', 'triprex-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),
		array(
			'id'      => 'header_four_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'triprex-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_button_enable',   '==', '1'),
			),

		),
		array(
			'id'         => 'header_four_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_four_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'triprex-core'),
			'default'    => esc_html__('To More Inquiry', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_four_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'triprex-core'),
			'default'    => esc_html__('+990-737 621 432', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_button_enable',   '==', '1'),
			),
		),
		/*************************** Header Four *************************/

		// Header Sidebar Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Sidebar Options ', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),

			),
		),
		// Enquery Button Hide 
		array(
			'id'         => 'header_four_sidebar_button_enable',
			'title'      => esc_html__('Enable Contact', 'triprex-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),
		array(
			'id'      => 'header_four_sidebar_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'triprex-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_sidebar_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_four_sidebar_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_sidebar_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_four_sidebar_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'triprex-core'),
			'default'    => esc_html__('To More Inquiry', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_sidebar_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_four_sidebar_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'triprex-core'),
			'default'    => esc_html__('+990-737 621 432', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_sidebar_button_enable',   '==', '1'),
			),
		),


		/*************************** Header Five *************************/


		// Header Top Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Top Options ', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_five_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Button Search', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'         => 'header_five_wishlist_label',
			'type'       => 'text',
			'title'      => esc_html__('Wishlist Button Label', 'triprex-core'),
			'default'    => esc_html__('SAVE', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_five_wishlist_show',  '==|==', 'header_five|true'),
			),
		),

		// Sell show Hide 
		array(
			'id'         => 'header_five_sell_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Sell Button', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'         => 'header_five_sell_label',
			'type'       => 'text',
			'title'      => esc_html__('Sell Button Label', 'triprex-core'),
			'default'    => esc_html__('SELL WITH US', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_five_sell_show',  '==|==', 'header_five|true'),
			),
		),

		array(
			'id'          => 'header_five_sell_form',
			'type'        => 'textarea',
			'title'       => esc_html__('Add Sell Form Shortcode', 'triprex-core'),
			'placeholder' => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'default'     => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'dependency'  => array(
				array('header_menu_style|header_five_sell_show',  '==|==', 'header_five|true'),
			),
		),

		// Enquery Button show Hide 
		array(
			'id'         => 'header_five_button_enable',
			'title'      => esc_html__('Enable Contact', 'triprex-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'triprex-core'),  wp_kses_allowed_html('post')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'      => 'header_five_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'triprex-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
				array('header_five_button_enable',   '==', '1'),
			),

		),
		array(
			'id'         => 'header_five_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
				array('header_five_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_five_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'triprex-core'),
			'default'    => esc_html__('To More Inquiry', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
				array('header_five_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_five_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'triprex-core'),
			'default'    => esc_html__('+990-737 621 432', 'triprex-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
				array('header_five_button_enable',   '==', '1'),
			),
		),


		// Header Bottom Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Bottom Options ', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),


		//Cart Button Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Cart & Login Options', 'triprex-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_five_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Button', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'         => 'header_five_signIn_label',
			'type'       => 'text',
			'title'      => esc_html__('SignIn/SignUp Button Label', 'triprex-core'),
			'default'    => esc_html__('Sign Up', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_five_signIn_show',  '==|==', 'header_five|true'),
			),
		),

		// Cart show Hide 
		array(
			'id'         => 'header_five_cart_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Mini Cart', 'triprex-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark> Mini Cart </mark> from header section', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'         => 'header_five_cart_label',
			'type'       => 'text',
			'title'      => esc_html__('Mini Cart Label', 'triprex-core'),
			'default'    => esc_html__('Cart', 'triprex-core'),
			'dependency' => array(
				array('header_menu_style|header_five_cart_show',  '==|==', 'header_five|true'),
			),
		),

		// Header Color options 
		// array(
		// 	'type'    => 'subheading',
		// 	'content' => '<h3>' . esc_html__('Header Elements Color ', 'triprex-core') . '</h3>',
		// ),
		// array(
		// 	'id'               => 'header_menu_color',
		// 	'type'             => 'color',
		// 	'title'            => esc_html__('Menu Color', 'triprex-core'),
		// 	'output_important' => true,
		// ),
		// array(
		// 	'id'               => 'header_menu_hover_color',
		// 	'type'             => 'color',
		// 	'title'            => esc_html__('Menu Hover & Active Color', 'triprex-core'),
		// 	'output_important' => true,
		// ),
		// array(
		// 	'id'               => 'header_others_color',
		// 	'type'             => 'color',
		// 	'title'            => esc_html__('Other Element Color', 'triprex-core'),
		// 	'output_important' => true,
		// ),
	),

));
