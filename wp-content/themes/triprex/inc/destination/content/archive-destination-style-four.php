<?php
$tourCount = \Egns\Helper\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());
?>
<div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="destination-card3">
        <a href="<?php the_permalink(); ?>" class="destination-card-img">
            <?php the_post_thumbnail();?>
        </a>
        <div class="destination-card-content">
            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
        </div>
        <div class="batch">
            <span><?php echo esc_html($tourCount). esc_html__(' Tour', 'triprex'); ?></span>
        </div>
    </div>
</div>