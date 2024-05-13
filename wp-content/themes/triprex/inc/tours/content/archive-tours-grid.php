<?php

use Egns\Helper\Egns_Helper;
?>
<div class="col-lg-4 col-md-6">
    <div class="package-card">
        <div class="package-card-img-wrap">
            <a href="<?php the_permalink(); ?>" class="card-img"><img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'card-thumb')); ?>" alt="<?php echo esc_attr__('thumbnail-image', 'triprex'); ?>"></a>
            <div class="batch">
                <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                    <span class="date"><?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tour_duration')); ?></span>
                <?php endif; ?>
                <?php $selected_destination = Egns\Helper\Egns_Helper::egns_tours_value('tour_destination_select');
                if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_destination_select'))) : ?>
                    <div class="location">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M8.99939 0C5.40484 0 2.48047 2.92437 2.48047 6.51888C2.48047 10.9798 8.31426 17.5287 8.56264 17.8053C8.79594 18.0651 9.20326 18.0646 9.43613 17.8053C9.68451 17.5287 15.5183 10.9798 15.5183 6.51888C15.5182 2.92437 12.5939 0 8.99939 0ZM8.99939 9.79871C7.19088 9.79871 5.71959 8.32739 5.71959 6.51888C5.71959 4.71037 7.19091 3.23909 8.99939 3.23909C10.8079 3.23909 12.2791 4.71041 12.2791 6.51892C12.2791 8.32743 10.8079 9.79871 8.99939 9.79871Z" />
                        </svg>
                        <ul class="location-list">
                            <?php
                            if (!empty($selected_destination)) {
                                foreach ($selected_destination as $destination_id) {
                                    $destination_title = get_the_title($destination_id);
                                    $destination_permalink = get_permalink($destination_id);
                                    echo '<li><a href="' . esc_url($destination_permalink) . '">' . esc_html($destination_title) . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="package-card-content">
            <div class="card-content-top">
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <?php
                $selected_location = Egns\Helper\Egns_Helper::egns_tours_value('tour_destination_location_select');
                // Check if there are selected locations
                if (!empty($selected_location)) {
                    echo '<div class="location-area">';
                    echo '<ul class="location-list scrollTextAni">';
                    foreach ($selected_location as $location_id) {
                        $term = get_term_by('slug', $location_id, 'city-location');
                        if ($term && !is_wp_error($term)) {
                            $term_name = esc_html($term->name);
                            $term_link = esc_url(get_term_link($term));
                            echo '<li><a href="' . $term_link . '">' . $term_name . '</a></li>';
                        }
                    }
                    echo '</ul>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="card-content-bottom">
                <div class="price-area">
                    <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_before_price'))) : ?>
                        <h6><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_before_price')); ?></h6>
                    <?php endif; ?>
                    <?php echo \Egns_Core\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?>
                    <?php if (!empty(Egns_Helper::egns_tours_value('tours_pricing_label_after_price'))) : ?>
                        <p><?php echo esc_html(Egns_Helper::egns_tours_value('tours_pricing_label_after_price')); ?></p>
                    <?php endif; ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="primary-btn2"><?php echo esc_html__('Book a Trip', 'triprex'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M8.15624 10.2261L7.70276 12.3534L5.60722 18L6.85097 17.7928L12.6612 10.1948C13.4812 10.1662 14.2764 10.1222 14.9674 10.054C18.1643 9.73783 17.9985 8.99997 17.9985 8.99997C17.9985 8.99997 18.1643 8.26211 14.9674 7.94594C14.2764 7.87745 13.4811 7.8335 12.6611 7.80518L6.851 0.206972L5.60722 -5.41705e-07L7.70276 5.64663L8.15624 7.77386C7.0917 7.78979 6.37132 7.81403 6.37132 7.81403C6.37132 7.81403 4.90278 7.84793 2.63059 8.35988L0.778036 5.79016L0.000253424 5.79016L0.554115 8.91458C0.454429 8.94514 0.454429 9.05483 0.554115 9.08539L0.000253144 12.2098L0.778036 12.2098L2.63059 9.64035C4.90278 10.1523 6.37132 10.1857 6.37132 10.1857C6.37132 10.1857 7.0917 10.2102 8.15624 10.2261Z" />
                        <path d="M12.0703 11.9318L12.0703 12.7706L8.97041 12.7706L8.97041 11.9318L12.0703 11.9318ZM12.0703 5.23292L12.0703 6.0714L8.97059 6.0714L8.97059 5.23292L12.0703 5.23292ZM9.97892 14.7465L9.97892 15.585L7.11389 15.585L7.11389 14.7465L9.97892 14.7465ZM9.97892 2.41846L9.97892 3.2572L7.11389 3.2572L7.11389 2.41846L9.97892 2.41846Z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>