<?php

$get_room_types = get_terms(['taxonomy'   => 'room-type', 'hide_empty'   => true]);
$get_hotel_location = get_terms(['taxonomy'   => 'hotel-location', 'hide_empty'   => true]);


// Get minimum and Maximum price from woocommerce
$args = array(
    'post_type' => 'hotel',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'fields' => 'ids',
);
$product_ids = get_posts($args);
$min_price = PHP_INT_MAX;
$max_price = 0;


foreach ($product_ids as $product_id) {

    // Replace 'get_data' with your actual meta key
    $get_data = get_post_meta($product_id, 'EGNS_HOTEL_META_ID', true);
    // Assuming $product is defined properly
    $get_price = \Egns\Helper\Egns_Helper::egns_get_hotel_package_without_currency_price_by_id($product_id);

    $price = $get_price;

    if ($price < $min_price) {
        $min_price = $price;
    }
    if ($price > $max_price) {
        $max_price = $price;
    }
}

?>
<div class="sidebar-area">
    <div class="single-widget mb-30">
        <h5 class="widget-title"><?php echo esc_html__('Search Here', 'triprex')  ?></h5>
        <form id="hotelSearch" method="GET">
            <div class="search-box">
                <input type="text" id="hotelSearchKeyword" placeholder="Search Here">
                <button type="submit"><i class="bx bx-search"></i></button>
            </div>
        </form>
    </div>
    <div class="single-widget mb-30">
        <h5 class="widget-title"><?php echo esc_html__('Room Types', 'triprex') ?></h5>
        <div class="checkbox-container">
            <ul>
                <?php foreach ($get_room_types as $types) : ?>
                    <?php if (!empty($types->name) && !empty($types->slug)) : ?>
                        <li>
                            <label class="containerss">
                                <input class="roomType" type="checkbox" value="<?php echo esc_html($types->term_id) ?? '' ?>">
                                <span class="checkmark"></span>
                                <span class="text"><?php echo sprintf('%s', $types->name) ?></span>
                            </label>
                        </li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
        </div>
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
    <div class="single-widget">
        <h5 class="widget-title"><?php echo esc_html__('Hotel Locations', 'triprex') ?></h5>
        <div class="checkbox-container">
            <ul>
                <?php foreach ($get_hotel_location as $types) : ?>
                    <?php if (!empty($types->name) && !empty($types->slug)) : ?>
                        <li>
                            <label class="containerss">
                                <input class="locationType" type="checkbox" value="<?php echo esc_html($types->term_id) ?? '' ?>">
                                <span class="checkmark"></span>
                                <span class="text"><?php echo sprintf('%s', $types->name) ?></span>
                            </label>
                        </li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>