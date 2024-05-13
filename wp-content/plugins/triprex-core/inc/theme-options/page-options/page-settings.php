<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('CSF')) {
    return;
}


// Set a unique slug-like ID
$prefix = 'egns_page_options';

/*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
CSF::createMetabox(
    $prefix,
    array(
        'title'           => esc_html__('Page Settings', 'triprex-core'),
        'post_type'       => ['post', 'page', 'case-study', 'project'],
        'context'         => 'normal',
        'priority'        => 'high',
        'show_restore'    => true,
        'enqueue_webfont' => true,
        'async_ bwebfont'   => false,
        'output_css'      => true,
        'theme'           => 'dark',
        'id'              => 'page_meta_option',
    )
);

// All Page Settings

$includes_files = array(

    // Header Page Settings
    array(
        'file-name' => 'page-header',
        'folder-name' => EGNS_CORE_INC . '/theme-options/page-options/header'
    ),

    // Breadcrumb Page Settings
    array(
        'file-name' => 'page-breadcrumbs',
        'folder-name' => EGNS_CORE_INC . '/theme-options/page-options/breadcrumbs'
    ),

    // Footer Page Settings
    array(
        'file-name' => 'page-footer',
        'folder-name' => EGNS_CORE_INC . '/theme-options/page-options/footer'
    ),
);

if (is_array($includes_files) && !empty($includes_files)) {
    foreach ($includes_files as $file) {
        if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
            require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
        }
    }
}
