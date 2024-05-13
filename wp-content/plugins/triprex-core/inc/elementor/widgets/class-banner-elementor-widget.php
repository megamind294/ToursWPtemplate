<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class triprex_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Banner', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//


        $this->start_controls_section(
            'triprex_banner_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_banner_section_style_selection',
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
                    'style_seven' => esc_html__('Style Seven', 'triprex-core'),
                    'style_eight' => esc_html__('Style Eight', 'triprex-core'),
                    'style_nine' => esc_html__('Style Nine', 'triprex-core'),
                    'style_ten' => esc_html__('Style Ten', 'triprex-core'),
                    'style_eleven' => esc_html__('Style Eleven', 'triprex-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();

        //Content One

        $this->start_controls_section(
            'triprex_banner_one_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_banner_one_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'triprex_banner_one_title_section_sec',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Savings worldwide'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_banner_one_discount_section_sec',
            [
                'label' => esc_html__(' Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('20% Off'),
                'placeholder' => esc_html__('Type your discount here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_banner_one_content_section_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Discover Great Deal'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_banner_one_content_section_sec_url',
            [
                'label' => esc_html__('Title URL', 'triprex-core'),
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

        //Content Two
        $this->start_controls_section(
            'triprex_banner_two_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_two'
                ]
            ]
        );
        $this->add_control(
            'triprex_banner_two_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'triprex_banner_two_title_section_sec',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Couple Tour'),
                'placeholder' => esc_html__('Type your sub title here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_banner_two_content_section_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('4 Days In Switzerland'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_banner_two_content_section_sec_url',
            [
                'label' => esc_html__('Title URL', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_banner_two_discount_section_sec',
            [
                'label' => esc_html__(' Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('<strong>50%</strong> <br>Off', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your discount here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        //Content Three

        $this->start_controls_section(
            'triprex_banner_three_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_three'
                ]
            ]
        );
        $this->add_control(
            'triprex_banner_three_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'triprex_banner_three_title_section_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Honeymoon Tour'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_banner_three_discount_section_sec',
            [
                'label' => esc_html__(' Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Enjoy <span>40%</span> Off', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your discount here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_banner_three_location_section_sec',
            [
                'label' => esc_html__(' Total Destination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('2 Country & 15 Location'),
                'placeholder' => esc_html__('Type your total destination here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_banner_three_button_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'triprex_banner_three_content_btn_section_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book Now'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_banner_three_button_section_sec_url',
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


        //Content Four

        $this->start_controls_section(
            'triprex_banner_four_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_four_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_banner_four_title_section_sec',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Savings worldwide'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_four_discount_section_sec',
            [
                'label' => esc_html__(' Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('50% Off '),
                'placeholder' => esc_html__('Type your discount here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_four_content_section_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('For Your First Book'),
                'placeholder' => esc_html__('Type your title  here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_four_button_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_banner_four_content_btn_section_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book Now'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_four_button_section_sec_url',
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


        //Content Five

        $this->start_controls_section(
            'triprex_banner_five_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_five_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_banner_five_title_section_sec',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Savings worldwide'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_five_discount_section_sec',
            [
                'label' => esc_html__('Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('20% Off '),
                'placeholder' => esc_html__('Type your discount here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_five_content_section_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Discover Great Deal'),
                'placeholder' => esc_html__('Type your Title  here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_five_content_section_sec_url',
            [
                'label' => esc_html__('Title URL', 'triprex-core'),
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
            'triprex_banner_five_button_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_banner_five_content_btn_section_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('View This Trip'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_five_button_section_sec_url',
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

        //Content Six

        $this->start_controls_section(
            'triprex_banner_six_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_six'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_six_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_banner_six_title_section_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Savings worldwide'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_six_discount_section_sec',
            [
                'label' => esc_html__(' Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Up to <span>40%</span> Off Honeymoon.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your discount here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_six_button_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_banner_six_content_btn_section_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('View This Trip'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_six_button_section_sec_url',
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

        //Content Seven
        $this->start_controls_section(
            'triprex_banner_seven_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_seven'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_seven_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );



        $this->add_control(
            'triprex_banner_seven_discount_section_sec',
            [
                'label' => esc_html__(' Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Honeymoon Package <br><span>25%</span> off ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your discount here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_seven_content_section_sec',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Whatever your summer looks like, bring yourown heat with up to 25% off Lumin Brand.'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_seven_button_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_banner_seven_content_btn_section_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('View This Trip'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_seven_button_section_sec_url',
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

        //Content Eight

        $this->start_controls_section(
            'triprex_banner_eight_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_eight'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_banner_eight_subtitle_sec',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $repeater->add_control(
            'triprex_banner_eight_subtitle_sec_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Honeymoon Tour'),
                'placeholder' => esc_html__('Type your discount here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_eight_title_sec_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('50% Off'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_eight_content_sec_sec',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Discover Great Deal'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_eight_content_sec_sec_url',
            [
                'label' => esc_html__('Content URL', 'triprex-core'),
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
            'triprex_banner_eight_offer_sec_sec',
            [
                'label' => esc_html__('Offer Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_banner_eight_offer_end_text_sec_sec',
            [
                'label' => esc_html__(' Offer End Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Offer Will Be End:'),
                'placeholder' => esc_html__('Type your offer title here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'triprex_banner_eight_offer_end_text_due_time',
            [
                'label' => esc_html__('Due Time', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Please Type Your Date This Format, 2024-12-23 ', 'triprex-core'),
                'default' => esc_html('2024-12-23'),
                'rows' => 2,
            ]
        );

        $repeater->add_control(
            'triprex_banner_eight_button_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_banner_eight_content_btn_section_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('View This Trip'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_eight_button_section_sec_url',
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

        $this->add_control(
            'triprex_banner_eight_content_list',
            [
                'label' => esc_html__(' Content List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_banner_eight_content_sec_sec' => esc_html('Discover Great Deal'),

                    ],

                ],
                'title_field' => '{{{ triprex_banner_eight_content_sec_sec }}}',
            ]
        );



        $this->end_controls_section();

        //Content Nine

        $this->start_controls_section(
            'triprex_banner_nine_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_nine'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_banner_nine_banner_content_sec',
            [
                'label' => esc_html__('Banner Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $repeater->add_control(
            'triprex_banner_nine_subtitle_sec_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Let’s Travel'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_nine_title_sec_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Family Tour <br> <strong>35% Off</strong>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_nine_content_sec_sec',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Whatever your summer looks like, bring yourown heat with up to 35% off Lumin Brand.'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_nine_button_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_banner_nine_content_btn_section_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book A Trip'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_nine_button_section_sec_url',
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


        $repeater->add_control(
            'triprex_banner_nine_banner_image_sec',
            [
                'label' => esc_html__('Banner Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_banner_nine_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_banner_nine_content_list',
            [
                'label' => esc_html__(' Content List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_banner_nine_content_sec_sec' => esc_html('Whatever your summer looks like, bring yourown heat with up to 35% off Lumin Brand.'),

                    ],

                ],
                'title_field' => '{{{ triprex_banner_nine_content_sec_sec }}}',
            ]
        );



        $this->end_controls_section();


        //Content Ten

        $this->start_controls_section(
            'triprex_banner_ten_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_ten'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_banner_ten_banner_content_sec',
            [
                'label' => esc_html__('Banner Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_banner_ten_banner_image_sec',
            [
                'label' => esc_html__('Banner Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_banner_ten_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'triprex_banner_ten_subtitle_sec_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Let’s Travel'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_ten_title_sec_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Family Tour <br> <strong>35% Off</strong>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_ten_content_sec_sec',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Whatever your summer looks like, bring yourown heat with up to 35% off Lumin Brand.'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_ten_button_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_banner_ten_content_btn_section_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book A Trip'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_banner_ten_button_section_sec_url',
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



        $this->add_control(
            'triprex_banner_ten_content_list',
            [
                'label' => esc_html__(' Content List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_banner_ten_content_sec_sec' => esc_html('Whatever your summer looks like, bring yourown heat with up to 35% off Lumin Brand.'),

                    ],

                ],
                'title_field' => '{{{ triprex_banner_ten_content_sec_sec }}}',
            ]
        );


        $this->end_controls_section();

        //Content Eleven

        $this->start_controls_section(
            'triprex_banner_eleven_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_eleven'
                ]
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_banner_content_sec',
            [
                'label' => esc_html__('Banner Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_subtitle_sec_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Let’s Travel'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_title_sec_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Honeymoon Tour <br> <strong>35% Off</strong>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_content_sec_sec',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Whatever Your Summer Looks Like, Bring Yourown Heat With Up To 25% Off Lumin Brand.'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_button_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_content_btn_section_sec',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book A Trip'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_button_section_sec_url',
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

        // =====================Style One  =======================//

        //General Section

        $this->start_controls_section(
            'triprex_banner_section_style_one_general_section_style',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_general_section_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Banner Section
        $this->start_controls_section(
            'triprex_banner_one_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_one_section_sec_style_sec_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_one_section_sec_style_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span',

            ]
        );

        $this->add_control(
            'triprex_banner_one_section_sec_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_one_section_sec_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_one_section_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Discount
        $this->add_control(
            'triprex_banner_one_section_sec_style_sec_title_sec_sec',
            [
                'label' => esc_html__(' Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_one_section_sec_style_sec_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content h3',

            ]
        );

        $this->add_control(
            'triprex_banner_one_section_sec_style_sec_title_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content h3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_banner_one_section_sec_style_sec_title_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_one_section_sec_style_sec_title_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Content
        $this->add_control(
            'triprex_banner_one_section_sec_style_sec_short_desc_sec_sec',
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
                'name'     => 'triprex_banner_one_section_sec_style_sec_short_desc_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > a',

            ]
        );

        $this->add_control(
            'triprex_banner_one_section_sec_style_sec_short_desc_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_banner_one_section_sec_style_sec_short_desc_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_one_section_sec_style_sec_short_desc_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // =====================Style Two  =======================//

        //General Section

        $this->start_controls_section(
            'triprex_banner_section_style_two_general_section_style',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_two_general_section_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_two_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Banner Section
        $this->start_controls_section(
            'triprex_banner_two_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_two_section_sec_style_sec_sec',
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
                'name'     => 'triprex_banner_two_section_sec_style_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span',

            ]
        );

        $this->add_control(
            'triprex_banner_two_section_sec_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_two_section_sec_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_two_section_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Title
        $this->add_control(
            'triprex_banner_two_section_sec_style_sec_short_desc_sec_sec',
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
                'name'     => 'triprex_banner_two_section_sec_style_sec_short_desc_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > a',

            ]
        );

        $this->add_control(
            'triprex_banner_two_section_sec_style_sec_short_desc_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_banner_two_section_sec_style_sec_short_desc_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_two_section_sec_style_sec_short_desc_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Discount
        $this->add_control(
            'triprex_banner_two_section_sec_style_sec_discount_sec_sec',
            [
                'label' => esc_html__('Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_two_section_sec_style_sec_discount_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .offer-batch span',

            ]
        );

        $this->add_control(
            'triprex_banner_two_section_sec_style_sec_discount_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .offer-batch span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_two_section_sec_style_sec_discount_sec_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .offer-batch' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_two_section_sec_style_sec_discount_sec_border_radius',
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
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .offer-batch' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_two_section_sec_style_sec_discount_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .offer-batch span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_two_section_sec_style_sec_discount_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .offer-batch span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // =====================Style Three  =======================//

        //General Section

        $this->start_controls_section(
            'triprex_banner_section_style_three_general_section_style',
            [
                'label' => esc_html__('General', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_three_general_section_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_three_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Banner Section
        $this->start_controls_section(
            'triprex_banner_three_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_banner_three_section_sec_style_sec_sec',
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
                'name'     => 'triprex_banner_three_section_sec_style_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span',

            ]
        );

        $this->add_control(
            'triprex_banner_three_section_sec_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_three_section_sec_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_three_section_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Discount
        $this->add_control(
            'triprex_banner_three_section_sec_style_sec_discount_sec_sec',
            [
                'label' => esc_html__('Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_three_section_sec_style_sec_discount_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card.three .banner2-content-wrap .banner2-content h5',

            ]
        );

        $this->add_control(
            'triprex_banner_three_section_sec_style_sec_discount_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.three .banner2-content-wrap .banner2-content h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_three_section_sec_style_sec_discount_sec_sec_span_color',
            [
                'label'     => esc_html__('Span Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.three .banner2-content-wrap .banner2-content h5 span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_banner_three_section_sec_style_sec_discount_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.three .banner2-content-wrap .banner2-content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_three_section_sec_style_sec_discount_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card.three .banner2-content-wrap .banner2-content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //Total Destination
        $this->add_control(
            'triprex_banner_three_section_sec_style_sec_total_destination_sec_sec',
            [
                'label' => esc_html__('Total Destination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_three_section_sec_style_sec_total_destination_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content p',

            ]
        );

        $this->add_control(
            'triprex_banner_three_section_sec_style_sec_total_destination_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_three_section_sec_style_sec_total_destination_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_three_section_sec_style_sec_total_destination_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_banner_three_section_btn_style',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_banner_three_section_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_banner_three_section_btn_style_normal_tab',
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
                'name'     => 'triprex_banner_three_section_btn_style_style_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_banner_three_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .banner2-card .banner2-content-wrap .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_banner_three_section_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .banner2-card.three .banner2-content-wrap .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_three_section_btn_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .primary-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_three_section_btn_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .primary-btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_banner_three_section_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_banner_three_section_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.three .banner2-content-wrap .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_three_section_btn_style_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.three .banner2-content-wrap .primary-btn1:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // =====================Style Four  =======================//

        //General Section

        $this->start_controls_section(
            'triprex_banner_section_style_four_general_section_style',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_four_general_section_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_four_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Banner Section
        $this->start_controls_section(
            'triprex_banner_four_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_four_section_sec_style_sec_sec',
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
                'name'     => 'triprex_banner_four_section_sec_style_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span',

            ]
        );

        $this->add_control(
            'triprex_banner_four_section_sec_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_four_section_sec_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_four_section_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Discount
        $this->add_control(
            'triprex_banner_four_section_sec_style_sec_discount_sec_sec',
            [
                'label' => esc_html__('Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_four_section_sec_style_sec_discount_sec_sec_typ',
                'selector' => '{{WRAPPER}}.banner2-card .banner2-content-wrap .banner2-content h3',

            ]
        );

        $this->add_control(
            'triprex_banner_four_section_sec_style_sec_discount_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.four .banner2-content-wrap .banner2-content h3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_four_section_sec_style_sec_discount_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_four_section_sec_style_sec_discount_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Title
        $this->add_control(
            'triprex_banner_four_section_sec_style_sec_title_sec',
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
                'name'     => 'triprex_banner_four_section_sec_style_sec_content_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content p',

            ]
        );

        $this->add_control(
            'triprex_banner_four_section_sec_style_sec_content_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_four_section_sec_style_sec_content_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_four_section_sec_style_sec_content_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_banner_four_section_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_banner_four_section_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_banner_four_section_btn_style_normal_tab',
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
                'name'     => 'triprex_banner_four_section_btn_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_banner_four_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_banner_four_section_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_four_section_btn_style_margin',
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
            'triprex_banner_four_section_btn_style_padding',
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
            'triprex_banner_four_section_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_banner_four_section_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.four .banner2-content-wrap .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_four_section_btn_style_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.four .banner2-content-wrap .primary-btn1:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        // =====================Style Five  =======================//

        //General Section

        $this->start_controls_section(
            'triprex_banner_section_style_five_general_section_style',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_five_general_section_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner4-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_five_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner4-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Banner Section
        $this->start_controls_section(
            'triprex_banner_five_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_five_section_sec_style_sec_sec',
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
                'name'     => 'triprex_banner_five_section_sec_style_sec_typ',
                'selector' => '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content span',

            ]
        );

        $this->add_control(
            'triprex_banner_five_section_sec_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_five_section_sec_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_five_section_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Discount
        $this->add_control(
            'triprex_banner_five_section_sec_style_sec_discount_sec_sec',
            [
                'label' => esc_html__('Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_five_section_sec_style_sec_discount_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content h3',

            ]
        );

        $this->add_control(
            'triprex_banner_five_section_sec_style_sec_discount_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content h3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_five_section_sec_style_sec_discount_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_five_section_sec_style_sec_discount_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Title
        $this->add_control(
            'triprex_banner_five_section_sec_style_sec_title_sec',
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
                'name'     => 'triprex_banner_five_section_sec_style_sec_content_sec_typ',
                'selector' => '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content .text',

            ]
        );

        $this->add_control(
            'triprex_banner_five_section_sec_style_sec_content_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content .text' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_five_section_sec_style_sec_content_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_five_section_sec_style_sec_content_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner4-card .banner4-content-wrapper .banner4-content .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_banner_five_section_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_banner_five_section_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_banner_five_section_btn_style_normal_tab',
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
                'name'     => 'triprex_banner_five_section_btn_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_banner_five_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_banner_five_section_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_five_section_btn_style_margin',
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
            'triprex_banner_five_section_btn_style_padding',
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
            'triprex_banner_five_section_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_banner_five_section_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_five_section_btn_style_color_hover',
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


        // =====================Style Six  =======================//

        //General Section
        $this->start_controls_section(
            'triprex_banner_section_style_six_general_section_style',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_six_general_section_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_six_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Banner Section
        $this->start_controls_section(
            'triprex_banner_six_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_six'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_six_section_sec_style_sec_sec',
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
                'name'     => 'triprex_banner_six_section_sec_style_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span',

            ]
        );

        $this->add_control(
            'triprex_banner_six_section_sec_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_six_section_sec_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_six_section_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Discount
        $this->add_control(
            'triprex_banner_six_section_sec_style_sec_discount_sec_sec',
            [
                'label' => esc_html__('Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_six_section_sec_style_sec_discount_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card.five .banner2-content-wrap .banner2-content h5',

            ]
        );

        $this->add_control(
            'triprex_banner_six_section_sec_style_sec_discount_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.five .banner2-content-wrap .banner2-content h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_six_section_sec_style_sec_discount_sec_sec_span_color',
            [
                'label'     => esc_html__(' Span Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.five .banner2-content-wrap .banner2-content h5 span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_six_section_sec_style_sec_discount_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.five .banner2-content-wrap .banner2-content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_six_section_sec_style_sec_discount_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card.five .banner2-content-wrap .banner2-content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_banner_six_section_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_banner_six_section_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_banner_six_section_btn_style_normal_tab',
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
                'name'     => 'triprex_banner_six_section_btn_style_style_typ',
                'selector' => '{{WRAPPER}} .secondary-btn1',

            ]
        );
        $this->add_control(
            'triprex_banner_six_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_banner_six_section_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .banner2-card.five .banner2-content-wrap .banner2-content .secondary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_six_section_btn_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_six_section_btn_style_padding',
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
            'triprex_banner_six_section_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_banner_six_section_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.five .banner2-content-wrap .banner2-content .secondary-btn1::after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_six_section_btn_style_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.five .banner2-content-wrap .banner2-content .secondary-btn1:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // =====================Style Seven  =======================//

        //General Section
        $this->start_controls_section(
            'triprex_banner_section_style_seven_general_section_style',
            [
                'label' => esc_html__('General', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_seven'
                ]
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_seven_general_section_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_section_style_seven_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Banner Section
        $this->start_controls_section(
            'triprex_banner_seven_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_seven'
                ]
            ]
        );

        //Discount
        $this->add_control(
            'triprex_banner_seven_section_sec_style_sec_discount_sec_sec',
            [
                'label' => esc_html__('Discount', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_seven_section_sec_style_sec_discount_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content h3',

            ]
        );

        $this->add_control(
            'triprex_banner_seven_section_sec_style_sec_discount_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card .banner2-content-wrap .banner2-content h3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_seven_section_sec_style_sec_discount_sec_sec_span_color',
            [
                'label'     => esc_html__(' Span Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.six .banner2-content-wrap .banner2-content h3 span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_seven_section_sec_style_sec_discount_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .banner2-card .banner2-content-wrap .banner2-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_seven_section_sec_style_sec_discount_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}}  .banner2-card .banner2-content-wrap .banner2-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_banner_seven_section_sec_style_sec_sec',
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
                'name'     => 'triprex_banner_seven_section_sec_style_sec_typ',
                'selector' => '{{WRAPPER}} .banner2-card.six .banner2-content-wrap .banner2-content p',

            ]
        );

        $this->add_control(
            'triprex_banner_seven_section_sec_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.six .banner2-content-wrap .banner2-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_seven_section_sec_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.six .banner2-content-wrap .banner2-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_seven_section_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card.six .banner2-content-wrap .banner2-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_banner_seven_section_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_seven_section_btn_style_style_typ',
                'selector' => '{{WRAPPER}} .banner2-card.six .banner2-content-wrap .banner2-content a',

            ]
        );
        $this->add_control(
            'triprex_banner_seven_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .banner2-card.six .banner2-content-wrap .banner2-content a' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .banner2-card.six .banner2-content-wrap .banner2-content a svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_seven_section_btn_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner2-card.six .banner2-content-wrap .banner2-content a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_seven_section_btn_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner2-card.six .banner2-content-wrap .banner2-content a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Banner Section
        $this->start_controls_section(
            'triprex_banner_eight_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_eight'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_eight_section_sec_style_subtitle_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_eight_section_sec_style_subtitle_sec_typ',
                'selector' => '{{WRAPPER}} .banner5-card .banner5-content span',

            ]
        );

        $this->add_control(
            'triprex_banner_eight_section_sec_style_subtitle_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner5-card .banner5-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_sec_style_subtitle_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner5-card .banner5-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_sec_style_subtitle_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner5-card .banner5-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Title
        $this->add_control(
            'triprex_banner_eight_section_sec_style_sec_title_sec_sec',
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
                'name'     => 'triprex_banner_eight_section_sec_style_sec_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .banner5-card .banner5-content h3',

            ]
        );

        $this->add_control(
            'triprex_banner_eight_section_sec_style_sec_title_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner5-card .banner5-content h3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_sec_style_sec_title_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner5-card .banner5-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_sec_style_sec_title_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner5-card .banner5-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Content
        $this->add_control(
            'triprex_banner_eight_section_sec_style_sec_content_sec',
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
                'name'     => 'triprex_banner_eight_section_sec_style_sec_content_sec_typ',
                'selector' => '{{WRAPPER}} .banner5-card .banner5-content a',

            ]
        );

        $this->add_control(
            'triprex_banner_eight_section_sec_style_sec_content_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner5-card .banner5-content a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_sec_style_sec_content_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner5-card .banner5-content a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_sec_style_sec_content_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner5-card .banner5-content a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Offer Title
        $this->add_control(
            'triprex_banner_eight_section_sec_style_sec_offer_title_sec',
            [
                'label' => esc_html__('Offer Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_eight_section_sec_style_sec_offer_title_sec_typ',
                'selector' => '{{WRAPPER}} .banner5-card .banner5-timer h6',

            ]
        );

        $this->add_control(
            'triprex_banner_eight_section_sec_style_sec_offer_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner5-card .banner5-timer h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_sec_style_sec_offer_title_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner5-card .banner5-timer h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_sec_style_sec_offer_title_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner5-card .banner5-timer h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_banner_eight_section_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_banner_eight_section_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_banner_eight_section_btn_style_normal_tab',
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
                'name'     => 'triprex_banner_eight_section_btn_style_style_typ',
                'selector' => '{{WRAPPER}}  .banner5-card .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_banner_eight_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .banner5-card .primary-btn2' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .banner5-card .primary-btn2 svg' => 'fill: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_banner_eight_section_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .banner5-card .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_btn_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .banner5-card .primary-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eight_section_btn_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner5-card .primary-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_banner_eight_section_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_banner_eight_section_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_eight_section_btn_style_color_hover',
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

        $this->end_controls_section();


        //Banner Section
        $this->start_controls_section(
            'triprex_banner_nine_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_nine'
                ]
            ]
        );


        $this->add_control(
            'triprex_banner_nine_section_sec_style_subtitle_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_nine_section_sec_style_subtitle_sec_typ',
                'selector' => '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content span',

            ]
        );

        $this->add_control(
            'triprex_banner_nine_section_sec_style_subtitle_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_nine_section_sec_style_subtitle_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_nine_section_sec_style_subtitle_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Title
        $this->add_control(
            'triprex_banner_nine_section_sec_style_sec_title_sec_sec',
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
                'name'     => 'triprex_banner_nine_section_sec_style_sec_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content h2',

            ]
        );

        $this->add_control(
            'triprex_banner_nine_section_sec_style_sec_title_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_nine_section_sec_style_sec_title_sec_sec_offer_color',
            [
                'label'     => esc_html__('Offer Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content h2 strong' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_nine_section_sec_style_sec_title_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_nine_section_sec_style_sec_title_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Content
        $this->add_control(
            'triprex_banner_nine_section_sec_style_sec_content_sec',
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
                'name'     => 'triprex_banner_nine_section_sec_style_sec_content_sec_typ',
                'selector' => '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content p',

            ]
        );

        $this->add_control(
            'triprex_banner_nine_section_sec_style_sec_content_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_nine_section_sec_style_sec_content_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_nine_section_sec_style_sec_content_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-banner2-area .home4-banner2-wrapper .home4-banner2-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        // Button 
        $this->add_control(
            'triprex_banner_nine_section_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_banner_nine_section_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_banner_nine_section_btn_style_normal_tab',
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
                'name'     => 'triprex_banner_nine_section_btn_style_style_typ',
                'selector' => '{{WRAPPER}}  .secondary-btn1',

            ]
        );
        $this->add_control(
            'triprex_banner_nine_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .secondary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_banner_nine_section_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .secondary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_nine_section_btn_style_margin',
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
            'triprex_banner_nine_section_btn_style_padding',
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
            'triprex_banner_nine_section_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_banner_nine_section_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_nine_section_btn_style_color_hover',
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


        //Banner Section
        $this->start_controls_section(
            'triprex_banner_ten_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_ten'
                ]
            ]
        );

        $this->add_control(
            'triprex_banner_ten_section_sec_style_subtitle_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_ten_section_sec_style_subtitle_sec_typ',
                'selector' => '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content > span',

            ]
        );

        $this->add_control(
            'triprex_banner_ten_section_sec_style_subtitle_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content > span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_ten_section_sec_style_subtitle_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_ten_section_sec_style_subtitle_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Title
        $this->add_control(
            'triprex_banner_ten_section_sec_style_sec_title_sec_sec',
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
                'name'     => 'triprex_banner_ten_section_sec_style_sec_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content h2',

            ]
        );

        $this->add_control(
            'triprex_banner_ten_section_sec_style_sec_title_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_ten_section_sec_style_sec_title_sec_sec_offer_color',
            [
                'label'     => esc_html__('Offer Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content h2 strong' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_ten_section_sec_style_sec_title_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_ten_section_sec_style_sec_title_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Content
        $this->add_control(
            'triprex_banner_ten_section_sec_style_sec_content_sec',
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
                'name'     => 'triprex_banner_ten_section_sec_style_sec_content_sec_typ',
                'selector' => '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content p',

            ]
        );

        $this->add_control(
            'triprex_banner_ten_section_sec_style_sec_content_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_ten_section_sec_style_sec_content_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_ten_section_sec_style_sec_content_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-banner2-section .home5-banner2-wrapper .home5-banner2-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_banner_ten_section_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_banner_ten_section_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_banner_ten_section_btn_style_normal_tab',
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
                'name'     => 'triprex_banner_ten_section_btn_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn5 ',

            ]
        );
        $this->add_control(
            'triprex_banner_ten_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn5 span' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_banner_ten_section_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn5' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_ten_section_btn_style_margin',
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
            'triprex_banner_ten_section_btn_style_padding',
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
            'triprex_banner_ten_section_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_banner_ten_section_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 a:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_ten_section_btn_style_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn5 a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();

        //Banner Section
        $this->start_controls_section(
            'triprex_banner_eleven_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_banner_section_style_selection' => 'style_eleven'
                ]
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_section_sec_style_subtitle_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_banner_eleven_section_sec_style_subtitle_sec_typ',
                'selector' => '{{WRAPPER}} .home6-banner2-area .home6-banner2-content span',

            ]
        );

        $this->add_control(
            'triprex_banner_eleven_section_sec_style_subtitle_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eleven_section_sec_style_subtitle_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eleven_section_sec_style_subtitle_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Title
        $this->add_control(
            'triprex_banner_eleven_section_sec_style_sec_title_sec_sec',
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
                'name'     => 'triprex_banner_eleven_section_sec_style_sec_title_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home6-banner2-area .home6-banner2-content h2',

            ]
        );

        $this->add_control(
            'triprex_banner_eleven_section_sec_style_sec_title_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_section_sec_style_sec_title_sec_sec_offer_color',
            [
                'label'     => esc_html__('Offer Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content h2 strong' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eleven_section_sec_style_sec_title_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eleven_section_sec_style_sec_title_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Content
        $this->add_control(
            'triprex_banner_eleven_section_sec_style_sec_content_sec',
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
                'name'     => 'triprex_banner_eleven_section_sec_style_sec_content_sec_typ',
                'selector' => '{{WRAPPER}} .home6-banner2-area .home6-banner2-content p',

            ]
        );

        $this->add_control(
            'triprex_banner_eleven_section_sec_style_sec_content_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eleven_section_sec_style_sec_content_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eleven_section_sec_style_sec_content_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-banner2-area .home6-banner2-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_banner_eleven_section_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_banner_eleven_section_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_banner_eleven_section_btn_style_normal_tab',
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
                'name'     => 'triprex_banner_eleven_section_btn_style_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_banner_eleven_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_banner_eleven_section_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_banner_eleven_section_btn_style_margin',
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
            'triprex_banner_eleven_section_btn_style_padding',
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
            'triprex_banner_eleven_section_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_section_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_banner_eleven_section_btn_style_color_hover',
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
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_banner_eight_content_list'];
        $data2 = $settings['triprex_banner_nine_content_list'];
        $data3 = $settings['triprex_banner_ten_content_list'];




?>
        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".home4-banner2-slider", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 25,
                    effect: 'fade', // Use the fade effect
                    fadeEffect: {
                        crossFade: true, // Enable cross-fade transition
                    },
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".home4-banner2-slider-next",
                        prevEl: ".home4-banner2-slider-prev",
                    },
                });
                var swiper = new Swiper(".banner5-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    loop: true,
                    navigation: {
                        nextEl: ".banner5-slider-next",
                        prevEl: ".banner5-slider-prev",
                    },
                });

                var swiper = new Swiper(".home5-banner2-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    effect: 'fade', // Use the fade effect
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
            </script>
        <?php endif ?>
        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_one') : ?>
            <div class="banner2-card">
                <?php if (!empty($settings['triprex_banner_one_section_bg_image']['url'])) :   ?>
                    <img src="<?php echo esc_url($settings['triprex_banner_one_section_bg_image']['url']) ?>" alt="<?php echo esc_attr__('banner-image ', 'triprex-core') ?>">
                <?php endif ?>
                <div class="banner2-content-wrap">
                    <div class="banner2-content">
                        <?php if (!empty($settings['triprex_banner_one_title_section_sec'])) :   ?>
                            <span><?php echo esc_html($settings['triprex_banner_one_title_section_sec']); ?></span>
                        <?php endif ?>
                        <?php if (!empty($settings['triprex_banner_one_discount_section_sec'])) :   ?>
                            <h3><?php echo esc_html($settings['triprex_banner_one_discount_section_sec']); ?></h3>
                        <?php endif ?>
                        <?php if (!empty($settings['triprex_banner_one_content_section_sec'])) :   ?>
                            <a href="<?php echo esc_url($settings['triprex_banner_one_content_section_sec_url']['url']) ?>"><?php echo esc_html($settings['triprex_banner_one_content_section_sec']); ?></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_two') : ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner2-card two ">
                        <?php if (!empty($settings['triprex_banner_two_section_bg_image']['url'])) :   ?>
                            <img src="<?php echo esc_url($settings['triprex_banner_two_section_bg_image']['url']) ?>" alt="<?php echo esc_attr__('banner-image ', 'triprex-core') ?>">
                        <?php endif ?>
                        <div class="banner2-content-wrap">
                            <div class="banner2-content">
                                <?php if (!empty($settings['triprex_banner_two_title_section_sec'])) :   ?>
                                    <span><?php echo esc_html($settings['triprex_banner_two_title_section_sec']); ?></span>
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_banner_two_content_section_sec'])) :   ?>
                                    <a href="<?php echo esc_url($settings['triprex_banner_two_content_section_sec_url']['url']) ?>"><?php echo esc_html($settings['triprex_banner_two_content_section_sec']); ?></a>
                                <?php endif ?>
                            </div>
                            <div class="offer-batch">
                                <?php if (!empty($settings['triprex_banner_two_discount_section_sec'])) :   ?>
                                    <span><?php echo wp_kses($settings['triprex_banner_two_discount_section_sec'], wp_kses_allowed_html('post'))  ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>


        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_three') : ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner2-card three">
                        <?php if (!empty($settings['triprex_banner_three_section_bg_image']['url'])) :   ?>
                            <img src="<?php echo esc_url($settings['triprex_banner_three_section_bg_image']['url']) ?>" alt="<?php echo esc_attr__('banner-image ', 'triprex-core') ?>">
                        <?php endif ?>
                        <div class="banner2-content-wrap d-flex align-items-center">
                            <div class="w-100">
                                <div class="banner2-content">
                                    <?php if (!empty($settings['triprex_banner_three_title_section_sec'])) :   ?>
                                        <span><?php echo esc_html($settings['triprex_banner_three_title_section_sec']); ?></span>
                                    <?php endif ?>
                                    <?php if (!empty($settings['triprex_banner_three_discount_section_sec'])) :   ?>
                                        <h5><?php echo wp_kses($settings['triprex_banner_three_discount_section_sec'], wp_kses_allowed_html('post'))  ?></h5>
                                    <?php endif ?>
                                    <?php if (!empty($settings['triprex_banner_three_location_section_sec'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_banner_three_location_section_sec']); ?></p>
                                    <?php endif ?>
                                </div>
                                <?php if (!empty($settings['triprex_banner_three_content_btn_section_sec'])) :   ?>
                                    <a href="<?php echo esc_url($settings['triprex_banner_three_button_section_sec_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_banner_three_content_btn_section_sec']); ?></a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_four') : ?>
            <div class="banner2-card four">
                <?php if (!empty($settings['triprex_banner_four_section_bg_image']['url'])) :   ?>
                    <img src="<?php echo esc_url($settings['triprex_banner_four_section_bg_image']['url']) ?>" alt="<?php echo esc_attr__('banner-img ', 'triprex-core') ?>">
                <?php endif ?>
                <div class="banner2-content-wrap">
                    <div class="banner2-content">
                        <?php if (!empty($settings['triprex_banner_four_title_section_sec'])) :   ?>
                            <span><?php echo esc_html($settings['triprex_banner_four_title_section_sec']); ?></span>
                        <?php endif ?>
                        <?php if (!empty($settings['triprex_banner_four_discount_section_sec'])) :   ?>
                            <h3><?php echo esc_html($settings['triprex_banner_four_discount_section_sec']); ?></h3>
                        <?php endif ?>
                        <?php if (!empty($settings['triprex_banner_four_content_section_sec'])) :   ?>
                            <p><?php echo esc_html($settings['triprex_banner_four_content_section_sec']); ?></p>
                        <?php endif ?>
                    </div>
                    <?php if (!empty($settings['triprex_banner_four_content_btn_section_sec'])) :   ?>
                        <a href="<?php echo esc_url($settings['triprex_banner_four_button_section_sec_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_banner_four_content_btn_section_sec']); ?></a>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_five') : ?>
            <div class="col-lg-12">
                <div class="banner4-card four">
                    <?php if (!empty($settings['triprex_banner_five_section_bg_image']['url'])) :   ?>
                        <img src="<?php echo esc_url($settings['triprex_banner_five_section_bg_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                    <?php endif ?>
                    <div class="banner4-content-wrapper">
                        <div class="banner4-content">
                            <?php if (!empty($settings['triprex_banner_five_title_section_sec'])) :   ?>
                                <span><?php echo esc_html($settings['triprex_banner_five_title_section_sec']); ?></span>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_banner_five_discount_section_sec'])) :   ?>
                                <h3><?php echo esc_html($settings['triprex_banner_five_discount_section_sec']); ?></h3>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_banner_five_content_section_sec'])) :   ?>
                                <a href="<?php echo esc_url($settings['triprex_banner_five_content_section_sec_url']['url']) ?>" class="text"><?php echo esc_html($settings['triprex_banner_five_content_section_sec']); ?></a>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_banner_five_content_btn_section_sec'])) :   ?>
                                <a href="<?php echo esc_url($settings['triprex_banner_five_button_section_sec_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_banner_five_content_btn_section_sec']); ?></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>


        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_six') : ?>
            <div class="col-lg-12">
                <div class="banner2-card five">
                    <?php if (!empty($settings['triprex_banner_six_section_bg_image']['url'])) :   ?>
                        <img src="<?php echo esc_url($settings['triprex_banner_six_section_bg_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                    <?php endif ?>
                    <div class="banner2-content-wrap d-flex align-items-center">
                        <div class="w-100 d-flex flex-column align-items-end">
                            <div class="banner2-content">
                                <?php if (!empty($settings['triprex_banner_six_title_section_sec'])) :   ?>
                                    <span><?php echo esc_html($settings['triprex_banner_six_title_section_sec']); ?></span>
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_banner_six_discount_section_sec'])) :   ?>
                                    <h5><?php echo wp_kses($settings['triprex_banner_six_discount_section_sec'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_banner_six_content_btn_section_sec'])) :   ?>
                                    <a href="<?php echo esc_url($settings['triprex_banner_six_button_section_sec_url']['url']) ?>" class="secondary-btn1"><?php echo esc_html($settings['triprex_banner_six_content_btn_section_sec']); ?></a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_seven') : ?>
            <div class="col-lg-6">
                <div class="banner2-card six">
                    <?php if (!empty($settings['triprex_banner_seven_section_bg_image']['url'])) :   ?>
                        <img src="<?php echo esc_url($settings['triprex_banner_seven_section_bg_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                    <?php endif ?>
                    <div class="banner2-content-wrap">
                        <div class="banner2-content">
                            <?php if (!empty($settings['triprex_banner_seven_discount_section_sec'])) :   ?>
                                <h3><?php echo wp_kses($settings['triprex_banner_seven_discount_section_sec'], wp_kses_allowed_html('post'))  ?></h3>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_banner_seven_content_section_sec'])) :   ?>
                                <p><?php echo esc_html($settings['triprex_banner_seven_content_section_sec']); ?></p>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_banner_seven_content_btn_section_sec'])) :   ?>
                                <a href="<?php echo esc_url($settings['triprex_banner_seven_button_section_sec_url']['url']) ?>"><?php echo esc_html($settings['triprex_banner_seven_content_btn_section_sec']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                        <path d="M7.70294 9.65818L7.27464 11.6673L5.29549 17.0003L6.47016 16.8046L11.9577 9.62856C12.7321 9.6016 13.4832 9.56006 14.1359 9.49563C17.1552 9.19702 16.9986 8.50013 16.9986 8.50013C16.9986 8.50013 17.1552 7.80325 14.1358 7.50464C13.4832 7.43995 12.7321 7.39845 11.9576 7.3717L6.47019 0.195477L5.29549 -5.1162e-07L7.27464 5.33303L7.70294 7.34212C6.69752 7.35717 6.01715 7.38006 6.01715 7.38006C6.01715 7.38006 4.63017 7.41207 2.48417 7.8956L0.734503 5.46859L-8.41624e-05 5.46859L0.523018 8.41949C0.428867 8.44835 0.428867 8.55195 0.523018 8.58081L-8.44274e-05 11.5317L0.734502 11.5317L2.48417 9.10495C4.63017 9.58848 6.01715 9.62001 6.01715 9.62001C6.01715 9.62001 6.69752 9.64317 7.70294 9.65818Z" />
                                        <path d="M11.4004 11.2692L11.4004 12.0613L8.47265 12.0613L8.47265 11.2692L11.4004 11.2692ZM11.4004 4.94234L11.4004 5.73425L8.47282 5.73425L8.47282 4.94234L11.4004 4.94234ZM9.42515 13.9276L9.42515 14.7195L6.71923 14.7195L6.71923 13.9276L9.42515 13.9276ZM9.42515 2.28418L9.42515 3.07634L6.71924 3.07634L6.71924 2.28418L9.42515 2.28418Z" />
                                    </svg>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif ?>

        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_eight') : ?>
            <div class="banner5-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper banner5-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data as $item) : ?>
                                        <div class="swiper-slide">
                                            <div class="banner5-card">
                                                <div class="banner5-content">
                                                    <?php if (!empty($item['triprex_banner_eight_subtitle_sec_sec'])) :   ?>
                                                        <span><?php echo esc_html($item['triprex_banner_eight_subtitle_sec_sec']); ?></span>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_banner_eight_title_sec_sec'])) :   ?>
                                                        <h3><?php echo esc_html($item['triprex_banner_eight_title_sec_sec']); ?></h3>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_banner_eight_content_sec_sec'])) :   ?>
                                                        <a href="<?php echo esc_url($item['triprex_banner_eight_content_sec_sec_url']['url']) ?>"><?php echo esc_html($item['triprex_banner_eight_content_sec_sec']); ?></a>
                                                    <?php endif ?>
                                                </div>
                                                <?php if (!empty($item['triprex_banner_eight_offer_end_text_due_time'])) :   ?>
                                                    <div class="banner5-timer">
                                                        <?php if (!empty($item['triprex_banner_eight_offer_end_text_sec_sec'])) :   ?>
                                                            <h6><?php echo esc_html($item['triprex_banner_eight_offer_end_text_sec_sec']); ?></h6>
                                                        <?php endif ?>
                                                        <div class="countdown-timer">
                                                            <ul data-countdown="<?php echo esc_html($item['triprex_banner_eight_offer_end_text_due_time']); ?>">
                                                                <li data-days="00">00</li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="13" viewBox="0 0 4 13">
                                                                        <path d="M0 11.0633C0 11.5798 0.186992 12.0317 0.560976 12.419C0.95122 12.8063 1.43089 13 2 13C2.58537 13 3.06504 12.8063 3.43903 12.419C3.81301 12.0317 4 11.5798 4 11.0633C4 10.5146 3.81301 10.0546 3.43903 9.68343C3.06504 9.29609 2.58537 9.10242 2 9.10242C1.43089 9.10242 0.95122 9.29609 0.560976 9.68343C0.186992 10.0546 0 10.5146 0 11.0633ZM0 1.96089C0 2.49348 0.186992 2.95345 0.560976 3.34078C0.95122 3.72812 1.43089 3.92179 2 3.92179C2.58537 3.92179 3.06504 3.72812 3.43903 3.34078C3.81301 2.95345 4 2.49348 4 1.96089C4 1.42831 3.81301 0.968343 3.43903 0.581006C3.06504 0.193669 2.58537 0 2 0C1.43089 0 0.95122 0.193669 0.560976 0.581006C0.186992 0.968343 0 1.42831 0 1.96089Z" />
                                                                    </svg>
                                                                </li>
                                                                <li data-hours="00">00</li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="13" viewBox="0 0 4 13">
                                                                        <path d="M0 11.0633C0 11.5798 0.186992 12.0317 0.560976 12.419C0.95122 12.8063 1.43089 13 2 13C2.58537 13 3.06504 12.8063 3.43903 12.419C3.81301 12.0317 4 11.5798 4 11.0633C4 10.5146 3.81301 10.0546 3.43903 9.68343C3.06504 9.29609 2.58537 9.10242 2 9.10242C1.43089 9.10242 0.95122 9.29609 0.560976 9.68343C0.186992 10.0546 0 10.5146 0 11.0633ZM0 1.96089C0 2.49348 0.186992 2.95345 0.560976 3.34078C0.95122 3.72812 1.43089 3.92179 2 3.92179C2.58537 3.92179 3.06504 3.72812 3.43903 3.34078C3.81301 2.95345 4 2.49348 4 1.96089C4 1.42831 3.81301 0.968343 3.43903 0.581006C3.06504 0.193669 2.58537 0 2 0C1.43089 0 0.95122 0.193669 0.560976 0.581006C0.186992 0.968343 0 1.42831 0 1.96089Z" />
                                                                    </svg>
                                                                </li>
                                                                <li data-minutes="00">00</li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="13" viewBox="0 0 4 13">
                                                                        <path d="M0 11.0633C0 11.5798 0.186992 12.0317 0.560976 12.419C0.95122 12.8063 1.43089 13 2 13C2.58537 13 3.06504 12.8063 3.43903 12.419C3.81301 12.0317 4 11.5798 4 11.0633C4 10.5146 3.81301 10.0546 3.43903 9.68343C3.06504 9.29609 2.58537 9.10242 2 9.10242C1.43089 9.10242 0.95122 9.29609 0.560976 9.68343C0.186992 10.0546 0 10.5146 0 11.0633ZM0 1.96089C0 2.49348 0.186992 2.95345 0.560976 3.34078C0.95122 3.72812 1.43089 3.92179 2 3.92179C2.58537 3.92179 3.06504 3.72812 3.43903 3.34078C3.81301 2.95345 4 2.49348 4 1.96089C4 1.42831 3.81301 0.968343 3.43903 0.581006C3.06504 0.193669 2.58537 0 2 0C1.43089 0 0.95122 0.193669 0.560976 0.581006C0.186992 0.968343 0 1.42831 0 1.96089Z" />
                                                                    </svg>
                                                                </li>
                                                                <li data-seconds="00">00</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                                <?php if (!empty($item['triprex_banner_eight_content_btn_section_sec'])) :   ?>
                                                    <a href="<?php echo esc_url($item['triprex_banner_eight_button_section_sec_url']['url']) ?>" class="primary-btn2"><?php echo esc_html($item['triprex_banner_eight_content_btn_section_sec']); ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                            <path d="M8.15624 10.2261L7.70276 12.3534L5.60722 18L6.85097 17.7928L12.6612 10.1948C13.4812 10.1662 14.2764 10.1222 14.9674 10.054C18.1643 9.73783 17.9985 8.99997 17.9985 8.99997C17.9985 8.99997 18.1643 8.26211 14.9674 7.94594C14.2764 7.87745 13.4811 7.8335 12.6611 7.80518L6.851 0.206972L5.60722 -5.41705e-07L7.70276 5.64663L8.15624 7.77386C7.0917 7.78979 6.37132 7.81403 6.37132 7.81403C6.37132 7.81403 4.90278 7.84793 2.63059 8.35988L0.778036 5.79016L0.000253424 5.79016L0.554115 8.91458C0.454429 8.94514 0.454429 9.05483 0.554115 9.08539L0.000253144 12.2098L0.778036 12.2098L2.63059 9.64035C4.90278 10.1523 6.37132 10.1857 6.37132 10.1857C6.37132 10.1857 7.0917 10.2102 8.15624 10.2261Z"></path>
                                                            <path d="M12.0703 11.9318L12.0703 12.7706L8.97041 12.7706L8.97041 11.9318L12.0703 11.9318ZM12.0703 5.23292L12.0703 6.0714L8.97059 6.0714L8.97059 5.23292L12.0703 5.23292ZM9.97892 14.7465L9.97892 15.585L7.11389 15.585L7.11389 14.7465L9.97892 14.7465ZM9.97892 2.41846L9.97892 3.2572L7.11389 3.2572L7.11389 2.41846L9.97892 2.41846Z"></path>
                                                        </svg>
                                                    </a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-btn-grp2">
                    <div class="slider-btn banner5-slider-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20">
                            <path d="M9.58985 0.608227L9.46322 0.476797L0.152848 10.0006L9.46322 19.5244L9.58984 19.393L9.58984 15.212L4.49707 10.0006L9.58985 4.78918L9.58985 0.608227Z" />
                        </svg>
                    </div>
                    <div class="slider-btn banner5-slider-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20">
                            <path d="M0.408203 19.3918L0.534824 19.5232L9.8452 9.99939L0.534824 0.475586L0.408203 0.607014L0.408203 4.78797L5.50098 9.99939L0.408203 15.2108L0.408203 19.3918Z" />
                        </svg>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_nine') : ?>
            <div class="home4-banner2-area">
                <div class="slider-btn-grp2">
                    <div class="slider-btn home4-banner2-slider-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 9 17">
                            <path d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z"></path>
                        </svg>
                    </div>
                    <div class="slider-btn home4-banner2-slider-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 9 17" fill="none">
                            <path d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="home4-banner2-wrapper">
                        <div class="swiper home4-banner2-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($data2 as $item2) : ?>
                                    <div class="swiper-slide">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-lg-4 p-0">
                                                <div class="home4-banner2-content">
                                                    <?php if (!empty($item2['triprex_banner_nine_subtitle_sec_sec'])) :   ?>
                                                        <span><?php echo esc_html($item2['triprex_banner_nine_subtitle_sec_sec']); ?></span>
                                                    <?php endif ?>
                                                    <?php if (!empty($item2['triprex_banner_nine_title_sec_sec'])) :   ?>
                                                        <h2><?php echo wp_kses($item2['triprex_banner_nine_title_sec_sec'], wp_kses_allowed_html('post'))  ?></h2>
                                                    <?php endif ?>
                                                    <?php if (!empty($item2['triprex_banner_nine_content_sec_sec'])) :   ?>
                                                        <p><?php echo esc_html($item2['triprex_banner_nine_content_sec_sec']); ?></p>
                                                    <?php endif ?>
                                                    <?php if (!empty($item2['triprex_banner_nine_content_btn_section_sec'])) :   ?>
                                                        <a href="<?php echo esc_url($item2['triprex_banner_nine_button_section_sec_url']['url']) ?>" class="secondary-btn1"><?php echo esc_html($item2['triprex_banner_nine_content_btn_section_sec']); ?></a>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 p-0">
                                                <?php if (!empty($item2['triprex_banner_nine_image']['url'])) :   ?>
                                                    <div class="home4-banner2-img">
                                                        <img src="<?php echo esc_url($item2['triprex_banner_nine_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_ten') : ?>
            <div class="home5-banner2-section ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper home5-banner2-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data3 as $item) : ?>
                                        <div class="swiper-slide">

                                            <div class="home5-banner2-wrapper" <?php if (!empty($item['triprex_banner_ten_image']['url'])) { ?> style="background-image: linear-gradient(89deg, rgba(246, 236, 226, 0.98) 40.04%, rgba(246, 236, 226, 0.90) 43%, rgba(246, 236, 226, 0.78) 46.55%, rgba(246, 236, 226, 0.69) 49.27%, rgba(246, 236, 226, 0.58) 51.76%, rgba(246, 236, 226, 0.00) 64.69%), url(<?php echo esc_url($item['triprex_banner_ten_image']['url']) ?>);" <?php } ?>>

                                                <div class="home5-banner2-content">
                                                    <?php if (!empty($item['triprex_banner_ten_subtitle_sec_sec'])) :   ?>
                                                        <span><?php echo esc_html($item['triprex_banner_ten_subtitle_sec_sec']); ?></span>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_banner_ten_title_sec_sec'])) :   ?>
                                                        <h2><?php echo wp_kses($item['triprex_banner_ten_title_sec_sec'], wp_kses_allowed_html('post'))  ?></h2>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_banner_ten_content_sec_sec'])) :   ?>
                                                        <p><?php echo esc_html($item['triprex_banner_ten_content_sec_sec']); ?></p>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_banner_ten_content_btn_section_sec'])) :   ?>
                                                        <a href="<?php echo esc_url($item['triprex_banner_ten_button_section_sec_url']['url']) ?>" class="primary-btn5">
                                                            <span>
                                                                <?php echo esc_html($item['triprex_banner_ten_content_btn_section_sec']); ?>
                                                            </span>
                                                        </a>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="swiper-pagination5 pagination1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_banner_section_style_selection'] == 'style_eleven') : ?>
            <div class="home6-banner2-area">
                <div class="row g-0 align-items-center justify-content-between">
                    <div class="col-lg-12">
                        <div class="home6-banner2-content">
                            <?php if (!empty($settings['triprex_banner_eleven_subtitle_sec_sec'])) :   ?>
                                <span><?php echo esc_html($settings['triprex_banner_eleven_subtitle_sec_sec']); ?></span>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_banner_eleven_title_sec_sec'])) :   ?>
                                <h2><?php echo wp_kses($settings['triprex_banner_eleven_title_sec_sec'], wp_kses_allowed_html('post'))  ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_banner_eleven_content_sec_sec'])) :   ?>
                                <p><?php echo esc_html($settings['triprex_banner_eleven_content_sec_sec']); ?></p>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_banner_eleven_content_btn_section_sec'])) :   ?>
                                <a href="<?php echo esc_url($settings['triprex_banner_eleven_button_section_sec_url']['url']) ?>" class="primary-btn1 two"><?php echo esc_html($settings['triprex_banner_eleven_content_btn_section_sec']); ?></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new triprex_Banner_Widget());
