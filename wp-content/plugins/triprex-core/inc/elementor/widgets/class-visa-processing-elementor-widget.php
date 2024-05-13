<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;


class Triprex_Visa_Processing_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_visa_processing';
    }

    public function get_title()
    {
        return esc_html__('EG Visa Processing', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'triprex_visa_processing_one_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_visa_processing_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'triprex-core'),
                    'style_two' => esc_html__('Style Two', 'triprex-core'),
                    'style_three' => esc_html__('Style Three', 'triprex-core'),
                    'style_four' => esc_html__('Style Four', 'triprex-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'triprex_visa_slider_heading_section',
            [
                'label' => esc_html__('Heading Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_visa_slider_carousel_on_off',
            [
                'label' => esc_html__('Slider Carousel On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => ['style_one', 'style_two']
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_slider_sub_title',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Visa Services', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => ['style_one', 'style_three', 'style_four']
                ]

            ]
        );

        $this->add_control(
            'triprex_visa_slider_title_carousel_on_off',
            [
                'label' => esc_html__('Subtitle Icon On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => ['style_four']
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_slider_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Visa Processing', 'triprex-core'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_visa_slider_short_description',
            [
                'label' => esc_html__('Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim.', 'triprex-core'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => ['style_two']
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_heading_button_area_sec_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Apply Now', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => ['style_two', 'style_three', 'style_four']
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_heading_query_area',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        $this->add_control(
            'triprex_visa_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'triprex_visa_template_orderby',
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
            'visa_post_list',
            [
                'label'         => esc_html__('All Post Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_visa_post_options(),
            ]
        );

        $this->add_control(
            'triprex_visa_template_order',
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
            'triprex_visa_button_area_sec',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => ['style_two', 'style_three', 'style_four']
                ]

            ]
        );

        $this->add_control(
            'triprex_visa_button_area_sec_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Destination', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => ['style_two', 'style_three', 'style_four']
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_button_area_sec_btn_url',
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
                    'triprex_visa_processing_content_style_selection' => ['style_two', 'style_three', 'style_four']
                ]
            ]
        );

        $this->end_controls_section();


        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_style_one_heading_style',
            [
                'label' => esc_html__('Heading Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'triprex_visa_processing_subtitle',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title span',

            ]
        );

        $this->add_control(
            'triprex_style_one_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title span svg' => 'fill: {{VALUE}};',
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
                    '{{WRAPPER}} .section-title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_processing_title',
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
                'name'     => 'triprex_style_one_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'triprex_style_one_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .section-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_processing_content_style',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_visa_processing_content_title_style',
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
                'name'     => 'triprex_visa_processing_content_title_style_typ',
                'selector' => '{{WRAPPER}} .package-card2 .package-card2-content .title h6',

            ]
        );

        $this->add_control(
            'triprex_visa_processing_content_title_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card2 .package-card2-content .title h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_visa_processing_content_title_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .package-card2 .package-card2-content .title h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_visa_processing_content_title_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card2 .package-card2-content .title h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_processing_content_price_style',
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
                'name'     => 'triprex_visa_processing_content_price_style_typ',
                'selector' => '{{WRAPPER}} .package-card2 .package-card2-content .price-area span',

            ]
        );

        $this->add_control(
            'triprex_visa_processing_content_price_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card2 .package-card2-content .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_processing_content_price_tax_style',
            [
                'label' => esc_html__('Tax', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_processing_content_price_tax_tyle_typ',
                'selector' => '{{WRAPPER}} .package-card2 .package-card2-content .price-area p',

            ]
        );

        $this->add_control(
            'triprex_visa_processing_content_price_tax_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card2 .package-card2-content .price-area p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // =====================Style Two=======================//

        $this->start_controls_section(
            'triprex_visa_process_style_two_content_area',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_heading_title',
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
                'name'     => 'triprex_visa_process_style_two_content_area_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_visa_process_style_two_content_area_heading_description',
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
                'name'     => 'triprex_visa_process_style_two_content_area_heading_description_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_heading_description_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_heading_btn',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_process_style_two_content_area_heading_btn_typ',
                'selector' => '{{WRAPPER}} .view-btn',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_heading_btn_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .view-btn .arrow svg' => 'stroke: {{VALUE}};',
                    '{{WRAPPER}} .view-btn .arrow' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_heading_btn_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn .arrow' => 'background-color: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'triprex_visa_process_style_two_content_area_heading_btn_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .view-btn:hover .arrow svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_title',
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
                'name'     => 'triprex_visa_process_style_two_content_area_title_typ',
                'selector' => '{{WRAPPER}} .package-card4 .package-card-content .card-content-top h5',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .package-card-content .card-content-top h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_visa_meta_text',
            [
                'label' => esc_html__('Visa Meta Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_process_style_two_content_area_visa_meta_text_typ',
                'selector' => '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li span',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_visa_meta_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_visa_process_style_two_content_area_visa_meta',
            [
                'label' => esc_html__('Visa Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_process_style_two_content_area_visa_meta_typ',
                'selector' => '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_visa_meta_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_button_sec',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_visa_process_style_two_content_area_button_sec_tab'
        );

        $this->start_controls_tab(
            'triprex_visa_process_style_two_content_area_button_sec_normal_tab',
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
                'name'     => 'triprex_visa_process_style_two_content_area_button_sec_typ',
                'selector' => '{{WRAPPER}} .package-card4 .apply-btn',

            ]
        );
        $this->add_control(
            'triprex_visa_process_style_two_content_area_button_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_button_sec_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_visa_process_style_two_content_area_button_sec_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_visa_process_style_two_content_area_button_sec_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_visa_process_style_two_content_area_button_sec_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_button_sec_hover_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_two_content_area_button_sec_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();



        // =====================Style Three=======================//

        $this->start_controls_section(
            'triprex_visa_process_style_three_content_area',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_heading_subtitle',
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
                'name'     => 'triprex_visa_process_style_three_content_area_heading_sub_title_typ',
                'selector' => '{{WRAPPER}} .section-title4 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_heading_sub_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_heading_sub_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_heading_title',
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
                'name'     => 'triprex_visa_process_style_three_content_area_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_heading_btn',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_process_style_three_content_area_heading_btn_typ',
                'selector' => '{{WRAPPER}} .secondary-btn3 span',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_heading_btn_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn3 span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_heading_btn_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn3' => 'background-color: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'triprex_visa_process_style_three_content_area_heading_btn_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn3 ::after' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_title',
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
                'name'     => 'triprex_visa_process_style_three_content_area_title_typ',
                'selector' => '{{WRAPPER}} .package-card4 .package-card-content .card-content-top h5',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .package-card-content .card-content-top h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_visa_meta_text',
            [
                'label' => esc_html__('Visa Meta Label', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_process_style_three_content_area_visa_meta_text_typ',
                'selector' => '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li span',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_visa_meta_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_visa_process_style_three_content_area_visa_meta',
            [
                'label' => esc_html__('Visa Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_process_style_three_content_area_visa_meta_typ',
                'selector' => '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_visa_meta_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_button_sec',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_visa_process_style_three_content_area_button_sec_tab'
        );

        $this->start_controls_tab(
            'triprex_visa_process_style_three_content_area_button_sec_normal_tab',
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
                'name'     => 'triprex_visa_process_style_three_content_area_button_sec_typ',
                'selector' => '{{WRAPPER}} .package-card4 .apply-btn',

            ]
        );
        $this->add_control(
            'triprex_visa_process_style_three_content_area_button_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .package-card4.two .apply-btn .arrow i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_button_sec_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_visa_process_style_three_content_area_button_sec_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_visa_process_style_three_content_area_button_sec_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_visa_process_style_three_content_area_button_sec_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_button_sec_hover_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .package-card4.two .apply-btn:hover .arrow i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_three_content_area_button_sec_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // =====================Style Four=======================//

        $this->start_controls_section(
            'triprex_visa_process_style_four_content_area',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_visa_processing_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_heading_subtitle',
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
                'name'     => 'triprex_visa_process_style_four_content_area_heading_sub_title_typ',
                'selector' => '{{WRAPPER}} .section-title5 span',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_heading_sub_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_heading_sub_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_heading_title',
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
                'name'     => 'triprex_visa_process_style_four_content_area_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title5 h2',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_heading_btn',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_process_style_four_content_area_heading_btn_typ',
                'selector' => '{{WRAPPER}} .secondary-btn4',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_heading_btn_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_heading_btn_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4' => 'background-color: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'triprex_visa_process_style_four_content_area_heading_btn_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4::after' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_title',
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
                'name'     => 'triprex_visa_process_style_four_content_area_title_typ',
                'selector' => '{{WRAPPER}} .package-card4 .package-card-content .card-content-top h5',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .package-card-content .card-content-top h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_visa_meta_text',
            [
                'label' => esc_html__('Visa Meta Label', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_process_style_four_content_area_visa_meta_text_typ',
                'selector' => '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li span',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_visa_meta_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_visa_process_style_four_content_area_visa_meta',
            [
                'label' => esc_html__('Visa Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_visa_process_style_four_content_area_visa_meta_typ',
                'selector' => '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li',

            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_visa_meta_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .package-card-content .card-content-top ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_button_sec',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_visa_process_style_four_content_area_button_sec_tab'
        );

        $this->start_controls_tab(
            'triprex_visa_process_style_four_content_area_button_sec_normal_tab',
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
                'name'     => 'triprex_visa_process_style_four_content_area_button_sec_typ',
                'selector' => '{{WRAPPER}} .package-card4 .apply-btn',

            ]
        );
        $this->add_control(
            'triprex_visa_process_style_four_content_area_button_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .package-card4.two .apply-btn .arrow i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_button_sec_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_visa_process_style_four_content_area_button_sec_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_visa_process_style_four_content_area_button_sec_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card4 .apply-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_visa_process_style_four_content_area_button_sec_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_button_sec_hover_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .package-card4.two .apply-btn:hover .arrow i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_visa_process_style_four_content_area_button_sec_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card4 .apply-btn::after' => 'background-color: {{VALUE}};',
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
        $selected_post_ids = $settings['visa_post_list'];
        $args = array(
            'post_type'      => 'visa',
            'posts_per_page' => $settings['triprex_visa_posts_per_page'],
            'orderby'        => $settings['triprex_visa_template_orderby'],
            'order'          => $settings['triprex_visa_template_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }
        $query = new \WP_Query($args);
?>
        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".package-card2-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    // autoplay: {
                    // 	delay: 2500, // Autoplay duration in milliseconds
                    // 	disableOnInteraction: false,
                    // },
                    navigation: {
                        nextEl: ".package-card2-next",
                        prevEl: ".package-card2-prev",
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

                var swiper = new Swiper(".package-card4-slider", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 25,
                    navigation: {
                        nextEl: ".package-card4-slider-next",
                        prevEl: ".package-card4-slider-prev",
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
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 2,
                        },
                    }
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['triprex_visa_processing_content_style_selection'] == 'style_one') : ?>
            <div class="visa-section">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/section-vector2.png'); ?>" alt="<?php echo esc_attr__('vector', 'triprex-core') ?>" class="section-vector2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3 mb-60">
                            <div class="section-title">
                                <?php if (!empty($settings['triprex_visa_slider_sub_title'])) : ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z" />
                                        </svg>
                                        <?php echo esc_html($settings['triprex_visa_slider_sub_title']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z" />
                                        </svg>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_visa_slider_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_visa_slider_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <?php if ('yes' == $settings['triprex_visa_slider_carousel_on_off']) : ?>
                                <div class="slider-btn-grp2">
                                    <div class="slider-btn package-card2-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17">
                                            <path d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z" />
                                        </svg>
                                    </div>
                                    <div class="slider-btn package-card2-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17" fill="none">
                                            <path d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z" />
                                        </svg>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper package-card2-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post(); ?>
                                        <div class="swiper-slide">
                                            <div class="package-card2">
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('card-thumb'); ?></a>
                                                <div class="eg-tag">
                                                    <?php
                                                    $terms = get_the_terms(get_the_ID(), 'country');

                                                    if ($terms && !is_wp_error($terms)) {
                                                        $term = current($terms);
                                                        if ($term) {
                                                            $term_link = get_term_link($term);
                                                            $term_name = esc_html($term->name);
                                                        }
                                                    }
                                                    ?>
                                                    <?php if (!empty($term_name)) : ?>
                                                        <h4><a href="<?php echo esc_url($term_link); ?>"><?php echo esc_html__($term_name, 'triprex-core'); ?></a></h4>
                                                    <?php endif; ?>
                                                </div>
                                                <?php
                                                $terms = get_the_terms(get_the_ID(), 'visa-mode');

                                                if ($terms && !is_wp_error($terms)) {
                                                    $term = current($terms);
                                                    if ($term) {
                                                        $term_link = get_term_link($term);
                                                        $term_name = esc_html($term->name);
                                                    }
                                                }
                                                ?>
                                                <div class="package-card2-content">
                                                    <?php if (!empty($term_name)) : ?>
                                                        <div class="title">
                                                            <h6><?php echo esc_html__($term_name, 'triprex-core'); ?></h6>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php
                                                    $visa_pack_price = \Egns_Core\Egns_Helper::egns_get_visa_pack_price();
                                                    if (!empty($visa_pack_price)) {
                                                    ?>
                                                        <div class="price-area">
                                                            <?php echo $visa_pack_price; ?>
                                                            <p><?php echo \Egns\Helper\Egns_Helper::egns_visa_value('visa_cost_select') ?></p>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
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
                </div>
            </div>
        <?php endif; ?>
        <?php if ($settings['triprex_visa_processing_content_style_selection'] == 'style_two') : ?>
            <div class="home4-visa-application-section">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <div class="section-title3">
                                <?php if (!empty($settings['triprex_visa_slider_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_visa_slider_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_visa_slider_short_description'])) : ?>
                                    <p><?php echo esc_html($settings['triprex_visa_slider_short_description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['triprex_visa_button_area_sec_btn_text'])) : ?>
                                <a href="<?php echo esc_url($settings['triprex_visa_button_area_sec_btn_url']['url']) ?>" class="view-btn"><?php echo esc_html($settings['triprex_visa_button_area_sec_btn_text']); ?>
                                    <div class="arrow">
                                        <svg width="18" height="16" viewBox="0 0 18 16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.73828 11.75L15.6103 4.31833" stroke-linecap="round" />
                                            <path d="M13.3477 10.3057L15.6115 4.31789L9.29402 3.28456" stroke-linecap="round" />
                                        </svg>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="package-card4-slider-wrapper">
                    <div class="container-fluid">
                        <div class="row mb-50">
                            <div class="col-lg-12">
                                <div class="swiper package-card4-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                                        while ($query->have_posts()) :
                                            $query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <div class="package-card4">
                                                    <a href="<?php the_permalink(); ?>" class="package-card-img">
                                                        <?php the_post_thumbnail('card-thumb'); ?>
                                                    </a>
                                                    <div class="package-card-content">
                                                        <div class="card-content-top">
                                                            <h5><?php the_title(); ?></h5>
                                                            <ul>
                                                                <?php
                                                                $terms = get_the_terms(get_the_ID(), 'country');
                                                                if ($terms && !is_wp_error($terms)) : ?>
                                                                    <li><span><?php echo esc_html__('Country', 'triprex-core'); ?> :</span>
                                                                        <?php
                                                                        $term_names = array_map(function ($term) {
                                                                            return esc_html__($term->name, 'triprex-core');
                                                                        }, $terms);
                                                                        echo implode(', ', $term_names);
                                                                        ?>
                                                                    </li>
                                                                <?php endif;
                                                                ?>
                                                                <?php
                                                                $terms = get_the_terms(get_the_ID(), 'visa-type');
                                                                if ($terms && !is_wp_error($terms)) : ?>
                                                                    <li><span><?php echo esc_html__('Visa Type', 'triprex-core'); ?> :</span>
                                                                        <?php
                                                                        $term_names = array_map(function ($term) {
                                                                            return esc_html__($term->name, 'triprex-core');
                                                                        }, $terms);
                                                                        echo implode(', ', $term_names);
                                                                        ?>
                                                                    </li>
                                                                <?php endif;
                                                                ?>
                                                                <?php
                                                                $terms = get_the_terms(get_the_ID(), 'visa-mode');
                                                                if ($terms && !is_wp_error($terms)) : ?>
                                                                    <li><span><?php echo esc_html__('Visa Mode', 'triprex-core'); ?> :</span>
                                                                        <?php
                                                                        $term_names = array_map(function ($term) {
                                                                            return esc_html__($term->name, 'triprex-core');
                                                                        }, $terms);
                                                                        echo implode(', ', $term_names);
                                                                        ?>
                                                                    </li>
                                                                <?php endif;
                                                                ?>
                                                                <?php $visa_info = Egns_Helper::egns_visa_value('visa_general_info_re');
                                                                if (!empty(Egns_Helper::egns_visa_value('visa_general_info_re'))) :
                                                                    foreach ($visa_info as $step_data) :
                                                                ?>
                                                                        <li><span><?php echo esc_html__($step_data['visa_info_label_text'], 'triprex-core'); ?></span> <?php echo esc_html__($step_data['visa_info_content_text'], 'triprex-core'); ?></li>

                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                        <div class="card-content-bottom">
                                                            <?php
                                                            $visa_pack_price = \Egns_Core\Egns_Helper::egns_get_visa_pack_price();
                                                            if (!empty($visa_pack_price)) {
                                                            ?>
                                                                <div class="price-area">
                                                                    <span><?php echo esc_html__('Starting From', 'triprex-core'); ?> :</span>
                                                                    <h6>
                                                                        <?php echo $visa_pack_price; ?>
                                                                        <strong><?php echo \Egns\Helper\Egns_Helper::egns_visa_value('visa_cost_select') ?></strong>
                                                                    </h6>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php if (!empty($settings['triprex_visa_heading_button_area_sec_btn_text'])) : ?>
                                                                <a href="<?php the_permalink(); ?>" class="apply-btn">
                                                                    <?php echo esc_html($settings['triprex_visa_heading_button_area_sec_btn_text']); ?>
                                                                    <div class="arrow">
                                                                        <i class="bi bi-arrow-right"></i>
                                                                    </div>
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
                        <?php if ('yes' == $settings['triprex_visa_slider_carousel_on_off']) : ?>
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="slider-btn-grp5">
                                        <div class="slider-btn package-card4-slider-prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                                <path d="M42 7.18797L1.14917 7.18797M6.8649 13L1 7L6.86491 0.999997" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="slider-btn package-card4-slider-next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                                <path d="M1 6.81204H41.8508M36.1351 1.00002L42 7.00002L36.1351 13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_visa_processing_content_style_selection'] == 'style_three') : ?>
            <div class="home5-visa-application-section">
                <div class="container-fliud">
                    <div class="visa-application-wrapper">
                        <div class="container">
                            <div class="row mb-50">
                                <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="section-title4">
                                        <?php if (!empty($settings['triprex_visa_slider_sub_title'])) : ?>
                                            <div class="eg-section-tag">
                                                <span><?php echo esc_html($settings['triprex_visa_slider_sub_title']); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['triprex_visa_slider_title'])) : ?>
                                            <h2><?php echo esc_html($settings['triprex_visa_slider_title']); ?></h2>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($settings['triprex_visa_button_area_sec_btn_text'])) : ?>
                                        <a href="<?php echo esc_url($settings['triprex_visa_button_area_sec_btn_url']['url']) ?>" class="secondary-btn3">
                                            <span>
                                                <?php echo esc_html($settings['triprex_visa_button_area_sec_btn_text']); ?>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="package-card-area">
                            <div class="row g-xl-4 gy-5">

                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post(); ?>

                                    <div class="col-lg-6">
                                        <div class="package-card4 two">
                                            <div class="package-card-img">
                                                <?php the_post_thumbnail('card-thumb'); ?>
                                            </div>
                                            <div class="package-card-content">
                                                <div class="card-content-top">
                                                    <h5><?php the_title(); ?></h5>
                                                    <ul>
                                                        <?php
                                                        $terms = get_the_terms(get_the_ID(), 'country');
                                                        if ($terms && !is_wp_error($terms)) : ?>
                                                            <li><span><?php echo esc_html__('Country', 'triprex-core'); ?> :</span>
                                                                <?php
                                                                $term_names = array_map(function ($term) {
                                                                    return esc_html__($term->name, 'triprex-core');
                                                                }, $terms);
                                                                echo implode(', ', $term_names);
                                                                ?>
                                                            </li>
                                                        <?php endif;
                                                        ?>
                                                        <?php
                                                        $terms = get_the_terms(get_the_ID(), 'visa-type');
                                                        if ($terms && !is_wp_error($terms)) : ?>
                                                            <li><span><?php echo esc_html__('Visa Type', 'triprex-core'); ?> :</span>
                                                                <?php
                                                                $term_names = array_map(function ($term) {
                                                                    return esc_html__($term->name, 'triprex-core');
                                                                }, $terms);
                                                                echo implode(', ', $term_names);
                                                                ?>
                                                            </li>
                                                        <?php endif;
                                                        ?>
                                                        <?php
                                                        $terms = get_the_terms(get_the_ID(), 'visa-mode');
                                                        if ($terms && !is_wp_error($terms)) : ?>
                                                            <li><span><?php echo esc_html__('Visa Mode', 'triprex-core'); ?> :</span>
                                                                <?php
                                                                $term_names = array_map(function ($term) {
                                                                    return esc_html__($term->name, 'triprex-core');
                                                                }, $terms);
                                                                echo implode(', ', $term_names);
                                                                ?>
                                                            </li>
                                                        <?php endif;
                                                        ?>
                                                        <?php $visa_info = Egns_Helper::egns_visa_value('visa_general_info_re');
                                                        if (!empty(Egns_Helper::egns_visa_value('visa_general_info_re'))) :
                                                            foreach ($visa_info as $step_data) :
                                                        ?>
                                                                <li><span><?php echo esc_html__($step_data['visa_info_label_text'], 'triprex-core'); ?></span> <?php echo esc_html__($step_data['visa_info_content_text'], 'triprex-core'); ?></li>

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                                <div class="card-content-bottom">
                                                    <?php
                                                    $visa_pack_price = \Egns_Core\Egns_Helper::egns_get_visa_pack_price();
                                                    if (!empty($visa_pack_price)) {
                                                    ?>
                                                        <div class="price-area">
                                                            <span><?php echo esc_html__('Starting From', 'triprex-core'); ?> :</span>
                                                            <h6>
                                                                <?php echo $visa_pack_price; ?>
                                                                <strong><?php echo \Egns\Helper\Egns_Helper::egns_visa_value('visa_cost_select') ?></strong>
                                                            </h6>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php if (!empty($settings['triprex_visa_heading_button_area_sec_btn_text'])) : ?>
                                                        <a href="<?php the_permalink(); ?>" class="apply-btn">
                                                            <?php echo esc_html($settings['triprex_visa_heading_button_area_sec_btn_text']); ?>
                                                            <div class="arrow">
                                                                <i class="bi bi-arrow-right"></i>
                                                            </div>
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
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_visa_processing_content_style_selection'] == 'style_four') : ?>
            <div class="home6-visa-application-section">
                <div class="container one">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <div class="section-title5">
                                <?php if (!empty($settings['triprex_visa_slider_sub_title'])) : ?>
                                    <span>
                                        <?php echo esc_html($settings['triprex_visa_slider_sub_title']); ?>
                                        <?php if ('yes' == $settings['triprex_visa_slider_title_carousel_on_off']) : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <g opacity="0.8">
                                                    <path d="M9.06226 11.3626L8.55838 13.7263L6.22997 20.0004L7.61194 19.7701L14.0678 11.3277C14.979 11.296 15.8626 11.2471 16.6304 11.1713C20.1826 10.82 19.9984 10.0002 19.9984 10.0002C19.9984 10.0002 20.1826 9.18031 16.6304 8.829C15.8626 8.7529 14.9789 8.70407 14.0678 8.67261L7.61197 0.229974L6.22997 -6.01907e-07L8.55838 6.27416L9.06226 8.6378C7.87942 8.6555 7.07898 8.68244 7.07898 8.68244C7.07898 8.68244 5.44724 8.7201 2.92253 9.28895L0.864093 6.43364L-0.000128074 6.43364L0.615287 9.90529C0.504522 9.93924 0.504522 10.0611 0.615287 10.0951L-0.000128385 13.5667L0.864093 13.5667L2.92253 10.7117C5.44724 11.2806 7.07898 11.3177 7.07898 11.3177C7.07898 11.3177 7.87942 11.3449 9.06226 11.3626Z" />
                                                    <path d="M13.4102 13.2575L13.4102 14.1895L9.96575 14.1895L9.96575 13.2575L13.4102 13.2575ZM13.4102 5.81414L13.4102 6.7458L9.96595 6.7458L9.96595 5.81414L13.4102 5.81414ZM11.0863 16.385L11.0863 17.3167L7.90291 17.3167L7.90291 16.385L11.0863 16.385ZM11.0863 2.68689L11.0863 3.61885L7.90291 3.61885L7.90291 2.68689L11.0863 2.68689Z" />
                                                </g>
                                            </svg>
                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_visa_slider_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_visa_slider_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['triprex_visa_button_area_sec_btn_text'])) : ?>
                                <a href="<?php echo esc_url($settings['triprex_visa_button_area_sec_btn_url']['url']) ?>" class="secondary-btn4"> <?php echo esc_html($settings['triprex_visa_button_area_sec_btn_text']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row g-lg-4 gy-5">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post(); ?>

                            <div class="col-lg-4 col-md-6">
                                <div class="package-card4 three">
                                    <a href="<?php the_permalink(); ?>" class="package-card-img">
                                        <?php the_post_thumbnail('card-thumb'); ?>
                                    </a>
                                    <div class="package-card-content">
                                        <div class="card-content-top">
                                            <h5><?php the_title(); ?></h5>
                                            <ul>
                                                <?php
                                                $terms = get_the_terms(get_the_ID(), 'country');
                                                if ($terms && !is_wp_error($terms)) : ?>
                                                    <li><span><?php echo esc_html__('Country', 'triprex-core'); ?> :</span>
                                                        <?php
                                                        $term_names = array_map(function ($term) {
                                                            return esc_html__($term->name, 'triprex-core');
                                                        }, $terms);
                                                        echo implode(', ', $term_names);
                                                        ?>
                                                    </li>
                                                <?php endif;
                                                ?>
                                                <?php
                                                $terms = get_the_terms(get_the_ID(), 'visa-type');
                                                if ($terms && !is_wp_error($terms)) : ?>
                                                    <li><span><?php echo esc_html__('Visa Type', 'triprex-core'); ?> :</span>
                                                        <?php
                                                        $term_names = array_map(function ($term) {
                                                            return esc_html__($term->name, 'triprex-core');
                                                        }, $terms);
                                                        echo implode(', ', $term_names);
                                                        ?>
                                                    </li>
                                                <?php endif;
                                                ?>
                                                <?php
                                                $terms = get_the_terms(get_the_ID(), 'visa-mode');
                                                if ($terms && !is_wp_error($terms)) : ?>
                                                    <li><span><?php echo esc_html__('Visa Mode', 'triprex-core'); ?> :</span>
                                                        <?php
                                                        $term_names = array_map(function ($term) {
                                                            return esc_html__($term->name, 'triprex-core');
                                                        }, $terms);
                                                        echo implode(', ', $term_names);
                                                        ?>
                                                    </li>
                                                <?php endif;
                                                ?>
                                                <?php $visa_info = Egns_Helper::egns_visa_value('visa_general_info_re');
                                                if (!empty(Egns_Helper::egns_visa_value('visa_general_info_re'))) :
                                                    foreach ($visa_info as $step_data) :
                                                ?>
                                                        <li><span><?php echo esc_html__($step_data['visa_info_label_text'], 'triprex-core'); ?></span> <?php echo esc_html__($step_data['visa_info_content_text'], 'triprex-core'); ?></li>

                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="card-content-bottom">
                                            <?php if (!empty($settings['triprex_visa_heading_button_area_sec_btn_text'])) : ?>
                                                <a href="<?php the_permalink(); ?>" class="apply-btn">
                                                    <?php echo esc_html($settings['triprex_visa_heading_button_area_sec_btn_text']); ?>
                                                    <div class="arrow">
                                                        <i class="bi bi-arrow-right"></i>
                                                    </div>
                                                </a>
                                            <?php endif; ?>
                                            <?php
                                            $visa_pack_price = \Egns_Core\Egns_Helper::egns_get_visa_pack_price();
                                            if (!empty($visa_pack_price)) {
                                            ?>
                                                <div class="price-area">
                                                    <span><?php echo esc_html__('Starting From', 'triprex-core'); ?> :</span>
                                                    <h6>
                                                        <?php echo $visa_pack_price; ?>
                                                        <strong><?php echo \Egns\Helper\Egns_Helper::egns_visa_value('visa_cost_select') ?></strong>
                                                    </h6>
                                                </div>
                                            <?php
                                            }
                                            ?>
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
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Visa_Processing_Widget());
