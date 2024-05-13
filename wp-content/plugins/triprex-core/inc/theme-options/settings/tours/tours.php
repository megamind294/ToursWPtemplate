<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {
  /*-------------------------------------------------------
	   ** Tour Archive Page Options
   --------------------------------------------------------*/
  CSF::createSection($prefix, array(
    'id'    => 'tours',
    'title' => esc_html__('Tours', 'triprex-core'),
    'icon'  => 'fa fa-suitcase'
  ));

  CSF::createSection($prefix, array(
    'parent' => 'tours',                                      // The slug id of the parent section
    'title'  => esc_html__('Archive Page', 'triprex-core'),
    'icon'   => 'fa fa-list-alt',
    'fields' => array(

      array(
        'type'    => 'subheading',
        'content' => '<h3>' . esc_html__('Tour Archive Page Options', 'triprex-core') . '</h3>',
      ),
      array(
        'id'      => 'tour_archive_num_of_post',
        'type'    => 'number',
        'title'   => 'Number of Posts Per Page',
        'desc'    => wp_kses(__('Enter the <mark>maximum number</mark> of posts to display.', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => 8,
      ),
      array(
        'id'      => 'tour_archive_post_order',
        'type'    => 'select',
        'title'   => esc_html__('Posts Order', 'triprex-core'),
        'options' => array(
          'descending' => 'DESC',
          'ascending'  => 'ASC',
        ),
        'default' => 'descending'
      ),


      // Banner Card
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Sidebar Banner', 'triprex-core') . '</h4>',
      ),
      array(
        'id'         => 'tour_banner_card_show_hide',
        'type'       => 'switcher',
        'title'      => esc_html__('Show Banner', 'triprex-core'),
        'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide banner card options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'    => 1,
      ),
      array(
        'id'      => 'tour_banner_card_content_title',
        'type'    => 'text',
        'title'   => 'Title',
        'desc'    => wp_kses(__('Write the card content <mark>title</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('Savings worldwide', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('tour_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'      => 'tour_banner_card_content_offer_txt',
        'type'    => 'text',
        'title'   => 'Offer Tag Text',
        'desc'    => wp_kses(__('Write the card content <mark>offer tag</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('50% Off', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('tour_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'      => 'tour_banner_card_content_desc',
        'type'    => 'text',
        'title'   => 'Description',
        'desc'    => wp_kses(__('Write the card content <mark>description</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('For Your First Book', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('tour_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'      => 'tour_banner_card_btn_enable',
        'title'   => esc_html__('Enable Button', 'triprex-core'),
        'type'    => 'switcher',
        'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to enable/disable button options', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => true,
        'dependency' => array(
          array('tour_banner_card_show_hide',  '==', '1'),
        ),
      ),
      array(
        'id'        => 'tour_banner_card_btn_text',
        'type'      => 'text',
        'title'       => esc_html__('Button Label', 'triprex-core'),
        'default'     => esc_html__('View All Package', 'triprex-core'),
        'desc'    => wp_kses(__('write your <mark>button label</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'dependency' => array(
          array('tour_banner_card_show_hide',  '==', '1'),
          array('tour_banner_card_btn_enable',   '==', '1'),
        ),
      ),
      array(
        'id'        => 'tour_banner_card_btn_link',
        'type'      => 'link',
        'default'  => array(
          'url'    => '/tour',
          'target' => '_blank'
        ),
        'title'       => esc_html__('Button Link', 'triprex-core'),
        'desc'    => wp_kses(__('add your <mark>button link</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'target' => '_blank',
        'dependency' => array(
          array('tour_banner_card_show_hide',  '==', '1'),
          array('tour_banner_card_btn_enable',   '==', '1'),
        ),
      ),
      array(
        'id'      => 'tour_banner_card_bg_img',
        'title'   => esc_html__('Banner Card Image', 'triprex-core'),
        'type'    => 'media',
        'desc'      => wp_kses(__('you can select minimum <mark>500px height</mark> banner card image for sidebar section', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'  => array(
          'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-pack.jpg'),
          'id'          => 'sidebar-bnr2-bg',
          'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-pack.jpg'),
          'alt'         => esc_attr('sidebar-bnr2-bg'),
          'title'       => esc_html('sidebar-bnr2-bg'),
        ),
        'dependency' => array(
          array('tour_banner_card_show_hide',  '==', '1'),
        ),
      ),




    )
  ));

  // Details page options 
  CSF::createSection($prefix, array(
    'parent' => 'tours',
    'title'  => esc_html__('Details Page', 'triprex-core'),
    'icon'   => 'fa fa-cogs',
    'fields' => array(
      array(
        'type'    => 'subheading',
        'content' => '<h3>' . esc_html__('Tours Details Page Options', 'triprex-core') . '</h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Booking Form Heading', 'triprex-core') . '</h4>',
      ),
      array(
        'id'      => 'tour_booking_form_heading_title',
        'type'    => 'text',
        'title'   => 'Title',
        'desc'    => wp_kses(__('Write the booking form<mark>heading title</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('Book Your Tour', 'triprex-core'),  wp_kses_allowed_html('post')),
      ),
      array(
        'id'      => 'tour_booking_form_heading_desc',
        'type'    => 'textarea',
        'title'   => 'Description',
        'desc'    => wp_kses(__('Write the booking form<mark>heading description</mark>here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('Reserve your ideal trip early for a hassle-free trip; secure comfort and convenience!', 'triprex-core'),  wp_kses_allowed_html('post')),
      ),
      array(
        'id'      => 'tour_booking_form_shortcode',
        'type'    => 'textarea',
        'title'   => esc_html__('Add Your Booking Form Shortcode', 'triprex-core'),
        'default' => '[contact-form-7 id="de00329" title="tour inquiry form"]',
      ),
      // Banner Card
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Banner Card', 'triprex-core') . '</h4>',
      ),
      array(
        'id'      => 'banner_card_show_hide',
        'type'    => 'switcher',
        'title'   => esc_html__('Show Banner Card', 'triprex-core'),
        'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Banner Card options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default' => 1,
      ),
      array(
        'id'      => 'banner_card_bg_img',
        'title'   => esc_html__('Banner Card Image', 'triprex-core'),
        'type'    => 'media',
        'desc'    => wp_kses(__('you can select <mark>Banner Card Image</mark> for sidebar section', 'triprex-core'), wp_kses_allowed_html('post')),
        'default' => array(
          'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-bnr-bg.jpg'),
          'id'        => 'sidebar-bnr-bg',
          'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-bnr-bg.jpg'),
          'alt'       => esc_attr('sidebar-bnr-bg'),
          'title'     => esc_html('sidebar-bnr-bg'),
        ),
        'dependency' => array(
          array('banner_card_show_hide',  '==', '1'),
        ),
      ),
      // Banner Card Contact Info
      array(
        'type'       => 'subheading',
        'content'    => '<h4>' . esc_html__('Banner Card Contact Info', 'triprex-core') . '</h4>',
        'dependency' => array(
          array('banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'         => 'bnr_crd_contact_info_show',
        'type'       => 'switcher',
        'title'      => esc_html__('Show Contact Info', 'triprex-core'),
        'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Contact Info options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'    => 1,
        'dependency' => array(
          array('banner_card_show_hide', '==', '1'),
        ),
      ),

      array(
        'id'         => 'bnr_crd_contact_info',
        'type'       => 'repeater',
        'title'      => esc_html__('Contact Information', 'triprex-core'),
        'dependency' => array(
          array('banner_card_show_hide', '==', 'true'),
          array('bnr_crd_contact_info_show', '==', '1'),
        ),
        'fields' => array(
          array(
            'id'      => 'contact_bnr_type',
            'type'    => 'radio',
            'title'   => esc_html__('Contact Type', 'triprex-core'),
            'options' => array(
              'phone'  => esc_html('Phone'),
              'email'  => esc_html('Email'),
              'others' => esc_html('Others'),
            ),
            'default' => 'phone',
          ),
          // Fields for phone contact type
          array(
            'id'         => 'phone_bnr_icon_svg',
            'type'       => 'media',
            'title'      => esc_html__('Icon (SVG) for Phone', 'triprex-core'),
            'dependency' => array('contact_bnr_type', '==', 'phone'),
          ),
          array(
            'id'         => 'phone_bnr_info_text',
            'type'       => 'text',
            'title'      => esc_html__('Contact Info Text for Phone', 'triprex-core'),
            'default'    => esc_html__('Phone:', 'triprex-core'),
            'dependency' => array('contact_bnr_type', '==', 'phone'),
          ),
          array(
            'id'         => 'phone_bnr_info',
            'type'       => 'text',
            'title'      => esc_html__('Phone Number', 'triprex-core'),
            'default'    => esc_html__('+91 656 786 53', 'triprex-core'),
            'dependency' => array('contact_bnr_type', '==', 'phone'),
          ),
          // Fields for email contact type
          array(
            'id'         => 'email_bnr_icon_svg',
            'type'       => 'media',
            'title'      => esc_html__('Icon (SVG) for Email', 'triprex-core'),
            'dependency' => array('contact_bnr_type', '==', 'email'),
          ),
          array(
            'id'         => 'email_bnr_info_text',
            'type'       => 'text',
            'title'      => esc_html__('Contact Info Text for Email', 'triprex-core'),
            'default'    => esc_html__('Email:', 'triprex-core'),
            'dependency' => array('contact_bnr_type', '==', 'email'),
          ),
          array(
            'id'         => 'email_bnr_info',
            'type'       => 'text',
            'title'      => esc_html__('Email Address', 'triprex-core'),
            'default'    => esc_html__('info@example.com', 'triprex-core'),
            'dependency' => array('contact_bnr_type', '==', 'email'),
          ),
          // Fields for others contact type
          array(
            'id'         => 'custom_bnr_icon_svg',
            'type'       => 'media',
            'title'      => esc_html__('Icon (SVG) for Others', 'triprex-core'),
            'dependency' => array('contact_bnr_type', '==', 'others'),
          ),
          array(
            'id'         => 'custom_bnr_info_txt',
            'type'       => 'text',
            'title'      => esc_html__('Custom Info Text', 'triprex-core'),
            'dependency' => array('contact_bnr_type', '==', 'others'),
          ),
          array(
            'id'         => 'custom_bnr_info',
            'type'       => 'text',
            'title'      => esc_html__('Custom Information', 'triprex-core'),
            'dependency' => array('contact_bnr_type', '==', 'others'),
          ),
        ),
        'default' => array(
          array(
            'contact_bnr_type'   => 'phone',
            'phone_bnr_icon_svg' => array(
              'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
              'id'        => 'phone_icon',
              'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
              'alt'       => esc_attr('content-icons'),
              'title'     => esc_html('Icon'),
            ),
            'phone_bnr_info_text' => esc_html__('To More Inquiry', 'triprex-core'),
            'phone_bnr_info'      => esc_html__('+91 656 786 53', 'triprex-core'),

            'email_bnr_icon_svg' => array(
              'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-icon.svg'),
              'id'        => 'email_icon',
              'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-icon.svg'),
              'alt'       => esc_attr('content-icons'),
              'title'     => esc_html('Icon'),
            ),
            'email_bnr_info_text' => esc_html__('Email:', 'triprex-core'),
            'email_bnr_info'      => esc_html__('info@example.com', 'triprex-core'),
          ),
        ),
      ),
    )
  ));
}
