<?php
$all_destination = \Egns\Helper\Egns_Helper::egns_get_tour_destination();

$get_transport_types = get_terms(['taxonomy'   => 'transport-type', 'hide_empty'   => true]);

?>
<div class="col-xl-4 order-lg-1 order-2">
    <div class="sidebar-area">
        <div class="single-widget mb-30">
            <h5 class="widget-title"><?php echo esc_html__('Search Here', 'triprex')  ?></h5>
            <form id="transportSearch" method="GET">
                <div class="search-box">
                    <input type="text" id="transportSearchKeyword" placeholder="Search Here">
                    <button type="submit"><i class="bx bx-search"></i></button>
                </div>
            </form>
        </div>
        <div class="single-widget mb-30">
        <h5 class="widget-title"><?php echo esc_html__('Destination', 'triprex') ?></h5>
        <ul class="category-list destination">
            <?php if (!empty($all_destination)) : ?>
                <?php foreach ((array) $all_destination as $key => $destination) : ?>
                    <li>
                        <label for="<?php echo esc_html($destination) ?>">
                            <input type="radio" id="<?php echo esc_html($destination) ?>" name="destination" class="radioBtnClass2" value="<?php echo esc_html($key) ?>" /> <?php echo esc_html($destination) ?>
                            <span class="checkmark"></span>
                        </label>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
        </ul>
    </div>
        <div class="single-widget mb-30">
            <h5 class="widget-title"><?php echo esc_html__('Facilities', 'triprex') ?></h5>
            <div class="checkbox-container">
                <ul>
                    <?php foreach ($get_transport_types as $types) : ?>
                        <?php if (!empty($types->name) && !empty($types->slug)) : ?>
                            <li>
                                <label class="containerss">
                                    <input class="transportType" type="checkbox" value="<?php echo esc_html($types->term_id) ?? '' ?>">
                                    <span class="checkmark"></span>
                                    <span class="text"><?php echo sprintf('%s', $types->name) ?></span>
                                </label>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_show_hide') == 1)) :  ?>
            <div class="single-widget mb-30">
                <div class="banner2-card four">
                    <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_bg_img', 'url'))) : ?>
                        <img src="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_bg_img', 'url')) ?>" alt="<?php esc_attr_e('card2-img', 'triprex'); ?>">
                    <?php endif ?>
                    <div class="banner2-content-wrap">
                        <div class="banner2-content">
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_content_title'))) : ?>
                                <span><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_content_title')) ?></span>
                            <?php endif ?>
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_content_offer_txt'))) : ?>
                                <h3><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_content_offer_txt')) ?></h3>
                            <?php endif ?>
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_content_desc'))) : ?>
                                <p><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_content_desc')) ?></p>
                            <?php endif ?>
                        </div>
                        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_btn_enable') == 1)) :  ?>
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_btn_text'))) : ?>
                                <a href="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_btn_link', 'url')) ?>" class="secondary-btn2"><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('transport_banner_card_btn_text')) ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>