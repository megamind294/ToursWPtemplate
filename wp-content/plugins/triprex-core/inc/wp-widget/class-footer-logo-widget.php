<?php

class Custom_Footer_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            // Base ID of our widget
            'custom_footer_widget',

            // Widget name
            __('Egns Footer Logo', 'triprex-core'),

            // Widget description
            array('description' => __('Add custom Logo to the footer.', 'triprex-core'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Output the custom content here
?>
        <?php if (!empty($instance['logo_image'])) : ?>
            <div class="footer-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($instance['logo_image']); ?>" alt="<?php esc_attr_e('logo', 'triprex-core'); ?>"></a>
            </div>
        <?php endif; ?>
        <?php if (!empty($instance['main_title'])) : ?>
            <h3><?php echo wp_kses($instance['main_title'], wp_kses_allowed_html('post')); ?></h3>
        <?php endif; ?>
        <?php if (!empty($instance['button_txt'])) : ?>
            <a href="<?php echo esc_url($instance['button_url']) ?>" class="primary-btn1"><?php echo esc_html($instance['button_txt']) ?></a>
        <?php endif; ?>

    <?php

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        // Widget settings form
        $logo_image = !empty($instance['logo_image']) ? $instance['logo_image'] : '';

        $main_title = !empty($instance['main_title']) ? $instance['main_title'] : '';

        $button_txt = !empty($instance['button_txt']) ? $instance['button_txt'] : '';
        $button_url = !empty($instance['button_url']) ? $instance['button_url'] : '';

    ?>
        <p>
            <label for="<?php echo $this->get_field_id('logo_image'); ?>"><?php echo esc_html('Logo Image URL:') ?> </label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('logo_image'); ?>" name="<?php echo $this->get_field_name('logo_image'); ?>" value="<?php echo esc_attr($logo_image); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('main_title'); ?>"><?php echo esc_html('Main Title') ?> </label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('main_title'); ?>" name="<?php echo $this->get_field_name('main_title'); ?>" value="<?php echo esc_attr($main_title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('button_txt'); ?>"><?php echo esc_html('Button Text') ?> </label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('button_txt'); ?>" name="<?php echo $this->get_field_name('button_txt'); ?>" value="<?php echo esc_attr($button_txt); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('button_url'); ?>"><?php echo esc_html('Button URL:') ?> </label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('button_url'); ?>" name="<?php echo $this->get_field_name('button_url'); ?>" value="<?php echo esc_attr($button_url); ?>">
        </p>

<?php
    }

    public function update($new_instance, $old_instance)
    {
        // Save widget settings
        $instance = array();
        $instance['logo_image'] = !empty($new_instance['logo_image']) ? sanitize_text_field($new_instance['logo_image']) : '';
        $instance['main_title'] = !empty($new_instance['main_title']) ? sanitize_text_field($new_instance['main_title']) : '';

        $instance['button_txt'] = !empty($new_instance['button_txt']) ? sanitize_text_field($new_instance['button_txt']) : '';
        $instance['button_url'] = !empty($new_instance['button_url']) ? sanitize_text_field($new_instance['button_url']) : '';

        return $instance;
    }
}


function register_custom_footer_widget()
{
    register_widget('Custom_Footer_Widget');
}
add_action('widgets_init', 'register_custom_footer_widget');
