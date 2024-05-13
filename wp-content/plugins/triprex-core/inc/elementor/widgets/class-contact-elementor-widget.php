<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Contact_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_contact';
    }

    public function get_title()
    {
        return esc_html__('EG Contact ', 'triprex-core');
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
            'triprex_contact_section_genaral_sec',
            [
                'label' => esc_html__('General', 'triprex-core'),


            ]
        );


        $this->add_control(
            'triprex_contact_section_sec',
            [
                'label' => esc_html__('Contact Information', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_contact_section_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Phone'),
                'placeholder' => esc_html__('Type your email here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'triprex_contact_section_genaral_sec_selection',
            [
                'label'   => esc_html__('Select Style', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'phone' => esc_html__('Phone', 'triprex-core'),
                    'email' => esc_html__('Email', 'triprex-core'),
                    'others' => esc_html__('Others', 'triprex-core'),

                ],
                'default' => 'phone',
            ]

        );

        $repeater->add_control(
            'triprex_contact_section_phone_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'triprex_contact_section_genaral_sec_selection' => 'phone'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_contact_section_phone_text',
            [
                'label' => esc_html__('Phone Number One', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('+990-737 621 432'),
                'placeholder' => esc_html__('Type your number here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_contact_section_genaral_sec_selection' => 'phone'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_contact_section_phone_text_two',
            [
                'label' => esc_html__('Phone Number Two', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('+990-737 621 432'),
                'placeholder' => esc_html__('Type your number here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_contact_section_genaral_sec_selection' => 'phone'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_contact_section_email_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'triprex_contact_section_genaral_sec_selection' => 'email'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_contact_section_email_text',
            [
                'label' => esc_html__('Email One', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('info@example.com'),
                'placeholder' => esc_html__('Type your email here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_contact_section_genaral_sec_selection' => 'email'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_contact_section_email_text_two',
            [
                'label' => esc_html__('Email Two', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('example@example.com'),
                'placeholder' => esc_html__('Type your email here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_contact_section_genaral_sec_selection' => 'email'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_contact_section_custom_text_icon',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'triprex_contact_section_genaral_sec_selection' => 'others'
                ]
            ]
        );

        $repeater->add_control(
            'triprex_contact_section_custom_text',
            [
                'label' => esc_html__('Custom text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('168/170, Avenue 01, Old York Drive Rich Mirpur DOHS, Bangladesh'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
                'condition' => [
                    'triprex_contact_section_genaral_sec_selection' => 'others'
                ]
            ]
        );

        $this->add_control(
            'triprex_contact_section_custom_text_list',
            [
                'label' => esc_html__('Contact Item List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_contact_section_phone_text' => esc_html('+990-737 621 432'),
                        'triprex_contact_section_email_text' => esc_html('shijar@gmail.com'),
                    ],

                ],
                'title_field' => esc_html__('Contact Items', 'triprex-core'),
            ]
        );


        $this->end_controls_section();

        // =====================Style One  =======================//

        //General Section

        $this->start_controls_section(
            'triprex_contact_style_sec_general_section_style',
            [
                'label' => esc_html__('General  ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'triprex_contact_style_sec_general_section_style_bac_color',
            [
                'label'     => esc_html__('Backgound Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_contact_style_sec_general_section_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_contact_style_sec_general_section_style_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //contact Section

        $this->start_controls_section(
            'triprex_contact_style_sec',
            [
                'label' => esc_html__('Contact Style ', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        //title
        $this->add_control(
            'triprex_contact_style_title_sec',
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
                'name'     => 'triprex_contact_style_title_sec_typ',
                'selector' => '{{WRAPPER}} .contact-page .single-contact .title h6',

            ]
        );

        $this->add_control(
            'triprex_contact_style_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .title h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_contact_style_title_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .title h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_contact_style_title_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .single-contact .title h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Contact Text
        $this->add_control(
            'triprex_contact_style_contact_text_sec',
            [
                'label' => esc_html__('Contact Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_contact_style_contact_text_sec_typ',
                'selector' => '{{WRAPPER}} .contact-page .single-contact .content h6 a',

            ]
        );

        $this->add_control(
            'triprex_contact_style_contact_text_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .content h6 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_contact_style_contact_text_sec_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .content h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_contact_style_contact_text_sec_padding',
            [
                'label'      => esc_html__('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .single-contact .content h6 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Icon
        $this->add_control(
            'triprex_contact_style_icon_sec',
            [
                'label' => esc_html__('Icon', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_contact_style_icon_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .icon  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .contact-page .single-contact .icon svg ' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_contact_style_icon_bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .icon ' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_contact_style_icon_svg_size',
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
                    '{{WRAPPER}} .contact-page .single-contact .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .contact-page .single-contact .icon  i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_contact_section_custom_text_list'];
?>

        <div class="contact-page">
            <?php foreach ($data as $item) : ?>
                <div class="single-contact ">
                    <?php if (!empty($item['triprex_contact_section_title'])) :   ?>
                        <div class="title">
                            <h6><?php echo esc_html($item['triprex_contact_section_title']); ?></h6>
                        </div>
                    <?php endif; ?>
                    <?php
                    if ($item['triprex_contact_section_genaral_sec_selection'] === 'phone') :
                    ?>
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon($item['triprex_contact_section_phone_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                        <div class="content">
                            <?php if (!empty($item['triprex_contact_section_phone_text'])) :   ?>
                                <h6><a href="tel:<?php echo esc_html($item['triprex_contact_section_phone_text']); ?>"><?php echo esc_html($item['triprex_contact_section_phone_text']); ?></a></h6>
                            <?php endif; ?>
                            <?php if (!empty($item['triprex_contact_section_phone_text_two'])) :   ?>
                                <h6><a href="tel:<?php echo esc_html($item['triprex_contact_section_phone_text_two']); ?>"><?php echo esc_html($item['triprex_contact_section_phone_text_two']); ?></a></h6>
                            <?php endif; ?>
                        </div>
                    <?php elseif ($item['triprex_contact_section_genaral_sec_selection'] === 'email') : ?>
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon($item['triprex_contact_section_email_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                        <div class="content">
                            <?php if (!empty($item['triprex_contact_section_email_text'])) :   ?>
                                <h6><a href="mailto:<?php echo esc_html($item['triprex_contact_section_email_text']); ?>"><?php echo esc_html($item['triprex_contact_section_email_text']); ?></a></h6>
                            <?php endif; ?>
                            <?php if (!empty($item['triprex_contact_section_email_text_two'])) :   ?>
                                <h6><a href="mailto:<?php echo esc_html($item['triprex_contact_section_email_text_two']); ?>"><?php echo esc_html($item['triprex_contact_section_email_text_two']); ?></a></h6>
                            <?php endif; ?>
                        </div>
                    <?php else :
                    ?>
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon($item['triprex_contact_section_custom_text_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                        <div class="content">
                            <?php if (!empty($item['triprex_contact_section_custom_text'])) :   ?>
                                <h6><a> <span><?php echo esc_html($item['triprex_contact_section_custom_text']); ?> </span></a></h6>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Contact_Widget());
