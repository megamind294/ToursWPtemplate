<div class="transport-details-section pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-8">
                <div class="transport-image-area mb-50">
                    <div class="tab-content mb-30" id="myTab5Content">
                        <?php
                        $images = (array) Egns_Core\Egns_Helper::egns_transport_value('transport_tab_info_re');
                        foreach ($images as $index => $image) :
                            if (isset($image['transport_tab_image']['url'])) {
                                $image_url = $image['transport_tab_image']['url'];
                        ?>
                                <div class="tab-pane fade <?php echo esc_attr(($index == 0) ? 'show active' : ''); ?>" id="exterior-<?php echo esc_attr($index); ?>" role="tabpanel" aria-labelledby="exterior-tab-<?php echo esc_attr($index); ?>">
                                    <div class="transport-img">
                                        <div class="slider-btn-group">
                                            <div class="product-stand-next swiper-arrow">
                                                <svg width="8" height="13" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z" />
                                                </svg>
                                            </div>
                                            <div class="product-stand-prev swiper-arrow">
                                                <svg width="8" height="13" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="swiper product-img-slider">
                                            <div class="swiper-wrapper">

                                                <?php
                                                if (isset($image['transport_tab_slider_image_re']) && is_array($image['transport_tab_slider_image_re'])) {
                                                    foreach ($image['transport_tab_slider_image_re'] as $slider_image) {
                                                        $slider_image_url = $slider_image['transport_slider_images']['url'];
                                                ?>
                                                        <div class="swiper-slide">
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('image', 'triprex'); ?>">
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="<?php echo esc_url($slider_image_url); ?>" alt="<?php echo esc_attr__('image', 'triprex'); ?>">
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        endforeach; ?>
                    </div>
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                        <?php
                        $images = (array) Egns_Core\Egns_Helper::egns_transport_value('transport_tab_info_re');
                        foreach ($images as $index => $image) :
                            if (isset($image['transport_tab_image']['url'])) {
                                $image_url = $image['transport_tab_image']['url'];
                        ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo esc_attr(($index == 0) ? 'active' : ''); ?>" id="exterior-tab-<?php echo esc_attr($index); ?>" data-bs-toggle="tab" data-bs-target="#exterior-<?php echo esc_attr($index); ?>" type="button" role="tab" aria-controls="exterior<?php echo esc_attr($index); ?>" aria-selected="<?php echo esc_attr(($index === 0) ? 'true' : 'false'); ?>">
                                        <img src="<?php echo esc_attr($image_url); ?>" alt="">
                                    </button>
                                </li>
                        <?php }
                        endforeach; ?>
                    </ul>
                </div>
                <ul class="fetures">
                    <?php
                    $general_info = (array) Egns_Core\Egns_Helper::egns_transport_value('transport_general_info_re');
                    foreach ($general_info as $index => $info) :
                        if (isset($info['transport_info_icon']['url'])) {
                            $icon_url = $info['transport_info_icon']['url']; ?>
                            <li>
                                <?php if (!empty($icon_url)) : ?>
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr__('Icon', 'triprex'); ?>" />
                                <?php endif; ?>
                                <?php echo esc_html($info['transport_info_label_text']); ?>
                            </li>
                    <?php }
                    endforeach; ?>
                </ul>
                <?php the_content(); ?>
                <h4><?php echo Egns_Core\Egns_Helper::egns_transport_value('transport_include_ex_title'); ?></h4>
                <div class="includ-and-exclud-area mb-20">
                    <ul>
                        <?php
                        $include = Egns_Core\Egns_Helper::egns_transport_value('transport_include_label_text');
                        if (isset($include)) {
                            $include_list = explode("\n", $include);

                            foreach ($include_list as $item) {
                                $trimmed_item = trim($item);
                                if (!empty($trimmed_item)) {  ?>
                                    <li><i class="bi bi-check-lg"></i> <?php echo esc_html($trimmed_item); ?></li>
                        <?php   }
                            }
                        }
                        ?>
                    </ul>
                    <ul class="exclud">
                        <?php
                        $exclude = Egns_Core\Egns_Helper::egns_transport_value('transport_exclude_label_text');
                        if (isset($exclude)) {
                            $exclude_list = explode("\n", $exclude);

                            foreach ($exclude_list as $item) {
                                $trimmed_item = trim($item);
                                if (!empty($trimmed_item)) { ?>
                                    <li><i class="bi bi-x-lg"></i><?php echo esc_html($trimmed_item); ?></li>
                        <?php   }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="faq-content-wrap mb-80">
                    <div class="faq-content-title mb-20">
                        <h4><?php echo sprintf(__('%s', 'triprex'), Egns_Core\Egns_Helper::egns_transport_value('transport_faq_title')); ?></h4>
                    </div>
                    <?php if (Egns_Core\Egns_Helper::egns_transport_value('transport_faq_enable_disable_option')) : ?>
                        <div class="faq-content">
                            <?php $faq_data = Egns_Core\Egns_Helper::egns_transport_value('transport_faq_repeater');
                            if (!empty(Egns_Core\Egns_Helper::egns_transport_value('transport_faq_repeater'))) : ?>
                                <div class="accordion" id="accordionTravel">
                                    <?php
                                    foreach ($faq_data as $index => $faq_item) :
                                        $show_class = ($index === 0) ? 'show' : '';
                                        $collapsed = ($index === 0) ? '' : 'collapsed';
                                    ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="travelheading<?php echo esc_attr($index); ?>">
                                                <button class="accordion-button <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#travelcollapse<?php echo esc_attr($index); ?>" aria-expanded="true" aria-controls="travelcollapse<?php echo esc_attr($index); ?>">
                                                    <?php echo esc_html($faq_item['transport_faq_qustion']); ?>
                                                </button>
                                            </h2>
                                            <div id="travelcollapse<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr($show_class); ?>" aria-labelledby="travelheading<?php echo esc_attr($index); ?>" data-bs-parent="#accordionTravel">
                                                <div class="accordion-body">
                                                    <?php echo esc_html($faq_item['transport_faq_answer']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="review-wrapper">
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
            <div class="col-lg-4">
                <div class="transport-sidebar">
                    <div class="booking-form-wrap">
                        <?php
                        if (class_exists('CSF')) {
                            $heading_title = Egns\Helper\Egns_Helper::egns_get_theme_option('transport_booking_form_heading_title');
                            $heading_desc = Egns\Helper\Egns_Helper::egns_get_theme_option('transport_booking_form_heading_desc');
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
                                <button class="nav-link" id="v-pills-contact-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contact" type="button" role="tab" aria-controls="v-pills-contact" aria-selected="false" tabindex="-1">Inquiry Form</button>
                            </div>
                            <div class="tab-content" id="v-pills-tabContent2">
                                <div class="tab-pane fade active show" id="v-pills-booking" role="tabpanel" aria-labelledby="v-pills-booking-tab">
                                    <?php
                                    if (class_exists('WooCommerce')) {
                                        // Include review file
                                        Egns\Helper\Egns_Helper::egns_template_part('transport', 'parts/booking-form');
                                    }
                                    ?>
                                </div>
                                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                                    <div class="sidebar-booking-form">
                                        <?php echo do_shortcode(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_booking_form_shortcode'))  ?>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="sidebar-booking-form">
                                <?php echo do_shortcode(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_booking_form_shortcode'))  ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>