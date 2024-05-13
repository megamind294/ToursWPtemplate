<?php

/**
 * The main template file
 *
 * Template Name: Blog Grid Right Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package triprex
 * @since 1.1.0
 * 
 */

get_header();

if (!is_front_page()) :
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');
endif;

?>

<div class="blod-sidebar-section pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-8">
                <div class="row g-md-4 gy-5">
                    <?php
                    $args = array(
                        'post_type' => 'post', //it is a Page right?
                        'post_status' => 'publish',
                        'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
                    );
                    $wp_query = new WP_Query($args);
                    $num = 0;
                    if ($wp_query->have_posts()) {

                        while ($wp_query->have_posts()) :
                            $num++;
                            $wp_query->the_post();
                    ?>
                            <div class="col-md-6">
                                <div class="blog-card">
                                    <?php
                                    Egns\Inc\Blog_Helper::get_the_post_thumb_with_format_grid();
                                    Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/grid/content');
                                    ?>
                                </div>
                            </div>
                    <?php
                        endwhile; // End of the loop.

                    } else {
                        // Include global posts not found
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
            <?php
            // Include page content sidebar
            Egns\Helper\Egns_Helper::egns_template_part('sidebar', 'templates/sidebar');
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>