<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;


class Triprex_Feature_Tour_Card_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_feature_tour_card';
    }

    public function get_title()
    {
        return esc_html__('EG Feature Tour Card', 'triprex-core');
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
            'triprex_feature_tour_card_section_Banner_section',
            [
                'label' => esc_html__('Banner Section', 'triprex-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_feature_tour_card_banner_bg_image',
            [
                'label' => esc_html__('Banner Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_feature_tour_card_banner_title',
            [
                'label' => esc_html__('Banner Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Savings worldwide', 'triprex-core'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_feature_tour_card_banner_offer_text',
            [
                'label' => esc_html__('Offer Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('20% Off', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_feature_tour_card_section_banner_content_link_text',
            [
                'label' => esc_html__('Content Link Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Discover Great Deal'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_feature_tour_card_section_banner_content_link_url',
            [
                'label' => esc_html__('URL', 'triprex-core'),
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

        $repeater->add_control(
            'triprex_feature_tour_card_section_banner_content_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('View This Trip'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_feature_tour_card_section_banner_button_url',
            [
                'label' => esc_html__('URL', 'triprex-core'),
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

        $this->add_control(
            'triprex_feature_tour_card_section_banner_list',
            [
                'label' => esc_html__('Banner List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_feature_tour_card_banner_title' => esc_html__('Savings worldwide', 'triprex-core'),
                        'triprex_feature_tour_card_banner_offer_text' => esc_html__('20% Off', 'triprex-core'),
                        'triprex_feature_tour_card_section_banner_content_link_text' => esc_html__('Discover Great Deal', 'triprex-core'),
                    ],
                ],
                'title_field' => '{{{ triprex_feature_tour_card_banner_title  }}}',
            ]
        );

        $this->end_controls_section();


        //query section
        $this->start_controls_section(
            'triprex_feature_tour_card_section_query_section',
            [
                'label' => esc_html__('Query Section', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_heading_query_area',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_template_orderby',
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
            'feature_tour_card_post_list',
            [
                'label'         => esc_html__('All Post Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_tours_post_options(),
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_template_order',
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
            'triprex_feature_tour_card_one_bottom_button',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_one_bottom_button_text',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Package', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        //=====================Style One=======================//

        //banner style
        $this->start_controls_section(
            'triprex_feature_tour_card_style_banner',
            [
                'label' => esc_html__('Banner Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_banner_title_sec',
            [
                'label' => esc_html__('Banner Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_feature_tour_card_style_banner_title_sec_typ',
                'selector' => '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content span',

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_banner_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_banner_offer_text_sec',
            [
                'label' => esc_html__('Offer Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_feature_tour_card_style_banner_offer_text_sec_typ',
                'selector' => '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content h3',

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_banner_offer_text_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_tour_card_style_banner_content_text_sec',
            [
                'label' => esc_html__('Content Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_feature_tour_card_style_banner_content_text_sec_typ',
                'selector' => '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content .text',

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_banner_content_text_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content .text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_two_button_area',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        // Tabs
        $this->start_controls_tabs(
            'triprex_feature_tour_card_style_two_button_area_tabs'
        );

        $this->start_controls_tab(
            'triprex_feature_tour_card_style_two_button_area_normal_tab',
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
                'name'     => 'triprex_feature_tour_card_style_two_button_area_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_feature_tour_card_style_two_button_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',



                ],
            ]
        );
        $this->add_control(
            'triprex_feature_tour_card_style_two_button_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_tour_card_style_two_button_area_margin',
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
            'triprex_feature_tour_card_style_two_button_area_padding',
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
            'triprex_feature_tour_card_style_two_button_area_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_two_button_area_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_two_button_area_hover_text',
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

        //tourstyle
        $this->start_controls_section(
            'triprex_feature_tour_card_style_one',
            [
                'label' => esc_html__('Tour Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_review_sec',
            [
                'label' => esc_html__('Review Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_feature_tour_card_style_one_review_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .rating-area span',

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_review_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_review_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .rating-area .rating li i' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_tour_card_style_one_title_sec',
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
                'name'     => 'triprex_feature_tour_card_style_one_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_tours_meta_sec',
            [
                'label' => esc_html__('Tours Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_feature_tour_card_style_one_tours_meta_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-top .feature-list li',

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_tours_meta_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top .feature-list li' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_tours_meta_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top .feature-list li svg.with-stroke' => 'stroke: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'triprex_feature_tour_card_style_one_price_area_sec',
            [
                'label' => esc_html__('Pricing Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_price_title_sec',
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
                'name'     => 'triprex_feature_tour_card_style_one_price_title_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span',
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_price_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_price_sec_area',
            [
                'label' => esc_html__('Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_feature_tour_card_style_one_price_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_button_area',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        // Tabs
        $this->start_controls_tabs(
            'triprex_feature_tour_card_style_one_button_area_tabs'
        );

        $this->start_controls_tab(
            'triprex_feature_tour_card_style_one_button_area_normal_tab',
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
                'name'     => 'triprex_feature_tour_card_style_one_button_area_typ',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_feature_tour_card_style_one_button_area_color',
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
            'triprex_feature_tour_card_style_one_button_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_tour_card_style_one_button_area_margin',
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
            'triprex_feature_tour_card_style_one_button_area_padding',
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
            'triprex_feature_tour_card_style_one_button_area_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_button_area_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_button_area_hover_text',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn2:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'triprex_feature_tour_card_style_one_pagination_sec_area',
            [
                'label' => esc_html__('Pagination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_feature_tour_card_style_one_pagination_sec_typ',
                'selector' => '{{WRAPPER}} .slide-and-view-btn-grp .slider-btn-grp3 .slider-btn span',

            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_pagination_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-and-view-btn-grp .slider-btn-grp3 .slider-btn span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .slide-and-view-btn-grp .slider-btn-grp3 .slider-btn i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_feature_tour_card_style_one_pagination_sec_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-and-view-btn-grp .slider-btn-grp3 .slider-btn:hover span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .slide-and-view-btn-grp .slider-btn-grp3 .slider-btn:hover i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_feature_tour_card_section_banner_list'];
        $selected_post_ids = $settings['feature_tour_card_post_list'];
        $args = array(
            'post_type'      => 'tours',
            'posts_per_page' => $settings['triprex_feature_tour_card_posts_per_page'],
            'orderby'        => $settings['triprex_feature_tour_card_template_orderby'],
            'order'          => $settings['triprex_feature_tour_card_template_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }
        $query = new \WP_Query($args);
?>
        <div class="feature-card-section">
            <div class="banner4-slider-wrapper">
                <div class="row g-xl-4 gy-5 mb-60">
                    <div class="col-xl-5">
                        <div class="swiper banner4-card-slide">
                            <div class="swiper-wrapper">
                                <?php foreach ((array)$data as $item) : ?>
                                    <div class="swiper-slide">
                                        <div class="banner4-card">
                                            <?php if (!empty($item['triprex_feature_tour_card_banner_bg_image']['url'])) : ?>
                                                <img src="<?php echo esc_url($item['triprex_feature_tour_card_banner_bg_image']['url']) ?>" alt="<?php echo esc_attr__('image', 'triprex-core'); ?>">
                                            <?php endif; ?>
                                            <div class="banner4-content-wrapper">
                                                <div class="banner4-content">
                                                    <?php if (!empty($item['triprex_feature_tour_card_banner_title'])) : ?>
                                                        <span><?php echo esc_html($item['triprex_feature_tour_card_banner_title']) ?></span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['triprex_feature_tour_card_banner_offer_text'])) : ?>
                                                        <h3><?php echo esc_html($item['triprex_feature_tour_card_banner_offer_text']) ?></h3>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['triprex_feature_tour_card_section_banner_content_link_text'])) : ?>
                                                        <a href="<?php echo esc_url($item['triprex_feature_tour_card_section_banner_content_link_url']['url']) ?>" class="text"><?php echo esc_html($item['triprex_feature_tour_card_section_banner_content_link_text']) ?></a>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['triprex_feature_tour_card_section_banner_content_btn_text'])) : ?>
                                                        <a href="<?php echo esc_url($item['triprex_feature_tour_card_section_banner_button_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($item['triprex_feature_tour_card_section_banner_content_btn_text']) ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="swiper package-card3-slide">
                            <div class="swiper-wrapper">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <div class="package-card3 style-2">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <a href="<?php the_permalink(); ?>" class="package-card-img">
                                                    <?php the_post_thumbnail('card-thumb'); ?>
                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tour_featured_batch'))) : ?>
                                                        <?php $class_n = Egns_Helper::getBackgroundColorClass() ?>
                                                        <div class="eg-tag <?php echo $class_n ?>">
                                                            <span><?php echo esc_html__(Egns_Helper::egns_tours_value('tour_featured_batch')); ?></span>
                                                        </div>
                                                    <?php endif; ?>
                                                </a>
                                            <?php endif; ?>
                                            <div class="package-card-content">
                                                <div class="card-content-top">
                                                    <?php if (function_exists('run_reviewx')) : ?>
                                                        <div class="rating-area">
                                                            <?php echo do_shortcode('[rvx-star-count]') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                    <ul class="feature-list">
                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                            <li>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                                                    <g clip-path="url(#clip0_1225_43)">
                                                                        <path d="M11.9383 6.40178V2.87087C11.9383 2.03169 11.2511 1.33856 10.4118 1.33856H10.2217V1.0992C10.2217 0.500453 9.73629 0.0150575 9.13755 0.0150575C8.5388 0.0150575 8.0534 0.500453 8.0534 1.0992V1.33856H4.07821V1.0992C4.07821 0.492141 3.58607 0 2.97901 0C2.37195 0 1.87981 0.492141 1.87981 1.0992V1.33856H1.71553C0.87631 1.33856 0.193359 2.03169 0.193359 2.87087V10.9786C0.193359 11.8178 0.87631 12.5113 1.71553 12.5113H6.4916C6.88058 12.9765 7.36678 13.351 7.916 13.6082C8.46522 13.8654 9.06412 13.9991 9.67058 14C11.9503 14 13.8073 12.1426 13.8073 9.86282C13.8074 8.41786 13.0525 7.14122 11.9383 6.40178ZM8.6557 1.0992C8.65107 0.836899 8.85991 0.620492 9.12222 0.615854C9.12643 0.615794 9.13065 0.615763 9.13487 0.615794C9.39964 0.612993 9.61659 0.825365 9.61939 1.09017C9.61942 1.09318 9.61942 1.09619 9.61939 1.0992V2.27212H8.6557V1.0992ZM2.48211 1.0992C2.48497 0.82934 2.70607 0.612903 2.97593 0.615763C2.9764 0.615758 2.97686 0.615768 2.97732 0.615794C3.24818 0.615794 3.47591 0.828376 3.47591 1.0992V2.27212H2.48211V1.0992ZM0.795661 2.87087C0.795661 2.36376 1.20842 1.94086 1.71553 1.94086H1.87981V2.5858C1.87981 2.7521 2.0187 2.87443 2.18502 2.87443H3.76968C3.93597 2.87443 4.07821 2.7521 4.07821 2.5858V1.94086H8.0534V2.5858C8.0523 2.62405 8.05903 2.66211 8.07317 2.69766C8.08732 2.7332 8.10858 2.76548 8.13566 2.79251C8.16273 2.81954 8.19505 2.84075 8.23062 2.85484C8.26619 2.86893 8.30427 2.87559 8.34251 2.87443H9.92716C9.96569 2.87571 10.0041 2.86916 10.04 2.85519C10.0759 2.84121 10.1086 2.8201 10.1362 2.79312C10.1637 2.76614 10.1855 2.73386 10.2002 2.69822C10.2149 2.66259 10.2222 2.62435 10.2217 2.5858V1.94086H10.4118C10.9223 1.94601 11.334 2.36033 11.3359 2.87087V3.83811H0.795661V2.87087ZM1.71553 11.909C1.20842 11.909 0.795661 11.4857 0.795661 10.9786V4.44041H11.3359V6.07428C10.8117 5.84412 10.2454 5.72538 9.67287 5.7256C7.39316 5.7256 5.53725 7.58572 5.53725 9.8655C5.5361 10.5817 5.72124 11.2859 6.07448 11.909H1.71553ZM9.67058 13.3923C7.71979 13.3923 6.13835 11.8109 6.13835 9.86011C6.13835 7.90931 7.71979 6.32788 9.67058 6.32788C11.6214 6.32788 13.2028 7.90931 13.2028 9.86011V9.86014C13.2006 11.81 11.6205 13.3901 9.67058 13.3923Z" />
                                                                        <path d="M11.0896 9.8611H9.77027V8.04908C9.77027 7.88275 9.63545 7.74792 9.46912 7.74792C9.30279 7.74792 9.16797 7.88275 9.16797 8.04908V10.162C9.16923 10.2424 9.20213 10.3192 9.25955 10.3756C9.31697 10.432 9.39429 10.4636 9.47478 10.4634H11.0896C11.2559 10.4634 11.3908 10.3286 11.3908 10.1623C11.3908 9.99593 11.2559 9.8611 11.0896 9.8611Z" />
                                                                    </g>
                                                                </svg>
                                                                <?php echo esc_html__(Egns_Helper::egns_tours_value('tour_duration')); ?>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php
                                                        $selected_location = Egns_Helper::egns_tours_value('tour_destination_location_select');
                                                        if (!empty($selected_location)) {
                                                            $numberOfLocations = count($selected_location); ?>
                                                            <li>
                                                                <svg class="with-stroke" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                                                    <g clip-path="url(#clip0_1225_49)">
                                                                        <path d="M6.99999 13.5898C5.35937 11.1289 2.48828 7.79299 2.48828 4.9219C2.48828 2.43415 4.51223 0.410197 6.99999 0.410197C9.48774 0.410197 11.5117 2.43415 11.5117 4.9219C11.5117 7.79299 8.64061 11.1289 6.99999 13.5898Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M6.99999 6.97266C5.86925 6.97266 4.94922 6.05262 4.94922 4.92188C4.94922 3.79114 5.86925 2.87111 6.99999 2.87111C8.13074 2.87111 9.05077 3.79114 9.05077 4.92188C9.05077 6.05262 8.13074 6.97266 6.99999 6.97266Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </g>
                                                                </svg>
                                                                <?php echo esc_html__($numberOfLocations, 'triprex-core'); ?> <?php echo esc_html__('Location', 'triprex-core'); ?>
                                                            </li>
                                                        <?php }  ?>
                                                        <?php
                                                        $selected_destination = Egns_Helper::egns_tours_value('tour_destination_select');

                                                        if (is_array($selected_destination)) {
                                                            $numberOfDestinations = count($selected_destination); ?>
                                                            <li>
                                                                <svg class="with-stroke" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                                                    <g clip-path="url(#clip0_1225_55)">
                                                                        <path d="M2.07812 4.19617e-05V14" stroke-miterlimit="10" />
                                                                        <path d="M2.07812 1.23049C2.07812 1.23049 3.30859 2.0508 4.53906 2.0508C6.50515 2.0508 7.49482 0.41018 9.46092 0.41018C10.6914 0.41018 11.9218 1.23049 11.9218 1.23049V7.79297C11.9218 7.79297 10.6914 6.97266 9.46092 6.97266C7.49482 6.97266 6.50515 8.61328 4.53906 8.61328C3.30859 8.61328 2.07812 7.79297 2.07812 7.79297" stroke-miterlimit="10" />
                                                                    </g>
                                                                </svg>
                                                                <?php echo esc_html__($numberOfDestinations, 'triprex-core'); ?> <?php echo esc_html__('Countries', 'triprex-core'); ?>
                                                            </li>
                                                        <?php }  ?>
                                                    </ul>
                                                </div>
                                                <div class="card-content-bottom">
                                                    <div class="price-area">
                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_before_price'))) : ?>
                                                            <span><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></span>
                                                        <?php endif; ?>
                                                        <h6><?php echo \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?></h6>
                                                    </div>
                                                    <?php if (!empty($settings['triprex_feature_tour_card_one_bottom_button_text'])) : ?>
                                                        <a href="<?php the_permalink(); ?>" class="primary-btn2"><?php echo esc_html($settings['triprex_feature_tour_card_one_bottom_button_text']) ?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                                <path d="M8.15624 10.2261L7.70276 12.3534L5.60722 18L6.85097 17.7928L12.6612 10.1948C13.4812 10.1662 14.2764 10.1222 14.9674 10.054C18.1643 9.73783 17.9985 8.99997 17.9985 8.99997C17.9985 8.99997 18.1643 8.26211 14.9674 7.94594C14.2764 7.87745 13.4811 7.8335 12.6611 7.80518L6.851 0.206972L5.60722 -5.41705e-07L7.70276 5.64663L8.15624 7.77386C7.0917 7.78979 6.37132 7.81403 6.37132 7.81403C6.37132 7.81403 4.90278 7.84793 2.63059 8.35988L0.778036 5.79016L0.000253424 5.79016L0.554115 8.91458C0.454429 8.94514 0.454429 9.05483 0.554115 9.08539L0.000253144 12.2098L0.778036 12.2098L2.63059 9.64035C4.90278 10.1523 6.37132 10.1857 6.37132 10.1857C6.37132 10.1857 7.0917 10.2102 8.15624 10.2261Z" />
                                                                <path d="M12.0703 11.9318L12.0703 12.7706L8.97041 12.7706L8.97041 11.9318L12.0703 11.9318ZM12.0703 5.23292L12.0703 6.0714L8.97059 6.0714L8.97059 5.23292L12.0703 5.23292ZM9.97892 14.7465L9.97892 15.585L7.11389 15.585L7.11389 14.7465L9.97892 14.7465ZM9.97892 2.41846L9.97892 3.2572L7.11389 3.2572L7.11389 2.41846L9.97892 2.41846Z" />
                                                            </svg>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slide-and-view-btn-grp">
                            <div class="slider-btn-grp3">
                                <div class="slider-btn banner4-slider-prev">
                                    <i class="bi bi-arrow-left"></i>
                                    <span><?php echo esc_html__('PREV', 'triprex-core'); ?></span>
                                </div>
                                <div class="slider-btn banner4-slider-next">
                                    <span><?php echo esc_html__('NEXT', 'triprex-core'); ?></span>
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Feature_Tour_Card_Widget());
