<?php

// Control core classes for avoiding errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'triprex-activities-category';


    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy'  => 'activities-category',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    CSF::createSection($prefix, array(
        'fields' => array(
            array(
                'id'      => 'triprex_activities_category',
                'type'    => 'media',
                'title'   => esc_html__('Upload Icon Image', 'triprex-core'),
                'library' => 'image',
            ),
        ),
    ));

    CSF::createSection($prefix, array(
        'fields' => array(
            array(
                'id'      => 'triprex_activities_category_banner_image',
                'type'    => 'media',
                'title'   => esc_html__('Upload Banner Image', 'triprex-core'),
                'library' => 'image',
            ),
        ),
    ));
}
