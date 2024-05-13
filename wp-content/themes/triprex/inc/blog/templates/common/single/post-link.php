<div class="row mb-80">
    <div class="col-lg-12">
        <div class="details-navigation">
            <?php
            $prev = get_adjacent_post(false, '', true);
            $next = get_adjacent_post(false, '', false);
            ?>
            <?php if (!empty($prev)) : ?>
                <div class="single-navigation">
                    <a href="<?php echo get_permalink($prev->ID); ?>" class="arrow">
                        <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                        </svg>
                    </a>
                    <div class="content">
                        <a href="<?php echo get_permalink($prev->ID); ?>"><?php echo get_previous_post_link('%link', __('Prev Post', 'triprex')); ?></a>
                        <h6><a href="<?php echo get_permalink($prev->ID); ?>"><?php echo get_the_title($prev->ID); ?></a></h6>
                    </div>
                </div>
            <?php endif ?>

            <?php if (!empty($next)) : ?>
                <div class="single-navigation two text-end">
                    <div class="content">
                        <a href="<?php echo get_permalink($next->ID); ?>"><?php echo get_previous_post_link('%link', __('Next Post', 'triprex')); ?></a>
                        <h6><a href="<?php echo get_permalink($next->ID); ?>"><?php echo get_the_title($next->ID); ?></a></h6>
                    </div>
                    <a href="<?php echo get_permalink($next->ID); ?>" class="arrow">
                        <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                        </svg>
                    </a>
                </div>
            <?php endif ?>

        </div>
    </div>
</div>