<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Map_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_map';
    }

    public function get_title()
    {
        return esc_html__('EG Map', 'triprex-core');
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
            'triprex_map_one_section_genaral',
            [
                'label' => esc_html__('Map Section', 'triprex-core'),

            ]
        );

        $this->add_control(
            'triprex_map_heading',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_map_header_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Journey to'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_map_header_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Location on Map'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_map_card',
            [
                'label' => esc_html__('Map Card', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_map_content_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'triprex_map_content_image_url',
            [
                'label' => esc_html__('Image URL', 'triprex-core'),
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
            'triprex_map_batch',
            [
                'label' => esc_html__('Batch ', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('15 Tour', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_map_content_destination',
            [
                'label' => esc_html__('Destination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Brazil', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'triprex_map_content_destination_url',
            [
                'label' => esc_html__('Destination URL', 'triprex-core'),
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
            'triprex_map_content_total_tour',
            [
                'label' => esc_html__('Total Tour', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('15 Tour', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_map_list',
            [
                'label' => esc_html__('Map Lists', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'triprex_map_content_destination' => esc_html('New York', 'triprex-core'),
                    ],

                ],
                'title_field' => '{{{ triprex_map_content_destination }}}',
            ]
        );

        $this->end_controls_section();



        // =====================Style One=======================//

        $this->start_controls_section(
            'triprex_style_one_map_content_style',
            [
                'label' => esc_html__('Map Content', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );


        $this->add_control(
            'triprex_style_one_map_content_header_subtitle_style',
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
                'name'     => 'triprex_style_one_map_content_header_subtitle_style_typ',
                'selector' => '{{WRAPPER}} .section-title4 .eg-section-tag span',

            ]
        );

        $this->add_control(
            'triprex_style_one_map_content_header_subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_map_content_header_subtitle_style_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_map_content_header_subtitle_style_margin',
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
            'triprex_style_one_map_content_header_subtitle_style_padding',
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
            'triprex_style_one_map_content_header_title_style',
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
                'name'     => 'triprex_style_one_map_content_header_title_style_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );

        $this->add_control(
            'triprex_style_one_map_content_header_title_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'triprex_style_one_map_content_header_title_style_margin',
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
            'triprex_style_one_map_content_header_title_style_padding',
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
            'triprex_style_one_map_content_tag_text',
            [
                'label' => esc_html__('Tag Text', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_map_content_tag_text_typ',
                'selector' => '{{WRAPPER}} .destination-card3 .batch span',

            ]
        );

        $this->add_control(
            'triprex_style_one_map_content_tag_text_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3 .batch span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_map_content_tag_text_bac_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3 .batch span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_style_one_map_content_destination_style',
            [
                'label' => esc_html__('Destination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_map_content_destination_style_typ',
                'selector' => '{{WRAPPER}} .destination-card3.location-card:hover .destination-card-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_style_one_map_content_destination_style_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3.location-card:hover .destination-card-content h4 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_map_content_destination_style_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .destination-card3.location-card:hover .destination-card-content h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_style_one_map_content_destination_style_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .destination-card3.location-card:hover .destination-card-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'triprex_style_one_map_content_total_tour',
            [
                'label' => esc_html__('Total Tour', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_style_one_map_content_total_tour_typ',
                'selector' => '{{WRAPPER}} .destination-card3.location-card .destination-card-content span',

            ]
        );

        $this->add_control(
            'triprex_style_one_map_content_total_tour_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3.location-card .destination-card-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_map_list'];

?>

        <script>
            // Initialize the first child as active on page load
            jQuery('.country-area ul li:first-child').addClass('active');
            // Mouse enter event for country-area div

            // Mouse leave event for country-area div
            jQuery('.country-area').on("mouseleave", function() {
                // Remove active class from all li elements except the first child
                jQuery('.country-area ul li:not(:first-child)').removeClass('active');
                // Add active class to the first child
                jQuery('.country-area ul li:first-child').addClass('active');
            });
            // Hover event for li elements
            jQuery('.country-area ul li').on({
                mouseenter: function() {
                    // Add active class to the current li and remove from siblings
                    jQuery(this).addClass('active').siblings().removeClass('active');
                }
            });
        </script>


        <div class="home5-map-section ">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="section-title4 text-center">
                            <?php if (!empty($settings['triprex_map_header_subtitle'])) :   ?>
                                <div class="eg-section-tag">
                                    <span><?php echo esc_html($settings['triprex_map_header_subtitle']) ?></span>
                                </div>
                            <?php endif ?>
                            <?php if (!empty($settings['triprex_map_header_title'])) :   ?>
                                <h2><?php echo esc_html($settings['triprex_map_header_title']) ?></h2>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="map-wrap">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home5/country-bg.png'); ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>">
                            <div class="country-area">
                                <ul>
                                    <?php foreach ((array)$data as $item) : ?>
                                        <li>
                                            <div class="dot-main">
                                                <div class="promo-video">
                                                    <div class="waves-block">
                                                        <div class="waves wave-1"></div>
                                                        <div class="waves wave-2"></div>
                                                        <div class="waves wave-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="destination-card3 location-card">
                                                <a href="<?php echo esc_url($item['triprex_map_content_image_url']['url']) ?>" class="destination-card-img">
                                                    <?php if (!empty($item['triprex_map_content_image']['url'])) :   ?>
                                                        <img src="<?php echo esc_url($item['triprex_map_content_image']['url']) ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>">
                                                    <?php endif ?>
                                                    <?php if (!empty($item['triprex_map_batch'])) :   ?>
                                                        <div class="batch">
                                                            <span><?php echo esc_html($item['triprex_map_batch']) ?></span>
                                                        </div>
                                                    <?php endif ?>
                                                </a>
                                                <div class="destination-card-content">
                                                    <?php if (!empty($item['triprex_map_content_destination'])) :   ?>
                                                        <h4><a href="<?php echo esc_url($item['triprex_map_content_destination_url']['url']) ?>"><?php echo esc_html($item['triprex_map_content_destination']) ?></a></h4>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Map_Widget());
