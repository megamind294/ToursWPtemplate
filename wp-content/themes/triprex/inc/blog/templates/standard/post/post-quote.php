<div class="blog-st-card">
    <?php
    Egns\Inc\Blog_Helper::egns_blog_is_sticky();
    Egns\Inc\Blog_Helper::get_the_post_thumb_with_format_standard();
    Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/content');
    ?>
</div>