<?php

// Control core classes for avoiding errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'triprex-tours-type';

    // Create taxonomy options for 'city-location'
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy'  => 'tour-types',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    // Create a section for 'city-location'
    CSF::createSection($prefix, array(
        'fields' => array(
            array(
                'id'      => 'triprex_tour_type_icon',
                'type'    => 'media',
                'title'   => esc_html__('Upload Tours Type Thumb Icon', 'triprex-core'),
                'desc'   => esc_html__('Tours Type Icon', 'triprex-core'),
                'library' => 'image',
            ),
            array(
                'id'      => 'triprex_tour_type_thumbnail',
                'type'    => 'media',
                'title'   => esc_html__('Upload Tours Type Thumbnail', 'triprex-core'),
                'library' => 'image',
            ),
        ),
    ));
}
