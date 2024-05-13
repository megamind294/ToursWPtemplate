<?php
/*-------------------------------------------------------
		  ** General Options
	--------------------------------------------------------*/
// Create a simple general section
CSF::createSection($prefix, array(
  'title'  => esc_html__('General', 'triprex-core'),
  'id'     => 'general_options',
  'icon'   => 'fa fa-wrench',
  'fields' => array(

    array(
      'type'    => 'subheading',
      'content' => '<h3>' . esc_html__('LTR - RTL', 'triprex-core') . '</h3>'
    ),
    array(
      'id'      => 'rtl_enable',
      'title'   => esc_html__('RTL Enabel', 'triprex-core'),
      'type'    => 'switcher',
      'desc'    => wp_kses(__('you can set <mark>ON / OFF</mark> to enable/disable RTL', 'triprex-core'), wp_kses_allowed_html('post')),
      'default' => false,
    ),
    array(
      'type'    => 'subheading',
      'content' => '<h3>' . esc_html__('Color Options', 'triprex-core') . '</h3>'
    ),
    array(
      'id'    => 'primary_theme_color',
      'type'  => 'color',
      'title' => esc_html__('Primary Theme Color', 'triprex-core'),
      'desc'  => wp_kses(__("Choose the <mark>primary color</mark> for your website's theme.", 'triprex-core'), wp_kses_allowed_html('post')),
    ),
    array(
      'id'    => 'secondary_theme_color',
      'type'  => 'color',
      'title' => esc_html__('Secondary Theme Color', 'triprex-core'),
      'desc'  => wp_kses(__("Select a <mark>secondary color</mark> to complement your theme.", 'triprex-core'), wp_kses_allowed_html('post')),
    ),
    array(
      'type'    => 'subheading',
      'content' => '<h3>' . esc_html__('Preloader Options', 'triprex-core') . '</h3>'
    ),
    array(
      'id'      => 'preloader_enable',
      'title'   => esc_html__('Preloader', 'triprex-core'),
      'type'    => 'switcher',
      'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable preloader', 'triprex-core'), wp_kses_allowed_html('post')),
      'default' => false,
    ),
    array(
      'id'      => 'preloader_logo',
      'title'   => esc_html__('Upload Preloader Logo', 'triprex-core'),
      'type'    => 'media',
      'desc'    => wp_kses(__('you can upload <mark>preloader logo</mark> here', 'triprex-core'), wp_kses_allowed_html('post')),
      'default' => array(
        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/preloader/preloader-logo.svg'),
        'id'        => 'logo',
        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/preloader/preloader-logo.svg'),
        'alt'       => esc_attr('logo'),
        'title'     => esc_html('Logo'),
      ),
      'dependency' => array('preloader_enable', '==', 'true'),
    ),
    array(
      'type'    => 'subheading',
      'content' => '<h3>' . esc_html__('Upload Logo', 'triprex-core') . '</h3>'
    ),
    array(
      'id'      => 'header_logo',
      'title'   => esc_html__('Upload Header Logo', 'triprex-core'),
      'type'    => 'media',
      'desc'    => wp_kses(__('you can upload <mark>Header Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
      'default' => array(
        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
        'id'        => 'logo',
        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
        'alt'       => esc_attr('logo'),
        'title'     => esc_html('Logo'),
      ),
    ),
    array(
      'id'      => 'header_logo_mobile',
      'title'   => esc_html__('Upload Mobile Logo', 'triprex-core'),
      'type'    => 'media',
      'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'triprex-core'), wp_kses_allowed_html('post')),
      'default' => array(
        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
        'id'        => 'logo',
        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
        'alt'       => esc_attr('logo'),
        'title'     => esc_html('Logo'),
      ),
    ),
    array(
      'id'               => 'header_logo_dimensions',
      'type'             => 'dimensions',
      'title'            => 'Set Logo width & height',
      'output_important' => true,
      'default'          => array(
        'width'  => '154',
        'height' => '',
        'unit'   => 'px',
      ),
      'output' => array(
        '.company-logo img',
        '.header-logo img',
        '.mobile-logo-wrap img',
      ),
    ),
  )
));

// Create a simple Currency section
CSF::createSection($prefix, array(
  'title'  => esc_html__('Currency Format', 'triprex-core'),
  'id'     => 'currency_options',
  'icon'   => 'fa fa-btc',
  'fields' => array(
    array(
      'type'    => 'subheading',
      'content' => '<h3>' . esc_html__('Global Currency Set', 'triprex-core') . '</h3>'
    ),
    array(
      'id'      => 'global_currency_set',
      'type'    => 'text',
      'title'   => esc_html__('Currency symbol or type', 'triprex-core'),
      'default' => '$',
      'desc'    => wp_kses(__("When <mark>WooCommerce</mark> inactive set your currency sybmol here", 'triprex-core'), wp_kses_allowed_html('post')),
    ),
  )
));
