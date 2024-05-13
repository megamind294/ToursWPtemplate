<div class="room-details-area pt-120 mb-120">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
                <div class="room-img-group mb-50">
                    <div class="row g-3">
                        <?php
                        $gallery_data = (array) Egns_Core\Egns_Helper::egns_hotel_gallery('hotel_gallery');

                        if (has_post_thumbnail()  && (count($gallery_data) > 1)) : ?>
                            <div class="col-lg-6">
                                <div class="gallery-img-wrap thumb">
                                    <?php the_post_thumbnail() ?>
                                    <a data-fancybox="gallery-01" href="<?php echo get_the_post_thumbnail_url(); ?>"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-3">
                                    <?php
                                    $gallery_data = (array) Egns_Core\Egns_Helper::egns_hotel_gallery('hotel_gallery');
                                    if (!empty($gallery_data)) :
                                        for ($i = 0; $i < 2 && $i < count($gallery_data); $i++) :
                                            $data = $gallery_data[$i];
                                            if (!empty($data)) : ?>
                                                <div class="col-6">
                                                    <div class="gallery-img-wrap">
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($data)) ?>" alt="<?php echo esc_attr__('image', 'triprex'); ?>">
                                                        <a data-fancybox="gallery-01" href="<?php echo wp_get_attachment_url($data) ?>"><i class="bi bi-eye"></i></a>
                                                    </div>
                                                </div>
                                    <?php
                                            endif;
                                        endfor;
                                    endif;
                                    ?>
                                    <?php $banner_image = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_view_poster');
                                    if (!empty($banner_image['url'])) : ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <?php if (!empty($banner_image['url'])) : ?>
                                                    <img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'triprex'); ?>"> <?php endif; ?>

                                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_more_image'))) : ?>
                                                    <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_hotel_value('hotel_more_image')); ?></button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    $video_poster_image = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_view_poster_video');
                                    if (!empty($video_poster_image['url'])) : ?>

                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <?php
                                                if (!empty($video_poster_image['url'])) : ?>
                                                    <img src="<?php echo esc_url($video_poster_image['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'triprex'); ?>">
                                                <?php endif; ?>
                                                <?php $link = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_video_link'); ?>
                                                <?php $uploaded = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_video_uplaod'); ?>
                                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_more_video_label'))) : ?>
                                                    <a data-fancybox="gallery-01" href="<?php if (!empty($uploaded['url'])) {
                                                                                            echo esc_url($uploaded['url']);
                                                                                        } elseif (!empty($link['url'])) {
                                                                                            echo esc_url($link['url']);
                                                                                        } ?>">
                                                        <i class="bi bi-play-circle"></i> <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_hotel_value('hotel_more_video_label')); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php elseif (has_post_thumbnail() && (count($gallery_data) == 1)) : ?>

                            <div class="col-lg-12">
                                <div class="gallery-img-wrap only-thumb">
                                    <?php the_post_thumbnail() ?>
                                </div>
                            </div>

                        <?php else : ?>

                            <?php
                            $gallery_data = (array) Egns_Core\Egns_Helper::egns_hotel_gallery('hotel_gallery');
                            if (!empty($gallery_data)) :
                                for ($i = 0; $i < 3 && $i < count($gallery_data); $i++) :
                                    $data = $gallery_data[$i];
                                    if (!empty($data) && !has_post_thumbnail() && $i == 0) : ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap thumb">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($data)) ?>" alt="<?php echo esc_attr__('image', 'triprex'); ?>">
                                                <a data-fancybox="gallery-01" href="<?php echo wp_get_attachment_url($data) ?>"><i class="bi bi-eye"></i></a>
                                            </div>
                                        </div>
                            <?php
                                    endif;
                                endfor;
                            endif;
                            ?>
                            <div class="col-lg-6">
                                <div class="row g-3">
                                    <?php
                                    if (!empty($gallery_data)) :
                                        for ($i = 1; $i < 3 && $i < count($gallery_data); $i++) :
                                            $data = $gallery_data[$i];
                                            if (!empty($data)) : ?>
                                                <div class="col-6">
                                                    <div class="gallery-img-wrap">
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($data)) ?>" alt="<?php echo esc_attr__('image', 'triprex'); ?>">
                                                        <a data-fancybox="gallery-01" href="<?php echo wp_get_attachment_url($data) ?>"><i class="bi bi-eye"></i></a>
                                                    </div>
                                                </div>
                                    <?php
                                            endif;
                                        endfor;
                                    endif;
                                    ?>

                                    <?php $image_poster = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_view_poster');
                                    if (!empty($image_poster['url'])) : ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <?php if (!empty($image_poster['url'])) : ?>
                                                    <img src="<?php echo esc_url($image_poster['url']); ?>" alt="<?php echo esc_attr__('picture', 'triprex'); ?>"> <?php endif; ?>
                                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_more_image'))) : ?>
                                                    <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_hotel_value('hotel_more_image')); ?></button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php $video_poster = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_view_poster_video');
                                    if (!empty($video_poster['url'])) : ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <img src="<?php echo esc_url($video_poster['url']); ?>" alt="<?php echo esc_attr__('Banner-Image', 'triprex'); ?>">
                                                <?php $link = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_video_link'); ?>
                                                <?php $uploaded = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_video_uplaod'); ?>
                                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_more_video_label'))) : ?>
                                                    <a data-fancybox="gallery-01" href="<?php if (!empty($uploaded['url'])) : echo esc_url($uploaded['url']);
                                                                                        elseif (!empty($link['url'])) : echo esc_url($link['url']);
                                                                                        endif; ?>">
                                                        <i class="bi bi-play-circle"></i> <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_hotel_value('hotel_more_video_label')); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="others-image-wrap d-none">
            <?php foreach ((array) Egns_Core\Egns_Helper::egns_hotel_gallery('hotel_gallery') as $key => $data) : ?>
                <a href="<?php echo esc_url(wp_get_attachment_url($data))  ?>" data-fancybox="images">
                    <img src="<?php echo esc_url(wp_get_attachment_url($data))  ?>" alt="<?php echo esc_attr__('image', 'triprex'); ?>">
                </a>
            <?php endforeach; ?>
        </div>
        <div class="row g-xl-4 gy-5">
            <div class="col-xl-8">
                <?php $map_link = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_location_link');
                if (!empty($map_link['url'])) : ?>
                    <div class="location-and-review">
                        <div class="location">
                            <p>
                                <i class="bi bi-geo-alt"></i>
                                <?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_location_text'); ?>
                                <?php if (!empty($map_link['url'] && $map_link['text'])) : ?>
                                    <a href="<?php echo esc_url($map_link['url']) ?>"><?php echo esc_html($map_link['text']); ?></a>
                                <?php endif; ?>
                            </p>
                        </div>
                        <?php if (function_exists('run_reviewx')) : ?>
                            <div class="review-area">
                                <?php echo do_shortcode('[rvx-star-count]') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="price-area">
                    <h6>
                        <?php echo \Egns\Helper\Egns_Helper::egns_get_hotel_pack_price() ?>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_room_duration'))) : ?>
                            /<strong><?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_room_duration'); ?></strong>
                        <?php endif; ?>
                    </h6>
                </div>
                <?php the_content(); ?>

                <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_highlights_title'))) : ?>
                    <h4><?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_highlights_title'); ?></h4>
                <?php endif; ?>
                <?php
                $highlights = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_highlights_repeater');
                if (!empty($highlights)) :
                ?>
                    <ul class="room-features">
                        <?php foreach ($highlights as $index => $highlight) : ?>
                            <li>
                                <?php if (!empty($highlight['hotel_highlights_media']['url'])) : ?>
                                    <img src="<?php echo esc_url($highlight['hotel_highlights_media']['url']); ?>" alt="<?php echo esc_attr__('highlight-image', 'triprex'); ?>" />
                                <?php endif; ?>
                                <?php echo esc_html($highlight['hotel_highlights_title']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_facitilies_title'))) : ?>
                    <h4><?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_facitilies_title'); ?></h4>
                <?php endif; ?>
                <ul class="extra-service mb-30">
                    <?php
                    $tour_highlight = Egns\Helper\Egns_Helper::egns_hotel_value('hotel_facilities_list');
                    if (isset($tour_highlight)) {
                        $tour_highlight_list = explode("\n", $tour_highlight);
                        foreach ($tour_highlight_list as $item) {
                            $trimmed_item = trim($item);
                            if (!empty($trimmed_item)) {  ?>
                                <li> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 18 16">
                                        <path d="M8.21008 15.9998C8.15563 15.9998 8.10177 15.9885 8.05188 15.9664C8.002 15.9444 7.95717 15.9122 7.92022 15.8719L0.104874 7.34121C0.0527746 7.28433 0.0182361 7.21337 0.00548549 7.137C-0.00726514 7.06063 0.00232503 6.98216 0.0330824 6.9112C0.0638398 6.84025 0.11443 6.77988 0.178662 6.73748C0.242893 6.69509 0.31798 6.67251 0.394731 6.6725H4.15661C4.21309 6.67251 4.26891 6.68474 4.32031 6.70837C4.37171 6.73201 4.41749 6.76648 4.45456 6.80949L7.06647 9.84167C7.34875 9.2328 7.89519 8.21899 8.85409 6.98363C10.2717 5.15733 12.9085 2.47141 17.4197 0.0467428C17.5069 -0.000110955 17.6084 -0.0122714 17.704 0.0126629C17.7996 0.0375972 17.8825 0.0978135 17.9363 0.181422C17.9901 0.26503 18.0109 0.365952 17.9946 0.46426C17.9782 0.562568 17.9259 0.651115 17.848 0.712418C17.8308 0.726001 16.0914 2.10818 14.0896 4.63987C12.2473 6.96965 9.79823 10.7792 8.59313 15.6973C8.57196 15.7837 8.52272 15.8604 8.45327 15.9153C8.38382 15.9702 8.29816 16 8.20996 16L8.21008 15.9998Z" />
                                    </svg> <?php echo esc_html($trimmed_item); ?></li>
                    <?php  }
                        }
                    }
                    ?>
                </ul>
                <?php if (Egns\Helper\Egns_Helper::egns_hotel_value('hotel_location_enable_disable_option')) : ?>
                    <div class="tour-location">
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_location_map_title'))) : ?>
                            <h4><?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_location_map_title'); ?></h4>
                        <?php endif; ?>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_hotel_value('hotel_iframe_code'))) : ?>
                            <div class="map-area mb-30">
                                <?php echo Egns\Helper\Egns_Helper::egns_hotel_value('hotel_iframe_code'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="review-wrapper mt-70">
                    <?php
                    if (function_exists('run_reviewx')) :
                        // Include review file
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="booking-form-wrap mb-30">
                    <?php
                    if (class_exists('CSF')) {
                        $heading_title = Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_booking_form_heading_title');
                        $heading_desc = Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_booking_form_heading_desc');
                    ?>
                        <?php if (!empty($heading_title)) : ?>
                            <h4><?php echo wp_kses($heading_title, wp_kses_allowed_html('post')); ?></h4>
                        <?php endif; ?>

                        <?php if (!empty($heading_desc)) : ?>
                            <p><?php echo wp_kses($heading_desc, wp_kses_allowed_html('post')); ?></p>
                    <?php endif;
                    }
                    ?>
                    <?php if (class_exists('WooCommerce')) : ?>
                        <div class="nav nav-pills mb-40" role="tablist">
                            <button class="nav-link show active" id="v-pills-booking-tab" data-bs-toggle="pill" data-bs-target="#v-pills-booking" type="button" role="tab" aria-controls="v-pills-booking" aria-selected="true">Online Booking</button>
                            <button class="nav-link" id="v-pills-contact-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contact" type="button" role="tab" aria-controls="v-pills-contact" aria-selected="false">Inquiry Form</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent2">
                            <div class="tab-pane fade active show" id="v-pills-booking" role="tabpanel" aria-labelledby="v-pills-booking-tab">
                                <div class="sidebar-booking-form">
                                    <?php
                                    if (class_exists('WooCommerce')) {
                                        // Include review file
                                        Egns\Helper\Egns_Helper::egns_template_part('hotel', 'parts/booking-form');
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                                <div class="sidebar-booking-form">
                                    <?php echo do_shortcode(Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_booking_form_shortcode'))  ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="sidebar-booking-form">
                            <?php echo do_shortcode(Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_booking_form_shortcode'))  ?>
                        </div>
                    <?php endif; ?>

                </div>

                <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_banner_card_show_hide') == 1)) :  ?>
                    <div class="banner2-card">
                        <?php
                        $banner_card_bg_img = Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_banner_card_bg_img', 'url');
                        ?>
                        <?php if (!empty($banner_card_bg_img)) : ?>
                            <img src="<?php echo esc_url($banner_card_bg_img); ?>" alt="<?php esc_attr_e('card-img', 'triprex'); ?>">
                        <?php endif; ?>
                        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_bnr_crd_contact_info_show') == 1)) :  ?>
                            <div class="banner2-content-wrap">
                                <div class="banner2-content">
                                    <?php foreach ((array) Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_bnr_crd_contact_info') as $item) : ?>
                                        <?php
                                        $contactType = isset($item['contact_h_bnr_type']) ? $item['contact_h_bnr_type'] : 'default_value';
                                        // Check if any of the contact information fields is not empty
                                        $isNotEmpty = (
                                            ($contactType === 'phone' && !empty($item['phone_h_bnr_info'])) ||
                                            ($contactType === 'email' && !empty($item['email_h_bnr_info'])) ||
                                            ($contactType === 'others' && !empty($item['custom_h_bnr_info']))
                                        );
                                        if ($isNotEmpty) :
                                        ?>
                                            <?php if ($contactType === 'phone') : ?>
                                                <div class="hotline-area">
                                                    <?php if ($contactType === 'phone' && !empty($item['phone_h_bnr_icon_svg']['url'])) : ?>
                                                        <div class="icon">
                                                            <img src="<?php echo esc_url($item['phone_h_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="content">
                                                        <?php if ($contactType === 'phone' && !empty($item['phone_h_bnr_info_text'])) : ?>
                                                            <span><?php echo esc_html($item['phone_h_bnr_info_text']); ?></span>
                                                        <?php endif ?>
                                                        <h6><a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $item['phone_h_bnr_info']); ?>"><?php echo esc_html($item['phone_h_bnr_info']); ?></a></h6>
                                                    </div>
                                                </div>
                                            <?php elseif ($contactType === 'email') : ?>
                                                <div class="hotline-area">
                                                    <?php if ($contactType === 'email' && !empty($item['email_h_bnr_icon_svg']['url'])) : ?>
                                                        <div class="icon">
                                                            <img src="<?php echo esc_url($item['email_h_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="content">
                                                        <?php if ($contactType === 'email' && !empty($item['email_h_bnr_info_text'])) : ?>
                                                            <span><?php echo esc_html($item['email_h_bnr_info_text']); ?></span>
                                                        <?php endif ?>
                                                        <h6><a href="mailto:<?php echo esc_html($item['email_h_bnr_info']); ?>"><?php echo esc_html($item['email_h_bnr_info']); ?></a></h6>
                                                    </div>
                                                </div>
                                            <?php elseif ($contactType === 'others') : ?>
                                                <div class="hotline-area">
                                                    <?php if ($contactType === 'others' && !empty($item['custom_h_bnr_icon_svg']['url'])) : ?>
                                                        <div class="icon">
                                                            <img src="<?php echo esc_url($item['custom_h_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="content">
                                                        <?php if ($contactType === 'others' && !empty($item['custom_h_bnr_info_txt'])) : ?>
                                                            <span><?php echo esc_html($item['custom_h_bnr_info_txt']); ?></span>
                                                        <?php endif ?>
                                                        <h5><?php echo wp_kses(($item['custom_h_bnr_info']), wp_kses_allowed_html('post')); ?></h5>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>