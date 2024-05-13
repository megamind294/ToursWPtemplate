<?php
function egns_ajax_handler()
{
    global $wp_query;
    wp_localize_script('ajax-handler', 'egens_ajax_handler_params', array(
        'ajaxurl' => home_url() . '/wp-admin/admin-ajax.php',
    ));
}

add_action('wp_enqueue_scripts', 'egns_ajax_handler', 100);


add_action('wp_ajax_egns_login_customer', 'egns_login_customer');
add_action('wp_ajax_nopriv_egns_login_customer', 'egns_login_customer');


function egns_login_customer()
{
    $email      = sanitize_email($_POST['customer_login_info']['email_address']);
    $password   = sanitize_text_field($_POST['customer_login_info']['password']);
    if (empty($email) || empty($password)) {
        return wp_send_json_error(['message' => __('Something went wrong!!', 'triprex')]);
    } else {
        $creds = array(
            'user_login' => $email,
            'user_password' => $password,
            'remember' => true,
        );
        $user = wp_signon($creds, false);
        if (is_wp_error($user)) {
            return wp_send_json_error(['message' => __('Login failed. Please check your credentials.', 'triprex')]);
            echo '<div class="error"></div>';
        } else {
            return wp_send_json_success(['message' => __('Login successful. Redirecting...', 'triprex')]);
        }
    }
    die();
}

add_action('wp_ajax__egns_update_product_cart', '_egns_update_product_cart');
add_action('wp_ajax_nopriv__egns_update_product_cart', '_egns_update_product_cart');

function _egns_update_product_cart()
{
    $action = isset($_GET['update_type']) ? sanitize_text_field($_GET['update_type']) : '';
    if ($action == 'add') {
        $cart_count = WC()->cart->get_cart_contents_count() + 1;
        echo sprintf('%d', $cart_count);
    } elseif ($action == 'remove') {
        $cart_count = WC()->cart->get_cart_contents_count() - 1;
        echo sprintf('%d', $cart_count);
    }
    die();
}


// Add package pricing 
add_action('wp_ajax_triprex_calc_package_price', 'triprex_calc_package_price');
add_action('wp_ajax_nopriv_triprex_calc_package_price', 'triprex_calc_package_price');

function triprex_calc_package_price()
{
    $nonce = sanitize_text_field($_POST['nonce']);
    if (!wp_verify_nonce($nonce, 'triprex-nonce')) {
        wp_die(__('Invalid Nonce!!', 'triprex'));
    }
    if (empty($_POST['_id']) && empty($_POST['quantity'])) {
        wp_die(__('Pricing Category ID not found!', 'triprex'));
    }


    $_id              = sanitize_text_field($_POST['_id']);
    $is_service       = \Egns\Helper\Egns_Helper::string_to_boolean(sanitize_text_field($_POST['is_service']));
    $post_id          = sanitize_text_field($_POST['post_id']);
    $quantity         = sanitize_text_field($_POST['quantity']);
    $post_type        = sanitize_text_field($_POST['post_type']);
    $package_id       = sanitize_text_field($_POST['package_id']);
    $pricing_date_dep = sanitize_text_field($_POST['pricing_date_dep']);
    $pricing_date_qty = sanitize_text_field($_POST['pricing_date_qty']);

    if ($is_service) {
        if ($post_type == 'tours') {
            $service_name  = \Egns\Helper\Egns_Helper::egns_get_service_info_by_key($post_id, $_id, true);
            $service_price = \Egns\Helper\Egns_Helper::egns_get_service_info_by_key($post_id, $_id);
            if (empty($service_name) && empty($service_price)) {
                return;
            }
            $data[\Egns\Helper\Egns_Helper::egns_slugify($service_name)] = [
                'price' => $service_price,
                'label' => $service_name,
            ];
        } elseif ($post_type == 'transport') {
            $service_name  = \Egns\Helper\Egns_Helper::egns_get_service_info_by_key($post_id, $_id, true, $package_id);
            $service_price = \Egns\Helper\Egns_Helper::egns_get_service_info_by_key($post_id, $_id, false, $package_id);
            if (empty($service_name) && empty($service_price)) {
                return;
            }
            $data[\Egns\Helper\Egns_Helper::egns_slugify($service_name)] = [
                'price' => $service_price,
                'label' => $service_name,
            ];
        } elseif ($post_type == 'activities') {
            $service_name  = \Egns\Helper\Egns_Helper::egns_get_service_info_by_key($post_id, $_id, true, $package_id);
            $service_price = \Egns\Helper\Egns_Helper::egns_get_service_info_by_key($post_id, $_id, false, $package_id);
            if (empty($service_name) && empty($service_price)) {
                return;
            }
            $data[\Egns\Helper\Egns_Helper::egns_slugify($service_name)] = [
                'price' => $service_price,
                'label' => $service_name,
            ];
        } elseif ($post_type == 'hotel') {
            $service_name = \Egns\Helper\Egns_Helper::egns_get_service_info_by_key($post_id, $_id, true);
            $service_price = \Egns\Helper\Egns_Helper::egns_get_service_info_by_key($post_id, $_id, false);
            $data[\Egns\Helper\Egns_Helper::egns_slugify($service_name)] = [
                'price' => $service_price,
                'label' => $service_name,
            ];
        }
    } else {
        $pricing_category_info = \Egns\Helper\Egns_Helper::egns_get_taxonomy_data($_id);
        if ($post_type == 'tours') {
            $package_info = \Egns\Helper\Egns_Helper::egns_get_price_by_category_id($post_id, $_id);
        } elseif ($post_type == 'transport') {
            $package_info = \Egns\Helper\Egns_Helper::egns_get_transport_price_by_category_id($post_id, $package_id,  $_id);
        } elseif ($post_type == 'activities') {
            $package_info = \Egns\Helper\Egns_Helper::egns_get_activities_price_by_category_id($post_id, $package_id,  $_id);
        }
        if (empty($pricing_category_info) && empty($package_info)) {
            return;
        }

        if (get_post_type($post_id) == 'hotel') {
            $package_info          = \Egns\Helper\Egns_Helper::egns_get_hotel_price_by_id($post_id);
            $package_info          = apply_filters('triprex_price_info_update_by_dependency', $package_info, $quantity,  $pricing_date_qty);
            $pricing_category_info = "Room";
            $minimum_quantity      = $quantity;
            $data[$pricing_category_info] = [
                'price'      => $package_info,
                'quantity'   => $minimum_quantity,
                'label'      => $pricing_category_info,
                'dependency' => [
                    'date'    => [
                        'label'          => $pricing_date_dep,
                        'quantity'       => $pricing_date_qty,
                        'quantity_label' => 'Days',
                        'visibility'     => true,
                    ]
                ]
            ];
        } else {
            $data[$pricing_category_info->slug] = [
                'price'    => $package_info,
                'quantity' => $quantity,
                'label'    => $pricing_category_info->name,
            ];
        }
    }
    // Prepare frontend info 
    wp_send_json_success(['message'    => 'Your price has been updated', 'data'    =>  $data]);
}

// Add package pricing 
add_action('wp_ajax_egns_generate_cart_info_for_tab', 'egns_generate_cart_info_for_tab');
add_action('wp_ajax_nopriv_egns_generate_cart_info_for_tab', 'egns_generate_cart_info_for_tab');

function egns_generate_cart_info_for_tab()
{
    $nonce = sanitize_text_field($_GET['nonce']);

    if (!wp_verify_nonce($nonce, 'triprex-nonce')) {
        wp_die(__('Invalid Nonce!!', 'triprex'));
    }

    if (empty($_GET['type']) && empty($_GET['post_type']) && empty($_GET['post_id'])) {
        wp_die(__('Something went wrong!!', 'triprex'));
    }
    $post_id = sanitize_text_field($_GET['post_id']);
    $transport_key = sanitize_text_field($_GET['transport_key']);
    $transports_pricing  = \Egns\Helper\Egns_Helper::egns_transport_value_by_id($post_id, 'transport_main_pricing_re');
    $pricing = \Egns\Helper\Egns_Helper::egns_transport_cart_info([], $transports_pricing, $transport_key, $post_id);
    return wp_send_json_success(['message' => __('Success!!', 'triprex'), 'data' => $pricing]);
    wp_die();
}



function egens_tour_search_filter_ajax_handler()
{
    // Product Query

    global $wp_query;
    $tour_archive_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('tour_archive_num_of_post');

    $args['post_status']    = 'publish';
    $args['post_type']      = 'tours';
    $args['posts_per_page'] = $tour_archive_num_of_post;

    $min_price = !empty($_POST['tourFilterData']['tourPriceRangeMin']) ? sanitize_text_field($_POST['tourFilterData']['tourPriceRangeMin']) : '';
    $max_price = !empty($_POST['tourFilterData']['tourPriceRangeMax']) ? sanitize_text_field($_POST['tourFilterData']['tourPriceRangeMax']) : '';

    if (!empty($_POST['tourFilterData']['page_number'])) {
        $args['paged'] = number_format($_POST['tourFilterData']['page_number']);
    }

    if (!empty($_POST['tourFilterData']['tourSearchKeyword'])) {
        $searchKeyword = sanitize_text_field($_POST['tourFilterData']['tourSearchKeyword']);
        $args['s']     = $searchKeyword;
    }

    if (!empty($_POST['tourFilterData']['tourDestinationCheck'])) {
        $destinationId      = sanitize_text_field($_POST['tourFilterData']['tourDestinationCheck']);
        $args['meta_query'] = array(
            array(
                'key'     => 'EGNS_TOURS_META_ID',
                'compare' => 'LIKE',
                'value'   => $destinationId
            )
        );
    }

    if (!empty($_POST['tourFilterData']['tourTypeTermId'])) {
        $tourTypeTermArray = \Egns\Helper\Egns_Helper::egns_sanitize_array_recursive($_POST['tourFilterData']['tourTypeTermId']);
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'tour-types',
                'field'    => 'term_id',
                'terms'    => $tourTypeTermArray
            )
        );
    }
    
    if (!empty($min_price) && !empty($max_price)) {
        $args['meta_query']     = array(
            array(
                'key'     => 'tour_price',
                'value'   => array($min_price, $max_price),
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN',
            ),
        );
    }

    $wp_query = new WP_Query($args);
?>
    <?php if ($wp_query->have_posts()) : ?>
        <?php
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('tours', 'content/archive-tours'));
        }
        ?>
    <?php else : ?>
        <?php

        // Include global posts not found
        Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
        ?>
    <?php endif ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav class="inner-pagination-area" id="tourPackagePagination">
                <?php
                // Pagination
                Egns\Inc\Blog_Helper::egns_pagination();
                ?>
            </nav>
        </div>
    </div>
<?php
    die();
}
add_action('wp_ajax_tour_search_filter', 'egens_tour_search_filter_ajax_handler');         // wp_ajax_{action}
add_action('wp_ajax_nopriv_tour_search_filter', 'egens_tour_search_filter_ajax_handler');  // wp_ajax_nopriv_{action}

function egens_hotel_search_filter_ajax_handler()
{
    // Product Query

    global $wp_query;
    $hotel_archive_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('hotel_archive_num_of_post');
    $args['post_status']    = 'publish';
    $args['post_type']      = 'hotel';
    $args['posts_per_page'] = $hotel_archive_num_of_post;
    $min_price = !empty($_POST['hotelFilterData']['hotelPriceRangeMin']) ? sanitize_text_field($_POST['hotelFilterData']['hotelPriceRangeMin']) : '';
    $max_price = !empty($_POST['hotelFilterData']['hotelPriceRangeMax']) ? sanitize_text_field($_POST['hotelFilterData']['hotelPriceRangeMax']) : 1000000;
    if (!empty($_POST['hotelFilterData']['page_number'])) {
        $args['paged'] = number_format($_POST['hotelFilterData']['page_number']); 
    }

    if (!empty($_POST['hotelFilterData']['hotelSearchKeyword'])) {
        $searchKeyword = sanitize_text_field($_POST['hotelFilterData']['hotelSearchKeyword']);
        $args['s']     = $searchKeyword;
    }

    if (!empty($_POST['hotelFilterData']['hotelRoomTermId'])) {
        $roomTypeTermArray = \Egns\Helper\Egns_Helper::egns_sanitize_array_recursive($_POST['hotelFilterData']['hotelRoomTermId']);
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'room-type',
                'field'    => 'term_id',
                'terms'    => $roomTypeTermArray
            )
        );
    }
    if (!empty($_POST['hotelFilterData']['hotelLocationTermId'])) {
        $hotelLocationTermArray = \Egns\Helper\Egns_Helper::egns_sanitize_array_recursive($_POST['hotelFilterData']['hotelLocationTermId']);
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'hotel-location',
                'field'    => 'term_id',
                'terms'    => $hotelLocationTermArray
            )
        );
    }

    if (!empty($min_price) && !empty($max_price)) {
        $args['meta_query']     = array(
            array(
                'key'     => 'hotel_room_price',
                'value'   => array($min_price, $max_price),
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN',
            ),
        );
    }

    $wp_query = new WP_Query($args);

?>
    <?php if ($wp_query->have_posts()) : ?>
        <?php
        while ($wp_query->have_posts()) {
            $wp_query->the_post();

            echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('hotel', 'content/archive-hotel'));
        }
        ?>
    <?php else : ?>
        <?php

        // Include global posts not found
        Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
        ?>
    <?php endif ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav class="inner-pagination-area" id="hotelPackagePagination">
                <?php
                // Pagination
                Egns\Inc\Blog_Helper::egns_pagination();
                ?>
            </nav>
        </div>
    </div>
<?php
    die();
}
add_action('wp_ajax_hotel_search_filter', 'egens_hotel_search_filter_ajax_handler');         // wp_ajax_{action}
add_action('wp_ajax_nopriv_hotel_search_filter', 'egens_hotel_search_filter_ajax_handler');  // wp_ajax_nopriv_{action}



function egens_transport_search_filter_ajax_handler()
{
    // Product Query

    global $wp_query;

    $args['post_status'] = 'publish';
    $args['post_type']   = 'transport';

    if (!empty($_POST['transportFilterData']['page_number'])) {
        $args['paged'] = number_format($_POST['transportFilterData']['page_number']);  // we need next page to be loaded
    }

    if (!empty($_POST['transportFilterData']['transportSearchKeyword'])) {
        $searchKeyword = sanitize_text_field($_POST['transportFilterData']['transportSearchKeyword']);
        $args['s']     = $searchKeyword;
    }

    if (!empty($_POST['transportFilterData']['transportDestinationCheck'])) {
        $destinationId      = sanitize_text_field($_POST['transportFilterData']['transportDestinationCheck']);
        $args['meta_query'] = array(
            array(
                'key'     => 'EGNS_TRANSPORT_META_ID',
                'compare' => 'LIKE',
                'value'   => $destinationId
            )
        );
    }

    if (!empty($_POST['transportFilterData']['transportTypeTermId'])) {
        $transportTypeTermArray = \Egns\Helper\Egns_Helper::egns_sanitize_array_recursive($_POST['transportFilterData']['transportTypeTermId']);
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'transport-type',
                'field'    => 'term_id',
                'terms'    => $transportTypeTermArray
            )
        );
    }

    $wp_query = new WP_Query($args);

?>
    <?php if ($wp_query->have_posts()) : ?>
        <?php
        while ($wp_query->have_posts()) {
            $wp_query->the_post();

            echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('transport', 'content/archive-transport'));
        }
        ?>
    <?php else : ?>
        <?php

        // Include global posts not found
        Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
        ?>
    <?php endif ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav class="inner-pagination-area" id="transportPackagePagination">
                <?php
                // Pagination
                Egns\Inc\Blog_Helper::egns_pagination();
                ?>
            </nav>
        </div>
    </div>
<?php
    die();
}
add_action('wp_ajax_transport_search_filter', 'egens_transport_search_filter_ajax_handler');         // wp_ajax_{action}
add_action('wp_ajax_nopriv_transport_search_filter', 'egens_transport_search_filter_ajax_handler');  // wp_ajax_nopriv_{action}