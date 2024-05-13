<?php


$quote_prefix   = 'egns_quote';


CSF::createMetabox(
	$quote_prefix,
	array(
		'title'           => esc_html__('Post Settings', 'triprex-core'),
		'post_type'       => 'post',
		'data_type'       => 'unserialize',
		'context'         => 'normal',
		'priority'        => 'high',
		'post_formats'    => 'quote',
		'show_restore'    => true,
		'output_css'      => true,
		'theme'           => 'dark',
	)
);


CSF::createSection(
	$quote_prefix,
	array(
		'title'  => esc_html__('Quote Post Setting', 'triprex-core'),
		'fields' => array(
			array(
				'id'          => 'egns_quote_text',
				'type'        => 'textarea',
				'title'       => esc_html__('Quote Text', 'triprex-core'),
				'subtitle'    => esc_html__('Paste here a valid quote text which is support auto embed with WordPress for post quote.', 'triprex-core'),
				'placeholder' => 'Quote Text',
				'default'     => 'Duis rutrum nisl urna. Maecenas vel libero faucibus nisi venenatis themex hendrerit a id lectus. Suspendissendt blandit interdum. Sed pellentesque at nunc eget consente Duis rutrum nisl urna.',
			),
		)
	)
);
