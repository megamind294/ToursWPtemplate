<?php

/**
 * Custom Post Type
 * Author EgensLab
 * @since 1.1.0
 * */

if (!defined('ABSPATH')) {
	exit();  //exit if access directly
}
if (!class_exists('Triprex_Custom_Post_Type')) {
	class Triprex_Custom_Post_Type
	{

		//$instance variable
		private static $instance;

		public function __construct()
		{
			//register post type
			add_action('init', array($this, 'register_custom_post_type'));
		}

		/**
		 * get Instance
		 * @since  2.0.0
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register Custom Post Type
		 * @since  2.0.0
		 * */
		public function register_custom_post_type()
		{

			$all_post_type = array(

				// Custome post destination 
				[
					'post_type' => 'destination',
					'args'      => array(
						'label'       => esc_html__('Destination', 'triprex-core'),
						'description' => esc_html__('Destination', 'triprex-core'),
						'menu_icon'   => 'dashicons-admin-site',
						'labels'      => array(
							'name'               => esc_html_x('Destination', 'Post Type General Name', 'triprex-core'),
							'singular_name'      => esc_html_x('Destination', 'Post Type Singular Name', 'triprex-core'),
							'menu_name'          => esc_html__('Destination', 'triprex-core'),
							'all_items'          => esc_html__('All Destination', 'triprex-core'),
							'view_item'          => esc_html__('View Destination', 'triprex-core'),
							'add_new_item'       => esc_html__('Add New Destination', 'triprex-core'),
							'add_new'            => esc_html__('Add New Destination', 'triprex-core'),
							'edit_item'          => esc_html__('Edit Destination', 'triprex-core'),
							'update_item'        => esc_html__('Update Destination', 'triprex-core'),
							'search_items'       => esc_html__('Search Destination', 'triprex-core'),
							'not_found'          => esc_html__('Not Found', 'triprex-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'triprex-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'destination', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
					)
				],

				// Custome post hotel
				[
					'post_type' => 'hotel',
					'args'      => array(
						'label'       => esc_html__('Hotels', 'triprex-core'),
						'description' => esc_html__('Hotels', 'triprex-core'),
						'menu_icon'   => 'dashicons-admin-home',
						'labels'      => array(
							'name'               => esc_html_x('Hotels', 'Post Type General Name', 'triprex-core'),
							'singular_name'      => esc_html_x('Hotels', 'Post Type Singular Name', 'triprex-core'),
							'menu_name'          => esc_html__('Hotels', 'triprex-core'),
							'all_items'          => esc_html__('All Hotel', 'triprex-core'),
							'view_item'          => esc_html__('View Hotel', 'triprex-core'),
							'add_new_item'       => esc_html__('Add New Hotel', 'triprex-core'),
							'add_new'            => esc_html__('Add New Hotel', 'triprex-core'),
							'edit_item'          => esc_html__('Edit Hotel', 'triprex-core'),
							'update_item'        => esc_html__('Update Hotel', 'triprex-core'),
							'search_items'       => esc_html__('Search Hotel', 'triprex-core'),
							'not_found'          => esc_html__('Not Found', 'triprex-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'triprex-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'hotel', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
					)
				],

				// Custome post activities 
				[
					'post_type' => 'activities',
					'args'      => array(
						'label'       => esc_html__('Activities', 'triprex-core'),
						'description' => esc_html__('Activities', 'triprex-core'),
						'menu_icon'   => 'dashicons-smiley',
						'labels'      => array(
							'name'               => esc_html_x('Activities', 'Post Type General Name', 'triprex-core'),
							'singular_name'      => esc_html_x('Activities', 'Post Type Singular Name', 'triprex-core'),
							'menu_name'          => esc_html__('Activities', 'triprex-core'),
							'all_items'          => esc_html__('All Activities', 'triprex-core'),
							'view_item'          => esc_html__('View Activities', 'triprex-core'),
							'add_new_item'       => esc_html__('Add New Activities', 'triprex-core'),
							'add_new'            => esc_html__('Add New Activities', 'triprex-core'),
							'edit_item'          => esc_html__('Edit Activities', 'triprex-core'),
							'update_item'        => esc_html__('Update Activities', 'triprex-core'),
							'search_items'       => esc_html__('Search Activities', 'triprex-core'),
							'not_found'          => esc_html__('Not Found', 'triprex-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'triprex-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'activities', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
					)
				],


				// Custome post Visa 
				[
					'post_type' => 'visa',
					'args'      => array(
						'label'       => esc_html__('Visa', 'triprex-core'),
						'description' => esc_html__('Visa', 'triprex-core'),
						'menu_icon'   => 'dashicons-id-alt',
						'labels'      => array(
							'name'               => esc_html_x('Visa', 'Post Type General Name', 'triprex-core'),
							'singular_name'      => esc_html_x('Visa', 'Post Type Singular Name', 'triprex-core'),
							'menu_name'          => esc_html__('Visa', 'triprex-core'),
							'all_items'          => esc_html__('All Visa', 'triprex-core'),
							'view_item'          => esc_html__('View Visa', 'triprex-core'),
							'add_new_item'       => esc_html__('Add New Visa', 'triprex-core'),
							'add_new'            => esc_html__('Add New Visa', 'triprex-core'),
							'edit_item'          => esc_html__('Edit Visa', 'triprex-core'),
							'update_item'        => esc_html__('Update Visa', 'triprex-core'),
							'search_items'       => esc_html__('Search Visa', 'triprex-core'),
							'not_found'          => esc_html__('Not Found', 'triprex-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'triprex-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'visa', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
					)
				],

				// Custome post tours 
				[
					'post_type' => 'tours',
					'args'      => array(
						'label'       => esc_html__('Tours', 'triprex-core'),
						'description' => esc_html__('Tours', 'triprex-core'),
						'menu_icon'   => 'dashicons-palmtree',
						'labels'      => array(
							'name'               => esc_html_x('Tours', 'Post Type General Name', 'triprex-core'),
							'singular_name'      => esc_html_x('Tours', 'Post Type Singular Name', 'triprex-core'),
							'menu_name'          => esc_html__('Tours', 'triprex-core'),
							'all_items'          => esc_html__('All Tours', 'triprex-core'),
							'view_item'          => esc_html__('View Tours', 'triprex-core'),
							'add_new_item'       => esc_html__('Add New Tours', 'triprex-core'),
							'add_new'            => esc_html__('Add New Tours', 'triprex-core'),
							'edit_item'          => esc_html__('Edit Tours', 'triprex-core'),
							'update_item'        => esc_html__('Update Tours', 'triprex-core'),
							'search_items'       => esc_html__('Search Tours', 'triprex-core'),
							'not_found'          => esc_html__('Not Found', 'triprex-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'triprex-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'tour', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
					)
				],


				// Custome post transport 
				[
					'post_type' => 'transport',
					'args'      => array(
						'label'       => esc_html__('Transport', 'triprex-core'),
						'description' => esc_html__('Transport', 'triprex-core'),
						'menu_icon'   => 'dashicons-airplane',
						'labels'      => array(
							'name'               => esc_html_x('Transport', 'Post Type General Name', 'triprex-core'),
							'singular_name'      => esc_html_x('Transport', 'Post Type Singular Name', 'triprex-core'),
							'menu_name'          => esc_html__('Transport', 'triprex-core'),
							'all_items'          => esc_html__('All Transport', 'triprex-core'),
							'view_item'          => esc_html__('View Transport', 'triprex-core'),
							'add_new_item'       => esc_html__('Add New Transport', 'triprex-core'),
							'add_new'            => esc_html__('Add New Transport', 'triprex-core'),
							'edit_item'          => esc_html__('Edit Transport', 'triprex-core'),
							'update_item'        => esc_html__('Update Transport', 'triprex-core'),
							'search_items'       => esc_html__('Search Transport', 'triprex-core'),
							'not_found'          => esc_html__('Not Found', 'triprex-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'triprex-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'transport', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
					)
				],

			);

			if (!empty($all_post_type) && is_array($all_post_type)) {
				foreach ($all_post_type as $post_type) {
					call_user_func_array('register_post_type', $post_type);
				}
			}

			/**
			 * Custom Taxonomy Register
			 */
			$all_custom_taxonmy = array(

				// Taxonomy for location post location-category
				array(
					'taxonomy'    => 'city-location',
					'object_type' => 'destination',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Location", 'triprex-core'),
							"singular_name" => esc_html__("Location", 'triprex-core'),
							"menu_name"     => esc_html__("Location", 'triprex-core'),
							"all_items"     => esc_html__("All Location", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Location", 'triprex-core'),
							"new_item_name" => esc_html__("New Location Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'location', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for post visa - country
				array(
					'taxonomy'    => 'country',
					'object_type' => 'visa',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Country", 'triprex-core'),
							"singular_name" => esc_html__("Country", 'triprex-core'),
							"menu_name"     => esc_html__("Country", 'triprex-core'),
							"all_items"     => esc_html__("All Country", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Country", 'triprex-core'),
							"new_item_name" => esc_html__("New Country Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'country', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				// Taxonomy for post visa - Visa-Type
				array(
					'taxonomy'    => 'visa-type',
					'object_type' => 'visa',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Visa Type", 'triprex-core'),
							"singular_name" => esc_html__("Visa Type", 'triprex-core'),
							"menu_name"     => esc_html__("Visa Type", 'triprex-core'),
							"all_items"     => esc_html__("All Visa Type", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Visa Type", 'triprex-core'),
							"new_item_name" => esc_html__("New Visa Type Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'visa-type', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				// Taxonomy for post visa - Visa-Mode
				array(
					'taxonomy'    => 'visa-mode',
					'object_type' => 'visa',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Visa Mode", 'triprex-core'),
							"singular_name" => esc_html__("Visa Mode", 'triprex-core'),
							"menu_name"     => esc_html__("Visa Mode", 'triprex-core'),
							"all_items"     => esc_html__("All Visa Mode", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Mode Type", 'triprex-core'),
							"new_item_name" => esc_html__("New Visa Mode Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'visa-mode', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				// Taxonomy for transport texonomy transport type
				array(
					'taxonomy'    => 'transport-type',
					'object_type' => 'transport',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Transport Type", 'triprex-core'),
							"singular_name" => esc_html__("Transport Type", 'triprex-core'),
							"menu_name"     => esc_html__("Transport Type", 'triprex-core'),
							"all_items"     => esc_html__("All Transport Type", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Transport Type", 'triprex-core'),
							"new_item_name" => esc_html__("New Transport Type Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'transport-type', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				// Taxonomy for post activities - activities-country
				array(
					'taxonomy'    => 'activities-country',
					'object_type' => 'activities',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Country", 'triprex-core'),
							"singular_name" => esc_html__("Country", 'triprex-core'),
							"menu_name"     => esc_html__("Country", 'triprex-core'),
							"all_items"     => esc_html__("All Country", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Country", 'triprex-core'),
							"new_item_name" => esc_html__("New Country Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'activities-country', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				array(
					'taxonomy'    => 'activities-type',
					'object_type' => 'activities',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Activities Type", 'triprex-core'),
							"singular_name" => esc_html__("Activities Type", 'triprex-core'),
							"menu_name"     => esc_html__("Activities Type", 'triprex-core'),
							"all_items"     => esc_html__("All Activities Type", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Activities Type", 'triprex-core'),
							"new_item_name" => esc_html__("New Activities Type Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'activities-type', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				// Taxonomy for post hotel - Room Type
				array(
					'taxonomy'    => 'room-type',
					'object_type' => 'hotel',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Room Type", 'triprex-core'),
							"singular_name" => esc_html__("Room Type", 'triprex-core'),
							"menu_name"     => esc_html__("Room Type", 'triprex-core'),
							"all_items"     => esc_html__("All Room Type", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Room Type", 'triprex-core'),
							"new_item_name" => esc_html__("New Room Type Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'room-type', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for post tour - pricing category
				array(
					'taxonomy'    => 'pricing-category',
					'object_type' => 'tours',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Pricing Category", 'triprex-core'),
							"singular_name" => esc_html__("Pricing Category", 'triprex-core'),
							"menu_name"     => esc_html__("Pricing Category", 'triprex-core'),
							"all_items"     => esc_html__("All Pricing Category", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Pricing Category", 'triprex-core'),
							"new_item_name" => esc_html__("New Pricing Category Name", 'triprex-core'),
						),
						"public"             => false,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'pricing-category', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => false,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for post tour - tour type
				array(
					'taxonomy'    => 'tour-types',
					'object_type' => 'tours',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Tour Type", 'triprex-core'),
							"singular_name" => esc_html__("Tour Type", 'triprex-core'),
							"menu_name"     => esc_html__("Tour Type", 'triprex-core'),
							"all_items"     => esc_html__("All Tour Type", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Tour Type", 'triprex-core'),
							"new_item_name" => esc_html__("New Tour Type Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'tour-type', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),


				// Taxonomy for post hotel - pricing category
				array(
					'taxonomy'    => 'hotel-location',
					'object_type' => 'hotel',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Hotel Location", 'triprex-core'),
							"singular_name" => esc_html__("Hotel Location", 'triprex-core'),
							"menu_name"     => esc_html__("Hotel Location", 'triprex-core'),
							"all_items"     => esc_html__("All Hotel Location", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Hotel Location", 'triprex-core'),
							"new_item_name" => esc_html__("New Hotel Location Name", 'triprex-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => false,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'hotel-location', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for post hotel - pricing category
				array(
					'taxonomy'    => 'pricing-category-activities',
					'object_type' => 'activities',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Pricing Category", 'triprex-core'),
							"singular_name" => esc_html__("Pricing Category", 'triprex-core'),
							"menu_name"     => esc_html__("Pricing Category", 'triprex-core'),
							"all_items"     => esc_html__("All Pricing Category", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Pricing Category", 'triprex-core'),
							"new_item_name" => esc_html__("New Pricing Category Name", 'triprex-core'),
						),
						"public"             => false,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'pricing-category-activities', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => false,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for post hotel - pricing category
				array(
					'taxonomy'    => 'pricing-category-transport',
					'object_type' => 'transport',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Pricing Category", 'triprex-core'),
							"singular_name" => esc_html__("Pricing Category", 'triprex-core'),
							"menu_name"     => esc_html__("Pricing Category", 'triprex-core'),
							"all_items"     => esc_html__("All Pricing Category", 'triprex-core'),
							"add_new_item"  => esc_html__("Add New Pricing Category", 'triprex-core'),
							"new_item_name" => esc_html__("New Pricing Category Name", 'triprex-core'),
						),
						"public"             => false,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'pricing-category-transport', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => false,
						"show_in_quick_edit" => true,
					)
				),
			);
			if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)) {
				foreach ($all_custom_taxonmy as $taxonomy) {
					call_user_func_array('register_taxonomy', $taxonomy);
				}
			}



			flush_rewrite_rules();
		}
	} //end class

	if (class_exists('Triprex_Custom_Post_Type')) {
		Triprex_Custom_Post_Type::getInstance();
	}
}
