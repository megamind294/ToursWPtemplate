<?php

/**
 * The template for displaying taxonomy pages
 * 
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
            <?php

            global $wp_query;

            $args = array(
                'post_type' => 'transport',
                'post_status' => 'publish',
                'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
            );
            $args = array_merge($wp_query->query_vars);

            $wp_query = new WP_Query($args);

            $num = 0;

            if ($wp_query->have_posts()) {

                while ($wp_query->have_posts()) :
                    $num++;
                    $wp_query->the_post();

            ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="transport-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="transport-img">
                                    <?php the_post_thumbnail('card-thumb'); ?>
                                    <?php if (!empty(Egns_Core\Egns_Helper::egns_transport_value('transport_distance_field'))) : ?>
                                        <span><?php echo Egns_Core\Egns_Helper::egns_transport_value('transport_distance_field'); ?></span>
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                            <div class="transport-content">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                <div class="transport-type">
                                    <h6><?php echo esc_html__('Available Transport', 'triprex'); ?> :</h6>
                                    <div class="row g-2">
                                        <?php
                                        $post_id = get_the_ID();
                                        $terms = get_the_terms($post_id, 'transport-type');
                                        if ($terms && !is_wp_error($terms)) {
                                            foreach ($terms as $index => $term) {
                                                $meta = get_term_meta($term->term_id, 'triprex-transport-type', true);
                                                if ($meta['triprex_transport_type_logo'] ?? '') :
                                                    $logo = $meta['triprex_transport_type_logo']['url'];
                                                endif;
                                        ?>
                                                <div class="col-3">
                                                    <div class="single-transport">
                                                        <?php if ($logo  ?? '') : ?>
                                                            <img src="<?php echo esc_url($logo) ?>" alt="<?php echo esc_attr__('transport-img', 'triprex'); ?>" />
                                                        <?php endif; ?>
                                                        <?php if (!empty($term->name)) : ?>
                                                            <span><?php echo sprintf(__('%s', 'triprex'), $term->name); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                        <?php }
                                        } ?>

                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <div class="details-btn">
                                        <a href="<?php the_permalink(); ?>" class="primary-btn1"><?php echo esc_html__('View Details', 'triprex'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php

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