<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Testimonial_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_testimonial';
    }

    public function get_title()
    {
        return esc_html__('EG Testimonial ', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        //Content One
        $this->start_controls_section(
            'triprex_testimonial_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_style_selection',
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
            'triprex_testimonial_genaral_sec',
            [
                'label' => esc_html__('Testimonial Tab ', 'triprex-core'),
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_one'
                ]
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_testimonial_tab_section',
            [
                'label' => esc_html__('Tab Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_tab_section_icon',
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
            'triprex_testimonial_tab_section_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tripadvisor'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_testimonial_list',
            [
                'label' => esc_html__('Testimony List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_testimonial_tab_section_title' => esc_html('Tripadvisor'),
                    ],
                    [
                        'triprex_testimonial_tab_section_title' => esc_html('Facebook'),
                    ],
                    [
                        'triprex_testimonial_tab_section_title' => esc_html('Google'),
                    ],


                ],
                'title_field' => '{{{ triprex_testimonial_tab_section_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_testimonial_genaral_content_sec',
            [
                'label' => esc_html__('Testimony', 'triprex-core'),
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_one'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_testimonial_tab_section',
            [
                'label' => esc_html__('Tab Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_testimony_content_sec',
            [
                'label' => esc_html__('Testimony', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_testimony_content_two',
            [
                'label' => esc_html__('Tab Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tripadvisor'),
                'placeholder' => esc_html__('Type your tab title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_testimony_content',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('“I cannot express enough how satisfied I am with the web development services provided by Egens Lab. From the initial consultation to the final delivery, they have exceeded.”'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_testimony_review_seelection',
            [
                'label' => esc_html__('Rating From ?', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'general' => esc_html__('General', 'triprex-core'),
                    'tripadvisor'  => esc_html__('Tripadvisor', 'triprex-core'),
                ],
                'default' => 'general',
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_testimony_review_star',
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
            'triprex_testimonial_testimony_review_logo',
            [
                'label' => esc_html__('Review Logo', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_testimony_review_date',
            [
                'label' => esc_html__('Date', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('May 9, 2023'),
                'placeholder' => esc_html__('Type your date here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_testimony_review_time',
            [
                'label' => esc_html__('Time', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('10.30 PM'),
                'placeholder' => esc_html__('Type your time here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_author_cention',
            [
                'label' => esc_html__('Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_author_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_author_name',
            [
                'label' => esc_html__(' Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mr. Daniel Scoot'),
                'placeholder' => esc_html__('Type your author name here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_author_country',
            [
                'label' => esc_html__(' Country', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Bangladesh'),
                'placeholder' => esc_html__('Type your author country here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_testimonial_content_list',
            [
                'label' => esc_html__('Testimony List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_testimonial_testimony_content_two' => esc_html('Tripadvisor'),
                    ],
                    [
                        'triprex_testimonial_testimony_content_two' => esc_html('Facebook'),
                    ],
                    [
                        'triprex_testimonial_testimony_content_two' => esc_html('Google'),
                    ],



                ],
                'title_field' => '{{{ triprex_testimonial_testimony_content_two }}}',
            ]
        );

        $this->end_controls_section();

        //Content Two
        $this->start_controls_section(
            'triprex_testimonial_two_genaral_sec',
            [
                'label' => esc_html__('Testimonial  ', 'triprex-core'),
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_two_genaral_heading_sec',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_two_genaral_heading_tag_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Testimonial'),
                'placeholder' => esc_html__('Type your heading tag title here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'triprex_testimonial_two_genaral_heading_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Find The Compliments From Our Travelers'),
                'placeholder' => esc_html__('Type your heading title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_testimonial_two_genaral_heading_content_sec',
            [
                'label' => esc_html__(' Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Nunc volutpat sagittis cursus. Praesent sed dolor pellentesque, consectetur velon sit amet, pharetra ipsum. Fusce europ ultrices tortor. Praesent vehicula commodo purus at vulputate one of the most popular tourist place.'),
                'placeholder' => esc_html__('Type your heading description here', 'triprex-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'triprex_testimonial_two_genaral_review_sec',
            [
                'label' => esc_html__('Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_two_genaral_review_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Review On'),
                'placeholder' => esc_html__('Type your review title here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_testimonial_two_genaral_review_review_seelection',
            [
                'label' => esc_html__('Rating From ?', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'general' => esc_html__('General', 'triprex-core'),
                    'tripadvisor'  => esc_html__('Tripadvisor', 'triprex-core'),
                ],
                'default' => 'general',
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_two_genaral_review_review_star',
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
            'triprex_testimonial_two_genaral_review_review_logo',
            [
                'label' => esc_html__('Review Logo', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_two_genaral_review_total_num_sec',
            [
                'label' => esc_html__(' Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('5.0'),
                'placeholder' => esc_html__('Type your review number here', 'triprex-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'triprex_testimonial_two_genaral_review_link',
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
            'triprex_testimonial_two_genaral_review_list',
            [
                'label' => esc_html__('Testimonial tab List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_testimonial_two_genaral_review_total_num_sec' => esc_html('5.0'),
                    ],

                ],
                'title_field' => '{{{ triprex_testimonial_two_genaral_review_total_num_sec }}}',
            ]
        );


        $this->add_control(
            'triprex_testimonial_two_genaral_review_testimony_sec',
            [
                'label' => esc_html__('Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_testimonial_two_genaral_review_content_sec',
            [
                'label' => esc_html__(' Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('“I cannot express enough how satisfied I am with the web development services provided by Egens Lab. From the initial consultation to the final delivery, they have exceeded.”'),
                'placeholder' => esc_html__('Type your review description here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
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

        $repeater->add_control(
            'triprex_testimonial_two_genaral_review_testimony_author_sec',
            [
                'label' => esc_html__('Author', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_two_genaral_review_testimony_author_image_sec',
            [
                'label' => esc_html__('Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_two_genaral_review_testimony_author_name_sec',
            [
                'label' => esc_html__('Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Lian Nokhan'),
                'placeholder' => esc_html__('Type your author name here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_two_genaral_review_testimony_author_designation_sec',
            [
                'label' => esc_html__('Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('CTO,ToruXpro'),
                'placeholder' => esc_html__('Type your author designation here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_testimonial_two_genaral_review_testimony_list',
            [
                'label' => esc_html__('Testimony List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_testimonial_two_genaral_review_content_sec' => esc_html('“I cannot express enough how satisfied I am with the web development services provided by Egens Lab. From the initial consultation to the final delivery, they have exceeded.”'),
                    ],

                ],
                'title_field' => '{{{ triprex_testimonial_two_genaral_review_content_sec }}}',
            ]
        );

        $this->end_controls_section();

        //Content Three
        $this->start_controls_section(
            'triprex_testimonial_three_genaral_sec',
            [
                'label' => esc_html__('Testimonial  ', 'triprex-core'),
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_three_genaral_review_testimony_heading_sec',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_three_genaral_review_testimony_heading_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Reviews by Travellers '),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_testimonial_three_genaral_review_testimony_heading_content',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_testimonial_three_genaral_review_testimony_sec',
            [
                'label' => esc_html__('Testimonial Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_testimonial_three_genaral_review_review_star',
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
            'triprex_testimonial_three_genaral_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tour Breathtaking England'),
                'placeholder' => esc_html__('Type your  title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_three_genaral_content_sec',
            [
                'label' => esc_html__(' Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('“I cannot express enough how satisfied I am with the webgot deve services provided by Egens Lab from the initial.”'),
                'placeholder' => esc_html__('Type your  description here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_three_author_cention',
            [
                'label' => esc_html__('Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_three_author_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_three_author_name',
            [
                'label' => esc_html__(' Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mr. Daniel Scoot'),
                'placeholder' => esc_html__('Type your author name here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_three_author_designation',
            [
                'label' => esc_html__(' Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Founder,Egenslab'),
                'placeholder' => esc_html__('Type your author designation here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_testimonial_three_genaral_review_list',
            [
                'label' => esc_html__('Testimony List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_testimonial_three_genaral_title_sec' => esc_html('Tour Breathtaking England'),
                    ],

                ],
                'title_field' => '{{{ triprex_testimonial_three_genaral_title_sec }}}',
            ]
        );



        $this->add_control(
            'triprex_testimonial_three_genaral_review_sec',
            [
                'label' => esc_html__('Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_three_genaral_bottom_review_title_num_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Rating'),
                'placeholder' => esc_html__('Type your review title here', 'triprex-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'triprex_testimonial_three_genaral_bottom_review_review_star',
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
            'triprex_testimonial_three_genaral_review_review_logo',
            [
                'label' => esc_html__('Review Logo', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_testimonial_three_genaral_review_total_num_sec',
            [
                'label' => esc_html__(' Total Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('306 Reviews'),
                'placeholder' => esc_html__('Type your review number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_testimonial_three_button_section',
            [
                'label' => esc_html__('Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_testimonial_three_button_text',
            [
                'label' => esc_html__('Button Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Write A Review'),
                'placeholder' => esc_html__('Type your button text here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_testimonial_three_button_text_url',
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
            'triprex_testimonial_four_genaral_sec',
            [
                'label' => esc_html__('Testimonial  ', 'triprex-core'),
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_four_genaral_review_testimony_sec',
            [
                'label' => esc_html__('Testimonial Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_four_genaral_review_testimony_heading_sec',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_four_genaral_heading_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Travelers Say About Us'),
                'placeholder' => esc_html__('Type your  title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_testimonial_four_genaral_heading_subtitle_sec',
            [
                'label' => esc_html__('Sub  Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Etiam ac tortor id purus commodo vulputate. Vestibulum porttitor erat felis and sed vehicula tortor malesuada gravida. Mauris volutpat enim quis.'),
                'placeholder' => esc_html__('Type your sub title here', 'triprex-core'),
                'label_block' => true,
            ]
        );



        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_testimonial_four_genaral_review_review_star',
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
            'triprex_testimonial_four_genaral_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Journey Beautiful Indonesia'),
                'placeholder' => esc_html__('Type your  title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_four_genaral_content_sec',
            [
                'label' => esc_html__(' Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('“I cannot express enough how satisfied I am with the webgot deve services provided by Egens Lab from the initial.”'),
                'placeholder' => esc_html__('Type your  description here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_four_author_cention',
            [
                'label' => esc_html__('Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_four_author_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_four_author_name',
            [
                'label' => esc_html__(' Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mr. Daniel Scoot'),
                'placeholder' => esc_html__('Type your author name here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_four_author_designation',
            [
                'label' => esc_html__(' Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Founder,Egenslab'),
                'placeholder' => esc_html__('Type your author designation here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_testimonial_four_genaral_review_list',
            [
                'label' => esc_html__('Testimony List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_testimonial_four_genaral_title_sec' => esc_html('Journey Beautiful Indonesia'),
                    ],

                ],
                'title_field' => '{{{ triprex_testimonial_four_genaral_title_sec }}}',
            ]
        );


        $this->end_controls_section();


        //Content Five
        $this->start_controls_section(
            'triprex_testimonial_five_genaral_sec',
            [
                'label' => esc_html__('Testimonial', 'triprex-core'),
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_five_genaral_review_testimony_sec',
            [
                'label' => esc_html__('Testimonial Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_five_genaral_review_testimony_heading_sec',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_five_genaral_heading_subtitle_sec',
            [
                'label' => esc_html__(' Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Testimonial'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_testimonial_five_genaral_heading_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('What They Are Say!'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_testimonial_five_genaral_review_testimony_left_image_sec',
            [
                'label' => esc_html__('Left Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'triprex_testimonial_five_genaral_review_sec',
            [
                'label' => esc_html__('Review', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_testimonial_five_genaral_review_logo_sec',
            [
                'label' => esc_html__('Logo', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );



        $repeater->add_control(
            'triprex_testimonial_five_genaral_review_logo_sec_url',
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

        $repeater->add_control(
            'triprex_testimonial_five_genaral_review_review_seelection',
            [
                'label' => esc_html__('Rating From ?', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'general' => esc_html__('General', 'triprex-core'),
                    'tripadvisor'  => esc_html__('Tripadvisor', 'triprex-core'),
                ],
                'default' => 'general',
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_five_genaral_review_review_star',
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
            'triprex_testimonial_five_genaral_total_review_sec',
            [
                'label' => esc_html__('Review Count', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('/5.0'),
                'placeholder' => esc_html__('Type your  review num here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_testimonial_five_genaral_total_review_list_sec',
            [
                'label' => esc_html__('Review List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_testimonial_five_genaral_total_review_sec' => esc_html('/5.0'),
                    ],

                ],
                'title_field' => esc_html__('Review Items', 'triprex-core'),
            ]
        );


        $this->add_control(
            'triprex_testimonial_five_genaral_testimony_sec',
            [
                'label' => esc_html__('Testimonial Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_testimonial_five_genaral_review_testimony_star',
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
            'triprex_testimonial_five_genaral_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Journey Beautiful Indonesia'),
                'placeholder' => esc_html__('Type your  title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_five_genaral_content_sec',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('"I work with Alguneb Johnl on many projects, he always on tolda forn tha excel my expectations with his qualitywork andani fastestopasn told up services, very smooth and simpl communication one the way to go upe."'),
                'placeholder' => esc_html__('Type your  description here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_five_author_cention',
            [
                'label' => esc_html__('Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_five_author_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_five_author_name',
            [
                'label' => esc_html__(' Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mr. Daniel Scoot'),
                'placeholder' => esc_html__('Type your author name here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_five_author_designation',
            [
                'label' => esc_html__(' Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Founder,Egenslab'),
                'placeholder' => esc_html__('Type your author designation here', 'triprex-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'triprex_testimonial_five_genaral_reviewtestimony_list',
            [
                'label' => esc_html__('Testimony List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_testimonial_five_genaral_title_sec' => esc_html('Journey Beautiful Indonesia'),
                    ],

                ],
                'title_field' => '{{{ triprex_testimonial_five_genaral_title_sec }}}',
            ]
        );

        $this->end_controls_section();


        //Content Six
        $this->start_controls_section(
            'triprex_testimonial_six_genaral_sec',
            [
                'label' => esc_html__('Testimonial ', 'triprex-core'),
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_six_genaral_testimony_sec',
            [
                'label' => esc_html__('Testimonial Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_testimonial_six_genaral_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Tour Breathtaking England'),
                'placeholder' => esc_html__('Type your  title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_six_genaral_content_sec',
            [
                'label' => esc_html__('Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('“I cannot express enough how satisfied I am with the webgot deve services provided by Egens Lab from the initial.Aenean fermentum. Integer auctor enim eget Fusce nec egestas risus, ac eleifend urna. Vivamus risus velit, scelerisque in dolor sit amet, sodales interdum ligula.”'),
                'placeholder' => esc_html__('Type your  description here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_six_author_cention',
            [
                'label' => esc_html__('Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_six_author_image',
            [
                'label' => esc_html__(' Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'triprex_testimonial_six_author_name',
            [
                'label' => esc_html__(' Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Mr. Daniel Scoot'),
                'placeholder' => esc_html__('Type your author name here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_six_author_designation',
            [
                'label' => esc_html__(' Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Founder,Egenslab'),
                'placeholder' => esc_html__('Type your author designation here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_testimonial_six_genaral_review_testimony_star',
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
            'triprex_testimonial_six_genaral_review_testimony_list',
            [
                'label' => esc_html__('Testimony List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_testimonial_six_genaral_title_sec' => esc_html('Tour Breathtaking England'),
                    ],

                ],
                'title_field' => '{{{ triprex_testimonial_six_genaral_title_sec }}}',
            ]
        );

        $this->end_controls_section();

        // ==================Style One ==================//

        //General Section

        $this->start_controls_section(
            'triprex_testimonial_genaral_sec_style_sec',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_style_sec_bac_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_style_sec_bac_color',
            [
                'label'     => esc_html__('Backgound Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_style_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-section  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_testimonial_genaral_sec_style',
            [
                'label' => esc_html__('Testimonial Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_sec_style_title',
            [
                'label' => esc_html__(' Testimonial Tab', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Icon
        $this->add_control(
            'triprex_testimonial_icon_sec',
            [
                'label' => esc_html__(' Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_icon_sec_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link .icon  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_testimonial_icon_sec_active_color',
            [
                'label' => esc_html__('Active Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link.active .icon  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link.active .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_testimonial_svg_size',
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
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_style_testimonial_title',
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
                'name'     => 'triprex_testimonial_genaral_sec_style_testimonial_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_style_testimonial_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_style_testimonial_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link.active' => '-webkit-text-fill-color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link.active::before' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_style_testimonial_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_style_testimonial_title_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-section .testimonial-wrapper .testimonial-nav-area .nav-pills .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Content
        $this->add_control(
            'triprex_testimonial_genaral_sec_content_style',
            [
                'label' => esc_html__(' Testimonial Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_content_desc_style',
            [
                'label' => esc_html__('  Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_sec_content_desc_style_typ',
                'selector' => '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-content p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_content_desc_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_content_desc_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_content_desc_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_sec_content_date_style',
            [
                'label' => esc_html__('Date', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_sec_content_desc_date_style_typ',
                'selector' => '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-bottom .date-and-time p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_content_desc_date_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-bottom .date-and-time p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_content_time_style',
            [
                'label' => esc_html__('Time', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_sec_content_desc_time_style_typ',
                'selector' => '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-bottom .date-and-time span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_content_desc_time_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-bottom .date-and-time span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        //Author Image SIze
        $this->add_control(
            'triprex_testimonial_genaral_sec_author_image_style',
            [
                'label' => esc_html__(' Author Image Size', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_author_image_style_size_style',
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
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-img img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //Author Name
        $this->add_control(
            'triprex_testimonial_genaral_sec_author_name_style',
            [
                'label' => esc_html__(' Author Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_sec_author_name_style_typ',
                'selector' => '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content h5',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_author_name_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_author_name_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_author_name_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Author Designation
        $this->add_control(
            'triprex_testimonial_genaral_sec_author_designation_style',
            [
                'label' => esc_html__(' Author Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_sec_author_designation_style_typ',
                'selector' => '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_author_designation_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_author_designation_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_author_designation_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();



        // ==================Style Two ==================//

        //General Section

        $this->start_controls_section(
            'triprex_testimonial_two_genaral_style_sec_style_sec',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_two_sec_style_sec_bac_image',
            [
                'label' => esc_html__(' Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_style_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-testimonial-section  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_testimonial_two_genaral_sec_style',
            [
                'label' => esc_html__('Testimonial Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_subtitle',
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
                'name'     => 'triprex_testimonial_genaral_two_sec_style_testimonial_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title2 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag.two span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_subtitle_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag.two' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_subtitle_margin',
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
            'triprex_testimonial_genaral_two_sec_style_testimonial_subtitle_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 .eg-section-tag span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_title',
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
                'name'     => 'triprex_testimonial_genaral_two_sec_style_testimonial_title_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-content-wrapper .section-title2 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_title_margin',
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
            'triprex_testimonial_genaral_two_sec_style_testimonial_title_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Content
        $this->add_control(
            'triprex_testimonial_two_genaral_sec_content_desc_style',
            [
                'label' => esc_html__('  Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_two_sec_content_desc_style_typ',
                'selector' => '{{WRAPPER}} .section-title2 p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_content_desc_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-content-wrapper .section-title2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_content_desc_style_margin',
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
            'triprex_testimonial_genaral_two_sec_content_desc_style_padding',
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
            'triprex_testimonial_genaral_two_sec_content_style',
            [
                'label' => esc_html__('Review Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_content_title_style',
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
                'name'     => 'triprex_testimonial_genaral_two_sec_content_title_style_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .testimonial-content-wrapper .review-wrap h6',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_content_title_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-content-wrapper .review-wrap h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_content_title_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-content-wrapper .review-wrap h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_content_title_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-content-wrapper .review-wrap h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_two_sec_content_total_review_style',
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
                'name'     => 'triprex_testimonial_genaral_two_sec_content_total_review_style_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .testimonial-content-wrapper .review-wrap .rating-area .single-rating a .rating span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_content_total_review_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-content-wrapper .review-wrap .rating-area .single-rating a .rating span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_content_testimony_style',
            [
                'label' => esc_html__('Testimony Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_two_sec_content_testimony_style_typ',
                'selector' => '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-content p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_content_testimony_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_content_testimony_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_content_testimony_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .tesimonial-card .testimonial-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //Author 
        $this->add_control(
            'triprex_testimonial_genaral_two_author_section_style',
            [
                'label' => esc_html__(' Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_author_image_style',
            [
                'label' => esc_html__(' Author Image Size', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_two_author_image_style_size_style',
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
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-img img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //Author Name
        $this->add_control(
            'triprex_testimonial_genaral_two_sec_author_name_style',
            [
                'label' => esc_html__(' Author Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_two_sec_author_name_style_typ',
                'selector' => '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content h5',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_author_name_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper.style-2 .author-area .author-content h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_author_name_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_two_author_name_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Author Designation
        $this->add_control(
            'triprex_testimonial_genaral_two_sec_author_designation_style',
            [
                'label' => esc_html__(' Author Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_two_sec_author_designation_style_typ',
                'selector' => '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_author_designation_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper.style-2 .author-area .author-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_author_designation_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_author_designation_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tesimonial-card-wrapper .author-area .author-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // ==================Style Three ==================//

        //General Section

        $this->start_controls_section(
            'triprex_testimonial_two_genaral_sec_style_sec',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_style_sec_bac_color',
            [
                'label'     => esc_html__(' Card Backgound Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_style_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card2  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_testimonial_three_genaral_sec_style',
            [
                'label' => esc_html__('Testimonial Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_heading_four_title_sec',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_heading_four_title_sec_sec',
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
                'name'     => 'triprex_testimonial_heading_four_title_sec_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );

        $this->add_control(
            'triprex_testimonial_heading_four_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_heading_four_title_sec_margin',
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
            'triprex_testimonial_heading_four_title_sec_padding',
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
            'triprex_testimonial_heading_four_content_sec',
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
                'name'     => 'triprex_testimonial_heading_four_content_sec_typ',
                'selector' => '{{WRAPPER}} .section-title2 p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_heading_four_content_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_heading_four_content_sec_margin',
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
            'triprex_testimonial_heading_four_content_sec_padding',
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
            'triprex_testimonial_genaral_three_sec_style_testimonial_title',
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
                'name'     => 'triprex_testimonial_genaral_three_sec_style_testimonial_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card2 h4',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_title_color_sec',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_title_margin_sec',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_two_sec_style_testimonial_title_padding_sec',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card2 h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Content
        $this->add_control(
            'triprex_testimonial_three_genaral_sec_content_desc_style',
            [
                'label' => esc_html__('  Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_three_sec_content_desc_style_typ',
                'selector' => '{{WRAPPER}} .testimonial-card2 p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_content_desc_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_content_desc_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_content_desc_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //Author 
        $this->add_control(
            'triprex_testimonial_genaral_three_author_section_style',
            [
                'label' => esc_html__(' Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_author_image_style',
            [
                'label' => esc_html__(' Author Image Size', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_three_author_image_style_size_style',
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
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-img img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //Author Name
        $this->add_control(
            'triprex_testimonial_genaral_three_sec_author_name_style',
            [
                'label' => esc_html__(' Author Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_three_sec_author_name_style_typ',
                'selector' => '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig h5',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_author_name_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_author_name_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_sec_three_author_name_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Author Designation
        $this->add_control(
            'triprex_testimonial_genaral_three_sec_author_designation_style',
            [
                'label' => esc_html__(' Author Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_three_sec_author_designation_style_typ',
                'selector' => '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_author_designation_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_author_designation_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_author_designation_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_content_style',
            [
                'label' => esc_html__('Review Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_content_title_style',
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
                'name'     => 'triprex_testimonial_genaral_three_sec_content_title_style_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .testimonial-card-slider-area .testimonial-bottom-area .rating-area .rating-top span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_content_title_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card-slider-area .testimonial-bottom-area .rating-area .rating-top span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_thgree_sec_content_title_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card-slider-area .testimonial-bottom-area .rating-area .rating-top span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_content_title_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card-slider-area .testimonial-bottom-area .rating-area .rating-top span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_content_total_review_style',
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
                'name'     => 'triprex_testimonial_genaral_three_sec_content_total_review_style_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .testimonial-card-slider-area .testimonial-bottom-area .rating-area .rating-bottom span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_content_total_review_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card-slider-area .testimonial-bottom-area .rating-area .rating-bottom span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_content_testimony_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card-slider-area .testimonial-bottom-area .rating-area .rating-bottom span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_content_testimony_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card-slider-area .testimonial-bottom-area .rating-area .rating-bottom span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //  Button 
        $this->add_control(
            'triprex_testimonial_genaral_three_btn_style',
            [
                'label' => esc_html__(' Button ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'triprex_testimonial_genaral_three_btn_style_tabs'
        );

        $this->start_controls_tab(
            'triprex_testimonial_genaral_three_btn_style_normal_tab',
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
                'name'     => 'triprex_testimonial_genaral_three_btn_style_style_typ',
                'selector' => '{{WRAPPER}} .primary-btn4 span',

            ]
        );
        $this->add_control(
            'triprex_testimonial_genaral_three_btn_style_content_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn4 span' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'triprex_testimonial_genaral_three_btn_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .primary-btn4 span' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_btn_style_style_margin',
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
            'triprex_testimonial_genaral_three_btn_style_btn_style_padding',
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
            'triprex_testimonial_genaral_three_btn_style_style_style_sec',
            [
                'label' => esc_html__('Hover', 'triprex-core'),
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_btn_style_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4 span:after ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_btn_style_color_hover',
            [
                'label'     => esc_html__('Text Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4 span:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        //////////////////////////////////////Style Four///////////////////////////////////////

        //General Section

        $this->start_controls_section(
            'triprex_testimonial_four_genaral_sec_style_sec',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_four_genaral_background_image',
            [
                'label' => esc_html__('Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_four_sec_style_sec_card_bac_color',
            [
                'label'     => esc_html__('Card Backgound Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2.style-2' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_style_sec_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-testimonial-section ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-testimonial-section ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_testimonial_four_genaral_sec_style',
            [
                'label' => esc_html__('Testimonial Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_three_sec_style_testimonial_heading_title',
            [
                'label' => esc_html__(' Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_style_testimonial_heading_title_sec',
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
                'name'     => 'triprex_testimonial_genaral_three_sec_style_testimonial_heading_title_sec_typ',
                'selector' => '{{WRAPPER}} .section-title3 h2',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_three_sec_style_testimonial_heading_title_sec_sec_style',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-testimonial-section .section-title3 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_three_sec_style_testimonial_heading_title_sec_sec_style_sec',
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
            'triprex_testimonial_genaral_three_sec_style_heading_testimonial_title_sec_sec',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title3 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_four_sec_style_testimonial_heading_title_sec',
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
                'name'     => 'triprex_testimonial_genaral_four_sec_style_testimonial_heading_title_sec_typ',
                'selector' => '{{WRAPPER}} .section-title3 p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_four_sec_style_testimonial_heading_title_sec_sec_style',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-testimonial-section .section-title3 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_style_testimonial_heading_title_sec_style_sec',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-testimonial-section .section-title3 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_style_testimonial_heading_title_sec_sec_style_sec',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-testimonial-section .section-title3 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_four_sec_style_testimonial_testimony_content_sec',
            [
                'label' => esc_html__('Testimonial Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_four_sec_style_testimonial_testimony_content_title_sec',
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
                'name'     => 'triprex_testimonial_genaral_four_sec_style_testimonial_testimony_content_title_sec_typ',
                'selector' => '{{WRAPPER}} .testimonial-card2 h4',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_four_sec_style_testimonial_testimony_content_title_color_sec_sec',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2.style-2 h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_style_testimonial_testimony_content_title_margin_sec_sec',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_style_testimonial_testimony_content_title_padding_sec_sec',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card2 h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Description
        $this->add_control(
            'triprex_testimonial_four_genaral_sec_content_desc_style',
            [
                'label' => esc_html__('  Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_four_sec_content_desc_style_typ',
                'selector' => '{{WRAPPER}} .testimonial-card2 p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_four_sec_content_desc_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2.style-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_content_desc_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_content_desc_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //Author 
        $this->add_control(
            'triprex_testimonial_genaral_four_author_section_style',
            [
                'label' => esc_html__(' Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_four_sec_author_image_style',
            [
                'label' => esc_html__(' Author Image Size', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_four_author_image_style_size_style',
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
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-img img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //Author Name
        $this->add_control(
            'triprex_testimonial_genaral_four_sec_author_name_style',
            [
                'label' => esc_html__(' Author Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_four_sec_author_name_style_typ',
                'selector' => '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig h5',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_four_sec_author_name_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2.style-2 .tesimonial-card-bottom .author-area .author-name-desig h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_author_name_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_author_name_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Author Designation
        $this->add_control(
            'triprex_testimonial_genaral_four_sec_author_designation_style',
            [
                'label' => esc_html__(' Author Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_four_sec_author_designation_style_typ',
                'selector' => '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_four_sec_author_designation_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2.style-2 .tesimonial-card-bottom .author-area .author-name-desig span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_author_designation_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_four_sec_author_designation_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card2 .tesimonial-card-bottom .author-area .author-name-desig span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_testimonial_five_genaral_sec_style',
            [
                'label' => esc_html__('Testimonial Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_five_sec_style_testimonial_heading_title',
            [
                'label' => esc_html__(' Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_five_sec_style_testimonial_heading_title_sec',
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
                'name'     => 'triprex_testimonial_genaral_five_sec_style_testimonial_heading_title_sec_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_five_sec_style_testimonial_heading_title_sec_sec_style',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_five_sec_style_testimonial_heading_title_sec_sec_style_sec',
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
            'triprex_testimonial_genaral_five_sec_style_heading_testimonial_title_sec_sec',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title4 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_five_sec_style_testimonial_testimony_content_sec',
            [
                'label' => esc_html__('Testimonial Content', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_five_sec_style_testimonial_testimony_content_title_sec',
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
                'name'     => 'triprex_testimonial_genaral_five_sec_style_testimonial_testimony_content_title_sec_typ',
                'selector' => '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .testi-content-top .rating-title h4',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_five_sec_style_testimonial_testimony_content_title_color_sec_sec',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .testi-content-top .rating-title h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_five_sec_style_testimonial_testimony_content_title_margin_sec_sec',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .testi-content-top .rating-title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_five_sec_style_testimonial_testimony_content_title_padding_sec_sec',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .testi-content-top .rating-title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Description
        $this->add_control(
            'triprex_testimonial_five_genaral_sec_content_desc_style',
            [
                'label' => esc_html__('  Description', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_five_sec_content_desc_style_typ',
                'selector' => '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_five_sec_content_desc_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_five_sec_content_desc_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_five_sec_content_desc_style_padding',
            [
                'label'      => 'Padding',
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //Author 
        $this->add_control(
            'triprex_testimonial_genaral_five_author_section_style',
            [
                'label' => esc_html__(' Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_five_sec_author_image_style',
            [
                'label' => esc_html__(' Author Image Size', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_five_author_image_style_size_style',
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
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-img img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //Author Name
        $this->add_control(
            'triprex_testimonial_genaral_five_sec_author_name_style',
            [
                'label' => esc_html__(' Author Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_five_sec_author_name_style_typ',
                'selector' => '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .author-name-desig h5',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_five_sec_author_name_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .author-name-desig h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_five_sec_author_name_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .author-name-desig h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_five_sec_author_name_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .author-name-desig h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Author Designation
        $this->add_control(
            'triprex_testimonial_genaral_five_sec_author_designation_style',
            [
                'label' => esc_html__(' Author Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_five_sec_author_designation_style_typ',
                'selector' => '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .author-name-desig span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_five_sec_author_designation_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .author-name-desig span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_five_sec_author_designation_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .author-name-desig span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_five_sec_author_designation_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonal-slider-section .testimonal-slider-wrap .testimonial-slider-area .testimonial-wrapper .testi-content .author-name-desig span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_testimonial_six_genaral_sec_style',
            [
                'label' => esc_html__('Testimonial Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'triprex_testimonial_genaral_style_selection' => 'style_six'
                ]
            ]
        );


        $this->add_control(
            'triprex_testimonial_genaral_six_sec_style_testimonial_title_sec',
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
                'name'     => 'triprex_testimonial_genaral_six_sec_style_testimonial_heading_title_sec_typ',
                'selector' => '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper h3',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_six_sec_style_testimonial_heading_title_sec_sec_style',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper h3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_six_sec_style_testimonial_heading_title_sec_sec_style_sec',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_six_sec_style_heading_testimonial_title_sec_sec',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Description
        $this->add_control(
            'triprex_testimonial_six_genaral_sec_content_desc_style',
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
                'name'     => 'triprex_testimonial_genaral_six_sec_content_desc_style_typ',
                'selector' => '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper p',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_six_sec_content_desc_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_six_sec_content_desc_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_six_sec_content_desc_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        //Author 
        $this->add_control(
            'triprex_testimonial_genaral_six_author_section_style',
            [
                'label' => esc_html__(' Author Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_six_sec_author_image_style',
            [
                'label' => esc_html__(' Author Image Size', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_sec_six_author_image_style_size_style',
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
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper .author-img img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //Author Name
        $this->add_control(
            'triprex_testimonial_genaral_six_sec_author_name_style',
            [
                'label' => esc_html__(' Author Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_six_sec_author_name_style_typ',
                'selector' => '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper .testimonial-bottom .author-name-and-desig h5',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_six_sec_author_name_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper .testimonial-bottom .author-name-and-desig h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_six_sec_author_name_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper .testimonial-bottom .author-name-and-desig h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_six_sec_author_name_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper .testimonial-bottom .author-name-and-desig h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Author Designation
        $this->add_control(
            'triprex_testimonial_genaral_six_sec_author_designation_style',
            [
                'label' => esc_html__(' Author Designation', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_testimonial_genaral_six_sec_author_designation_style_typ',
                'selector' => '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper .testimonial-bottom .author-name-and-desig span',

            ]
        );

        $this->add_control(
            'triprex_testimonial_genaral_six_sec_author_designation_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper .testimonial-bottom .author-name-and-desig span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_six_sec_author_designation_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper .testimonial-bottom .author-name-and-desig span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_testimonial_genaral_six_sec_author_designation_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-slider-area .testimonial-wrapper .testimonial-bottom .author-name-and-desig span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_testimonial_list'];
        $data2 = $settings['triprex_testimonial_content_list'];
        $data3 = $settings['triprex_testimonial_two_genaral_review_list'];
        $data4 = $settings['triprex_testimonial_two_genaral_review_testimony_list'];
        $data5 = $settings['triprex_testimonial_three_genaral_review_list'];
        $data6 = $settings['triprex_testimonial_four_genaral_review_list'];
        $data7 = $settings['triprex_testimonial_five_genaral_total_review_list_sec'];
        $data8 = $settings['triprex_testimonial_five_genaral_reviewtestimony_list'];
        $data9 = $settings['triprex_testimonial_six_genaral_review_testimony_list'];


?>

        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".testimonial-card-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    loop: true,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".testimonial-card-tab-next",
                        prevEl: ".testimonial-card-tab-prev",
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

                var swiper = new Swiper(".home2-testimonial-card-slider", {
                    slidesPerView: 1,
                    speed: 2500,
                    spaceBetween: 25,
                    loop: true,
                    // autoplay: {
                    // 	delay: 2500, // Autoplay duration in milliseconds
                    // 	disableOnInteraction: false,
                    // },
                    navigation: {
                        nextEl: ".testimonial-card-slider-next",
                        prevEl: ".testimonial-card-slider-prev",
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
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 1,
                        },
                    }
                });

                var swiper = new Swiper(".home3-testimonial-card-slider", {
                    slidesPerView: 1,
                    speed: 2500,
                    spaceBetween: 25,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination5",
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
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 2,
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

                var swiper = new Swiper(".home4-testimonial-card-slider", {
                    slidesPerView: 1,
                    speed: 2500,
                    spaceBetween: 25,
                    // autoplay: {
                    // 	delay: 2500, // Autoplay duration in milliseconds
                    // 	disableOnInteraction: false,
                    // },
                    navigation: {
                        nextEl: ".home4-testimonial-card-slider-next",
                        prevEl: ".home4-testimonial-card-slider-prev",
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
                            slidesPerView: 2,
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

                var swiper = new Swiper(".home5-testimonal-slider", {
                    slidesPerView: 1,
                    speed: 2500,
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
                        nextEl: ".home5-testimonal-slider-next",
                        prevEl: ".home5-testimonal-slider-prev",
                    },
                });

                var swiper = new Swiper(".home6-testimonial-slider", {
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
                        nextEl: ".home6-testimonial-next",
                        prevEl: ".home6-testimonial-prev",
                    },
                });
            </script>
        <?php endif ?>

        <?php if ($settings['triprex_testimonial_genaral_style_selection'] == 'style_one') : ?>
            <div class="testimonial-section" style="background-image: url(<?php echo esc_url($settings['triprex_testimonial_genaral_sec_style_sec_bac_image']['url']) ?>); background-size: cover; background-repeat: no-repeat;">
                <div class="testimonial-wrapper">
                    <div class="container">
                        <div class="testimonial-nav-area">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <?php foreach ($data as $key => $item) : ?>
                                    <?php $str = $item['triprex_testimonial_tab_section_title'];
                                    $new_str = str_replace(' ', '', $str); ?>
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link <?php echo ($key == 0) ? 'active' : ''; ?>" id="<?php echo esc_attr($new_str) ?>-tab" data-bs-toggle="tab" data-bs-target="#tech-<?php echo esc_attr($new_str) ?>" role="tab" aria-controls="tech-<?php echo esc_attr($new_str) ?>" aria-selected="true">
                                            <?php
                                            if (!empty($item['triprex_testimonial_tab_section_icon'])) {
                                            ?>
                                                <div class="icon">
                                                    <?php \Elementor\Icons_Manager::render_icon($item['triprex_testimonial_tab_section_icon'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <?php echo esc_html($item['triprex_testimonial_tab_section_title']) ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="testimonial-card-slider-area">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        <?php foreach ($data as $key => $item) : ?>
                                            <?php $str = $item['triprex_testimonial_tab_section_title'];
                                            $new_str = str_replace(' ', '', $str); ?>
                                            <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : ''; ?>" id="tech-<?php echo esc_attr($new_str) ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($new_str) ?>-tab">
                                                <div class="swiper testimonial-card-slider">
                                                    <div class="swiper-wrapper">
                                                        <?php foreach ($data2 as  $item2) : ?>
                                                            <?php $str2 = $item2['triprex_testimonial_testimony_content_two'];
                                                            $new_str2 = str_replace(' ', '', $str2);
                                                            if (strtolower($new_str) === strtolower($new_str2)) : ?>
                                                                <div class="swiper-slide">
                                                                    <div class="tesimonial-card-wrapper">
                                                                        <div class="tesimonial-card">
                                                                            <div class="testimonial-content">
                                                                                <p><?php echo esc_html($item2['triprex_testimonial_testimony_content']) ?></p>
                                                                            </div>
                                                                            <div class="testimonial-bottom">
                                                                                <div class="rating-area">
                                                                                    <?php if ('general' == $item2['triprex_testimonial_testimony_review_seelection']) { ?>
                                                                                        <ul class="rating">
                                                                                            <?php $rank_counter = intval($item2['triprex_testimonial_testimony_review_star']);
                                                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                                                <?php if ($i <= $rank_counter) : ?>
                                                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                                                <?php endif ?>
                                                                                            <?php endfor; ?>
                                                                                        </ul>
                                                                                    <?php } ?>

                                                                                    <?php if ('tripadvisor' == $item2['triprex_testimonial_testimony_review_seelection']) { ?>
                                                                                        <ul class="tripadvisor">
                                                                                            <?php $rank_counter = intval($item2['triprex_testimonial_testimony_review_star']);
                                                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                                                <?php if ($i <= $rank_counter) : ?>
                                                                                                    <li><i class="bi bi-circle-fill"></i></li>
                                                                                                <?php endif ?>
                                                                                            <?php endfor; ?>
                                                                                        </ul>
                                                                                    <?php } ?>
                                                                                    <img src="<?php echo esc_url($item2['triprex_testimonial_testimony_review_logo']['url']) ?>" alt="<?php echo esc_attr__('review-image', 'triprex-core') ?>">
                                                                                </div>
                                                                                <div class="quote">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="74" height="51" viewBox="0 0 74 51">
                                                                                        <g>
                                                                                            <path d="M34.6075 16.7875C34.5735 16.4389 34.5054 16.0817 34.4202 15.733C33.6625 6.92252 26.2643 0 17.2484 0C7.72178 0 0 7.71343 0 17.2298C0 26.474 7.28758 33.9918 16.4311 34.417C14.2261 37.8953 10.676 40.7102 6.34258 42.0369L6.19785 42.0794C4.18866 42.6917 2.80095 44.6477 2.98825 46.8248C3.20109 49.3336 5.40609 51.1961 7.9261 50.9835C15.3414 50.3541 22.7567 46.5697 27.7967 40.4211C30.3252 37.3595 32.2833 33.7537 33.4752 29.8247C34.6756 25.9042 35.0843 21.669 34.6756 17.4934L34.6075 16.7875Z" />
                                                                                            <path d="M73.1681 16.7875C73.134 16.4389 73.0659 16.0817 72.9808 15.733C72.2231 6.92252 64.8248 0 55.809 0C46.2823 0 38.5605 7.71343 38.5605 17.2298C38.5605 26.474 45.8481 33.9918 54.9917 34.417C52.7867 37.8953 49.2365 40.7102 44.9031 42.0369L44.7584 42.0794C42.7492 42.6917 41.3615 44.6477 41.5488 46.8248C41.7616 49.3336 43.9666 51.1961 46.4866 50.9835C53.9019 50.3541 61.3172 46.5697 66.3572 40.4211C68.8858 37.3595 70.8439 33.7537 72.0358 29.8247C73.2362 25.9042 73.6448 21.669 73.2362 17.4934L73.1681 16.7875Z" />
                                                                                        </g>
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="date-and-time">
                                                                                    <p><?php echo esc_html($item2['triprex_testimonial_testimony_review_date']) ?></p>
                                                                                    <span><?php echo esc_html($item2['triprex_testimonial_testimony_review_time']) ?></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="author-area">
                                                                            <div class="author-img">
                                                                                <img src="<?php echo esc_url($item2['triprex_testimonial_author_image']['url']) ?>" alt="<?php echo esc_attr__('auth-mage', 'triprex-core') ?>">
                                                                            </div>
                                                                            <div class="author-content">
                                                                                <h5><?php echo esc_html($item2['triprex_testimonial_author_name']) ?></h5>
                                                                                <span><?php echo esc_html($item2['triprex_testimonial_author_country']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="slider-btn-grp2">
                                        <div class="slider-btn testimonial-card-tab-prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17">
                                                <path d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z" />
                                            </svg>
                                        </div>
                                        <div class="slider-btn testimonial-card-tab-next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17" fill="none">
                                                <path d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>


        <?php if ($settings['triprex_testimonial_genaral_style_selection'] == 'style_two') : ?>
            <div class="home2-testimonial-section" <?php if (!empty($settings['triprex_testimonial_genaral_two_sec_style_sec_bac_image']['url'])) { ?> style="background-image:url(<?php echo esc_url($settings['triprex_testimonial_genaral_two_sec_style_sec_bac_image']['url']) ?>)" <?php } else { ?> style="background-image:linear-gradient(180deg, #1d231f 0%, #1d231f 100%), url(<?php echo get_template_directory_uri(); ?>/assets/img/home2/home2-testimonial-bg.png);" <?php } ?>>
                <div class="container-fluid">
                    <div class="row g-lg-4 gy-5">
                        <div class="col-lg-5">
                            <div class="testimonial-content-wrapper">
                                <div class="section-title2 mb-40">
                                    <?php if (!empty($settings['triprex_testimonial_two_genaral_heading_tag_title_sec'])) :   ?>
                                        <div class="eg-section-tag two">
                                            <span><?php echo esc_html($settings['triprex_testimonial_two_genaral_heading_tag_title_sec']) ?></span>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($settings['triprex_testimonial_two_genaral_heading_title_sec'])) :   ?>
                                        <h2><?php echo esc_html($settings['triprex_testimonial_two_genaral_heading_title_sec']) ?></h2>
                                    <?php endif ?>
                                    <?php if (!empty($settings['triprex_testimonial_two_genaral_heading_content_sec'])) :   ?>
                                        <p><?php echo esc_html($settings['triprex_testimonial_two_genaral_heading_content_sec']) ?></p>
                                    <?php endif ?>
                                </div>
                                <div class="review-wrap">
                                    <?php if (!empty($settings['triprex_testimonial_two_genaral_review_title_sec'])) :   ?>
                                        <h6><?php echo esc_html($settings['triprex_testimonial_two_genaral_review_title_sec']) ?></h6>
                                    <?php endif ?>
                                    <ul class="rating-area">
                                        <?php foreach ($data3 as  $item3) : ?>
                                            <li class="single-rating">
                                                <a href="<?php echo esc_url($item3['triprex_testimonial_two_genaral_review_link']['url']) ?>">
                                                    <div class="icon">
                                                        <img src="<?php echo esc_url($item3['triprex_testimonial_two_genaral_review_review_logo']['url']) ?>" alt="<?php echo esc_attr__('rating-icon', 'triprex-core') ?>">
                                                    </div>
                                                    <div class="rating">
                                                        <div class="star">
                                                            <?php if ('general' == $item3['triprex_testimonial_two_genaral_review_review_seelection']) { ?>
                                                                <ul class="rating">
                                                                    <?php $rank_counter = intval($item3['triprex_testimonial_two_genaral_review_review_star']);
                                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                        <?php if ($i <= $rank_counter) : ?>
                                                                            <li><i class="bi bi-star-fill"></i></li>
                                                                        <?php endif ?>
                                                                    <?php endfor; ?>
                                                                </ul>
                                                            <?php } ?>

                                                            <?php if ('tripadvisor' == $item3['triprex_testimonial_two_genaral_review_review_seelection']) { ?>
                                                                <ul class="tripadvisor">
                                                                    <?php $rank_counter = intval($item3['triprex_testimonial_two_genaral_review_review_star']);
                                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                        <?php if ($i <= $rank_counter) : ?>
                                                                            <li><i class="bi bi-circle-fill"></i></li>
                                                                        <?php endif ?>
                                                                    <?php endfor; ?>
                                                                </ul>
                                                            <?php } ?>
                                                        </div>
                                                        <span><?php echo sprintf("%2d.0", $rank_counter) ?> /<?php echo esc_html($item3['triprex_testimonial_two_genaral_review_total_num_sec']) ?></span>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="testimonial-card-slider-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="swiper home2-testimonial-card-slider mb-35">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($data4 as  $item4) : ?>
                                                    <div class="swiper-slide">
                                                        <div class="tesimonial-card-wrapper style-2">
                                                            <div class="tesimonial-card">
                                                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home2/vector/testi-quote.svg'); ?>" alt="<?php echo esc_attr__('quote-icon', 'triprex-core') ?>" class="quote">
                                                                <div class="testimonial-content">
                                                                    <p><?php echo esc_html($item4['triprex_testimonial_two_genaral_review_content_sec']) ?></p>
                                                                </div>
                                                                <div class="testimonial-bottom">
                                                                    <div class="rating-area">
                                                                        <ul class="rating">
                                                                            <?php $rank_counter = intval($item4['triprex_testimonial_two_genaral_review_testimony_review_star']);
                                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                                <?php if ($i <= $rank_counter) : ?>
                                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                                <?php endif ?>
                                                                            <?php endfor; ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if (!empty($item4['triprex_testimonial_two_genaral_review_testimony_author_name_sec'])) :   ?>
                                                                <div class="author-area">
                                                                    <div class="author-img">
                                                                        <img src="<?php echo esc_url($item4['triprex_testimonial_two_genaral_review_testimony_author_image_sec']['url']) ?>" alt="<?php echo esc_attr__('auth-image', 'triprex-core') ?>">
                                                                    </div>
                                                                    <div class="author-content">
                                                                        <h5><?php echo esc_html($item4['triprex_testimonial_two_genaral_review_testimony_author_name_sec']) ?></h5>
                                                                        <span><?php echo esc_html($item4['triprex_testimonial_two_genaral_review_testimony_author_designation_sec']) ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="slide-and-view-btn-grp style-3">
                                            <div class="slider-btn-grp3">
                                                <div class="slider-btn testimonial-card-slider-prev">
                                                    <i class="bi bi-arrow-left"></i>
                                                    <span><?php echo esc_html__('PREV', 'triprex-core') ?></span>
                                                </div>
                                                <div class="slider-btn testimonial-card-slider-next">
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
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_testimonial_genaral_style_selection'] == 'style_three') : ?>
            <div class="home3-testimonial-section ">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="section-title2 two text-center">
                            <?php if (!empty($settings['triprex_testimonial_three_genaral_review_testimony_heading_title'])) :   ?>
                                <h2><?php echo esc_html($settings['triprex_testimonial_three_genaral_review_testimony_heading_title']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_testimonial_three_genaral_review_testimony_heading_content'])) :   ?>
                                <p><?php echo esc_html($settings['triprex_testimonial_three_genaral_review_testimony_heading_content']) ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card-slider-area">
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="swiper home3-testimonial-card-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data5 as  $item5) : ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card2">
                                                <ul class="rating">
                                                    <?php $rank_counter = intval($item5['triprex_testimonial_three_genaral_review_review_star']);
                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <?php if ($i <= $rank_counter) : ?>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                        <?php endif ?>
                                                    <?php endfor; ?>
                                                </ul>
                                                <?php if (!empty($item5['triprex_testimonial_three_genaral_title_sec'])) :   ?>
                                                    <h4><?php echo esc_html($item5['triprex_testimonial_three_genaral_title_sec']) ?></h4>
                                                <?php endif ?>
                                                <?php if (!empty($item5['triprex_testimonial_three_genaral_content_sec'])) :   ?>
                                                    <p><?php echo esc_html($item5['triprex_testimonial_three_genaral_content_sec']) ?></p>
                                                <?php endif ?>
                                                <div class="tesimonial-card-bottom">
                                                    <div class="quote">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="74" height="51" viewBox="0 0 74 51">
                                                            <g>
                                                                <path d="M38.7831 34.2125C38.8172 34.5611 38.8853 34.9183 38.9704 35.267C39.7281 44.0775 47.1264 51 56.1422 51C65.6688 51 73.3906 43.2866 73.3906 33.7702C73.3906 24.526 66.103 17.0082 56.9595 16.583C59.1645 13.1047 62.7146 10.2898 67.048 8.96309L67.1928 8.92057C69.202 8.30826 70.5897 6.35226 70.4024 4.17515C70.1895 1.66637 67.9845 -0.196075 65.4645 0.0165336C58.0492 0.645856 50.6339 4.43028 45.5939 10.5789C43.0654 13.6405 41.1073 17.2463 39.9154 21.1753C38.715 25.0958 38.3063 29.331 38.715 33.5066L38.7831 34.2125Z" />
                                                                <path d="M0.222559 34.2125C0.256613 34.5611 0.324725 34.9183 0.409857 35.267C1.16756 44.0775 8.56582 51 17.5817 51C27.1083 51 34.8301 43.2866 34.8301 33.7702C34.8301 24.526 27.5425 17.0082 18.399 16.583C20.604 13.1047 24.1541 10.2898 28.4875 8.96309L28.6322 8.92057C30.6414 8.30826 32.0291 6.35226 31.8418 4.17515C31.629 1.66637 29.424 -0.196075 26.904 0.0165336C19.4887 0.645856 12.0734 4.43028 7.03338 10.5789C4.50486 13.6405 2.54675 17.2463 1.35486 21.1753C0.154451 25.0958 -0.254202 29.331 0.154448 33.5066L0.222559 34.2125Z" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="author-area">
                                                        <div class="author-img">
                                                            <img src="<?php echo esc_url($item5['triprex_testimonial_three_author_image']['url']) ?>" alt="<?php echo esc_attr__('auth-image', 'triprex-core') ?>">
                                                        </div>
                                                        <?php if (!empty($item5['triprex_testimonial_three_author_name'])) :   ?>
                                                            <div class="author-name-desig">
                                                                <h5><?php echo esc_html($item5['triprex_testimonial_three_author_name']) ?></h5>
                                                                <span><?php echo esc_html($item5['triprex_testimonial_three_author_designation']) ?></span>
                                                            </div>
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="quote">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="74" height="51" viewBox="0 0 74 51">
                                                            <g>
                                                                <path d="M34.6075 16.7875C34.5735 16.4389 34.5054 16.0817 34.4202 15.733C33.6625 6.92252 26.2643 0 17.2484 0C7.72178 0 0 7.71343 0 17.2298C0 26.474 7.28758 33.9918 16.4311 34.417C14.2261 37.8953 10.676 40.7102 6.34258 42.0369L6.19785 42.0794C4.18866 42.6917 2.80095 44.6477 2.98825 46.8248C3.20109 49.3336 5.40609 51.1961 7.9261 50.9835C15.3414 50.3541 22.7567 46.5697 27.7967 40.4211C30.3252 37.3595 32.2833 33.7537 33.4752 29.8247C34.6756 25.9042 35.0843 21.669 34.6756 17.4934L34.6075 16.7875Z" />
                                                                <path d="M73.1681 16.7875C73.134 16.4389 73.0659 16.0817 72.9808 15.733C72.2231 6.92252 64.8248 0 55.809 0C46.2823 0 38.5605 7.71343 38.5605 17.2298C38.5605 26.474 45.8481 33.9918 54.9917 34.417C52.7867 37.8953 49.2365 40.7102 44.9031 42.0369L44.7584 42.0794C42.7492 42.6917 41.3615 44.6477 41.5488 46.8248C41.7616 49.3336 43.9666 51.1961 46.4866 50.9835C53.9019 50.3541 61.3172 46.5697 66.3572 40.4211C68.8858 37.3595 70.8439 33.7537 72.0358 29.8247C73.2362 25.9042 73.6448 21.669 73.2362 17.4934L73.1681 16.7875Z" />
                                                            </g>
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
                    <div class="container">
                        <div class="testimonial-bottom-area">
                            <div class="rating-area">
                                <div class="rating-top">
                                    <div class="logo">
                                        <img src="<?php echo esc_url($settings['triprex_testimonial_three_genaral_review_review_logo']['url']) ?>" alt="<?php echo esc_attr__('rating-logo', 'triprex-core') ?>">
                                    </div>
                                    <span><?php echo esc_html($settings['triprex_testimonial_three_genaral_bottom_review_title_num_sec']) ?></span>
                                </div>
                                <div class="rating-bottom">
                                    <?php $rank_counter = intval($settings['triprex_testimonial_three_genaral_bottom_review_review_star']); ?>
                                    <strong><?php echo sprintf("%2d.0", $rank_counter) ?></strong>
                                    <div class="rating">
                                        <ul>
                                            <?php
                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <?php if ($i <= $rank_counter) : ?>
                                                    <li><i class="bi bi-circle-fill"></i></li>
                                                <?php endif ?>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                    <span> <?php echo esc_html($settings['triprex_testimonial_three_genaral_review_total_num_sec']) ?></span>
                                </div>
                            </div>
                            <div class="testimonial-pagination">
                                <div class="swiper-pagination5 pagination1"></div>
                            </div>
                            <div class="review-btn">
                                <?php if (!empty($settings['triprex_testimonial_three_button_text'])) :   ?>
                                    <a href="<?php echo esc_url($settings['triprex_testimonial_three_button_text_url']['url']) ?>" class="primary-btn4">
                                        <span>
                                            <?php echo esc_html($settings['triprex_testimonial_three_button_text']) ?>
                                        </span>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_testimonial_genaral_style_selection'] == 'style_four') : ?>
            <div class="home4-testimonial-section" <?php if (!empty($settings['triprex_testimonial_four_genaral_background_image']['url'])) { ?> style="background-image:url(<?php echo esc_url($settings['triprex_testimonial_four_genaral_background_image']['url']); ?>)" <?php } ?>>
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="section-title3 text-center">
                            <?php if (!empty($settings['triprex_testimonial_four_genaral_heading_title_sec'])) :   ?>
                                <h2> <?php echo esc_html($settings['triprex_testimonial_four_genaral_heading_title_sec']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_testimonial_four_genaral_heading_subtitle_sec'])) :   ?>
                                <p><?php echo esc_html($settings['triprex_testimonial_four_genaral_heading_subtitle_sec']) ?></p>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
                <div class="testimonial-card-slider-area">
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="swiper home4-testimonial-card-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data6 as  $item) : ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card2 style-2">
                                                <ul class="rating">
                                                    <?php $rank_counter = intval($item['triprex_testimonial_four_genaral_review_review_star']);
                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <?php if ($i <= $rank_counter) : ?>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                        <?php endif ?>
                                                    <?php endfor; ?>
                                                </ul>
                                                <?php if (!empty($item['triprex_testimonial_four_genaral_title_sec'])) :   ?>
                                                    <h4><?php echo esc_html($item['triprex_testimonial_four_genaral_title_sec']) ?></h4>
                                                <?php endif ?>
                                                <?php if (!empty($item['triprex_testimonial_four_genaral_content_sec'])) :   ?>
                                                    <p><?php echo esc_html($item['triprex_testimonial_four_genaral_content_sec']) ?></p>
                                                <?php endif ?>
                                                <div class="tesimonial-card-bottom">
                                                    <div class="author-area">
                                                        <?php if (!empty($item['triprex_testimonial_four_author_image']['url'])) :   ?>
                                                            <div class="author-img">
                                                                <img src="<?php echo esc_url($item['triprex_testimonial_four_author_image']['url']) ?>" alt="<?php echo esc_attr__('testi-image', 'triprex-core') ?>">
                                                            </div>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['triprex_testimonial_four_author_name'])) :   ?>
                                                            <div class="author-name-desig">
                                                                <h5><?php echo esc_html($item['triprex_testimonial_four_author_name']) ?></h5>
                                                                <span><?php echo esc_html($item['triprex_testimonial_four_author_designation']) ?></span>
                                                            </div>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="slider-btn-grp5">
                            <div class="slider-btn home4-testimonial-card-slider-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                    <path d="M42 7.18797L1.14917 7.18797M6.8649 13L1 7L6.86491 0.999997" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="slider-btn home4-testimonial-card-slider-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                    <path d="M1 6.81204H41.8508M36.1351 1.00002L42 7.00002L36.1351 13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>


        <?php if ($settings['triprex_testimonial_genaral_style_selection'] == 'style_five') : ?>
            <div class="home5-testimonal-slider-section">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="section-title4">
                            <?php if (!empty($settings['triprex_testimonial_five_genaral_heading_subtitle_sec'])) :   ?>
                                <div class="eg-section-tag">
                                    <span><?php echo esc_html($settings['triprex_testimonial_five_genaral_heading_subtitle_sec']) ?></span>
                                </div>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_testimonial_five_genaral_heading_title_sec'])) :   ?>
                                <h2><?php echo esc_html($settings['triprex_testimonial_five_genaral_heading_title_sec']) ?></h2>
                            <?php endif ?>
                        </div>
                        <ul class="rating-area">
                            <?php foreach ($data7 as  $item) : ?>
                                <li>
                                    <a href="<?php echo esc_url($item['triprex_testimonial_five_genaral_review_logo_sec_url']['url']) ?>">
                                        <div class="logo">
                                            <?php \Elementor\Icons_Manager::render_icon($item['triprex_testimonial_five_genaral_review_logo_sec'], ['aria-hidden' => 'true']); ?>
                                        </div>

                                        <div class="rating">
                                            <div class="star">
                                                <?php if ('general' == $item['triprex_testimonial_five_genaral_review_review_seelection']) { ?>
                                                    <ul class="circle-rating">
                                                        <?php $rank_counter = intval($item['triprex_testimonial_five_genaral_review_review_star']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-circle-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php } ?>

                                                <?php if ('tripadvisor' == $item['triprex_testimonial_five_genaral_review_review_seelection']) { ?>
                                                    <ul class="tripadvisor">
                                                        <?php $rank_counter = intval($item['triprex_testimonial_five_genaral_review_review_star']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-star-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                            <span><?php echo sprintf("%2d.0", $rank_counter) ?> <?php echo esc_html($item['triprex_testimonial_five_genaral_total_review_sec']) ?></span>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="testimonal-slider-wrap">
                    <div class="row g-0 align-items-center">
                        <div class="col-lg-4">
                            <?php if (!empty($settings['triprex_testimonial_five_genaral_review_testimony_left_image_sec']['url'])) :   ?>
                                <div class="testimonal-slider-left-img">
                                    <img src="<?php echo esc_url($settings['triprex_testimonial_five_genaral_review_testimony_left_image_sec']['url']) ?>" alt="<?php echo esc_attr__('testi-left', 'triprex-core') ?>">
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-lg-8">
                            <div class="testimonial-slider-area">
                                <div class="swiper home5-testimonal-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($data8 as  $item) : ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-wrapper">
                                                    <?php if (!empty($item['triprex_testimonial_five_author_image']['url'])) :   ?>
                                                        <div class="testi-img">
                                                            <img src="<?php echo esc_url($item['triprex_testimonial_five_author_image']['url']) ?>" alt="<?php echo esc_attr__('testi-img', 'triprex-core') ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="testi-content">
                                                        <div class="testi-content-top">
                                                            <div class="rating-title">
                                                                <ul class="rating">
                                                                    <?php $rank_counter = intval($item['triprex_testimonial_five_genaral_review_testimony_star']);
                                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                        <?php if ($i <= $rank_counter) : ?>
                                                                            <li><i class="bi bi-star-fill"></i></li>
                                                                        <?php endif ?>
                                                                    <?php endfor; ?>
                                                                </ul>
                                                                <h4><?php echo esc_html($item['triprex_testimonial_five_genaral_title_sec']) ?></h4>
                                                            </div>
                                                            <div class="quote">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="58" height="41" viewBox="0 0 58 41">
                                                                    <g opacity="0.08">
                                                                        <path d="M47.7685 1.34542C52.7428 6.13419 56.2328 12.7622 57.5472 19.8837C58.0118 22.4519 58.1477 27.0276 57.8191 29.2145C57.4792 31.4912 56.6181 33.7005 55.383 35.4725C52.3123 39.8799 46.6807 41.8089 41.3665 40.2837C39.2815 39.6893 37.5932 38.6799 35.9502 37.0538C34.3525 35.4725 33.5027 34.1267 32.8342 32.1528C31.7351 28.9117 31.973 25.3902 33.48 22.3734C35.3043 18.7061 38.9529 16.0258 42.8735 15.4538C44.5052 15.2183 44.3352 15.3641 44.2559 14.2314C44.0859 11.8762 43.1908 9.48746 41.4911 6.78466C40.494 5.22578 40.4033 5.45008 43.2814 2.60149C46.3181 -0.392899 46.0348 -0.314396 47.7685 1.34542ZM43.4854 6.2912C44.5958 8.09681 45.5363 10.3847 45.9329 12.3248C46.1822 13.5024 46.2275 15.779 46.0122 16.3846C45.7969 16.9566 45.5249 17.1024 44.4032 17.1809C40.29 17.5061 36.766 19.9061 35.0551 23.5622C34.2959 25.1772 34.1486 25.9398 34.1599 28.0706C34.1599 29.8201 34.1939 30.0669 34.4772 30.9865C35.6216 34.7098 38.6017 37.5697 42.3636 38.5678C43.712 38.9267 46.4201 38.9379 47.7118 38.579C52.1876 37.3566 55.247 33.6893 55.9609 28.6986C56.1308 27.465 56.1082 23.5846 55.9042 22.0145C55.5983 19.5585 55.0884 17.394 54.3178 15.2295C52.7315 10.7772 50.0347 6.437 46.6807 2.97158L46.1595 2.44448L44.5958 3.99214L43.0208 5.55102L43.4854 6.2912Z" />
                                                                        <path d="M16.0165 1.80512C21.4894 7.32287 24.9 14.6574 25.7158 22.6649C25.9085 24.5939 25.7838 28.6537 25.5006 30.0331C24.1748 36.3247 19.4838 40.5079 13.4556 40.7658C9.81837 40.9228 6.61169 39.7565 4.01688 37.3228C1.95462 35.3826 0.662884 33.0499 0.152987 30.3135C-0.107628 28.9565 -0.0283108 26.2088 0.300289 24.9752C1.59203 20.1752 5.1953 16.6761 10.011 15.5658C10.5436 15.4425 11.1668 15.3415 11.4047 15.3415C12.1072 15.3415 12.1526 15.263 12.0619 14.164C11.8693 11.8649 11.0195 9.58829 9.30848 6.79576C8.6966 5.80885 8.58329 5.55091 8.63995 5.28175C8.6966 5.05745 9.42179 4.24998 11.0081 2.67989C12.2772 1.43503 13.3877 0.358395 13.4783 0.302319C13.569 0.246246 13.8182 0.201385 14.0335 0.201385C14.3961 0.201385 14.5661 0.347179 16.0165 1.80512ZM11.5974 6.8182C13.297 9.76772 14.2262 13.2331 13.9315 15.5546C13.7503 17.0014 13.6709 17.0686 12.2092 17.1808C7.48418 17.5509 3.68827 20.5677 2.28322 25.0649C1.99995 25.9733 1.97729 26.1976 1.97729 28.0144C1.97729 29.8312 1.99995 30.0555 2.28322 30.9639C3.29169 34.1826 5.28595 36.4929 8.28868 37.8836C9.88636 38.6237 10.8835 38.8368 12.8438 38.8368C14.2601 38.8368 14.7021 38.792 15.5066 38.5789C19.3931 37.5471 22.3958 34.4181 23.427 30.3471C23.7896 28.934 23.8802 27.9359 23.8915 25.6593C23.8915 20.7359 22.8944 16.3733 20.7302 11.921C19.1438 8.65744 17.4668 6.23502 14.7587 3.29671L13.9769 2.45559L12.4132 3.99203L10.8608 5.52848L11.5974 6.8182Z" />
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <?php if (!empty($item['triprex_testimonial_five_genaral_content_sec'])) :   ?>
                                                            <p><?php echo esc_html($item['triprex_testimonial_five_genaral_content_sec']) ?></p>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['triprex_testimonial_five_author_name'])) :   ?>
                                                            <div class="author-name-desig">
                                                                <h5><?php echo esc_html($item['triprex_testimonial_five_author_name']) ?></h5>
                                                                <span><?php echo esc_html($item['triprex_testimonial_five_author_designation']) ?></span>
                                                            </div>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="slider-btn-grp5">
                                        <div class="slider-btn home5-testimonal-slider-prev swiper-button-disabled">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                                <path d="M42 7.18797L1.14917 7.18797M6.8649 13L1 7L6.86491 0.999997" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div class="slider-btn home5-testimonal-slider-next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="14" viewBox="0 0 43 14">
                                                <path d="M1 6.81204H41.8508M36.1351 1.00002L42 7.00002L36.1351 13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['triprex_testimonial_genaral_style_selection'] == 'style_six') : ?>
            <div class="home6-testimonial-section">
                <div class="container one">
                    <div class="testimonial-slider-area">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="swiper home6-testimonial-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($data9 as  $item) : ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-wrapper">
                                                    <div class="author-img">
                                                        <img src="<?php echo esc_url($item['triprex_testimonial_six_author_image']['url']) ?>" alt="<?php echo esc_attr__('auth-image', 'triprex-core') ?>">
                                                    </div>
                                                    <?php if (!empty($item['triprex_testimonial_six_genaral_title_sec'])) :   ?>
                                                        <h3><?php echo esc_html($item['triprex_testimonial_six_genaral_title_sec']) ?></h3>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_testimonial_six_genaral_content_sec'])) :   ?>
                                                        <p><?php echo esc_html($item['triprex_testimonial_six_genaral_content_sec']) ?></p>
                                                    <?php endif ?>
                                                    <div class="testimonial-bottom">
                                                        <div class="quote">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="29" viewBox="0 0 42 29">
                                                                <g>
                                                                    <path d="M9.65997 0C7.07971 0 4.65389 0.99407 2.82934 2.79909C1.0048 4.60415 0 7.00407 0 9.55677C0 10.8693 0.219996 12.1107 0.653928 13.2466C1.10189 14.4192 1.76695 15.4505 2.63064 16.312C4.4681 18.1449 7.11636 19.1136 10.289 19.1136C10.3132 19.1136 10.3316 19.115 10.345 19.1167C10.4413 19.3756 10.341 20.4863 9.17988 22.3371C7.96255 24.2773 6.1238 26.1423 4.13515 27.4535C3.82228 27.6599 3.68279 28.0445 3.79174 28.4005C3.90065 28.7565 4.23233 29 4.60833 29C6.25157 29 9.90803 27.9012 13.2463 24.8741C16.0171 22.3616 19.3199 17.7727 19.3199 10.1791C19.3199 7.30874 18.3191 4.70024 16.5017 2.83412C14.7218 1.00648 12.2921 0 9.65997 0Z" />
                                                                    <path d="M39.1853 2.83408C37.4054 1.00648 34.9757 0 32.3436 0C29.7633 0 27.3374 0.99407 25.5129 2.79909C23.6884 4.60415 22.6836 7.00407 22.6836 9.55677C22.6836 10.8693 22.9036 12.1107 23.3375 13.2466C23.7855 14.4192 24.4505 15.4505 25.3142 16.312C27.1517 18.1449 29.7999 19.1136 32.9726 19.1136C32.9968 19.1136 33.0153 19.115 33.0286 19.1167C33.1249 19.3756 33.0246 20.4863 31.8635 22.3371C30.6461 24.2774 28.8074 26.1423 26.8187 27.4535C26.5059 27.6599 26.3664 28.0445 26.4753 28.4005C26.5843 28.7565 26.916 29 27.2919 29C28.9352 29 32.5916 27.9012 35.9299 24.8741C38.7007 22.3616 42.0035 17.7727 42.0035 10.1791C42.0035 7.3087 41.0026 4.7002 39.1853 2.83408Z" />
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="author-name-and-desig">
                                                            <?php if (!empty($item['triprex_testimonial_six_author_name'])) :   ?>
                                                                <h5><?php echo esc_html($item['triprex_testimonial_six_author_name']) ?></h5>
                                                                <span><?php echo esc_html($item['triprex_testimonial_six_author_designation']) ?></span>
                                                            <?php endif ?>
                                                        </div>
                                                        <ul class="rating">
                                                            <?php $rank_counter = intval($item['triprex_testimonial_six_genaral_review_testimony_star']);
                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i <= $rank_counter) : ?>
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                <?php endif ?>
                                                            <?php endfor; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-btn-grp two d-md-block d-none">
                            <div class="slider-btn home6-testimonial-prev">
                                <i class="bi bi-arrow-left"></i>
                            </div>
                            <div class="slider-btn home6-testimonial-next">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Testimonial_Widget());
