<?php

$enable_breadcrumb_by_theme = Egns\Helper\Egns_Helper::egns_get_theme_option('breadcrumb_enable');
$breadcrumb_enable_by_page = Egns\Helper\Egns_Helper::egns_page_option_value('breadcrumb_enable_page');

$page_breadcrumb_image = Egns\Helper\Egns_Helper::egns_page_option_value('breadcrumb_page_bg_image');

$term = get_queried_object();

if (Egns\Helper\Egns_Helper::is_enabled($enable_breadcrumb_by_theme, $breadcrumb_enable_by_page)) { ?>
    <?php if (!empty($page_breadcrumb_image['url'])) : ?>
        <div class="breadcrumb-section" <?php if (!empty($page_breadcrumb_image['url'])) : ?> style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url(<?php echo esc_url($page_breadcrumb_image['url']) ?>);" <?php endif; ?>>
        <?php else : ?>
            <div class="breadcrumb-section" <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('breadcrumb_bg_image', 'url'))) : ?> style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url(<?php echo !empty(Egns\Helper\Egns_Helper::egns_get_theme_option('breadcrumb_bg_image', 'url')) ? Egns\Helper\Egns_Helper::egns_get_theme_option('breadcrumb_bg_image', 'url') : '' ?>);" <?php endif; ?>>
            <?php endif ?>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="banner-content">
                            <h1>
                                <?php
                                if (is_category()) {
                                    echo esc_html__('Category : ', 'triprex');
                                    single_cat_title();
                                } elseif (is_tag()) {
                                    echo esc_html__('Tag : ', 'triprex');
                                    single_tag_title();
                                } elseif (is_author()) {
                                    echo esc_html__('Author : ', 'triprex');
                                    the_author();
                                } elseif (is_date()) {
                                    echo esc_html__('Date : ', 'triprex');
                                    if (is_day()) {
                                        echo get_the_time('F j, Y');
                                    } else if (is_month()) {
                                        echo get_the_time('F, Y');
                                    } else if (is_year()) {
                                        echo get_the_time('Y');
                                    }
                                } elseif (is_tax() && $term->taxonomy == 'tour-types' && $term) {
                                    Egns\Helper\Egns_Helper::egns_translate_with_escape_('Tour Type: ');
                                    echo sprintf(__('%s', 'triprex'), $term->name);
                                } elseif (is_tax() && $term->taxonomy == 'transport-type' && $term) {
                                    Egns\Helper\Egns_Helper::egns_translate_with_escape_('Transport: ');
                                    echo sprintf(__('%s', 'triprex'), $term->name);
                                } elseif (is_tax() && $term->taxonomy == 'room-type' && $term) {
                                    Egns\Helper\Egns_Helper::egns_translate_with_escape_('Room: ');
                                    echo sprintf(__('%s', 'triprex'), $term->name);
                                } elseif (is_tax() && $term->taxonomy == 'city-location' && $term) {
                                    Egns\Helper\Egns_Helper::egns_translate_with_escape_('Location: ');
                                    echo sprintf(__('%s', 'triprex'), $term->name);
                                } elseif (is_tax() && $term) {
                                    echo sprintf(__('%s', 'triprex'), $term->taxonomy) . ": " . sprintf(__('%s', 'triprex'), $term->name);
                                } elseif (is_post_type_archive()) {
                                    post_type_archive_title();
                                } elseif (is_home()) {
                                    Egns\Helper\Egns_Helper::egns_translate_with_escape_('Blog');
                                } else {
                                    the_title();
                                }
                                ?>
                            </h1>
                            <?php egns_breadcrumb() ?>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        <?php
    }
        ?>