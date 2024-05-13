<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;

class Triprex_Destination_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_destination_slider';
    }

    public function get_title()
    {
        return esc_html__('EG Destination Slider', 'triprex-core');
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
            'triprex_destination_slider_one_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_destination_slider_content_style_selection',
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
            'triprex_destination_slider_heading_section',
            [
                'label' => esc_html__('Heading Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_destination_slider_carousel_on_off',
            [
                'label' => esc_html__('Slider Carousel On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'triprex_destination_slider_sub_title',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Journey TripRex', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => ['style_one', 'style_three', 'style_four']
                ]

            ]
        );

        $this->add_control(
            'triprex_destination_slider_short_description',
            [
                'label' => esc_html__('Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.', 'triprex-core'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => ['style_two']
                ]

            ]
        );


        $this->add_control(
            'triprex_destination_slider_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trendy Travel Locations', 'triprex-core'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four']
                ]

            ]
        );

        $this->add_control(
            'triprex_destination_slider_travel_text',
            [
                'label' => esc_html__('Travel Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Travel To', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => ['style_one', 'style_two']
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

        $this->add_control(
            'triprex_destination_slider_btn_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four']
                ]

            ]
        );

        $this->add_control(
            'triprex_destination_slider_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Destination', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four']
                ]
            ]
        );


        $this->add_control(
            'triprex_destination_slider_button_url',
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
            'triprex_destination_slider_style_one_sec',
            [
                'label' => esc_html__('Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_subtitle',
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
                'name'     => 'triprex_destination_slider_style_one_sec_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title2 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_one_sec_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_one_sec_subtitle_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_title',
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
                'name'     => 'triprex_destination_slider_style_one_sec_title_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_one_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_one_sec_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_text',
            [
                'label' => esc_html__('Content Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_one_sec_content_text_typ',
                'selector' => '{{WRAPPER}} .destination-card2 .destination-card2-content span',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .destination-card2-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_title',
            [
                'label' => esc_html__('Content Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_one_sec_content_title_typ',
                'selector' => '{{WRAPPER}} .destination-card2 .destination-card2-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .destination-card2-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .destination-card2-content h4:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_tours',
            [
                'label' => esc_html__('Tours', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_one_sec_content_tours_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_tours_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_tours_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_tours_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2:hover .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_sec_content_tours_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2:hover .batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_pagination_area',
            [
                'label' => esc_html__('Pagination Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_one_pagination_area_typ',
                'selector' => '{{WRAPPER}} .slide-and-view-btn-grp .slider-btn-grp3 .slider-btn span',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_pagination_area_color',
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
            'triprex_destination_slider_style_one_pagination_area_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-and-view-btn-grp .slider-btn-grp3 .slider-btn:hover span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_pagination_border_area_color',
            [
                'label'     => esc_html__('Border Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_bottom_button_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_destination_slider_style_one_bottom_button_area_tab'
        );

        $this->start_controls_tab(
            'triprex_destination_slider_style_one_bottom_button_area_normal_tab',
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
                'name'     => 'triprex_destination_slider_style_one_bottom_button_area_typ',
                'selector' => '{{WRAPPER}} .destination-dropdown-card .destination-dropdown-content .details-btn',

            ]
        );
        $this->add_control(
            'triprex_destination_slider_style_one_bottom_button_area_typ',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_bottom_button_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_one_bottom_button_area_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_one_bottom_button_area_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .secondary-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_destination_slider_style_one_bottom_button_area_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_one_bottom_button_area_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn2::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // =====================Style Two=======================//

        $this->start_controls_section(
            'triprex_destination_slider_style_two_sec',
            [
                'label' => esc_html__('Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_title',
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
                'name'     => 'triprex_destination_slider_style_two_sec_title_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_two_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_two_sec_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title3 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_subtitle',
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
                'name'     => 'triprex_destination_slider_style_two_sec_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_two_sec_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_two_sec_subtitle_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title3 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_pagination_sec',
            [
                'label' => esc_html__('Pagination Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_two_sec_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp5 .slider-btn',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_pagination_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp5 .slider-btn svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp5 .slider-btn:hover svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_content_text',
            [
                'label' => esc_html__('Content Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_two_sec_content_text_typ',
                'selector' => '{{WRAPPER}} .destination-card2 .destination-card2-content span',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_content_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .destination-card2-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_content_title',
            [
                'label' => esc_html__('Content Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_two_sec_content_title_typ',
                'selector' => '{{WRAPPER}} .destination-card2 .destination-card2-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .destination-card2-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_destination_slider_style_two_sec_content_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .destination-card2-content h4:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_content_tours',
            [
                'label' => esc_html__('Tours', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_two_sec_content_tours_typ',
                'selector' => '{{WRAPPER}} .destination-card2.style-2 .destination-card2-content-wrap .eg-batch .location .location-list li',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_content_tours_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.style-2 .destination-card2-content-wrap .eg-batch .location .location-list li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_sec_content_tours_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.style-2 .destination-card2-content-wrap .eg-batch .location' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_bottom_button_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_destination_slider_style_two_bottom_button_area_tab'
        );

        $this->start_controls_tab(
            'triprex_destination_slider_style_two_bottom_button_area_normal_tab',
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
                'name'     => 'triprex_destination_slider_style_two_bottom_button_area_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_destination_slider_style_two_bottom_button_area_typ',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_bottom_button_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_two_bottom_button_area_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_two_bottom_button_area_padding',
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
            'triprex_destination_slider_style_two_bottom_button_area_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_two_bottom_button_area_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // =====================Style Three=======================//

        $this->start_controls_section(
            'triprex_destination_slider_style_three_sec',
            [
                'label' => esc_html__('Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_subtitle',
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
                'name'     => 'triprex_destination_slider_style_three_sec_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title4 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_three_sec_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_three_sec_subtitle_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_title',
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
                'name'     => 'triprex_destination_slider_style_three_sec_title_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_three_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_three_sec_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title4 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_content_title',
            [
                'label' => esc_html__('Content Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_three_sec_content_title_typ',
                'selector' => '{{WRAPPER}} .destination-card3 .destination-card-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3 .destination-card-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_content_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3 .destination-card-content' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_content_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3:hover .destination-card-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_content_title_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3:hover .destination-card-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_content_tours',
            [
                'label' => esc_html__('Tours', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_three_sec_content_tours_typ',
                'selector' => '{{WRAPPER}} .destination-card3 .batch span',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_content_tours_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3 .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_sec_content_tours_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3 .batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_pagination_area',
            [
                'label' => esc_html__('Pagination Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_three_pagination_area_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp2 .slider-btn svg',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_pagination_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp2 .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_pagination_area_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp2 .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_pagination_border_area_color',
            [
                'label'     => esc_html__('Border Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp2 .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_bottom_button_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_destination_slider_style_three_bottom_button_area_tab'
        );

        $this->start_controls_tab(
            'triprex_destination_slider_style_three_bottom_button_area_normal_tab',
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
                'name'     => 'triprex_destination_slider_style_three_bottom_button_area_typ',
                'selector' => '{{WRAPPER}} .secondary-btn3 span',

            ]
        );
        $this->add_control(
            'triprex_destination_slider_style_three_bottom_button_area_typ',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_bottom_button_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn3' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_three_bottom_button_area_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_three_bottom_button_area_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .secondary-btn3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_destination_slider_style_three_bottom_button_area_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_three_bottom_button_area_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn3 ::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // =====================Style Four=======================//

        $this->start_controls_section(
            'triprex_destination_slider_style_four_sec',
            [
                'label' => esc_html__('Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_destination_slider_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_subtitle',
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
                'name'     => 'triprex_destination_slider_style_four_sec_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title5 span',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_subtitle_svg_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_four_sec_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_four_sec_subtitle_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title5 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_title',
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
                'name'     => 'triprex_destination_slider_style_four_sec_title_typ',
                'selector' => '{{WRAPPER}} .section-title5 h2',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_four_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_four_sec_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title5 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_content_title',
            [
                'label' => esc_html__('Content Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_four_sec_content_title_typ',
                'selector' => '{{WRAPPER}} .destination-card4 .card-content-wrap .card-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card4 .card-content-wrap .card-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_content_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card4 .card-content-wrap .card-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_content_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card4 .card-content-wrap .card-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_content_tours',
            [
                'label' => esc_html__('Tours', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_four_sec_content_tours_typ',
                'selector' => '{{WRAPPER}} .destination-card4 .card-content-wrap .batch ul li',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_content_tours_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card4 .card-content-wrap .batch ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_sec_content_tours_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card4 .card-content-wrap .batch ul' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_pagination_area',
            [
                'label' => esc_html__('Pagination Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_destination_slider_style_four_pagination_area_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp2 .slider-btn svg',

            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_pagination_area_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_pagination_area_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_pagination_border_area_color',
            [
                'label'     => esc_html__('Border Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_bottom_button_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_destination_slider_style_four_bottom_button_area_tab'
        );

        $this->start_controls_tab(
            'triprex_destination_slider_style_four_bottom_button_area_normal_tab',
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
                'name'     => 'triprex_destination_slider_style_four_bottom_button_area_typ',
                'selector' => '{{WRAPPER}} .secondary-btn4',

            ]
        );
        $this->add_control(
            'triprex_destination_slider_style_four_bottom_button_area_typ_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_bottom_button_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_destination_slider_style_four_bottom_button_area_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_destination_slider_style_four_bottom_button_area_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .secondary-btn4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_destination_slider_style_four_bottom_button_area_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_bottom_button_area_hover__color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_destination_slider_style_four_bottom_button_area_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4::after' => 'background-color: {{VALUE}};',
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
        $selected_post_ids = $settings['destination_post_list'];
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
        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".destination-card2-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    navigation: {
                        nextEl: ".destination-card2-next",
                        prevEl: ".destination-card2-prev",
                    },

                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    }
                });


                var swiper = new Swiper(".home4-destination-card-slider", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 25,
                    navigation: {
                        nextEl: ".home4-destination-card-next",
                        prevEl: ".home4-destination-card-prev",
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

                var swiper = new Swiper(".destination-card3-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    // loop: true,
                    navigation: {
                        nextEl: ".destination-card3-slider-next",
                        prevEl: ".destination-card3-slider-prev",
                    },

                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    }
                });

                var swiper = new Swiper(".home6-destination-card-slider", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 15,
                    navigation: {
                        nextEl: ".activity-card-slider-next",
                        prevEl: ".activity-card-slider-prev",
                    },

                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 2,
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
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                        1700: {
                            slidesPerView: 5,
                        },
                    }
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['triprex_destination_slider_content_style_selection'] == 'style_one') : ?>
            <div class="destination-card2-slider-section">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="section-title2 text-center">
                                <?php if (!empty($settings['triprex_destination_slider_sub_title'])) : ?>
                                    <div class="eg-section-tag">
                                        <span><?php echo esc_html($settings['triprex_destination_slider_sub_title']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_destination_slider_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_destination_slider_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper destination-card2-slider mb-50">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post();

                                        $tourCount = \Egns_Core\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="destination-card2">
                                                <a href="<?php the_permalink(); ?>" class="destination-card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('destination-card-image', 'triprex-core'); ?>"></a>
                                                <div class="batch">
                                                    <span><?php echo esc_html($tourCount) . esc_html__(' Tour', 'triprex-core'); ?></span>
                                                </div>
                                                <div class="destination-card2-content">
                                                    <?php if (!empty($settings['triprex_destination_slider_travel_text'])) : ?>
                                                        <span><?php echo esc_html($settings['triprex_destination_slider_travel_text']); ?></span>
                                                    <?php endif; ?>
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                            <?php if ('yes' == $settings['triprex_destination_slider_carousel_on_off']) : ?>
                                <div class="slide-and-view-btn-grp">
                                    <div class="slider-btn-grp3 two">
                                        <div class="slider-btn destination-card2-prev">
                                            <i class="bi bi-arrow-left"></i>
                                            <span><?php echo esc_html__('PREV', 'triprex-core'); ?></span>
                                        </div>
                                        <div class="slider-btn destination-card2-next">
                                            <span><?php echo esc_html__('NEXT', 'triprex-core'); ?></span>
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_destination_slider_button_text'])) : ?>
                                    <a href="<?php echo esc_url($settings['triprex_destination_slider_button_url']['url']) ?>" class="secondary-btn2"><?php echo esc_html($settings['triprex_destination_slider_button_text']); ?></a>
                                <?php endif; ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_destination_slider_content_style_selection'] == 'style_two') : ?>

            <div class="home4-destination-card-slider-section">
                <div class="container">
                    <div class="row mb-60">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <div class="section-title3">
                                <?php if (!empty($settings['triprex_destination_slider_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_destination_slider_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_destination_slider_short_description'])) : ?>
                                    <p><?php echo esc_html($settings['triprex_destination_slider_short_description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if ('yes' == $settings['triprex_destination_slider_carousel_on_off']) : ?>
                                <div class="slider-btn-grp5">
                                    <div class="slider-btn home4-destination-card-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                            <path d="M42 7.18797L1.14917 7.18797M6.8649 13L1 7L6.86491 0.999997" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="slider-btn home4-destination-card-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                            <path d="M1 6.81204H41.8508M36.1351 1.00002L42 7.00002L36.1351 13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="swiper home4-destination-card-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post();

                                        $tourCount = \Egns_Core\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="destination-card2 style-2">
                                                <a href="<?php the_permalink(); ?>" class="destination-card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>"></a>
                                                <div class="destination-card2-content-wrap">
                                                    <div class="eg-batch">
                                                        <div class="location">
                                                            <ul class="location-list">
                                                                <li><?php echo esc_html($tourCount) . esc_html__(' Tour', 'triprex-core'); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="destination-card2-content">
                                                        <?php if (!empty($settings['triprex_destination_slider_travel_text'])) : ?>
                                                            <span><?php echo esc_html($settings['triprex_destination_slider_travel_text']); ?></span>
                                                        <?php endif; ?>
                                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
                    <?php if (!empty($settings['triprex_destination_slider_button_text'])) : ?>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['triprex_destination_slider_button_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_destination_slider_button_text']); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_destination_slider_content_style_selection'] == 'style_three') : ?>
            <div class="home5-destination-card-slider-section">
                <div class="container-fluid">
                    <div class="destination-card-slider-wrap">
                        <div class="row mb-50">
                            <div class="col-lg-12">
                                <div class="section-title4 text-center">
                                    <?php if (!empty($settings['triprex_destination_slider_sub_title'])) : ?>
                                        <div class="eg-section-tag">
                                            <span><?php echo esc_html($settings['triprex_destination_slider_sub_title']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_destination_slider_title'])) : ?>
                                        <h2><?php echo esc_html($settings['triprex_destination_slider_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="destination-card-with-slider mb-50">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="swiper destination-card3-slider">
                                        <div class="swiper-wrapper">
                                            <?php
                                            while ($query->have_posts()) :
                                                $query->the_post();

                                                $tourCount = \Egns_Core\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());
                                            ?>

                                                <div class="swiper-slide">
                                                    <div class="destination-card3">
                                                        <a href="<?php the_permalink(); ?>" class="destination-card-img">
                                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>">
                                                        </a>
                                                        <div class="destination-card-content">
                                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        </div>
                                                        <div class="batch">
                                                            <span><?php echo esc_html($tourCount) . esc_html__(' Tour', 'triprex-core'); ?></span>
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
                            <?php if ('yes' == $settings['triprex_destination_slider_carousel_on_off']) : ?>
                                <div class="slider-btn-grp2">
                                    <div class="slider-btn destination-card3-slider-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17">
                                            <path d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z"></path>
                                        </svg>
                                    </div>
                                    <div class="slider-btn destination-card3-slider-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17" fill="none">
                                            <path d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z"></path>
                                        </svg>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['triprex_destination_slider_button_text'])) : ?>
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <a href="<?php echo esc_url($settings['triprex_destination_slider_button_url']['url']) ?>" class="secondary-btn3">
                                        <span>
                                            <?php echo esc_html($settings['triprex_destination_slider_button_text']); ?>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_destination_slider_content_style_selection'] == 'style_four') : ?>
            <div class="home6-destination-card-slider-section">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="section-title5 text-center">
                            <?php if (!empty($settings['triprex_destination_slider_sub_title'])) : ?>
                                <span>
                                    <?php echo esc_html($settings['triprex_destination_slider_sub_title']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <g opacity="0.8">
                                            <path d="M9.06226 11.3626L8.55838 13.7263L6.22997 20.0004L7.61194 19.7701L14.0678 11.3277C14.979 11.296 15.8626 11.2471 16.6304 11.1713C20.1826 10.82 19.9984 10.0002 19.9984 10.0002C19.9984 10.0002 20.1826 9.18031 16.6304 8.829C15.8626 8.7529 14.9789 8.70407 14.0678 8.67261L7.61197 0.229974L6.22997 -6.01907e-07L8.55838 6.27416L9.06226 8.6378C7.87942 8.6555 7.07898 8.68244 7.07898 8.68244C7.07898 8.68244 5.44724 8.7201 2.92253 9.28895L0.864093 6.43364L-0.000128074 6.43364L0.615287 9.90529C0.504522 9.93924 0.504522 10.0611 0.615287 10.0951L-0.000128385 13.5667L0.864093 13.5667L2.92253 10.7117C5.44724 11.2806 7.07898 11.3177 7.07898 11.3177C7.07898 11.3177 7.87942 11.3449 9.06226 11.3626Z" />
                                            <path d="M13.4102 13.2575L13.4102 14.1895L9.96575 14.1895L9.96575 13.2575L13.4102 13.2575ZM13.4102 5.81414L13.4102 6.7458L9.96595 6.7458L9.96595 5.81414L13.4102 5.81414ZM11.0863 16.385L11.0863 17.3167L7.90291 17.3167L7.90291 16.385L11.0863 16.385ZM11.0863 2.68689L11.0863 3.61885L7.90291 3.61885L7.90291 2.68689L11.0863 2.68689Z" />
                                        </g>
                                    </svg>
                                </span>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_destination_slider_title'])) : ?>
                                <h2><?php echo esc_html($settings['triprex_destination_slider_title']); ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper home6-destination-card-slider">
                            <div class="swiper-wrapper">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post();

                                    $tourCount = \Egns_Core\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());
                                ?>
                                    <div class="swiper-slide">
                                        <div class="destination-card4">
                                            <a href="<?php the_permalink(); ?>" class="card-img">
                                                <?php the_post_thumbnail('card-thumb'); ?>
                                            </a>
                                            <div class="card-content-wrap">
                                                <div class="batch">
                                                    <ul>
                                                        <li><?php echo esc_html($tourCount) . esc_html__(' Tour', 'triprex-core'); ?></li>
                                                    </ul>
                                                </div>
                                                <div class="card-content">
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
                <div class="container one mt-30">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-btn-grp two d-md-flex d-none justify-content-between">
                                <?php if ('yes' == $settings['triprex_destination_slider_carousel_on_off']) : ?>
                                    <div class="slider-btn activity-card-slider-prev">
                                        <i class="bi bi-arrow-left"></i>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($settings['triprex_destination_slider_button_text'])) : ?>
                                    <a href="<?php echo esc_url($settings['triprex_destination_slider_button_url']['url']) ?>" class="secondary-btn4"> <?php echo esc_html($settings['triprex_destination_slider_button_text']); ?></a>
                                <?php endif; ?>
                                <?php if ('yes' == $settings['triprex_destination_slider_carousel_on_off']) : ?>
                                    <div class="slider-btn activity-card-slider-next">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Destination_Slider_Widget());
