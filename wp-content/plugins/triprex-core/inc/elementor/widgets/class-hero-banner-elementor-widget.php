<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Triprex_Hero_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_hero_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner', 'triprex-core');
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
            'triprex_hero_banner_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_hero_banner_section_style_selection',
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
            'triprex_hero_banner_five_section_marque_text',
            [
                'label' => esc_html__('Running Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Life Is Unpredictable, And We Understand That Plans Might Change. Enjoy Flexible Booking Options, So You Can Reschedule Or Modify Your Trip With Ease.'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_five',
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book A Trip'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_five',
                ]
            ]
        );


        $this->add_control(
            'triprex_hero_banner_five_query_area',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_five',
                ]

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_query_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_query_template_order_by',
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
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_query_post_list',
            [
                'label'         => esc_html__('All Post Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_tours_post_options(),
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_query_templete_order',
            [
                'label'   => esc_html__('Order', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'triprex-core'),
                    'desc' => esc_html__('Descending', 'triprex-core')
                ],
                'default' => 'desc',
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_five'
                ]
            ]
        );

        //style six content

        $this->add_control(
            'triprex_hero_banner_six_custom_select',
            [
                'label'   => esc_html__('Select Post Type', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'tours' => esc_html__('Tours', 'triprex-core'),
                    'destinations' => esc_html__('Destinations', 'triprex-core'),

                ],
                'default' => 'tours',
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six'
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book A Trip'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'tours',
                ],
            ]
        );


        $this->add_control(
            'triprex_hero_banner_six_section_btn_destination_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Explore More'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'destinations',
                ],

            ]
        );


        $this->add_control(
            'triprex_hero_banner_six_query_area',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'tours',
                ],

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_query_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'tours',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_query_template_order_by',
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
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'tours',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_query_post_list',
            [
                'label'         => esc_html__('All Post Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_tours_post_options(),
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'tours',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_query_templete_order',
            [
                'label'   => esc_html__('Order', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'triprex-core'),
                    'desc' => esc_html__('Descending', 'triprex-core')
                ],
                'default' => 'desc',
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'tours',
                ],
            ]
        );

        //destination part

        $this->add_control(
            'triprex_hero_banner_six_query_destination_area',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'destinations',
                ],

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_query_destination_area_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'destinations',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_query_destination_area_odrderby',
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
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'destinations',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_query_destination_post_list',
            [
                'label'         => esc_html__('All Post Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_destination_post_options(),
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'destinations',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_query_destination_area_order',
            [
                'label'   => esc_html__('Order', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'triprex-core'),
                    'desc' => esc_html__('Descending', 'triprex-core')

                ],
                'default' => 'desc',
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'destinations',
                ],
            ]
        );

        $this->end_controls_section();

        //Content One
        $this->start_controls_section(
            'triprex_hero_banner_one_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_one',
                ]
            ]
        );
        $this->add_control(
            'triprex_hero_banner_shortcode_switch',
            [
                'label' => esc_html__('Show Filter', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'triprex_hero_banner_shortcode',
            [
                'label' => esc_html__('Add Filter Shortcode Here', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => "[egns_custom_post_filter]",
                'placeholder' => esc_html__('Type your filter shortcode here', 'triprex-core'),
                'condition' => [
                    'triprex_hero_banner_shortcode_switch' => 'yes',
                    'triprex_hero_banner_section_style_selection' => 'style_one',
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_hero_banner_one_section_bg_image',
            [
                'label' => esc_html__('Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_one_tag_title_icon',
            [
                'label' => esc_html__('Tag Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_one_tag_title',
            [
                'label' => esc_html__('Tag Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('United States'),
                'placeholder' => esc_html__('Type your tag title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_one_title_section_sec',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Lets trek and venture to a spot.'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_one_content_section_sec',
            [
                'label' => esc_html__(' Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Life is unpredictable, and we understand that plans might change. Enjoy flexible booking options, so you can reschedule or modify your trip with ease.'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );



        $repeater->add_control(
            'triprex_hero_banner_one_section_sec_btn_sec',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_one_section_sec_btn_sec_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book A Trip'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_one_section_sec_btn_sec_btn_text_url',
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
            'triprex_hero_banner_one_section_rating_area_sec',
            [
                'label' => esc_html__('Review Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_one_section_rating_area_sec_icon',
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
            'triprex_hero_banner_one_section_rating_area_logo',
            [
                'label' => esc_html__('Text Logo', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );


        $repeater->add_control(
            'triprex_hero_banner_one_section_review_star',
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

        $repeater->add_control(
            'triprex_hero_banner_one_section_review_number',
            [
                'label' => esc_html__('Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('/5.0', 'triprex-core'),
                'placeholder' => esc_html__('Type your review number here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'triprex_hero_banner_one_section_sec_review_link',
            [
                'label' => esc_html__('Review Link', 'triprex-core'),
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
            'triprex_hero_banner_one_section_list',
            [
                'label' => esc_html__('Slider List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_hero_banner_one_title_section_sec' => esc_html('Lets trek and venture to a spot.'),
                    ],

                ],
                'title_field' => '{{{ triprex_hero_banner_one_title_section_sec  }}}',
            ]
        );


        $this->end_controls_section();

        //Content Two

        $this->start_controls_section(
            'triprex_hero_banner_two_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_shortcode_two_switch',
            [
                'label' => esc_html__('Show Filter', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'triprex_hero_banner_shortcode_two',
            [
                'label' => esc_html__('Add Filter Shortcode Here', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => "[egns_custom_post_filter]",
                'placeholder' => esc_html__('Type your filter shortcode here', 'triprex-core'),
                'condition' => [
                    'triprex_hero_banner_shortcode_two_switch' => 'yes',
                    'triprex_hero_banner_section_style_selection' => 'style_two',
                ]
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_hero_banner_two_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_section_list',
            [
                'label' => esc_html__('Repeater List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_heading',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_tag_title',
            [
                'label' => esc_html__('Tag Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('United States'),
                'placeholder' => esc_html__('Type your tag title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_title_one',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Let’s Explore Your'),
                'placeholder' => esc_html__('Type your  title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_title_dynamic_text',
            [
                'label' => esc_html__('Title Animated Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Holiday'),
                'placeholder' => esc_html__('Type your animated texts here', 'triprex-core'),
                'label_block' => true,
                'description' => esc_html__('Enter A List Of Animated Text Separated By Line Breaks.', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_title_two',
            [
                'label' => esc_html__('Title Remaining Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Trip.'),
                'placeholder' => esc_html__('Type your title remaining text here', 'triprex-core'),
                'label_block' => true,
            ]
        );





        $this->add_control(
            'triprex_hero_banner_two_contact_area',
            [
                'label' => esc_html__('Contact Area ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_contact_area_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_contact_area_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('To More Inquiry'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_contact_area_number',
            [
                'label' => esc_html__('Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('+990-737 621 432'),
                'placeholder' => esc_html__('Type your number here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_hero_banner_two_section_rating_area_sec',
            [
                'label' => esc_html__('Review Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'triprex_hero_banner_two_section_rating_area_sec_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_two_section_rating_area_logo',
            [
                'label' => esc_html__('Text Logo', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_two_section_review_star',
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
            'triprex_hero_banner_two_section_review_number',
            [
                'label' => esc_html__('Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('/5.0', 'triprex-core'),
                'placeholder' => esc_html__('Type your review number here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_hero_banner_two_section_review_review_link',
            [
                'label' => esc_html__('Review Link', 'triprex-core'),
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

        //Content Three

        $this->start_controls_section(
            'triprex_hero_banner__section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_shortcode_three_switch',
            [
                'label' => esc_html__('Show Filter', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'triprex_hero_banner_shortcode_three',
            [
                'label' => esc_html__('Add Filter Shortcode Here', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => "[egns_custom_post_filter]",
                'placeholder' => esc_html__('Type your filter shortcode here', 'triprex-core'),
                'condition' => [
                    'triprex_hero_banner_shortcode_three_switch' => 'yes',
                    'triprex_hero_banner_section_style_selection' => 'style_three',
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_hero_banner_three_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_three_section_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('New York'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_three_section_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => wp_kses('Find Your Next <span>Holiday Cool</span>  Packages !', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_three_button_section',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_three_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book A Trip'),
                'placeholder' => esc_html__('Type your Button text here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'triprex_hero_banner_three_button_text_url',
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
            'triprex_hero_banner_three_video_button_section',
            [
                'label' => esc_html__(' Video Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_hero_banner_three_video_button_section_style_design',
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
            'triprex_hero_banner_three_video_button_section_upload_video',
            [
                'label' => esc_html__('Choose Video', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition' => [
                    'triprex_hero_banner_three_video_button_section_style_design' => 'file'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],


            ]
        );


        $repeater->add_control(
            'triprex_hero_banner_three_video_button_section_style_url',
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
                    'triprex_hero_banner_three_video_button_section_style_design' => 'link'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_activites_two_tab_content_bottom_video_btn_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Watch Culture'),
                'placeholder' => esc_html__('Type your video text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_hero_banner_three_section_list',
            [
                'label' => esc_html__('Banner Item List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_hero_banner_three_button_text' => esc_html('Book A Trip'),
                    ],

                ],
                'title_field' => '{{{ triprex_hero_banner_three_button_text  }}}',
            ]
        );


        $this->end_controls_section();

        //Content Four

        $this->start_controls_section(
            'triprex_hero_banner_four_section',
            [
                'label' => esc_html__(' Banner Section', 'triprex-core'),
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_control(
            'triprex_hero_banner_four_section_bg_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Lets Travel And Explore Destination.'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Life Is Unpredictable, And We Understand That Plans Might Change. Enjoy Flexible Booking Options, So You Can Reschedule Or Modify Your Trip With Ease.'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_slider_image_section',
            [
                'label' => esc_html__('Slider Image ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_hero_banner_four_slide_image',
            [
                'label' => esc_html__('Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_slide_image_list',
            [
                'label' => esc_html__('Image List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_hero_banner_four_slide_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
            ]
        );


        $this->add_control(
            'triprex_hero_banner_four_filter_section',
            [
                'label' => esc_html__('Filter ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_hero_banner_four_filter_enable_disbale_sec',
            [
                'label' => esc_html__("Filter Enable", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'triprex_hero_banner_shortcode_four',
            [
                'label' => esc_html__('Add Filter Shortcode Here', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => "[egns_custom_post_filter]",
                'placeholder' => esc_html__('Type your filter shortcode here', 'triprex-core'),
                'condition' => [
                    'triprex_hero_banner_four_filter_enable_disbale_sec' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'triprex_hero_banner_four_social_icon_sec',
            [
                'label' => esc_html__('Social Media', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_hero_banner_four_social_icon_sec_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'bx bxl-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'triprex_hero_banner_four_social_icon_sec_icon_url',
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

        $this->add_control(
            'triprex_hero_banner_four_social_icon_sec_icon_list',
            [
                'label' => esc_html__('Social Media List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_hero_banner_four_social_icon_sec_icon' => 'bx bxl-facebook',
                        'library' => 'solid',
                    ],
                ],
                'title_field' => esc_html__('Icon & Link', 'triprex-core'),
            ]
        );


        $this->end_controls_section();

        // =====================Style One  =======================//

        //General Section

        $this->start_controls_section(
            'triprex_hero_banner_section_style_one_general_section_style',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_section_style_general_section_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-area ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_section_style_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-banner-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Hero Banner Section
        $this->start_controls_section(
            'triprex_hero_banner_one_section_sec_style_sec',
            [
                'label' => esc_html__('Hero Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_subtitle_style_sec_sec',
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
                'name'     => 'triprex_hero_banner_one_section_sec_subtitle_style_sec_typ',
                'selector' => '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content .eg-tag span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_subtitle_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-area .home1-banner-wrapper .home1-banner-content .eg-tag span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_subtitle_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-area .home1-banner-wrapper .home1-banner-content .eg-tag' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_one_section_sec_style_sec_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content .eg-tag span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_one_section_sec_style_sec_subtitle_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content .eg-tag span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_title_style_sec_sec',
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
                'name'     => 'triprex_hero_banner_one_section_sec_title_style_sec_typ',
                'selector' => '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content h1, .home1-banner-area .home1-banner-wrapper .home1-banner-content h2',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-area .home1-banner-wrapper .home1-banner-content h1, .home1-banner-area .home1-banner-wrapper .home1-banner-content h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_one_section_sec_style_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content h1, .home1-banner-area .home1-banner-wrapper .home1-banner-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_one_section_sec_style_sec_title_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content h1, .home1-banner-area .home1-banner-wrapper .home1-banner-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Content
        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_sec_content_sec_sec',
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
                'name'     => 'triprex_hero_banner_one_section_sec_style_sec_content_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content p',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_sec_content_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_one_section_sec_style_sec_content_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_one_section_sec_style_sec_content_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //Button
        $this->add_control(
            'triprex_hero_banner_one_section_sec_button_sec',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_hero_banner_one_section_sec_button_sec_tabs'
        );

        $this->start_controls_tab(
            'triprex_hero_banner_one_section_sec_button_sec_normal_tab',
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
                'name'     => 'triprex_hero_banner_one_section_sec_button_sec_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );
        $this->add_control(
            'triprex_hero_banner_one_section_sec_button_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1 ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_button_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_one_section_sec_button_sec_margin',
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
            'triprex_hero_banner_one_section_sec_button_sec_padding',
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

        $this->add_control(
            'triprex_hero_banner_one_section_sec_button_sec_border_radius',
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
                    '{{WRAPPER}} .primary-btn1' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_hero_banner_one_section_sec_button_sec_button_tab',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_button_sec_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_button_sec_background_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        // Total Review
        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_sec_total_review_sec_sec',
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
                'name'     => 'triprex_hero_banner_one_section_sec_style_sec_total_review_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content .banner-content-bottom .rating-area .content .rating span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_sec_total_review_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content .banner-content-bottom .rating-area .content .rating span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_sec_total_review_sec_sec_review_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-area .home1-banner-wrapper .home1-banner-content .banner-content-bottom .rating-area .content .rating ul li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Pagination
        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_pagination_sec',
            [
                'label' => esc_html__('Pagination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_one_section_sec_style_sec_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_sec_pagination_typ_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_sec_pagination_typ_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_one_section_sec_style_sec_pagination_typ_border_color',
            [
                'label'     => esc_html__('Border Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        // =====================Style Two  =======================//

        //General Section

        $this->start_controls_section(
            'triprex_hero_banner_section_style_two_general_section_style',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_section_style_general_two__section_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_section_style_general_two_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-banner-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //////////////////////////////Style Two///////////////////////////////////

        //Hero Banner Section
        $this->start_controls_section(
            'triprex_hero_banner_two_section_sec_style_sec',
            [
                'label' => esc_html__('Hero Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_sec_sec',
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
                'name'     => 'triprex_hero_banner_two_section_sec_title_style_sec_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home2-banner-area .home2-banner-content-wrap .home2-banner-content h1',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_sec_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-banner-area .home2-banner-content-wrap .home2-banner-content h1' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_sec_sec_sec_span_color',
            [
                'label'     => esc_html__('Animated Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-banner-area .home2-banner-content-wrap .home2-banner-content h1 span' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .home2-banner-area .home2-banner-content-wrap .home2-banner-content h1 span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_two_section_sec_title_style_sec_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-area .home2-banner-content-wrap .home2-banner-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_two_section_sec_title_style_sec_sec_title_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-banner-area .home2-banner-content-wrap .home2-banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_sec',
            [
                'label' => esc_html__('Contact Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_title_sec',
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
                'name'     => 'triprex_hero_banner_two_section_sec_title_style_contact_sec_title_sec_typ',
                'selector' => '{{WRAPPER}} .home2-banner-area .home2-banner-content-wrap .home2-banner-content .banner-content-bottom .hotline-area .content span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-banner-area .home2-banner-content-wrap .home2-banner-content .banner-content-bottom .hotline-area .content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_title_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-area .home2-banner-content-wrap .home2-banner-content .banner-content-bottom .hotline-area .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_title_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-banner-area .home2-banner-content-wrap .home2-banner-content .banner-content-bottom .hotline-area .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_num_sec',
            [
                'label' => esc_html__('Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_two_section_sec_title_style_contact_sec_num_sec_typ',
                'selector' => '{{WRAPPER}} .home2-banner-area .home2-banner-content-wrap .home2-banner-content .banner-content-bottom .hotline-area .content h6 a',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_num_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-banner-area .home2-banner-content-wrap .home2-banner-content .banner-content-bottom .hotline-area .content h6 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_num_sec_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-banner-area .home2-banner-content-wrap .home2-banner-content .banner-content-bottom .hotline-area .content h6 a:hover' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_total_review_sec',
            [
                'label' => esc_html__('Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_two_section_sec_title_style_contact_sec_total_review_sec_typ',
                'selector' => '{{WRAPPER}} .home2-banner-area .home2-banner-content-wrap .home2-banner-content .banner-content-bottom .rating-area .content .rating span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_two_section_sec_title_style_contact_sec_total_review_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-banner-area .home2-banner-content-wrap .home2-banner-content .banner-content-bottom .rating-area .content .rating span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //////////////////////////////Style Three///////////////////////////////////

        //Hero Banner Section
        $this->start_controls_section(
            'triprex_hero_banner_three_section_sec_style_sec',
            [
                'label' => esc_html__('Hero Banner Section ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_three_section_sec_subtitle_style_sec_sec',
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
                'name'     => 'triprex_hero_banner_three_section_sec_subtitle_style_sec_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .eg-tag span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_three_section_sec_subtitle_style_sec_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .eg-tag span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_three_section_sec_subtitle_style_sec_sec_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .eg-tag ' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_three_section_sec_subtitle_style_sec_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .eg-tag span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_three_section_sec_subtitle_style_sec_sec_title_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .eg-tag span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_three_section_sec_title_style_sec_sec',
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
                'name'     => 'triprex_hero_banner_three_section_sec_title_style_sec_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h1, .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h2',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_three_section_sec_title_style_sec_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h1, .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_three_section_sec_title_style_sec_sec_sec_span_color',
            [
                'label'     => esc_html__('Span Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h1 span, .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h2 span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_three_section_sec_title_style_sec_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h1, .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_three_section_sec_title_style_sec_sec_title_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h1, .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Button 
        $this->add_control(
            'triprex_hero_banner_three_section_btn_style',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_hero_banner_three_section_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_hero_banner_three_section_btn_style_normal_tab',
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
                'name'     => 'triprex_hero_banner_three_section_btn_style_typ',
                'selector' => '{{WRAPPER}}  .primary-btn4 span',

            ]
        );
        $this->add_control(
            'triprex_hero_banner_three_section_btn_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn4 span' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .primary-btn4 span  svg' => 'fill: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_three_section_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn4 span' => 'background: {{VALUE}};',

                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_three_section_btn_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn4 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_three_section_btn_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn4 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'triprex_hero_banner_three_section_btn_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_hero_banner_three_section_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4 span:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_three_section_btn_style_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4 span:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn4 span:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        //  Video Button 
        $this->add_control(
            'triprex_hero_banner_three_video_btn_style',
            [
                'label' => esc_html__('Video Play Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_three_video_btn_style_style_typ',
                'selector' => '{{WRAPPER}} .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .banner-content-bottom .video-area h6',

            ]
        );
        $this->add_control(
            'triprex_hero_banner_three_video_btn_style_btn_style_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .banner-content-bottom .video-area h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_three_video_btn_style_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .banner-content-bottom .video-area .icon i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_three_video_btn_style_style_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'triprex-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}}  .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .banner-content-bottom .video-area h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_three_video_btn_style_style_padding',
            [
                'label'      => __(
                    'Padding',
                    'triprex-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-banner-area .home3-banner-wrapper .home3-banner-content-wrap .home3-banner-content .banner-content-bottom .video-area h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //////////////////////////////Style Four///////////////////////////////////

        //Hero Banner Section
        $this->start_controls_section(
            'triprex_hero_banner_four_section_sec_style_sec',
            [
                'label' => esc_html__(' Banner  Style ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_sec_title_style_sec_sec',
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
                'name'     => 'triprex_hero_banner_four_section_sec_title_style_sec_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-content-wrap .banner-content h1',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_sec_title_style_sec_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-content-wrap .banner-content h1' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_four_section_sec_title_style_sec_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-content-wrap .banner-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_four_section_sec_title_style_sec_sec_title_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-content-wrap .banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_sec_content_style_sec_sec',
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
                'name'     => 'triprex_hero_banner_four_section_sec_content_style_sec_sec_typ',
                'selector' => '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-content-wrap .banner-content p',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_sec_content_style_sec_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-content-wrap .banner-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_hero_banner_four_section_sec_content_style_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-content-wrap .banner-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_four_section_sec_content_style_sec_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-content-wrap .banner-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Icon
        $this->add_control(
            'triprex_hero_banner_four_section_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .social-list li a i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .social-list li a svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_icon_hover_color',
            [
                'label' => esc_html__('Hover Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .social-list li:hover a i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .social-list li:hover a  svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_icon_svg_size',
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
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .social-list li a svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .social-list li a i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_hero_banner_four_section_style_sec_pagination',
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
                'name'     => 'triprex_hero_banner_four_section_style_sec_pagination_typ',
                'selector' => '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-slider-btn-area .banner-slider-btn-grp .slider-btn',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_style_sec_pagination_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-slider-btn-area .banner-slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_style_sec_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-slider-btn-area .banner-slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_four_section_style_sec_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-area .banner-wrapper .banner-slider-btn-area .banner-slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style-5

        //Hero Banner Section
        $this->start_controls_section(
            'triprex_hero_banner_five_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Style ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_runing_text',
            [
                'label' => esc_html__('Running Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_runing_text_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .scroll-text h2',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_runing_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .scroll-text h2' => '-webkit-text-stroke: 1px {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_batch',
            [
                'label' => esc_html__('Tour Batch', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_tour_batch_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .batch > span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_batch_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .batch > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_batch_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .batch > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_category',
            [
                'label' => esc_html__('Tour Category', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_tour_category_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .batch .packcage-name span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_category_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .batch .packcage-name span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_category_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .batch .packcage-name svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_category_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .batch .packcage-name' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_tour_title_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card h4',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_review',
            [
                'label' => esc_html__('Review Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_tour_review_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .rating-and-date .rating-area span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_review_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .rating-and-date .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_review_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .rating-and-date .rating-area .rating li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_duration',
            [
                'label' => esc_html__('Tour Duration Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_tour_duration_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .rating-and-date .date span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_duration_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .rating-and-date .date span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_tour_duration_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .rating-and-date .date svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing',
            [
                'label' => esc_html__('Pricing Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing_sec_title',
            [
                'label' => esc_html__('Pricing Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_pricing_sec_title_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing_sec_regular_price',
            [
                'label' => esc_html__('Sale Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_pricing_sec_regular_price_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area h4',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing_sec_regular_price_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing_sec_regular_price_doller_color',
            [
                'label'     => esc_html__('Pricing Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area h4 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing_sec_sale_price',
            [
                'label' => esc_html__('Regular Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_pricing_sec_sale_price_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area h4 del',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing_sec_sale_price_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area h4 del' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing_sec_tax_style',
            [
                'label' => esc_html__('Tax Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_five_section_style_sec_pricing_sec_tax_style_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_pricing_sec_tax_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area p' => 'color: {{VALUE}};',
                ],
            ]
        );


        // Button 
        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_button_area',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_hero_banner_five_section_style_sec_button_area_tabs'
        );

        $this->start_controls_tab(
            'triprex_hero_banner_five_section_style_sec_button_area_normal_tab',
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
                'name'     => 'triprex_hero_banner_five_section_style_sec_button_area_normal_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn5 span',

            ]
        );
        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_button_area_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn5 span' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .primary-btn5 svg' => 'fill: {{VALUE}};',


                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_button_area_normal_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_five_section_style_sec_button_area_normal_tab_margin',
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
            'triprex_hero_banner_five_section_style_sec_button_area_normal_tab_padding',
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
            'triprex_hero_banner_five_section_style_sec_button_area_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_button_area_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_five_section_style_sec_button_area_hover_text_color',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn5:hover span svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //style-6

        //Hero Banner Section
        $this->start_controls_section(
            'triprex_hero_banner_six_section_sec_style_sec',
            [
                'label' => esc_html__('Banner Style ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'tours',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_batch',
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
                'name'     => 'triprex_hero_banner_six_section_sec_style_sec_batch_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-wrapper .banner-price-card .banner-price-card-bottom .price-area p',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_batch_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .batch > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_batch_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .batch > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_tour_category',
            [
                'label' => esc_html__('Tour Category', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_six_section_sec_style_sec_tour_category_typ',
                'selector' => '{{WRAPPER}} .package-card5 .card-content-wrapper .batch .packcage-name span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_tour_category_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .batch .packcage-name span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_tour_category_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .batch .packcage-name svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_tour_category_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .batch .packcage-name' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_title',
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
                'name'     => 'triprex_hero_banner_six_section_sec_style_sec_title_typ',
                'selector' => '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content h3 a',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_review',
            [
                'label' => esc_html__('Review Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_six_section_sec_style_sec_review_typ',
                'selector' => '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .rating-and-date .rating-area span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_review_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .rating-and-date .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_review_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .rating-and-date .rating-area .rating li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_tour_duration',
            [
                'label' => esc_html__('Tour Duration Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_six_section_sec_style_sec_tour_duration_typ',
                'selector' => '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .rating-and-date .date span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_tour_duration_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .rating-and-date .date span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_tour_duration_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .rating-and-date .date svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_price_tour',
            [
                'label' => esc_html__('Pricing Style', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_price_title',
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
                'name'     => 'triprex_hero_banner_six_section_sec_style_sec_price_title_typ',
                'selector' => '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .card-content-bottom .price-area span',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_price_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .card-content-bottom .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_price_sale',
            [
                'label' => esc_html__('Sale Price', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_six_section_sec_style_sec_price_sale_typ',
                'selector' => '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_price_sale_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .card-content-bottom .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_price_text',
            [
                'label' => esc_html__('Tax Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_six_section_sec_style_sec_price_text_typ',
                'selector' => '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .card-content-bottom .price-area h6',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_price_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5 .card-content-wrapper .package-card-content .card-content-bottom .price-area h6' => 'color: {{VALUE}};',
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
            'triprex_tour_package_content_btn_style_two_tour_button_tab'
        );

        $this->start_controls_tab(
            'triprex_tour_package_content_btn_style_two_tour_button_normal_tab',
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
                'name'     => 'triprex_tour_package_content_btn_style_two_tour_button_normal_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );
        $this->add_control(
            'triprex_tour_package_content_btn_style_two_tour_button_normal_tab_color',
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
            'triprex_tour_package_content_btn_style_two_tour_button_normal_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn2' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_tour_package_content_btn_style_two_tour_button_normal_tab_margin',
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
            'triprex_tour_package_content_btn_style_two_tour_button_normal_tab_padding',
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
            'triprex_tour_package_content_btn_style_two_tour_button_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_btn_style_two_tour_button_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_package_content_btn_style_two_tour_button_hover_text_color',
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

        //style-6

        //Hero Banner Section
        $this->start_controls_section(
            'triprex_hero_banner_six_section_style_destination_sec_two',
            [
                'label' => esc_html__('Banner Style ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six',
                    'triprex_hero_banner_six_custom_select' => 'destinations',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_style_destination_sec',
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
                'name'     => 'triprex_hero_banner_six_section_style_destination_sec_typ',
                'selector' => '{{WRAPPER}} .package-card5.destination .card-content-wrapper .package-card-content h1, .package-card5.destination .card-content-wrapper .package-card-content h2',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_style_destination_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5.destination .card-content-wrapper .package-card-content h1, .package-card5.destination .card-content-wrapper .package-card-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_style_destination_sec_content',
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
                'name'     => 'triprex_hero_banner_six_section_style_destination_sec_content_typ',
                'selector' => '{{WRAPPER}} .package-card5.destination .card-content-wrapper .package-card-content p',

            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_style_destination_sec_content_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card5.destination .card-content-wrapper .package-card-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_style_destination_sec_button',
            [
                'label' => esc_html__('Button', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'triprex_hero_banner_six_section_style_destination_sec_button_tab'
        );

        $this->start_controls_tab(
            'triprex_hero_banner_six_section_style_destination_sec_button_normal_tab',
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
                'name'     => 'triprex_hero_banner_six_section_style_destination_sec_button_normal_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',
            ]
        );
        $this->add_control(
            'triprex_hero_banner_six_section_style_destination_sec_button_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_hero_banner_six_section_style_destination_sec_button_normal_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn1' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_hero_banner_six_section_style_destination_sec_button_normal_tab_margin',
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
            'triprex_hero_banner_six_section_style_destination_sec_button_normal_tab_padding',
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
            'triprex_hero_banner_six_section_style_destination_sec_button_hover',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_style_destination_sec_button_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_style_destination_sec_button_hover_text_color',
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

        //pagination style 6

        $this->start_controls_section(
            'triprex_hero_banner_six_section_sec_style_sec_pagination',
            [
                'label' => esc_html__('Pagination Style ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_hero_banner_section_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_hero_banner_six_section_sec_style_sec_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp6 .slider-btn span',
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_pagination_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp6 .slider-btn span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .slider-btn-grp6 .slider-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_hero_banner_six_section_sec_style_sec_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp6 .slider-btn:hover span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .slider-btn-grp6 .slider-btn:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_hero_banner_one_section_list'];
        $data2 = $settings['triprex_hero_banner_two_section_list'];
        $data3 = $settings['triprex_hero_banner_three_section_list'];
        $data4 = $settings['triprex_hero_banner_four_social_icon_sec_icon_list'];
        $data5 = $settings['triprex_hero_banner_four_slide_image_list'];

        $selected_post_ids = $settings['triprex_hero_banner_five_query_post_list'];
        $args = array(
            'post_type'      => 'tours',
            'posts_per_page' => $settings['triprex_hero_banner_five_query_post_per_page'],
            'orderby'        => $settings['triprex_hero_banner_five_query_template_order_by'],
            'order'          => $settings['triprex_hero_banner_five_query_templete_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }

        $selected_post_ids2 = $settings['triprex_hero_banner_six_query_post_list'];
        $args2 = array(
            'post_type'      => 'tours',
            'posts_per_page' => $settings['triprex_hero_banner_six_query_post_per_page'],
            'orderby'        => $settings['triprex_hero_banner_six_query_template_order_by'],
            'order'          => $settings['triprex_hero_banner_six_query_templete_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_post_ids2)) {
            $args2['post__in'] = $selected_post_ids2;
        }

        $query = new \WP_Query($args);

        $query2 = new \WP_Query($args2);

        //destination
        $selected_destination_post_ids = $settings['triprex_hero_banner_six_query_destination_post_list'];

        $args3 = array(
            'post_type'      => 'destination',
            'posts_per_page' => $settings['triprex_hero_banner_six_query_destination_area_per_page'],
            'orderby'        => $settings['triprex_hero_banner_six_query_destination_area_odrderby'],
            'order'          => $settings['triprex_hero_banner_six_query_destination_area_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_destination_post_ids)) {
            $args3['post__in'] = $selected_destination_post_ids;
        }

        $query3 = new \WP_Query($args3);
?>
        <?php if (is_admin()) : ?>
            <script>
                //home1-banner-slider
                var swiper = new Swiper(".home1-banner-slider", {
                    slidesPerView: 1,
                    speed: 2500,
                    spaceBetween: 25,
                    effect: 'fade', // Use the fade effect
                    fadeEffect: {
                        crossFade: true, // Enable cross-fade transition
                    },
                    autoplay: {
                        delay: 3000, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".home1-banner-next",
                        prevEl: ".home1-banner-prev",
                    },
                });

                var swiper = new Swiper(".home3-banner-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    effect: 'fade',
                    loop: true,
                    fadeEffect: {
                        crossFade: true, // Enable cross-fade transition
                    },
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".progress-pagination",
                        type: "progressbar",
                    },
                    navigation: {
                        nextEl: ".home3-banner-next",
                        prevEl: ".home3-banner-prev",
                    },
                });

                var swiper = new Swiper(".home4-banner-img-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    effect: 'fade',
                    loop: true,
                    fadeEffect: {
                        crossFade: true, // Enable cross-fade transition
                    },
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".home4-banner-next",
                        prevEl: ".home4-banner-prev",
                    },
                });

                var swiper = new Swiper(".home5-banner-slider", {
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
                    navigation: {
                        nextEl: ".home5-banner-next",
                        prevEl: ".home5-banner-prev",
                    },
                });
                var swiper = new Swiper(".home6-banner-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 30,
                    autoplay: {
                        delay: 3000, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".home6-banner-slider-next",
                        prevEl: ".home6-banner-slider-prev",
                    },
                    pagination: {
                        el: '.franctional-slider-pagi1',
                        type: "fraction",
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

                const txts = document.querySelector(".animate-text").children,
                    txtslen = txts.length;
                let index = 0;

                function animateText() {
                    console.log(txts[index]);
                    for (let i = 0; i < txtslen; i++) {
                        txts[i].classList.remove("text-in");
                    }
                    txts[index].classList.add("text-in");
                    if (index == txtslen - 1) {
                        index = 0;
                    } else {
                        index++;
                    }
                    setTimeout(animateText, 3000);
                }
                window.onload = animateText;
            </script>
        <?php endif ?>

        <?php if ($settings['triprex_hero_banner_section_style_selection'] == 'style_one') : ?>
            <div class="home1-banner-area">
                <div class="container-fluid">
                    <div class="swiper home1-banner-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ((array)$data as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="home1-banner-wrapper" <?php if (!empty($item['triprex_hero_banner_one_section_bg_image']['url'])) { ?> style="background-image: linear-gradient(180deg, rgba(16, 12, 8, 0.4) 0%, rgba(16, 12, 8, 0.4) 100%),url(<?php echo esc_url($item['triprex_hero_banner_one_section_bg_image']['url']) ?>)" <?php } else { ?> style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/home1/home1-banner-img1.png);" <?php } ?>>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="home1-banner-content">
                                                        <?php if (!empty($item['triprex_hero_banner_one_tag_title'])) :   ?>
                                                            <div class="eg-tag">
                                                                <span>
                                                                    <?php \Elementor\Icons_Manager::render_icon($item['triprex_hero_banner_one_tag_title_icon'], ['aria-hidden' => 'true']); ?>
                                                                    <?php echo esc_html($item['triprex_hero_banner_one_tag_title']) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['triprex_hero_banner_one_title_section_sec'])) :   ?>
                                                            <h2><?php echo esc_html($item['triprex_hero_banner_one_title_section_sec']) ?></h2>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['triprex_hero_banner_one_content_section_sec'])) :   ?>
                                                            <p><?php echo esc_html($item['triprex_hero_banner_one_content_section_sec']) ?></p>
                                                        <?php endif ?>
                                                        <div class="banner-content-bottom">
                                                            <?php if (!empty($item['triprex_hero_banner_one_section_sec_btn_sec_btn_text'])) :   ?>
                                                                <a href="<?php echo esc_url($item['triprex_hero_banner_one_section_sec_btn_sec_btn_text_url']['url']) ?>" class="primary-btn1"><?php echo esc_html($item['triprex_hero_banner_one_section_sec_btn_sec_btn_text']) ?> </a>
                                                            <?php endif ?>
                                                            <a href="<?php echo esc_url($item['triprex_hero_banner_one_section_sec_review_link']['url']) ?>">
                                                                <div class="rating-area">
                                                                    <?php if (!empty($item['triprex_hero_banner_one_section_rating_area_sec_icon'])) : ?>
                                                                        <div class="icon">
                                                                            <?php \Elementor\Icons_Manager::render_icon($item['triprex_hero_banner_one_section_rating_area_sec_icon'], ['aria-hidden' => 'true']); ?>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <div class="content">
                                                                        <?php if (!empty($item['triprex_hero_banner_one_section_rating_area_logo'])) : ?>
                                                                            <div class="text-logo">
                                                                                <?php \Elementor\Icons_Manager::render_icon($item['triprex_hero_banner_one_section_rating_area_logo'], ['aria-hidden' => 'true']); ?>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <div class="rating">
                                                                            <ul>
                                                                                <?php $rank_counter = intval($item['triprex_hero_banner_one_section_review_star']);
                                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                                        <li><i class="bi bi-circle-fill"></i></li>
                                                                                    <?php endif ?>
                                                                                <?php endfor; ?>
                                                                            </ul>
                                                                            <span><?php echo sprintf("%2d.0", $rank_counter) ?> <?php echo esc_html($item['triprex_hero_banner_one_section_review_number']) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="slider-btn-grp">
                        <div class="slider-btn home1-banner-prev">
                            <i class="bi bi-arrow-left"></i>
                        </div>
                        <div class="slider-btn home1-banner-next">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($settings['triprex_hero_banner_shortcode_switch'] == 'yes') : ?>
                <div class="home1-banner-bottom mb-120">
                    <div class="container-fluid">
                        <div class="filter-wrapper">
                            <?php echo do_shortcode($settings['triprex_hero_banner_shortcode']); ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php endif ?>

        <?php if ($settings['triprex_hero_banner_section_style_selection'] == 'style_two') : ?>
            <div class="home2-banner-area">
                <div class="swiper home1-banner-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ((array)$data2 as $item2) : ?>
                            <div class="swiper-slide">
                                <div class="home2-banner-wrapper" <?php if (!empty($item2['triprex_hero_banner_two_section_bg_image']['url'])) { ?> style="background-image: linear-gradient(180deg, rgba(16, 12, 8, 0.4) 0%, rgba(16, 12, 8, 0.4) 100%),url(<?php echo esc_url($item2['triprex_hero_banner_two_section_bg_image']['url']) ?>)" <?php } else { ?> style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/home2/home2-banner-img1.jpg);" <?php } ?>>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="home2-banner-content-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="home2-banner-content">
                                    <?php if (!empty($settings['triprex_hero_banner_two_tag_title'])) :   ?>
                                        <div class="eg-tag">
                                            <span><?php echo esc_html($settings['triprex_hero_banner_two_tag_title']) ?></span>
                                        </div>
                                    <?php endif ?>
                                    <?php
                                    $value = $settings['triprex_hero_banner_two_title_dynamic_text'];
                                    $single_value = explode("\n", str_replace("\r", "", $value));
                                    ?>
                                    <h1 class="animate-text">
                                        <?php if (!empty($settings['triprex_hero_banner_two_title_one'])) :   ?>
                                            <?php echo esc_html($settings['triprex_hero_banner_two_title_one']) ?>
                                        <?php endif ?>
                                        <?php foreach ($single_value as $sng) : ?>
                                            <span>
                                                <?php echo sprintf(__('%s', 'triprex-core'), $sng); ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if (!empty($settings['triprex_hero_banner_two_title_two'])) :   ?>
                                            <?php echo esc_html($settings['triprex_hero_banner_two_title_two']) ?>
                                        <?php endif ?>
                                    </h1>

                                    <div class="banner-content-bottom">
                                        <div class="hotline-area">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($settings['triprex_hero_banner_two_contact_area_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <div class="content">
                                                <?php if (!empty($settings['triprex_hero_banner_two_contact_area_title'])) :   ?>
                                                    <span><?php echo esc_html($settings['triprex_hero_banner_two_contact_area_title']) ?></span>
                                                <?php endif ?>
                                                <?php if (!empty($settings['triprex_hero_banner_two_contact_area_number'])) :   ?>
                                                    <h6><a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $settings['triprex_hero_banner_two_contact_area_number']); ?>"><?php echo esc_html($settings['triprex_hero_banner_two_contact_area_number']) ?></a></h6>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <a href="<?php echo esc_url($settings['triprex_hero_banner_two_section_review_review_link']['url']) ?>" class="rating-area">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($settings['triprex_hero_banner_two_section_rating_area_sec_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <div class="content">
                                                <div class="text-logo">
                                                    <?php \Elementor\Icons_Manager::render_icon($settings['triprex_hero_banner_two_section_rating_area_logo'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                                <div class="rating">
                                                    <ul>
                                                        <?php $rank_counter = intval($settings['triprex_hero_banner_two_section_review_star']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-circle-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                    <span><?php echo sprintf("%2d.0", $rank_counter) ?> <?php echo esc_html($settings['triprex_hero_banner_two_section_review_number']) ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($settings['triprex_hero_banner_shortcode_two_switch'] == 'yes') : ?>
                        <div class="home1-banner-bottom style-2">
                            <div class="container-md container-fluid">
                                <div class="filter-wrapper">
                                    <?php echo do_shortcode($settings['triprex_hero_banner_shortcode_two']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <div class="slider-btn-grp">
                    <div class="slider-btn home1-banner-prev">
                        <i class="bi bi-arrow-left"></i>
                    </div>
                    <div class="slider-btn home1-banner-next">
                        <i class="bi bi-arrow-right"></i>
                    </div>
                </div>
            </div>
        <?php endif ?>


        <?php if ($settings['triprex_hero_banner_section_style_selection'] == 'style_three') : ?>
            <div class="home3-banner-area">
                <div class="swiper home3-banner-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ((array)$data3 as $item3) : ?>
                            <div class="swiper-slide">
                                <div class="home3-banner-wrapper" <?php if (!empty($item3['triprex_hero_banner_three_section_bg_image']['url'])) { ?> style="background-image: linear-gradient(180deg, rgba(34, 34, 34, 0.5) 0%, rgba(34, 34, 34, 0.5) 100%),url(<?php echo esc_url($item3['triprex_hero_banner_three_section_bg_image']['url']) ?>)" <?php } else { ?> style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/home3/home3-banner-img1.jpg);" <?php } ?>>
                                    <div class="home3-banner-content-wrap">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="home3-banner-content">
                                                        <?php if (!empty($item3['triprex_hero_banner_three_section_subtitle'])) :   ?>
                                                            <div class="eg-tag">
                                                                <span><?php echo esc_html($item3['triprex_hero_banner_three_section_subtitle']) ?></span>
                                                            </div>
                                                        <?php endif ?>
                                                        <?php if (!empty($item3['triprex_hero_banner_three_section_title'])) :   ?>
                                                            <h1><?php echo wp_kses($item3['triprex_hero_banner_three_section_title'], wp_kses_allowed_html('post'))  ?>
                                                            <?php endif ?>
                                                            </h1>
                                                            <div class="banner-content-bottom">
                                                                <?php if (!empty($item3['triprex_hero_banner_three_button_text'])) :   ?>
                                                                    <a href="<?php echo esc_url($item3['triprex_hero_banner_three_button_text_url']['url']) ?>" class="primary-btn4">
                                                                        <span>
                                                                            <?php echo esc_html($item3['triprex_hero_banner_three_button_text']) ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                                <path d="M7.70294 9.65818L7.27464 11.6673L5.29549 17.0003L6.47016 16.8046L11.9577 9.62856C12.7321 9.6016 13.4832 9.56006 14.1359 9.49563C17.1552 9.19702 16.9986 8.50013 16.9986 8.50013C16.9986 8.50013 17.1552 7.80325 14.1358 7.50464C13.4832 7.43995 12.7321 7.39845 11.9576 7.3717L6.47019 0.195477L5.29549 -5.1162e-07L7.27464 5.33303L7.70294 7.34212C6.69752 7.35717 6.01715 7.38006 6.01715 7.38006C6.01715 7.38006 4.63017 7.41207 2.48417 7.8956L0.734503 5.46859L-8.41624e-05 5.46859L0.523018 8.41949C0.428867 8.44835 0.428867 8.55195 0.523018 8.58081L-8.44274e-05 11.5317L0.734502 11.5317L2.48417 9.10495C4.63017 9.58848 6.01715 9.62001 6.01715 9.62001C6.01715 9.62001 6.69752 9.64317 7.70294 9.65818Z" />
                                                                                <path d="M11.4004 11.2692L11.4004 12.0613L8.47265 12.0613L8.47265 11.2692L11.4004 11.2692ZM11.4004 4.94234L11.4004 5.73425L8.47282 5.73425L8.47282 4.94234L11.4004 4.94234ZM9.42515 13.9276L9.42515 14.7195L6.71923 14.7195L6.71923 13.9276L9.42515 13.9276ZM9.42515 2.28418L9.42515 3.07634L6.71924 3.07634L6.71924 2.28418L9.42515 2.28418Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                <?php endif ?>
                                                                <?php if ($item3['triprex_hero_banner_three_video_button_section_style_design'] === 'file') : ?>
                                                                    <a data-fancybox="popup-video" href="<?php echo esc_url($item3['triprex_hero_banner_three_video_button_section_upload_video']['url']) ?>" class="video-area">
                                                                        <div class="icon">
                                                                            <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                                <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                                <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                                <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                            </svg>
                                                                            <i class="bi bi-play"></i>
                                                                        </div>
                                                                        <?php if (!empty($item3['triprex_activites_two_tab_content_bottom_video_btn_text'])) :   ?>
                                                                            <h6><?php echo esc_html($item3['triprex_activites_two_tab_content_bottom_video_btn_text']) ?></h6>
                                                                        <?php endif ?>
                                                                    </a>
                                                                <?php elseif ($item3['triprex_hero_banner_three_video_button_section_style_design'] === 'link') : ?>
                                                                    <a data-fancybox="popup-video" href="<?php echo esc_url($item3['triprex_hero_banner_three_video_button_section_style_url']['url']) ?>" class="video-area">
                                                                        <div class="icon">
                                                                            <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                                                <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                                                <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                                                <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                                            </svg>
                                                                            <i class="bi bi-play"></i>
                                                                        </div>
                                                                        <?php if (!empty($item3['triprex_activites_two_tab_content_bottom_video_btn_text'])) :   ?>
                                                                            <h6><?php echo esc_html($item3['triprex_activites_two_tab_content_bottom_video_btn_text']) ?></h6>
                                                                        <?php endif ?>
                                                                    </a>
                                                                <?php endif ?>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="slider-btn-grp">
                    <div class="slider-btn home3-banner-prev">
                        <i class="bi bi-arrow-up"></i>
                    </div>
                    <div class="progress-pagination"></div>
                    <div class="slider-btn home3-banner-next">
                        <i class="bi bi-arrow-down"></i>
                    </div>
                </div>
            </div>
            <?php if ($settings['triprex_hero_banner_shortcode_three_switch'] == 'yes') : ?>
                <div class="home1-banner-bottom style-3">
                    <div class="container">
                        <div class="filter-wrapper">
                            <?php echo do_shortcode($settings['triprex_hero_banner_shortcode_three']); ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php endif ?>

        <?php if ($settings['triprex_hero_banner_section_style_selection'] == 'style_four') : ?>
            <div class="home4-banner-area" <?php if (!empty($settings['triprex_hero_banner_four_section_bg_image']['url'])) { ?> style="background-image: linear-gradient(180deg, #ece4d7 0%, #ece4d7 100%),url(<?php echo esc_url($settings['triprex_hero_banner_four_section_bg_image']['url']) ?>)" <?php } ?>>
                <div class="banner-wrapper">
                    <div class="row g-xl-2">
                        <div class="col-xl-7 d-flex <?php echo $settings['triprex_hero_banner_four_filter_enable_disbale_sec'] == 'yes' ? 'align-items-end' : 'align-items-center' ?>">
                            <div class="banner-content-wrap">
                                <div class="banner-content">
                                    <?php if (!empty($settings['triprex_hero_banner_four_section_title'])) :   ?>
                                        <h1><?php echo esc_html($settings['triprex_hero_banner_four_section_title']) ?></h1>
                                    <?php endif ?>
                                    <?php if (!empty($settings['triprex_hero_banner_four_section_content'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_hero_banner_four_section_content']) ?></p>
                                    <?php endif ?>
                                </div>
                                <?php if ($settings['triprex_hero_banner_four_filter_enable_disbale_sec'] == 'yes') :   ?>
                                    <div class="home1-banner-bottom style-4 mb-40">
                                        <div class="filter-wrapper">
                                            <?php echo do_shortcode($settings['triprex_hero_banner_shortcode_four']); ?>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="swiper home4-banner-img-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data5 as $item) : ?>
                                        <div class="swiper-slide">
                                            <div class="banner-img">
                                                <img src="<?php echo esc_url($item['triprex_hero_banner_four_slide_image']['url']) ?>" alt="<?php echo esc_attr__('Icon ', 'triprex-core') ?>" class="rating">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="social-list">
                        <?php foreach ($data4 as $item) : ?>
                            <?php if (!empty($item['triprex_hero_banner_four_social_icon_sec_icon'])) : ?>
                                <li>
                                    <a href="<?php echo esc_url($item['triprex_hero_banner_four_social_icon_sec_icon_url']['url']); ?>">
                                        <?php \Elementor\Icons_Manager::render_icon($item['triprex_hero_banner_four_social_icon_sec_icon'], ['aria-hidden' => 'true']); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>

                    <div class="airplane-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M7.77389 8.15624L5.64663 7.70276L-1.08341e-06 5.60723L0.20724 6.85098L7.80525 12.6612C7.8338 13.4812 7.87778 14.2764 7.946 14.9674C8.26217 18.1643 9.00003 17.9985 9.00003 17.9985C9.00003 17.9985 9.73789 18.1643 10.0541 14.9674C10.1226 14.2764 10.1665 13.4811 10.1948 12.6611L17.793 6.851L18 5.60722L12.3534 7.70276L10.2261 8.15624C10.2102 7.0917 10.186 6.37132 10.186 6.37132C10.186 6.37132 10.1521 4.90278 9.64012 2.63059L12.2098 0.778037L12.2098 0.000254184L9.08542 0.554116C9.05486 0.45443 8.94517 0.45443 8.91461 0.554116L5.79019 0.000254745L5.79019 0.778037L8.35965 2.63059C7.84769 4.90278 7.8143 6.37132 7.8143 6.37132C7.8143 6.37132 7.78979 7.0917 7.77389 8.15624Z" />
                            <path d="M6.06868 12.0712L5.22993 12.0712L5.22993 8.97132L6.06867 8.97132L6.06868 12.0712ZM12.7676 12.0712L11.9291 12.0712L11.9291 8.9715L12.7676 8.9715L12.7676 12.0712ZM3.25394 9.97984L2.41547 9.97984L2.41546 7.11481L3.25394 7.11481L3.25394 9.97984ZM15.582 9.97984L14.7433 9.97984L14.7433 7.11481L15.582 7.11481L15.582 9.97984Z" />
                        </svg>
                    </div>
                    <div class="banner-slider-btn-area">
                        <div class="banner-slider-btn-grp">
                            <div class="slider-btn home4-banner-prev">
                                <i class="bi bi-arrow-left"></i>
                            </div>
                            <div class="slider-btn home4-banner-next">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_hero_banner_section_style_selection'] == 'style_five') : ?>
            <div class="home5-banner-area">
                <div class="row g-0">
                    <?php if (!empty($settings['triprex_hero_banner_five_section_marque_text'])) : ?>
                        <div class="col-xl-1 d-xl-flex d-none align-items-center justify-content-center">
                            <div class="scroll-text">
                                <h2 class="marquee_text2"><?php echo esc_html($settings['triprex_hero_banner_five_section_marque_text']); ?></h2>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-xl-11">
                        <div class="swiper home5-banner-slider">
                            <div class="swiper-wrapper">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <div class="banner-wrapper">
                                            <?php the_post_thumbnail(); ?>
                                            <div class="banner-price-card">
                                                <?php $class_n = Egns_Helper::getBackgroundColorClass() ?>
                                                <div class="batch <?php echo $class_n ?>">
                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tour_featured_batch'))) : ?>
                                                        <span><?php echo esc_html(Egns_Helper::egns_tours_value('tour_featured_batch')); ?></span>
                                                    <?php endif; ?>
                                                    <?php
                                                    $post_id = get_the_ID();
                                                    $selected_tour_type = get_the_terms($post_id, 'tour-types');
                                                    if ($selected_tour_type && !is_wp_error($selected_tour_type)) {
                                                        $tour_type_name = $selected_tour_type[0]->name; ?>
                                                        <div class="packcage-name">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                <g>
                                                                    <path d="M17.1562 8.15625C16.907 8.15625 16.6826 8.26502 16.528 8.4375H15.1617C15.0454 7.1531 14.5351 5.98082 13.7527 5.04271L14.7216 4.0738C14.7369 4.07461 14.7521 4.07598 14.7673 4.07598C14.9834 4.07598 15.1994 3.99375 15.3639 3.82932C15.3639 3.8293 15.364 3.82925 15.364 3.82918C15.6929 3.50026 15.6929 2.96501 15.3639 2.63595C15.035 2.30709 14.4997 2.30706 14.1706 2.63605C13.9946 2.81211 13.9138 3.04724 13.9262 3.27829L12.9573 4.24723C12.0192 3.46486 10.8469 2.95464 9.5625 2.83834V1.47196C9.73498 1.31737 9.84375 1.09304 9.84375 0.84375C9.84375 0.378527 9.46522 0 9 0C8.53478 0 8.15625 0.378527 8.15625 0.84375C8.15625 1.09304 8.26502 1.31737 8.4375 1.47196V2.83834C7.1531 2.95464 5.98082 3.46486 5.04271 4.24726L4.0738 3.27832C4.08621 3.04731 4.00539 2.81215 3.82936 2.63609L3.82922 2.63598C3.50033 2.30713 2.96501 2.30709 2.63598 2.63609C2.30713 2.96504 2.30713 3.5003 2.63612 3.82936C2.80058 3.99379 3.01655 4.07598 3.23265 4.07598C3.24791 4.07598 3.2631 4.07461 3.27832 4.0738L4.24726 5.04274C3.46486 5.98082 2.95464 7.1531 2.83834 8.4375H1.47196C1.31737 8.26502 1.09304 8.15625 0.84375 8.15625C0.378527 8.15625 0 8.53478 0 9C0 9.46522 0.378527 9.84375 0.84375 9.84375C1.09304 9.84375 1.31737 9.73498 1.47196 9.5625H2.83834C2.95464 10.8469 3.46486 12.0192 4.24726 12.9573L3.27832 13.9262C3.04731 13.9138 2.81215 13.9946 2.63609 14.1706C2.63602 14.1707 2.63597 14.1707 2.63595 14.1708C2.30709 14.4997 2.30709 15.035 2.63609 15.364C2.80055 15.5284 3.01651 15.6106 3.23262 15.6106C3.44869 15.6106 3.66483 15.5284 3.82936 15.3639C4.00535 15.1878 4.08621 14.9527 4.0738 14.7217L5.04274 13.7527C5.98082 14.5351 7.15314 15.0453 8.43754 15.1617V16.528C8.26506 16.6826 8.15629 16.907 8.15629 17.1562C8.15629 17.6215 8.53481 18 9.00004 18C9.46526 18 9.84379 17.6215 9.84379 17.1562C9.84379 16.907 9.73501 16.6826 9.56254 16.528V15.1617C10.8469 15.0454 12.0192 14.5351 12.9573 13.7527L13.9263 14.7217C13.9139 14.9527 13.9947 15.1878 14.1707 15.3639C14.1707 15.364 14.1708 15.364 14.1709 15.3641C14.3353 15.5285 14.5513 15.6107 14.7674 15.6107C14.9835 15.6107 15.1996 15.5284 15.3641 15.3639C15.693 15.035 15.693 14.4997 15.364 14.1707C15.188 13.9947 14.9528 13.9138 14.7218 13.9262L13.7528 12.9573C14.5352 12.0192 15.0454 10.8469 15.1618 9.5625H16.5281C16.6827 9.73498 16.9071 9.84375 17.1564 9.84375C17.6216 9.84375 18.0001 9.46522 18.0001 9C18.0001 8.53478 17.6215 8.15625 17.1562 8.15625ZM12.3528 11.5573L10.5226 9.7271C10.5482 9.67348 10.571 9.61853 10.5907 9.5625H13.1812C13.0817 10.3058 12.7879 10.9883 12.3528 11.5573ZM6.44266 12.3528L8.2729 10.5226C8.32652 10.5482 8.38147 10.571 8.4375 10.5907V13.1812C7.69423 13.0817 7.01174 12.7879 6.44266 12.3528ZM4.81883 9.5625H7.40925C7.42904 9.61854 7.45179 9.67348 7.47742 9.7271L5.64718 11.5573C5.21205 10.9883 4.91832 10.3058 4.81883 9.5625ZM5.64718 6.44266L7.47742 8.2729C7.4518 8.32652 7.42905 8.38147 7.40925 8.4375H4.81883C4.91832 7.69423 5.21205 7.01174 5.64718 6.44266ZM11.5573 5.64718L9.7271 7.47742C9.67348 7.4518 9.61853 7.42905 9.5625 7.40925V4.81883C10.3058 4.91832 10.9883 5.21205 11.5573 5.64718ZM13.1812 8.4375H10.5907C10.571 8.38146 10.5482 8.32652 10.5226 8.2729L12.3528 6.44266C12.7879 7.01174 13.0817 7.69423 13.1812 8.4375ZM9.5625 9C9.5625 9.31015 9.31015 9.5625 9 9.5625C8.68985 9.5625 8.4375 9.31015 8.4375 9C8.4375 8.68985 8.68985 8.4375 9 8.4375C9.31015 8.4375 9.5625 8.68985 9.5625 9ZM8.4375 7.40925C8.38146 7.42904 8.32652 7.45179 8.2729 7.47742L6.44266 5.64718C7.01174 5.21209 7.69426 4.91832 8.4375 4.81887V7.40925ZM9.5625 10.5907C9.61854 10.571 9.67348 10.5482 9.7271 10.5226L11.5573 12.3528C10.9883 12.7879 10.3057 13.0817 9.5625 13.1811V10.5907Z" />
                                                                </g>
                                                            </svg>
                                                            <span><?php echo esc_html($tour_type_name); ?></span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <h4><?php the_title(); ?></h4>
                                                <div class="rating-and-date">
                                                    <?php if (function_exists('run_reviewx')) : ?>
                                                        <div class="rating-area mb-0">
                                                            <?php echo do_shortcode('[rvx-star-count]') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty(Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                        <div class="date">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                                                <g>
                                                                    <path d="M11.9363 6.40178V2.87087C11.9363 2.03169 11.2491 1.33856 10.4099 1.33856H10.2197V1.0992C10.2197 0.500453 9.73434 0.0150575 9.13559 0.0150575C8.53684 0.0150575 8.05145 0.500453 8.05145 1.0992V1.33856H4.07625V1.0992C4.07625 0.492141 3.58411 0 2.97705 0C2.36999 0 1.87785 0.492141 1.87785 1.0992V1.33856H1.71357C0.874357 1.33856 0.191406 2.03169 0.191406 2.87087V10.9786C0.191406 11.8178 0.874357 12.5113 1.71357 12.5113H6.48965C6.87863 12.9765 7.36483 13.351 7.91405 13.6082C8.46327 13.8654 9.06217 13.9991 9.66863 14C11.9483 14 13.8054 12.1426 13.8054 9.86282C13.8055 8.41786 13.0506 7.14122 11.9363 6.40178ZM8.65375 1.0992C8.64911 0.836899 8.85796 0.620492 9.12026 0.615854C9.12448 0.615794 9.1287 0.615763 9.13291 0.615794C9.39769 0.612993 9.61463 0.825365 9.61743 1.09017C9.61746 1.09318 9.61746 1.09619 9.61743 1.0992V2.27212H8.65375V1.0992ZM2.48015 1.0992C2.48302 0.82934 2.70412 0.612903 2.97398 0.615763C2.97444 0.615758 2.97491 0.615768 2.97537 0.615794C3.24622 0.615794 3.47395 0.828376 3.47395 1.0992V2.27212H2.48015V1.0992ZM0.793708 2.87087C0.793708 2.36376 1.20647 1.94086 1.71357 1.94086H1.87785V2.5858C1.87785 2.7521 2.01674 2.87443 2.18307 2.87443H3.76773C3.93402 2.87443 4.07625 2.7521 4.07625 2.5858V1.94086H8.05145V2.5858C8.05035 2.62405 8.05708 2.66211 8.07122 2.69766C8.08537 2.7332 8.10663 2.76548 8.13371 2.79251C8.16078 2.81954 8.1931 2.84075 8.22867 2.85484C8.26424 2.86893 8.30231 2.87559 8.34055 2.87443H9.92521C9.96374 2.87571 10.0021 2.86916 10.038 2.85519C10.074 2.84121 10.1067 2.8201 10.1342 2.79312C10.1617 2.76614 10.1835 2.73386 10.1982 2.69822C10.2129 2.66259 10.2202 2.62435 10.2197 2.5858V1.94086H10.4099C10.9204 1.94601 11.3321 2.36033 11.334 2.87087V3.83811H0.793708V2.87087ZM1.71357 11.909C1.20647 11.909 0.793708 11.4857 0.793708 10.9786V4.44041H11.334V6.07428C10.8098 5.84412 10.2434 5.72538 9.67092 5.7256C7.39121 5.7256 5.5353 7.58572 5.5353 9.8655C5.53415 10.5817 5.71928 11.2859 6.07253 11.909H1.71357ZM9.66863 13.3923C7.71783 13.3923 6.1364 11.8109 6.1364 9.86011C6.1364 7.90931 7.71783 6.32788 9.66863 6.32788C11.6194 6.32788 13.2009 7.90931 13.2009 9.86011V9.86014C13.1987 11.81 11.6185 13.3901 9.66863 13.3923Z" />
                                                                    <path d="M11.0857 9.86116H9.76636V8.04914C9.76636 7.88281 9.63154 7.74799 9.46521 7.74799C9.29889 7.74799 9.16406 7.88281 9.16406 8.04914V10.162C9.16533 10.2425 9.19823 10.3192 9.25565 10.3757C9.31306 10.4321 9.39038 10.4636 9.47087 10.4635H11.0857C11.252 10.4635 11.3869 10.3286 11.3869 10.1623C11.3869 9.99599 11.252 9.86116 11.0857 9.86116Z" />
                                                                </g>
                                                            </svg>
                                                            <span><?php echo esc_html__(Egns_Helper::egns_tours_value('tour_duration')); ?></span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php $tour_highlight = Egns_Helper::egns_tours_value('tours_extra_service_re');
                                                if (!empty($tour_highlight)) : ?>
                                                    <ul>
                                                        <?php

                                                        foreach ($tour_highlight as $item) {
                                                        ?>
                                                            <li>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                    <g>
                                                                        <path d="M16.453 7.36386L15.2748 6.01733C15.0223 5.76485 14.854 5.2599 14.854 4.92327V3.57673C14.854 2.65099 14.0965 1.97772 13.2549 1.97772H11.8243C11.4876 1.97772 10.9827 1.80941 10.7302 1.55693L9.38366 0.378713C8.79455 -0.126238 7.86881 -0.126238 7.2797 0.378713L6.01733 1.55693C5.76485 1.80941 5.2599 1.97772 4.92327 1.97772H3.49257C2.56683 1.97772 1.89356 2.73515 1.89356 3.57673V5.00743C1.89356 5.34406 1.72525 5.84901 1.47277 6.10148L0.378713 7.44802C-0.126238 8.03713 -0.126238 8.96287 0.378713 9.55198L1.47277 10.8985C1.72525 11.151 1.89356 11.6559 1.89356 11.9926V13.4233C1.89356 14.349 2.65099 15.0223 3.49257 15.0223H4.92327C5.2599 15.0223 5.76485 15.1906 6.01733 15.4431L7.36386 16.6213C7.95297 17.1262 8.87871 17.1262 9.46782 16.6213L10.8144 15.4431C11.0668 15.1906 11.5718 15.0223 11.9084 15.0223H13.3391C14.2649 15.0223 14.9381 14.2649 14.9381 13.4233V11.9926C14.9381 11.6559 15.1064 11.151 15.3589 10.8985L16.5371 9.55198C16.9579 8.96287 16.9579 7.95297 16.453 7.36386ZM12.3292 8.45792L11.3193 11.4876C11.2351 11.9926 10.646 12.4134 10.1411 12.4134H8.54208C8.2896 12.4134 7.86881 12.3292 7.70049 12.1609L6.43812 11.2351C6.43812 11.7401 6.18564 11.9926 5.59653 11.9926H5.2599C4.67079 11.9926 4.41832 11.7401 4.41832 11.151V7.11139C4.41832 6.52228 4.67079 6.2698 5.2599 6.2698H5.68069C6.2698 6.2698 6.52228 6.52228 6.52228 7.11139V7.44802L8.12129 5.00743C8.2896 4.75495 8.7104 4.58663 9.04703 4.67079C9.46782 4.83911 9.7203 5.2599 9.63614 5.59653L9.46782 6.94307C9.46782 7.02723 9.46782 7.19554 9.55198 7.2797C9.63614 7.36386 9.7203 7.36386 9.80445 7.36386H11.4876C11.8243 7.36386 12.0767 7.53218 12.245 7.7005C12.4134 7.86881 12.4134 8.20545 12.3292 8.45792Z"></path>
                                                                    </g>
                                                                </svg> <?php echo esc_html($item['tours_extra_service']); ?>
                                                            </li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <div class="banner-price-card-bottom">
                                                    <div class="price-area">
                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_before_price'))) : ?>
                                                            <span><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></span>
                                                        <?php endif; ?>
                                                        <h4><?php echo \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?></h4>
                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_after_price'))) : ?>
                                                            <p><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_after_price')); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if (!empty($settings['triprex_hero_banner_five_section_btn_text'])) : ?>
                                                        <a href="<?php the_permalink(); ?>" class="primary-btn5">
                                                            <span>
                                                                <?php echo esc_html($settings['triprex_hero_banner_five_section_btn_text']); ?>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                    <path d="M8.15624 10.2261L7.70276 12.3534L5.60722 18L6.85097 17.7928L12.6612 10.1948C13.4812 10.1662 14.2764 10.1222 14.9674 10.054C18.1643 9.73783 17.9985 8.99997 17.9985 8.99997C17.9985 8.99997 18.1643 8.26211 14.9674 7.94594C14.2764 7.87745 13.4811 7.8335 12.6611 7.80518L6.851 0.206972L5.60722 -5.41705e-07L7.70276 5.64663L8.15624 7.77386C7.0917 7.78979 6.37132 7.81403 6.37132 7.81403C6.37132 7.81403 4.90278 7.84793 2.63059 8.35988L0.778036 5.79016L0.000253424 5.79016L0.554115 8.91458C0.454429 8.94514 0.454429 9.05483 0.554115 9.08539L0.000253144 12.2098L0.778036 12.2098L2.63059 9.64035C4.90278 10.1523 6.37132 10.1857 6.37132 10.1857C6.37132 10.1857 7.0917 10.2102 8.15624 10.2261Z" />
                                                                    <path d="M12.0703 11.9318L12.0703 12.7706L8.97041 12.7706L8.97041 11.9318L12.0703 11.9318ZM12.0703 5.23292L12.0703 6.0714L8.97059 6.0714L8.97059 5.23292L12.0703 5.23292ZM9.97892 14.7465L9.97892 15.585L7.11389 15.585L7.11389 14.7465L9.97892 14.7465ZM9.97892 2.41846L9.97892 3.2572L7.11389 3.2572L7.11389 2.41846L9.97892 2.41846Z" />
                                                                </svg>
                                                            </span>
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
        <?php endif ?>

        <?php if ($settings['triprex_hero_banner_section_style_selection'] == 'style_six') : ?>
            <div class="home6-banner-area">
                <div class="container-fluid">
                    <div class="bannner-slider-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper home6-banner-slider">
                                    <div class="swiper-wrapper">
                                        <?php if ($settings['triprex_hero_banner_six_custom_select'] == 'tours') : ?>
                                            <?php
                                            while ($query2->have_posts()) :
                                                $query2->the_post(); ?>
                                                <div class="swiper-slide">
                                                    <div class="package-card5 tours">
                                                        <?php the_post_thumbnail(); ?>
                                                        <div class="card-content-wrapper">
                                                            <?php $class_n = Egns_Helper::getBackgroundColorClass() ?>
                                                            <div class="batch <?php echo $class_n ?>">
                                                                <?php if (!empty(Egns_Helper::egns_tours_value('tour_featured_batch'))) : ?>
                                                                    <span><?php echo esc_html(Egns_Helper::egns_tours_value('tour_featured_batch')); ?></span>
                                                                <?php endif; ?>
                                                                <?php
                                                                $post_id = get_the_ID();
                                                                $selected_tour_type = get_the_terms($post_id, 'tour-types');
                                                                if ($selected_tour_type && !is_wp_error($selected_tour_type)) {
                                                                    $tour_type_name = $selected_tour_type[0]->name; ?>
                                                                    <div class="packcage-name">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                            <g>
                                                                                <path d="M17.1562 8.15625C16.907 8.15625 16.6826 8.26502 16.528 8.4375H15.1617C15.0454 7.1531 14.5351 5.98082 13.7527 5.04271L14.7216 4.0738C14.7369 4.07461 14.7521 4.07598 14.7673 4.07598C14.9834 4.07598 15.1994 3.99375 15.3639 3.82932C15.3639 3.8293 15.364 3.82925 15.364 3.82918C15.6929 3.50026 15.6929 2.96501 15.3639 2.63595C15.035 2.30709 14.4997 2.30706 14.1706 2.63605C13.9946 2.81211 13.9138 3.04724 13.9262 3.27829L12.9573 4.24723C12.0192 3.46486 10.8469 2.95464 9.5625 2.83834V1.47196C9.73498 1.31737 9.84375 1.09304 9.84375 0.84375C9.84375 0.378527 9.46522 0 9 0C8.53478 0 8.15625 0.378527 8.15625 0.84375C8.15625 1.09304 8.26502 1.31737 8.4375 1.47196V2.83834C7.1531 2.95464 5.98082 3.46486 5.04271 4.24726L4.0738 3.27832C4.08621 3.04731 4.00539 2.81215 3.82936 2.63609L3.82922 2.63598C3.50033 2.30713 2.96501 2.30709 2.63598 2.63609C2.30713 2.96504 2.30713 3.5003 2.63612 3.82936C2.80058 3.99379 3.01655 4.07598 3.23265 4.07598C3.24791 4.07598 3.2631 4.07461 3.27832 4.0738L4.24726 5.04274C3.46486 5.98082 2.95464 7.1531 2.83834 8.4375H1.47196C1.31737 8.26502 1.09304 8.15625 0.84375 8.15625C0.378527 8.15625 0 8.53478 0 9C0 9.46522 0.378527 9.84375 0.84375 9.84375C1.09304 9.84375 1.31737 9.73498 1.47196 9.5625H2.83834C2.95464 10.8469 3.46486 12.0192 4.24726 12.9573L3.27832 13.9262C3.04731 13.9138 2.81215 13.9946 2.63609 14.1706C2.63602 14.1707 2.63597 14.1707 2.63595 14.1708C2.30709 14.4997 2.30709 15.035 2.63609 15.364C2.80055 15.5284 3.01651 15.6106 3.23262 15.6106C3.44869 15.6106 3.66483 15.5284 3.82936 15.3639C4.00535 15.1878 4.08621 14.9527 4.0738 14.7217L5.04274 13.7527C5.98082 14.5351 7.15314 15.0453 8.43754 15.1617V16.528C8.26506 16.6826 8.15629 16.907 8.15629 17.1562C8.15629 17.6215 8.53481 18 9.00004 18C9.46526 18 9.84379 17.6215 9.84379 17.1562C9.84379 16.907 9.73501 16.6826 9.56254 16.528V15.1617C10.8469 15.0454 12.0192 14.5351 12.9573 13.7527L13.9263 14.7217C13.9139 14.9527 13.9947 15.1878 14.1707 15.3639C14.1707 15.364 14.1708 15.364 14.1709 15.3641C14.3353 15.5285 14.5513 15.6107 14.7674 15.6107C14.9835 15.6107 15.1996 15.5284 15.3641 15.3639C15.693 15.035 15.693 14.4997 15.364 14.1707C15.188 13.9947 14.9528 13.9138 14.7218 13.9262L13.7528 12.9573C14.5352 12.0192 15.0454 10.8469 15.1618 9.5625H16.5281C16.6827 9.73498 16.9071 9.84375 17.1564 9.84375C17.6216 9.84375 18.0001 9.46522 18.0001 9C18.0001 8.53478 17.6215 8.15625 17.1562 8.15625ZM12.3528 11.5573L10.5226 9.7271C10.5482 9.67348 10.571 9.61853 10.5907 9.5625H13.1812C13.0817 10.3058 12.7879 10.9883 12.3528 11.5573ZM6.44266 12.3528L8.2729 10.5226C8.32652 10.5482 8.38147 10.571 8.4375 10.5907V13.1812C7.69423 13.0817 7.01174 12.7879 6.44266 12.3528ZM4.81883 9.5625H7.40925C7.42904 9.61854 7.45179 9.67348 7.47742 9.7271L5.64718 11.5573C5.21205 10.9883 4.91832 10.3058 4.81883 9.5625ZM5.64718 6.44266L7.47742 8.2729C7.4518 8.32652 7.42905 8.38147 7.40925 8.4375H4.81883C4.91832 7.69423 5.21205 7.01174 5.64718 6.44266ZM11.5573 5.64718L9.7271 7.47742C9.67348 7.4518 9.61853 7.42905 9.5625 7.40925V4.81883C10.3058 4.91832 10.9883 5.21205 11.5573 5.64718ZM13.1812 8.4375H10.5907C10.571 8.38146 10.5482 8.32652 10.5226 8.2729L12.3528 6.44266C12.7879 7.01174 13.0817 7.69423 13.1812 8.4375ZM9.5625 9C9.5625 9.31015 9.31015 9.5625 9 9.5625C8.68985 9.5625 8.4375 9.31015 8.4375 9C8.4375 8.68985 8.68985 8.4375 9 8.4375C9.31015 8.4375 9.5625 8.68985 9.5625 9ZM8.4375 7.40925C8.38146 7.42904 8.32652 7.45179 8.2729 7.47742L6.44266 5.64718C7.01174 5.21209 7.69426 4.91832 8.4375 4.81887V7.40925ZM9.5625 10.5907C9.61854 10.571 9.67348 10.5482 9.7271 10.5226L11.5573 12.3528C10.9883 12.7879 10.3057 13.0817 9.5625 13.1811V10.5907Z" />
                                                                            </g>
                                                                        </svg>
                                                                        <span><?php echo esc_html($tour_type_name); ?></span>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="package-card-content">
                                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                                <div class="rating-and-date">
                                                                    <?php if (function_exists('run_reviewx')) : ?>
                                                                        <div class="rating-area">
                                                                            <?php echo do_shortcode('[rvx-star-count]') ?>
                                                                        </div>
                                                                    <?php endif; ?>
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
                                                                </div>
                                                                <div class="card-content-bottom">
                                                                    <div class="price-area">
                                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_before_price'))) : ?>
                                                                            <span><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></span>
                                                                        <?php endif; ?>
                                                                        <h6><?php echo \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?></h6>
                                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_after_price'))) : ?>
                                                                            <p><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_after_price')); ?></p>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <?php if (!empty($settings['triprex_hero_banner_six_section_btn_text'])) : ?>
                                                                        <a href="<?php the_permalink(); ?>" class="primary-btn2 two"><?php echo esc_html($settings['triprex_hero_banner_six_section_btn_text']); ?>
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
                                                </div>
                                            <?php
                                            endwhile;
                                            wp_reset_postdata();
                                            ?>
                                        <?php endif; ?>
                                        <?php if ($settings['triprex_hero_banner_six_custom_select'] == 'destinations') : ?>
                                            <?php
                                            while ($query3->have_posts()) :
                                                $query3->the_post(); ?>
                                                <div class="swiper-slide">
                                                    <div class="package-card5 destination">
                                                        <?php the_post_thumbnail(); ?>
                                                        <div class="card-content-wrapper">
                                                            <div class="package-card-content">
                                                                <div class="icon">
                                                                    <?php
                                                                    $icon_image_data = Egns_Helper::egns_destination_value('destination_general_icon_image');
                                                                    if (is_array($icon_image_data) && isset($icon_image_data['url'])) {
                                                                        $icon_image_url = esc_url($icon_image_data['url']);
                                                                        if (!empty($icon_image_url)) :
                                                                    ?>
                                                                            <img src="<?php echo esc_url($icon_image_url); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex-core'); ?>">
                                                                    <?php
                                                                        endif;
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <h1><?php the_title(); ?></h1>
                                                                <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>

                                                                <a href="<?php the_permalink(); ?>" class="primary-btn1 two"><?php echo esc_html($settings['triprex_hero_banner_six_section_btn_destination_text']); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            endwhile;
                                            wp_reset_postdata();
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="slider-btn-grp6">
                                    <div class="slider-btn home6-banner-slider-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="13" viewBox="0 0 31 13">
                                            <path d="M8 1L1 6M1 6L8 12M1 6H31" />
                                        </svg>
                                        <span><?php echo esc_html__('PREV', 'triprex-core'); ?></span>
                                    </div>
                                    <div class="franctional-slider-pagi1"></div>
                                    <div class="slider-btn home6-banner-slider-next">
                                        <span><?php echo esc_html__('NEXT', 'triprex-core'); ?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="13" viewBox="0 0 31 13">
                                            <path d="M23 12L30 7M30 7L23 1M30 7L-4.37114e-07 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Hero_Banner_Widget());
