<?php

use Egns\Helper\Egns_Helper;
?>

<div class="col-md-6">
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
                                        <img src="<?php echo esc_url($logo) ?>" alt="<?php echo esc_attr__('transport-img', 'triprex'); ?>"/>
                                    <?php endif; ?>
                                    <?php if (!empty($term->name)) : ?>
                                        <span><?php echo esc_html($term->name); ?></span>
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
                <?php if (function_exists('run_reviewx')) : ?>
                    <div class="review-area">
                        <?php echo do_shortcode('[rvx-star-count]') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>