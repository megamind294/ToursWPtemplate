<?php

if (!class_exists('Egns_Handler')) {

	/**
	 * Main theme class with configuration
	 */

	class Egns_Handler
	{

		/**
		 * Initializes a singleton instance
		 *
		 * @return \Egns_Handler
		 */
		private static $instance;


		public static function get_instance()
		{
			if (is_null(self::$instance)) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Main Class Constructor
		 */
		public function __construct()
		{

			// Include all require files
			require_once get_template_directory() . '/helpers/constants.php';
			require_once get_template_directory() . '/helpers/search_query.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/theme_setup.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/assets.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/ajax_actions.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/helper.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/breadcrumb.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/comments.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/woo-hooks-mutated.php';
			require_once EGNS_INC_ROOT_DIR . '/plugins/tgma/activation.php';

			// Instantiation helper classes
			new Egns\Helper\Egns_Assets();
			new Egns\Helper\Egns_Theme_Setup();
			new Egns\Helper\Egns_Helper();
		}

		/**
		 * Add _price post_meta to tours upon publish
		 * 
		 * _pirce field is required for WooCommerce add to cart
		 */
		public function egns_add_price_field_to_post($post_id, $post)
		{
			update_post_meta($post_id, '_price', '0');
		}
	}

	Egns_Handler::get_instance();
}


// Remove p tag from contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');

/** * Change the number of related products output */
function drivco_move_comment_field($fields)
{
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter('comment_form_fields', 'drivco_move_comment_field', 10, 3);
