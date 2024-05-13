<?php

$enable_breadcrumb_by_theme = Egns\Helper\Egns_Helper::egns_get_theme_option('breadcrumb_enable');
$breadcrumb_enable_by_page = Egns\Helper\Egns_Helper::egns_page_option_value('breadcrumb_enable_page');

$page_breadcrumb_image = Egns\Helper\Egns_Helper::egns_page_option_value('breadcrumb_page_bg_image');


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
                            <h1><?php printf(esc_html__('Looking for : %s', 'triprex'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        <?php
    }
        ?>