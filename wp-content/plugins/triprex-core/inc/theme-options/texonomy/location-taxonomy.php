<?php

// Control core classes for avoiding errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'triprex-city-location';

    // Create taxonomy options for 'city-location'
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy'  => 'city-location',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    // Create a section for 'city-location'
    CSF::createSection($prefix, array(
        'fields' => array(
            array(
                'id'      => 'triprex_city_location_logo',
                'type'    => 'media',
                'title'   => esc_html__('Upload Location thumb', 'triprex-core'),
                'desc'   => esc_html__('Location Thumbnail Image', 'triprex-core'),
                'library' => 'image',
            ),

            array(
                'id'    => 'triprex_city_location_gallery',
                'type'  => 'gallery',
                'title' =>  esc_html__('Gallery Images', 'triprex-core'),
            ),
        ),
    ));
}
