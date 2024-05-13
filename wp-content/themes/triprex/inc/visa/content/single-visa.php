<?php

use Egns\Helper\Egns_Helper;
?>

<div class="visa-details-pages pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-8">
                <div class="visa-thumb">
                    <?php the_post_thumbnail(); ?>
                </div>
                <ul class="visa-meta">

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
                    <?php endif;
                    ?>

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
                    <?php endif;
                    ?>

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
                    <?php endif;
                    ?>

                    <?php $visa_info = Egns\Helper\Egns_Helper::egns_visa_value('visa_general_info_re');
                    if (!empty(Egns\Helper\Egns_Helper::egns_visa_value('visa_general_info_re'))) :
                        foreach ($visa_info as $step_data) :
                    ?>
                            <li><span><?php echo sprintf(__('%s', 'triprex'), $step_data['visa_info_label_text']); ?></span> <?php echo sprintf(__('%s', 'triprex'), $step_data['visa_info_content_text']); ?></li>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <?php the_content(); ?>
                <?php $visa_documents = (array) Egns\Helper\Egns_Helper::egns_visa_value('visa_document_re');
                if (!empty(Egns\Helper\Egns_Helper::egns_visa_value('visa_document_re'))) : ?>
                    <div class="visa-required-document mb-50">
                        <div class="document-list">
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_visa_value('visa_document_heading_title'))) : ?>
                                <h3><?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_visa_value('visa_document_heading_title')); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_visa_value('visa_document_heading_subtitle'))) : ?>
                                <h6><span><?php echo esc_html('*'); ?></span><?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_visa_value('visa_document_heading_subtitle')); ?></h6>
                            <?php endif; ?>
                            <ul>
                                <?php foreach ($visa_documents as $step_data) : ?>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16">
                                            <path d="M8.21008 15.9998C8.15563 15.9998 8.10177 15.9885 8.05188 15.9664C8.002 15.9444 7.95717 15.9122 7.92022 15.8719L0.104874 7.34121C0.0527746 7.28433 0.0182361 7.21337 0.00548549 7.137C-0.00726514 7.06063 0.00232503 6.98216 0.0330824 6.9112C0.0638398 6.84025 0.11443 6.77988 0.178662 6.73748C0.242893 6.69509 0.31798 6.67251 0.394731 6.6725H4.15661C4.21309 6.67251 4.26891 6.68474 4.32031 6.70837C4.37171 6.73201 4.41749 6.76648 4.45456 6.80949L7.06647 9.84167C7.34875 9.2328 7.89519 8.21899 8.85409 6.98363C10.2717 5.15733 12.9085 2.47141 17.4197 0.0467428C17.5069 -0.000110955 17.6084 -0.0122714 17.704 0.0126629C17.7996 0.0375972 17.8825 0.0978135 17.9363 0.181422C17.9901 0.26503 18.0109 0.365952 17.9946 0.46426C17.9782 0.562568 17.9259 0.651115 17.848 0.712418C17.8308 0.726001 16.0914 2.10818 14.0896 4.63987C12.2473 6.96965 9.79823 10.7792 8.59313 15.6973C8.57196 15.7837 8.52272 15.8604 8.45327 15.9153C8.38382 15.9702 8.29816 16 8.20996 16L8.21008 15.9998Z" />
                                        </svg> <?php echo sprintf(__('%s', 'triprex'), $step_data['visa_document_content_text']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <h4 class="widget-title mb-30"><?php echo sprintf(__('%s', 'triprex'), Egns\Helper\Egns_Helper::egns_visa_value('visa_faq_heading')); ?></h4>
                <?php $faq_data = Egns\Helper\Egns_Helper::egns_visa_value('visa_faq_re');
                if (!empty(Egns\Helper\Egns_Helper::egns_visa_value('visa_faq_re'))) :  ?>
                    <div class="faq-content">
                        <div class="accordion" id="accordionTravel">
                            <?php
                            $first_item = true;

                            foreach ($faq_data as $index => $step_data) :
                                $accordion_id = 'travelcollapse' . $index;

                            ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="travelheading<?php echo esc_attr($index); ?>">
                                        <button class="accordion-button <?php echo esc_attr($first_item ? '' : 'collapsed'); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($accordion_id); ?>" aria-expanded="<?php echo esc_attr($first_item ? 'true' : 'false'); ?>" aria-controls="<?php echo esc_attr($accordion_id); ?>">
                                            <?php echo sprintf(__('%s', 'triprex'), $step_data['visa_faq_qustion']); ?>
                                        </button>
                                    </h2>
                                    <div id="<?php echo esc_attr($accordion_id); ?>" class="accordion-collapse collapse<?php echo esc_attr($first_item ? ' show' : ''); ?>" aria-labelledby="travelheading<?php echo esc_attr($index); ?>" data-bs-parent="#accordionTravel">
                                        <div class="accordion-body">
                                            <?php echo sprintf(__('%s', 'triprex'), $step_data['visa_faq_answer']); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $first_item = false;
                            endforeach;
                            ?>



                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <div class="visa-sidebar mb-30">
                    <div class="sidebar-top text-center">
                        <h4><?php echo Egns\Helper\Egns_Helper::egns_visa_value('visa_cost_heading') ?></h4>
                        <h6>
                            <?php echo \Egns_Core\Egns_Helper::egns_get_visa_pack_price() ?> /
                            <strong><?php echo \Egns\Helper\Egns_Helper::package_price_type(Egns\Helper\Egns_Helper::egns_visa_value('visa_cost_select'))  ?></strong>
                        </h6>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_visa_value('visa_cost_select') == 'pergroup' && \Egns\Helper\Egns_Helper::egns_visa_value('visa_service_total_member'))) : ?>
                            <span><?php echo esc_html__('Group Size:', 'triprex')  ?></span> <strong><?php echo \Egns\Helper\Egns_Helper::egns_visa_value('visa_service_total_member') ?> </strong>
                        <?php endif ?>
                        <p><?php echo Egns\Helper\Egns_Helper::egns_visa_value('visa_short_desc') ?></p>
                    </div>
                    <div class="inquery-form">
                        <div class="form-title">
                            <?php
                            if (class_exists('CSF')) {
                                $heading_title = Egns\Helper\Egns_Helper::egns_get_theme_option('visa_booking_form_heading_title');
                                $heading_desc = Egns\Helper\Egns_Helper::egns_get_theme_option('visa_booking_form_heading_desc');
                                $inquiry_form = Egns\Helper\Egns_Helper::egns_get_theme_option('visa_inquiry_form_shortcode');
                            ?>
                                <?php if (!empty($heading_title)) : ?>
                                    <h4><?php echo wp_kses($heading_title, wp_kses_allowed_html('post')); ?></h4>
                                <?php endif; ?>

                                <?php if (!empty($heading_desc)) : ?>
                                    <p><?php echo wp_kses($heading_desc, wp_kses_allowed_html('post')); ?></p>
                            <?php endif;
                            }
                            ?>
                        </div>
                        <?php echo do_shortcode($inquiry_form) ?>
                    </div>
                </div>

                <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('single_sid_banner_card_show_hide') == 1)) :  ?>
                    <div class="banner2-card">
                        <?php
                        $single_sid_banner_card_bg_img = Egns\Helper\Egns_Helper::egns_get_theme_option('single_sid_banner_card_bg_img', 'url');
                        ?>
                        <?php if (!empty($single_sid_banner_card_bg_img)) : ?>
                            <img src="<?php echo esc_url($single_sid_banner_card_bg_img); ?>" alt="<?php esc_attr_e('card-img', 'triprex'); ?>">
                        <?php endif; ?>
                        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('single_sid_bnr_crd_contact_info_show') == 1)) :  ?>
                            <div class="banner2-content-wrap">
                                <div class="banner2-content">
                                    <?php foreach ((array) Egns\Helper\Egns_Helper::egns_get_theme_option('single_sid_bnr_crd_contact_info') as $item) : ?>
                                        <?php
                                        $contactType = isset($item['single_sid_contact_bnr_type']) ? $item['single_sid_contact_bnr_type'] : 'default_value';
                                        // Check if any of the contact information fields is not empty
                                        $isNotEmpty = (
                                            ($contactType === 'phone' && !empty($item['single_sid_phone_bnr_info'])) ||
                                            ($contactType === 'email' && !empty($item['single_sid_email_bnr_info'])) ||
                                            ($contactType === 'others' && !empty($item['single_sid_custom_bnr_info']))
                                        );
                                        if ($isNotEmpty) :
                                        ?>
                                            <?php if ($contactType === 'phone') : ?>
                                                <div class="hotline-area">
                                                    <?php if ($contactType === 'phone' && !empty($item['single_sid_phone_bnr_icon_svg']['url'])) : ?>
                                                        <div class="icon">
                                                            <img src="<?php echo esc_url($item['single_sid_phone_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="content">
                                                        <?php if ($contactType === 'phone' && !empty($item['single_sid_phone_bnr_info_text'])) : ?>
                                                            <span><?php echo esc_html($item['single_sid_phone_bnr_info_text']); ?></span>
                                                        <?php endif ?>
                                                        <h6><a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $item['single_sid_phone_bnr_info']); ?>"><?php echo esc_html($item['single_sid_phone_bnr_info']); ?></a></h6>
                                                    </div>
                                                </div>
                                            <?php elseif ($contactType === 'email') : ?>
                                                <div class="hotline-area">
                                                    <?php if ($contactType === 'email' && !empty($item['single_sid_email_bnr_icon_svg']['url'])) : ?>
                                                        <div class="icon">
                                                            <img src="<?php echo esc_url($item['single_sid_email_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="content">
                                                        <?php if ($contactType === 'email' && !empty($item['single_sid_email_bnr_info_text'])) : ?>
                                                            <span><?php echo esc_html($item['single_sid_email_bnr_info_text']); ?></span>
                                                        <?php endif ?>
                                                        <h6><a href="mailto:<?php echo esc_html($item['single_sid_email_bnr_info']); ?>"><?php echo esc_html($item['single_sid_email_bnr_info']); ?></a></h6>
                                                    </div>
                                                </div>
                                            <?php elseif ($contactType === 'others') : ?>
                                                <div class="hotline-area">
                                                    <?php if ($contactType === 'others' && !empty($item['single_sid_custom_bnr_icon_svg']['url'])) : ?>
                                                        <div class="icon">
                                                            <img src="<?php echo esc_url($item['single_sid_custom_bnr_icon_svg']['url']); ?>" alt="<?php esc_attr_e('icon', 'triprex'); ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="content">
                                                        <?php if ($contactType === 'others' && !empty($item['single_sid_custom_bnr_info_txt'])) : ?>
                                                            <span><?php echo esc_html($item['single_sid_custom_bnr_info_txt']); ?></span>
                                                        <?php endif ?>
                                                        <h5><?php echo wp_kses(($item['single_sid_custom_bnr_info']), wp_kses_allowed_html('post')); ?></h5>
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