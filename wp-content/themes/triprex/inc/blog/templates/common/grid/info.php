<div class="blog-footer">
    <div class="read-btn">
        <a href="<?php the_permalink() ?>"><?php echo esc_html__('Read More', 'triprex') ?>
            <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
            </svg>
        </a>
    </div>
    <?php if (class_exists('CSF')) : ?>
        <div class="social-area">
            <ul>
                <li><a href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . get_permalink()); ?>"><i class="bx bxl-facebook"></i></a></li>
                <li><a href="<?php echo esc_url('http://www.twitter.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-twitter"></i></a></li>
                <li><a href="<?php echo esc_url('http://www.pinterest.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-pinterest"></i></a></li>
                <li><a href="<?php echo esc_url('http://www.instagram.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-instagram"></i></a></li>
            </ul>
            <span>
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.5092 14.4665C8.93952 14.4665 8.43254 14.0841 8.27608 13.5365L6.76211 8.23761L1.46319 6.72364C0.915606 6.56718 0.533203 6.0602 0.533203 5.49074C0.533203 4.91327 0.904695 4.41397 1.45764 4.24808L14.0052 0.483828C14.0761 0.462563 14.1515 0.460898 14.2233 0.47901C14.2951 0.497122 14.3607 0.534335 14.413 0.586701C14.4654 0.639066 14.5026 0.704631 14.5207 0.776439C14.5388 0.848246 14.5372 0.923617 14.5159 0.994555L10.7516 13.5421C10.5857 14.095 10.0865 14.4665 9.5092 14.4665Z" fill="white" />
                </svg>
            </span>
        </div>
    <?php endif ?>
</div>