<?php

use Egns\Helper\Egns_Helper;
?>

<div class="destination-details-wrap mb-100 pt-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-8">
                <?php the_content(); ?>
            </div>
            <div class="col-lg-4">
                <div class="destination-sidebar">
                    <?php $destination_info = (array) Egns\Helper\Egns_Helper::egns_destination_value('destination_general_info_re');
                    if (!empty(Egns\Helper\Egns_Helper::egns_destination_value('destination_general_info_re'))) :  ?>
                        <div class="destination-info mb-30">
                            <?php
                            foreach ($destination_info as $step_data) :
                            ?>
                                <div class="single-info">
                                    <?php if (!empty($step_data['destination_info_label_text'])) : ?>
                                        <span><?php echo sprintf(__('%s', 'triprex'), $step_data['destination_info_label_text']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($step_data['destination_info_content_text'])) : ?>
                                        <h5><?php echo sprintf(__('%s', 'triprex'), $step_data['destination_info_content_text']); ?></h5>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_show_hide') == 1)) :  ?>
                        <div class="banner2-card four">
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('dsti_banner_card_bg_img', 'url'))) : ?>
                                <img src="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('dsti_banner_card_bg_img', 'url')) ?>" alt="<?php esc_attr_e('card2-img', 'triprex'); ?>">
                            <?php endif ?>
                            <div class="banner2-content-wrap">
                                <div class="banner2-content">
                                    <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_content_title'))) : ?>
                                        <span><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_content_title')) ?></span>
                                    <?php endif ?>
                                    <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_content_offer_txt'))) : ?>
                                        <h3><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_content_offer_txt')) ?></h3>
                                    <?php endif ?>
                                    <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_content_desc'))) : ?>
                                        <p><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_content_desc')) ?></p>
                                    <?php endif ?>
                                </div>
                                <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_btn_enable') == 1)) :  ?>
                                    <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_btn_text'))) : ?>
                                        <a href="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_btn_link', 'url')) ?>" class="primary-btn1"><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('desti_banner_card_btn_text')) ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
$post_id = get_the_ID();
$terms = get_the_terms($post_id, 'city-location');
if (!empty($terms)) : ?>
    <div class="destination-location-gallery mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3><?php the_title(); ?> <?php echo esc_html__('Location.', 'triprex'); ?></h3>
                </div>
                <div class="col-lg-12 mb-60">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <?php
                        $post_id = get_the_ID();
                        $terms = get_the_terms($post_id, 'city-location');
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $index => $term) {
                                $meta = get_term_meta($term->term_id, 'triprex-city-location', true);
                                if ($meta['triprex_city_location_logo'] ?? '') :
                                    $background_image = $meta['triprex_city_location_logo']['url'];
                                endif;
                        ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo esc_attr(($index === 0) ? 'active' : ''); ?>" id="<?php echo esc_attr($term->slug); ?>-tab" data-bs-toggle="pill" data-bs-target="#<?php echo esc_attr($term->slug); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr($term->slug); ?>" aria-selected="<?php echo esc_attr(($index === 0) ? 'true' : 'false'); ?>">
                                        <?php if ($background_image  ?? '') : ?>
                                            <img src="<?php echo esc_url($background_image) ?>" alt="<?php echo esc_attr__('image', 'triprex'); ?>">
                                        <?php endif; ?>
                                        <span><?php echo sprintf(__('%s', 'triprex'), $term->name); ?></span>
                                    </button>
                                </li>
                            <?php
                            }   ?>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <?php foreach ($terms as $index => $term) { ?>
                            <div class="tab-pane fade <?php echo esc_attr(($index === 0) ? 'show active' : ''); ?>" id="<?php echo esc_attr($term->slug); ?>" role="tabpanel">
                                <div class="destination-gallery">
                                    <div class="row g-4">
                                        <?php
                                        $meta = get_term_meta($term->term_id, 'triprex-city-location', true);

                                        if (isset($meta['triprex_city_location_gallery'])) {
                                            $gallery_image_ids = explode(',', $meta['triprex_city_location_gallery']);
                                            $column_classes = array(
                                                'col-lg-4 col-sm-6', 'col-lg-5 col-sm-6', 'col-lg-3 col-sm-6', 'col-lg-3 col-sm-6',
                                                'col-lg-4 col-sm-6', 'col-lg-5 col-sm-6', 'col-lg-4 col-sm-6', 'col-lg-5 col-sm-6', 'col-lg-3 col-sm-6', 'col-lg-3 col-sm-6',
                                                'col-lg-4 col-sm-6', 'col-lg-5 col-sm-6', 'col-lg-3 col-sm-6',
                                                'col-lg-4 col-sm-6', 'col-lg-5 col-sm-6'
                                            );
                                            $column_index = 0;

                                            foreach ($gallery_image_ids as $image_id) {
                                                $image_url = wp_get_attachment_image_url($image_id, 'full');
                                                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                                $current_column_class = $column_classes[$column_index];
                                        ?>
                                                <div class="<?php echo esc_attr($current_column_class); ?>">
                                                    <div class="gallery-img-wrap">
                                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                                        <a data-fancybox="gallery-01" href="<?php echo esc_url($image_url); ?>"><i class="bi bi-eye"></i> <?php echo esc_html__('Discover', 'triprex'); ?></a>
                                                    </div>
                                                </div> <?php
                                                        $column_index++;
                                                        if ($column_index >= count($column_classes)) {
                                                            $column_index = 0;
                                                        }
                                                    }
                                                } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (Egns\Helper\Egns_Helper::egns_destination_value('destination_activities_switcher')) : ?>
    <?php $destination_activity = Egns\Helper\Egns_Helper::egns_destination_value('destination_activity_re');

    if (Egns\Helper\Egns_Helper::egns_destination_value('destination_activity_re') ?? '') :
    ?>
        <div class="destination-activitis-wrap mb-120">
            <div class="container">
                <div class="activity-card-slider-wrap">
                    <div class="row">
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_destination_value('destination_activities'))) : ?>
                            <div class="col-lg-12 mb-30 d-flex align-items-center justify-content-between">
                                <div class="desti-title">
                                    <h3><?php echo Egns\Helper\Egns_Helper::egns_destination_value('destination_activities') ?></h3>
                                </div>
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
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-12">
                            <div class="swiper activity-card-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    foreach ($destination_activity as $step_data) :
                                        $thumbnail_url = isset($step_data['destination_activity_thumbnail']['url']) ? esc_url($step_data['destination_activity_thumbnail']['url']) : '';
                                        $image_icon = isset($step_data['destination_activity_icon_image']['url']) ? esc_url($step_data['destination_activity_icon_image']['url']) : '';
                                        $activity_title = isset($step_data['destination_activity_title']) ? wp_kses($step_data['destination_activity_title'], wp_kses_allowed_html('post')) : '';
                                        $activity_url = isset($step_data['destination_activity_title_url']) ? esc_html($step_data['destination_activity_title_url']) : '';
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="activity-card">
                                                <?php if (!empty($thumbnail_url)) : ?>
                                                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex'); ?>">
                                                <?php endif; ?>
                                                <div class="activity-card-content-wrapper">
                                                    <div class="activity-card-content">
                                                        <?php if (!empty($image_icon)) : ?>
                                                            <div class="icon">
                                                                <img src="<?php echo esc_url($image_icon); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex'); ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (!empty($activity_title)) : ?>
                                                            <div class="content">
                                                                <h6><a href="<?php echo esc_url($activity_url); ?>"><?php echo wp_kses($activity_title, wp_kses_allowed_html('post')); ?></a></h6>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
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
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('destination_details_page_recom_pkg_show') == 1)) :  ?>

    <?php
    $recom_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('recom_num_of_post');
    $recom_post_order = Egns\Helper\Egns_Helper::egns_get_theme_option('recom_post_order');
    $args = array(
        'post_type'      => 'tours',
        'posts_per_page' => $recom_num_of_post,
        'order'          => $recom_post_order,
        // 'meta_key'       => 'post_views_count',
        'orderby'        => 'meta_value_num',
        'post_status'    => 'publish',
    );
    $query = new \WP_Query($args);
    if ($query->have_posts()) :
    ?>
        <div class="recommendated-package-area mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-30 d-flex align-items-center justify-content-between">
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('destination_details_page_recom_pkg_heading'))) : ?>
                            <div class="desti-title">
                                <h3><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('destination_details_page_recom_pkg_heading')) ?></h3>
                            </div>
                        <?php endif ?>
                        <div class="slider-btn-grp2 width-100">
                            <div class="slider-btn package-card-tab-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17">
                                    <path d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z" />
                                </svg>
                            </div>
                            <div class="slider-btn package-card-tab-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17" fill="none">
                                    <path d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12  mb-50">
                        <div class="swiper package-card-tab-slider">
                            <div class="swiper-wrapper">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <div class="package-card">
                                            <div class="package-card-img-wrap">
                                                <a href="<?php the_permalink(); ?>" class="card-img"><?php the_post_thumbnail('card-thumb'); ?></a>
                                                <div class="batch">
                                                    <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                                                        <span class="date"><?php echo esc_html(Egns\Helper\Egns_Helper::egns_tours_value('tour_duration')); ?></span>
                                                    <?php endif; ?>
                                                    <?php $selected_destination = Egns\Helper\Egns_Helper::egns_tours_value('tour_destination_select');
                                                    if (!empty($selected_destination)) :  ?>
                                                        <div class="location">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                <path d="M8.99939 0C5.40484 0 2.48047 2.92437 2.48047 6.51888C2.48047 10.9798 8.31426 17.5287 8.56264 17.8053C8.79594 18.0651 9.20326 18.0646 9.43613 17.8053C9.68451 17.5287 15.5183 10.9798 15.5183 6.51888C15.5182 2.92437 12.5939 0 8.99939 0ZM8.99939 9.79871C7.19088 9.79871 5.71959 8.32739 5.71959 6.51888C5.71959 4.71037 7.19091 3.23909 8.99939 3.23909C10.8079 3.23909 12.2791 4.71041 12.2791 6.51892C12.2791 8.32743 10.8079 9.79871 8.99939 9.79871Z" />
                                                            </svg>
                                                            <ul class="location-list">
                                                                <?php
                                                                if (!empty($selected_destination)) {
                                                                    foreach ($selected_destination as $destination_id) {
                                                                        $destination_title = get_the_title($destination_id);
                                                                        $destination_permalink = get_permalink($destination_id);
                                                                ?>
                                                                        <li><a href="<?php echo esc_url($destination_permalink); ?>"> <?php echo esc_html($destination_title); ?></a></li>
                                                                <?php   }
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="package-card-content">
                                                <div class="card-content-top">
                                                    <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                                    <?php
                                                    $selected_location = Egns\Helper\Egns_Helper::egns_tours_value('tour_destination_location_select');
                                                    // Check if there are selected locations
                                                    if (!empty($selected_location)) {
                                                        echo '<div class="location-area">';
                                                        echo '<ul class="location-list scrollTextAni">';
                                                        foreach ($selected_location as $location_id) {
                                                            $term = get_term($location_id, 'city-location');
                                                            if ($term && !is_wp_error($term)) {
                                                                $term_name = esc_html($term->name);
                                                                $term_link = esc_url(get_term_link($term));
                                                                echo '<li><a href="' . $term_link . '">' . $term_name . '</a></li>';
                                                            }
                                                        }
                                                        echo '</ul>';
                                                        echo '</div>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="card-content-bottom">
                                                    <div class="price-area">
                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_before_price'))) : ?>
                                                            <h6><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></h6>
                                                        <?php endif; ?>
                                                        <?php echo \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?>
                                                        <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_after_price'))) : ?>
                                                            <p><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_after_price')); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="primary-btn2"><?php echo esc_html__('Book A Trip', 'triprex'); ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                            <path d="M8.15624 10.2261L7.70276 12.3534L5.60722 18L6.85097 17.7928L12.6612 10.1948C13.4812 10.1662 14.2764 10.1222 14.9674 10.054C18.1643 9.73783 17.9985 8.99997 17.9985 8.99997C17.9985 8.99997 18.1643 8.26211 14.9674 7.94594C14.2764 7.87745 13.4811 7.8335 12.6611 7.80518L6.851 0.206972L5.60722 -5.41705e-07L7.70276 5.64663L8.15624 7.77386C7.0917 7.78979 6.37132 7.81403 6.37132 7.81403C6.37132 7.81403 4.90278 7.84793 2.63059 8.35988L0.778036 5.79016L0.000253424 5.79016L0.554115 8.91458C0.454429 8.94514 0.454429 9.05483 0.554115 9.08539L0.000253144 12.2098L0.778036 12.2098L2.63059 9.64035C4.90278 10.1523 6.37132 10.1857 6.37132 10.1857C6.37132 10.1857 7.0917 10.2102 8.15624 10.2261Z"></path>
                                                            <path d="M12.0703 11.9318L12.0703 12.7706L8.97041 12.7706L8.97041 11.9318L12.0703 11.9318ZM12.0703 5.23292L12.0703 6.0714L8.97059 6.0714L8.97059 5.23292L12.0703 5.23292ZM9.97892 14.7465L9.97892 15.585L7.11389 15.585L7.11389 14.7465L9.97892 14.7465ZM9.97892 2.41846L9.97892 3.2572L7.11389 3.2572L7.11389 2.41846L9.97892 2.41846Z"></path>
                                                        </svg>
                                                    </a>
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
                    <?php if (class_exists('CSF') && Egns\Helper\Egns_Helper::egns_get_theme_option('destination_details_page_recom_pkg_btn_enable') == 1) : ?>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('destination_details_page_recom_pkg_btn_text'))) : ?>
                            <div class="col-lg-12 d-flex align-items-center justify-content-center">
                                <a href="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('destination_details_page_recom_pkg_btn_link', 'url')) ?>" class="secondary-btn4"><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('destination_details_page_recom_pkg_btn_text')) ?></a>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>
<?php endif; ?>