<?php
/*-----------------------------------
		custom_scripts css Options
------------------------------------*/

CSF::createSection($prefix, array(
    'parent' => 'custom_scripts',
    'title'  => esc_html__('Custom CSS', 'triprex-core'),
    'id'     => 'custom_css',
    'icon'   => 'fa fa-id-card-o',
    'fields' => array(

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom CSS  ( All Device )', 'triprex-core'),
        ),
        array(
            'id'       => 'custom_css',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom css here with css selector. this css will be applied in all pages and post.', 'triprex-core'),
            'settings' => array(
                'mode'        => 'css',
                'theme'       => 'dracula',
                'tabSize'     => 4,
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom CSS  ( Medium Device or Ipad Pro )', 'triprex-core'),
        ),
        array(
            'id'       => 'custom_css_ipad',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom css here with css selector. this css will be applied in all pages and post, when device width will be  minimum 1024px maximum 1366px.', 'triprex-core'),
            'settings' => array(
                'mode'        => 'css',
                'theme'       => 'dracula',
                'tabSize'     => 4,
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom CSS  ( Medium Device or Tablet )', 'triprex-core'),
        ),
        array(
            'id'       => 'custom_css_tablet',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom css here with css selector. this css will be applied in all pages and post, when device width will be  minimum 768px maximum 992px.', 'triprex-core'),
            'settings' => array(
                'mode'        => 'css',
                'theme'       => 'dracula',
                'tabSize'     => 4,
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom CSS  ( Mobile Device )', 'triprex-core'),
        ),
        array(
            'id'       => 'custom_css_mobile',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom css here with css selector. this css will be applied in all pages and post, when device width will be maximum 767px.', 'triprex-core'),
            'settings' => array(
                'mode'        => 'css',
                'theme'       => 'dracula',
                'tabSize'     => 4,
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),
    ),

));
