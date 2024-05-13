<?php

// Control core classes for avoiding errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'triprex-transport-type';

    // Create taxonomy options for 'city-location'
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy'  => 'transport-type',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    // Create a section for 'city-location'
    CSF::createSection($prefix, array(
        'fields' => array(
            array(
                'id'      => 'triprex_transport_type_logo',
                'type'    => 'media',
                'title'   => esc_html__('Upload Transport Type Image', 'triprex-core'),
                'desc'   => esc_html__('Transport Type Image', 'triprex-core'),
                'library' => 'image',
            ),
        ),
    ));
}
