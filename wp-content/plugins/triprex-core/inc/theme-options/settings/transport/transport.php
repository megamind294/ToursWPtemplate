<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {
  /*-------------------------------------------------------
	   ** Transport Archive Page Options
   --------------------------------------------------------*/
  CSF::createSection($prefix, array(
    'id'    => 'transport',
    'title' => esc_html__('Transport', 'triprex-core'),
    'icon'  => 'fa fa-taxi'
  ));

  CSF::createSection($prefix, array(
    'parent' => 'transport',                                  // The slug id of the parent section
    'title'  => esc_html__('Archive Page', 'triprex-core'),
    'icon'   => 'fa fa-list-alt',
    'fields' => array(
      array(
        'type'    => 'subheading',
        'content' => '<h3>' . esc_html__('Transport Archive Page Options', 'triprex-core') . '</h3>',
      ),
      array(
        'id'      => 'transport_archive_num_of_post',
        'type'    => 'number',
        'title'   => 'Number of Posts Per Page',
        'desc'    => wp_kses(__('Enter the <mark>maximum number</mark> of posts to display.', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => 6,
      ),
      array(
        'id'      => 'transport_archive_post_order',
        'type'    => 'select',
        'title'   => esc_html__('Posts Order', 'triprex-core'),
        'options' => array(
          'descending' => 'DESC',
          'ascending'  => 'ASC',
        ),
        'default' => 'descending'
      ),
      array(
        'id'      => 'transport_archive_sidebar_enable',
        'title'   => esc_html__('Sidebar (Show/Hide)', 'triprex-core'),
        'type'    => 'switcher',
        'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to show/hide sidebar options', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => true,
      ),



      // Banner Card
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Sidebar Banner', 'triprex-core') . '</h4>',
      ),
      array(
        'id'      => 'transport_banner_card_show_hide',
        'type'    => 'switcher',
        'title'   => esc_html__('Show Banner', 'triprex-core'),
        'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to show/hide banner card options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default' => 1,
      ),
      array(
        'id'         => 'transport_banner_card_content_title',
        'type'       => 'text',
        'title'      => 'Title',
        'desc'       => wp_kses(__('Write the card content <mark>title</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default'    => wp_kses(__('Savings worldwide', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('transport_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'         => 'transport_banner_card_content_offer_txt',
        'type'       => 'text',
        'title'      => 'Offer Tag Text',
        'desc'       => wp_kses(__('Write the card content <mark>offer tag</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default'    => wp_kses(__('30% Off', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('transport_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'         => 'transport_banner_card_content_desc',
        'type'       => 'text',
        'title'      => 'Description',
        'desc'       => wp_kses(__('Write the card content <mark>description</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default'    => wp_kses(__('For Your First Book', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('transport_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'         => 'transport_banner_card_btn_enable',
        'title'      => esc_html__('Enable Button', 'triprex-core'),
        'type'       => 'switcher',
        'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to enable/disable button options', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default'    => true,
        'dependency' => array(
          array('transport_banner_card_show_hide',  '==', '1'),
        ),
      ),
      array(
        'id'         => 'transport_banner_card_btn_text',
        'type'       => 'text',
        'title'      => esc_html__('Button Label', 'triprex-core'),
        'default'    => esc_html__('View All Package', 'triprex-core'),
        'desc'       => wp_kses(__('write your <mark>button label</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('transport_banner_card_show_hide',  '==', '1'),
          array('transport_banner_card_btn_enable',   '==', '1'),
        ),
      ),
      array(
        'id'      => 'transport_banner_card_btn_link',
        'type'    => 'link',
        'default' => array(
          'url'    => '/transport',
          'target' => '_blank'
        ),
        'title'      => esc_html__('Button Link', 'triprex-core'),
        'desc'       => wp_kses(__('add your <mark>button link</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'target'     => '_blank',
        'dependency' => array(
          array('transport_banner_card_show_hide',  '==', '1'),
          array('transport_banner_card_btn_enable',   '==', '1'),
        ),
      ),
      array(
        'id'      => 'transport_banner_card_bg_img',
        'title'   => esc_html__('Banner Card Image', 'triprex-core'),
        'type'    => 'media',
        'desc'    => wp_kses(__('you can select minimum <mark>500px height</mark> banner card image for sidebar section', 'triprex-core'), wp_kses_allowed_html('post')),
        'default' => array(
          'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-activity.jpg'),
          'id'        => 'sidebar-bnr2-bg',
          'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-activity.jpg'),
          'alt'       => esc_attr('sidebar-bnr2-bg'),
          'title'     => esc_html('sidebar-bnr2-bg'),
        ),
        'dependency' => array(
          array('transport_banner_card_show_hide',  '==', '1'),
        ),
      ),





    )
  ));

  // Details page 
  CSF::createSection($prefix, array(
    'parent' => 'transport',
    'title'  => esc_html__('Details Page', 'triprex-core'),
    'icon'   => 'fa fa-cogs',
    'fields' => array(
      array(
        'type'    => 'subheading',
        'content' => '<h3>' . esc_html__('Transport Details Page Options', 'triprex-core') . '</h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Booking Form Heading', 'triprex-core') . '</h4>',
      ),
      array(
        'id'      => 'transport_booking_form_heading_title',
        'type'    => 'text',
        'title'   => 'Title',
        'desc'    => wp_kses(__('Write the booking form<mark>heading title</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('Reserve Your Transport', 'triprex-core'),  wp_kses_allowed_html('post')),
      ),
      array(
        'id'      => 'transport_booking_form_heading_desc',
        'type'    => 'textarea',
        'title'   => 'Description',
        'desc'    => wp_kses(__('Write the booking form<mark>heading description</mark>here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('Reserve your beautiful travel: Dhaka-Sajek Valley transportation for a peaceful adventure.', 'triprex-core'),  wp_kses_allowed_html('post')),
      ),
      array(
        'id'      => 'transport_booking_form_shortcode',
        'type'    => 'textarea',
        'title'   => esc_html__('Add Your Booking Form Shortcode', 'triprex-core'),
        'default' => '[contact-form-7 id="759e740" title="Transport booking form"]',
      ),
    )
  ));
}
