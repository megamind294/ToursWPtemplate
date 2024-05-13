<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {
  /*-------------------------------------------------------
	   ** Destination Archive Page Options
   --------------------------------------------------------*/
  CSF::createSection($prefix, array(
    'id'    => 'destination',
    'title' => esc_html__('Destination', 'triprex-core'),
    'icon'  => 'fa fa-plane'
  ));

  CSF::createSection($prefix, array(
    'parent' => 'destination', // The slug id of the parent section
    'title'  => esc_html__('Archive Page', 'triprex-core'),
    'icon'   => 'fa fa-list-alt',
    'fields' => array(
      array(
        'type'    => 'subheading',
        'content' => '<h3>' . esc_html__('Destination Archive Page Options', 'triprex-core') . '</h3>',
      ),
      array(
        'id'    => 'destination_archive_num_of_post',
        'type'  => 'number',
        'title' => 'Number of Posts Per Page',
        'desc'    => wp_kses(__('Enter the <mark>maximum number</mark> of posts to display.', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => 8,
      ),
      array(
        'id'          => 'destination_archive_post_order',
        'type'        => 'select',
        'title'       => esc_html__('Posts Order', 'triprex-core'),
        'options'     => array(
          'descending'  => 'DESC',
          'ascending'  => 'ASC',
        ),
        'default'     => 'descending'
      ),
    )
  ));
  CSF::createSection($prefix, array(
    'parent' => 'destination',
    'title'  => esc_html__('Details Page', 'triprex-core'),
    'icon'   => 'fa fa-cogs',
    'fields' => array(
      array(
        'type'    => 'subheading',
        'content' => '<h3>' . esc_html__('Destination Details Page Options', 'triprex-core') . '</h3>',
      ),
      // Banner Card
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Banner Card', 'triprex-core') . '</h4>',
      ),
      array(
        'id'         => 'desti_banner_card_show_hide',
        'type'       => 'switcher',
        'title'      => esc_html__('Show Banner Card', 'triprex-core'),
        'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide banner card options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'    => 1,
      ),
      array(
        'id'      => 'desti_banner_card_content_title',
        'type'    => 'text',
        'title'   => 'Title',
        'desc'    => wp_kses(__('Write the card content <mark>title</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('Savings worldwide', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('desti_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'      => 'desti_banner_card_content_offer_txt',
        'type'    => 'text',
        'title'   => 'Offer Tag Text',
        'desc'    => wp_kses(__('Write the card content <mark>offer tag</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('50% Off', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('desti_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'      => 'desti_banner_card_content_desc',
        'type'    => 'text',
        'title'   => 'Description',
        'desc'    => wp_kses(__('Write the card content <mark>description</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('For Your First Book', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('desti_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'      => 'desti_banner_card_btn_enable',
        'title'   => esc_html__('Enable Button', 'triprex-core'),
        'type'    => 'switcher',
        'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to enable/disable button options', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => true,
        'dependency' => array(
          array('desti_banner_card_show_hide',  '==', '1'),
        ),
      ),
      array(
        'id'        => 'desti_banner_card_btn_text',
        'type'      => 'text',
        'title'       => esc_html__('Button Label', 'triprex-core'),
        'default'     => esc_html__('View All Package', 'triprex-core'),
        'desc'    => wp_kses(__('write your <mark>button label</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('desti_banner_card_show_hide',  '==', '1'),
          array('desti_banner_card_btn_enable',   '==', '1'),
        ),
      ),
      array(
        'id'        => 'desti_banner_card_btn_link',
        'type'      => 'link',
        'default'  => array(
          'url'    => '/tour',
          'target' => '_blank'
        ),
        'title'       => esc_html__('Button Link', 'triprex-core'),
        'desc'    => wp_kses(__('add your <mark>button link</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'target' => '_blank',
        'dependency' => array(
          array('desti_banner_card_show_hide',  '==', '1'),
          array('desti_banner_card_btn_enable',   '==', '1'),
        ),
      ),
      array(
        'id'      => 'dsti_banner_card_bg_img',
        'title'   => esc_html__('Banner Card Image', 'triprex-core'),
        'type'    => 'media',
        'desc'      => wp_kses(__('you can select <mark>banner card image</mark> for sidebar section', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'  => array(
          'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-bnr2-bg.jpg'),
          'id'          => 'sidebar-bnr2-bg',
          'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-bnr2-bg.jpg'),
          'alt'         => esc_attr('sidebar-bnr2-bg'),
          'title'       => esc_html('sidebar-bnr2-bg'),
        ),
        'dependency' => array(
          array('desti_banner_card_show_hide',  '==', '1'),
        ),
      ),

      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Recommended Package Options', 'triprex-core') . '</h4>',
      ),
      // Recommended Package Show Hide 
      array(
        'id'         => 'destination_details_page_recom_pkg_show',
        'type'       => 'switcher',
        'title'      => esc_html__('Show Recommended Package', 'triprex-core'),
        'desc'       => wp_kses(__('You can set <mark>On / Off</mark> to show/hide recommended package options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'    => 1,
      ),
      // Recommended Package Heading 
      array(
        'id'      => 'destination_details_page_recom_pkg_heading',
        'type'    => 'text',
        'title'   => 'Recommended Package Heading',
        'desc'    => wp_kses(__('Write the recommended package <mark>heading</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('Recommended Package', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('destination_details_page_recom_pkg_show', '==', '1'),
        ),
      ),

      array(
        'id'    => 'recom_num_of_post',
        'type'  => 'number',
        'title' => 'Number of Posts Per Page',
        'desc'    => wp_kses(__('Enter the <mark>maximum number</mark> of posts to display.', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => 9,
        'dependency' => array(
          array('destination_details_page_recom_pkg_show', '==', '1'),
        ),
      ),
      array(
        'id'    => 'recom_post_order',
        'type'  => 'text',
        'title' => 'Posts Order',
        'desc'    => wp_kses(__('Enter the <mark>posts order</mark> of posts to display.', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => 'DESC',
        'dependency' => array(
          array('destination_details_page_recom_pkg_show', '==', '1'),
        ),
      ),
      array(
        'id'      => 'destination_details_page_recom_pkg_btn_enable',
        'title'   => esc_html__('Enable Button', 'triprex-core'),
        'type'    => 'switcher',
        'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to enable/disable button options', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => true,
        'dependency' => array(
          array('destination_details_page_recom_pkg_show',  '==', '1'),
        ),
      ),
      array(
        'id'        => 'destination_details_page_recom_pkg_btn_text',
        'type'      => 'text',
        'title'       => esc_html__('Button Label', 'triprex-core'),
        'default'     => esc_html__('View All Package', 'triprex-core'),
        'desc'    => wp_kses(__('write your <mark>button label</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('destination_details_page_recom_pkg_show',  '==', '1'),
          array('destination_details_page_recom_pkg_btn_enable',   '==', '1'),
        ),
      ),
      array(
        'id'        => 'destination_details_page_recom_pkg_btn_link',
        'type'      => 'link',
        'default'  => array(
          'url'    => '/tour',
          'target' => '_blank'
        ),
        'title'       => esc_html__('Button Link', 'triprex-core'),
        'desc'    => wp_kses(__('add your <mark>button link</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'target' => '_blank',
        'dependency' => array(
          array('destination_details_page_recom_pkg_show',  '==', '1'),
          array('destination_details_page_recom_pkg_btn_enable',   '==', '1'),
        ),
      ),

    )
  ));
}
