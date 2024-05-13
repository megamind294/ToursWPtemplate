<?php

namespace Egns\Inc;

class Footer_Helper
{

    /**
     * Initializes a singleton instance
     *
     * @return \Footer_Helper
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Main construcutor 
     *
     * @return void
     */
    public function __construct()
    {
    }



    // Footer Center function 
    public static function egns_footer_center()
    {
?>
        <?php if (class_exists('CSF') && is_active_sidebar('footer_center')) : ?>
            <?php dynamic_sidebar('footer_center') ?>
        <?php endif; ?>


    <?php
    }

    // Footer widgets function 
    public static function egns_footer_newsletter()
    {

    ?>
        <div class="banner3-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner3-content">
                            <?php if (!empty(\Egns\Helper\Egns_Helper::egns_get_theme_option('footer_newsletter_title'))) : ?>
                                <h2><?php echo \Egns\Helper\Egns_Helper::egns_get_theme_option('footer_newsletter_title') ?></h2>
                            <?php endif; ?>
                            <?php if (!empty(\Egns\Helper\Egns_Helper::egns_get_theme_option('footer_newsletter_desc'))) : ?>
                                <p><?php echo \Egns\Helper\Egns_Helper::egns_get_theme_option('footer_newsletter_desc') ?></p>
                            <?php endif; ?>
                            <?php if (!empty(\Egns\Helper\Egns_Helper::egns_get_theme_option('footer_newsletter_shortcode'))) : ?>
                                <?php echo do_shortcode(\Egns\Helper\Egns_Helper::egns_get_theme_option('footer_newsletter_shortcode')) ?>
                            <?php endif; ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/banner3-vector1.png'); ?>" alt="<?php echo esc_attr__('vector1', 'triprex') ?>" class="vector1">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home1/banner3-vector2.png'); ?>" alt="<?php echo esc_attr__('vector2', 'triprex') ?>" class="vector2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    // Footer widgets function 
    public static function egns_footer_widgets()
    {

    ?>

        <?php if (class_exists('CSF') && (is_active_sidebar('footer_one') || is_active_sidebar('footer_two') || is_active_sidebar('footer_three') || is_active_sidebar('footer_four'))) : ?>
            <div class="footer-top">
                <div class="row g-lg-4 gy-5 justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <?php if (is_active_sidebar('footer_one')) : ?>
                            <?php dynamic_sidebar('footer_one') ?>
                        <?php endif ?>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 d-flex justify-content-lg-center justify-content-sm-start">
                        <?php if (is_active_sidebar('footer_two')) : ?>
                            <?php dynamic_sidebar('footer_two') ?>
                        <?php endif ?>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 d-flex justify-content-lg-center justify-content-md-start">
                        <?php if (is_active_sidebar('footer_three')) : ?>
                            <?php dynamic_sidebar('footer_three') ?>
                        <?php endif ?>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-end justify-content-sm-end">
                        <?php if (is_active_sidebar('footer_four')) : ?>
                            <?php dynamic_sidebar('footer_four') ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    <?php
    }

    // Footer copyright text 
    public static function egns_footer_copyright()
    {
    ?>
        <div class="footer-bottom">
            <div class="row">
                <?php
                $footer_options = get_option('egns_theme_options');

                if (is_array($footer_options)) {
                    $copyright_text = isset($footer_options['copyright_text']) ? $footer_options['copyright_text'] : '';
                    $footer_social_enable_switch = isset($footer_options['footer_social_enable']) ? $footer_options['footer_social_enable'] : 0;
                    $footer_social_list = isset($footer_options['footer_bottom_social']) ? $footer_options['footer_bottom_social'] : array();
                    $footer_privacy_area_enable_switch = isset($footer_options['footer_privacy_area_enable']) ? $footer_options['footer_privacy_area_enable'] : 0;
                    $footer_privacy_area_list = isset($footer_options['footer_privacy_area']) ? $footer_options['footer_privacy_area'] : array();
                }

                if (class_exists('CSF') && !empty($copyright_text)) {
                ?>
                    <div class="col-lg-12 d-flex flex-md-row flex-column align-items-center justify-content-md-between justify-content-center flex-wrap gap-3">
                        <?php if ($footer_social_enable_switch == 1) : ?>
                            <ul class="social-list">
                                <?php foreach ((array)$footer_social_list as $list) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($list['footer_social_icon_url']['url']) ?>"><i class="<?php echo wp_kses($list['footer_social_icon_class'], wp_kses_allowed_html('post')) ?>"></i></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                        <?php if (!empty($copyright_text)) : ?>
                            <p><?php echo wp_kses($copyright_text, wp_kses_allowed_html('post')) ?></p>
                        <?php endif; ?>

                        <?php if ($footer_privacy_area_enable_switch == 1) : ?>
                            <div class="footer-right">
                                <ul>
                                    <?php foreach ((array)$footer_privacy_area_list as $privacy_list) : ?>
                                        <li><a href="<?php echo esc_url($privacy_list['footer_privacy_area_url']['url']) ?>"><?php echo wp_kses($privacy_list['footer_privacy_area_txt'], wp_kses_allowed_html('post')) ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-lg-12 d-flex justify-content-center">
                        <p><?php echo esc_html__('©Copyright 2024 Ahaan Software Consulting | Design By ', 'Ahaansoftware') ?><a href="<?php echo esc_url('https://ahaansoftware.com') ?>"><?php echo esc_html__('Egens Lab', 'triprex') ?></a></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

<?php
    }
} //end main class

Footer_Helper::init();
