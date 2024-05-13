<?php

// Control core classes for avoiding errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'triprex-activities-country';

    // Create taxonomy options for 'city-location'
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy'  => 'activities-country',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    // Create a section for 'city-location'
    CSF::createSection($prefix, array(
        'fields' => array(
            array(
                'id'      => 'triprex_country_flag',
                'type'    => 'media',
                'title'   => esc_html__('Upload Country Flag', 'triprex-core'),
                'desc'   => esc_html__('upload country flag here', 'triprex-core'),
                'library' => 'image',
            ),
        ),
    ));
}
