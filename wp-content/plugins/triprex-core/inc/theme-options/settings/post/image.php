<?php

/*------------------------
	Meta Id For Image
-------------------------*/
$image_prefix = '_egns_image';

/*-----------------------------------
    Post Format For Image Metabox Section.
------------------------------------*/
CSF::createMetabox(
	$image_prefix,
	array(
		'title'           => esc_html__('Post Settings', 'triprex-core'),
		'post_type'       => 'post',
		'data_type'       => 'unserialize',
		'context'         => 'normal',
		'priority'        => 'high',
		'post_formats'    => 'image',
		'show_restore'    => true,
		'output_css'      => true,
		'theme'           => 'dark',
	)
);

/*-----------------------------------
    Post Formet Image
------------------------------------*/
CSF::createSection(
	$image_prefix,
	array(
		'title'  => esc_html__('Image Post Setting', 'triprex-core'),
		'fields' => array(
			array(
				'id'          => 'egns_thumb_images',
				'type'        => 'media',
				'title'       => esc_html__('Add Image Images', 'triprex-core'),
				'desc'        => esc_html__('Select Images For Image Post Format.', 'triprex-core'),
				'add_title'   => esc_html__('Add Images', 'triprex-core'),
				'edit_title'  => esc_html__('Edit Image', 'triprex-core'),
				'clear_title' => esc_html__('Remove Images', 'triprex-core'),
			),
		)
	)
);
