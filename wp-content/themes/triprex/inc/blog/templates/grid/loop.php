<?php
$args = array(
    'post_type' => 'post', //it is a Page right?
    'post_status' => 'publish',
    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
);
$wp_query = new WP_Query($args); ?>
<div class="row g-md-4 gy-5 mb-70">
    <?php
    $num = 0;
    if ($wp_query->have_posts()) {

        while ($wp_query->have_posts()) :
            $num++;
            $wp_query->the_post();

            echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('blog', 'templates/grid/post/post', get_post_format() ? get_post_format() : 'default'));

        endwhile; // End of the loop.

    } else {
        // Include global posts not found
        Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
    }
    ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <nav class="inner-pagination-area">
            <?php
            // Pagination
            Egns\Inc\Blog_Helper::egns_pagination();
            ?>
        </nav>
    </div>
</div>

<?php wp_reset_postdata(); ?>