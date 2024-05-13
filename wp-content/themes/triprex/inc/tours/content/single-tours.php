<div class="package-details-area pt-120 mb-120 position-relative">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
                <div class="package-img-group mb-50">
                    <div class="row align-items-center g-3">
                        <?php
                        $gallery_data = (array) Egns_Core\Egns_Helper::egns_tours_gallery('tours_gallery');

                        if (has_post_thumbnail()  && (count($gallery_data) > 1)) : ?>

                            <div class="col-lg-6">
                                <div class="gallery-img-wrap thumb">
                                    <?php the_post_thumbnail() ?>
                                    <a data-fancybox="gallery-01" href="<?php echo get_the_post_thumbnail_url(); ?>"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 h-100">
                                <div class="row g-3 h-100">
                                    <?php
                                    $gallery_data = (array) Egns_Core\Egns_Helper::egns_tours_gallery('tours_gallery');
                                    if (!empty($gallery_data)) :
                                        for ($i = 0; $i < 2 && $i < count($gallery_data); $i++) :
                                            $data = $gallery_data[$i];
                                            if (!empty($data)) : ?>
                                                <div class="col-6">
                                                    <div class="gallery-img-wrap">
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($data)) ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex'); ?>">
                                                        <a data-fancybox="gallery-01" href="<?php echo esc_url(wp_get_attachment_url($data)) ?>"><i class="bi bi-eye"></i></a>
                                                    </div>
                                                </div>
                                    <?php
                                            endif;
                                        endfor;
                                    endif;
                                    ?>
                                    <?php $banner_image = Egns\Helper\Egns_Helper::egns_tours_value('tour_view_poster');
                                    if (!empty($banner_image['url'])) : ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <?php if (!empty($banner_image['url'])) : ?>
                                                    <img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr__('picture', 'triprex'); ?>"> <?php endif; ?>
                                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_more_image'))) : ?>
                                                    <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tour_more_image')); ?></button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    $banner_image = Egns\Helper\Egns_Helper::egns_tours_value('tour_view_poster_video');
                                    if (!empty($banner_image['url'])) : ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <?php
                                                if (!empty($banner_image['url'])) : ?>
                                                    <img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'triprex'); ?>">
                                                <?php endif; ?>
                                                <?php $link = Egns\Helper\Egns_Helper::egns_tours_value('tour_video_link'); ?>
                                                <?php $uploaded = Egns\Helper\Egns_Helper::egns_tours_value('tour_video_uplaod'); ?>
                                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_more_video_label'))) : ?>
                                                    <a data-fancybox="gallery-01" href="<?php if (!empty($uploaded['url'])) {
                                                                                            echo esc_url($uploaded['url']);
                                                                                        } elseif (!empty($link['url'])) {
                                                                                            echo esc_url($link['url']);
                                                                                        } ?>">
                                                        <i class="bi bi-play-circle"></i> <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tour_more_video_label')); ?>
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
                            $gallery_data = (array) Egns_Core\Egns_Helper::egns_tours_gallery('tours_gallery');
                            if (!empty($gallery_data)) :
                                for ($i = 0; $i < 3 && $i < count($gallery_data); $i++) :
                                    $data = $gallery_data[$i];
                                    if (!empty($data) && !has_post_thumbnail() && $i == 0) : ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap thumb">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($data)) ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex'); ?>">
                                                <a data-fancybox="gallery-01" href="<?php echo esc_url(wp_get_attachment_url($data)) ?>"><i class="bi bi-eye"></i></a>
                                            </div>
                                        </div>
                            <?php
                                    endif;
                                endfor;
                            endif;
                            ?>

                            <div class="col-lg-6 h-100">
                                <div class="row g-3 h-100">
                                    <?php
                                    if (!empty($gallery_data)) :
                                        for ($i = 1; $i < 3 && $i < count($gallery_data); $i++) :
                                            $data = $gallery_data[$i];
                                            if (!empty($data)) : ?>
                                                <div class="col-6">
                                                    <div class="gallery-img-wrap">
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($data)) ?>" alt="<?php echo esc_attr__('image', 'triprex'); ?>">
                                                        <a data-fancybox="gallery-01" href="<?php echo esc_url(wp_get_attachment_url($data)) ?>"><i class="bi bi-eye"></i></a>
                                                    </div>
                                                </div>
                                    <?php
                                            endif;
                                        endfor;
                                    endif;
                                    ?>

                                    <?php $image_poster = Egns\Helper\Egns_Helper::egns_tours_value('tour_view_poster');
                                    if (!empty($image_poster)) : ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <?php if (!empty($image_poster['url'])) : ?>
                                                    <img src="<?php echo esc_url($image_poster['url']); ?>" alt="<?php echo esc_attr__('image', 'triprex') ?>"> <?php endif; ?>
                                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_more_image'))) : ?>
                                                    <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tour_more_image')); ?></button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php $video_poster = Egns\Helper\Egns_Helper::egns_tours_value('tour_view_poster_video');
                                    if (!empty($video_poster['url'])) : ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <img src="<?php echo esc_url($video_poster['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'triprex') ?>">
                                                <?php $link = Egns\Helper\Egns_Helper::egns_tours_value('tour_video_link'); ?>
                                                <?php $uploaded = Egns\Helper\Egns_Helper::egns_tours_value('tour_video_uplaod'); ?>
                                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_more_video_label'))) : ?>
                                                    <a data-fancybox="gallery-01" href="<?php if (!empty($uploaded['url'])) : echo esc_url($uploaded['url']);
                                                                                        elseif (!empty($link['url'])) : echo esc_url($link['url']);
                                                                                        endif; ?>">
                                                        <i class="bi bi-play-circle"></i> <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tour_more_video_label')); ?>
                                                    <?php endif ?>
                                                    </a>
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
            <?php foreach ((array) Egns_Core\Egns_Helper::egns_tours_gallery('tours_gallery') as $key => $data) : ?>
                <a href="<?php echo esc_url(wp_get_attachment_url($data))  ?>" data-fancybox="images"><img src="<?php echo esc_url(wp_get_attachment_url($data))  ?>" alt="<?php echo esc_attr__('thumbnail', 'triprex'); ?>"></a>
            <?php endforeach; ?>
        </div>

        <div class="row g-xl-4 gy-5">

            <div class="col-xl-8">
                <?php
                $get_price_type = \Egns\Helper\Egns_Helper::egns_tours_value_by_id(get_the_ID(), 'tours_booking_re');

                if (!empty($get_price_type)) :
                ?>
                    <div class="tour-price">
                        <?php
                        if (!empty($get_price_type)) {
                            $data = $get_price_type[0]['tours_service_per_p'];
                        }
                        ?>
                        <?php if (!empty($get_price_type)) : ?>
                            <h3><?php echo \Egns\Helper\Egns_Helper::egns_get_tour_package_price_by_id(get_the_ID()) ?>/</h3>
                            <span><?php echo esc_html(\Egns\Helper\Egns_Helper::package_price_type($data)) ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php
                $meta_list = !empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_duration') || Egns\Helper\Egns_Helper::egns_tours_value('tour_max_people') || Egns\Helper\Egns_Helper::egns_tours_value('tour_destination_select'));
                if ($meta_list) :
                ?>
                    <ul class="tour-info-metalist">
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_duration'))) : ?>
                            <li>
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 7C14 8.85652 13.2625 10.637 11.9497 11.9497C10.637 13.2625 8.85652 14 7 14C5.14348 14 3.36301 13.2625 2.05025 11.9497C0.737498 10.637 0 8.85652 0 7C0 5.14348 0.737498 3.36301 2.05025 2.05025C3.36301 0.737498 5.14348 0 7 0C8.85652 0 10.637 0.737498 11.9497 2.05025C13.2625 3.36301 14 5.14348 14 7ZM7 3.0625C7 2.94647 6.95391 2.83519 6.87186 2.75314C6.78981 2.67109 6.67853 2.625 6.5625 2.625C6.44647 2.625 6.33519 2.67109 6.25314 2.75314C6.17109 2.83519 6.125 2.94647 6.125 3.0625V7.875C6.12502 7.95212 6.14543 8.02785 6.18415 8.09454C6.22288 8.16123 6.27854 8.2165 6.3455 8.25475L9.408 10.0048C9.5085 10.0591 9.62626 10.0719 9.73611 10.0406C9.84596 10.0092 9.93919 9.93611 9.99587 9.83692C10.0525 9.73774 10.0682 9.62031 10.0394 9.50975C10.0107 9.39919 9.93982 9.30426 9.842 9.24525L7 7.62125V3.0625Z">
                                    </path>
                                </svg>
                                <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tour_duration')); ?>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_max_people'))) : ?>
                            <li>
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 7C7.92826 7 8.8185 6.63125 9.47487 5.97487C10.1313 5.3185 10.5 4.42826 10.5 3.5C10.5 2.57174 10.1313 1.6815 9.47487 1.02513C8.8185 0.368749 7.92826 0 7 0C6.07174 0 5.1815 0.368749 4.52513 1.02513C3.86875 1.6815 3.5 2.57174 3.5 3.5C3.5 4.42826 3.86875 5.3185 4.52513 5.97487C5.1815 6.63125 6.07174 7 7 7ZM14 12.8333C14 14 12.8333 14 12.8333 14H1.16667C1.16667 14 0 14 0 12.8333C0 11.6667 1.16667 8.16667 7 8.16667C12.8333 8.16667 14 11.6667 14 12.8333Z">
                                    </path>
                                </svg>
                                <?php echo esc_html__('Max People', 'triprex'); ?> : <?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tour_max_people')); ?>
                            </li>
                        <?php endif; ?>
                        <?php $selected_destination = Egns\Helper\Egns_Helper::egns_tours_value('tour_destination_select');

                        if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tour_destination_select'))) : ?>
                            <li>
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 0.43748C14 0.372778 13.9856 0.308889 13.9579 0.250418C13.9302 0.191947 13.8898 0.140348 13.8398 0.0993396C13.7897 0.0583312 13.7312 0.0289339 13.6684 0.0132656C13.6057 -0.00240264 13.5402 -0.00395173 13.4768 0.00872996L9.1875 0.86623L4.89825 0.00872996C4.84164 -0.00258444 4.78336 -0.00258444 4.72675 0.00872996L0.35175 0.88373C0.252608 0.903546 0.163389 0.957088 0.099263 1.03525C0.0351366 1.11342 6.10593e-05 1.21138 0 1.31248L0 13.5625C3.90711e-05 13.6272 0.0144289 13.6911 0.0421328 13.7495C0.0698367 13.808 0.110165 13.8596 0.160212 13.9006C0.210259 13.9416 0.268779 13.971 0.331556 13.9867C0.394332 14.0024 0.459803 14.0039 0.52325 13.9912L4.8125 13.1337L9.10175 13.9912C9.15836 14.0025 9.21664 14.0025 9.27325 13.9912L13.6482 13.1162C13.7474 13.0964 13.8366 13.0429 13.9007 12.9647C13.9649 12.8865 13.9999 12.7886 14 12.6875V0.43748ZM4.375 12.3287V0.97123L4.8125 0.88373L5.25 0.97123V12.3287L4.89825 12.2587C4.84165 12.2474 4.78335 12.2474 4.72675 12.2587L4.375 12.3287ZM8.75 13.0287V1.67123L9.10175 1.74123C9.15836 1.75254 9.21664 1.75254 9.27325 1.74123L9.625 1.67123V13.0287L9.1875 13.1162L8.75 13.0287Z">
                                    </path>
                                </svg>
                                <?php
                                if (!empty($selected_destination)) :
                                    $destination_titles = array();

                                    foreach ($selected_destination as $destination_id) {
                                        $destination_titles[] = get_the_title($destination_id);
                                    }

                                    $num_destinations = count($destination_titles);

                                    for ($i = 0; $i < $num_destinations; $i++) {
                                        $destination_title = esc_html($destination_titles[$i]);
                                        $destination_permalink = get_permalink($selected_destination[$i]);
                                ?>
                                        <?php echo sprintf(__('%s', 'triprex'), $destination_title); ?>
                                <?php
                                        if ($i < $num_destinations - 1) {
                                            echo ', ';
                                        }
                                    }

                                endif;
                                ?>

                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>

                <?php the_content(); ?>

                <h4><?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tours_include_ex_title')); ?></h4>
                <div class="includ-and-exclud-area mb-20">
                    <ul>
                        <?php
                        $include = Egns\Helper\Egns_Helper::egns_tours_value('tours_include_label_text');
                        if (isset($include)) {
                            $include_list = explode("\n", $include);
                            foreach ($include_list as $item) {
                                $trimmed_item = trim($item);
                                if (!empty($trimmed_item)) { ?>
                                    <li><i class="bi bi-check-lg"></i> <?php echo esc_html($trimmed_item); ?></li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                    <ul class="exclud">
                        <?php
                        $exclude = Egns\Helper\Egns_Helper::egns_tours_value('tours_exclude_label_text');
                        if (isset($exclude)) {
                            $exclude_list = explode("\n", $exclude);
                            foreach ($exclude_list as $item) {
                                $trimmed_item = trim($item);
                                if (!empty($trimmed_item)) {  ?>
                                    <li><i class="bi bi-x-lg"></i> <?php echo esc_html($trimmed_item); ?></li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="highlight-tour mb-20">
                    <h4><?php echo Egns\Helper\Egns_Helper::egns_tours_value('tours_highlights_title'); ?></h4>
                    <ul>
                        <?php
                        $tour_highlight = Egns\Helper\Egns_Helper::egns_tours_value('tours_highlights_title_list');
                        if (isset($tour_highlight)) {
                            $tour_highlight_list = explode("\n", $tour_highlight);

                            foreach ($tour_highlight_list as $item) {
                                $trimmed_item = trim($item);
                                if (!empty($trimmed_item)) {
                        ?>
                                    <li><span><i class="bi bi-check"></i></span> <?php echo esc_html($trimmed_item); ?></li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tours_itinerary_title'))) : ?>
                    <h4><?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tours_itinerary_title')); ?></h4>
                <?php endif; ?>
                <?php $destination_info = Egns\Helper\Egns_Helper::egns_tours_value('itinerary_repeater');
                if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('itinerary_repeater'))) : ?>
                    <div class="accordion tour-plan" id="tourPlan">
                        <?php
                        foreach ($destination_info as $index => $step_data) :
                            $show_class = ($index === 0) ? 'show' : '';
                            $show_class_two = ($index === 0) ? '' : 'collapsed';
                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo  esc_attr($index); ?>">
                                    <button class="accordion-button <?php echo esc_attr($show_class_two); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($index); ?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr($index); ?>">
                                        <span><?php echo esc_html($step_data['itinerary_counter_title']); ?></span> <?php echo esc_html($step_data['itinerary_content_title']); ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo  esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr($show_class); ?>" aria-labelledby="heading<?php echo  esc_attr($index); ?>" data-bs-parent="#tourPlan">
                                    <div class="accordion-body">
                                        <p><?php echo wp_kses($step_data['itinerary_content'], array()); ?></p>
                                        <ul class="exclud">
                                            <?php
                                            $ltinerary_view = ($step_data['itinerary_content_list']);
                                            if (isset($ltinerary_view)) {
                                                $ltinerary_list = explode("\n", $ltinerary_view);
                                                foreach ($ltinerary_list as $item) {
                                                    $trimmed_item = trim($item);
                                                    if (!empty($trimmed_item)) {
                                            ?>
                                                        <li><i class="bi bi-check-lg"></i> <?php echo esc_html($trimmed_item); ?></li>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                <?php endif; ?>
                <?php if (Egns\Helper\Egns_Helper::egns_tours_value('tours_location_enable_disable_option')) : ?>
                    <div class="tour-location">
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tours_location_map_title'))) : ?>
                            <h4><?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tours_location_map_title')); ?></h4>
                        <?php endif; ?>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tours_iframe_code'))) : ?>
                            <div class="map-area mb-30">
                                <?php echo Egns\Helper\Egns_Helper::egns_tours_value('tours_iframe_code'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (Egns\Helper\Egns_Helper::egns_tours_value('tours_faq_enable_disable_option')) : ?>
                    <div class="faq-content-wrap">
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tours_faq_title'))) : ?>
                            <div class="faq-content-title mb-20">
                                <h4><?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_tours_value('tours_faq_title')); ?></h4>
                            </div>
                        <?php endif; ?>
                        <div class="faq-content">
                            <?php $faq_data = Egns\Helper\Egns_Helper::egns_tours_value('tours_faq_repeater');
                            if (!empty(Egns\Helper\Egns_Helper::egns_tours_value('tours_faq_repeater'))) : ?>
                                <div class="accordion" id="accordionTravel">
                                    <?php
                                    foreach ($faq_data as $index => $faq_item) :
                                        $show_class = ($index === 0) ? 'show' : '';
                                        $collapsed = ($index === 0) ? '' : 'collapsed';
                                    ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="travelheading<?php echo  esc_attr($index); ?>">
                                                <button class="accordion-button <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#travelcollapse<?php echo  esc_attr($index); ?>" aria-expanded="true" aria-controls="travelcollapse<?php echo  esc_attr($index); ?>">
                                                    <?php echo sprintf(__('%s', 'triprex'), $faq_item['tours_faq_qustion']); ?>
                                                </button>
                                            </h2>
                                            <div id="travelcollapse<?php echo  esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr($show_class); ?>" aria-labelledby="travelheading<?php echo  esc_attr($index); ?>" data-bs-parent="#accordionTravel">
                                                <div class="accordion-body">
                                                    <?php echo sprintf(__('%s', 'triprex'), $faq_item['tours_faq_answer']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                if (function_exists('run_reviewx')) :
                    // Include review file
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                endif;
                ?>
            </div>

            <div class="col-xl-4">
                <div class="booking-form-wrap mb-40">
                    <?php
                    if (class_exists('CSF')) {
                        $heading_title = Egns\Helper\Egns_Helper::egns_get_theme_option('tour_booking_form_heading_title');
                        $heading_desc = Egns\Helper\Egns_Helper::egns_get_theme_option('tour_booking_form_heading_desc');
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
                                <?php
                                if (class_exists('WooCommerce')) {
                                    // Include review file
                                    Egns\Helper\Egns_Helper::egns_template_part('tours', 'parts/booking-form');
                                }
                                ?>
                            </div>
                            <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                                <div class="sidebar-booking-form">
                                    <?php echo do_shortcode(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_booking_form_shortcode'))  ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="sidebar-booking-form">
                            <?php echo do_shortcode(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_booking_form_shortcode'))  ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('banner_card_show_hide') == 1)) :  ?>
                    <div class="banner2-card">
                        <?php
                        $banner_card_bg_img = Egns\Helper\Egns_Helper::egns_get_theme_option('banner_card_bg_img', 'url');
                        ?>
                        <?php if (!empty($banner_card_bg_img)) : ?>
                            <img src="<?php echo esc_url($banner_card_bg_img); ?>" alt="<?php esc_attr_e('card-img', 'triprex'); ?>">
                        <?php endif; ?>
                        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('bnr_crd_contact_info_show') == 1)) :  ?>
                            <div class="banner2-content-wrap">
                                <div class="banner2-content">
                                    <?php foreach ((array) Egns\Helper\Egns_Helper::egns_get_theme_option('bnr_crd_contact_info') as $item) : ?>
                                        <?php
                                        $contactType = isset($item['contact_bnr_type']) ? $item['contact_bnr_type'] : 'default_value';
                                        // Check if any of the contact information fields is not empty
                                        $isNotEmpty = (
                                            ($contactType === 'phone' && !empty($item['phone_bnr_info'])) ||
                                            ($contactType === 'email' && !empty($item['email_bnr_info'])) ||
                                            ($contactType === 'others' && !empty($item['custom_bnr_info']))
                                        );
                                        if ($isNotEmpty) :
                                        ?>
                                            <?php if ($contactType === 'phone') : ?>
                                                <div class="hotline-area">
                                                    <?php if ($contactType === 'phone' && !empty($item['phone_bnr_icon_svg']['url'])) : ?>
                                                        <div class="icon">
                                                            <img src="<?php echo esc_url($item['phone_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="content">
                                                        <?php if ($contactType === 'phone' && !empty($item['phone_bnr_info_text'])) : ?>
                                                            <span><?php echo esc_html($item['phone_bnr_info_text']); ?></span>
                                                        <?php endif ?>
                                                        <h6><a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $item['phone_bnr_info']); ?>"><?php echo esc_html($item['phone_bnr_info']); ?></a></h6>
                                                    </div>
                                                </div>
                                            <?php elseif ($contactType === 'email') : ?>
                                                <div class="hotline-area">
                                                    <?php if ($contactType === 'email' && !empty($item['email_bnr_icon_svg']['url'])) : ?>
                                                        <div class="icon">
                                                            <img src="<?php echo esc_url($item['email_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="content">
                                                        <?php if ($contactType === 'email' && !empty($item['email_bnr_info_text'])) : ?>
                                                            <span><?php echo esc_html($item['email_bnr_info_text']); ?></span>
                                                        <?php endif ?>
                                                        <h6><a href="mailto:<?php echo esc_html($item['email_bnr_info']); ?>"><?php echo esc_html($item['email_bnr_info']); ?></a></h6>
                                                    </div>
                                                </div>
                                            <?php elseif ($contactType === 'others') : ?>
                                                <div class="hotline-area">
                                                    <?php if ($contactType === 'others' && !empty($item['custom_bnr_icon_svg']['url'])) : ?>
                                                        <div class="icon">
                                                            <img src="<?php echo esc_url($item['custom_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="content">
                                                        <?php if ($contactType === 'others' && !empty($item['custom_bnr_info_txt'])) : ?>
                                                            <span><?php echo esc_html($item['custom_bnr_info_txt']); ?></span>
                                                        <?php endif ?>
                                                        <h5><?php echo wp_kses(($item['custom_bnr_info']), wp_kses_allowed_html('post')); ?></h5>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/innerpage/support-img.jpg') ?>" alt="">
                    <?php endif ?>
                    </div>
            </div>
        </div>
    </div>
</div>