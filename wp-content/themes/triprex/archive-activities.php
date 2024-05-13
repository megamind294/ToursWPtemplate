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
<div class="activites-pages pt-120 mb-120">
    <div class="container">
        <div class="row g-4">
            <?php
            // Retrieve options
            $activities_archive_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('activities_archive_num_of_post');
            $activities_archive_post_order = Egns\Helper\Egns_Helper::egns_get_theme_option('activities_archive_post_order');

            $activities_date = get_query_var('inOut');
            if (!empty($activities_date)) {
                $activities_query_var = [
                    'activities_date'     => $activities_date,
                ];
                set_transient('triprex_activities_query_var', $activities_query_var, 10000);
            }

            $order = ($activities_archive_post_order == 'descending') ? 'DESC' : 'ASC';
            $args = array(
                'post_type'         => 'activities', //it is a Page right?
                'posts_per_page'    => $activities_archive_num_of_post,
                'order'             => $order,
                'post_status'       => 'publish',
                'paged'             => (get_query_var('paged')) ? get_query_var('paged') : 1,
            );
            $args = array_merge($wp_query->query_vars, $args);
            $wp_query = new WP_Query($args);
            $num = 0;

            if ($wp_query->have_posts()) {

                while ($wp_query->have_posts()) :
                    $num++;
                    $wp_query->the_post();

                    echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('activities', 'content/archive-activities'));

                endwhile; // End of the loop.

            } else {
                // Include global posts not found
                Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
            }
            ?>
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
</div>
<?php get_footer(); ?>