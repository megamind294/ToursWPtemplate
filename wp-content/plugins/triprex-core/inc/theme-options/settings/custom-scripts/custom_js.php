<?php
/*-----------------------------------
		custom_scripts css Options
------------------------------------*/

CSF::createSection($prefix, array(
    'parent' => 'custom_scripts',
    'title'  => esc_html__('Custom JS', 'triprex-core'),
    'id'     => 'custom_js',
    'icon'   => 'fa fa-id-card-o',
    'fields' => array(

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom Javascript Editor', 'triprex-core'),
        ),
        array(
            'id'       => 'custom_js',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom javascript here. this javascript will be applied in all pages and post.', 'triprex-core'),
            'settings' => array(
                'mode'        => 'javascript',
                'theme'       => 'dracula',
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),
    ),

));
