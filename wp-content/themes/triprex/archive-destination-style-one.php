<?php

/**
 * The template for displaying archive pages
 * 
 * Template Name: Destination Style One
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
            $initial_column_classes = array(
                'col-lg-3 col-sm-6', 'col-lg-5 col-sm-6', 'col-lg-4 col-sm-6',
            );
            $column_classes = $initial_column_classes;
            if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) :
                    $num++;
                    $wp_query->the_post();
                    $current_column_class = $column_classes[($num - 1) % count($column_classes)];

                    $tourCount = \Egns\Helper\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());

            ?>
                    <div class="<?php echo esc_attr($current_column_class); ?>">
                        <div class="destination-card">
                            <?php the_post_thumbnail(); ?>
                            <div class="overlay"></div>
                            <div class="card-title">
                                <h4><?php the_title(); ?></h4>
                            </div>
                            <div class="content">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="eg-tag">
                                    <span><?php echo esc_html($tourCount) . esc_html__(' Tour', 'triprex'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    if ($num % 3 == 0) {
                        $column_classes = array(
                            'col-lg-4 col-sm-6', 'col-lg-3 col-sm-6', 'col-lg-5 col-sm-6',
                        );
                    }
                    if ($num % 6 == 0) {
                        $column_classes = $initial_column_classes;
                    }
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