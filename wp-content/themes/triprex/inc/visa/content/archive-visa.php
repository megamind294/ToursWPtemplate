<div class="col-md-12 item">
    <div class="package-card4 four">
        <a href="<?php the_permalink(); ?>" class="package-card-img">
            <?php the_post_thumbnail(); ?>
        </a>
        <div class="package-card-content">
            <div class="card-content-top">
                <h5><?php the_title(); ?></h5>
                <ul>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'country');
                    if ($terms && !is_wp_error($terms)) : ?>
                        <li><span><?php echo esc_html__('Country', 'triprex'); ?> :</span>
                            <?php
                            $term_names = array_map(function ($term) {
                                return sprintf(__('%s', 'triprex'), $term->name);
                            }, $terms);
                            echo implode(', ', $term_names);
                            ?>
                        </li>
                    <?php endif; ?>

                    <?php
                    $terms = get_the_terms(get_the_ID(), 'visa-type');
                    if ($terms && !is_wp_error($terms)) : ?>
                        <li><span><?php echo esc_html__('Visa Type', 'triprex'); ?> :</span>
                            <?php
                            $term_names = array_map(function ($term) {
                                return sprintf(__('%s', 'triprex'), $term->name);
                            }, $terms);
                            echo implode(', ', $term_names);
                            ?>
                        </li>
                    <?php endif; ?>


                    <?php
                    $terms = get_the_terms(get_the_ID(), 'visa-mode');
                    if ($terms && !is_wp_error($terms)) : ?>
                        <li><span><?php echo esc_html__('Visa Mode', 'triprex'); ?> :</span>
                            <?php
                            $term_names = array_map(function ($term) {
                                return sprintf(__('%s', 'triprex'), $term->name);
                            }, $terms);
                            echo implode(', ', $term_names);
                            ?>
                        </li>
                    <?php endif; ?>
                    <?php $visa_info = (array) Egns\Helper\Egns_Helper::egns_visa_value('visa_general_info_re');
                    foreach ($visa_info as $step_data) :
                    ?>
                        <?php if (!empty($step_data['visa_info_label_text'])) : ?>
                            <li><span><?php echo esc_html($step_data['visa_info_label_text']); ?></span> <?php echo esc_html($step_data['visa_info_content_text']); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="card-content-bottom">
                <div class="price-area">
                    <span><?php echo esc_html__('Starting Form', 'triprex'); ?> :</span>
                    <h6>
                        <?php echo \Egns_Core\Egns_Helper::egns_get_visa_pack_price() ?>
                        <strong> <?php echo \Egns\Helper\Egns_Helper::package_price_type(Egns\Helper\Egns_Helper::egns_visa_value('visa_cost_select')) ?></strong>
                    </h6>
                </div>
                <a href="<?php the_permalink(); ?>" class="apply-btn">
                    <?php echo esc_html__('Apply Now', 'triprex'); ?>
                    <div class="arrow">
                        <i class="bi bi-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>