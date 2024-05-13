<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_About_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_about';
    }

    public function get_title()
    {
        return esc_html__('EG About', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-lock-user';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'triprex_about_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_about_content_style_selection',
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

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_about_one_section_genaral',
            [
                'label' => esc_html__('About Section', 'triprex-core'),
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_heading_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('About Us'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Let’s know About Our Journey For TripRex.'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_about_tab_section',
            [
                'label' => esc_html__('Tabs', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_about_tab_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'triprex_about_tab_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mission & Vision'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_about_tab_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis pulv gont congue. Suspendisse ullamcorper, enim vitae tristique blandit, eratot augue torel tempo libero, non porta lectus tortor et elit. Quisque finibusot enim et eratourgt gravida, eu elementum turpis lacinia. Integer female go tellus ligula, attendora and condimentum.'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_about_tab_content_list',
            [
                'label' => esc_html__('Tab List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_about_tab_title' => esc_html('Mission & Vision'),

                    ],

                ],
                'title_field' => '{{{ triprex_about_tab_title }}}',
            ]
        );

        $this->add_control(
            'triprex_about_button_section',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_about_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('More About'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_about_button_text_url',
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
            'triprex_about_counter_section',
            [
                'label' => esc_html__('Counter Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_counter_section_image',
            [
                'label' => esc_html__(' Customer Images', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_about_counter_section_number',
            [
                'label' => esc_html__('Counter Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('600', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your counter number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_counter_section_plus_icon_switcher_one',
            [
                'label' => esc_html__("Show '+' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'triprex_about_counter_section_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Customer'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_about_image_section',
            [
                'label' => esc_html__('Image Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_image',
            [
                'label' => esc_html__('Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();

        //Content Two
        $this->start_controls_section(
            'triprex_about_two_section_genaral',
            [
                'label' => esc_html__('About Section', 'triprex-core'),
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_two_heading_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_two_subtitle',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('About Us'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_two_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('We provide the best tour facilities.'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_two_desc',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis pulv gont congue. Suspendisse ullamcorper.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_about_facilities_section',
            [
                'label' => esc_html__('Facility', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_about_facilities_section_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'triprex_about_facilities_section_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Safety first <br>Always', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_about_facilities_section_list',
            [
                'label' => esc_html__(' List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_about_facilities_section_title' => esc_html('Safety first '),

                    ],

                ],
                'title_field' => '{{{ triprex_about_facilities_section_title }}}',
            ]
        );

        $this->add_control(
            'triprex_about_two_button_section',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_about_two_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Find Out More'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_about_two_button_text_url',
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
            'triprex_about_two_video_button_section',
            [
                'label' => esc_html__('Video Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_about_two_video_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Watch Tour '),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_video_section_genaral_video_style_design',
            [
                'label'     => esc_html__('Video Source', 'triprex-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'link',
                'options'   => [
                    'file'      => esc_html__('File', 'triprex-core'),
                    'link'      => esc_html__('Link', 'triprex-core'),
                ],
            ]
        );

        $this->add_control(
            'triprex_video_section_genaral_video_style_design_upload_video',
            [
                'label' => esc_html__('Choose Video', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition' => [
                    'triprex_video_section_genaral_video_style_design' => 'file'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],


            ]
        );

        $this->add_control(
            'triprex_video_section_genaral_video_style_url',
            [
                'label' => esc_html__('Link', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://getcoderzone.com/dummy_video/hotel-room-2021-11-03-20-39-09-utc.mp4',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'triprex_video_section_genaral_video_style_design' => 'link'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_two_image_section',
            [
                'label' => esc_html__('Banner Image ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_two_image_section_image',
            [
                'label' => esc_html__('  Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_about_two_experience_section',
            [
                'label' => esc_html__('Experience Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_two_experience_section_number',
            [
                'label' => esc_html__(' Year', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('05'),
                'placeholder' => esc_html__('Type your experience year here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_two_experience_section_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Years of experience'),
                'placeholder' => esc_html__('Type your experience title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_two_counter_section',
            [
                'label' => esc_html__('Counter Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_about_two_counter_section_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'triprex_about_two_counter_section_number',
            [
                'label' => esc_html__('Counter Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('3.5', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your counter number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_about_counter_section_others_icon_switcher_two',
            [
                'label' => esc_html__("Show 'k' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $repeater->add_control(
            'triprex_about_counter_section_plus_icon_switcher_two',
            [
                'label' => esc_html__("Show '+' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $repeater->add_control(
            'triprex_about_counter_section_parcent_icon_switcher',
            [
                'label' => esc_html__("Show '%' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'triprex_about_two_counter_section_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Happy Traveler'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_about_two_counter_section_list',
            [
                'label' => esc_html__(' List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_about_two_counter_section_content' => esc_html('Happy Traveler '),

                    ],

                ],
                'title_field' => '{{{ triprex_about_two_counter_section_content }}}',
            ]
        );

        $this->add_control(
            'triprex_about_two_review_section',
            [
                'label' => esc_html__('Review Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_two_review_section_review_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Excellent!'),
                'placeholder' => esc_html__('Type your review title here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_testimonial_two_genaral_review_testimony_review_star',
            [
                'label'         => esc_html__('Rating', 'triprex-core'),
                'type'             => Controls_Manager::NUMBER,
                'min'             => 0,
                'max'             => 5,
                'step'             => 1,
                'default'         => 5,
                'dynamic'         => [
                    'active'     => true,
                ],
            ]
        );



        $this->add_control(
            'triprex_about_two_review_section_review_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Rating out of <strong>5.0</strong> based on <a href="https://www.tripadvisor.com/"><strong>245354</strong>
                reviews</a>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your review content here', 'triprex-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'triprex_about_two_review_section_area_review_logo',
            [
                'label' => esc_html__(' Review Logo', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        //Content Three
        $this->start_controls_section(
            'triprex_about_three_section_genaral',
            [
                'label' => esc_html__('About Section', 'triprex-core'),
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_three_heading_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_three_title',
            [
                'label' => esc_html__('  Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Who We Are'),
                'placeholder' => esc_html__('Type your stitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_three_content',
            [
                'label' => esc_html__(' Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Aenean feugiat ante ident augue bibendum, bibendum interdum dunatont fermentum. Integer auctor enim eget excet eleifend tristique. Suspendisse sed elit tortor. Nunc luctus, tellus acces elementum accumsan, diam dolor accumsan eros, sit amet porttitor diam ante ac augue.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_three_facilities_section',
            [
                'label' => esc_html__('Facilities', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_about_three_facilitties_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );


        $repeater->add_control(
            'triprex_about_three_facilitties_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Safety First Always'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_about_three_facilitties_content',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Praesent gravida nunc at tortor cursus, molestie dapibus purus posuere. Vestibulum commodo, massa eget rutrum feugiat'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_three_facilitties_list',
            [
                'label' => esc_html__('Facilities List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_about_three_facilitties_title' => esc_html('Safety First Always'),

                    ],

                ],
                'title_field' => '{{{ triprex_about_three_facilitties_title }}}',
            ]
        );


        $this->add_control(
            'triprex_about_three_counter_section',
            [
                'label' => esc_html__('Counter Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_three_counter_badge_text',
            [
                'label' => esc_html__(' Badge Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('TRAVEL.AGENCY.EST-2024.'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_three_counter_number',
            [
                'label' => esc_html__(' Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('2.5'),
                'placeholder' => esc_html__('Type your number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_three_counter_number_others_icon_switcher',
            [
                'label' => esc_html__("Show 'K' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'triprex_about_three_counter_number_plus_icon_switcher',
            [
                'label' => esc_html__("Show '+' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'triprex_about_three_counter_content',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('Tours <br>Success', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_three_video_section',
            [
                'label' => esc_html__('Video Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_about_three_video_section_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_about_three_video_text',
            [
                'label' => esc_html__(' Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Watch Tour'),
                'placeholder' => esc_html__('Type your video text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_three_video_style_design',
            [
                'label'     => esc_html__('Video Source', 'triprex-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'link',
                'options'   => [
                    'file'      => esc_html__('File', 'triprex-core'),
                    'link'      => esc_html__('Link', 'triprex-core'),
                ],
            ]
        );

        $this->add_control(
            'triprex_about_three_video_design_upload_video',
            [
                'label' => esc_html__('Choose Video', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition' => [
                    'triprex_about_three_video_style_design' => 'file'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],


            ]
        );

        $this->add_control(
            'triprex_about_three_video_style_design_style_url',
            [
                'label' => esc_html__('Link', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://getcoderzone.com/dummy_video/hotel-room-2021-11-03-20-39-09-utc.mp4',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'triprex_about_three_video_style_design' => 'link'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_three_banner_image_sec',
            [
                'label' => esc_html__('Banner Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_about_three_banner_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        //Content Four
        $this->start_controls_section(
            'triprex_about_four_section_genaral',
            [
                'label' => esc_html__('About Section', 'triprex-core'),
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_four_heading_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_four_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Welcome To <span>TripRex</span> And Find Some Amazing Tour.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your stitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_four_content',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_four_author_area_section',
            [
                'label' => esc_html__('Author Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_four_author_image',
            [
                'label' => esc_html__('Author Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_about_four_author_content',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulu porttitor erat felis and sed vehicula tortor malesuadano gravida mauris volutpat enim.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_four_services_area_section',
            [
                'label' => esc_html__('Services Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_four_services_list',
            [
                'label' => esc_html__('Services', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Travel Alerts and Registration'),
                'placeholder' => esc_html__('Type your services here', 'triprex-core'),
                'label_block' => true,
                'description' => esc_html__('Enter A List Of Services Separated By Line Breaks.', 'triprex-core'),

            ]
        );

        $this->add_control(
            'triprex_about_four_counter_section',
            [
                'label' => esc_html__('Counter Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_about_four_counter_section_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'triprex_about_four_counter_section_number',
            [
                'label' => esc_html__('Counter Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('10', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your counter number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_about_four_counter_section_number_text',
            [
                'label' => esc_html__(' Number Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('M', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your  number text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_about_four_counter_section_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Happy Traveler'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_about_four_counter_section_list',
            [
                'label' => esc_html__(' List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_about_four_counter_section_content' => esc_html('Happy Traveler '),

                    ],

                ],
                'title_field' => '{{{ triprex_about_four_counter_section_content }}}',
            ]
        );

        $this->add_control(
            'triprex_about_four_banner_image_sec',
            [
                'label' => esc_html__('Banner Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_four_banner_image',
            [
                'label' => esc_html__('
                Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        //Content Five
        $this->start_controls_section(
            'triprex_about_five_section_genaral',
            [
                'label' => esc_html__('About Section', 'triprex-core'),
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_five_heading_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_five_subtitle',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('About US Now'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_about_five_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('We Are Whom You Trusted Travel Companion.'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_five_content',
            [
                'label' => esc_html__(' Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_five_banner_image_section',
            [
                'label' => esc_html__('Banner Images', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_five_top_image',
            [
                'label' => esc_html__('Top Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_about_five_bottom_image',
            [
                'label' => esc_html__('Bottom Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );



        $this->add_control(
            'triprex_about_five_services_area_section',
            [
                'label' => esc_html__('Services', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_about_five_services_section_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'triprex_about_five_services_section_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Safety First Always'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_about_five_services_section_content_list',
            [
                'label' => esc_html__(' List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_about_five_services_section_content' => esc_html('Safety First Always'),

                    ],

                ],
                'title_field' => '{{{ triprex_about_five_services_section_content }}}',
            ]
        );


        $this->add_control(
            'triprex_about_five_services_section_content_button_section',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_five_services_section_content_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Discover More'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_five_services_section_content_button_url',
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
            'triprex_about_five_contact_area_section',
            [
                'label' => esc_html__('Contact Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_about_five_contact_area_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'triprex_about_five_contact_area_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('To More Inquiry'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_about_five_contact_area_number',
            [
                'label' => esc_html__('Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('+990-737 621 432'),
                'placeholder' => esc_html__('Type your number here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_about_five_contact_area_section_content_list',
            [
                'label' => esc_html__(' Contact List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_about_five_contact_area_title' => esc_html('To More Inquiry'),

                    ],

                ],
                'title_field' => '{{{ triprex_about_five_contact_area_title }}}',
            ]
        );

        $this->end_controls_section();

        //Content six
        $this->start_controls_section(
            'triprex_about_six_section_genaral',
            [
                'label' => esc_html__('About Section', 'triprex-core'),
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_six_heading_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_six_subtitle',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Let’s About Us'),
                'placeholder' => esc_html__('Type your sub title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_six_title',
            [
                'label' => esc_html__('  Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Who We Are Your Trusted Travel Companion'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_six_content',
            [
                'label' => esc_html__(' Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehiculant tortor malesuada gravida. Mauris volutpat enim quis pulv gont congue. Suspendisse ullamcor. In this luxurious getaway, no expense has been spared. You will be captivated by fine a ghosa cuisines, the naivety of local people and top notched services.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_six_facilities_section',
            [
                'label' => esc_html__('Facilities', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_about_six_facilitties_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );


        $repeater->add_control(
            'triprex_about_six_facilitties_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Safety First Always'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_about_six_facilitties_content',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Praesent gravida nunc at tortor cursus, molestie dapibus purus posuere. Vestibulum commodo, massa eget rutrum feugiat'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_six_facilitties_list',
            [
                'label' => esc_html__('Facilities List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_about_six_facilitties_title' => esc_html('Safety First Always'),

                    ],

                ],
                'title_field' => '{{{ triprex_about_six_facilitties_title }}}',
            ]
        );


        $this->add_control(
            'triprex_about_six_counter_section',
            [
                'label' => esc_html__('Counter Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_six_counter_badge_text',
            [
                'label' => esc_html__('Badge Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('TRAVEL.AGENCY.EST-2024.'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_six_counter_number',
            [
                'label' => esc_html__('Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('2.5'),
                'placeholder' => esc_html__('Type your number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_six_counter_number_others_icon_switcher',
            [
                'label' => esc_html__("Show 'K' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'triprex_about_six_counter_number_plus_icon_switcher',
            [
                'label' => esc_html__("Show '+' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'triprex_about_six_counter_content',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('Tours <br>Success', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_six_video_section',
            [
                'label' => esc_html__('Video Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_about_six_video_section_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_about_six_video_text',
            [
                'label' => esc_html__(' Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Watch Tour'),
                'placeholder' => esc_html__('Type your video text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_about_six_video_style_design',
            [
                'label'     => esc_html__('Video Source', 'triprex-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'link',
                'options'   => [
                    'file'      => esc_html__('File', 'triprex-core'),
                    'link'      => esc_html__('Link', 'triprex-core'),
                ],
            ]
        );

        $this->add_control(
            'triprex_about_six_video_design_upload_video',
            [
                'label' => esc_html__('Choose Video', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition' => [
                    'triprex_about_six_video_style_design' => 'file'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],


            ]
        );

        $this->add_control(
            'triprex_about_six_video_style_design_style_url',
            [
                'label' => esc_html__('Link', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://getcoderzone.com/dummy_video/hotel-room-2021-11-03-20-39-09-utc.mp4',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'triprex_about_six_video_style_design' => 'link'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_six_banner_image_sec',
            [
                'label' => esc_html__('Banner Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_about_six_banner_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();



        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_style_one_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_one_heading',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_one_heading_subtitle',
            [
                'label' => esc_html__('Sub Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title span',

            ]
        );

        $this->add_control(
            'triprex_style_one_heading_subtitle_color',
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
            'triprex_style_one_heading_subtitle_margin',
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
            'triprex_style_one_heading_subtitle_padding',
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
            'triprex_style_one_heading_title',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'triprex_style_one_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_heading_title_margin',
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
            'triprex_style_one_heading_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Tab Content
        $this->add_control(
            'triprex_about_style_one_tab_content',
            [
                'label' => esc_html__(' Tab Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // Icon
        $this->add_control(
            'triprex_about_style_one_tab_content_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content .nav-pills .nav-link > i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home1-about-section .about-content .nav-pills .nav-link > svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_icon_sec_size',
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
                    '{{WRAPPER}} .home1-about-section .about-content .nav-pills .nav-link  >svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home1-about-section .about-content .nav-pills .nav-link > i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_title',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_about_style_one_tab_content_title_typ',
                'selector' => '{{WRAPPER}} .home1-about-section .about-content .nav-pills .nav-link.active',

            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content .nav-pills .nav-link.active' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_about_style_one_tab_content_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content .nav-pills .nav-link.active' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_about_style_one_tab_content_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-about-section .about-content .nav-pills .nav-link.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_desc',
            [
                'label' => esc_html__(' Description ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_about_style_one_tab_content_desc_typ',
                'selector' => '{{WRAPPER}} .home1-about-section .about-content .tab-content .tab-pane',

            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content .tab-content .tab-pane' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_about_style_one_tab_content_desc_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content .tab-content .tab-pane' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_about_style_one_tab_content_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-about-section .about-content .tab-content .tab-pane' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        // Button 
        $this->add_control(
            'triprex_about_style_one_tab_content_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_about_style_one_tab_content_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_about_style_one_tab_content_btn_style_normal_tab',
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
                'name'     => 'triprex_about_style_one_tab_content_btn_style_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_about_style_one_tab_content_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_about_style_one_tab_content_btn_style_margin',
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
            'triprex_about_style_one_tab_content_btn_style_padding',
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
            'triprex_about_style_one_tab_content_btn_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_btn_style_color_hover',
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
            'triprex_about_style_one_tab_content_counter_sec',
            [
                'label' => esc_html__(' Counter Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_counter_sec_num',
            [
                'label' => esc_html__('Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_about_style_one_tab_content_counter_sec_num_typ',
                'selector' => '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content .number h6',
                'selector' => '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content .number span',

            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_counter_sec_num_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content .number h6' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content .number span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_about_style_one_tab_content_counter_sec_num_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content .number h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content .number span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_about_style_one_tab_content_counter_sec_num_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content .number h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content .number span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_counter_sec_content',
            [
                'label' => esc_html__('Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_about_style_one_tab_content_counter_sec_content_typ',
                'selector' => '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content p',

            ]
        );

        $this->add_control(
            'triprex_about_style_one_tab_content_counter_sec_content_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_about_style_one_tab_content_counter_sec_content_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_about_style_one_tab_content_counter_sec_content_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-about-section .about-content .about-content-bottom .counter-area .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );


        $this->end_controls_section();


        // =====================Style Two=======================//

        $this->start_controls_section(
            'triprex_style_two_content',
            [
                'label' => esc_html__('About Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_two_heading',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_two_heading_title',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );

        $this->add_control(
            'triprex_style_two_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_heading_title_margin',
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
            'triprex_style_two_heading_title_padding',
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
            'triprex_style_one_heading_desc',
            [
                'label' => esc_html__(' Description ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_heading_desc_typ',
                'selector' => '{{WRAPPER}} .section-title2 p',

            ]
        );

        $this->add_control(
            'triprex_style_one_heading_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_heading_desc_margin',
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
            'triprex_style_one_heading_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_style_two_tab_content_desc',
            [
                'label' => esc_html__(' Tab Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_two_tab_content_desc_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_tab_content_desc_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card:hover' => 'background: {{VALUE}};',

                ],
            ]
        );

        // Icon
        $this->add_control(
            'triprex_style_two_tab_content_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_icon_sec_bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card .icon' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_activites_genaral_icon_sec_size',
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
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_tab_content_title_desc',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_tab_content_title_desc_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-content .facility-card .content h6',

            ]
        );

        $this->add_control(
            'triprex_style_two_tab_content_title_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card .content h6' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_style_two_tab_content_title_desc_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card:hover .content h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_tab_content_title_desc_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_tab_content_title_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-about-section .about-content .facility-card .content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //  Button 
        $this->add_control(
            'triprex_style_two_tab_content_btn_style',
            [
                'label' => esc_html__(' Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_style_two_tab_content_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_style_two_tab_content_normal_tab',
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
                'name'     => 'triprex_style_two_tab_content_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn3',

            ]
        );
        $this->add_control(
            'triprex_style_two_tab_content_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn3' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_style_two_tab_content_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn3' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_tab_content_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_tab_content_btn_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_style_two_tab_content_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_style_two_tab_content_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_tab_content_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        //  Video Button 
        $this->add_control(
            'triprex_style_two_tab_content_video_btn_style',
            [
                'label' => esc_html__('VIdeo  Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_tab_content_video_btn_style_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-content .content-bottom-area .video-area h6',

            ]
        );
        $this->add_control(
            'triprex_style_two_tab_content_video_btn_style_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-about-section .about-content .content-bottom-area .video-area h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_tab_content_video_btn_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .home2-about-section .about-content .content-bottom-area .video-area .icon i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_tab_content_video_btn_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .home2-about-section .about-content .content-bottom-area .video-area h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_tab_content_video_btn_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-about-section .about-content .content-bottom-area .video-area h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        // Expereience
        $this->add_control(
            'triprex_style_two_tab_content_expereince_style',
            [
                'label' => esc_html__('Experience ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_two_tab_content_expereince_style_bac_color',
            [
                'label'     => esc_html__(' Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-img-wrap .experience' => 'background: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'triprex_style_two_tab_content_expereince_num_style',
            [
                'label' => esc_html__('Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_tab_content_expereince_num_style_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-img-wrap .experience h3',

            ]
        );
        $this->add_control(
            'triprex_style_two_tab_content_expereince_num_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-about-section .about-img-wrap .experience h3' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_tab_content_expereince_num_title_style',
            [
                'label' => esc_html__('Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_tab_content_expereince_num_title_style_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-img-wrap .experience p',

            ]
        );
        $this->add_control(
            'triprex_style_two_tab_content_expereince_num_title_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-img-wrap .experience p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();



        //Counter
        $this->start_controls_section(
            'triprex_style_about_two_counter_sec_style',
            [
                'label' => esc_html__('Counter Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_about_two_counter_sec_icon_style',
            [
                'label' => esc_html__('Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_style_two_counter_sec_icon_style_color_sec',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .activities-counter .single-activity .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_counter_sec_icon_style_size_sec',
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
                    '{{WRAPPER}} .activities-counter .single-activity .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .activities-counter .single-activity .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_style_two_counter_num_style_sec',
            [
                'label' => esc_html__(' Counter Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_counter_num_style_typ_sec',
                'selector' => '{{WRAPPER}} .activities-counter .single-activity .content .number',

            ]
        );

        $this->add_control(
            'triprex_style_two_counter_num_style_num_color_sec_style',
            [
                'label'     => esc_html__('Num Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_counter_num_style_color_sec_style',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_counter_num_style_margin_sec_style',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_counter_num_style_padding_style_sec',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_two_counter_content_style',
            [
                'label' => esc_html__(' Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_counter_content_style_typ_sec',
                'selector' => '{{WRAPPER}} .activities-counter .single-activity .content p',

            ]
        );

        $this->add_control(
            'triprex_style_two_counter_content_style_color_sec',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_counter_content_style_margin_sec',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_counter_content_style_padding_sec',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .activities-counter .single-activity .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Review Area
        $this->start_controls_section(
            'triprex_style_two_review_style',
            [
                'label' => esc_html__(' Review Area ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'triprex_style_two_review_title_style',
            [
                'label' => esc_html__('Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_review_title_style_typ',
                'selector' => '{{WRAPPER}} .tripadvisor-review > strong',

            ]
        );

        $this->add_control(
            'triprex_style_two_review_title_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review > strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_review_title_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review > strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_review_title_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tripadvisor-review > strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_two_review_title_text_style',
            [
                'label' => esc_html__('Review Text ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_review_title_text_style_typ',
                'selector' => '{{WRAPPER}} .tripadvisor-review p',

            ]
        );

        $this->add_control(
            'triprex_style_two_review_title_text_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_review_title_text_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_review_title_text_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tripadvisor-review p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_two_review_title_total_review_style',
            [
                'label' => esc_html__(' Total Review ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_review_title_total_review_style_typ',
                'selector' => '{{WRAPPER}} .tripadvisor-review p a',

            ]
        );

        $this->add_control(
            'triprex_style_two_review_title_total_review_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review p a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_review_title_total_review_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review p a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_review_title_total_review_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tripadvisor-review p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // =====================Style Three=======================//

        $this->start_controls_section(
            'triprex_style_three_content',
            [
                'label' => esc_html__('About Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_three_heading',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_three_heading_title',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_three_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );

        $this->add_control(
            'triprex_style_three_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_heading_title_margin',
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
            'triprex_style_three_heading_title_padding',
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
            'triprex_style_three_heading_desc',
            [
                'label' => esc_html__(' Description ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_three_heading_desc_typ',
                'selector' => '{{WRAPPER}} .section-title2 p',

            ]
        );

        $this->add_control(
            'triprex_style_three_heading_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_heading_desc_margin',
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
            'triprex_style_three_heading_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_style_three_tab_content_desc',
            [
                'label' => esc_html__('Facilities ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Icon
        $this->add_control(
            'triprex_style_three_tab_content_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_icon_sec_bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .icon' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .icon' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_icon_sec_size',
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
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_three_tab_content_title_desc',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_three_tab_content_title_desc_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-content .facilities li .content h5',

            ]
        );

        $this->add_control(
            'triprex_style_three_tab_content_title_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .content h5' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_style_three_tab_content_title_desc_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .content h5' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_tab_content_title_desc_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_tab_content_title_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_three_tab_content_sec',
            [
                'label' => esc_html__(' Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_three_tab_content_sec_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-content .facilities li .content p',

            ]
        );

        $this->add_control(
            'triprex_style_three_tab_content_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .content p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_tab_content_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_tab_content_sec_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-about-section .about-content .facilities li .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        // Counter Section
        $this->add_control(
            'triprex_style_three_tab_content_counter_style',
            [
                'label' => esc_html__('Counter Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_three_tab_content_expereince_style_bac_color',
            [
                'label'     => esc_html__(' Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-video-and-img .badge .counter-area' => 'background: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'triprex_style_three_tab_content_expereince_num_style',
            [
                'label' => esc_html__('Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_three_tab_content_expereince_num_style_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-video-and-img .badge .counter-area .counter-content-wrap .number',

            ]
        );
        $this->add_control(
            'triprex_style_three_tab_content_expereince_num_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home3-about-section .about-video-and-img .badge .counter-area .counter-content-wrap .number h5' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_style_three_tab_content_expereince_num_style_span_color',
            [
                'label'     => esc_html__('Span Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home3-about-section .about-video-and-img .badge .counter-area .counter-content-wrap .number' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_three_tab_content_expereince_num_title_style',
            [
                'label' => esc_html__('Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_three_tab_content_expereince_num_title_style_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-video-and-img .badge .counter-area .counter-content-wrap p',

            ]
        );
        $this->add_control(
            'triprex_style_three_tab_content_expereince_num_title_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-video-and-img .badge .counter-area .counter-content-wrap p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_three_tab_content_video_sec_style',
            [
                'label' => esc_html__('Video Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_three_tab_content_video_sec_style_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-video-and-img .video-wrapper .video-area h6',

            ]
        );
        $this->add_control(
            'triprex_style_three_tab_content_video_sec_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-video-and-img .video-wrapper .video-area h6' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_style_three_tab_content_video_sec_style_icon_color',
            [
                'label'     => esc_html__('icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-video-and-img .video-wrapper .video-area .icon i' => 'color: {{VALUE}};',

                ],
            ]
        );


        $this->end_controls_section();

        // =====================Style Four=======================//

        $this->start_controls_section(
            'triprex_style_four_content',
            [
                'label' => esc_html__(' Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_four_heading',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_four_heading_title',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_style_four_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_four_heading_title_span_color',
            [
                'label'     => esc_html__('Span Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .section-title3 h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_heading_title_margin',
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
            'triprex_style_four_heading_title_padding',
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
            'triprex_style_four_heading_desc',
            [
                'label' => esc_html__(' Description ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_heading_desc_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_style_four_heading_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_heading_desc_margin',
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
            'triprex_style_four_heading_desc_padding',
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
            'triprex_style_four_author_section',
            [
                'label' => esc_html__(' Author Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_four_author_image_size_section',
            [
                'label' => esc_html__(' Author Image Size', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_four_author_image_size_section_size_style',
            [
                'label' => esc_html__('Image Size', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .author-area .author-img img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->add_control(
            'triprex_style_four_author_content',
            [
                'label' => esc_html__('Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_author_content_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-content .author-area .author-content p',

            ]
        );

        $this->add_control(
            'triprex_style_four_author_content_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .author-area .author-content p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_author_content_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .author-area .author-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_author_content_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-about-section .about-content .author-area .author-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_four_services_sec',
            [
                'label' => esc_html__('Services ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_services_sec_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-content .service-list li',

            ]
        );

        $this->add_control(
            'triprex_style_four_services_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .service-list li' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home4-about-section .about-content .service-list li svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_services_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .service-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_services_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-about-section .about-content .service-list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_style_about_four_counter_sec_style_sec',
            [
                'label' => esc_html__('Counter Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_four_counter__style_style_sec_baccolor',
            [
                'label'     => esc_html__(' Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_style_about_four_counter_sec_style_sec_sec_icon_style_sec',
            [
                'label' => esc_html__('Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_style_about_four_counter_sec_style_sec_icon_style_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_about_four_counter_sec_style_sec_icon_style_size',
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
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_style_about_four_counter_num_style',
            [
                'label' => esc_html__(' Counter Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_counter_num_style_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-content .single-counter .content .number h5',

            ]
        );

        $this->add_control(
            'triprex_style_four_counter_num_style_num_color',
            [
                'label'     => esc_html__('Num Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .content .number h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_four_counter_num_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .content .number h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_counter_num_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .content .number h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_counter_num_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .content .number h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_four_counter_content_style_style_sec',
            [
                'label' => esc_html__(' Number Text ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_counter_content_style_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-content .single-counter .content .number span',

            ]
        );

        $this->add_control(
            'triprex_style_four_counter_content_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .content .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_four_counter_num_text_style_style_sec',
            [
                'label' => esc_html__(' Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_counter_num_text_style_style_sec_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-content .single-counter .content p',

            ]
        );

        $this->add_control(
            'triprex_style_four_counter_num_text_style_style_sec_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_counter_content_style_margin_style',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_counter_content_style_padding_style_sec',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-about-section .about-content .single-counter .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // =====================Style Five=======================//

        $this->start_controls_section(
            'triprex_style_five_content_style',
            [
                'label' => esc_html__(' Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_five_heading',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_five_heading_title',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_five_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );

        $this->add_control(
            'triprex_style_five_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_style_five_heading_title_margin',
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
            'triprex_style_five_heading_title_padding',
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
            'triprex_style_five_heading_desc',
            [
                'label' => esc_html__(' Description ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_five_heading_desc_typ',
                'selector' => '{{WRAPPER}} .section-title4 p',

            ]
        );

        $this->add_control(
            'triprex_style_five_heading_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_heading_desc_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title4 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_heading_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title4 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_about_five_services_sec_style_sec',
            [
                'label' => esc_html__('Sevices Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_five_counter_style_style_sec_bac_color',
            [
                'label'     => esc_html__(' Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .facility-card' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_style_five_counter_style_style_sec_icon_style',
            [
                'label' => esc_html__('Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_style_five_counter_style_style_sec_icon_style_bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .facility-card .icon' => 'background: {{VALUE}}',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_five_counter_style_style_sec_icon_style_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .facility-card .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home5-about-section .about-content .facility-card .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_five_counter_style_style_sec_icon_style_size',
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
                    '{{WRAPPER}} .home5-about-section .about-content .facility-card .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home5-about-section .about-content .facility-card .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_five_services_title_desc',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_five_services_title_desc_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .about-content .facility-card .content h6',

            ]
        );

        $this->add_control(
            'triprex_style_five_services_title_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .facility-card .content h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_services_title_desc_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .facility-card .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_services_title_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-about-section .about-content .facility-card .content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_about_five_contact_sec_style_sec',
            [
                'label' => esc_html__('Contact Area ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_style_about_five_contact_sec_style_sec_icon_style',
            [
                'label' => esc_html__('Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_style_about_five_contact_sec_style_sec_icon_style_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_about_five_contact_sec_style_sec_style_size',
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
                    '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_five_contact_area_title_desc',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_five_contact_area_title_desc_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .content span',

            ]
        );

        $this->add_control(
            'triprex_style_five_contact_area_title_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .content span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_contact_area_title_desc_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_contact_area_title_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_five_contact_area_num_desc',
            [
                'label' => esc_html__(' Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_five_contact_area_num_desc_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .content h6 a',

            ]
        );

        $this->add_control(
            'triprex_style_five_contact_area_num_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .content h6 a' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_five_contact_area_num_desc_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .content-bottom-area .hotline-area .content h6 a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();


        // =====================Style Six=======================//

        $this->start_controls_section(
            'triprex_style_six_content',
            [
                'label' => esc_html__('About Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_about_content_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_six_heading',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_six_heading_subtitle',
            [
                'label' => esc_html__(' Sub Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_six_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title5 span',

            ]
        );

        $this->add_control(
            'triprex_style_six_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title5 span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_heading_title_color_margin',
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
            'triprex_style_six_heading_title_color_padding',
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
            'triprex_style_six_heading_title',
            [
                'label' => esc_html__('Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_six_heading_title_typ_sec',
                'selector' => '{{WRAPPER}} .section-title5 h2',

            ]
        );

        $this->add_control(
            'triprex_style_six_heading_title_color_sec',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_heading_title_color_margin_sec',
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
            'triprex_style_six_heading_title_color_padding_sec',
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
            'triprex_style_six_heading_desc',
            [
                'label' => esc_html__(' Description ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_six_heading_desc_typ',
                'selector' => '{{WRAPPER}} .section-title5 p',

            ]
        );

        $this->add_control(
            'triprex_style_six_heading_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_heading_desc_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title5 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_heading_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title5 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_style_six_tab_content_desc',
            [
                'label' => esc_html__('Facilities ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Icon
        $this->add_control(
            'triprex_style_six_tab_content_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_six_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_six_icon_sec_size',
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
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_six_tab_content_title_desc',
            [
                'label' => esc_html__(' Title ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_six_tab_content_title_desc_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-content .facilities li .content h5',

            ]
        );

        $this->add_control(
            'triprex_style_six_tab_content_title_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .content h5' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_style_six_tab_content_title_desc_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .content h5' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_tab_content_title_desc_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_tab_content_title_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_six_tab_content_sec',
            [
                'label' => esc_html__('Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_six_tab_content_sec_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-content .facilities li .content p',

            ]
        );

        $this->add_control(
            'triprex_style_six_tab_content_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .content p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_tab_content_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_tab_content_sec_desc_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-about-section .about-content .facilities li .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Counter Section
        $this->add_control(
            'triprex_style_six_tab_content_counter_style',
            [
                'label' => esc_html__('Counter Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_six_tab_content_expereince_style_bac_color',
            [
                'label'     => esc_html__(' Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-video-and-img .video-and-batch-wrap .video-and-batch .badge .counter-area' => 'background: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'triprex_style_six_tab_content_expereince_num_style',
            [
                'label' => esc_html__('Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_six_tab_content_expereince_num_style_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-video-and-img .video-and-batch-wrap .video-and-batch .badge .counter-area .counter-content-wrap .number h5',

            ]
        );
        $this->add_control(
            'triprex_style_six_tab_content_expereince_num_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home6-about-section .about-video-and-img .video-and-batch-wrap .video-and-batch .badge .counter-area .counter-content-wrap .number h5' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_style_six_tab_content_expereince_num_style_span_color',
            [
                'label'     => esc_html__('Span Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home6-about-section .about-video-and-img .video-and-batch-wrap .video-and-batch .badge .counter-area .counter-content-wrap .number' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_six_tab_content_expereince_num_title_style',
            [
                'label' => esc_html__('Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_six_tab_content_expereince_num_title_style_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-video-and-img .video-and-batch-wrap .video-and-batch .badge .counter-area .counter-content-wrap p',

            ]
        );
        $this->add_control(
            'triprex_style_six_tab_content_expereince_num_title_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-video-and-img .video-and-batch-wrap .video-and-batch .badge .counter-area .counter-content-wrap p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_style_six_tab_content_video_sec_style',
            [
                'label' => esc_html__('Video Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_six_tab_content_video_sec_style_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-video-and-img .video-and-batch-wrap .video-and-batch .video-wrapper .video-area h6',

            ]
        );
        $this->add_control(
            'triprex_style_six_tab_content_video_sec_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-video-and-img .video-and-batch-wrap .video-and-batch .video-wrapper .video-area h6' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_style_six_tab_content_video_sec_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-video-and-img .video-and-batch-wrap .video-and-batch .video-wrapper .video-area .icon i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_about_tab_content_list'];
        $data2 = $settings['triprex_about_facilities_section_list'];
        $data3 = $settings['triprex_about_two_counter_section_list'];
        $data4 = $settings['triprex_about_three_facilitties_list'];
        $data5 = $settings['triprex_about_four_counter_section_list'];
        $data6 = $settings['triprex_about_five_services_section_content_list'];
        $data7 = $settings['triprex_about_five_contact_area_section_content_list'];
        $data8 = $settings['triprex_about_six_facilitties_list'];
?>

        <?php if (is_admin()) : ?>
            <script>
                const element = document.querySelectorAll(".badge__char");
                const step = 360 / element.length;

                element.forEach((elem, i) => {
                    elem.style.setProperty('--char-rotate', (i * step) + 'deg');
                })

                const foo = (360 / 7);

                for (let i = 0; i <= 7; i++) {
                    console.log((i * foo) + 'deg');
                }

                jQuery('.location-area').each(function() {
                    var dealName = jQuery(this).children('.location-list');

                    if (dealName.width() >= jQuery(this).width()) {
                        dealName.addClass('scrollTextAni');
                    }
                })
            </script>
        <?php endif ?>

        <?php if ($settings['triprex_about_content_style_selection'] == 'style_one') : ?>
            <div class="home1-about-section ">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/section-vector1.png'); ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>" class="section-vector1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title mb-40">
                                    <?php if (!empty($settings['triprex_about_subtitle'])) :   ?>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z" />
                                            </svg>
                                            <?php echo esc_html($settings['triprex_about_subtitle']) ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z" />
                                            </svg>
                                        </span>
                                    <?php endif ?>
                                    <?php if (!empty($settings['triprex_about_title'])) :   ?>
                                        <h2> <?php echo esc_html($settings['triprex_about_title']) ?></h2>
                                    <?php endif ?>
                                </div>

                                <ul class="nav nav-pills" id="pills-tab3" role="tablist">
                                    <?php foreach ($data as $key => $item) : ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo ($key == 0) ? 'active' : '' ?>" id="tab-<?php echo esc_attr($key); ?>" data-bs-toggle="pill" data-bs-target="#content-<?php echo esc_attr($key); ?>" type="button" role="tab" aria-controls="content-<?php echo esc_attr($key); ?>" aria-selected="true">
                                                <?php \Elementor\Icons_Manager::render_icon($item['triprex_about_tab_icon'], ['aria-hidden' => 'true']); ?>
                                                <?php echo esc_html($item['triprex_about_tab_title']) ?>
                                            </button>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <div class="tab-content" id="pills-tab3Content">
                                    <?php foreach ($data as $key => $item) : ?>
                                        <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : ''; ?>" id="content-<?php echo esc_attr($key); ?>" role="tabpanel">
                                            <?php echo esc_html($item['triprex_about_tab_content']); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="about-content-bottom">
                                    <?php if (!empty($settings['triprex_about_button_text'])) :   ?>
                                        <a href="<?php echo esc_url($settings['triprex_about_button_text_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($settings['triprex_about_button_text']); ?></a>
                                    <?php endif ?>
                                    <div class="counter-area">
                                        <?php if (!empty($settings['triprex_about_counter_section_image']['url'])) :   ?>
                                            <div class="customer-img-grp">
                                                <img src="<?php echo esc_url($settings['triprex_about_counter_section_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                            </div>
                                        <?php endif ?>
                                        <div class="content">
                                            <div class="number">
                                                <h6 class="counter"><?php echo wp_kses($settings['triprex_about_counter_section_number'], wp_kses_allowed_html('post'))  ?></h6>
                                                <?php if (!empty($settings['triprex_about_counter_section_plus_icon_switcher_one'] == 'yes')) :   ?>
                                                    <span><?php echo esc_html__('+', 'triprex-core') ?></span>
                                                <?php endif ?>
                                            </div>
                                            <?php if (!empty($settings['triprex_about_counter_section_content'])) :   ?>
                                                <p> <?php echo esc_html($settings['triprex_about_counter_section_content']); ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <div class="about-img">
                                <?php if (!empty($settings['triprex_about_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['triprex_about_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                <?php endif ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/vector/about-img-bg-vector.svg'); ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>" class="vector">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_about_content_style_selection'] == 'style_two') : ?>
            <div class="home2-about-section pt-120 ">
                <div class="container">
                    <div class="row mb-90">
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title2 mb-30">
                                    <?php if (!empty($settings['triprex_about_two_subtitle'])) :   ?>
                                        <div class="eg-section-tag">
                                            <span><?php echo esc_html($settings['triprex_about_two_subtitle']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_about_two_title'])) :   ?>
                                        <h2><?php echo esc_html($settings['triprex_about_two_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_about_two_desc'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_about_two_desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="row g-4 mb-50">
                                    <?php foreach ($data2 as $key => $item2) : ?>
                                        <div class="col-md-6">
                                            <div class="facility-card <?php echo ($key % 6 == 1 || $key % 6 == 2 || $key % 6 == 5) ? 'two' : ''; ?>">
                                                <?php if (!empty($item2['triprex_about_facilities_section_icon'])) :   ?>
                                                    <div class="icon">
                                                        <?php \Elementor\Icons_Manager::render_icon($item2['triprex_about_facilities_section_icon'], ['aria-hidden' => 'true']); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="content">
                                                    <?php if (!empty($item2['triprex_about_facilities_section_title'])) :   ?>
                                                        <h6><?php echo wp_kses($item2['triprex_about_facilities_section_title'], wp_kses_allowed_html('post'))  ?></h6>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="content-bottom-area">
                                    <?php if (!empty($settings['triprex_about_two_button_text_url'])) :   ?>
                                        <a href="<?php echo esc_url($settings['triprex_about_two_button_text_url']['url']) ?>" class="primary-btn3"><?php echo esc_html($settings['triprex_about_two_button_text']); ?></a>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_video_section_genaral_video_style_design_upload_video']['url'])) :   ?>
                                        <a data-fancybox="popup-video" href="<?php echo esc_url($settings['triprex_video_section_genaral_video_style_design_upload_video']['url']); ?>" class="video-area">
                                            <div class="icon">
                                                <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                    <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                    <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                    <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                </svg>
                                                <i class="bi bi-play"></i>
                                            </div>
                                            <?php if (!empty($settings['triprex_about_two_video_button_text'])) :   ?>
                                                <h6><?php echo esc_html($settings['triprex_about_two_video_button_text']); ?></h6>
                                            <?php endif; ?>
                                        </a>
                                    <?php elseif ($settings['triprex_video_section_genaral_video_style_design'] === 'link') : ?>
                                        <a data-fancybox="popup-video" href="<?php echo esc_url($settings['triprex_video_section_genaral_video_style_url']['url']); ?>" class="video-area">
                                            <div class="icon">
                                                <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                    <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                    <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                    <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                </svg>
                                                <i class="bi bi-play"></i>
                                            </div>
                                            <?php if (!empty($settings['triprex_about_two_video_button_text'])) :   ?>
                                                <h6><?php echo esc_html($settings['triprex_about_two_video_button_text']); ?></h6>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="about-img-wrap">
                                <?php if (!empty($settings['triprex_about_two_image_section_image']['url'])) :   ?>
                                    <div class="about-img">
                                        <img src="<?php echo esc_url($settings['triprex_about_two_image_section_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>" class="about-img">
                                    </div>
                                <?php endif; ?>
                                <div class="experience">
                                    <?php if (!empty($settings['triprex_about_two_experience_section_number'])) :   ?>
                                        <h3><?php echo esc_html($settings['triprex_about_two_experience_section_number']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_about_two_experience_section_title'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_about_two_experience_section_title']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home2/vector/plane-vector.svg'); ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>" class="vector">
                            </div>
                        </div>
                    </div>
                    <div class="activities-counter">
                        <div class="row justify-content-center g-lg-4 gy-5">
                            <?php $total_items = count($data3); ?>
                            <?php foreach ($data3 as $key => $item3) : ?>
                                <div class="col-lg-3 col-sm-6 d-flex <?php echo ($key === $total_items - 1) ? 'justify-content-lg-end' : 'divider ' . (($key === 0) ? 'justify-content-lg-start' : 'justify-content-sm-center'); ?>">
                                    <div class="single-activity">
                                        <?php if (!empty($item3['triprex_about_two_counter_section_icon'])) :   ?>
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item3['triprex_about_two_counter_section_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="content">
                                            <div class="number">
                                                <h5 class="counter"><?php echo wp_kses($item3['triprex_about_two_counter_section_number'], wp_kses_allowed_html('post'))  ?></h5>
                                                <?php if (!empty($item3['triprex_about_counter_section_others_icon_switcher_two']) && $item3['triprex_about_counter_section_others_icon_switcher_two'] == 'yes') : ?>
                                                    <span><?php echo esc_html__('k', 'triprex-core') ?></span>
                                                <?php endif ?>
                                                <?php if (!empty($item3['triprex_about_counter_section_plus_icon_switcher_two']) && $item3['triprex_about_counter_section_plus_icon_switcher_two'] == 'yes') : ?>
                                                    <span><?php echo esc_html__('+', 'triprex-core') ?></span>
                                                <?php endif ?>
                                                <?php if (!empty($item3['triprex_about_counter_section_parcent_icon_switcher']) && $item3['triprex_about_counter_section_parcent_icon_switcher'] == 'yes') : ?>
                                                    <span><?php echo esc_html__('%', 'triprex-core') ?></span>
                                                <?php endif ?>
                                            </div>
                                            <?php if (!empty($item3['triprex_about_two_counter_section_content'])) :   ?>
                                                <p><?php echo esc_html($item3['triprex_about_two_counter_section_content']); ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="tripadvisor-review">
                                <?php if (!empty($settings['triprex_about_two_review_section_review_title'])) :   ?>
                                    <strong><?php echo esc_html($settings['triprex_about_two_review_section_review_title']); ?></strong>
                                <?php endif ?>
                                <ul class="rating">
                                    <?php
                                    $rank_counter = intval($settings['triprex_testimonial_two_genaral_review_testimony_review_star']);
                                    $rank_counter = max(0, min(5, $rank_counter));
                                    ?>
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <?php if ($i <= $rank_counter) : ?>
                                            <li><i class="bi bi-circle-fill"></i></li>
                                        <?php endif ?>
                                    <?php endfor; ?>
                                </ul>
                                <p><strong><?php echo sprintf("%2d.0", $rank_counter) ?></strong> <?php echo wp_kses($settings['triprex_about_two_review_section_review_content'], wp_kses_allowed_html('post'))  ?></p>
                                <?php if (!empty($settings['triprex_about_two_review_section_area_review_logo']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['triprex_about_two_review_section_area_review_logo']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'triprex-core') ?>" class="rating">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>



        <?php if ($settings['triprex_about_content_style_selection'] == 'style_three') : ?>
            <div class="home3-about-section">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title2 two mb-40">
                                <?php if (!empty($settings['triprex_about_three_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['triprex_about_three_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_about_three_content'])) :   ?>
                                    <p><?php echo esc_html($settings['triprex_about_three_content']); ?></p>
                                <?php endif; ?>
                            </div>
                            <ul class="facilities">
                                <?php foreach ($data4 as  $item4) : ?>
                                    <li>
                                        <?php if (!empty($item4['triprex_about_three_facilitties_icon'])) :   ?>
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item4['triprex_about_three_facilitties_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="content">
                                            <?php if (!empty($item4['triprex_about_three_facilitties_title'])) :   ?>
                                                <h5><?php echo esc_html($item4['triprex_about_three_facilitties_title']); ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($item4['triprex_about_three_facilitties_content'])) :   ?>
                                                <p><?php echo esc_html($item4['triprex_about_three_facilitties_content']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-video-and-img">
                            <div class="row">
                                <div class="col-xl-4">
                                    <?php $str = $settings['triprex_about_three_counter_badge_text'];
                                    $items = str_split($str);
                                    ?>
                                    <div class="badge">
                                        <?php foreach ($items as $item) : ?>
                                            <span class="badge__char"><?php echo $item ?></span>
                                        <?php endforeach ?>
                                        <div class="counter-area">
                                            <div class="counter-content-wrap">
                                                <div class="number">
                                                    <h5 class="counter"><?php echo esc_html($settings['triprex_about_three_counter_number']); ?></h5>
                                                    <?php if (!empty($settings['triprex_about_three_counter_number_others_icon_switcher'] == 'yes')) :   ?>
                                                        <span><?php echo esc_html__('K', 'triprex-core') ?></span>
                                                    <?php endif ?>
                                                    <?php if (!empty($settings['triprex_about_three_counter_number_plus_icon_switcher'] == 'yes')) :   ?>
                                                        <span><?php echo esc_html__('+', 'triprex-core') ?></span>
                                                    <?php endif ?>
                                                </div>
                                                <?php if (!empty($settings['triprex_about_three_counter_content'])) :   ?>
                                                    <p><?php echo wp_kses($settings['triprex_about_three_counter_content'], wp_kses_allowed_html('post'))  ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-wrapper">
                                        <?php if (!empty($settings['triprex_about_three_video_section_image']['url'])) :   ?>
                                            <img src="<?php echo esc_url($settings['triprex_about_three_video_section_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                        <?php endif ?>
                                        <?php if ($settings['triprex_about_three_video_style_design'] === 'file') : ?>
                                            <a href="<?php echo esc_url($settings['triprex_about_three_video_design_upload_video']['url']) ?>" class="video-area video4">
                                                <div class="icon">
                                                    <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                        <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                        <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                        <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                    </svg>
                                                    <i class="bi bi-play"></i>
                                                </div>
                                                <?php if (!empty($settings['triprex_about_three_video_text'])) :   ?>
                                                    <h6><?php echo esc_html($settings['triprex_about_three_video_text']); ?></h6>
                                                <?php endif; ?>
                                            </a>

                                        <?php elseif ($settings['triprex_about_three_video_style_design'] === 'link') : ?>
                                            <a href="<?php echo esc_url($settings['triprex_about_three_video_style_design_style_url']['url']) ?>" class="video-area video4">
                                                <div class="icon">
                                                    <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                        <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                        <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                        <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                    </svg>
                                                    <i class="bi bi-play"></i>
                                                </div>
                                                <?php if (!empty($settings['triprex_about_three_video_text'])) :   ?>
                                                    <h6><?php echo esc_html($settings['triprex_about_three_video_text']); ?></h6>
                                                <?php endif; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="about-section-img">
                                        <?php if (!empty($settings['triprex_about_three_banner_image']['url'])) :   ?>
                                            <img src="<?php echo esc_url($settings['triprex_about_three_banner_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_about_content_style_selection'] == 'style_four') : ?>
            <div class="home4-about-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title3">
                                    <?php if (!empty($settings['triprex_about_four_title'])) :   ?>
                                        <h2><?php echo wp_kses($settings['triprex_about_four_title'], wp_kses_allowed_html('post'))  ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_about_four_content'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_about_four_content']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="author-area">
                                    <?php if (!empty($settings['triprex_about_four_author_image']['url'])) :   ?>
                                        <div class="author-img">
                                            <img src="<?php echo esc_url($settings['triprex_about_four_author_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_about_four_author_content'])) :   ?>
                                        <div class="author-content">
                                            <p><?php echo esc_html($settings['triprex_about_four_author_content']); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['triprex_about_four_services_list'])) :   ?>
                                    <ul class="service-list">
                                        <?php
                                        $value = $settings['triprex_about_four_services_list'];
                                        $single_value = explode("\n", str_replace("\r", "", $settings['triprex_about_four_services_list']));
                                        foreach ($single_value as $sng) { ?>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9">
                                                    <circle cx="4.5" cy="4.5" r="4.5"></circle>
                                                </svg>
                                                <?php echo sprintf(__('%s', 'triprex-core'), $sng); ?>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="counter-area overflow-hidden">
                                    <div class="row g-4">
                                        <?php foreach ($data5 as  $index => $item5) : ?>
                                            <div class="col-sm-6">
                                                <div class="single-counter">
                                                    <div class="star <?php echo 'new' . $index ?>">
                                                        <?php if ($index == 1) { ?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="37" viewBox="0 0 29 37">
                                                                <path opacity="0.05" d="M45.8784 7.51404C45.7339 7.08829 45.4678 6.71418 45.113 6.43792C44.7582 6.16165 44.3303 5.99531 43.882 5.95944L30.7696 4.91768L25.0955 -7.64095C24.9148 -8.04544 24.6209 -8.389 24.2492 -8.63015C23.8775 -8.87131 23.444 -8.99976 23.0009 -9C22.5579 -9.00024 22.1242 -8.87227 21.7523 -8.63152C21.3803 -8.39077 21.086 -8.04754 20.9049 -7.64325L15.2307 4.91768L2.11837 5.95944C1.67782 5.99434 1.25665 6.1554 0.905242 6.42336C0.553839 6.69132 0.287086 7.05484 0.136895 7.47041C-0.013295 7.88598 -0.0405629 8.33603 0.0583541 8.76669C0.157271 9.19735 0.378184 9.5904 0.694665 9.89882L10.3846 19.3437L6.9576 34.1813C6.85354 34.6304 6.88689 35.1005 7.05333 35.5304C7.21976 35.9603 7.51159 36.3303 7.89095 36.5924C8.27031 36.8544 8.71968 36.9964 9.18076 36.9999C9.64183 37.0034 10.0933 36.8683 10.4766 36.6121L23.0002 28.2642L35.5238 36.6121C35.9155 36.8722 36.3776 37.0061 36.8477 36.9957C37.3179 36.9854 37.7736 36.8314 38.1536 36.5544C38.5336 36.2774 38.8196 35.8907 38.9733 35.4463C39.1269 35.0019 39.1407 34.5211 39.0129 34.0686L34.8062 19.3506L45.239 9.96321C45.9221 9.3469 46.1728 8.38562 45.8784 7.51404Z"></path>
                                                            </svg>

                                                        <?php } else { ?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="37" viewBox="0 0 29 37">
                                                                <path opacity="0.2" d="M45.8784 7.51404C45.7339 7.08829 45.4678 6.71418 45.113 6.43792C44.7582 6.16165 44.3303 5.99531 43.882 5.95944L30.7696 4.91768L25.0955 -7.64095C24.9148 -8.04544 24.6209 -8.389 24.2492 -8.63015C23.8775 -8.87131 23.444 -8.99976 23.0009 -9C22.5579 -9.00024 22.1242 -8.87227 21.7523 -8.63152C21.3803 -8.39077 21.086 -8.04754 20.9049 -7.64325L15.2307 4.91768L2.11837 5.95944C1.67782 5.99434 1.25665 6.1554 0.905242 6.42336C0.553839 6.69132 0.287086 7.05484 0.136895 7.47041C-0.013295 7.88598 -0.0405629 8.33603 0.0583541 8.76669C0.157271 9.19735 0.378184 9.5904 0.694665 9.89882L10.3846 19.3437L6.9576 34.1813C6.85354 34.6304 6.88689 35.1005 7.05333 35.5304C7.21976 35.9603 7.51159 36.3303 7.89095 36.5924C8.27031 36.8544 8.71968 36.9964 9.18076 36.9999C9.64183 37.0034 10.0933 36.8683 10.4766 36.6121L23.0002 28.2642L35.5238 36.6121C35.9155 36.8722 36.3776 37.0061 36.8477 36.9957C37.3179 36.9854 37.7736 36.8314 38.1536 36.5544C38.5336 36.2774 38.8196 35.8907 38.9733 35.4463C39.1269 35.0019 39.1407 34.5211 39.0129 34.0686L34.8062 19.3506L45.239 9.96321C45.9221 9.3469 46.1728 8.38562 45.8784 7.51404Z"></path>
                                                            </svg>
                                                        <?php
                                                        } ?>
                                                    </div>
                                                    <?php if (!empty($item5['triprex_about_four_counter_section_icon'])) :   ?>
                                                        <div class="icon">
                                                            <?php \Elementor\Icons_Manager::render_icon($item5['triprex_about_four_counter_section_icon'], ['aria-hidden' => 'true']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="content">
                                                        <div class="number">
                                                            <?php if (!empty($item5['triprex_about_four_counter_section_number'])) :   ?>
                                                                <h5 class="counter"><?php echo esc_html($item5['triprex_about_four_counter_section_number']); ?></h5>
                                                            <?php endif; ?>
                                                            <?php if (!empty($item5['triprex_about_four_counter_section_number_text'])) :   ?>
                                                                <span><?php echo esc_html($item5['triprex_about_four_counter_section_number_text']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php if (!empty($item5['triprex_about_four_counter_section_content'])) :   ?>
                                                            <p><?php echo esc_html($item5['triprex_about_four_counter_section_content']); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-img-wrap">
                                <?php if (!empty($settings['triprex_about_four_banner_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['triprex_about_four_banner_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                <?php endif; ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home4/home4-about-img-bg-vector.png'); ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>" class="shape">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_about_content_style_selection'] == 'style_five') : ?>
            <div class="home5-about-section">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img-wrap">
                            <div class="row g-0">
                                <div class="col-xl-7">
                                    <?php if (!empty($settings['triprex_about_five_top_image']['url'])) :   ?>
                                        <div class="about-top-img">
                                            <img src="<?php echo esc_url($settings['triprex_about_five_top_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xl-5 d-flex align-items-end">
                                    <?php if (!empty($settings['triprex_about_five_bottom_image']['url'])) :   ?>
                                        <div class="about-bottom-img">
                                            <img src="<?php echo esc_url($settings['triprex_about_five_bottom_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title4 mb-50">
                                <?php if (!empty($settings['triprex_about_five_subtitle'])) :   ?>
                                    <div class="eg-section-tag">
                                        <span><?php echo esc_html($settings['triprex_about_five_subtitle']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_about_five_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['triprex_about_five_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_about_five_content'])) :   ?>
                                    <p><?php echo esc_html($settings['triprex_about_five_content']); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="row g-4 mb-50">
                                <?php foreach ($data6 as  $item) : ?>
                                    <div class="col-sm-6">
                                        <div class="facility-card">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item['triprex_about_five_services_section_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <?php if (!empty($item['triprex_about_five_services_section_content'])) :   ?>
                                                <div class="content">
                                                    <h6><?php echo esc_html($item['triprex_about_five_services_section_content']); ?></h6>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="content-bottom-area">
                                <?php if (!empty($settings['triprex_about_five_services_section_content_button_text'])) :   ?>
                                    <a href="<?php echo esc_url($settings['triprex_about_five_services_section_content_button_url']['url']) ?>" class="secondary-btn3">
                                        <span>
                                            <?php echo esc_html($settings['triprex_about_five_services_section_content_button_text']); ?>
                                        </span>
                                    </a>
                                <?php endif; ?>
                                <?php foreach ($data7 as  $item) : ?>
                                    <div class="hotline-area">
                                        <?php if (!empty($item['triprex_about_five_contact_area_icon'])) :   ?>
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item['triprex_about_five_contact_area_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="content">
                                            <?php if (!empty($item['triprex_about_five_contact_area_title'])) :   ?>
                                                <span><?php echo esc_html($item['triprex_about_five_contact_area_title']); ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($item['triprex_about_five_contact_area_number'])) :   ?>
                                                <h6><a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $item['triprex_about_five_contact_area_number']); ?>"><?php echo esc_html($item['triprex_about_five_contact_area_number']); ?></a></h6>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_about_content_style_selection'] == 'style_six') : ?>
            <div class="home6-about-section ">
                <div class="container one">
                    <div class="row align-items-xl-end align-items-center">
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title5 mb-40">
                                    <span>
                                        <?php if (!empty($settings['triprex_about_six_subtitle'])) : ?>
                                            <?php echo esc_html($settings['triprex_about_six_subtitle']); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <g opacity="0.8">
                                                    <path d="M9.06226 11.3626L8.55838 13.7263L6.22997 20.0004L7.61194 19.7701L14.0678 11.3277C14.979 11.296 15.8626 11.2471 16.6304 11.1713C20.1826 10.82 19.9984 10.0002 19.9984 10.0002C19.9984 10.0002 20.1826 9.18031 16.6304 8.829C15.8626 8.7529 14.9789 8.70407 14.0678 8.67261L7.61197 0.229974L6.22997 -6.01907e-07L8.55838 6.27416L9.06226 8.6378C7.87942 8.6555 7.07898 8.68244 7.07898 8.68244C7.07898 8.68244 5.44724 8.7201 2.92253 9.28895L0.864093 6.43364L-0.000128074 6.43364L0.615287 9.90529C0.504522 9.93924 0.504522 10.0611 0.615287 10.0951L-0.000128385 13.5667L0.864093 13.5667L2.92253 10.7117C5.44724 11.2806 7.07898 11.3177 7.07898 11.3177C7.07898 11.3177 7.87942 11.3449 9.06226 11.3626Z" />
                                                    <path d="M13.4102 13.2575L13.4102 14.1895L9.96575 14.1895L9.96575 13.2575L13.4102 13.2575ZM13.4102 5.81414L13.4102 6.7458L9.96595 6.7458L9.96595 5.81414L13.4102 5.81414ZM11.0863 16.385L11.0863 17.3167L7.90291 17.3167L7.90291 16.385L11.0863 16.385ZM11.0863 2.68689L11.0863 3.61885L7.90291 3.61885L7.90291 2.68689L11.0863 2.68689Z" />
                                                </g>
                                            </svg>
                                        <?php endif; ?>
                                    </span>
                                    <?php if (!empty($settings['triprex_about_six_title'])) : ?>
                                        <h2><?php echo esc_html($settings['triprex_about_six_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_about_six_content'])) : ?>
                                        <p><?php echo esc_html($settings['triprex_about_six_content']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <ul class="facilities">
                                    <?php foreach ($data8 as $item) : ?>
                                        <li>
                                            <?php if (!empty($item['triprex_about_six_facilitties_icon'])) : ?>
                                                <div class="icon">
                                                    <?php \Elementor\Icons_Manager::render_icon($item['triprex_about_six_facilitties_icon'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="content">
                                                <?php if (!empty($item['triprex_about_six_facilitties_title'])) : ?>
                                                    <h5><?php echo esc_html($item['triprex_about_six_facilitties_title']); ?></h5>
                                                <?php endif; ?>
                                                <?php if (!empty($item['triprex_about_six_facilitties_content'])) : ?>
                                                    <p><?php echo esc_html($item['triprex_about_six_facilitties_content']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-video-and-img">
                                <div class="video-and-batch-wrap">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="video-and-batch">
                                                <?php $str2 = $settings['triprex_about_six_counter_badge_text'];
                                                $items2 = str_split($str2);
                                                ?>
                                                <div class="badge">
                                                    <?php foreach ($items2 as $item) : ?>
                                                        <span class="badge__char"><?php echo $item ?></span>
                                                    <?php endforeach ?>
                                                    <div class="counter-area">
                                                        <div class="counter-content-wrap">
                                                            <div class="number">
                                                                <h5 class="counter"><?php echo esc_html($settings['triprex_about_six_counter_number']); ?></h5>
                                                                <?php if (!empty($settings['triprex_about_six_counter_number_others_icon_switcher'] == 'yes')) : ?>
                                                                    <span><?php echo esc_html__('k', 'triprex-core') ?></span>
                                                                <?php endif ?>
                                                                <?php if (!empty($settings['triprex_about_six_counter_number_plus_icon_switcher'] == 'yes')) : ?>
                                                                    <span><?php echo esc_html__('+', 'triprex-core') ?></span>
                                                                <?php endif ?>
                                                            </div>
                                                            <?php if (!empty($settings['triprex_about_six_counter_content'])) : ?>
                                                                <p><?php echo wp_kses($settings['triprex_about_six_counter_content'], wp_kses_allowed_html('post'))  ?></p>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="video-wrapper">
                                                    <?php if (!empty($settings['triprex_about_six_video_section_image']['url'])) : ?>
                                                        <img src="<?php echo esc_url($settings['triprex_about_six_video_section_image']['url']) ?>" alt="<?php echo esc_attr__('Image ', 'triprex-core') ?>">
                                                    <?php endif ?>

                                                    <?php if ($settings['triprex_about_six_video_style_design'] === 'file') : ?>
                                                        <a href="<?php echo esc_url($settings['triprex_about_six_video_design_upload_video']['url']) ?>" class="video-area video4">
                                                            <div class="icon">
                                                                <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                    <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                    <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                    <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                </svg>
                                                                <i class="bi bi-play"></i>
                                                            </div>
                                                            <?php if (!empty($settings['triprex_about_six_video_text'])) : ?>
                                                                <h6><?php echo esc_html($settings['triprex_about_six_video_text']); ?></h6>
                                                            <?php endif ?>
                                                        </a>

                                                    <?php elseif ($settings['triprex_about_six_video_style_design'] === 'link') : ?>
                                                        <a href="<?php echo esc_url($settings['triprex_about_six_video_style_design_style_url']['url']) ?>" class="video-area video4">
                                                            <div class="icon">
                                                                <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                    <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                    <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                    <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                </svg>
                                                                <i class="bi bi-play"></i>
                                                            </div>
                                                            <?php if (!empty($settings['triprex_about_six_video_text'])) : ?>
                                                                <h6><?php echo esc_html($settings['triprex_about_six_video_text']); ?></h6>
                                                            <?php endif ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if (!empty($settings['triprex_about_six_banner_image']['url'])) : ?>
                                            <div class="about-section-img">
                                                <img src="<?php echo esc_url($settings['triprex_about_six_banner_image']['url']) ?>" alt="<?php echo esc_attr('Image ', 'triprex-core') ?>">
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
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_About_Widget());
