<?php

namespace Egns\Inc;

use Egns\Helper\Egns_Helper;

class Header_Helper extends Egns_Helper
{
    /**
     * Initializes a singleton instance
     *
     * @return \Header_Helper
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
     * Main constructor 
     *
     * @return void
     */
    public function __construct()
    {
    }

    public static function global_search()
    {
?>
        <div class="mobile-search">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center gy-4">
                    <div class="col-10">
                        <?php get_search_form() ?>
                    </div>
                    <div class="col-2 d-flex justify-content-end align-items-center gap-2">
                        <div class="search-cross-btn style-two">
                            <i class="bi bi-x-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Header sidebar options included in this functions
     *
     * @since   1.1.0
     */

    public static function my_custom_sidebar_function()
    {
        if (class_exists('CSF') && self::egns_get_theme_option('header_sidebar_icon_show') == 1) : ?>
            <div class="right-sidebar-menu">
                <div class="sidebar-logo-area d-flex justify-content-between align-items-center">
                    <?php if (class_exists('CSF') && self::egns_get_theme_option('header_sidebar_logo_img_show') == 1) : ?>
                        <div class="sidebar-logo-wrap">
                            <a href="<?php echo esc_url(self::egns_get_theme_option('header_sidebar_logo_link', 'url')) ?>"><img alt="<?php esc_attr_e('sidaber logo', 'triprex'); ?>" src="<?php echo esc_url(self::egns_get_theme_option('header_sidebar_logo_img', 'url')) ?>"></a>
                        </div>
                    <?php endif ?>
                    <div class="right-sidebar-close-btn">
                        <i class="bi bi-x"></i>
                    </div>
                </div>
                <?php if (class_exists('CSF') && self::egns_get_theme_option('header_sidebar_tour_type_options') == 1 || self::egns_get_theme_option('header_sidebar_destination_options') == 1) : ?>
                    <div class="sidebar-content-wrap">
                        <?php if (class_exists('CSF') && self::egns_get_theme_option('header_sidebar_tour_type_options') == 1) : ?>
                            <?php
                            $tour_types = get_terms(array(
                                'taxonomy'   => 'tour-types',
                                'hide_empty' => true,
                            ));

                            // Check if there are tour types before displaying the section
                            if (!empty($tour_types)) {
                            ?>
                                <div class="category-wrapper">
                                    <h4><?php esc_html_e('Tour Type', 'triprex') ?></h4>
                                    <div class="row g-4">
                                        <?php
                                        // Set the maximum number of tour types to display
                                        $number_of_tour_types = esc_html(self::egns_get_theme_option('max_tour_types'));
                                        $max_tour_types = $number_of_tour_types;
                                        $tour_type_count = 0;

                                        foreach ($tour_types as $type) {
                                            // Get icon data for the current tour type
                                            $icon_data = get_term_meta($type->term_id, 'triprex-tours-type', true);
                                            
                                            $icon_url = !empty($icon_data['triprex_tour_type_icon']['url']) ? $icon_data['triprex_tour_type_icon']['url'] : '';
                                        ?>
                                            <div class="col-sm-4 col-6">
                                                <a href="<?php echo esc_url(get_term_link($type)); ?>" class="single-category">
                                                    <?php if (!empty($icon_url)) : ?>
                                                        <div class="icon">
                                                            <?php Egns_Helper::display_svg($icon_url) ?>
                                                        </div>
                                                    <?php endif ?>
                                                    <?php if (!empty($type->name)) : ?>
                                                        <h6><?php echo sprintf(__('%s', 'triprex'), $type->name); ?></h6>
                                                    <?php endif ?>
                                                </a>
                                            </div>
                                        <?php
                                            $tour_type_count++;

                                            // Check if the maximum number of tour types has been reached
                                            if ($tour_type_count >= $max_tour_types) {
                                                break;
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        <?php endif ?>
                        <?php
                        // Retrieve options
                        $sidebar_num_of_posts = self::egns_get_theme_option('sidebar_destination_num_of_post');
                        $sidebar_desti_order = self::egns_get_theme_option('sidebar_destination_order');
                        if (class_exists('CSF') && self::egns_get_theme_option('header_sidebar_destination_options') == 1) : ?>
                            <?php
                            $args = array(
                                'post_type' => 'destination',
                                'posts_per_page' => $sidebar_num_of_posts,
                                'orderby' => 'ID',
                                'order' => $sidebar_desti_order,
                            );

                            $query = new \WP_Query($args);

                            if ($query->have_posts()) :
                            ?>
                                <div class="destination-wrapper">
                                    <h4><?php echo esc_html__('Our Destinations', 'triprex') ?></h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="swiper destination-sidebar-slider mb-35">
                                                <div class="swiper-wrapper">
                                                    <?php
                                                    while ($query->have_posts()) {
                                                        $query->the_post();
                                                    ?>
                                                        <div class="swiper-slide">
                                                            <div class="destination-card2">
                                                                <a href="<?php the_permalink(); ?>" class="destination-card-img">
                                                                    <?php the_post_thumbnail(); ?>
                                                                </a>
                                                                <div class="batch">
                                                                    <span><?php echo esc_html__('5 Tour', 'triprex'); ?></span>
                                                                </div>
                                                                <div class="destination-card2-content">
                                                                    <span><?php echo esc_html__('Travel To', 'triprex'); ?></span>
                                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    wp_reset_postdata();
                                                    ?>
                                                </div>
                                            </div>

                                            <?php if (class_exists('CSF') && self::egns_get_theme_option('header_sidebar_button_enable') == 1) : ?>
                                                <div class="slide-and-view-btn-grp">
                                                    <div class="destination-sidebar-prev">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="53" height="13" viewBox="0 0 53 13">
                                                            <path d="M53 6.5L1 6.5M1 6.5L7 12M1 6.5L7 0.999996"></path>
                                                        </svg>
                                                    </div>
                                                    <a href="<?php echo esc_url(self::egns_get_theme_option('header_sidebar_button_link', 'url')) ?>" class="secondary-btn2"><?php echo esc_html(self::egns_get_theme_option('header_sidebar_button_text')) ?></a>
                                                    <div class="destination-sidebar-next">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="53" height="13" viewBox="0 0 53 13">
                                                            <path d="M0 6.5H52M52 6.5L46 1M52 6.5L46 12"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            <?php endif ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <?php if (class_exists('CSF') && (self::egns_get_theme_option('header_sidebar_contact_info_show') == 1)) :  ?>
                    <div class="sidebar-bottom">
                        <?php foreach ((array) self::egns_get_theme_option('header_sidebar_contact_info') as $item) : ?>
                            <?php
                            $contactType = isset($item['contact_sidebar_type']) ? $item['contact_sidebar_type'] : 'default_value';
                            // Check if any of the contact information fields is not empty
                            $isNotEmpty = (
                                ($contactType === 'phone' && !empty($item['phone_sidebar_info'])) ||
                                ($contactType === 'email' && !empty($item['email_sidebar_info'])) ||
                                ($contactType === 'others' && !empty($item['custom_sidebar_info']))
                            );
                            if ($isNotEmpty) :
                            ?>
                                <?php if ($contactType === 'phone') : ?>
                                    <div class="hotline-area">
                                        <?php if ($contactType === 'phone' && !empty($item['phone_sidebar_icon_svg']['url'])) :
                                            $phone_icon = $item['phone_sidebar_icon_svg']['url'];
                                        ?>
                                            <div class="icon">
                                                <?php Egns_Helper::display_svg($phone_icon) ?>
                                            </div>
                                        <?php endif ?>
                                        <div class="content">
                                            <?php if ($contactType === 'phone' && !empty($item['phone_sidebar_info_text'])) : ?>
                                                <span><?php echo esc_html($item['phone_sidebar_info_text']); ?></span>
                                            <?php endif ?>
                                            <h6><a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $item['phone_sidebar_info']); ?>"><?php echo esc_html($item['phone_sidebar_info']); ?></a></h6>
                                        </div>
                                    </div>
                                <?php elseif ($contactType === 'email') : ?>
                                    <div class="hotline-area">
                                        <?php if ($contactType === 'email' && !empty($item['email_sidebar_icon_svg']['url'])) :
                                            $email_icon = $item['email_sidebar_icon_svg']['url'];
                                        ?>
                                            <div class="icon">
                                                <?php Egns_Helper::display_svg($email_icon) ?>
                                            </div>
                                        <?php endif ?>
                                        <div class="content">
                                            <?php if ($contactType === 'email' && !empty($item['email_sidebar_info_text'])) : ?>
                                                <span><?php echo esc_html($item['email_sidebar_info_text']); ?></span>
                                            <?php endif ?>
                                            <h6><a href="mailto:<?php echo esc_html($item['email_sidebar_info']); ?>"><?php echo esc_html($item['email_sidebar_info']); ?></a></h6>
                                        </div>
                                    </div>
                                <?php elseif ($contactType === 'others') : ?>
                                    <div class="hotline-area">
                                        <?php if ($contactType === 'others' && !empty($item['custom_sidebar_icon_svg']['url'])) :
                                            $custom_icon = $item['custom_sidebar_icon_svg']['url'];
                                        ?>
                                            <div class="icon">
                                                <?php Egns_Helper::display_svg($custom_icon) ?>
                                            </div>
                                        <?php endif ?>
                                        <div class="content">
                                            <?php if ($contactType === 'others' && !empty($item['custom_sidebar_info_text'])) : ?>
                                                <span><?php echo esc_html($item['custom_sidebar_info_text']); ?></span>
                                            <?php endif ?>
                                            <p><?php echo esc_html($item['custom_sidebar_info']); ?></p>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif ?>
            </div>
<?php endif;
    }

    /**
     * Header topbar options included in this functions
     *
     * @since   1.1.0
     */

    public static function render_top_bar()
    {
        if (class_exists('CSF') && (self::egns_get_theme_option('header_topbar_enable') == 1)) {
            echo '<div class="top-bar style-2">';

            if (class_exists('CSF') && (self::egns_get_theme_option('header_topbar_contact_info_show') == 1)) {

                foreach ((array) self::egns_get_theme_option('header_top_contact_info') as $item) {
                    $contactType = isset($item['contact_top_type']) ? $item['contact_top_type'] : 'default_value';
                    $isNotEmpty = (
                        ($contactType === 'phone' && !empty($item['phone_top_info'])) ||
                        ($contactType === 'email' && !empty($item['email_top_info'])) ||
                        ($contactType === 'others' && !empty($item['custom_top_info']))
                    );

                    if ($isNotEmpty) {
                        echo '<div class="topbar-left two">';
                        if ($contactType === 'phone') {
                            if (!empty($item['phone_top_icon_svg']['url'])) {
                                $phone_ico = $item['phone_top_icon_svg']['url'];
                                echo '<div class="icon">';
                                self::display_svg($phone_ico);
                                echo '</div>';
                            }
                            echo '<div class="content">';
                            if (!empty($item['phone_top_info_text'])) {
                                echo '<span>' . esc_html($item['phone_top_info_text']) . '</span>';
                            }
                            if (!empty($item['phone_top_info'])) {
                                echo '<a href="tel:' . str_replace([' ', '-', '+'], ['', '', ''], esc_html($item['phone_top_info'])) . '">' . esc_html($item['phone_top_info']) . '</a>';
                            }
                        } elseif ($contactType === 'email') {
                            if (!empty($item['email_top_icon_svg']['url'])) {
                                $email_ico = $item['email_top_icon_svg']['url'];
                                echo '<div class="icon">';
                                self::display_svg($email_ico);
                                echo '</div>';
                            }
                            echo '<div class="content">';
                            if (!empty($item['email_top_info_text'])) {
                                echo '<span>' . esc_html($item['email_top_info_text']) . '</span>';
                            }
                            if (!empty($item['email_top_info'])) {
                                echo '<a href="mailto:' . esc_html($item['email_top_info']) . '">' . esc_html($item['email_top_info']) . '</a>';
                            }
                        } elseif ($contactType === 'others') {
                            if (!empty($item['custom_top_icon_svg']['url'])) {
                                $custom_ico = $item['custom_top_icon_svg']['url'];
                                echo '<div class="icon">';
                                self::display_svg($custom_ico);
                                echo '</div>';
                            }
                            echo '<div class="content">';
                            if (!empty($item['custom_top_info_txt'])) {
                                echo '<span>' . esc_html($item['custom_top_info_txt']) . '</span>';
                            }
                            if (!empty($item['custom_top_info'])) {
                                echo '<p>' . wp_kses(($item['custom_top_info'] ?? ''), wp_kses_allowed_html('post')) . '</p>';
                            }
                        }
                        echo '</div></div>';
                    }
                }
            }

            if (class_exists('CSF') && self::egns_get_theme_option('promotional_msg_show') == 1) {
                $promotional_msg = self::egns_get_theme_option('promotional_msg');
                if (!empty($promotional_msg)) {
                    echo '<p>' . wp_kses($promotional_msg, wp_kses_allowed_html('post')) . '</p>';
                }
            }

            if (class_exists('CSF') && self::egns_get_theme_option('topbar_social_enable') == 1) {
                $topbar_social = self::egns_get_theme_option('topbar_bottom_social');
                if (!empty($topbar_social) && is_array($topbar_social)) {
                    echo '<div class="topbar-right"><div class="social-icon-area"><ul>';
                    foreach ($topbar_social as $icon) {
                        $social_icon_url = esc_url($icon['topbar_social_icon_url']['url']);
                        $social_icon_class = esc_html($icon['topbar_social_icon_class']);
                        echo '<li><a href="' . esc_url($social_icon_url) . '"><i class="' . esc_attr($social_icon_class) . '"></i></a></li>';
                    }
                    echo '</ul></div></div>';
                }
            }

            echo '</div>';
        }
    }
} //end class

Header_Helper::init();
