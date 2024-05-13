<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php echo \Egns\Helper\Egns_Helper::egns_get_theme_option('rtl_enable') == 1 ? 'dir="rtl"' : ''; ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')) ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>itemtype="https://schema.org/WebPage">

	<?php
	// Hook to include default WordPress hook after body tag open
	if (function_exists('wp_body_open')) {
		wp_body_open();
	}
	?>
	<!-- app -->
	<div id="app">
		<?php
		// Hook to include page header template
		do_action('egns_action_page_header_template'); ?>