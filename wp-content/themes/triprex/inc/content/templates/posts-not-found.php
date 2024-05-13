<div class="error-area-wrapper text-center">
    <div class="mt-30 mb-30">
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/search-not-found.svg'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="img-fluid">
        <h3> <?php echo esc_html__('Sorry!, Nothing Found!', 'triprex'); ?> </h3>
        <p><?php echo esc_html__('Nothing Match your search terms. Please try again with some different keywords.', 'triprex'); ?></p>
    </div>
    <?php
    get_template_part('searchform');
    ?>
</div>