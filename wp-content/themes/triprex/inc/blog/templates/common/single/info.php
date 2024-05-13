<div class="tag-and-social-area mb-30">
    <?php if (!empty(get_the_tag_list())) : ?>
        <div class="bolg-tag">
            <?php echo get_the_tag_list('<ul class="tag-list"><li>', '</li><li>', '</li></ul>'); ?>
        </div>
    <?php endif; ?>
    <?php if (class_exists('CSF')) : ?>
        <div class="social-area">
            <h6><?php echo esc_html__('Share On:', 'triprex') ?></h6>
            <ul class="social-link">
                <li><a href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . get_permalink()); ?>"><i class="bx bxl-facebook"></i></a></li>
                <li><a href="<?php echo esc_url('http://www.twitter.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-twitter"></i></a></li>
                <li><a href="<?php echo esc_url('http://www.pinterest.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                <li><a href="<?php echo esc_url('http://www.instagram.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-instagram"></i></a></li>
            </ul>
        </div>
    <?php endif; ?>
</div>