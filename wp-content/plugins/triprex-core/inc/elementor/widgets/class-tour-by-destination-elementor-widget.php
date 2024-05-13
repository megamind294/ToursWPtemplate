<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;


class Triprex_Tour_By_Destination_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_tours_by_destination';
    }

    public function get_title()
    {
        return esc_html__('EG Tours By Destination', 'triprex-core');
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
            'triprex_tour_by_destination_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_one_heading_section',
            [
                'label' => esc_html__('Heading Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_one_heading_section_image_on_off',
            [
                'label' => esc_html__('Vector Image Turn On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',

            ]
        );


        $this->add_control(
            'triprex_tours_by_destination_one_subtitle',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Popular Tour', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_one_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Elite Tourist Attractions', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_one_title_button_text',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Book A Trip', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,


            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_heading_query_area',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_template_orderby',
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
            'tours_by_destination_post_list',
            [
                'label'         => esc_html__('All Destination Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_destination_post_options(),
            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_template_order',
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
        $this->add_control(
            'triprex_tours_by_destination_template_button',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_template_tours_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Package', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_tours_by_destination_template_tours_btn_url',
            [
                'label' => esc_html__('Button URL', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '/tour',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,

            ]
        );

        $this->end_controls_section();



        //=====================General=======================//


        //destination style
        $this->start_controls_section(
            'triprex_tour_by_destination_style_one_destination_sec',
            [
                'label' => esc_html__('Destination Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_destination_heading_sec',
            [
                'label' => esc_html__('Heading Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_destination_style_one_destination_heading_sec_typ',
                'selector' => '{{WRAPPER}} .section-title span',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_destination_heading_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_destination_heading_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_destination_sec_title',
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
                'name'     => 'triprex_tour_by_destination_style_one_destination_sec_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_destination_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_destination_sec_destination_text_active',
            [
                'label' => esc_html__('Destination Text Active', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_destination_style_one_destination_sec_destination_text_active_typ',
                'selector' => '{{WRAPPER}} .package-card-tab-section .package-card-with-tab .nav-pills .nav-item .nav-link.active',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_destination_sec_destination_text_active_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card-tab-section .package-card-with-tab .nav-pills .nav-item .nav-link.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_destination_sec_destination_text',
            [
                'label' => esc_html__('Destination Text Non-Active', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_destination_style_one_destination_sec_destination_text_typ',
                'selector' => '{{WRAPPER}} .package-card-tab-section .package-card-with-tab .nav-pills .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_destination_sec_destination_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card-tab-section .package-card-with-tab .nav-pills .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //tours card style
        $this->start_controls_section(
            'triprex_tour_by_destination_style_one_tours_sec',
            [
                'label' => esc_html__('Tours Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_tours_sec_duration_sec',
            [
                'label' => esc_html__('Tour Duration', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_destination_style_one_tours_sec_duration_typ',
                'selector' => '{{WRAPPER}} .package-card .batch .date',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_tours_sec_duration_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_tours_sec_duration_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .date' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_by_destination_style_one_tours_sec_duration_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_by_destination_style_one_tours_sec_duration_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card .batch .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_one_section',
            [
                'label' => esc_html__('Destination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_destination_destination_style_one_section_typ',
                'selector' => '{{WRAPPER}} .package-card .batch .location .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_destination_style_onesection_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .location .location-list li a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .package-card .batch .location .location-list li::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_destination_style_one_section_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .location svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_title_style_one_section',
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
                'name'     => 'triprex_tour_by_destination_title_style_one_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-top h5:hover a',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_style_title_style_one_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_by_destination_style_one_title_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_style_one_location_section',
            [
                'label' => esc_html__('Location', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_destination_content_style_one_location_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-top .location-area .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_style_one_location_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top .location-area .location-list li a' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top .location-area .location-list li::before' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_by_destination_content_location_style_one_section_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top .location-area .location-list li a:hover' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_style_one_price_section',
            [
                'label' => esc_html__('Price Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_tour_by_destination_content_style_one_price_title_section',
            [
                'label' => esc_html__('Price Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_destination_content_style_one_price_title_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_style_one_price_title_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_style_one_total_price_section',
            [
                'label' => esc_html__('Price ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_destination_content_style_one_price_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_style_one_price_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_by_destination_content_style_one_price_section_del_color',
            [
                'label'     => esc_html__('Deleted Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span del' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_style_one_total_price_tax_section',
            [
                'label' => esc_html__('Tax ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_destination_contenttotal_price_style_one_tax_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_total_price_style_one_tax_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        // Button 
        $this->add_control(
            'triprex_tour_by_destination_content_btn_style_one',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_by_destination_content_style_tabs_one'
        );

        $this->start_controls_tab(
            'triprex_tour_by_destination_content_style_normal_tab_one',
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
                'name'     => 'triprex_tour_by_destination_content_style_typ_one',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_by_destination_content_style_color_one',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn2' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .primary-btn2 svg' => 'fill: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_by_destination_content_btn_style_bac_color_one',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_by_destination_content_style_style_margin_one',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_by_destination_content_style_padding_one',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_tour_by_destination_content_style_sec_one',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_bac_color_hover_one',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_content_color_hover_one',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        // All Packages Button 
        $this->add_control(
            'triprex_tour_by_destination_all_package_content_btn_style_one',
            [
                'label' => esc_html__('All Packages Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_by_destination_all_package_content_btn_style_content_style_tabs_one'
        );

        $this->start_controls_tab(
            'triprex_tour_by_destination_all_package_content_btn_style_normal_tab_one',
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
                'name'     => 'triprex_tour_by_destination_all_package_content_btn_style_typ_one',
                'selector' => '{{WRAPPER}} .secondary-btn1',

            ]
        );
        $this->add_control(
            'triprex_tour_by_destination_all_package_content_btn_style_color_one',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_by_destination_all_package_content_btn_style_bac_color_one',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .secondary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_by_destination_all_package_content_btn_style_style_margin_one',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_by_destination_all_package_content_btn_style_padding_one',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .secondary-btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_tour_by_destination_all_package_content_btn_style_style_sec_one',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_all_package_content_btn_style_bac_color_hover_one',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_destination_all_package_content_btn_style_color_hover_one',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn1:hover' => 'color: {{VALUE}};',

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

        $destination_select_list = $settings['tours_by_destination_post_list'];
        $tours_by_destination_posts_per_page = $settings['triprex_tours_by_destination_posts_per_page'];
        $tours_by_destination_template_orderby = $settings['triprex_tours_by_destination_template_orderby'];
        $tours_by_destination_template_order = $settings['triprex_tours_by_destination_template_order'];
?>

        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".package-card-tab-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    loop: true,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".package-card-tab-next",
                        prevEl: ".package-card-tab-prev",
                    },

                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    }
                });
            </script>

        <?php endif; ?>

        <div class="package-card-tab-section">
            <?php if ('yes' == $settings['triprex_tours_by_destination_one_heading_section_image_on_off']) : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/section-vector5.png'); ?>" alt="<?php echo esc_attr__('vector', 'triprex-core'); ?>" class="section-vector5">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/section-vector6.png'); ?>" alt="<?php echo esc_attr__('vector2', 'triprex-core'); ?>" class="section-vector6">
            <?php endif; ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-60">
                            <?php if (!empty($settings['triprex_tours_by_destination_one_subtitle'])) : ?>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z" />
                                    </svg>
                                    <?php echo esc_html($settings['triprex_tours_by_destination_one_subtitle']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z" />
                                    </svg>
                                </span>
                            <?php endif; ?>
                            <?php if (!empty($settings['triprex_tours_by_destination_one_title'])) : ?>
                                <h2><?php echo esc_html($settings['triprex_tours_by_destination_one_title']); ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                $argsDestination = array(
                    'post_type'      => 'destination',
                    'posts_per_page' => $tours_by_destination_posts_per_page,
                    'orderby'        => $tours_by_destination_template_orderby,
                    'order'          => $tours_by_destination_template_order,
                    'post_status'    => 'publish',
                );
                // Add Included posts
                if (!empty($destination_select_list)) {
                    $argsDestination['post__in'] = $destination_select_list;
                }

                $destination_list = new \WP_Query($argsDestination);
                ?>

                <div class="package-card-with-tab">
                    <ul class="nav nav-pills" id="pills-tab4" role="tablist">

                        <?php
                        $count = 0;
                        while ($destination_list->have_posts()) {
                            $destination_list->the_post();

                        ?>
                            <li class="nav-item" role="presentation">
                                <div class="nav-link <?php echo $count == 0 ? 'show active' : '' ?>" id="<?php echo sanitize_title(get_the_title()) ?>-tab" data-bs-toggle="pill" data-bs-target="#<?php echo sanitize_title(get_the_title()) ?>" role="tab" aria-controls="<?php echo sanitize_title(get_the_title()) ?>" aria-selected="true"><?php the_title() ?>
                                    <div class="btn-bg">
                                        <?php the_post_thumbnail() ?>
                                    </div>
                                </div>
                            </li>
                        <?php
                            $count++;
                        }
                        wp_reset_postdata();
                        ?>
                    </ul>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content" id="pills-tab4Content">
                                <?php
                                $count = 0;
                                while ($destination_list->have_posts()) :
                                    $destination_list->the_post();
                                ?>
                                    <div class="tab-pane fade <?php echo $count == 0 ? 'show active' : '' ?>" id="<?php echo sanitize_title(get_the_title()) ?>" role="tabpanel">
                                        <div class="swiper package-card-tab-slider">
                                            <div class="swiper-wrapper">
                                                <?php

                                                $args = array(
                                                    'post_type' => 'tours',
                                                    'posts_per_page'   => -1,
                                                    'order'            => 'DESC',
                                                    'post_status'      => 'publish',
                                                    'meta_query' => array(
                                                        array(
                                                            'key'     => 'EGNS_TOURS_META_ID',
                                                            'value'   => get_the_ID(),
                                                            'compare' => 'LIKE',
                                                        ),
                                                    ),
                                                );
                                                $destination_posts = new \WP_Query($args);

                                                while ($destination_posts->have_posts()) :
                                                    $destination_posts->the_post();
                                                ?>
                                                    <div class="swiper-slide">
                                                        <div class="package-card">
                                                            <div class="package-card-img-wrap">
                                                                <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'card-thumb'); ?>" alt="<?php echo esc_attr__('vector', 'triprex-core'); ?>"></a>
                                                                <div class="batch">
                                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                                        <span class="date"><?php echo esc_html(Egns_Helper::egns_tours_value('tour_duration')); ?></span>
                                                                    <?php endif; ?>
                                                                    <?php $selected_destination = Egns_Helper::egns_tours_value('tour_destination_select'); ?>
                                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tour_destination_select'))) :  ?>
                                                                        <div class="location">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                                <path d="M8.99939 0C5.40484 0 2.48047 2.92437 2.48047 6.51888C2.48047 10.9798 8.31426 17.5287 8.56264 17.8053C8.79594 18.0651 9.20326 18.0646 9.43613 17.8053C9.68451 17.5287 15.5183 10.9798 15.5183 6.51888C15.5182 2.92437 12.5939 0 8.99939 0ZM8.99939 9.79871C7.19088 9.79871 5.71959 8.32739 5.71959 6.51888C5.71959 4.71037 7.19091 3.23909 8.99939 3.23909C10.8079 3.23909 12.2791 4.71041 12.2791 6.51892C12.2791 8.32743 10.8079 9.79871 8.99939 9.79871Z" />
                                                                            </svg>
                                                                            <ul class="location-list">
                                                                                <?php
                                                                                if (!empty($selected_destination)) {
                                                                                    foreach ($selected_destination as $destination_id) {
                                                                                        $destination_title = get_the_title($destination_id);
                                                                                        $destination_permalink = get_permalink($destination_id);
                                                                                ?>
                                                                                        <li><a href="<?php echo esc_url($destination_permalink); ?>"> <?php echo sprintf('%s', $destination_title); ?></a></li>
                                                                                <?php   }
                                                                                }
                                                                                ?>
                                                                            </ul>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="package-card-content">
                                                                <div class="card-content-top">
                                                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                                    <div class="location-area">
                                                                        <ul class="location-list scrollTextAni">
                                                                            <?php
                                                                            $selected_location = Egns_Helper::egns_tours_value('tour_destination_location_select');
                                                                            // Check if there are selected locations
                                                                            if (!empty($selected_location)) {
                                                                                foreach ($selected_location as $location_id) {
                                                                                    $term = get_term_by('slug', $location_id, 'city-location');
                                                                                    if ($term && !is_wp_error($term)) {
                                                                                        $term_name = esc_html($term->name);
                                                                                        $term_link = esc_url(get_term_link($term));
                                                                            ?>
                                                                                        <li><a href="<?php echo esc_url($term_link); ?>"><?php echo esc_html($term_name); ?></a></li>
                                                                            <?php  }
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="card-content-bottom">
                                                                    <div class="price-area">
                                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_before_price'))) : ?>
                                                                            <h6><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></h6>
                                                                        <?php endif; ?>
                                                                        <?php echo \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?>
                                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_after_price'))) : ?>
                                                                            <p><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_after_price')); ?></p>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <?php if (!empty($settings['triprex_tours_by_destination_one_title_button_text'])) : ?>
                                                                        <a class="primary-btn2" href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_tours_by_destination_one_title_button_text']); ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                                                <path d="M8.15624 10.2261L7.70276 12.3534L5.60722 18L6.85097 17.7928L12.6612 10.1948C13.4812 10.1662 14.2764 10.1222 14.9674 10.054C18.1643 9.73783 17.9985 8.99997 17.9985 8.99997C17.9985 8.99997 18.1643 8.26211 14.9674 7.94594C14.2764 7.87745 13.4811 7.8335 12.6611 7.80518L6.851 0.206972L5.60722 -5.41705e-07L7.70276 5.64663L8.15624 7.77386C7.0917 7.78979 6.37132 7.81403 6.37132 7.81403C6.37132 7.81403 4.90278 7.84793 2.63059 8.35988L0.778036 5.79016L0.000253424 5.79016L0.554115 8.91458C0.454429 8.94514 0.454429 9.05483 0.554115 9.08539L0.000253144 12.2098L0.778036 12.2098L2.63059 9.64035C4.90278 10.1523 6.37132 10.1857 6.37132 10.1857C6.37132 10.1857 7.0917 10.2102 8.15624 10.2261Z"></path>
                                                                                <path d="M12.0703 11.9318L12.0703 12.7706L8.97041 12.7706L8.97041 11.9318L12.0703 11.9318ZM12.0703 5.23292L12.0703 6.0714L8.97059 6.0714L8.97059 5.23292L12.0703 5.23292ZM9.97892 14.7465L9.97892 15.585L7.11389 15.585L7.11389 14.7465L9.97892 14.7465ZM9.97892 2.41846L9.97892 3.2572L7.11389 3.2572L7.11389 2.41846L9.97892 2.41846Z"></path>
                                                                            </svg>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                    $count++;
                                                endwhile;
                                                wp_reset_postdata();
                                                ?>
                                            </div>
                                        </div>
                                        <?php if ($destination_posts->have_posts()) : ?>
                                            <div class="row mt-50">
                                                <div class="col-lg-12">
                                                    <div class="slider-btn-grp2">
                                                        <div class="slider-btn package-card-tab-prev">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17">
                                                                <path d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z" />
                                                            </svg>
                                                        </div>
                                                        <?php if (!empty($settings['triprex_tours_by_destination_template_tours_btn_text'])) : ?>
                                                            <a href="<?php echo esc_url($settings['triprex_tours_by_destination_template_tours_btn_url']['url']) ?>" class="secondary-btn1"><?php echo esc_html($settings['triprex_tours_by_destination_template_tours_btn_text']); ?></a>
                                                        <?php endif ?>
                                                        <div class="slider-btn package-card-tab-next">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17" fill="none">
                                                                <path d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Tour_By_Destination_Widget());
