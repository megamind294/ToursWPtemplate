<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_FAQ_With_Tab_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_faq_with_tab';
    }

    public function get_title()
    {
        return esc_html__('EG FAQs With Tab', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-accordion';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'triprex_faq_sec',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );


        $this->add_control(
            'triprex_faq_image',
            [
                'label' => esc_html__('Left Side Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_faq_accordion_heading_area',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_faq_accordion_title',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Why You Should Choose Our Travel Services.'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_faq_genaral_sec',
            [
                'label' => esc_html__('FAQ Tab ', 'triprex-core'),

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_faq_genaral_sec_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('General Travel'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_faq_tab_list',
            [
                'label' => esc_html__('Tab List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_faq_genaral_sec_title' => esc_html('General Travel'),
                    ],
                    [
                        'triprex_faq_genaral_sec_title' => esc_html('Transportation'),
                    ],
                    [
                        'triprex_faq_genaral_sec_title' => esc_html('Payment'),
                    ],

                ],
                'title_field' => '{{{ triprex_faq_genaral_sec_title }}}',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'triprex_faq_content_sec',
            [
                'label' => esc_html__('FAQ Content ', 'triprex-core'),

            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_faq_genaral_sec_title_two',
            [
                'label' => esc_html__('Tab Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('General Travel'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
                'description' => esc_html__('Enter the tab title for the tab.', 'triprex-core'),
            ]
        );


        // Accordion title
        $repeater->add_control(
            'triprex_faq_content_sec_accordion_title',
            [
                'label' => esc_html__('Question', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html(' 01. How do I book a trip with your agency? '),
                'label_block' => true,
                'description' => esc_html__('Enter the question for the tab.', 'triprex-core'),

            ]
        );

        // Accordion Description
        $repeater->add_control(
            'triprex_faq_content_sec_accordion_description',
            [
                'label' => esc_html__('Answer', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html('Aptent taciti sociosqu ad litora torquent per conubia nostra, per inci only Integer purus onthis felis non aliquam.Mauris nec just vitae ann auctor tol euismod sit amet non ipsul growing this.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
                'description' => esc_html__('Enter the answer for the tab.', 'triprex-core'),

            ]
        );

        $this->add_control(
            'triprex_faq_content_sec_accordion_list',
            [
                'label' => esc_html__('Accordion List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_faq_content_sec_accordion_title' => esc_html('01. How do I book a trip with your agency?'),
                        'triprex_faq_genaral_sec_title_two' => esc_html__(' General Travel '),

                    ],
                    [
                        'triprex_faq_content_sec_accordion_title' => esc_html('02. What payment methods do you accept?'),
                        'triprex_faq_genaral_sec_title_two' => esc_html__(' Transportation '),

                    ],
                    [
                        'triprex_faq_content_sec_accordion_title' => esc_html('03. What is your cancellation policy?'),
                        'triprex_faq_genaral_sec_title_two' => esc_html__(' Payment '),

                    ],

                ],
                'title_field' => '{{{ triprex_faq_genaral_sec_title_two }}}',
            ]
        );

        $this->end_controls_section();

        //////////////Style ///////////////////

        //General Section

        $this->start_controls_section(
            'triprex_faq_question_general_style_sec',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'triprex_faq_question_general_style_sec_bac_color',
            [
                'label'     => esc_html__('Backgound Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_faq_question_general_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_question_general_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_faq_heading_sec',
            [
                'label' => esc_html__(' FAQ Content ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'triprex_faq_heading_sec_title',
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
                'name'     => 'triprex_faq_heading_sec_title_typ',
                'selector' => '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content > h2',

            ]
        );

        $this->add_control(
            'triprex_faq_heading_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content > h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_heading_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content > h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_heading_sec_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content > h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_faq_tab_title_sec_title',
            [
                'label' => esc_html__(' Tab Section', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_faq_tab_title_sec_title_typ',
                'selector' => '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content .accordion-with-tab-wrap .nav-pills .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'triprex_faq_tab_title_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content .accordion-with-tab-wrap .nav-pills .nav-item .nav-link' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_faq_tab_title_sec_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content .accordion-with-tab-wrap .nav-pills .nav-item .nav-link.active' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_faq_tab_title_sec_title_active_bac_color',
            [
                'label'     => esc_html__('Active Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content .accordion-with-tab-wrap .nav-pills .nav-item .nav-link.active' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_tab_title_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content .accordion-with-tab-wrap .nav-pills .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_tab_title_sec_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-with-tab-section .accordion-with-tab-content .accordion-with-tab-wrap .nav-pills .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_faq_question_sec',
            [
                'label' => esc_html__(' Question ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_faq_question_typ',
                'selector' => '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'triprex_faq_question_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-header .accordion-button' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_question_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-header .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_question_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-header .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'triprex_faq_answer',
            [
                'label' => esc_html__(' Answer ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_faq_answer_typ',
                'selector' => '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'triprex_faq_answer_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-body' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_answer_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_answer_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_faq_tab_list'];

?>


        <div class="accordion-with-tab-section">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home3/vector/accordion-with-tab-vector1.svg'); ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>" class="vector1">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home3/vector/accordion-with-tab-vector2.svg'); ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>" class="vector2">
            <div class="container">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <?php if (!empty($settings['triprex_faq_image']['url'])) :   ?>
                            <div class="accordion-with-tab-img">
                                <img src="<?php echo esc_url($settings['triprex_faq_image']['url']) ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="accordion-with-tab-content">
                            <?php if (!empty($settings['triprex_faq_accordion_title'])) :   ?>
                                <h2><?php echo esc_html($settings['triprex_faq_accordion_title']); ?></h2>
                            <?php endif; ?>
                            <div class="accordion-with-tab-wrap">
                                <ul class="nav nav-pills" id="pills-accordion-tab" role="tablist">
                                    <?php foreach ($data as $key => $item) : ?>
                                        <?php $str = $item['triprex_faq_genaral_sec_title'];
                                        $new_str = str_replace(' ', '', $str); ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo ($key == 0) ? 'active' : ''; ?>" id="g-<?php echo esc_attr($new_str) ?>-tab" data-bs-toggle="pill" data-bs-target="#g-<?php echo esc_attr($new_str) ?>" type="button" role="tab" aria-controls="g-<?php echo esc_attr($new_str) ?>" aria-selected="true">
                                                <?php if (!empty($item['triprex_faq_genaral_sec_title'])) : ?>
                                                    <?php echo esc_html($item['triprex_faq_genaral_sec_title']); ?>
                                                <?php endif; ?>
                                            </button>

                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="tab-content" id="pills-accordion-tabContent">
                                    <?php foreach ($data as $key => $item) : ?>
                                        <?php $str = $item['triprex_faq_genaral_sec_title'];
                                        $new_str = str_replace(' ', '', $str); ?>
                                        <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : ''; ?>" id="g-<?php echo esc_attr($new_str) ?>" role="tabpanel" aria-labelledby="g-<?php echo esc_attr($new_str) ?>-tab">
                                            <div class="faq-content">
                                                <div class="accordion" id="accordionTravel<?php echo esc_attr($new_str) ?>">
                                                    <?php
                                                    $unique_prefix = uniqid('accordion_travel_');
                                                    $accordion_items = $this->get_settings('triprex_faq_content_sec_accordion_list');

                                                    if (!empty($accordion_items)) {
                                                        $index = 0;
                                                        foreach ($accordion_items as $item) {
                                                            $is_active = ($index === 0) ? 'show' : '';
                                                            $is_collapsed = ($index === 0) ? '' : 'collapsed';
                                                            $is_aria = ($index === 0) ? 'true' : 'false';
                                                            $str2 = $item['triprex_faq_genaral_sec_title_two'];
                                                            $new_str2 = str_replace(' ', '', $str2);
                                                            if (strtolower($new_str) === strtolower($new_str2)) : ?>

                                                                <div class="accordion-item">
                                                                    <h5 class="accordion-header" id="travel-heading<?php echo $index; ?>">
                                                                        <?php if (!empty($item['triprex_faq_content_sec_accordion_title'])) : ?>
                                                                            <button class="accordion-button <?php echo $is_collapsed ?> " type="button" data-bs-toggle="collapse" data-bs-target="#travel-collapse<?php echo $index; ?>" aria-expanded="<?php echo $is_aria; ?>" aria-controls="travel-collapse<?php echo $index; ?>">
                                                                                <?php echo esc_html($item['triprex_faq_content_sec_accordion_title']); ?>
                                                                            </button>
                                                                        <?php endif ?>

                                                                    </h5>
                                                                    <div id="travel-collapse<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $is_active; ?>" aria-labelledby="travel-heading<?php echo $index; ?>" data-bs-parent="#accordionTravel<?php echo esc_attr($new_str) ?>">
                                                                        <div class="accordion-body">
                                                                            <?php if (!empty($item['triprex_faq_content_sec_accordion_description'])) : ?>
                                                                                <?php echo esc_html($item['triprex_faq_content_sec_accordion_description']); ?>
                                                                            <?php endif ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif ?>
                                                    <?php
                                                            $index++;
                                                        }
                                                    }
                                                    ?>

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
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_FAQ_With_Tab_Widget());
