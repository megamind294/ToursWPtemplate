<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;

class Triprex_Custom_Post_Tab_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_custom_post_tab';
    }

    public function get_title()
    {
        return esc_html__('EG Custom Post Tab', 'triprex-core');
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
            'triprex_tour_facilities_tab_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_content_style_selection',
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
            'triprex_custom_post_tab_on_off_hotels',
            [
                'label' => esc_html__('Show/Hide Hotel Tab ?', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'triprex_custom_post_tab_on_off_transports',
            [
                'label' => esc_html__('Show/Hide Transports Tab ?', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_heading_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_sub_title',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Tour Experience', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => ['style_one', 'style_four'],
                ]

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Ultimate Travel Experience', 'triprex-core'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_short_description',
            [
                'label' => esc_html__('Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.', 'triprex-core'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => ['style_two', 'style_three'],
                ]
            ]
        );

        $this->end_controls_section();


        //tours tab
        $this->start_controls_section(
            'triprex_tour_tab_section_tour',
            [
                'label' => esc_html__('Tours', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_tours_tab_select_custom_post_tab_names_tour',
            [
                'label' => esc_html__('Tab Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_button_sec_name_tour',
            [
                'label' => esc_html__('Tours', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Tour Package', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_destination_heading_query_area_tour',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        $this->add_control(
            'triprex_tours_tab_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3,
                'label_block' => false,

            ]
        );

        $this->add_control(
            'triprex_tours_tab_template_orderby',
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
            'tours_tab_post_list',
            [
                'label'         => esc_html__('All Tour Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_tours_post_options(),

            ]
        );

        $this->add_control(
            'triprex_tours_tab_template_order',
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
            'triprex_tour_facilities_tab_one_section_genaral_button_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Book A Trip', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_destination_bottom_button_area_tour',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two',
                ]

            ]
        );

        $this->add_control(
            'triprex_destination_bottom_button_area_tours_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Package', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_bottom_button_area_tours_url',
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
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two',
                ]

            ]
        );


        $this->end_controls_section();

        //hotels tab
        $this->start_controls_section(
            'triprex_tour_tab_section_hotel',
            [
                'label' => esc_html__('Hotels', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_tours_tab_select_custom_post_tab_names_hotel',
            [
                'label' => esc_html__('Tab Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_button_sec_name_hotel',
            [
                'label' => esc_html__('Hotel', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Hotel', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_destination_heading_query_area_hotel',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        //hotel

        $this->add_control(
            'triprex_hotel_tab_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3,
                'label_block' => false,

            ]
        );

        $this->add_control(
            'triprex_hotel_tab_template_orderby',
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
            'hotel_tab_post_list',
            [
                'label'         => esc_html__('All Hotel Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_hotels_post_options(),

            ]
        );

        $this->add_control(
            'triprex_hotel_tab_template_order',
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
            'triprex_tour_facilities_tab_one_section_genaral_button_sec_hotel',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Check Availability ', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_destination_bottom_button_area_hotel',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two',
                ]

            ]
        );



        $this->add_control(
            'triprex_destination_bottom_button_area_hotel_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Hotel', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_bottom_button_area_hotel_url',
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
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two',
                ]
            ]
        );




        $this->end_controls_section();

        //transports tab
        $this->start_controls_section(
            'triprex_tour_tab_section_transport',
            [
                'label' => esc_html__('Transports', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_tours_tab_select_custom_post_tab_names_transport',
            [
                'label' => esc_html__('Tab Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_button_sec_name_transport',
            [
                'label' => esc_html__('Transports', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Transports', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_destination_heading_query_area_transport',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        //transports


        $this->add_control(
            'triprex_transport_tab_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3,
                'label_block' => false,

            ]
        );

        $this->add_control(
            'triprex_transport_tab_template_orderby',
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
            'transport_tab_post_list',
            [
                'label'         => esc_html__('All Transport Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_transports_post_options(),

            ]
        );

        $this->add_control(
            'triprex_transport_tab_template_order',
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
            'triprex_tour_facilities_tab_one_section_genaral_button_sec_transport',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View Details', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,



            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_button_sec_available_transport',
            [
                'label' => esc_html__('Transport Label', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Available Transport', 'triprex-core'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,



            ]
        );


        $this->add_control(
            'triprex_destination_bottom_button_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two',
                ]

            ]
        );


        $this->add_control(
            'triprex_destination_bottom_button_area_transport_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Transports', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'triprex_destination_bottom_button_area_transport_url',
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
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two',
                ]

            ]
        );



        $this->end_controls_section();
        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_tour_facilities_tab_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_heading_style_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_heading_subtitle_style_section',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_one_section_genaral_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_heading_subtitle_color',
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
            'triprex_tour_facilities_tab_one_section_genaral_heading_subtitle_margin',
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
            'triprex_tour_facilities_tab_one_section_genaral_heading_subtitle_padding',
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
            'triprex_tour_facilities_tab_one_section_genaral_heading_title_style_section',
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
                'name'     => 'triprex_tour_facilities_tab_one_section_genaral_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_one_section_genaral_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_one_section_genaral_heading_title_margin',
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
            'triprex_tour_facilities_tab_one_section_genaral_heading_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_tour_packages_facilities_tab_sec',
            [
                'label' => esc_html__('Tab ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_one'
                ]
            ]
        );


        // Icon
        $this->add_control(
            'triprex_tour_packages_facilities_tab_sec_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_sec_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link   i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_sec_icon_sec_svg_size',
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
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_tab_style_sec',
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
                'name'     => 'triprex_tour_facilities_tab_style_sec_typ',
                'selector' => '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_tab_style_sec_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link.active' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link.active svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_tour_packages_facilities_tab_content_sec',
            [
                'label' => esc_html__('Tour Packages ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_one'
                ]
            ]
        );

        // Batch
        $this->add_control(
            'triprex_tour_packages_facilities_tab_tour_packages_content_batch_sec',
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
                'name'     => 'triprex_tour_packages_facilities_tab_tour_packages_content_batch_sec_typ',
                'selector' => '{{WRAPPER}} .package-card .batch .date',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_tour_packages_content_batch_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .date' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_tour_packages_content_batch_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .date' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_tab_tour_packages_content_batch_sec_margin',
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
            'triprex_tour_packages_facilities_tab_tour_packages_content_batch_sec_padding',
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
            'triprex_tour_facilities_tab_style_distination_sec',
            [
                'label' => esc_html__(' Destination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_style_distination_sec_typ',
                'selector' => '{{WRAPPER}} .package-card .batch .location .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_distination_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .batch .location .location-list li a' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .package-card .batch .location .location-list li::before' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_title_sec',
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
                'name'     => 'triprex_tour_facilities_tab_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top h5 a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_tab_style_title_sec_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-top h5:hover a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_location_sec',
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
                'name'     => 'triprex_tour_facilities_tab_style_location_sec_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-top .location-area .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_location_sec_color',
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
            'triprex_tour_facilities_tab_style_price_sec',
            [
                'label' => esc_html__(' Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_price_title_sec',
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
                'name'     => 'triprex_tour_facilities_tab_style_price_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_price_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area h6' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_price_total_price_sec',
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
                'name'     => 'triprex_tour_facilities_tab_style_price_total_price_sec_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_price_total_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area >span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_tab_style_price_total_delete_price_sec_color',
            [
                'label'     => esc_html__('Delete Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area span del' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_price_tax_sec',
            [
                'label' => esc_html__(' Tax Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_style_price_tax_sec_typ',
                'selector' => '{{WRAPPER}} .package-card .package-card-content .card-content-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_price_tax_sec_color',
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
            'triprex_tour_facilities_tab_style_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_facilities_tab_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_facilities_tab_style_style_normal_tab',
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
                'name'     => 'triprex_tour_facilities_tab_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_facilities_tab_style_btn_style_color',
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
            'triprex_tour_facilities_tab_style_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_style_btn_style_margin',
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
            'triprex_tour_facilities_tab_style_btn_style_padding',
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
            'triprex_tour_facilities_tab_style_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_color_hover',
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

        $this->end_controls_section();

        //Hotel
        $this->start_controls_section(
            'triprex_tour_packages_facilities_tab_hotel_sec',
            [
                'label' => esc_html__('Hotel ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_one'
                ]
            ]
        );

        // Total Reviews
        $this->add_control(
            'triprex_tour_packages_facilities_tab_tour_packages_content_total_reviews_sec',
            [
                'label' => esc_html__(' Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_tab_tour_packages_content_total_reviews_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_tour_packages_content_total_reviews_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_tab_tour_packages_content_total_reviews_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_tab_tour_packages_content_total_reviews_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->add_control(
            'triprex_tour_facilities_tab_style_main_title_sec',
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
                'name'     => 'triprex_tour_facilities_tab_style_main_title_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_main_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_main_title_sec_hov_color',
            [
                'label'     => esc_html__(' Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a:hover' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_hotel_location_sec',
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
                'name'     => 'triprex_tour_facilities_tab_style_hotel_location_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_hotel_location_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_tab_style_hotel_location_sec_map_color',
            [
                'label'     => esc_html__('Map Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_facilities_sec',
            [
                'label' => esc_html__(' Facilities', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_style_facilities_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_facilities_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_tab_style_facilities_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li svg' => 'fill: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_room_type_sec',
            [
                'label' => esc_html__(' Room Type', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_style_room_type_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type h6',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_room_type_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type h6' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_room_type_total_bed_sec',
            [
                'label' => esc_html__(' Total bed', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_style_room_type_total_bed_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type > span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_room_type_total_bed_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type > span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_room_type_deals_sec',
            [
                'label' => esc_html__('Deals', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_style_room_type_deals_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_room_type_deals_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_room_type_deals_sec_cancellation_color',
            [
                'label'     => esc_html__(' Cancellation text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span strong' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_book_sec',
            [
                'label' => esc_html__(' Price Area Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_style_book_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_book_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area p' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_book_price_sec',
            [
                'label' => esc_html__(' Price  ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_style_book_price_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_book_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_book_deleted_price_sec_color_one',
            [
                'label'     => esc_html__('Deleted Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span del' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );


        // Button 
        $this->add_control(
            'triprex_tour_facilities_tab_hotel_style_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_facilities_tab_hotel_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_facilities_tab_hotel_style_style_normal_tab',
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
                'name'     => 'triprex_tour_facilities_tab_hotel_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_facilities_tab_hotel_style_style_color',
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
            'triprex_tour_facilities_tab_hotel_style_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_hotel_style_style_style_margin',
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
            'triprex_tour_facilities_tab_hotel_style_style_style_padding',
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
            'triprex_tour_facilities_tab_hotel_style_style_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_hotel_style_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_hotel_style_style_color_hover',
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

        $this->end_controls_section();

        //Transports
        $this->start_controls_section(
            'triprex_tour_packages_facilities_tab_transports_sec',
            [
                'label' => esc_html__('Transports ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_one'
                ]
            ]
        );

        // Title
        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_sec_sec',
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
                'name'     => 'triprex_tour_packages_facilities_tab_transports_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_sec_sec_hov_olor',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a:hover' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_tab_transports_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_tab_transports_sec_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_type_text_sec_sec_one',
            [
                'label' => esc_html__(' Transport Type Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_tab_transports_type_text_sec_sec_typ_one',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .transport-type h6',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_type_text_sec_sec_color_one',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .transport-type h6' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_type_content_text_sec_sec',
            [
                'label' => esc_html__(' Transport Type ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_tab_transports_type_content_text_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_type_content_text_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        // Button 
        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_packages_facilities_tab_transports_btn_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_packages_facilities_tab_transports_btn_style_style_normal_tab',
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
                'name'     => 'triprex_tour_packages_facilities_tab_transports_btn_style_style_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_btn_style_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_tab_transports_btn_style_style_margin',
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
            'triprex_tour_packages_facilities_tab_transports_btn_style_padding',
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
            'triprex_tour_packages_facilities_tab_transports_btn_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_btn_style_color_hover',
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

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_total_review_sec_sec',
            [
                'label' => esc_html__(' Total review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_tab_transports_total_review_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .card-bottom .review-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_total_review_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .card-bottom .review-area span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();


        // =====================Style Two=======================//

        $this->start_controls_section(
            'triprex_tour_facilities_two_tab_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_tab_two_section_genaral_heading_style_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_two_section_genaral_heading_title_style_section',
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
                'name'     => 'triprex_tour_facilities_tab_two_section_genaral_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_two_section_genaral_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_two_section_genaral_heading_title_margin',
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
            'triprex_tour_facilities_tab_two_section_genaral_heading_title_padding',
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
            'triprex_tour_facilities_tab_two_section_genaral_heading_subtitle_style_section',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_two_section_genaral_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title2 p',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_two_section_genaral_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_two_section_genaral_heading_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_two_section_genaral_heading_subtitle_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_tour_packages_facilities_two_tab_sec',
            [
                'label' => esc_html__('Tab ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two'
                ]
            ]
        );


        // Icon
        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_sec_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_two_sec_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link   i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_two_sec_icon_sec_svg_size',
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
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link  svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_two_tab_style_sec',
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
                'name'     => 'triprex_tour_facilities_two_tab_style_sec_typ',
                'selector' => '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_two_tab_style_sec_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link.active' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link.active svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_two_tab_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_two_tab_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_tour_packages_facilities_two_tab_content_sec',
            [
                'label' => esc_html__('Tour Packages ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two'
                ]
            ]
        );

        // Batch
        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_tour_packages_content_batch_sec',
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
                'name'     => 'triprex_tour_packages_facilities_two_tab_tour_packages_content_batch_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3.style-3 .package-card-img .eg-batch span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_tour_packages_content_batch_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-img .eg-batch span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_tour_packages_content_batch_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-img .eg-batch span' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_two_tab_tour_packages_content_batch_sec_margin',
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
            'triprex_tour_packages_facilities_two_tab_tour_packages_content_batch_sec_padding',
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
            'triprex_tour_facilities_two_tab_style_distination_sec',
            [
                'label' => esc_html__(' Destination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_two_tab_style_distination_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-img .package-card-img-bottom ul li',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_distination_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .batch .location .location-list li a' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .package-card3 .batch .location .location-list li::before' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_two_tab_style_distination_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-img .package-card-img-bottom ul li svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_title_sec',
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
                'name'     => 'triprex_tour_facilities_two_tab_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_two_tab_style_title_sec_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5:hover a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_location_sec',
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
                'name'     => 'triprex_tour_facilities_two_tab_style_location_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .location-area .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_location_sec_color',
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
            'triprex_tour_facilities_two_tab_style_price_sec',
            [
                'label' => esc_html__(' Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_price_title_sec',
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
                'name'     => 'triprex_tour_facilities_two_tab_style_price_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_price_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_price_total_price_sec',
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
                'name'     => 'triprex_tour_facilities_two_tab_style_price_total_price_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_price_total_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area >h6' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_two_tab_style_price_total_delete_price_sec_color',
            [
                'label'     => esc_html__('Delete Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6 del' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );


        // Button 
        $this->add_control(
            'triprex_tour_facilities_two_tab_style_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_facilities_two_tab_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_facilities_two_tab_style_style_normal_tab',
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
                'name'     => 'triprex_tour_facilities_two_tab_style_style_typ',
                'selector' => '{{WRAPPER}}  .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn',

            ]
        );
        $this->add_control(
            'triprex_tour_facilities_two_tab_style_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn svg' => 'fill: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_two_tab_style_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_two_tab_style_btn_style_margin',
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
            'triprex_tour_facilities_two_tab_style_btn_style_padding',
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
            'triprex_tour_facilities_two_tab_style_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-3 .package-card-content .card-content-bottom .explore-btn:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Hotel
        $this->start_controls_section(
            'triprex_tour_packages_facilities_two_tab_hotel_sec',
            [
                'label' => esc_html__('Hotel ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two'
                ]
            ]
        );

        // Total Reviews
        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_tour_packages_content_total_reviews_sec',
            [
                'label' => esc_html__(' Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_two_tab_tour_packages_content_total_reviews_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_tour_packages_content_total_reviews_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_two_tab_tour_packages_content_total_reviews_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_two_tab_tour_packages_content_total_reviews_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_two_tab_style_main_title_sec',
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
                'name'     => 'triprex_tour_facilities_two_tab_style_main_title_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_main_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_main_title_sec_hov_color',
            [
                'label'     => esc_html__(' Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a:hover' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_hotel_location_sec',
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
                'name'     => 'triprex_tour_facilities_two_tab_style_hotel_location_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_hotel_location_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_two_tab_style_hotel_location_sec_map_color',
            [
                'label'     => esc_html__('Map Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_facilities_sec',
            [
                'label' => esc_html__(' Facilities', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_two_tab_style_facilities_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_facilities_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_two_tab_style_facilities_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li' => 'fill: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_room_type_sec',
            [
                'label' => esc_html__(' Room Type', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_two_tab_style_room_type_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type h6',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_room_type_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type h6' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_room_type_total_bed_sec',
            [
                'label' => esc_html__(' Total bed', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_two_tab_style_room_type_total_bed_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type > span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_room_type_total_bed_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type > span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_room_type_deals_sec',
            [
                'label' => esc_html__('Deals', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_two_tab_style_room_type_deals_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_room_type_deals_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_room_type_deals_sec_cancellation_color',
            [
                'label'     => esc_html__(' Cancellation text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span strong' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_book_sec',
            [
                'label' => esc_html__(' Price Area Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_two_tab_style_book_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_book_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area p' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_book_price_sec',
            [
                'label' => esc_html__(' Price  ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_two_tab_style_book_price_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_style_book_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_style_book_deleted_price_sec_color',
            [
                'label'     => esc_html__('Deleted Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span del' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );


        // Button 
        $this->add_control(
            'triprex_tour_facilities_two_tab_hotel_style_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_facilities_two_tab_hotel_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_facilities_two_tab_hotel_style_style_normal_tab',
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
                'name'     => 'triprex_tour_facilities_two_tab_hotel_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_facilities_two_tab_hotel_style_style_color',
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
            'triprex_tour_facilities_two_tab_hotel_style_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_two_tab_hotel_style_style_style_margin',
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
            'triprex_tour_facilities_two_tab_hotel_style_style_style_padding',
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
            'triprex_tour_facilities_two_tab_hotel_style_style_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_hotel_style_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_two_tab_hotel_style_style_color_hover',
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

        $this->end_controls_section();

        //Transports
        $this->start_controls_section(
            'triprex_tour_packages_facilities_two_tab_transports_sec',
            [
                'label' => esc_html__('Transports ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_two'
                ]
            ]
        );

        // Title
        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_sec_sec',
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
                'name'     => 'triprex_tour_packages_facilities_two_tab_transports_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_sec_sec_hov_olor',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a:hover' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_two_tab_transports_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_two_tab_transports_sec_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_type_text_sec_sec',
            [
                'label' => esc_html__(' Transport Type Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_tab_transports_type_text_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .transport-type h6',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_transports_type_text_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .transport-type h6' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_type_content_text_sec_sec',
            [
                'label' => esc_html__(' Transport Type ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_two_tab_transports_type_content_text_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_type_content_text_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        // Button 
        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_packages_facilities_two_tab_transports_btn_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_packages_facilities_two_tab_transports_btn_style_style_normal_tab',
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
                'name'     => 'triprex_tour_packages_facilities_two_tab_transports_btn_style_style_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_btn_style_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_two_tab_transports_btn_style_style_margin',
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
            'triprex_tour_packages_facilities_two_tab_transports_btn_style_padding',
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
            'triprex_tour_packages_facilities_two_tab_transports_btn_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_btn_style_color_hover',
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

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_total_review_sec_sec',
            [
                'label' => esc_html__(' Total review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_two_tab_transports_total_review_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .card-bottom .review-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_two_tab_transports_total_review_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .card-bottom .review-area span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();


        // =====================Style Three =======================//

        $this->start_controls_section(
            'triprex_tour_facilities_three_tab_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_tab_three_section_genaral_heading_style_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_three_section_genaral_heading_title_style_section',
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
                'name'     => 'triprex_tour_facilities_tab_three_section_genaral_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_three_section_genaral_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_three_section_genaral_heading_title_margin',
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
            'triprex_tour_facilities_tab_three_section_genaral_heading_title_padding',
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
            'triprex_tour_facilities_tab_three_section_genaral_heading_subtitle_style_section',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_three_section_genaral_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_three_section_genaral_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_three_section_genaral_heading_subtitle_margin',
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
            'triprex_tour_facilities_tab_three_section_genaral_heading_subtitle_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title3 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_tour_packages_facilities_three_tab_sec',
            [
                'label' => esc_html__('Tab ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_three'
                ]
            ]
        );


        // Icon
        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_sec_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_three_sec_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_three_sec_icon_sec_svg_size',
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
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link  svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_three_tab_style_sec',
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
                'name'     => 'triprex_tour_facilities_three_tab_style_sec_typ',
                'selector' => '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_three_tab_style_sec_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link.active' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link.active svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_three_tab_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_three_tab_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_tour_packages_facilities_three_tab_content_sec',
            [
                'label' => esc_html__('Tour Packages ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_three'
                ]
            ]
        );

        // Batch
        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_tour_packages_content_batch_sec',
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
                'name'     => 'triprex_tour_packages_facilities_three_tab_tour_packages_content_batch_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3.style-4 .package-card-img .batch span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_tour_packages_content_batch_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-img .batch span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_tour_packages_content_batch_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-img .batch span' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_three_tab_tour_packages_content_batch_sec_margin',
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
            'triprex_tour_packages_facilities_three_tab_tour_packages_content_batch_sec_padding',
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
            'triprex_tour_facilities_three_tab_style_distination_sec',
            [
                'label' => esc_html__(' Destination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_three_tab_style_distination_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .destination .destination-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_distination_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .destination .destination-list li a' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .destination .destination-list li::before' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_three_tab_style_distination_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-4 .package-card-content .card-content-top .destination-and-date-area .destination svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_title_sec',
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
                'name'     => 'triprex_tour_facilities_three_tab_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_three_tab_style_title_sec_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5:hover a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_location_sec',
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
                'name'     => 'triprex_tour_facilities_three_tab_style_location_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .location-area .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_location_sec_color',
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
            'triprex_tour_facilities_three_tab_style_price_sec',
            [
                'label' => esc_html__(' Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_price_title_sec',
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
                'name'     => 'triprex_tour_facilities_three_tab_style_price_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area .title',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_price_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_price_total_price_sec',
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
                'name'     => 'triprex_tour_facilities_three_tab_style_price_total_price_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_price_total_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_three_tab_style_price_total_delete_price_sec_color',
            [
                'label'     => esc_html__('Delete Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6 del' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->end_controls_section();

        //Hotel
        $this->start_controls_section(
            'triprex_tour_packages_facilities_three_tab_hotel_sec',
            [
                'label' => esc_html__('Hotel ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_three'
                ]
            ]
        );

        // Total Reviews
        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_tour_packages_content_total_reviews_sec',
            [
                'label' => esc_html__(' Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_three_tab_tour_packages_content_total_reviews_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_tour_packages_content_total_reviews_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_three_tab_tour_packages_content_total_reviews_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_three_tab_tour_packages_content_total_reviews_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_three_tab_style_main_title_sec',
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
                'name'     => 'triprex_tour_facilities_three_tab_style_main_title_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_main_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_main_title_sec_hov_color',
            [
                'label'     => esc_html__(' Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a:hover' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_hotel_location_sec',
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
                'name'     => 'triprex_tour_facilities_three_tab_style_hotel_location_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_hotel_location_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_three_tab_style_hotel_location_sec_map_color',
            [
                'label'     => esc_html__('Map Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_facilities_sec',
            [
                'label' => esc_html__(' Facilities', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_three_tab_style_facilities_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_facilities_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_three_tab_style_facilities_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li' => 'fill: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_room_type_sec',
            [
                'label' => esc_html__(' Room Type', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_three_tab_style_room_type_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type h6',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_room_type_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type h6' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_room_type_total_bed_sec',
            [
                'label' => esc_html__(' Total bed', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_three_tab_style_room_type_total_bed_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type > span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_room_type_total_bed_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type > span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_room_type_deals_sec',
            [
                'label' => esc_html__('Deals', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_three_tab_style_room_type_deals_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_room_type_deals_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_room_type_deals_sec_cancellation_color',
            [
                'label'     => esc_html__(' Cancellation text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span strong' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_book_sec',
            [
                'label' => esc_html__(' Price Area Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_three_tab_style_book_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_book_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area p' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_book_price_sec',
            [
                'label' => esc_html__(' Price  ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_three_tab_style_book_price_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_style_book_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_three_style_book_deleted_price_sec_color',
            [
                'label'     => esc_html__('Deleted Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span del' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );


        // Button 
        $this->add_control(
            'triprex_tour_facilities_three_tab_hotel_style_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_facilities_three_tab_hotel_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_facilities_three_tab_hotel_style_style_normal_tab',
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
                'name'     => 'triprex_tour_facilities_three_tab_hotel_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_facilities_three_tab_hotel_style_style_color',
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
            'triprex_tour_facilities_three_tab_hotel_style_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_three_tab_hotel_style_style_style_margin',
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
            'triprex_tour_facilities_three_tab_hotel_style_style_style_padding',
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
            'triprex_tour_facilities_three_tab_hotel_style_style_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_hotel_style_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_three_tab_hotel_style_style_color_hover',
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

        $this->end_controls_section();

        //Transports
        $this->start_controls_section(
            'triprex_tour_packages_facilities_three_tab_transports_sec',
            [
                'label' => esc_html__('Transports ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_three'
                ]
            ]
        );

        // Title
        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_sec_sec',
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
                'name'     => 'triprex_tour_packages_facilities_three_tab_transports_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_sec_sec_hov_olor',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a:hover' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_three_tab_transports_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_three_tab_transports_sec_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_type_text_sec_sec',
            [
                'label' => esc_html__(' Transport Type Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_three_tab_transports_type_text_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .transport-type h6',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_type_text_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .transport-type h6' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_type_content_text_sec_sec',
            [
                'label' => esc_html__(' Transport Type ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_three_tab_transports_type_content_text_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_type_content_text_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        // Button 
        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_packages_facilities_three_tab_transports_btn_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_packages_facilities_three_tab_transports_btn_style_style_normal_tab',
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
                'name'     => 'triprex_tour_packages_facilities_three_tab_transports_btn_style_style_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_btn_style_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_three_tab_transports_btn_style_style_margin',
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
            'triprex_tour_packages_facilities_three_tab_transports_btn_style_padding',
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
            'triprex_tour_packages_facilities_three_tab_transports_btn_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_btn_style_color_hover',
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

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_total_review_sec_sec',
            [
                'label' => esc_html__(' Total review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_three_tab_transports_total_review_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .card-bottom .review-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_three_tab_transports_total_review_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .card-bottom .review-area span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();


        // =====================Style Four=======================//

        $this->start_controls_section(
            'triprex_tour_facilities_four_tab_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_tab_four_section_genaral_heading_style_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_four_section_genaral_heading_subtitle_style_section',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_tab_four_section_genaral_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title4 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_four_section_genaral_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_tab_four_section_genaral_heading_subtitle_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag ' => 'bakground: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_four_section_genaral_heading_subtitle_margin',
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
            'triprex_tour_facilities_tab_four_section_genaral_heading_subtitle_padding',
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
            'triprex_tour_facilities_tab_four_section_genaral_heading_title_style_section',
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
                'name'     => 'triprex_tour_facilities_tab_four_section_genaral_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_four_section_genaral_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_tab_four_section_genaral_heading_title_margin',
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
            'triprex_tour_facilities_tab_four_section_genaral_heading_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title4 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_tour_packages_facilities_four_tab_sec',
            [
                'label' => esc_html__('Tab ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_four'
                ]
            ]
        );

        // Icon
        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_sec_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_four_sec_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .tour-facilites-section .nav-tabs .nav-item .nav-link  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_tab_four_sec_icon_sec_svg_size',
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
                    '{{WRAPPER}}  .tour-facilites-section .nav-tabs .nav-item .nav-link  svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_four_tab_style_sec',
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
                'name'     => 'triprex_tour_facilities_four_tab_style_sec_typ',
                'selector' => '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_four_tab_style_sec_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link.active' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link.active svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_four_tab_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_four_tab_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tour-facilites-section .nav-tabs .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_tour_packages_facilities_four_tab_content_sec',
            [
                'label' => esc_html__('Tour Packages ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_four_tab_style_distination_sec',
            [
                'label' => esc_html__(' Destination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_four_tab_style_distination_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3.style-5 .package-card-img .location .locations-list li ',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_distination_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-5 .package-card-img .location .locations-list li a' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .package-card3.style-5 .package-card-img .location .locations-list li::before' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_four_tab_style_distination_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3.style-5 .package-card-img .location .locations-list li svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_location_sec',
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
                'name'     => 'triprex_tour_facilities_four_tab_style_location_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .location-area .location-list li a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_location_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-img .package-card-img-bottom ul li a' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .package-card3 .location-area .location-list li ::before' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_title_sec',
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
                'name'     => 'triprex_tour_facilities_four_tab_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5 a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_four_tab_style_title_sec_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-top h5:hover a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );



        $this->add_control(
            'triprex_tour_facilities_four_tab_style_price_sec',
            [
                'label' => esc_html__(' Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_price_title_sec',
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
                'name'     => 'triprex_tour_facilities_four_tab_style_price_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area .title',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_price_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area .title' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_price_total_price_sec',
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
                'name'     => 'triprex_tour_facilities_four_tab_style_price_total_price_sec_typ',
                'selector' => '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_price_total_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area >h6' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_four_tab_style_price_total_delete_price_sec_color',
            [
                'label'     => esc_html__('Delete Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card3 .package-card-content .card-content-bottom .price-area h6 del' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );


        // Button 
        $this->add_control(
            'triprex_tour_facilities_four_tab_style_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_facilities_four_tab_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_facilities_four_tab_style_style_normal_tab',
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
                'name'     => 'triprex_tour_facilities_four_tab_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn5',

            ]
        );
        $this->add_control(
            'triprex_tour_facilities_four_tab_style_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn5' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .primary-btn5 span svg' => 'fill: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_four_tab_style_btn_style_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn5' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .primary-btn5:hover span svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn5' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_four_tab_style_btn_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_four_tab_style_btn_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_tour_facilities_four_tab_style_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 ::after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Hotel
        $this->start_controls_section(
            'triprex_tour_packages_facilities_four_tab_hotel_sec',
            [
                'label' => esc_html__('Hotel ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_four'
                ]
            ]
        );

        // Total Reviews
        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_tour_packages_content_total_reviews_sec',
            [
                'label' => esc_html__(' Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_four_tab_tour_packages_content_total_reviews_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_tour_packages_content_total_reviews_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_four_tab_tour_packages_content_total_reviews_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_four_tab_tour_packages_content_total_reviews_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .reviews span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_tour_facilities_four_tab_style_main_title_sec',
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
                'name'     => 'triprex_tour_facilities_four_tab_style_main_title_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_main_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_main_title_sec_hov_color',
            [
                'label'     => esc_html__(' Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top h5 a:hover' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_hotel_location_sec',
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
                'name'     => 'triprex_tour_facilities_four_tab_style_hotel_location_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_hotel_location_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_four_tab_style_hotel_location_sec_map_color',
            [
                'label'     => esc_html__('Map Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .loaction-area li a' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_facilities_sec',
            [
                'label' => esc_html__(' Facilities', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_four_tab_style_facilities_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_facilities_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_facilities_four_tab_style_facilities_sec_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-top .facilisis li' => 'fill: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_room_type_sec',
            [
                'label' => esc_html__(' Room Type', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_four_tab_style_room_type_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type h6',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_room_type_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type h6' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_room_type_total_bed_sec',
            [
                'label' => esc_html__('Total bed', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_four_tab_style_room_type_total_bed_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type > span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_room_type_total_bed_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type > span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_room_type_deals_sec',
            [
                'label' => esc_html__('Deals', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_four_tab_style_room_type_deals_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_room_type_deals_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_room_type_deals_sec_cancellation_color',
            [
                'label'     => esc_html__(' Cancellation text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .room-type .deals span strong' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_book_sec',
            [
                'label' => esc_html__(' Price Area Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_four_tab_style_book_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_book_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area p' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_book_price_sec',
            [
                'label' => esc_html__(' Price  ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_facilities_four_tab_style_book_price_sec_typ',
                'selector' => '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_style_book_price_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_tab_four_style_book_deleted_price_sec_color',
            [
                'label'     => esc_html__('Deleted Price Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .room-suits-card .room-content .content-bottom .price-area span del' => '-webkit-text-fill-color: {{VALUE}};',


                ],
            ]
        );


        // Button 
        $this->add_control(
            'triprex_tour_facilities_four_tab_hotel_style_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_facilities_four_tab_hotel_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_facilities_four_tab_hotel_style_style_normal_tab',
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
                'name'     => 'triprex_tour_facilities_four_tab_hotel_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_facilities_four_tab_hotel_style_style_color',
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
            'triprex_tour_facilities_four_tab_hotel_style_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_facilities_four_tab_hotel_style_style_style_margin',
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
            'triprex_tour_facilities_four_tab_hotel_style_style_style_padding',
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
            'triprex_tour_facilities_four_tab_hotel_style_style_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_hotel_style_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_facilities_four_tab_hotel_style_style_color_hover',
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

        $this->end_controls_section();

        //Transports
        $this->start_controls_section(
            'triprex_tour_packages_facilities_four_tab_transports_sec',
            [
                'label' => esc_html__('Transports ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_tour_facilities_tab_content_style_selection' => 'style_four'
                ]
            ]
        );

        // Title
        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_sec_sec',
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
                'name'     => 'triprex_tour_packages_facilities_four_tab_transports_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_sec_sec_hov_olor',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a:hover' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_four_tab_transports_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_four_tab_transports_sec_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .transport-card .transport-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_type_text_sec_sec',
            [
                'label' => esc_html__(' Transport Type Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_four_tab_transports_type_text_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .transport-type h6',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_type_text_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .transport-type h6' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_type_content_text_sec_sec',
            [
                'label' => esc_html__(' Transport Type ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_four_tab_transports_type_content_text_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_type_content_text_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .transport-card .transport-content .transport-type .single-transport svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        // Button 
        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_tour_packages_facilities_four_tab_transports_btn_style_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_tour_packages_facilities_four_tab_transports_btn_style_style_normal_tab',
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
                'name'     => 'triprex_tour_packages_facilities_four_tab_transports_btn_style_style_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_btn_style_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_packages_facilities_four_tab_transports_btn_style_style_margin',
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
            'triprex_tour_packages_facilities_four_tab_transports_btn_style_padding',
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
            'triprex_tour_packages_facilities_four_tab_transports_btn_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_btn_style_color_hover',
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

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_total_review_sec_sec',
            [
                'label' => esc_html__(' Total review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_packages_facilities_four_tab_transports_total_review_sec_sec_typ',
                'selector' => '{{WRAPPER}} .transport-card .transport-content .card-bottom .review-area span',

            ]
        );

        $this->add_control(
            'triprex_tour_packages_facilities_four_tab_transports_total_review_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transport-card .transport-content .card-bottom .review-area span' => '-webkit-text-fill-color: {{VALUE}};',

                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $selected_post_ids = $settings['tours_tab_post_list'];
        $selected_hotel_post_ids = $settings['hotel_tab_post_list'];
        $selected_transport_post_ids = $settings['transport_tab_post_list'];



        $args = array(
            'post_type'      => 'tours',
            'posts_per_page' => $settings['triprex_tours_tab_posts_per_page'],
            'orderby'        => $settings['triprex_tours_tab_template_orderby'],
            'order'          => $settings['triprex_tours_tab_template_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }

        $args2 = array(
            'post_type'      => 'hotel',
            'posts_per_page' => $settings['triprex_hotel_tab_posts_per_page'],
            'orderby'        => $settings['triprex_hotel_tab_template_orderby'],
            'order'          => $settings['triprex_hotel_tab_template_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_hotel_post_ids)) {
            $args2['post__in'] = $selected_hotel_post_ids;
        }


        $args3 = array(
            'post_type'      => 'transport',
            'posts_per_page' => $settings['triprex_transport_tab_posts_per_page'],
            'orderby'        => $settings['triprex_transport_tab_template_orderby'],
            'order'          => $settings['triprex_transport_tab_template_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_transport_post_ids)) {
            $args3['post__in'] = $selected_transport_post_ids;
        }



        $query2 = new \WP_Query($args2);

        $query3 = new \WP_Query($args3);

        $query = new \WP_Query($args);
?>
        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".hotel-card-slider", {
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
                            slidesPerView: 1,
                            spaceBetween: 24,
                        },
                        992: {
                            slidesPerView: 2,
                            spaceBetween: 24,
                        },
                        1200: {
                            slidesPerView: 2,
                            spaceBetween: 24,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    }
                });


                var swiper = new Swiper(".hotel-img-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    effect: 'fade', // Use the fade effect
                    loop: true,
                    fadeEffect: {
                        crossFade: true, // Enable cross-fade transition
                    },
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination5",
                        clickable: true,
                    },
                });

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
            </script>
        <?php endif; ?>

        <?php if ($settings['triprex_tour_facilities_tab_content_style_selection'] == 'style_one') : ?>
            <div class="tour-facilites-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 d-flex flex-column align-items-center justify-content-between flex-wrap <?php echo 'yes' === $settings['triprex_custom_post_tab_on_off_hotels'] || 'yes' === $settings['triprex_custom_post_tab_on_off_transports'] ? 'gap-4' : ''; ?> mb-60">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_sub_title'])) : ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z" />
                                        </svg>
                                        <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_sub_title']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z" />
                                        </svg>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_title'])) : ?>
                                    <h2> <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>

                            <ul class="nav nav-tabs" id="facilitesTab" role="tablist">
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_tour'])) : ?>
                                    <?php if ($settings['triprex_custom_post_tab_on_off_hotels'] == 'yes' || $settings['triprex_custom_post_tab_on_off_transports'] == 'yes') : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="Tour-tab" data-bs-toggle="tab" data-bs-target="#Tour" type="button" role="tab" aria-controls="Tour" aria-selected="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                                                    <g>
                                                        <path d="M5.64903 6.91357C2.53954 6.91357 0.00976562 9.44335 0.00976562 12.5528C0.00976562 14.4834 0.928148 16.5592 2.73944 18.7225C2.9952 19.0275 3.26021 19.3246 3.53411 19.6134C2.36462 19.9327 1.66244 20.5062 1.66244 21.1756C1.66244 22.3605 3.71636 23 5.64885 23C7.58139 23 9.63527 22.3605 9.63527 21.1756C9.63527 20.5067 8.93332 19.9331 7.76458 19.6137C8.2315 19.1208 8.73391 18.5408 9.21062 17.894C9.23746 17.8583 9.25696 17.8178 9.26801 17.7746C9.27906 17.7314 9.28143 17.6864 9.27499 17.6423C9.26854 17.5981 9.25341 17.5557 9.23047 17.5175C9.20753 17.4792 9.17723 17.4459 9.14132 17.4195C9.10542 17.393 9.06463 17.3739 9.02131 17.3634C8.97799 17.3528 8.933 17.3509 8.88894 17.3578C8.84489 17.3647 8.80264 17.3803 8.76465 17.4037C8.72666 17.427 8.69367 17.4577 8.6676 17.4938C8.09206 18.2749 7.46909 18.9613 6.92549 19.5065C6.86236 19.5385 6.8109 19.5896 6.77841 19.6525C6.29146 20.131 5.88168 20.486 5.64917 20.68C5.41921 20.4879 5.01568 20.1377 4.53497 19.6654C4.50093 19.5907 4.44083 19.531 4.36593 19.4974C2.83827 17.9609 0.684268 15.3062 0.684268 12.5529C0.684268 9.81539 2.91145 7.58821 5.64899 7.58821C8.38653 7.58821 10.6137 9.81539 10.6137 12.5529C10.6137 13.7484 10.2064 15.0395 9.40297 16.3902C9.38033 16.4283 9.36541 16.4705 9.35906 16.5143C9.35271 16.5581 9.35506 16.6028 9.36597 16.6457C9.37687 16.6887 9.39613 16.729 9.42264 16.7645C9.44914 16.8 9.48238 16.8299 9.52045 16.8525C9.55851 16.8752 9.60067 16.8901 9.6445 16.8965C9.68834 16.9028 9.73299 16.9005 9.77592 16.8895C9.81885 16.8786 9.85921 16.8594 9.89469 16.8329C9.93018 16.8064 9.9601 16.7731 9.98274 16.7351C10.849 15.2785 11.2883 13.8715 11.2883 12.5529C11.2883 9.44335 8.75852 6.91357 5.64903 6.91357ZM5.44262 21.3815C5.50169 21.4273 5.57431 21.4521 5.64903 21.452C5.72376 21.4521 5.79638 21.4273 5.85545 21.3815C5.89682 21.3495 6.46041 20.91 7.21164 20.1755C8.34915 20.4074 8.96081 20.8541 8.96081 21.1756C8.96081 21.4157 8.63171 21.699 8.10195 21.9148C7.4522 22.1796 6.58103 22.3255 5.6489 22.3255C3.62714 22.3255 2.33699 21.6444 2.33699 21.1756C2.33699 20.8536 2.94882 20.4072 4.08697 20.1752C4.84237 20.9141 5.40677 21.3538 5.44262 21.3815Z"></path>
                                                        <path d="M5.64915 10.1009C5.1157 10.1009 4.60844 10.2693 4.18222 10.5879C4.1106 10.6415 4.06318 10.7213 4.05039 10.8098C4.0376 10.8984 4.06049 10.9883 4.11403 11.06C4.16761 11.1316 4.24744 11.179 4.33596 11.1918C4.42448 11.2046 4.51446 11.1817 4.58612 11.1282C4.89477 10.8974 5.26237 10.7754 5.6491 10.7754C6.62916 10.7754 7.42648 11.5727 7.42648 12.5528C7.42648 13.5329 6.62916 14.3302 5.6491 14.3302C4.66904 14.3302 3.87172 13.5329 3.87172 12.5528C3.87172 12.3856 3.89486 12.2202 3.94045 12.0615C3.96513 11.9755 3.95465 11.8833 3.91132 11.805C3.86799 11.7268 3.79534 11.6689 3.70938 11.6442C3.6234 11.6196 3.53117 11.6301 3.45294 11.6735C3.37471 11.7168 3.31687 11.7894 3.29214 11.8754C3.22906 12.0957 3.19713 12.3237 3.19727 12.5528C3.19727 13.9048 4.29718 15.0048 5.64919 15.0048C7.00116 15.0048 8.10112 13.9048 8.10112 12.5528C8.10107 11.2008 7.00112 10.1009 5.64915 10.1009ZM20.3471 9.7984C20.5276 9.60501 20.7029 9.40685 20.8728 9.20413C22.2769 7.52706 22.9889 5.91486 22.9889 4.41218C22.9889 1.97935 21.0096 0 18.5767 0C16.7995 0 15.2037 1.05773 14.5114 2.69468C14.4942 2.73547 14.4851 2.77926 14.4848 2.82354C14.4844 2.86783 14.4928 2.91175 14.5095 2.95279C14.5261 2.99383 14.5507 3.0312 14.5818 3.06275C14.6128 3.0943 14.6498 3.11942 14.6906 3.13667C14.773 3.1715 14.8658 3.17218 14.9487 3.13858C15.0316 3.10498 15.0977 3.03984 15.1326 2.95748C15.7192 1.57065 17.0711 0.674502 18.5767 0.674502C20.6377 0.674502 22.3144 2.35126 22.3144 4.41223C22.3144 7.19931 19.3883 9.86952 18.5766 10.5564C18.3977 10.4053 18.1161 10.1578 17.786 9.83421C17.7533 9.76971 17.7007 9.71745 17.636 9.68516C16.4715 8.51265 14.839 6.49714 14.839 4.41223C14.839 4.32278 14.8035 4.23699 14.7403 4.17374C14.677 4.11049 14.5912 4.07495 14.5018 4.07495C14.4123 4.07495 14.3265 4.11049 14.2633 4.17374C14.2 4.23699 14.1645 4.32278 14.1645 4.41223C14.1645 5.91486 14.8765 7.52706 16.2807 9.20418C16.4505 9.40677 16.6257 9.60484 16.806 9.79818C15.9366 10.0594 15.4347 10.504 15.4347 11.0395C15.4347 11.491 15.801 11.889 16.4662 12.16C17.0354 12.3919 17.7849 12.5197 18.5767 12.5197C19.3684 12.5197 20.1179 12.3919 20.6871 12.16C21.3522 11.8889 21.7185 11.491 21.7185 11.0394C21.7185 10.505 21.2162 10.0599 20.3471 9.7984ZM18.5766 11.8451C16.9802 11.8451 16.1093 11.3129 16.1093 11.0394C16.1093 10.8612 16.5054 10.5352 17.3514 10.3553C17.9206 10.9091 18.3431 11.2382 18.3703 11.2594C18.4294 11.3052 18.502 11.33 18.5768 11.3299C18.6515 11.33 18.7241 11.3052 18.7832 11.2594C18.8104 11.2383 19.2328 10.9092 19.8021 10.3554C20.1789 10.4358 20.5054 10.5535 20.7339 10.6926C20.9281 10.8109 21.0441 10.9405 21.0441 11.0394C21.044 11.3129 20.1731 11.8451 18.5766 11.8451Z"></path>
                                                        <path d="M18.576 2.44968C17.4939 2.44968 16.6135 3.33006 16.6135 4.41227C16.6135 5.49439 17.4939 6.37477 18.576 6.37477C19.6582 6.37477 20.5386 5.49444 20.5386 4.41227C20.5386 3.3301 19.6582 2.44968 18.576 2.44968ZM18.5761 5.70022C17.8658 5.70022 17.288 5.12244 17.288 4.41222C17.288 3.70201 17.8658 3.12418 18.5761 3.12418C19.2863 3.12418 19.8641 3.70196 19.8641 4.41222C19.8641 5.12244 19.2863 5.70022 18.5761 5.70022ZM14.2011 10.7021H14.0471C13.935 10.7021 13.8223 10.7096 13.7121 10.7242C13.6241 10.7369 13.5446 10.7837 13.491 10.8545C13.4374 10.9254 13.4138 11.0145 13.4256 11.1026C13.4373 11.1907 13.4833 11.2706 13.5536 11.325C13.6239 11.3794 13.7128 11.4038 13.8011 11.3929C13.8826 11.3822 13.9648 11.3768 14.0471 11.3768H14.2011V11.3767C14.3874 11.3767 14.5384 11.2258 14.5384 11.0395C14.5384 10.8531 14.3874 10.7021 14.2011 10.7021ZM13.0861 20.8211H13.0845L12.6391 20.8231C12.5496 20.8233 12.4639 20.859 12.4008 20.9224C12.3377 20.9858 12.3023 21.0717 12.3025 21.1611C12.3027 21.2506 12.3384 21.3363 12.4018 21.3994C12.4652 21.4625 12.5511 21.4979 12.6405 21.4977H12.6421L13.0876 21.4957C13.177 21.4952 13.2626 21.4593 13.3256 21.3958C13.3885 21.3322 13.4237 21.2463 13.4233 21.1569C13.4229 21.0677 13.3872 20.9823 13.324 20.9193C13.2608 20.8564 13.1753 20.8211 13.0861 20.8211ZM14.6013 15.0708H14.1558C14.0664 15.0708 13.9806 15.1063 13.9174 15.1696C13.8541 15.2328 13.8186 15.3186 13.8186 15.4081C13.8186 15.4975 13.8541 15.5833 13.9174 15.6466C13.9806 15.7098 14.0664 15.7453 14.1558 15.7453H14.6013C14.6456 15.7453 14.6894 15.7366 14.7304 15.7197C14.7713 15.7027 14.8085 15.6779 14.8398 15.6466C14.8711 15.6152 14.896 15.5781 14.9129 15.5371C14.9299 15.4962 14.9386 15.4524 14.9386 15.4081C14.9386 15.3638 14.9299 15.3199 14.9129 15.279C14.896 15.2381 14.8711 15.2009 14.8398 15.1696C14.8085 15.1382 14.7713 15.1134 14.7304 15.0965C14.6894 15.0795 14.6456 15.0708 14.6013 15.0708ZM12.8142 11.3893C12.7535 11.3236 12.6693 11.2846 12.5799 11.281C12.4905 11.2774 12.4034 11.3095 12.3376 11.3701C12.2116 11.4863 12.0977 11.615 11.9977 11.7543C11.9477 11.827 11.9282 11.9164 11.9434 12.0034C11.9586 12.0903 12.0072 12.1679 12.0789 12.2194C12.1506 12.2709 12.2396 12.2922 12.3269 12.2788C12.4141 12.2654 12.4927 12.2184 12.5456 12.1478C12.619 12.0456 12.7026 11.9512 12.795 11.8659C12.8607 11.8052 12.8997 11.721 12.9033 11.6316C12.9069 11.5422 12.8749 11.4551 12.8142 11.3893ZM14.8679 20.8129H14.8664L14.421 20.815C14.3325 20.8166 14.2482 20.8529 14.1862 20.9162C14.1243 20.9794 14.0897 21.0644 14.0899 21.153C14.09 21.2415 14.125 21.3264 14.1873 21.3893C14.2495 21.4523 14.3339 21.4883 14.4225 21.4895H14.424L14.8694 21.4875C14.9579 21.4858 15.0423 21.4495 15.1042 21.3863C15.1661 21.323 15.2007 21.238 15.2006 21.1495C15.2004 21.061 15.1654 20.9761 15.1032 20.9131C15.0409 20.8501 14.9565 20.8142 14.8679 20.8129ZM11.3043 20.8291H11.3027L10.8572 20.8312C10.7678 20.8316 10.6822 20.8675 10.6192 20.9311C10.5563 20.9946 10.5211 21.0805 10.5215 21.17C10.5219 21.2591 10.5576 21.3445 10.6208 21.4075C10.684 21.4704 10.7695 21.5057 10.8587 21.5057H10.8603L11.3057 21.5037C11.3952 21.5033 11.4808 21.4673 11.5437 21.4038C11.6067 21.3403 11.6419 21.2543 11.6415 21.1649C11.6411 21.0757 11.6054 20.9903 11.5422 20.9274C11.479 20.8645 11.3934 20.8291 11.3043 20.8291ZM13.0633 14.7873C12.957 14.7202 12.8578 14.6425 12.7671 14.5554C12.7027 14.4934 12.6162 14.4595 12.5268 14.4613C12.4373 14.463 12.3523 14.5002 12.2902 14.5646C12.2595 14.5965 12.2354 14.6342 12.2193 14.6754C12.2031 14.7167 12.1952 14.7607 12.1961 14.805C12.197 14.8492 12.2065 14.8929 12.2243 14.9335C12.242 14.9741 12.2676 15.0108 12.2995 15.0415C12.4231 15.1603 12.5584 15.2663 12.7034 15.3578C12.7408 15.3815 12.7826 15.3975 12.8263 15.405C12.8699 15.4126 12.9146 15.4114 12.9579 15.4016C13.0011 15.3918 13.0419 15.3736 13.0781 15.348C13.1143 15.3224 13.145 15.29 13.1686 15.2525C13.1923 15.215 13.2083 15.1732 13.2158 15.1296C13.2233 15.0859 13.2221 15.0412 13.2123 14.9981C13.2025 14.9549 13.1843 14.914 13.1588 14.8778C13.1332 14.8417 13.1008 14.8109 13.0633 14.7873ZM12.2342 13.5793C12.2115 13.4622 12.2001 13.3431 12.2001 13.2238L12.2002 13.2051C12.2007 13.1608 12.1925 13.1168 12.176 13.0757C12.1595 13.0346 12.1351 12.9971 12.1042 12.9654C12.0732 12.9338 12.0363 12.9085 11.9956 12.8911C11.9549 12.8736 11.9111 12.8644 11.8669 12.8639L11.8629 12.8639C11.7741 12.8639 11.6889 12.8989 11.6258 12.9613C11.5627 13.0237 11.5267 13.1085 11.5257 13.1972L11.5255 13.2238C11.5255 13.3867 11.5412 13.5497 11.5721 13.7084C11.5806 13.7518 11.5975 13.7932 11.622 13.8301C11.6465 13.8671 11.678 13.8988 11.7147 13.9235C11.7514 13.9483 11.7927 13.9656 11.8361 13.9744C11.8795 13.9832 11.9242 13.9834 11.9677 13.9749C12.0112 13.9664 12.0526 13.9494 12.0895 13.925C12.1264 13.9005 12.1581 13.869 12.1829 13.8323C12.2076 13.7956 12.2249 13.7543 12.2337 13.7109C12.2425 13.6675 12.2427 13.6228 12.2342 13.5793ZM16.3832 15.0708H15.9378C15.8483 15.0708 15.7625 15.1063 15.6993 15.1696C15.636 15.2328 15.6005 15.3186 15.6005 15.4081C15.6005 15.4975 15.636 15.5833 15.6993 15.6466C15.7625 15.7098 15.8483 15.7453 15.9378 15.7453H16.3832C16.4727 15.7453 16.5584 15.7098 16.6217 15.6466C16.6849 15.5833 16.7205 15.4975 16.7205 15.4081C16.7205 15.3186 16.6849 15.2328 16.6217 15.1696C16.5584 15.1063 16.4727 15.0708 16.3832 15.0708ZM21.7981 15.7575C21.6679 15.6547 21.5298 15.5621 21.3852 15.4807C21.2231 15.3892 21.0173 15.4467 20.9258 15.609C20.9041 15.6475 20.8902 15.69 20.8849 15.734C20.8795 15.778 20.8829 15.8226 20.8948 15.8652C20.9068 15.9079 20.927 15.9478 20.9543 15.9826C20.9816 16.0175 21.0156 16.0466 21.0541 16.0683C21.1682 16.1327 21.2772 16.2058 21.38 16.2869C21.4395 16.334 21.513 16.3596 21.5888 16.3595C21.659 16.3596 21.7273 16.3378 21.7845 16.2972C21.8417 16.2566 21.8848 16.1992 21.9078 16.133C21.9308 16.0668 21.9326 15.995 21.913 15.9277C21.8933 15.8604 21.8532 15.8009 21.7981 15.7575ZM20.5462 21.0546C20.5206 20.8701 20.3501 20.741 20.1659 20.7667C20.0555 20.7819 19.9424 20.79 19.8296 20.7904L19.7665 20.7907C19.6783 20.793 19.5946 20.8296 19.5332 20.8928C19.4717 20.9559 19.4374 21.0406 19.4376 21.1288C19.4378 21.2169 19.4725 21.3015 19.5343 21.3644C19.596 21.4272 19.6799 21.4635 19.768 21.4653H19.7697L19.8327 21.465C19.975 21.4644 20.1172 21.4543 20.2583 21.4349C20.3021 21.4288 20.3444 21.4142 20.3826 21.3918C20.4208 21.3694 20.4543 21.3397 20.481 21.3044C20.5077 21.2691 20.5273 21.2288 20.5384 21.186C20.5496 21.1431 20.5523 21.0985 20.5462 21.0546ZM22.0347 20.1062C22.0042 20.0741 21.9676 20.0483 21.9271 20.0304C21.8866 20.0125 21.843 20.0027 21.7987 20.0016C21.7544 20.0005 21.7104 20.0082 21.669 20.0241C21.6277 20.0401 21.59 20.064 21.5579 20.0946C21.4629 20.185 21.3611 20.2679 21.2534 20.3427C21.1799 20.3937 21.1297 20.4718 21.1137 20.5598C21.0978 20.6478 21.1174 20.7385 21.1684 20.8121C21.1994 20.8569 21.2409 20.8936 21.2892 20.9188C21.3376 20.9441 21.3913 20.9573 21.4459 20.9572C21.5144 20.9572 21.5814 20.9363 21.6377 20.8971C21.7741 20.8025 21.9029 20.6975 22.0231 20.583C22.0552 20.5525 22.081 20.5159 22.0989 20.4754C22.1168 20.4349 22.1266 20.3913 22.1277 20.347C22.1288 20.3027 22.1211 20.2587 22.1051 20.2173C22.0892 20.176 22.0652 20.1382 22.0347 20.1062ZM22.6911 18.4682C22.6032 18.4517 22.5123 18.4707 22.4385 18.5212C22.3646 18.5716 22.3138 18.6493 22.2973 18.7372C22.273 18.8658 22.2387 18.9924 22.1948 19.1158C22.1659 19.1998 22.1713 19.2918 22.2098 19.3718C22.2483 19.4518 22.3169 19.5135 22.4005 19.5433C22.4842 19.5731 22.5762 19.5687 22.6567 19.5311C22.7371 19.4935 22.7995 19.4256 22.8303 19.3423C22.886 19.1858 22.9294 19.0253 22.9602 18.862C22.9767 18.7741 22.9577 18.6832 22.9072 18.6094C22.8567 18.5355 22.779 18.4847 22.6911 18.4682ZM22.8914 17.384C22.8455 17.2242 22.7872 17.0683 22.7169 16.9176C22.6782 16.8379 22.6097 16.7766 22.5263 16.747C22.4428 16.7173 22.3511 16.7217 22.2708 16.7592C22.1905 16.7966 22.1282 16.8641 22.0973 16.9471C22.0664 17.0301 22.0694 17.122 22.1056 17.2028C22.1609 17.3214 22.2069 17.4443 22.2431 17.5701C22.2633 17.6405 22.3058 17.7024 22.3643 17.7464C22.4227 17.7905 22.4939 17.8144 22.5671 17.8144C22.6194 17.8144 22.6709 17.8023 22.7177 17.779C22.7644 17.7557 22.8051 17.7218 22.8366 17.6801C22.868 17.6384 22.8894 17.5899 22.8989 17.5385C22.9084 17.4872 22.9059 17.4343 22.8914 17.384ZM18.1651 15.0708H17.7196C17.6302 15.0708 17.5444 15.1063 17.4811 15.1696C17.4179 15.2328 17.3824 15.3186 17.3824 15.4081C17.3824 15.4975 17.4179 15.5833 17.4811 15.6466C17.5444 15.7098 17.6302 15.7453 17.7196 15.7453H18.1651C18.2545 15.7453 18.3403 15.7098 18.4036 15.6466C18.4668 15.5833 18.5024 15.4975 18.5024 15.4081C18.5024 15.3186 18.4668 15.2328 18.4036 15.1696C18.3403 15.1063 18.2545 15.0708 18.1651 15.0708ZM16.6498 20.8048H16.6482L16.2028 20.8069C16.1143 20.8085 16.03 20.8448 15.968 20.9081C15.9061 20.9713 15.8715 21.0564 15.8717 21.1449C15.8719 21.2334 15.9069 21.3183 15.9691 21.3812C16.0313 21.4442 16.1158 21.4802 16.2043 21.4814H16.2059L16.6513 21.4794C16.7408 21.4792 16.8265 21.4435 16.8896 21.3801C16.9527 21.3167 16.988 21.2308 16.9878 21.1414C16.9876 21.0519 16.9519 20.9662 16.8885 20.9031C16.8251 20.84 16.7393 20.8046 16.6498 20.8048ZM19.9618 15.074C19.9139 15.0719 19.8661 15.0708 19.8182 15.0708H19.5015C19.412 15.0708 19.3262 15.1064 19.263 15.1696C19.1997 15.2329 19.1642 15.3187 19.1642 15.4081C19.1642 15.4976 19.1997 15.5833 19.263 15.6466C19.3262 15.7098 19.412 15.7454 19.5015 15.7454H19.8182V15.7453C19.8563 15.7453 19.8943 15.7462 19.9319 15.7479C19.9762 15.7498 20.0204 15.7431 20.062 15.7279C20.1036 15.7128 20.1419 15.6897 20.1746 15.6598C20.2072 15.6299 20.2337 15.5938 20.2524 15.5537C20.2712 15.5136 20.2818 15.4701 20.2838 15.4259C20.2857 15.3817 20.279 15.3374 20.2639 15.2958C20.2487 15.2542 20.2256 15.2159 20.1957 15.1833C20.1658 15.1506 20.1297 15.1241 20.0896 15.1054C20.0495 15.0866 20.006 15.076 19.9618 15.074ZM18.4316 20.7968H18.4301L17.9846 20.7988C17.8961 20.8004 17.8118 20.8368 17.7499 20.9C17.6879 20.9633 17.6533 21.0483 17.6535 21.1368C17.6537 21.2253 17.6887 21.3102 17.7509 21.3732C17.8131 21.4362 17.8976 21.4721 17.9861 21.4734H17.9877L18.4331 21.4713C18.5226 21.4709 18.6082 21.435 18.6711 21.3715C18.7341 21.3079 18.7693 21.222 18.7689 21.1325C18.7685 21.0434 18.7328 20.958 18.6696 20.895C18.6064 20.8321 18.5208 20.7968 18.4316 20.7968Z"></path>
                                                    </g>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_tour']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_hotel'])) : ?>
                                    <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_hotels']) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="Hotel-tab" data-bs-toggle="tab" data-bs-target="#Hotel" type="button" role="tab" aria-controls="Hotel" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                                                    <g>
                                                        <path d="M19.5496 12.2665H16.0038C15.9021 12.2665 15.8046 12.3069 15.7327 12.3788C15.6608 12.4506 15.6204 12.5481 15.6204 12.6498V22.2333H13.6079V18.2562C13.6079 18.1545 13.5675 18.057 13.4956 17.9851C13.4237 17.9132 13.3262 17.8728 13.2245 17.8728H9.77448C9.67281 17.8728 9.57531 17.9132 9.50342 17.9851C9.43153 18.057 9.39114 18.1545 9.39114 18.2562V22.2333H7.37861V8.33724C7.37861 7.91452 7.72256 7.57056 8.14529 7.57056H14.8537C15.2765 7.57056 15.6204 7.91452 15.6204 8.33724V10.4696C15.6204 10.5712 15.6608 10.6687 15.7327 10.7406C15.8046 10.8125 15.9021 10.8529 16.0038 10.8529C16.1054 10.8529 16.2029 10.8125 16.2748 10.7406C16.3467 10.6687 16.3871 10.5712 16.3871 10.4696V8.33724C16.3871 7.49174 15.6992 6.80389 14.8537 6.80389H8.14529C7.29978 6.80389 6.61193 7.49174 6.61193 8.33724V22.2333H3.44937C3.02665 22.2333 2.6827 21.8894 2.6827 21.4666V13.7998C2.6827 13.3771 3.02665 13.0332 3.44937 13.0332H4.79106C4.89273 13.0332 4.99024 12.9928 5.06213 12.9209C5.13402 12.849 5.1744 12.7515 5.1744 12.6498C5.1744 12.5481 5.13402 12.4506 5.06213 12.3788C4.99024 12.3069 4.89273 12.2665 4.79106 12.2665H3.44937C2.60387 12.2665 1.91602 12.9543 1.91602 13.7998V21.4666C1.91602 22.3121 2.60387 23 3.44937 23H16.0038C16.1054 23 16.2029 22.9596 16.2748 22.8877C16.3467 22.8158 16.3871 22.7183 16.3871 22.6166V13.0332H19.5496C19.9724 13.0332 20.3163 13.3771 20.3163 13.7998V21.4666C20.3163 21.8894 19.9724 22.2333 19.5496 22.2333H17.9205C17.8188 22.2333 17.7213 22.2737 17.6494 22.3456C17.5775 22.4175 17.5371 22.515 17.5371 22.6166C17.5371 22.7183 17.5775 22.8158 17.6494 22.8877C17.7213 22.9596 17.8188 23 17.9205 23H19.5496C20.3951 23 21.083 22.3121 21.083 21.4666V13.7998C21.083 12.9543 20.3951 12.2665 19.5496 12.2665ZM10.1578 18.6395H12.8412V22.2333H10.1578V18.6395ZM9.91047 3.38493L9.66638 4.81306C9.61295 5.12577 9.94233 5.36473 10.2231 5.21667L11.4995 4.54323L12.7759 5.21667C13.0564 5.36473 13.3861 5.12591 13.3326 4.81306L13.0885 3.38493L14.1222 2.37377C14.3485 2.15239 14.2231 1.76613 13.9095 1.72042L12.4821 1.51226L11.8435 0.213796C11.7034 -0.0712652 11.2957 -0.0712652 11.1556 0.213796L10.517 1.51226L9.0896 1.72042C8.77631 1.76603 8.65029 2.15215 8.87684 2.37377L9.91047 3.38493ZM10.8272 2.24181C10.8888 2.23283 10.9472 2.209 10.9975 2.17239C11.0478 2.13577 11.0884 2.08747 11.1159 2.03164L11.4995 1.25159L11.8831 2.03164C11.9106 2.08746 11.9512 2.13577 12.0015 2.17238C12.0518 2.209 12.1102 2.23283 12.1718 2.24181L13.0324 2.36735L12.4087 2.97739C12.3644 3.02074 12.3313 3.07419 12.3122 3.13316C12.293 3.19213 12.2885 3.25486 12.2989 3.31597L12.4458 4.17571C11.6045 3.73185 11.6245 3.72648 11.4995 3.72648C11.3729 3.72648 11.3843 3.73717 10.5531 4.17571L10.7 3.31597C10.7105 3.25486 10.7059 3.19213 10.6868 3.13316C10.6677 3.07418 10.6345 3.02073 10.5902 2.97739L9.96653 2.36735L10.8272 2.24181ZM5.66953 3.49173C5.75655 3.22397 6.00088 3.22766 6.24406 3.1923C6.35365 2.9702 6.42462 2.73842 6.70633 2.73842C6.98784 2.73842 7.05986 2.97193 7.16863 3.1923L7.43371 3.23082C7.74748 3.27644 7.87335 3.66323 7.64618 3.8847L7.45436 4.07168C7.4962 4.31577 7.57507 4.54506 7.34713 4.71061C7.11937 4.87612 6.92387 4.72949 6.70633 4.61511C6.48715 4.73035 6.29347 4.87621 6.06552 4.71061C5.83772 4.54515 5.91674 4.3139 5.95829 4.07168C5.78113 3.89889 5.58247 3.75964 5.66953 3.49173ZM2.31531 5.40843C2.40233 5.14067 2.64666 5.14436 2.88984 5.109L3.00839 4.86879C3.14874 4.58449 3.55546 4.58425 3.69591 4.86879L3.81446 5.109C4.05951 5.1446 4.30192 5.14048 4.38899 5.40843C4.47601 5.6762 4.27614 5.81683 4.10019 5.98838L4.14547 6.2524C4.18577 6.48729 4.00426 6.70053 3.76759 6.70053C3.64943 6.70053 3.60271 6.66358 3.3522 6.53181L3.11515 6.65649C2.8345 6.80398 2.5053 6.56516 2.55892 6.2524L2.60421 5.98838C2.42691 5.81559 2.22825 5.67634 2.31531 5.40843ZM15.2559 3.49173C15.3429 3.22397 15.5872 3.22766 15.8304 3.1923L15.9489 2.95209C16.0893 2.66775 16.496 2.6676 16.6365 2.95209L16.755 3.1923C17 3.2279 17.2425 3.22378 17.3295 3.49173C17.4165 3.7595 17.2167 3.90013 17.0407 4.07168L17.086 4.3357C17.1263 4.5706 16.9448 4.78383 16.7081 4.78383C16.59 4.78383 16.5433 4.74688 16.2927 4.61511L16.0557 4.73979C15.775 4.88728 15.4458 4.64846 15.4995 4.3357L15.5447 4.07168C15.3674 3.89889 15.1688 3.75964 15.2559 3.49173ZM18.6101 5.40843C18.6971 5.14067 18.9414 5.14436 19.1846 5.109L19.3032 4.86879C19.4435 4.58444 19.8502 4.5843 19.9907 4.86879L20.1092 5.109C20.3542 5.1446 20.5967 5.14048 20.6838 5.40843C20.7708 5.6762 20.5709 5.81683 20.395 5.98838L20.4402 6.2524C20.4805 6.48729 20.299 6.70053 20.0624 6.70053C19.9442 6.70053 19.8975 6.66358 19.647 6.53181L19.4099 6.65649C19.1293 6.80398 18.8001 6.56516 18.8537 6.2524L18.899 5.98838C18.7216 5.81559 18.523 5.67634 18.6101 5.40843ZM4.64731 15.7165C4.74898 15.7165 4.84648 15.7569 4.91837 15.8288C4.99026 15.9007 5.03065 15.9982 5.03065 16.0999V17.7291C5.03065 17.8307 4.99026 17.9282 4.91837 18.0001C4.84648 18.072 4.74898 18.1124 4.64731 18.1124C4.54564 18.1124 4.44814 18.072 4.37625 18.0001C4.30436 17.9282 4.26397 17.8307 4.26397 17.7291V16.0999C4.26397 15.9982 4.30436 15.9007 4.37625 15.8288C4.44814 15.7569 4.54564 15.7165 4.64731 15.7165ZM18.3517 18.1124C18.25 18.1124 18.1525 18.072 18.0806 18.0001C18.0088 17.9282 17.9684 17.8307 17.9684 17.7291V16.0999C17.9684 15.9982 18.0088 15.9007 18.0806 15.8288C18.1525 15.7569 18.25 15.7165 18.3517 15.7165C18.4534 15.7165 18.5509 15.7569 18.6228 15.8288C18.6947 15.9007 18.735 15.9982 18.735 16.0999V17.7291C18.735 17.8307 18.6947 17.9282 18.6228 18.0001C18.5509 18.072 18.4534 18.1124 18.3517 18.1124ZM13.7037 11.4519H9.29531C9.19364 11.4519 9.09613 11.4115 9.02424 11.3396C8.95235 11.2677 8.91197 11.1702 8.91197 11.0685C8.91197 10.9669 8.95235 10.8694 9.02424 10.7975C9.09613 10.7256 9.19364 10.6852 9.29531 10.6852H13.7037C13.8054 10.6852 13.9029 10.7256 13.9748 10.7975C14.0467 10.8694 14.0871 10.9669 14.0871 11.0685C14.0871 11.1702 14.0467 11.2677 13.9748 11.3396C13.9029 11.4115 13.8054 11.4519 13.7037 11.4519ZM13.0329 14.3748C13.1345 14.3748 13.232 14.4152 13.3039 14.4871C13.3758 14.559 13.4162 14.6565 13.4162 14.7582C13.4162 14.8599 13.3758 14.9574 13.3039 15.0292C13.232 15.1011 13.1345 15.1415 13.0329 15.1415H9.96615C9.86448 15.1415 9.76698 15.1011 9.69509 15.0292C9.6232 14.9574 9.58281 14.8599 9.58281 14.7582C9.58281 14.6565 9.6232 14.559 9.69509 14.4871C9.76698 14.4152 9.86448 14.3748 9.96615 14.3748H13.0329Z"></path>
                                                    </g>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_hotel']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_transport'])) : ?>
                                    <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_transports']) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="Transport-tab" data-bs-toggle="tab" data-bs-target="#Transport" type="button" role="tab" aria-controls="Transport" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 51 51">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M45.8564 34.4958C45.8564 35.7619 46.8834 36.7871 48.1488 36.7871H50.2528C50.5289 36.7871 50.7528 36.5633 50.7528 36.2871V31.249C50.7528 30.9728 50.5289 30.749 50.2528 30.749H48.1488C46.883 30.749 45.8564 31.7757 45.8564 33.0413V34.4958ZM48.1488 35.7871C47.435 35.7871 46.8564 35.2088 46.8564 34.4958V33.0413C46.8564 32.328 47.4354 31.749 48.1488 31.749H49.7528V35.7871H48.1488Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.578816 36.5923C0.673478 36.7152 0.819779 36.7871 0.974858 36.7871H3.80037C5.06692 36.7871 6.09273 35.7617 6.09273 34.4958V33.0413C6.09273 31.7758 5.0673 30.749 3.80037 30.749H2.30235C2.07527 30.749 1.87671 30.902 1.81885 31.1216L0.49136 36.1597C0.451847 36.3097 0.484154 36.4695 0.578816 36.5923ZM1.62367 35.7871L2.68767 31.749H3.80037C4.51466 31.749 5.09273 32.3277 5.09273 33.0413V34.4958C5.09273 35.209 4.51504 35.7871 3.80037 35.7871H1.62367Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.26435 27.315C8.26436 27.3149 8.26435 27.315 8.26435 27.315L10.3466 19.4132C10.3639 19.3473 10.4026 19.2887 10.4565 19.247C10.5105 19.2054 10.5767 19.1828 10.6448 19.1827H18.1558C18.6207 19.1827 18.9975 19.5595 18.9975 20.0243V27.5296C18.9975 27.9943 18.6207 28.3711 18.1558 28.3711H9.07815C8.52629 28.3711 8.12377 27.8488 8.26435 27.315ZM7.29734 27.0602C6.98972 28.2281 7.87034 29.3711 9.07815 29.3711H18.1558C19.1729 29.3711 19.9975 28.5466 19.9975 27.5296V20.0243C19.9975 19.0073 19.173 18.1827 18.1558 18.1827H10.6442C10.3553 18.183 10.0741 18.2789 9.84539 18.4555C9.61672 18.6321 9.4529 18.8793 9.37949 19.1587L7.29734 27.0602Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.2215 28.3711C24.7567 28.3711 24.3799 27.9943 24.3799 27.5295V20.0243C24.3799 19.5596 24.7566 19.1828 25.2215 19.1828H32.4557C32.5237 19.1828 32.5898 19.2054 32.6436 19.2469C32.6974 19.2884 32.736 19.3466 32.7533 19.4123L33.3161 21.5481C33.3864 21.8151 33.6599 21.9746 33.9269 21.9042C34.194 21.8339 34.3534 21.5604 34.2831 21.2933L33.7204 19.1577C33.6469 18.8785 33.483 18.6314 33.2543 18.455C33.0257 18.2787 32.7451 18.1829 32.4563 18.1828H25.2215C24.2044 18.1828 23.3799 19.0073 23.3799 20.0243V27.5295C23.3799 28.5466 24.2044 29.3711 25.2215 29.3711H34.0221C35.2493 29.3711 36.1076 28.2048 35.7966 27.0381L35.792 27.0209L35.7916 27.0191L35.0628 24.2527C34.9924 23.9857 34.719 23.8263 34.4519 23.8966C34.1849 23.967 34.0254 24.2405 34.0958 24.5075L34.825 27.2756L34.8255 27.2774L34.8304 27.2957C34.9772 27.8466 34.5727 28.3711 34.0221 28.3711H25.2215Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0698 41.0047C11.0698 42.687 12.4336 44.0508 14.1159 44.0508C15.7983 44.0508 17.162 42.687 17.162 41.0047C17.162 39.3224 15.7983 37.9586 14.1159 37.9586C12.4336 37.9586 11.0698 39.3224 11.0698 41.0047ZM14.1159 43.0508C12.9859 43.0508 12.0698 42.1347 12.0698 41.0047C12.0698 39.8746 12.9859 38.9586 14.1159 38.9586C15.246 38.9586 16.162 39.8746 16.162 41.0047C16.162 42.1347 15.246 43.0508 14.1159 43.0508Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M32.3147 41.0047C32.3147 42.687 33.6785 44.0508 35.3608 44.0508C37.0431 44.0508 38.4069 42.687 38.4069 41.0047C38.4069 39.3224 37.0431 37.9586 35.3608 37.9586C33.6785 37.9586 32.3147 39.3224 32.3147 41.0047ZM35.3608 43.0508C34.2308 43.0508 33.3147 42.1347 33.3147 41.0047C33.3147 39.8746 34.2308 38.9586 35.3608 38.9586C36.4908 38.9586 37.4069 39.8746 37.4069 41.0047C37.4069 42.1347 36.4908 43.0508 35.3608 43.0508Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.52888 13.9199C6.44663 13.9199 5.56934 13.0427 5.56934 11.9605V8.40513C5.56934 7.32301 6.44664 6.44568 7.52888 6.44568H12.0994V13.9199H7.52888ZM4.56934 11.9605C4.56934 13.595 5.8944 14.9199 7.52888 14.9199H12.5994C12.8755 14.9199 13.0994 14.6961 13.0994 14.4199V5.94568C13.0994 5.66954 12.8755 5.44568 12.5994 5.44568H7.52888C5.89439 5.44568 4.56934 6.7707 4.56934 8.40513V11.9605Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0996 14.4199C12.0996 14.6961 12.3235 14.9199 12.5996 14.9199H17.2592C17.5354 14.9199 17.7592 14.6961 17.7592 14.4199V5.94568C17.7592 4.38279 16.4923 3.11582 14.9294 3.11582C13.3666 3.11582 12.0996 4.3828 12.0996 5.94568V14.4199ZM13.0996 13.9199V5.94568C13.0996 4.93506 13.9189 4.11582 14.9294 4.11582C15.94 4.11582 16.7592 4.93507 16.7592 5.94568V13.9199H13.0996Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.759 14.4199C16.759 14.6961 16.9829 14.9199 17.259 14.9199H25.1014C25.3775 14.9199 25.6014 14.6961 25.6014 14.4199V5.94568C25.6014 5.66954 25.3775 5.44568 25.1014 5.44568H17.259C16.9829 5.44568 16.759 5.66954 16.759 5.94568V14.4199ZM17.759 13.9199V6.44568H24.6014V13.9199H17.759Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.6016 14.4199C24.6016 14.6961 24.8254 14.9199 25.1016 14.9199H29.7612C30.0373 14.9199 30.2612 14.6961 30.2612 14.4199V5.94568C30.2612 4.38279 28.9942 3.11582 27.4313 3.11582C25.8684 3.11582 24.6016 4.38282 24.6016 5.94568V14.4199ZM25.6016 13.9199V5.94568C25.6016 4.93504 26.4207 4.11582 27.4313 4.11582C28.4419 4.11582 29.2612 4.93507 29.2612 5.94568V13.9199H25.6016Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.791 11.9609C36.791 12.2371 37.0149 12.4609 37.291 12.4609H40.6825C41.9404 12.4609 42.9601 11.4412 42.9601 10.1833C42.9601 8.92542 41.9404 7.90569 40.6825 7.90569H37.291C37.0149 7.90569 36.791 8.12955 36.791 8.40569V11.9609ZM37.791 11.4609V8.90569H40.6825C41.3881 8.90569 41.9601 9.47771 41.9601 10.1833C41.9601 10.8889 41.3881 11.4609 40.6825 11.4609H37.791Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M29.261 14.4199C29.261 14.6961 29.4848 14.9199 29.761 14.9199H34.8315C36.466 14.9199 37.791 13.595 37.791 11.9605V8.40513C37.791 6.7707 36.466 5.44568 34.8315 5.44568H29.761C29.4848 5.44568 29.261 5.66954 29.261 5.94568V14.4199ZM30.261 13.9199V6.44568H34.8315C35.9137 6.44568 36.791 7.32301 36.791 8.40513V11.9605C36.791 13.0427 35.9137 13.9199 34.8315 13.9199H30.261Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.23584 41.0046C7.23584 44.8044 10.3162 47.8848 14.116 47.8848C17.9158 47.8848 20.9962 44.8044 20.9962 41.0046C20.9962 37.2048 17.9158 34.1244 14.116 34.1244C10.3162 34.1244 7.23584 37.2048 7.23584 41.0046ZM14.116 46.8848C10.8685 46.8848 8.23584 44.2521 8.23584 41.0046C8.23584 37.7571 10.8685 35.1244 14.116 35.1244C17.3635 35.1244 19.9962 37.7571 19.9962 41.0046C19.9962 44.2521 17.3635 46.8848 14.116 46.8848Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.34781 36.8327C1.34784 36.8326 1.34778 36.8328 1.34781 36.8327L1.45832 36.4151L2.78595 31.3765L3.76729 27.6525C3.83766 27.3855 3.67824 27.112 3.41121 27.0416C3.14418 26.9712 2.87067 27.1306 2.80031 27.3977L1.81896 31.1217L0.380936 36.5774C-0.286037 39.1098 1.62328 41.5898 4.24304 41.5898H7.73792C7.87144 41.5898 7.99942 41.5364 8.09334 41.4415C8.18725 41.3466 8.2393 41.2181 8.23789 41.0846C8.23769 41.0652 8.23702 41.0463 8.2366 41.0341L8.23647 41.0303C8.23598 41.0161 8.23583 41.0097 8.23583 41.0051C8.23583 37.7575 10.8685 35.1249 14.116 35.1249C17.3635 35.1249 19.9961 37.7575 19.9961 41.0051C19.9961 41.0248 19.996 41.0263 19.9956 41.0287C19.9953 41.0318 19.9947 41.0365 19.994 41.0828C19.9921 41.2166 20.044 41.3456 20.1379 41.4409C20.2319 41.5362 20.3601 41.5898 20.494 41.5898H28.9827C29.1166 41.5898 29.2448 41.5362 29.3388 41.4409C29.4327 41.3456 29.4846 41.2166 29.4827 41.0828C29.4821 41.0402 29.4815 41.0338 29.4811 41.0294C29.4808 41.0258 29.4806 41.0236 29.4806 41.0051C29.4806 37.7575 32.1132 35.1249 35.3607 35.1249C38.6082 35.1249 41.2409 37.7575 41.2409 41.0051C41.2409 41.0097 41.2407 41.0161 41.2402 41.0303L41.2401 41.0341C41.2397 41.0462 41.239 41.0652 41.2388 41.0846C41.2374 41.2181 41.2894 41.3466 41.3834 41.4415C41.4773 41.5364 41.6053 41.5898 41.7388 41.5898H46.7595C48.9651 41.5898 50.7529 39.8019 50.7529 37.5955V31.2491C50.7529 29.0436 48.9651 27.2556 46.7595 27.2556H41.6271C41.2359 27.2555 40.8556 27.126 40.5458 26.8872C40.2359 26.6483 40.0138 26.3136 39.9141 25.9353L37.8427 18.0728C37.1983 15.6254 34.9851 13.9204 32.4561 13.9204H10.6442C8.11412 13.9204 5.90196 15.6254 5.25754 18.0728L3.58772 24.4094C3.51735 24.6764 3.67677 24.9499 3.9438 25.0203C4.21083 25.0907 4.48434 24.9312 4.5547 24.6642L6.22455 18.3275C6.75333 16.3193 8.56839 14.9204 10.6442 14.9204H32.4561C34.5309 14.9204 36.3469 16.3193 36.8757 18.3274L38.9471 26.1901C39.1031 26.782 39.4505 27.3056 39.9353 27.6792C40.4201 28.0528 41.0149 28.2555 41.627 28.2556H46.7595C48.4127 28.2556 49.7529 29.5959 49.7529 31.2491V37.5955C49.7529 39.2498 48.4127 40.5898 46.7595 40.5898H42.2285C42.0139 36.9834 39.0211 34.1249 35.3607 34.1249C31.7003 34.1249 28.7077 36.9834 28.493 40.5898H20.9838C20.7691 36.9834 17.7764 34.1249 14.116 34.1249C10.4556 34.1249 7.46284 36.9834 7.24815 40.5898H4.24304C2.2795 40.5898 0.848019 38.7312 1.34781 36.8327Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28.4805 41.0046C28.4805 44.8044 31.5608 47.8848 35.3606 47.8848C39.1604 47.8848 42.2408 44.8044 42.2408 41.0046C42.2408 37.2048 39.1604 34.1244 35.3606 34.1244C31.5608 34.1244 28.4805 37.2048 28.4805 41.0046ZM35.3606 46.8848C32.1131 46.8848 29.4805 44.2521 29.4805 41.0046C29.4805 37.7571 32.1131 35.1244 35.3606 35.1244C38.6082 35.1244 41.2408 37.7571 41.2408 41.0046C41.2408 44.2521 38.6082 46.8848 35.3606 46.8848Z"></path>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_transport']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content" id="facilitesTabContent">
                                <div class="tab-pane fade show active" id="Tour" role="tabpanel" aria-labelledby="Tour-tab">
                                    <div class="row g-4">
                                        <?php
                                        while ($query->have_posts()) :
                                            $query->the_post(); ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="package-card">
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
                                                                        <path d="M8.99939 0C5.40484 0 2.48047 2.92437 2.48047 6.51888C2.48047 10.9798 8.31426 17.5287 8.56264 17.8053C8.79594 18.0651 9.20326 18.0646 9.43613 17.8053C9.68451 17.5287 15.5183 10.9798 15.5183 6.51888C15.5182 2.92437 12.5939 0 8.99939 0ZM8.99939 9.79871C7.19088 9.79871 5.71959 8.32739 5.71959 6.51888C5.71959 4.71037 7.19091 3.23909 8.99939 3.23909C10.8079 3.23909 12.2791 4.71041 12.2791 6.51892C12.2791 8.32743 10.8079 9.79871 8.99939 9.79871Z"></path>
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
                                                            // Check if there are selected locations
                                                            if (!empty($selected_location)) { ?>
                                                                <div class="location-area">
                                                                    <ul class="location-list scrollTextAni">
                                                                        <?php
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
                                                            <?php } ?>
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
                                                            <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec'])) : ?>
                                                                <a href="<?php the_permalink(); ?>" class="primary-btn2"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec']); ?>
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
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                                <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_hotels']) : ?>
                                    <div class="tab-pane fade" id="Hotel" role="tabpanel" aria-labelledby="Hotel-tab">
                                        <div class="row g-4">
                                            <?php
                                            while ($query2->have_posts()) :
                                                $query2->the_post(); ?>
                                                <div class="col-xxl-4 col-md-6">
                                                    <div class="room-suits-card two">
                                                        <div class="row g-0">
                                                            <div class="col-md-12">
                                                                <div class="swiper hotel-img-slider">
                                                                    <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'))) : ?>
                                                                        <span class="batch"><?php echo Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'); ?></span>
                                                                    <?php endif; ?>
                                                                    <div class="swiper-wrapper">
                                                                        <?php if (has_post_thumbnail()) : ?>
                                                                            <div class="swiper-slide">
                                                                                <div class="room-img">
                                                                                    <?php the_post_thumbnail('card-thumb'); ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif ?>
                                                                        <?php foreach (Egns_Helper::egns_hotel_gallery('hotel_gallery') as $key => $data) : ?>
                                                                            <?php if (!empty($data)) : ?>
                                                                                <div class="swiper-slide">
                                                                                    <div class="room-img">
                                                                                        <img src="<?php echo wp_get_attachment_url($data); ?>" alt="<?php echo esc_attr__('hotel-image', 'triprex-core'); ?>" />
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                    <div class="swiper-pagination5"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="room-content">
                                                                    <div class="content-top">
                                                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                                        <ul class="loaction-area">
                                                                            <li><i class="bi bi-geo-alt"></i></li>
                                                                            <li>

                                                                                <?php echo Egns_Helper::egns_hotel_value('hotel_location_text'); ?>
                                                                                <?php
                                                                                $map_link = Egns_Helper::egns_hotel_value('hotel_location_link');
                                                                                if (!empty($map_link)) :
                                                                                ?>
                                                                                    <a href="<?php echo esc_url($map_link['url']) ?>"><?php echo $map_link['text'] ?></a>
                                                                                <?php endif; ?>
                                                                                <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_distance'))) : ?>
                                                                                    <span><?php echo Egns_Helper::egns_hotel_value('hotel_distance'); ?></span>
                                                                                <?php endif; ?>
                                                                            </li>
                                                                        </ul>
                                                                        <ul class="facilisis">
                                                                            <?php
                                                                            $highlights = (array) Egns_Helper::egns_hotel_value('hotel_highlights_repeater');
                                                                            foreach (array_slice($highlights, 0, 5) as $index => $highlight) :
                                                                            ?>
                                                                                <li>
                                                                                    <?php if (!empty($highlight['hotel_highlights_media']['url'])) : ?>
                                                                                        <img src="<?php echo esc_url($highlight['hotel_highlights_media']['url']); ?>" alt="<?php echo esc_attr__('highlights-image', 'triprex-core'); ?>" />
                                                                                    <?php endif; ?>
                                                                                    <?php if (!empty($highlight['hotel_highlights_title'])) : ?>
                                                                                        <?php echo esc_html($highlight['hotel_highlights_title']); ?>
                                                                                    <?php endif; ?>
                                                                                </li>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="content-bottom">
                                                                        <div class="room-type">
                                                                            <?php
                                                                            $post_id = get_the_ID();
                                                                            $terms = get_the_terms($post_id, 'room-type');
                                                                            if ($terms && !is_wp_error($terms)) {
                                                                                foreach ($terms as $index => $term) {
                                                                            ?>
                                                                                    <?php if (!empty($term->name)) : ?>
                                                                                        <h6><?php echo esc_html($term->name); ?></h6>
                                                                                    <?php endif; ?>
                                                                            <?php }
                                                                            }; ?>
                                                                            <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_room_info'))) : ?>
                                                                                <span><?php echo Egns_Helper::egns_hotel_value('hotel_room_info'); ?></span>
                                                                            <?php endif; ?>
                                                                            <div class="deals">
                                                                                <span><?php if (!empty(Egns_Helper::egns_hotel_value('hotel_cancellation_label'))) : ?> <strong><?php echo Egns_Helper::egns_hotel_value('hotel_cancellation_label'); ?></strong> <br><?php endif; ?>
                                                                                    <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_cancellation_duration'))) : ?><?php echo Egns_Helper::egns_hotel_value('hotel_cancellation_duration'); ?> <?php endif; ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="price-and-book">
                                                                            <div class="price-area">
                                                                                <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_duration_person'))) : ?>
                                                                                    <p><?php echo Egns_Helper::egns_hotel_value('hotel_duration_person'); ?></p>
                                                                                <?php endif; ?>
                                                                                <?php echo \Egns_Core\Egns_Helper::egns_get_hotel_pack_price() ?>
                                                                            </div>
                                                                            <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_hotel'])) : ?>
                                                                                <div class="book-btn">
                                                                                    <a href="<?php the_permalink(); ?>" class="primary-btn2"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_hotel']); ?> <i class="bi bi-arrow-right"></i></a>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                <?php endif; ?>
                                <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_transports']) : ?>
                                    <div class="tab-pane fade" id="Transport" role="tabpanel" aria-labelledby="Transport-tab">
                                        <div class="row g-4">
                                            <?php
                                            while ($query3->have_posts()) :
                                                $query3->the_post(); ?>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="transport-card">
                                                        <a href="<?php the_permalink(); ?>" class="transport-img">
                                                            <?php the_post_thumbnail('card-thumb'); ?>
                                                            <?php if (!empty(Egns_Helper::egns_transport_value('transport_distance_field'))) : ?>
                                                                <span><?php echo Egns_Helper::egns_transport_value('transport_distance_field'); ?></span>
                                                            <?php endif; ?>
                                                        </a>
                                                        <div class="transport-content">
                                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            <div class="transport-type">
                                                                <?php
                                                                $post_id = get_the_ID();
                                                                $terms = get_the_terms($post_id, 'transport-type');
                                                                if ($terms && !is_wp_error($terms)) : ?>
                                                                    <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_available_transport'])) : ?>
                                                                        <h6><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_available_transport']); ?> :</h6>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <div class="row g-2">
                                                                    <?php
                                                                    $post_id = get_the_ID();
                                                                    $terms = get_the_terms($post_id, 'transport-type');
                                                                    if ($terms && !is_wp_error($terms)) {
                                                                        foreach ($terms as $index => $term) {
                                                                            $meta = get_term_meta($term->term_id, 'triprex-transport-type', true);
                                                                            if ($meta['triprex_transport_type_logo'] ?? '') :
                                                                                $logo = $meta['triprex_transport_type_logo']['url'];
                                                                            endif;
                                                                    ?>
                                                                            <div class="col-3">
                                                                                <div class="single-transport">
                                                                                    <?php if ($logo  ?? '') : ?>
                                                                                        <img src="<?php echo esc_url($logo) ?>" alt="<?php echo esc_attr__('transport-image', 'triprex-core'); ?>" />
                                                                                    <?php endif; ?>
                                                                                    <?php if (!empty($term->name)) : ?>
                                                                                        <span><?php echo esc_html($term->name); ?></span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                    <?php }
                                                                    } ?>

                                                                </div>
                                                            </div>
                                                            <div class="card-bottom">
                                                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_transport'])) : ?>
                                                                    <div class="details-btn">
                                                                        <a href="<?php the_permalink(); ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_transport']); ?></a>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if (function_exists('run_reviewx')) : ?>
                                                                    <div class="rating-area">
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_tour_facilities_tab_content_style_selection'] == 'style_two') : ?>

            <div class="tour-facilites-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 d-flex flex-column align-items-center justify-content-between flex-wrap <?php echo 'yes' === $settings['triprex_custom_post_tab_on_off_hotels'] || 'yes' === $settings['triprex_custom_post_tab_on_off_transports'] ? 'gap-4' : ''; ?> mb-60">
                            <div class="section-title2 two text-center">
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_short_description'])) : ?>
                                    <p><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_short_description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <ul class="nav nav-tabs" id="facilitesTab" role="tablist">
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_tour'])) : ?>
                                    <?php if ($settings['triprex_custom_post_tab_on_off_hotels'] == 'yes' || $settings['triprex_custom_post_tab_on_off_transports'] == 'yes') : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="Tour-tab" data-bs-toggle="tab" data-bs-target="#Tour" type="button" role="tab" aria-controls="Tour" aria-selected="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                                                    <g>
                                                        <path d="M5.64903 6.91357C2.53954 6.91357 0.00976562 9.44335 0.00976562 12.5528C0.00976562 14.4834 0.928148 16.5592 2.73944 18.7225C2.9952 19.0275 3.26021 19.3246 3.53411 19.6134C2.36462 19.9327 1.66244 20.5062 1.66244 21.1756C1.66244 22.3605 3.71636 23 5.64885 23C7.58139 23 9.63527 22.3605 9.63527 21.1756C9.63527 20.5067 8.93332 19.9331 7.76458 19.6137C8.2315 19.1208 8.73391 18.5408 9.21062 17.894C9.23746 17.8583 9.25696 17.8178 9.26801 17.7746C9.27906 17.7314 9.28143 17.6864 9.27499 17.6423C9.26854 17.5981 9.25341 17.5557 9.23047 17.5175C9.20753 17.4792 9.17723 17.4459 9.14132 17.4195C9.10542 17.393 9.06463 17.3739 9.02131 17.3634C8.97799 17.3528 8.933 17.3509 8.88894 17.3578C8.84489 17.3647 8.80264 17.3803 8.76465 17.4037C8.72666 17.427 8.69367 17.4577 8.6676 17.4938C8.09206 18.2749 7.46909 18.9613 6.92549 19.5065C6.86236 19.5385 6.8109 19.5896 6.77841 19.6525C6.29146 20.131 5.88168 20.486 5.64917 20.68C5.41921 20.4879 5.01568 20.1377 4.53497 19.6654C4.50093 19.5907 4.44083 19.531 4.36593 19.4974C2.83827 17.9609 0.684268 15.3062 0.684268 12.5529C0.684268 9.81539 2.91145 7.58821 5.64899 7.58821C8.38653 7.58821 10.6137 9.81539 10.6137 12.5529C10.6137 13.7484 10.2064 15.0395 9.40297 16.3902C9.38033 16.4283 9.36541 16.4705 9.35906 16.5143C9.35271 16.5581 9.35506 16.6028 9.36597 16.6457C9.37687 16.6887 9.39613 16.729 9.42264 16.7645C9.44914 16.8 9.48238 16.8299 9.52045 16.8525C9.55851 16.8752 9.60067 16.8901 9.6445 16.8965C9.68834 16.9028 9.73299 16.9005 9.77592 16.8895C9.81885 16.8786 9.85921 16.8594 9.89469 16.8329C9.93018 16.8064 9.9601 16.7731 9.98274 16.7351C10.849 15.2785 11.2883 13.8715 11.2883 12.5529C11.2883 9.44335 8.75852 6.91357 5.64903 6.91357ZM5.44262 21.3815C5.50169 21.4273 5.57431 21.4521 5.64903 21.452C5.72376 21.4521 5.79638 21.4273 5.85545 21.3815C5.89682 21.3495 6.46041 20.91 7.21164 20.1755C8.34915 20.4074 8.96081 20.8541 8.96081 21.1756C8.96081 21.4157 8.63171 21.699 8.10195 21.9148C7.4522 22.1796 6.58103 22.3255 5.6489 22.3255C3.62714 22.3255 2.33699 21.6444 2.33699 21.1756C2.33699 20.8536 2.94882 20.4072 4.08697 20.1752C4.84237 20.9141 5.40677 21.3538 5.44262 21.3815Z"></path>
                                                        <path d="M5.64915 10.1009C5.1157 10.1009 4.60844 10.2693 4.18222 10.5879C4.1106 10.6415 4.06318 10.7213 4.05039 10.8098C4.0376 10.8984 4.06049 10.9883 4.11403 11.06C4.16761 11.1316 4.24744 11.179 4.33596 11.1918C4.42448 11.2046 4.51446 11.1817 4.58612 11.1282C4.89477 10.8974 5.26237 10.7754 5.6491 10.7754C6.62916 10.7754 7.42648 11.5727 7.42648 12.5528C7.42648 13.5329 6.62916 14.3302 5.6491 14.3302C4.66904 14.3302 3.87172 13.5329 3.87172 12.5528C3.87172 12.3856 3.89486 12.2202 3.94045 12.0615C3.96513 11.9755 3.95465 11.8833 3.91132 11.805C3.86799 11.7268 3.79534 11.6689 3.70938 11.6442C3.6234 11.6196 3.53117 11.6301 3.45294 11.6735C3.37471 11.7168 3.31687 11.7894 3.29214 11.8754C3.22906 12.0957 3.19713 12.3237 3.19727 12.5528C3.19727 13.9048 4.29718 15.0048 5.64919 15.0048C7.00116 15.0048 8.10112 13.9048 8.10112 12.5528C8.10107 11.2008 7.00112 10.1009 5.64915 10.1009ZM20.3471 9.7984C20.5276 9.60501 20.7029 9.40685 20.8728 9.20413C22.2769 7.52706 22.9889 5.91486 22.9889 4.41218C22.9889 1.97935 21.0096 0 18.5767 0C16.7995 0 15.2037 1.05773 14.5114 2.69468C14.4942 2.73547 14.4851 2.77926 14.4848 2.82354C14.4844 2.86783 14.4928 2.91175 14.5095 2.95279C14.5261 2.99383 14.5507 3.0312 14.5818 3.06275C14.6128 3.0943 14.6498 3.11942 14.6906 3.13667C14.773 3.1715 14.8658 3.17218 14.9487 3.13858C15.0316 3.10498 15.0977 3.03984 15.1326 2.95748C15.7192 1.57065 17.0711 0.674502 18.5767 0.674502C20.6377 0.674502 22.3144 2.35126 22.3144 4.41223C22.3144 7.19931 19.3883 9.86952 18.5766 10.5564C18.3977 10.4053 18.1161 10.1578 17.786 9.83421C17.7533 9.76971 17.7007 9.71745 17.636 9.68516C16.4715 8.51265 14.839 6.49714 14.839 4.41223C14.839 4.32278 14.8035 4.23699 14.7403 4.17374C14.677 4.11049 14.5912 4.07495 14.5018 4.07495C14.4123 4.07495 14.3265 4.11049 14.2633 4.17374C14.2 4.23699 14.1645 4.32278 14.1645 4.41223C14.1645 5.91486 14.8765 7.52706 16.2807 9.20418C16.4505 9.40677 16.6257 9.60484 16.806 9.79818C15.9366 10.0594 15.4347 10.504 15.4347 11.0395C15.4347 11.491 15.801 11.889 16.4662 12.16C17.0354 12.3919 17.7849 12.5197 18.5767 12.5197C19.3684 12.5197 20.1179 12.3919 20.6871 12.16C21.3522 11.8889 21.7185 11.491 21.7185 11.0394C21.7185 10.505 21.2162 10.0599 20.3471 9.7984ZM18.5766 11.8451C16.9802 11.8451 16.1093 11.3129 16.1093 11.0394C16.1093 10.8612 16.5054 10.5352 17.3514 10.3553C17.9206 10.9091 18.3431 11.2382 18.3703 11.2594C18.4294 11.3052 18.502 11.33 18.5768 11.3299C18.6515 11.33 18.7241 11.3052 18.7832 11.2594C18.8104 11.2383 19.2328 10.9092 19.8021 10.3554C20.1789 10.4358 20.5054 10.5535 20.7339 10.6926C20.9281 10.8109 21.0441 10.9405 21.0441 11.0394C21.044 11.3129 20.1731 11.8451 18.5766 11.8451Z"></path>
                                                        <path d="M18.576 2.44968C17.4939 2.44968 16.6135 3.33006 16.6135 4.41227C16.6135 5.49439 17.4939 6.37477 18.576 6.37477C19.6582 6.37477 20.5386 5.49444 20.5386 4.41227C20.5386 3.3301 19.6582 2.44968 18.576 2.44968ZM18.5761 5.70022C17.8658 5.70022 17.288 5.12244 17.288 4.41222C17.288 3.70201 17.8658 3.12418 18.5761 3.12418C19.2863 3.12418 19.8641 3.70196 19.8641 4.41222C19.8641 5.12244 19.2863 5.70022 18.5761 5.70022ZM14.2011 10.7021H14.0471C13.935 10.7021 13.8223 10.7096 13.7121 10.7242C13.6241 10.7369 13.5446 10.7837 13.491 10.8545C13.4374 10.9254 13.4138 11.0145 13.4256 11.1026C13.4373 11.1907 13.4833 11.2706 13.5536 11.325C13.6239 11.3794 13.7128 11.4038 13.8011 11.3929C13.8826 11.3822 13.9648 11.3768 14.0471 11.3768H14.2011V11.3767C14.3874 11.3767 14.5384 11.2258 14.5384 11.0395C14.5384 10.8531 14.3874 10.7021 14.2011 10.7021ZM13.0861 20.8211H13.0845L12.6391 20.8231C12.5496 20.8233 12.4639 20.859 12.4008 20.9224C12.3377 20.9858 12.3023 21.0717 12.3025 21.1611C12.3027 21.2506 12.3384 21.3363 12.4018 21.3994C12.4652 21.4625 12.5511 21.4979 12.6405 21.4977H12.6421L13.0876 21.4957C13.177 21.4952 13.2626 21.4593 13.3256 21.3958C13.3885 21.3322 13.4237 21.2463 13.4233 21.1569C13.4229 21.0677 13.3872 20.9823 13.324 20.9193C13.2608 20.8564 13.1753 20.8211 13.0861 20.8211ZM14.6013 15.0708H14.1558C14.0664 15.0708 13.9806 15.1063 13.9174 15.1696C13.8541 15.2328 13.8186 15.3186 13.8186 15.4081C13.8186 15.4975 13.8541 15.5833 13.9174 15.6466C13.9806 15.7098 14.0664 15.7453 14.1558 15.7453H14.6013C14.6456 15.7453 14.6894 15.7366 14.7304 15.7197C14.7713 15.7027 14.8085 15.6779 14.8398 15.6466C14.8711 15.6152 14.896 15.5781 14.9129 15.5371C14.9299 15.4962 14.9386 15.4524 14.9386 15.4081C14.9386 15.3638 14.9299 15.3199 14.9129 15.279C14.896 15.2381 14.8711 15.2009 14.8398 15.1696C14.8085 15.1382 14.7713 15.1134 14.7304 15.0965C14.6894 15.0795 14.6456 15.0708 14.6013 15.0708ZM12.8142 11.3893C12.7535 11.3236 12.6693 11.2846 12.5799 11.281C12.4905 11.2774 12.4034 11.3095 12.3376 11.3701C12.2116 11.4863 12.0977 11.615 11.9977 11.7543C11.9477 11.827 11.9282 11.9164 11.9434 12.0034C11.9586 12.0903 12.0072 12.1679 12.0789 12.2194C12.1506 12.2709 12.2396 12.2922 12.3269 12.2788C12.4141 12.2654 12.4927 12.2184 12.5456 12.1478C12.619 12.0456 12.7026 11.9512 12.795 11.8659C12.8607 11.8052 12.8997 11.721 12.9033 11.6316C12.9069 11.5422 12.8749 11.4551 12.8142 11.3893ZM14.8679 20.8129H14.8664L14.421 20.815C14.3325 20.8166 14.2482 20.8529 14.1862 20.9162C14.1243 20.9794 14.0897 21.0644 14.0899 21.153C14.09 21.2415 14.125 21.3264 14.1873 21.3893C14.2495 21.4523 14.3339 21.4883 14.4225 21.4895H14.424L14.8694 21.4875C14.9579 21.4858 15.0423 21.4495 15.1042 21.3863C15.1661 21.323 15.2007 21.238 15.2006 21.1495C15.2004 21.061 15.1654 20.9761 15.1032 20.9131C15.0409 20.8501 14.9565 20.8142 14.8679 20.8129ZM11.3043 20.8291H11.3027L10.8572 20.8312C10.7678 20.8316 10.6822 20.8675 10.6192 20.9311C10.5563 20.9946 10.5211 21.0805 10.5215 21.17C10.5219 21.2591 10.5576 21.3445 10.6208 21.4075C10.684 21.4704 10.7695 21.5057 10.8587 21.5057H10.8603L11.3057 21.5037C11.3952 21.5033 11.4808 21.4673 11.5437 21.4038C11.6067 21.3403 11.6419 21.2543 11.6415 21.1649C11.6411 21.0757 11.6054 20.9903 11.5422 20.9274C11.479 20.8645 11.3934 20.8291 11.3043 20.8291ZM13.0633 14.7873C12.957 14.7202 12.8578 14.6425 12.7671 14.5554C12.7027 14.4934 12.6162 14.4595 12.5268 14.4613C12.4373 14.463 12.3523 14.5002 12.2902 14.5646C12.2595 14.5965 12.2354 14.6342 12.2193 14.6754C12.2031 14.7167 12.1952 14.7607 12.1961 14.805C12.197 14.8492 12.2065 14.8929 12.2243 14.9335C12.242 14.9741 12.2676 15.0108 12.2995 15.0415C12.4231 15.1603 12.5584 15.2663 12.7034 15.3578C12.7408 15.3815 12.7826 15.3975 12.8263 15.405C12.8699 15.4126 12.9146 15.4114 12.9579 15.4016C13.0011 15.3918 13.0419 15.3736 13.0781 15.348C13.1143 15.3224 13.145 15.29 13.1686 15.2525C13.1923 15.215 13.2083 15.1732 13.2158 15.1296C13.2233 15.0859 13.2221 15.0412 13.2123 14.9981C13.2025 14.9549 13.1843 14.914 13.1588 14.8778C13.1332 14.8417 13.1008 14.8109 13.0633 14.7873ZM12.2342 13.5793C12.2115 13.4622 12.2001 13.3431 12.2001 13.2238L12.2002 13.2051C12.2007 13.1608 12.1925 13.1168 12.176 13.0757C12.1595 13.0346 12.1351 12.9971 12.1042 12.9654C12.0732 12.9338 12.0363 12.9085 11.9956 12.8911C11.9549 12.8736 11.9111 12.8644 11.8669 12.8639L11.8629 12.8639C11.7741 12.8639 11.6889 12.8989 11.6258 12.9613C11.5627 13.0237 11.5267 13.1085 11.5257 13.1972L11.5255 13.2238C11.5255 13.3867 11.5412 13.5497 11.5721 13.7084C11.5806 13.7518 11.5975 13.7932 11.622 13.8301C11.6465 13.8671 11.678 13.8988 11.7147 13.9235C11.7514 13.9483 11.7927 13.9656 11.8361 13.9744C11.8795 13.9832 11.9242 13.9834 11.9677 13.9749C12.0112 13.9664 12.0526 13.9494 12.0895 13.925C12.1264 13.9005 12.1581 13.869 12.1829 13.8323C12.2076 13.7956 12.2249 13.7543 12.2337 13.7109C12.2425 13.6675 12.2427 13.6228 12.2342 13.5793ZM16.3832 15.0708H15.9378C15.8483 15.0708 15.7625 15.1063 15.6993 15.1696C15.636 15.2328 15.6005 15.3186 15.6005 15.4081C15.6005 15.4975 15.636 15.5833 15.6993 15.6466C15.7625 15.7098 15.8483 15.7453 15.9378 15.7453H16.3832C16.4727 15.7453 16.5584 15.7098 16.6217 15.6466C16.6849 15.5833 16.7205 15.4975 16.7205 15.4081C16.7205 15.3186 16.6849 15.2328 16.6217 15.1696C16.5584 15.1063 16.4727 15.0708 16.3832 15.0708ZM21.7981 15.7575C21.6679 15.6547 21.5298 15.5621 21.3852 15.4807C21.2231 15.3892 21.0173 15.4467 20.9258 15.609C20.9041 15.6475 20.8902 15.69 20.8849 15.734C20.8795 15.778 20.8829 15.8226 20.8948 15.8652C20.9068 15.9079 20.927 15.9478 20.9543 15.9826C20.9816 16.0175 21.0156 16.0466 21.0541 16.0683C21.1682 16.1327 21.2772 16.2058 21.38 16.2869C21.4395 16.334 21.513 16.3596 21.5888 16.3595C21.659 16.3596 21.7273 16.3378 21.7845 16.2972C21.8417 16.2566 21.8848 16.1992 21.9078 16.133C21.9308 16.0668 21.9326 15.995 21.913 15.9277C21.8933 15.8604 21.8532 15.8009 21.7981 15.7575ZM20.5462 21.0546C20.5206 20.8701 20.3501 20.741 20.1659 20.7667C20.0555 20.7819 19.9424 20.79 19.8296 20.7904L19.7665 20.7907C19.6783 20.793 19.5946 20.8296 19.5332 20.8928C19.4717 20.9559 19.4374 21.0406 19.4376 21.1288C19.4378 21.2169 19.4725 21.3015 19.5343 21.3644C19.596 21.4272 19.6799 21.4635 19.768 21.4653H19.7697L19.8327 21.465C19.975 21.4644 20.1172 21.4543 20.2583 21.4349C20.3021 21.4288 20.3444 21.4142 20.3826 21.3918C20.4208 21.3694 20.4543 21.3397 20.481 21.3044C20.5077 21.2691 20.5273 21.2288 20.5384 21.186C20.5496 21.1431 20.5523 21.0985 20.5462 21.0546ZM22.0347 20.1062C22.0042 20.0741 21.9676 20.0483 21.9271 20.0304C21.8866 20.0125 21.843 20.0027 21.7987 20.0016C21.7544 20.0005 21.7104 20.0082 21.669 20.0241C21.6277 20.0401 21.59 20.064 21.5579 20.0946C21.4629 20.185 21.3611 20.2679 21.2534 20.3427C21.1799 20.3937 21.1297 20.4718 21.1137 20.5598C21.0978 20.6478 21.1174 20.7385 21.1684 20.8121C21.1994 20.8569 21.2409 20.8936 21.2892 20.9188C21.3376 20.9441 21.3913 20.9573 21.4459 20.9572C21.5144 20.9572 21.5814 20.9363 21.6377 20.8971C21.7741 20.8025 21.9029 20.6975 22.0231 20.583C22.0552 20.5525 22.081 20.5159 22.0989 20.4754C22.1168 20.4349 22.1266 20.3913 22.1277 20.347C22.1288 20.3027 22.1211 20.2587 22.1051 20.2173C22.0892 20.176 22.0652 20.1382 22.0347 20.1062ZM22.6911 18.4682C22.6032 18.4517 22.5123 18.4707 22.4385 18.5212C22.3646 18.5716 22.3138 18.6493 22.2973 18.7372C22.273 18.8658 22.2387 18.9924 22.1948 19.1158C22.1659 19.1998 22.1713 19.2918 22.2098 19.3718C22.2483 19.4518 22.3169 19.5135 22.4005 19.5433C22.4842 19.5731 22.5762 19.5687 22.6567 19.5311C22.7371 19.4935 22.7995 19.4256 22.8303 19.3423C22.886 19.1858 22.9294 19.0253 22.9602 18.862C22.9767 18.7741 22.9577 18.6832 22.9072 18.6094C22.8567 18.5355 22.779 18.4847 22.6911 18.4682ZM22.8914 17.384C22.8455 17.2242 22.7872 17.0683 22.7169 16.9176C22.6782 16.8379 22.6097 16.7766 22.5263 16.747C22.4428 16.7173 22.3511 16.7217 22.2708 16.7592C22.1905 16.7966 22.1282 16.8641 22.0973 16.9471C22.0664 17.0301 22.0694 17.122 22.1056 17.2028C22.1609 17.3214 22.2069 17.4443 22.2431 17.5701C22.2633 17.6405 22.3058 17.7024 22.3643 17.7464C22.4227 17.7905 22.4939 17.8144 22.5671 17.8144C22.6194 17.8144 22.6709 17.8023 22.7177 17.779C22.7644 17.7557 22.8051 17.7218 22.8366 17.6801C22.868 17.6384 22.8894 17.5899 22.8989 17.5385C22.9084 17.4872 22.9059 17.4343 22.8914 17.384ZM18.1651 15.0708H17.7196C17.6302 15.0708 17.5444 15.1063 17.4811 15.1696C17.4179 15.2328 17.3824 15.3186 17.3824 15.4081C17.3824 15.4975 17.4179 15.5833 17.4811 15.6466C17.5444 15.7098 17.6302 15.7453 17.7196 15.7453H18.1651C18.2545 15.7453 18.3403 15.7098 18.4036 15.6466C18.4668 15.5833 18.5024 15.4975 18.5024 15.4081C18.5024 15.3186 18.4668 15.2328 18.4036 15.1696C18.3403 15.1063 18.2545 15.0708 18.1651 15.0708ZM16.6498 20.8048H16.6482L16.2028 20.8069C16.1143 20.8085 16.03 20.8448 15.968 20.9081C15.9061 20.9713 15.8715 21.0564 15.8717 21.1449C15.8719 21.2334 15.9069 21.3183 15.9691 21.3812C16.0313 21.4442 16.1158 21.4802 16.2043 21.4814H16.2059L16.6513 21.4794C16.7408 21.4792 16.8265 21.4435 16.8896 21.3801C16.9527 21.3167 16.988 21.2308 16.9878 21.1414C16.9876 21.0519 16.9519 20.9662 16.8885 20.9031C16.8251 20.84 16.7393 20.8046 16.6498 20.8048ZM19.9618 15.074C19.9139 15.0719 19.8661 15.0708 19.8182 15.0708H19.5015C19.412 15.0708 19.3262 15.1064 19.263 15.1696C19.1997 15.2329 19.1642 15.3187 19.1642 15.4081C19.1642 15.4976 19.1997 15.5833 19.263 15.6466C19.3262 15.7098 19.412 15.7454 19.5015 15.7454H19.8182V15.7453C19.8563 15.7453 19.8943 15.7462 19.9319 15.7479C19.9762 15.7498 20.0204 15.7431 20.062 15.7279C20.1036 15.7128 20.1419 15.6897 20.1746 15.6598C20.2072 15.6299 20.2337 15.5938 20.2524 15.5537C20.2712 15.5136 20.2818 15.4701 20.2838 15.4259C20.2857 15.3817 20.279 15.3374 20.2639 15.2958C20.2487 15.2542 20.2256 15.2159 20.1957 15.1833C20.1658 15.1506 20.1297 15.1241 20.0896 15.1054C20.0495 15.0866 20.006 15.076 19.9618 15.074ZM18.4316 20.7968H18.4301L17.9846 20.7988C17.8961 20.8004 17.8118 20.8368 17.7499 20.9C17.6879 20.9633 17.6533 21.0483 17.6535 21.1368C17.6537 21.2253 17.6887 21.3102 17.7509 21.3732C17.8131 21.4362 17.8976 21.4721 17.9861 21.4734H17.9877L18.4331 21.4713C18.5226 21.4709 18.6082 21.435 18.6711 21.3715C18.7341 21.3079 18.7693 21.222 18.7689 21.1325C18.7685 21.0434 18.7328 20.958 18.6696 20.895C18.6064 20.8321 18.5208 20.7968 18.4316 20.7968Z"></path>
                                                    </g>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_tour']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_hotel'])) : ?>
                                    <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_hotels']) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="Hotel-tab" data-bs-toggle="tab" data-bs-target="#Hotel" type="button" role="tab" aria-controls="Hotel" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                                                    <g>
                                                        <path d="M19.5496 12.2665H16.0038C15.9021 12.2665 15.8046 12.3069 15.7327 12.3788C15.6608 12.4506 15.6204 12.5481 15.6204 12.6498V22.2333H13.6079V18.2562C13.6079 18.1545 13.5675 18.057 13.4956 17.9851C13.4237 17.9132 13.3262 17.8728 13.2245 17.8728H9.77448C9.67281 17.8728 9.57531 17.9132 9.50342 17.9851C9.43153 18.057 9.39114 18.1545 9.39114 18.2562V22.2333H7.37861V8.33724C7.37861 7.91452 7.72256 7.57056 8.14529 7.57056H14.8537C15.2765 7.57056 15.6204 7.91452 15.6204 8.33724V10.4696C15.6204 10.5712 15.6608 10.6687 15.7327 10.7406C15.8046 10.8125 15.9021 10.8529 16.0038 10.8529C16.1054 10.8529 16.2029 10.8125 16.2748 10.7406C16.3467 10.6687 16.3871 10.5712 16.3871 10.4696V8.33724C16.3871 7.49174 15.6992 6.80389 14.8537 6.80389H8.14529C7.29978 6.80389 6.61193 7.49174 6.61193 8.33724V22.2333H3.44937C3.02665 22.2333 2.6827 21.8894 2.6827 21.4666V13.7998C2.6827 13.3771 3.02665 13.0332 3.44937 13.0332H4.79106C4.89273 13.0332 4.99024 12.9928 5.06213 12.9209C5.13402 12.849 5.1744 12.7515 5.1744 12.6498C5.1744 12.5481 5.13402 12.4506 5.06213 12.3788C4.99024 12.3069 4.89273 12.2665 4.79106 12.2665H3.44937C2.60387 12.2665 1.91602 12.9543 1.91602 13.7998V21.4666C1.91602 22.3121 2.60387 23 3.44937 23H16.0038C16.1054 23 16.2029 22.9596 16.2748 22.8877C16.3467 22.8158 16.3871 22.7183 16.3871 22.6166V13.0332H19.5496C19.9724 13.0332 20.3163 13.3771 20.3163 13.7998V21.4666C20.3163 21.8894 19.9724 22.2333 19.5496 22.2333H17.9205C17.8188 22.2333 17.7213 22.2737 17.6494 22.3456C17.5775 22.4175 17.5371 22.515 17.5371 22.6166C17.5371 22.7183 17.5775 22.8158 17.6494 22.8877C17.7213 22.9596 17.8188 23 17.9205 23H19.5496C20.3951 23 21.083 22.3121 21.083 21.4666V13.7998C21.083 12.9543 20.3951 12.2665 19.5496 12.2665ZM10.1578 18.6395H12.8412V22.2333H10.1578V18.6395ZM9.91047 3.38493L9.66638 4.81306C9.61295 5.12577 9.94233 5.36473 10.2231 5.21667L11.4995 4.54323L12.7759 5.21667C13.0564 5.36473 13.3861 5.12591 13.3326 4.81306L13.0885 3.38493L14.1222 2.37377C14.3485 2.15239 14.2231 1.76613 13.9095 1.72042L12.4821 1.51226L11.8435 0.213796C11.7034 -0.0712652 11.2957 -0.0712652 11.1556 0.213796L10.517 1.51226L9.0896 1.72042C8.77631 1.76603 8.65029 2.15215 8.87684 2.37377L9.91047 3.38493ZM10.8272 2.24181C10.8888 2.23283 10.9472 2.209 10.9975 2.17239C11.0478 2.13577 11.0884 2.08747 11.1159 2.03164L11.4995 1.25159L11.8831 2.03164C11.9106 2.08746 11.9512 2.13577 12.0015 2.17238C12.0518 2.209 12.1102 2.23283 12.1718 2.24181L13.0324 2.36735L12.4087 2.97739C12.3644 3.02074 12.3313 3.07419 12.3122 3.13316C12.293 3.19213 12.2885 3.25486 12.2989 3.31597L12.4458 4.17571C11.6045 3.73185 11.6245 3.72648 11.4995 3.72648C11.3729 3.72648 11.3843 3.73717 10.5531 4.17571L10.7 3.31597C10.7105 3.25486 10.7059 3.19213 10.6868 3.13316C10.6677 3.07418 10.6345 3.02073 10.5902 2.97739L9.96653 2.36735L10.8272 2.24181ZM5.66953 3.49173C5.75655 3.22397 6.00088 3.22766 6.24406 3.1923C6.35365 2.9702 6.42462 2.73842 6.70633 2.73842C6.98784 2.73842 7.05986 2.97193 7.16863 3.1923L7.43371 3.23082C7.74748 3.27644 7.87335 3.66323 7.64618 3.8847L7.45436 4.07168C7.4962 4.31577 7.57507 4.54506 7.34713 4.71061C7.11937 4.87612 6.92387 4.72949 6.70633 4.61511C6.48715 4.73035 6.29347 4.87621 6.06552 4.71061C5.83772 4.54515 5.91674 4.3139 5.95829 4.07168C5.78113 3.89889 5.58247 3.75964 5.66953 3.49173ZM2.31531 5.40843C2.40233 5.14067 2.64666 5.14436 2.88984 5.109L3.00839 4.86879C3.14874 4.58449 3.55546 4.58425 3.69591 4.86879L3.81446 5.109C4.05951 5.1446 4.30192 5.14048 4.38899 5.40843C4.47601 5.6762 4.27614 5.81683 4.10019 5.98838L4.14547 6.2524C4.18577 6.48729 4.00426 6.70053 3.76759 6.70053C3.64943 6.70053 3.60271 6.66358 3.3522 6.53181L3.11515 6.65649C2.8345 6.80398 2.5053 6.56516 2.55892 6.2524L2.60421 5.98838C2.42691 5.81559 2.22825 5.67634 2.31531 5.40843ZM15.2559 3.49173C15.3429 3.22397 15.5872 3.22766 15.8304 3.1923L15.9489 2.95209C16.0893 2.66775 16.496 2.6676 16.6365 2.95209L16.755 3.1923C17 3.2279 17.2425 3.22378 17.3295 3.49173C17.4165 3.7595 17.2167 3.90013 17.0407 4.07168L17.086 4.3357C17.1263 4.5706 16.9448 4.78383 16.7081 4.78383C16.59 4.78383 16.5433 4.74688 16.2927 4.61511L16.0557 4.73979C15.775 4.88728 15.4458 4.64846 15.4995 4.3357L15.5447 4.07168C15.3674 3.89889 15.1688 3.75964 15.2559 3.49173ZM18.6101 5.40843C18.6971 5.14067 18.9414 5.14436 19.1846 5.109L19.3032 4.86879C19.4435 4.58444 19.8502 4.5843 19.9907 4.86879L20.1092 5.109C20.3542 5.1446 20.5967 5.14048 20.6838 5.40843C20.7708 5.6762 20.5709 5.81683 20.395 5.98838L20.4402 6.2524C20.4805 6.48729 20.299 6.70053 20.0624 6.70053C19.9442 6.70053 19.8975 6.66358 19.647 6.53181L19.4099 6.65649C19.1293 6.80398 18.8001 6.56516 18.8537 6.2524L18.899 5.98838C18.7216 5.81559 18.523 5.67634 18.6101 5.40843ZM4.64731 15.7165C4.74898 15.7165 4.84648 15.7569 4.91837 15.8288C4.99026 15.9007 5.03065 15.9982 5.03065 16.0999V17.7291C5.03065 17.8307 4.99026 17.9282 4.91837 18.0001C4.84648 18.072 4.74898 18.1124 4.64731 18.1124C4.54564 18.1124 4.44814 18.072 4.37625 18.0001C4.30436 17.9282 4.26397 17.8307 4.26397 17.7291V16.0999C4.26397 15.9982 4.30436 15.9007 4.37625 15.8288C4.44814 15.7569 4.54564 15.7165 4.64731 15.7165ZM18.3517 18.1124C18.25 18.1124 18.1525 18.072 18.0806 18.0001C18.0088 17.9282 17.9684 17.8307 17.9684 17.7291V16.0999C17.9684 15.9982 18.0088 15.9007 18.0806 15.8288C18.1525 15.7569 18.25 15.7165 18.3517 15.7165C18.4534 15.7165 18.5509 15.7569 18.6228 15.8288C18.6947 15.9007 18.735 15.9982 18.735 16.0999V17.7291C18.735 17.8307 18.6947 17.9282 18.6228 18.0001C18.5509 18.072 18.4534 18.1124 18.3517 18.1124ZM13.7037 11.4519H9.29531C9.19364 11.4519 9.09613 11.4115 9.02424 11.3396C8.95235 11.2677 8.91197 11.1702 8.91197 11.0685C8.91197 10.9669 8.95235 10.8694 9.02424 10.7975C9.09613 10.7256 9.19364 10.6852 9.29531 10.6852H13.7037C13.8054 10.6852 13.9029 10.7256 13.9748 10.7975C14.0467 10.8694 14.0871 10.9669 14.0871 11.0685C14.0871 11.1702 14.0467 11.2677 13.9748 11.3396C13.9029 11.4115 13.8054 11.4519 13.7037 11.4519ZM13.0329 14.3748C13.1345 14.3748 13.232 14.4152 13.3039 14.4871C13.3758 14.559 13.4162 14.6565 13.4162 14.7582C13.4162 14.8599 13.3758 14.9574 13.3039 15.0292C13.232 15.1011 13.1345 15.1415 13.0329 15.1415H9.96615C9.86448 15.1415 9.76698 15.1011 9.69509 15.0292C9.6232 14.9574 9.58281 14.8599 9.58281 14.7582C9.58281 14.6565 9.6232 14.559 9.69509 14.4871C9.76698 14.4152 9.86448 14.3748 9.96615 14.3748H13.0329Z"></path>
                                                    </g>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_hotel']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_transport'])) : ?>
                                    <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_transports']) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="Transport-tab" data-bs-toggle="tab" data-bs-target="#Transport" type="button" role="tab" aria-controls="Transport" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 51 51">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M45.8564 34.4958C45.8564 35.7619 46.8834 36.7871 48.1488 36.7871H50.2528C50.5289 36.7871 50.7528 36.5633 50.7528 36.2871V31.249C50.7528 30.9728 50.5289 30.749 50.2528 30.749H48.1488C46.883 30.749 45.8564 31.7757 45.8564 33.0413V34.4958ZM48.1488 35.7871C47.435 35.7871 46.8564 35.2088 46.8564 34.4958V33.0413C46.8564 32.328 47.4354 31.749 48.1488 31.749H49.7528V35.7871H48.1488Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.578816 36.5923C0.673478 36.7152 0.819779 36.7871 0.974858 36.7871H3.80037C5.06692 36.7871 6.09273 35.7617 6.09273 34.4958V33.0413C6.09273 31.7758 5.0673 30.749 3.80037 30.749H2.30235C2.07527 30.749 1.87671 30.902 1.81885 31.1216L0.49136 36.1597C0.451847 36.3097 0.484154 36.4695 0.578816 36.5923ZM1.62367 35.7871L2.68767 31.749H3.80037C4.51466 31.749 5.09273 32.3277 5.09273 33.0413V34.4958C5.09273 35.209 4.51504 35.7871 3.80037 35.7871H1.62367Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.26435 27.315C8.26436 27.3149 8.26435 27.315 8.26435 27.315L10.3466 19.4132C10.3639 19.3473 10.4026 19.2887 10.4565 19.247C10.5105 19.2054 10.5767 19.1828 10.6448 19.1827H18.1558C18.6207 19.1827 18.9975 19.5595 18.9975 20.0243V27.5296C18.9975 27.9943 18.6207 28.3711 18.1558 28.3711H9.07815C8.52629 28.3711 8.12377 27.8488 8.26435 27.315ZM7.29734 27.0602C6.98972 28.2281 7.87034 29.3711 9.07815 29.3711H18.1558C19.1729 29.3711 19.9975 28.5466 19.9975 27.5296V20.0243C19.9975 19.0073 19.173 18.1827 18.1558 18.1827H10.6442C10.3553 18.183 10.0741 18.2789 9.84539 18.4555C9.61672 18.6321 9.4529 18.8793 9.37949 19.1587L7.29734 27.0602Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.2215 28.3711C24.7567 28.3711 24.3799 27.9943 24.3799 27.5295V20.0243C24.3799 19.5596 24.7566 19.1828 25.2215 19.1828H32.4557C32.5237 19.1828 32.5898 19.2054 32.6436 19.2469C32.6974 19.2884 32.736 19.3466 32.7533 19.4123L33.3161 21.5481C33.3864 21.8151 33.6599 21.9746 33.9269 21.9042C34.194 21.8339 34.3534 21.5604 34.2831 21.2933L33.7204 19.1577C33.6469 18.8785 33.483 18.6314 33.2543 18.455C33.0257 18.2787 32.7451 18.1829 32.4563 18.1828H25.2215C24.2044 18.1828 23.3799 19.0073 23.3799 20.0243V27.5295C23.3799 28.5466 24.2044 29.3711 25.2215 29.3711H34.0221C35.2493 29.3711 36.1076 28.2048 35.7966 27.0381L35.792 27.0209L35.7916 27.0191L35.0628 24.2527C34.9924 23.9857 34.719 23.8263 34.4519 23.8966C34.1849 23.967 34.0254 24.2405 34.0958 24.5075L34.825 27.2756L34.8255 27.2774L34.8304 27.2957C34.9772 27.8466 34.5727 28.3711 34.0221 28.3711H25.2215Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0698 41.0047C11.0698 42.687 12.4336 44.0508 14.1159 44.0508C15.7983 44.0508 17.162 42.687 17.162 41.0047C17.162 39.3224 15.7983 37.9586 14.1159 37.9586C12.4336 37.9586 11.0698 39.3224 11.0698 41.0047ZM14.1159 43.0508C12.9859 43.0508 12.0698 42.1347 12.0698 41.0047C12.0698 39.8746 12.9859 38.9586 14.1159 38.9586C15.246 38.9586 16.162 39.8746 16.162 41.0047C16.162 42.1347 15.246 43.0508 14.1159 43.0508Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M32.3147 41.0047C32.3147 42.687 33.6785 44.0508 35.3608 44.0508C37.0431 44.0508 38.4069 42.687 38.4069 41.0047C38.4069 39.3224 37.0431 37.9586 35.3608 37.9586C33.6785 37.9586 32.3147 39.3224 32.3147 41.0047ZM35.3608 43.0508C34.2308 43.0508 33.3147 42.1347 33.3147 41.0047C33.3147 39.8746 34.2308 38.9586 35.3608 38.9586C36.4908 38.9586 37.4069 39.8746 37.4069 41.0047C37.4069 42.1347 36.4908 43.0508 35.3608 43.0508Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.52888 13.9199C6.44663 13.9199 5.56934 13.0427 5.56934 11.9605V8.40513C5.56934 7.32301 6.44664 6.44568 7.52888 6.44568H12.0994V13.9199H7.52888ZM4.56934 11.9605C4.56934 13.595 5.8944 14.9199 7.52888 14.9199H12.5994C12.8755 14.9199 13.0994 14.6961 13.0994 14.4199V5.94568C13.0994 5.66954 12.8755 5.44568 12.5994 5.44568H7.52888C5.89439 5.44568 4.56934 6.7707 4.56934 8.40513V11.9605Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0996 14.4199C12.0996 14.6961 12.3235 14.9199 12.5996 14.9199H17.2592C17.5354 14.9199 17.7592 14.6961 17.7592 14.4199V5.94568C17.7592 4.38279 16.4923 3.11582 14.9294 3.11582C13.3666 3.11582 12.0996 4.3828 12.0996 5.94568V14.4199ZM13.0996 13.9199V5.94568C13.0996 4.93506 13.9189 4.11582 14.9294 4.11582C15.94 4.11582 16.7592 4.93507 16.7592 5.94568V13.9199H13.0996Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.759 14.4199C16.759 14.6961 16.9829 14.9199 17.259 14.9199H25.1014C25.3775 14.9199 25.6014 14.6961 25.6014 14.4199V5.94568C25.6014 5.66954 25.3775 5.44568 25.1014 5.44568H17.259C16.9829 5.44568 16.759 5.66954 16.759 5.94568V14.4199ZM17.759 13.9199V6.44568H24.6014V13.9199H17.759Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.6016 14.4199C24.6016 14.6961 24.8254 14.9199 25.1016 14.9199H29.7612C30.0373 14.9199 30.2612 14.6961 30.2612 14.4199V5.94568C30.2612 4.38279 28.9942 3.11582 27.4313 3.11582C25.8684 3.11582 24.6016 4.38282 24.6016 5.94568V14.4199ZM25.6016 13.9199V5.94568C25.6016 4.93504 26.4207 4.11582 27.4313 4.11582C28.4419 4.11582 29.2612 4.93507 29.2612 5.94568V13.9199H25.6016Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.791 11.9609C36.791 12.2371 37.0149 12.4609 37.291 12.4609H40.6825C41.9404 12.4609 42.9601 11.4412 42.9601 10.1833C42.9601 8.92542 41.9404 7.90569 40.6825 7.90569H37.291C37.0149 7.90569 36.791 8.12955 36.791 8.40569V11.9609ZM37.791 11.4609V8.90569H40.6825C41.3881 8.90569 41.9601 9.47771 41.9601 10.1833C41.9601 10.8889 41.3881 11.4609 40.6825 11.4609H37.791Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M29.261 14.4199C29.261 14.6961 29.4848 14.9199 29.761 14.9199H34.8315C36.466 14.9199 37.791 13.595 37.791 11.9605V8.40513C37.791 6.7707 36.466 5.44568 34.8315 5.44568H29.761C29.4848 5.44568 29.261 5.66954 29.261 5.94568V14.4199ZM30.261 13.9199V6.44568H34.8315C35.9137 6.44568 36.791 7.32301 36.791 8.40513V11.9605C36.791 13.0427 35.9137 13.9199 34.8315 13.9199H30.261Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.23584 41.0046C7.23584 44.8044 10.3162 47.8848 14.116 47.8848C17.9158 47.8848 20.9962 44.8044 20.9962 41.0046C20.9962 37.2048 17.9158 34.1244 14.116 34.1244C10.3162 34.1244 7.23584 37.2048 7.23584 41.0046ZM14.116 46.8848C10.8685 46.8848 8.23584 44.2521 8.23584 41.0046C8.23584 37.7571 10.8685 35.1244 14.116 35.1244C17.3635 35.1244 19.9962 37.7571 19.9962 41.0046C19.9962 44.2521 17.3635 46.8848 14.116 46.8848Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.34781 36.8327C1.34784 36.8326 1.34778 36.8328 1.34781 36.8327L1.45832 36.4151L2.78595 31.3765L3.76729 27.6525C3.83766 27.3855 3.67824 27.112 3.41121 27.0416C3.14418 26.9712 2.87067 27.1306 2.80031 27.3977L1.81896 31.1217L0.380936 36.5774C-0.286037 39.1098 1.62328 41.5898 4.24304 41.5898H7.73792C7.87144 41.5898 7.99942 41.5364 8.09334 41.4415C8.18725 41.3466 8.2393 41.2181 8.23789 41.0846C8.23769 41.0652 8.23702 41.0463 8.2366 41.0341L8.23647 41.0303C8.23598 41.0161 8.23583 41.0097 8.23583 41.0051C8.23583 37.7575 10.8685 35.1249 14.116 35.1249C17.3635 35.1249 19.9961 37.7575 19.9961 41.0051C19.9961 41.0248 19.996 41.0263 19.9956 41.0287C19.9953 41.0318 19.9947 41.0365 19.994 41.0828C19.9921 41.2166 20.044 41.3456 20.1379 41.4409C20.2319 41.5362 20.3601 41.5898 20.494 41.5898H28.9827C29.1166 41.5898 29.2448 41.5362 29.3388 41.4409C29.4327 41.3456 29.4846 41.2166 29.4827 41.0828C29.4821 41.0402 29.4815 41.0338 29.4811 41.0294C29.4808 41.0258 29.4806 41.0236 29.4806 41.0051C29.4806 37.7575 32.1132 35.1249 35.3607 35.1249C38.6082 35.1249 41.2409 37.7575 41.2409 41.0051C41.2409 41.0097 41.2407 41.0161 41.2402 41.0303L41.2401 41.0341C41.2397 41.0462 41.239 41.0652 41.2388 41.0846C41.2374 41.2181 41.2894 41.3466 41.3834 41.4415C41.4773 41.5364 41.6053 41.5898 41.7388 41.5898H46.7595C48.9651 41.5898 50.7529 39.8019 50.7529 37.5955V31.2491C50.7529 29.0436 48.9651 27.2556 46.7595 27.2556H41.6271C41.2359 27.2555 40.8556 27.126 40.5458 26.8872C40.2359 26.6483 40.0138 26.3136 39.9141 25.9353L37.8427 18.0728C37.1983 15.6254 34.9851 13.9204 32.4561 13.9204H10.6442C8.11412 13.9204 5.90196 15.6254 5.25754 18.0728L3.58772 24.4094C3.51735 24.6764 3.67677 24.9499 3.9438 25.0203C4.21083 25.0907 4.48434 24.9312 4.5547 24.6642L6.22455 18.3275C6.75333 16.3193 8.56839 14.9204 10.6442 14.9204H32.4561C34.5309 14.9204 36.3469 16.3193 36.8757 18.3274L38.9471 26.1901C39.1031 26.782 39.4505 27.3056 39.9353 27.6792C40.4201 28.0528 41.0149 28.2555 41.627 28.2556H46.7595C48.4127 28.2556 49.7529 29.5959 49.7529 31.2491V37.5955C49.7529 39.2498 48.4127 40.5898 46.7595 40.5898H42.2285C42.0139 36.9834 39.0211 34.1249 35.3607 34.1249C31.7003 34.1249 28.7077 36.9834 28.493 40.5898H20.9838C20.7691 36.9834 17.7764 34.1249 14.116 34.1249C10.4556 34.1249 7.46284 36.9834 7.24815 40.5898H4.24304C2.2795 40.5898 0.848019 38.7312 1.34781 36.8327Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28.4805 41.0046C28.4805 44.8044 31.5608 47.8848 35.3606 47.8848C39.1604 47.8848 42.2408 44.8044 42.2408 41.0046C42.2408 37.2048 39.1604 34.1244 35.3606 34.1244C31.5608 34.1244 28.4805 37.2048 28.4805 41.0046ZM35.3606 46.8848C32.1131 46.8848 29.4805 44.2521 29.4805 41.0046C29.4805 37.7571 32.1131 35.1244 35.3606 35.1244C38.6082 35.1244 41.2408 37.7571 41.2408 41.0046C41.2408 44.2521 38.6082 46.8848 35.3606 46.8848Z"></path>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_transport']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content" id="facilitesTabContent">
                                <div class="tab-pane fade show active" id="Tour" role="tabpanel" aria-labelledby="Tour-tab">
                                    <div class="package-card-slider-wrap mb-60">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="swiper package-card-slider">
                                                    <div class="swiper-wrapper">
                                                        <?php
                                                        while ($query->have_posts()) :
                                                            $query->the_post(); ?>
                                                            <div class="swiper-slide">
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

                                                                                    // Check if $selected_destination is an array and count its elements
                                                                                    if (is_array($selected_destination)) {
                                                                                        $selected_destination_count = count($selected_destination);
                                                                                    }
                                                                                    ?>
                                                                                    <li>
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                                            <g clip-path="url(#clip0_1527_1322)">
                                                                                                <path d="M2.07812 4.19617e-05V14" stroke-miterlimit="10" />
                                                                                                <path d="M2.07812 1.23049C2.07812 1.23049 3.30859 2.0508 4.53906 2.0508C6.50515 2.0508 7.49482 0.41018 9.46092 0.41018C10.6914 0.41018 11.9218 1.23049 11.9218 1.23049V7.79297C11.9218 7.79297 10.6914 6.97266 9.46092 6.97266C7.49482 6.97266 6.50515 8.61328 4.53906 8.61328C3.30859 8.61328 2.07812 7.79297 2.07812 7.79297" stroke-miterlimit="10" />
                                                                                            </g>
                                                                                        </svg>
                                                                                        <?php echo esc_html__($selected_destination_count, 'triprex-core'); ?> <?php echo esc_html__('Countries', 'triprex-core'); ?>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
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
                                                                            <div class="location-area">
                                                                                <ul class="location-list">
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
                                                                            <?php
                                                                            $tour_pak_price = \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID());
                                                                            if (!empty($tour_pak_price)) { ?>
                                                                                <div class="price-area">
                                                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_before_price'))) : ?>
                                                                                        <span><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></span>
                                                                                    <?php endif; ?>
                                                                                    <h6><?php echo $tour_pak_price ?></h6>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec'])) : ?>
                                                                                <a href="<?php the_permalink(); ?>" class="explore-btn"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec']); ?>
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10">
                                                                                        <path d="M1 4.25C0.585786 4.25 0.25 4.58579 0.25 5C0.25 5.41421 0.585786 5.75 1 5.75V4.25ZM21 5L13.5 0.669873V9.33013L21 5ZM1 5.75H14.25V4.25H1V5.75Z" />
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
                                                <div class="slider-btn-grp4">
                                                    <div class="slider-btn package-card-slider-prev">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                                                            <path d="M15.9512 0.869644C13.5972 7.34699 13.5419 12.9847 15.8404 19.1322C15.9511 19.4021 15.8404 19.7319 15.6188 19.8819C15.3973 20.0618 15.0927 20.0318 14.8988 19.8219C10.1356 14.7839 5.28936 11.7252 0.470783 10.6756C0.193853 10.6157 1.79767e-06 10.3458 1.82127e-06 10.0759C1.84749e-06 9.77599 0.193853 9.50611 0.470783 9.44613C5.26167 8.36657 10.1633 5.24785 15.0096 0.179928C15.1204 0.0599765 15.2588 -1.97214e-06 15.425 -1.95762e-06C15.5358 -1.94793e-06 15.6465 0.0299873 15.7573 0.119951C15.9788 0.26989 16.0619 0.569767 15.9512 0.869644Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="slider-btn package-card-slider-next">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                                                            <path d="M0.0488516 19.1304C2.40275 12.6531 2.45814 7.01538 0.159624 0.867897C0.0488521 0.598007 0.159624 0.268143 0.381167 0.118204C0.602711 -0.0617224 0.907334 -0.0317344 1.10118 0.17818C5.86437 5.21612 10.7106 8.27486 15.5292 9.32443C15.8061 9.38441 16 9.6543 16 9.92419C16 10.2241 15.8061 10.494 15.5292 10.5539C10.7383 11.6335 5.83668 14.7522 0.990413 19.8201C0.879641 19.9401 0.741176 20.0001 0.575018 20.0001C0.464247 20.0001 0.353474 19.9701 0.242703 19.8801C0.0211589 19.7302 -0.0619202 19.4303 0.0488516 19.1304Z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 d-flex justify-content-center">
                                            <?php if (!empty($settings['triprex_destination_bottom_button_area_tours_text'])) : ?>
                                                <a href="<?php echo esc_url($settings['triprex_destination_bottom_button_area_tours_url']['url']) ?>" class="primary-btn4 two">
                                                    <span>
                                                        <?php echo esc_html($settings['triprex_destination_bottom_button_area_tours_text']); ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                            <path d="M7.70294 9.65818L7.27464 11.6673L5.29549 17.0003L6.47016 16.8046L11.9577 9.62856C12.7321 9.6016 13.4832 9.56006 14.1359 9.49563C17.1552 9.19702 16.9986 8.50013 16.9986 8.50013C16.9986 8.50013 17.1552 7.80325 14.1358 7.50464C13.4832 7.43995 12.7321 7.39845 11.9576 7.3717L6.47019 0.195477L5.29549 -5.1162e-07L7.27464 5.33303L7.70294 7.34212C6.69752 7.35717 6.01715 7.38006 6.01715 7.38006C6.01715 7.38006 4.63017 7.41207 2.48417 7.8956L0.734503 5.46859L-8.41624e-05 5.46859L0.523018 8.41949C0.428867 8.44835 0.428867 8.55195 0.523018 8.58081L-8.44274e-05 11.5317L0.734502 11.5317L2.48417 9.10495C4.63017 9.58848 6.01715 9.62001 6.01715 9.62001C6.01715 9.62001 6.69752 9.64317 7.70294 9.65818Z" />
                                                            <path d="M11.4004 11.2692L11.4004 12.0613L8.47265 12.0613L8.47265 11.2692L11.4004 11.2692ZM11.4004 4.94234L11.4004 5.73425L8.47282 5.73425L8.47282 4.94234L11.4004 4.94234ZM9.42515 13.9276L9.42515 14.7195L6.71923 14.7195L6.71923 13.9276L9.42515 13.9276ZM9.42515 2.28418L9.42515 3.07634L6.71924 3.07634L6.71924 2.28418L9.42515 2.28418Z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_hotels']) : ?>
                                    <div class="tab-pane fade" id="Hotel" role="tabpanel" aria-labelledby="Hotel-tab">
                                        <div class="package-card-slider-wrap mb-60">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="swiper hotel-card-slider">
                                                        <div class="swiper-wrapper">
                                                            <?php
                                                            while ($query2->have_posts()) :
                                                                $query2->the_post(); ?>
                                                                <div class="swiper-slide">
                                                                    <div class="room-suits-card two">
                                                                        <div class="row g-0">
                                                                            <div class="col-md-12">
                                                                                <div class="swiper hotel-img-slider">
                                                                                    <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'))) : ?>
                                                                                        <span class="batch"><?php echo Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'); ?></span>
                                                                                    <?php endif; ?>
                                                                                    <div class="swiper-wrapper">
                                                                                        <?php if (has_post_thumbnail()) : ?>
                                                                                            <div class="swiper-slide">
                                                                                                <div class="room-img">
                                                                                                    <?php the_post_thumbnail('card-thumb'); ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php endif; ?>
                                                                                        <?php foreach (Egns_Helper::egns_hotel_gallery('hotel_gallery') as $key => $data) : ?>
                                                                                            <?php if (!empty($data)) : ?>
                                                                                                <div class="swiper-slide">
                                                                                                    <div class="room-img">
                                                                                                        <img src="<?php echo wp_get_attachment_url($data) ?>" alt="<?php echo esc_attr__('hotel-img', 'triprex-core'); ?>" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; ?>
                                                                                    </div>
                                                                                    <div class="swiper-pagination5"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="room-content">
                                                                                    <div class="content-top">
                                                                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                                                        <ul class="loaction-area">
                                                                                            <li><i class="bi bi-geo-alt"></i></li>
                                                                                            <li>

                                                                                                <?php echo Egns_Helper::egns_hotel_value('hotel_location_text'); ?>
                                                                                                <?php
                                                                                                $map_link = Egns_Helper::egns_hotel_value('hotel_location_link');
                                                                                                if (!empty($map_link)) :
                                                                                                ?>
                                                                                                    <a href="<?php echo esc_url($map_link['url']) ?>"><?php echo $map_link['text'] ?></a>
                                                                                                <?php endif; ?>
                                                                                                <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_distance'))) : ?>
                                                                                                    <span><?php echo Egns_Helper::egns_hotel_value('hotel_distance'); ?></span>
                                                                                                <?php endif; ?>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <ul class="facilisis">
                                                                                            <?php
                                                                                            $highlights = (array) Egns_Helper::egns_hotel_value('hotel_highlights_repeater');
                                                                                            $counter = 0;
                                                                                            foreach ($highlights as $index => $highlight) :
                                                                                                if ($counter >= 5) {
                                                                                                    break;
                                                                                                }
                                                                                            ?>
                                                                                                <li>
                                                                                                    <?php if (!empty($highlight['hotel_highlights_media']['url'])) : ?>
                                                                                                        <img src="<?php echo esc_url($highlight['hotel_highlights_media']['url']); ?>" alt="<?php echo esc_attr__('highlight-image', 'triprex-core'); ?>" />
                                                                                                    <?php endif; ?>
                                                                                                    <?php if (!empty($highlight['hotel_highlights_title'])) : ?>
                                                                                                        <?php echo esc_html($highlight['hotel_highlights_title']); ?>
                                                                                                    <?php endif; ?>
                                                                                                </li>
                                                                                            <?php
                                                                                                $counter++;
                                                                                            endforeach;
                                                                                            ?>
                                                                                        </ul>

                                                                                    </div>
                                                                                    <div class="content-bottom">
                                                                                        <div class="room-type">
                                                                                            <?php
                                                                                            $post_id = get_the_ID();
                                                                                            $terms = get_the_terms($post_id, 'room-type');
                                                                                            if ($terms && !is_wp_error($terms)) {
                                                                                                foreach ($terms as $index => $term) {
                                                                                            ?>
                                                                                                    <?php if (!empty($term->name)) : ?>
                                                                                                        <h6><?php echo esc_html($term->name); ?></h6>
                                                                                                    <?php endif; ?>
                                                                                            <?php }
                                                                                            }; ?>
                                                                                            <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_room_info'))) : ?>
                                                                                                <span><?php echo Egns_Helper::egns_hotel_value('hotel_room_info'); ?></span>
                                                                                            <?php endif; ?>
                                                                                            <div class="deals">
                                                                                                <span><?php if (!empty(Egns_Helper::egns_hotel_value('hotel_cancellation_label'))) : ?> <strong><?php echo Egns_Helper::egns_hotel_value('hotel_cancellation_label'); ?></strong> <br><?php endif; ?>
                                                                                                    <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_cancellation_duration'))) : ?><?php echo Egns_Helper::egns_hotel_value('hotel_cancellation_duration'); ?> <?php endif; ?></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="price-and-book">
                                                                                            <div class="price-area">
                                                                                                <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_duration_person'))) : ?>
                                                                                                    <p><?php echo Egns_Helper::egns_hotel_value('hotel_duration_person'); ?></p>
                                                                                                <?php endif; ?>
                                                                                                <?php echo \Egns_Core\Egns_Helper::egns_get_hotel_pack_price() ?>
                                                                                            </div>
                                                                                            <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_hotel'])) : ?>
                                                                                                <div class="book-btn">
                                                                                                    <a href="<?php the_permalink(); ?>" class="primary-btn2"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_hotel']); ?> <i class="bi bi-arrow-right"></i></a>
                                                                                                </div>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                                    <div class="slider-btn-grp4">
                                                        <div class="slider-btn package-card-slider-prev">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                                                                <path d="M15.9512 0.869644C13.5972 7.34699 13.5419 12.9847 15.8404 19.1322C15.9511 19.4021 15.8404 19.7319 15.6188 19.8819C15.3973 20.0618 15.0927 20.0318 14.8988 19.8219C10.1356 14.7839 5.28936 11.7252 0.470783 10.6756C0.193853 10.6157 1.79767e-06 10.3458 1.82127e-06 10.0759C1.84749e-06 9.77599 0.193853 9.50611 0.470783 9.44613C5.26167 8.36657 10.1633 5.24785 15.0096 0.179928C15.1204 0.0599765 15.2588 -1.97214e-06 15.425 -1.95762e-06C15.5358 -1.94793e-06 15.6465 0.0299873 15.7573 0.119951C15.9788 0.26989 16.0619 0.569767 15.9512 0.869644Z" />
                                                            </svg>
                                                        </div>
                                                        <div class="slider-btn package-card-slider-next">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                                                                <path d="M0.0488516 19.1304C2.40275 12.6531 2.45814 7.01538 0.159624 0.867897C0.0488521 0.598007 0.159624 0.268143 0.381167 0.118204C0.602711 -0.0617224 0.907334 -0.0317344 1.10118 0.17818C5.86437 5.21612 10.7106 8.27486 15.5292 9.32443C15.8061 9.38441 16 9.6543 16 9.92419C16 10.2241 15.8061 10.494 15.5292 10.5539C10.7383 11.6335 5.83668 14.7522 0.990413 19.8201C0.879641 19.9401 0.741176 20.0001 0.575018 20.0001C0.464247 20.0001 0.353474 19.9701 0.242703 19.8801C0.0211589 19.7302 -0.0619202 19.4303 0.0488516 19.1304Z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 d-flex justify-content-center">
                                                <?php if (!empty($settings['triprex_destination_bottom_button_area_hotel_text'])) : ?>
                                                    <a href="<?php echo esc_url($settings['triprex_destination_bottom_button_area_hotel_url']['url']) ?>" class="primary-btn4 two">
                                                        <span><?php echo esc_html($settings['triprex_destination_bottom_button_area_hotel_text']); ?></span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_transports']) : ?>
                                    <div class="tab-pane fade" id="Transport" role="tabpanel" aria-labelledby="Transport-tab">
                                        <div class="package-card-slider-wrap mb-60">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="swiper package-card-slider">
                                                        <div class="swiper-wrapper">
                                                            <?php
                                                            while ($query3->have_posts()) :
                                                                $query3->the_post(); ?>
                                                                <div class="swiper-slide">
                                                                    <div class="transport-card">
                                                                        <?php if (has_post_thumbnail()) : ?>
                                                                            <a href="<?php the_permalink(); ?>" class="transport-img">
                                                                                <?php the_post_thumbnail('card-thumb'); ?>
                                                                                <?php if (!empty(Egns_Helper::egns_transport_value('transport_distance_field'))) : ?>
                                                                                    <span><?php echo Egns_Helper::egns_transport_value('transport_distance_field'); ?></span>
                                                                                <?php endif; ?>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                        <div class="transport-content">
                                                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                                            <div class="transport-type">
                                                                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_available_transport'])) : ?>
                                                                                    <h6><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_available_transport']); ?> :</h6>
                                                                                <?php endif; ?>
                                                                                <div class="row g-2">
                                                                                    <?php
                                                                                    $post_id = get_the_ID();
                                                                                    $terms = get_the_terms($post_id, 'transport-type');
                                                                                    if ($terms && !is_wp_error($terms)) {
                                                                                        foreach ($terms as $index => $term) {
                                                                                            $meta = get_term_meta($term->term_id, 'triprex-transport-type', true);
                                                                                            if ($meta['triprex_transport_type_logo'] ?? '') :
                                                                                                $logo = $meta['triprex_transport_type_logo']['url'];
                                                                                            endif;
                                                                                    ?>
                                                                                            <div class="col-3">
                                                                                                <div class="single-transport">
                                                                                                    <?php if ($logo  ?? '') : ?>
                                                                                                        <img src="<?php echo esc_url($logo) ?>" alt="<?php echo esc_attr__('transport-img', 'triprex-core'); ?>" />
                                                                                                    <?php endif; ?>
                                                                                                    <?php if (!empty($term->name)) : ?>
                                                                                                        <span><?php echo esc_html($term->name); ?></span>
                                                                                                    <?php endif; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                    <?php }
                                                                                    } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-bottom">
                                                                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_transport'])) : ?>
                                                                                    <div class="details-btn">
                                                                                        <a href="<?php the_permalink(); ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_transport']); ?></a>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                                <?php if (function_exists('run_reviewx')) : ?>
                                                                                    <div class="rating-area">
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
                                                    <div class="slider-btn-grp4">
                                                        <div class="slider-btn package-card-slider-prev">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                                                                <path d="M15.9512 0.869644C13.5972 7.34699 13.5419 12.9847 15.8404 19.1322C15.9511 19.4021 15.8404 19.7319 15.6188 19.8819C15.3973 20.0618 15.0927 20.0318 14.8988 19.8219C10.1356 14.7839 5.28936 11.7252 0.470783 10.6756C0.193853 10.6157 1.79767e-06 10.3458 1.82127e-06 10.0759C1.84749e-06 9.77599 0.193853 9.50611 0.470783 9.44613C5.26167 8.36657 10.1633 5.24785 15.0096 0.179928C15.1204 0.0599765 15.2588 -1.97214e-06 15.425 -1.95762e-06C15.5358 -1.94793e-06 15.6465 0.0299873 15.7573 0.119951C15.9788 0.26989 16.0619 0.569767 15.9512 0.869644Z" />
                                                            </svg>
                                                        </div>
                                                        <div class="slider-btn package-card-slider-next">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                                                                <path d="M0.0488516 19.1304C2.40275 12.6531 2.45814 7.01538 0.159624 0.867897C0.0488521 0.598007 0.159624 0.268143 0.381167 0.118204C0.602711 -0.0617224 0.907334 -0.0317344 1.10118 0.17818C5.86437 5.21612 10.7106 8.27486 15.5292 9.32443C15.8061 9.38441 16 9.6543 16 9.92419C16 10.2241 15.8061 10.494 15.5292 10.5539C10.7383 11.6335 5.83668 14.7522 0.990413 19.8201C0.879641 19.9401 0.741176 20.0001 0.575018 20.0001C0.464247 20.0001 0.353474 19.9701 0.242703 19.8801C0.0211589 19.7302 -0.0619202 19.4303 0.0488516 19.1304Z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 d-flex justify-content-center">
                                                <?php if (!empty($settings['triprex_destination_bottom_button_area_transport_text'])) : ?>
                                                    <a href="<?php echo esc_url($settings['triprex_destination_bottom_button_area_transport_url']['url']) ?>" class="primary-btn4 two">
                                                        <span>
                                                            <?php echo esc_html($settings['triprex_destination_bottom_button_area_transport_text']); ?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                <path d="M7.70294 9.65818L7.27464 11.6673L5.29549 17.0003L6.47016 16.8046L11.9577 9.62856C12.7321 9.6016 13.4832 9.56006 14.1359 9.49563C17.1552 9.19702 16.9986 8.50013 16.9986 8.50013C16.9986 8.50013 17.1552 7.80325 14.1358 7.50464C13.4832 7.43995 12.7321 7.39845 11.9576 7.3717L6.47019 0.195477L5.29549 -5.1162e-07L7.27464 5.33303L7.70294 7.34212C6.69752 7.35717 6.01715 7.38006 6.01715 7.38006C6.01715 7.38006 4.63017 7.41207 2.48417 7.8956L0.734503 5.46859L-8.41624e-05 5.46859L0.523018 8.41949C0.428867 8.44835 0.428867 8.55195 0.523018 8.58081L-8.44274e-05 11.5317L0.734502 11.5317L2.48417 9.10495C4.63017 9.58848 6.01715 9.62001 6.01715 9.62001C6.01715 9.62001 6.69752 9.64317 7.70294 9.65818Z" />
                                                                <path d="M11.4004 11.2692L11.4004 12.0613L8.47265 12.0613L8.47265 11.2692L11.4004 11.2692ZM11.4004 4.94234L11.4004 5.73425L8.47282 5.73425L8.47282 4.94234L11.4004 4.94234ZM9.42515 13.9276L9.42515 14.7195L6.71923 14.7195L6.71923 13.9276L9.42515 13.9276ZM9.42515 2.28418L9.42515 3.07634L6.71924 3.07634L6.71924 2.28418L9.42515 2.28418Z" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_tour_facilities_tab_content_style_selection'] == 'style_three') : ?>
            <div class="home4-tour-pack-section tour-facilites-section">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                            <div class="section-title3 text-center <?php echo 'yes' === $settings['triprex_custom_post_tab_on_off_hotels'] || 'yes' === $settings['triprex_custom_post_tab_on_off_transports'] ? 'mb-10' : ''; ?>">
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_short_description'])) : ?>
                                    <p><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_short_description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <ul class="nav nav-tabs justify-content-center" id="facilitesTab" role="tablist">
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_tour'])) : ?>
                                    <?php if ($settings['triprex_custom_post_tab_on_off_hotels'] == 'yes' || $settings['triprex_custom_post_tab_on_off_transports'] == 'yes') : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="Tour-tab" data-bs-toggle="tab" data-bs-target="#Tour" type="button" role="tab" aria-controls="Tour" aria-selected="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                                                    <g>
                                                        <path d="M5.64903 6.91357C2.53954 6.91357 0.00976562 9.44335 0.00976562 12.5528C0.00976562 14.4834 0.928148 16.5592 2.73944 18.7225C2.9952 19.0275 3.26021 19.3246 3.53411 19.6134C2.36462 19.9327 1.66244 20.5062 1.66244 21.1756C1.66244 22.3605 3.71636 23 5.64885 23C7.58139 23 9.63527 22.3605 9.63527 21.1756C9.63527 20.5067 8.93332 19.9331 7.76458 19.6137C8.2315 19.1208 8.73391 18.5408 9.21062 17.894C9.23746 17.8583 9.25696 17.8178 9.26801 17.7746C9.27906 17.7314 9.28143 17.6864 9.27499 17.6423C9.26854 17.5981 9.25341 17.5557 9.23047 17.5175C9.20753 17.4792 9.17723 17.4459 9.14132 17.4195C9.10542 17.393 9.06463 17.3739 9.02131 17.3634C8.97799 17.3528 8.933 17.3509 8.88894 17.3578C8.84489 17.3647 8.80264 17.3803 8.76465 17.4037C8.72666 17.427 8.69367 17.4577 8.6676 17.4938C8.09206 18.2749 7.46909 18.9613 6.92549 19.5065C6.86236 19.5385 6.8109 19.5896 6.77841 19.6525C6.29146 20.131 5.88168 20.486 5.64917 20.68C5.41921 20.4879 5.01568 20.1377 4.53497 19.6654C4.50093 19.5907 4.44083 19.531 4.36593 19.4974C2.83827 17.9609 0.684268 15.3062 0.684268 12.5529C0.684268 9.81539 2.91145 7.58821 5.64899 7.58821C8.38653 7.58821 10.6137 9.81539 10.6137 12.5529C10.6137 13.7484 10.2064 15.0395 9.40297 16.3902C9.38033 16.4283 9.36541 16.4705 9.35906 16.5143C9.35271 16.5581 9.35506 16.6028 9.36597 16.6457C9.37687 16.6887 9.39613 16.729 9.42264 16.7645C9.44914 16.8 9.48238 16.8299 9.52045 16.8525C9.55851 16.8752 9.60067 16.8901 9.6445 16.8965C9.68834 16.9028 9.73299 16.9005 9.77592 16.8895C9.81885 16.8786 9.85921 16.8594 9.89469 16.8329C9.93018 16.8064 9.9601 16.7731 9.98274 16.7351C10.849 15.2785 11.2883 13.8715 11.2883 12.5529C11.2883 9.44335 8.75852 6.91357 5.64903 6.91357ZM5.44262 21.3815C5.50169 21.4273 5.57431 21.4521 5.64903 21.452C5.72376 21.4521 5.79638 21.4273 5.85545 21.3815C5.89682 21.3495 6.46041 20.91 7.21164 20.1755C8.34915 20.4074 8.96081 20.8541 8.96081 21.1756C8.96081 21.4157 8.63171 21.699 8.10195 21.9148C7.4522 22.1796 6.58103 22.3255 5.6489 22.3255C3.62714 22.3255 2.33699 21.6444 2.33699 21.1756C2.33699 20.8536 2.94882 20.4072 4.08697 20.1752C4.84237 20.9141 5.40677 21.3538 5.44262 21.3815Z"></path>
                                                        <path d="M5.64915 10.1009C5.1157 10.1009 4.60844 10.2693 4.18222 10.5879C4.1106 10.6415 4.06318 10.7213 4.05039 10.8098C4.0376 10.8984 4.06049 10.9883 4.11403 11.06C4.16761 11.1316 4.24744 11.179 4.33596 11.1918C4.42448 11.2046 4.51446 11.1817 4.58612 11.1282C4.89477 10.8974 5.26237 10.7754 5.6491 10.7754C6.62916 10.7754 7.42648 11.5727 7.42648 12.5528C7.42648 13.5329 6.62916 14.3302 5.6491 14.3302C4.66904 14.3302 3.87172 13.5329 3.87172 12.5528C3.87172 12.3856 3.89486 12.2202 3.94045 12.0615C3.96513 11.9755 3.95465 11.8833 3.91132 11.805C3.86799 11.7268 3.79534 11.6689 3.70938 11.6442C3.6234 11.6196 3.53117 11.6301 3.45294 11.6735C3.37471 11.7168 3.31687 11.7894 3.29214 11.8754C3.22906 12.0957 3.19713 12.3237 3.19727 12.5528C3.19727 13.9048 4.29718 15.0048 5.64919 15.0048C7.00116 15.0048 8.10112 13.9048 8.10112 12.5528C8.10107 11.2008 7.00112 10.1009 5.64915 10.1009ZM20.3471 9.7984C20.5276 9.60501 20.7029 9.40685 20.8728 9.20413C22.2769 7.52706 22.9889 5.91486 22.9889 4.41218C22.9889 1.97935 21.0096 0 18.5767 0C16.7995 0 15.2037 1.05773 14.5114 2.69468C14.4942 2.73547 14.4851 2.77926 14.4848 2.82354C14.4844 2.86783 14.4928 2.91175 14.5095 2.95279C14.5261 2.99383 14.5507 3.0312 14.5818 3.06275C14.6128 3.0943 14.6498 3.11942 14.6906 3.13667C14.773 3.1715 14.8658 3.17218 14.9487 3.13858C15.0316 3.10498 15.0977 3.03984 15.1326 2.95748C15.7192 1.57065 17.0711 0.674502 18.5767 0.674502C20.6377 0.674502 22.3144 2.35126 22.3144 4.41223C22.3144 7.19931 19.3883 9.86952 18.5766 10.5564C18.3977 10.4053 18.1161 10.1578 17.786 9.83421C17.7533 9.76971 17.7007 9.71745 17.636 9.68516C16.4715 8.51265 14.839 6.49714 14.839 4.41223C14.839 4.32278 14.8035 4.23699 14.7403 4.17374C14.677 4.11049 14.5912 4.07495 14.5018 4.07495C14.4123 4.07495 14.3265 4.11049 14.2633 4.17374C14.2 4.23699 14.1645 4.32278 14.1645 4.41223C14.1645 5.91486 14.8765 7.52706 16.2807 9.20418C16.4505 9.40677 16.6257 9.60484 16.806 9.79818C15.9366 10.0594 15.4347 10.504 15.4347 11.0395C15.4347 11.491 15.801 11.889 16.4662 12.16C17.0354 12.3919 17.7849 12.5197 18.5767 12.5197C19.3684 12.5197 20.1179 12.3919 20.6871 12.16C21.3522 11.8889 21.7185 11.491 21.7185 11.0394C21.7185 10.505 21.2162 10.0599 20.3471 9.7984ZM18.5766 11.8451C16.9802 11.8451 16.1093 11.3129 16.1093 11.0394C16.1093 10.8612 16.5054 10.5352 17.3514 10.3553C17.9206 10.9091 18.3431 11.2382 18.3703 11.2594C18.4294 11.3052 18.502 11.33 18.5768 11.3299C18.6515 11.33 18.7241 11.3052 18.7832 11.2594C18.8104 11.2383 19.2328 10.9092 19.8021 10.3554C20.1789 10.4358 20.5054 10.5535 20.7339 10.6926C20.9281 10.8109 21.0441 10.9405 21.0441 11.0394C21.044 11.3129 20.1731 11.8451 18.5766 11.8451Z"></path>
                                                        <path d="M18.576 2.44968C17.4939 2.44968 16.6135 3.33006 16.6135 4.41227C16.6135 5.49439 17.4939 6.37477 18.576 6.37477C19.6582 6.37477 20.5386 5.49444 20.5386 4.41227C20.5386 3.3301 19.6582 2.44968 18.576 2.44968ZM18.5761 5.70022C17.8658 5.70022 17.288 5.12244 17.288 4.41222C17.288 3.70201 17.8658 3.12418 18.5761 3.12418C19.2863 3.12418 19.8641 3.70196 19.8641 4.41222C19.8641 5.12244 19.2863 5.70022 18.5761 5.70022ZM14.2011 10.7021H14.0471C13.935 10.7021 13.8223 10.7096 13.7121 10.7242C13.6241 10.7369 13.5446 10.7837 13.491 10.8545C13.4374 10.9254 13.4138 11.0145 13.4256 11.1026C13.4373 11.1907 13.4833 11.2706 13.5536 11.325C13.6239 11.3794 13.7128 11.4038 13.8011 11.3929C13.8826 11.3822 13.9648 11.3768 14.0471 11.3768H14.2011V11.3767C14.3874 11.3767 14.5384 11.2258 14.5384 11.0395C14.5384 10.8531 14.3874 10.7021 14.2011 10.7021ZM13.0861 20.8211H13.0845L12.6391 20.8231C12.5496 20.8233 12.4639 20.859 12.4008 20.9224C12.3377 20.9858 12.3023 21.0717 12.3025 21.1611C12.3027 21.2506 12.3384 21.3363 12.4018 21.3994C12.4652 21.4625 12.5511 21.4979 12.6405 21.4977H12.6421L13.0876 21.4957C13.177 21.4952 13.2626 21.4593 13.3256 21.3958C13.3885 21.3322 13.4237 21.2463 13.4233 21.1569C13.4229 21.0677 13.3872 20.9823 13.324 20.9193C13.2608 20.8564 13.1753 20.8211 13.0861 20.8211ZM14.6013 15.0708H14.1558C14.0664 15.0708 13.9806 15.1063 13.9174 15.1696C13.8541 15.2328 13.8186 15.3186 13.8186 15.4081C13.8186 15.4975 13.8541 15.5833 13.9174 15.6466C13.9806 15.7098 14.0664 15.7453 14.1558 15.7453H14.6013C14.6456 15.7453 14.6894 15.7366 14.7304 15.7197C14.7713 15.7027 14.8085 15.6779 14.8398 15.6466C14.8711 15.6152 14.896 15.5781 14.9129 15.5371C14.9299 15.4962 14.9386 15.4524 14.9386 15.4081C14.9386 15.3638 14.9299 15.3199 14.9129 15.279C14.896 15.2381 14.8711 15.2009 14.8398 15.1696C14.8085 15.1382 14.7713 15.1134 14.7304 15.0965C14.6894 15.0795 14.6456 15.0708 14.6013 15.0708ZM12.8142 11.3893C12.7535 11.3236 12.6693 11.2846 12.5799 11.281C12.4905 11.2774 12.4034 11.3095 12.3376 11.3701C12.2116 11.4863 12.0977 11.615 11.9977 11.7543C11.9477 11.827 11.9282 11.9164 11.9434 12.0034C11.9586 12.0903 12.0072 12.1679 12.0789 12.2194C12.1506 12.2709 12.2396 12.2922 12.3269 12.2788C12.4141 12.2654 12.4927 12.2184 12.5456 12.1478C12.619 12.0456 12.7026 11.9512 12.795 11.8659C12.8607 11.8052 12.8997 11.721 12.9033 11.6316C12.9069 11.5422 12.8749 11.4551 12.8142 11.3893ZM14.8679 20.8129H14.8664L14.421 20.815C14.3325 20.8166 14.2482 20.8529 14.1862 20.9162C14.1243 20.9794 14.0897 21.0644 14.0899 21.153C14.09 21.2415 14.125 21.3264 14.1873 21.3893C14.2495 21.4523 14.3339 21.4883 14.4225 21.4895H14.424L14.8694 21.4875C14.9579 21.4858 15.0423 21.4495 15.1042 21.3863C15.1661 21.323 15.2007 21.238 15.2006 21.1495C15.2004 21.061 15.1654 20.9761 15.1032 20.9131C15.0409 20.8501 14.9565 20.8142 14.8679 20.8129ZM11.3043 20.8291H11.3027L10.8572 20.8312C10.7678 20.8316 10.6822 20.8675 10.6192 20.9311C10.5563 20.9946 10.5211 21.0805 10.5215 21.17C10.5219 21.2591 10.5576 21.3445 10.6208 21.4075C10.684 21.4704 10.7695 21.5057 10.8587 21.5057H10.8603L11.3057 21.5037C11.3952 21.5033 11.4808 21.4673 11.5437 21.4038C11.6067 21.3403 11.6419 21.2543 11.6415 21.1649C11.6411 21.0757 11.6054 20.9903 11.5422 20.9274C11.479 20.8645 11.3934 20.8291 11.3043 20.8291ZM13.0633 14.7873C12.957 14.7202 12.8578 14.6425 12.7671 14.5554C12.7027 14.4934 12.6162 14.4595 12.5268 14.4613C12.4373 14.463 12.3523 14.5002 12.2902 14.5646C12.2595 14.5965 12.2354 14.6342 12.2193 14.6754C12.2031 14.7167 12.1952 14.7607 12.1961 14.805C12.197 14.8492 12.2065 14.8929 12.2243 14.9335C12.242 14.9741 12.2676 15.0108 12.2995 15.0415C12.4231 15.1603 12.5584 15.2663 12.7034 15.3578C12.7408 15.3815 12.7826 15.3975 12.8263 15.405C12.8699 15.4126 12.9146 15.4114 12.9579 15.4016C13.0011 15.3918 13.0419 15.3736 13.0781 15.348C13.1143 15.3224 13.145 15.29 13.1686 15.2525C13.1923 15.215 13.2083 15.1732 13.2158 15.1296C13.2233 15.0859 13.2221 15.0412 13.2123 14.9981C13.2025 14.9549 13.1843 14.914 13.1588 14.8778C13.1332 14.8417 13.1008 14.8109 13.0633 14.7873ZM12.2342 13.5793C12.2115 13.4622 12.2001 13.3431 12.2001 13.2238L12.2002 13.2051C12.2007 13.1608 12.1925 13.1168 12.176 13.0757C12.1595 13.0346 12.1351 12.9971 12.1042 12.9654C12.0732 12.9338 12.0363 12.9085 11.9956 12.8911C11.9549 12.8736 11.9111 12.8644 11.8669 12.8639L11.8629 12.8639C11.7741 12.8639 11.6889 12.8989 11.6258 12.9613C11.5627 13.0237 11.5267 13.1085 11.5257 13.1972L11.5255 13.2238C11.5255 13.3867 11.5412 13.5497 11.5721 13.7084C11.5806 13.7518 11.5975 13.7932 11.622 13.8301C11.6465 13.8671 11.678 13.8988 11.7147 13.9235C11.7514 13.9483 11.7927 13.9656 11.8361 13.9744C11.8795 13.9832 11.9242 13.9834 11.9677 13.9749C12.0112 13.9664 12.0526 13.9494 12.0895 13.925C12.1264 13.9005 12.1581 13.869 12.1829 13.8323C12.2076 13.7956 12.2249 13.7543 12.2337 13.7109C12.2425 13.6675 12.2427 13.6228 12.2342 13.5793ZM16.3832 15.0708H15.9378C15.8483 15.0708 15.7625 15.1063 15.6993 15.1696C15.636 15.2328 15.6005 15.3186 15.6005 15.4081C15.6005 15.4975 15.636 15.5833 15.6993 15.6466C15.7625 15.7098 15.8483 15.7453 15.9378 15.7453H16.3832C16.4727 15.7453 16.5584 15.7098 16.6217 15.6466C16.6849 15.5833 16.7205 15.4975 16.7205 15.4081C16.7205 15.3186 16.6849 15.2328 16.6217 15.1696C16.5584 15.1063 16.4727 15.0708 16.3832 15.0708ZM21.7981 15.7575C21.6679 15.6547 21.5298 15.5621 21.3852 15.4807C21.2231 15.3892 21.0173 15.4467 20.9258 15.609C20.9041 15.6475 20.8902 15.69 20.8849 15.734C20.8795 15.778 20.8829 15.8226 20.8948 15.8652C20.9068 15.9079 20.927 15.9478 20.9543 15.9826C20.9816 16.0175 21.0156 16.0466 21.0541 16.0683C21.1682 16.1327 21.2772 16.2058 21.38 16.2869C21.4395 16.334 21.513 16.3596 21.5888 16.3595C21.659 16.3596 21.7273 16.3378 21.7845 16.2972C21.8417 16.2566 21.8848 16.1992 21.9078 16.133C21.9308 16.0668 21.9326 15.995 21.913 15.9277C21.8933 15.8604 21.8532 15.8009 21.7981 15.7575ZM20.5462 21.0546C20.5206 20.8701 20.3501 20.741 20.1659 20.7667C20.0555 20.7819 19.9424 20.79 19.8296 20.7904L19.7665 20.7907C19.6783 20.793 19.5946 20.8296 19.5332 20.8928C19.4717 20.9559 19.4374 21.0406 19.4376 21.1288C19.4378 21.2169 19.4725 21.3015 19.5343 21.3644C19.596 21.4272 19.6799 21.4635 19.768 21.4653H19.7697L19.8327 21.465C19.975 21.4644 20.1172 21.4543 20.2583 21.4349C20.3021 21.4288 20.3444 21.4142 20.3826 21.3918C20.4208 21.3694 20.4543 21.3397 20.481 21.3044C20.5077 21.2691 20.5273 21.2288 20.5384 21.186C20.5496 21.1431 20.5523 21.0985 20.5462 21.0546ZM22.0347 20.1062C22.0042 20.0741 21.9676 20.0483 21.9271 20.0304C21.8866 20.0125 21.843 20.0027 21.7987 20.0016C21.7544 20.0005 21.7104 20.0082 21.669 20.0241C21.6277 20.0401 21.59 20.064 21.5579 20.0946C21.4629 20.185 21.3611 20.2679 21.2534 20.3427C21.1799 20.3937 21.1297 20.4718 21.1137 20.5598C21.0978 20.6478 21.1174 20.7385 21.1684 20.8121C21.1994 20.8569 21.2409 20.8936 21.2892 20.9188C21.3376 20.9441 21.3913 20.9573 21.4459 20.9572C21.5144 20.9572 21.5814 20.9363 21.6377 20.8971C21.7741 20.8025 21.9029 20.6975 22.0231 20.583C22.0552 20.5525 22.081 20.5159 22.0989 20.4754C22.1168 20.4349 22.1266 20.3913 22.1277 20.347C22.1288 20.3027 22.1211 20.2587 22.1051 20.2173C22.0892 20.176 22.0652 20.1382 22.0347 20.1062ZM22.6911 18.4682C22.6032 18.4517 22.5123 18.4707 22.4385 18.5212C22.3646 18.5716 22.3138 18.6493 22.2973 18.7372C22.273 18.8658 22.2387 18.9924 22.1948 19.1158C22.1659 19.1998 22.1713 19.2918 22.2098 19.3718C22.2483 19.4518 22.3169 19.5135 22.4005 19.5433C22.4842 19.5731 22.5762 19.5687 22.6567 19.5311C22.7371 19.4935 22.7995 19.4256 22.8303 19.3423C22.886 19.1858 22.9294 19.0253 22.9602 18.862C22.9767 18.7741 22.9577 18.6832 22.9072 18.6094C22.8567 18.5355 22.779 18.4847 22.6911 18.4682ZM22.8914 17.384C22.8455 17.2242 22.7872 17.0683 22.7169 16.9176C22.6782 16.8379 22.6097 16.7766 22.5263 16.747C22.4428 16.7173 22.3511 16.7217 22.2708 16.7592C22.1905 16.7966 22.1282 16.8641 22.0973 16.9471C22.0664 17.0301 22.0694 17.122 22.1056 17.2028C22.1609 17.3214 22.2069 17.4443 22.2431 17.5701C22.2633 17.6405 22.3058 17.7024 22.3643 17.7464C22.4227 17.7905 22.4939 17.8144 22.5671 17.8144C22.6194 17.8144 22.6709 17.8023 22.7177 17.779C22.7644 17.7557 22.8051 17.7218 22.8366 17.6801C22.868 17.6384 22.8894 17.5899 22.8989 17.5385C22.9084 17.4872 22.9059 17.4343 22.8914 17.384ZM18.1651 15.0708H17.7196C17.6302 15.0708 17.5444 15.1063 17.4811 15.1696C17.4179 15.2328 17.3824 15.3186 17.3824 15.4081C17.3824 15.4975 17.4179 15.5833 17.4811 15.6466C17.5444 15.7098 17.6302 15.7453 17.7196 15.7453H18.1651C18.2545 15.7453 18.3403 15.7098 18.4036 15.6466C18.4668 15.5833 18.5024 15.4975 18.5024 15.4081C18.5024 15.3186 18.4668 15.2328 18.4036 15.1696C18.3403 15.1063 18.2545 15.0708 18.1651 15.0708ZM16.6498 20.8048H16.6482L16.2028 20.8069C16.1143 20.8085 16.03 20.8448 15.968 20.9081C15.9061 20.9713 15.8715 21.0564 15.8717 21.1449C15.8719 21.2334 15.9069 21.3183 15.9691 21.3812C16.0313 21.4442 16.1158 21.4802 16.2043 21.4814H16.2059L16.6513 21.4794C16.7408 21.4792 16.8265 21.4435 16.8896 21.3801C16.9527 21.3167 16.988 21.2308 16.9878 21.1414C16.9876 21.0519 16.9519 20.9662 16.8885 20.9031C16.8251 20.84 16.7393 20.8046 16.6498 20.8048ZM19.9618 15.074C19.9139 15.0719 19.8661 15.0708 19.8182 15.0708H19.5015C19.412 15.0708 19.3262 15.1064 19.263 15.1696C19.1997 15.2329 19.1642 15.3187 19.1642 15.4081C19.1642 15.4976 19.1997 15.5833 19.263 15.6466C19.3262 15.7098 19.412 15.7454 19.5015 15.7454H19.8182V15.7453C19.8563 15.7453 19.8943 15.7462 19.9319 15.7479C19.9762 15.7498 20.0204 15.7431 20.062 15.7279C20.1036 15.7128 20.1419 15.6897 20.1746 15.6598C20.2072 15.6299 20.2337 15.5938 20.2524 15.5537C20.2712 15.5136 20.2818 15.4701 20.2838 15.4259C20.2857 15.3817 20.279 15.3374 20.2639 15.2958C20.2487 15.2542 20.2256 15.2159 20.1957 15.1833C20.1658 15.1506 20.1297 15.1241 20.0896 15.1054C20.0495 15.0866 20.006 15.076 19.9618 15.074ZM18.4316 20.7968H18.4301L17.9846 20.7988C17.8961 20.8004 17.8118 20.8368 17.7499 20.9C17.6879 20.9633 17.6533 21.0483 17.6535 21.1368C17.6537 21.2253 17.6887 21.3102 17.7509 21.3732C17.8131 21.4362 17.8976 21.4721 17.9861 21.4734H17.9877L18.4331 21.4713C18.5226 21.4709 18.6082 21.435 18.6711 21.3715C18.7341 21.3079 18.7693 21.222 18.7689 21.1325C18.7685 21.0434 18.7328 20.958 18.6696 20.895C18.6064 20.8321 18.5208 20.7968 18.4316 20.7968Z"></path>
                                                    </g>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_tour']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_hotel'])) : ?>
                                    <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_hotels']) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="Hotel-tab" data-bs-toggle="tab" data-bs-target="#Hotel" type="button" role="tab" aria-controls="Hotel" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                                                    <g>
                                                        <path d="M19.5496 12.2665H16.0038C15.9021 12.2665 15.8046 12.3069 15.7327 12.3788C15.6608 12.4506 15.6204 12.5481 15.6204 12.6498V22.2333H13.6079V18.2562C13.6079 18.1545 13.5675 18.057 13.4956 17.9851C13.4237 17.9132 13.3262 17.8728 13.2245 17.8728H9.77448C9.67281 17.8728 9.57531 17.9132 9.50342 17.9851C9.43153 18.057 9.39114 18.1545 9.39114 18.2562V22.2333H7.37861V8.33724C7.37861 7.91452 7.72256 7.57056 8.14529 7.57056H14.8537C15.2765 7.57056 15.6204 7.91452 15.6204 8.33724V10.4696C15.6204 10.5712 15.6608 10.6687 15.7327 10.7406C15.8046 10.8125 15.9021 10.8529 16.0038 10.8529C16.1054 10.8529 16.2029 10.8125 16.2748 10.7406C16.3467 10.6687 16.3871 10.5712 16.3871 10.4696V8.33724C16.3871 7.49174 15.6992 6.80389 14.8537 6.80389H8.14529C7.29978 6.80389 6.61193 7.49174 6.61193 8.33724V22.2333H3.44937C3.02665 22.2333 2.6827 21.8894 2.6827 21.4666V13.7998C2.6827 13.3771 3.02665 13.0332 3.44937 13.0332H4.79106C4.89273 13.0332 4.99024 12.9928 5.06213 12.9209C5.13402 12.849 5.1744 12.7515 5.1744 12.6498C5.1744 12.5481 5.13402 12.4506 5.06213 12.3788C4.99024 12.3069 4.89273 12.2665 4.79106 12.2665H3.44937C2.60387 12.2665 1.91602 12.9543 1.91602 13.7998V21.4666C1.91602 22.3121 2.60387 23 3.44937 23H16.0038C16.1054 23 16.2029 22.9596 16.2748 22.8877C16.3467 22.8158 16.3871 22.7183 16.3871 22.6166V13.0332H19.5496C19.9724 13.0332 20.3163 13.3771 20.3163 13.7998V21.4666C20.3163 21.8894 19.9724 22.2333 19.5496 22.2333H17.9205C17.8188 22.2333 17.7213 22.2737 17.6494 22.3456C17.5775 22.4175 17.5371 22.515 17.5371 22.6166C17.5371 22.7183 17.5775 22.8158 17.6494 22.8877C17.7213 22.9596 17.8188 23 17.9205 23H19.5496C20.3951 23 21.083 22.3121 21.083 21.4666V13.7998C21.083 12.9543 20.3951 12.2665 19.5496 12.2665ZM10.1578 18.6395H12.8412V22.2333H10.1578V18.6395ZM9.91047 3.38493L9.66638 4.81306C9.61295 5.12577 9.94233 5.36473 10.2231 5.21667L11.4995 4.54323L12.7759 5.21667C13.0564 5.36473 13.3861 5.12591 13.3326 4.81306L13.0885 3.38493L14.1222 2.37377C14.3485 2.15239 14.2231 1.76613 13.9095 1.72042L12.4821 1.51226L11.8435 0.213796C11.7034 -0.0712652 11.2957 -0.0712652 11.1556 0.213796L10.517 1.51226L9.0896 1.72042C8.77631 1.76603 8.65029 2.15215 8.87684 2.37377L9.91047 3.38493ZM10.8272 2.24181C10.8888 2.23283 10.9472 2.209 10.9975 2.17239C11.0478 2.13577 11.0884 2.08747 11.1159 2.03164L11.4995 1.25159L11.8831 2.03164C11.9106 2.08746 11.9512 2.13577 12.0015 2.17238C12.0518 2.209 12.1102 2.23283 12.1718 2.24181L13.0324 2.36735L12.4087 2.97739C12.3644 3.02074 12.3313 3.07419 12.3122 3.13316C12.293 3.19213 12.2885 3.25486 12.2989 3.31597L12.4458 4.17571C11.6045 3.73185 11.6245 3.72648 11.4995 3.72648C11.3729 3.72648 11.3843 3.73717 10.5531 4.17571L10.7 3.31597C10.7105 3.25486 10.7059 3.19213 10.6868 3.13316C10.6677 3.07418 10.6345 3.02073 10.5902 2.97739L9.96653 2.36735L10.8272 2.24181ZM5.66953 3.49173C5.75655 3.22397 6.00088 3.22766 6.24406 3.1923C6.35365 2.9702 6.42462 2.73842 6.70633 2.73842C6.98784 2.73842 7.05986 2.97193 7.16863 3.1923L7.43371 3.23082C7.74748 3.27644 7.87335 3.66323 7.64618 3.8847L7.45436 4.07168C7.4962 4.31577 7.57507 4.54506 7.34713 4.71061C7.11937 4.87612 6.92387 4.72949 6.70633 4.61511C6.48715 4.73035 6.29347 4.87621 6.06552 4.71061C5.83772 4.54515 5.91674 4.3139 5.95829 4.07168C5.78113 3.89889 5.58247 3.75964 5.66953 3.49173ZM2.31531 5.40843C2.40233 5.14067 2.64666 5.14436 2.88984 5.109L3.00839 4.86879C3.14874 4.58449 3.55546 4.58425 3.69591 4.86879L3.81446 5.109C4.05951 5.1446 4.30192 5.14048 4.38899 5.40843C4.47601 5.6762 4.27614 5.81683 4.10019 5.98838L4.14547 6.2524C4.18577 6.48729 4.00426 6.70053 3.76759 6.70053C3.64943 6.70053 3.60271 6.66358 3.3522 6.53181L3.11515 6.65649C2.8345 6.80398 2.5053 6.56516 2.55892 6.2524L2.60421 5.98838C2.42691 5.81559 2.22825 5.67634 2.31531 5.40843ZM15.2559 3.49173C15.3429 3.22397 15.5872 3.22766 15.8304 3.1923L15.9489 2.95209C16.0893 2.66775 16.496 2.6676 16.6365 2.95209L16.755 3.1923C17 3.2279 17.2425 3.22378 17.3295 3.49173C17.4165 3.7595 17.2167 3.90013 17.0407 4.07168L17.086 4.3357C17.1263 4.5706 16.9448 4.78383 16.7081 4.78383C16.59 4.78383 16.5433 4.74688 16.2927 4.61511L16.0557 4.73979C15.775 4.88728 15.4458 4.64846 15.4995 4.3357L15.5447 4.07168C15.3674 3.89889 15.1688 3.75964 15.2559 3.49173ZM18.6101 5.40843C18.6971 5.14067 18.9414 5.14436 19.1846 5.109L19.3032 4.86879C19.4435 4.58444 19.8502 4.5843 19.9907 4.86879L20.1092 5.109C20.3542 5.1446 20.5967 5.14048 20.6838 5.40843C20.7708 5.6762 20.5709 5.81683 20.395 5.98838L20.4402 6.2524C20.4805 6.48729 20.299 6.70053 20.0624 6.70053C19.9442 6.70053 19.8975 6.66358 19.647 6.53181L19.4099 6.65649C19.1293 6.80398 18.8001 6.56516 18.8537 6.2524L18.899 5.98838C18.7216 5.81559 18.523 5.67634 18.6101 5.40843ZM4.64731 15.7165C4.74898 15.7165 4.84648 15.7569 4.91837 15.8288C4.99026 15.9007 5.03065 15.9982 5.03065 16.0999V17.7291C5.03065 17.8307 4.99026 17.9282 4.91837 18.0001C4.84648 18.072 4.74898 18.1124 4.64731 18.1124C4.54564 18.1124 4.44814 18.072 4.37625 18.0001C4.30436 17.9282 4.26397 17.8307 4.26397 17.7291V16.0999C4.26397 15.9982 4.30436 15.9007 4.37625 15.8288C4.44814 15.7569 4.54564 15.7165 4.64731 15.7165ZM18.3517 18.1124C18.25 18.1124 18.1525 18.072 18.0806 18.0001C18.0088 17.9282 17.9684 17.8307 17.9684 17.7291V16.0999C17.9684 15.9982 18.0088 15.9007 18.0806 15.8288C18.1525 15.7569 18.25 15.7165 18.3517 15.7165C18.4534 15.7165 18.5509 15.7569 18.6228 15.8288C18.6947 15.9007 18.735 15.9982 18.735 16.0999V17.7291C18.735 17.8307 18.6947 17.9282 18.6228 18.0001C18.5509 18.072 18.4534 18.1124 18.3517 18.1124ZM13.7037 11.4519H9.29531C9.19364 11.4519 9.09613 11.4115 9.02424 11.3396C8.95235 11.2677 8.91197 11.1702 8.91197 11.0685C8.91197 10.9669 8.95235 10.8694 9.02424 10.7975C9.09613 10.7256 9.19364 10.6852 9.29531 10.6852H13.7037C13.8054 10.6852 13.9029 10.7256 13.9748 10.7975C14.0467 10.8694 14.0871 10.9669 14.0871 11.0685C14.0871 11.1702 14.0467 11.2677 13.9748 11.3396C13.9029 11.4115 13.8054 11.4519 13.7037 11.4519ZM13.0329 14.3748C13.1345 14.3748 13.232 14.4152 13.3039 14.4871C13.3758 14.559 13.4162 14.6565 13.4162 14.7582C13.4162 14.8599 13.3758 14.9574 13.3039 15.0292C13.232 15.1011 13.1345 15.1415 13.0329 15.1415H9.96615C9.86448 15.1415 9.76698 15.1011 9.69509 15.0292C9.6232 14.9574 9.58281 14.8599 9.58281 14.7582C9.58281 14.6565 9.6232 14.559 9.69509 14.4871C9.76698 14.4152 9.86448 14.3748 9.96615 14.3748H13.0329Z"></path>
                                                    </g>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_hotel']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_transport'])) : ?>
                                    <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_transports']) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="Transport-tab" data-bs-toggle="tab" data-bs-target="#Transport" type="button" role="tab" aria-controls="Transport" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 51 51">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M45.8564 34.4958C45.8564 35.7619 46.8834 36.7871 48.1488 36.7871H50.2528C50.5289 36.7871 50.7528 36.5633 50.7528 36.2871V31.249C50.7528 30.9728 50.5289 30.749 50.2528 30.749H48.1488C46.883 30.749 45.8564 31.7757 45.8564 33.0413V34.4958ZM48.1488 35.7871C47.435 35.7871 46.8564 35.2088 46.8564 34.4958V33.0413C46.8564 32.328 47.4354 31.749 48.1488 31.749H49.7528V35.7871H48.1488Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.578816 36.5923C0.673478 36.7152 0.819779 36.7871 0.974858 36.7871H3.80037C5.06692 36.7871 6.09273 35.7617 6.09273 34.4958V33.0413C6.09273 31.7758 5.0673 30.749 3.80037 30.749H2.30235C2.07527 30.749 1.87671 30.902 1.81885 31.1216L0.49136 36.1597C0.451847 36.3097 0.484154 36.4695 0.578816 36.5923ZM1.62367 35.7871L2.68767 31.749H3.80037C4.51466 31.749 5.09273 32.3277 5.09273 33.0413V34.4958C5.09273 35.209 4.51504 35.7871 3.80037 35.7871H1.62367Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.26435 27.315C8.26436 27.3149 8.26435 27.315 8.26435 27.315L10.3466 19.4132C10.3639 19.3473 10.4026 19.2887 10.4565 19.247C10.5105 19.2054 10.5767 19.1828 10.6448 19.1827H18.1558C18.6207 19.1827 18.9975 19.5595 18.9975 20.0243V27.5296C18.9975 27.9943 18.6207 28.3711 18.1558 28.3711H9.07815C8.52629 28.3711 8.12377 27.8488 8.26435 27.315ZM7.29734 27.0602C6.98972 28.2281 7.87034 29.3711 9.07815 29.3711H18.1558C19.1729 29.3711 19.9975 28.5466 19.9975 27.5296V20.0243C19.9975 19.0073 19.173 18.1827 18.1558 18.1827H10.6442C10.3553 18.183 10.0741 18.2789 9.84539 18.4555C9.61672 18.6321 9.4529 18.8793 9.37949 19.1587L7.29734 27.0602Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.2215 28.3711C24.7567 28.3711 24.3799 27.9943 24.3799 27.5295V20.0243C24.3799 19.5596 24.7566 19.1828 25.2215 19.1828H32.4557C32.5237 19.1828 32.5898 19.2054 32.6436 19.2469C32.6974 19.2884 32.736 19.3466 32.7533 19.4123L33.3161 21.5481C33.3864 21.8151 33.6599 21.9746 33.9269 21.9042C34.194 21.8339 34.3534 21.5604 34.2831 21.2933L33.7204 19.1577C33.6469 18.8785 33.483 18.6314 33.2543 18.455C33.0257 18.2787 32.7451 18.1829 32.4563 18.1828H25.2215C24.2044 18.1828 23.3799 19.0073 23.3799 20.0243V27.5295C23.3799 28.5466 24.2044 29.3711 25.2215 29.3711H34.0221C35.2493 29.3711 36.1076 28.2048 35.7966 27.0381L35.792 27.0209L35.7916 27.0191L35.0628 24.2527C34.9924 23.9857 34.719 23.8263 34.4519 23.8966C34.1849 23.967 34.0254 24.2405 34.0958 24.5075L34.825 27.2756L34.8255 27.2774L34.8304 27.2957C34.9772 27.8466 34.5727 28.3711 34.0221 28.3711H25.2215Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0698 41.0047C11.0698 42.687 12.4336 44.0508 14.1159 44.0508C15.7983 44.0508 17.162 42.687 17.162 41.0047C17.162 39.3224 15.7983 37.9586 14.1159 37.9586C12.4336 37.9586 11.0698 39.3224 11.0698 41.0047ZM14.1159 43.0508C12.9859 43.0508 12.0698 42.1347 12.0698 41.0047C12.0698 39.8746 12.9859 38.9586 14.1159 38.9586C15.246 38.9586 16.162 39.8746 16.162 41.0047C16.162 42.1347 15.246 43.0508 14.1159 43.0508Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M32.3147 41.0047C32.3147 42.687 33.6785 44.0508 35.3608 44.0508C37.0431 44.0508 38.4069 42.687 38.4069 41.0047C38.4069 39.3224 37.0431 37.9586 35.3608 37.9586C33.6785 37.9586 32.3147 39.3224 32.3147 41.0047ZM35.3608 43.0508C34.2308 43.0508 33.3147 42.1347 33.3147 41.0047C33.3147 39.8746 34.2308 38.9586 35.3608 38.9586C36.4908 38.9586 37.4069 39.8746 37.4069 41.0047C37.4069 42.1347 36.4908 43.0508 35.3608 43.0508Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.52888 13.9199C6.44663 13.9199 5.56934 13.0427 5.56934 11.9605V8.40513C5.56934 7.32301 6.44664 6.44568 7.52888 6.44568H12.0994V13.9199H7.52888ZM4.56934 11.9605C4.56934 13.595 5.8944 14.9199 7.52888 14.9199H12.5994C12.8755 14.9199 13.0994 14.6961 13.0994 14.4199V5.94568C13.0994 5.66954 12.8755 5.44568 12.5994 5.44568H7.52888C5.89439 5.44568 4.56934 6.7707 4.56934 8.40513V11.9605Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0996 14.4199C12.0996 14.6961 12.3235 14.9199 12.5996 14.9199H17.2592C17.5354 14.9199 17.7592 14.6961 17.7592 14.4199V5.94568C17.7592 4.38279 16.4923 3.11582 14.9294 3.11582C13.3666 3.11582 12.0996 4.3828 12.0996 5.94568V14.4199ZM13.0996 13.9199V5.94568C13.0996 4.93506 13.9189 4.11582 14.9294 4.11582C15.94 4.11582 16.7592 4.93507 16.7592 5.94568V13.9199H13.0996Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.759 14.4199C16.759 14.6961 16.9829 14.9199 17.259 14.9199H25.1014C25.3775 14.9199 25.6014 14.6961 25.6014 14.4199V5.94568C25.6014 5.66954 25.3775 5.44568 25.1014 5.44568H17.259C16.9829 5.44568 16.759 5.66954 16.759 5.94568V14.4199ZM17.759 13.9199V6.44568H24.6014V13.9199H17.759Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.6016 14.4199C24.6016 14.6961 24.8254 14.9199 25.1016 14.9199H29.7612C30.0373 14.9199 30.2612 14.6961 30.2612 14.4199V5.94568C30.2612 4.38279 28.9942 3.11582 27.4313 3.11582C25.8684 3.11582 24.6016 4.38282 24.6016 5.94568V14.4199ZM25.6016 13.9199V5.94568C25.6016 4.93504 26.4207 4.11582 27.4313 4.11582C28.4419 4.11582 29.2612 4.93507 29.2612 5.94568V13.9199H25.6016Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.791 11.9609C36.791 12.2371 37.0149 12.4609 37.291 12.4609H40.6825C41.9404 12.4609 42.9601 11.4412 42.9601 10.1833C42.9601 8.92542 41.9404 7.90569 40.6825 7.90569H37.291C37.0149 7.90569 36.791 8.12955 36.791 8.40569V11.9609ZM37.791 11.4609V8.90569H40.6825C41.3881 8.90569 41.9601 9.47771 41.9601 10.1833C41.9601 10.8889 41.3881 11.4609 40.6825 11.4609H37.791Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M29.261 14.4199C29.261 14.6961 29.4848 14.9199 29.761 14.9199H34.8315C36.466 14.9199 37.791 13.595 37.791 11.9605V8.40513C37.791 6.7707 36.466 5.44568 34.8315 5.44568H29.761C29.4848 5.44568 29.261 5.66954 29.261 5.94568V14.4199ZM30.261 13.9199V6.44568H34.8315C35.9137 6.44568 36.791 7.32301 36.791 8.40513V11.9605C36.791 13.0427 35.9137 13.9199 34.8315 13.9199H30.261Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.23584 41.0046C7.23584 44.8044 10.3162 47.8848 14.116 47.8848C17.9158 47.8848 20.9962 44.8044 20.9962 41.0046C20.9962 37.2048 17.9158 34.1244 14.116 34.1244C10.3162 34.1244 7.23584 37.2048 7.23584 41.0046ZM14.116 46.8848C10.8685 46.8848 8.23584 44.2521 8.23584 41.0046C8.23584 37.7571 10.8685 35.1244 14.116 35.1244C17.3635 35.1244 19.9962 37.7571 19.9962 41.0046C19.9962 44.2521 17.3635 46.8848 14.116 46.8848Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.34781 36.8327C1.34784 36.8326 1.34778 36.8328 1.34781 36.8327L1.45832 36.4151L2.78595 31.3765L3.76729 27.6525C3.83766 27.3855 3.67824 27.112 3.41121 27.0416C3.14418 26.9712 2.87067 27.1306 2.80031 27.3977L1.81896 31.1217L0.380936 36.5774C-0.286037 39.1098 1.62328 41.5898 4.24304 41.5898H7.73792C7.87144 41.5898 7.99942 41.5364 8.09334 41.4415C8.18725 41.3466 8.2393 41.2181 8.23789 41.0846C8.23769 41.0652 8.23702 41.0463 8.2366 41.0341L8.23647 41.0303C8.23598 41.0161 8.23583 41.0097 8.23583 41.0051C8.23583 37.7575 10.8685 35.1249 14.116 35.1249C17.3635 35.1249 19.9961 37.7575 19.9961 41.0051C19.9961 41.0248 19.996 41.0263 19.9956 41.0287C19.9953 41.0318 19.9947 41.0365 19.994 41.0828C19.9921 41.2166 20.044 41.3456 20.1379 41.4409C20.2319 41.5362 20.3601 41.5898 20.494 41.5898H28.9827C29.1166 41.5898 29.2448 41.5362 29.3388 41.4409C29.4327 41.3456 29.4846 41.2166 29.4827 41.0828C29.4821 41.0402 29.4815 41.0338 29.4811 41.0294C29.4808 41.0258 29.4806 41.0236 29.4806 41.0051C29.4806 37.7575 32.1132 35.1249 35.3607 35.1249C38.6082 35.1249 41.2409 37.7575 41.2409 41.0051C41.2409 41.0097 41.2407 41.0161 41.2402 41.0303L41.2401 41.0341C41.2397 41.0462 41.239 41.0652 41.2388 41.0846C41.2374 41.2181 41.2894 41.3466 41.3834 41.4415C41.4773 41.5364 41.6053 41.5898 41.7388 41.5898H46.7595C48.9651 41.5898 50.7529 39.8019 50.7529 37.5955V31.2491C50.7529 29.0436 48.9651 27.2556 46.7595 27.2556H41.6271C41.2359 27.2555 40.8556 27.126 40.5458 26.8872C40.2359 26.6483 40.0138 26.3136 39.9141 25.9353L37.8427 18.0728C37.1983 15.6254 34.9851 13.9204 32.4561 13.9204H10.6442C8.11412 13.9204 5.90196 15.6254 5.25754 18.0728L3.58772 24.4094C3.51735 24.6764 3.67677 24.9499 3.9438 25.0203C4.21083 25.0907 4.48434 24.9312 4.5547 24.6642L6.22455 18.3275C6.75333 16.3193 8.56839 14.9204 10.6442 14.9204H32.4561C34.5309 14.9204 36.3469 16.3193 36.8757 18.3274L38.9471 26.1901C39.1031 26.782 39.4505 27.3056 39.9353 27.6792C40.4201 28.0528 41.0149 28.2555 41.627 28.2556H46.7595C48.4127 28.2556 49.7529 29.5959 49.7529 31.2491V37.5955C49.7529 39.2498 48.4127 40.5898 46.7595 40.5898H42.2285C42.0139 36.9834 39.0211 34.1249 35.3607 34.1249C31.7003 34.1249 28.7077 36.9834 28.493 40.5898H20.9838C20.7691 36.9834 17.7764 34.1249 14.116 34.1249C10.4556 34.1249 7.46284 36.9834 7.24815 40.5898H4.24304C2.2795 40.5898 0.848019 38.7312 1.34781 36.8327Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28.4805 41.0046C28.4805 44.8044 31.5608 47.8848 35.3606 47.8848C39.1604 47.8848 42.2408 44.8044 42.2408 41.0046C42.2408 37.2048 39.1604 34.1244 35.3606 34.1244C31.5608 34.1244 28.4805 37.2048 28.4805 41.0046ZM35.3606 46.8848C32.1131 46.8848 29.4805 44.2521 29.4805 41.0046C29.4805 37.7571 32.1131 35.1244 35.3606 35.1244C38.6082 35.1244 41.2408 37.7571 41.2408 41.0046C41.2408 44.2521 38.6082 46.8848 35.3606 46.8848Z"></path>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_transport']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content" id="facilitesTabContent">
                                <div class="tab-pane fade show active" id="Tour" role="tabpanel" aria-labelledby="Tour-tab">
                                    <div class="row g-4">
                                        <?php
                                        while ($query->have_posts()) :
                                            $query->the_post(); ?>
                                            <div class="col-lg-4 col-md-6">
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
                                                                <div class="destination">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                        <g>
                                                                            <path d="M10.6711 10.5714C12.3737 7.89975 12.1597 8.23306 12.2087 8.16341C12.8286 7.28909 13.1562 6.26006 13.1562 5.1875C13.1562 2.34313 10.8481 0 8 0C5.16119 0 2.84375 2.3385 2.84375 5.1875C2.84375 6.25938 3.17825 7.31534 3.81844 8.20144L5.32881 10.5714C3.71397 10.8196 0.96875 11.5591 0.96875 13.1875C0.96875 13.7811 1.35619 14.627 3.20194 15.2862C4.49075 15.7465 6.19472 16 8 16C11.3758 16 15.0312 15.0478 15.0312 13.1875C15.0312 11.5588 12.2893 10.8201 10.6711 10.5714ZM4.60153 7.68578C4.59638 7.67773 4.59099 7.66983 4.58537 7.66209C4.05266 6.92922 3.78125 6.06066 3.78125 5.1875C3.78125 2.84319 5.66894 0.9375 8 0.9375C10.3262 0.9375 12.2188 2.84403 12.2188 5.1875C12.2188 6.06206 11.9525 6.90116 11.4486 7.61472C11.4034 7.67428 11.639 7.30828 8 13.0184L4.60153 7.68578ZM8 15.0625C4.31269 15.0625 1.90625 13.9787 1.90625 13.1875C1.90625 12.6558 3.14275 11.7814 5.88275 11.4406L7.60469 14.1426C7.64703 14.209 7.70545 14.2637 7.77454 14.3016C7.84363 14.3395 7.92116 14.3594 7.99997 14.3594C8.07877 14.3594 8.15631 14.3395 8.2254 14.3016C8.29449 14.2637 8.35291 14.209 8.39525 14.1426L10.1172 11.4406C12.8572 11.7814 14.0938 12.6558 14.0938 13.1875C14.0938 13.9719 11.709 15.0625 8 15.0625Z" />
                                                                            <path d="M8 2.84375C6.70766 2.84375 5.65625 3.89516 5.65625 5.1875C5.65625 6.47984 6.70766 7.53125 8 7.53125C9.29234 7.53125 10.3438 6.47984 10.3438 5.1875C10.3438 3.89516 9.29234 2.84375 8 2.84375ZM8 6.59375C7.22459 6.59375 6.59375 5.96291 6.59375 5.1875C6.59375 4.41209 7.22459 3.78125 8 3.78125C8.77541 3.78125 9.40625 4.41209 9.40625 5.1875C9.40625 5.96291 8.77541 6.59375 8 6.59375Z" />
                                                                        </g>
                                                                    </svg>
                                                                    <?php $selected_destination = Egns_Helper::egns_tours_value('tour_destination_select');
                                                                    if (!empty(Egns_Helper::egns_tours_value('tour_destination_select'))) :
                                                                        if (!empty($selected_destination)) :
                                                                    ?>
                                                                            <ul class="destination-list">
                                                                                <?php
                                                                                foreach ($selected_destination as $destination_id) {
                                                                                    $destination_title = get_the_title($destination_id);
                                                                                    $destination_permalink = get_permalink($destination_id);
                                                                                ?>
                                                                                    <li><a href="<?php echo esc_url($destination_permalink); ?>"> <?php echo esc_html($destination_title); ?></a></li>
                                                                                <?php
                                                                                }

                                                                                ?>
                                                                            </ul>
                                                                    <?php
                                                                        endif;
                                                                    endif; ?>
                                                                </div>
                                                                <?php if (!empty(Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                                    <div class="date">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                            <g clip-path="url(#clip0_1587_1320)">
                                                                                <path d="M13.6415 7.31632V3.281C13.6415 2.32193 12.8561 1.52978 11.897 1.52978H11.6797V1.25623C11.6797 0.571946 11.125 0.0172086 10.4407 0.0172086C9.75639 0.0172086 9.20166 0.571946 9.20166 1.25623V1.52978H4.65858V1.25623C4.65858 0.562447 4.09613 0 3.40235 0C2.70856 0 2.14612 0.562447 2.14612 1.25623V1.52978H1.95837C0.999265 1.52978 0.21875 2.32193 0.21875 3.281V12.5469C0.21875 13.5061 0.999265 14.2986 1.95837 14.2986H7.41674C7.86129 14.8303 8.41695 15.2582 9.04463 15.5522C9.67231 15.8461 10.3568 15.999 11.0499 16C13.6553 16 15.7776 13.8772 15.7776 11.2718C15.7777 9.62041 14.9149 8.1614 13.6415 7.31632ZM9.89 1.25623C9.8847 0.956456 10.1234 0.709133 10.4232 0.703833C10.428 0.703764 10.4328 0.70373 10.4376 0.703764C10.7402 0.700563 10.9882 0.943274 10.9914 1.2459C10.9914 1.24935 10.9914 1.25279 10.9914 1.25623V2.59671H9.89V1.25623ZM2.83446 1.25623C2.83773 0.947817 3.09042 0.70046 3.39884 0.70373C3.39936 0.703724 3.39989 0.703735 3.40042 0.703764C3.70997 0.703764 3.97023 0.946715 3.97023 1.25623V2.59671H2.83446V1.25623ZM0.907095 3.281C0.907095 2.70144 1.37882 2.21812 1.95837 2.21812H2.14612V2.9552C2.14612 3.14526 2.30485 3.28506 2.49494 3.28506H4.30597C4.49602 3.28506 4.65858 3.14526 4.65858 2.9552V2.21812H9.20166V2.9552C9.2004 2.99891 9.20809 3.04241 9.22425 3.08304C9.24042 3.12366 9.26472 3.16055 9.29566 3.19145C9.32661 3.22234 9.36354 3.24658 9.40419 3.26267C9.44484 3.27877 9.48836 3.28639 9.53206 3.28506H11.3431C11.3871 3.28652 11.431 3.27904 11.4721 3.26307C11.5131 3.2471 11.5505 3.22297 11.582 3.19214C11.6134 3.1613 11.6383 3.12441 11.6551 3.08368C11.6719 3.04296 11.6803 2.99925 11.6797 2.9552V2.21812H11.897C12.4805 2.22401 12.9509 2.69752 12.9531 3.281V4.38641H0.907095V3.281ZM1.95837 13.6102C1.37882 13.6102 0.907095 13.1265 0.907095 12.5469V5.07476H12.9531V6.94203C12.354 6.67899 11.7068 6.54329 11.0525 6.54355C8.44709 6.54355 6.32606 8.6694 6.32606 11.2749C6.32474 12.0934 6.53632 12.8982 6.94003 13.6102H1.95837ZM11.0499 15.3055C8.82038 15.3055 7.01303 13.4982 7.01303 11.2687C7.01303 9.03921 8.82038 7.23186 11.0499 7.23186C13.2793 7.23186 15.0867 9.03921 15.0867 11.2687V11.2687C15.0842 13.4971 13.2783 15.303 11.0499 15.3055Z" />
                                                                                <path d="M12.6727 11.2698H11.1649V9.19891C11.1649 9.00882 11.0108 8.85474 10.8207 8.85474C10.6306 8.85474 10.4766 9.00882 10.4766 9.19891V11.6136C10.478 11.7056 10.5156 11.7933 10.5812 11.8578C10.6468 11.9223 10.7352 11.9583 10.8272 11.9581H12.6727C12.8628 11.9581 13.0169 11.8041 13.0169 11.614C13.0169 11.4239 12.8628 11.2698 12.6727 11.2698Z" />
                                                                            </g>
                                                                        </svg>
                                                                        <span><?php echo esc_html__(Egns_Helper::egns_tours_value('tour_duration')); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                                                            <div class="location-area">
                                                                <ul class="location-list">
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
                                <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_hotels']) : ?>
                                    <div class="tab-pane fade" id="Hotel" role="tabpanel" aria-labelledby="Hotel-tab">
                                        <div class="row g-4">
                                            <?php
                                            while ($query2->have_posts()) :
                                                $query2->the_post(); ?>
                                                <div class="col-xxl-4 col-md-6">
                                                    <div class="room-suits-card two">
                                                        <div class="row g-0">
                                                            <div class="col-md-12">
                                                                <div class="swiper hotel-img-slider">
                                                                    <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'))) : ?>
                                                                        <span class="batch"><?php echo Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'); ?></span>
                                                                    <?php endif; ?>
                                                                    <div class="swiper-wrapper">
                                                                        <?php if (has_post_thumbnail()) : ?>
                                                                            <div class="swiper-slide">
                                                                                <div class="room-img">
                                                                                    <?php the_post_thumbnail('card-thumb'); ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <?php foreach (Egns_Helper::egns_hotel_gallery('hotel_gallery') as $key => $data) : ?>
                                                                            <?php if (!empty($data)) : ?>
                                                                                <div class="swiper-slide">
                                                                                    <div class="room-img">
                                                                                        <img src="<?php echo wp_get_attachment_url($data); ?>" alt="<?php echo esc_attr__('hotel-img', 'triprex-core'); ?>" />
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                    <div class="swiper-pagination5"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="room-content">
                                                                    <div class="content-top">
                                                                        <?php if (function_exists('run_reviewx')) : ?>
                                                                            <div class="reviews">
                                                                                <?php echo do_shortcode('[rvx-star-count]') ?>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                                        <ul class="loaction-area">
                                                                            <li><i class="bi bi-geo-alt"></i></li>
                                                                            <li>

                                                                                <?php echo Egns_Helper::egns_hotel_value('hotel_location_text'); ?>
                                                                                <?php
                                                                                $map_link = Egns_Helper::egns_hotel_value('hotel_location_link');
                                                                                if (!empty($map_link)) :
                                                                                ?>
                                                                                    <a href="<?php echo esc_url($map_link['url']) ?>"><?php echo $map_link['text'] ?></a>
                                                                                <?php endif; ?>
                                                                                <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_distance'))) : ?>
                                                                                    <span><?php echo Egns_Helper::egns_hotel_value('hotel_distance'); ?></span>
                                                                                <?php endif; ?>
                                                                            </li>
                                                                        </ul>
                                                                        <ul class="facilisis">
                                                                            <?php
                                                                            $highlights = (array) Egns_Helper::egns_hotel_value('hotel_highlights_repeater');
                                                                            foreach (array_slice($highlights, 0, 5) as $index => $highlight) :
                                                                            ?>
                                                                                <li>
                                                                                    <?php if (!empty($highlight['hotel_highlights_media']['url'])) : ?>
                                                                                        <img src="<?php echo esc_url($highlight['hotel_highlights_media']['url']); ?>" alt="<?php echo esc_attr__('highlights-image', 'triprex-core'); ?>" />
                                                                                    <?php endif; ?>
                                                                                    <?php if (!empty($highlight['hotel_highlights_title'])) : ?>
                                                                                        <?php echo esc_html($highlight['hotel_highlights_title']); ?>
                                                                                    <?php endif; ?>
                                                                                </li>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="content-bottom">
                                                                        <div class="room-type">
                                                                            <?php
                                                                            $post_id = get_the_ID();
                                                                            $terms = get_the_terms($post_id, 'room-type');
                                                                            if ($terms && !is_wp_error($terms)) {
                                                                                foreach ($terms as $index => $term) {
                                                                            ?>
                                                                                    <?php if (!empty($term->name)) : ?>
                                                                                        <h6><?php echo esc_html($term->name); ?></h6>
                                                                                    <?php endif; ?>
                                                                            <?php }
                                                                            }; ?>
                                                                            <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_room_info'))) : ?>
                                                                                <span><?php echo Egns_Helper::egns_hotel_value('hotel_room_info'); ?></span>
                                                                            <?php endif; ?>
                                                                            <div class="deals">
                                                                                <span><?php if (!empty(Egns_Helper::egns_hotel_value('hotel_cancellation_label'))) : ?> <strong><?php echo Egns_Helper::egns_hotel_value('hotel_cancellation_label'); ?></strong> <br><?php endif; ?>
                                                                                    <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_cancellation_duration'))) : ?><?php echo Egns_Helper::egns_hotel_value('hotel_cancellation_duration'); ?> <?php endif; ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="price-and-book">
                                                                            <div class="price-area">
                                                                                <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_duration_person'))) : ?>
                                                                                    <p><?php echo Egns_Helper::egns_hotel_value('hotel_duration_person'); ?></p>
                                                                                <?php endif; ?>
                                                                                <?php echo \Egns_Core\Egns_Helper::egns_get_hotel_pack_price() ?>
                                                                            </div>
                                                                            <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_hotel'])) : ?>
                                                                                <div class="book-btn">
                                                                                    <a href="<?php the_permalink(); ?>" class="primary-btn2"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_hotel']); ?> <i class="bi bi-arrow-right"></i></a>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                <?php endif; ?>
                                <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_transports']) : ?>
                                    <div class="tab-pane fade" id="Transport" role="tabpanel" aria-labelledby="Transport-tab">
                                        <div class="row g-4">
                                            <?php
                                            while ($query3->have_posts()) :
                                                $query3->the_post(); ?>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="transport-card">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <a href="<?php the_permalink(); ?>" class="transport-img">
                                                                <?php the_post_thumbnail('card-thumb'); ?>
                                                                <?php if (!empty(Egns_Helper::egns_transport_value('transport_distance_field'))) : ?>
                                                                    <span><?php echo Egns_Helper::egns_transport_value('transport_distance_field'); ?></span>
                                                                <?php endif; ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <div class="transport-content">
                                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            <div class="transport-type">
                                                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_available_transport'])) : ?>
                                                                    <h6><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_available_transport']); ?> :</h6>
                                                                <?php endif; ?>
                                                                <div class="row g-2">
                                                                    <?php
                                                                    $post_id = get_the_ID();
                                                                    $terms = get_the_terms($post_id, 'transport-type');
                                                                    if ($terms && !is_wp_error($terms)) {
                                                                        foreach ($terms as $index => $term) {
                                                                            $meta = get_term_meta($term->term_id, 'triprex-transport-type', true);
                                                                            if ($meta['triprex_transport_type_logo'] ?? '') :
                                                                                $logo = $meta['triprex_transport_type_logo']['url'];
                                                                            endif;
                                                                    ?>
                                                                            <div class="col-3">
                                                                                <div class="single-transport">
                                                                                    <?php if ($logo  ?? '') : ?>
                                                                                        <img src="<?php echo esc_url($logo) ?>" alt="<?php echo esc_attr__('transport-img', 'triprex-core'); ?>" />
                                                                                    <?php endif; ?>
                                                                                    <?php if (!empty($term->name)) : ?>
                                                                                        <span><?php echo esc_html($term->name); ?></span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                    <?php }
                                                                    } ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-bottom">
                                                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_transport'])) : ?>
                                                                    <div class="details-btn">
                                                                        <a href="<?php the_permalink(); ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_transport']); ?></a>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if (function_exists('run_reviewx')) : ?>
                                                                    <div class="rating-area">
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['triprex_tour_facilities_tab_content_style_selection'] == 'style_four') : ?>
            <div class="tour-facilites-section">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                            <div class="section-title4 text-center <?php echo 'yes' === $settings['triprex_custom_post_tab_on_off_hotels'] || 'yes' === $settings['triprex_custom_post_tab_on_off_transports'] ? 'mb-15' : ''; ?>">
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_sub_title'])) : ?>
                                    <div class="eg-section-tag">
                                        <span><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_sub_title']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <ul class="nav nav-tabs justify-content-center" id="facilitesTab" role="tablist">
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_tour'])) : ?>
                                    <?php if ($settings['triprex_custom_post_tab_on_off_hotels'] == 'yes' || $settings['triprex_custom_post_tab_on_off_transports'] == 'yes') : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="Tour-tab" data-bs-toggle="tab" data-bs-target="#Tour" type="button" role="tab" aria-controls="Tour" aria-selected="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                                                    <g>
                                                        <path d="M5.64903 6.91357C2.53954 6.91357 0.00976562 9.44335 0.00976562 12.5528C0.00976562 14.4834 0.928148 16.5592 2.73944 18.7225C2.9952 19.0275 3.26021 19.3246 3.53411 19.6134C2.36462 19.9327 1.66244 20.5062 1.66244 21.1756C1.66244 22.3605 3.71636 23 5.64885 23C7.58139 23 9.63527 22.3605 9.63527 21.1756C9.63527 20.5067 8.93332 19.9331 7.76458 19.6137C8.2315 19.1208 8.73391 18.5408 9.21062 17.894C9.23746 17.8583 9.25696 17.8178 9.26801 17.7746C9.27906 17.7314 9.28143 17.6864 9.27499 17.6423C9.26854 17.5981 9.25341 17.5557 9.23047 17.5175C9.20753 17.4792 9.17723 17.4459 9.14132 17.4195C9.10542 17.393 9.06463 17.3739 9.02131 17.3634C8.97799 17.3528 8.933 17.3509 8.88894 17.3578C8.84489 17.3647 8.80264 17.3803 8.76465 17.4037C8.72666 17.427 8.69367 17.4577 8.6676 17.4938C8.09206 18.2749 7.46909 18.9613 6.92549 19.5065C6.86236 19.5385 6.8109 19.5896 6.77841 19.6525C6.29146 20.131 5.88168 20.486 5.64917 20.68C5.41921 20.4879 5.01568 20.1377 4.53497 19.6654C4.50093 19.5907 4.44083 19.531 4.36593 19.4974C2.83827 17.9609 0.684268 15.3062 0.684268 12.5529C0.684268 9.81539 2.91145 7.58821 5.64899 7.58821C8.38653 7.58821 10.6137 9.81539 10.6137 12.5529C10.6137 13.7484 10.2064 15.0395 9.40297 16.3902C9.38033 16.4283 9.36541 16.4705 9.35906 16.5143C9.35271 16.5581 9.35506 16.6028 9.36597 16.6457C9.37687 16.6887 9.39613 16.729 9.42264 16.7645C9.44914 16.8 9.48238 16.8299 9.52045 16.8525C9.55851 16.8752 9.60067 16.8901 9.6445 16.8965C9.68834 16.9028 9.73299 16.9005 9.77592 16.8895C9.81885 16.8786 9.85921 16.8594 9.89469 16.8329C9.93018 16.8064 9.9601 16.7731 9.98274 16.7351C10.849 15.2785 11.2883 13.8715 11.2883 12.5529C11.2883 9.44335 8.75852 6.91357 5.64903 6.91357ZM5.44262 21.3815C5.50169 21.4273 5.57431 21.4521 5.64903 21.452C5.72376 21.4521 5.79638 21.4273 5.85545 21.3815C5.89682 21.3495 6.46041 20.91 7.21164 20.1755C8.34915 20.4074 8.96081 20.8541 8.96081 21.1756C8.96081 21.4157 8.63171 21.699 8.10195 21.9148C7.4522 22.1796 6.58103 22.3255 5.6489 22.3255C3.62714 22.3255 2.33699 21.6444 2.33699 21.1756C2.33699 20.8536 2.94882 20.4072 4.08697 20.1752C4.84237 20.9141 5.40677 21.3538 5.44262 21.3815Z"></path>
                                                        <path d="M5.64915 10.1009C5.1157 10.1009 4.60844 10.2693 4.18222 10.5879C4.1106 10.6415 4.06318 10.7213 4.05039 10.8098C4.0376 10.8984 4.06049 10.9883 4.11403 11.06C4.16761 11.1316 4.24744 11.179 4.33596 11.1918C4.42448 11.2046 4.51446 11.1817 4.58612 11.1282C4.89477 10.8974 5.26237 10.7754 5.6491 10.7754C6.62916 10.7754 7.42648 11.5727 7.42648 12.5528C7.42648 13.5329 6.62916 14.3302 5.6491 14.3302C4.66904 14.3302 3.87172 13.5329 3.87172 12.5528C3.87172 12.3856 3.89486 12.2202 3.94045 12.0615C3.96513 11.9755 3.95465 11.8833 3.91132 11.805C3.86799 11.7268 3.79534 11.6689 3.70938 11.6442C3.6234 11.6196 3.53117 11.6301 3.45294 11.6735C3.37471 11.7168 3.31687 11.7894 3.29214 11.8754C3.22906 12.0957 3.19713 12.3237 3.19727 12.5528C3.19727 13.9048 4.29718 15.0048 5.64919 15.0048C7.00116 15.0048 8.10112 13.9048 8.10112 12.5528C8.10107 11.2008 7.00112 10.1009 5.64915 10.1009ZM20.3471 9.7984C20.5276 9.60501 20.7029 9.40685 20.8728 9.20413C22.2769 7.52706 22.9889 5.91486 22.9889 4.41218C22.9889 1.97935 21.0096 0 18.5767 0C16.7995 0 15.2037 1.05773 14.5114 2.69468C14.4942 2.73547 14.4851 2.77926 14.4848 2.82354C14.4844 2.86783 14.4928 2.91175 14.5095 2.95279C14.5261 2.99383 14.5507 3.0312 14.5818 3.06275C14.6128 3.0943 14.6498 3.11942 14.6906 3.13667C14.773 3.1715 14.8658 3.17218 14.9487 3.13858C15.0316 3.10498 15.0977 3.03984 15.1326 2.95748C15.7192 1.57065 17.0711 0.674502 18.5767 0.674502C20.6377 0.674502 22.3144 2.35126 22.3144 4.41223C22.3144 7.19931 19.3883 9.86952 18.5766 10.5564C18.3977 10.4053 18.1161 10.1578 17.786 9.83421C17.7533 9.76971 17.7007 9.71745 17.636 9.68516C16.4715 8.51265 14.839 6.49714 14.839 4.41223C14.839 4.32278 14.8035 4.23699 14.7403 4.17374C14.677 4.11049 14.5912 4.07495 14.5018 4.07495C14.4123 4.07495 14.3265 4.11049 14.2633 4.17374C14.2 4.23699 14.1645 4.32278 14.1645 4.41223C14.1645 5.91486 14.8765 7.52706 16.2807 9.20418C16.4505 9.40677 16.6257 9.60484 16.806 9.79818C15.9366 10.0594 15.4347 10.504 15.4347 11.0395C15.4347 11.491 15.801 11.889 16.4662 12.16C17.0354 12.3919 17.7849 12.5197 18.5767 12.5197C19.3684 12.5197 20.1179 12.3919 20.6871 12.16C21.3522 11.8889 21.7185 11.491 21.7185 11.0394C21.7185 10.505 21.2162 10.0599 20.3471 9.7984ZM18.5766 11.8451C16.9802 11.8451 16.1093 11.3129 16.1093 11.0394C16.1093 10.8612 16.5054 10.5352 17.3514 10.3553C17.9206 10.9091 18.3431 11.2382 18.3703 11.2594C18.4294 11.3052 18.502 11.33 18.5768 11.3299C18.6515 11.33 18.7241 11.3052 18.7832 11.2594C18.8104 11.2383 19.2328 10.9092 19.8021 10.3554C20.1789 10.4358 20.5054 10.5535 20.7339 10.6926C20.9281 10.8109 21.0441 10.9405 21.0441 11.0394C21.044 11.3129 20.1731 11.8451 18.5766 11.8451Z"></path>
                                                        <path d="M18.576 2.44968C17.4939 2.44968 16.6135 3.33006 16.6135 4.41227C16.6135 5.49439 17.4939 6.37477 18.576 6.37477C19.6582 6.37477 20.5386 5.49444 20.5386 4.41227C20.5386 3.3301 19.6582 2.44968 18.576 2.44968ZM18.5761 5.70022C17.8658 5.70022 17.288 5.12244 17.288 4.41222C17.288 3.70201 17.8658 3.12418 18.5761 3.12418C19.2863 3.12418 19.8641 3.70196 19.8641 4.41222C19.8641 5.12244 19.2863 5.70022 18.5761 5.70022ZM14.2011 10.7021H14.0471C13.935 10.7021 13.8223 10.7096 13.7121 10.7242C13.6241 10.7369 13.5446 10.7837 13.491 10.8545C13.4374 10.9254 13.4138 11.0145 13.4256 11.1026C13.4373 11.1907 13.4833 11.2706 13.5536 11.325C13.6239 11.3794 13.7128 11.4038 13.8011 11.3929C13.8826 11.3822 13.9648 11.3768 14.0471 11.3768H14.2011V11.3767C14.3874 11.3767 14.5384 11.2258 14.5384 11.0395C14.5384 10.8531 14.3874 10.7021 14.2011 10.7021ZM13.0861 20.8211H13.0845L12.6391 20.8231C12.5496 20.8233 12.4639 20.859 12.4008 20.9224C12.3377 20.9858 12.3023 21.0717 12.3025 21.1611C12.3027 21.2506 12.3384 21.3363 12.4018 21.3994C12.4652 21.4625 12.5511 21.4979 12.6405 21.4977H12.6421L13.0876 21.4957C13.177 21.4952 13.2626 21.4593 13.3256 21.3958C13.3885 21.3322 13.4237 21.2463 13.4233 21.1569C13.4229 21.0677 13.3872 20.9823 13.324 20.9193C13.2608 20.8564 13.1753 20.8211 13.0861 20.8211ZM14.6013 15.0708H14.1558C14.0664 15.0708 13.9806 15.1063 13.9174 15.1696C13.8541 15.2328 13.8186 15.3186 13.8186 15.4081C13.8186 15.4975 13.8541 15.5833 13.9174 15.6466C13.9806 15.7098 14.0664 15.7453 14.1558 15.7453H14.6013C14.6456 15.7453 14.6894 15.7366 14.7304 15.7197C14.7713 15.7027 14.8085 15.6779 14.8398 15.6466C14.8711 15.6152 14.896 15.5781 14.9129 15.5371C14.9299 15.4962 14.9386 15.4524 14.9386 15.4081C14.9386 15.3638 14.9299 15.3199 14.9129 15.279C14.896 15.2381 14.8711 15.2009 14.8398 15.1696C14.8085 15.1382 14.7713 15.1134 14.7304 15.0965C14.6894 15.0795 14.6456 15.0708 14.6013 15.0708ZM12.8142 11.3893C12.7535 11.3236 12.6693 11.2846 12.5799 11.281C12.4905 11.2774 12.4034 11.3095 12.3376 11.3701C12.2116 11.4863 12.0977 11.615 11.9977 11.7543C11.9477 11.827 11.9282 11.9164 11.9434 12.0034C11.9586 12.0903 12.0072 12.1679 12.0789 12.2194C12.1506 12.2709 12.2396 12.2922 12.3269 12.2788C12.4141 12.2654 12.4927 12.2184 12.5456 12.1478C12.619 12.0456 12.7026 11.9512 12.795 11.8659C12.8607 11.8052 12.8997 11.721 12.9033 11.6316C12.9069 11.5422 12.8749 11.4551 12.8142 11.3893ZM14.8679 20.8129H14.8664L14.421 20.815C14.3325 20.8166 14.2482 20.8529 14.1862 20.9162C14.1243 20.9794 14.0897 21.0644 14.0899 21.153C14.09 21.2415 14.125 21.3264 14.1873 21.3893C14.2495 21.4523 14.3339 21.4883 14.4225 21.4895H14.424L14.8694 21.4875C14.9579 21.4858 15.0423 21.4495 15.1042 21.3863C15.1661 21.323 15.2007 21.238 15.2006 21.1495C15.2004 21.061 15.1654 20.9761 15.1032 20.9131C15.0409 20.8501 14.9565 20.8142 14.8679 20.8129ZM11.3043 20.8291H11.3027L10.8572 20.8312C10.7678 20.8316 10.6822 20.8675 10.6192 20.9311C10.5563 20.9946 10.5211 21.0805 10.5215 21.17C10.5219 21.2591 10.5576 21.3445 10.6208 21.4075C10.684 21.4704 10.7695 21.5057 10.8587 21.5057H10.8603L11.3057 21.5037C11.3952 21.5033 11.4808 21.4673 11.5437 21.4038C11.6067 21.3403 11.6419 21.2543 11.6415 21.1649C11.6411 21.0757 11.6054 20.9903 11.5422 20.9274C11.479 20.8645 11.3934 20.8291 11.3043 20.8291ZM13.0633 14.7873C12.957 14.7202 12.8578 14.6425 12.7671 14.5554C12.7027 14.4934 12.6162 14.4595 12.5268 14.4613C12.4373 14.463 12.3523 14.5002 12.2902 14.5646C12.2595 14.5965 12.2354 14.6342 12.2193 14.6754C12.2031 14.7167 12.1952 14.7607 12.1961 14.805C12.197 14.8492 12.2065 14.8929 12.2243 14.9335C12.242 14.9741 12.2676 15.0108 12.2995 15.0415C12.4231 15.1603 12.5584 15.2663 12.7034 15.3578C12.7408 15.3815 12.7826 15.3975 12.8263 15.405C12.8699 15.4126 12.9146 15.4114 12.9579 15.4016C13.0011 15.3918 13.0419 15.3736 13.0781 15.348C13.1143 15.3224 13.145 15.29 13.1686 15.2525C13.1923 15.215 13.2083 15.1732 13.2158 15.1296C13.2233 15.0859 13.2221 15.0412 13.2123 14.9981C13.2025 14.9549 13.1843 14.914 13.1588 14.8778C13.1332 14.8417 13.1008 14.8109 13.0633 14.7873ZM12.2342 13.5793C12.2115 13.4622 12.2001 13.3431 12.2001 13.2238L12.2002 13.2051C12.2007 13.1608 12.1925 13.1168 12.176 13.0757C12.1595 13.0346 12.1351 12.9971 12.1042 12.9654C12.0732 12.9338 12.0363 12.9085 11.9956 12.8911C11.9549 12.8736 11.9111 12.8644 11.8669 12.8639L11.8629 12.8639C11.7741 12.8639 11.6889 12.8989 11.6258 12.9613C11.5627 13.0237 11.5267 13.1085 11.5257 13.1972L11.5255 13.2238C11.5255 13.3867 11.5412 13.5497 11.5721 13.7084C11.5806 13.7518 11.5975 13.7932 11.622 13.8301C11.6465 13.8671 11.678 13.8988 11.7147 13.9235C11.7514 13.9483 11.7927 13.9656 11.8361 13.9744C11.8795 13.9832 11.9242 13.9834 11.9677 13.9749C12.0112 13.9664 12.0526 13.9494 12.0895 13.925C12.1264 13.9005 12.1581 13.869 12.1829 13.8323C12.2076 13.7956 12.2249 13.7543 12.2337 13.7109C12.2425 13.6675 12.2427 13.6228 12.2342 13.5793ZM16.3832 15.0708H15.9378C15.8483 15.0708 15.7625 15.1063 15.6993 15.1696C15.636 15.2328 15.6005 15.3186 15.6005 15.4081C15.6005 15.4975 15.636 15.5833 15.6993 15.6466C15.7625 15.7098 15.8483 15.7453 15.9378 15.7453H16.3832C16.4727 15.7453 16.5584 15.7098 16.6217 15.6466C16.6849 15.5833 16.7205 15.4975 16.7205 15.4081C16.7205 15.3186 16.6849 15.2328 16.6217 15.1696C16.5584 15.1063 16.4727 15.0708 16.3832 15.0708ZM21.7981 15.7575C21.6679 15.6547 21.5298 15.5621 21.3852 15.4807C21.2231 15.3892 21.0173 15.4467 20.9258 15.609C20.9041 15.6475 20.8902 15.69 20.8849 15.734C20.8795 15.778 20.8829 15.8226 20.8948 15.8652C20.9068 15.9079 20.927 15.9478 20.9543 15.9826C20.9816 16.0175 21.0156 16.0466 21.0541 16.0683C21.1682 16.1327 21.2772 16.2058 21.38 16.2869C21.4395 16.334 21.513 16.3596 21.5888 16.3595C21.659 16.3596 21.7273 16.3378 21.7845 16.2972C21.8417 16.2566 21.8848 16.1992 21.9078 16.133C21.9308 16.0668 21.9326 15.995 21.913 15.9277C21.8933 15.8604 21.8532 15.8009 21.7981 15.7575ZM20.5462 21.0546C20.5206 20.8701 20.3501 20.741 20.1659 20.7667C20.0555 20.7819 19.9424 20.79 19.8296 20.7904L19.7665 20.7907C19.6783 20.793 19.5946 20.8296 19.5332 20.8928C19.4717 20.9559 19.4374 21.0406 19.4376 21.1288C19.4378 21.2169 19.4725 21.3015 19.5343 21.3644C19.596 21.4272 19.6799 21.4635 19.768 21.4653H19.7697L19.8327 21.465C19.975 21.4644 20.1172 21.4543 20.2583 21.4349C20.3021 21.4288 20.3444 21.4142 20.3826 21.3918C20.4208 21.3694 20.4543 21.3397 20.481 21.3044C20.5077 21.2691 20.5273 21.2288 20.5384 21.186C20.5496 21.1431 20.5523 21.0985 20.5462 21.0546ZM22.0347 20.1062C22.0042 20.0741 21.9676 20.0483 21.9271 20.0304C21.8866 20.0125 21.843 20.0027 21.7987 20.0016C21.7544 20.0005 21.7104 20.0082 21.669 20.0241C21.6277 20.0401 21.59 20.064 21.5579 20.0946C21.4629 20.185 21.3611 20.2679 21.2534 20.3427C21.1799 20.3937 21.1297 20.4718 21.1137 20.5598C21.0978 20.6478 21.1174 20.7385 21.1684 20.8121C21.1994 20.8569 21.2409 20.8936 21.2892 20.9188C21.3376 20.9441 21.3913 20.9573 21.4459 20.9572C21.5144 20.9572 21.5814 20.9363 21.6377 20.8971C21.7741 20.8025 21.9029 20.6975 22.0231 20.583C22.0552 20.5525 22.081 20.5159 22.0989 20.4754C22.1168 20.4349 22.1266 20.3913 22.1277 20.347C22.1288 20.3027 22.1211 20.2587 22.1051 20.2173C22.0892 20.176 22.0652 20.1382 22.0347 20.1062ZM22.6911 18.4682C22.6032 18.4517 22.5123 18.4707 22.4385 18.5212C22.3646 18.5716 22.3138 18.6493 22.2973 18.7372C22.273 18.8658 22.2387 18.9924 22.1948 19.1158C22.1659 19.1998 22.1713 19.2918 22.2098 19.3718C22.2483 19.4518 22.3169 19.5135 22.4005 19.5433C22.4842 19.5731 22.5762 19.5687 22.6567 19.5311C22.7371 19.4935 22.7995 19.4256 22.8303 19.3423C22.886 19.1858 22.9294 19.0253 22.9602 18.862C22.9767 18.7741 22.9577 18.6832 22.9072 18.6094C22.8567 18.5355 22.779 18.4847 22.6911 18.4682ZM22.8914 17.384C22.8455 17.2242 22.7872 17.0683 22.7169 16.9176C22.6782 16.8379 22.6097 16.7766 22.5263 16.747C22.4428 16.7173 22.3511 16.7217 22.2708 16.7592C22.1905 16.7966 22.1282 16.8641 22.0973 16.9471C22.0664 17.0301 22.0694 17.122 22.1056 17.2028C22.1609 17.3214 22.2069 17.4443 22.2431 17.5701C22.2633 17.6405 22.3058 17.7024 22.3643 17.7464C22.4227 17.7905 22.4939 17.8144 22.5671 17.8144C22.6194 17.8144 22.6709 17.8023 22.7177 17.779C22.7644 17.7557 22.8051 17.7218 22.8366 17.6801C22.868 17.6384 22.8894 17.5899 22.8989 17.5385C22.9084 17.4872 22.9059 17.4343 22.8914 17.384ZM18.1651 15.0708H17.7196C17.6302 15.0708 17.5444 15.1063 17.4811 15.1696C17.4179 15.2328 17.3824 15.3186 17.3824 15.4081C17.3824 15.4975 17.4179 15.5833 17.4811 15.6466C17.5444 15.7098 17.6302 15.7453 17.7196 15.7453H18.1651C18.2545 15.7453 18.3403 15.7098 18.4036 15.6466C18.4668 15.5833 18.5024 15.4975 18.5024 15.4081C18.5024 15.3186 18.4668 15.2328 18.4036 15.1696C18.3403 15.1063 18.2545 15.0708 18.1651 15.0708ZM16.6498 20.8048H16.6482L16.2028 20.8069C16.1143 20.8085 16.03 20.8448 15.968 20.9081C15.9061 20.9713 15.8715 21.0564 15.8717 21.1449C15.8719 21.2334 15.9069 21.3183 15.9691 21.3812C16.0313 21.4442 16.1158 21.4802 16.2043 21.4814H16.2059L16.6513 21.4794C16.7408 21.4792 16.8265 21.4435 16.8896 21.3801C16.9527 21.3167 16.988 21.2308 16.9878 21.1414C16.9876 21.0519 16.9519 20.9662 16.8885 20.9031C16.8251 20.84 16.7393 20.8046 16.6498 20.8048ZM19.9618 15.074C19.9139 15.0719 19.8661 15.0708 19.8182 15.0708H19.5015C19.412 15.0708 19.3262 15.1064 19.263 15.1696C19.1997 15.2329 19.1642 15.3187 19.1642 15.4081C19.1642 15.4976 19.1997 15.5833 19.263 15.6466C19.3262 15.7098 19.412 15.7454 19.5015 15.7454H19.8182V15.7453C19.8563 15.7453 19.8943 15.7462 19.9319 15.7479C19.9762 15.7498 20.0204 15.7431 20.062 15.7279C20.1036 15.7128 20.1419 15.6897 20.1746 15.6598C20.2072 15.6299 20.2337 15.5938 20.2524 15.5537C20.2712 15.5136 20.2818 15.4701 20.2838 15.4259C20.2857 15.3817 20.279 15.3374 20.2639 15.2958C20.2487 15.2542 20.2256 15.2159 20.1957 15.1833C20.1658 15.1506 20.1297 15.1241 20.0896 15.1054C20.0495 15.0866 20.006 15.076 19.9618 15.074ZM18.4316 20.7968H18.4301L17.9846 20.7988C17.8961 20.8004 17.8118 20.8368 17.7499 20.9C17.6879 20.9633 17.6533 21.0483 17.6535 21.1368C17.6537 21.2253 17.6887 21.3102 17.7509 21.3732C17.8131 21.4362 17.8976 21.4721 17.9861 21.4734H17.9877L18.4331 21.4713C18.5226 21.4709 18.6082 21.435 18.6711 21.3715C18.7341 21.3079 18.7693 21.222 18.7689 21.1325C18.7685 21.0434 18.7328 20.958 18.6696 20.895C18.6064 20.8321 18.5208 20.7968 18.4316 20.7968Z"></path>
                                                    </g>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_tour']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_hotel'])) : ?>
                                    <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_hotels']) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="Hotel-tab" data-bs-toggle="tab" data-bs-target="#Hotel" type="button" role="tab" aria-controls="Hotel" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                                                    <g>
                                                        <path d="M19.5496 12.2665H16.0038C15.9021 12.2665 15.8046 12.3069 15.7327 12.3788C15.6608 12.4506 15.6204 12.5481 15.6204 12.6498V22.2333H13.6079V18.2562C13.6079 18.1545 13.5675 18.057 13.4956 17.9851C13.4237 17.9132 13.3262 17.8728 13.2245 17.8728H9.77448C9.67281 17.8728 9.57531 17.9132 9.50342 17.9851C9.43153 18.057 9.39114 18.1545 9.39114 18.2562V22.2333H7.37861V8.33724C7.37861 7.91452 7.72256 7.57056 8.14529 7.57056H14.8537C15.2765 7.57056 15.6204 7.91452 15.6204 8.33724V10.4696C15.6204 10.5712 15.6608 10.6687 15.7327 10.7406C15.8046 10.8125 15.9021 10.8529 16.0038 10.8529C16.1054 10.8529 16.2029 10.8125 16.2748 10.7406C16.3467 10.6687 16.3871 10.5712 16.3871 10.4696V8.33724C16.3871 7.49174 15.6992 6.80389 14.8537 6.80389H8.14529C7.29978 6.80389 6.61193 7.49174 6.61193 8.33724V22.2333H3.44937C3.02665 22.2333 2.6827 21.8894 2.6827 21.4666V13.7998C2.6827 13.3771 3.02665 13.0332 3.44937 13.0332H4.79106C4.89273 13.0332 4.99024 12.9928 5.06213 12.9209C5.13402 12.849 5.1744 12.7515 5.1744 12.6498C5.1744 12.5481 5.13402 12.4506 5.06213 12.3788C4.99024 12.3069 4.89273 12.2665 4.79106 12.2665H3.44937C2.60387 12.2665 1.91602 12.9543 1.91602 13.7998V21.4666C1.91602 22.3121 2.60387 23 3.44937 23H16.0038C16.1054 23 16.2029 22.9596 16.2748 22.8877C16.3467 22.8158 16.3871 22.7183 16.3871 22.6166V13.0332H19.5496C19.9724 13.0332 20.3163 13.3771 20.3163 13.7998V21.4666C20.3163 21.8894 19.9724 22.2333 19.5496 22.2333H17.9205C17.8188 22.2333 17.7213 22.2737 17.6494 22.3456C17.5775 22.4175 17.5371 22.515 17.5371 22.6166C17.5371 22.7183 17.5775 22.8158 17.6494 22.8877C17.7213 22.9596 17.8188 23 17.9205 23H19.5496C20.3951 23 21.083 22.3121 21.083 21.4666V13.7998C21.083 12.9543 20.3951 12.2665 19.5496 12.2665ZM10.1578 18.6395H12.8412V22.2333H10.1578V18.6395ZM9.91047 3.38493L9.66638 4.81306C9.61295 5.12577 9.94233 5.36473 10.2231 5.21667L11.4995 4.54323L12.7759 5.21667C13.0564 5.36473 13.3861 5.12591 13.3326 4.81306L13.0885 3.38493L14.1222 2.37377C14.3485 2.15239 14.2231 1.76613 13.9095 1.72042L12.4821 1.51226L11.8435 0.213796C11.7034 -0.0712652 11.2957 -0.0712652 11.1556 0.213796L10.517 1.51226L9.0896 1.72042C8.77631 1.76603 8.65029 2.15215 8.87684 2.37377L9.91047 3.38493ZM10.8272 2.24181C10.8888 2.23283 10.9472 2.209 10.9975 2.17239C11.0478 2.13577 11.0884 2.08747 11.1159 2.03164L11.4995 1.25159L11.8831 2.03164C11.9106 2.08746 11.9512 2.13577 12.0015 2.17238C12.0518 2.209 12.1102 2.23283 12.1718 2.24181L13.0324 2.36735L12.4087 2.97739C12.3644 3.02074 12.3313 3.07419 12.3122 3.13316C12.293 3.19213 12.2885 3.25486 12.2989 3.31597L12.4458 4.17571C11.6045 3.73185 11.6245 3.72648 11.4995 3.72648C11.3729 3.72648 11.3843 3.73717 10.5531 4.17571L10.7 3.31597C10.7105 3.25486 10.7059 3.19213 10.6868 3.13316C10.6677 3.07418 10.6345 3.02073 10.5902 2.97739L9.96653 2.36735L10.8272 2.24181ZM5.66953 3.49173C5.75655 3.22397 6.00088 3.22766 6.24406 3.1923C6.35365 2.9702 6.42462 2.73842 6.70633 2.73842C6.98784 2.73842 7.05986 2.97193 7.16863 3.1923L7.43371 3.23082C7.74748 3.27644 7.87335 3.66323 7.64618 3.8847L7.45436 4.07168C7.4962 4.31577 7.57507 4.54506 7.34713 4.71061C7.11937 4.87612 6.92387 4.72949 6.70633 4.61511C6.48715 4.73035 6.29347 4.87621 6.06552 4.71061C5.83772 4.54515 5.91674 4.3139 5.95829 4.07168C5.78113 3.89889 5.58247 3.75964 5.66953 3.49173ZM2.31531 5.40843C2.40233 5.14067 2.64666 5.14436 2.88984 5.109L3.00839 4.86879C3.14874 4.58449 3.55546 4.58425 3.69591 4.86879L3.81446 5.109C4.05951 5.1446 4.30192 5.14048 4.38899 5.40843C4.47601 5.6762 4.27614 5.81683 4.10019 5.98838L4.14547 6.2524C4.18577 6.48729 4.00426 6.70053 3.76759 6.70053C3.64943 6.70053 3.60271 6.66358 3.3522 6.53181L3.11515 6.65649C2.8345 6.80398 2.5053 6.56516 2.55892 6.2524L2.60421 5.98838C2.42691 5.81559 2.22825 5.67634 2.31531 5.40843ZM15.2559 3.49173C15.3429 3.22397 15.5872 3.22766 15.8304 3.1923L15.9489 2.95209C16.0893 2.66775 16.496 2.6676 16.6365 2.95209L16.755 3.1923C17 3.2279 17.2425 3.22378 17.3295 3.49173C17.4165 3.7595 17.2167 3.90013 17.0407 4.07168L17.086 4.3357C17.1263 4.5706 16.9448 4.78383 16.7081 4.78383C16.59 4.78383 16.5433 4.74688 16.2927 4.61511L16.0557 4.73979C15.775 4.88728 15.4458 4.64846 15.4995 4.3357L15.5447 4.07168C15.3674 3.89889 15.1688 3.75964 15.2559 3.49173ZM18.6101 5.40843C18.6971 5.14067 18.9414 5.14436 19.1846 5.109L19.3032 4.86879C19.4435 4.58444 19.8502 4.5843 19.9907 4.86879L20.1092 5.109C20.3542 5.1446 20.5967 5.14048 20.6838 5.40843C20.7708 5.6762 20.5709 5.81683 20.395 5.98838L20.4402 6.2524C20.4805 6.48729 20.299 6.70053 20.0624 6.70053C19.9442 6.70053 19.8975 6.66358 19.647 6.53181L19.4099 6.65649C19.1293 6.80398 18.8001 6.56516 18.8537 6.2524L18.899 5.98838C18.7216 5.81559 18.523 5.67634 18.6101 5.40843ZM4.64731 15.7165C4.74898 15.7165 4.84648 15.7569 4.91837 15.8288C4.99026 15.9007 5.03065 15.9982 5.03065 16.0999V17.7291C5.03065 17.8307 4.99026 17.9282 4.91837 18.0001C4.84648 18.072 4.74898 18.1124 4.64731 18.1124C4.54564 18.1124 4.44814 18.072 4.37625 18.0001C4.30436 17.9282 4.26397 17.8307 4.26397 17.7291V16.0999C4.26397 15.9982 4.30436 15.9007 4.37625 15.8288C4.44814 15.7569 4.54564 15.7165 4.64731 15.7165ZM18.3517 18.1124C18.25 18.1124 18.1525 18.072 18.0806 18.0001C18.0088 17.9282 17.9684 17.8307 17.9684 17.7291V16.0999C17.9684 15.9982 18.0088 15.9007 18.0806 15.8288C18.1525 15.7569 18.25 15.7165 18.3517 15.7165C18.4534 15.7165 18.5509 15.7569 18.6228 15.8288C18.6947 15.9007 18.735 15.9982 18.735 16.0999V17.7291C18.735 17.8307 18.6947 17.9282 18.6228 18.0001C18.5509 18.072 18.4534 18.1124 18.3517 18.1124ZM13.7037 11.4519H9.29531C9.19364 11.4519 9.09613 11.4115 9.02424 11.3396C8.95235 11.2677 8.91197 11.1702 8.91197 11.0685C8.91197 10.9669 8.95235 10.8694 9.02424 10.7975C9.09613 10.7256 9.19364 10.6852 9.29531 10.6852H13.7037C13.8054 10.6852 13.9029 10.7256 13.9748 10.7975C14.0467 10.8694 14.0871 10.9669 14.0871 11.0685C14.0871 11.1702 14.0467 11.2677 13.9748 11.3396C13.9029 11.4115 13.8054 11.4519 13.7037 11.4519ZM13.0329 14.3748C13.1345 14.3748 13.232 14.4152 13.3039 14.4871C13.3758 14.559 13.4162 14.6565 13.4162 14.7582C13.4162 14.8599 13.3758 14.9574 13.3039 15.0292C13.232 15.1011 13.1345 15.1415 13.0329 15.1415H9.96615C9.86448 15.1415 9.76698 15.1011 9.69509 15.0292C9.6232 14.9574 9.58281 14.8599 9.58281 14.7582C9.58281 14.6565 9.6232 14.559 9.69509 14.4871C9.76698 14.4152 9.86448 14.3748 9.96615 14.3748H13.0329Z"></path>
                                                    </g>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_hotel']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_transport'])) : ?>
                                    <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_transports']) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="Transport-tab" data-bs-toggle="tab" data-bs-target="#Transport" type="button" role="tab" aria-controls="Transport" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 51 51">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M45.8564 34.4958C45.8564 35.7619 46.8834 36.7871 48.1488 36.7871H50.2528C50.5289 36.7871 50.7528 36.5633 50.7528 36.2871V31.249C50.7528 30.9728 50.5289 30.749 50.2528 30.749H48.1488C46.883 30.749 45.8564 31.7757 45.8564 33.0413V34.4958ZM48.1488 35.7871C47.435 35.7871 46.8564 35.2088 46.8564 34.4958V33.0413C46.8564 32.328 47.4354 31.749 48.1488 31.749H49.7528V35.7871H48.1488Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.578816 36.5923C0.673478 36.7152 0.819779 36.7871 0.974858 36.7871H3.80037C5.06692 36.7871 6.09273 35.7617 6.09273 34.4958V33.0413C6.09273 31.7758 5.0673 30.749 3.80037 30.749H2.30235C2.07527 30.749 1.87671 30.902 1.81885 31.1216L0.49136 36.1597C0.451847 36.3097 0.484154 36.4695 0.578816 36.5923ZM1.62367 35.7871L2.68767 31.749H3.80037C4.51466 31.749 5.09273 32.3277 5.09273 33.0413V34.4958C5.09273 35.209 4.51504 35.7871 3.80037 35.7871H1.62367Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.26435 27.315C8.26436 27.3149 8.26435 27.315 8.26435 27.315L10.3466 19.4132C10.3639 19.3473 10.4026 19.2887 10.4565 19.247C10.5105 19.2054 10.5767 19.1828 10.6448 19.1827H18.1558C18.6207 19.1827 18.9975 19.5595 18.9975 20.0243V27.5296C18.9975 27.9943 18.6207 28.3711 18.1558 28.3711H9.07815C8.52629 28.3711 8.12377 27.8488 8.26435 27.315ZM7.29734 27.0602C6.98972 28.2281 7.87034 29.3711 9.07815 29.3711H18.1558C19.1729 29.3711 19.9975 28.5466 19.9975 27.5296V20.0243C19.9975 19.0073 19.173 18.1827 18.1558 18.1827H10.6442C10.3553 18.183 10.0741 18.2789 9.84539 18.4555C9.61672 18.6321 9.4529 18.8793 9.37949 19.1587L7.29734 27.0602Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.2215 28.3711C24.7567 28.3711 24.3799 27.9943 24.3799 27.5295V20.0243C24.3799 19.5596 24.7566 19.1828 25.2215 19.1828H32.4557C32.5237 19.1828 32.5898 19.2054 32.6436 19.2469C32.6974 19.2884 32.736 19.3466 32.7533 19.4123L33.3161 21.5481C33.3864 21.8151 33.6599 21.9746 33.9269 21.9042C34.194 21.8339 34.3534 21.5604 34.2831 21.2933L33.7204 19.1577C33.6469 18.8785 33.483 18.6314 33.2543 18.455C33.0257 18.2787 32.7451 18.1829 32.4563 18.1828H25.2215C24.2044 18.1828 23.3799 19.0073 23.3799 20.0243V27.5295C23.3799 28.5466 24.2044 29.3711 25.2215 29.3711H34.0221C35.2493 29.3711 36.1076 28.2048 35.7966 27.0381L35.792 27.0209L35.7916 27.0191L35.0628 24.2527C34.9924 23.9857 34.719 23.8263 34.4519 23.8966C34.1849 23.967 34.0254 24.2405 34.0958 24.5075L34.825 27.2756L34.8255 27.2774L34.8304 27.2957C34.9772 27.8466 34.5727 28.3711 34.0221 28.3711H25.2215Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0698 41.0047C11.0698 42.687 12.4336 44.0508 14.1159 44.0508C15.7983 44.0508 17.162 42.687 17.162 41.0047C17.162 39.3224 15.7983 37.9586 14.1159 37.9586C12.4336 37.9586 11.0698 39.3224 11.0698 41.0047ZM14.1159 43.0508C12.9859 43.0508 12.0698 42.1347 12.0698 41.0047C12.0698 39.8746 12.9859 38.9586 14.1159 38.9586C15.246 38.9586 16.162 39.8746 16.162 41.0047C16.162 42.1347 15.246 43.0508 14.1159 43.0508Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M32.3147 41.0047C32.3147 42.687 33.6785 44.0508 35.3608 44.0508C37.0431 44.0508 38.4069 42.687 38.4069 41.0047C38.4069 39.3224 37.0431 37.9586 35.3608 37.9586C33.6785 37.9586 32.3147 39.3224 32.3147 41.0047ZM35.3608 43.0508C34.2308 43.0508 33.3147 42.1347 33.3147 41.0047C33.3147 39.8746 34.2308 38.9586 35.3608 38.9586C36.4908 38.9586 37.4069 39.8746 37.4069 41.0047C37.4069 42.1347 36.4908 43.0508 35.3608 43.0508Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.52888 13.9199C6.44663 13.9199 5.56934 13.0427 5.56934 11.9605V8.40513C5.56934 7.32301 6.44664 6.44568 7.52888 6.44568H12.0994V13.9199H7.52888ZM4.56934 11.9605C4.56934 13.595 5.8944 14.9199 7.52888 14.9199H12.5994C12.8755 14.9199 13.0994 14.6961 13.0994 14.4199V5.94568C13.0994 5.66954 12.8755 5.44568 12.5994 5.44568H7.52888C5.89439 5.44568 4.56934 6.7707 4.56934 8.40513V11.9605Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0996 14.4199C12.0996 14.6961 12.3235 14.9199 12.5996 14.9199H17.2592C17.5354 14.9199 17.7592 14.6961 17.7592 14.4199V5.94568C17.7592 4.38279 16.4923 3.11582 14.9294 3.11582C13.3666 3.11582 12.0996 4.3828 12.0996 5.94568V14.4199ZM13.0996 13.9199V5.94568C13.0996 4.93506 13.9189 4.11582 14.9294 4.11582C15.94 4.11582 16.7592 4.93507 16.7592 5.94568V13.9199H13.0996Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.759 14.4199C16.759 14.6961 16.9829 14.9199 17.259 14.9199H25.1014C25.3775 14.9199 25.6014 14.6961 25.6014 14.4199V5.94568C25.6014 5.66954 25.3775 5.44568 25.1014 5.44568H17.259C16.9829 5.44568 16.759 5.66954 16.759 5.94568V14.4199ZM17.759 13.9199V6.44568H24.6014V13.9199H17.759Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.6016 14.4199C24.6016 14.6961 24.8254 14.9199 25.1016 14.9199H29.7612C30.0373 14.9199 30.2612 14.6961 30.2612 14.4199V5.94568C30.2612 4.38279 28.9942 3.11582 27.4313 3.11582C25.8684 3.11582 24.6016 4.38282 24.6016 5.94568V14.4199ZM25.6016 13.9199V5.94568C25.6016 4.93504 26.4207 4.11582 27.4313 4.11582C28.4419 4.11582 29.2612 4.93507 29.2612 5.94568V13.9199H25.6016Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.791 11.9609C36.791 12.2371 37.0149 12.4609 37.291 12.4609H40.6825C41.9404 12.4609 42.9601 11.4412 42.9601 10.1833C42.9601 8.92542 41.9404 7.90569 40.6825 7.90569H37.291C37.0149 7.90569 36.791 8.12955 36.791 8.40569V11.9609ZM37.791 11.4609V8.90569H40.6825C41.3881 8.90569 41.9601 9.47771 41.9601 10.1833C41.9601 10.8889 41.3881 11.4609 40.6825 11.4609H37.791Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M29.261 14.4199C29.261 14.6961 29.4848 14.9199 29.761 14.9199H34.8315C36.466 14.9199 37.791 13.595 37.791 11.9605V8.40513C37.791 6.7707 36.466 5.44568 34.8315 5.44568H29.761C29.4848 5.44568 29.261 5.66954 29.261 5.94568V14.4199ZM30.261 13.9199V6.44568H34.8315C35.9137 6.44568 36.791 7.32301 36.791 8.40513V11.9605C36.791 13.0427 35.9137 13.9199 34.8315 13.9199H30.261Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.23584 41.0046C7.23584 44.8044 10.3162 47.8848 14.116 47.8848C17.9158 47.8848 20.9962 44.8044 20.9962 41.0046C20.9962 37.2048 17.9158 34.1244 14.116 34.1244C10.3162 34.1244 7.23584 37.2048 7.23584 41.0046ZM14.116 46.8848C10.8685 46.8848 8.23584 44.2521 8.23584 41.0046C8.23584 37.7571 10.8685 35.1244 14.116 35.1244C17.3635 35.1244 19.9962 37.7571 19.9962 41.0046C19.9962 44.2521 17.3635 46.8848 14.116 46.8848Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.34781 36.8327C1.34784 36.8326 1.34778 36.8328 1.34781 36.8327L1.45832 36.4151L2.78595 31.3765L3.76729 27.6525C3.83766 27.3855 3.67824 27.112 3.41121 27.0416C3.14418 26.9712 2.87067 27.1306 2.80031 27.3977L1.81896 31.1217L0.380936 36.5774C-0.286037 39.1098 1.62328 41.5898 4.24304 41.5898H7.73792C7.87144 41.5898 7.99942 41.5364 8.09334 41.4415C8.18725 41.3466 8.2393 41.2181 8.23789 41.0846C8.23769 41.0652 8.23702 41.0463 8.2366 41.0341L8.23647 41.0303C8.23598 41.0161 8.23583 41.0097 8.23583 41.0051C8.23583 37.7575 10.8685 35.1249 14.116 35.1249C17.3635 35.1249 19.9961 37.7575 19.9961 41.0051C19.9961 41.0248 19.996 41.0263 19.9956 41.0287C19.9953 41.0318 19.9947 41.0365 19.994 41.0828C19.9921 41.2166 20.044 41.3456 20.1379 41.4409C20.2319 41.5362 20.3601 41.5898 20.494 41.5898H28.9827C29.1166 41.5898 29.2448 41.5362 29.3388 41.4409C29.4327 41.3456 29.4846 41.2166 29.4827 41.0828C29.4821 41.0402 29.4815 41.0338 29.4811 41.0294C29.4808 41.0258 29.4806 41.0236 29.4806 41.0051C29.4806 37.7575 32.1132 35.1249 35.3607 35.1249C38.6082 35.1249 41.2409 37.7575 41.2409 41.0051C41.2409 41.0097 41.2407 41.0161 41.2402 41.0303L41.2401 41.0341C41.2397 41.0462 41.239 41.0652 41.2388 41.0846C41.2374 41.2181 41.2894 41.3466 41.3834 41.4415C41.4773 41.5364 41.6053 41.5898 41.7388 41.5898H46.7595C48.9651 41.5898 50.7529 39.8019 50.7529 37.5955V31.2491C50.7529 29.0436 48.9651 27.2556 46.7595 27.2556H41.6271C41.2359 27.2555 40.8556 27.126 40.5458 26.8872C40.2359 26.6483 40.0138 26.3136 39.9141 25.9353L37.8427 18.0728C37.1983 15.6254 34.9851 13.9204 32.4561 13.9204H10.6442C8.11412 13.9204 5.90196 15.6254 5.25754 18.0728L3.58772 24.4094C3.51735 24.6764 3.67677 24.9499 3.9438 25.0203C4.21083 25.0907 4.48434 24.9312 4.5547 24.6642L6.22455 18.3275C6.75333 16.3193 8.56839 14.9204 10.6442 14.9204H32.4561C34.5309 14.9204 36.3469 16.3193 36.8757 18.3274L38.9471 26.1901C39.1031 26.782 39.4505 27.3056 39.9353 27.6792C40.4201 28.0528 41.0149 28.2555 41.627 28.2556H46.7595C48.4127 28.2556 49.7529 29.5959 49.7529 31.2491V37.5955C49.7529 39.2498 48.4127 40.5898 46.7595 40.5898H42.2285C42.0139 36.9834 39.0211 34.1249 35.3607 34.1249C31.7003 34.1249 28.7077 36.9834 28.493 40.5898H20.9838C20.7691 36.9834 17.7764 34.1249 14.116 34.1249C10.4556 34.1249 7.46284 36.9834 7.24815 40.5898H4.24304C2.2795 40.5898 0.848019 38.7312 1.34781 36.8327Z"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28.4805 41.0046C28.4805 44.8044 31.5608 47.8848 35.3606 47.8848C39.1604 47.8848 42.2408 44.8044 42.2408 41.0046C42.2408 37.2048 39.1604 34.1244 35.3606 34.1244C31.5608 34.1244 28.4805 37.2048 28.4805 41.0046ZM35.3606 46.8848C32.1131 46.8848 29.4805 44.2521 29.4805 41.0046C29.4805 37.7571 32.1131 35.1244 35.3606 35.1244C38.6082 35.1244 41.2408 37.7571 41.2408 41.0046C41.2408 44.2521 38.6082 46.8848 35.3606 46.8848Z"></path>
                                                </svg>
                                                <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_name_transport']); ?>
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content" id="facilitesTabContent">
                                <div class="tab-pane fade show active" id="Tour" role="tabpanel" aria-labelledby="Tour-tab">
                                    <div class="row g-4">
                                        <?php
                                        while ($query->have_posts()) :
                                            $query->the_post(); ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="package-card3 style-5">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <div class="package-card-img">
                                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('card-thumb'); ?></a>
                                                            <div class="package-card-img-bottom">
                                                                <div class="location-area">
                                                                    <ul class="location-list">
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
                                                            <?php $selected_destination = Egns_Helper::egns_tours_value('tour_destination_select');
                                                            if (!empty(Egns_Helper::egns_tours_value('tour_destination_select'))) :  ?>
                                                                <div class="location">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                        <path d="M8.99939 0C5.40484 0 2.48047 2.92437 2.48047 6.51888C2.48047 10.9798 8.31426 17.5287 8.56264 17.8053C8.79594 18.0651 9.20326 18.0646 9.43613 17.8053C9.68451 17.5287 15.5183 10.9798 15.5183 6.51888C15.5182 2.92437 12.5939 0 8.99939 0ZM8.99939 9.79871C7.19088 9.79871 5.71959 8.32739 5.71959 6.51888C5.71959 4.71037 7.19091 3.23909 8.99939 3.23909C10.8079 3.23909 12.2791 4.71041 12.2791 6.51892C12.2791 8.32743 10.8079 9.79871 8.99939 9.79871Z"></path>
                                                                    </svg>
                                                                    <ul class="locations-list">
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
                                                    <?php endif; ?>
                                                    <div class="package-card-content">
                                                        <div class="card-content-top">
                                                            <?php if (function_exists('run_reviewx')) : ?>
                                                                <div class="rating-area">
                                                                    <?php echo do_shortcode('[rvx-star-count]') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
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
                                                            <?php if (!empty(Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                                <div class="date">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                                                        <g>
                                                                            <path d="M11.9363 6.40178V2.87087C11.9363 2.03169 11.2491 1.33856 10.4099 1.33856H10.2197V1.0992C10.2197 0.500453 9.73434 0.0150575 9.13559 0.0150575C8.53684 0.0150575 8.05145 0.500453 8.05145 1.0992V1.33856H4.07625V1.0992C4.07625 0.492141 3.58411 0 2.97705 0C2.36999 0 1.87785 0.492141 1.87785 1.0992V1.33856H1.71357C0.874357 1.33856 0.191406 2.03169 0.191406 2.87087V10.9786C0.191406 11.8178 0.874357 12.5113 1.71357 12.5113H6.48965C6.87863 12.9765 7.36483 13.351 7.91405 13.6082C8.46327 13.8654 9.06217 13.9991 9.66863 14C11.9483 14 13.8054 12.1426 13.8054 9.86282C13.8055 8.41786 13.0506 7.14122 11.9363 6.40178ZM8.65375 1.0992C8.64911 0.836899 8.85796 0.620492 9.12026 0.615854C9.12448 0.615794 9.1287 0.615763 9.13291 0.615794C9.39769 0.612993 9.61463 0.825365 9.61743 1.09017C9.61746 1.09318 9.61746 1.09619 9.61743 1.0992V2.27212H8.65375V1.0992ZM2.48015 1.0992C2.48302 0.82934 2.70412 0.612903 2.97398 0.615763C2.97444 0.615758 2.97491 0.615768 2.97537 0.615794C3.24622 0.615794 3.47395 0.828376 3.47395 1.0992V2.27212H2.48015V1.0992ZM0.793708 2.87087C0.793708 2.36376 1.20647 1.94086 1.71357 1.94086H1.87785V2.5858C1.87785 2.7521 2.01674 2.87443 2.18307 2.87443H3.76773C3.93402 2.87443 4.07625 2.7521 4.07625 2.5858V1.94086H8.05145V2.5858C8.05035 2.62405 8.05708 2.66211 8.07122 2.69766C8.08537 2.7332 8.10663 2.76548 8.13371 2.79251C8.16078 2.81954 8.1931 2.84075 8.22867 2.85484C8.26424 2.86893 8.30231 2.87559 8.34055 2.87443H9.92521C9.96374 2.87571 10.0021 2.86916 10.038 2.85519C10.074 2.84121 10.1067 2.8201 10.1342 2.79312C10.1617 2.76614 10.1835 2.73386 10.1982 2.69822C10.2129 2.66259 10.2202 2.62435 10.2197 2.5858V1.94086H10.4099C10.9204 1.94601 11.3321 2.36033 11.334 2.87087V3.83811H0.793708V2.87087ZM1.71357 11.909C1.20647 11.909 0.793708 11.4857 0.793708 10.9786V4.44041H11.334V6.07428C10.8098 5.84412 10.2434 5.72538 9.67092 5.7256C7.39121 5.7256 5.5353 7.58572 5.5353 9.8655C5.53415 10.5817 5.71928 11.2859 6.07253 11.909H1.71357ZM9.66863 13.3923C7.71783 13.3923 6.1364 11.8109 6.1364 9.86011C6.1364 7.90931 7.71783 6.32788 9.66863 6.32788C11.6194 6.32788 13.2009 7.90931 13.2009 9.86011V9.86014C13.1987 11.81 11.6185 13.3901 9.66863 13.3923Z"></path>
                                                                            <path d="M11.0857 9.86116H9.76636V8.04914C9.76636 7.88281 9.63154 7.74799 9.46521 7.74799C9.29889 7.74799 9.16406 7.88281 9.16406 8.04914V10.162C9.16533 10.2425 9.19823 10.3192 9.25565 10.3757C9.31306 10.4321 9.39038 10.4636 9.47087 10.4635H11.0857C11.252 10.4635 11.3869 10.3286 11.3869 10.1623C11.3869 9.99599 11.252 9.86116 11.0857 9.86116Z"></path>
                                                                        </g>
                                                                    </svg>
                                                                    <span><?php echo esc_html__(Egns_Helper::egns_tours_value('tour_duration')); ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec'])) : ?>
                                                                <div class="book-btn">
                                                                    <a href="<?php the_permalink(); ?>" class="primary-btn5">
                                                                        <span>
                                                                            <?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec']); ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="6" viewBox="0 0 15 6">
                                                                                <path d="M1 2.5C0.723858 2.5 0.5 2.72386 0.5 3C0.5 3.27614 0.723858 3.5 1 3.5V2.5ZM15 3L10 0.113249V5.88675L15 3ZM1 3.5H10.5V2.5H1V3.5Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </a>
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
                                <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_hotels']) : ?>
                                    <div class="tab-pane fade" id="Hotel" role="tabpanel" aria-labelledby="Hotel-tab">
                                        <div class="row g-4">
                                            <?php
                                            while ($query2->have_posts()) :
                                                $query2->the_post(); ?>
                                                <div class="col-xxl-4 col-md-6">
                                                    <div class="room-suits-card two">
                                                        <div class="row g-0">
                                                            <div class="col-md-12">
                                                                <div class="swiper hotel-img-slider">
                                                                    <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'))) : ?>
                                                                        <span class="batch"><?php echo Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'); ?></span>
                                                                    <?php endif; ?>
                                                                    <div class="swiper-wrapper">
                                                                        <?php if (has_post_thumbnail()) : ?>
                                                                            <div class="swiper-slide">
                                                                                <div class="room-img">
                                                                                    <?php the_post_thumbnail('card-thumb'); ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <?php foreach (Egns_Helper::egns_hotel_gallery('hotel_gallery') as $key => $data) : ?>
                                                                            <?php if (!empty($data)) : ?>
                                                                                <div class="swiper-slide">
                                                                                    <div class="room-img">
                                                                                        <img src="<?php echo wp_get_attachment_url($data); ?>" alt="<?php echo esc_attr__('hotel-img', 'triprex-core'); ?>" />
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                    <div class="swiper-pagination5"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="room-content">
                                                                    <div class="content-top">
                                                                        <?php if (function_exists('run_reviewx')) : ?>
                                                                            <div class="reviews">
                                                                                <?php echo do_shortcode('[rvx-star-count]') ?>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                                        <ul class="loaction-area">
                                                                            <li><i class="bi bi-geo-alt"></i></li>
                                                                            <li>

                                                                                <?php echo Egns_Helper::egns_hotel_value('hotel_location_text'); ?>
                                                                                <?php
                                                                                $map_link = Egns_Helper::egns_hotel_value('hotel_location_link');
                                                                                if (!empty($map_link)) :
                                                                                ?>
                                                                                    <a href="<?php echo esc_url($map_link['url']) ?>"><?php echo $map_link['text'] ?></a>
                                                                                <?php endif; ?>
                                                                                <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_distance'))) : ?>
                                                                                    <span><?php echo Egns_Helper::egns_hotel_value('hotel_distance'); ?></span>
                                                                                <?php endif; ?>
                                                                            </li>
                                                                        </ul>
                                                                        <ul class="facilisis">
                                                                            <?php
                                                                            $highlights = (array) Egns_Helper::egns_hotel_value('hotel_highlights_repeater');
                                                                            foreach (array_slice($highlights, 0, 5) as $index => $highlight) :
                                                                            ?>
                                                                                <li>
                                                                                    <?php if (!empty($highlight['hotel_highlights_media']['url'])) : ?>
                                                                                        <img src="<?php echo esc_url($highlight['hotel_highlights_media']['url']); ?>" alt="<?php echo esc_attr__('highlights-image', 'triprex-core'); ?>" />
                                                                                    <?php endif; ?>
                                                                                    <?php if (!empty($highlight['hotel_highlights_title'])) : ?>
                                                                                        <?php echo esc_html($highlight['hotel_highlights_title']); ?>
                                                                                    <?php endif; ?>
                                                                                </li>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="content-bottom">
                                                                        <div class="room-type">
                                                                            <?php
                                                                            $post_id = get_the_ID();
                                                                            $terms = get_the_terms($post_id, 'room-type');
                                                                            if ($terms && !is_wp_error($terms)) {
                                                                                foreach ($terms as $index => $term) {
                                                                            ?>
                                                                                    <?php if (!empty($term->name)) : ?>
                                                                                        <h6><?php echo esc_html($term->name); ?></h6>
                                                                                    <?php endif; ?>
                                                                            <?php }
                                                                            }; ?>
                                                                            <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_room_info'))) : ?>
                                                                                <span><?php echo Egns_Helper::egns_hotel_value('hotel_room_info'); ?></span>
                                                                            <?php endif; ?>
                                                                            <div class="deals">
                                                                                <span><?php if (!empty(Egns_Helper::egns_hotel_value('hotel_cancellation_label'))) : ?> <strong><?php echo Egns_Helper::egns_hotel_value('hotel_cancellation_label'); ?></strong> <br><?php endif; ?>
                                                                                    <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_cancellation_duration'))) : ?><?php echo Egns_Helper::egns_hotel_value('hotel_cancellation_duration'); ?> <?php endif; ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="price-and-book">
                                                                            <div class="price-area">
                                                                                <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_duration_person'))) : ?>
                                                                                    <p><?php echo Egns_Helper::egns_hotel_value('hotel_duration_person'); ?></p>
                                                                                <?php endif; ?>
                                                                                <?php echo \Egns_Core\Egns_Helper::egns_get_hotel_pack_price() ?>
                                                                            </div>
                                                                            <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_hotel'])) : ?>
                                                                                <div class="book-btn">
                                                                                    <a href="<?php the_permalink(); ?>" class="primary-btn2"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_hotel']); ?> <i class="bi bi-arrow-right"></i></a>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                <?php endif; ?>
                                <?php if ('yes' === $settings['triprex_custom_post_tab_on_off_transports']) : ?>
                                    <div class="tab-pane fade" id="Transport" role="tabpanel" aria-labelledby="Transport-tab">
                                        <div class="row g-4">
                                            <?php
                                            while ($query3->have_posts()) :
                                                $query3->the_post(); ?>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="transport-card">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <a href="<?php the_permalink(); ?>" class="transport-img">
                                                                <?php the_post_thumbnail('card-thumb'); ?>
                                                                <?php if (!empty(Egns_Helper::egns_transport_value('transport_distance_field'))) : ?>
                                                                    <span><?php echo Egns_Helper::egns_transport_value('transport_distance_field'); ?></span>
                                                                <?php endif; ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <div class="transport-content">
                                                            <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                                            <div class="transport-type">
                                                                <?php
                                                                $post_id = get_the_ID();
                                                                $terms = get_the_terms($post_id, 'transport-type');
                                                                if ($terms && !is_wp_error($terms)) : ?>
                                                                    <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_available_transport'])) : ?>
                                                                        <h6><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_available_transport']); ?> :</h6>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <div class="row g-2">
                                                                    <?php
                                                                    $post_id = get_the_ID();
                                                                    $terms = get_the_terms($post_id, 'transport-type');
                                                                    if ($terms && !is_wp_error($terms)) {
                                                                        foreach ($terms as $index => $term) {
                                                                            $meta = get_term_meta($term->term_id, 'triprex-transport-type', true);
                                                                            if ($meta['triprex_transport_type_logo'] ?? '') :
                                                                                $logo = $meta['triprex_transport_type_logo']['url'];
                                                                            endif;
                                                                    ?>
                                                                            <div class="col-3">
                                                                                <div class="single-transport">
                                                                                    <?php if ($logo  ?? '') : ?>
                                                                                        <img src="<?php echo esc_url($logo) ?>" alt="<?php echo esc_attr__('transport-img', 'triprex-core'); ?>" />
                                                                                    <?php endif; ?>
                                                                                    <?php if (!empty($term->name)) : ?>
                                                                                        <span><?php echo esc_html($term->name); ?></span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                    <?php }
                                                                    } ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-bottom">
                                                                <?php if (!empty($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_transport'])) : ?>
                                                                    <div class="details-btn">
                                                                        <a href="<?php the_permalink(); ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_tour_facilities_tab_one_section_genaral_button_sec_transport']); ?></a>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if (function_exists('run_reviewx')) : ?>
                                                                    <div class="review-area">
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Custom_Post_Tab_Widget());
