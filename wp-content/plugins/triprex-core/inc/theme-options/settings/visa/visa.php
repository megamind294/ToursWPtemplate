<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {
  /*-------------------------------------------------------
	   ** Visa Archive Page Options
   --------------------------------------------------------*/
  CSF::createSection($prefix, array(
    'id'    => 'visa',
    'title' => esc_html__('Visa', 'triprex-core'),
    'icon'  => 'fa fa-grav'
  ));

  CSF::createSection($prefix, array(
    'parent' => 'visa', // The slug id of the parent section
    'title'  => esc_html__('Archive Page', 'triprex-core'),
    'icon'   => 'fa fa-list-alt',
    'fields' => array(
      array(
        'type'    => 'subheading',
        'content' => '<h3>' . esc_html__('Visa Archive Page Options', 'triprex-core') . '</h3>',
      ),
      array(
        'id'    => 'visa_archive_num_of_post',
        'type'  => 'number',
        'title' => 'Number of Posts Per Page',
        'desc'    => wp_kses(__('Enter the <mark>maximum number</mark> of posts to display.', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => 6,
      ),
      array(
        'id'          => 'visa_archive_post_order',
        'type'        => 'select',
        'title'       => esc_html__('Posts Order', 'triprex-core'),
        'options'     => array(
          'descending'  => 'DESC',
          'ascending'  => 'ASC',
        ),
        'default'     => 'descending'
      ),
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Sidebar Options', 'triprex-core') . '</h4>',
      ),
      array(
        'id'      => 'visa_archive_sidebar_enable',
        'title'   => esc_html__('Sidebar (Show/Hide)', 'triprex-core'),
        'type'    => 'switcher',
        'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to show/hide sidebar options', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => true,
      ),
      array(
        'id'      => 'visa_archive_sidebar_faq_enable',
        'title'   => esc_html__('FAQ (Show/Hide)', 'triprex-core'),
        'type'    => 'switcher',
        'desc'    => wp_kses(__('you can set <mark>On / Off</mark> to show/hide sidebar faq options', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => true,
        'dependency' => array(
          array('visa_archive_sidebar_enable',  '==', '1'),
        ),
      ),
      array(
        'id'      => 'visa_sidebar_faq_heading',
        'type'    => 'text',
        'title'   => esc_html__('FAQ Heading Title', 'triprex-core'),
        'default' => 'FAQ - General Visa Information:',
        'dependency' => array(
          array('visa_archive_sidebar_enable',  '==', '1'),
          array('visa_archive_sidebar_faq_enable',  '==', '1'),
        ),
      ),
      array(
        'id'     => 'visa_sidebar_faq_re',
        'type'   => 'repeater',
        'title'  => esc_html__('Visa FAQ List', 'triprex-core'),
        'default' => array(
          array(
            'visa_sidebar_faq_qustion'     => '1. Can I fill in my visa application in a language other than English?',
            'visa_sidebar_faq_answer'      => 'No. At Present our online application system only supports applications made in English.',
          ),
          array(
            'visa_sidebar_faq_qustion'     => '02. Will I be able to access the online application system using my computer?',
            'visa_sidebar_faq_answer'      => 'We are doing our best to support as many computers, operating systems and internet browsers as possible but due to the technologies we use for our online application system, there are certain browsers we exclude due to their age or design. Currently our site is tested at IE 5.0 or later and Mozilla Firefox 3.5 or later.',
          ),
          array(
            'visa_sidebar_faq_qustion'     => '03. Can I save my application mid-way through the application process?',
            'visa_sidebar_faq_answer'      => 'Yes. You can save your online visa application wherever you see the "Save & Exit" icon. To login again and complete your application, you will require your unique "Visa Application Id". This number will have been sent to the email address that you supplied in your application security details.',
          ),
          array(
            'visa_sidebar_faq_qustion'     => '04. I do not understand one of the questions. What can I do?',
            'visa_sidebar_faq_answer'      => 'Throughout the online form we have added "More Info" icons to some questions that might require further guidance.',
          ),
          array(
            'visa_sidebar_faq_qustion'     => '05. I made a mistake on one of my answers. Can I change it?',
            'visa_sidebar_faq_answer'      => "If you didn't submit your application finally you can do the change. After submitting the application you can't change it.",
          ),
          array(
            'visa_sidebar_faq_qustion'     => '06. The date I entered is not being accepted. What is the correct format?',
            'visa_sidebar_faq_answer'      => 'All date fields in our forms are set up in the following format: dd/mm/yyyy (for example 21/08/2011).',
          ),
          array(
            'visa_sidebar_faq_qustion'     => '07. I have not received my Completed Application confirmation email. Can you resend it to me?',
            'visa_sidebar_faq_answer'      => 'Yes. But please check first that your inbox has not treated our email confirmation as SPAM and that you have given us the correct email address. If you have not received your confirmation email after 24 hours please contact us through Complain and Feedback link.',
          ),
          array(
            'visa_sidebar_faq_qustion'     => '08. I am unable to retrieve my application. What can I do?',
            'visa_sidebar_faq_answer'      => 'This could be because you did not save your application by selecting the "Save & Exit" option flagged by the following image on the application form or your did not retrieve your application within 7 days of last saving it. If you are sure you saved your application in the last seven days, empty your browser cache(temporary internet files) and try again.',
          ),
        ),
        'dependency' => array(
          array('visa_archive_sidebar_enable',  '==', '1'),
          array('visa_archive_sidebar_faq_enable',  '==', '1'),
        ),
        'fields' => array(

          array(
            'id'      => 'visa_sidebar_faq_qustion',
            'type'    => 'text',
            'title'   => esc_html__('Question', 'triprex-core'),
          ),
          array(
            'id'      => 'visa_sidebar_faq_answer',
            'type'    => 'text',
            'title'   => esc_html__('Answer', 'triprex-core'),
          ),
        ),
      ),
      // Banner Card
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Banner Card', 'triprex-core') . '</h4>',
        'dependency' => array(
          array('visa_archive_sidebar_enable',  '==', '1'),
        ),
      ),
      array(
        'id'         => 'arch_sid_banner_card_show_hide',
        'type'       => 'switcher',
        'title'      => esc_html__('Show Banner Card', 'triprex-core'),
        'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Banner Card options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'    => 1,
        'dependency' => array(
          array('visa_archive_sidebar_enable',  '==', '1'),
        ),
      ),
      array(
        'id'      => 'arch_sid_banner_card_bg_img',
        'title'   => esc_html__('Banner Card Image', 'triprex-core'),
        'type'    => 'media',
        'desc'      => wp_kses(__('you can select <mark>Banner Card Image</mark> for sidebar section', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'  => array(
          'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-bnr-bg.jpg'),
          'id'          => 'sidebar-bnr-bg',
          'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-bnr-bg.jpg'),
          'alt'         => esc_attr('sidebar-bnr-bg'),
          'title'       => esc_html('sidebar-bnr-bg'),
        ),
        'dependency' => array(
          array('visa_archive_sidebar_enable',  '==', '1'),
          array('arch_sid_banner_card_show_hide',  '==', '1'),
        ),
      ),
      // Banner Card Contact Info
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Banner Card Contact Info', 'triprex-core') . '</h4>',
        'dependency' => array(
          array('visa_archive_sidebar_enable', '==', '1'),
          array('arch_sid_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'         => 'arch_sid_bnr_crd_contact_info_show',
        'type'       => 'switcher',
        'title'      => esc_html__('Show Contact Info', 'triprex-core'),
        'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Contact Info options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'    => 1,
        'dependency' => array(
          array('visa_archive_sidebar_enable', '==', '1'),
          array('arch_sid_banner_card_show_hide', '==', '1'),
        ),
      ),

      array(
        'id'      => 'arch_sid_bnr_crd_contact_info',
        'type'    => 'repeater',
        'title'   => esc_html__('Contact Information', 'triprex-core'),
        'dependency' => array(
          array('arch_sid_banner_card_show_hide', '==', 'true'),
          array('visa_archive_sidebar_enable', '==', 'true'),
          array('arch_sid_bnr_crd_contact_info_show', '==', '1'),
        ),
        'fields' => array(
          array(
            'id'      => 'arch_sid_contact_bnr_type',
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
            'id'         => 'arch_sid_phone_bnr_icon_svg',
            'type'       => 'media',
            'title'      => esc_html__('Icon (SVG) for Phone', 'triprex-core'),
            'dependency' => array('arch_sid_contact_bnr_type', '==', 'phone'),
          ),
          array(
            'id'         => 'arch_sid_phone_bnr_info_text',
            'type'       => 'text',
            'title'      => esc_html__('Contact Info Text for Phone', 'triprex-core'),
            'default'    => esc_html__('Phone:', 'triprex-core'),
            'dependency' => array('arch_sid_contact_bnr_type', '==', 'phone'),
          ),
          array(
            'id'         => 'arch_sid_phone_bnr_info',
            'type'       => 'text',
            'title'      => esc_html__('Phone Number', 'triprex-core'),
            'default'    => esc_html__('+91 656 786 53', 'triprex-core'),
            'dependency' => array('arch_sid_contact_bnr_type', '==', 'phone'),
          ),
          // Fields for email contact type
          array(
            'id'         => 'arch_sid_email_bnr_icon_svg',
            'type'       => 'media',
            'title'      => esc_html__('Icon (SVG) for Email', 'triprex-core'),
            'dependency' => array('arch_sid_contact_bnr_type', '==', 'email'),
          ),
          array(
            'id'         => 'arch_sid_email_bnr_info_text',
            'type'       => 'text',
            'title'      => esc_html__('Contact Info Text for Email', 'triprex-core'),
            'default'    => esc_html__('Email:', 'triprex-core'),
            'dependency' => array('arch_sid_contact_bnr_type', '==', 'email'),
          ),
          array(
            'id'         => 'arch_sid_email_bnr_info',
            'type'       => 'text',
            'title'      => esc_html__('Email Address', 'triprex-core'),
            'default'    => esc_html__('info@example.com', 'triprex-core'),
            'dependency' => array('arch_sid_contact_bnr_type', '==', 'email'),
          ),
          // Fields for others contact type
          array(
            'id'         => 'arch_sid_custom_bnr_icon_svg',
            'type'       => 'media',
            'title'      => esc_html__('Icon (SVG) for Others', 'triprex-core'),
            'dependency' => array('arch_sid_contact_bnr_type', '==', 'others'),
          ),
          array(
            'id'         => 'arch_sid_custom_bnr_info_txt',
            'type'       => 'text',
            'title'      => esc_html__('Custom Info Text', 'triprex-core'),
            'dependency' => array('arch_sid_contact_bnr_type', '==', 'others'),
          ),
          array(
            'id'         => 'arch_sid_custom_bnr_info',
            'type'       => 'text',
            'title'      => esc_html__('Custom Information', 'triprex-core'),
            'dependency' => array('arch_sid_contact_bnr_type', '==', 'others'),
          ),
        ),
        'default' => array(
          array(
            'arch_sid_contact_bnr_type' => 'phone',
            'arch_sid_phone_bnr_icon_svg' => array(
              'url' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
              'id' => 'phone_icon',
              'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
              'alt' => esc_attr('content-icons'),
              'title' => esc_html('Icon'),
            ),
            'arch_sid_phone_bnr_info_text' => esc_html__('To More Inquiry', 'triprex-core'),
            'arch_sid_phone_bnr_info' => esc_html__('+91 656 786 53', 'triprex-core'),

            'arch_sid_email_bnr_icon_svg' => array(
              'url' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-icon.svg'),
              'id' => 'email_icon',
              'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-icon.svg'),
              'alt' => esc_attr('content-icons'),
              'title' => esc_html('Icon'),
            ),
            'arch_sid_email_bnr_info_text' => esc_html__('Email:', 'triprex-core'),
            'arch_sid_email_bnr_info' => esc_html__('info@example.com', 'triprex-core'),
          ),
        ),
      ),
    )
  ));
  CSF::createSection($prefix, array(
    'parent' => 'visa',
    'title'  => esc_html__('Details Page', 'triprex-core'),
    'icon'   => 'fa fa-cogs',
    'fields' => array(
      array(
        'type'    => 'subheading',
        'content' => '<h3>' . esc_html__('Visa Details Page Options', 'triprex-core') . '</h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Visa Inquiry Form', 'triprex-core') . '</h4>',
      ),
      array(
        'id'      => 'visa_booking_form_heading_title',
        'type'    => 'text',
        'title'   => esc_html__('Title', 'triprex-core'),
        'desc'    => wp_kses(__('Write the booking form<mark>heading title</mark> here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('Inquiry Form', 'triprex-core'),  wp_kses_allowed_html('post')),
      ),
      array(
        'id'      => 'visa_booking_form_heading_desc',
        'type'    => 'textarea',
        'title'   => esc_html__('Short Description', 'triprex-core'),
        'desc'    => wp_kses(__('Write the booking form<mark>heading description</mark>here', 'triprex-core'),  wp_kses_allowed_html('post')),
        'default' => wp_kses(__('Complete form for complaints or service inquiries; expect prompt response via phone/email.', 'triprex-core'),  wp_kses_allowed_html('post')),
      ),
      array(
        'id'      => 'visa_inquiry_form_shortcode',
        'type'    => 'textarea',
        'title'   => esc_html__('Add Inquiry Form', 'triprex-core'),
        'default' => '[contact-form-7 id="4da2277" title="Visa inquiry form"]',
      ),

      // Banner Card
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Banner Card', 'triprex-core') . '</h4>',
      ),
      array(
        'id'         => 'single_sid_banner_card_show_hide',
        'type'       => 'switcher',
        'title'      => esc_html__('Show Banner Card', 'triprex-core'),
        'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Banner Card options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'    => 1,
      ),
      array(
        'id'      => 'single_sid_banner_card_bg_img',
        'title'   => esc_html__('Banner Card Image', 'triprex-core'),
        'type'    => 'media',
        'desc'      => wp_kses(__('you can select <mark>Banner Card Image</mark> for sidebar section', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'  => array(
          'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-bnr-bg.jpg'),
          'id'          => 'sidebar-bnr-bg',
          'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/sidebar/sidebar-bnr-bg.jpg'),
          'alt'         => esc_attr('sidebar-bnr-bg'),
          'title'       => esc_html('sidebar-bnr-bg'),
        ),
        'dependency' => array(
          array('single_sid_banner_card_show_hide',  '==', '1'),
        ),
      ),
      // Banner Card Contact Info
      array(
        'type'    => 'subheading',
        'content' => '<h4>' . esc_html__('Banner Card Contact Info', 'triprex-core') . '</h4>',
        'dependency' => array(
          array('single_sid_banner_card_show_hide', '==', '1'),
        ),
      ),
      array(
        'id'         => 'single_sid_bnr_crd_contact_info_show',
        'type'       => 'switcher',
        'title'      => esc_html__('Show Contact Info', 'triprex-core'),
        'desc'       => wp_kses(__('you can set <mark>On / Off</mark> to show/hide Contact Info options', 'triprex-core'), wp_kses_allowed_html('post')),
        'default'    => 1,
        'dependency' => array(
          array('single_sid_banner_card_show_hide', '==', '1'),
        ),
      ),

      array(
        'id'      => 'single_sid_bnr_crd_contact_info',
        'type'    => 'repeater',
        'title'   => esc_html__('Contact Information', 'triprex-core'),
        'dependency' => array(
          array('single_sid_banner_card_show_hide', '==', 'true'),
          array('single_sid_bnr_crd_contact_info_show', '==', '1'),
        ),
        'fields' => array(
          array(
            'id'      => 'single_sid_contact_bnr_type',
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
            'id'         => 'single_sid_phone_bnr_icon_svg',
            'type'       => 'media',
            'title'      => esc_html__('Icon (SVG) for Phone', 'triprex-core'),
            'dependency' => array('single_sid_contact_bnr_type', '==', 'phone'),
          ),
          array(
            'id'         => 'single_sid_phone_bnr_info_text',
            'type'       => 'text',
            'title'      => esc_html__('Contact Info Text for Phone', 'triprex-core'),
            'default'    => esc_html__('Phone:', 'triprex-core'),
            'dependency' => array('single_sid_contact_bnr_type', '==', 'phone'),
          ),
          array(
            'id'         => 'single_sid_phone_bnr_info',
            'type'       => 'text',
            'title'      => esc_html__('Phone Number', 'triprex-core'),
            'default'    => esc_html__('+91 656 786 53', 'triprex-core'),
            'dependency' => array('single_sid_contact_bnr_type', '==', 'phone'),
          ),
          // Fields for email contact type
          array(
            'id'         => 'single_sid_email_bnr_icon_svg',
            'type'       => 'media',
            'title'      => esc_html__('Icon (SVG) for Email', 'triprex-core'),
            'dependency' => array('single_sid_contact_bnr_type', '==', 'email'),
          ),
          array(
            'id'         => 'single_sid_email_bnr_info_text',
            'type'       => 'text',
            'title'      => esc_html__('Contact Info Text for Email', 'triprex-core'),
            'default'    => esc_html__('Email:', 'triprex-core'),
            'dependency' => array('single_sid_contact_bnr_type', '==', 'email'),
          ),
          array(
            'id'         => 'single_sid_email_bnr_info',
            'type'       => 'text',
            'title'      => esc_html__('Email Address', 'triprex-core'),
            'default'    => esc_html__('info@example.com', 'triprex-core'),
            'dependency' => array('single_sid_contact_bnr_type', '==', 'email'),
          ),
          // Fields for others contact type
          array(
            'id'         => 'single_sid_custom_bnr_icon_svg',
            'type'       => 'media',
            'title'      => esc_html__('Icon (SVG) for Others', 'triprex-core'),
            'dependency' => array('single_sid_contact_bnr_type', '==', 'others'),
          ),
          array(
            'id'         => 'single_sid_custom_bnr_info_txt',
            'type'       => 'text',
            'title'      => esc_html__('Custom Info Text', 'triprex-core'),
            'dependency' => array('single_sid_contact_bnr_type', '==', 'others'),
          ),
          array(
            'id'         => 'single_sid_custom_bnr_info',
            'type'       => 'text',
            'title'      => esc_html__('Custom Information', 'triprex-core'),
            'dependency' => array('single_sid_contact_bnr_type', '==', 'others'),
          ),
        ),
        'default' => array(
          array(
            'single_sid_contact_bnr_type' => 'phone',
            'single_sid_phone_bnr_icon_svg' => array(
              'url' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
              'id' => 'phone_icon',
              'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/phone-icon.svg'),
              'alt' => esc_attr('content-icons'),
              'title' => esc_html('Icon'),
            ),
            'single_sid_phone_bnr_info_text' => esc_html__('To More Inquiry', 'triprex-core'),
            'single_sid_phone_bnr_info' => esc_html__('+91 656 786 53', 'triprex-core'),

            'single_sid_email_bnr_icon_svg' => array(
              'url' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-icon.svg'),
              'id' => 'email_icon',
              'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/email-icon.svg'),
              'alt' => esc_attr('content-icons'),
              'title' => esc_html('Icon'),
            ),
            'single_sid_email_bnr_info_text' => esc_html__('Email:', 'triprex-core'),
            'single_sid_email_bnr_info' => esc_html__('info@example.com', 'triprex-core'),
          ),
        ),
      ),
    )
  ));
}
