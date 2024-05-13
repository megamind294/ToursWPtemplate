<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('CSF')) {
    return;
}

// Control core classes for avoid errors

if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'egns_theme_options';

    // Options Informations
    $info       = wp_get_theme();
    $name       = $info->get('Name');
    $version    = $info->get('Version');
    $version    = '<small>' . sprintf(__('- Version %s', 'triprex-core') . '</small>', $version);
    $author     = $info->get('Author');
    $author_uri = $info->get('AuthorURI');
    $author_uri = '<small>' . esc_html__('by', 'triprex-core') . ' <a target="_blank" href="' . esc_url($author_uri) . '">' . esc_html($author) . '</a></small>';
    $theme_uri  = $info->get('ThemeURI');

    // Create options
    CSF::createOptions($prefix, array(

        /*--------------------------
        FRAMEWORK TITLE
        ---------------------------*/
        'framework_title'    => sprintf(__('%1$s Theme Options %2$s %3$s', 'triprex-core'), $name, $version, $author_uri),
        'framework_class'    => 'triprex-core',

        /*--------------------------
        MENU SETTINGS
        ---------------------------*/
        'menu_title'         => esc_html__('Theme Options', 'triprex-core'),
        'menu_slug'          => 'theme_options',
        'menu_type'          => 'menu',
        'menu_capability'    => 'manage_options',
        'menu_position'    => 60,
        'menu_icon'          => null,
        'menu_hidden'        => false,

        /*--------------------------
        FOOTER
        ---------------------------*/
        'footer_credit'      => sprintf(__('Credited %s', 'triprex-core'), $author_uri),
        'footer_text'        => sprintf(__('Made with love %s', 'triprex-core'), $author_uri),
        'footer_after'       => '',
        'transient_time'     => 0,

        /*--------------------------
        TYPOGRAPHY OPTIONS
        ---------------------------*/
        'enqueue_webfont'    => true,
        'async_webfont'      => true,

        /*--------------------------
        OTHERS
        ---------------------------*/
        'output_css'         => true,
    ));

    // All Options
    $includes_files = array(

        // Settings
        array(
            'file-name' => 'settings',
            'folder-name' => EGNS_CORE_INC . '/theme-options/settings/'
        ),

        // Page Options
        array(
            'file-name' => 'page-settings',
            'folder-name' => EGNS_CORE_INC . '/theme-options/page-options/'
        ),
        //Destination
        array(
            'file-name' => 'destination',
            'folder-name' => EGNS_CORE_INC . '/theme-options/destination/'
        ),
        //visa
        array(
            'file-name' => 'visa',
            'folder-name' => EGNS_CORE_INC . '/theme-options/visa/'
        ),
        //tours
        array(
            'file-name' => 'tours',
            'folder-name' => EGNS_CORE_INC . '/theme-options/tours/'
        ),
        //hotel
        array(
            'file-name' => 'hotel',
            'folder-name' => EGNS_CORE_INC . '/theme-options/hotel/'
        ),
        //transport
        array(
            'file-name' => 'transport',
            'folder-name' => EGNS_CORE_INC . '/theme-options/transport/'
        ),
        //activities
        array(
            'file-name' => 'activities',
            'folder-name' => EGNS_CORE_INC . '/theme-options/activities/'
        ),
        //Texonomy Tours type
        array(
            'file-name' => 'tours-type-texonomy',
            'folder-name' => EGNS_CORE_INC . '/theme-options/texonomy/'
        ),
        //texonomy
        array(
            'file-name' => 'location-taxonomy',
            'folder-name' => EGNS_CORE_INC . '/theme-options/texonomy/'
        ),
        //texonomy
        array(
            'file-name' => 'transport-type-texonomy',
            'folder-name' => EGNS_CORE_INC . '/theme-options/texonomy/'
        ),
        //texonomy
        array(
            'file-name' => 'activities-country-texonomy',
            'folder-name' => EGNS_CORE_INC . '/theme-options/texonomy/'
        ),
        //texonomy
        array(
            'file-name' => 'activities-category-texonomy',
            'folder-name' => EGNS_CORE_INC . '/theme-options/texonomy/'
        ),
    );

    if (is_array($includes_files) && !empty($includes_files)) {
        foreach ($includes_files as $file) {
            if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
                require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
            }
        }
    }
}
