<?php

//Social Link Custom Widget

class Egns_Social_Link_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_social_link',

            // Widget name
            __('Egns Social Link', 'triprex-core'),

            // Widget description
            array('description' => __('Egens Social Link', 'triprex-core'),)
        );
    }

    public function widget($args, $instance)
    {

        echo $args['before_widget'];
?>
        <ul class="social-link">

            <?php if (!empty($instance['facebook_url'])) : ?>
                <li>
                    <a href="<?php echo  esc_url(__($instance['facebook_url'], 'triprex-core')); ?>"><i class="bx bxl-facebook"></i>
                        <span><?php echo  esc_html(__($instance['facebook_txt'], 'triprex-core')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instance['instagram_url'])) : ?>
                <li><a href="<?php echo  esc_url(__($instance['instagram_url'], 'triprex-core')); ?>"><i class="bx bxl-instagram"></i>
                        <span><?php echo  esc_html(__($instance['instagram_txt'], 'triprex-core')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instance['linkedin_url'])) : ?>
                <li><a href="<?php echo  esc_url(__($instance['linkedin_url'], 'triprex-core')); ?>"><i class='bx bxl-linkedin'></i>
                        <span><?php echo  esc_html(__($instance['linkedin_txt'], 'triprex-core')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instance['twitter_url'])) : ?>
                <li>
                    <a href="<?php echo  esc_url(__($instance['twitter_url'], 'triprex-core')); ?>"><i class="bx bxl-twitter"></i>
                        <span><?php echo  esc_html(__($instance['twitter_txt'], 'triprex-core')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instance['dribbble_url'])) : ?>
                <li>
                    <a href="<?php echo  esc_url(__($instance['dribbble_url'], 'triprex-core')); ?>"><i class="bx bxl-dribbble"></i>
                        <span><?php echo  esc_html(__($instance['dribbble_txt'], 'triprex-core')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instance['pinterest_url'])) : ?>
                <li><a href="<?php echo  esc_url(__($instance['pinterest_url'], 'triprex-core')); ?>"><i class="bx bxl-pinterest"></i>
                        <span><?php echo  esc_html(__($instance['pinterest_txt'], 'triprex-core')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instance['whatsapp_url'])) : ?>
                <li><a href="<?php echo  esc_url(__($instance['whatsapp_url'], 'triprex-core')); ?>"><i class='bx bxl-whatsapp'></i>
                        <span><?php echo  esc_html(__($instance['whatsapp_txt'], 'triprex-core')); ?></span>
                        ` </a>
                </li>`
            <?php endif; ?>
            <?php if (!empty($instance['youtube_url'])) : ?>
                <li><a href="<?php echo  esc_url(__($instance['youtube_url'], 'triprex-core')); ?>"><i class='bx bxl-youtube'></i>
                        <span><?php echo  esc_html(__($instance['youtube_txt'], 'triprex-core')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $facebook_txt = '';
        if (isset($instance['facebook_txt'])) {
            $facebook_txt = $instance['facebook_txt'];
        }
        $facebook_url = '';
        if (isset($instance['facebook_url'])) {
            $facebook_url = $instance['facebook_url'];
        }
        $instagram_txt = '';
        if (isset($instance['instagram_txt'])) {
            $instagram_txt = $instance['instagram_txt'];
        }
        $instagram_url = '';
        if (isset($instance['instagram_url'])) {
            $instagram_url = $instance['instagram_url'];
        }
        $linkedin_txt = '';
        if (isset($instance['linkedin_txt'])) {
            $linkedin_txt = $instance['linkedin_txt'];
        }
        $linkedin_url = '';
        if (isset($instance['linkedin_url'])) {
            $linkedin_url = $instance['linkedin_url'];
        }
        $twitter_txt = '';
        if (isset($instance['twitter_txt'])) {
            $twitter_txt = $instance['twitter_txt'];
        }
        $twitter_url = '';
        if (isset($instance['twitter_url'])) {
            $twitter_url = $instance['twitter_url'];
        }
        $dribbble_txt = '';
        if (isset($instance['dribbble_txt'])) {
            $dribbble_txt = $instance['dribbble_txt'];
        }
        $dribbble_url = '';
        if (isset($instance['dribbble_url'])) {
            $dribbble_url = $instance['dribbble_url'];
        }
        $whatsapp_txt = '';
        if (isset($instance['whatsapp_txt'])) {
            $whatsapp_txt = $instance['whatsapp_txt'];
        }
        $whatsapp_url = '';
        if (isset($instance['whatsapp_url'])) {
            $whatsapp_url = $instance['whatsapp_url'];
        }
        $pinterest_txt = '';
        if (isset($instance['pinterest_txt'])) {
            $pinterest_txt = $instance['pinterest_txt'];
        }
        $pinterest_url = '';
        if (isset($instance['pinterest_url'])) {
            $pinterest_url = $instance['pinterest_url'];
        }
        $youtube_txt = '';
        if (isset($instance['youtube_txt'])) {
            $youtube_txt = $instance['youtube_txt'];
        }
        $youtube_url = '';
        if (isset($instance['youtube_url'])) {
            $youtube_url = $instance['youtube_url'];
        }
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('facebook_txt'); ?>"><?php _e('Facebook Text:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook_txt'); ?>" name="<?php echo $this->get_field_name('facebook_txt'); ?>" type="text" value="<?php echo esc_attr($facebook_txt); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e('Facebook URL:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook_url'); ?>" name="<?php echo $this->get_field_name('facebook_url'); ?>" type="text" value="<?php echo esc_attr($facebook_url); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram_txt'); ?>"><?php _e('Instagram Text:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram_txt'); ?>" name="<?php echo $this->get_field_name('instagram_txt'); ?>" type="text" value="<?php echo esc_attr($instagram_txt); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram_url'); ?>"><?php _e('Instagram URL:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram_url'); ?>" name="<?php echo $this->get_field_name('instagram_url'); ?>" type="text" value="<?php echo esc_attr($instagram_url); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_txt'); ?>"><?php _e('Twitter Text:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_txt'); ?>" name="<?php echo $this->get_field_name('twitter_txt'); ?>" type="text" value="<?php echo esc_attr($twitter_txt); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php _e('Twitter URL:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>" type="text" value="<?php echo esc_attr($twitter_url); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin_txt'); ?>"><?php _e('Linkedin Text:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin_txt'); ?>" name="<?php echo $this->get_field_name('linkedin_txt'); ?>" type="text" value="<?php echo esc_attr($linkedin_txt); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin_url'); ?>"><?php _e('Linkedin URL:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin_url'); ?>" name="<?php echo $this->get_field_name('linkedin_url'); ?>" type="text" value="<?php echo esc_attr($linkedin_url); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('dribbble_txt'); ?>"><?php _e('Dribbble Text:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('dribbble_txt'); ?>" name="<?php echo $this->get_field_name('dribbble_txt'); ?>" type="text" value="<?php echo esc_attr($dribbble_txt); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('dribbble_url'); ?>"><?php _e('Dribbble URL:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('dribbble_url'); ?>" name="<?php echo $this->get_field_name('dribbble_url'); ?>" type="text" value="<?php echo esc_attr($dribbble_url); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('pinterest_txt'); ?>"><?php _e('Pinterest Text:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('pinterest_txt'); ?>" name="<?php echo $this->get_field_name('pinterest_txt'); ?>" type="text" value="<?php echo esc_attr($pinterest_txt); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('pinterest_url'); ?>"><?php _e('Pinterest URL:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('pinterest_url'); ?>" name="<?php echo $this->get_field_name('pinterest_url'); ?>" type="text" value="<?php echo esc_attr($pinterest_url); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('whatsapp_txt'); ?>"><?php _e('Whatsapp Text:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('whatsapp_txt'); ?>" name="<?php echo $this->get_field_name('whatsapp_txt'); ?>" type="text" value="<?php echo esc_attr($whatsapp_txt); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('whatsapp_url'); ?>"><?php _e('Whatsapp URL:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('whatsapp_url'); ?>" name="<?php echo $this->get_field_name('whatsapp_url'); ?>" type="text" value="<?php echo esc_attr($whatsapp_url); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube_txt'); ?>"><?php _e('Youtube Text:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube_txt'); ?>" name="<?php echo $this->get_field_name('youtube_txt'); ?>" type="text" value="<?php echo esc_attr($youtube_txt); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube_url'); ?>"><?php _e('Youtube URL:', 'triprex-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube_url'); ?>" name="<?php echo $this->get_field_name('youtube_url'); ?>" type="text" value="<?php echo esc_attr($youtube_url); ?>" />
        </p>
        <?php

        ?>
<?php
    }

    // Updating widget replacing old instances with
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['facebook_txt'] = (!empty($new_instance['facebook_txt'])) ? strip_tags($new_instance['facebook_txt']) : '';
        $instance['facebook_url'] = (!empty($new_instance['facebook_url'])) ? strip_tags($new_instance['facebook_url']) : '';
        $instance['instagram_txt'] = (!empty($new_instance['instagram_txt'])) ? strip_tags($new_instance['instagram_txt']) : '';
        $instance['instagram_txt'] = (!empty($new_instance['instagram_txt'])) ? strip_tags($new_instance['instagram_txt']) : '';
        $instance['instagram_url'] = (!empty($new_instance['instagram_url'])) ? strip_tags($new_instance['instagram_url']) : '';
        $instance['linkedin_txt'] = (!empty($new_instance['linkedin_txt'])) ? strip_tags($new_instance['linkedin_txt']) : '';
        $instance['linkedin_url'] = (!empty($new_instance['linkedin_url'])) ? strip_tags($new_instance['linkedin_url']) : '';
        $instance['twitter_txt'] = (!empty($new_instance['twitter_txt'])) ? strip_tags($new_instance['twitter_txt']) : '';
        $instance['twitter_url'] = (!empty($new_instance['twitter_url'])) ? strip_tags($new_instance['twitter_url']) : '';
        $instance['dribbble_txt'] = (!empty($new_instance['dribbble_txt'])) ? strip_tags($new_instance['dribbble_txt']) : '';
        $instance['dribbble_url'] = (!empty($new_instance['dribbble_url'])) ? strip_tags($new_instance['dribbble_url']) : '';
        $instance['whatsapp_txt'] = (!empty($new_instance['whatsapp_txt'])) ? strip_tags($new_instance['whatsapp_txt']) : '';
        $instance['whatsapp_url'] = (!empty($new_instance['whatsapp_url'])) ? strip_tags($new_instance['whatsapp_url']) : '';
        $instance['pinterest_txt'] = (!empty($new_instance['pinterest_txt'])) ? strip_tags($new_instance['pinterest_txt']) : '';
        $instance['pinterest_url'] = (!empty($new_instance['pinterest_url'])) ? strip_tags($new_instance['pinterest_url']) : '';
        $instance['youtube_txt'] = (!empty($new_instance['youtube_txt'])) ? strip_tags($new_instance['youtube_txt']) : '';
        $instance['youtube_url'] = (!empty($new_instance['youtube_url'])) ? strip_tags($new_instance['youtube_url']) : '';
        return $instance;
    }
}

if (!function_exists('Egns_Social_Link_Widget')) {
    function Egns_Social_Link_Widget()
    {
        register_widget('Egns_Social_Link_Widget');
    }
    add_action('widgets_init', 'Egns_Social_Link_Widget');
}
