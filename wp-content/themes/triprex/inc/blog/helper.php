<?php

namespace Egns\Inc;

if (!class_exists('Blog_Helper')) {

    class Blog_Helper
    {

        /**
         * Initializes a singleton instance
         *
         * @return \Blog_Helper
         */
        public static function init()
        {
            static $instance = false;

            if (!$instance) {
                $instance = new self();
            }

            return $instance;
        }

        /**
         * Main construcutor 
         *
         * @return void
         */
        public function __construct()
        {
            // slient is golden
        }

        /**
         * blog pagination
         *
         * @return void
         */
        public static function egns_pagination()
        {
            global $wp_query;
            if ($wp_query->max_num_pages > 1) {
                $links = paginate_links(array(
                    'current'       => max(1, get_query_var('paged')),
                    'total'         => $wp_query->max_num_pages,
                    'type'          => 'list',
                    'mid_size'      => 3,
                    'prev_text'     => '<b class="shop-pagi-btn"><i class="bi bi-chevron-left"></i></b>',
                    'next_text'     => '<b class="shop-pagi-btn"><i class="bi bi-chevron-right"></i></b>',
                ));
                $links = str_replace("<ul class='page-numbers'>", "<ul class='pagination-list'>", $links);
                $links = str_replace("<li>", "<li>", $links);
                $links = str_replace("page-numbers", "", $links);
                $links = str_replace("&laquo; Previous</a>", '&laquo;</a>', $links);
                $links = str_replace("Next &raquo;</a>", "&raquo;</a>", $links);
                $links = str_replace("next aria-label='Next'", "page-link", $links);
                $links = str_replace("prev aria-hidden='true'", "sr-only page-link", $links);
                $links = str_replace("<li><span", " <li><a class='active'", $links);
                $links = str_replace('span', 'a', $links);
                $links = preg_replace('/>([0-9])</', '>0$1<', $links);
                echo wp_kses_post($links);
            }
        }

        /**
         * blog post pagination  
         *
         * @return void
         */
        public static function egns_post_pagination()
        {
            wp_link_pages(
                array(
                    'before'           => '<ul class="pagination d-flex justify-content-center align-items-center"><span class="page-title">' . esc_html__('Pages: ', 'triprex') . '</span><li>',
                    'after'            => '</li></ul>',
                    'link_before'      => '',
                    'link_after'       => '',
                    'next_or_number'   => 'number',
                    'separator'        => '</li><li>',
                    'pagelink'         => '%',
                    'echo'             => 1
                )
            );
        }


        /**
         * Retrieves an HTML link to the author page of the current post's author.
         *
         * Returns an HTML-formatted link using get_author_posts_url().
         *
         * @since 1.1.0
         *
         */
        public static function get_the_author_posts_link()
        {

            $author_id = get_the_author_meta('ID');
            $author_posts_link = get_author_posts_url($author_id);
?>
            <a href="<?php echo esc_url($author_posts_link) ?>">(<?php echo esc_html__('By ', 'triprex') . get_the_author_meta('display_name') ?>)</a>
            <?php

        }


        /**
         * @return [string] video url for video post
         */
        public static function egns_embeded_video($width = '', $height = '')
        {
            $url = esc_url(get_post_meta(get_the_ID(), 'egns_video_url', 1));
            if (!empty($url)) {
                return wp_oembed_get($url, array('width' => $width, 'height' => $height));
            }
        }


        /**
         * @return [string] Has embed video for video post.
         */
        public static function has_egns_embeded_video()
        {
            $url = esc_url(get_post_meta(get_the_ID(), 'egns_video_url', 1));
            if (!empty($url)) {
                return true;
            } else {
                return false;
            }
        }


        /**
         * 
         * @return [string] audio url for audio post
         */
        public static function egns_embeded_audio($width, $height)
        {
            $url = esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', 1));
            if (!empty($url)) {
                return '<div class="post-media">' . wp_oembed_get($url, array('width' => $width, 'height' => $height)) . '</div>';
            }
        }

        /**
         * @return [string] Checks For Embed Audio In The Post.
         */
        public static function egns_has_embeded_audio()
        {
            $url = esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', 1));
            if (!empty($url)) {
                return true;
            } else {
                return false;
            }
        }


        /**
         * @return [string] Embed gallery for the post.
         */
        public static function egns_gallery_images()
        {
            $images = get_post_meta(get_the_ID(), 'egns_gallery_images', 1);

            $images = explode(',', $images);
            if ($images && count($images) > 1) {
                $gallery_slide = '<div class="swiper blog-archive-slider">';
                $gallery_slide .= '<div class="swiper-wrapper">';
                foreach ($images as $image) {
                    $gallery_slide .= '<div class="swiper-slide"><a href="' . get_the_permalink() . '"><img src="' . wp_get_attachment_image_url($image, 'full') . '" alt="' . esc_attr(get_the_title()) . '"></a></div>';
                }
                $gallery_slide .= '</div>';
                $gallery_slide .= '</div>';

                $gallery_slide .= '<div class="slider-arrows arrows-style-2 sibling-3 text-center d-flex flex-row justify-content-between align-items-center w-100">';
                $gallery_slide .= '<div class="blog1-prev swiper-prev-arrow" tabindex="0" role="button" aria-label="' . esc_html('Previous slide') . '"> <i class="bi bi-arrow-left"></i> </div>';

                $gallery_slide .= '<div class="blog1-next swiper-next-arrow" tabindex="0" role="button" aria-label="' . esc_html('Next slide') . '"><i class="bi bi-arrow-right"></i></div>';
                $gallery_slide .= '</div>';

                return $gallery_slide;
            }
        }

        /**
         * @return [string] Has Gallery for Gallery post.
         */
        public static function has_egns_gallery()
        {
            $images = get_post_meta(get_the_ID(), 'egns_gallery_images', 1);
            if (!empty($images)) {
                return true;
            } else {
                return false;
            }
        }


        /**
         * @return string get the attachment image.
         */
        public static function egns_thumb_image()
        {
            $image = get_post_meta(get_the_ID(), 'egns_thumb_images', 1);
            echo '<a href="' . get_the_permalink() . '"><img src="' . $image['url'] . '" alt="' . esc_attr("image") . ' "class="img-fluid wp-post-image"></a>';
        }

        /**
         * @return [quote] text for quote post
         */
        public static function egns_quote_content()
        {
            $text =  get_post_meta(get_the_ID(), 'egns_quote_text', 1);
            if (!empty($text)) {
                return sprintf(esc_attr__('%s', 'triprex'), $text);
            }
        }
        /**
         * @return [quote] author for quote post
         */
        public static function egns_quote_author()
        {
            $author_name =  get_post_meta(get_the_ID(), 'egns_quote_author', 1);
            if (!empty($author_name)) {
                return sprintf(esc_attr__('%s', 'triprex'), $author_name);
            }
        }

        /**
         * Set post views count using post meta
         *
         * @return void
         */

        public static function customSetPostViews($postID)
        {
            $countKey = 'post_views_count';
            $count = get_post_meta($postID, $countKey, true);

            if ($count == '') {
                $count = 1; // Set initial count if it doesn't exist
                add_post_meta($postID, $countKey, $count, true);
            } else {
                $count++;
                update_post_meta($postID, $countKey, $count);
            }
        }
        /**
         * post views count format
         *
         * @return void
         */
        public static function format_post_views_count($count)
        {
            if (!empty($count) && ($count >= 1000)) {
                $count_formatted = sprintf('%.1fk', $count / 1000); // Format the count in "x.xk" format
            } else {
                $count_formatted = $count;
            }
            return $count_formatted;
        }
        /**
         * calculating reading times
         *
         * @return void
         */
        public static function calculate_reading_time($content)
        {
            // Count the number of words in the content.
            $word_count = str_word_count(strip_tags($content));

            // Minimum reading time is 1 minute.
            $reading_time = max(1, round($word_count / 200));

            return $reading_time;
        }
        /**
         * get post thumb with post format with class (Grid)
         *
         * @return void 
         */
        public static function get_the_post_thumb_with_format_grid()
        {
            $format = get_post_format() ?: 'standard';

            if ($format === 'standard' && has_post_thumbnail()) {
            ?>
                <div class="blog-card-img-wrap">
                    <a href="<?php the_permalink() ?>" class="card-img"><?php the_post_thumbnail('blog-grid-thumb') ?></a>
                    <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="date">
                        <span><strong><?php echo get_the_date('d'); ?></strong> <br> <?php echo get_the_date('F'); ?></span>
                    </a>
                </div>
            <?php
            }

            if ($format === 'audio' && self::egns_has_embeded_audio()) {
            ?>
                <div class="post-audio">
                    <?php echo self::egns_embeded_audio('100%', '100%'); ?>
                </div>
            <?php
            }

            if ($format === 'video' && self::has_egns_embeded_video()) {
            ?>
                <div class="post-video">
                    <?php echo self::egns_embeded_video(); ?>
                </div>
            <?php
            }

            if ($format === 'gallery' && self::has_egns_gallery()) {
            ?>
                <div class="post-gallery">
                    <?php echo self::egns_gallery_images('100%', '100%'); ?>
                </div>
            <?php
            }

            if ($format === 'quote' && !empty(self::egns_quote_content())) {
            ?>
                <div class="post-quote">
                    <blockquote>
                        <p class="blockquote-text">
                            <?php echo self::egns_quote_content(); ?>
                        </p>
                        <h3 class="blockquote-author">
                            <?php echo self::egns_quote_author(); ?>
                        </h3>
                    </blockquote>
                </div>
            <?php
            }

            if ($format === 'image') {
            ?>
                <div class="post-image">
                    <?php self::egns_thumb_image(); ?>
                </div>
            <?php
            }
        }
        /**
         * get post thumb with post format with class (Standard)
         *
         * @return void 
         */
        public static function get_the_post_thumb_with_format_standard()
        {
            $format = get_post_format() ?: 'standard';

            if ($format === 'standard' && has_post_thumbnail()) {
            ?>
                <div class="blog-img-wrap">
                    <a href="<?php the_permalink() ?>" class="card-img"><?php the_post_thumbnail() ?></a>
                    <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="date">
                        <span><strong><?php echo get_the_date('d'); ?></strong> <br> <?php echo get_the_date('F'); ?></span>
                    </a>
                </div>
            <?php
            }

            if ($format === 'audio' && self::egns_has_embeded_audio()) {
            ?>
                <div class="post-audio">
                    <?php echo self::egns_embeded_audio('100%', '100%'); ?>
                </div>
            <?php
            }

            if ($format === 'video' && self::has_egns_embeded_video()) {
            ?>
                <div class="post-video">
                    <?php echo self::egns_embeded_video(); ?>
                </div>
            <?php
            }

            if ($format === 'gallery' && self::has_egns_gallery()) {
            ?>
                <div class="post-gallery">
                    <?php echo self::egns_gallery_images('100%', '100%'); ?>
                </div>
            <?php
            }

            if ($format === 'quote' && !empty(self::egns_quote_content())) {
            ?>
                <div class="post-quote">
                    <blockquote>
                        <p class="blockquote-text">
                            <?php echo self::egns_quote_content(); ?>
                        </p>
                        <h3 class="blockquote-author">
                            <?php echo self::egns_quote_author(); ?>
                        </h3>
                    </blockquote>
                </div>
            <?php
            }

            if ($format === 'image') {
            ?>
                <div class="blog-img-wrap">
                    <a href="<?php the_permalink() ?>" class="card-img"><?php the_post_thumbnail() ?></a>
                </div>
            <?php
            }
        }
        /**
         * get post thumb with post format with class (Single)
         *
         * @return void 
         */
        public static function get_the_post_thumb_with_format_single()
        {
            $format = get_post_format() ?: 'standard';

            if ($format === 'standard' && has_post_thumbnail()) {
            ?>
                <div class="post-thumb mb-30">
                    <?php the_post_thumbnail() ?>
                </div>
            <?php
            }

            if ($format === 'audio' && self::egns_has_embeded_audio()) {
            ?>
                <div class="post-audio">
                    <?php echo self::egns_embeded_audio('100%', '100%'); ?>
                </div>
            <?php
            }

            if ($format === 'video' && self::has_egns_embeded_video()) {
            ?>
                <div class="post-video">
                    <?php echo self::egns_embeded_video(); ?>
                </div>
            <?php
            }

            if ($format === 'gallery' && self::has_egns_gallery()) {
            ?>
                <div class="post-gallery">
                    <?php echo self::egns_gallery_images('100%', '100%'); ?>
                </div>
            <?php
            }

            if ($format === 'quote' && !empty(self::egns_quote_content())) {
            ?>
                <div class="post-quote">
                    <blockquote>
                        <p class="blockquote-text">
                            <?php echo self::egns_quote_content(); ?>
                        </p>
                        <h3 class="blockquote-author">
                            <?php echo self::egns_quote_author(); ?>
                        </h3>
                    </blockquote>
                </div>
            <?php
            }

            if ($format === 'image') {
            ?>
                <div class="post-thumb mb-30">
                    <?php the_post_thumbnail() ?>
                </div>
            <?php
            }
        }

        /**
         * Blog Post Is Sticky
         *
         * @return void
         */

        public static function egns_blog_is_sticky()
        {
            ?>
            <?php if (is_sticky(get_the_ID())) { ?>
                <div class="sticky-post-icon">
                    <i class="bi bi-pin-angle"></i>
                </div>
            <?php } ?>
<?php
        }
    }

    Blog_Helper::init();
}
