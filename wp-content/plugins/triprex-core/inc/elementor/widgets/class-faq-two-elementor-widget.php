<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Triprex_FAQ_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_faq';
    }

    public function get_title()
    {
        return esc_html__('EG FAQ', 'triprex-core');
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
            'triprex_faq_two_sec',
            [
                'label' => esc_html__('Accordion Contents', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_section_content_accordion_heading_area',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_section_content_accordion_title_enable',
            [
                'label' => esc_html__('Title Enable', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'triprex_section_content_accordion_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('General'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_section_content_accordion_title_enable' => 'yes',
                ],
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        // accordion title
        $repeater->add_control(
            'triprex_section_content_accordion_title',
            [
                'label' => esc_html__('Question', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html(' 01.  How do I book a trip on your website?'),
                'label_block' => true,
            ]
        );

        // accordion Description
        $repeater->add_control(
            'triprex_section_content_accordion_description',
            [
                'label' => esc_html__('Answer', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html('Aptent taciti sociosqu ad litora torquent per conubia nostra, per inci only Integer purus onthis felis non aliquam.Mauris nec just vitae ann auctor tol euismod sit amet non ipsul growing this.'),
                'placeholder' => esc_html__('Type your description here', 'triprex-core'),
            ]
        );


        $this->add_control(
            'triprex_faq_two_section_accordion_list',
            [
                'label' => esc_html__('Accordion List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_section_content_accordion_title' => esc_html('01.  How do I book a trip on your website? '),
                        'triprex_section_content_accordion_description' => esc_html('Aptent taciti sociosqu ad litora torquent per conubia nostra, per inci only Integer purus onthis felis non aliquam.Mauris nec just vitae ann auctor tol euismod sit amet non ipsul growing this '),


                    ],
                    [
                        'triprex_section_content_accordion_title' => esc_html('02. What payment methods do you accept?', 'triprex-core'),
                        'triprex_section_content_accordion_description' => esc_html('Aptent taciti sociosqu ad litora torquent per conubia nostra, per inci only Integer purus onthis felis non aliquam.Mauris nec just vitae ann auctor tol euismod sit amet non ipsul growing this '),


                    ],
                    [
                        'triprex_section_content_accordion_title' => esc_html('03. Can I make changes to my reservation after booking?', 'triprex-core'),
                        'triprex_section_content_accordion_description' => esc_html('Aptent taciti sociosqu ad litora torquent per conubia nostra, per inci only Integer purus onthis felis non aliquam.Mauris nec just vitae ann auctor tol euismod sit amet non ipsul growing this '),


                    ],
                    [
                        'triprex_section_content_accordion_title' => esc_html('04. What is your cancellation policy?', 'triprex-core'),
                        'triprex_section_content_accordion_description' => esc_html('Aptent taciti sociosqu ad litora torquent per conubia nostra, per inci only Integer purus onthis felis non aliquam.Mauris nec just vitae ann auctor tol euismod sit amet non ipsul growing this '),


                    ],

                ],
                'title_field' => '{{{ triprex_section_content_accordion_title }}}',
            ]
        );

        $this->end_controls_section();

        //////////////Style ///////////////////

        //General Section

        $this->start_controls_section(
            'triprex_faq_two_question_general_style_sec',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'triprex_faq_two_question_general_style_sec_bac_color',
            [
                'label'     => esc_html__('Backgound Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-content-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_two_question_general_style_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-content-wrap  ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_two_question_general_style_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-content-wrap ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'triprex_faq_two_question_sec',
            [
                'label' => esc_html__(' Question ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_faq_two_question_typ',
                'selector' => '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'triprex_faq_two_question_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-header .accordion-button' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_two_question_margin',
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
            'triprex_faq_two_question_padding',
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
            'triprex_faq_two_answer',
            [
                'label' => esc_html__(' Answer ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_faq_two_answer_typ',
                'selector' => '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'triprex_faq_two_answer_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-content .accordion .accordion-item .accordion-body' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_faq_two_answer_margin',
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
            'triprex_faq_two_answer_padding',
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
        $data = $settings['triprex_faq_two_section_accordion_list'];
?>

        <div class="faq-section">
            <div class="faq-content-wrap">
                <?php if ('yes' == $settings['triprex_section_content_accordion_title_enable']) { ?>
                    <?php if (!empty($settings['triprex_section_content_accordion_title'])) :   ?>
                        <div class="faq-content-title mb-50">
                            <h3> <?php echo esc_html($settings['triprex_section_content_accordion_title']); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                                    <path opacity="0.2" d="M12.1406 3.31569L13.6613 1.28328C14.2277 0.526342 15.4311 0.905329 15.4615 1.85022L15.5502 4.60677C15.5714 5.26711 16.2158 5.72572 16.8467 5.52947L19.16 4.80985C20.0802 4.52359 20.8331 5.57662 20.2644 6.35473L18.8298 8.3179C18.4362 8.85663 18.6705 9.62248 19.2982 9.84869L21.6962 10.7128C22.5984 11.038 22.5699 12.3236 21.6542 12.6085L19.3662 13.3202C18.7146 13.5229 18.453 14.3043 18.8511 14.8585L20.246 16.8005C20.8121 17.5885 20.0372 18.6398 19.117 18.3324L16.6866 17.5204C16.039 17.304 15.3697 17.786 15.3697 18.4688V21.026C15.3697 21.9843 14.1519 22.3938 13.5729 21.6301L11.9573 19.4993C11.5506 18.9629 10.7409 18.9734 10.3482 19.5201L8.84725 21.6096C8.29002 22.3854 7.06631 22.0131 7.03559 21.0584L6.94981 18.3932C6.92856 17.7329 6.28416 17.2743 5.65329 17.4705L3.39578 18.1728C2.47005 18.4608 1.71725 17.3951 2.29806 16.6188L3.63735 14.8289C4.04321 14.2865 3.80363 13.506 3.16335 13.2847L0.734445 12.4451C-0.163318 12.1348 -0.163315 10.8652 0.734448 10.5549L3.16335 9.71533C3.80363 9.49403 4.04321 8.71352 3.63735 8.1711L2.17821 6.22099C1.60964 5.46111 2.32026 4.41074 3.23712 4.65581L5.87202 5.36011C6.507 5.52984 7.13025 5.0513 7.13025 4.39403V1.87955C7.13025 0.93114 8.32718 0.515473 8.91501 1.25974L10.5552 3.3364C10.9622 3.85179 11.7471 3.84154 12.1406 3.31569Z" />
                                </svg>
                            </h3>
                        </div>
                    <?php endif ?>
                <?php } ?>
                <div class="faq-content">
                    <?php $unique_prefix = uniqid('accordion_travel_'); ?>
                    <div class="accordion" id="accordionTravel_<?php echo $unique_prefix; ?>">
                        <?php
                        $accordion_items = $this->get_settings('triprex_faq_two_section_accordion_list');

                        if (!empty($accordion_items)) {
                            $index = 0;
                            foreach ($accordion_items as $item) {
                                $is_active = ($index == 0) ? 'show' : '';
                                $is_collapsed = ($index == 0) ? '' : 'collapsed';
                                $is_aria = ($index == 0) ? 'true' : 'false';
                                $accordion_id = $unique_prefix . '_' . $index;
                                $parent_id = 'accordionParent_' . $unique_prefix;

                        ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="travelheading<?php echo $accordion_id; ?>">
                                        <button class="accordion-button <?php echo $is_collapsed ?>" type="button" data-bs-toggle="collapse" data-bs-target="#travelcollapse<?php echo $accordion_id; ?>" aria-expanded="<?php echo $is_aria; ?>" aria-controls="travelcollapse<?php echo $accordion_id; ?>">
                                            <?php if (!empty($item['triprex_section_content_accordion_title'])) :   ?>
                                                <?php echo esc_html($item['triprex_section_content_accordion_title']); ?>
                                            <?php endif ?>
                                        </button>
                                    </h2>
                                    <div id="travelcollapse<?php echo $accordion_id; ?>" class="accordion-collapse collapse <?php echo $is_active; ?>" aria-labelledby="travelheading<?php echo $accordion_id; ?>" data-bs-parent="#accordionTravel_<?php echo $unique_prefix; ?>">
                                        <div class="accordion-body">
                                            <?php if (!empty($item['triprex_section_content_accordion_description'])) :   ?>
                                                <?php echo esc_html($item['triprex_section_content_accordion_description']); ?>
                                            <?php endif ?> </div>
                                    </div>
                                </div>
                        <?php
                                $index++;
                            }
                        }
                        ?>
                    </div>

                </div>

            </div>
        </div>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_FAQ_Widget());
