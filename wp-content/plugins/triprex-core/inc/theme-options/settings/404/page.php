<?php


/*-------------------------------------------------------
		   ** 404 page options
	--------------------------------------------------------*/
CSF::createSection($prefix, array(
	'id'     => '404_page',
	'title'  => esc_html__('404 Page', 'triprex-core'),
	'icon'   => 'fa fa-exclamation-triangle',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('404 Page Options', 'triprex-core') . '</h3>',
		),
		array(
			'id'         => '404_title',
			'title'      => esc_html__('Title', 'triprex-core'),
			'type'       => 'text',
			'info'       => wp_kses(__('you can change <mark>404</mark> text of 404 page', 'triprex-core'), wp_kses_allowed_html('post')),
			'default' 	 => wp_kses(__('404 <span>Error</span>','triprex-core'), wp_kses_allowed_html('post')),

		),
		array(
			'id'         => '404_content',
			'title'      => esc_html__('Subtitle', 'triprex-core'),
			'type'       => 'textarea',
			'info'       => wp_kses(__('you can change <mark>Content</mark> text of 404 page', 'triprex-core'), wp_kses_allowed_html('post')),
			'default' 	 => wp_kses(__('We believe in delivering tailored solutions that are designed to address your turna unique requirements. We take the time to understand.', 'triprex-core','triprex-core'), wp_kses_allowed_html('post')),
		),
		array(
			'id'         => '404_button_text',
			'title'      => esc_html__('Button Text', 'triprex-core'),
			'type'       => 'text',
			'info'       => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'triprex-core'), wp_kses_allowed_html('post')),
			'default'	 => esc_html__('Back To Home', 'triprex-core')
		),

	)
));
