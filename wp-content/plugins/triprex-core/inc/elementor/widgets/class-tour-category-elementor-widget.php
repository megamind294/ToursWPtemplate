<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core\Egns_Helper;


class Triprex_Tour_Category_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'triprex_tour_category';
    }

    public function get_title()
    {
        return esc_html__('EG Tour Category', 'triprex-core');
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
            'triprex_tour_category_section_genaral',
            [
                'label' => esc_html__('General', 'triprex-core')
            ]
        );

        $this->add_control(
            'triprex_tour_category_section_genaral_sec',
            [
                'label' => esc_html__('Heading Area', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'triprex_tour_slider_carousel_on_off',
            [
                'label' => esc_html__('Subtitle Icon On/Off', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'triprex-core'),
                'label_off' => esc_html__('Hide', 'triprex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'triprex_tour_category_section_heading_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Travel Category'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_tour_category_section_heading_title',
            [
                'label' => esc_html__('Heading Title', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('What We Offering'),
                'placeholder' => esc_html__('Type your text here', 'triprex-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'triprex_tour_category_section_queary_sec',
            [
                'label' => esc_html__('Query', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'triprex_tour_category_section_queary_sec_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'triprex-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'triprex_tour_category_section_queary_sec_orderby',
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
            'triprex_tour_category_section_queary_sec_post_list',
            [
                'label'         => esc_html__('All Post Lists', 'triprex-core'),
                'type'          => \Elementor\Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'options' => Egns_Helper::get_tours_categories_for_select(),
            ]
        );

        $this->add_control(
            'triprex_tour_category_section_queary_sec_template_order',
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

        //style_one

        $this->start_controls_section(
            'triprex_tour_category_style_one_sec',
            [
                'label' => esc_html__('Category Style', 'triprex-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'triprex_tour_category_style_one_sec_heading',
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
                'name'     => 'triprex_tour_category_style_one_sec_heading_typ',
                'selector' => '{{WRAPPER}} .section-title5 span',

            ]
        );
        $this->add_control(
            'triprex_tour_category_style_one_sec_heading_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_category_style_one_sec_heading_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_heading_title',
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
                'name'     => 'triprex_tour_category_slider_genaral_style_sec_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title5 h2',

            ]
        );
        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_heading_title_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title5 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_category_name',
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
                'name'     => 'triprex_tour_category_slider_genaral_style_sec_category_name_typ',
                'selector' => '{{WRAPPER}} .category-card .card-content h4 a',

            ]
        );
        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_category_name_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category-card .card-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_category_name_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category-card .card-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_logo',
            [
                'label' => esc_html__('Logo', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_category_slider_genaral_style_sec_logo_typ',
                'selector' => '{{WRAPPER}} .category-card .card-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_logo_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category-card:hover .card-content .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_pagination',
            [
                'label' => esc_html__('Pagination', 'triprex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'triprex-core'),
                'name'     => 'triprex_tour_category_slider_genaral_style_sec_pagination_typ',
                'selector' => '{{WRAPPER}} .category-card .card-content h4 a',

            ]
        );

        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_pagination_color',
            [
                'label'     => esc_html__('Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'triprex_tour_category_slider_genaral_style_sec_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'triprex-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

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

        <div class="home6-activity-card-slider-section">
            <div class="container one">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="section-title5">
                            <?php if (!empty($settings['triprex_tour_category_section_heading_subtitle'])) : ?>
                                <span>
                                    <?php echo esc_html($settings['triprex_tour_category_section_heading_subtitle']); ?>
                                    <?php if ('yes' == $settings['triprex_tour_slider_carousel_on_off']) : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g opacity="0.8">
                                                <path d="M9.06226 11.3626L8.55838 13.7263L6.22997 20.0004L7.61194 19.7701L14.0678 11.3277C14.979 11.296 15.8626 11.2471 16.6304 11.1713C20.1826 10.82 19.9984 10.0002 19.9984 10.0002C19.9984 10.0002 20.1826 9.18031 16.6304 8.829C15.8626 8.7529 14.9789 8.70407 14.0678 8.67261L7.61197 0.229974L6.22997 -6.01907e-07L8.55838 6.27416L9.06226 8.6378C7.87942 8.6555 7.07898 8.68244 7.07898 8.68244C7.07898 8.68244 5.44724 8.7201 2.92253 9.28895L0.864093 6.43364L-0.000128074 6.43364L0.615287 9.90529C0.504522 9.93924 0.504522 10.0611 0.615287 10.0951L-0.000128385 13.5667L0.864093 13.5667L2.92253 10.7117C5.44724 11.2806 7.07898 11.3177 7.07898 11.3177C7.07898 11.3177 7.87942 11.3449 9.06226 11.3626Z" />
                                                <path d="M13.4102 13.2575L13.4102 14.1895L9.96575 14.1895L9.96575 13.2575L13.4102 13.2575ZM13.4102 5.81414L13.4102 6.7458L9.96595 6.7458L9.96595 5.81414L13.4102 5.81414ZM11.0863 16.385L11.0863 17.3167L7.90291 17.3167L7.90291 16.385L11.0863 16.385ZM11.0863 2.68689L11.0863 3.61885L7.90291 3.61885L7.90291 2.68689L11.0863 2.68689Z" />
                                            </g>
                                        </svg>
                                    <?php endif; ?>
                                </span>
                            <?php endif; ?>
                            <?php if (!empty($settings['triprex_tour_category_section_heading_title'])) : ?>
                                <h2> <?php echo esc_html($settings['triprex_tour_category_section_heading_title']); ?></h2>
                            <?php endif; ?>
                        </div>
                        <div class="slider-btn-grp two d-md-flex d-none">
                            <div class="slider-btn activity-card-slider-prev">
                                <i class="bi bi-arrow-left"></i>
                            </div>
                            <div class="slider-btn activity-card-slider-next">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="activity-card-slider-wrap">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper activity-card-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    $selected_category = $settings['triprex_tour_category_section_queary_sec_post_list'];
                                    $terms = get_terms(array(
                                        'taxonomy'   => 'tour-types',
                                        'hide_empty' => false,
                                        'number'     => $settings['triprex_tour_category_section_queary_sec_post_per_page'],
                                        'orderby'    => $settings['triprex_tour_category_section_queary_sec_orderby'],
                                        'include' => $selected_category,
                                        'order'      => $settings['triprex_tour_category_section_queary_sec_template_order'],
                                    ));

                                    if ($terms && !is_wp_error($terms)) {
                                        foreach ($terms as $index => $term) {
                                            $meta = get_term_meta($term->term_id, 'triprex-tours-type', true);
                                            // Set default values in case the meta values are not present
                                            $tour_type_icon = $meta['triprex_tour_type_icon']['url'] ?? '';
                                            $tour_type_thumbnail = $meta['triprex_tour_type_thumbnail']['url'] ?? '';
                                    ?>
                                            <div class="swiper-slide">
                                                <div class="category-card">
                                                    <?php if (!empty($tour_type_thumbnail)) : ?>
                                                        <a href="<?php echo esc_url(get_term_link($term, 'tour-types')); ?>" class="card-img">
                                                            <img src="<?php echo esc_url($tour_type_thumbnail); ?>" alt="<?php echo esc_attr__('s-thumbnail', 'triprex-core'); ?>">
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="card-content">
                                                        <?php if (!empty($tour_type_icon)) : ?>
                                                            <?php
                                                            $checkFileType = '';
                                                            if (!empty(pathinfo($tour_type_icon, PATHINFO_EXTENSION))) {
                                                                $checkFileType = pathinfo($tour_type_icon, PATHINFO_EXTENSION);
                                                            }
                                                            ?>
                                                            <div class="icon">
                                                                <?php if ($checkFileType == 'svg') : ?>
                                                                    <?php echo file_get_contents($tour_type_icon); ?>
                                                                <?php else : ?>
                                                                    <img src="<?php echo esc_url($tour_type_icon); ?>" alt="<?php echo esc_attr__('icon-image', 'triprex-core'); ?>">
                                                                <?php endif ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <h4><a href="<?php echo esc_url(get_term_link($term, 'tour-types')); ?>"><?php echo esc_html($term->name); ?></a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
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

Plugin::instance()->widgets_manager->register(new Triprex_Tour_Category_Widget());
