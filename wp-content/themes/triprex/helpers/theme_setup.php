<?php


namespace Egns\Helper;

if (!class_exists('Egns_Theme_Setup')) {


    // Set the content width based on the theme's design and stylesheet.
    if (!isset($content_width)) {
        $content_width = 1140; /* pixels */
    }


    /**
     * Egns Theme Setup handlers class
     */
    class Egns_Theme_Setup
    {

        /**
         * Egns Helper Class constructor
         */
        function __construct()
        {

            // Add pingback header
            add_action('wp_head', array($this, 'egns_add_pingback_header'), 1);

            // Add theme's supports feature
            add_action('after_setup_theme', array($this, 'egns_set_theme_support'));

            // Include modules
            add_action('after_setup_theme', array($this, 'egns_include_helpers'));

            // Include modules
            add_action('after_setup_theme', array($this, 'egns_register_nav_menu'));

            // Register sidebar & footer widget 
            add_action('widgets_init', array($this, 'egns_register_widgets'));
        }

        /**
         * Register all nav menus
         * 
         * @return void
         * 
         * @since 1.1.0
         * .+
         */
        public function egns_register_nav_menu()
        {

            // Theme menu register
            register_nav_menus(array(
                'primary-menu' => esc_html__('Primary Menu', 'triprex'),
            ));
        }

        /**
         * Add pingback header 
         * 
         * @return void
         * 
         * @since 1.1.0
         */
        public function egns_add_pingback_header()
        {
            if (is_singular() && pings_open(get_queried_object())) { ?>
                <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
<?php
            }
        }

        /**
         * Main theme support function
         * 
         * @return void
         * @since 1.1.0
         */
        public function egns_set_theme_support()
        {

            // Make theme available for translation
            load_theme_textdomain('triprex', EGNS_ROOT . '/languages');

            // Add support for feed links
            add_theme_support('automatic-feed-links');

            // Add support for title tag
            add_theme_support('title-tag');

            // Add support for post thumbnails
            add_theme_support('post-thumbnails');

            // Add theme support for Custom Logo
            add_theme_support('custom-logo');

            // Add support for full and wide align images.
            add_theme_support('align-wide');

            // Add support for post formats
            add_theme_support('post-formats', array('gallery', 'video', 'audio', 'quote', 'image'));

            // Add support for Block Styles.
            add_theme_support('wp-block-styles');

            // Add support for full and wide align images.
            add_theme_support('align-wide');

            // Add support for editor styles.
            add_theme_support('editor-styles');

            //Enable custom header for theme.
            add_theme_support("custom-header");

            //Responsive embedded content
            add_theme_support('responsive-embeds');

            // Woocommerce support
            add_theme_support('woocommerce');
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');

            // Add custom image size
            add_image_size('card-thumb', 650, 450, true); // Tours, Hotel, Transports Card Image Size
            add_image_size('blog-grid-thumb', 400, 280, true); // Blog Grid Thumb Image Size

        }

        /**
         * Include all modules file inside inc
         * 
         * @return void
         * 
         * @since 1.1.0
         */
        public function egns_include_helpers()
        {

            // Hook to include additional files before helper includes
            do_action('egns_action_before_include_helpers');

            foreach (glob(EGNS_INC_ROOT_DIR . '/*/helper.php') as $module) {
                include_once $module;
            }

            // Hook to include additional files after helper includes
            do_action('egns_action_after_include_helpers');
        }

        /**
         * Register blog sidebar
         * 
         * @return void
         * 
         * @since 1.1.0
         */
        public function egns_register_widgets()
        {
            register_sidebar(array(
                'name'          => esc_html__('Blog Sidebar', 'triprex'),
                'id'            => 'blog_sidebar',
                'description'   => esc_html__('This sidebar will apply to your blog list and blog details page', 'triprex'),
                'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>',
            ));
        }
    }
}
