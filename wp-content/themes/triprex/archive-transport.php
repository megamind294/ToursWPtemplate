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
<div class="transport-page pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('transport_archive_sidebar_enable') == 1)) {
                // Include global posts not found
                Egns\Helper\Egns_Helper::egns_template_part('transport', 'parts/archive-sidebar');
            }
            ?>
            <div class="<?php echo Egns\Helper\Egns_Helper::egns_get_theme_option('transport_archive_sidebar_enable') == 1 ? 'col-xl-8 ' : 'col-xl-12'  ?>  order-lg-2 order-1">
                <div class="circle-loader"></div>
                <div class="row g-4" id="transportFilterData">
                    <?php
                    // Retrieve options
                    $transport_archive_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('transport_archive_num_of_post');
                    $transport_archive_post_order = Egns\Helper\Egns_Helper::egns_get_theme_option('transport_archive_post_order');
                    $order = ($transport_archive_post_order == 'descending') ? 'DESC' : 'ASC';

                    $journey_date = get_query_var('reserve_date');
                    if (!empty($journey_date)) {
                        $transport_query_var = [
                            'reserve_date'  => $journey_date,
                        ];
                        set_transient('triprex_transport_query_var', $transport_query_var, 10000);
                    }

                    $args = array(
                        'post_type'         => 'transport', //it is a Page right?
                        'posts_per_page'    => $transport_archive_num_of_post,
                        'order'             => $order,
                        'post_status'       => 'publish',
                        'paged'             => (get_query_var('paged')) ? get_query_var('paged') : 1
                    );
                    $args = array_merge($wp_query->query_vars, $args);
                    $wp_query = new WP_Query($args);
                    $num = 0;

                    if ($wp_query->have_posts()) {

                        while ($wp_query->have_posts()) :
                            $num++;
                            $wp_query->the_post();

                            echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('transport', 'content/archive-transport'));

                        endwhile; // End of the loop.

                    } else {
                        // Include global posts not found
                        Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
                    }
                    wp_reset_postdata();
                    ?>
                    <div class="col-lg-12">
                        <nav class="inner-pagination-area" id="transportPackagePagination">
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