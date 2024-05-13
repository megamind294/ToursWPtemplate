<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package triprex
 */

get_header();

// Include breadcrumb template
Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');
?>
<div class="visa-with-sidebar-section pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="<?php echo Egns\Helper\Egns_Helper::egns_get_theme_option('visa_archive_sidebar_enable') == 1 ? 'col-lg-8 ' : 'col-lg-12'  ?>">
                <div class="package-inner-title-section mb-40">
                    <?php
                    global $wp_query;
                    $total_posts = $wp_query->found_posts;
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $posts_per_page = get_query_var('posts_per_page');
                    $start = ($paged - 1) * $posts_per_page + 1;
                    $end = min($paged * $posts_per_page, $total_posts);
                    echo '<p>' . esc_html__('Showing ', 'triprex') . $start . '-' . $end . esc_html__(' of ', 'triprex') . $total_posts . esc_html__(' Results', 'triprex') . '</p>';
                    ?>
                    <div class="selector-and-grid">
                        <ul class="grid-view">
                            <li class="grid">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                    <mask id="mask0_1631_19" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="14" height="14">
                                        <rect width="14" height="14" fill="#D9D9D9"></rect>
                                    </mask>
                                    <g mask="url(#mask0_1631_19)">
                                        <path d="M5.47853 6.08726H0.608726C0.272536 6.08726 0 5.81472 0 5.47853V0.608726C0 0.272536 0.272536 0 0.608726 0H5.47853C5.81472 0 6.08726 0.272536 6.08726 0.608726V5.47853C6.08726 5.81472 5.81472 6.08726 5.47853 6.08726Z"></path>
                                        <path d="M13.3911 6.08726H8.52132C8.18513 6.08726 7.9126 5.81472 7.9126 5.47853V0.608726C7.9126 0.272536 8.18513 0 8.52132 0H13.3911C13.7273 0 13.9999 0.272536 13.9999 0.608726V5.47853C13.9999 5.81472 13.7273 6.08726 13.3911 6.08726Z"></path>
                                        <path d="M5.47853 14.0013H0.608726C0.272536 14.0013 0 13.7288 0 13.3926V8.52279C0 8.1866 0.272536 7.91406 0.608726 7.91406H5.47853C5.81472 7.91406 6.08726 8.1866 6.08726 8.52279V13.3926C6.08726 13.7288 5.81472 14.0013 5.47853 14.0013Z"></path>
                                        <path d="M13.3916 14.0013H8.52181C8.18562 14.0013 7.91309 13.7288 7.91309 13.3926V8.52279C7.91309 8.1866 8.18562 7.91406 8.52181 7.91406H13.3916C13.7278 7.91406 14.0003 8.1866 14.0003 8.52279V13.3926C14.0003 13.7288 13.7278 14.0013 13.3916 14.0013Z"></path>
                                    </g>
                                </svg>
                            </li>
                            <li class="lists active">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                    <mask id="mask0_1631_3" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="14" height="14">
                                        <rect width="14" height="14" fill="#D9D9D9"></rect>
                                    </mask>
                                    <g mask="url(#mask0_1631_3)">
                                        <path d="M1.21747 2C0.545203 2 0 2.55848 0 3.24765C0 3.93632 0.545203 4.49433 1.21747 4.49433C1.88974 4.49433 2.43494 3.93632 2.43494 3.24765C2.43494 2.55848 1.88974 2 1.21747 2Z"></path>
                                        <path d="M1.21747 5.75195C0.545203 5.75195 0 6.30996 0 6.99913C0 7.68781 0.545203 8.24628 1.21747 8.24628C1.88974 8.24628 2.43494 7.68781 2.43494 6.99913C2.43494 6.30996 1.88974 5.75195 1.21747 5.75195Z"></path>
                                        <path d="M1.21747 9.50586C0.545203 9.50586 0 10.0643 0 10.753C0 11.4417 0.545203 12.0002 1.21747 12.0002C1.88974 12.0002 2.43494 11.4417 2.43494 10.753C2.43494 10.0643 1.88974 9.50586 1.21747 9.50586Z"></path>
                                        <path d="M13.0845 2.31055H4.42429C3.91874 2.31055 3.50879 2.7305 3.50879 3.24886C3.50879 3.76677 3.91871 4.1867 4.42429 4.1867H13.0845C13.59 4.1867 14 3.76677 14 3.24886C14 2.7305 13.59 2.31055 13.0845 2.31055Z"></path>
                                        <path d="M13.0845 6.06055H4.42429C3.91874 6.06055 3.50879 6.48047 3.50879 6.99886C3.50879 7.51677 3.91871 7.9367 4.42429 7.9367H13.0845C13.59 7.9367 14 7.51677 14 6.99886C14 6.48047 13.59 6.06055 13.0845 6.06055Z"></path>
                                        <path d="M13.0845 9.81348H4.42429C3.91874 9.81348 3.50879 10.2334 3.50879 10.7513C3.50879 11.2692 3.91871 11.6891 4.42429 11.6891H13.0845C13.59 11.6891 14 11.2692 14 10.7513C14 10.2334 13.59 9.81348 13.0845 9.81348Z"></path>
                                    </g>
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="list-grid-product-wrap">
                    <div class="row gy-4">
                        <?php
                        // Retrieve options
                        $visa_archive_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('visa_archive_num_of_post');
                        $visa_archive_post_order = Egns\Helper\Egns_Helper::egns_get_theme_option('visa_archive_post_order');
                        $order = ($visa_archive_post_order == 'descending') ? 'DESC' : 'ASC';

                        $args = array(
                            'post_type'         => 'visa', //it is a Page right?
                            'posts_per_page'    => $visa_archive_num_of_post,
                            'order'             => $order,
                            'post_status'       => 'publish',
                            'paged'             => get_query_var('paged') ? get_query_var('paged') : 1
                        );
                        $args = array_merge($wp_query->query_vars, $args);
                        $wp_query = new WP_Query($args);
                        $num = 0;

                        if ($wp_query->have_posts()) {

                            while ($wp_query->have_posts()) :
                                $num++;
                                $wp_query->the_post();

                                echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('visa', 'content/archive-visa'));

                            endwhile; // End of the loop.

                        } else {
                            // Include global posts not found
                            Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="inner-pagination-area">
                            <?php
                            // Pagination
                            Egns\Inc\Blog_Helper::egns_pagination();
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
            <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('visa_archive_sidebar_enable') == 1)) :  ?>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('visa_archive_sidebar_faq_enable') == 1)) :  ?>
                            <?php
                            $faq_heading = Egns\Helper\Egns_Helper::egns_get_theme_option('visa_sidebar_faq_heading');
                            ?>
                            <?php if (!empty($faq_heading)) : ?>
                                <h5 class="widget-title mb-30"><?php echo sprintf(__('%s', 'triprex'), $faq_heading); ?></h5>
                            <?php endif; ?>

                            <?php $faq_data = Egns\Helper\Egns_Helper::egns_get_theme_option('visa_sidebar_faq_re');
                            if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('visa_sidebar_faq_re'))) : ?>
                                <div class="faq-content mb-50">
                                    <div class="accordion" id="accordionTravel">
                                        <?php
                                        $first_item = true;

                                        foreach ($faq_data as $index => $step_data) :
                                            $accordion_id = 'travelcollapse' . $index;

                                        ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="travelheading<?php echo esc_attr($index); ?>">
                                                    <button class="accordion-button <?php echo esc_attr($first_item ? '' : 'collapsed'); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($accordion_id); ?>" aria-expanded="<?php echo esc_attr($first_item ? 'true' : 'false'); ?>" aria-controls="<?php echo esc_attr($accordion_id); ?>">
                                                        <?php echo sprintf(__('%s', 'triprex'), $step_data['visa_sidebar_faq_qustion']); ?>
                                                    </button>
                                                </h2>
                                                <div id="<?php echo esc_attr($accordion_id); ?>" class="accordion-collapse collapse<?php echo esc_attr($first_item ? ' show' : ''); ?>" aria-labelledby="travelheading<?php echo esc_attr($index); ?>" data-bs-parent="#accordionTravel">
                                                    <div class="accordion-body">
                                                        <?php echo sprintf(__('%s', 'triprex'), $step_data['visa_sidebar_faq_answer']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            $first_item = false;
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('arch_sid_banner_card_show_hide') == 1)) :  ?>
                            <div class="banner2-card">
                                <?php
                                $arch_sid_banner_card_bg_img = Egns\Helper\Egns_Helper::egns_get_theme_option('arch_sid_banner_card_bg_img', 'url');
                                ?>
                                <?php if (!empty($arch_sid_banner_card_bg_img)) : ?>
                                    <img src="<?php echo esc_url($arch_sid_banner_card_bg_img); ?>" alt="<?php esc_attr_e('card-img', 'triprex'); ?>">
                                <?php endif; ?>
                                <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('arch_sid_bnr_crd_contact_info_show') == 1)) :  ?>
                                    <div class="banner2-content-wrap">
                                        <div class="banner2-content">
                                            <?php foreach ((array) Egns\Helper\Egns_Helper::egns_get_theme_option('arch_sid_bnr_crd_contact_info') as $item) : ?>
                                                <?php
                                                $contactType = isset($item['arch_sid_contact_bnr_type']) ? $item['arch_sid_contact_bnr_type'] : 'default_value';
                                                // Check if any of the contact information fields is not empty
                                                $isNotEmpty = (
                                                    ($contactType === 'phone' && !empty($item['arch_sid_phone_bnr_info'])) ||
                                                    ($contactType === 'email' && !empty($item['arch_sid_email_bnr_info'])) ||
                                                    ($contactType === 'others' && !empty($item['arch_sid_custom_bnr_info']))
                                                );
                                                if ($isNotEmpty) :
                                                ?>
                                                    <?php if ($contactType === 'phone') : ?>
                                                        <div class="hotline-area">
                                                            <?php if ($contactType === 'phone' && !empty($item['arch_sid_phone_bnr_icon_svg']['url'])) : ?>
                                                                <div class="icon">
                                                                    <img src="<?php echo esc_url($item['arch_sid_phone_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                                </div>
                                                            <?php endif ?>
                                                            <div class="content">
                                                                <?php if ($contactType === 'phone' && !empty($item['arch_sid_phone_bnr_info_text'])) : ?>
                                                                    <span><?php echo esc_html($item['arch_sid_phone_bnr_info_text']); ?></span>
                                                                <?php endif ?>
                                                                <h6><a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $item['arch_sid_phone_bnr_info']); ?>"><?php echo esc_html($item['arch_sid_phone_bnr_info']); ?></a></h6>
                                                            </div>
                                                        </div>
                                                    <?php elseif ($contactType === 'email') : ?>
                                                        <div class="hotline-area">
                                                            <?php if ($contactType === 'email' && !empty($item['arch_sid_email_bnr_icon_svg']['url'])) : ?>
                                                                <div class="icon">
                                                                    <img src="<?php echo esc_url($item['arch_sid_email_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                                </div>
                                                            <?php endif ?>
                                                            <div class="content">
                                                                <?php if ($contactType === 'email' && !empty($item['arch_sid_email_bnr_info_text'])) : ?>
                                                                    <span><?php echo esc_html($item['arch_sid_email_bnr_info_text']); ?></span>
                                                                <?php endif ?>
                                                                <h6><a href="mailto:<?php echo esc_html($item['arch_sid_email_bnr_info']); ?>"><?php echo esc_html($item['arch_sid_email_bnr_info']); ?></a></h6>
                                                            </div>
                                                        </div>
                                                    <?php elseif ($contactType === 'others') : ?>
                                                        <div class="hotline-area">
                                                            <?php if ($contactType === 'others' && !empty($item['arch_sid_custom_bnr_icon_svg']['url'])) : ?>
                                                                <div class="icon">
                                                                    <img src="<?php echo esc_url($item['arch_sid_custom_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                                </div>
                                                            <?php endif ?>
                                                            <div class="content">
                                                                <?php if ($contactType === 'others' && !empty($item['arch_sid_custom_bnr_info_txt'])) : ?>
                                                                    <span><?php echo esc_html($item['arch_sid_custom_bnr_info_txt']); ?></span>
                                                                <?php endif ?>
                                                                <h5><?php echo wp_kses(($item['arch_sid_custom_bnr_info']), wp_kses_allowed_html('post')); ?></h5>
                                                            </div>
                                                        </div>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>