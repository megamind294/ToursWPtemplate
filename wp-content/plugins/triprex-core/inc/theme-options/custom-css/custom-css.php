<?php
if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
function egnsCustomStyling()
{
    $custom_css = "";
    $egns_theme_options = get_option('egns_theme_options');
    $egns_page_options = get_post_meta(get_the_ID(), 'egns_page_options', true);


    /**************************
     * Primary Color Start
     *************************/

    $primary_color = $egns_theme_options['primary_theme_color'] ?? '';

    if (!empty($primary_color)) {
        $custom_css .= "
            :root{
                --primary-color1: $primary_color !important;
            }
        ";
    }
    $secondary_theme_color = $egns_theme_options['secondary_theme_color'] ?? '';

    if (!empty($secondary_theme_color)) {
        $custom_css .= "
            :root{
                --primary-color2: $secondary_theme_color !important;
            }
        ";
    }
    /**************************
     * Primary Color End
     *************************/

    /**************************
     * Header Style Start 
     *************************/

    /************************** Header Style *************************/
    // $header_menu_color = $egns_theme_options['header_menu_color'] ?? '';
    // $header_menu_hover_color = $egns_theme_options['header_menu_hover_color'] ?? '';
    // $header_others_color = $egns_theme_options['header_others_color'] ?? '';

    // if (!empty($header_menu_color)) {
    //     $custom_css .= "
    //     header.style-1 .main-menu ul > li a,#app header .main-menu ul > li.has-mega-menu ul.sub-menu.row.mega-col-4 > li > a{
    //         color: $header_menu_color !important;
    //     }
    // ";
    // }

    // if (!empty($header_menu_hover_color)) {
    //     $custom_css .= "
    //     header.style-1 .main-menu ul > li.current-menu-parent > a, header.style-1 .main-menu ul > li.current-menu-item > a, header.style-1 .main-menu ul > li.current-menu-ancestor > a,header.style-1 .main-menu ul > li:hover > a{
    //         color: $header_menu_hover_color !important;
    //     }
    // ";
    // }


    // if (!empty($header_others_color)) {
    //     $custom_css .= "
    //     .top-bar .topbar-right ul li .sell-btn,.top-bar .topbar-right ul li a,header.style-1 .nav-right .modal-btn,header.style-1 .nav-right .hotline-area .content h6 a,header.style-1 .nav-right .hotline-area .content span{
    //         color: $header_others_color !important;
    //     }
    // ";
    // }
    // if (!empty($header_others_color)) {
    //     $custom_css .= "
    //     .top-bar .topbar-right ul li .sell-btn svg,.top-bar .topbar-right ul li a svg,.top-bar .topbar-right ul li a.primary-btn1 svg{
    //         fill: $header_others_color !important;
    //     }
    // ";
    // }

    /**************************
     * Header Style End
     *************************/

    /************************
     * Start Breadcrumb Style
     ************************/

    // Breadcrumb Title
    $breadcrumb_title = $egns_theme_options['breadcrumb_title_typography'] ?? '';

    $breadcrumb_title_font_family = $breadcrumb_title['font-family'] ?? '';
    $breadcrumb_title_font_size = $breadcrumb_title['font-size'] ?? '';
    $breadcrumb_title_text_transform = $breadcrumb_title['text-transform'] ?? '';
    $breadcrumb_title_text_align = $breadcrumb_title['text-align'] ?? '';
    $breadcrumb_title_color = $breadcrumb_title['color'] ?? '';

    if (!empty($breadcrumb_title_font_family)) {
        $custom_css .= "
        .breadcrumb-section .banner-content h1{
            font-family: $breadcrumb_title_font_family " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_title_font_size)) {
        $custom_css .= "
        .breadcrumb-section .banner-content h1{
            font-size: $breadcrumb_title_font_size" . 'px !important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_title_text_transform)) {
        $custom_css .= "
        .breadcrumb-section .banner-content h1{
            text-transform: $breadcrumb_title_text_transform " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_title_text_align)) {
        $custom_css .= "
        .breadcrumb-section .banner-content h1{
            text-align: $breadcrumb_title_text_align " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_title_color)) {
        $custom_css .= "
        .breadcrumb-section .banner-content h1{
            color: $breadcrumb_title_color " . '!important' . ";
        }
    ";
    }
    // Breadcrumb Link
    $breadcrumb_link = $egns_theme_options['breadcrumb_link_typography'] ?? '';

    $breadcrumb_link_font_family = $breadcrumb_link['font-family'] ?? '';
    $breadcrumb_link_font_size = $breadcrumb_link['font-size'] ?? '';
    $breadcrumb_link_text_transform = $breadcrumb_link['text-transform'] ?? '';
    $breadcrumb_link_text_align = $breadcrumb_link['text-align'] ?? '';
    $breadcrumb_link_color = $breadcrumb_link['color'] ?? '';

    if (!empty($breadcrumb_link_font_family)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li a{
            font-family: $breadcrumb_link_font_family " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_link_font_size)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li a{
            font-size: $breadcrumb_link_font_size" . 'px !important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_link_text_transform)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li a{
            text-transform: $breadcrumb_link_text_transform " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_link_text_align)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li a{
            text-align: $breadcrumb_link_text_align " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_link_color)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li a{
            color: $breadcrumb_link_color " . '!important' . ";
        }
    ";
    }

    // Breadcrumb Active 
    $breadcrumb_active = $egns_theme_options['breadcrumb_active_title_typography'] ?? '';

    $breadcrumb_active_font_family = $breadcrumb_active['font-family'] ?? '';
    $breadcrumb_active_font_size = $breadcrumb_active['font-size'] ?? '';
    $breadcrumb_active_text_transform = $breadcrumb_active['text-transform'] ?? '';
    $breadcrumb_active_text_align = $breadcrumb_active['text-align'] ?? '';
    $breadcrumb_active_color = $breadcrumb_active['color'] ?? '';

    if (!empty($breadcrumb_active_font_family)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li{
            font-family: $breadcrumb_active_font_family " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_active_font_size)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li{
            font-size: $breadcrumb_active_font_size" . 'px !important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_active_text_transform)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li{
            text-transform: $breadcrumb_active_text_transform " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_active_text_align)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li{
            text-align: $breadcrumb_active_text_align " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_active_color)) {
        $custom_css .= "
        .breadcrumb-section .banner-content .breadcrumb-list li{
            color: $breadcrumb_active_color " . '!important' . ";
        }
    ";
    }
    //Breadcrumb BG Color
    $breadcump_normal_color_background = $egns_theme_options['breadcump_normal_color_background'] ?? '';

    if (!empty($breadcump_normal_color_background)) {
        $custom_css .= "
        .breadcrumb-section{
            background-color: $breadcump_normal_color_background !important;
        }
    ";
    }
    //Breadcrumb BG Padding (Theme Options)
    $breadcrumb_bg_padding = $egns_theme_options['breadcrumb_bg_padding'] ?? '';

    if (!empty($breadcrumb_bg_padding)) {
        $top    = $breadcrumb_bg_padding['top'] ?? '0';
        $right  = $breadcrumb_bg_padding['right'] ?? '0';
        $bottom = $breadcrumb_bg_padding['bottom'] ?? '0';
        $left   = $breadcrumb_bg_padding['left'] ?? '0';
        $unit   = $breadcrumb_bg_padding['unit'] ?? 'px';

        $custom_css .= "
        #app .breadcrumb-section {
            padding: {$top}{$unit} {$right}{$unit} {$bottom}{$unit} {$left}{$unit};
        }
    ";
    }
    //Breadcrumb BG Padding (Page Options)
    $page_breadcrumb_bg_padding = $egns_page_options['page_breadcrumb_bg_padding'] ?? '';

    if (!empty($page_breadcrumb_bg_padding)) {
        $top    = $page_breadcrumb_bg_padding['top'] ?? '0';
        $right  = $page_breadcrumb_bg_padding['right'] ?? '0';
        $bottom = $page_breadcrumb_bg_padding['bottom'] ?? '0';
        $left   = $page_breadcrumb_bg_padding['left'] ?? '0';
        $unit   = $page_breadcrumb_bg_padding['unit'] ?? 'px';

        $custom_css .= "
        #app .breadcrumb-section {
            padding: {$top}{$unit} {$right}{$unit} {$bottom}{$unit} {$left}{$unit};
        }
    ";
    }

    /*********************
     * End Breadcrumb
     *********************/

    /*********************
     * Footer Style
     *********************/

    //Footer Background Color
    $footer_widget_area_background_color = $egns_theme_options['footer_widget_area_background_color'] ?? '';

    if (!empty($footer_widget_area_background_color)) {
        $custom_css .= "
        footer.footer-section{
            background-color: $footer_widget_area_background_color !important;
        }
    ";
    }
    //Footer Background Image
    $footer_widget_area_background_img = $egns_theme_options['footer_widget_area_background_img']['url'] ?? '';

    if (!empty($footer_widget_area_background_img)) {
        $custom_css .= "
        footer.footer-section {
            background-image: url($footer_widget_area_background_img), linear-gradient(180deg, #1d231f 0%, #1d231f 100%);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: relative;
        }
    ";
    }
    //Footer Background Image (Page Options)
    $footer_page_bg_image = $egns_page_options['footer_page_bg_image']['url'] ?? '';

    if (!empty($footer_page_bg_image)) {
        $custom_css .= "
        footer.footer-section {
            background-image: url($footer_page_bg_image), linear-gradient(180deg, #1d231f 0%, #1d231f 100%);
        }
    ";
    }
    // ................
    //Sidebar Background Image
    $sidebar_area_bg_img = $egns_theme_options['sidebar_area_bg_img']['url'] ?? '';

    if (!empty($sidebar_area_bg_img)) {
        $custom_css .= "
        #app .right-sidebar-menu {
            background-image: url($sidebar_area_bg_img);

        }
    ";
    }
    //Sidebar Background Color
    $sidebar_area_bg_color = $egns_theme_options['sidebar_area_bg_color'] ?? '';

    if (!empty($sidebar_area_bg_color)) {
        $custom_css .= "
        .right-sidebar-menu{
            background-color: $sidebar_area_bg_color !important;
        }
    ";
    }






    wp_register_style('egns-stylesheet', false);
    wp_enqueue_style('egns-stylesheet', false);
    wp_add_inline_style('egns-stylesheet', $custom_css, true);
}
if (class_exists('CSF')) {
    add_action('wp_enqueue_scripts', 'egnsCustomStyling');
}
