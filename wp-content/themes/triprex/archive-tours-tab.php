<?php

/**
 * The template for displaying archive pages
 * 
 * Template Name: Tours Tab
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package triprex
 */

get_header();

// Include breadcrumb template
Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');

$args = array(
    'taxonomy' => 'tour-types',
    'hide_empty' => false,
    'orderby' => 'slug',
);
$tourTypes =  get_terms($args);

?>

<!-- Start Package Category nav section -->
<div class="package-category-nav-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="nav nav-pills" id="pills-tab" role="tablist">
                    <div class="swiper tour-tab-slider">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ((array) $tourTypes as $key => $types) :

                                $types_name = $types->name;
                                $tab_class = $key == 0 ? 'nav-link active' : 'nav-link';

                                // Get icon data for the current tour type
                                $icon_data = get_term_meta($types->term_id, 'triprex-tours-type', true);
                                $tour_type_icon = $icon_data['triprex_tour_type_icon']['url']
                            ?>
                                <div class="swiper-slide">
                                    <div class="nav-item" role="presentation">
                                        <div class="<?php echo esc_attr($tab_class) ?>" id="<?php echo esc_attr($types->slug) ?>-tab" data-bs-toggle="pill" data-bs-target="#<?php echo esc_attr($types->slug) ?>" role="tab" aria-controls="<?php echo esc_attr($types->slug) ?>" aria-selected="true">
                                            <?php if (!empty($icon_data['triprex_tour_type_icon'])) : ?>

                                                <div class="icon">
                                                    <?php \Egns\Helper\Egns_Helper::display_svg($tour_type_icon) ?>
                                                </div>

                                            <?php endif ?>
                                            <div class="content">
                                                <h5><?php echo esc_html($types_name) ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if (!empty($tourTypes)) : ?>
                        <div class="slider-btn-grp4">
                            <div class="slider-btn tour-tab-slider-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 16 20">
                                    <path d="M15.9512 0.869644C13.5972 7.34699 13.5419 12.9847 15.8404 19.1322C15.9511 19.4021 15.8404 19.7319 15.6188 19.8819C15.3973 20.0618 15.0927 20.0318 14.8988 19.8219C10.1356 14.7839 5.28936 11.7252 0.470783 10.6756C0.193853 10.6157 1.79767e-06 10.3458 1.82127e-06 10.0759C1.84749e-06 9.77599 0.193853 9.50611 0.470783 9.44613C5.26167 8.36657 10.1633 5.24785 15.0096 0.179928C15.1204 0.0599765 15.2588 -1.97214e-06 15.425 -1.95762e-06C15.5358 -1.94793e-06 15.6465 0.0299873 15.7573 0.119951C15.9788 0.26989 16.0619 0.569767 15.9512 0.869644Z" />
                                </svg>
                            </div>
                            <div class="slider-btn tour-tab-slider-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 16 20">
                                    <path d="M0.0488516 19.1304C2.40275 12.6531 2.45814 7.01538 0.159624 0.867897C0.0488521 0.598007 0.159624 0.268143 0.381167 0.118204C0.602711 -0.0617224 0.907334 -0.0317344 1.10118 0.17818C5.86437 5.21612 10.7106 8.27486 15.5292 9.32443C15.8061 9.38441 16 9.6543 16 9.92419C16 10.2241 15.8061 10.494 15.5292 10.5539C10.7383 11.6335 5.83668 14.7522 0.990413 19.8201C0.879641 19.9401 0.741176 20.0001 0.575018 20.0001C0.464247 20.0001 0.353474 19.9701 0.242703 19.8801C0.0211589 19.7302 -0.0619202 19.4303 0.0488516 19.1304Z" />
                                </svg>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Package Category nav section -->

<!-- Start Package Category section -->
<div class="package-category-section pt-120 mb-120">
    <div class="container">
        <div class="tab-content" id="v-pills-tabContent">

            <?php

            foreach ((array) $tourTypes as $key => $types) :

                $types_name = $types->name;
                $tab_class = $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade';
            ?>
                <div class="<?php echo esc_attr($tab_class) ?>" id="<?php echo esc_attr($types->slug) ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($types->slug) ?>-tab">
                    <div class="package-grid">
                        <div class="row gy-5">

                            <?php
                            $tour_archive_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('tour_archive_num_of_post');
                            $tour_archive_post_order = Egns\Helper\Egns_Helper::egns_get_theme_option('tour_archive_post_order');
                            $order = ($tour_archive_post_order == 'descending') ? 'DESC' : 'ASC';
                            $args = array(
                                'post_type'         => 'tours', //it is a Page right?
                                'post_status'       => 'publish',
                                'posts_per_page'    => $tour_archive_num_of_post,
                                'order'             => $order,
                                'paged'             => (get_query_var('paged')) ? get_query_var('paged') : 1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'tour-types',
                                        'field'    => 'slug',
                                        'terms'    => array($types->slug),
                                        'operator' => 'IN',
                                    )
                                )
                            );
                            $wp_query = new WP_Query($args);
                            $num = 0;

                            if ($wp_query->have_posts()) {

                                while ($wp_query->have_posts()) :
                                    $num++;
                                    $wp_query->the_post();

                                    echo Egns\Helper\Egns_Helper::egns_get_template_part('tours', 'content/archive-tours-grid');

                                endwhile;
                            } else {

                                Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
                            }
                            wp_reset_postdata();
                            ?>
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
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- End Package Category section -->

<?php get_footer(); ?>