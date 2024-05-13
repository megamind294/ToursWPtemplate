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
<div class="room-suits-page pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_archive_sidebar_enable') == 1)) :  ?>
                <div class="col-xl-4 order-lg-1 order-2">
                    <?php
                    // Include global posts not found
                    Egns\Helper\Egns_Helper::egns_template_part('hotel', 'parts/archive-sidebar');
                    ?>
                </div>
            <?php endif ?>
            <div class="<?php echo Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_archive_sidebar_enable') == 1 ? 'col-xl-8 ' : 'col-xl-12'  ?> order-lg-2 order-1" id="hotelFilterData">
                <div class="circle-loader"></div>
                <?php
                // Retrieve options
                $hotel_archive_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_archive_num_of_post');
                $hotel_archive_post_order = Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_archive_post_order');

                $person_quantity = get_query_var('person_quantity');
                $date_range      = get_query_var('daterange');
                if (!empty($person_quantity) || !empty($date_range)) {
                    $hotel_query_var = [
                        'person'     => $person_quantity,
                        'date_range' => $date_range,
                    ];
                    set_transient('triprex_hotel_query_var', $hotel_query_var, 10000);
                }

                $order = ($hotel_archive_post_order == 'descending') ? 'DESC' : 'ASC';
                $args = array(
                    'post_type'         => 'hotel',
                    'post_status'       => 'publish',
                    'posts_per_page'    => $hotel_archive_num_of_post,
                    'order'             => $order,
                    'paged'             => (get_query_var('paged')) ? get_query_var('paged') : 1
                );
                $args = array_merge($wp_query->query_vars, $args);
                $wp_query = new WP_Query($args);
                $num = 0;
                if ($wp_query->have_posts()) {

                    while ($wp_query->have_posts()) :
                        $num++;
                        $wp_query->the_post();

                        echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('hotel', 'content/archive-hotel', '', ['person_quantity'  => $person_quantity, 'date_range'    => $date_range]));

                    endwhile; // End of the loop.

                } else {
                    // Include global posts not found
                    Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
                }
                wp_reset_postdata();
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="inner-pagination-area" id="hotelPackagePagination">
                            <?php
                            // Pagination
                            Egns\Inc\Blog_Helper::egns_pagination();
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>