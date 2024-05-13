<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;


class Triprex_Tour_Package_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_tour_package';
    }

    public function get_title()
    {
        return esc_html__('EG Tour Package', 'triprex-core');
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
            'triprex_tour_package_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_selection',
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
            'triprex_tours_package_one_heading_section',
            [
                'label' => esc_html__('Heading Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_package_carousel_vector_image_on_off',
            [
                'label' => esc_html__('Vector Image Turn On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'triprex_tour_package_content_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_package_carousel_on_off',
            [
                'label' => esc_html__('Slider Carousel On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'triprex_tour_package_content_style_selection' => ['style_two', 'style_three', 'style_four']
                ]
            ]
        );

        $this->add_control(
            'triprex_tours_package_one_subtitle',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Tour Package', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,


            ]
        );



        $this->add_control(
            'triprex_tours_package_one_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Thrilling Tour Plans', 'triprex-core'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,


            ]
        );


        $this->add_control(
            'triprex_tours_package_one_short_description',
            [
                'label' => esc_html__('Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_tour_package_content_style_selection' => ['style_three']
                ]


            ]
        );


        $this->add_control(
            'triprex_tours_package_one_title_button_text',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Book A Trip', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,


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
                'options'       => Egns_Helper::get_tours_post_options(),
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
            'triprex_tours_package_one_bottom_button',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tours_package_one_bottom_button_text',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Package', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,


            ]
        );

        $this->add_control(
            'triprex_tours_package_one_bottom_button_url',
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


        $this->start_controls_section(
            'triprex_tour_package_section_banner',
            [
                'label' => esc_html__('Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_tour_package_content_style_selection' => ['style_three']
                ]

            ]
        );

        $this->add_control(
            'triprex_tour_package_section_banner_image',
            [
                'label' => esc_html__('Banner Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_section_banner_subtitle',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Super Travel', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,


            ]
        );

        $this->add_control(
            'triprex_tour_package_section_banner_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your next trip', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,


            ]
        );

        $this->add_control(
            'triprex_tour_package_section_banner_offer_text',
            [
                'label' => esc_html__('Offer Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('25% Off'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,


            ]
        );


        $this->add_control(
            'triprex_tour_package_section_banner_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book A Trip'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,


            ]
        );

        $this->add_control(
            'triprex_tour_package_section_banner_button_url',
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

        $this->end_controls_section();


        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_tour_package_style_one_sec',
            [
                'label' => esc_html__('Tour Packages Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_package_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_one_section',
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
                'name'     => 'triprex_tour_package_content__heading_subtitle_style_one_section_typ',
                'selector' => '{{WRAPPER}} .section-title span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_one_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_one_section_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_title_style_one_section',
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
                'name'     => 'triprex_tour_package_content__heading_title_style_one_section_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_title_style_one_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_one_section',
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
                'name'     => 'triprex_tour_package_content_batch_style_one_section_typ',
                'selector' => '{{WRAPPER}} .package-card .batch .date',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_one_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_one_section_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .date' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_batch_style_one_section_margin',
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
            'triprex_tour_package_content_batch_style_one_section_padding',
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
            'triprex_tour_package_content_destination_style_one_section',
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
                'name'     => 'triprex_tour_package_content_destination_style_one_section_typ',
                'selector' => '{{WRAPPER}} .package-card .batch .location .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_destination_style_onesection_color',
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
            'triprex_tour_package_content_destination_style_one_section_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .location svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_title_style_one_section',
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
                'name'     => 'triprex_tour_package_style_title_style_one_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-top h5:hover a',

            ]
        );

        $this->add_control(
            'triprex_tour_package_style_title_style_one_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_package_style_one_title_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_one_location_section',
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
                'name'     => 'triprex_tour_package_content_style_one_location_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-top .location-area .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_one_location_section_color',
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
            'triprex_tour_package_content_location_style_one_section_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top .location-area .location-list li a:hover' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_one_price_section',
            [
                'label' => esc_html__('Price Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_one_price_title_section',
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
                'name'     => 'triprex_tour_package_content_style_one_price_title_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_one_price_title_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_one_total_price_section',
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
                'name'     => 'triprex_tour_package_content_style_one_price_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_one_price_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_one_price_section_del_color',
            [
                'label'     => esc_html__('Deleted Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span del' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_one_total_price_tax_section',
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
                'name'     => 'triprex_tour_package_contenttotal_price_style_one_tax_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_total_price_style_one_tax_section_color',
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
            'triprex_tour_package_content_btn_style_one',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_package_content_style_tabs_one'
        );

        $this->start_controls_tab(
            'triprex_tour_package_content_style_normal_tab_one',
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
                'name'     => 'triprex_tour_package_content_style_typ_one',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_package_content_style_color_one',
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
            'triprex_tour_package_content_btn_style_bac_color_one',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_style_style_margin_one',
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
            'triprex_tour_package_content_style_padding_one',
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
            'triprex_tour_package_content_style_sec_one',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_bac_color_hover_one',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_color_hover_one',
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
            'triprex_tour_all_package_content_btn_style_one',
            [
                'label' => esc_html__('All Packages Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_all_package_content_btn_style_content_style_tabs_one'
        );

        $this->start_controls_tab(
            'triprex_tour_all_package_content_btn_style_normal_tab_one',
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
                'name'     => 'triprex_tour_all_package_content_btn_style_typ_one',
                'selector' => '{{WRAPPER}} .secondary-btn1',

            ]
        );
        $this->add_control(
            'triprex_tour_all_package_content_btn_style_color_one',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_all_package_content_btn_style_bac_color_one',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .secondary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_all_package_content_btn_style_style_margin_one',
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
            'triprex_tour_all_package_content_btn_style_padding_one',
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
            'triprex_tour_all_package_content_btn_style_style_sec_one',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_all_package_content_btn_style_bac_color_hover_one',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_all_package_content_btn_style_color_hover_one',
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


        // =====================Style Two=======================//
        $this->start_controls_section(
            'triprex_tour_banner_style_two_sec',
            [
                'label' => esc_html__('Banner Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_package_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_banner_style_two_sec_subtitle',
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
                'name'     => 'triprex_tour_banner_style_two_sec_subtitle_typ',
                'selector' => '{{WRAPPER}} .home4-banner3-with-package-slider .home4-banner3-wrapper .home4-banner3-content span',

            ]
        );

        $this->add_control(
            'triprex_tour_banner_style_two_sec_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner3-with-package-slider .home4-banner3-wrapper .home4-banner3-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_banner_style_two_sec_title',
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
                'name'     => 'triprex_tour_banner_style_two_sec_title_typ',
                'selector' => '{{WRAPPER}} .home4-banner3-with-package-slider .home4-banner3-wrapper .home4-banner3-content h2',

            ]
        );

        $this->add_control(
            'triprex_tour_banner_style_two_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner3-with-package-slider .home4-banner3-wrapper .home4-banner3-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_banner_style_two_sec_offer_text',
            [
                'label' => esc_html__('Offer Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_banner_style_two_sec_offer_text_typ',
                'selector' => '{{WRAPPER}} .home4-banner3-with-package-slider .home4-banner3-wrapper .home4-banner3-content h2 strong',

            ]
        );

        $this->add_control(
            'triprex_tour_banner_style_two_sec_offer_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner3-with-package-slider .home4-banner3-wrapper .home4-banner3-content h2 strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        // button
        $this->add_control(
            'triprex_tour_banner_content_btn_style_three',
            [
                'label' => esc_html__('Button Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_banner_btn_style_content_style_tabs_three'
        );

        $this->start_controls_tab(
            'triprex_tour_banner_btn_style_normal_tab_three',
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
                'name'     => 'triprex_tour_banner_btn_style_typ_three',
                'selector' => '{{WRAPPER}} ..primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_tour_banner_btn_style_color_three',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_banner_btn_style_bac_color_three',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_banner_btn_style_style_margin_three',
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
            'triprex_tour_banner_btn_style_padding_three',
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
            'triprex_tour_banner_btn_style_style_sec_three',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_banner_btn_style_bac_color_hover_three',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_banner_btn_style_color_hover_three',
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



        $this->start_controls_section(
            'triprex_tour_package_style_two_sec',
            [
                'label' => esc_html__('Tour Packages Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_package_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_two_section',
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
                'name'     => 'triprex_tour_package_content__heading_subtitle_style_two_section_typ',
                'selector' => '{{WRAPPER}} .section-title2 .eg-section-tag.two span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_two_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag.two span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_two_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag.two' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_title_style_two_section',
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
                'name'     => 'triprex_tour_package_content__heading_title_style_two_section_typ',
                'selector' => '{{WRAPPER}} .text-white',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_title_style_two_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-white' => 'color: {{VALUE}}; !important',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_two_section',
            [
                'label' => esc_html__('Batch Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_package_content_batch_style_two_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-img .batch span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_two_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-img .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_two_section_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-img .batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_batch_style_two_section_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-img .batch span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_batch_style_two_section_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card3 .package-card-img .batch span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_review_style_two_section',
            [
                'label' => esc_html__('Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_package_content_review_style_two_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .rating-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_review_style_two_onesection_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .rating-area .rating li i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_review_style_two_section_text_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_title_style_two_section',
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
                'name'     => 'triprex_tour_package_style_title_style_two_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_package_style_title_style_two_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_package_style_two_title_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_two_location_section',
            [
                'label' => esc_html__('Tours Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_package_content_style_two_location_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-top .feature-list li',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_two_location_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top .feature-list li' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_package_content_location_style_two_section_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top .feature-list li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_two_price_section',
            [
                'label' => esc_html__('Price Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_two_price_title_section',
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
                'name'     => 'triprex_tour_package_content_style_two_price_title_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area .title',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_two_price_title_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_two_total_price_section',
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
                'name'     => 'triprex_tour_package_content_style_two_price_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_two_price_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_two_price_section_del_color',
            [
                'label'     => esc_html__('Regular Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6 del' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_two_total_price_tax_section',
            [
                'label' => esc_html__('Person ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_package_contenttotal_price_style_two_tax_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_total_price_style_two_tax_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_two_pagination_section',
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
                'name'     => 'triprex_tour_package_content_style_two_pagination_section_typ',
                'selector' => '{{WRAPPER}} .slide-and-view-btn-grp.style-2 .slider-btn-grp3 .slider-btn span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_two_pagination_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-and-view-btn-grp.style-2 .slider-btn-grp3 .slider-btn span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .slide-and-view-btn-grp.style-2 .slider-btn-grp3 .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Button 
        $this->add_control(
            'triprex_tour_package_content_btn_style_two',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_package_content_style_tabs_two'
        );

        $this->start_controls_tab(
            'triprex_tour_package_content_style_normal_tab_two',
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
                'name'     => 'triprex_tour_package_content_style_typ_two',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_package_content_style_color_two',
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
            'triprex_tour_package_content_btn_style_bac_color_two',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_style_style_margin_two',
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
            'triprex_tour_package_content_style_padding_two',
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
            'triprex_tour_package_content_style_sec_two',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_bac_color_hover_two',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_color_hover_two',
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
            'triprex_tour_all_package_content_btn_style_two',
            [
                'label' => esc_html__('All Packages Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_all_package_content_btn_style_content_style_tabs_two'
        );

        $this->start_controls_tab(
            'triprex_tour_all_package_content_btn_style_normal_tab_two',
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
                'name'     => 'triprex_tour_all_package_content_btn_style_typ_two',
                'selector' => '{{WRAPPER}} .secondary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_all_package_content_btn_style_color_two',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn2' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_all_package_content_btn_style_bac_color_two',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .secondary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_all_package_content_btn_style_style_margin_two',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_all_package_content_btn_style_padding_two',
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
            'triprex_tour_all_package_content_btn_style_style_sec_two',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_all_package_content_btn_style_bac_color_hover_two',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_all_package_content_btn_style_color_hover_two',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn2:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // =====================Style Three=======================//

        $this->start_controls_section(
            'triprex_tour_package_style_three_sec',
            [
                'label' => esc_html__('Tour Packages Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_package_content_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_control(
            'triprex_tour_package_content__heading_title_style_three_section',
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
                'name'     => 'triprex_tour_package_content__heading_title_style_three_section_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_title_style_three_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_three_section',
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
                'name'     => 'triprex_tour_package_content__heading_subtitle_style_three_section_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_three_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_three_section',
            [
                'label' => esc_html__('Batch Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_package_content_batch_style_three_section_typ',
                'selector' => '{{WRAPPER}} .package-card3.style-4 .package-card-img .batch span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_three_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-img .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_three_section_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-img .batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_batch_style_three_section_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-img .batch span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_batch_style_three_section_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-img .batch span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_review_style_three_section',
            [
                'label' => esc_html__('Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_package_content_review_style_three_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .rating-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_review_style_three_onesection_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .rating-area .rating li i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_review_style_three_section_text_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_title_style_three_section',
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
                'name'     => 'triprex_tour_package_style_title_style_three_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_package_style_title_style_three_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_package_style_three_title_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_three_location_section',
            [
                'label' => esc_html__('Tours Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_package_content_style_three_location_section_typ',
                'selector' => '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .destination .destination-list li a',
                'selector' => '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .date span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_three_location_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .destination .destination-list li a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .date span' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_package_content_location_style_three_section_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .destination svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .date svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_three_price_section',
            [
                'label' => esc_html__('Price Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_three_price_title_section',
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
                'name'     => 'triprex_tour_package_content_style_three_price_title_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area .title',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_three_price_title_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_three_total_price_section',
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
                'name'     => 'triprex_tour_package_content_style_three_price_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_three_price_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_three_price_section_del_color',
            [
                'label'     => esc_html__('Regular Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6 del' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_three_total_price_tax_section',
            [
                'label' => esc_html__('Person ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_package_contenttotal_price_style_three_tax_section_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_total_price_style_three_tax_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_three_pagination_section',
            [
                'label' => esc_html__('Pagination Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_three_pagination_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp5 .slider-btn svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_three_pagination_section_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp5 .slider-btn:hover svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );
        // Button 
        $this->add_control(
            'triprex_tour_package_content_btn_style_three',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // All Packages Button 
        $this->add_control(
            'triprex_tour_all_package_content_btn_style_three',
            [
                'label' => esc_html__('All Packages Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_all_package_content_btn_style_content_style_tabs_three'
        );

        $this->start_controls_tab(
            'triprex_tour_all_package_content_btn_style_normal_tab_three',
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
                'name'     => 'triprex_tour_all_package_content_btn_style_typ_three',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_tour_all_package_content_btn_style_color_three',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_all_package_content_btn_style_bac_color_three',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_all_package_content_btn_style_style_margin_three',
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
            'triprex_tour_all_package_content_btn_style_padding_three',
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
            'triprex_tour_all_package_content_btn_style_style_sec_three',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_all_package_content_btn_style_bac_color_hover_three',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_all_package_content_btn_style_color_hover_three',
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


        // =====================Style Four=======================//

        $this->start_controls_section(
            'triprex_tour_package_style_four_sec',
            [
                'label' => esc_html__('Tour Packages Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_package_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_four_section',
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
                'name'     => 'triprex_tour_package_content__heading_subtitle_style_four_section_typ',
                'selector' => '{{WRAPPER}} .section-title5 span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_four_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_subtitle_style_four_section_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_title_style_four_section',
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
                'name'     => 'triprex_tour_package_content__heading_title_style_four_section_typ',
                'selector' => '{{WRAPPER}} .section-title5 h2',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content__heading_title_style_four_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_four_section',
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
                'name'     => 'triprex_tour_package_content_batch_style_four_section_typ',
                'selector' => '{{WRAPPER}} .package-card .batch .date',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_four_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_batch_style_four_section_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .date' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_batch_style_four_section_margin',
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
            'triprex_tour_package_content_batch_style_four_section_padding',
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
            'triprex_tour_package_content_destination_style_four_section',
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
                'name'     => 'triprex_tour_package_content_destination_style_four_section_typ',
                'selector' => '{{WRAPPER}} .package-card .batch .location .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_destination_style_fouronesection_color',
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
            'triprex_tour_package_content_destination_style_four_section_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .location svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_title_style_four_section',
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
                'name'     => 'triprex_tour_package_style_title_style_four_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-top h5:hover a',

            ]
        );

        $this->add_control(
            'triprex_tour_package_style_title_style_four_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_package_style_four_title_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_four_location_section',
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
                'name'     => 'triprex_tour_package_content_style_four_location_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-top .location-area .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_four_location_section_color',
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
            'triprex_tour_package_content_location_style_four_section_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top .location-area .location-list li a:hover' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_four_price_section',
            [
                'label' => esc_html__('Price Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_four_price_title_section',
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
                'name'     => 'triprex_tour_package_content_style_four_price_title_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_four_price_title_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_four_total_price_section',
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
                'name'     => 'triprex_tour_package_content_style_four_price_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_four_price_section_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_package_content_style_four_price_section_del_color',
            [
                'label'     => esc_html__('Deleted Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span del' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_style_four_total_price_tax_section',
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
                'name'     => 'triprex_tour_package_contenttotal_price_style_four_tax_section_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_tour_package_content_total_price_style_four_tax_section_color',
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
            'triprex_tour_package_content_btn_style_four',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_package_content_style_tabs_four'
        );

        $this->start_controls_tab(
            'triprex_tour_package_content_style_normal_tab_four',
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
                'name'     => 'triprex_tour_package_content_style_typ_four',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_tour_package_content_style_color_four',
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
            'triprex_tour_package_content_btn_style_bac_color_four',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_style_style_margin_four',
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
            'triprex_tour_package_content_style_padding_four',
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
            'triprex_tour_package_content_style_sec_four',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_bac_color_hover_four',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_color_hover_four',
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


        // All Packages Button 
        $this->add_control(
            'triprex_tour_all_package_content_btn_style_four',
            [
                'label' => esc_html__('All Packages Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_all_package_content_btn_style_content_style_tabs_four'
        );

        $this->start_controls_tab(
            'triprex_tour_all_package_content_btn_style_normal_tab_four',
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
                'name'     => 'triprex_tour_all_package_content_btn_style_typ_four',
                'selector' => '{{WRAPPER}} .secondary-btn4',

            ]
        );
        $this->add_control(
            'triprex_tour_all_package_content_btn_style_color_four',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn4' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_all_package_content_btn_style_bac_color_four',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_all_package_content_btn_style_style_margin_four',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_all_package_content_btn_style_padding_four',
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
            'triprex_tour_all_package_content_btn_style_style_sec_four',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_all_package_content_btn_style_bac_color_hover_four',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_all_package_content_btn_style_color_hover_four',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn4:hover' => 'color: {{VALUE}};',

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
            'post_type'      => 'tours',
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
                var swiper = new Swiper(".package-card-slider", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 25,
                    // autoplay: {
                    // 	delay: 2500, // Autoplay duration in milliseconds
                    // 	disableOnInteraction: false,
                    // },
                    navigation: {
                        nextEl: ".package-card-slider-next",
                        prevEl: ".package-card-slider-prev",
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

                var swiper = new Swiper(".home6-package-card-slider", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 20,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".home6-package-card-next",
                        prevEl: ".home6-package-card-prev",
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
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    }
                });

                var swiper = new Swiper(".package-card-slider2", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 25,
                    // autoplay: {
                    // 	delay: 2500, // Autoplay duration in milliseconds
                    // 	disableOnInteraction: false,
                    // },
                    navigation: {
                        nextEl: ".package-card-slider2-next",
                        prevEl: ".package-card-slider2-prev",
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


        <?php if ($settings['triprex_tour_package_content_style_selection'] == 'style_one') : ?>
            <div class="package-card-section">
                <?php if ('yes' == $settings['triprex_tour_package_carousel_vector_image_on_off']) : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/section-vector1.png'); ?>" alt="<?php echo esc_attr__('vector1', 'triprex-core'); ?>" class="section-vector1">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/section-vector3.png'); ?>" alt="<?php echo esc_attr__('vector2', 'triprex-core'); ?>" class="section-vector3">
                <?php endif; ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-40">
                                <?php if (!empty($settings['triprex_tours_package_one_subtitle'])) : ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z"></path>
                                        </svg>
                                        <?php echo esc_html($settings['triprex_tours_package_one_subtitle']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z"></path>
                                        </svg>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tours_package_one_title'])) : ?>
                                    <h2> <?php echo esc_html($settings['triprex_tours_package_one_title']); ?></h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-lg-4 gy-5 mb-70">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post(); ?>

                            <div class="col-lg-4 col-md-6">
                                <div class="package-card">
                                    <div class="package-card-img-wrap">
                                        <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'card-thumb'); ?>" alt="<?php echo esc_attr__('card-img', 'triprex-core'); ?>"></a>
                                        <div class="batch">
                                            <?php if (!empty(Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                <span class="date"><?php echo esc_html__(Egns_Helper::egns_tours_value('tour_duration')); ?></span>
                                            <?php endif; ?>
                                            <?php $selected_destination = Egns_Helper::egns_tours_value('tour_destination_select');
                                            if (!empty(Egns_Helper::egns_tours_value('tour_destination_select'))) :  ?>
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
                                                                <li><a href="<?php echo esc_url($destination_permalink); ?>"> <?php echo esc_html($destination_title); ?></a></li>
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
                                            <?php
                                            $selected_location = Egns_Helper::egns_tours_value('tour_destination_location_select');
                                            if (!empty($selected_location)) {
                                            ?>
                                                <div class="location-area">
                                                    <ul class="location-list scrollTextAni">
                                                        <?php
                                                        // Check if there are selected locations
                                                        foreach ($selected_location as $location_id) {
                                                            $term = get_term_by('slug', $location_id, 'city-location');
                                                            if ($term && !is_wp_error($term)) {
                                                                $term_name = esc_html($term->name);
                                                                $term_link = esc_url(get_term_link($term));
                                                        ?>
                                                                <li><a href="<?php echo esc_url($term_link); ?>"><?php echo esc_html($term_name); ?></a></li>
                                                        <?php  }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            <?php   } ?>
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
                                            <?php if (!empty($settings['triprex_tours_package_one_title_button_text'])) : ?>
                                                <a href="<?php the_permalink(); ?>" class="primary-btn2"><?php echo esc_html($settings['triprex_tours_package_one_title_button_text']); ?>
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
                    <?php if (!empty($settings['triprex_tours_package_one_bottom_button_text'])) : ?>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['triprex_tours_package_one_bottom_button_url']['url']) ?>" class="secondary-btn1"><?php echo esc_html($settings['triprex_tours_package_one_bottom_button_text']); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_tour_package_content_style_selection'] == 'style_two') : ?>

            <div class="tour-pack-section">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="section-title2 text-center">
                                <?php if (!empty($settings['triprex_tours_package_one_subtitle'])) : ?>
                                    <div class="eg-section-tag two">
                                        <span><?php echo esc_html($settings['triprex_tours_package_one_subtitle']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tours_package_one_title'])) : ?>
                                    <h2 class="text-white"><?php echo esc_html($settings['triprex_tours_package_one_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="package-card-slider-wrap">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper package-card-slider mb-60">
                                    <div class="swiper-wrapper">
                                        <?php
                                        while ($query->have_posts()) :
                                            $query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <div class="package-card3">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <a href="<?php the_permalink(); ?>" class="package-card-img">
                                                            <?php the_post_thumbnail('card-thumb'); ?>
                                                            <?php if (!empty(Egns_Helper::egns_tours_value('tour_featured_batch'))) : ?>
                                                                <?php $class_n = Egns_Helper::getBackgroundColorClass() ?>
                                                                <div class="batch <?php echo $class_n ?>">
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
                                                                <?php } ?>
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
                                                                    <span class="title"><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></span>
                                                                <?php endif; ?>
                                                                <h6><?php echo \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?></h6>
                                                                <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_after_price'))) : ?>
                                                                    <span><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_after_price')); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php if (!empty($settings['triprex_tours_package_one_title_button_text'])) : ?>
                                                                <a href="<?php the_permalink(); ?>" class="primary-btn2"> <?php echo esc_html($settings['triprex_tours_package_one_title_button_text']); ?>
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
                                <div class="slide-and-view-btn-grp style-2">
                                    <div class="slider-btn-grp3">
                                        <?php if ('yes' == $settings['triprex_tour_package_carousel_on_off']) : ?>
                                            <div class="slider-btn package-card-slider-prev">
                                                <i class="bi bi-arrow-left"></i>
                                                <span><?php echo esc_html__('PREV', 'triprex-core'); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($settings['triprex_tours_package_one_bottom_button_text'])) : ?>
                                            <a href="<?php echo esc_url($settings['triprex_tours_package_one_bottom_button_url']['url']) ?>" class="secondary-btn2"><?php echo esc_html($settings['triprex_tours_package_one_bottom_button_text']); ?></a>
                                        <?php endif; ?>
                                        <?php if ('yes' == $settings['triprex_tour_package_carousel_on_off']) : ?>
                                            <div class="slider-btn package-card-slider-next">
                                                <span><?php echo esc_html__('NEXT', 'triprex-core'); ?></span>
                                                <i class="bi bi-arrow-right"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($settings['triprex_tour_package_content_style_selection'] == 'style_three') : ?>
            <div class="home4-banner3-with-package-slider ">
                <div class="row g-0">
                    <div class="col-xl-3">
                        <div class="home4-banner3-wrapper">
                            <?php if (!empty($settings['triprex_tour_package_section_banner_image']['url'])) : ?>
                                <div class="home4-banner3-img">
                                    <img src="<?php echo esc_url($settings['triprex_tour_package_section_banner_image']['url']) ?>" alt="<?php echo esc_attr__('banner-img', 'triprex-core') ?>">
                                </div>
                            <?php endif; ?>
                            <div class="home4-banner3-content">
                                <?php if (!empty($settings['triprex_tour_package_section_banner_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['triprex_tour_package_section_banner_subtitle']); ?></span>
                                <?php endif; ?>
                                <h2> <?php if (!empty($settings['triprex_tour_package_section_banner_title'])) : ?><?php echo esc_html($settings['triprex_tour_package_section_banner_title']); ?> <br><?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_package_section_banner_offer_text'])) : ?> <strong><?php echo esc_html($settings['triprex_tour_package_section_banner_offer_text']); ?></strong><?php endif; ?></h2>
                                <?php if (!empty($settings['triprex_tour_package_section_banner_button_text'])) : ?>
                                    <a href="<?php echo esc_url($settings['triprex_tour_package_section_banner_button_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_tour_package_section_banner_button_text']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="package-card-slider-wrapper">
                            <div class="row mb-40">
                                <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="section-title3 two">
                                        <?php if (!empty($settings['triprex_tours_package_one_title'])) : ?>
                                            <h2><?php echo esc_html($settings['triprex_tours_package_one_title']); ?></h2>
                                        <?php endif ?>
                                        <?php if (!empty($settings['triprex_tours_package_one_short_description'])) : ?>
                                            <p><?php echo esc_html($settings['triprex_tours_package_one_short_description']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ('yes' == $settings['triprex_tour_package_carousel_on_off']) : ?>
                                        <div class="slider-btn-grp5">
                                            <div class="slider-btn package-card-slider2-prev">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                                    <path d="M42 7.18797L1.14917 7.18797M6.8649 13L1 7L6.86491 0.999997" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="slider-btn package-card-slider2-next">
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
                                    <div class="swiper package-card-slider2">
                                        <div class="swiper-wrapper">
                                            <?php
                                            while ($query->have_posts()) :
                                                $query->the_post(); ?>
                                                <div class="swiper-slide">
                                                    <div class="package-card3 style-4">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <a href="<?php the_permalink(); ?>" class="package-card-img">
                                                                <?php the_post_thumbnail('card-thumb'); ?>
                                                                <?php if (!empty(Egns_Helper::egns_tours_value('tour_featured_batch'))) : ?>
                                                                    <?php $class_n = Egns_Helper::getBackgroundColorClass() ?>
                                                                    <div class="batch <?php echo $class_n ?>">
                                                                        <span><?php echo esc_html__(Egns_Helper::egns_tours_value('tour_featured_batch')); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <div class="package-card-content">
                                                            <div class="card-content-top">
                                                                <div class="destination-and-date-area">
                                                                    <?php $selected_destination = Egns_Helper::egns_tours_value('tour_destination_select');
                                                                    if (!empty(Egns_Helper::egns_tours_value('tour_destination_select'))) :  ?>
                                                                        <div class="destination">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                                <g>
                                                                                    <path d="M10.6711 10.5714C12.3737 7.89975 12.1597 8.23306 12.2087 8.16341C12.8286 7.28909 13.1562 6.26006 13.1562 5.1875C13.1562 2.34313 10.8481 0 8 0C5.16119 0 2.84375 2.3385 2.84375 5.1875C2.84375 6.25938 3.17825 7.31534 3.81844 8.20144L5.32881 10.5714C3.71397 10.8196 0.96875 11.5591 0.96875 13.1875C0.96875 13.7811 1.35619 14.627 3.20194 15.2862C4.49075 15.7465 6.19472 16 8 16C11.3758 16 15.0312 15.0478 15.0312 13.1875C15.0312 11.5588 12.2893 10.8201 10.6711 10.5714ZM4.60153 7.68578C4.59638 7.67773 4.59099 7.66983 4.58537 7.66209C4.05266 6.92922 3.78125 6.06066 3.78125 5.1875C3.78125 2.84319 5.66894 0.9375 8 0.9375C10.3262 0.9375 12.2188 2.84403 12.2188 5.1875C12.2188 6.06206 11.9525 6.90116 11.4486 7.61472C11.4034 7.67428 11.639 7.30828 8 13.0184L4.60153 7.68578ZM8 15.0625C4.31269 15.0625 1.90625 13.9787 1.90625 13.1875C1.90625 12.6558 3.14275 11.7814 5.88275 11.4406L7.60469 14.1426C7.64703 14.209 7.70545 14.2637 7.77454 14.3016C7.84363 14.3395 7.92116 14.3594 7.99997 14.3594C8.07877 14.3594 8.15631 14.3395 8.2254 14.3016C8.29449 14.2637 8.35291 14.209 8.39525 14.1426L10.1172 11.4406C12.8572 11.7814 14.0938 12.6558 14.0938 13.1875C14.0938 13.9719 11.709 15.0625 8 15.0625Z"></path>
                                                                                    <path d="M8 2.84375C6.70766 2.84375 5.65625 3.89516 5.65625 5.1875C5.65625 6.47984 6.70766 7.53125 8 7.53125C9.29234 7.53125 10.3438 6.47984 10.3438 5.1875C10.3438 3.89516 9.29234 2.84375 8 2.84375ZM8 6.59375C7.22459 6.59375 6.59375 5.96291 6.59375 5.1875C6.59375 4.41209 7.22459 3.78125 8 3.78125C8.77541 3.78125 9.40625 4.41209 9.40625 5.1875C9.40625 5.96291 8.77541 6.59375 8 6.59375Z"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <ul class="destination-list">
                                                                                <?php
                                                                                if (!empty($selected_destination)) {
                                                                                    foreach ($selected_destination as $destination_id) {
                                                                                        $destination_title = get_the_title($destination_id);
                                                                                        $destination_permalink = get_permalink($destination_id);
                                                                                ?>
                                                                                        <li><a href="<?php echo esc_url($destination_permalink); ?>"> <?php echo esc_html($destination_title); ?></a></li>
                                                                                <?php   }
                                                                                }
                                                                                ?>
                                                                            </ul>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                                        <div class="date">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                                <g clip-path="url(#clip0_1587_1320)">
                                                                                    <path d="M13.6415 7.31632V3.281C13.6415 2.32193 12.8561 1.52978 11.897 1.52978H11.6797V1.25623C11.6797 0.571946 11.125 0.0172086 10.4407 0.0172086C9.75639 0.0172086 9.20166 0.571946 9.20166 1.25623V1.52978H4.65858V1.25623C4.65858 0.562447 4.09613 0 3.40235 0C2.70856 0 2.14612 0.562447 2.14612 1.25623V1.52978H1.95837C0.999265 1.52978 0.21875 2.32193 0.21875 3.281V12.5469C0.21875 13.5061 0.999265 14.2986 1.95837 14.2986H7.41674C7.86129 14.8303 8.41695 15.2582 9.04463 15.5522C9.67231 15.8461 10.3568 15.999 11.0499 16C13.6553 16 15.7776 13.8772 15.7776 11.2718C15.7777 9.62041 14.9149 8.1614 13.6415 7.31632ZM9.89 1.25623C9.8847 0.956456 10.1234 0.709133 10.4232 0.703833C10.428 0.703764 10.4328 0.70373 10.4376 0.703764C10.7402 0.700563 10.9882 0.943274 10.9914 1.2459C10.9914 1.24935 10.9914 1.25279 10.9914 1.25623V2.59671H9.89V1.25623ZM2.83446 1.25623C2.83773 0.947817 3.09042 0.70046 3.39884 0.70373C3.39936 0.703724 3.39989 0.703735 3.40042 0.703764C3.70997 0.703764 3.97023 0.946715 3.97023 1.25623V2.59671H2.83446V1.25623ZM0.907095 3.281C0.907095 2.70144 1.37882 2.21812 1.95837 2.21812H2.14612V2.9552C2.14612 3.14526 2.30485 3.28506 2.49494 3.28506H4.30597C4.49602 3.28506 4.65858 3.14526 4.65858 2.9552V2.21812H9.20166V2.9552C9.2004 2.99891 9.20809 3.04241 9.22425 3.08304C9.24042 3.12366 9.26472 3.16055 9.29566 3.19145C9.32661 3.22234 9.36354 3.24658 9.40419 3.26267C9.44484 3.27877 9.48836 3.28639 9.53206 3.28506H11.3431C11.3871 3.28652 11.431 3.27904 11.4721 3.26307C11.5131 3.2471 11.5505 3.22297 11.582 3.19214C11.6134 3.1613 11.6383 3.12441 11.6551 3.08368C11.6719 3.04296 11.6803 2.99925 11.6797 2.9552V2.21812H11.897C12.4805 2.22401 12.9509 2.69752 12.9531 3.281V4.38641H0.907095V3.281ZM1.95837 13.6102C1.37882 13.6102 0.907095 13.1265 0.907095 12.5469V5.07476H12.9531V6.94203C12.354 6.67899 11.7068 6.54329 11.0525 6.54355C8.44709 6.54355 6.32606 8.6694 6.32606 11.2749C6.32474 12.0934 6.53632 12.8982 6.94003 13.6102H1.95837ZM11.0499 15.3055C8.82038 15.3055 7.01303 13.4982 7.01303 11.2687C7.01303 9.03921 8.82038 7.23186 11.0499 7.23186C13.2793 7.23186 15.0867 9.03921 15.0867 11.2687V11.2687C15.0842 13.4971 13.2783 15.303 11.0499 15.3055Z"></path>
                                                                                    <path d="M12.6727 11.2698H11.1649V9.19891C11.1649 9.00882 11.0108 8.85474 10.8207 8.85474C10.6306 8.85474 10.4766 9.00882 10.4766 9.19891V11.6136C10.478 11.7056 10.5156 11.7933 10.5812 11.8578C10.6468 11.9223 10.7352 11.9583 10.8272 11.9581H12.6727C12.8628 11.9581 13.0169 11.8041 13.0169 11.614C13.0169 11.4239 12.8628 11.2698 12.6727 11.2698Z"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <span><?php echo esc_html__(Egns_Helper::egns_tours_value('tour_duration')); ?></span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
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
                                                                        <?php
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="card-content-bottom">
                                                                <div class="price-area">
                                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_before_price'))) : ?>
                                                                        <span class="title"><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></span>
                                                                    <?php endif; ?>
                                                                    <h6><?php echo \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?></h6>
                                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_after_price'))) : ?>
                                                                        <span><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_after_price')); ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php if (function_exists('run_reviewx')) : ?>
                                                                    <div class="rating-area mb-0">
                                                                        <?php echo do_shortcode('[rvx-star-count]') ?>
                                                                    </div>
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
                            <?php if (!empty($settings['triprex_tours_package_one_bottom_button_text'])) : ?>
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <a href="<?php echo esc_url($settings['triprex_tours_package_one_bottom_button_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_tours_package_one_bottom_button_text']); ?></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>


        <?php if ($settings['triprex_tour_package_content_style_selection'] == 'style_four') : ?>
            <div class="home6-tourpack-section mb-120">
                <div class="container one">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <div class="section-title5">
                                <?php if (!empty($settings['triprex_tours_package_one_subtitle'])) : ?>
                                    <span>
                                        <?php echo esc_html($settings['triprex_tours_package_one_subtitle']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g opacity="0.8">
                                                <path d="M9.06226 11.3626L8.55838 13.7263L6.22997 20.0004L7.61194 19.7701L14.0678 11.3277C14.979 11.296 15.8626 11.2471 16.6304 11.1713C20.1826 10.82 19.9984 10.0002 19.9984 10.0002C19.9984 10.0002 20.1826 9.18031 16.6304 8.829C15.8626 8.7529 14.9789 8.70407 14.0678 8.67261L7.61197 0.229974L6.22997 -6.01907e-07L8.55838 6.27416L9.06226 8.6378C7.87942 8.6555 7.07898 8.68244 7.07898 8.68244C7.07898 8.68244 5.44724 8.7201 2.92253 9.28895L0.864093 6.43364L-0.000128074 6.43364L0.615287 9.90529C0.504522 9.93924 0.504522 10.0611 0.615287 10.0951L-0.000128385 13.5667L0.864093 13.5667L2.92253 10.7117C5.44724 11.2806 7.07898 11.3177 7.07898 11.3177C7.07898 11.3177 7.87942 11.3449 9.06226 11.3626Z" />
                                                <path d="M13.4102 13.2575L13.4102 14.1895L9.96575 14.1895L9.96575 13.2575L13.4102 13.2575ZM13.4102 5.81414L13.4102 6.7458L9.96595 6.7458L9.96595 5.81414L13.4102 5.81414ZM11.0863 16.385L11.0863 17.3167L7.90291 17.3167L7.90291 16.385L11.0863 16.385ZM11.0863 2.68689L11.0863 3.61885L7.90291 3.61885L7.90291 2.68689L11.0863 2.68689Z" />
                                            </g>
                                        </svg>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tours_package_one_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_tours_package_one_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <?php if ('yes' == $settings['triprex_tour_package_carousel_on_off']) : ?>
                                <div class="slider-btn-grp two d-md-flex d-none">
                                    <div class="slider-btn home6-package-card-prev">
                                        <i class="bi bi-arrow-left"></i>
                                    </div>
                                    <div class="slider-btn home6-package-card-next">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="package-card-slider-wrap mb-50">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper home6-package-card-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                                        while ($query->have_posts()) :
                                            $query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <div class="package-card style-2">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <div class="package-card-img-wrap">
                                                            <a href="<?php the_permalink(); ?>" class="card-img"><?php the_post_thumbnail('card-thumb'); ?></a>
                                                            <div class="batch">
                                                                <?php if (!empty(Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                                    <span class="date"><?php echo esc_html__(Egns_Helper::egns_tours_value('tour_duration')); ?></span>
                                                                <?php endif; ?>
                                                                <?php $selected_destination = Egns_Helper::egns_tours_value('tour_destination_select');
                                                                if (!empty(Egns_Helper::egns_tours_value('tour_destination_select'))) :  ?>
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
                                                                                    <li><a href="<?php echo esc_url($destination_permalink); ?>"> <?php echo esc_html($destination_title); ?></a></li>
                                                                            <?php   }
                                                                            }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
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
                                                            </div>
                                                            <?php if (!empty($settings['triprex_tours_package_one_title_button_text'])) : ?>
                                                                <a href="<?php the_permalink(); ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_tours_package_one_title_button_text']); ?>
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
                    <?php if (!empty($settings['triprex_tours_package_one_bottom_button_text'])) : ?>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['triprex_tours_package_one_bottom_button_url']['url']) ?>" class="secondary-btn4"><?php echo esc_html($settings['triprex_tours_package_one_bottom_button_text']); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Tour_Package_Widget());
