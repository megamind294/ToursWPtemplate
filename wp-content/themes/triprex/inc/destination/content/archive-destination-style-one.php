<?php
$tourCount = \Egns\Helper\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());
?>
<div class="col-lg-4 col-sm-6">
    <div class="destination-card2 style-2">
        <a href="<?php the_permalink(); ?>" class="destination-card-img"><?php the_post_thumbnail(); ?></a>
        <div class="destination-card2-content-wrap">
            <div class="eg-batch">
                <div class="location">
                    <ul class="location-list">
                        <li><?php echo esc_html($tourCount) . esc_html__(' Tour', 'triprex'); ?></li>
                    </ul>
                </div>
            </div>
            <div class="destination-card2-content">
                <span><?php echo esc_html__('Travel To', 'triprex'); ?></span>
                <h4><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h4>
            </div>
        </div>
    </div>
</div>