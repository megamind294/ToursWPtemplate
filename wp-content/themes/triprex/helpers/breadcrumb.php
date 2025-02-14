<?php

if (!function_exists('egns_breadcrumb')) {

    /**
     * Show breadcrumbs navigation links.
     *
     * @param   string $list_style.
     * @param   string $list_id parent id.
     * @param   string $list_class parent classs.
     * @param   string $active_class when the link is active.
     * @param   bool $list_class is echo.
     * @return  string an html navigation links.
     * @since   1.1.0
     */
    function egns_breadcrumb($list_style = 'ul', $list_id = 'breadcrumb-list', $list_class = 'breadcrumb-list', $active_class = 'active', $echo = true)
    {
        // Get text domain for translations
        $theme = wp_get_theme();

        // Open list
        $breadcrumb = '<' . $list_style . ' id="' . $list_id . '" class="' . $list_class . '">';

        // Front page
        if (is_front_page()) {
            $breadcrumb .= '<li class="' . $active_class . '"> ' . esc_html('Home') . ' </li>';
        } else {
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . esc_url(home_url()) . '"> ' . esc_html('Home') . ' </a></li>';
        }

        // Blog archive
        if ('page' == get_option('show_on_front') && get_option('page_for_posts')) {
            $blog_page_id = get_option('page_for_posts');

            if (is_home()) {
                $breadcrumb .= '<li class="' . $active_class . '">' . esc_html(get_the_title($blog_page_id))  . '</li>';
            } else if (is_category() || is_tag() || is_author() || is_date() || is_singular('post')) {
                $breadcrumb .= '<li class="' . $active_class . '"><a href="' . esc_url(get_permalink($blog_page_id)) . '">' . esc_html(get_the_title($blog_page_id))  . '</a></li>';
            }
        }

        //Category, tag, author and date archives
        if (is_archive() && !is_tax() && !is_post_type_archive()) {
            $breadcrumb .= '<li class="' . $active_class . '">';

            // Title of archive
            if (is_category()) {
                $breadcrumb .= single_cat_title('', false);
            } else if (is_tag()) {
                $breadcrumb .= single_tag_title('', false);
            } else if (is_author()) {
                $breadcrumb .= get_the_author();
            } else if (is_date()) {
                if (is_day()) {
                    $breadcrumb .= get_the_time('F j, Y');
                } else if (is_month()) {
                    $breadcrumb .= get_the_time('F, Y');
                } else if (is_year()) {
                    $breadcrumb .= get_the_time('Y');
                }
            }

            $breadcrumb .= '</li>';
        }

        // Posts
        if (is_singular('post')) {

            // Post title
            $breadcrumb .= '<li class="' . $active_class . '">' . esc_html(get_the_title()) . '</li>';
        }

        // Pages
        if (is_page() && !is_front_page()) {
            $post = get_post(get_the_ID());

            // Page parents
            if ($post->post_parent) {
                $parent_id  = $post->post_parent;
                $crumbs = array();

                while ($parent_id) {
                    $page = get_post($parent_id);
                    $crumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>';
                    $parent_id  = $page->post_parent;
                }

                $crumbs = array_reverse($crumbs);

                foreach ($crumbs as $crumb) {
                    $breadcrumb .= '<li class="breadcrumb-item">' . $crumb  . '</li>';
                }
            }

            // Page title
            $breadcrumb .=  '<li class="' . $active_class . '">' . esc_html(get_the_title()) . '</li>';
        }

        // Attachments
        if (is_attachment()) {

            // Attachment parent
            $post = get_post(get_the_ID());

            if ($post->post_parent) {
                $breadcrumb .= '<li class="breadcrumb-item"><a href="' . esc_url(get_permalink($post->post_parent)) . '">' . esc_html(get_the_title($post->post_parent)) . '</a></li>';
            }

            // Attachment title
            $breadcrumb .= '<li class="' . $active_class . '">' . esc_html(get_the_title()) . '</li>';
        }

        // Search
        if (is_search()) {
            $breadcrumb .= '<li class="' . $active_class . '">' . esc_html__('Search', 'triprex') . '</li>';
        }

        // 404
        if (is_404()) {
            $breadcrumb .= '<li class="' . $active_class . '">' . esc_html__('404', 'triprex') . '</li>';
        }

        // Custom Post Type Archive
        if (is_post_type_archive()) {
            $breadcrumb .= '<li class="' . $active_class . '">' . esc_html(post_type_archive_title('', false)) . '</li>';
        }

        // Custom Taxonomies
        if (is_tax()) {
            // Get the post types the taxonomy is attached to
            $current_term = get_queried_object();

            $attached_to = array();
            $post_types = get_post_types();

            foreach ($post_types as $post_type) {
                $taxonomies = get_object_taxonomies($post_type);

                if (in_array($current_term->taxonomy, $taxonomies)) {
                    $attached_to[] = $post_type;
                }
            }

            // Post type archive link
            $output = false;

            foreach ($attached_to as $post_type) {
                $cpt_obj = get_post_type_object($post_type);

                if (!$output && get_post_type_archive_link($cpt_obj->name)) {
                    $breadcrumb .= '<li class="' . $active_class . '"><a href="' . get_post_type_archive_link($cpt_obj->name) . '">' . esc_html($cpt_obj->labels->name) . '</a></li>';
                    $output = true;
                }
            }

            // Term title
            $breadcrumb .= '<li class="' . $active_class . '">' . esc_html(single_term_title('', false)) . '</li>';
        }

        // Custom Post Types
        if (is_single() && get_post_type() != 'post' && get_post_type() != 'attachment') {
            $cpt_obj = get_post_type_object(get_post_type());

            // Is cpt hierarchical like pages or posts?
            if (is_post_type_hierarchical($cpt_obj->name)) {

                // Cpt parents
                $post = get_post(get_the_ID());

                if ($post->post_parent) {
                    $parent_id  = $post->post_parent;
                    $crumbs = array();

                    while ($parent_id) {
                        $page = get_post($parent_id);
                        $crumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>';
                        $parent_id  = $page->post_parent;
                    }

                    $crumbs = array_reverse($crumbs);

                    foreach ($crumbs as $crumb) {
                        $breadcrumb .= '<li>' . $crumb . '</li>';
                    }
                }
            } else {
                // Like posts

                // Cpt archive
                if (get_post_type_archive_link($cpt_obj->name)) {
                    $breadcrumb .= '<li><a href="' . esc_url(get_post_type_archive_link($cpt_obj->name)) . '">' . esc_html($cpt_obj->labels->name) . '</a></li>';
                }

                // Get cpt taxonomies
                $cpt_taxes = get_object_taxonomies($cpt_obj->name);

                if ($cpt_taxes && is_taxonomy_hierarchical($cpt_taxes[0])) {
                    // Other taxes attached to the cpt could be hierachical, so need to look into that.
                    $cpt_terms = get_the_terms(get_the_ID(), $cpt_taxes[0]);

                    if (is_array($cpt_terms)) {
                        $output = false;

                        foreach ($cpt_terms as $cpt_term) {
                            if (!$output) {
                                $breadcrumb .= '<li><a href="' . esc_url(get_term_link($cpt_term->name, $cpt_taxes[0])) . '">' . esc_html($cpt_term->name) . '</a></li>';
                                $output = true;
                            }
                        }
                    }
                }
            }

            // Cpt title
            $breadcrumb .= '<li class="' . $active_class . '">' . esc_html(get_the_title()) . '</li>';
        }

        // Close list
        $breadcrumb .= '</' . $list_style . '>';

        // Ouput
        if ($echo) {
            echo sprintf(esc_html__('%s', 'triprex'), $breadcrumb);;
        } else {
            return $breadcrumb;
        }
    }
}
