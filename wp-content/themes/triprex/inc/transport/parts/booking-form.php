<?php
$query_var = get_transient('triprex_transport_query_var');
$reserve_date = null;
if (!empty($query_var['reserve_date'])) {
    $reserve_date = $query_var['reserve_date'];
}
delete_transient( 'triprex_transport_query_var' );

?>
<div class="sidebar-booking-form">
    <div class="transport-type">
        <h6><?php echo esc_html__('Select Your Transport Type:', 'triprex') ?></h6>
        <?php
        $transports = Egns\Helper\Egns_Helper::egns_transport_value('transport_main_pricing_re');

        ?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php if (!empty($transports)) : ?>
                <?php foreach ($transports as $transport_key => $transport) :
                    $transport_icon = $transport['transport_main_preicing_icon']['url'];
                ?>
                    <li class="nav-item triprex-transport-tab-item" role="presentation">
                        <div class="form-check nav-link <?php echo esc_attr($transport_key == 0 ? 'active' : '') ?>" transport-key="<?php echo sprintf('%s', $transport_key) ?>" id="<?php echo \Egns\Helper\Egns_Helper::egns_slugify($transport['transport_main_title_price']) ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo \Egns\Helper\Egns_Helper::egns_slugify($transport['transport_main_title_price']) ?>" type="button" role="tab" aria-controls="<?php echo \Egns\Helper\Egns_Helper::egns_slugify($transport['transport_main_title_price']) ?>" aria-selected="true">
                            <input class="form-check-input" type="radio" name="transportType" id="<?php echo \Egns\Helper\Egns_Helper::egns_slugify('tranport_type' . $transport['transport_main_title_price']) ?>" value="option1" <?php echo esc_attr($transport_key == 0 ? 'checked' : '') ?>>
                            <label class="form-check-label" for="<?php echo \Egns\Helper\Egns_Helper::egns_slugify($transport['transport_main_title_price']) ?>">

                                <?php if (!empty($transport_icon)) : ?>
                                    <?php \Egns\Helper\Egns_Helper::display_svg($transport_icon) ?>
                                <?php endif; ?>

                                <?php if (!empty($transport['transport_main_title_price'])) : ?>
                                    <span class="title"><?php echo sprintf('%s', $transport['transport_main_title_price']) ?></span>
                                <?php endif ?>
                                <!-- <span>4 Person <span class="price">$200</span></span> -->
                            </label>
                        </div>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
        </ul>
    </div>

    <div class="tab-content" id="myTabContent">
        <?php if (!empty($transports)) : ?>
            <?php foreach ($transports as $key => $transport) : ?>
                <div class="tab-pane <?php echo esc_attr($key == 0 ? 'active show' : '') ?>" id="<?php echo \Egns\Helper\Egns_Helper::egns_slugify($transport['transport_main_title_price']) ?>" role="tabpanel" aria-labelledby="<?php echo \Egns\Helper\Egns_Helper::egns_slugify($transport['transport_main_title_price']) ?>-tab">
                    <h6><?php echo esc_html__('Select Your Reserve Date:', 'triprex') ?></h6>
                    <div class="form-inner mb-20">
                        <div class="form-group">
                            <input type="hidden" name="reserve_date_single" value="<?php echo sprintf('%s', $reserve_date) ?>">
                            <input type="text" name="inOut" exclude-reset="true" placeholder="<?php echo \Egns\Helper\Egns_Helper::get_gmt_formatted_date() ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                <path d="M10.3125 7.03125C10.3125 6.90693 10.3619 6.7877 10.4498 6.69979C10.5377 6.61189 10.6569 6.5625 10.7812 6.5625H11.7188C11.8431 6.5625 11.9623 6.61189 12.0502 6.69979C12.1381 6.7877 12.1875 6.90693 12.1875 7.03125V7.96875C12.1875 8.09307 12.1381 8.2123 12.0502 8.30021C11.9623 8.38811 11.8431 8.4375 11.7188 8.4375H10.7812C10.6569 8.4375 10.5377 8.38811 10.4498 8.30021C10.3619 8.2123 10.3125 8.09307 10.3125 7.96875V7.03125Z">
                                </path>
                                <path d="M3.28125 0C3.40557 0 3.5248 0.049386 3.61271 0.137294C3.70061 0.225201 3.75 0.34443 3.75 0.46875V0.9375H11.25V0.46875C11.25 0.34443 11.2994 0.225201 11.3873 0.137294C11.4752 0.049386 11.5944 0 11.7188 0C11.8431 0 11.9623 0.049386 12.0502 0.137294C12.1381 0.225201 12.1875 0.34443 12.1875 0.46875V0.9375H13.125C13.6223 0.9375 14.0992 1.13504 14.4508 1.48667C14.8025 1.83831 15 2.31522 15 2.8125V13.125C15 13.6223 14.8025 14.0992 14.4508 14.4508C14.0992 14.8025 13.6223 15 13.125 15H1.875C1.37772 15 0.900806 14.8025 0.549175 14.4508C0.197544 14.0992 0 13.6223 0 13.125V2.8125C0 2.31522 0.197544 1.83831 0.549175 1.48667C0.900806 1.13504 1.37772 0.9375 1.875 0.9375H2.8125V0.46875C2.8125 0.34443 2.86189 0.225201 2.94979 0.137294C3.0377 0.049386 3.15693 0 3.28125 0V0ZM1.875 1.875C1.62636 1.875 1.3879 1.97377 1.21209 2.14959C1.03627 2.3254 0.9375 2.56386 0.9375 2.8125V13.125C0.9375 13.3736 1.03627 13.6121 1.21209 13.7879C1.3879 13.9637 1.62636 14.0625 1.875 14.0625H13.125C13.3736 14.0625 13.6121 13.9637 13.7879 13.7879C13.9637 13.6121 14.0625 13.3736 14.0625 13.125V2.8125C14.0625 2.56386 13.9637 2.3254 13.7879 2.14959C13.6121 1.97377 13.3736 1.875 13.125 1.875H1.875Z">
                                </path>
                                <path d="M2.34375 3.75C2.34375 3.62568 2.39314 3.50645 2.48104 3.41854C2.56895 3.33064 2.68818 3.28125 2.8125 3.28125H12.1875C12.3118 3.28125 12.431 3.33064 12.519 3.41854C12.6069 3.50645 12.6562 3.62568 12.6562 3.75V4.6875C12.6562 4.81182 12.6069 4.93105 12.519 5.01896C12.431 5.10686 12.3118 5.15625 12.1875 5.15625H2.8125C2.68818 5.15625 2.56895 5.10686 2.48104 5.01896C2.39314 4.93105 2.34375 4.81182 2.34375 4.6875V3.75Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <?php if (!empty($transport['transport_booking_re'])) : ?>
                        <?php foreach ($transport['transport_booking_re'] as $single_trans_package) : ?>
                            <div class="booking-form-item-type" id="for<?php \Egns\Helper\Egns_Helper::egns_slugify($transport['transport_main_title_price']) ?>">
                                <div class="number-input-item adults">
                                    <?php if (!empty($single_trans_package['Transport_pricing_category'])) : ?>
                                        <label for="transportss" class="number-input-lable">
                                            <span>
                                                <?php echo Egns\Helper\Egns_Helper::egns_get_taxonomy_data($single_trans_package['Transport_pricing_category'], true); ?>
                                            </span>
                                            <?php if (isset($single_trans_package['transport_service_t_price_sale_check']) && $single_trans_package['transport_service_t_price_sale_check'] == 1) : ?>
                                                <?php echo \Egns\Helper\Egns_Helper::egns_get_package_price($single_trans_package['transport_price'], $single_trans_package['transport_service__t_price_sale']); ?>
                                            <?php else : ?>
                                                <?php echo \Egns\Helper\Egns_Helper::egns_get_package_price($single_trans_package['transport_price']); ?>
                                            <?php endif ?>
                                        </label>
                                        <div class="quantity-counter">
                                            <a href="#" class="quantity__minus"><i class="bi bi-dash"></i></a>
                                            <input id="transportss" name="quantity" min="<?php echo !empty($single_trans_package['transport_minimum_quantity']) ? $single_trans_package['transport_minimum_quantity'] : 0 ?>" type="text" class="quantity__input" package-key="<?php echo intval($key) ?>" pricing-category-id="<?php echo esc_attr($single_trans_package['Transport_pricing_category']); ?>" type="text" class="quantity__input" value="<?php echo !empty($single_trans_package['transport_minimum_quantity']) ? str_pad($single_trans_package['transport_minimum_quantity'], 2, '0', STR_PAD_LEFT) : '00'; ?>">
                                            <a href="#" class="quantity__plus"><i class="bi bi-plus"></i></a>
                                        </div>
                                    <?php elseif (empty($single_trans_package['Transport_pricing_category']) && is_admin()) : ?>
                                        <h5><?php echo esc_html__('Please select any pricing category', 'triprex') ?></h5>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php if (!empty($transport['transport_extra_service_switcher'])) : ?>
                        <div class="booking-form-item-type">
                            <h5><?php echo sprintf(__('Other Extra Services', 'triprex')) ?></h5>
                            <div class="checkbox-container">
                                <?php if (!empty($transport['transport_extra_service_re'])) : ?>
                                    <?php foreach ($transport['transport_extra_service_re'] as $service_key => $service) : ?>
                                        <label class="check-container">
                                            <?php echo !empty($service['transport_extra_service']) ? sprintf('%s', $service['transport_extra_service']) : '' ?>
                                            <input type="checkbox" class="services_check" service-slug="<?php echo \Egns\Helper\Egns_Helper::egns_slugify($service['transport_extra_service']) ?>" package-key="<?php echo intval($key) ?>" name="services_list[]" value="<?php echo intval($service_key) ?>">
                                            <span class="checkmark"></span>
                                            <?php echo \Egns\Helper\Egns_Helper::egns_get_package_price($service['transport_service_price']) ?>
                                        </label>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="booking-form-item-type booking-package-info"></div>
                    <div class="total-price"><span><?php echo esc_html__('Total Price:', 'triprex') ?></span><?php echo get_woocommerce_currency_symbol() ?><strong class="cart_total_price"></strong></div>
                    <?php do_shortcode('[egns-add-to-cart]') ?>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>