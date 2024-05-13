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


<div class="visa-with-sidebar-section pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5 justify-content-center">
            <?php

            global $wp_query;

            $args = array(
                'post_type' => 'visa',
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
                    <div class="col-md-10">
                        <div class="package-card4 four">
                            <a href="<?php the_permalink(); ?>" class="package-card-img">
                                <?php the_post_thumbnail(); ?>
                            </a>
                            <div class="package-card-content">
                                <div class="card-content-top">
                                    <h5><?php the_title(); ?></h5>
                                    <ul>
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'country');
                                        if ($terms && !is_wp_error($terms)) : ?>
                                            <li><span><?php echo esc_html__('Country', 'triprex'); ?> :</span>
                                                <?php
                                                $term_names = array_map(function ($term) {
                                                    return sprintf(__('%s', 'triprex'), $term->name);
                                                }, $terms);
                                                echo implode(', ', $term_names);
                                                ?>
                                            </li>
                                        <?php endif; ?>

                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'visa-type');
                                        if ($terms && !is_wp_error($terms)) : ?>
                                            <li><span><?php echo esc_html__('Visa Type', 'triprex'); ?> :</span>
                                                <?php
                                                $term_names = array_map(function ($term) {
                                                    return sprintf(__('%s', 'triprex'), $term->name);
                                                }, $terms);
                                                echo implode(', ', $term_names);
                                                ?>
                                            </li>
                                        <?php endif; ?>


                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'visa-mode');
                                        if ($terms && !is_wp_error($terms)) : ?>
                                            <li><span><?php echo esc_html__('Visa Mode', 'triprex'); ?> :</span>
                                                <?php
                                                $term_names = array_map(function ($term) {
                                                    return sprintf(__('%s', 'triprex'), $term->name);
                                                }, $terms);
                                                echo implode(', ', $term_names);
                                                ?>
                                            </li>
                                        <?php endif; ?>
                                        <?php $visa_info = (array) Egns\Helper\Egns_Helper::egns_visa_value('visa_general_info_re');
                                        foreach ($visa_info as $step_data) :
                                        ?>
                                            <?php if (!empty($step_data['visa_info_label_text'])) : ?>
                                                <li><span><?php echo esc_html($step_data['visa_info_label_text']); ?></span> <?php echo esc_html($step_data['visa_info_content_text']); ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                                <div class="card-content-bottom">
                                    <div class="price-area">
                                        <span><?php echo esc_html__('Starting Form', 'triprex'); ?> :</span>
                                        <h6>
                                            <?php echo \Egns_Core\Egns_Helper::egns_get_visa_pack_price() ?>
                                            <strong> <?php echo Egns\Helper\Egns_Helper::egns_visa_value('visa_cost_select') ?></strong>
                                        </h6>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="apply-btn">
                                        <?php echo esc_html__('Apply Now', 'triprex'); ?>
                                        <div class="arrow">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </a>
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