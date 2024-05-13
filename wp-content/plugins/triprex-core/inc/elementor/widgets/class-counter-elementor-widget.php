<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Counter_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_counter';
    }

    public function get_title()
    {
        return esc_html__('EG Counter', 'triprex-core');
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
            'triprex_counter_one_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core'),

            ]
        );

        $this->add_control(
            'triprex_counter_one_counter_section_bac_image',
            [
                'label' => esc_html__('Background Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_counter_one_counter_section',
            [
                'label' => esc_html__('Counter Section ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_counter_one_counter_section_icon',
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
            'triprex_counter_one_counter_section_number',
            [
                'label' => esc_html__('Counter Number', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('3.5', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your counter number here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_counter_section_extra_icon_switcher',
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
            'triprex_counter_section_plus_icon_switcher',
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
            'triprex_counter_section_parcent_icon_switcher',
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
            'triprex_counter_one_counter_section_content',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Happy Traveler'),
                'placeholder' => esc_html__('Type your content here', 'triprex-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'triprex_counter_one_counter_section_list',
            [
                'label' => esc_html__(' Counter List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_counter_one_counter_section_content' => esc_html('Happy Traveler '),

                    ],

                ],
                'title_field' => '{{{ triprex_counter_one_counter_section_content }}}',
            ]
        );


        $this->end_controls_section();

        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_counter_sec_style',
            [
                'label' => esc_html__('Counter Section', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'triprex_counter_sec_card_bac_color',
            [
                'label' => esc_html__('Background Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-activity.two' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_counter_sec_icon_style',
            [
                'label' => esc_html__('Icon ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'triprex_counter_sec_icon_style_color',
            [
                'label' => esc_html__('Color', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-activity .icon  i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-activity .icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'triprex_counter_sec_icon_style_size',
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
                    '{{WRAPPER}} .single-activity .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .single-activity .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->add_control(
            'triprex_counter_num_style',
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
                'name'     => 'triprex__counter_num_style_typ',
                'selector' => '{{WRAPPER}} .single-activity.two .content .number h5',

            ]
        );

        $this->add_control(
            'triprex_counter_num_style_num_color',
            [
                'label'     => esc_html__('Num Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-activity.two .content .number h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_counter_num_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-activity.two .content .number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_counter_num_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-activity.two .content .number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_counter_num_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-activity.two .content .number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_counter_content_style',
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
                'name'     => 'triprex_counter_content_style_typ',
                'selector' => '{{WRAPPER}} .single-activity .content p',

            ]
        );

        $this->add_control(
            'triprex_counter_content_style_color',
            [
                'label'     => esc_html__(' Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-activity.two .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_counter_content_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-activity .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_counter_content_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-activity .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_counter_one_counter_section_list'];
?>


        <div class="home4-activity-counter-section" <?php if (!empty($settings['triprex_counter_one_counter_section_bac_image']['url'])) { ?> style="background-image: linear-gradient(180deg, rgba(16, 12, 8, 0.6) 0%, rgba(16, 12, 8, 0.6) 100%), url(<?php echo esc_url($settings['triprex_counter_one_counter_section_bac_image']['url']) ?>)" <?php } else { ?> style="background-image:linear-gradient(180deg, rgba(16, 12, 8, 0.6) 0%, rgba(16, 12, 8, 0.6) 100%), url(<?php echo get_template_directory_uri(); ?>/assets/img/home4/activity-counter-bg.png);" <?php } ?>>
            <div class="container">
                <div class="row justify-content-center g-lg-5 g-4">
                    <?php foreach ($data as $item) : ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="single-activity two">
                                <div class="icon-content">
                                <?php if (!empty($item['triprex_counter_one_counter_section_icon'])) :   ?>
                                    <div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon($item['triprex_counter_one_counter_section_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                    <?php endif ?>
                                    <div class="content">
                                        <div class="number">
                                            <h5 class="counter"><?php echo wp_kses($item['triprex_counter_one_counter_section_number'], wp_kses_allowed_html('post'))  ?></h5>
                                            <?php if (!empty($item['triprex_counter_section_extra_icon_switcher'] == 'yes')) :   ?>
                                                <span><?php echo esc_html__('K', 'triprex-core') ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($item['triprex_counter_section_plus_icon_switcher'] == 'yes')) :   ?>
                                                <span><?php echo esc_html__('+', 'triprex-core') ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($item['triprex_counter_section_parcent_icon_switcher'] == 'yes')) :   ?>
                                                <span><?php echo esc_html__('%', 'triprex-core') ?></span>
                                            <?php endif ?>
                                        </div>
                                        <?php if (!empty($item['triprex_counter_one_counter_section_content'])) :   ?>
                                            <p><?php echo esc_html($item['triprex_counter_one_counter_section_content']); ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>




<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Counter_Widget());
