<?php

/**
 * The template for displaying archive pages
 * 
 * Template Name: Destination Style Three
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
            $destination_archive_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('destination_archive_num_of_post');
            $destination_archive_post_order = Egns\Helper\Egns_Helper::egns_get_theme_option('destination_archive_post_order');
            $order = ($destination_archive_post_order == 'descending') ? 'DESC' : 'ASC';
            $args = array(
                'post_type'         => 'destination', //it is a Page right?
                'post_status'       => 'publish',
                'posts_per_page'    => $destination_archive_num_of_post,
                'order'             => $order,
                'paged'             => (get_query_var('paged')) ? get_query_var('paged') : 1
            );
            $wp_query = new WP_Query($args);
            $num = 0;

            if ($wp_query->have_posts()) {

                while ($wp_query->have_posts()) :
                    $num++;
                    $wp_query->the_post();

                    echo Egns\Helper\Egns_Helper::egns_get_template_part('destination', 'content/archive-destination-style-three');

                endwhile;
            } else {

                Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
            }
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