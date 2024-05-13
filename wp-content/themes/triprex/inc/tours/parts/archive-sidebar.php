<?php

$all_destination = \Egns\Helper\Egns_Helper::egns_get_tour_destination();

$get_tour_types = get_terms(['taxonomy'   => 'tour-types', 'hide_empty'   => true]);

// Get minimum and Maximum price from woocommerce
$args = array(
    'post_type' => 'tours',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'fields' => 'ids',
);
$product_ids = get_posts($args);
$min_price = PHP_INT_MAX;
$max_price = 0;



if (class_exists('Woocommerce')) {
    foreach ($product_ids as $product_id) {

        // Replace 'get_data' with your actual meta key
        $get_data = get_post_meta($product_id, 'EGNS_TOURS_META_ID', true);
        // Assuming $product is defined properly
        $get_price = \Egns\Helper\Egns_Helper::egns_get_tour_package_without_currency_price_by_id($product_id);

        $price = $get_price;

        if ($price < $min_price) {
            $min_price = $price;
        }
        if ($price > $max_price) {
            $max_price = $price;
        }
    }
}

?>

<div class="sidebar-area">
    <div class="single-widget mb-30">
        <form id="tourSearch" method="GET">
            <div class="form-inner">
                <input type="text" id="tourSearchKeyword" placeholder="Search">
                <button type="submit"><i class='bx bx-search'></i></button>
            </div>
        </form>
    </div>
    <div class="single-widget mb-30">
        <h5 class="shop-widget-title"><?php echo esc_html__('Price Filter', 'triprex') ?></h5>
        <div class="range-wrap">
            <div class="range-widget">
                <div id="slider-range" class="price-filter-range">
                    <div class="mt-5 d-flex justify-content-between gap-4">
                        <input type="number" min=<?php echo esc_html($min_price) ?> max="<?php echo esc_html($max_price) ?>" oninput="validity.valid||(value='<?php echo esc_html($min_price) ?>');" id="min_price" class="price-range-field" />
                        <input type="number" min=<?php echo esc_html($min_price) ?> max="<?php echo esc_html($max_price) ?>" oninput="validity.valid||(value='<?php echo esc_html($max_price) ?>');" id="max_price" class="price-range-field" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-widget mb-30">
        <h5 class="widget-title"><?php echo esc_html__('Destination', 'triprex') ?></h5>
        <ul class="category-list destination">
            <?php if (!empty($all_destination)) : ?>
                <?php foreach ((array) $all_destination as $key => $destination) : ?>
                    <li>
                        <label for="<?php echo esc_html($destination) ?>">
                            <input type="radio" id="<?php echo esc_html($destination) ?>" name="destination" class="radioBtnClass" value="<?php echo esc_html($key) ?>" /> <?php echo esc_html($destination) ?>
                            <span class="checkmark"></span>
                        </label>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
        </ul>
    </div>
    <?php if (!empty($get_tour_types)) : ?>
        <div class="single-widget mb-30">
            <h5 class="widget-title"><?php echo esc_html__('Tour Type', 'triprex') ?></h5>
            <ul class="category-list">
                <?php foreach ($get_tour_types as $types) : ?>
                    <?php if (!empty($types->name) && !empty($types->slug)) : ?>
                        <li>
                            <label class="containerss">
                                <input class="tourType" type="checkbox" value="<?php echo esc_html($types->term_id) ?? '' ?>">
                                <span class="checkmark"></span>
                                <a data-slug="<?php echo sprintf('%s', $types->slug) ?>"><?php echo sprintf('%s', $types->name) ?></a>
                            </label>
                        </li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_show_hide') == 1)) :  ?>
        <div class="single-widget mb-30">
            <div class="banner2-card four">
                <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_bg_img', 'url'))) : ?>
                    <img src="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_bg_img', 'url')) ?>" alt="<?php esc_attr_e('card2-img', 'triprex'); ?>">
                <?php endif ?>
                <div class="banner2-content-wrap">
                    <div class="banner2-content">
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_content_title'))) : ?>
                            <span><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_content_title')) ?></span>
                        <?php endif ?>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_content_offer_txt'))) : ?>
                            <h3><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_content_offer_txt')) ?></h3>
                        <?php endif ?>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_content_desc'))) : ?>
                            <p><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_content_desc')) ?></p>
                        <?php endif ?>
                    </div>
                    <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_btn_enable') == 1)) :  ?>
                        <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_btn_text'))) : ?>
                            <a href="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_btn_link', 'url')) ?>" class="secondary-btn2"><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('tour_banner_card_btn_text')) ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>