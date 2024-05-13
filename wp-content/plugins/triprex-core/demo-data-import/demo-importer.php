<?php

/**
 * One Click Install
 * @return Import Demos - Needed Import Demo's
 */
function egens_core_import_files()
{

	return array(
		array(
			'import_file_name'           => esc_html('Triprex'),
			'import_file_url'            => trailingslashit(EGNS_CORE_ROOT_URL) . 'demo-data-import/demo-data/contents.xml?ver=1.0',
			'import_widget_file_url'     => trailingslashit(EGNS_CORE_ROOT_URL) . 'demo-data-import/demo-data/widgets.wie?ver=1.0',
			'import_customizer_file_url' => trailingslashit(EGNS_CORE_ROOT_URL) . 'demo-data-import/demo-data/customizer.dat?ver=1.0',
			'import_notice'              => __('Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'triprex-core'),
			'preview_url'                => '#',
		),
	);
}
add_filter('ocdi/import_files', 'egens_core_import_files');


function egens_core_after_import_setup()
{
	// Assign menus to their locations.
	$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary-menu' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title('Home 01');
	$blog_page_id  = get_page_by_title('Blog Standard');

	update_option('show_on_front', 'page');
	update_option('page_on_front', $front_page_id->ID);
	update_option('page_for_posts', $blog_page_id->ID);

	$options_data = file_get_contents(EGNS_CORE_ROOT_URL . 'demo-data-import/demo-data/theme_option.txt'); // set file path 'EGNS_CORE_ROOT_URL'
	$out = wp_kses_post_deep(json_decode(trim($options_data), true));
	update_option('egns_theme_options', $out); // update option with proper option table name 'egns_theme_options'

	activate_plugin_by_name('reviewx', 'reviewx.php');

	// Update permalink 
	update_option('permalink_structure', '/%postname%/');
	flush_rewrite_rules();


	/* WooCommerce Settings */
	function woocommerce_settings()
	{
		$woopages = array(
			'woocommerce_shop_page_id'      => 'Shop',
			'woocommerce_cart_page_id'      => 'Cart',
			'woocommerce_checkout_page_id'  => 'Checkout',
			'woocommerce_myaccount_page_id' => 'My Account',
			'yith_wcwl_wishlist_page_id'    => 'Wishlist',
		);
		foreach ($woopages as $woo_page_name => $woo_page_title) {
			$woopage = get_page_by_title($woo_page_title);
			if (isset($woopage->ID) && $woopage->ID) {
				update_option($woo_page_name, $woopage->ID);
			}
		}


		if (class_exists('WC_Admin_Notices')) {
			WC_Admin_Notices::remove_notice('install');
		}
		delete_transient('_wc_activation_redirect');
	}

	/* Update WooCommerce Loolup Table */
	function update_woocommerce_lookup_table()
	{
		if (function_exists('wc_update_product_lookup_tables_is_running') && function_exists('wc_update_product_lookup_tables')) {
			if (!wc_update_product_lookup_tables_is_running()) {
				if (!defined('WP_CLI')) {
					define('WP_CLI', true);
				}
				wc_update_product_lookup_tables();
			}
		}
	}

	woocommerce_settings();
	update_woocommerce_lookup_table();

	// Global Update permalink 
	global $wp_rewrite;
	//Write the rule
	$wp_rewrite->set_permalink_structure('/%postname%/');
	//Set the option
	update_option("rewrite_rules", FALSE);
	//Flush the rules and tell it to write htaccess
	$wp_rewrite->flush_rules(true);
}
add_action('ocdi/after_import', 'egens_core_after_import_setup');

// Before content upload
function ocdi_before_content_import($selected_import)
{
	$get_posts = get_posts(array(
		'post_type' => array('page'),
		'posts_per_page' => -1,
	));

	if (!empty($get_posts)) {
		foreach ($get_posts as $post) {
			if ($post->post_title == 'Shop' || $post->post_title == 'Cart' || $post->post_title == 'Checkout' || $post->post_title == 'My Orders' || $post->post_title == 'My account' || $post->post_title == '' || $post->post_title == 'Wishlist' || $post->post_type == 'Refund and Returns Policy') {
				wp_delete_post($post->ID, true);
			}
		}
	}

	deactivate_plugin_by_name('reviewx', 'reviewx.php');
}
add_action('ocdi/before_content_import', 'ocdi_before_content_import');
/**
 * Helper function to deactivate a plugin.
 *
 * @param string $plugin_folder The folder name of the plugin.
 * @param string $plugin_file The main file of the plugin.
 */
function deactivate_plugin_by_name($plugin_folder, $plugin_file)
{
	$plugin_path = $plugin_folder . '/' . $plugin_file;

	// Check if the plugin is already active
	if (is_plugin_active($plugin_path)) {
		// Include the necessary WordPress core file
		include_once(ABSPATH . 'wp-admin/includes/plugin.php');

		// Deactivate the plugin
		deactivate_plugins($plugin_path);

		// Optionally, you can perform additional actions after deactivation
		// For example, you might want to display a message to the user
		return 'Plugin deactivated successfully.';
	} else {
		return 'Plugin is not active.';
	}
}

/**
 * Helper function to activate a plugin.
 *
 * @param string $plugin_folder The folder name of the plugin.
 * @param string $plugin_file The main file of the plugin.
 */
function activate_plugin_by_name($plugin_folder, $plugin_file)
{
	$plugin_path = $plugin_folder . '/' . $plugin_file;

	// Include the necessary WordPress core file
	include_once(ABSPATH . 'wp-admin/includes/plugin.php');

	// Activate the plugin
	activate_plugin($plugin_path);

	// Optionally, you can perform additional actions after activation
	// For example, you might want to display a message to the user
	return 'Plugin activated successfully.';
}

// Model Popup - Width Increased
function egens_core_ocdi_confirmation_dialog_options($options)
{
	return array_merge($options, array(
		'width'       => 600,
		'dialogClass' => 'wp-dialog',
		'resizable'   => false,
		'height'      => 'auto',
		'modal'       => true,
	));
}
add_filter('ocdi/confirmation_dialog_options', 'egens_core_ocdi_confirmation_dialog_options', 10, 1);



// Disable the branding notice - ProteusThemes
add_filter('ocdi/disable_pt_branding', '__return_true');

function ocdi_plugin_intro_text($default_text)
{
	$default_text .= '<h1>Import Demo</h1>
    <div class="egens_toolkit_intro-text dl-demo-one-click">
    <div id="poststuff">

      <div class="postbox important-notes">
        <h3><span>Important notes:</span></h3>
        <div class="inside">
          <ol>
            <li>Please note, this import process will take time. So, please be patient.</li>
			<li>Please make sure you\'ve installed recommended plugins before you import this content.</li>
            <li>All images are demo purposes only. So, images may repeat in your site content.</li>
          </ol>
        </div>
      </div>
    </div>
  </div>';

	return $default_text;
}
add_filter('ocdi/plugin_intro_text', 'ocdi_plugin_intro_text');
