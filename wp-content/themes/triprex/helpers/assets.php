<?php

namespace Egns\Helper;

use Egns\Helper\Egns_Helper as HelperEgns_Helper;
use Egns_Core\Egns_Helper;

if (!class_exists('Egns_Assets')) {

    /**
     * Assets handlers class
     */
    class Egns_Assets
    {

        /**
         * Class constructor
         */
        function __construct()
        {

            // Theme setup and enqueue files
            add_action('wp_enqueue_scripts', array($this, 'egns_enqueue_assets'));

            // Theme setup and admin enqueue files
            add_action('admin_enqueue_scripts', array($this, 'egns_enqueue_admin_assets'));

            add_action('triprex_after_load_scripts', array($this, 'triprex_load_localize_scripts'));

            add_filter('egns_filter_scripts', [$this, 'egns_enqueue_additional_scripts']);
        }

        public function egns_enqueue_additional_scripts($scripts)
        {
            if (\Egns\Helper\Egns_Helper::is_post_type_single(get_the_ID())) {
                $scripts['ajax-handler'] = [
                    'src'     => EGNS_ASSETS_ROOT . '/js/ajax-handler.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/ajax-handler.js'),
                    'deps'    => ['jquery']
                ];
            }
            return $scripts;
        }

        public function egns_calculate_package_price(&$pricing, $post_id, $data = array(),  $post_type = 'tours', $package_id = null)
        {
            if (!empty($data)) {
                foreach ($data as $package) {
                    $minimum_quantity = 0;
                    if ($post_type == 'tours') {
                        $package_info          = \Egns\Helper\Egns_Helper::egns_get_price_by_category_id(get_the_ID(), $package['tour_pricing_category']);
                        $pricing_category_info = \Egns\Helper\Egns_Helper::egns_get_taxonomy_data($package['tour_pricing_category']);
                        $minimum_quantity      = !empty($package['tour_minimum_quantity']) ? $package['tour_minimum_quantity'] : 0;
                    } elseif ($post_type == 'transport') {
                        $package_info          = \Egns\Helper\Egns_Helper::egns_get_transport_price_by_category_id($post_id, $package_id,  $package['Transport_pricing_category']);
                        $pricing_category_info = \Egns\Helper\Egns_Helper::egns_get_taxonomy_data($package['tour_pricing_category']);
                        $minimum_quantity      = !empty($package['transport_minimum_quantity']) ? $package['transport_minimum_quantity'] : 0;
                    } elseif ($post_type == 'activities') {
                        $package_info          = \Egns\Helper\Egns_Helper::egns_get_activities_price_by_category_id($post_id, $package_id,  $package['activities_pricing_category']);
                        $pricing_category_info = \Egns\Helper\Egns_Helper::egns_get_taxonomy_data($package['activities_pricing_category']);
                        $minimum_quantity      = !empty($package['activities_minimum_quantity']) ? $package['activities_minimum_quantity'] : 0;
                    }
                    if (empty($pricing_category_info) && empty($package_info)) {
                        return;
                    }
                }
            }
            if (get_post_type($post_id) == 'hotel') {
                $package_info                    = HelperEgns_Helper::egns_get_hotel_price_by_id($post_id);
                $pricing_category_info           = "Room";
                $minimum_quantity                = 1;
                $today                           = date("d M");
                $formattedDate                   = $today . ' - ' . $today;
                $pricing[$pricing_category_info] = [
                    'price'      => $package_info,
                    'quantity'   => $minimum_quantity,
                    'label'      => $pricing_category_info,
                    'dependency' => [
                        'date'    => [
                            'label'          => $formattedDate,
                            'quantity'       => 1,
                            'quantity_label' => 'Days',
                            'visibility'     => true,
                        ]
                    ]
                ];
            }
            return $pricing;
        }

        public function cart_info()
        {
            $pricing   = array();
            $cart_info = array();
            $labels    = array(
                'services'    => [
                    'title'      => __('Extra Service', 'triprex'),
                    'visibility' => true,
                ],
            );
            if (get_post_type(get_the_ID()) == 'tours') {
                // Prepare package pricing 
                $get_pricing_categories = \Egns\Helper\Egns_Helper::egns_tours_value('tours_booking_re');
                if (!empty($get_pricing_categories)) {
                    foreach ($get_pricing_categories as $package) {
                        $pricing_category_info = \Egns\Helper\Egns_Helper::egns_get_taxonomy_data($package['tour_pricing_category']);
                        $package_info          = \Egns\Helper\Egns_Helper::egns_get_price_by_category_id(get_the_ID(), $package['tour_pricing_category']);
                        if (empty($pricing_category_info) && empty($package_info)) {
                            return;
                        }
                        if (intval($package['tour_minimum_quantity']) > 0) {
                            $pricing[$pricing_category_info->slug] = [
                                'price'    => $package_info,
                                'quantity' => $package['tour_minimum_quantity'],
                                'label'    => $pricing_category_info->name,
                            ];
                        }
                    }
                    $pricing = self::egns_calculate_package_price($pricing, get_the_ID(), $get_pricing_categories, 'tours');
                }
                // Prepare booking date 
                $tours_booking_date = \Egns\Helper\Egns_Helper::egns_tours_value('tours_booking_date');
                $booking_data       = self::egns_reformat_booking_date($tours_booking_date);
                $cart_info          = array(
                    'labels'   => $labels,
                    'pricing'  => $pricing,
                    'services' => array(),
                    'meta'     => $booking_data,
                );
            } elseif (get_post_type(get_the_ID()) == 'transport') {
                $transports_pricing = \Egns\Helper\Egns_Helper::egns_transport_value('transport_main_pricing_re');
                $pricing            = \Egns\Helper\Egns_Helper::egns_transport_cart_info($pricing, $transports_pricing, 0);
                $booking_data       = [
                    'booking_date'  => [
                        'label' => esc_html__('Booking Date : ', 'triprex'),
                        'value' => date('F j, Y'),
                    ]
                ];
                $cart_info          = array(
                    'labels'   => $labels,
                    'pricing'  => $pricing,
                    'services' => array(),
                    'meta'     => $booking_data,
                );
            } elseif (get_post_type(get_the_ID()) == 'activities') {
                $transports_pricing = \Egns\Helper\Egns_Helper::egns_activities_value('activities_booking_re');
                $pricing            = \Egns\Helper\Egns_Helper::egns_activities_cart_info($pricing, $transports_pricing, 0, get_the_ID());
                $booking_data       = [
                    'booking_date'  => [
                        'label' => esc_html__('Booking Date : ', 'triprex'),
                        'value' => date('F j, Y'),
                    ]
                ];
                $cart_info          = array(
                    'labels'   => $labels,
                    'pricing'  => $pricing,
                    'services' => array(),
                    'meta'     => $booking_data,
                );
            } elseif (get_post_type(get_the_ID()) == 'hotel') {
                $pricing      = self::egns_calculate_package_price($pricing, get_the_ID(), [], 'hotels');
                $booking_data = [
                    'booking_date'  => [
                        'label' => esc_html__('Booking Date : ', 'triprex'),
                        'value' => date('F j, Y'),
                    ]
                ];
                $cart_info          = array(
                    'labels'   => $labels,
                    'pricing'  => $pricing,
                    'services' => array(),
                    'meta'     => $booking_data,
                );
            }
            return $cart_info;
        }

        public function triprex_load_localize_scripts()
        {
            $cart_info = $this->cart_info();

            global $wp_query;

            wp_localize_script('ajax-handler', 'triprex_ajax_handler', array(
                'ajax_url'  => admin_url('admin-ajax.php'),
                'nonce'     => wp_create_nonce('triprex-nonce'),
                'post_id'   => get_the_ID(),
                'cart_info' => $cart_info,
                'post_type' => get_post_type(get_the_ID()),
                'cart_url'  => class_exists('woocommerce') ? wc_get_cart_url() : '',
                'currency'  => class_exists('woocommerce') ? get_woocommerce_currency_symbol() : '$',
            ));

            wp_localize_script('custom', 'custom_scripts', array(
                'post_type'    => get_post_type(get_the_ID()),
                'ajax_url'     => admin_url('admin-ajax.php'),                           // WordPress AJAX
                'posts'        => json_encode($wp_query->query_vars),                    // everything about your loop is here
                'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
                'max_page'     => $wp_query->max_num_pages,
            ));
        }

        function egns_reformat_booking_date($data)
        {
            $formated_booking_date = [];
            if (!empty($data)) {
                foreach ($data as $key =>  $item) {
                    if (isset($item['tours_booking_date'])) {
                        $fromDate                              = \DateTime::createFromFormat('m/d/Y', $item['tours_booking_date']['from']);
                        $toDate                                = \DateTime::createFromFormat('m/d/Y', $item['tours_booking_date']['to']);
                        $formated_booking_date['booking_date'] = [
                            'label' => 'Booking Date : ',
                            'value' => $fromDate->format('d M') . ' - ' . $toDate->format('d M'),
                        ];
                    }
                    if ($key >= 0) {
                        break;
                    }
                }
            }
            return $formated_booking_date;
        }

        /**
         * Return all available scripts
         *
         * @version 1.1.0
         * @return array
         */
        function egns_get_scripts()
        {
            return [
                'jQuery-ui-range' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery-range.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery-range.js'),
                    'deps'    => ['jquery']
                ],
                'moment' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/moment.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/moment.min.js'),
                    'deps'    => ['jquery']
                ],
                'daterangepicker' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/daterangepicker.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/daterangepicker.min.js'),
                    'deps'    => ['jquery']
                ],
                'popper' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/popper.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/popper.min.js'),
                    'deps'    => ['jquery']
                ],
                'bootstrap-popper' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/bootstrap.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/bootstrap.min.js'),
                    'deps'    => ['jquery']
                ],
                'swiper-bundle' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/swiper-bundle.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/swiper-bundle.min.js'),
                    'deps'    => ['jquery']
                ],
                'slick' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/slick.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/slick.js'),
                    'deps'    => ['jquery']
                ],
                'waypoints' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/waypoints.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/waypoints.min.js'),
                    'deps'    => ['jquery']
                ],
                'counterup' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.counterup.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.counterup.min.js'),
                    'deps'    => ['jquery']
                ],
                'isotope-pkgd' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/isotope.pkgd.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/isotope.pkgd.min.js'),
                    'deps'    => ['jquery']
                ],
                'magnific-popup' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.magnific-popup.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.magnific-popup.min.js'),
                    'deps'    => ['jquery']
                ],
                'marquee' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.marquee.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.marquee.min.js'),
                    'deps'    => ['jquery']
                ],
                'egns-nice-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.nice-select.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.nice-select.min.js'),
                    'deps'    => ['jquery']
                ],
                'egns-select2' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/select2.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/select2.min.js'),
                    'deps'    => ['jquery']
                ],
                'fancybox' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.fancybox.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.fancybox.min.js'),
                    'deps'    => ['jquery']
                ],
                'custom' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/custom.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/custom.js'),
                    'deps'    => ['jquery']
                ],
            ];
        }




        /**
         * Return all available styles
         *
         * @version 1.1.0
         * @return array
         */
        function egns_get_styles()
        {
            $enable_rtl = \Egns\Helper\Egns_Helper::egns_get_theme_option('rtl_enable');
            if ($enable_rtl == 1) {

                return [
                    'egns-fonts' => [
                        'src'     => 'https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&family=Rubik:wght@300;400;500;600;700;800;900&family=Sansita&family=Satisfy&display=swap',
                        'deps'    => [],
                        'version' => null,
                    ],
                    'bootstrap-rtl' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/bootstrap.rtl.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap.rtl.min.css'),
                    ],
                    'jQuery-ui' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/jquery-ui.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/jquery-ui.css'),
                    ],
                    'bootstrap-icons' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/bootstrap-icons.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap-icons.css'),
                    ],
                    'fontawesome-all' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/all.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/all.min.css'),
                    ],
                    'fontawesome' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/fontawesome.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/fontawesome.min.css'),
                    ],
                    'animate' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/animate.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/animate.min.css'),
                    ],
                    'fancybox' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/jquery.fancybox.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/jquery.fancybox.min.css'),
                    ],
                    'swiper-bundle' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/swiper-bundle.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/swiper-bundle.min.css'),
                    ],
                    'daterangepicker' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/daterangepicker.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/daterangepicker.css'),
                    ],
                    'slick' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/slick.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/slick.css'),
                    ],
                    'slick-theme' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/slick-theme.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/slick-theme.css'),
                    ],
                    'boxicons' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/boxicons.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/boxicons.min.css'),
                    ],
                    'egns-select2' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/select2.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/select2.css'),
                    ],
                    'egns-nice-select' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/nice-select.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/nice-select.css'),
                    ],
                    'blog-and-pages' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/blog-and-pages.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/blog-and-pages.css'),
                    ],
                    'woocommerce-custom' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/woocommerce-custom.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/woocommerce-custom.css'),
                    ],
                    'egns-style' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/style.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/style.css'),
                    ],
                    'egns-style-rtl' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/style-rtl.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/style-rtl.css'),
                    ],
                    'egns-theme' => [
                        'src'     => EGNS_ROOT . '/style.css',
                        'version' => rand(10, 100),
                    ],

                ];
            } else {

                return [
                    'egns-fonts' => [
                        'src'     => 'https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&family=Rubik:wght@300;400;500;600;700;800;900&family=Sansita&family=Satisfy&display=swap',
                        'deps'    => [],
                        'version' => null,
                    ],
                    'bootstrap' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/bootstrap.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap.min.css'),
                    ],
                    'jQuery-ui' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/jquery-ui.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/jquery-ui.css'),
                    ],
                    'bootstrap-icons' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/bootstrap-icons.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap-icons.css'),
                    ],
                    'fontawesome-all' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/all.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/all.min.css'),
                    ],
                    'fontawesome' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/fontawesome.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/fontawesome.min.css'),
                    ],
                    'animate' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/animate.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/animate.min.css'),
                    ],
                    'fancybox' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/jquery.fancybox.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/jquery.fancybox.min.css'),
                    ],
                    'swiper-bundle' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/swiper-bundle.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/swiper-bundle.min.css'),
                    ],
                    'daterangepicker' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/daterangepicker.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/daterangepicker.css'),
                    ],
                    'slick' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/slick.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/slick.css'),
                    ],
                    'slick-theme' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/slick-theme.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/slick-theme.css'),
                    ],
                    'boxicons' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/boxicons.min.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/boxicons.min.css'),
                    ],
                    'egns-select2' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/select2.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/select2.css'),
                    ],
                    'egns-nice-select' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/nice-select.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/nice-select.css'),
                    ],
                    'blog-and-pages' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/blog-and-pages.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/blog-and-pages.css'),
                    ],
                    'woocommerce-custom' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/woocommerce-custom.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/woocommerce-custom.css'),
                    ],
                    'egns-style' => [
                        'src'     => EGNS_ASSETS_ROOT . '/css/style.css',
                        'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/style.css'),
                    ],
                    'egns-theme' => [
                        'src'     => EGNS_ROOT . '/style.css',
                        'version' => rand(10, 100),
                    ],

                ];
            }
        }


        /**
         * Return all available admin styles
         *
         * @version 1.1.0
         * @return array
         */
        function egns_get_admin_styles()
        {
            return [
                'egns-admin' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/admin.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/admin.css'),
                ],
            ];
        }


        /**
         * Triprex enqueue scripts and styles 
         * 
         * @since 1.1.0
         * 
         * @return void
         */
        public function egns_enqueue_assets()
        {

            $scripts = $this->egns_get_scripts();
            $styles  = $this->egns_get_styles();

            // Applied filter hook for scripts and styles
            $scripts = apply_filters('egns_filter_scripts', $scripts);
            $styles  = apply_filters('egns_filter_styles', $styles);

            // Enqueue all styles
            foreach ($styles as $handle => $style) {
                $deps = isset($style['deps']) ? $style['deps'] : false;

                wp_enqueue_style($handle, $style['src'], $deps, $style['version'], 'all');
            }

            // Enqueue all scripts
            foreach ($scripts as $handle => $script) {
                $deps = isset($script['deps']) ? $script['deps'] : false;

                wp_enqueue_script($handle, $script['src'], $deps, $script['version'], true);
            }

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
            do_action('triprex_after_load_scripts');
        }

        /**
         * Triprex enqueue admin scripts and styles 
         * 
         * @since 1.1.0
         * 
         * @return void
         */
        public function egns_enqueue_admin_assets()
        {
            $admin_styles = $this->egns_get_admin_styles();

            // Applied filter hook for scripts and styles
            $admin_styles = apply_filters('egns_filter_admin_styles', $admin_styles);

            // Enqueue all admin styles
            foreach ($admin_styles as $handle => $admin_style) {
                $deps = isset($admin_style['deps']) ? $admin_style['deps'] : false;

                wp_enqueue_style($handle, $admin_style['src'], $deps, $admin_style['version'], 'all');
            }
        }
    }
}
