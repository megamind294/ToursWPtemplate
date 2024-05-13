<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Gallery_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_gallery';
    }

    public function get_title()
    {
        return esc_html__('EG Gallery', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================/

        $this->start_controls_section(
            'triprex_gallery_slide_content',
            [
                'label' => esc_html__('Gallery', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_gallery_slide_image_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Discover Island'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_gallery_slide_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'triprex_gallery_slide_number',
            [
                'label' => esc_html__('Show Image Gallery', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 100,
                'step' => 1,
                'default' => 9,
            ]
        );

        $this->end_controls_section();



        // =====================Style=======================//


        $this->start_controls_section(
            'triprex_gallery_title_sec',
            [
                'label' => esc_html__(' Title', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_gallery_title_typ',
                'selector' => '{{WRAPPER}} .destination-gallery .gallery-img-wrap a',

            ]
        );

        $this->add_control(
            'triprex_gallery_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-gallery .gallery-img-wrap >a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_gallery_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-gallery .gallery-img-wrap a >i' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_gallery_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .destination-gallery .gallery-img-wrap a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_gallery_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .destination-gallery .gallery-img-wrap a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $gallery_images = $settings['triprex_gallery_slide_image'] ?? [];
        $gallery_limit = $settings['triprex_gallery_slide_number'] ?? 9;


?>

        <script>
            jQuery('[data-fancybox="gallery-01"]').fancybox({
                buttons: [
                    "close",
                ],
                loop: false,
                protect: true,
            });
        </script>



        <?php if (is_array($gallery_images) && !empty($gallery_images)) : ?>
            <div class="destination-gallery">
                <div class="container">
                    <div class="row g-4">
                        <?php
                        $count = 0;
                        $sequence_length = 12; // Adjust this according to the sequence length
                        $sequence = array('col-lg-4', 'col-lg-5', 'col-lg-3', 'col-lg-3', 'col-lg-4', 'col-lg-5', 'col-lg-4', 'col-lg-5', 'col-lg-3', 'col-lg-3', 'col-lg-4', 'col-lg-5');

                        foreach ($gallery_images as $key => $item) :
                            $col_class = $sequence[$count % $sequence_length];
                        ?>
                            <div class="<?php echo esc_attr($col_class); ?> col-sm-6">
                                <div class="gallery-img-wrap">
                                    <img class="img-fluid" src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr__('gallery', 'triprex-core'); ?>">
                                    <a data-fancybox="gallery-01" href="<?php echo esc_url($item['url']); ?>">
                                        <i class="bi bi-eye"></i> <?php echo esc_html($settings['triprex_gallery_slide_image_title']); ?>
                                    </a>
                                </div>
                            </div>
                        <?php
                            $count++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Gallery_Widget());
