<?php

//recent post custom widget

class Egns_Recent_Post_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_recent_post',

            // Widget name
            __('Egns Recent Post', 'triprex-core'),

            // Widget description
            array('description' => __('Egns Recent Post', 'triprex-core'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
?>

        <?php if (!empty($title)) : ?>
            <?php echo $args['before_title'] . esc_attr(__($title, 'triprex-core')) . $args['after_title']; ?>
        <?php endif; ?>

        <?php
        $query = new WP_Query(array(
            'post_type'           => 'post',
            'posts_per_page'      => 3,
            'orderby'             => "desc"
        ));
        ?>
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
        ?>
                <div class="recent-post-widget">
                    <div class="recent-post-img">
                        <a href="<?php esc_url(the_permalink()); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('thumbnail');
                            }
                            ?>
                        </a>
                    </div>
                    <div class="recent-post-content">
                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date('d F, Y'); ?></a>
                        <h6><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h6>
                    </div>
                </div>
        <?php
            }
        }
        wp_reset_query();
        ?>
    <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $title = '';
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
    ?>
        <!--Title-->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }

    // Updating widget replacing old instances with
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

if (!function_exists('Egns_Recent_Post_Widget')) {
    function Egns_Recent_Post_Widget()
    {
        register_widget('Egns_Recent_Post_Widget');
    }
    add_action('widgets_init', 'Egns_Recent_Post_Widget');
}
