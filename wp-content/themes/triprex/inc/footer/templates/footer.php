<?php
$footer_newsletter_enable = Egns\Helper\Egns_Helper::egns_get_theme_option('footer_newsletter_enable');
$page_footer_newsletter_enable = Egns\Helper\Egns_Helper::egns_page_option_value('page_footer_newsletter_enable');

$footer_widget_area_background_img = Egns\Helper\Egns_Helper::egns_get_theme_option('footer_widget_area_background_img');
$footer_page_bg_image = Egns\Helper\Egns_Helper::egns_page_option_value('footer_page_bg_image');

$has_footer_widget_area_background_img = class_exists('CSF') && !empty($footer_widget_area_background_img);
$has_footer_page_bg_image = class_exists('CSF') && !empty($footer_page_bg_image);

$custom_class = ($has_footer_widget_area_background_img || $has_footer_page_bg_image) ? 'th-background-image' : '';

if (class_exists('CSF') && Egns\Helper\Egns_Helper::is_enabled($footer_newsletter_enable, $page_footer_newsletter_enable)) { ?>
    <?php if (class_exists('CSF') && !empty(\Egns\Helper\Egns_Helper::egns_get_theme_option('footer_newsletter_shortcode'))) : ?>
        <?php Egns\Inc\Footer_Helper::egns_footer_newsletter(); ?>
    <?php endif ?>
<?php } ?>
<footer class="footer-section <?php echo (class_exists('CSF') && (Egns\Helper\Egns_Helper::is_enabled($footer_newsletter_enable, $page_footer_newsletter_enable))) ? 'newsletter-exists' : ''; ?> <?php echo esc_attr($custom_class); ?>">
    <div class="container">
        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::is_enabled(1, Egns\Helper\Egns_Helper::egns_page_option_value('footer_widget_enable'))) && (is_active_sidebar('footer_one') || is_active_sidebar('footer_two') || is_active_sidebar('footer_three') || is_active_sidebar('footer_four'))) : ?>
            <?php Egns\Inc\Footer_Helper::egns_footer_widgets(); ?>
        <?php endif ?>

        <?php Egns\Inc\Footer_Helper::egns_footer_copyright(); ?>

    </div>
</footer>