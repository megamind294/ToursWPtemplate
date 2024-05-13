<?php
$tourCount = \Egns\Helper\Egns_Helper::get_tour_count_by_destination_id(get_the_ID());
?>
<div class="col-lg-6  destination-column">
    <div class="destination-dropdown-card">
        <div class="destination-dropdown-card-img">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="eg-batch">
            <span><?php echo esc_html($tourCount) . esc_html__(' Tour', 'triprex'); ?></span>
        </div>
        <div class="destination-dropdown-content">
            <div class="title">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            </div>
            <a href="<?php the_permalink(); ?>" class="details-btn"><?php echo esc_html__('View Details', 'triprex'); ?></a>
        </div>
        <div class="destination-dropdown-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="8" viewBox="0 0 16 8">
                <path d="M0.1104 2.08367e-06L0 1.39876e-06L8 8L16 0L15.8896 1.44772e-08L12.5714 9.94292e-07L8 4.57143L3.42857 1.09903e-06L0.1104 2.08367e-06Z" />
            </svg>
        </div>
        <div class="destination-wrap">
            <div class="row g-4">
                <ul class="destination-list">
                    <?php
                    // Get the post categories
                    $post_categories = get_the_terms(get_the_ID(), 'city-location');

                    if ($post_categories && !is_wp_error($post_categories)) {
                        foreach ($post_categories as $category) {
                            echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="9" height="13" viewBox="0 0 9 13">
        <path d="M4.5 0C3.30653 0 2.16193 0.50213 1.31802 1.39593C0.474106 2.28973 0 3.50198 0 4.766C0 7.28331 4.00909 12.6082 4.18091 12.8379C4.21924 12.8885 4.26781 12.9293 4.32304 12.9574C4.37827 12.9854 4.43874 13 4.5 13C4.56126 13 4.62173 12.9854 4.67696 12.9574C4.73219 12.9293 4.78076 12.8885 4.81909 12.8379C4.99091 12.6082 9 7.28331 9 4.766C9 3.50198 8.52589 2.28973 7.68198 1.39593C6.83807 0.50213 5.69347 0 4.5 0ZM4.5 6.06581C4.17636 6.06581 3.85998 5.96417 3.59089 5.77373C3.32179 5.58330 3.11205 5.31263 2.98820 4.99595C2.86434 4.67927 2.83194 4.3308 2.89508 3.99461C2.95822 3.65843 3.11407 3.34962 3.34292 3.10724C3.57177 2.86487 3.86334 2.69981 4.18076 2.63294C4.49818 2.56606 4.82720 2.60038 5.12621 2.73156C5.42522 2.86273 5.68078 3.08487 5.86059 3.36987C6.04039 3.65488 6.13636 3.98995 6.13636 4.33272C6.13636 4.79237 5.96396 5.23319 5.65708 5.55820C5.35021 5.88322 4.93399 6.06581 4.5 6.06581Z" />
    </svg> <a href="' . get_term_link($category->term_id) . '">' . esc_html($category->name) . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>