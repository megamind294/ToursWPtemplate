<div class="egns-preloader">
    <div class="preloader-close-btn">
        <span><i class="bi bi-x-lg"></i> <?php echo esc_html__('Close', 'triprex') ?></span>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="circle-border">
                    <div class="moving-circle"></div>
                    <div class="moving-circle"></div>
                    <div class="moving-circle"></div>
                    <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('preloader_logo', 'url'))) : ?>
                        <img style="left: 50%; top: 50%; position: absolute; transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);" src="<?php echo Egns\Helper\Egns_Helper::egns_get_theme_option('preloader_logo', 'url') ?>" alt="<?php esc_attr__('preloader-logo', 'triprex')  ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>