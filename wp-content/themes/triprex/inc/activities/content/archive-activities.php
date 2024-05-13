<div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="activity-card">
        <?php the_post_thumbnail(); ?>
        <a href="<?php the_permalink(); ?>" class="country-name">
            <?php
            $post_id = get_the_ID();
            $terms = get_the_terms($post_id, 'activities-country');
            if ($terms && !is_wp_error($terms)) {
                foreach ($terms as $index => $term) {
                    $meta = get_term_meta($term->term_id, 'triprex-activities-country', true);
                    if ($meta['triprex_country_flag'] ?? '') :
                        $background_image = $meta['triprex_country_flag']['url'];
                    endif;
            ?>
                    <img src="<?php echo esc_url($background_image) ?>" alt="<?php esc_attr__('image', 'triprex'); ?>">
                    <?php echo esc_html($term->name); ?>
            <?php }
            } ?>
        </a>
        <div class="activity-card-content-wrapper">
            <div class="activity-card-content">
                <?php
                $icon_image = Egns\Helper\Egns_Helper::egns_activities_value('activities_Icon_image');
                $icon_image_url = $icon_image['url'] ?? '';
                ?>
                <div class="icon">
                    <?php \Egns\Helper\Egns_Helper::display_svg($icon_image_url) ?>
                </div>

                <div class="content">
                    <h6><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h6>
                </div>
            </div>
        </div>
    </div>
</div>