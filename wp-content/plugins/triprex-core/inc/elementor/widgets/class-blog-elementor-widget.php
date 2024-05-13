<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Egns_Core\Egns_Helper;
use Egns\Inc\Blog_Helper;

class Triprex_Blog_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_blog';
    }

    public function get_title()
    {
        return esc_html__('EG Blog', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'triprex_blog_one_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_blog_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'triprex-core'),
                    'style_two' => esc_html__('Style Two', 'triprex-core'),
                    'style_three' => esc_html__('Style Three', 'triprex-core'),
                    'style_four' => esc_html__('Style Four', 'triprex-core'),
                    'style_five' => esc_html__('Style Five', 'triprex-core'),
                    'style_six' => esc_html__('Style Six', 'triprex-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'triprex_blog_heading_title_area',
            [
                'label' => esc_html__('Heading Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_blog_content_style_selection' => ['style_one', 'style_four', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'triprex_blog_style_one_turn_on_vector_image',
            [
                'label' => esc_html__('Vector Image Turn On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'triprex_blog_content_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'triprex_blog_style_one_subtitle',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Latest Blog', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_blog_content_style_selection' => ['style_one', 'style_five', 'style_six'],
                ]

            ]
        );

        $this->add_control(
            'triprex_blog_style_one_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Latest Travel Blog', 'triprex-core'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_blog_content_style_selection' => ['style_one', 'style_four', 'style_five', 'style_six'],
                ]

            ]
        );

        $this->add_control(
            'triprex_blog_style_one_description',
            [
                'label' => esc_html__('Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim.', 'triprex-core'),
                'placeholder' => esc_html__('Type your short description here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_blog_content_style_selection' => ['style_four'],
                ]

            ]
        );

        $this->add_control(
            'triprex_blog_style_four_button_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_blog_content_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'triprex_blog_style_four_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Blog', 'triprex-core'),
                'placeholder' => esc_html__('Type your button here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_blog_content_style_selection' => ['style_four'],
                ]

            ]
        );

        $this->add_control(
            'triprex_blog_style_four_url',
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
                    'triprex_blog_content_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'triprex_blog_heading_query_area',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_blog_content_style_selection' => ['style_one', 'style_four'],
                ]

            ]
        );

        $this->add_control(
            'triprex_blog_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 2,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'triprex_blog_template_orderby',
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
            'blog_post_list',
            [
                'label'         => __('Post Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_blog_post_options(),
            ]
        );
        $this->add_control(
            'selected_categories',
            [
                'label' => __('Categories', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => Egns_Helper::get_blog_categories(),
            ]
        );


        $this->add_control(
            'triprex_blog_template_order',
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
            'triprex_blog_button_area',
            [
                'label' => esc_html__('Button Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'triprex_blog_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View Post', 'triprex-core'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();



        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_style_one_blog_style',
            [
                'label' => esc_html__('Blog Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_blog_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'triprex_blog_heading_area_style_one_subtitle',
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
                'name'     => 'triprex_blog_heading_area_style_one_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title span',

            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_one_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_one_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_one_title',
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
                'name'     => 'triprex_blog_heading_area_style_one_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_one_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_blog_cardone_author_meta',
            [
                'label' => esc_html__('Author Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_cardone_name_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a ',

            ]
        );

        $this->add_control(
            'triprex_blog_cardone_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardone_name_dot_color',
            [
                'label'     => esc_html__('Dot Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardone_name_text_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li ' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'triprex_blog_title',
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
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content h5 a',

            ]
        );

        $this->add_control(
            'triprex_style_one_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_one_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_social_share_icon',
            [
                'label' => esc_html__('Social Icons', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_social_share_icon_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area .social-list li a',

            ]
        );

        $this->add_control(
            'triprex_blog_social_share_icon_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area .social-list li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_social_share_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area .social-list li:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_blog_date_style_one',
            [
                'label' => esc_html__('Blog Date', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_date_style_one_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-img-wrap .date span',

            ]
        );

        $this->add_control(
            'triprex_blog_date_style_one_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-img-wrap .date span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_date_style_one_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-img-wrap .date' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_date_style_one_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card:hover .blog-card-img-wrap .date' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_blog_button',
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
                'name'     => 'triprex_style_one_btn_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a',

            ]
        );

        $this->add_control(
            'triprex_style_one_btn_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a span svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_btn_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover span svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_reading_time',
            [
                'label' => esc_html__('Reading Time', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_reading_time_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span',

            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        // =====================Style Two=======================//

        $this->start_controls_section(
            'triprex_style_two_blog_style',
            [
                'label' => esc_html__('Blog Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_blog_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_blog_cardtwo_author_meta',
            [
                'label' => esc_html__('Author Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_cardtwo_name_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a ',

            ]
        );

        $this->add_control(
            'triprex_blog_cardtwo_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardtwo_name_dot_color',
            [
                'label'     => esc_html__('Dot Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardtwo_name_text_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li ' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'triprex_blog_title_two',
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
                'name'     => 'triprex_style_two_title_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content h5 a',

            ]
        );

        $this->add_control(
            'triprex_style_two_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_two_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_button_two',
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
                'name'     => 'triprex_style_two_btn_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a',

            ]
        );

        $this->add_control(
            'triprex_style_two_btn_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a span svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_btn_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover span svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_two',
            [
                'label' => esc_html__('Reading Time', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_reading_time_two_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span',

            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_two_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        // =====================Style Three=======================//

        $this->start_controls_section(
            'triprex_style_three_blog_style',
            [
                'label' => esc_html__('Blog Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_blog_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_blog_cardthree_author_meta',
            [
                'label' => esc_html__('Author Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_cardthree_name_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a ',

            ]
        );

        $this->add_control(
            'triprex_blog_cardthree_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardthree_name_dot_color',
            [
                'label'     => esc_html__('Dot Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardthree_name_text_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li ' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'triprex_blog_title_three',
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
                'name'     => 'triprex_style_three_title_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content h5 a',

            ]
        );

        $this->add_control(
            'triprex_style_three_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_three_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_button_three',
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
                'name'     => 'triprex_style_three_btn_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a',

            ]
        );

        $this->add_control(
            'triprex_style_three_btn_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a span svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_three_btn_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover span svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_date_style_three',
            [
                'label' => esc_html__('Blog Date', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_date_style_three_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top .blog-date a',

            ]
        );

        $this->add_control(
            'triprex_blog_date_style_three_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top .blog-date a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_date_style_three_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top .blog-date a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_blog_reading_time_three',
            [
                'label' => esc_html__('Comments', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_reading_time_three_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span',

            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_three_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        // =====================Style Four=======================//

        $this->start_controls_section(
            'triprex_style_four_blog_style',
            [
                'label' => esc_html__('Blog Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_blog_content_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_control(
            'triprex_blog_heading_area_style_four_subtitle',
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
                'name'     => 'triprex_blog_heading_area_style_four_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_four_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_four_short_description',
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
                'name'     => 'triprex_blog_heading_area_style_four_title_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_four_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_blog_cardfour_author_meta',
            [
                'label' => esc_html__('Author Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_cardfour_name_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a ',

            ]
        );

        $this->add_control(
            'triprex_blog_cardfour_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardfour_name_dot_color',
            [
                'label'     => esc_html__('Dot Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardfour_name_text_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li ' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'triprex_blog_title_four',
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
                'name'     => 'triprex_style_four_title_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content h5 a',

            ]
        );

        $this->add_control(
            'triprex_style_four_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_four_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_date_style_four',
            [
                'label' => esc_html__('Blog Date', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_date_style_four_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-img-wrap .date span',

            ]
        );

        $this->add_control(
            'triprex_blog_date_style_four_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-img-wrap .date span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_date_style_four_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-img-wrap .date' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_date_style_four_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card:hover .blog-card-img-wrap .date' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_button_four',
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
                'name'     => 'triprex_style_four_btn_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a',

            ]
        );

        $this->add_control(
            'triprex_style_four_btn_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a span svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_four_btn_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover span svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_four',
            [
                'label' => esc_html__('Reading Time', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_reading_time_four_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span',

            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_four_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_blog_button_two_four',
            [
                'label' => esc_html__('Button Two', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_btn_two_typ',
                'selector' => '{{WRAPPER}} .view-btn',

            ]
        );

        $this->add_control(
            'triprex_style_four_btn_two_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .view-btn .arrow svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_four_btn_two_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .view-btn .arrow svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        // =====================Style five=======================//

        $this->start_controls_section(
            'triprex_style_five_blog_style',
            [
                'label' => esc_html__('Blog Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_blog_content_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_control(
            'triprex_blog_heading_area_style_five_subtitle',
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
                'name'     => 'triprex_blog_heading_area_style_five_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title4 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_five_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_five_subtitle_icon_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_five_title',
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
                'name'     => 'triprex_blog_heading_area_style_five_title_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_five_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_blog_cardfive_author_meta',
            [
                'label' => esc_html__('Author Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_cardfive_name_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a ',

            ]
        );

        $this->add_control(
            'triprex_blog_cardfive_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardfive_name_dot_color',
            [
                'label'     => esc_html__('Dot Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardfive_name_text_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li ' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'triprex_blog_title_five',
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
                'name'     => 'triprex_style_five_title_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content h5 a',

            ]
        );

        $this->add_control(
            'triprex_style_five_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_five_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_social_share_icon_five',
            [
                'label' => esc_html__('Social Icons', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_social_share_icon_five_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area .social-list li a',

            ]
        );

        $this->add_control(
            'triprex_blog_social_share_icon_five_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area .social-list li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_social_share_icon_five_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area .social-list li:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_button_five',
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
                'name'     => 'triprex_style_five_btn_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a',

            ]
        );

        $this->add_control(
            'triprex_style_five_btn_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a span svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_five_btn_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover span svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_five',
            [
                'label' => esc_html__('Reading Time', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_reading_time_five_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span',

            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_five_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        // =====================Style six=======================//

        $this->start_controls_section(
            'triprex_style_six_blog_style',
            [
                'label' => esc_html__('Blog Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_blog_content_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_six_subtitle',
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
                'name'     => 'triprex_blog_heading_area_style_six_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title5 span',

            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_six_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_six_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_blog_heading_area_style_six_title',
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
                'name'     => 'triprex_blog_heading_area_style_six_title_typ',
                'selector' => '{{WRAPPER}} .section-title5 h2',

            ]
        );

        $this->add_control(
            'triprex_blog_heading_area_style_six_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_blog_cardsix_author_meta',
            [
                'label' => esc_html__('Author Meta', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_cardsix_name_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a ',

            ]
        );

        $this->add_control(
            'triprex_blog_cardsix_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardsix_name_dot_color',
            [
                'label'     => esc_html__('Dot Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_cardsix_name_text_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .blog-card-content-top > ul li ' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'triprex_blog_title_six',
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
                'name'     => 'triprex_style_six_title_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content h5 a',

            ]
        );

        $this->add_control(
            'triprex_style_six_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_six_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_button_six',
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
                'name'     => 'triprex_style_six_btn_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a',

            ]
        );

        $this->add_control(
            'triprex_style_six_btn_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a span svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_six_btn_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > a:hover span svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_six',
            [
                'label' => esc_html__('Reading Time', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_blog_reading_time_six_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span',

            ]
        );

        $this->add_control(
            'triprex_blog_reading_time_six_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-card-content .bottom-area > span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $selected_category_ids = $settings['selected_categories']; // Get the selected category IDs from the control.
        $selected_post_ids = $settings['blog_post_list']; // Get the selected blog post IDs from the control.
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => $settings['triprex_blog_posts_per_page'],
            'orderby'        => $settings['triprex_blog_template_orderby'],
            'order'          => $settings['triprex_blog_template_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add the category filter if any categories are selected
        if (!empty($selected_category_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $selected_category_ids,
                    'operator' => 'IN',
                ),
            );
        }
        // Add Included posts
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }
        $query = new \WP_Query($args);
?>
        <?php if ($settings['triprex_blog_content_style_selection'] == 'style_one') : ?>
            <div class="blog-section">
                <?php if ('yes' == $settings['triprex_blog_style_one_turn_on_vector_image']) : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/home1/section-vector1.png' ); ?>" alt="<?php echo esc_attr__('vector-image', 'triprex-core'); ?>" class="section-vector1">
                <?php endif; ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-60">
                                <?php if (!empty($settings['triprex_blog_style_one_subtitle'])) : ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z" />
                                        </svg>
                                        <?php echo esc_html($settings['triprex_blog_style_one_subtitle']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z" />
                                        </svg>

                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_blog_style_one_title'])) : ?>
                                    <h2> <?php echo esc_html($settings['triprex_blog_style_one_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-lg-4 gy-5">
                        <div class="col-lg-5">
                            <?php
                            $counter = 0; // Initialize counter outside the loop
                            while ($query->have_posts()) :
                                $query->the_post();
                                if ($counter == 0) {
                            ?>
                                    <div class="blog-card <?php echo $counter == 0 ? 'left-card-ti' : '' ?>">
                                        <div class="blog-card-img-wrap">
                                            <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumb-image', 'triprex-core'); ?>"></a>
                                        </div>
                                        <div class="blog-card-content">
                                            <div class="blog-card-content-top">
                                                <ul>
                                                    <li>
                                                        <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"><?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date('M j, Y'); ?></a>
                                                    </li>
                                                    <li>
                                                        <?php comments_number(esc_html__('0 Comment', 'triprex-core'), esc_html__('1 Comment', 'triprex-core'), esc_html__('% Comment', 'triprex-core')); ?>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <div class="bottom-area">
                                                <?php if (!empty($settings['triprex_blog_button_text'])) : ?>
                                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_blog_button_text']); ?>
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                                <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round" />
                                                                <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                <?php endif; ?>
                                                <ul class="social-list">
                                                    <li>
                                                        <a href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . get_permalink()); ?>"><i class="bx bxl-facebook"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo esc_url('http://www.twitter.com/share?url=' . get_permalink()); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                                                            </svg></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo esc_url('http://www.pinterest.com/share?url=' . get_permalink()); ?>"><i class='bx bxl-pinterest-alt'></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo esc_url('http://www.instagram.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-instagram"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                                $counter++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <div class="col-lg-7">
                            <?php
                            $counter = 0; // Initialize counter outside the loop
                            while ($query->have_posts()) :
                                $query->the_post();
                                if ($counter != 0) {
                            ?>
                                    <div class="blog-card two <?php echo $counter != 0 ? 'right-card-ti' : '' ?>">
                                        <div class="blog-card-img-wrap">
                                            <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('image', 'triprex-core'); ?>"></a>
                                            <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="date">
                                                <span><strong><?php echo get_the_date('j'); ?></strong> <br> <?php echo get_the_date('M'); ?></span>
                                            </a>
                                        </div>
                                        <div class="blog-card-content">
                                            <div class="blog-card-content-top">
                                                <ul>
                                                    <li>
                                                        <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"><?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                                    </li>
                                                    <?php $categories = get_the_category(); ?>
                                                    <li>
                                                        <a href="<?php $post_category = get_the_category()[0]->name;
                                                                    echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <div class="bottom-area">
                                                <?php if (!empty($settings['triprex_blog_button_text'])) : ?>
                                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_blog_button_text']); ?>
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                                <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round" />
                                                                <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                <?php endif; ?>
                                                <span>
                                                    <?php $content = get_the_content();
                                                    $reading_time = Blog_Helper::calculate_reading_time($content); ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12">
                                                        <path d="M5.85726 11.3009C7.14547 9.08822 6.60613 6.30362 4.57475 4.68025C4.57356 4.67933 4.57238 4.67818 4.57143 4.6775L4.58021 4.69862L4.57878 4.71446C4.97457 5.72599 4.91905 6.83648 4.43285 7.78924L4.09022 8.461L3.9851 7.71876C3.91368 7.21529 3.71745 6.735 3.41515 6.32382H3.36745L3.3423 6.25495C3.34586 7.02428 3.17834 7.78213 2.8497 8.49704C2.41856 9.43259 2.48191 10.5114 3.01936 11.3833L3.39023 11.9853L2.72299 11.7126C1.62271 11.2628 0.743103 10.3964 0.309587 9.33547C-0.176131 8.15083 -0.0862008 6.77725 0.550429 5.66194C0.882388 5.08179 1.11493 4.46582 1.24187 3.8308L1.36597 3.2084L1.68251 3.76353C1.83366 4.02824 1.94494 4.31476 2.01399 4.61574L2.02111 4.62285L2.02847 4.67107L2.03535 4.669C2.98353 3.45015 3.55158 1.93354 3.6344 0.397865L3.65575 0L4.00076 0.217643C5.4088 1.10544 6.38664 2.52976 6.6887 4.13017L6.69558 4.163L6.69914 4.16805L6.71457 4.14693C6.99053 3.79429 7.13622 3.37485 7.13622 2.93336V2.24967L7.56261 2.7947C8.55398 4.06153 9.06224 5.63301 8.99391 7.21988C8.90991 9.08776 7.85708 10.7272 6.17736 11.6154L5.45008 12L5.85726 11.3009Z" />
                                                    </svg>
                                                    <?php echo sprintf('%s', $reading_time) . esc_html__(' Min Read', 'triprex-core'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                                $counter++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_blog_content_style_selection'] == 'style_two') : ?>
            <div class="home2-blog-section">
                <div class="row g-lg-4 gy-5">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        $post_category = get_the_category()[0]->name;
                    ?>
                        <div class="col-lg-6">
                            <div class="blog-card style-2">
                                <div class="blog-card-img-wrap">
                                    <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>"></a>
                                    <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="date">
                                        <span><strong><?php echo get_the_date('j'); ?></strong> <br> <?php echo get_the_date('M'); ?></span>
                                    </a>
                                </div>
                                <div class="blog-card-content">
                                    <div class="blog-card-content-top">
                                        <ul>
                                            <li>
                                                <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"> <?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                            </li>
                                            <?php $categories = get_the_category(); ?>
                                            <li>
                                                <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <div class="bottom-area">
                                        <?php if (!empty($settings['triprex_blog_button_text'])) : ?>
                                            <a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_blog_button_text']); ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                        <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round" />
                                                        <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                        <span>
                                            <?php $content = get_the_content();
                                            $reading_time = Blog_Helper::calculate_reading_time($content); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12">
                                                <path d="M5.85726 11.3009C7.14547 9.08822 6.60613 6.30362 4.57475 4.68025C4.57356 4.67933 4.57238 4.67818 4.57143 4.6775L4.58021 4.69862L4.57878 4.71446C4.97457 5.72599 4.91905 6.83648 4.43285 7.78924L4.09022 8.461L3.9851 7.71876C3.91368 7.21529 3.71745 6.735 3.41515 6.32382H3.36745L3.3423 6.25495C3.34586 7.02428 3.17834 7.78213 2.8497 8.49704C2.41856 9.43259 2.48191 10.5114 3.01936 11.3833L3.39023 11.9853L2.72299 11.7126C1.62271 11.2628 0.743103 10.3964 0.309587 9.33547C-0.176131 8.15083 -0.0862008 6.77725 0.550429 5.66194C0.882388 5.08179 1.11493 4.46582 1.24187 3.8308L1.36597 3.2084L1.68251 3.76353C1.83366 4.02824 1.94494 4.31476 2.01399 4.61574L2.02111 4.62285L2.02847 4.67107L2.03535 4.669C2.98353 3.45015 3.55158 1.93354 3.6344 0.397865L3.65575 0L4.00076 0.217643C5.4088 1.10544 6.38664 2.52976 6.6887 4.13017L6.69558 4.163L6.69914 4.16805L6.71457 4.14693C6.99053 3.79429 7.13622 3.37485 7.13622 2.93336V2.24967L7.56261 2.7947C8.55398 4.06153 9.06224 5.63301 8.99391 7.21988C8.90991 9.08776 7.85708 10.7272 6.17736 11.6154L5.45008 12L5.85726 11.3009Z" />
                                            </svg>
                                            <?php echo sprintf('%s', $reading_time) . esc_html__(' Min Read', 'triprex-core'); ?>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_blog_content_style_selection'] == 'style_three') : ?>
            <div class="home3-blog-section">
                <div class="container">
                    <div class="row g-lg-4 gy-5">
                        <?php
                        $counter = 0; // Initialize counter outside the loop
                        while ($query->have_posts()) :
                            $query->the_post();
                            if ($counter == 0) {
                        ?>
                                <div class="col-lg-7">
                                    <div class="blog-card style-3">
                                        <div class="blog-card-img-wrap">
                                            <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('image', 'triprex-core'); ?>"></a>
                                            <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="date">
                                                <span><strong><?php echo get_the_date('j'); ?></strong> <br> <?php echo get_the_date('M'); ?></span>
                                            </a>
                                        </div>
                                        <div class="blog-card-content">
                                            <div class="blog-card-content-top">
                                                <ul>
                                                    <li>
                                                        <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"><?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                                    </li>
                                                    <?php $categories = get_the_category(); ?>
                                                    <li>
                                                        <a href="<?php $post_category = get_the_category()[0]->name;
                                                                    echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                            $counter++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                        <?php
                        $counter = 0; // Initialize counter outside the loop
                        while ($query->have_posts()) :
                            $query->the_post();
                            if ($counter != 0) {
                        ?>
                                <div class="col-lg-5">
                                    <div class="blog-card style-4">
                                        <div class="blog-card-img-wrap">
                                            <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>"></a>
                                        </div>
                                        <div class="blog-card-content">
                                            <div class="blog-card-content-top">
                                                <div class="blog-date">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                                        <g clip-path="url(#clip0_1447_79)">
                                                            <path d="M10.5547 6.28906C10.8567 6.28906 11.1016 6.04422 11.1016 5.74219C11.1016 5.44016 10.8567 5.19531 10.5547 5.19531C10.2527 5.19531 10.0078 5.44016 10.0078 5.74219C10.0078 6.04422 10.2527 6.28906 10.5547 6.28906Z" />
                                                            <path d="M11.8125 1.09375H11.1016V0.546875C11.1016 0.244836 10.8567 0 10.5547 0C10.2526 0 10.0078 0.244836 10.0078 0.546875V1.09375H7.51953V0.546875C7.51953 0.244836 7.2747 0 6.97266 0C6.67062 0 6.42578 0.244836 6.42578 0.546875V1.09375H3.96484V0.546875C3.96484 0.244836 3.72001 0 3.41797 0C3.11593 0 2.87109 0.244836 2.87109 0.546875V1.09375H2.1875C0.981313 1.09375 0 2.07506 0 3.28125V11.8125C0 13.0187 0.981313 14 2.1875 14H6.37109C6.67313 14 6.91797 13.7552 6.91797 13.4531C6.91797 13.1511 6.67313 12.9062 6.37109 12.9062H2.1875C1.58441 12.9062 1.09375 12.4156 1.09375 11.8125V3.28125C1.09375 2.67816 1.58441 2.1875 2.1875 2.1875H2.87109V2.73438C2.87109 3.03641 3.11593 3.28125 3.41797 3.28125C3.72001 3.28125 3.96484 3.03641 3.96484 2.73438V2.1875H6.42578V2.73438C6.42578 3.03641 6.67062 3.28125 6.97266 3.28125C7.2747 3.28125 7.51953 3.03641 7.51953 2.73438V2.1875H10.0078V2.73438C10.0078 3.03641 10.2526 3.28125 10.5547 3.28125C10.8567 3.28125 11.1016 3.03641 11.1016 2.73438V2.1875H11.8125C12.4156 2.1875 12.9062 2.67816 12.9062 3.28125V6.39844C12.9062 6.70048 13.1511 6.94531 13.4531 6.94531C13.7552 6.94531 14 6.70048 14 6.39844V3.28125C14 2.07506 13.0187 1.09375 11.8125 1.09375Z" />
                                                            <path d="M10.6914 7.38281C8.86703 7.38281 7.38281 8.86703 7.38281 10.6914C7.38281 12.5158 8.86703 14 10.6914 14C12.5158 14 14 12.5158 14 10.6914C14 8.86703 12.5158 7.38281 10.6914 7.38281ZM10.6914 12.9062C9.47015 12.9062 8.47656 11.9127 8.47656 10.6914C8.47656 9.47012 9.47015 8.47656 10.6914 8.47656C11.9127 8.47656 12.9062 9.47012 12.9062 10.6914C12.9062 11.9127 11.9127 12.9062 10.6914 12.9062Z" />
                                                            <path d="M11.4844 10.1445H11.2383V9.57031C11.2383 9.26827 10.9934 9.02344 10.6914 9.02344C10.3894 9.02344 10.1445 9.26827 10.1445 9.57031V10.6914C10.1445 10.9934 10.3894 11.2383 10.6914 11.2383H11.4844C11.7864 11.2383 12.0312 10.9934 12.0312 10.6914C12.0312 10.3894 11.7864 10.1445 11.4844 10.1445Z" />
                                                            <path d="M8.17578 6.28906C8.47781 6.28906 8.72266 6.04422 8.72266 5.74219C8.72266 5.44016 8.47781 5.19531 8.17578 5.19531C7.87375 5.19531 7.62891 5.44016 7.62891 5.74219C7.62891 6.04422 7.87375 6.28906 8.17578 6.28906Z" />
                                                            <path d="M5.79688 8.66797C6.09891 8.66797 6.34375 8.42312 6.34375 8.12109C6.34375 7.81906 6.09891 7.57422 5.79688 7.57422C5.49484 7.57422 5.25 7.81906 5.25 8.12109C5.25 8.42312 5.49484 8.66797 5.79688 8.66797Z" />
                                                            <path d="M3.41797 6.28906C3.72 6.28906 3.96484 6.04422 3.96484 5.74219C3.96484 5.44016 3.72 5.19531 3.41797 5.19531C3.11594 5.19531 2.87109 5.44016 2.87109 5.74219C2.87109 6.04422 3.11594 6.28906 3.41797 6.28906Z" />
                                                            <path d="M3.41797 8.66797C3.72 8.66797 3.96484 8.42312 3.96484 8.12109C3.96484 7.81906 3.72 7.57422 3.41797 7.57422C3.11594 7.57422 2.87109 7.81906 2.87109 8.12109C2.87109 8.42312 3.11594 8.66797 3.41797 8.66797Z" />
                                                            <path d="M3.41797 11.0469C3.72 11.0469 3.96484 10.802 3.96484 10.5C3.96484 10.198 3.72 9.95312 3.41797 9.95312C3.11594 9.95312 2.87109 10.198 2.87109 10.5C2.87109 10.802 3.11594 11.0469 3.41797 11.0469Z" />
                                                            <path d="M5.79688 11.0469C6.09891 11.0469 6.34375 10.802 6.34375 10.5C6.34375 10.198 6.09891 9.95312 5.79688 9.95312C5.49484 9.95312 5.25 10.198 5.25 10.5C5.25 10.802 5.49484 11.0469 5.79688 11.0469Z" />
                                                            <path d="M5.79688 6.28906C6.09891 6.28906 6.34375 6.04422 6.34375 5.74219C6.34375 5.44016 6.09891 5.19531 5.79688 5.19531C5.49484 5.19531 5.25 5.44016 5.25 5.74219C5.25 6.04422 5.49484 6.28906 5.79688 6.28906Z" />
                                                        </g>
                                                    </svg>
                                                    <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date('M j, Y'); ?></a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"><?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                                    </li>
                                                    <?php $categories = get_the_category(); ?>
                                                    <li>
                                                        <a href="<?php $post_category = get_the_category()[0]->name;
                                                                    echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <div class="bottom-area">
                                                <?php if (!empty($settings['triprex_blog_button_text'])) : ?>
                                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_blog_button_text']); ?>
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                                <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round" />
                                                                <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                <?php endif; ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12">
                                                        <path d="M5.85726 11.3009C7.14547 9.08822 6.60613 6.30362 4.57475 4.68025C4.57356 4.67933 4.57238 4.67818 4.57143 4.6775L4.58021 4.69862L4.57878 4.71446C4.97457 5.72599 4.91905 6.83648 4.43285 7.78924L4.09022 8.461L3.9851 7.71876C3.91368 7.21529 3.71745 6.735 3.41515 6.32382H3.36745L3.3423 6.25495C3.34586 7.02428 3.17834 7.78213 2.8497 8.49704C2.41856 9.43259 2.48191 10.5114 3.01936 11.3833L3.39023 11.9853L2.72299 11.7126C1.62271 11.2628 0.743103 10.3964 0.309587 9.33547C-0.176131 8.15083 -0.0862008 6.77725 0.550429 5.66194C0.882388 5.08179 1.11493 4.46582 1.24187 3.8308L1.36597 3.2084L1.68251 3.76353C1.83366 4.02824 1.94494 4.31476 2.01399 4.61574L2.02111 4.62285L2.02847 4.67107L2.03535 4.669C2.98353 3.45015 3.55158 1.93354 3.6344 0.397865L3.65575 0L4.00076 0.217643C5.4088 1.10544 6.38664 2.52976 6.6887 4.13017L6.69558 4.163L6.69914 4.16805L6.71457 4.14693C6.99053 3.79429 7.13622 3.37485 7.13622 2.93336V2.24967L7.56261 2.7947C8.55398 4.06153 9.06224 5.63301 8.99391 7.21988C8.90991 9.08776 7.85708 10.7272 6.17736 11.6154L5.45008 12L5.85726 11.3009Z" />
                                                    </svg>
                                                    <?php comments_number(esc_html__('0 Comment', 'triprex-core'), esc_html__('1 Comment', 'triprex-core'), esc_html__('% Comment', 'triprex-core')); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                            $counter++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_blog_content_style_selection'] == 'style_four') : ?>
            <div class="home4-blog-section">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="section-title3">
                            <?php if (!empty($settings['triprex_blog_style_one_title'])) : ?>
                                <h2><?php echo esc_html($settings['triprex_blog_style_one_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['triprex_blog_style_one_description'])) : ?>
                                <p><?php echo esc_html($settings['triprex_blog_style_one_description']); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['triprex_blog_style_four_button_text'])) : ?>
                            <a href="<?php echo esc_url($settings['triprex_blog_style_four_url']['url']) ?>" class="view-btn"><?php echo esc_html($settings['triprex_blog_style_four_button_text']); ?>
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
                <div class="row g-lg-4 gy-5">
                    <?php
                    $counter = 0;
                    while ($query->have_posts()) :
                        $query->the_post();
                        if ($counter % 2 == 0) {
                            echo '<div class="col-lg-4 col-md-6">';
                        } else {
                            echo '<div class="col-lg-4 col-md-6 pt-15 pb-15">';
                        }
                    ?>
                        <div class="blog-card">
                            <div class="blog-card-img-wrap">
                                <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>"></a>
                                <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="date">
                                    <span><strong><?php echo get_the_date('j'); ?></strong> <br> <?php echo get_the_date('M'); ?></span>
                                </a>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-card-content-top">
                                    <ul>
                                        <li>
                                            <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"><?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                        </li>
                                        <?php $categories = get_the_category();
                                        $post_category = get_the_category()[0]->name; ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <div class="bottom-area">
                                    <?php if (!empty($settings['triprex_blog_button_text'])) : ?>
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_blog_button_text']); ?>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                    <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                                                    <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                    <?php $content = get_the_content();
                                    $reading_time = Blog_Helper::calculate_reading_time($content); ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12">
                                            <path d="M5.85726 11.3009C7.14547 9.08822 6.60613 6.30362 4.57475 4.68025C4.57356 4.67933 4.57238 4.67818 4.57143 4.6775L4.58021 4.69862L4.57878 4.71446C4.97457 5.72599 4.91905 6.83648 4.43285 7.78924L4.09022 8.461L3.9851 7.71876C3.91368 7.21529 3.71745 6.735 3.41515 6.32382H3.36745L3.3423 6.25495C3.34586 7.02428 3.17834 7.78213 2.8497 8.49704C2.41856 9.43259 2.48191 10.5114 3.01936 11.3833L3.39023 11.9853L2.72299 11.7126C1.62271 11.2628 0.743103 10.3964 0.309587 9.33547C-0.176131 8.15083 -0.0862008 6.77725 0.550429 5.66194C0.882388 5.08179 1.11493 4.46582 1.24187 3.8308L1.36597 3.2084L1.68251 3.76353C1.83366 4.02824 1.94494 4.31476 2.01399 4.61574L2.02111 4.62285L2.02847 4.67107L2.03535 4.669C2.98353 3.45015 3.55158 1.93354 3.6344 0.397865L3.65575 0L4.00076 0.217643C5.4088 1.10544 6.38664 2.52976 6.6887 4.13017L6.69558 4.163L6.69914 4.16805L6.71457 4.14693C6.99053 3.79429 7.13622 3.37485 7.13622 2.93336V2.24967L7.56261 2.7947C8.55398 4.06153 9.06224 5.63301 8.99391 7.21988C8.90991 9.08776 7.85708 10.7272 6.17736 11.6154L5.45008 12L5.85726 11.3009Z"></path>
                                        </svg>
                                        <?php echo sprintf('%s', $reading_time) . esc_html__(' Min Read', 'triprex-core'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>
            <?php $counter++;
                    endwhile;
                    wp_reset_postdata();
            ?>
            </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_blog_content_style_selection'] == 'style_five') : ?>
            <div class="home5-blog-section">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="section-title4 text-center">
                            <?php if (!empty($settings['triprex_blog_style_one_subtitle'])) : ?>
                                <div class="eg-section-tag">
                                    <span><?php echo esc_html($settings['triprex_blog_style_one_subtitle']); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['triprex_blog_style_one_title'])) : ?>
                                <h2> <?php echo esc_html($settings['triprex_blog_style_one_title']); ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row g-lg-4 gy-5">
                    <?php
                    $counter = 0;
                    while ($query->have_posts()) :
                        $query->the_post();
                        if ($counter == 0) { ?>
                            <div class="col-lg-5">
                                <div class="blog-card style-5">
                                    <div class="blog-card-img-wrap">
                                        <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>"></a>
                                    </div>
                                    <div class="blog-card-content">
                                        <div class="blog-card-content-top">
                                            <ul>
                                                <li>
                                                    <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"><?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date('M j, Y'); ?></a>
                                                </li>
                                                <li>
                                                    <?php comments_number(esc_html__('0 Comment', 'triprex-core'), esc_html__('1 Comment', 'triprex-core'), esc_html__('% Comment', 'triprex-core')); ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <div class="bottom-area">
                                            <?php if (!empty($settings['triprex_blog_button_text'])) : ?>
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_blog_button_text']); ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                            <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                                                            <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            <?php endif; ?>
                                            <ul class="social-list">
                                                <li>
                                                    <a href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . get_permalink()); ?>"><i class="bx bxl-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo esc_url('http://www.twitter.com/share?url=' . get_permalink()); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                                                        </svg></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo esc_url('http://www.pinterest.com/share?url=' . get_permalink()); ?>"><i class='bx bxl-pinterest-alt'></i></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo esc_url('http://www.instagram.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row g-md-4 gy-5">
                                <?php  } elseif ($counter == 1) { ?>
                                    <div class="col-lg-12">
                                        <div class="blog-card two">
                                            <div class="blog-card-img-wrap">
                                                <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>"></a>
                                            </div>
                                            <div class="blog-card-content">
                                                <div class="blog-card-content-top">
                                                    <ul>
                                                        <li>
                                                            <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"><?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                                        </li>
                                                        <?php $categories = get_the_category();
                                                        $post_category = get_the_category()[0]->name; ?>
                                                        <li>
                                                            <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                <div class="bottom-area">
                                                    <?php if (!empty($settings['triprex_blog_button_text'])) : ?>
                                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_blog_button_text']); ?>
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                                    <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                                                                    <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"></path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php $content = get_the_content();
                                                    $reading_time = Blog_Helper::calculate_reading_time($content); ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12">
                                                            <path d="M5.85726 11.3009C7.14547 9.08822 6.60613 6.30362 4.57475 4.68025C4.57356 4.67933 4.57238 4.67818 4.57143 4.6775L4.58021 4.69862L4.57878 4.71446C4.97457 5.72599 4.91905 6.83648 4.43285 7.78924L4.09022 8.461L3.9851 7.71876C3.91368 7.21529 3.71745 6.735 3.41515 6.32382H3.36745L3.3423 6.25495C3.34586 7.02428 3.17834 7.78213 2.8497 8.49704C2.41856 9.43259 2.48191 10.5114 3.01936 11.3833L3.39023 11.9853L2.72299 11.7126C1.62271 11.2628 0.743103 10.3964 0.309587 9.33547C-0.176131 8.15083 -0.0862008 6.77725 0.550429 5.66194C0.882388 5.08179 1.11493 4.46582 1.24187 3.8308L1.36597 3.2084L1.68251 3.76353C1.83366 4.02824 1.94494 4.31476 2.01399 4.61574L2.02111 4.62285L2.02847 4.67107L2.03535 4.669C2.98353 3.45015 3.55158 1.93354 3.6344 0.397865L3.65575 0L4.00076 0.217643C5.4088 1.10544 6.38664 2.52976 6.6887 4.13017L6.69558 4.163L6.69914 4.16805L6.71457 4.14693C6.99053 3.79429 7.13622 3.37485 7.13622 2.93336V2.24967L7.56261 2.7947C8.55398 4.06153 9.06224 5.63301 8.99391 7.21988C8.90991 9.08776 7.85708 10.7272 6.17736 11.6154L5.45008 12L5.85726 11.3009Z"></path>
                                                        </svg>
                                                        <?php echo sprintf('%s', $reading_time) . esc_html__(' Min Read', 'triprex-core'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-6">
                                        <div class="blog-card">
                                            <div class="blog-card-img-wrap">
                                                <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>"></a>
                                            </div>
                                            <div class="blog-card-content two">
                                                <div class="blog-card-content-top">
                                                    <ul>
                                                        <li>
                                                            <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"><?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                                        </li>
                                                        <?php $categories = get_the_category();
                                                        $post_category = get_the_category()[0]->name; ?>
                                                        <li>
                                                            <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                <div class="bottom-area">
                                                    <?php if (!empty($settings['triprex_blog_button_text'])) : ?>
                                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_blog_button_text']); ?>
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                                    <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                                                                    <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"></path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php $content = get_the_content();
                                                    $reading_time = Blog_Helper::calculate_reading_time($content); ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12">
                                                            <path d="M5.85726 11.3009C7.14547 9.08822 6.60613 6.30362 4.57475 4.68025C4.57356 4.67933 4.57238 4.67818 4.57143 4.6775L4.58021 4.69862L4.57878 4.71446C4.97457 5.72599 4.91905 6.83648 4.43285 7.78924L4.09022 8.461L3.9851 7.71876C3.91368 7.21529 3.71745 6.735 3.41515 6.32382H3.36745L3.3423 6.25495C3.34586 7.02428 3.17834 7.78213 2.8497 8.49704C2.41856 9.43259 2.48191 10.5114 3.01936 11.3833L3.39023 11.9853L2.72299 11.7126C1.62271 11.2628 0.743103 10.3964 0.309587 9.33547C-0.176131 8.15083 -0.0862008 6.77725 0.550429 5.66194C0.882388 5.08179 1.11493 4.46582 1.24187 3.8308L1.36597 3.2084L1.68251 3.76353C1.83366 4.02824 1.94494 4.31476 2.01399 4.61574L2.02111 4.62285L2.02847 4.67107L2.03535 4.669C2.98353 3.45015 3.55158 1.93354 3.6344 0.397865L3.65575 0L4.00076 0.217643C5.4088 1.10544 6.38664 2.52976 6.6887 4.13017L6.69558 4.163L6.69914 4.16805L6.71457 4.14693C6.99053 3.79429 7.13622 3.37485 7.13622 2.93336V2.24967L7.56261 2.7947C8.55398 4.06153 9.06224 5.63301 8.99391 7.21988C8.90991 9.08776 7.85708 10.7272 6.17736 11.6154L5.45008 12L5.85726 11.3009Z"></path>
                                                        </svg>
                                                        <?php echo sprintf('%s', $reading_time) . esc_html__(' Min Read', 'triprex-core'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php }
                            $counter++;
                        endwhile;
                        wp_reset_postdata();
                            ?>

                                </div>
                            </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_blog_content_style_selection'] == 'style_six') : ?>
            <div class="home6-blog-section">
                <div class="container one">
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="section-title5 text-center">
                                <?php if (!empty($settings['triprex_blog_style_one_subtitle'])) : ?>
                                    <span>
                                        <?php echo esc_html($settings['triprex_blog_style_one_subtitle']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g opacity="0.8">
                                                <path d="M9.06226 11.3626L8.55838 13.7263L6.22997 20.0004L7.61194 19.7701L14.0678 11.3277C14.979 11.296 15.8626 11.2471 16.6304 11.1713C20.1826 10.82 19.9984 10.0002 19.9984 10.0002C19.9984 10.0002 20.1826 9.18031 16.6304 8.829C15.8626 8.7529 14.9789 8.70407 14.0678 8.67261L7.61197 0.229974L6.22997 -6.01907e-07L8.55838 6.27416L9.06226 8.6378C7.87942 8.6555 7.07898 8.68244 7.07898 8.68244C7.07898 8.68244 5.44724 8.7201 2.92253 9.28895L0.864093 6.43364L-0.000128074 6.43364L0.615287 9.90529C0.504522 9.93924 0.504522 10.0611 0.615287 10.0951L-0.000128385 13.5667L0.864093 13.5667L2.92253 10.7117C5.44724 11.2806 7.07898 11.3177 7.07898 11.3177C7.07898 11.3177 7.87942 11.3449 9.06226 11.3626Z" />
                                                <path d="M13.4102 13.2575L13.4102 14.1895L9.96575 14.1895L9.96575 13.2575L13.4102 13.2575ZM13.4102 5.81414L13.4102 6.7458L9.96595 6.7458L9.96595 5.81414L13.4102 5.81414ZM11.0863 16.385L11.0863 17.3167L7.90291 17.3167L7.90291 16.385L11.0863 16.385ZM11.0863 2.68689L11.0863 3.61885L7.90291 3.61885L7.90291 2.68689L11.0863 2.68689Z" />
                                            </g>
                                        </svg>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_blog_style_one_title'])) : ?>
                                    <h2><?php echo esc_html($settings['triprex_blog_style_one_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-lg-4 gy-5">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post(); 
                        ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="blog-card style-6">
                                    <div class="blog-card-img-wrap">
                                        <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>"></a>
                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="date">
                                            <span><strong><?php echo get_the_date('j'); ?></strong> <br> <?php echo get_the_date('M'); ?></span>
                                        </a>
                                    </div>
                                    <div class="blog-card-content">
                                        <div class="blog-card-content-top">
                                            <ul>
                                                <li>
                                                    <?php echo esc_html__('By', 'triprex-core'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>"><?php echo sprintf(__('%s', 'triprex-core'), get_the_author_meta("display_name")); ?></a>
                                                </li>
                                                <?php $categories = get_the_category(); 
                                                $post_category = get_the_category()[0]->name;
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <div class="bottom-area">
                                            <?php if (!empty($settings['triprex_blog_button_text'])) : ?>
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['triprex_blog_button_text']); ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                            <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                                                            <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            <?php endif; ?>
                                            <?php $content = get_the_content();
                                            $reading_time = Blog_Helper::calculate_reading_time($content); ?>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12">
                                                    <path d="M5.85726 11.3009C7.14547 9.08822 6.60613 6.30362 4.57475 4.68025C4.57356 4.67933 4.57238 4.67818 4.57143 4.6775L4.58021 4.69862L4.57878 4.71446C4.97457 5.72599 4.91905 6.83648 4.43285 7.78924L4.09022 8.461L3.9851 7.71876C3.91368 7.21529 3.71745 6.735 3.41515 6.32382H3.36745L3.3423 6.25495C3.34586 7.02428 3.17834 7.78213 2.8497 8.49704C2.41856 9.43259 2.48191 10.5114 3.01936 11.3833L3.39023 11.9853L2.72299 11.7126C1.62271 11.2628 0.743103 10.3964 0.309587 9.33547C-0.176131 8.15083 -0.0862008 6.77725 0.550429 5.66194C0.882388 5.08179 1.11493 4.46582 1.24187 3.8308L1.36597 3.2084L1.68251 3.76353C1.83366 4.02824 1.94494 4.31476 2.01399 4.61574L2.02111 4.62285L2.02847 4.67107L2.03535 4.669C2.98353 3.45015 3.55158 1.93354 3.6344 0.397865L3.65575 0L4.00076 0.217643C5.4088 1.10544 6.38664 2.52976 6.6887 4.13017L6.69558 4.163L6.69914 4.16805L6.71457 4.14693C6.99053 3.79429 7.13622 3.37485 7.13622 2.93336V2.24967L7.56261 2.7947C8.55398 4.06153 9.06224 5.63301 8.99391 7.21988C8.90991 9.08776 7.85708 10.7272 6.17736 11.6154L5.45008 12L5.85726 11.3009Z"></path>
                                                </svg>
                                                <?php echo sprintf('%s', $reading_time) . esc_html__(' Min Read', 'triprex-core'); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>


                </div>
            </div>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Blog_Widget());
