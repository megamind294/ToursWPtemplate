<div class="<?php echo is_active_sidebar('blog_sidebar') ? 'col-lg-6' : 'col-lg-4' ?> col-md-6">
    <div class="blog-card">
        <?php
        Egns\Inc\Blog_Helper::get_the_post_thumb_with_format_grid();
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/grid/content');
        ?>
    </div>
</div>