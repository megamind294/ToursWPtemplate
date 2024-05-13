<div class="blog-details-page sec-mar">
    <?php
    // Hook to include additional content before blog post item
    do_action('egns_page_before');

    // Include blog template
    echo apply_filters('egns_filter_blog_template', Egns\Helper\Egns_Helper::egns_get_template_part('blog', 'templates/standard/loop', '', $params));
    
    // Hook to include additional content after blog post item
    do_action('egns_page_after');
    ?>
</div>