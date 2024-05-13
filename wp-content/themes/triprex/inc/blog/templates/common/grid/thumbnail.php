<?php if (has_post_thumbnail(get_the_ID())) : ?>
    <div class="blog-card-img-wrap">
        <a href="<?php the_permalink() ?>" class="card-img"><?php the_post_thumbnail() ?></a>
        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="date">
            <span><strong><?php echo get_the_date('d'); ?></strong> <br> <?php echo get_the_date('F'); ?></span>
        </a>
    </div>
<?php endif; ?>