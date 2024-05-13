<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Feature_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_feature';
    }

    public function get_title()
    {
        return esc_html__('EG Feature', 'triprex-core');
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
            'triprex_feature_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_feature_content_style_selection',
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

        //Content One
        $this->start_controls_section(
            'triprex_feature_one_section_genaral',
            [
                'label' => esc_html__('Feature Section', 'triprex-core'),
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_heading_section',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_heading_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Our Success'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'triprex_feature_card_heading_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Why Choose TRiprex'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_section',
            [
                'label' => esc_html__('Feature Card ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_feature_card_icon',
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
            'triprex_feature_card_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Worldwide Coverage'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_feature_card_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Cras facilisis fermentum ex seda ullamcorper odio rutrum accoun Phasellus auctor'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_content_list',
            [
                'label' => esc_html__('Card List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_feature_card_title' => esc_html('Worldwide Coverage'),
                    ],

                ],
                'title_field' => '{{{ triprex_feature_card_title }}}',
            ]
        );

        $this->end_controls_section();

        //Content Two
        $this->start_controls_section(
            'triprex_feature_two_section_genaral',
            [
                'label' => esc_html__('Feature Section', 'triprex-core'),
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_two_section',
            [
                'label' => esc_html__('Feature Card ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_feature_card_two_icon',
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
            'triprex_feature_card_two_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Worldwide Coverage'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_feature_card_two_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Cras facilisis fermentum ex seda ullamcorper odio rutrum accoun Phasellus auctor'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_two_content_list',
            [
                'label' => esc_html__('Card List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_feature_card_two_title' => esc_html('Worldwide Coverage'),

                    ],

                ],
                'title_field' => '{{{ triprex_feature_card_two_title }}}',
            ]
        );

        $this->end_controls_section();


        //Content Three
        $this->start_controls_section(
            'triprex_feature_three_section_genaral',
            [
                'label' => esc_html__('Feature Section', 'triprex-core'),
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_control(
            'triprex_feature_card_three_section',
            [
                'label' => esc_html__('Feature Card ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_feature_card_three_icon',
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
            'triprex_feature_card_three_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Worldwide Coverage'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_feature_card_three_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Curabitur convallis enimatnora ullamcorper sagittis.'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_list',
            [
                'label' => esc_html__('Card List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_feature_card_three_title' => esc_html('Worldwide Coverage'),

                    ],
                    [
                        'triprex_feature_card_three_title' => esc_html('Competitive Pricing'),

                    ],
                    [
                        'triprex_feature_card_three_title' => esc_html('Fast Booking'),

                    ],
                    [
                        'triprex_feature_card_three_title' => esc_html('Best Support 24/7 '),

                    ],

                ],
                'title_field' => '{{{ triprex_feature_card_three_title }}}',
            ]
        );


        $this->add_control(
            'triprex_feature_card_three_content_section',
            [
                'label' => esc_html__('Feature Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html(' Our Experience '),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('We Are The Best For Providing The Travel Arrangement. '),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_desc',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Nunc volutpat sagittis cursus. Praesent sed dolor pellentesque, consectetur velit sit amet, pharetra ipsum. Fusce eu ultrices tortor. Praesent vehicula commodo purus at vulputate.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_counter_section',
            [
                'label' => esc_html__('Counter ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_feature_card_three_counter_section_icon',
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
            'triprex_feature_card_three_counter_number',
            [
                'label' => esc_html__('Counter Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('3.5'),
                'placeholder' => esc_html__('Type your counter number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_feature_card_three_counter_extra_icon_switcher',
            [
                'label' => esc_html__("Show 'K' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $repeater->add_control(
            'triprex_feature_card_three_counter_plus_icon_switcher',
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
            'triprex_feature_card_three_counter_plus_two_icon_switcher',
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
            'triprex_feature_card_three_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Happy Traveler'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_list_sec',
            [
                'label' => esc_html__('Card List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_feature_card_three_content' => esc_html('Happy Traveler'),

                    ],
                    [
                        'triprex_feature_card_three_content' => esc_html('Happy Traveler'),

                    ],
                    [
                        'triprex_feature_card_three_content' => esc_html('Happy Traveler'),

                    ],


                ],
                'title_field' => '{{{ triprex_feature_card_three_content }}}',
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_rating_area_sec',
            [
                'label' => esc_html__('Review Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_review_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Excellent!', 'triprex-core'),
                'placeholder' => esc_html__('Type your review title here', 'triprex-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'triprex_feature_card_three_content_review_star',
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
            'triprex_feature_card_three_content_review_number',
            [
                'label' => esc_html__('Review Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses(' Rating out of <strong>5.0</strong> based on ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your review text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_review_total_review',
            [
                'label' => esc_html__('Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('<strong>245354</strong> reviews', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your review number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_review_total_review_url',
            [
                'label' => esc_html__('Review URL', 'triprex-core'),
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
            'triprex_feature_four_section_genaral',
            [
                'label' => esc_html__('Feature Section', 'triprex-core'),
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_four_heading_section_genaral',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_four_heading_subtitle_section_genaral',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Why Choose Us'),
                'placeholder' => esc_html__('Type your  subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_feature_four_heading_title_section_genaral',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('We Are Exploring The Tour With Excitement '),
                'placeholder' => esc_html__('Type your  title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_feature_four_heading_content_section_genaral',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis pulv gont congue. Suspendisse ullamcorper. '),
                'placeholder' => esc_html__('Type your  description here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_feature_card_four_section',
            [
                'label' => esc_html__('Feature Card ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_feature_card_four_icon',
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
            'triprex_feature_card_four_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses(' Worldwide <br> Tour Coverage', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_feature_card_four_content_list',
            [
                'label' => esc_html__('Card List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_feature_card_four_title' => esc_html('Worldwide  Coverage'),

                    ],
                    [
                        'triprex_feature_card_four_title' => esc_html('Competitive  Pricing'),

                    ],
                    [
                        'triprex_feature_card_four_title' => esc_html('Fast Booking'),

                    ],
                    [
                        'triprex_feature_card_four_title' => esc_html('Best  Support 24/7 '),

                    ],

                ],
                'title_field' => '{{{ triprex_feature_card_four_title }}}',
            ]
        );

        $this->add_control(
            'triprex_feature_four_banner_image_section_genaral',
            [
                'label' => esc_html__('Banner Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_four_banner_top_image_section_genaral',
            [
                'label' => esc_html__(' Top Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'triprex_feature_four_banner_bottom_image_section_genaral',
            [
                'label' => esc_html__(' Bottom Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        //Content Five
        $this->start_controls_section(
            'triprex_feature_five_section_genaral',
            [
                'label' => esc_html__('Feature Section', 'triprex-core'),
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_control(
            'triprex_feature_card_five_heading_section',
            [
                'label' => esc_html__('HEading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_five_heading_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('What TripRex Offers'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_five_heading_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_five_section',
            [
                'label' => esc_html__('Feature Card ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_feature_card_five_icon',
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
            'triprex_feature_card_five_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Book & Travel With Confidence'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_feature_card_five_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Curabitur convallis enimatnora ullamcorper sagittis.'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_five_content_list',
            [
                'label' => esc_html__('Card List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_feature_card_five_title' => esc_html('Book & Travel With Confidence'),

                    ],
                    [
                        'triprex_feature_card_five_title' => esc_html('Locally Based guides'),

                    ],
                    [
                        'triprex_feature_card_five_title' => esc_html('Built Support Local Communities'),

                    ],
                    [
                        'triprex_feature_card_five_title' => esc_html('Satisfaction Guarantee'),

                    ],

                ],
                'title_field' => '{{{ triprex_feature_card_five_title }}}',
            ]
        );

        $this->add_control(
            'triprex_feature_card_five_content_rating_area_sec',
            [
                'label' => esc_html__('Review Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_five_content_review_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Excellent!', 'triprex-core'),
                'placeholder' => esc_html__('Type your review title here', 'triprex-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'triprex_feature_card_five_content_review_star',
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
            'triprex_feature_card_five_content_review_number',
            [
                'label' => esc_html__('Review Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses(' Rating out of <strong>5.0</strong> based on ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your review text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_feature_card_five_content_review_total_review',
            [
                'label' => esc_html__('Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('<strong>245354</strong> reviews', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your review number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_feature_card_five_content_review_total_review_url',
            [
                'label' => esc_html__('Review URL', 'triprex-core'),
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
            'triprex_feature_card_five_content_review_logo',
            [
                'label' => esc_html__('Logo', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->end_controls_section();


        //Content Six
        $this->start_controls_section(
            'triprex_feature_six_section_genaral',
            [
                'label' => esc_html__('Feature Section', 'triprex-core'),
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_heading_section',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_heading_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html(' Experience Travel'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_six_heading_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Why Travel With Us'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_six_heading_desc',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehiculant tortor malesuada gravida. Mauris volutpat enim quis pulv gont congue. Suspendisse ullamcor. In this luxurious getaway, no expense has been spared. You will be captivated by fine a ghosa cuisines, the naivety of local people and top notched services.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'label_block' => true,

            ]
        );



        $this->add_control(
            'triprex_feature_card_six_section',
            [
                'label' => esc_html__('Feature Card ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_feature_card_six_icon',
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
            'triprex_feature_card_six_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Best Price Guarantee'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_feature_card_six_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Curabitur convallis enimatnora ullamcorper sagittis.'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_list',
            [
                'label' => esc_html__('Card List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_feature_card_six_title' => esc_html('Best Price Guarantee '),

                    ],
                    [
                        'triprex_feature_card_six_title' => esc_html('Competitive Pricing'),

                    ],
                    [
                        'triprex_feature_card_six_title' => esc_html('Fast Booking'),

                    ],
                    [
                        'triprex_feature_card_six_title' => esc_html('Best Support 24/7 '),

                    ],

                ],
                'title_field' => '{{{ triprex_feature_card_six_title }}}',
            ]
        );



        $this->add_control(
            'triprex_feature_card_six_counter_section',
            [
                'label' => esc_html__('Counter ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_feature_card_six_counter_section_icon',
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
            'triprex_feature_card_six_counter_number',
            [
                'label' => esc_html__('Counter Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('3.5'),
                'placeholder' => esc_html__('Type your counter number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_feature_card_six_counter_extra_two_icon_switcher',
            [
                'label' => esc_html__("Show 'K' sign", 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'triprex-core'),
                'label_off' => esc_html__('Disable', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'triprex_feature_card_six_counter_extra_icon_switcher',
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
            'triprex_feature_card_six_counter_plus_icon_switcher',
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
            'triprex_feature_card_six_counter_content',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Happy Traveler'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_list_sec',
            [
                'label' => esc_html__('Card List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_feature_card_six_counter_content' => esc_html('Happy Traveler'),

                    ],
                    [
                        'triprex_feature_card_six_counter_content' => esc_html('Happy Traveler'),

                    ],
                    [
                        'triprex_feature_card_six_counter_content' => esc_html('Happy Traveler'),

                    ],


                ],
                'title_field' => '{{{ triprex_feature_card_six_counter_content }}}',
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_rating_area_sec',
            [
                'label' => esc_html__('Review Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_review_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Excellent!', 'triprex-core'),
                'placeholder' => esc_html__('Type your review title here', 'triprex-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'triprex_feature_card_six_content_review_star',
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
            'triprex_feature_card_six_content_review_number',
            [
                'label' => esc_html__('Review Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses(' Rating out of <strong>5.0</strong> based on ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your review text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_review_total_review',
            [
                'label' => esc_html__('Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('<strong>245354</strong> reviews', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your review number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_review_total_review_url',
            [
                'label' => esc_html__('Review URL', 'triprex-core'),
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
            'triprex_feature_card_six_content_banner_image_sec',
            [
                'label' => esc_html__('Banner Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_banner_image_top',
            [
                'label' => esc_html__('Top Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_banner_image_bottom',
            [
                'label' => esc_html__('Bottom Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_feature_card_one_style_general',
            [
                'label' => esc_html__('General', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_one_genaral_bac_color',
            [
                'label' => esc_html__('  Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card-section' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_one_genaral_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_one_genaral_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-card-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_feature_card_one_style',
            [
                'label' => esc_html__('Feature Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'triprex_feature_heading_subtitle',
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
                'name'     => 'triprex_feature_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title span',

            ]
        );

        $this->add_control(
            'triprex_feature_heading_subtitle_color',
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
            'triprex_feature_heading_subtitle_margin',
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
            'triprex_feature_heading_subtitle_padding',
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
            'triprex_feature_heading_title',
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
                'name'     => 'triprex_feature_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'triprex_feature_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_heading_title_margin',
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
            'triprex_feature_heading_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Icon
        $this->add_control(
            'triprex_feature_card_one_genaral_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_one_genaral_card_bac_color',
            [
                'label' => esc_html__('  Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-icon' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_card_one_genaral_card_hov_bac_color',
            [
                'label' => esc_html__(' Hover Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card:hover .feature-card-icon' => 'background: {{VALUE}}',
                ],
            ]
        );



        $this->add_control(
            'triprex_feature_card_one_genaral_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .feature-card .feature-card-icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );



        $this->add_control(
            'triprex_feature_card_one_genaral_svg_size',
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
                    '{{WRAPPER}} .feature-card .feature-card-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .feature-card .feature-card-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_card_one_genaral_content_style_title_sec',
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
                'name'     => 'triprex_feature_card_one_genaral_content_style_sec_typ',
                'selector' => '{{WRAPPER}} .feature-card .feature-card-content h6',

            ]
        );

        $this->add_control(
            'triprex_feature_card_one_genaral_content_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_one_genaral_content_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_one_genaral_content_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-card .feature-card-content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_one_genaral_content_style_description_sec',
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
                'name'     => 'triprex_feature_card_one_genaral_content_style_description_sec_typ',
                'selector' => '{{WRAPPER}} .feature-card .feature-card-content p',

            ]
        );

        $this->add_control(
            'triprex_feature_card_one_genaral_content_style_description_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_one_genaral_content_style_description_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_one_genaral_content_style_description_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-card .feature-card-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // =====================Style Two=======================//

        $this->start_controls_section(
            'triprex_feature_card_two_style',
            [
                'label' => esc_html__('Feature Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_two_genaral_icon_sec_bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card.style-2' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'triprex_feature_card_two_genaral_icon_sec_hov_bac_color',
            [
                'label' => esc_html__('Hover Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card.style-2:hover' => 'background: {{VALUE}}',
                ],
            ]
        );



        // Icon
        $this->add_control(
            'triprex_feature_card_two_genaral_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_two_genaral_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .feature-card .feature-card-icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );



        $this->add_control(
            'triprex_feature_card_two_genaral_svg_size',
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
                    '{{WRAPPER}} .feature-card .feature-card-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .feature-card .feature-card-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_card_two_genaral_content_style_title_sec',
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
                'name'     => 'triprex_feature_card_two_genaral_content_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .feature-card .feature-card-content h6',

            ]
        );

        $this->add_control(
            'triprex_feature_card_two_genaral_content_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_two_genaral_content_style_title_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_two_genaral_content_style_title_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-card .feature-card-content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_two_genaral_content_style_description_sec',
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
                'name'     => 'triprex_feature_card_two_genaral_content_style_description_sec_typ',
                'selector' => '{{WRAPPER}} .feature-card .feature-card-content p',

            ]
        );

        $this->add_control(
            'triprex_feature_card_two_genaral_content_style_description_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_two_genaral_content_style_description_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_two_genaral_content_style_description_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-card .feature-card-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // =====================Style Three=======================//

        $this->start_controls_section(
            'triprex_feature_card_three_style',
            [
                'label' => esc_html__('Feature Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_genaral_icon_sec_bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card.style-3' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'triprex_feature_card_three_genaral_icon_sec_hov_bac_color',
            [
                'label' => esc_html__('Hover Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card.style-3:hover' => 'background: {{VALUE}}',
                ],
            ]
        );


        // Icon
        $this->add_control(
            'triprex_feature_card_three_genaral_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_genaral_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .feature-card .feature-card-icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );



        $this->add_control(
            'triprex_feature_card_three_genaral_svg_size',
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
                    '{{WRAPPER}} .feature-card .feature-card-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .feature-card .feature-card-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_card_three_genaral_content_style_title_sec',
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
                'name'     => 'triprex_feature_card_three_genaral_content_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .feature-card .feature-card-content h6',

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_genaral_content_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_genaral_content_style_title_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_genaral_content_style_title_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-card .feature-card-content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_genaral_content_style_description_sec',
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
                'name'     => 'triprex_feature_card_three_genaral_content_style_description_sec_typ',
                'selector' => '{{WRAPPER}} .feature-card .feature-card-content p',

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_genaral_content_style_description_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_genaral_content_style_description_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card .feature-card-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_genaral_content_style_description_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-card .feature-card-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Feature Content
        $this->add_control(
            'triprex_feature_card_three_content_style_sec',
            [
                'label' => esc_html__('Feature Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_subtitle_style_sec',
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
                'name'     => 'triprex_feature_card_three_content_subtitle_style_sec_typ',
                'selector' => '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .eg-tag2 span',

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_subtitle_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .eg-tag2 span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_feature_card_three_content_subtitle_style_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .eg-tag2' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_content_subtitle_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .eg-tag2 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_content_subtitle_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .eg-tag2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_title_style_sec',
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
                'name'     => 'triprex_feature_card_three_content_title_style_sec_typ',
                'selector' => '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap h2',

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_title_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_content_title_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_content_title_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_desc_style_sec',
            [
                'label' => esc_html__('Description ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_feature_card_three_content_desc_style_sec_typ',
                'selector' => '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap > p',

            ]
        );

        $this->add_control(
            'triprex_feature_card_three_content_desc_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap > p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_content_desc_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_three_content_desc_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();



        //Counter
        $this->start_controls_section(
            'triprex_style_three_feature_counter_sec_style',
            [
                'label' => esc_html__('Counter Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_three_feature_counter_sec_style_style',
            [
                'label' => esc_html__('Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_style_three_feature_counter_sec_style_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .icon  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .activities-counter .single-activity .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_three_feature_counter_sec_style_size',
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
                    '{{WRAPPER}} .activities-counter .single-activity .icon  svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .activities-counter .single-activity .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_style_three_counter_num_style',
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
                'name'     => 'triprex_style_three_counter_num_style_typ',
                'selector' => '{{WRAPPER}} .activities-counter .single-activity .content .number',

            ]
        );

        $this->add_control(
            'triprex_style_three_counter_num_style_num_color',
            [
                'label'     => esc_html__('Num Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_three_counter_num_style_plus_color',
            [
                'label'     => esc_html__('Plus Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter.two .single-activity .content .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_counter_num_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_counter_num_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_three_counter_content_style',
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
                'name'     => 'triprex_style_three_counter_content_style_typ',
                'selector' => '{{WRAPPER}} .activities-counter .single-activity .content p',

            ]
        );

        $this->add_control(
            'triprex_style_three_counter_content_style_color_style_sec',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_counter_content_style_margin_sec_style',
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
            'triprex_style_three_counter_content_style_padding_sec_style',
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
            'triprex_style_three_review_style',
            [
                'label' => esc_html__(' Review Area ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_three_review_title_style_icon_color',
            [
                'label'     => esc_html__(' Review Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review .rating ul li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_three_review_title_style',
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
                'name'     => 'triprex_style_three_review_title_style_typ',
                'selector' => '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review > strong',

            ]
        );

        $this->add_control(
            'triprex_style_three_review_title_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review > strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_review_title_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review > strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_review_title_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review > strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_three_review_title_text_style',
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
                'name'     => 'triprex_style_three_review_title_text_style_typ',
                'selector' => '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review p',

            ]
        );

        $this->add_control(
            'triprex_style_three_review_title_text_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_review_title_text_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_review_title_text_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_three_review_title_total_review_style',
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
                'name'     => 'triprex_style_three_review_title_total_review_style_typ',
                'selector' => '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review p a',

            ]
        );

        $this->add_control(
            'triprex_style_three_review_title_total_review_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review p a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_review_title_total_review_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review p a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_three_review_title_total_review_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-with-content-section .feature-with-content-wrapper .feature-content-wrap .tripadvisor-review p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // =====================Style Four =======================//

        $this->start_controls_section(
            'triprex_feature_card_four_style',
            [
                'label' => esc_html__(' Feature Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_four_genaral_heading_style_sec',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_feature_card_four_genaral_heading_title_style_subtitle_sec',
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
                'name'     => 'triprex_feature_card_four_genaral_heading_subtitle_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .section-title4 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_feature_card_four_genaral_heading_subtitle_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_feature_card_four_genaral_heading_subtitle_style_title_sec_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_four_genaral_heading_subtitle_style_title_sec_margin',
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
            'triprex_feature_card_four_genaral_heading_subtitle_style_title_sec_padding',
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
            'triprex_feature_card_four_genaral_heading_title_style_title_sec',
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
                'name'     => 'triprex_feature_card_four_genaral_heading_title_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );

        $this->add_control(
            'triprex_feature_card_four_genaral_heading_title_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_four_genaral_heading_title_style_title_sec_margin',
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
            'triprex_feature_card_four_genaral_heading_title_style_title_sec_padding',
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
            'triprex_feature_card_four_genaral_heading_title_style_desc_sec',
            [
                'label' => esc_html__('Description ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_feature_card_four_genaral_heading_title_style_desc_sec_typ',
                'selector' => '{{WRAPPER}} .section-title4 p',

            ]
        );

        $this->add_control(
            'triprex_feature_card_four_genaral_heading_title_style_desc_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_four_genaral_heading_title_style_desc_sec_margin',
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
            'triprex_feature_card_four_genaral_heading_title_style_desc_sec_padding',
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
            'triprex_feature_card_four_genaral_feature_style_sec',
            [
                'label' => esc_html__('Feature Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_feature_card_four_genaral_feature_style_bac_color_sec',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'triprex_feature_card__genaral_icon_sec_hov_bac_color',
            [
                'label' => esc_html__('Hover Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3:hover' => 'background: {{VALUE}}',
                ],
            ]
        );


        // Icon
        $this->add_control(
            'triprex_feature_card_four_genaral_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_four_genaral_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3 .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3 .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_card_four_genaral_svg_size',
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
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3 .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3 .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_card_four_genaral_content_style_title_sec',
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
                'name'     => 'triprex_feature_card_four_genaral_content_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3 .content h5',

            ]
        );

        $this->add_control(
            'triprex_feature_card_four_genaral_content_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3 .content h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_card_four_genaral_content_style_title_sec_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3:hover .content h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_four_genaral_content_style_title_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3 .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_four_genaral_content_style_title_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-feature-section .feature-content .feature-card3 .content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // =====================Style Five =======================//

        $this->start_controls_section(
            'triprex_feature_card_five_style',
            [
                'label' => esc_html__('Feature Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_five_genaral_icon_sec_bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-feature-card-section' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_title_sec',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_heading_title_sec',
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
                'name'     => 'triprex_feature_card_five_genaral_content_style_heading_title_sec_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_heading_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_five_genaral_content_style_heading_title_sec_margin',
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
            'triprex_feature_card_five_genaral_content_style_heading_title_sec_padding',
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
            'triprex_feature_card_five_genaral_content_style_heading_subtitle_sec',
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
                'name'     => 'triprex_feature_card_five_genaral_content_style_heading_subtitle_sec_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_heading_subtitle_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_five_genaral_content_style_heading_subtitle_sec_margin',
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
            'triprex_feature_card_five_genaral_content_style_heading_subtitle_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title3 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        // Feature Content
        $this->add_control(
            'triprex_feature_card_five_content_style_sec',
            [
                'label' => esc_html__('Feature Content ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_hov_bac_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card2:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_five_feature_counter_sec_style_style',
            [
                'label' => esc_html__('Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_style_five_feature_counter_sec_style_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card2 .feature-card-top .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .feature-card2 .feature-card-top .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_five_feature_counter_sec_style_size',
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
                    '{{WRAPPER}} .feature-card2 .feature-card-top .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .feature-card2 .feature-card-top .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_heading_content_title_sec',
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
                'name'     => 'triprex_feature_card_five_genaral_content_style_heading_content_title_sec_typ',
                'selector' => '{{WRAPPER}} .feature-card2 .feature-card-top .title h4',

            ]
        );

        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_heading_content_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card2 .feature-card-top .title h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_five_genaral_content_style_heading_content_title_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card2 .feature-card-top .title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_five_genaral_content_style_heading_content_title_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-card2 .feature-card-top .title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_content_style__sec',
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
                'name'     => 'triprex_feature_card_five_genaral_content_style_content_style__sec_typ',
                'selector' => '{{WRAPPER}} .feature-card2 .feature-card-content p',

            ]
        );

        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_content_style__sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card2 .feature-card-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_feature_card_five_genaral_content_style_content_style__sec_hov_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-card2:hover .feature-card-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_five_genaral_content_style_content_style__sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card2 .feature-card-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_five_genaral_content_style_content_style__sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-card2 .feature-card-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Review Area
        $this->start_controls_section(
            'triprex_style_five_review_style',
            [
                'label' => esc_html__(' Review Area ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_control(
            'triprex_style_five_review_title_style',
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
                'name'     => 'triprex_style_five_review_title_style_typ',
                'selector' => '{{WRAPPER}} .tripadvisor-review > strong',

            ]
        );

        $this->add_control(
            'triprex_style_five_review_title_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review > strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_review_title_style_margin',
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
            'triprex_style_five_review_title_style_padding',
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
            'triprex_style_five_review_title_text_style',
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
                'name'     => 'triprex_style_five_review_title_text_style_typ',
                'selector' => '{{WRAPPER}} .tripadvisor-review p',

            ]
        );

        $this->add_control(
            'triprex_style_five_review_title_text_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_review_title_text_style_margin',
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
            'triprex_style_five_review_title_text_style_padding',
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
            'triprex_style_five_review_title_total_review_style',
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
                'name'     => 'triprex_style_five_review_title_total_review_style_typ',
                'selector' => '{{WRAPPER}} .tripadvisor-review p a',

            ]
        );

        $this->add_control(
            'triprex_style_five_review_title_total_review_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review p a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_five_review_title_total_review_style_margin',
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
            'triprex_style_five_review_title_total_review_style_padding',
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

        
        // =====================Style six =======================//

        $this->start_controls_section(
            'triprex_feature_card_six_style',
            [
                'label' => esc_html__('Feature Content Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_genaral__bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} home6-feature-section' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_feature_card_heading_genaral_content_style_sec',
            [
                'label' => esc_html__('Heading ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
        $this->add_control(
            'triprex_feature_card_six_genaral_content_style_subtitle_sec',
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
                'name'     => 'triprex_feature_card_six_genaral_content_style_subtitle_sec_typ',
                'selector' => '{{WRAPPER}} .section-title5 span',

            ]
        );

        $this->add_control(
            'triprex_feature_card_six_genaral_content_style_subtitle_sec_color',
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
            'triprex_feature_card_six_genaral_content_style_subtitle_sec_margin',
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
            'triprex_feature_card_six_genaral_content_style_subtitle_sec_padding',
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
            'triprex_feature_card_six_genaral_content_style_title_sec',
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
                'name'     => 'triprex_feature_card_six_genaral_content_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .section-title5 h2',

            ]
        );

        $this->add_control(
            'triprex_feature_card_six_genaral_content_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_six_genaral_content_style_title_sec_margin',
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
            'triprex_feature_card_six_genaral_content_style_title_sec_padding',
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
            'triprex_feature_card_six_genaral_content_style_description_sec',
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
                'name'     => 'triprex_feature_card_six_genaral_content_style_description_sec_typ',
                'selector' => '{{WRAPPER}} .section-title5 p',

            ]
        );

        $this->add_control(
            'triprex_feature_card_six_genaral_content_style_description_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_six_genaral_content_style_description_sec_margin',
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
            'triprex_feature_card_six_genaral_content_style_description_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title5 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

  
        // Feature Card
        $this->add_control(
            'triprex_feature_card_six_genaral_feature_card_sec',
            [
                'label' => esc_html__('Feature card', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
  
        // Icon
        $this->add_control(
            'triprex_feature_card_six_genaral_icon_sec',
            [
                'label' => esc_html__('Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_genaral_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_card_six_genaral_svg_size',
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
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_feature_card_six_content_title_style_sec',
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
                'name'     => 'triprex_feature_card_six_content_title_style_sec_typ',
                'selector' => '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .content h5',

            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_title_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .content h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_six_content_title_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_six_content_title_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_desc_style_sec',
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
                'name'     => 'triprex_feature_card_six_content_desc_style_sec_typ',
                'selector' => '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .content p',

            ]
        );

        $this->add_control(
            'triprex_feature_card_six_content_desc_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_six_content_desc_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_feature_card_six_content_desc_style_sec_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-feature-section .feature-content .single-feature .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        //Counter
        $this->start_controls_section(
            'triprex_style_six_feature_counter_sec_style',
            [
                'label' => esc_html__('Counter Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_six_feature_counter_sec_style_style',
            [
                'label' => esc_html__('Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'triprex_style_six_feature_counter_sec_style_color',
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
            'triprex_style_six_feature_counter_sec_style_size',
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
                    '{{WRAPPER}} .activities-counter .single-activity .icon  svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .activities-counter .single-activity .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_style_six_counter_num_style',
            [
                'label' => esc_html__('Counter Number ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_six_counter_num_style_typ',
                'selector' => '{{WRAPPER}} .activities-counter.two .single-activity .content .number h5',

            ]
        );

        $this->add_control(
            'triprex_style_six_counter_num_style_num_color',
            [
                'label'     => esc_html__('Num Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter.two .single-activity .content .number h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_six_counter_num_style_plus_color',
            [
                'label'     => esc_html__('Plus Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_counter_num_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_counter_num_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .activities-counter .single-activity .content .number h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_six_counter_content_style',
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
                'name'     => 'triprex_style_six_counter_content_style_typ',
                'selector' => '{{WRAPPER}} .activities-counter .single-activity .content p',

            ]
        );

        $this->add_control(
            'triprex_style_six_counter_content_style_color_style_sec',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activities-counter .single-activity .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_counter_content_style_margin_sec_style',
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
            'triprex_style_six_counter_content_style_padding_sec_style',
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
            'triprex_style_six_review_style',
            [
                'label' => esc_html__('Review Area ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_feature_content_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_six_review_title_style_icon_color',
            [
                'label'     => esc_html__(' Review Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .tripadvisor-review .rating ul li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_six_review_title_style',
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
                'name'     => 'triprex_style_six_review_title_style_typ',
                'selector' => '{{WRAPPER}} .tripadvisor-review > strong',

            ]
        );

        $this->add_control(
            'triprex_style_six_review_title_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review > strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_review_title_style_margin',
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
            'triprex_style_six_review_title_style_padding',
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
            'triprex_style_six_review_title_text_style',
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
                'name'     => 'triprex_style_six_review_title_text_style_typ',
                'selector' => '{{WRAPPER}} .tripadvisor-review p',

            ]
        );

        $this->add_control(
            'triprex_style_six_review_title_text_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_review_title_text_style_margin',
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
            'triprex_style_six_review_title_text_style_padding',
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
            'triprex_style_six_review_title_total_review_style',
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
                'name'     => 'triprex_style_six_review_title_total_review_style_typ',
                'selector' => '{{WRAPPER}} .tripadvisor-review p a',

            ]
        );

        $this->add_control(
            'triprex_style_six_review_title_total_review_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tripadvisor-review p a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_six_review_title_total_review_style_margin',
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
            'triprex_style_six_review_title_total_review_style_padding',
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
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_feature_card_content_list'];
        $data2 = $settings['triprex_feature_card_two_content_list'];
        $data3 = $settings['triprex_feature_card_three_content_list'];
        $data4 = $settings['triprex_feature_card_three_content_list_sec'];
        $data5 = $settings['triprex_feature_card_four_content_list'];
        $data6 = $settings['triprex_feature_card_five_content_list'];
        $data7 = $settings['triprex_feature_card_six_content_list'];
        $data8 = $settings['triprex_feature_card_six_content_list_sec'];
?>


        <?php if ($settings['triprex_feature_content_style_selection'] == 'style_one') : ?>
            <div class="feature-card-section ">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/section-vector4.png'); ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>" class="section-vector4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-60">
                                <?php if (!empty($settings['triprex_feature_card_heading_subtitle'])) : ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z" />
                                        </svg>
                                        <?php echo esc_html($settings['triprex_feature_card_heading_subtitle']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z" />
                                        </svg>
                                    </span>
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_feature_card_heading_title'])) : ?>
                                    <h2> <?php echo esc_html($settings['triprex_feature_card_heading_title']); ?></h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-md-4 gy-5">
                        <?php
                        $counter = 0;
                        foreach ((array)$data as $item) :
                            $counter++;
                            $class = 'feature-card';
                            if ($counter == 2 || $counter == 6) {
                                $class = 'feature-card two';
                            } elseif ($counter == 3 || $counter == 5) {
                                $class = 'feature-card three';
                            }

                        ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="<?php echo esc_attr($class); ?>">
                                    <?php if (!empty($item['triprex_feature_card_icon'])) : ?>
                                        <div class="feature-card-icon">
                                            <?php \Elementor\Icons_Manager::render_icon($item['triprex_feature_card_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="feature-card-content">
                                        <?php if (!empty($item['triprex_feature_card_title'])) : ?>
                                            <h6><?php echo esc_html($item['triprex_feature_card_title']); ?></h6>
                                        <?php endif ?>
                                        <?php if (!empty($item['triprex_feature_card_content'])) : ?>
                                            <p><?php echo esc_html($item['triprex_feature_card_content']); ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_feature_content_style_selection'] == 'style_two') : ?>
            <div class="feature-card-section">
                <div class="container">
                    <div class="row gy-5 mb-80">
                        <?php
                        $counter = 0;
                        foreach ($data2 as $item2) : ?>
                            <div class="<?php echo ($counter % 2 == 0) ? 'col-xl-4 col-md-6' : 'col-xl-4 col-md-6 pt-15' ?>">
                                <div class="<?php echo ($counter % 2 == 0) ? 'feature-card style-2' : 'feature-card style-2 secondary' ?>">
                                    <div class="feature-card-icon">
                                        <?php \Elementor\Icons_Manager::render_icon($item2['triprex_feature_card_two_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                    <div class="feature-card-content">
                                        <?php if (!empty($item2['triprex_feature_card_two_title'])) :   ?>
                                            <h6><?php echo esc_html($item2['triprex_feature_card_two_title']); ?></h6>
                                        <?php endif; ?>
                                        <?php if (!empty($item2['triprex_feature_card_two_content'])) :   ?>
                                            <p><?php echo esc_html($item2['triprex_feature_card_two_content']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        <?php
                            $counter++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['triprex_feature_content_style_selection'] == 'style_three') : ?>
            <div class="feature-with-content-section ">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home3/vector/book-tour-vector.svg'); ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>" class="section-vector">
                <div class="container">
                    <div class="feature-with-content-wrapper">
                        <div class="row g-lg-4 gy-5">
                            <div class="col-lg-6">
                                <div class="row g-sm-4 gy-5">
                                    <?php
                                    $bg_colors = ['', 'olive-bg', 'orange-bg', 'yellow-bg'];
                                    $counter = 0;

                                    foreach ((array)$data3 as $item3) :
                                        $bg_class = $bg_colors[$counter % count($bg_colors)];
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="feature-card style-3 <?php echo esc_attr($bg_class); ?>">
                                                <div class="feature-card-icon">
                                                    <?php \Elementor\Icons_Manager::render_icon($item3['triprex_feature_card_three_icon'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                                <div class="feature-card-content">
                                                    <?php if (!empty($item3['triprex_feature_card_three_title'])) : ?>
                                                        <h6><?php echo esc_html($item3['triprex_feature_card_three_title']); ?></h6>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item3['triprex_feature_card_three_content'])) : ?>
                                                        <p><?php echo esc_html($item3['triprex_feature_card_three_content']); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $counter++;
                                    endforeach;
                                    ?>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-content-wrap">
                                    <?php if (!empty($settings['triprex_feature_card_three_content_subtitle'])) :   ?>
                                        <div class="eg-tag2">
                                            <span>
                                                <?php echo esc_html($settings['triprex_feature_card_three_content_subtitle']); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_feature_card_three_content_title'])) :   ?>
                                        <h2><?php echo esc_html($settings['triprex_feature_card_three_content_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_feature_card_three_content_desc'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_feature_card_three_content_desc']); ?></p>
                                    <?php endif; ?>
                                    <div class="activities-counter two">
                                        <div class="row justify-content-center g-lg-4 gy-5">
                                            <?php foreach ((array)$data4 as $item4) : ?>
                                                <div class="col-sm-4 divider d-flex justify-content-sm-start">
                                                    <div class="single-activity">
                                                        <div class="icon">
                                                            <?php \Elementor\Icons_Manager::render_icon($item4['triprex_feature_card_three_counter_section_icon'], ['aria-hidden' => 'true']); ?>
                                                        </div>
                                                        <div class="content">
                                                            <div class="number">
                                                                <h5 class="counter"><?php echo esc_html($item4['triprex_feature_card_three_counter_number']); ?></h5>
                                                                <?php if (!empty($item4['triprex_feature_card_three_counter_extra_icon_switcher'] == 'yes')) :   ?>
                                                                    <span><?php echo esc_html__('K', 'triprex-core') ?></span>
                                                                <?php endif ?>
                                                                <?php if (!empty($item4['triprex_feature_card_three_counter_plus_icon_switcher'] == 'yes')) :   ?>
                                                                    <span><?php echo esc_html__('+', 'triprex-core') ?></span>
                                                                <?php endif ?>
                                                                <?php if (!empty($item4['triprex_feature_card_three_counter_plus_two_icon_switcher'] == 'yes')) :   ?>
                                                                    <span><?php echo esc_html__('%', 'triprex-core') ?></span>
                                                                <?php endif ?>
                                                            </div>
                                                            <?php if (!empty($item4['triprex_feature_card_three_content'])) :   ?>
                                                                <p><?php echo esc_html($item4['triprex_feature_card_three_content']); ?></p>
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
                                                <strong><?php echo esc_html($settings['triprex_feature_card_three_content_review_title']); ?></strong>
                                                <div class="rating">
                                                    <ul>
                                                        <?php $rank_counter = intval($settings['triprex_feature_card_three_content_review_star']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-circle-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                    <p><strong><?php echo sprintf("%2d.0", $rank_counter) ?></strong><?php echo wp_kses($settings['triprex_feature_card_three_content_review_number'], wp_kses_allowed_html('post'))  ?> <a href="<?php echo esc_url($settings['triprex_feature_card_three_content_review_total_review_url']['url']) ?>"><?php echo wp_kses($settings['triprex_feature_card_three_content_review_total_review'], wp_kses_allowed_html('post'))  ?></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['triprex_feature_content_style_selection'] == 'style_four') : ?>
            <div class="home5-feature-section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="feature-content">
                            <div class="section-title4 mb-40">
                                <?php if (!empty($settings['triprex_feature_four_heading_subtitle_section_genaral'])) :   ?>
                                    <div class="eg-section-tag">
                                        <span><?php echo esc_html($settings['triprex_feature_four_heading_subtitle_section_genaral']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_feature_four_heading_title_section_genaral'])) :   ?>
                                    <h2><?php echo esc_html($settings['triprex_feature_four_heading_title_section_genaral']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['triprex_feature_four_heading_content_section_genaral'])) :   ?>
                                    <p><?php echo esc_html($settings['triprex_feature_four_heading_content_section_genaral']); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="row g-4">
                                <?php foreach ((array)$data5 as $item) : ?>
                                    <div class="col-sm-6">
                                        <div class="feature-card3">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item['triprex_feature_card_four_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <?php if (!empty($item['triprex_feature_card_four_title'])) :   ?>
                                                <div class="content">
                                                    <h5><?php echo wp_kses($item['triprex_feature_card_four_title'], wp_kses_allowed_html('post'))  ?></h5>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <div class="feature-img-wrap">
                            <?php if (!empty($settings['triprex_feature_four_banner_top_image_section_genaral']['url'])) :   ?>
                                <div class="feature-top-img">
                                    <img src="<?php echo esc_url($settings['triprex_feature_four_banner_top_image_section_genaral']['url']) ?>" alt="<?php echo esc_attr__('Image', 'triprex-core') ?>">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['triprex_feature_four_banner_bottom_image_section_genaral']['url'])) :   ?>
                                <div class="feature-bottom-img">
                                    <img src="<?php echo esc_url($settings['triprex_feature_four_banner_bottom_image_section_genaral']['url']) ?>" alt="<?php echo esc_attr__('Image', 'triprex-core') ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['triprex_feature_content_style_selection'] == 'style_five') : ?>
            <div class="home4-feature-card-section pt-120">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="section-title3 text-center">
                                <?php if (!empty($settings['triprex_feature_card_five_heading_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['triprex_feature_card_five_heading_title']); ?> </h2>
                                <?php endif ?>
                                <?php if (!empty($settings['triprex_feature_card_five_heading_subtitle'])) :   ?>
                                    <p><?php echo esc_html($settings['triprex_feature_card_five_heading_subtitle']); ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-lg-4 gy-5 mb-30">
                        <?php foreach ((array)$data6 as $item) : ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="feature-card2">
                                    <div class="feature-card-top">
                                        <?php if (!empty($item['triprex_feature_card_five_icon'])) :   ?>
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($item['triprex_feature_card_five_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                        <?php endif ?>
                                        <?php if (!empty($item['triprex_feature_card_five_title'])) :   ?>
                                            <div class="title">
                                                <h4><?php echo esc_html($item['triprex_feature_card_five_title']); ?></h4>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <?php if (!empty($item['triprex_feature_card_five_content'])) :   ?>
                                        <div class="feature-card-content">
                                            <p><?php echo esc_html($item['triprex_feature_card_five_content']); ?></p>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="tripadvisor-review">
                                <?php if (!empty($settings['triprex_feature_card_five_content_review_title'])) :   ?>
                                    <strong><?php echo esc_html($settings['triprex_feature_card_five_content_review_title']); ?></strong>
                                <?php endif ?>
                                <div class="rating">
                                    <ul>
                                        <?php $rank_counter = intval($settings['triprex_feature_card_five_content_review_star']);
                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <?php if ($i <= $rank_counter) : ?>
                                                <li><i class="bi bi-circle-fill"></i></li>
                                            <?php endif ?>
                                        <?php endfor; ?>
                                        <li class="rev-num-five"><strong><?php echo sprintf("%2d.0", $rank_counter) ?></strong><?php echo wp_kses($settings['triprex_feature_card_five_content_review_number'], wp_kses_allowed_html('post'))  ?> <a href="<?php echo esc_url($settings['triprex_feature_card_five_content_review_total_review_url']['url']) ?>"><?php echo wp_kses($settings['triprex_feature_card_five_content_review_total_review'], wp_kses_allowed_html('post'))  ?></a></li>
                                    </ul>
                                </div>
                                <?php \Elementor\Icons_Manager::render_icon($settings['triprex_feature_card_five_content_review_logo'], ['aria-hidden' => 'true']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['triprex_feature_content_style_selection'] == 'style_six') : ?>
            <div class="home6-feature-section">
                <div class="container one">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="feature-content">
                                <div class="section-title5 mb-50">
                                    <?php if (!empty($settings['triprex_feature_card_six_heading_subtitle'])) :   ?>
                                        <span>
                                            <?php echo esc_html($settings['triprex_feature_card_six_heading_subtitle']); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <g opacity="0.8">
                                                    <path d="M9.06226 11.3626L8.55838 13.7263L6.22997 20.0004L7.61194 19.7701L14.0678 11.3277C14.979 11.296 15.8626 11.2471 16.6304 11.1713C20.1826 10.82 19.9984 10.0002 19.9984 10.0002C19.9984 10.0002 20.1826 9.18031 16.6304 8.829C15.8626 8.7529 14.9789 8.70407 14.0678 8.67261L7.61197 0.229974L6.22997 -6.01907e-07L8.55838 6.27416L9.06226 8.6378C7.87942 8.6555 7.07898 8.68244 7.07898 8.68244C7.07898 8.68244 5.44724 8.7201 2.92253 9.28895L0.864093 6.43364L-0.000128074 6.43364L0.615287 9.90529C0.504522 9.93924 0.504522 10.0611 0.615287 10.0951L-0.000128385 13.5667L0.864093 13.5667L2.92253 10.7117C5.44724 11.2806 7.07898 11.3177 7.07898 11.3177C7.07898 11.3177 7.87942 11.3449 9.06226 11.3626Z" />
                                                    <path d="M13.4102 13.2575L13.4102 14.1895L9.96575 14.1895L9.96575 13.2575L13.4102 13.2575ZM13.4102 5.81414L13.4102 6.7458L9.96595 6.7458L9.96595 5.81414L13.4102 5.81414ZM11.0863 16.385L11.0863 17.3167L7.90291 17.3167L7.90291 16.385L11.0863 16.385ZM11.0863 2.68689L11.0863 3.61885L7.90291 3.61885L7.90291 2.68689L11.0863 2.68689Z" />
                                                </g>
                                            </svg>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_feature_card_six_heading_title'])) :   ?>
                                        <h2><?php echo esc_html($settings['triprex_feature_card_six_heading_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['triprex_feature_card_six_heading_desc'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_feature_card_six_heading_desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="row gy-sm-5 gy-4 mb-60">
                                    <?php foreach ((array)$data7 as $item) : ?>
                                        <div class="col-sm-6">
                                            <div class="single-feature">
                                                <?php if (!empty($item['triprex_feature_card_six_icon'])) :   ?>
                                                    <div class="icon">
                                                        <?php \Elementor\Icons_Manager::render_icon($item['triprex_feature_card_six_icon'], ['aria-hidden' => 'true']); ?>
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="content">
                                                        <?php if (!empty($item['triprex_feature_card_six_title'])) :   ?>
                                                            <h5><?php echo esc_html($item['triprex_feature_card_six_title']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['triprex_feature_card_six_content'])) :   ?>
                                                            <p><?php echo esc_html($item['triprex_feature_card_six_content']); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="activities-counter two">
                                    <div class="row justify-content-center g-lg-4 gy-5">
                                        <?php foreach ((array)$data8 as $item) : ?>
                                            <div class="col-sm-4 divider d-flex justify-content-sm-start">
                                                <div class="single-activity">
                                                    <?php if (!empty($item['triprex_feature_card_six_counter_section_icon'])) :   ?>
                                                        <div class="icon">
                                                            <?php \Elementor\Icons_Manager::render_icon($item['triprex_feature_card_six_counter_section_icon'], ['aria-hidden' => 'true']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="content">
                                                        <div class="number">
                                                            <?php if (!empty($item['triprex_feature_card_six_counter_number'])) :   ?>
                                                                <h5 class="counter"><?php echo esc_html($item['triprex_feature_card_six_counter_number']); ?></h5>
                                                            <?php endif; ?>
                                                            <?php if (!empty($item['triprex_feature_card_six_counter_extra_two_icon_switcher'] == 'yes')) :   ?>
                                                                <span><?php echo esc_html__('K', 'triprex-core') ?></span>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['triprex_feature_card_six_counter_extra_icon_switcher'] == 'yes')) :   ?>
                                                                <span><?php echo esc_html__('%', 'triprex-core') ?></span>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['triprex_feature_card_six_counter_plus_icon_switcher'] == 'yes')) :   ?>
                                                                <span><?php echo esc_html__('+', 'triprex-core') ?></span>
                                                            <?php endif ?>
                                                        </div>
                                                        <?php if (!empty($item['triprex_feature_card_six_counter_content'])) :   ?>
                                                            <p><?php echo esc_html($item['triprex_feature_card_six_counter_content']); ?></p>
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
                                            <?php if (!empty($settings['triprex_feature_card_six_content_review_title'])) :   ?>
                                                <strong><?php echo esc_html($settings['triprex_feature_card_six_content_review_title']); ?></strong>
                                            <?php endif ?>
                                            <div class="rating">
                                                <ul>
                                                    <?php $rank_counter = intval($settings['triprex_feature_card_six_content_review_star']);
                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <?php if ($i <= $rank_counter) : ?>
                                                            <li><i class="bi bi-circle-fill"></i></li>
                                                        <?php endif ?>
                                                    <?php endfor; ?>
                                                    <li class="rev-num-six"><strong><?php echo sprintf("%2d.0", $rank_counter) ?></strong><?php echo wp_kses($settings['triprex_feature_card_six_content_review_number'], wp_kses_allowed_html('post'))  ?> <a href="<?php echo esc_url($settings['triprex_feature_card_six_content_review_total_review_url']['url']) ?>"><?php echo wp_kses($settings['triprex_feature_card_six_content_review_total_review'], wp_kses_allowed_html('post'))  ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="feature-img-wrap">
                                <div class="row g-0">
                                    <div class="col-xl-8">
                                        <?php if (!empty($settings['triprex_feature_card_six_content_banner_image_top']['url'])) :   ?>
                                            <div class="feature-top-img">
                                                <img src="<?php echo esc_url($settings['triprex_feature_card_six_content_banner_image_top']['url']) ?>" alt="<?php echo esc_attr__('Image', 'triprex-core') ?>">
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="col-xl-4">
                                        <?php if (!empty($settings['triprex_feature_card_six_content_banner_image_bottom']['url'])) :   ?>
                                            <div class="feature-bottom-img">
                                                <img src="<?php echo esc_url($settings['triprex_feature_card_six_content_banner_image_bottom']['url']) ?>" alt="<?php echo esc_attr__('Image', 'triprex-core') ?>">
                                            </div>
                                        <?php endif ?>
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

Plugin::instance()->widgets_manager->register(new Triprex_Feature_Widget());
