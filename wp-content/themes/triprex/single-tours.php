<?php

get_header();

if (!is_front_page()) {
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-single');
}
?>

<?php
// Include destination single product template
Egns\Helper\Egns_Helper::egns_template_part('tours', 'content/single-tours');

get_footer();