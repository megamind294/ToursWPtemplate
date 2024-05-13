<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;


class Triprex_Destination_Masonary_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_destination_masonary';
    }

    public function get_title()
    {
        return esc_html__('EG Destination Masonary', 'triprex-core');
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
            'triprex_destination_masonary_one_section_genaral',
            [
                'label' => esc_html__('Genaral Section', 'triprex-core'),

            ]
        );

        $this->add_control(
            'triprex_destination_masonary_section',
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

        $this->add_control(
            'triprex_destination_mesonary_heading_title_area',
            [
                'label' => esc_html__('Heading Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        $this->add_control(
            'triprex_destination_mesonary_style_one_vector_image',
            [
                'label' => esc_html__('Vector Image Turn On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'triprex_destination_masonary_section' => ['style_one', 'style_two'],
                ]

            ]
        );

        $this->add_control(
            'triprex_destination_mesonary_style_one_subtitle',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Journey to the', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_masonary_section' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_mesonary_style_one_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Desired Vacation Spots', 'triprex-core'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_masonary_section' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_mesonary_style_one_short_description',
            [
                'label' => esc_html__('Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.', 'triprex-core'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_masonary_section' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_mesonary_style_two_button_text_one',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View Details', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_masonary_section' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_mesonary_style_two_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('All Destination', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_masonary_section' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_mesonary_style_two_button_url',
            [
                'label' => esc_html__('Button URL', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'triprex_destination_masonary_section' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_heading_query_area',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        $this->add_control(
            'triprex_destination_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'triprex_destination_template_orderby',
            [
                'label'   => esc_html__('Order By', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'triprex-core'),
                    'author'     => esc_html__('Post Author', 'triprex-core'),
                    'title'      => esc_html__('Title', 'triprex-core'),
                    'post_date'  => esc_html__('Date', 'triprex-core'),
                    'rand'       => esc_html__('Random', 'triprex-core'),
                    'menu_order' => esc_html__('Menu Order', 'triprex-core'),
                ],
            ]
        );

        $this->add_control(
            'destination_post_list',
            [
                'label'         => esc_html__('All Post Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_destination_post_options(),
            ]
        );

        $this->add_control(
            'triprex_destination_template_order',
            [
                'label'   => esc_html__('Order', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'triprex-core'),
                    'desc' => esc_html__('Descending', 'triprex-core')

                ],
                'default' => 'desc',
            ]
        );
        $this->end_controls_section();


        //banner section
        $this->start_controls_section(
            'triprex_destination_masonary_one_section_banner',
            [
                'label' => esc_html__('Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_destination_masonary_section' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_masonary_one_section_banner_on_off',
            [
                'label' => esc_html__('Banner On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'triprex_destination_masonary_one_section_banner_subtitle',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get 10% Off', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_destination_masonary_one_section_banner_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Of Our All Destination', 'triprex-core'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_destination_masonary_one_section_banner_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Destination', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_destination_masonary_one_section_banner_btn_url',
            [
                'label' => esc_html__('Button URL', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );



        $this->end_controls_section();


        // =====================Style One=======================//
        $this->start_controls_section(
            'triprex_style_one_content_section',
            [
                'label' => esc_html__('Content Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_destination_masonary_section' => 'style_one'
                ]

            ]
        );

        $this->add_control(
            'triprex_style_one_banner_section_heading_sub_area',
            [
                'label' => esc_html__('Heading Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_banner_section_heading_sub_area_typ',
                'selector' => '{{WRAPPER}} .section-title span',

            ]
        );
        $this->add_control(
            'triprex_style_one_banner_section_heading_sub_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_banner_section_heading_sub_icon_area_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_banner_section_heading_title_area',
            [
                'label' => esc_html__('Heading Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_banner_section_heading_title_area_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );
        $this->add_control(
            'triprex_style_one_banner_section_heading_title_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_content_section_title_content',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_style_one_content_section_tabs'
        );

        $this->start_controls_tab(
            'triprex_style_one_content_section_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'triprex-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_content_section_typ',
                'selector' => '{{WRAPPER}} .destination-card .card-title h4',

            ]
        );
        $this->add_control(
            'triprex_style_one_content_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .destination-card .card-title h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_content_section_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .destination-card .card-title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_content_section_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .destination-card .card-title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_style_one_content_section_hover_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_style_one_content_section_hover_title_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_content_section_hover_typ',
                'selector' => '{{WRAPPER}} .destination-card .content h4 a',

            ]
        );

        $this->add_control(
            'triprex_style_one_content_section_color_hover',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .content h4 a' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_content_section_color_hover_border',
            [
                'label'     => esc_html__('Border Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .content h4 a' => 'border-bottom: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'triprex_style_one_content_section_hover_subtitle_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_content_section_hover_sub_typ',
                'selector' => '{{WRAPPER}} .destination-card .content .eg-tag span',

            ]
        );

        $this->add_control(
            'triprex_style_one_content_section_color_hover_sub',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .content .eg-tag span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_content_section_color_hover_sub_bg',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .content .eg-tag' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();







        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_style_one_banner_section',
            [
                'label' => esc_html__('Banner Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_destination_masonary_section' => 'style_one'
                ]

            ]
        );

        $this->add_control(
            'triprex_style_one_banner_section_subtitle',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_banner_section_subtitle_typ',
                'selector' => '{{WRAPPER}} .home1-destination-section .destination-banner .batch span',

            ]
        );

        $this->add_control(
            'triprex_style_one_banner_section_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-destination-section .destination-banner .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_banner_section_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-destination-section .destination-banner .batch' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_banner_section_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-destination-section .destination-banner .batch span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_banner_section_subtitle_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-destination-section .destination-banner .batch span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_one_banner_section_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_subtitle_typ',
                'selector' => '{{WRAPPER}} .home1-destination-section .destination-banner h2',

            ]
        );

        $this->add_control(
            'triprex_style_one_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-destination-section .destination-banner h2' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .home1-destination-section .destination-banner h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .home1-destination-section .destination-banner h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_destination_masonary_content_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_destination_masonary_content_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_destination_masonary_content_style_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'triprex-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_masonary_content_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_destination_masonary_content_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_destination_masonary_content_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_masonary_content_style_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_masonary_content_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_destination_masonary_content_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_destination_masonary_content_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_masonary_content_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        //style_two
        $this->start_controls_section(
            'triprex_style_two_content_section',
            [
                'label' => esc_html__('Content Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_destination_masonary_section' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_two_content_section_title_area',
            [
                'label' => esc_html__('Heading Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destinaton_style_two_content_section_title_area_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',
            ]
        );

        $this->add_control(
            'triprex_destinaton_style_two_content_section_title_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destinaton_style_two_content_section_description_area',
            [
                'label' => esc_html__('Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_content_section_title_area_typ',
                'selector' => '{{WRAPPER}} .section-title2 p',
            ]
        );

        $this->add_control(
            'triprex_destinaton_style_two_content_section_desc_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_content_heading_button_tab_area',
            [
                'label' => esc_html__('Heading Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_style_two_button_heading_tabs_section'
        );

        $this->start_controls_tab(
            'triprex_style_two_button_tabs_heading_section_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'triprex-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_button_heading_tabs_section_typ',
                'selector' => '{{WRAPPER}} .primary-btn4 span',
            ]
        );

        $this->add_control(
            'triprex_style_two_button_tabs_section_heading_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn4 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_button_tabs_section_heading_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn4 span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_button_tabs_heading_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn4 span' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_style_two_button_tabs_heading_section_sec_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_button_tabs_section_heading_sec_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn4 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_style_two_button_tabs_section_sec_heading_button_hover_tab',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_style_two_button_tabs_section_sec_button_heading_hover_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4 span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'triprex_destinaton_style_two_content_title_area',
            [
                'label' => esc_html__('Title Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destinaton_style_two_content_title_area_typ',
                'selector' => '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .title h4 a',
            ]
        );

        $this->add_control(
            'triprex_destinaton_style_two_content_title_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .title h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_content_title_area_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .title h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_content_tour_area',
            [
                'label' => esc_html__('Tours Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_content_tour_area_typ',
                'selector' => '{{WRAPPER}} .destination-dropdown-card .eg-batch span',
            ]
        );

        $this->add_control(
            'triprex_style_two_content_tour_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .eg-batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_content_tour_background_area',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .eg-batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_content_location_area',
            [
                'label' => esc_html__('Location Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_content_location_area_typ',
                'selector' => '{{WRAPPER}} .destination-dropdown-card .destination-wrap .destination-list li a',
            ]
        );

        $this->add_control(
            'triprex_style_two_content_location_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .destination-wrap .destination-list li a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .destination-dropdown-card .destination-wrap .destination-list li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_content_location_area_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .destination-wrap .destination-list li:hover a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .destination-dropdown-card .destination-wrap .destination-list li:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_two_content_button_tab_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // Tabs
        $this->start_controls_tabs(
            'triprex_style_two_button_tabs_section'
        );

        $this->start_controls_tab(
            'triprex_style_two_button_tabs_section_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'triprex-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_button_tabs_section_typ',
                'selector' => '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .details-btn',

            ]
        );
        $this->add_control(
            'triprex_style_two_button_tabs_section_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .destination-dropdown-card .destination-dropdown-content .details-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_button_tabs_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .destination-dropdown-card .destination-dropdown-content .details-btn' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_style_two_button_tabs_section_sec_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .details-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_button_tabs_section_sec_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .details-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_two_button_tabs_section_set_border_radius',
            [
                'label' => __('Border Radius', 'triprex-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .details-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_style_two_button_tabs_section_sec_button_hover_tab',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_style_two_button_tabs_section_sec_button_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .details-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_button_tabs_section_sec_button_hover_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .details-btn::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $selected_post_ids = $settings['destination_post_list']; // Get the selected blog post IDs from the control.
        $args = array(
            'post_type'      => 'destination',
            'posts_per_page' => $settings['triprex_destination_posts_per_page'],
            'orderby'        => $settings['triprex_destination_template_orderby'],
            'order'          => $settings['triprex_destination_template_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }
        $query = new \WP_Query($args);
?>
        <?php if ($settings['triprex_destination_masonary_section'] == 'style_one') : ?>
            <div class="home1-destination-section">
                <?php if ('yes' == $settings['triprex_destination_mesonary_style_one_vector_image']) : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/home1/section-vector2.png' ); ?>" alt="<?php echo esc_attr__('section-vector-image', 'triprex-core'); ?>" class="section-vector2">
                <?php endif; ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-40">
                                <?php if (!empty($settings['triprex_destination_mesonary_style_one_subtitle'])) : ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z"></path>
                                        </svg>
                                        <?php echo esc_html($settings['triprex_destination_mesonary_style_one_subtitle']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z"></path>
                                        </svg>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_destination_mesonary_style_one_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_destination_mesonary_style_one_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <?php
                        $counter = 0;
                        while ($query->have_posts()) :
                            $query->the_post();
                            if ($counter % 6 == 0) {
                                $col_class = 'col-lg-3 col-sm-6';
                            } elseif ($counter % 6 == 1 || $counter % 6 == 4) {
                                $col_class = ($counter % 6 == 1) ? 'col-lg-5 col-sm-6' : 'col-lg-3 col-sm-6';
                            } elseif ($counter % 6 == 2 || $counter % 6 == 5) {
                                $col_class = 'col-lg-4 col-sm-6';
                            } elseif ($counter % 6 == 3) {
                                $col_class = 'col-lg-5 col-sm-6';
                            }
                            $tourCount = \Egns_Core\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());
                        ?>
                            <div class="<?php echo esc_attr($col_class); ?>">
                                <div class="destination-card">
                                    <?php the_post_thumbnail(); ?>
                                    <div class="overlay"></div>
                                    <div class="card-title">
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                                    <div class="content">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <div class="eg-tag">
                                            <span><?php echo esc_html($tourCount) . esc_html__(' Tour', 'triprex-core'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $counter++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                        <?php if ('yes' === $settings['triprex_destination_masonary_one_section_banner_on_off']) : ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="destination-banner">
                                    <div class="destination-banner-content">
                                        <?php if (!empty($settings['triprex_destination_masonary_one_section_banner_subtitle'])) : ?>
                                            <div class="batch">
                                                <span>
                                                    <?php echo esc_html($settings['triprex_destination_masonary_one_section_banner_subtitle']); ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['triprex_destination_masonary_one_section_banner_title'])) : ?>
                                            <h2><?php echo esc_html($settings['triprex_destination_masonary_one_section_banner_title']); ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['triprex_destination_masonary_one_section_banner_btn_text'])) : ?>
                                            <a href="<?php echo esc_url($settings['triprex_destination_masonary_one_section_banner_btn_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_destination_masonary_one_section_banner_btn_text']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_destination_masonary_section'] == 'style_two') : ?>

            <div class="destination-dropdown-section">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/home3/vector/destination-vector1.svg' ); ?>" alt="<?php echo esc_attr__('vector', 'triprex-core'); ?>" class="vector1">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/home3/vector/destination-vector2.svg' ); ?>" alt="<?php echo esc_attr__('vector', 'triprex-core'); ?>" class="vector2">
                <div class="container-fluid">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <div class="section-title2 two">
                                <?php if (!empty($settings['triprex_destination_mesonary_style_one_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_destination_mesonary_style_one_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_destination_mesonary_style_one_short_description'])) : ?>
                                    <p><?php echo esc_html($settings['triprex_destination_mesonary_style_one_short_description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="section-btn">
                                <?php if (!empty($settings['triprex_destination_mesonary_style_two_button_text'])) : ?>
                                    <a href="<?php echo esc_url($settings['triprex_destination_mesonary_style_two_button_url']['url']) ?>" class="primary-btn4 two">
                                        <span>
                                            <?php echo esc_html($settings['triprex_destination_mesonary_style_two_button_text']); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                <path d="M7.70294 9.65818L7.27464 11.6673L5.29549 17.0003L6.47016 16.8046L11.9577 9.62856C12.7321 9.6016 13.4832 9.56006 14.1359 9.49563C17.1552 9.19702 16.9986 8.50013 16.9986 8.50013C16.9986 8.50013 17.1552 7.80325 14.1358 7.50464C13.4832 7.43995 12.7321 7.39845 11.9576 7.3717L6.47019 0.195477L5.29549 -5.1162e-07L7.27464 5.33303L7.70294 7.34212C6.69752 7.35717 6.01715 7.38006 6.01715 7.38006C6.01715 7.38006 4.63017 7.41207 2.48417 7.8956L0.734503 5.46859L-8.41624e-05 5.46859L0.523018 8.41949C0.428867 8.44835 0.428867 8.55195 0.523018 8.58081L-8.44274e-05 11.5317L0.734502 11.5317L2.48417 9.10495C4.63017 9.58848 6.01715 9.62001 6.01715 9.62001C6.01715 9.62001 6.69752 9.64317 7.70294 9.65818Z"></path>
                                                <path d="M11.4004 11.2692L11.4004 12.0613L8.47265 12.0613L8.47265 11.2692L11.4004 11.2692ZM11.4004 4.94234L11.4004 5.73425L8.47282 5.73425L8.47282 4.94234L11.4004 4.94234ZM9.42515 13.9276L9.42515 14.7195L6.71923 14.7195L6.71923 13.9276L9.42515 13.9276ZM9.42515 2.28418L9.42515 3.07634L6.71924 3.07634L6.71924 2.28418L9.42515 2.28418Z"></path>
                                            </svg>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="destination-dropdown-card-wrap">
                        <div class="row g-lg-4 gy-5">
                            <?php while ($query->have_posts()) :
                                $query->the_post();
                                $tourCount = \Egns_Core\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());
                            ?>

                                <div class="col-lg-6 destination-column">
                                    <div class="destination-dropdown-card">
                                        <div class="destination-dropdown-card-img">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                        <div class="eg-batch">
                                            <span><?php echo esc_html($tourCount) . esc_html__(' Tour', 'triprex-core'); ?></span>
                                        </div>
                                        <div class="destination-dropdown-content">
                                            <div class="title">
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            </div>
                                            <?php if (!empty($settings['triprex_destination_mesonary_style_two_button_text_one'])) : ?>
                                                <a href="<?php the_permalink(); ?>" class="details-btn"><?php echo esc_html($settings['triprex_destination_mesonary_style_two_button_text_one']); ?></a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="destination-dropdown-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="8" viewBox="0 0 16 8">
                                                <path d="M0.1104 2.08367e-06L0 1.39876e-06L8 8L16 0L15.8896 1.44772e-08L12.5714 9.94292e-07L8 4.57143L3.42857 1.09903e-06L0.1104 2.08367e-06Z" />
                                            </svg>
                                        </div>
                                        <div class="destination-wrap">
                                            <div class="row g-4">
                                                <div class="col-sm-12">
                                                    <ul class="destination-list">
                                                        <?php
                                                        // Get the post categories
                                                        $post_categories = get_the_terms(get_the_ID(), 'city-location');
                                                        if ($post_categories && !is_wp_error($post_categories)) {
                                                            foreach ($post_categories as $category) {
                                                        ?>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="13" viewBox="0 0 9 13">
                                                                        <path d="M4.5 0C3.30653 0 2.16193 0.50213 1.31802 1.39593C0.474106 2.28973 0 3.50198 0 4.766C0 7.28331 4.00909 12.6082 4.18091 12.8379C4.21924 12.8885 4.26781 12.9293 4.32304 12.9574C4.37827 12.9854 4.43874 13 4.5 13C4.56126 13 4.62173 12.9854 4.67696 12.9574C4.73219 12.9293 4.78076 12.8885 4.81909 12.8379C4.99091 12.6082 9 7.28331 9 4.766C9 3.50198 8.52589 2.28973 7.68198 1.39593C6.83807 0.50213 5.69347 0 4.5 0ZM4.5 6.06581C4.17636 6.06581 3.85998 5.96417 3.59089 5.77373C3.32179 5.58330 3.11205 5.31263 2.98820 4.99595C2.86434 4.67927 2.83194 4.3308 2.89508 3.99461C2.95822 3.65843 3.11407 3.34962 3.34292 3.10724C3.57177 2.86487 3.86334 2.69981 4.18076 2.63294C4.49818 2.56606 4.82720 2.60038 5.12621 2.73156C5.42522 2.86273 5.68078 3.08487 5.86059 3.36987C6.04039 3.65488 6.13636 3.98995 6.13636 4.33272C6.13636 4.79237 5.96396 5.23319 5.65708 5.55820C5.35021 5.88322 4.93399 6.06581 4.5 6.06581Z" />
                                                                    </svg> <a href="<?php echo get_term_link($category->term_id); ?>"><?php echo esc_html($category->name); ?></a>
                                                                </li>
                                                        <?php       }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>


                    </div>
                </div>
            </div>

        <?php endif; ?>



<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Destination_Masonary_Widget());
