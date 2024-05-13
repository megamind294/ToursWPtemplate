<?php

use Egns_Core\Egns_Helper;

?>
<div class="room-suits-card mb-30">
    <div class="row g-0">
        <div class="col-md-4">
            <div class="swiper hotel-img-slider">
                <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'))) : ?>
                    <span class="batch"><?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_exclusive_facilities_text'); ?></span>
                <?php endif; ?>
                <div class="swiper-wrapper">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="swiper-slide">
                            <div class="room-img">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'card-thumb')); ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex'); ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php foreach (Egns_Core\Egns_Helper::egns_hotel_gallery('hotel_gallery') as $key => $data) : ?>
                        <?php if (!empty($data)) : ?>
                            <div class="swiper-slide">
                                <div class="room-img">
                                    <img src="<?php echo wp_get_attachment_url($data)  ?>" alt="<?php echo esc_attr__('image', 'triprex'); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>


                </div>
                <div class="swiper-pagination5"></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="room-content">
                <div class="content-top">
                    <?php if (function_exists('run_reviewx')) : ?>
                        <div class="reviews">
                            <?php echo do_shortcode('[rvx-star-count]') ?>
                        </div>
                    <?php endif; ?>
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <ul class="loaction-area">
                        <li><i class="bi bi-geo-alt"></i></li>
                        <li>

                            <?php echo Egns_Helper::egns_hotel_value('hotel_location_text'); ?>
                            <?php
                            $map_link = Egns_Helper::egns_hotel_value('hotel_location_link');
                            if (!empty($map_link)) :
                            ?>
                                <a href="<?php echo esc_url($map_link['url']) ?>"><?php echo esc_html($map_link['text']) ?></a>
                            <?php endif; ?>
                            <?php if (!empty(Egns_Helper::egns_hotel_value('hotel_distance'))) : ?>
                                <span><?php echo Egns_Helper::egns_hotel_value('hotel_distance'); ?></span>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <ul class="facilisis">
                        <?php
                        $highlights = (array) Egns_Helper::egns_hotel_value('hotel_highlights_repeater');
                        $counter = 0;
                        foreach ($highlights as $index => $highlight) :
                            if ($counter >= 5) {
                                break; // Exit the loop if 5 items have been displayed
                            }
                        ?>
                            <li>
                                <?php if (!empty($highlight['hotel_highlights_media']['url'])) : ?>
                                    <img src="<?php echo esc_url($highlight['hotel_highlights_media']['url']); ?>" alt="<?php echo esc_attr__('highlight-image', 'triprex'); ?>" />
                                <?php endif; ?>
                                <?php if (!empty($highlight['hotel_highlights_title'])) : ?>
                                    <?php echo esc_html($highlight['hotel_highlights_title']); ?>
                                <?php endif; ?>
                            </li>
                        <?php
                            $counter++;
                        endforeach;
                        ?>
                    </ul>
                </div>
                <div class="content-bottom">
                    <div class="room-type">
                        <?php
                        $post_id = get_the_ID();
                        $terms = get_the_terms($post_id, 'room-type');
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $index => $term) {
                        ?>
                                <?php if (!empty($term->name)) : ?>
                                    <h6><?php echo esc_html($term->name); ?></h6>
                                <?php endif; ?>
                        <?php }
                        }; ?>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_room_info'))) : ?>
                            <span><?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_room_info'); ?></span>
                        <?php endif; ?>
                        <div class="deals">
                            <span><?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_cancellation_label'))) : ?> <strong><?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_cancellation_label'); ?></strong> <br><?php endif; ?>
                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_cancellation_duration'))) : ?><?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_cancellation_duration'); ?> <?php endif; ?></span>
                        </div>
                    </div>
                    <div class="price-and-book">
                        <div class="price-area">
                            <?php
                            $query_var = get_transient('triprex_hotel_query_var');
                            $date_range = '';
                            if (!empty($query_var['date_range'])) {
                                $date_range = Egns\Helper\Egns_Helper::calculate_days_and_nights($query_var['date_range']);
                                if (!empty($date_range['days']) && !empty($date_range['nights']) && !empty($query_var['person'])) {
                                    $date_range = sprintf(__('%s Days %s Nights, %s Adults', 'triprex'), $date_range['days'], $date_range['nights'], $query_var['person']);
                                }
                            } else if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_duration_person'))) {
                                $date_range = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_duration_person');
                            }
                            ?>
                            <?php if (!empty($date_range)) : ?>
                                <p><?php echo sprintf('%s', $date_range); ?></p>
                            <?php endif; ?>
                            <?php
                            if (!empty($query_var['date_range'])) {
                                echo \Egns\Helper\Egns_Helper::egns_get_hotel_pack_price('', $query_var);
                            } else {
                                echo \Egns\Helper\Egns_Helper::egns_get_hotel_pack_price();
                            }

                            ?>
                        </div>
                        <div class="book-btn">
                            <a href="<?php echo get_permalink() ?>" class="primary-btn2"><?php echo esc_html__('Check Availability', 'triprex'); ?> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>