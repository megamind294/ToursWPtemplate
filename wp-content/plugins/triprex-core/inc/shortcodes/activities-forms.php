<?php

use Egns_Core\Egns_Helper;

$all_destination = Egns_Helper::get_posts('activities');

?>
<form method="get" action="<?php echo get_post_type_archive_link('activities'); ?>" id="tour-query-form">
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
                        <label><?php echo esc_html__('Location', 'triprex-core') ?></label>
                        <div class="custom-select-dropdown">
                            <?php
                            $get_country_list = get_terms([
                                'taxonomy' => 'activities-country',
                                'hide_empty' => false,
                            ]);
                            ?>
                            <div class="select-input">
                                <input type="text" name="activities_location" readonly value="<?php echo esc_html__('Select Location', 'triprex-core') ?>">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                            <div class="custom-select-wrap">
                                <div class="custom-select-search-area">
                                    <i class='bx bx-search'></i>
                                    <input type="text" placeholder="<?php echo esc_attr__('Type Your Destination', 'triprex-core') ?>">
                                </div>
                                <ul class="option-list">
                                    <?php
                                    $get_country = get_terms([
                                        'taxonomy' => 'activities-country',
                                        'hide_empty' => false,
                                    ]);
                                    ?>
                                    <?php foreach ($get_country as $country) : ?>
                                        <li>
                                            <div class="destination">
                                                <h6><?php echo $country->name ?? '' ?></h6>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27">
                            <g clip-path="url(#clip0_273_1731)">
                                <path d="M26.4727 15.0783C26.334 15.0783 26.1981 15.1348 26.0998 15.2328C26.0013 15.332 25.9458 15.4659 25.9453 15.6057C25.9453 15.7443 26.0017 15.8804 26.0998 15.9785C26.199 16.077 26.3329 16.1325 26.4727 16.133C26.6115 16.133 26.7474 16.0766 26.8455 15.9785C26.944 15.8794 26.9995 15.7454 27 15.6057C27 15.4665 26.9436 15.3309 26.8455 15.2328C26.7464 15.1343 26.6124 15.0788 26.4727 15.0783Z" />
                                <path d="M22.9027 6.15386H22.4775V2.97002H23.0675C23.3588 2.97002 23.5949 2.73399 23.5949 2.44268V1.60226C23.5949 0.718746 22.8761 3.05176e-05 21.9926 3.05176e-05H16.4811C15.5978 3.05176e-05 14.879 0.718746 14.879 1.60226V2.44268C14.879 2.73399 15.1151 2.97002 15.4064 2.97002H15.9962V6.15386H15.571C15.0486 6.1537 14.531 6.2534 14.046 6.44759V2.63674C14.046 2.41283 13.9045 2.21324 13.6932 2.13904C13.5665 2.09478 13.4277 2.10045 13.305 2.15491C13.3042 2.15533 13.3034 2.15533 13.3024 2.15575L7.45469 4.78688C7.18912 4.90637 7.07068 5.21867 7.19018 5.48418C7.30962 5.7497 7.62191 5.86835 7.88743 5.7487L10.7903 4.44268L5.2822 9.53855L1.96553 8.41341L3.98451 7.50496C4.25003 7.38552 4.36842 7.07323 4.24898 6.80771C4.12953 6.54219 3.81724 6.42354 3.55167 6.54319L0.31099 8.00124C0.214435 8.0447 0.133195 8.11622 0.077836 8.20648C0.0224775 8.29674 -0.00443615 8.40157 0.000596289 8.50733C0.00562422 8.6131 0.0423852 8.7149 0.106091 8.79948C0.169797 8.88406 0.257496 8.94749 0.357766 8.98152L5.01505 10.5617L6.58452 14.3201C6.63148 14.4325 6.71594 14.5253 6.82353 14.5825C6.93113 14.6397 7.05523 14.6579 7.17473 14.634C7.30092 14.6086 7.41346 14.5379 7.49113 14.4352C7.49234 14.4336 7.49377 14.4321 7.49524 14.4303L9.2851 12.0086L11.474 12.7522V20.7903C11.474 22.9282 13.1203 24.6877 15.2115 24.8706V25.5749C15.2115 26.3606 15.8509 27 16.6366 27C17.4225 27 18.0617 26.3606 18.0617 25.5749V24.8873H20.412V25.5749C20.412 26.3606 21.0512 27 21.8371 27C22.6228 27 23.2622 26.3606 23.2622 25.5749V24.8706C25.3534 24.6877 26.9997 22.9281 26.9997 20.7903V17.7196C26.9997 17.4283 26.7636 17.1922 26.4724 17.1922C26.1811 17.1922 25.945 17.4283 25.945 17.7196V20.7903C25.945 22.4679 24.5803 23.8326 22.9027 23.8326H15.571C13.8934 23.8326 12.5287 22.4677 12.5287 20.7904V13.1104L13.3492 13.3894C13.4285 13.4163 13.5132 13.4239 13.5961 13.4116C13.679 13.3993 13.7577 13.3675 13.8259 13.3187C13.894 13.2699 13.9495 13.2055 13.9878 13.1309C14.026 13.0564 14.046 12.9738 14.046 12.89V7.61802C14.5093 7.3494 15.0354 7.20811 15.571 7.20849H22.9028C24.5804 7.20849 25.9451 8.57325 25.9451 10.2508V13.5854C25.9451 13.8767 26.1812 14.1128 26.4724 14.1128C26.7637 14.1128 26.9998 13.8767 26.9998 13.5854V10.2508C26.9998 7.9917 25.1619 6.1538 22.9028 6.1538L22.9027 6.15386ZM22.2075 24.8873V25.5747C22.2074 25.6729 22.1684 25.7671 22.0989 25.8365C22.0295 25.906 21.9353 25.945 21.8371 25.9451C21.7389 25.945 21.6448 25.9059 21.5753 25.8365C21.5059 25.7671 21.4668 25.6729 21.4667 25.5747V24.8873H22.2075ZM17.007 24.8873V25.5747C17.007 25.7791 16.8409 25.9451 16.6366 25.9451C16.4322 25.9451 16.2662 25.7791 16.2662 25.5747V24.8873H17.007ZM6.54376 10.6993V11.4856L6.03867 10.2755L8.71472 7.79969L6.6593 10.3701C6.58449 10.4635 6.54374 10.5796 6.54376 10.6993ZM7.59844 12.5161V11.4355L8.23679 11.6524L7.59844 12.5161ZM12.9913 12.1538L9.26469 10.8878C9.26348 10.8871 9.26226 10.8869 9.26121 10.8865L7.95234 10.4418L12.9913 4.14046V12.1538ZM15.9335 1.6022C15.9335 1.30019 16.1793 1.05466 16.4811 1.05466H21.9926C22.2946 1.05466 22.5402 1.30019 22.5402 1.6022V1.91529H15.9335V1.6022ZM17.0509 2.97002H21.4228V6.15386H17.0509V2.97002Z" />
                                <path d="M13.8583 15.6875V19.7184C13.8583 21.1721 15.0411 22.3551 16.495 22.3551H21.9794C23.4332 22.3551 24.6161 21.1721 24.6161 19.7184V15.6875C24.6161 14.8151 23.9064 14.1054 23.034 14.1054H15.4403C14.5679 14.1054 13.8583 14.8151 13.8583 15.6875ZM21.9794 21.3004H16.495C15.6226 21.3004 14.9129 20.5906 14.9129 19.7184V17.7363H20.7246V18.2303C20.7246 18.5214 20.9607 18.7576 21.252 18.7576C21.5432 18.7576 21.7793 18.5214 21.7793 18.2303V17.7363H23.5614V19.7184C23.5614 20.5906 22.8517 21.3004 21.9794 21.3004ZM23.5614 15.6875V16.6816H14.9129V15.6875C14.9129 15.3966 15.1496 15.1601 15.4403 15.1601H23.034C23.3249 15.1601 23.5614 15.3966 23.5614 15.6875ZM5.93329 6.57761C6.07214 6.57761 6.20803 6.52118 6.30612 6.42309C6.4046 6.32394 6.4601 6.19001 6.46063 6.05026C6.46063 5.91104 6.4042 5.77488 6.30612 5.6768C6.20694 5.57842 6.07297 5.52313 5.93329 5.52292C5.79361 5.52321 5.65967 5.57849 5.56045 5.6768C5.46182 5.77611 5.4063 5.91029 5.40594 6.05026C5.40594 6.18895 5.46237 6.32485 5.56045 6.42309C5.65961 6.52157 5.79354 6.57708 5.93329 6.57761ZM5.82882 15.0018C5.22591 15.6047 4.42434 15.9367 3.57179 15.9367C3.42323 15.9367 3.27637 15.9267 3.13156 15.9069C3.07719 15.1414 2.75873 14.3916 2.17654 13.8068C2.09807 13.7246 1.72028 13.3585 1.19463 13.3706C0.953157 13.3756 0.596409 13.4629 0.268612 13.8521C-0.232365 14.4468 0.0731782 15.2516 0.568776 15.7474C0.988594 16.1672 1.48071 16.4884 2.01713 16.6991C1.91796 17.0938 1.71339 17.4541 1.42529 17.7415C1.1408 18.0264 0.785255 18.2299 0.395543 18.331C0.113731 18.4039 -0.0560211 18.6915 0.0169106 18.9735C0.0782934 19.2112 0.292553 19.369 0.527168 19.369C0.571778 19.369 0.616212 19.3634 0.659426 19.3524C1.23145 19.2039 1.7534 18.9053 2.17122 18.4873C2.60875 18.0497 2.89816 17.5191 3.03922 16.9587C3.21588 16.9806 3.39372 16.9915 3.57174 16.9914C4.70595 16.9914 5.7726 16.5498 6.57475 15.7476C6.78052 15.5417 6.78052 15.2077 6.57475 15.0018C6.36877 14.7959 6.0348 14.7959 5.82882 15.0018ZM1.3147 15.0019C1.18819 14.875 1.02219 14.5949 1.07555 14.5315C1.12971 14.467 1.18308 14.4264 1.21477 14.4252H1.21725C1.27162 14.4252 1.36454 14.4859 1.41089 14.5323C1.41727 14.5395 1.41669 14.5384 1.42529 14.5471C1.69724 14.8183 1.89506 15.1548 1.99983 15.5244C1.749 15.3818 1.51855 15.2061 1.3147 15.0019ZM21.1993 10.9161C21.1993 9.83417 20.3191 8.95398 19.2372 8.95398C18.1553 8.95398 17.2751 9.83417 17.2751 10.9161C17.2751 11.998 18.1553 12.8782 19.2372 12.8782C20.3191 12.8782 21.1993 11.998 21.1993 10.9161ZM18.3298 10.9161C18.3298 10.4157 18.7368 10.0087 19.2372 10.0087C19.7375 10.0087 20.1446 10.4157 20.1446 10.9161C20.1446 11.4164 19.7375 11.8235 19.2372 11.8235C18.7368 11.8235 18.3298 11.4164 18.3298 10.9161Z" />
                            </g>
                        </svg>
                    </div>
                    <div class="searchbox-input">
                        <label><?php echo esc_html__('Activities Type', 'triprex-core') ?></label>
                        <div class="custom-select-dropdown">
                            <div class="select-input">
                                <input type="text" readonly name="activities_type" value="<?php echo esc_html__('Select Activity Type', 'triprex-core') ?>">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                            <div class="custom-select-wrap two">
                                <ul class="option-list">
                                    <?php
                                    $activities_type = get_terms([
                                        'taxonomy' => 'activities-type',
                                        'hide_empty' => false,
                                    ]);
                                    ?>
                                    <?php foreach ($activities_type as $activities) : ?>
                                        <li class="single-item">
                                            <h6><?php echo $activities->name ?? '' ?></h6>
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
                        <label><?php echo esc_html__('Activite Day', 'triprex-core') ?></label>
                        <div class="custom-select-dropdown">
                            <div class="select-input">
                                <input type="text" name="inOut" readonly>
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