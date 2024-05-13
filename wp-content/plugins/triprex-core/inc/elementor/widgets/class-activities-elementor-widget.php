<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Activities_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_activites';
    }

    public function get_title()
    {
        return esc_html__('EG Activities', 'triprex-core');
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
            'triprex_activities_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_activities_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'triprex-core'),
                    'style_two' => esc_html__('Style Two', 'triprex-core'),
                    'style_three' => esc_html__('Style Three', 'triprex-core'),
                    'style_four' => esc_html__('Style Four', 'triprex-core'),
                    'style_five' => esc_html__('Style Five', 'triprex-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_activites_one_section_genaral',
            [
                'label' => esc_html__('Activities Section', 'triprex-core'),
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_one'
                ]

            ]
        );

        $this->add_control(
            'triprex_activites_tab_heading_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_tab_heading_section_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Are you ready to travel?'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_activites_tab_heading_section_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Explore Your Activities '),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_activites_tab_btn_section',
            [
                'label' => esc_html__('Tab Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_activites_content_icon',
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
            'triprex_activites_content_title',
            [
                'label' => esc_html__('Tab Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Zip lining'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_activites_tab_content_section',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_activites_tab_content_subtitle',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('What We Do'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'triprex_activites_tab_content_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Thrill Above Ground: The Zip Line Adventure'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_activites_tab_content_desc',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Embark on an adrenaline-fueled journey, zipping through lush landscapes, feeling the wind rush past, and experiencing nature from breathtaking heights. Unleash your inner adventurer today.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_activites_tab_content_feature',
            [
                'label' => esc_html__('Feature', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Treetop Views'),
                'placeholder' => esc_html__('Type your feature here', 'triprex-core'),
                'label_block' => true,
                'description' => esc_html__('Enter A List Of Services Separated By Line Breaks.', 'triprex-core'),

            ]
        );


        $repeater->add_control(
            'triprex_activites_tab_content_bottom_section',
            [
                'label' => esc_html__('Content Bottom', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_activites_tab_content_bottom_button_section',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_activites_tab_content_bottom_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Check Availability'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'triprex_activites_tab_content_bottom_button_url',
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
            'triprex_activites_tab_content_video_button_section',
            [
                'label' => esc_html__(' Popup Video Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $repeater->add_control(
            'triprex_activites_genaral_video_style_design',
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

        $repeater->add_control(
            'triprex_activites_genaral_video_style_design_upload_video',
            [
                'label' => esc_html__('Choose Video', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition' => [
                    'triprex_activites_genaral_video_style_design' => 'file'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],


            ]
        );


        $repeater->add_control(
            'triprex_activites_genaral_video_style_url',
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
                    'triprex_activites_genaral_video_style_design' => 'link'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_activites_tab_content_bottom_video_btn_text',
            [
                'label' => esc_html__('Link Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Watch Adventure'),
                'placeholder' => esc_html__('Type your video text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_activites_image_section',
            [
                'label' => esc_html__('Images', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_activites_image_one',
            [
                'label' => esc_html__('Image One', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_activites_image_two',
            [
                'label' => esc_html__('Image Two', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_list',
            [
                'label' => esc_html__('Content List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_activites_content_title' => esc_html('Zip lining'),

                    ],

                ],
                'title_field' => '{{{ triprex_activites_content_title }}}',
            ]
        );


        $this->end_controls_section();

        //Content Two
        $this->start_controls_section(
            'triprex_activites_two_section_genaral',
            [
                'label' => esc_html__('Activities Section', 'triprex-core'),
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_two'
                ]

            ]
        );


        $this->add_control(
            'triprex_activites_two_heading_section',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_two_heading_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('What We Do'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'triprex_activites_two_heading_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Our Particular Activitiies'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_activites_two_tab_btn_section',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_activites_two_content_icon',
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
            'triprex_activites_two_content_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Zip lining'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_activites_slide_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_activites_two_tab_content_section',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_activites_two_tab_content_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Horizon Dance: Unique Paragliding Perspectives.'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_activites_two_tab_content_desc',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Experience freedom in flight, soaring gracefully over landscapes, feeling the winds embrace on an exhilarating paragliding escapade. Adventure awaits above!'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_activites_two_tab_content_feature',
            [
                'label' => esc_html__(' Feature', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Glide Experience'),
                'placeholder' => esc_html__('Type your feature here', 'triprex-core'),
                'label_block' => true,
                'description' => esc_html__('Enter A List Of Services Separated By Line Breaks.', 'triprex-core'),
            ]
        );

        $repeater->add_control(
            'triprex_activites_two_tab_content_bottom_section',
            [
                'label' => esc_html__('Content Bottom', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_activites_two_tab_content_bottom_button_section',
            [
                'label' => esc_html__(' Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_activites_two_tab_content_bottom_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Check Availability'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'triprex_activites_two_tab_content_bottom_button_url',
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
            'triprex_activites_two_tab_content_video_button_section',
            [
                'label' => esc_html__('Popup Video Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $repeater->add_control(
            'triprex_activites_two_genaral_video_style_design',
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

        $repeater->add_control(
            'triprex_activites_two_genaral_video_style_design_upload_video',
            [
                'label' => esc_html__('Choose Video', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition' => [
                    'triprex_activites_two_genaral_video_style_design' => 'file'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],


            ]
        );


        $repeater->add_control(
            'triprex_activites_two_genaral_video_style_url',
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
                    'triprex_activites_two_genaral_video_style_design' => 'link'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_activites_two_tab_content_bottom_video_btn_text',
            [
                'label' => esc_html__('Video Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Watch Culture'),
                'placeholder' => esc_html__('Type your video text here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_activites_two_genaral_list',
            [
                'label' => esc_html__('Content List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_activites_two_content_title' => esc_html('Zip lining'),

                    ],

                ],
                'title_field' => '{{{ triprex_activites_two_content_title }}}',
            ]
        );


        $this->end_controls_section();


        //Content Three
        $this->start_controls_section(
            'triprex_activites_three_genaral_tab_sec',
            [
                'label' => esc_html__('Activities Tab ', 'triprex-core'),
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_three'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_activites_two_genaral_tab_button_content',
            [
                'label' => esc_html__('Tab Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_activites_two_genaral_tab_icon',
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
            'triprex_activites_two_genaral_tab_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Bungee Jumping'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_activites_two_genaral_tab_button_url',
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
            'triprex_activites_two_genaral_tab_content',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_activites_genaral_content_sec_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_activites_three_genaral_list',
            [
                'label' => esc_html__('Activities List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_activites_two_genaral_tab_title' => esc_html('Bungee Jumping'),
                    ],
                    [
                        'triprex_activites_two_genaral_tab_title' => esc_html('Rafting'),
                    ],
                    [
                        'triprex_activites_two_genaral_tab_title' => esc_html('Paragliding'),
                    ],
                    [
                        'triprex_activites_two_genaral_tab_title' => esc_html('Ski Touring'),
                    ],
                    [
                        'triprex_activites_two_genaral_tab_title' => esc_html('Surfing'),
                    ],
                    [
                        'triprex_activites_two_genaral_tab_title' => esc_html('Nightlife & Eco-Tourism '),
                    ],


                ],
                'title_field' => '{{{ triprex_activites_two_genaral_tab_title }}}',
            ]
        );

        $this->end_controls_section();

        //Content Four
        $this->start_controls_section(
            'triprex_activites_four_section_genaral',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_four'
                ]

            ]
        );

        $this->add_control(
            'triprex_activites_four_heading__section',
            [
                'label' => esc_html__('Heading Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_activites_four_heading_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Our Tour Activities'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_activites_four_heading_short_desc',
            [
                'label' => esc_html__(' Short Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim. '),
                'placeholder' => esc_html__('Type your short description here', 'triprex-core'),
                'label_block' => true,

            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            ' triprex_activites_four_tab_btn_section_style',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_four'
                ]
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_activites_four_content_icon',
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
            'triprex_activites_four_content_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Zip lining'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $repeater->add_control(
            'triprex_activites_four_genaral_tab_button_url',
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
            'triprex_gallery_four_slide_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_activites_genaral_four_tab_content_sec_image_list',
            [
                'label' => esc_html__('Choose  List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_activites_four_content_title' => esc_html('Zip lining'),
                    ],
                    [
                        'triprex_activites_four_content_title' => esc_html('Bungee Jumping'),
                    ],
                    [
                        'triprex_activites_four_content_title' => esc_html('Rafting'),
                    ],
                    [
                        'triprex_activites_four_content_title' => esc_html('Paragliding'),
                    ],
                    [
                        'triprex_activites_four_content_title' => esc_html('Ski Touring'),
                    ],
                    [
                        'triprex_activites_four_content_title' => esc_html('Surfing'),
                    ],


                ],
                'title_field' => '{{{ triprex_activites_four_content_title }}}',

            ]
        );

        $this->end_controls_section();


        //Content Five
        $this->start_controls_section(
            'triprex_activites_six_section_genaral',
            [
                'label' => esc_html__('Activities Section', 'triprex-core'),
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_five'
                ]

            ]
        );

        $this->add_control(
            'triprex_activites_six_tab_btn_section',
            [
                'label' => esc_html__('Tab Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_activites_six_content_icon',
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
            'triprex_activites_six_content_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html(' Zip Lining'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );



        $repeater->add_control(
            'triprex_activites_six_tab_content_section',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_activites_six_tab_content_subtitle',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Bungee Jumping'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'triprex_activites_six_tab_content_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Plunge: Bungee Jumpings Gravity-Defying Thrill'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_activites_six_tab_content_desc',
            [
                'label' => esc_html__(' Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Experience the ultimate adrenaline rush with bungee jumping! Plunge from towering heights, freefall into the abyss, and rebound into the sky. Feel the heart-pounding thrill of defying gravity in a controlled, secure environment.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_activites_six_tab_content_feature',
            [
                'label' => esc_html__(' Feature', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Height Variations'),
                'placeholder' => esc_html__('Type your feature here', 'triprex-core'),
                'label_block' => true,
                'description' => esc_html__('Enter A List Of Services Separated By Line Breaks.', 'triprex-core')

            ]
        );


        $repeater->add_control(
            'triprex_activites_six_tab_content_bottom_section',
            [
                'label' => esc_html__('Content Bottom', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_activites_six_tab_content_bottom_button_section',
            [
                'label' => esc_html__(' Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_activites_six_tab_content_bottom_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Check Availability'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'triprex_activites_six_tab_content_bottom_button_url',
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
            'triprex_activites_six_tab_content_video_button_section',
            [
                'label' => esc_html__(' Video Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_activites_six_genaral_video_style_design',
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

        $repeater->add_control(
            'triprex_activites_six_genaral_video_style_design_upload_video',
            [
                'label' => esc_html__('Choose Video', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition' => [
                    'triprex_activites_six_genaral_video_style_design' => 'file'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],


            ]
        );


        $repeater->add_control(
            'triprex_activites_six_genaral_video_style_url',
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
                    'triprex_activites_six_genaral_video_style_design' => 'link'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_activites_six_tab_content_bottom_video_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Watch Culture'),
                'placeholder' => esc_html__('Type your video text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_gallery_five_slide_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_activites_six_genaral_tab_list',
            [
                'label' => esc_html__('Content List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_activites_six_content_title' => esc_html(' Zip Lining'),

                    ],

                ],
                'title_field' => '{{{ triprex_activites_six_content_title }}}',
            ]
        );

        $this->end_controls_section();

        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_activites_genaral_style_sec',
            [
                'label' => esc_html__('Activities Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'triprex_activites_genaral_heading_sec',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_subtitle',
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
                'name'     => 'triprex_activites_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title span',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_subtitle_color',
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
            'triprex_activites_genaral_subtitle_margin',
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
            'triprex_activites_genaral_subtitle_padding',
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
            'triprex_activites_genaral_title',
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
                'name'     => 'triprex_activites_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_title_margin',
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
            'triprex_activites_genaral_title_padding',
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
            'triprex_activites_genaral_style_sec_tab_content',
            [
                'label' => esc_html__('Tab Card', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_style_sec_tab_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_activites_genaral_style_sec_tab_active_bac_color',
            [
                'label'     => esc_html__('Active Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link.active' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_style_sec_tab_content_title',
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
                'name'     => 'triprex_activites_genaral_style_sec_tab_content_title_typ',
                'selector' => '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link.active h6',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_style_sec_tab_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_style_sec_tab_content_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link.active h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_style_sec_tab_content_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_style_sec_tab_content_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Icon
        $this->add_control(
            'triprex_activites_genaral_icon_sec',
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
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link .icon  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_icon_sec_active_color',
            [
                'label' => esc_html__('Active Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link.active .icon  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link.active .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_svg_size',
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
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-sidebar .nav-pills .nav-item .nav-link .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_content_style_sep_sec',
            [
                'label' => esc_html__(' Content Style ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_style_subtitle_sec',
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
                'name'     => 'triprex_activites_genaral_two_content_style_subtitle_sec_typ',
                'selector' => '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .eg-tag2 span',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_style_subtitle_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .eg-tag2 span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_style_subtitle_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .eg-tag2' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_content_style_subtitle_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .eg-tag2 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_content_style_subtitle_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .eg-tag2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_content_style_title_sec',
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
                'name'     => 'triprex_activites_genaral_content_style_sec_typ',
                'selector' => '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content h2',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_content_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_content_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_content_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_content_style_description_sec',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_genaral_content_style_description_sec_typ',
                'selector' => '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content p',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_content_style_description_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_content_style_description_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_content_style_description_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_content_style_feature_sec',
            [
                'label' => esc_html__('Feature', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_genaral_content_style_feature_sec_typ',
                'selector' => '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content ul li',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_content_style_feature_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content ul li' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content ul li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_content_style_feature_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_content_style_feature_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //  Button 
        $this->add_control(
            'triprex_activites_genaral_content_btn_style',
            [
                'label' => esc_html__(' Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_activites_genaral_content_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_activites_genaral_btn_style_normal_tab',
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
                'name'     => 'triprex_activites_genaral_btn_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_activites_genaral_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_activites_genaral_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_style_style_margin',
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
            'triprex_activites_genaral_btn_style_padding',
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
            'triprex_activites_genaral_btn_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_style_color_hover',
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


        // Video  Button 
        $this->add_control(
            'triprex_activites_genaral_content_video_btn_style',
            [
                'label' => esc_html__(' Video Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_content_video_btn_text_style',
            [
                'label' => esc_html__(' Video Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_genaral_btn_text_style_typ',
                'selector' => '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .content-bottom-area .video-area h6',

            ]
        );
        $this->add_control(
            'triprex_activites_genaral_btn_style_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .content-bottom-area .video-area h6' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_activites_genaral_style_text_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .content-bottom-area .video-area .icon i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_style_styletext__margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .content-bottom-area .video-area h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_btn_text_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .verticle-tab-section .verticle-tab-wrapper .verticle-tab-content-wrap .verticle-tab-content .content-bottom-area .video-area h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // =====================Style Two=======================//

        $this->start_controls_section(
            'triprex_activites_two_genaral_style_sec',
            [
                'label' => esc_html__('Activities Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_style_sec_tab_content',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_style_sec_tab_content_title',
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
                'name'     => 'triprex_activites_genaral_two_style_sec_tab_content_title_typ',
                'selector' => '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link h6',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_style_sec_tab_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_style_sec_tab_content_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link.active h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_style_sec_tab_content_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_style_sec_tab_content_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Icon
        $this->add_control(
            'triprex_activites_two_genaral_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link .icon   i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link .icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_icon_sec_active_color',
            [
                'label' => esc_html__('Active Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link.active .icon  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link.active .icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_svg_size',
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
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link.active .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-sidebar .nav-pills .nav-item .nav-link.active .icon  i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_style_sec',
            [
                'label' => esc_html__(' Content Style ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_style_sub_title_sec',
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
                'name'     => 'triprex_activites_genaral_two_subtitle_style_sec_typ',
                'selector' => '{{WRAPPER}} .section-title2 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_subtitle_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_subtitle_style_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_subtitle_style_sec_margin',
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
            'triprex_activites_genaral_two_subtitle_style_sec_padding',
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
            'triprex_activites_genaral_two_content_style_title_sec',
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
                'name'     => 'triprex_activites_genaral_two_content_style_sec_typ',
                'selector' => '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap h2',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_content_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_content_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->add_control(
            'triprex_activites_genaral_two_content_style_description_sec',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_genaral_two_content_style_description_sec_typ',
                'selector' => '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap p',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_style_description_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_content_style_description_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_content_style_description_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_style_feature_sec',
            [
                'label' => esc_html__('Feature', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_genaral_two_content_style_feature_sec_typ',
                'selector' => '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap ul li',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_style_feature_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap ul li' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap ul li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_content_style_feature_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_content_style_feature_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //  Button 
        $this->add_control(
            'triprex_activites_genaral_two_content_btn_style',
            [
                'label' => esc_html__(' Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_activites_genaral_two_content_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_activites_genaral_two_btn_style_normal_tab',
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
                'name'     => 'triprex_activites_genaral_two_btn_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn3',

            ]
        );
        $this->add_control(
            'triprex_activites_genaral_two_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_activites_genaral_two_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn3' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_style_style_margin',
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
            'triprex_activites_genaral_two_btn_style_padding',
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
            'triprex_activites_genaral_two_btn_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_style_color_hover',
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


        // Video  Button 
        $this->add_control(
            'triprex_activites_genaral_two_content_video_btn_style',
            [
                'label' => esc_html__(' Video Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_two_content_video_btn_text_style',
            [
                'label' => esc_html__(' Video Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_genaral_two_btn_text_style_typ',
                'selector' => '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap .content-bottom-area .video-area h6',

            ]
        );
        $this->add_control(
            'triprex_activites_genaral_two_btn_style_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap .content-bottom-area .video-area h6' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_activites_genaral_two_style_text_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap .content-bottom-area .video-area .icon i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_style_styletext__margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap .content-bottom-area .video-area h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_two_btn_text_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-and-tab-section .tab-area .tab-content-area .tab-content-wrap .content-bottom-area .video-area h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // =====================Style Three =======================//

        $this->start_controls_section(
            'triprex_activites_three_genaral_style_sec',
            [
                'label' => esc_html__('Activities Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_style_sec_tab_content',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_style_sec_tab_content_title',
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
                'name'     => 'triprex_activites_genaral_three_style_sec_tab_content_title_typ',
                'selector' => '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_style_sec_tab_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_style_sec_tab_content_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_style_sec_tab_content_title_details_btn_color',
            [
                'label'     => esc_html__('Details Button Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link .details-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_activites_genaral_three_style_sec_tab_content_title_details_btn_bac_color',
            [
                'label'     => esc_html__('Details Button Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link .details-btn' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_style_sec_tab_content_title_details_btn__hov_color',
            [
                'label'     => esc_html__('Details Button Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link .details-btn:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_three_style_sec_tab_content_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_three_style_sec_tab_content_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Icon
        $this->add_control(
            'triprex_activites_three_genaral_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link   i' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_icon_sec_active_color',
            [
                'label' => esc_html__('Active Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link.active >  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link.active > svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_three_svg_size',
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
                    '{{WRAPPER}}  .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link >svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}  .activities-section .activities-tab-with-slider .nav-pills .nav-item .nav-link  i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_style_sec_pagination',
            [
                'label' => esc_html__('Pagination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_genaral_pagination_typ',
                'selector' => '{{WRAPPER}} .activities-section .activities-tab-with-slider .tab-content .tab-pane .tab-slider-wrap .slider-btn-grp4 .slider-btn',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_pagination_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .tab-content .tab-pane .tab-slider-wrap .slider-btn-grp4 .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_activites_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp4 .slider-btn' => 'border: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_activites_genaral_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-section .activities-tab-with-slider .tab-content .tab-pane .tab-slider-wrap .slider-btn-grp4 .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        // =====================Style Four =======================//

        $this->start_controls_section(
            'triprex_activites_four_genaral_style_sec',
            [
                'label' => esc_html__('Activities Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_general_style_heading',
            [
                'label' => esc_html__('General', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_style_heading_general_bac_color',
            [
                'label'     => esc_html__(' Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-tab-with-slider-section' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_activites_genaral_four_style_heading_general_card_bac_color',
            [
                'label'     => esc_html__('Card Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_style_heading_general_active_bac_color',
            [
                'label'     => esc_html__('Active Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link.active' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_activites_genaral_four_style_heading_general_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_four_style_heading_general_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->add_control(
            'triprex_activites_genaral_four_style_heading',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_style_heading_title',
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
                'name'     => 'triprex_activites_genaral_four_style_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_style_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_activites_genaral_four_style_heading_title_margin',
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
            'triprex_activites_genaral_four_style_heading_title_padding',
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
            'triprex_activites_genaral_four_dec_style_heading_desc',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_genaral_four_dec_style_heading_desc_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_dec_style_heading_desc_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_activites_genaral_four_dec_style_heading_desc_margin',
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
            'triprex_activites_genaral_four_dec_style_heading_desc_padding',
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
            'triprex_activites_genaral_four_style_sec_tab_content',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Icon
        $this->add_control(
            'triprex_activites_four_genaral_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link .icon   i' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_icon_sec_active_color',
            [
                'label' => esc_html__('Active Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link.active .icon  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link.active .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_svg_size',
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
                    '{{WRAPPER}}  .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link .icon i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}  .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link .icon svg' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_style_sec_tab_content_title',
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
                'name'     => 'triprex_activites_genaral_four_style_sec_tab_content_title_typ',
                'selector' => '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link .content h5',

            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_style_sec_tab_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link .content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_four_style_sec_tab_content_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link.active .content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_four_style_sec_tab_content_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_genaral_four_style_sec_tab_content_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-tab-with-slider-section .title-and-nav .nav-pills .nav-item .nav-link .content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        // =====================Style Five=======================//

        $this->start_controls_section(
            'triprex_activites_five_genaral_style_sec',
            [
                'label' => esc_html__('Activities Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_activities_content_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_control(
            'triprex_activites_five_genaral_style_sec_tab_content',
            [
                'label' => esc_html__('Tab Card', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_style_sec_tab_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_activites_five_genaral_style_sec_tab_active_bac_color',
            [
                'label'     => esc_html__('Active Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link.active' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_style_sec_tab_content_title',
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
                'name'     => 'triprex_activites_five_genaral_style_sec_tab_content_title_typ',
                'selector' => '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_style_sec_tab_content_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_style_sec_tab_content_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_style_sec_tab_content_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_style_sec_tab_content_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Icon
        $this->add_control(
            'triprex_activites_five_genaral_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link >i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link >svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_icon_sec_active_color',
            [
                'label' => esc_html__('Active Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link.active  >i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link.active > svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activitesfive_genaral_svg_size',
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
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .nav-pills .nav-item .nav-link i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_genaral_content_style_sec',
            [
                'label' => esc_html__(' Content Style ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_two_content_style_subtitle_sec',
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
                'name'     => 'triprex_activites_five_genaral_two_content_style_subtitle_sec_typ',
                'selector' => '{{WRAPPER}} .section-title5 span',

            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_two_content_style_subtitle_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .section-title5 span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_two_content_style_subtitle_sec_margin',
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
            'triprex_activites_five_genaral_two_content_style_subtitle_sec_padding',
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
            'triprex_activites_five_genaral_content_style_title_sec',
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
                'name'     => 'triprex_activites_five_genaral_content_style_sec_typ',
                'selector' => '{{WRAPPER}} .section-title5 h2',

            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_content_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_content_style_sec_margin',
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
            'triprex_activites_five_genaral_content_style_sec_padding',
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
            'triprex_activites_five_genaral_content_style_description_sec',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_five_genaral_content_style_description_sec_typ',
                'selector' => '{{WRAPPER}} .section-title5 p',

            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_content_style_description_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_content_style_description_sec_margin',
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
            'triprex_activites_five_genaral_content_style_description_sec_padding',
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
            'triprex_activites_five_genaral_content_style_feature_sec',
            [
                'label' => esc_html__('Feature', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_five_genaral_content_style_feature_sec_typ',
                'selector' => '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .service-list li',

            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_content_style_feature_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .service-list li' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .service-list li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_content_style_feature_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .service-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_content_style_feature_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .service-list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //  Button 
        $this->add_control(
            'triprex_activites_five_genaral_content_btn_style',
            [
                'label' => esc_html__(' Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_activites_five_genaral_content_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_activites_five_genaral_btn_style_normal_tab',
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
                'name'     => 'triprex_activites_five_genaral_btn_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_activites_five_genaral_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_activites_five_genaral_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_style_style_margin',
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
            'triprex_activites_five_genaral_btn_style_padding',
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
            'triprex_activites_five_genaral_btn_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_style_color_hover',
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


        // Video  Button 
        $this->add_control(
            'triprex_activites_five_genaral_content_video_btn_style',
            [
                'label' => esc_html__(' Video Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_activites_five_genaral_content_video_btn_text_style',
            [
                'label' => esc_html__(' Video Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_activites_five_genaral_btn_text_style_typ',
                'selector' => '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .content-bottom-area .video-area h6',

            ]
        );
        $this->add_control(
            'triprex_activites_five_genaral_btn_style_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .content-bottom-area .video-area h6' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_activites_five_genaral_style_text_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .content-bottom-area .video-area .icon i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_style_styletext_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .content-bottom-area .video-area h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_activites_five_genaral_btn_text_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-activities-section .activities-tab-wrapper .activities-tab-content-wrap .activities-content .content-bottom-area .video-area h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_activites_genaral_list'];
        $data2 = $settings['triprex_activites_two_genaral_list'];
        $data3 = $settings['triprex_activites_three_genaral_list'];
        $data5 = $settings['triprex_activites_genaral_four_tab_content_sec_image_list'];
        $data11 = $settings['triprex_activites_six_genaral_tab_list'];

?>
        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".activities-img-slider", {
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

                jQuery(".slider-and-tab-section .tab-sidebar ul li").on({
                    click: function() {
                        var index = jQuery(this).index();
                        jQuery(".activities-slider-group li").removeClass("active");
                        jQuery(".activities-slider-group li:eq(" + index + ")").addClass("active");
                    },
                });

                var activities = new Swiper(".activities-tab-img-slider", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 0,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".activities-tab-img-next",
                        prevEl: ".activities-tab-img-prev",
                    },
                });

                var swiper = new Swiper(".home4-tab-with-img-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    effect: 'fade', // Use the fade effect
                    loop: true,
                    fadeEffect: {
                        crossFade: true, // Enable cross-fade transition
                    },
                    autoplay: {
                        delay: 2000, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".home4-tab-with-img-next",
                        prevEl: ".home4-tab-with-img-prev",
                    },
                });

                var swiper = new Swiper(".activity-card-slider", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 25,
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
                    }
                });

                var activities = new Swiper(".activities-nav-slider", {
                    speed: 1500,
                    spaceBetween: 0,
                    loop: true,
                    navigation: {
                        nextEl: ".home6-activities-nav-next",
                        prevEl: ".home6-activities-nav-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        576: {
                            slidesPerView: 3,
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
        <?php endif ?>

        <?php if ($settings['triprex_activities_content_style_selection'] == 'style_one') : ?>
            <div class="verticle-tab-section pt-120 mb-120">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/home1/section-vector1.png' ); ?>" alt="<?php echo esc_attr__('vect-image', 'triprex-core') ?>" class="section-vector1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-60">
                                <?php if (!empty($settings['triprex_activites_tab_heading_section_subtitle'])) :   ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z" />
                                        </svg>
                                        <?php echo esc_html($settings['triprex_activites_tab_heading_section_subtitle']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z" />
                                        </svg>
                                    </span>
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_activites_tab_heading_section_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['triprex_activites_tab_heading_section_title']); ?></h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="verticle-tab-wrapper">
                        <div class="row g-xl-4 gy-5 ">
                            <div class="col-xl-5">
                                <div class="verticle-tab-sidebar">
                                    <ul class="nav nav-pills" id="pills-tab5" role="tablist">
                                        <?php foreach ($data as $key => $item) : ?>
                                            <li class="nav-item" role="presentation">
                                                <div class="nav-link <?php echo ($key == 0) ? 'active' : ''; ?>" id="<?php echo esc_attr($key) ?>-tab" data-bs-toggle="tab" data-bs-target="#tech-<?php echo esc_attr($key) ?>" role="tab" aria-controls="tech-<?php echo esc_attr($key) ?>" aria-selected="true">
                                                    <div class="icon">
                                                        <?php \Elementor\Icons_Manager::render_icon($item['triprex_activites_content_icon'], ['aria-hidden' => 'true']); ?>
                                                    </div>
                                                    <?php if (!empty($item['triprex_activites_content_title'])) :   ?>
                                                        <h6> <?php echo esc_html($item['triprex_activites_content_title']); ?></h6>
                                                    <?php endif ?>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex justify-content-xl-start justify-content-center">
                                <div class="tab-content" id="pills-tab5Content">
                                    <?php foreach ($data as $key => $item) : ?>
                                        <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : ''; ?>" id="tech-<?php echo esc_attr($key) ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($key) ?>-tab">
                                            <div class="verticle-tab-content-wrap">
                                                <div class="verticle-tab-content">
                                                    <?php if (!empty($item['triprex_activites_tab_content_subtitle'])) :   ?>
                                                        <div class="eg-tag2">
                                                            <span><?php echo esc_html($item['triprex_activites_tab_content_subtitle']); ?></span>
                                                        </div>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_activites_tab_content_title'])) :   ?>
                                                        <h2><?php echo esc_html($item['triprex_activites_tab_content_title']); ?></h2>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_activites_tab_content_desc'])) :   ?>
                                                        <p><?php echo esc_html($item['triprex_activites_tab_content_desc']); ?></p>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_activites_tab_content_feature'])) :   ?>
                                                        <ul>
                                                            <?php
                                                            $value = $item['triprex_activites_tab_content_feature'];
                                                            $single_value = explode("\n", str_replace("\r", "", $item['triprex_activites_tab_content_feature']));
                                                            foreach ($single_value as $sng) { ?>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9">
                                                                        <circle cx="4.5" cy="4.5" r="4.5" />
                                                                    </svg>
                                                                    <?php echo sprintf(__('%s', 'triprex-core'), $sng); ?>
                                                                </li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    <?php endif ?>
                                                    <div class="content-bottom-area">
                                                        <?php if (!empty($item['triprex_activites_tab_content_bottom_button_text'])) :   ?>
                                                            <a href="<?php echo esc_url($item['triprex_activites_tab_content_bottom_button_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($item['triprex_activites_tab_content_bottom_button_text']); ?></a>
                                                        <?php endif ?>
                                                        <?php if ($item['triprex_activites_genaral_video_style_design'] === 'file') : ?>
                                                            <a data-fancybox="popup-video" href="<?php echo esc_url($item['triprex_activites_genaral_video_style_design_upload_video']['url']) ?>" class="video-area">
                                                                <div class="icon">
                                                                    <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                        <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                        <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                        <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                    </svg>
                                                                    <i class="bi bi-play"></i>
                                                                </div>
                                                                <?php if (!empty($item['triprex_activites_tab_content_bottom_video_btn_text'])) :   ?>
                                                                    <h6><?php echo esc_html($item['triprex_activites_tab_content_bottom_video_btn_text']); ?></h6>
                                                                <?php endif ?>
                                                            </a>
                                                        <?php elseif ($item['triprex_activites_genaral_video_style_design'] === 'link') : ?>
                                                            <a data-fancybox="popup-video" href="<?php echo esc_url($item['triprex_activites_genaral_video_style_url']['url']) ?>" class="video-area">
                                                                <div class="icon">
                                                                    <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                        <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                        <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                        <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                    </svg>
                                                                    <i class="bi bi-play"></i>
                                                                </div>
                                                                <?php if (!empty($item['triprex_activites_tab_content_bottom_video_btn_text'])) :   ?>
                                                                    <h6><?php echo esc_html($item['triprex_activites_tab_content_bottom_video_btn_text']); ?></h6>
                                                                <?php endif ?>
                                                            </a>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                <div class="verticle-tab-img">
                                                    <?php if (!empty($item['triprex_activites_image_one']['url'])) :   ?>
                                                        <div class="verticle-tab-img1 mb-25">
                                                            <img src="<?php echo esc_url($item['triprex_activites_image_one']['url']) ?>" alt="<?php echo esc_attr__('acti-image', 'triprex-core') ?>">
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['triprex_activites_image_two']['url'])) :   ?>
                                                        <div class="verticle-tab-img2">
                                                            <img src="<?php echo esc_url($item['triprex_activites_image_two']['url']) ?>" alt="<?php echo esc_attr__('acti-image ', 'triprex-core') ?>">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_activities_content_style_selection'] == 'style_two') : ?>
            <div class="slider-and-tab-section ">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <ul class="activities-slider-group">
                            <?php foreach ($data2 as $key2 => $item2) : ?>
                                <li class="<?php echo $key2 == 0 ? 'active' : '' ?>">
                                    <div class="slider-area">
                                        <div class="swiper activities-img-slider">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($item2['triprex_activites_slide_image'] as $image) :
                                                    if (!empty($image['url'])) :
                                                ?>
                                                        <div class="swiper-slide">
                                                            <div class="slide-img" style="background-image: linear-gradient(180deg, rgba(16, 12, 8, 0.4) 0%, rgba(16, 12, 8, 0.4) 100%), url(<?php echo esc_url($image['url']) ?>)"></div>
                                                        </div>
                                                <?php endif;
                                                endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination5 pagination1"></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-lg-7">
                        <div class="tab-area">
                            <div class="section-title2 text-center mb-50">
                                <?php if (!empty($settings['triprex_activites_two_heading_subtitle'])) :   ?>
                                    <div class="eg-section-tag">
                                        <span><?php echo esc_html($settings['triprex_activites_two_heading_subtitle']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_activites_two_heading_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['triprex_activites_two_heading_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="tab-content-area">
                                <div class="row g-xl-4 gy-5 ">
                                    <div class="col-xl-5">
                                        <div class="tab-sidebar">
                                            <ul class="nav nav-pills" id="pills-tab3" role="tablist">
                                                <?php foreach ($data2 as $key2 => $item2) : ?>
                                                    <li class="nav-item" role="presentation">
                                                        <div class="nav-link <?php echo ($key2 == 0) ? 'active' : ''; ?>" id="tab-<?php echo esc_attr($key2) ?>" data-bs-toggle="pill" data-bs-target="#tab-pane-<?php echo esc_attr($key2) ?>" role="tab" aria-controls="tab-<?php echo esc_attr($key2) ?>" aria-selected="true">
                                                            <?php if (!empty($item2['triprex_activites_two_content_icon'])) :   ?>
                                                                <div class="icon">
                                                                    <?php \Elementor\Icons_Manager::render_icon($item2['triprex_activites_two_content_icon'], ['aria-hidden' => 'true']); ?>
                                                                </div>
                                                            <?php endif ?>
                                                            <?php if (!empty($item2['triprex_activites_two_content_title'])) :   ?>
                                                                <h6><?php echo esc_html($item2['triprex_activites_two_content_title']); ?></h6>
                                                            <?php endif ?>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 d-flex justify-content-xl-start justify-content-center">
                                        <div class="tab-content" id="pills-tab3Content">
                                            <?php foreach ($data2 as $key2 => $item2) : ?>
                                                <div class="tab-pane fade <?php echo ($key2 == 0) ? 'show active' : ''; ?>" id="tab-pane-<?php echo esc_attr($key2) ?>" role="tabpanel" aria-labelledby="tab-<?php echo esc_attr($key2) ?>">
                                                    <div class="tab-content-wrap">
                                                        <?php if (!empty($item2['triprex_activites_two_tab_content_title'])) :   ?>
                                                            <h2><?php echo esc_html($item2['triprex_activites_two_tab_content_title']); ?></h2>
                                                        <?php endif ?>
                                                        <?php if (!empty($item2['triprex_activites_two_tab_content_desc'])) :   ?>
                                                            <p><?php echo esc_html($item2['triprex_activites_two_tab_content_desc']); ?></p>
                                                        <?php endif ?>
                                                        <?php if (!empty($item2['triprex_activites_two_tab_content_feature'])) :   ?>
                                                            <ul>
                                                                <?php
                                                                $value = $item2['triprex_activites_two_tab_content_feature'];
                                                                $single_value = explode("\n", str_replace("\r", "", $item2['triprex_activites_two_tab_content_feature']));
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
                                                        <div class="content-bottom-area">
                                                            <?php if (!empty($item2['triprex_activites_two_tab_content_bottom_button_text'])) :   ?>
                                                                <a href="<?php echo esc_url($item2['triprex_activites_two_tab_content_bottom_button_url']['url']) ?>" class="primary-btn3"><?php echo esc_html($item2['triprex_activites_two_tab_content_bottom_button_text']); ?></a>
                                                            <?php endif; ?>
                                                            <?php if ($item2['triprex_activites_two_genaral_video_style_design'] === 'file') : ?>
                                                                <a href="<?php echo esc_url($item2['triprex_activites_two_genaral_video_style_design_upload_video']['url']) ?>" class="video-area video1">
                                                                    <div class="icon">
                                                                        <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                            <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                            <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                            <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                        </svg>
                                                                        <i class="bi bi-play"></i>
                                                                    </div>
                                                                    <?php if (!empty($item2['triprex_activites_two_tab_content_bottom_video_btn_text'])) :   ?>
                                                                        <h6><?php echo esc_html($item2['triprex_activites_two_tab_content_bottom_video_btn_text']); ?></h6>
                                                                    <?php endif; ?>
                                                                </a>
                                                            <?php elseif ($item2['triprex_activites_two_genaral_video_style_design'] === 'link') : ?>
                                                                <a href="<?php echo esc_url($item2['triprex_activites_two_genaral_video_style_url']['url']) ?>" class="video-area video1">
                                                                    <div class="icon">
                                                                        <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                            <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                            <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                            <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                        </svg>
                                                                        <i class="bi bi-play"></i>
                                                                    </div>
                                                                    <?php if (!empty($item2['triprex_activites_two_tab_content_bottom_video_btn_text'])) :   ?>
                                                                        <h6><?php echo esc_html($item2['triprex_activites_two_tab_content_bottom_video_btn_text']); ?></h6>
                                                                    <?php endif; ?>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['triprex_activities_content_style_selection'] == 'style_three') : ?>
            <div class="activities-section ">
                <div class="activities-tab-with-slider">
                    <ul class="nav nav-pills flex-column" id="activities-tab2" role="tablist">
                        <?php foreach ($data3 as $key => $item) : ?>
                            <li class="nav-item" role="presentation">
                                <div class="nav-link <?php echo ($key == 0) ? 'active' : ''; ?>" id="<?php echo esc_attr($key) ?>-tab" data-bs-toggle="pill" data-bs-target="#tab-<?php echo esc_attr($key) ?>" role="tab" aria-controls="tab-<?php echo esc_attr($key) ?>" aria-selected="true">
                                    <?php \Elementor\Icons_Manager::render_icon($item['triprex_activites_two_genaral_tab_icon'], ['aria-hidden' => 'true']); ?>
                                    <?php echo esc_html($item['triprex_activites_two_genaral_tab_title']); ?>
                                    <a class="details-btn" href="<?php echo esc_url($item['triprex_activites_two_genaral_tab_button_url']['url']) ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                            <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                                            <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content" id="activities-tab2Content">
                        <?php foreach ($data3 as $key => $item) : ?>
                            <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : ''; ?>" id="tab-<?php echo esc_attr($key) ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($key) ?>-tab">
                                <div class="row h-100">
                                    <div class="col-lg-12">
                                        <div class="tab-slider-wrap">
                                            <div class="swiper activities-tab-img-slider">
                                                <div class="swiper-wrapper">
                                                    <?php $imageCount = count($item['triprex_activites_genaral_content_sec_image']);
                                                    foreach ($item['triprex_activites_genaral_content_sec_image'] as $image) :
                                                        if (!empty($image['url'])) :
                                                    ?>
                                                            <div class="swiper-slide">
                                                                <div class="activities-tab-img">
                                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('slider-image ', 'triprex-core') ?>">
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="number-of-img">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                    <g>
                                                        <path d="M5.62523 11.4297C6.12258 11.4297 6.59955 11.2321 6.95123 10.8804C7.3029 10.5288 7.50047 10.0518 7.50047 9.55443C7.50047 9.05709 7.3029 8.58012 6.95123 8.22844C6.59955 7.87677 6.12258 7.6792 5.62523 7.6792C5.12789 7.6792 4.65092 7.87677 4.29924 8.22844C3.94757 8.58012 3.75 9.05709 3.75 9.55443C3.75 10.0518 3.94757 10.5288 4.29924 10.8804C4.65092 11.2321 5.12789 11.4297 5.62523 11.4297Z" />
                                                        <path d="M17.5022 16.4306C17.5022 17.0937 17.2388 17.7297 16.7699 18.1986C16.301 18.6675 15.665 18.9309 15.0019 18.9309H2.50031C1.83719 18.9309 1.20122 18.6675 0.732325 18.1986C0.263425 17.7297 0 17.0937 0 16.4306V6.42934C-3.31345e-07 5.76664 0.263081 5.13106 0.73144 4.66223C1.1998 4.1934 1.83512 3.92969 2.49781 3.92902C2.49781 3.2659 2.76124 2.62994 3.23014 2.16104C3.69904 1.69214 4.335 1.42871 4.99812 1.42871H17.4997C18.1628 1.42871 18.7988 1.69214 19.2677 2.16104C19.7366 2.62994 20 3.2659 20 3.92902V13.9303C20 14.593 19.7369 15.2285 19.2686 15.6974C18.8002 16.1662 18.1649 16.4299 17.5022 16.4306ZM17.4997 2.67887H4.99812C4.66656 2.67887 4.34858 2.81058 4.11413 3.04503C3.87968 3.27948 3.74797 3.59746 3.74797 3.92902H15.0019C15.665 3.92902 16.301 4.19245 16.7699 4.66135C17.2388 5.13025 17.5022 5.76621 17.5022 6.42934V15.1804C17.8333 15.1798 18.1507 15.0478 18.3846 14.8134C18.6185 14.579 18.7498 14.2614 18.7498 13.9303V3.92902C18.7498 3.59746 18.6181 3.27948 18.3837 3.04503C18.1492 2.81058 17.8312 2.67887 17.4997 2.67887ZM2.50031 5.17918C2.16875 5.17918 1.85077 5.31089 1.61632 5.54534C1.38187 5.77979 1.25016 6.09777 1.25016 6.42934V16.4306L4.55807 13.4877C4.66025 13.3859 4.79449 13.3226 4.93804 13.3084C5.08159 13.2943 5.2256 13.3303 5.34567 13.4102L8.67108 15.6267L13.3092 10.9887C13.4019 10.8959 13.5214 10.8346 13.6509 10.8135C13.7803 10.7924 13.9131 10.8126 14.0305 10.8711L16.252 13.3052V6.42934C16.252 6.09777 16.1203 5.77979 15.8859 5.54534C15.6514 5.31089 15.3334 5.17918 15.0019 5.17918H2.50031Z" />
                                                    </g>
                                                </svg>
                                                <?php echo esc_html($imageCount); ?>
                                            </div>
                                            <div class="slider-btn-grp4">
                                                <div class="slider-btn activities-tab-img-prev">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 16 20">
                                                        <path d="M15.9512 0.869644C13.5972 7.34699 13.5419 12.9847 15.8404 19.1322C15.9511 19.4021 15.8404 19.7319 15.6188 19.8819C15.3973 20.0618 15.0927 20.0318 14.8988 19.8219C10.1356 14.7839 5.28936 11.7252 0.470783 10.6756C0.193853 10.6157 1.79767e-06 10.3458 1.82127e-06 10.0759C1.84749e-06 9.77599 0.193853 9.50611 0.470783 9.44613C5.26167 8.36657 10.1633 5.24785 15.0096 0.179928C15.1204 0.0599765 15.2588 -1.97214e-06 15.425 -1.95762e-06C15.5358 -1.94793e-06 15.6465 0.0299873 15.7573 0.119951C15.9788 0.26989 16.0619 0.569767 15.9512 0.869644Z" />
                                                    </svg>
                                                </div>
                                                <div class="slider-btn activities-tab-img-next">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 16 20">
                                                        <path d="M0.0488516 19.1304C2.40275 12.6531 2.45814 7.01538 0.159624 0.867897C0.0488521 0.598007 0.159624 0.268143 0.381167 0.118204C0.602711 -0.0617224 0.907334 -0.0317344 1.10118 0.17818C5.86437 5.21612 10.7106 8.27486 15.5292 9.32443C15.8061 9.38441 16 9.6543 16 9.92419C16 10.2241 15.8061 10.494 15.5292 10.5539C10.7383 11.6335 5.83668 14.7522 0.990413 19.8201C0.879641 19.9401 0.741176 20.0001 0.575018 20.0001C0.464247 20.0001 0.353474 19.9701 0.242703 19.8801C0.0211589 19.7302 -0.0619202 19.4303 0.0488516 19.1304Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_activities_content_style_selection'] == 'style_four') : ?>
            <div class="home4-tab-with-slider-section">
                <div class="container">
                    <div class="row g-lg-4 gy-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="title-and-nav">
                                <div class="section-title3">
                                    <?php if (!empty($settings['triprex_activites_four_heading_title'])) :   ?>
                                        <h2><?php echo esc_html($settings['triprex_activites_four_heading_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_activites_four_heading_short_desc'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_activites_four_heading_short_desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="nav nav-pills d-block" id="pills-tab2" role="tablist">
                                    <div class="row g-4">
                                        <?php foreach ($data5 as $key => $item) : ?>
                                            <div class="col-sm-6">
                                                <div class="nav-item" role="presentation">
                                                    <div class="nav-link <?php echo ($key == 0) ? 'active' : ''; ?>" id="<?php echo esc_attr($key) ?>-tab" data-bs-toggle="pill" data-bs-target="#con-<?php echo esc_attr($key) ?>" role="tab" aria-controls="con-<?php echo esc_attr($key) ?>" aria-selected="true">
                                                        <div class="icon">
                                                            <?php \Elementor\Icons_Manager::render_icon($item['triprex_activites_four_content_icon'], ['aria-hidden' => 'true']); ?>
                                                        </div>
                                                        <div class="content">
                                                            <?php if (!empty($item['triprex_activites_four_content_title'])) :   ?>
                                                                <h5><?php echo esc_html($item['triprex_activites_four_content_title']); ?></h5>
                                                            <?php endif; ?>
                                                        </div>
                                                        <a class="details-btn" href="<?php echo esc_url($item['triprex_activites_four_genaral_tab_button_url']['url']) ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                                                <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                                                                <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tab-content" id="pills-tab2Content">
                                <?php foreach ($data5 as $key => $item) : ?>
                                    <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : ''; ?>" id="con-<?php echo esc_attr($key) ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($key) ?>-tab">
                                        <div class="tab-with-slider-img-wrap">
                                            <div class="swiper home4-tab-with-img-slider">
                                                <div class="swiper-wrapper">
                                                    <?php foreach ($item['triprex_gallery_four_slide_image'] as $image) :
                                                        if (!empty($image['url'])) :
                                                    ?>
                                                            <div class="swiper-slide">
                                                                <div class="tab-with-slider-img">
                                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('slider-image ', 'triprex-core') ?>">
                                                                </div>
                                                            </div>
                                                    <?php endif;
                                                    endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="slider-btn-grp2">
                                                <div class="slider-btn home4-tab-with-img-prev">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 9 17">
                                                        <path d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z"></path>
                                                    </svg>
                                                </div>
                                                <div class="slider-btn home4-tab-with-img-next">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 9 17" fill="none">
                                                        <path d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>



        <?php if ($settings['triprex_activities_content_style_selection'] == 'style_five') : ?>
            <div class="home6-activities-section ">
                <div class="container one">
                    <div class="activities-tab-wrapper">
                        <div class="row mb-90">
                            <div class="col-lg-12">
                                <div class="nav nav-pills" id="pills-tab" role="tablist">
                                    <div class="swiper activities-nav-slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($data11 as $key => $item) : ?>
                                                <div class="swiper-slide">
                                                    <div class="nav-item" role="presentation">
                                                        <button class="nav-link <?php echo ($key == 0) ? 'show active' : ''; ?>" id="<?php echo esc_attr($key) ?>-tab" data-bs-toggle="pill" data-bs-target="#con-<?php echo esc_attr($key) ?>" type="button" role="tab" aria-controls="con-<?php echo esc_attr($key) ?>" aria-selected="true">
                                                            <?php \Elementor\Icons_Manager::render_icon($item['triprex_activites_six_content_icon'], ['aria-hidden' => 'true']); ?>
                                                            <?php echo esc_html($item['triprex_activites_six_content_title']); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="slider-btn-grp two">
                                        <div class="slider-btn home6-activities-nav-prev">
                                            <i class="bi bi-arrow-left"></i>
                                        </div>
                                        <div class="slider-btn home6-activities-nav-next">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="activities-tab-content-wrap">
                            <div class="tab-content" id="pills-tabContent">
                                <?php foreach ($data11 as $key => $item) : ?>
                                    <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : ''; ?>" id="con-<?php echo esc_attr($key) ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($key) ?>-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="activities-content">
                                                    <div class="section-title5 mb-40">
                                                        <?php if (!empty($item['triprex_activites_six_tab_content_subtitle'])) :   ?>
                                                            <span>
                                                                <?php echo esc_html($item['triprex_activites_six_tab_content_subtitle']); ?>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                    <g opacity="0.8">
                                                                        <path d="M9.06226 11.3626L8.55838 13.7263L6.22997 20.0004L7.61194 19.7701L14.0678 11.3277C14.979 11.296 15.8626 11.2471 16.6304 11.1713C20.1826 10.82 19.9984 10.0002 19.9984 10.0002C19.9984 10.0002 20.1826 9.18031 16.6304 8.829C15.8626 8.7529 14.9789 8.70407 14.0678 8.67261L7.61197 0.229974L6.22997 -6.01907e-07L8.55838 6.27416L9.06226 8.6378C7.87942 8.6555 7.07898 8.68244 7.07898 8.68244C7.07898 8.68244 5.44724 8.7201 2.92253 9.28895L0.864093 6.43364L-0.000128074 6.43364L0.615287 9.90529C0.504522 9.93924 0.504522 10.0611 0.615287 10.0951L-0.000128385 13.5667L0.864093 13.5667L2.92253 10.7117C5.44724 11.2806 7.07898 11.3177 7.07898 11.3177C7.07898 11.3177 7.87942 11.3449 9.06226 11.3626Z" />
                                                                        <path d="M13.4102 13.2575L13.4102 14.1895L9.96575 14.1895L9.96575 13.2575L13.4102 13.2575ZM13.4102 5.81414L13.4102 6.7458L9.96595 6.7458L9.96595 5.81414L13.4102 5.81414ZM11.0863 16.385L11.0863 17.3167L7.90291 17.3167L7.90291 16.385L11.0863 16.385ZM11.0863 2.68689L11.0863 3.61885L7.90291 3.61885L7.90291 2.68689L11.0863 2.68689Z" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['triprex_activites_six_tab_content_title'])) :   ?>
                                                            <h2> <?php echo esc_html($item['triprex_activites_six_tab_content_title']); ?></h2>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['triprex_activites_six_tab_content_desc'])) :   ?>
                                                            <p><?php echo esc_html($item['triprex_activites_six_tab_content_desc']); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <ul class="service-list">

                                                        <?php
                                                        $value = $item['triprex_activites_six_tab_content_feature'];
                                                        $single_value = explode("\n", str_replace("\r", "", $item['triprex_activites_six_tab_content_feature']));
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
                                                    <div class="content-bottom-area">
                                                        <?php if (!empty($item['triprex_activites_six_tab_content_bottom_button_text'])) :   ?>
                                                            <a href="<?php echo esc_url($item['triprex_activites_six_tab_content_bottom_button_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($item['triprex_activites_six_tab_content_bottom_button_text']); ?></a>
                                                        <?php endif; ?>

                                                        <?php if ($item['triprex_activites_six_genaral_video_style_design'] === 'file') : ?>
                                                            <a href="<?php echo esc_url($item['triprex_activites_six_genaral_video_style_design_upload_video']['url']) ?>" class="video-area video1">
                                                                <div class="icon">
                                                                    <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                        <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                        <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                        <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                    </svg>
                                                                    <i class="bi bi-play"></i>
                                                                </div>
                                                                <?php if (!empty($item['triprex_activites_six_tab_content_bottom_video_btn_text'])) :   ?>
                                                                    <h6><?php echo esc_html($item['triprex_activites_six_tab_content_bottom_video_btn_text']); ?></h6>
                                                                <?php endif; ?>
                                                            </a>
                                                        <?php elseif ($item['triprex_activites_six_genaral_video_style_design'] === 'link') : ?>
                                                            <a href="<?php echo esc_url($item['triprex_activites_six_genaral_video_style_url']['url']) ?>" class="video-area video1">
                                                                <div class="icon">
                                                                    <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                        <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                        <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                        <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                    </svg>
                                                                    <i class="bi bi-play"></i>
                                                                </div>
                                                                <?php if (!empty($item['triprex_activites_six_tab_content_bottom_video_btn_text'])) :   ?>
                                                                    <h6><?php echo esc_html($item['triprex_activites_six_tab_content_bottom_video_btn_text']); ?></h6>
                                                                <?php endif; ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="tab-with-slider-img-wrap">
                                                    <div class="swiper home4-tab-with-img-slider">
                                                        <div class="swiper-wrapper">
                                                            <?php foreach ($item['triprex_gallery_five_slide_image'] as $image) :
                                                                if (!empty($image['url'])) :
                                                            ?>
                                                                    <div class="swiper-slide">
                                                                        <div class="tab-with-slider-img">
                                                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('gallery-image ', 'triprex-core') ?>">
                                                                        </div>
                                                                    </div>
                                                            <?php endif;
                                                            endforeach; ?>
                                                        </div>
                                                    </div>
                                                    <div class="slider-btn-grp2">
                                                        <div class="slider-btn home4-tab-with-img-prev">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 9 17">
                                                                <path d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z"></path>
                                                            </svg>
                                                        </div>
                                                        <div class="slider-btn home4-tab-with-img-next">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 9 17" fill="none">
                                                                <path d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Activities_Widget());
