<ul class="blog-meta">
    <li><a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date('F d, Y'); ?></a></li>
    <li><a href="<?php echo esc_url(get_comments_link()); ?>"><?php comments_number(esc_html__('Comments (0)', 'triprex'), esc_html__('Comment (1)', 'triprex'), esc_html__('Comments (%)', 'triprex')); ?></a></li>
</ul>