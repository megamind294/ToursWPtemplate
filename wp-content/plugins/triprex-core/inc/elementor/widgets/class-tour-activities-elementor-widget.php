<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;

class Triprex_Tour_Activities_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_tour_activities';
    }

    public function get_title()
    {
        return esc_html__('EG Tour Activities', 'triprex-core');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return ['triprex_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'triprex_activities_tour_one_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_tour_activities_heading_section',
            [
                'label' => esc_html__('Heading Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'triprex_tour_activities_carousel_on_off',
            [
                'label' => esc_html__('Slider Carousel On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'triprex_tour_activities_sub_title',
            [
                'label' => esc_html__('Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Travel Category', 'triprex-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'triprex-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'triprex_tour_activities_title',
            [
                'label' => esc_html__('Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What We Offering', 'triprex-core'),
                'placeholder' => esc_html__('Type your title here', 'triprex-core'),
                'label_block' => true,


            ]
        );

        $this->add_control(
            'triprex_tour_activities_query_area',
            [
                'label' => esc_html__('Query Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',

            ]
        );

        $this->add_control(
            'triprex_tour_activities_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'triprex_tour_activities_template_orderby',
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
            ]
        );

        $this->add_control(
            'tour_activities_post_list',
            [
                'label'         => esc_html__('All Post Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Helper::get_activities_post_options(),
            ]
        );

        $this->add_control(
            'triprex_tour_activities_template_order',
            [
                'label'   => esc_html__('Order', 'triprex-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'triprex-core'),
                    'desc' => esc_html__('Descending', 'triprex-core')

                ],
                'default' => 'desc',
            ]
        );


        $this->end_controls_section();


        #style start

        $this->start_controls_section(
            'triprex_tour_activites_slider_genaral_style_sec',
            [
                'label' => esc_html__('Activities Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_subtitle_sec',
            [
                'label' => esc_html__('Heading Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_activites_slider_genaral_style_sec_subtitle_sec_typ',
                'selector' => '{{WRAPPER}} .section-title4 .eg-section-tag span',

            ]
        );
        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_subtitle_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_subtitle_sec_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 .eg-section-tag' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_title_sec',
            [
                'label' => esc_html__('Heading Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_activites_slider_genaral_style_sec_typ',
                'selector' => '{{WRAPPER}} .section-title4 h2',

            ]
        );
        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title4 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_nama_title_sec',
            [
                'label' => esc_html__('Category Name', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_activites_slider_genaral_style_sec_nama_title_sec_typ',
                'selector' => '{{WRAPPER}} .activity-card .activity-card-content-wrapper .activity-card-content .content h6 a',

            ]
        );
        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_nama_title_sec_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activity-card .activity-card-content-wrapper .activity-card-content .content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_nama_title_sec_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activity-card:hover .activity-card-content-wrapper .activity-card-content .content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_nama_title_sec_bg_color',
            [
                'label'     => esc_html__('Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activity-card .activity-card-content-wrapper .activity-card-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_activites_slider_genaral_style_sec_nama_title_sec_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .activity-card:hover .activity-card-content-wrapper .activity-card-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $selected_post_ids = $settings['tour_activities_post_list'];
        $args = array(
            'post_type'      => 'activities',
            'posts_per_page' => $settings['triprex_tour_activities_posts_per_page'],
            'orderby'        => $settings['triprex_tour_activities_template_orderby'],
            'order'          => $settings['triprex_tour_activities_template_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        // Add Included posts
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }
        $query = new \WP_Query($args);
?>

        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".activity-card-slider", {
                    slidesPerView: 1,
                    speed: 2000,
                    spaceBetween: 25,
                    navigation: {
                        nextEl: ".activity-card-slider-next",
                        prevEl: ".activity-card-slider-prev",
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
            </script>
        <?php endif; ?>

        <div class="home5-activity-card-slider-section">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="section-title4 text-center">
                            <?php if (!empty($settings['triprex_tour_activities_sub_title'])) : ?>
                                <div class="eg-section-tag">
                                    <span><?php echo esc_html($settings['triprex_tour_activities_sub_title']); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['triprex_tour_activities_title'])) : ?>
                                <h2><?php echo esc_html($settings['triprex_tour_activities_title']); ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="activity-card-slider-wrap">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper activity-card-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post(); ?>
                                        <div class="swiper-slide">
                                            <div class="activity-card">
                                                <?php the_post_thumbnail(); ?>
                                                <div class="activity-card-content-wrapper">
                                                    <div class="activity-card-content">
                                                        <?php $icon_image = Egns_Helper::egns_activities_value('activities_Icon_image');
                                                        if (!empty($icon_image)) :
                                                            $activity_ico = $icon_image['url'];
                                                            $checkFileType = '';
                                                            if (!empty(pathinfo($activity_ico, PATHINFO_EXTENSION))) {
                                                                $checkFileType = pathinfo($activity_ico, PATHINFO_EXTENSION);
                                                            }

                                                        ?>
                                                            <div class="icon">
                                                                <?php if ($checkFileType == 'svg') : ?>
                                                                    <?php echo file_get_contents($activity_ico); ?>
                                                                <?php else : ?>
                                                                    <img src="<?php echo esc_url($activity_ico); ?>" alt="<?php echo esc_attr__('icon', 'triprex-core'); ?>">
                                                                <?php endif ?>                                              
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="content">
                                                            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                                        </div>
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
                        <?php if ('yes' == $settings['triprex_tour_activities_carousel_on_off']) : ?>
                            <div class="slider-btn-grp2">
                                <div class="slider-btn activity-card-slider-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17">
                                        <path d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z"></path>
                                    </svg>
                                </div>
                                <div class="slider-btn activity-card-slider-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17" fill="none">
                                        <path d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z"></path>
                                    </svg>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>



<?php

    }
}

Plugin::instance()->widgets_manager->register(new Triprex_Tour_Activities_Widget());
