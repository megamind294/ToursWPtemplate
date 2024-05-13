<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Team_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_team';
    }

    public function get_title()
    {
        return esc_html__('EG Team', 'triprex-core');
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
            'triprex_team_one_section_genaral_sec',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_team_one_section_genaral_sec_style_selection',
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
        $this->add_control(
            'triprex_team_style_layout_variation_selection',
            [
                'label'   => esc_html__('Select Layout Variation', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'slider' => esc_html__('Slider', 'triprex-core'),
                    'grid' => esc_html__('Grid', 'triprex-core'),
                ],
                'default' => 'slider',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_team_one_section_genaral',
            [
                'label' => esc_html__('Team Section', 'triprex-core'),
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_one'
                ]

            ]
        );

        $this->add_control(
            'triprex_team_heading',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );


        $this->add_control(
            'triprex_team_header_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tour Guide'),
                'label_block' => true,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );
        $this->add_control(
            'triprex_team_header_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Our Travel Guide'),
                'label_block' => true,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'triprex_team_card',
            [
                'label' => esc_html__('Team Card', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_team_content_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_team_content_name',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mateo Daniel'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_team_content_designaton',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tour Guide'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'more_options',
            [
                'label' => esc_html__('Social Link', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // start popcover
        $repeater->add_control(
            'popover_toggle_social',
            [
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label' => esc_html__('Social Media', 'triprex-core'),
                'label_off' => esc_html('Default'),
                'label_on' => esc_html__('Custom', 'triprex-core'),
                'return_value' => 'yes',
            ]
        );

        $repeater->start_popover();

        $repeater->add_control(
            'website_link_facebook',
            [
                'label' => esc_html__('Facebook', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.facebook.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_twitter',
            [
                'label' => esc_html__('Twitter', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://twitter.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_pinterest',
            [
                'label' => esc_html__('Pinterest', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.pinterest.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_instagram',
            [
                'label' => esc_html__('Instagram', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.instagram.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //linkedin Link
        $repeater->add_control(
            'website_link_linkedin',
            [
                'label' => esc_html__('Linkedin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //reddit Link
        $repeater->add_control(
            'website_link_reddit',
            [
                'label' => esc_html__('Reddit', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //behance Link
        $repeater->add_control(
            'website_link_behance',
            [
                'label' => esc_html__('Behance', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //stackoverflow Link
        $repeater->add_control(
            'website_link_stackoverflow',
            [
                'label' => esc_html__('Stackoverflow', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->end_popover();


        $this->add_control(
            'triprex_team_list',
            [
                'label' => esc_html__('Team Lists', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_team_content_name' => esc_html('Mateo Daniel'),
                    ],
                    [
                        'triprex_team_content_name' => esc_html('Elias Josiah'),
                    ],
                    [
                        'triprex_team_content_name' => esc_html('Miles Jaxon'),
                    ],
                    [
                        'triprex_team_content_name' => esc_html('Silas Nicholas'),
                    ],
                ],
                'title_field' => '{{{ triprex_team_content_name }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_team_two_section_genaral',
            [
                'label' => esc_html__('Team Section', 'triprex-core'),
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_two'
                ]

            ]
        );

        $this->add_control(
            'triprex_team_two_heading',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );


        $this->add_control(
            'triprex_team_two_header_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Our Tour Guide'),
                'label_block' => true,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );
        $this->add_control(
            'triprex_team_two_header_sub_title',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.'),
                'label_block' => true,
                'rows'        => 3,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'triprex_team_two_card',
            [
                'label' => esc_html__('Team Card', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_team_two_content_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_team_content_name_two',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mateo Daniel'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_team_two_content_designaton',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tour Guide'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'more_options_two',
            [
                'label' => esc_html__('Social Link', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // start popcover
        $repeater->add_control(
            'popover_toggle_social_two',
            [
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label' => esc_html__('Social Media', 'triprex-core'),
                'label_off' => esc_html('Default'),
                'label_on' => esc_html__('Custom', 'triprex-core'),
                'return_value' => 'yes',
            ]
        );

        $repeater->start_popover();

        $repeater->add_control(
            'website_link_facebook_two',
            [
                'label' => esc_html__('Facebook', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.facebook.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_twitter_two',
            [
                'label' => esc_html__('Twitter', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://twitter.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_pinterest_two',
            [
                'label' => esc_html__('Pinterest', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.pinterest.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_instagram_two',
            [
                'label' => esc_html__('Instagram', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.instagram.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //linkedin Link
        $repeater->add_control(
            'website_link_linkedin_two',
            [
                'label' => esc_html__('Linkedin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //reddit Link
        $repeater->add_control(
            'website_link_reddit_two',
            [
                'label' => esc_html__('Reddit', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //behance Link
        $repeater->add_control(
            'website_link_behance_two',
            [
                'label' => esc_html__('Behance', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //stackoverflow Link
        $repeater->add_control(
            'website_link_stackoverflow_two',
            [
                'label' => esc_html__('Stackoverflow', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->end_popover();


        $this->add_control(
            'triprex_team_list_two',
            [
                'label' => esc_html__('Team Lists', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_team_content_name_two' => esc_html('Mateo Daniel'),
                    ],
                    [
                        'triprex_team_content_name_two' => esc_html('Elias Josiah'),
                    ],
                    [
                        'triprex_team_content_name_two' => esc_html('Miles Jaxon'),
                    ],
                    [
                        'triprex_team_content_name_two' => esc_html('Silas Nicholas'),
                    ],
                ],
                'title_field' => '{{{ triprex_team_content_name_two }}}',
            ]
        );

        $this->end_controls_section();

        //Content Three
        $this->start_controls_section(
            'triprex_team_three_section_genaral',
            [
                'label' => esc_html__('Team Section', 'triprex-core'),
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_three'
                ]

            ]
        );

        $this->add_control(
            'triprex_team_three_heading',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );


        $this->add_control(
            'triprex_team_three_header_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Amazing Tour Guide'),
                'label_block' => true,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );
        $this->add_control(
            'triprex_team_three_header_sub_title',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.'),
                'label_block' => true,
                'rows' => 3,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'triprex_team_three_card',
            [
                'label' => esc_html__('Team Card', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_team_three_content_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_team_content_name_three',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mateo Daniel'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_team_three_content_designaton',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tour Guide'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'more_options_three',
            [
                'label' => esc_html__('Social Link', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // start popcover
        $repeater->add_control(
            'popover_toggle_social_three',
            [
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label' => esc_html__('Social Media', 'triprex-core'),
                'label_off' => esc_html('Default'),
                'label_on' => esc_html__('Custom', 'triprex-core'),
                'return_value' => 'yes',
            ]
        );

        $repeater->start_popover();

        $repeater->add_control(
            'website_link_facebook_three',
            [
                'label' => esc_html__('Facebook', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.facebook.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_twitter_three',
            [
                'label' => esc_html__('Twitter', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://twitter.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_pinterest_three',
            [
                'label' => esc_html__('Pinterest', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.pinterest.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_instagram_three',
            [
                'label' => esc_html__('Instagram', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.instagram.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //linkedin Link
        $repeater->add_control(
            'website_link_linkedin_three',
            [
                'label' => esc_html__('Linkedin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //reddit Link
        $repeater->add_control(
            'website_link_reddit_three',
            [
                'label' => esc_html__('Reddit', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //behance Link
        $repeater->add_control(
            'website_link_behance_three',
            [
                'label' => esc_html__('Behance', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //stackoverflow Link
        $repeater->add_control(
            'website_link_stackoverflow_three',
            [
                'label' => esc_html__('Stackoverflow', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->end_popover();


        $this->add_control(
            'triprex_team_list_three',
            [
                'label' => esc_html__('Team Lists', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_team_content_name_three' => esc_html('Mateo Daniel'),
                    ],
                    [
                        'triprex_team_content_name_three' => esc_html('Elias Josiah'),
                    ],
                    [
                        'triprex_team_content_name_three' => esc_html('Miles Jaxon'),
                    ],
                    [
                        'triprex_team_content_name_three' => esc_html('Silas Nicholas'),
                    ],
                ],
                'title_field' => '{{{ triprex_team_content_name_three }}}',
            ]
        );

        $this->end_controls_section();


        //Content Four
        $this->start_controls_section(
            'triprex_team_four_section_genaral',
            [
                'label' => esc_html__('Team Section', 'triprex-core'),
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_four'
                ]

            ]
        );

        $this->add_control(
            'triprex_team_four_heading',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'triprex_team_four_header_sub_title',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Our Guide'),
                'label_block' => true,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'triprex_team_four_header_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Local Tour Guide'),
                'label_block' => true,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );


        $this->add_control(
            'triprex_team_four_card',
            [
                'label' => esc_html__('Team Card', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_team_four_content_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_team_content_name_four',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mateo Daniel'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_team_four_content_designaton',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tour Guide'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'more_options_four',
            [
                'label' => esc_html__('Social Link', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // start popcover
        $repeater->add_control(
            'popover_toggle_social_four',
            [
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label' => esc_html__('Social Media', 'triprex-core'),
                'label_off' => esc_html('Default'),
                'label_on' => esc_html__('Custom', 'triprex-core'),
                'return_value' => 'yes',
            ]
        );

        $repeater->start_popover();

        $repeater->add_control(
            'website_link_facebook_four',
            [
                'label' => esc_html__('Facebook', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.facebook.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_twitter_four',
            [
                'label' => esc_html__('Twitter', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://twitter.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_pinterest_four',
            [
                'label' => esc_html__('Pinterest', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.pinterest.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_instagram_four',
            [
                'label' => esc_html__('Instagram', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.instagram.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //linkedin Link
        $repeater->add_control(
            'website_link_linkedin_four',
            [
                'label' => esc_html__('Linkedin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //reddit Link
        $repeater->add_control(
            'website_link_reddit_four',
            [
                'label' => esc_html__('Reddit', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //behance Link
        $repeater->add_control(
            'website_link_behance_four',
            [
                'label' => esc_html__('Behance', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //stackoverflow Link
        $repeater->add_control(
            'website_link_stackoverflow_four',
            [
                'label' => esc_html__('Stackoverflow', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->end_popover();


        $this->add_control(
            'triprex_team_list_four',
            [
                'label' => esc_html__('Team Lists', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_team_content_name_four' => esc_html('Mateo Daniel'),
                    ],
                    [
                        'triprex_team_content_name_four' => esc_html('Elias Josiah'),
                    ],
                    [
                        'triprex_team_content_name_four' => esc_html('Miles Jaxon'),
                    ],
                    [
                        'triprex_team_content_name_four' => esc_html('Silas Nicholas'),
                    ],
                ],
                'title_field' => '{{{ triprex_team_content_name_four }}}',
            ]
        );

        $this->end_controls_section();


        //Content Five
        $this->start_controls_section(
            'triprex_team_five_section_genaral',
            [
                'label' => esc_html__('Team Section', 'triprex-core'),
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_five'
                ]

            ]
        );

        $this->add_control(
            'triprex_team_five_heading',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'triprex_team_five_header_sub_title',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Our Guide'),
                'label_block' => true,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'triprex_team_five_header_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html(' Guide For Travelers'),
                'label_block' => true,
                'condition' => [
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]
            ]
        );


        $this->add_control(
            'triprex_team_five_card',
            [
                'label' => esc_html__('Team Card', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_team_five_content_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_team_content_name_five',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mateo Daniel'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_team_five_content_designaton',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tour Guide'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'more_options_five',
            [
                'label' => esc_html__('Social Link', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // start popcover
        $repeater->add_control(
            'popover_toggle_social_five',
            [
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label' => esc_html__('Social Media', 'triprex-core'),
                'label_off' => esc_html('Default'),
                'label_on' => esc_html__('Custom', 'triprex-core'),
                'return_value' => 'yes',
            ]
        );

        $repeater->start_popover();

        $repeater->add_control(
            'website_link_facebook_five',
            [
                'label' => esc_html__('Facebook', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.facebook.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_twitter_five',
            [
                'label' => esc_html__('Twitter', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://twitter.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_pinterest_five',
            [
                'label' => esc_html__('Pinterest', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.pinterest.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'website_link_instagram_five',
            [
                'label' => esc_html__('Instagram', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => 'https://www.instagram.com/',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //linkedin Link
        $repeater->add_control(
            'website_link_linkedin_five',
            [
                'label' => esc_html__('Linkedin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //reddit Link
        $repeater->add_control(
            'website_link_reddit_five',
            [
                'label' => esc_html__('Reddit', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //behance Link
        $repeater->add_control(
            'website_link_behance_five',
            [
                'label' => esc_html__('Behance', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //stackoverflow Link
        $repeater->add_control(
            'website_link_stackoverflow_five',
            [
                'label' => esc_html__('Stackoverflow', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'triprex-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->end_popover();


        $this->add_control(
            'triprex_team_list_five',
            [
                'label' => esc_html__('Team Lists', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_team_content_name_five' => esc_html('Mateo Daniel'),
                    ],
                    [
                        'triprex_team_content_name_five' => esc_html('Elias Josiah'),
                    ],
                    [
                        'triprex_team_content_name_five' => esc_html('Miles Jaxon'),
                    ],
                    [
                        'triprex_team_content_name_five' => esc_html('Silas Nicholas'),
                    ],
                ],
                'title_field' => '{{{ triprex_team_content_name_five }}}',
            ]
        );

        $this->end_controls_section();


        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_style_one_team_content_heading_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_one',
                    'triprex_team_style_layout_variation_selection' => 'slider',
                ],




            ]
        );


        $this->add_control(
            'triprex_style_one_team_content_header_subtitle_style',
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
                'name'     => 'triprex_style_one_team_content_header_subtitle_style_typ',
                'selector' => '{{WRAPPER}} .section-title2 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_style_one_team_content_header_subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_one_team_content_header_subtitle_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_team_content_header_subtitle_style_margin',
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
            'triprex_style_one_team_content_header_subtitle_style_padding',
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
            'triprex_style_one_team_content_header_title_style',
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
                'name'     => 'triprex_style_one_team_content_header_title_style_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );

        $this->add_control(
            'triprex_style_one_team_content_header_title_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_team_content_header_title_style_margin',
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
            'triprex_style_one_team_content_header_title_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_style_one_team_content_style',
            [
                'label' => esc_html__('Team Content', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_one'
                ]

            ]
        );

        $this->add_control(
            'triprex_style_one_team_content_header_name_style',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_team_content_author_name_typ',
                'selector' => '{{WRAPPER}} .teams-card .teams-content h4',

            ]
        );

        $this->add_control(
            'triprex_style_one_team_content_author_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card .teams-content h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_team_content_author_name_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card .teams-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_team_content_author_name_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card .teams-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_one_team_content_disignation_style',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_team_content_author_designation_typ',
                'selector' => '{{WRAPPER}} .teams-card .teams-content span',

            ]
        );

        $this->add_control(
            'triprex_style_one_team_content_author_designation_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card .teams-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_team_content_author_designation_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card .teams-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_team_content_author_designation_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card .teams-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        // =====================Style Two=======================//

        $this->start_controls_section(
            'triprex_style_two_team_content_heading_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_two',
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ],

            ]
        );

        $this->add_control(
            'triprex_style_two_team_content_header_title_style',
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
                'name'     => 'triprex_style_two_team_content_header_title_style_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );

        $this->add_control(
            'triprex_style_two_team_content_header_title_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_team_content_header_title_style_margin',
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
            'triprex_style_two_team_content_header_title_style_padding',
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
            'triprex_style_two_team_content_header_subtitle_style',
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
                'name'     => 'triprex_style_two_team_content_header_subtitle_style_typ',
                'selector' => '{{WRAPPER}} .section-title2 p',

            ]
        );

        $this->add_control(
            'triprex_style_two_team_content_header_subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_style_two_team_content_header_subtitle_style_margin',
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
            'triprex_style_two_team_content_header_subtitle_style_padding',
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
            'triprex_style_two_team_content_team_content_style',
            [
                'label' => esc_html__('Team Content', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_two'
                ],

            ]
        );
        $this->add_control(
            'triprex_style_two_team_content_header_name_style',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_team_content_author_name_typ',
                'selector' => '{{WRAPPER}} .teams-card2 .teams-content h4',

            ]
        );

        $this->add_control(
            'triprex_style_two_team_content_author_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_two_team_content_author_name_hov_color',
            [
                'label'     => esc_html__(' Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2:hover .teams-content h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_team_content_author_name_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_team_content_author_name_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_two_team_content_disignation_style',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_two_team_content_author_designation_typ',
                'selector' => '{{WRAPPER}} .teams-card2 .teams-content span',

            ]
        );

        $this->add_control(
            'triprex_style_two_team_content_author_designation_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_two_team_content_author_designation_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2:hover .teams-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_team_content_author_designation_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_two_team_content_author_designation_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // =====================Style Three =======================//

        $this->start_controls_section(
            'triprex_style_three_team_header_style',
            [
                'label' => esc_html__('Header', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_three',
                    'triprex_team_style_layout_variation_selection' => 'slider'
                ]

            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_header__heading_title_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_header_title_style',
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
                'name'     => 'triprex_style_three_team_content_header_title_style_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_header_title_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_header_title_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_team_content_header_title_style_margin',
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
            'triprex_style_three_team_content_header_title_style_padding',
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
            'triprex_style_three_team_content_header_subtitle_style',
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
                'name'     => 'triprex_style_three_team_content_header_subtitle_style_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_header_subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_team_content_header_subtitle_style_margin',
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
            'triprex_style_three_team_content_header_subtitle_style_padding',
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
            'triprex_style_three_team_content_header_heading_content_style',
            [
                'label' => esc_html__('Content Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_author_name_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2:hover .teams-content' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_style_three_team_content_style',
            [
                'label' => esc_html__('Team Content ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_three',
                ]

            ]
        );


        $this->add_control(
            'triprex_style_three_team_content_header_name_style',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_three_team_content_author_name_typ',
                'selector' => '{{WRAPPER}} .teams-card2 .teams-content h4',

            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_author_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_author_name_hov_color',
            [
                'label'     => esc_html__(' Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2:hover .teams-content h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_team_content_author_name_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_team_content_author_name_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_disignation_style',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_three_team_content_author_designation_typ',
                'selector' => '{{WRAPPER}} .teams-card2 .teams-content span',

            ]
        );

        $this->add_control(
            'triprex_style_three_team_content_author_designation_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_three_team_content_author_designation_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2:hover .teams-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_team_content_author_designation_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_team_content_author_designation_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // =====================Style Four =======================//

        $this->start_controls_section(
            'triprex_style_four_team_heading_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_four',
                    'triprex_team_style_layout_variation_selection' => 'slider'

                ]

            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_header__heading_title_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_style_four_team_content_header_subtitle_style',
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
                'name'     => 'triprex_style_four_team_content_header_subtitle_style_typ',
                'selector' => '{{WRAPPER}} .section-title4 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_header_subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_header_subtitle_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_team_content_header_subtitle_style_margin',
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
            'triprex_style_four_team_content_header_subtitle_style_padding',
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
            'triprex_style_four_team_content_header_title_style',
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
                'name'     => 'triprex_style_four_team_content_header_title_style_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_header_title_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_style_four_team_content_header_title_style_margin',
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
            'triprex_style_four_team_content_header_title_style_padding',
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
            'triprex_style_four_team_content_style',
            [
                'label' => esc_html__('Team Content', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_four'
                ]

            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_header_heading_content_style',
            [
                'label' => esc_html__('Content Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_author_name_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2:hover .teams-content' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_style_four_team_content_header_name_style',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_team_content_author_name_typ',
                'selector' => '{{WRAPPER}} .teams-card2 .teams-content h4',

            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_author_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_author_name_hov_color',
            [
                'label'     => esc_html__(' Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2:hover .teams-content h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_team_content_author_name_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_team_content_author_name_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_disignation_style',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_four_team_content_author_designation_typ',
                'selector' => '{{WRAPPER}} .teams-card2 .teams-content span',

            ]
        );

        $this->add_control(
            'triprex_style_four_team_content_author_designation_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_style_four_team_content_author_designation_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2:hover .teams-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_team_content_author_designation_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_four_team_content_author_designation_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        // =====================Style Five =======================//

        $this->start_controls_section(
            'triprex_style_five_team_heading_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_five',
                    'triprex_team_style_layout_variation_selection' => 'slider'

                ]

            ]
        );

        $this->add_control(
            'triprex_style_five_team_content_header__heading_title_style',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_style_five_team_content_header_subtitle_style',
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
                'name'     => 'triprex_style_five_team_content_header_subtitle_style_typ',
                'selector' => '{{WRAPPER}} .section-title5 span',

            ]
        );

        $this->add_control(
            'triprex_style_five_team_content_header_subtitle_style_color',
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
            'triprex_style_five_team_content_header_subtitle_style_margin',
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
            'triprex_style_five_team_content_header_subtitle_style_padding',
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
            'triprex_style_five_team_content_header_title_style',
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
                'name'     => 'triprex_style_five_team_content_header_title_style_typ',
                'selector' => '{{WRAPPER}} .section-title5 h2',

            ]
        );

        $this->add_control(
            'triprex_style_five_team_content_header_title_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_style_five_team_content_header_title_style_margin',
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
            'triprex_style_five_team_content_header_title_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title5 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_style_five_team_content_style',
            [
                'label' => esc_html__('Team Content', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_team_one_section_genaral_sec_style_selection' => 'style_five',

                ]

            ]
        );
        $this->add_control(
            'triprex_style_five_team_content_header_heading_content_style',
            [
                'label' => esc_html__('Content Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_style_five_team_content_author_name_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2.style-4:hover .teams-content' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_style_five_team_content_header_name_style',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_five_team_content_author_name_typ',
                'selector' => '{{WRAPPER}} .teams-card2 .teams-content h4',

            ]
        );

        $this->add_control(
            'triprex_style_five_team_content_author_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_five_team_content_author_name_hov_color',
            [
                'label'     => esc_html__(' Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2.style-4:hover .teams-content h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_team_content_author_name_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_team_content_author_name_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card2 .teams-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_five_team_content_disignation_style',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_five_team_content_author_designation_typ',
                'selector' => '{{WRAPPER}} .teams-card2 .teams-content span',

            ]
        );

        $this->add_control(
            'triprex_style_five_team_content_author_designation_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_team_content_author_designation_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_team_content_author_designation_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .teams-card2 .teams-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_team_list'];
        $data2 = $settings['triprex_team_list_two'];
        $data3 = $settings['triprex_team_list_three'];
        $data4 = $settings['triprex_team_list_four'];
        $data5 = $settings['triprex_team_list_five'];

?>

        <script>
            var swiper = new Swiper(".teams-card-slider", {
                slidesPerView: 1,
                speed: 1500,
                spaceBetween: 25,
                // autoplay: {
                // 	delay: 2500, // Autoplay duration in milliseconds
                // 	disableOnInteraction: false,
                // },
                navigation: {
                    nextEl: ".teams-card-next",
                    prevEl: ".teams-card-prev",
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

            var swiper = new Swiper(".home5-teams-card-slider", {
                slidesPerView: 1,
                speed: 1500,
                spaceBetween: 25,
                // autoplay: {
                // 	delay: 2500, // Autoplay duration in milliseconds
                // 	disableOnInteraction: false,
                // },
                pagination: {
                    el: ".teams-pagination",
                    clickable: true,
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
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                    1400: {
                        slidesPerView: 3,
                    },
                }
            });
        </script>

        <?php if ($settings['triprex_team_one_section_genaral_sec_style_selection'] == 'style_one') : ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'slider') : ?>
                <div class="teams-section ">
                    <div class="container">
                        <div class="row mb-50">
                            <div class="col-lg-12">
                                <div class="section-title2 text-center">
                                    <?php if (!empty($settings['triprex_team_header_subtitle'])) :   ?>
                                        <div class="eg-section-tag">
                                            <span><?php echo esc_html($settings['triprex_team_header_subtitle']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_team_header_title'])) :   ?>
                                        <h2><?php echo esc_html($settings['triprex_team_header_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="teams-slider-area">
                            <div class="row mb-60">
                                <div class="col-lg-12">
                                    <div class="swiper teams-card-slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($data as  $item) : ?>
                                                <div class="swiper-slide">
                                                    <div class="teams-card">
                                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home2/teams-card-bg.png'); ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                                        <?php if (!empty($item['triprex_team_content_image']['url'])) :   ?>
                                                            <div class="teams-img">
                                                                <img src="<?php echo esc_url($item['triprex_team_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="teams-content">
                                                            <?php if (!empty($item['triprex_team_content_name'])) :   ?>
                                                                <h4><?php echo esc_html($item['triprex_team_content_name']); ?></h4>
                                                                <span><?php echo esc_html($item['triprex_team_content_designaton']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <ul class="social-list">
                                                            <?php if (!empty($item['website_link_facebook']['url'])) :   ?>
                                                                <li><a href="<?php echo esc_url($item['website_link_facebook']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_twitter']['url'])) :   ?>
                                                                <li><a href="<?php echo esc_url($item['website_link_twitter']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_pinterest']['url'])) :   ?>
                                                                <li><a href="<?php echo esc_url($item['website_link_pinterest']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_instagram']['url'])) :   ?>
                                                                <li><a href="<?php echo esc_url($item['website_link_instagram']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_linkedin']['url'])) :   ?>
                                                                <li> <a href="<?php echo esc_url($item['website_link_linkedin']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_behance']['url'])) :   ?>
                                                                <li> <a href="<?php echo esc_url($item['website_link_behance']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_reddit']['url'])) :   ?>
                                                                <li> <a href="<?php echo esc_url($item['website_link_reddit']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_stackoverflow']['url'])) :   ?>
                                                                <li> <a href="<?php echo esc_url($item['website_link_stackoverflow']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                                            <?php endif ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="slide-and-view-btn-grp style-4">
                                        <div class="slider-btn-grp3">
                                            <div class="slider-btn teams-card-prev">
                                                <i class="bi bi-arrow-left"></i>
                                                <span><?php echo esc_html__('PREV', 'triprex-core') ?></span>
                                            </div>
                                            <div class="slider-btn teams-card-next">
                                                <span><?php echo esc_html__('NEXT', 'triprex-core') ?></span>
                                                <i class="bi bi-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'grid') : ?>
                <div class="guide-section">
                    <div class="row g-lg-4 gy-5">
                        <?php foreach ($data as $item) : ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="teams-card">
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home2/teams-card-bg.png'); ?>" alt="<?php echo esc_html__('team-card', 'triprex-core'); ?>">
                                    <?php if (!empty($item['triprex_team_content_image']['url'])) :   ?>
                                        <div class="teams-img">
                                            <img src="<?php echo esc_url($item['triprex_team_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="teams-content">
                                        <?php if (!empty($item['triprex_team_content_name'])) :   ?>
                                            <h4><?php echo esc_html($item['triprex_team_content_name']); ?></h4>
                                            <span><?php echo esc_html($item['triprex_team_content_designaton']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <ul class="social-list">
                                        <?php if (!empty($item['website_link_facebook']['url'])) :   ?>
                                            <li><a href="<?php echo esc_url($item['website_link_facebook']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['website_link_twitter']['url'])) :   ?>
                                            <li><a href="<?php echo esc_url($item['website_link_twitter']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['website_link_pinterest']['url'])) :   ?>
                                            <li><a href="<?php echo esc_url($item['website_link_pinterest']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['website_link_instagram']['url'])) :   ?>
                                            <li><a href="<?php echo esc_url($item['website_link_instagram']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['website_link_linkedin']['url'])) :   ?>
                                            <li> <a href="<?php echo esc_url($item['website_link_linkedin']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['website_link_behance']['url'])) :   ?>
                                            <li> <a href="<?php echo esc_url($item['website_link_behance']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['website_link_reddit']['url'])) :   ?>
                                            <li> <a href="<?php echo esc_url($item['website_link_reddit']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['website_link_stackoverflow']['url'])) :   ?>
                                            <li> <a href="<?php echo esc_url($item['website_link_stackoverflow']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($settings['triprex_team_one_section_genaral_sec_style_selection'] == 'style_two') : ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'slider') : ?>
                <div class="home3-teams-section mb-120">
                    <div class="container">
                        <div class="row mb-50">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div class="section-title2 two ">
                                    <?php if (!empty($settings['triprex_team_two_header_title'])) :   ?>
                                        <h2><?php echo esc_html($settings['triprex_team_two_header_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_team_two_header_sub_title'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_team_two_header_sub_title']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="slider-btn-grp4">
                                    <div class="slider-btn teams-card-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                                            <path d="M15.9512 0.869644C13.5972 7.34699 13.5419 12.9847 15.8404 19.1322C15.9511 19.4021 15.8404 19.7319 15.6188 19.8819C15.3973 20.0618 15.0927 20.0318 14.8988 19.8219C10.1356 14.7839 5.28936 11.7252 0.470783 10.6756C0.193853 10.6157 1.79767e-06 10.3458 1.82127e-06 10.0759C1.84749e-06 9.77599 0.193853 9.50611 0.470783 9.44613C5.26167 8.36657 10.1633 5.24785 15.0096 0.179928C15.1204 0.0599765 15.2588 -1.97214e-06 15.425 -1.95762e-06C15.5358 -1.94793e-06 15.6465 0.0299873 15.7573 0.119951C15.9788 0.26989 16.0619 0.569767 15.9512 0.869644Z" />
                                        </svg>
                                    </div>
                                    <div class="slider-btn teams-card-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                                            <path d="M0.0488516 19.1304C2.40275 12.6531 2.45814 7.01538 0.159624 0.867897C0.0488521 0.598007 0.159624 0.268143 0.381167 0.118204C0.602711 -0.0617224 0.907334 -0.0317344 1.10118 0.17818C5.86437 5.21612 10.7106 8.27486 15.5292 9.32443C15.8061 9.38441 16 9.6543 16 9.92419C16 10.2241 15.8061 10.494 15.5292 10.5539C10.7383 11.6335 5.83668 14.7522 0.990413 19.8201C0.879641 19.9401 0.741176 20.0001 0.575018 20.0001C0.464247 20.0001 0.353474 19.9701 0.242703 19.8801C0.0211589 19.7302 -0.0619202 19.4303 0.0488516 19.1304Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="teams-slider-area">
                            <div class="row mb-60">
                                <div class="col-lg-12">
                                    <div class="swiper teams-card-slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($data2 as  $item) : ?>
                                                <div class="swiper-slide">
                                                    <div class="teams-card2">
                                                        <div class="teams-img">
                                                            <?php if (!empty($item['triprex_team_two_content_image']['url'])) :   ?>
                                                                <img src="<?php echo esc_url($item['triprex_team_two_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                                            <?php endif; ?>
                                                            <ul class="social-list">
                                                                <?php if (!empty($item['website_link_facebook_two']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_facebook_two']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_twitter_two']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_twitter_two']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_pinterest_two']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_pinterest_two']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_instagram_two']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_instagram_two']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_linkedin_two']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_linkedin_two']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_behance_two']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_behance_two']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_reddit_two']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_reddit_two']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_stackoverflow']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_stackoverflow']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                                                <?php endif ?>
                                                            </ul>
                                                        </div>
                                                        <div class="teams-content">
                                                            <?php if (!empty($item['triprex_team_content_name_two'])) :   ?>
                                                                <h4><?php echo esc_html($item['triprex_team_content_name_two']); ?></h4>
                                                                <span><?php echo esc_html($item['triprex_team_two_content_designaton']); ?></span>
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
            <?php endif; ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'grid') : ?>
                <div class="guide-section">
                    <div class="row g-lg-4 gy-5">
                        <?php foreach ($data2 as  $item) : ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="teams-card2">
                                    <div class="teams-img">
                                        <?php if (!empty($item['triprex_team_two_content_image']['url'])) :   ?>
                                            <img src="<?php echo esc_url($item['triprex_team_two_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                        <?php endif; ?>
                                        <ul class="social-list">
                                            <?php if (!empty($item['website_link_facebook_two']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_facebook_two']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_twitter_two']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_twitter_two']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_pinterest_two']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_pinterest_two']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_instagram_two']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_instagram_two']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_linkedin_two']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_linkedin_two']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_behance_two']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_behance_two']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_reddit_two']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_reddit_two']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_stackoverflow']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_stackoverflow']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                    <div class="teams-content">
                                        <?php if (!empty($item['triprex_team_content_name_two'])) :   ?>
                                            <h4><?php echo esc_html($item['triprex_team_content_name_two']); ?></h4>
                                            <span><?php echo esc_html($item['triprex_team_two_content_designaton']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($settings['triprex_team_one_section_genaral_sec_style_selection'] == 'style_three') : ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'slider') : ?>
                <div class="home4-teams-section ">
                    <div class="container">
                        <div class="row mb-40">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div class="section-title3 two">
                                    <?php if (!empty($settings['triprex_team_three_header_title'])) :   ?>
                                        <h2><?php echo esc_html($settings['triprex_team_three_header_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_team_three_header_sub_title'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_team_three_header_sub_title']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="slider-btn-grp5">
                                    <div class="slider-btn teams-card-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                            <path d="M42 7.18797L1.14917 7.18797M6.8649 13L1 7L6.86491 0.999997" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="slider-btn teams-card-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                            <path d="M1 6.81204H41.8508M36.1351 1.00002L42 7.00002L36.1351 13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="teams-slider-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="swiper teams-card-slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($data3 as  $item) : ?>
                                                <div class="swiper-slide">
                                                    <div class="teams-card2 style-2">
                                                        <div class="teams-img">
                                                            <?php if (!empty($item['triprex_team_three_content_image']['url'])) :   ?>
                                                                <img src="<?php echo esc_url($item['triprex_team_three_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                                            <?php endif; ?>
                                                            <ul class="social-list">
                                                                <?php if (!empty($item['website_link_facebook_three']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_facebook_three']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_twitter_three']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_twitter_three']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_pinterest_three']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_pinterest_three']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_instagram_three']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_instagram_three']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_linkedin_three']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_linkedin_three']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_behance_three']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_behance_three']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_reddit_three']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_reddit_three']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_stackoverflow_three']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_stackoverflow_three']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                                                <?php endif ?>
                                                            </ul>
                                                        </div>
                                                        <div class="teams-content">
                                                            <?php if (!empty($item['triprex_team_content_name_three'])) :   ?>
                                                                <h4><?php echo esc_html($item['triprex_team_content_name_three']); ?></h4>
                                                                <span><?php echo esc_html($item['triprex_team_three_content_designaton']); ?></span>
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
            <?php endif; ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'grid') : ?>
                <div class="guide-section">
                    <div class="row g-lg-4 gy-5">
                        <?php foreach ($data3 as  $item) : ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="teams-card2 style-2">
                                    <div class="teams-img">
                                        <?php if (!empty($item['triprex_team_three_content_image']['url'])) :   ?>
                                            <img src="<?php echo esc_url($item['triprex_team_three_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                        <?php endif; ?>
                                        <ul class="social-list">
                                            <?php if (!empty($item['website_link_facebook_three']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_facebook_three']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_twitter_three']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_twitter_three']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_pinterest_three']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_pinterest_three']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_instagram_three']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_instagram_three']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_linkedin_three']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_linkedin_three']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_behance_three']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_behance_three']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_reddit_three']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_reddit_three']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_stackoverflow_three']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_stackoverflow_three']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                    <div class="teams-content">
                                        <?php if (!empty($item['triprex_team_content_name_three'])) :   ?>
                                            <h4><?php echo esc_html($item['triprex_team_content_name_three']); ?></h4>
                                            <span><?php echo esc_html($item['triprex_team_three_content_designaton']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($settings['triprex_team_one_section_genaral_sec_style_selection'] == 'style_four') : ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'slider') : ?>
                <div class="home5-teams-section">
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="section-title4 text-center">
                                <?php if (!empty($settings['triprex_team_four_header_sub_title'])) :   ?>
                                    <div class="eg-section-tag">
                                        <span><?php echo esc_html($settings['triprex_team_four_header_sub_title']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_team_four_header_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['triprex_team_four_header_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="teams-slider-area mb-40">
                        <div class="row mb-60">
                            <div class="col-lg-12">
                                <div class="swiper home5-teams-card-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($data4 as  $item) : ?>
                                            <div class="swiper-slide">
                                                <div class="teams-card2 style-3">
                                                    <div class="teams-img">
                                                        <?php if (!empty($item['triprex_team_four_content_image']['url'])) :   ?>
                                                            <img src="<?php echo esc_url($item['triprex_team_four_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                                        <?php endif; ?>
                                                        <ul class="social-list">
                                                            <?php if (!empty($item['website_link_facebook_four']['url'])) :   ?>
                                                                <li><a href="<?php echo esc_url($item['website_link_facebook_four']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_twitter_four']['url'])) :   ?>
                                                                <li><a href="<?php echo esc_url($item['website_link_twitter_four']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_pinterest_four']['url'])) :   ?>
                                                                <li><a href="<?php echo esc_url($item['website_link_pinterest_four']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_instagram_four']['url'])) :   ?>
                                                                <li><a href="<?php echo esc_url($item['website_link_instagram_four']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_linkedin_four']['url'])) :   ?>
                                                                <li> <a href="<?php echo esc_url($item['website_link_linkedin_four']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_behance_four']['url'])) :   ?>
                                                                <li> <a href="<?php echo esc_url($item['website_link_behance_four']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_reddit_four']['url'])) :   ?>
                                                                <li> <a href="<?php echo esc_url($item['website_link_reddit_four']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['website_link_stackoverflow_four']['url'])) :   ?>
                                                                <li> <a href="<?php echo esc_url($item['website_link_stackoverflow_four']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                                            <?php endif ?>
                                                        </ul>
                                                    </div>
                                                    <div class="teams-content">
                                                        <?php if (!empty($item['triprex_team_content_name_four'])) :   ?>
                                                            <h4><?php echo esc_html($item['triprex_team_content_name_four']); ?></h4>
                                                            <span><?php echo esc_html($item['triprex_team_four_content_designaton']); ?></span>
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
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="teams-pagination-area">
                                <div class="teams-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'grid') : ?>
                <div class="guide-section">
                    <div class="row g-lg-4 gy-5">
                        <?php foreach ($data4 as $item) : ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="teams-card2 style-3">
                                    <div class="teams-img">
                                        <?php if (!empty($item['triprex_team_four_content_image']['url'])) :   ?>
                                            <img src="<?php echo esc_url($item['triprex_team_four_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                        <?php endif; ?>
                                        <ul class="social-list">
                                            <?php if (!empty($item['website_link_facebook_four']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_facebook_four']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_twitter_four']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_twitter_four']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_pinterest_four']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_pinterest_four']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_instagram_four']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_instagram_four']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_linkedin_four']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_linkedin_four']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_behance_four']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_behance_four']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_reddit_four']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_reddit_four']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_stackoverflow_four']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_stackoverflow_four']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                    <div class="teams-content">
                                        <?php if (!empty($item['triprex_team_content_name_four'])) :   ?>
                                            <h4><?php echo esc_html($item['triprex_team_content_name_four']); ?></h4>
                                            <span><?php echo esc_html($item['triprex_team_four_content_designaton']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($settings['triprex_team_one_section_genaral_sec_style_selection'] == 'style_five') : ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'slider') : ?>
                <div class="home6-teams-section ">
                    <div class="container one">
                        <div class="row mb-50">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div class="section-title5">
                                    <?php if (!empty($settings['triprex_team_five_header_sub_title'])) :   ?>
                                        <span>
                                            <?php echo esc_html($settings['triprex_team_five_header_sub_title']); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <g opacity="0.8">
                                                    <path d="M9.06226 11.3626L8.55838 13.7263L6.22997 20.0004L7.61194 19.7701L14.0678 11.3277C14.979 11.296 15.8626 11.2471 16.6304 11.1713C20.1826 10.82 19.9984 10.0002 19.9984 10.0002C19.9984 10.0002 20.1826 9.18031 16.6304 8.829C15.8626 8.7529 14.9789 8.70407 14.0678 8.67261L7.61197 0.229974L6.22997 -6.01907e-07L8.55838 6.27416L9.06226 8.6378C7.87942 8.6555 7.07898 8.68244 7.07898 8.68244C7.07898 8.68244 5.44724 8.7201 2.92253 9.28895L0.864093 6.43364L-0.000128074 6.43364L0.615287 9.90529C0.504522 9.93924 0.504522 10.0611 0.615287 10.0951L-0.000128385 13.5667L0.864093 13.5667L2.92253 10.7117C5.44724 11.2806 7.07898 11.3177 7.07898 11.3177C7.07898 11.3177 7.87942 11.3449 9.06226 11.3626Z" />
                                                    <path d="M13.4102 13.2575L13.4102 14.1895L9.96575 14.1895L9.96575 13.2575L13.4102 13.2575ZM13.4102 5.81414L13.4102 6.7458L9.96595 6.7458L9.96595 5.81414L13.4102 5.81414ZM11.0863 16.385L11.0863 17.3167L7.90291 17.3167L7.90291 16.385L11.0863 16.385ZM11.0863 2.68689L11.0863 3.61885L7.90291 3.61885L7.90291 2.68689L11.0863 2.68689Z" />
                                                </g>
                                            </svg>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_team_five_header_title'])) :   ?>
                                        <h2> <?php echo esc_html($settings['triprex_team_five_header_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="slider-btn-grp two d-md-flex d-none">
                                    <div class="slider-btn teams-card-prev">
                                        <i class="bi bi-arrow-left"></i>
                                    </div>
                                    <div class="slider-btn teams-card-next">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="teams-slider-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="swiper teams-card-slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($data5 as  $item) : ?>
                                                <div class="swiper-slide">
                                                    <div class="teams-card2 style-4">
                                                        <div class="teams-img">
                                                            <?php if (!empty($item['triprex_team_five_content_image']['url'])) :   ?>
                                                                <img src="<?php echo esc_url($item['triprex_team_five_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                                            <?php endif; ?>
                                                            <ul class="social-list">
                                                                <?php if (!empty($item['website_link_facebook_five']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_facebook_five']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_twitter_five']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_twitter_five']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_pinterest_five']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_pinterest_five']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_instagram_five']['url'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($item['website_link_instagram_five']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_linkedin_five']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_linkedin_five']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_behance_five']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_behance_five']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_reddit_five']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_reddit_five']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                                                <?php endif ?>
                                                                <?php if (!empty($item['website_link_stackoverflow_five']['url'])) :   ?>
                                                                    <li> <a href="<?php echo esc_url($item['website_link_stackoverflow_five']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                                                <?php endif ?>
                                                            </ul>
                                                        </div>
                                                        <div class="teams-content">
                                                            <?php if (!empty($item['triprex_team_content_name_five'])) :   ?>
                                                                <h4><?php echo esc_html($item['triprex_team_content_name_five']); ?></h4>
                                                                <span><?php echo esc_html($item['triprex_team_five_content_designaton']); ?></span>
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
            <?php endif; ?>
            <?php if ($settings['triprex_team_style_layout_variation_selection'] == 'grid') : ?>
                <div class="guide-section">
                    <div class="row g-lg-4 gy-5">
                        <?php foreach ($data5 as  $item) : ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="teams-card2 style-4">
                                    <div class="teams-img">
                                        <?php if (!empty($item['triprex_team_five_content_image']['url'])) :   ?>
                                            <img src="<?php echo esc_url($item['triprex_team_five_content_image']['url']) ?>" alt="<?php echo esc_attr__('team-image', 'triprex-core'); ?>">
                                        <?php endif; ?>
                                        <ul class="social-list">
                                            <?php if (!empty($item['website_link_facebook_five']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_facebook_five']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_twitter_five']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_twitter_five']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_pinterest_five']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_pinterest_five']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_instagram_five']['url'])) :   ?>
                                                <li><a href="<?php echo esc_url($item['website_link_instagram_five']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_linkedin_five']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_linkedin_five']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_behance_five']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_behance_five']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_reddit_five']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_reddit_five']['url']) ?>"><i class="bx bxl-reddit"></i></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($item['website_link_stackoverflow_five']['url'])) :   ?>
                                                <li> <a href="<?php echo esc_url($item['website_link_stackoverflow_five']['url']) ?>"><i class="bx bxl-stack-overflow"></i></a></li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                    <div class="teams-content">
                                        <?php if (!empty($item['triprex_team_content_name_five'])) :   ?>
                                            <h4><?php echo esc_html($item['triprex_team_content_name_five']); ?></h4>
                                            <span><?php echo esc_html($item['triprex_team_five_content_designaton']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Team_Widget());
