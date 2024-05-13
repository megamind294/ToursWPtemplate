<article aria-label="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog-details-section">
        <div class="container">
            <div class="row g-lg-4 gy-5 justify-content-center">
                <div class="<?php echo is_active_sidebar('blog_sidebar') ? 'col-lg-8' : 'col-lg-10' ?>">
                    <?php Egns\Inc\Blog_Helper::get_the_post_thumb_with_format_single(); ?>
                    <?php
                    Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/single/meta');
                    the_content();
                    Egns\Inc\Blog_Helper::egns_post_pagination();
                    Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/single/info');
                    Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/single/post-link');
                    ?>
                    <?php
                    //If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>
                </div>
                <?php
                // Include page content sidebar
                Egns\Helper\Egns_Helper::egns_template_part('sidebar', 'templates/sidebar');
                ?>
            </div>
        </div>
    </div>

</article>