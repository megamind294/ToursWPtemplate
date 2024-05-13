<?php

function add_query_vars_filter($vars)
{
    // tour
    $vars[] .= 'des';
    $vars[] .= 'tour_type';
    $vars[] .= 'month';
    $vars[] .= 'duration';

    // hotel
    $vars[] .= 'location';
    $vars[] .= 'daterange';
    $vars[] .= 'room_type';
    $vars[] .= 'person_quantity';

    // visa 
    $vars[] .= 'country';
    $vars[] .= 'visa_type';
    $vars[] .= 'visa_mode';

    // transport 
    $vars[] .= 'transport_des';
    $vars[] .= 'transport_type';
    $vars[] .= 'reserve_date';
    
    // activities 
    $vars[] .= 'activities_location';
    $vars[] .= 'activities_type';
    $vars[] .= 'inOut';

    return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');

function get_destination_id( $name ) {
    $posts = get_posts(
        array(
            'post_type'              => 'destination',
            'title'                  => $name,
            'post_status'            => 'all',
            'numberposts'            => 1,
        )
    );

    if( count( $posts ) > 0 ) {
        return $posts[0]->ID;
    }
}

function convert_month_name_numerical_month( $monthName )
{
    $months = array(
        'January' => '01/', 'February' => '02/', 'March' => '03/',
        'April' => '04/', 'May' => '05/', 'June' => '06/',
        'July' => '07/', 'August' => '08/', 'September' => '09/',
        'October' => '10/', 'November' => '11/', 'December' => '12/'
    );
    // Capitalize the first letter of each word to ensure a match regardless of the input case
    $formattedMonthName = ucwords(strtolower($monthName));
    if (array_key_exists($formattedMonthName, $months)) {
        return $months[$formattedMonthName];
    } else {
        return "Invalid month name";
    }
}

function egns_vechiles_filter($query)
{
    // Tour Archive Query

    if ( is_post_type_archive('tours') && $query->is_main_query() && !is_admin()) {
        $destination = !empty( get_query_var('des') ) ? ''.get_destination_id( get_query_var('des') ).'' : '';
        $tour_type   = get_query_var('tour_type');
        $month       = !empty( get_query_var('month') ) ? convert_month_name_numerical_month( get_query_var('month') ) : '';
        $duration    = get_query_var('duration');

        $meta_query_array = array('relation' => 'OR');
        $destination ? array_push($meta_query_array, array('key' => 'EGNS_TOURS_META_ID', 'value' => '"tour_destination_select";a:1:{i:0;s:2:"'.$destination.'"', 'compare' => 'LIKE')): null;
        $duration    ? array_push($meta_query_array, array('key' => 'EGNS_TOURS_META_ID', 'value' => $duration, 'compare' => 'LIKE'))   : null;
        $month    ? array_push($meta_query_array, array('key' => 'EGNS_TOURS_META_ID', 'value' => $month, 'compare' => 'LIKE'))   : null;
        $query->set('meta_query', $meta_query_array);

        $tax_query = array('relation' => 'OR');
        $tour_type ? array_push($tax_query, array('taxonomy' => 'tour-types', 'field' => 'name', 'terms' => $tour_type)) : null;
        // final tax_query
        $query->set('tax_query', $tax_query);
    }

    // Hotel Archive Query
    if( is_post_type_archive('hotel') && $query->is_main_query() && !is_admin() ) {
        $room_type = get_query_var('room_type');
        $location  = get_query_var('location');

        $tax_query = array('relation' => 'OR');
        $room_type ? array_push($tax_query, array('taxonomy' => 'room-type', 'field' => 'name', 'terms' => $room_type))    : null;
        $location  ? array_push($tax_query, array('taxonomy' => 'hotel-location', 'field' => 'name', 'terms' => $location)): null;

        // final tax_query
        $query->set('tax_query', $tax_query);
    }

    // Visa archive query
    if( is_post_type_archive('visa') && $query->is_main_query() && !is_admin() ) {
        $country = get_query_var('country');
        $visa_type  = get_query_var('visa_type');
        $visa_mode  = get_query_var('visa_mode');

        $tax_query = array('relation' => 'OR');
        $country ? array_push($tax_query, array('taxonomy' => 'country', 'field' => 'name', 'terms' => $country))    : null;
        $visa_type  ? array_push($tax_query, array('taxonomy' => 'visa-type', 'field' => 'name', 'terms' => $visa_type)): null;
        $visa_mode  ? array_push($tax_query, array('taxonomy' => 'visa-mode', 'field' => 'name', 'terms' => $visa_mode)): null;

        // final tax_query
        $query->set('tax_query', $tax_query);
    }

    // Transport archive query
    if( is_post_type_archive('transport') && $query->is_main_query() && !is_admin() ) {

        $destination = !empty( get_query_var('transport_des') ) ? ''.get_destination_id( get_query_var('transport_des') ).'' : '';
        $transport_type  = get_query_var('transport_type');
        $reserve_date  = get_query_var('reserve_date');

        $meta_query_array = array('relation' => 'OR');
        $destination ? array_push($meta_query_array, array('key' => 'EGNS_TRANSPORT_META_ID', 'value' => $destination, 'compare' => 'LIKE')): null;
        $query->set('meta_query', $meta_query_array);

        $tax_query = array('relation' => 'OR');
        $transport_type ? array_push($tax_query, array('taxonomy' => 'transport-type', 'field' => 'name', 'terms' => $transport_type))    : null;

        // final tax_query
        $query->set('tax_query', $tax_query);
    }

    // Activities archive query 
    if( is_post_type_archive('activities') && $query->is_main_query() && !is_admin() ) {
        $activities_location = get_query_var('activities_location');
        $activities_type     = get_query_var('activities_type');
        $tax_query = array('relation' => 'OR');
        $activities_location ? array_push($tax_query, array('taxonomy' => 'activities-country', 'field' => 'name', 'terms' => $activities_location)): null;
        $activities_type     ? array_push($tax_query, array('taxonomy' => 'activities-type', 'field' => 'name', 'terms' => $activities_type))       : null;

        // final tax_query
        $query->set('tax_query', $tax_query);
    }
    // Check if this is the main query and if we're on an archive page
    if ( is_post_type_archive('visa') && $query->is_main_query() ) {
        $visa_archive_num_of_post = Egns\Helper\Egns_Helper::egns_get_theme_option('visa_archive_num_of_post');
        $query->set( 'posts_per_page', $visa_archive_num_of_post );
    }

}

add_action('pre_get_posts', 'egns_vechiles_filter');
