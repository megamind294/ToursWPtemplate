<?php

/**
 * The template for displaying taxonomy pages
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package triprex
 */

get_header();

// Include breadcrumb template
Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');
?>

<div class="destination-section pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <?php
            global $wp_query;

            $args = array(
                'post_type'      => 'destination',
                'post_status'    => 'publish',
                'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1
            );

            // Get the current term ID
            $term_id = get_queried_object_id();

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'city-location',
                    'field'    => 'term_id',
                    'terms'    => $term_id,
                    'operator' => 'IN',
                ),
            );

            $wp_query = new WP_Query($args);

            $num = 0;

            if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) :
                    $num++;
                    $wp_query->the_post();
                    echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('destination', 'content/archive-destination'));
                endwhile; // End of the loop.
            } else {
                // Include global posts not found
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

<?php get_footer(); ?>