<?php

use Egns_Core\Egns_Helper;

$all_destination = Egns_Helper::get_posts('destination');
?>
<form method="get" action="<?php echo get_post_type_archive_link('transport'); ?>" id="tour-query-form">
    <div class="filter-area">
        <div class="row g-xl-4 gy-4">
            <div class="col-xl-4 col-md-6 d-flex justify-content-center divider">
                <div class="single-search-box">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27">
                            <path d="M18.0075 17.8392C20.8807 13.3308 20.5195 13.8933 20.6023 13.7757C21.6483 12.3003 22.2012 10.5639 22.2012 8.75391C22.2012 3.95402 18.3062 0 13.5 0C8.7095 0 4.79883 3.94622 4.79883 8.75391C4.79883 10.5627 5.3633 12.3446 6.44361 13.8399L8.99237 17.8393C6.26732 18.2581 1.63477 19.506 1.63477 22.2539C1.63477 23.2556 2.28857 24.6831 5.40327 25.7955C7.57814 26.5722 10.4536 27 13.5 27C19.1966 27 25.3652 25.3931 25.3652 22.2539C25.3652 19.5055 20.7381 18.2589 18.0075 17.8392ZM7.76508 12.9698C7.75639 12.9562 7.7473 12.9428 7.73782 12.9298C6.83886 11.6931 6.38086 10.2274 6.38086 8.75391C6.38086 4.79788 9.56633 1.58203 13.5 1.58203C17.4255 1.58203 20.6191 4.7993 20.6191 8.75391C20.6191 10.2297 20.1698 11.6457 19.3195 12.8498C19.2432 12.9503 19.6408 12.3327 13.5 21.9686L7.76508 12.9698ZM13.5 25.418C7.27766 25.418 3.2168 23.589 3.2168 22.2539C3.2168 21.3566 5.30339 19.8811 9.92714 19.306L12.8329 23.8656C12.9044 23.9777 13.0029 24.0701 13.1195 24.134C13.2361 24.198 13.367 24.2315 13.4999 24.2315C13.6329 24.2315 13.7638 24.198 13.8804 24.134C13.9969 24.0701 14.0955 23.9777 14.167 23.8656L17.0727 19.306C21.6966 19.8811 23.7832 21.3566 23.7832 22.2539C23.7832 23.5776 19.7589 25.418 13.5 25.418Z" />
                            <path d="M13.5 4.79883C11.3192 4.79883 9.54492 6.57308 9.54492 8.75391C9.54492 10.9347 11.3192 12.709 13.5 12.709C15.6808 12.709 17.4551 10.9347 17.4551 8.75391C17.4551 6.57308 15.6808 4.79883 13.5 4.79883ZM13.5 11.127C12.1915 11.127 11.127 10.0624 11.127 8.75391C11.127 7.44541 12.1915 6.38086 13.5 6.38086C14.8085 6.38086 15.873 7.44541 15.873 8.75391C15.873 10.0624 14.8085 11.127 13.5 11.127Z" />
                        </svg>
                    </div>
                    <div class="searchbox-input">
                        <label><?php echo esc_html__('Location Form', 'triprex-core') ?></label>
                        <div class="custom-select-dropdown">
                            <div class="select-input">
                                <input type="text" name="transport_des" readonly value="<?php echo esc_html__('Select Location', 'triprex-core') ?>">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                            <div class="custom-select-wrap">
                                <div class="custom-select-search-area">
                                    <i class='bx bx-search'></i>
                                    <input type="text" placeholder="<?php echo esc_attr__('Type Your Destination', 'triprex-core') ?>">
                                </div>
                                <ul class="option-list">
                                    <?php foreach ($all_destination as $destination) : ?>
                                        <?php
                                        $get_location = get_the_terms($destination->ID, 'city-location');
                                        $tourCount = \Egns_Core\Egns_Helper::get_tour_count_by_destination_id($destination->ID);
                                        ?>
                                        <li>
                                            <div class="destination">
                                                <h6><?php echo $destination->post_title ?? '' ?></h6>
                                                <?php
                                                $names = array();
                                                if (!empty($get_location) && !is_wp_error($get_location)) {
                                                    foreach ($get_location as $location) {
                                                        $names[] = $location->name;
                                                    }
                                                    echo sprintf('<p> %s </p>', implode(',', $names));
                                                }
                                                ?>
                                            </div>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 d-flex justify-content-center divider">
                <div class="single-search-box">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27">
                            <path d="M18.0075 17.8392C20.8807 13.3308 20.5195 13.8933 20.6023 13.7757C21.6483 12.3003 22.2012 10.5639 22.2012 8.75391C22.2012 3.95402 18.3062 0 13.5 0C8.7095 0 4.79883 3.94622 4.79883 8.75391C4.79883 10.5627 5.3633 12.3446 6.44361 13.8399L8.99237 17.8393C6.26732 18.2581 1.63477 19.506 1.63477 22.2539C1.63477 23.2556 2.28857 24.6831 5.40327 25.7955C7.57814 26.5722 10.4536 27 13.5 27C19.1966 27 25.3652 25.3931 25.3652 22.2539C25.3652 19.5055 20.7381 18.2589 18.0075 17.8392ZM7.76508 12.9698C7.75639 12.9562 7.7473 12.9428 7.73782 12.9298C6.83886 11.6931 6.38086 10.2274 6.38086 8.75391C6.38086 4.79788 9.56633 1.58203 13.5 1.58203C17.4255 1.58203 20.6191 4.7993 20.6191 8.75391C20.6191 10.2297 20.1698 11.6457 19.3195 12.8498C19.2432 12.9503 19.6408 12.3327 13.5 21.9686L7.76508 12.9698ZM13.5 25.418C7.27766 25.418 3.2168 23.589 3.2168 22.2539C3.2168 21.3566 5.30339 19.8811 9.92714 19.306L12.8329 23.8656C12.9044 23.9777 13.0029 24.0701 13.1195 24.134C13.2361 24.198 13.367 24.2315 13.4999 24.2315C13.6329 24.2315 13.7638 24.198 13.8804 24.134C13.9969 24.0701 14.0955 23.9777 14.167 23.8656L17.0727 19.306C21.6966 19.8811 23.7832 21.3566 23.7832 22.2539C23.7832 23.5776 19.7589 25.418 13.5 25.418Z" />
                            <path d="M13.5 4.79883C11.3192 4.79883 9.54492 6.57308 9.54492 8.75391C9.54492 10.9347 11.3192 12.709 13.5 12.709C15.6808 12.709 17.4551 10.9347 17.4551 8.75391C17.4551 6.57308 15.6808 4.79883 13.5 4.79883ZM13.5 11.127C12.1915 11.127 11.127 10.0624 11.127 8.75391C11.127 7.44541 12.1915 6.38086 13.5 6.38086C14.8085 6.38086 15.873 7.44541 15.873 8.75391C15.873 10.0624 14.8085 11.127 13.5 11.127Z" />
                        </svg>
                    </div>
                    <div class="searchbox-input">
                        <label><?php echo esc_html__('Transport-type', 'triprex-core') ?></label>
                        <div class="custom-select-dropdown">
                            <div class="select-input">
                                <input type="text" name="transport_type" placeholder="<?php echo esc_attr__('Which Type ?', 'triprex-core') ?>">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                            <div class="custom-select-wrap">
                                <div class="custom-select-search-area">
                                    <i class='bx bx-search'></i>
                                    <input type="text" placeholder="Transport Type">
                                </div>
                                <ul class="option-list">
                                    <?php
                                    $transport_type = get_terms([
                                        'taxonomy' => 'transport-type',
                                        'hide_empty' => false,
                                    ]);
                                    ?>
                                    <?php foreach ($transport_type as $type) : ?>
                                        <li>
                                            <div class="destination">
                                                <h6><?php echo $type->name ?? '' ?></h6>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 d-flex justify-content-center divider">
                <div class="single-search-box">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                            <g clip-path="url(#clip0_2037_326)">
                                <path d="M15.5978 13.5309L12.391 11.1258V6.22655C12.391 5.73394 11.9928 5.33575 11.5002 5.33575C11.0076 5.33575 10.6094 5.73394 10.6094 6.22655V11.5713C10.6094 11.8519 10.7412 12.1164 10.9657 12.2839L14.5288 14.9563C14.6826 15.0721 14.8699 15.1346 15.0624 15.1344C15.3341 15.1344 15.6013 15.0124 15.7759 14.7772C16.0717 14.3843 15.9916 13.8258 15.5978 13.5309Z"></path>
                                <path d="M11.5 0C5.15851 0 0 5.15851 0 11.5C0 17.8415 5.15851 23 11.5 23C17.8415 23 23 17.8415 23 11.5C23 5.15851 17.8415 0 11.5 0ZM11.5 21.2184C6.14194 21.2184 1.78156 16.8581 1.78156 11.5C1.78156 6.14194 6.14194 1.78156 11.5 1.78156C16.859 1.78156 21.2184 6.14194 21.2184 11.5C21.2184 16.8581 16.8581 21.2184 11.5 21.2184Z"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="searchbox-input">
                        <label><?php echo esc_html__('Reserve Date', 'triprex-core') ?></label>
                        <div class="custom-select-dropdown">
                            <div class="select-input">
                                <input type="text" name="reserve_date" readonly>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit"><?php echo esc_html__('Search', 'triprex-core') ?></button>
</form>