<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;


class Triprex_Tour_By_Categories_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_tour_by_categories';
    }

    public function get_title()
    {
        return esc_html__('EG Tour By Categories', 'triprex-core');
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
            'triprex_tour_by_categories_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_tour_categories_heading_area_sec',
            [
                'label' => esc_html__('Heading Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );


        $this->add_control(
            'triprex_tour_categories_heading_area_sec_title',
            [
                'label' => esc_html__('Heading Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Types Of Tours'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_tour_categories_heading_area_sec_short_description',
            [
                'label' => esc_html__('Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_tour_categories_heading_area_button_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Explore Now'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_tour_categories_query_area_sec',
            [
                'label' => esc_html__('Query Area (Categories)', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'triprex_tour_categories_section_queary_sec_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'triprex_tour_categories_section_queary_sec_orderby',
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
            'triprex_tour_categories_section_queary_sec_post_list',
            [
                'label'         => esc_html__('All Category Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options' => Egns_Helper::get_tours_categories_for_select(),
            ]
        );

        $this->add_control(
            'triprex_tour_categories_section_queary_sec_template_order',
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
            'triprex_tour_categories_tours_query_area_sec',
            [
                'label' => esc_html__('Query Area (Tours)', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'triprex_destination_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3,
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
            'triprex_tour_categories_button_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'triprex_tour_categories_button_area_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('View All Package'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_tour_categories_button_area_url',
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
            'triprex_tour_categories_style_one_sec',
            [
                'label' => esc_html__('Category Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'triprex_tour_categories_style_one_sec_heading_title',
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
                'name'     => 'triprex_tour_categories_style_one_sec_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );
        $this->add_control(
            'triprex_tour_categories_style_one_sec_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_categories_style_one_sec_heading_description',
            [
                'label' => esc_html__('Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_categories_style_one_sec_heading_description_typ',
                'selector' => '{{WRAPPER}} .section-title2 p',

            ]
        );
        $this->add_control(
            'triprex_tour_categories_style_one_sec_heading_description_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_categories_style_one_sec_heading_category_name',
            [
                'label' => esc_html__('Category Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_categories_style_one_sec_heading_category_name_typ',
                'selector' => '{{WRAPPER}} .tour-type-tab-slider-section .tab-slider-wrap .nav-pills .tour-tab-slider .nav-item .nav-link .content h5',

            ]
        );
        $this->add_control(
            'triprex_tour_categories_style_one_sec_heading_category_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-type-tab-slider-section .tab-slider-wrap .nav-pills .tour-tab-slider .nav-item .nav-link .content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_categories_style_one_sec_heading_category_name_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-type-tab-slider-section .tab-slider-wrap .nav-pills .tour-tab-slider .nav-item .nav-link.active .content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Batch
        $this->add_control(
            'triprex_tour_by_categories_two_tab_tour_packages_content_batch_sec',
            [
                'label' => esc_html__(' Batch', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_categories_two_tab_tour_packages_content_batch_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3.style-3 .package-card-img .eg-batch span',

            ]
        );

        $this->add_control(
            'triprex_tour_tour_by_categories_two_tab_tour_packages_content_batch_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-img .eg-batch span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_tour_packages_content_batch_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-img .eg-batch span' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_by_categories_two_tab_tour_packages_content_batch_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-img .eg-batch span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_by_categories_two_tab_tour_packages_content_batch_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-img .eg-batch span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_distination_sec',
            [
                'label' => esc_html__('Info Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_categories_two_tab_style_distination_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-img .package-card-img-bottom ul li',

            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_distination_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-img .package-card-img-bottom ul li' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_distination_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-img .package-card-img-bottom ul li svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_categories_two_tab_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_title_sec_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5:hover a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_location_sec',
            [
                'label' => esc_html__(' Location', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_categories_two_tab_style_location_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .location-area .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_location_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .location-area .location-list li a' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .package-card3 .location-area .location-list li::before' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_price_sec',
            [
                'label' => esc_html__(' Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_price_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_categories_two_tab_style_price_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_price_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_price_total_price_sec',
            [
                'label' => esc_html__(' Total Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_by_categories_two_tab_style_price_total_price_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_price_total_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area >h6' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        // Button 
        $this->add_control(
            'triprex_tour_tour_by_categories_two_tab_style_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_by_categories_two_tab_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_by_categories_two_tab_style_style_normal_tab',
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
                'name'     => 'triprex_tour_by_categories_two_tab_style_style_typ',
                'selector' => '{{WRAPPER}}  .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn',

            ]
        );
        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn svg' => 'fill: {{VALUE}};',

                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_tour_by_categories_two_tab_style_btn_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_by_categories_two_tab_style_btn_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_tour_by_categories_two_tab_style_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_by_categories_two_tab_style_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn:hover svg' => 'fill: {{VALUE}};',

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
?>
        <?php if (is_admin()) : ?>
            <script>
                var activities = new Swiper(".tour-tab-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 30,
                    navigation: {
                        nextEl: ".tour-tab-slider-next",
                        prevEl: ".tour-tab-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        386: {
                            slidesPerView: 2,
                            spaceBetween: 15,
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
                            slidesPerView: 5,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 5,
                        },
                    }
                });
            </script>
        <?php endif; ?>
        <div class="tour-type-tab-slider-section">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home3/vector/tour-type-section-vector1.svg'); ?>" alt="<?php echo esc_attr__('image-vector', 'triprex-core'); ?>" class="section-vector1">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home3/vector/tour-type-section-vector1.svg'); ?>" alt="<?php echo esc_attr__('image-vector', 'triprex-core'); ?>" class="section-vector2">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="section-title2 two text-center">
                            <?php if (!empty($settings['triprex_tour_categories_heading_area_sec_title'])) : ?>
                                <h2><?php echo esc_html($settings['triprex_tour_categories_heading_area_sec_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['triprex_tour_categories_heading_area_sec_short_description'])) : ?>
                                <p><?php echo esc_html($settings['triprex_tour_categories_heading_area_sec_short_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-slider-wrap">
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="nav nav-pills" id="pills-tab3" role="tablist">
                                <div class="swiper tour-tab-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $selected_category = $settings['triprex_tour_categories_section_queary_sec_post_list'];
                                        $default_thumbnail = 'No Thumbnail';
                                        $terms = get_terms(array(
                                            'taxonomy'   => 'tour-types',
                                            'hide_empty' => false,
                                            'number'     => $settings['triprex_tour_categories_section_queary_sec_post_per_page'],
                                            'orderby'    => $settings['triprex_tour_categories_section_queary_sec_orderby'],
                                            'include' => $selected_category,
                                            'order'      => $settings['triprex_tour_categories_section_queary_sec_template_order'],
                                        ));

                                        if ($terms && !is_wp_error($terms)) {

                                            foreach ($terms as $index => $term) {
                                                $meta = get_term_meta($term->term_id, 'triprex-tours-type', true);
                                                $tour_type_icon = $meta['triprex_tour_type_icon']['url'] ?? '';
                                                $tour_type_thumbnail = $meta['triprex_tour_type_thumbnail']['url'] ?? $default_thumbnail;
                                                $tab_id = esc_attr($term->slug . '-tab');
                                                $tab_data_target = esc_attr('#' . $term->slug);

                                        ?>
                                                <div class="swiper-slide">
                                                    <div class="nav-item" role="presentation">
                                                        <div class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>" id="<?php echo $tab_id; ?>" data-bs-toggle="pill" data-bs-target="<?php echo $tab_data_target; ?>" role="tab" aria-controls="<?php echo esc_attr($term->slug); ?>" aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                                            <?php if (!empty($tour_type_icon)) : ?>

                                                                <?php
                                                                $checkFileType = '';
                                                                if (!empty(pathinfo($tour_type_icon, PATHINFO_EXTENSION))) {
                                                                    $checkFileType = pathinfo($tour_type_icon, PATHINFO_EXTENSION);
                                                                }
                                                                ?>
                                                                <div class="icon">
                                                                    <?php if ($checkFileType == 'svg') : ?>
                                                                        <?php echo file_get_contents($tour_type_icon); ?>
                                                                    <?php else : ?>
                                                                        <img src="<?php echo esc_url($tour_type_icon); ?>" alt="<?php echo esc_attr__('icon-image', 'triprex-core'); ?>">
                                                                    <?php endif ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="content">
                                                                <h5><?php echo esc_html($term->name); ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                                <div class="slider-btn-grp4">
                                    <div class="slider-btn tour-tab-slider-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 16 20">
                                            <path d="M15.9512 0.869644C13.5972 7.34699 13.5419 12.9847 15.8404 19.1322C15.9511 19.4021 15.8404 19.7319 15.6188 19.8819C15.3973 20.0618 15.0927 20.0318 14.8988 19.8219C10.1356 14.7839 5.28936 11.7252 0.470783 10.6756C0.193853 10.6157 1.79767e-06 10.3458 1.82127e-06 10.0759C1.84749e-06 9.77599 0.193853 9.50611 0.470783 9.44613C5.26167 8.36657 10.1633 5.24785 15.0096 0.179928C15.1204 0.0599765 15.2588 -1.97214e-06 15.425 -1.95762e-06C15.5358 -1.94793e-06 15.6465 0.0299873 15.7573 0.119951C15.9788 0.26989 16.0619 0.569767 15.9512 0.869644Z" />
                                        </svg>
                                    </div>
                                    <div class="slider-btn tour-tab-slider-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 16 20">
                                            <path d="M0.0488516 19.1304C2.40275 12.6531 2.45814 7.01538 0.159624 0.867897C0.0488521 0.598007 0.159624 0.268143 0.381167 0.118204C0.602711 -0.0617224 0.907334 -0.0317344 1.10118 0.17818C5.86437 5.21612 10.7106 8.27486 15.5292 9.32443C15.8061 9.38441 16 9.6543 16 9.92419C16 10.2241 15.8061 10.494 15.5292 10.5539C10.7383 11.6335 5.83668 14.7522 0.990413 19.8201C0.879641 19.9401 0.741176 20.0001 0.575018 20.0001C0.464247 20.0001 0.353474 19.9701 0.242703 19.8801C0.0211589 19.7302 -0.0619202 19.4303 0.0488516 19.1304Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tab3Content">
                        <?php
                        foreach ($terms as $index => $term) {
                            $content_id = esc_attr($term->slug);
                        ?>
                            <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>" id="<?php echo $content_id; ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($term->slug . '-tab'); ?>">
                                <div class="row g-4 mb-60">
                                    <?php
                                    $tour_args = array(
                                        'post_type'      => 'tours',
                                        'posts_per_page' => $settings['triprex_destination_posts_per_page'],
                                        'orderby'        => $settings['triprex_destination_template_orderby'],
                                        'order'          => $settings['triprex_destination_template_order'],
                                        'tax_query'      => array(
                                            array(
                                                'taxonomy' => 'tour-types',
                                                'field'    => 'slug',
                                                'terms'    => $term->slug,
                                            ),
                                        ),
                                    );
                                    $tour_query = new \WP_Query($tour_args);
                                    if ($tour_query->have_posts()) :
                                        while ($tour_query->have_posts()) : $tour_query->the_post();
                                    ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="package-card3 style-3">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <a href="<?php the_permalink(); ?>" class="package-card-img">
                                                            <?php the_post_thumbnail('card-thumb'); ?>
                                                            <?php if (!empty(Egns_Helper::egns_tours_value('tour_featured_batch'))) : ?>
                                                                <?php $class_n = Egns_Helper::getBackgroundColorClass() ?>
                                                                <div class="eg-batch <?php echo $class_n ?>">
                                                                    <span><?php echo esc_html__(Egns_Helper::egns_tours_value('tour_featured_batch')); ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="package-card-img-bottom">
                                                                <ul>
                                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                                        <li>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                                                                <g clip-path="url(#clip0_1527_1328)">
                                                                                    <path d="M11.9383 6.40178V2.87087C11.9383 2.03169 11.2511 1.33856 10.4118 1.33856H10.2217V1.0992C10.2217 0.500453 9.73629 0.0150575 9.13755 0.0150575C8.5388 0.0150575 8.0534 0.500453 8.0534 1.0992V1.33856H4.07821V1.0992C4.07821 0.492141 3.58607 0 2.97901 0C2.37195 0 1.87981 0.492141 1.87981 1.0992V1.33856H1.71553C0.87631 1.33856 0.193359 2.03169 0.193359 2.87087V10.9786C0.193359 11.8178 0.87631 12.5113 1.71553 12.5113H6.4916C6.88058 12.9765 7.36678 13.351 7.916 13.6082C8.46522 13.8654 9.06412 13.9991 9.67058 14C11.9503 14 13.8073 12.1426 13.8073 9.86282C13.8074 8.41786 13.0525 7.14122 11.9383 6.40178ZM8.6557 1.0992C8.65107 0.836899 8.85991 0.620492 9.12222 0.615854C9.12643 0.615794 9.13065 0.615763 9.13487 0.615794C9.39964 0.612993 9.61659 0.825365 9.61939 1.09017C9.61942 1.09318 9.61942 1.09619 9.61939 1.0992V2.27212H8.6557V1.0992ZM2.48211 1.0992C2.48497 0.82934 2.70607 0.612903 2.97593 0.615763C2.9764 0.615758 2.97686 0.615768 2.97732 0.615794C3.24818 0.615794 3.47591 0.828376 3.47591 1.0992V2.27212H2.48211V1.0992ZM0.795661 2.87087C0.795661 2.36376 1.20842 1.94086 1.71553 1.94086H1.87981V2.5858C1.87981 2.7521 2.0187 2.87443 2.18502 2.87443H3.76968C3.93597 2.87443 4.07821 2.7521 4.07821 2.5858V1.94086H8.0534V2.5858C8.0523 2.62405 8.05903 2.66211 8.07317 2.69766C8.08732 2.7332 8.10858 2.76548 8.13566 2.79251C8.16273 2.81954 8.19505 2.84075 8.23062 2.85484C8.26619 2.86893 8.30427 2.87559 8.34251 2.87443H9.92716C9.96569 2.87571 10.0041 2.86916 10.04 2.85519C10.0759 2.84121 10.1086 2.8201 10.1362 2.79312C10.1637 2.76614 10.1855 2.73386 10.2002 2.69822C10.2149 2.66259 10.2222 2.62435 10.2217 2.5858V1.94086H10.4118C10.9223 1.94601 11.334 2.36033 11.3359 2.87087V3.83811H0.795661V2.87087ZM1.71553 11.909C1.20842 11.909 0.795661 11.4857 0.795661 10.9786V4.44041H11.3359V6.07428C10.8117 5.84412 10.2454 5.72538 9.67287 5.7256C7.39316 5.7256 5.53725 7.58572 5.53725 9.8655C5.5361 10.5817 5.72124 11.2859 6.07448 11.909H1.71553ZM9.67058 13.3923C7.71979 13.3923 6.13835 11.8109 6.13835 9.86011C6.13835 7.90931 7.71979 6.32788 9.67058 6.32788C11.6214 6.32788 13.2028 7.90931 13.2028 9.86011V9.86014C13.2006 11.81 11.6205 13.3901 9.67058 13.3923Z" />
                                                                                    <path d="M11.0896 9.86122H9.77027V8.0492C9.77027 7.88287 9.63545 7.74805 9.46912 7.74805C9.30279 7.74805 9.16797 7.88287 9.16797 8.0492V10.1621C9.16923 10.2426 9.20213 10.3193 9.25955 10.3757C9.31697 10.4321 9.39429 10.4637 9.47478 10.4635H11.0896C11.2559 10.4635 11.3908 10.3287 11.3908 10.1624C11.3908 9.99605 11.2559 9.86122 11.0896 9.86122Z" />
                                                                                </g>
                                                                            </svg>
                                                                            <?php echo esc_html__(Egns_Helper::egns_tours_value('tour_duration')); ?>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                    <?php
                                                                    $selected_destination = Egns_Helper::egns_tours_value('tour_destination_select');

                                                                    if (is_array($selected_destination)) {
                                                                        $numberOfDestinations = count($selected_destination); ?>
                                                                        <li>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                                <g clip-path="url(#clip0_1527_1322)">
                                                                                    <path d="M2.07812 4.19617e-05V14" stroke-miterlimit="10" />
                                                                                    <path d="M2.07812 1.23049C2.07812 1.23049 3.30859 2.0508 4.53906 2.0508C6.50515 2.0508 7.49482 0.41018 9.46092 0.41018C10.6914 0.41018 11.9218 1.23049 11.9218 1.23049V7.79297C11.9218 7.79297 10.6914 6.97266 9.46092 6.97266C7.49482 6.97266 6.50515 8.61328 4.53906 8.61328C3.30859 8.61328 2.07812 7.79297 2.07812 7.79297" stroke-miterlimit="10" />
                                                                                </g>
                                                                            </svg>
                                                                            <?php echo esc_html__($numberOfDestinations, 'triprex-core'); ?> <?php echo esc_html__('Countries', 'triprex-core'); ?>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="package-card-content">
                                                        <div class="card-content-top">
                                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                            <div class="location-area">
                                                                <ul class="location-list">
                                                                    <?php
                                                                    $selected_location = Egns_Helper::egns_tours_value('tour_destination_location_select');
                                                                    // Check if there are selected locations
                                                                    if (!empty($selected_location)) {
                                                                        foreach ($selected_location as $location_id) {
                                                                            $term = get_term($location_id, 'city-location');
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
                                                                    <span><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></span>
                                                                <?php endif; ?>
                                                                <h6><?php echo \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?></h6>
                                                            </div>
                                                            <?php if (!empty($settings['triprex_tour_categories_heading_area_button_sec'])) : ?>
                                                                <a href="<?php the_permalink(); ?>" class="explore-btn"> <?php echo esc_html($settings['triprex_tour_categories_heading_area_button_sec']); ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10">
                                                                        <path d="M1 4.25C0.585786 4.25 0.25 4.58579 0.25 5C0.25 5.41421 0.585786 5.75 1 5.75V4.25ZM21 5L13.5 0.669873V9.33013L21 5ZM1 5.75H14.25V4.25H1V5.75Z"></path>
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
                                    endif;
                                    ?>
                                </div>
                                <?php if (!empty($settings['triprex_tour_categories_button_area_text'])) : ?>
                                    <div class="row">
                                        <div class="col-lg-12 d-flex justify-content-center">
                                            <a href=" <?php echo esc_url($settings['triprex_tour_categories_button_area_url']['url']) ?>" class="primary-btn4 two">
                                                <span>
                                                    <?php echo esc_html($settings['triprex_tour_categories_button_area_text']); ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                        <path d="M7.70294 9.65818L7.27464 11.6673L5.29549 17.0003L6.47016 16.8046L11.9577 9.62856C12.7321 9.6016 13.4832 9.56006 14.1359 9.49563C17.1552 9.19702 16.9986 8.50013 16.9986 8.50013C16.9986 8.50013 17.1552 7.80325 14.1358 7.50464C13.4832 7.43995 12.7321 7.39845 11.9576 7.3717L6.47019 0.195477L5.29549 -5.1162e-07L7.27464 5.33303L7.70294 7.34212C6.69752 7.35717 6.01715 7.38006 6.01715 7.38006C6.01715 7.38006 4.63017 7.41207 2.48417 7.8956L0.734503 5.46859L-8.41624e-05 5.46859L0.523018 8.41949C0.428867 8.44835 0.428867 8.55195 0.523018 8.58081L-8.44274e-05 11.5317L0.734502 11.5317L2.48417 9.10495C4.63017 9.58848 6.01715 9.62001 6.01715 9.62001C6.01715 9.62001 6.69752 9.64317 7.70294 9.65818Z"></path>
                                                        <path d="M11.4004 11.2692L11.4004 12.0613L8.47265 12.0613L8.47265 11.2692L11.4004 11.2692ZM11.4004 4.94234L11.4004 5.73425L8.47282 5.73425L8.47282 4.94234L11.4004 4.94234ZM9.42515 13.9276L9.42515 14.7195L6.71923 14.7195L6.71923 13.9276L9.42515 13.9276ZM9.42515 2.28418L9.42515 3.07634L6.71924 3.07634L6.71924 2.28418L9.42515 2.28418Z"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Tour_By_Categories_Widget());
