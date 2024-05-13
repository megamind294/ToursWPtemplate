<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Newsletter_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_newsletter';
    }

    public function get_title()
    {
        return esc_html__('EG Newsletter', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-text-field';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//


        $this->start_controls_section(
            'triprex_newsletter_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_newsletter_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'triprex-core'),
                    'style_two' => esc_html__('Style Two', 'triprex-core'),

                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_newsletter_one_section_genaral',
            [
                'label' => esc_html__('Newsletter Section', 'triprex-core'),
                'condition' => [
                    'triprex_newsletter_genaral_style_selection' => 'style_one'
                ]

            ]
        );

        $this->add_control(
            'triprex_newsletter_content_section',
            [
                'label' => esc_html__('Content Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_banner_four_section_left_image',
            [
                'label' => esc_html__(' Left Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_four_section_right_image',
            [
                'label' => esc_html__(' Right Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_newsletter_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Join The Newsletter'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_newsletter_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('To receive our best monthly deals '),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_newsletter_shortcode',
            [
                'label' => esc_html__('Shortcode', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type your shortcode here', 'triprex-core'),
                'default' => wp_kses('[mc4wp_form id=233]', wp_kses_allowed_html('post')),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();



        //Content Two    
        $this->start_controls_section(
            'triprex_newsletter_contact_section_genaral_sec',
            [
                'label' => esc_html__('Newsletter Section', 'triprex-core'),
                'condition' => [
                    'triprex_newsletter_genaral_style_selection' => 'style_two'
                ]


            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_section_genaral_sec_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_newsletter_two_section_sec',
            [
                'label' => esc_html__(' Left Contact Information', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_newsletter_section_genaral_sec_selection',
            [
                'label'   => esc_html__('Select Style', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'phone' => esc_html__('Phone', 'triprex-core'),
                    'email' => esc_html__('Email', 'triprex-core'),
                    'others' => esc_html__('Others', 'triprex-core'),

                ],
                'default' => 'phone',
            ]

        );

        $this->add_control(
            'triprex_newsletter_contact_section_phone_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection' => 'phone'
                ]
            ]
        );


        $this->add_control(
            'triprex_newsletter_contact_section_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('More Inquiry'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection' => 'phone'
                ]

            ]
        );


        $this->add_control(
            'triprex_newsletter_contact_section_phone_text',
            [
                'label' => esc_html__('Phone Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('+990-737 621 432'),
                'placeholder' => esc_html__('Type your number here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection' => 'phone'
                ]
            ]
        );


        $this->add_control(
            'triprex_newsletter_contact_section_email_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection' => 'email'
                ]
            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_section_title_email',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Send Mail'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection' => 'email'
                ]

            ]
        );


        $this->add_control(
            'triprex_newsletter_contact_section_email_text',
            [
                'label' => esc_html__('Email ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('info@example.com'),
                'placeholder' => esc_html__('Type your email here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection' => 'email'
                ]
            ]
        );



        $this->add_control(
            'triprex_newsletter_contact_section_custom_text_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection' => 'others'
                ]
            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_section_custom_text',
            [
                'label' => esc_html__('Custom text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Custom Text'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection' => 'others'
                ]
            ]
        );

        $this->add_control(
            'triprex_newsletter_two_section_content_sec',
            [
                'label' => esc_html__('Content Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_newsletter_title_two',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Join The Newsletter'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_newsletter_content_two',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('To receive our best monthly deals '),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_newsletter_shortcode_two',
            [
                'label' => esc_html__('Shortcode', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type your shortcode here', 'triprex-core'),
                'default' => wp_kses('[mc4wp_form id=233]', wp_kses_allowed_html('post')),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_newsletter_two_section_sec_right',
            [
                'label' => esc_html__(' Right Contact Information', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_newsletter_section_genaral_sec_selection_right',
            [
                'label'   => esc_html__('Select Style', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'phone' => esc_html__('Phone', 'triprex-core'),
                    'email' => esc_html__('Email', 'triprex-core'),
                    'others' => esc_html__('Others', 'triprex-core'),

                ],
                'default' => 'email',
            ]

        );

        $this->add_control(
            'triprex_newsletter_contact_section_phone_icon_right',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection_right' => 'phone'
                ]
            ]
        );


        $this->add_control(
            'triprex_newsletter_contact_section_title_right',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('More Inquiry'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection_right' => 'phone'
                ]

            ]
        );


        $this->add_control(
            'triprex_newsletter_contact_section_phone_text_right',
            [
                'label' => esc_html__('Phone Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('+990-737 621 432'),
                'placeholder' => esc_html__('Type your number here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection_right' => 'phone'
                ]
            ]
        );


        $this->add_control(
            'triprex_newsletter_contact_section_email_icon_right',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection_right' => 'email'
                ]
            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_section_title_email_right',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Send Mail'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection_right' => 'email'
                ]

            ]
        );


        $this->add_control(
            'triprex_newsletter_contact_section_email_text_right',
            [
                'label' => esc_html__('Email ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('shijar@gmail.com'),
                'placeholder' => esc_html__('Type your email here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection_right' => 'email'
                ]
            ]
        );



        $this->add_control(
            'triprex_newsletter_contact_section_custom_text_icon_right',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection_right' => 'others'
                ]
            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_section_custom_text_right',
            [
                'label' => esc_html__('Custom text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Custom Text'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_newsletter_section_genaral_sec_selection_right' => 'others'
                ]
            ]
        );

        $this->end_controls_section();

        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_style_one_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_newsletter_genaral_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title1 span',

            ]
        );

        $this->add_control(
            'triprex_style_one_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_subtitle_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title1 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_style_one_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_newsletter_genaral_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_title_typ',
                'selector' => '{{WRAPPER}} .section-title1 h2',

            ]
        );

        $this->add_control(
            'triprex_style_one_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title1 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // =====================Style Two  =======================//

        //General Section

        $this->start_controls_section(
            'triprex_newsletter_contact_style_sec_general_section_style',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_newsletter_genaral_style_selection' => 'style_two'
                ]

            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_style_sec_general_section_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner6-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_style_sec_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner6-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //contact Section

        $this->start_controls_section(
            'triprex_newsletter_contact_style_sec',
            [
                'label' => esc_html__(' Contact Style ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_newsletter_genaral_style_selection' => 'style_two'
                ]

            ]
        );

        //title
        $this->add_control(
            'triprex_newsletter_contact_style_title_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_newsletter_contact_style_sec_typ',
                'selector' => '{{WRAPPER}} .banner6-section .single-contact .content span',

            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .single-contact .content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .single-contact .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner6-section .single-contact .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Contact Text
        $this->add_control(
            'triprex_newsletter_contact_style_contact_text_sec',
            [
                'label' => esc_html__('Contact Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_newsletter_contact_style_contact_text_typ',
                'selector' => '{{WRAPPER}} .banner6-section .single-contact .content a',

            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_style_contact_text_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .single-contact .content a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_style_contact_text_sec_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .single-contact .content a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_style_contact_text_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .single-contact .content a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_style_contact_text_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner6-section .single-contact .content a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Icon
        $this->add_control(
            'triprex_newsletter_contact_style_icon_sec',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_style_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .single-contact .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .banner6-section .single-contact .icon svg ' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_style_icon_sec_bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .single-contact .icon ' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_newsletter_contact_style_icon_sec_svg_size',
            [
                'label' => esc_html__('Icon Size', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [],
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .single-contact .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .contact-page .single-contact .icon  i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_two_style_content_sec',
            [
                'label' => esc_html__('Content Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'triprex_newsletter_contact_two_style_title_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_newsletter_contact_two_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .banner6-section .banner6-content h2',

            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_two_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .banner6-content h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_two_style_title_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .banner6-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_two_style_title_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner6-section .banner6-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_two_style_content_sec_style',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_newsletter_contact_two_style_content_sec_style_typ',
                'selector' => '{{WRAPPER}} .banner6-section .banner6-content p',

            ]
        );

        $this->add_control(
            'triprex_newsletter_contact_two_style_content_sec_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .banner6-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_two_style_content_sec_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner6-section .banner6-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_newsletter_contact_two_style_content_sec_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner6-section .banner6-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ($settings['triprex_newsletter_genaral_style_selection'] == 'style_one') : ?>
            <div class="banner3-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner3-content">
                                <?php if (!empty($settings['triprex_newsletter_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['triprex_newsletter_title']); ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_newsletter_content'])) :   ?>
                                    <p><?php echo esc_html($settings['triprex_newsletter_content']); ?></p>
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_newsletter_shortcode'])) :   ?>
                                    <?php echo do_shortcode($settings['triprex_newsletter_shortcode'])  ?>
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_banner_four_section_left_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['triprex_banner_four_section_left_image']['url']) ?>" alt="<?php echo esc_attr__('vector1', 'triprex-core') ?>" class="vector1">
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_banner_four_section_right_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['triprex_banner_four_section_right_image']['url']) ?>" alt="<?php echo esc_attr__('vector2', 'triprex-core') ?>" class="vector2">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_newsletter_genaral_style_selection'] == 'style_two') : ?>
            <div class="banner6-section" <?php if (!empty($settings['triprex_newsletter_contact_section_genaral_sec_image']['url'])) { ?> style="background-image:linear-gradient(180deg, #202f59 0%, #202f59 100%), url(<?php echo esc_url($settings['triprex_newsletter_contact_section_genaral_sec_image']['url']) ?>)" <?php }?>>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home2/home2-newsletter-vector1.png'); ?>" alt="<?php echo esc_attr__('vector1', 'triprex-core') ?>" class="vector1">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home2/home2-newsletter-vector2.png'); ?>" alt="<?php echo esc_attr__('vector2', 'triprex-core') ?>" class="vector2">
                <div class="container-fluid">
                    <div class="row g-lg-0 gy-5">
                        <div class="col-lg-3 col-sm-6 d-flex align-items-center justify-content-lg-start justify-content-center order-lg-1 order-2">
                            <div class="single-contact">
                                <?php
                                if ($settings['triprex_newsletter_section_genaral_sec_selection'] === 'phone') :
                                ?>
                                    <?php if (!empty($settings['triprex_newsletter_contact_section_phone_icon'])) :   ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['triprex_newsletter_contact_section_phone_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="content">
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_title'])) :   ?>
                                            <span><?php echo esc_html($settings['triprex_newsletter_contact_section_title']); ?></span>
                                        <?php endif ?>
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_phone_text'])) :   ?>
                                            <a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $settings['triprex_newsletter_contact_section_phone_text']); ?>"><?php echo esc_html($settings['triprex_newsletter_contact_section_phone_text']); ?></a>
                                        <?php endif ?>
                                    </div>
                                <?php elseif ($settings['triprex_newsletter_section_genaral_sec_selection'] === 'email') : ?>
                                    <?php if (!empty($settings['triprex_newsletter_contact_section_email_icon'])) :   ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['triprex_newsletter_contact_section_email_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="content">
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_title_email'])) :   ?>
                                            <span><?php echo esc_html($settings['triprex_newsletter_contact_section_title_email']); ?></span>
                                        <?php endif ?>
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_email_text'])) :   ?>
                                            <a href="tel:<?php echo esc_html($settings['triprex_newsletter_contact_section_email_text']); ?>"><?php echo esc_html($settings['triprex_newsletter_contact_section_email_text']); ?></a>
                                        <?php endif ?>
                                    </div>
                                <?php else : // 'others' 
                                ?>
                                    <?php if (!empty($settings['triprex_newsletter_contact_section_custom_text_icon'])) :   ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['triprex_newsletter_contact_section_custom_text_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="content">
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_custom_text'])) :   ?>
                                            <h6><a> <span><?php echo esc_html($settings['triprex_newsletter_contact_section_custom_text']); ?> </span></a></h6>
                                        <?php endif ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-1">
                            <div class="banner6-content">
                                <?php if (!empty($settings['triprex_newsletter_title_two'])) :   ?>
                                    <h2><?php echo esc_html($settings['triprex_newsletter_title_two']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_newsletter_content_two'])) :   ?>
                                    <p><?php echo esc_html($settings['triprex_newsletter_content_two']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_newsletter_shortcode_two'])) :   ?>
                                    <?php echo do_shortcode($settings['triprex_newsletter_shortcode_two'])  ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 d-flex align-items-center justify-content-lg-end justify-content-center order-3">
                            <div class="single-contact green">
                                <?php
                                if ($settings['triprex_newsletter_section_genaral_sec_selection_right'] === 'phone') :
                                ?>
                                    <?php if (!empty($settings['triprex_newsletter_contact_section_phone_icon_right'])) :   ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['triprex_newsletter_contact_section_phone_icon_right'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_title_right'])) :   ?>
                                            <span><?php echo esc_html($settings['triprex_newsletter_contact_section_title_right']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_phone_text_right'])) :   ?>
                                            <a href="tel:<?php echo esc_html($settings['triprex_newsletter_contact_section_phone_text_right']); ?>"><?php echo esc_html($settings['triprex_newsletter_contact_section_phone_text_right']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php elseif ($settings['triprex_newsletter_section_genaral_sec_selection_right'] === 'email') : ?>
                                    <?php if (!empty($settings['triprex_newsletter_contact_section_email_icon_right'])) :   ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['triprex_newsletter_contact_section_email_icon_right'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_title_email_right'])) :   ?>
                                            <span><?php echo esc_html($settings['triprex_newsletter_contact_section_title_email_right']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_email_text_right'])) :   ?>
                                            <a href="mailto:<?php echo esc_html($settings['triprex_newsletter_contact_section_email_text_right']); ?>"><?php echo esc_html($settings['triprex_newsletter_contact_section_email_text_right']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php else : // 'others' 
                                ?>
                                    <?php if (!empty($settings['triprex_newsletter_contact_section_custom_text_icon_right'])) :   ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['triprex_newsletter_contact_section_custom_text_icon_right'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($settings['triprex_newsletter_contact_section_custom_text_right'])) :   ?>
                                            <h6><a> <span><?php echo esc_html($settings['triprex_newsletter_contact_section_custom_text_right']); ?> </span></a></h6>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>




<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Newsletter_Widget());
