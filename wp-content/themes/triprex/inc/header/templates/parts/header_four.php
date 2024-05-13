<?php

use Egns\Inc\Header_Helper;
use Egns\Helper\Egns_Helper;

// Call the sidebar function
Header_Helper::my_custom_sidebar_function();
?>

<!-- Start header section -->
<header class="header-area style-3 two">
    <div class="header-logo d-lg-none d-flex">
        <?php
        if (!empty(Egns\Helper\Egns_Helper::egns_page_option_value('page_header_four_logo', 'url'))) {
            Egns\Helper\Egns_Helper::get_theme_logo(Egns\Helper\Egns_Helper::egns_page_option_value('page_header_four_logo', 'url'));
        } else {
            if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_logo', 'url'))) {
                Egns\Helper\Egns_Helper::get_theme_logo(Egns\Helper\Egns_Helper::egns_get_theme_option('header_logo', 'url'));
            } else {
                Egns\Helper\Egns_Helper::get_theme_logo(NULL);
            }
        }
        ?>
    </div>
    <div class="company-logo d-lg-flex d-none">
        <?php
        if (!empty(Egns\Helper\Egns_Helper::egns_page_option_value('page_header_four_logo', 'url'))) {
            Egns\Helper\Egns_Helper::get_theme_logo(Egns\Helper\Egns_Helper::egns_page_option_value('page_header_four_logo', 'url'));
        } else {
            if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_logo', 'url'))) {
                Egns\Helper\Egns_Helper::get_theme_logo(Egns\Helper\Egns_Helper::egns_get_theme_option('header_logo', 'url'));
            } else {
                Egns\Helper\Egns_Helper::get_theme_logo(NULL);
            }
        }
        ?>
    </div>
    <div class="main-menu">
        <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
            <div class="mobile-logo-wrap">
                <?php
                if (!empty(Egns\Helper\Egns_Helper::egns_page_option_value('page_header_four_logo_mobile', 'url'))) {
                    Egns\Helper\Egns_Helper::get_theme_logo(Egns\Helper\Egns_Helper::egns_page_option_value('page_header_four_logo_mobile', 'url'));
                } else {
                    if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_logo_mobile', 'url'))) {
                        Egns\Helper\Egns_Helper::get_theme_logo(Egns\Helper\Egns_Helper::egns_get_theme_option('header_logo_mobile', 'url'));
                    } else {
                        Egns\Helper\Egns_Helper::get_theme_logo(NULL);
                    }
                }
                ?>
            </div>
            <div class="menu-close-btn">
                <i class="bi bi-x"></i>
            </div>
        </div>
        <!-- Main Menu -->
        <?php Egns\Helper\Egns_Helper::egns_get_theme_menu('primary-menu', '', '<i class="bi bi-plus dropdown-icon"></i>', 'menu-list', 3); ?>
        <?php if (class_exists('CSF') && class_exists('woocommerce') && Egns\Helper\Egns_Helper::egns_get_theme_option('header_signin_show') == 1) : ?>
            <div class="topbar-right d-lg-none d-block">
                <?php Egns\Helper\Egns_Helper::mobile_login_register() ?>
            </div>
        <?php endif ?>
        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('header_contact_info_show') == 1)) :  ?>
            <?php foreach ((array) Egns\Helper\Egns_Helper::egns_get_theme_option('header_contact_info') as $item) : ?>
                <?php
                $contactType = isset($item['contact_type']) ? $item['contact_type'] : 'default_value';
                // Check if any of the contact information fields is not empty
                $isNotEmpty = (
                    ($contactType === 'phone' && !empty($item['phone_info'])) ||
                    ($contactType === 'email' && !empty($item['email_info'])) ||
                    ($contactType === 'others' && !empty($item['custom_info']))
                );
                if ($isNotEmpty) :
                ?>
                    <?php if ($contactType === 'phone') : ?>
                        <div class="hotline-area d-lg-none d-flex">
                            <?php if ($contactType === 'phone' && !empty($item['phone_icon_svg']['url'])) :
                                $phone_icon = $item['phone_icon_svg']['url'];
                            ?>
                                <div class="icon">
                                    <?php Egns_Helper::display_svg($phone_icon) ?>
                                </div>
                            <?php endif ?>
                            <div class="content">
                                <span><?php echo esc_html($item['phone_info_text']); ?></span>
                                <h6><a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $item['phone_info']); ?>"><?php echo esc_html($item['phone_info']); ?></a></h6>
                            </div>
                        </div>
                    <?php elseif ($contactType === 'email') : ?>
                        <div class="hotline-area d-lg-none d-flex">
                            <?php if ($contactType === 'email' && !empty($item['email_icon_svg']['url'])) :
                                $email_ico = $item['email_icon_svg']['url'];
                            ?>
                                <div class="icon">
                                    <?php Egns_Helper::display_svg($email_ico) ?>
                                </div>
                            <?php endif ?>
                            <div class="content">
                                <span><?php echo esc_html($item['email_info_text']); ?></span>
                                <h6><a href="mailto:<?php echo esc_html($item['email_info']); ?>"><?php echo esc_html($item['email_info']); ?></a></h6>
                            </div>
                        </div>
                    <?php elseif ($contactType === 'others') : ?>
                        <div class="hotline-area d-lg-none d-flex">
                            <?php if ($contactType === 'others' && !empty($item['custom_icon_svg']['url'])) :
                                $custom_ico = $item['custom_icon_svg']['url'];
                            ?>
                                <div class="icon">
                                    <?php Egns_Helper::display_svg($custom_ico) ?>
                                </div>
                            <?php endif ?>
                            <div class="content">
                                <span><?php echo esc_html($item['custom_info_text']); ?></span>
                                <p><?php echo esc_html($item['custom_info']); ?></p>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            <?php endforeach; ?>
        <?php endif ?>
    </div>
    <div class="nav-right d-flex jsutify-content-end align-items-center">
        <ul class="icon-list">
            <?php if (class_exists('CSF') && class_exists('woocommerce') && Egns\Helper\Egns_Helper::egns_get_theme_option('header_signin_show') == 1) : ?>
                <li class="d-lg-flex d-none">
                    <?php Egns\Helper\Egns_Helper::login_register() ?>
                </li>
            <?php endif ?>
            <?php if (class_exists('CSF') && Egns\Helper\Egns_Helper::egns_get_theme_option('header_sidebar_icon_show') == 1) : ?>
                <li class="right-sidebar-button">
                    <svg class="sidebar-toggle-button" width="25" height="25" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.29608 0.0658336C0.609639 0.31147 0.139209 0.899069 0.0432028 1.63598C-0.0144009 2.09353 -0.0144009 5.4939 0.0432028 5.95146C0.129608 6.59686 0.489632 7.11703 1.07047 7.42046L1.36329 7.57458H3.83545H6.30761L6.59563 7.42046C6.96525 7.2278 7.25807 6.93401 7.45008 6.56314L7.60369 6.27416V3.79372V1.31328L7.45008 1.02429C7.25807 0.653433 6.96525 0.359633 6.59563 0.166978L6.30761 0.0128531L3.90745 0.00322056C1.83372 -0.00641251 1.4785 0.00322056 1.29608 0.0658336ZM6.2356 0.802741C6.52842 0.956866 6.65803 1.08209 6.79244 1.34699L6.90765 1.57336V3.80817V6.03816L6.74924 6.29824C6.53322 6.66429 6.2068 6.85694 5.74117 6.90029C5.54916 6.91956 4.55549 6.92437 3.52343 6.91474L1.65131 6.90029L1.41129 6.77025C1.12807 6.62094 1.00807 6.49571 0.854455 6.20191L0.739248 5.98518V3.79372V1.60226L0.854455 1.38552C1.05607 0.995397 1.33929 0.778659 1.74731 0.706413C1.85292 0.687148 2.85618 0.677515 3.97946 0.677515L6.01959 0.687148L6.2356 0.802741Z"></path>
                        <path d="M11.6647 0.0658336C10.9783 0.31147 10.5079 0.899069 10.4119 1.63598C10.3879 1.82863 10.3687 2.80154 10.3687 3.79372C10.3687 4.7859 10.3879 5.75881 10.4119 5.95146C10.4983 6.59686 10.8583 7.11703 11.4391 7.42046L11.7319 7.57458H14.2041H16.6763L16.9643 7.42046C17.3339 7.2278 17.6267 6.93401 17.8187 6.56314L17.9723 6.27416V3.79372V1.31328L17.8187 1.02429C17.6267 0.653433 17.3339 0.359633 16.9643 0.166978L16.6763 0.0128531L14.2761 0.00322056C12.2024 -0.00641251 11.8471 0.00322056 11.6647 0.0658336ZM16.6043 0.802741C16.9019 0.956866 17.0267 1.08209 17.1611 1.35181L17.2811 1.583L17.2763 3.79854C17.2763 5.73472 17.2667 6.03816 17.1995 6.1682C17.0555 6.45237 16.9067 6.61131 16.6475 6.7558L16.3882 6.90029H14.2041H12.02L11.7799 6.77025C11.4967 6.62094 11.3767 6.49571 11.2231 6.20191L11.1079 5.98518V3.79372V1.60226L11.2231 1.38552C11.4247 0.995397 11.7079 0.778659 12.116 0.706413C12.2216 0.687148 13.2248 0.677515 14.3481 0.677515L16.3882 0.687148L16.6043 0.802741Z"></path>
                        <path d="M1.29608 10.4693C0.609639 10.7149 0.139209 11.3025 0.0432028 12.0394C-0.0144009 12.497 -0.0144009 15.8973 0.0432028 16.3549C0.129608 17.0003 0.489632 17.5205 1.07047 17.8239L1.36329 17.978H3.83545H6.30761L6.59563 17.8239C6.96525 17.6312 7.25807 17.3374 7.45008 16.9666L7.60369 16.6776V14.1972V11.7167L7.45008 11.4277C7.25807 11.0569 6.96525 10.7631 6.59563 10.5704L6.30761 10.4163L3.90745 10.4067C1.83372 10.397 1.4785 10.4067 1.29608 10.4693ZM6.2356 11.2062C6.52842 11.3603 6.65803 11.4855 6.79244 11.7504L6.90765 11.9768V14.2116V16.4416L6.74924 16.7017C6.53322 17.0677 6.2068 17.2604 5.74117 17.3037C5.54916 17.323 4.55549 17.3278 3.52343 17.3182L1.65131 17.3037L1.41129 17.1737C1.12807 17.0244 1.00807 16.8992 0.854455 16.6054L0.739248 16.3886V14.1972V12.0057L0.854455 11.789C1.05607 11.3988 1.33929 11.1821 1.74731 11.1099C1.85292 11.0906 2.85618 11.081 3.97946 11.081L6.01959 11.0906L6.2356 11.2062Z"></path>
                        <path d="M13.2441 10.4934C11.8856 10.8498 10.8583 11.8853 10.5079 13.2531C10.3735 13.7781 10.3735 14.6162 10.5079 15.1412C10.8343 16.4127 11.732 17.3808 12.9945 17.8239C13.3593 17.9491 13.4937 17.9732 14.0601 17.9925C14.617 18.0117 14.7754 17.9973 15.1162 17.9106C16.5179 17.5542 17.5452 16.5283 17.9052 15.1219C18.0348 14.6162 18.03 13.7685 17.9004 13.2531C17.55 11.8757 16.5179 10.8401 15.145 10.4885C14.6314 10.3585 13.7529 10.3585 13.2441 10.4934ZM15.2314 11.2784C15.7066 11.4518 16.0475 11.6782 16.4363 12.0828C17.0075 12.6848 17.2763 13.3639 17.2763 14.2068C17.2763 15.0882 17.0075 15.7288 16.3691 16.3645C15.721 17.0099 15.0826 17.2796 14.2186 17.2845C13.7001 17.2845 13.3113 17.193 12.8121 16.957C12.5336 16.8221 12.3608 16.692 12.0392 16.3694C11.396 15.724 11.132 15.0882 11.132 14.1972C11.132 13.3495 11.396 12.6896 11.972 12.0828C12.3608 11.6782 12.7017 11.4518 13.1817 11.2736C13.7913 11.0521 14.6218 11.0521 15.2314 11.2784Z"></path>
                    </svg>
                </li>
            <?php endif ?>
        </ul>
        <?php if (class_exists('CSF') && (Egns\Helper\Egns_Helper::egns_get_theme_option('header_contact_info_show') == 1)) :  ?>
            <?php foreach ((array) Egns\Helper\Egns_Helper::egns_get_theme_option('header_contact_info') as $item) : ?>
                <?php
                $contactType = isset($item['contact_type']) ? $item['contact_type'] : 'default_value';
                // Check if any of the contact information fields is not empty
                $isNotEmpty = (
                    ($contactType === 'phone' && !empty($item['phone_info'])) ||
                    ($contactType === 'email' && !empty($item['email_info'])) ||
                    ($contactType === 'others' && !empty($item['custom_info']))
                );
                if ($isNotEmpty) :
                ?>
                    <?php if ($contactType === 'phone') : ?>
                        <div class="hotline-area d-xl-flex d-none">
                            <?php if ($contactType === 'phone' && !empty($item['phone_icon_svg']['url'])) :
                                $phone_icon = $item['phone_icon_svg']['url'];
                            ?>
                                <div class="icon">
                                    <?php Egns_Helper::display_svg($phone_icon) ?>
                                </div>
                            <?php endif ?>
                            <div class="content">
                                <?php if ($contactType === 'phone' && !empty($item['phone_info_text'])) : ?>
                                    <span><?php echo esc_html($item['phone_info_text']); ?></span>
                                <?php endif ?>
                                <h6><a href="tel:<?php echo str_replace([' ', '-', '+'], ['', '', ''], $item['phone_info']); ?>"><?php echo esc_html($item['phone_info']); ?></a></h6>
                            </div>
                        </div>
                    <?php elseif ($contactType === 'email') : ?>
                        <div class="hotline-area d-xl-flex d-none">
                            <?php if ($contactType === 'email' && !empty($item['email_icon_svg']['url'])) :
                                $email_ico = $item['email_icon_svg']['url'];
                            ?>
                                <div class="icon">
                                    <?php Egns_Helper::display_svg($email_ico) ?>
                                </div>
                            <?php endif ?>
                            <div class="content">
                                <?php if ($contactType === 'email' && !empty($item['email_info_text'])) : ?>
                                    <span><?php echo esc_html($item['email_info_text']); ?></span>
                                <?php endif ?>
                                <h6><a href="mailto:<?php echo esc_html($item['email_info']); ?>"><?php echo esc_html($item['email_info']); ?></a></h6>
                            </div>
                        </div>
                    <?php elseif ($contactType === 'others') : ?>
                        <div class="hotline-area d-xl-flex d-none">
                            <?php if ($contactType === 'others' && !empty($item['custom_icon_svg']['url'])) :
                                $custom_ico = $item['custom_icon_svg']['url'];
                            ?>
                                <div class="icon">
                                    <?php Egns_Helper::display_svg($custom_ico) ?>
                                </div>
                            <?php endif ?>
                            <div class="content">
                                <?php if ($contactType === 'others' && !empty($item['custom_info_text'])) : ?>
                                    <span><?php echo esc_html($item['custom_info_text']); ?></span>
                                <?php endif ?>
                                <p><?php echo esc_html($item['custom_info']); ?></p>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            <?php endforeach; ?>
        <?php endif ?>
        <div class="sidebar-button mobile-menu-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
                <path d="M0 4.46439C0 4.70119 0.0940685 4.92829 0.261511 5.09574C0.428955 5.26318 0.656057 5.35725 0.892857 5.35725H24.1071C24.3439 5.35725 24.571 5.26318 24.7385 5.09574C24.9059 4.92829 25 4.70119 25 4.46439C25 4.22759 24.9059 4.00049 24.7385 3.83305C24.571 3.6656 24.3439 3.57153 24.1071 3.57153H0.892857C0.656057 3.57153 0.428955 3.6656 0.261511 3.83305C0.0940685 4.00049 0 4.22759 0 4.46439ZM4.46429 11.6072H24.1071C24.3439 11.6072 24.571 11.7013 24.7385 11.8688C24.9059 12.0362 25 12.2633 25 12.5001C25 12.7369 24.9059 12.964 24.7385 13.1315C24.571 13.2989 24.3439 13.393 24.1071 13.393H4.46429C4.22749 13.393 4.00038 13.2989 3.83294 13.1315C3.6655 12.964 3.57143 12.7369 3.57143 12.5001C3.57143 12.2633 3.6655 12.0362 3.83294 11.8688C4.00038 11.7013 4.22749 11.6072 4.46429 11.6072ZM12.5 19.643H24.1071C24.3439 19.643 24.571 19.737 24.7385 19.9045C24.9059 20.0719 25 20.299 25 20.5358C25 20.7726 24.9059 20.9997 24.7385 21.1672C24.571 21.3346 24.3439 21.4287 24.1071 21.4287H12.5C12.2632 21.4287 12.0361 21.3346 11.8687 21.1672C11.7012 20.9997 11.6071 20.7726 11.6071 20.5358C11.6071 20.299 11.7012 20.0719 11.8687 19.9045C12.0361 19.737 12.2632 19.643 12.5 19.643Z" />
            </svg>
        </div>
    </div>
</header>
<!-- End header section -->