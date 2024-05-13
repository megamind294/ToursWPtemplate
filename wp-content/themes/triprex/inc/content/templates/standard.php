<div class="blog-standard-section pt-120 mb-120">
    <?php
    // Hook to include additional content before blog post item
    do_action('egns_page_before');
    ?>
    <div class="row g-lg-4 gy-5">
        <?php
        // Include blog template
        echo apply_filters('egns_filter_blog_template', Egns\Helper\Egns_Helper::egns_get_template_part('blog', 'templates/blog', '', $params));
        
        // Include page content sidebar
        Egns\Helper\Egns_Helper::egns_template_part('sidebar', 'templates/sidebar');
        ?>
    </div>
    <?php
    // Hook to include additional content after blog post item
    do_action('egns_page_after');
    ?>
</div>