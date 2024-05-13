<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Triprex_Instagram_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_instagram_sllider';
    }

    public function get_title()
    {
        return esc_html__('EG Instagram Slider', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-logo';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //Content One
        $this->start_controls_section(
            'triprex_instagram_sllider_section_genaral_sec',
            [
                'label' => esc_html__('General', 'triprex-core'),
            ]
        );


        $this->add_control(
            'triprex_instagram_sllider_section_heading',
            [
                'label' => esc_html__('Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_instagram_sllider_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Instagram '),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_instagram_sllider_subtitle',
            [
                'label' => esc_html__('Sub Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Follow us on @Egenslab', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_instagram_sllider_section_images',
            [
                'label' => esc_html__('Images', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'triprex_instagram_sllider_image',
            [
                'label' => esc_html__('Choose Image', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
               

            ]
        );

   
        $repeater->add_control(
            'triprex_instagram_sllider_slider_icon_url',
            [
                'label' => esc_html__('Logo URL', 'triprex-core'),
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
            'triprex_instagram_sllider_slider_list',
            [
                'label' => esc_html__('Choose Logo List', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $this->end_controls_section();

        // ==================Style One ==================//


        //
        $this->start_controls_section(
            'triprex_instagram_sllider_section_genaral_style_sec',
            [
                'label' => esc_html__('Instagram Image', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Heading
        $this->add_control(
            'triprex_instagram_sllider_section_genaral_style_sec_Heading',
            [
                'label' => esc_html__(' Heading', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        //Title
        $this->add_control(
            'triprex_instagram_sllider_section_genaral_style_sec_Heading_title',
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
                'name'     => 'triprex_instagram_sllider_section_genaral_style_sec_title_typ',
                'selector' => '{{WRAPPER}} .logo-section .logo-wrap .logo-title h6',

            ]
        );

        $this->add_control(
            'triprex_instagram_sllider_section_genaral_style_sec_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section .logo-wrap .logo-title h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_instagram_sllider_section_genaral_style_sec_title_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .logo-section .logo-wrap .logo-title h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_instagram_sllider_section_genaral_style_sec_title_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .logo-section .logo-wrap .logo-title h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        //Sub Title
        $this->add_control(
            'triprex_instagram_sllider_section_genaral_style_sec_Heading_subtitle',
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
                'name'     => 'triprex_instagram_sllider_section_genaral_style_sec_subtitle_typ',
                'selector' => '{{WRAPPER}} .instagram-slider-section .insta-section-title p',

            ]
        );

        $this->add_control(
            'triprex_instagram_sllider_section_genaral_style_sec_subtitle_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .instagram-slider-section .insta-section-title p' => '-webkit-text-fill-color: {{VALUE}};',
                   
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_instagram_sllider_section_genaral_style_sec_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .instagram-slider-section .insta-section-title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'triprex_instagram_sllider_section_genaral_style_sec_subtitle_padding',
            [
                'label'      => __('Padding', 'triprex-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .instagram-slider-section .insta-section-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['triprex_instagram_sllider_slider_list'];
?>
        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".instagram-slider", {
                    slidesPerView: 1,
                    speed: 2500,
                    spaceBetween: 2,
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
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 4,
                        },
                        1200: {
                            slidesPerView: 5,
                        },
                        1400: {
                            slidesPerView: 5,
                        },
                    }
                });
            </script>
        <?php endif ?>


        <div class="instagram-slider-section">
            <div class="container">
                <div class="insta-section-title">
                    <?php if (!empty($settings['triprex_instagram_sllider_title'])) :   ?>
                        <h3><?php echo esc_html($settings['triprex_instagram_sllider_title']); ?></h3>
                    <?php endif ?>
                    <?php if (!empty($settings['triprex_instagram_sllider_subtitle'])) :   ?>
                        <p><?php echo wp_kses($settings['triprex_instagram_sllider_subtitle'], wp_kses_allowed_html('post'))  ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="instagram-slider-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper instagram-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ((array)$data as $item) : ?>
                                    <div class="swiper-slide">
                                        <div class="instagram-slider-img">
                                            <?php if (!empty($item['triprex_instagram_sllider_image']['url'])) :   ?>
                                                <img src="<?php echo esc_url($item['triprex_instagram_sllider_image']['url']) ?>" alt="<?php echo esc_attr__('image', 'triprex-core') ?>">
                                            <?php endif ?>
                                            <div class="overlay">
                                            <a href="<?php echo esc_url($item['triprex_instagram_sllider_slider_icon_url']['url']) ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                                <g clip-path="url(#clip0_1447_15)">
                                                    <path d="M39.9491 11.7601C39.8554 9.63476 39.5117 8.17359 39.0194 6.90748C38.5115 5.56353 37.7301 4.36029 36.7063 3.36003C35.7061 2.34421 34.4949 1.55487 33.1665 1.05489C31.8931 0.562549 30.4395 0.218854 28.3142 0.125146C26.173 0.0235031 25.4932 -2.8455e-09 20.0625 -2.23793e-09C14.6317 -1.63037e-09 13.952 0.0235031 11.8187 0.11721C9.69333 0.210918 8.23217 0.554918 6.96636 1.04696C5.62211 1.55487 4.41887 2.33627 3.41862 3.36003C2.4028 4.36029 1.61377 5.57146 1.11349 6.89985C0.621142 8.17359 0.277447 9.62682 0.18374 11.7522C0.0820968 13.8934 0.0585937 14.5732 0.0585937 20.0039C0.0585937 25.4347 0.0820968 26.1144 0.175804 28.2477C0.269511 30.3731 0.613511 31.8342 1.10585 33.1003C1.61377 34.4443 2.4028 35.6475 3.41862 36.6478C4.41887 37.6636 5.63004 38.4529 6.95843 38.9529C8.23217 39.4453 9.6854 39.789 11.8111 39.8827C13.944 39.9767 14.6241 39.9999 20.0548 39.9999C25.4856 39.9999 26.1653 39.9767 28.2986 39.8827C30.424 39.789 31.8851 39.4453 33.1509 38.9529C35.8391 37.9136 37.9645 35.7882 39.0038 33.1003C39.4958 31.8266 39.8399 30.3731 39.9336 28.2477C40.0273 26.1144 40.0508 25.4347 40.0508 20.0039C40.0508 14.5732 40.0428 13.8934 39.9491 11.7601ZM36.347 28.0914C36.261 30.0449 35.9328 31.0998 35.6594 31.8031C34.9872 33.5457 33.6042 34.9287 31.8616 35.6008C31.1584 35.8743 30.0958 36.2024 28.15 36.2882C26.0402 36.3822 25.4074 36.4054 20.0704 36.4054C14.7334 36.4054 14.0927 36.3822 11.9905 36.2882C10.037 36.2024 8.98213 35.8743 8.27887 35.6008C7.4117 35.2803 6.62236 34.7724 5.98168 34.1082C5.31748 33.4596 4.80957 32.6782 4.48908 31.811C4.21559 31.1078 3.88746 30.0449 3.80169 28.0994C3.70768 25.9896 3.68448 25.3565 3.68448 20.0195C3.68448 14.6824 3.70768 14.0417 3.80169 11.9399C3.88746 9.98639 4.21559 8.93149 4.48908 8.22823C4.80957 7.36075 5.31748 6.57172 5.98961 5.93072C6.63793 5.26653 7.41933 4.75862 8.28681 4.43843C8.99007 4.16494 10.0529 3.83681 11.9985 3.75073C14.1082 3.65703 14.7413 3.63352 20.078 3.63352C25.423 3.63352 26.0557 3.65703 28.1579 3.75073C30.1114 3.83681 31.1663 4.16494 31.8696 4.43843C32.7367 4.75862 33.5261 5.26653 34.1668 5.93072C34.8309 6.57935 35.3389 7.36075 35.6594 8.22823C35.9328 8.93149 36.261 9.99402 36.347 11.9399C36.4408 14.0497 36.4643 14.6824 36.4643 20.0195C36.4643 25.3565 36.4408 25.9816 36.347 28.0914Z"></path>
                                                    <path d="M20.0762 9.72656C14.4034 9.72656 9.80078 14.3289 9.80078 20.002C9.80078 25.6751 14.4034 30.2775 20.0762 30.2775C25.7493 30.2775 30.3517 25.6751 30.3517 20.002C30.3517 14.3289 25.7493 9.72656 20.0762 9.72656ZM20.0762 26.6674C16.396 26.6674 13.4108 23.6825 13.4108 20.002C13.4108 16.3215 16.396 13.3366 20.0762 13.3366C23.7568 13.3366 26.7416 16.3215 26.7416 20.002C26.7416 23.6825 23.7568 26.6674 20.0762 26.6674Z"></path>
                                                    <path d="M33.1536 9.32171C33.1536 10.6464 32.079 11.7206 30.7534 11.7206C29.4281 11.7206 28.3535 10.6464 28.3535 9.32171C28.3535 7.99667 29.4281 6.92285 30.7534 6.92285C32.079 6.92285 33.1536 7.99667 33.1536 9.32171Z"></path>
                                                </g>
                                            </svg>
                                        </a>
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

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Instagram_Slider_Widget());
