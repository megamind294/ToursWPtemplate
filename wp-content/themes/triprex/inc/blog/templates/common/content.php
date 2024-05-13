<div class="blog-content">
    <?php Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/meta'); ?>
    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
    <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
    <a href="<?php the_permalink() ?>"><?php echo esc_html__('View Post', 'triprex') ?>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"></path>
            </svg>
        </span>
    </a>
</div>