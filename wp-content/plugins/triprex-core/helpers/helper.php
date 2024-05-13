<?php

namespace Egns_Core;

/**
 * All Elementor widget init
 * 
 * @since 1.1.0
 */

if (!defined('ABSPATH')) {
	exit(); // exit if access directly
}

if (!class_exists('Egns_Helper')) {

	class Egns_Helper
	{


		/**
		 * Helper Class constructor
		 */
		function __construct()
		{
			if (!class_exists('Woocommerce')) {
				add_action('init', array($this, 'egns_add_customer_role'));
				add_action('after_setup_theme', array($this, 'egns_after_theme_setup'));
			}
		}

		// Hide admin bar for customer
		public function egns_after_theme_setup()
		{
			if (current_user_can('customer')) {
				show_admin_bar(false);
			}
		}

		// Auction role 
		public function egns_add_customer_role()
		{
			add_role(
				'customer',
				esc_html('Customer'),
			);
		}

		/**
		 * Get theme options.
		 *
		 * @param string $opts Required. Option name.
		 * @param string $key Required. Option key.
		 * @param string $default Optional. Default value.
		 * @since   1.1.0
		 */

		public static function egns_get_theme_option($key, $key2 = '', $default = '')
		{
			$egns_theme_options = get_option('egns_theme_options');

			if (!empty($key2)) {
				return	isset($egns_theme_options[$key][$key2]) ? $egns_theme_options[$key][$key2] : $default;
			} else {
				return isset($egns_theme_options[$key]) ? $egns_theme_options[$key] : $default;
			}
		}

		public static function get_count_auction($post_title)
		{
			$args = array(
				'post_type'   => 'auction-bidding',
				'post_status' => 'publish',
				'numberposts' => -1,
			);
			$posts = get_posts($args);
			$unique_combinations = array();
			$count = 0;
			foreach ($posts as $post) {
				$author_id = $post->post_author;
				if ($post->post_title === $post_title) {
					$combination = $post_title . '-' . $author_id;
					if (!in_array($combination, $unique_combinations)) {
						$unique_combinations[] = $combination;
						$count++;
					}
				}
			}
			return $count;
		}


		/**
		 * Get All Month
		 * Use 'M' instead of 'F' for abbreviated month names
		 */
		public static function egns_all_get_month()
		{
			$months = array();
			for ($m = 1; $m <= 12; $m++) {
				$months[$m] = date('F', mktime(0, 0, 0, $m, 1));
			}
			return $months;
		}

		/**
		 * Get All Month
		 * Use 'M' instead of 'F' for abbreviated month names
		 */
		public static function egns_all_get_country()
		{

			// All nationalities length 252
			$nationality_list = array(
				"Afghan", "Alandish", "Albanian", "Algerian", "American Samoan", "Andorran", "Angolan", "Anguillan", "Antarctican", "Antiguan and Barbudan", "Argentinian", "Armenian", "Aruban", "Australian", "Austrian", "Azerbaijani", "Bahamian", "Bahraini", "Bangladeshi", "Barbadian", "Belarusian", "Belgian", "Belizean", "Beninese", "Bermudian", "Bhutanese", "Bolivian", "Bonairean", "Bosnian and Herzegovinian", "Motswana", "Bouvetian", "Brazilian", "British Indian Ocean Territory", "Bruneian", "Bulgarian", "Burkinabé", "Burundian", "Cambodian", "Cameroonian", "Canadian", "Cape Verdean", "Caymanian", "Central African", "Chadian", "Chilean", "Chinese", "Christmas Island", "Cocos Islander", "Colombian", "Comoran", "Congolese", "Democratic Republic of the Congo", "Cook Islander", "Costa Rican", "Ivorian", "Croatian", "Cuban", "Curaçaoan", "Cypriot", "Czech", "Danish", "Djiboutian", "Dominican", "Ecuadorian", "Egyptian", "Salvadoran", "Equatorial Guinean", "Eritrean", "Estonian", "Ethiopian", "Falkland Islander", "Faroese", "Fijian", "Finnish", "French", "French Guianese", "French Polynesian", "French Southern Territories", "Gabonese", "Gambian", "Georgian", "German", "Ghanaian", "Gibraltese", "Greek", "Greenlandic", "Grenadian", "Guadeloupean", "Guamanian", "Guatemalan", "Guernsey", "Guinean", "Guinea-Bissauan", "Guyanese", "Haitian", "Heard and McDonald Islands", "Holy See", "Honduran", "Hong Kong", "Hungarian", "Icelandic", "Indian", "Indonesian", "Iranian", "Iraqi", "Irish", "Manx", "Israeli", "Italian", "Jamaican", "Japanese", "Jersey", "Jordanian", "Kazakhstani", "Kenyan", "I-Kiribati", "North Korean", "South Korean", "Kosovar", "Kuwaiti", "Kyrgyz", "Laotian", "Latvian", "Lebanese", "Mosotho", "Liberian", "Libyan", "Liechtensteiner", "Lithuanian", "Luxembourger", "Macanese", "Macedonian", "Malagasy", "Malawian", "Malaysian", "Maldivian", "Malian", "Maltese", "Marshallese", "Martinican", "Mauritanian", "Mauritian", "Mahoran", "Mexican", "Micronesian", "Moldovan", "Monégasque", "Mongolian", "Montenegrin", "Montserratian", "Moroccan", "Mozambican", "Myanmarese", "Namibian", "Nauruan", "Nepali", "Dutch", "Netherlands Antillean", "New Caledonian", "New Zealander", "Nicaraguan", "Nigerian", "Niuean", "Norfolk Island", "Northern Mariana Islander", "Norwegian", "Omani", "Pakistani", "Palauan", "Palestinian", "Panamanian", "Papua New Guinean", "Paraguayan", "Peruvian", "Filipino", "Pitcairnian", "Polish", "Portuguese", "Puerto Rican", "Qatari", "Réunionese", "Romanian", "Russian", "Rwandan", "Saint Barthélemy", "Saint Helenian", "Saint Kitts and Nevisian", "Saint Lucian", "Saint Martin", "Saint Pierrais and Miquelonnais", "Saint Vincentian", "Samoan", "Sanmarinese", "São Toméan", "Saudi", "Senegalese", "Serbian", "Serbian and Montenegrin", "Seychellois", "Sierra Leonean", "Singaporean", "Sint Maartener", "Slovak", "Slovenian", "Solomon Islander", "Somali", "South African", "South Georgia and the South Sandwich Islands", "South Sudanese", "Spanish", "Sri Lankan", "Sudanese", "Surinamese", "Svalbardian and Jan Mayener", "Swazi", "Swedish", "Swiss", "Syrian", "Taiwanese", "Tajikistani", "Tanzanian", "Thai", "Timorese", "Togolese", "Tokelauan", "Tongan", "Trinidadian and Tobagonian", "Tunisian", "Turkish", "Turkmen", "Turks and Caicos Islander", "Tuvaluan", "Ugandan", "Ukrainian", "Emirati", "British", "American", "United States Minor Outlying Islander", "Uruguayan", "Uzbekistani", "Ni-Vanuatu", "Venezuelan", "Vietnamese", "British Virgin Islander", "U.S. Virgin Islander", "Wallisian and Futunan", "Sahrawi", "Yemeni", "Zambian", "Zimbabwean"
			);

			return $nationality_list;
		}

		/**
		 * This function will return tour count by desctiont ID
		 * @return integer
		 */

		public static function get_tour_count_by_destination_id($destinationID = '')
		{

			$args_two = array(
				'post_type'  => 'tours',
				'meta_query' => array(
					array(
						'key' 		=> 'EGNS_TOURS_META_ID',
						'compare' 	=> 'LIKE',
						'value' 	=> get_the_ID()
					)
				)
			);
			$tourCount = get_posts($args_two);
			return count($tourCount);
		}



		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_blog_post_options()
		{
			$posts = get_posts(['post_type' => 'post', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		public static function  egns_visa_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_VISA_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * Get categories for select for custom post type 'activities' and taxonomy 'activities-category'
		 *
		 * @return array
		 */
		public static function get_activities_categories_for_select()
		{
			$taxonomy = 'activities-category';

			// Get terms for the specified custom post type and taxonomy
			$terms = get_terms([
				'taxonomy' => $taxonomy,
				'hide_empty' => false,
			]);

			$options = [];

			if ($terms && !is_wp_error($terms)) {
				foreach ($terms as $term) {
					$options[$term->term_id] = $term->name;
				}
			}

			return $options;
		}

		/**
		 * Get categories for select for custom post type 'activities' and taxonomy 'activities-category'
		 *
		 * @return array
		 */
		public static function get_tours_categories_for_select()
		{
			$taxonomy = 'tour-types';

			// Get terms for the specified custom post type and taxonomy
			$terms = get_terms([
				'taxonomy' => $taxonomy,
				'hide_empty' => true,
			]);

			$options = [];

			if ($terms && !is_wp_error($terms)) {
				foreach ($terms as $term) {
					$options[$term->term_id] = $term->name;
				}
			}

			return $options;
		}



		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_destination_post_options()
		{
			$posts = get_posts(['post_type' => 'destination', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}

		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_visa_post_options()
		{
			$posts = get_posts(['post_type' => 'visa', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}

		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_tours_post_options()
		{
			$posts = get_posts(['post_type' => 'tours', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_activities_post_options()
		{
			$posts = get_posts(['post_type' => 'activities', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}

		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_hotels_post_options()
		{
			$posts = get_posts(['post_type' => 'hotel', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}

		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_transports_post_options()
		{
			$posts = get_posts(['post_type' => 'transport', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		/**
		 * filtering posts by categories
		 *
		 * @return void
		 */

		public static function get_blog_categories()
		{
			$categories = get_categories(); // Get all categories.
			$category_options = [];
			foreach ($categories as $category) {
				$category_options[$category->term_id] = $category->name;
			}

			return $category_options;
		}

		public static function get_post_list_by_post_type($post_type)
		{
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'posts_per_page' => -1,
				'post_status' 	 => 'publish',

			);
			$all_post   = new \WP_Query($args);

			while ($all_post->have_posts()) {
				$all_post->the_post();
				$return_val[get_the_ID()] = get_the_title();
			}
			wp_reset_query();
			return $return_val;
		}

		public static function get_all_post_key($post_type)
		{
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'posts_per_page' => 6,
				'post_status' 	 => 'publish',

			);
			$all_post   = new \WP_Query($args);

			while ($all_post->have_posts()) {
				$all_post->the_post();
				$return_val[] = get_the_ID();
			}
			wp_reset_query();
			return $return_val;
		}


		public static function get_all_location()
		{
			$locations =  get_terms('location'); // Get all location.
			$location_options = [];
			foreach ($locations as $location) {
				$location_options[$location->slug] = $location->name;
			}

			return $location_options;
		}

		// Get all location key.
		public static function get_all_location_key()
		{
			$locations =  get_terms(array(
				'taxonomy' => 'location',
				'number'   => 6,
			)); // Get all location.

			$location_options = [];

			foreach ($locations as $location) {
				$location_options[] = $location->slug;
			}

			return $location_options;
		}

		public static function get_all_body()
		{
			$body =  get_terms('body-type'); // Get all body type.
			$body_options = [];
			foreach ($body as $body) {
				$body_options[$body->slug] = $body->name;
			}

			return $body_options;
		}

		public static function get_all_body_key()
		{
			$body =  get_terms(
				array(
					'taxonomy' => 'body-type',
					'number'   => 6,
				)
			); // Get all body type.

			$body_options = [];

			foreach ($body as $body) {
				$body_options[] = $body->slug;
			}

			return $body_options;
		}

		public static function get_all_colors()
		{
			$colors =  get_terms('colors'); // Get all colors.
			$color_options = [];
			if (!empty($colors) && count($colors) > 0) {
				foreach ($colors as $color) {
					$color_options[$color->slug] = $color->name;
				}
			}
			return $color_options;
		}


		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Tours Option Value.
		 */
		public static function  egns_tours_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$tours_options = get_post_meta(get_the_ID(), 'EGNS_TOURS_META_ID', true);

			if (isset($tours_options[$key1][$key2][$key3])) {
				return $tours_options[$key1][$key2][$key3];
			} elseif (isset($tours_options[$key1][$key2])) {
				return $tours_options[$key1][$key2];
			} elseif (isset($tours_options[$key1])) {
				return $tours_options[$key1];
			} else {
				return $default;
			}
		}


		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Destination Option Value.
		 */
		public static function  egns_destination_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$destination_options = get_post_meta(get_the_ID(), 'EGNS_DESTINATION_META_ID', true);

			if (isset($destination_options[$key1][$key2][$key3])) {
				return $destination_options[$key1][$key2][$key3];
			} elseif (isset($destination_options[$key1][$key2])) {
				return $destination_options[$key1][$key2];
			} elseif (isset($destination_options[$key1])) {
				return $destination_options[$key1];
			} else {
				return $default;
			}
		}



		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Hotel Option Value.
		 */
		public static function  egns_hotel_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$hotel_options = get_post_meta(get_the_ID(), 'EGNS_HOTEL_META_ID', true);

			if (isset($hotel_options[$key1][$key2][$key3])) {
				return $hotel_options[$key1][$key2][$key3];
			} elseif (isset($hotel_options[$key1][$key2])) {
				return $hotel_options[$key1][$key2];
			} elseif (isset($hotel_options[$key1])) {
				return $hotel_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Activities Option Value.
		 */
		public static function  egns_activities_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$activities_options = get_post_meta(get_the_ID(), 'EGNS_ACTIVITIES_META_ID', true);

			if (isset($activities_options[$key1][$key2][$key3])) {
				return $activities_options[$key1][$key2][$key3];
			} elseif (isset($activities_options[$key1][$key2])) {
				return $activities_options[$key1][$key2];
			} elseif (isset($activities_options[$key1])) {
				return $activities_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Transport Option Value.
		 */
		public static function  egns_transport_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$transport_options = get_post_meta(get_the_ID(), 'EGNS_TRANSPORT_META_ID', true);

			if (isset($transport_options[$key1][$key2][$key3])) {
				return $transport_options[$key1][$key2][$key3];
			} elseif (isset($transport_options[$key1][$key2])) {
				return $transport_options[$key1][$key2];
			} elseif (isset($transport_options[$key1])) {
				return $transport_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $key . Page Option id.
		 * 
		 * @return mixed Tours Gallery Option image Ids.
		 */
		public static function egns_tours_gallery($key)
		{
			$gallery_opt = self::egns_tours_value($key); // for eg. 15,50,70,125
			return $gallery_ids = explode(',', $gallery_opt);
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $key . Page Option id.
		 * 
		 * @return mixed hotel Option image Ids.
		 */
		public static function egns_hotel_gallery($key)
		{
			$gallery_opt = self::egns_hotel_value($key); // for eg. 15,50,70,125
			return $gallery_ids = explode(',', $gallery_opt);
		}


		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $key . Page Option id.
		 * 
		 * @return mixed Activities Gallery Option image Ids.
		 */
		public static function egns_activities_gallery($key)
		{
			$gallery_opt = self::egns_activities_value($key); // for eg. 15,50,70,125
			return $gallery_ids = explode(',', $gallery_opt);
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $key . Page Option id.
		 * 
		 * @return mixed Transport Gallery Option image Ids.
		 */
		public static function egns_transport_gallery($key)
		{
			$gallery_opt = self::egns_transport_value($key); // for eg. 15,50,70,125
			return $gallery_ids = explode(',', $gallery_opt);
		}

		/**
		 * Return taxonomy name with link.
		 *
		 * @since 1.1.0
		 *
		 * @param string $taxonomy . give your taxonomy.
		 * 
		 * @param string $icon_class . give your icon class here.
		 * 
		 * @return mixed return taxonomy name with link.
		 */
		public static function term_with_link($icon_class, $taxonomy, $take = null)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy);
			$count = 0;
			foreach ((array) $terms as $term) :
				if ($take !== null && $take <= $count) {
					continue;
				}
				$count++;
?>
				<a href="<?php echo get_term_link($term->slug, $taxonomy) ?>"><i class="<?php echo $icon_class ?>"></i>
					<?php echo $term->name ?>
				</a>
			<?php endforeach;
		}

		//Get first location
		public static function get_first_location_link($icon_class, $taxonomy, $take = null)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy); ?>
			<?php if ($terms ?? '') : ?>
				<a href="<?php echo get_term_link($terms[0]->slug, $taxonomy) ?>"><i class="<?php echo $icon_class ?>"></i>
					<?php echo $terms[0]->name ?>
				</a>
			<?php endif; ?>
		<?php
		}

		/**
		 * Return taxonomy name with link.
		 *
		 * @since 1.1.0
		 *
		 * @param string $taxonomy . give your taxonomy.
		 * 
		 * @param string $icon_class . give your icon class here.
		 * 
		 * @return mixed return taxonomy name with link.
		 */
		public static function term_without_link($icon_class, $taxonomy)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy);

		?>

			<span><i class="<?php echo $icon_class ?>"></i>
				<?php
				foreach ((array) $terms as $term) :
					echo $term->name;
				endforeach;
				?>
			</span>
<?php
		}





		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Meta Option Value.
		 */
		public static function  egns_city_location_taxonomy($key1, $key2 = '', $key3 = '', $default = '')
		{

			$term = get_the_terms(get_the_ID(), 'city-location');
			if (!empty($term)) {
				$meta = get_term_meta($term[0]->term_id, 'triprex-city-location', true);
				if (isset($meta[$key1][$key2][$key3])) {
					return $meta[$key1][$key2][$key3];
				} elseif (isset($meta[$key1][$key2])) {
					return $meta[$key1][$key2];
				} elseif (isset($meta[$key1])) {
					return $meta[$key1];
				} else {
					return $default;
				}
			}
		}


		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.1.5
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Meta Option Value.
		 */
		public static function  egns_transport_type_taxonomy($key1, $key2 = '', $key3 = '', $default = '')
		{

			$term = get_the_terms(get_the_ID(), 'transport-type');
			if (!empty($term)) {
				$meta = get_term_meta($term[0]->term_id, 'triprex-transport-type', true);
				if (isset($meta[$key1][$key2][$key3])) {
					return $meta[$key1][$key2][$key3];
				} elseif (isset($meta[$key1][$key2])) {
					return $meta[$key1][$key2];
				} elseif (isset($meta[$key1])) {
					return $meta[$key1];
				} else {
					return $default;
				}
			}
		}


		/**
		 * Return term link value.
		 *
		 * @since 1.1.0
		 * 
		 * @return mixed Post type option value.
		 */
		public static function get_any_term_link($taxonomy)
		{
			$term = get_the_terms(get_the_ID(), $taxonomy);
			if (!empty($term)) {
				$link = get_term_link($term[0]->slug, $taxonomy);
				return $link;
			}
		}

		/**
		 * filtering product by title
		 *
		 * @return void
		 */
		public static function get_product_lists()
		{
			$posts = get_posts(['post_type' => 'product', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}



		public static function  egns_tours_value_by_id($id, $key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta($id, 'EGNS_TOURS_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		public static function egns_get_tour_package_price_by_id($post_id, $currency_position = 'left')
		{
			$get_pricing_categories = self::egns_tours_value_by_id($post_id, 'tours_booking_re');
			if (!empty($get_pricing_categories) && count($get_pricing_categories)) {
				$price_output = '';
				$price = number_format($get_pricing_categories[0]['tours_price']);
				$currency = class_exists('WooCommerce') ? get_woocommerce_currency_symbol() : self::egns_get_theme_option('global_currency_set');

				if (isset($get_pricing_categories[0]['tours_service_t_price_sale_check']) && $get_pricing_categories[0]['tours_service_t_price_sale_check'] == 1) {
					$sale_price = number_format($get_pricing_categories[0]['tours_service__t_price_sale']);
					if ($currency_position == 'left') {
						$price_output = "<span>$currency$sale_price<del>$currency$price</del></span>";
					} else {
						$price_output = "<span>$sale_price$currency<del>$price$currency</del></span>";
					}
				} else {
					if ($currency_position == 'left') {
						$price_output = "<span>$currency$price</span>";
					} else {
						$price_output = "<span>$price$currency</span>";
					}
				}
				return $price_output;
			}
		}


		public static function sanitize_recursive($data)
		{
			if (is_array($data)) {
				foreach ($data as $key => $value) {
					$data[$key] = self::sanitize_recursive($value);
				}
			} else {
				$data = sanitize_text_field($data);
			}
			return $data;
		}

		// Get Hotel price
		public static function egns_get_hotel_pack_price($currency_position = 'left')
		{
			$get_genarel_price = self::egns_hotel_value('hotel_room_price');
			$get_sale_price = self::egns_hotel_value('hotel_room_price_sale');

			if (!empty($get_genarel_price)) {

				$price_output = '';

				$price = number_format($get_genarel_price);

				$currency = class_exists('WooCommerce') ? get_woocommerce_currency_symbol() : self::egns_get_theme_option('global_currency_set');

				if (!empty(self::egns_hotel_value('hotel_room_price_sale_check')) && self::egns_hotel_value('hotel_room_price_sale_check') == 1) {

					$sale_price = number_format($get_sale_price);

					if ($currency_position == 'left') {
						$price_output = "<span>$currency$sale_price<del>$currency$price</del></span>";
					} else {
						$price_output = "<span>$sale_price$currency<del>$price$currency</del></span>";
					}
				} else {
					if ($currency_position == 'left') {
						$price_output = "<span>$currency$price</span>";
					} else {
						$price_output = "<span>$price$currency</span>";
					}
				}
				return $price_output;
			}
		}
		// End Get Hotel price


		// Get visa price
		public static function egns_get_visa_pack_price($currency_position = 'left')
		{
			$get_genarel_price = self::egns_visa_value('visa_pack_cost');
			$get_sale_price = self::egns_visa_value('visa_pack_cost_sale');

			if (!empty($get_genarel_price)) {

				$price_output = '';

				$price = number_format($get_genarel_price);

				$currency = class_exists('WooCommerce') ? get_woocommerce_currency_symbol() : self::egns_get_theme_option('global_currency_set');

				if (!empty(self::egns_visa_value('visa_pack_cost_sale_check')) && self::egns_visa_value('visa_pack_cost_sale_check') == 1) {

					$sale_price = number_format($get_sale_price);

					if ($currency_position == 'left') {
						$price_output = "<span>$currency$sale_price <del>$currency$price</del></span>";
					} else {
						$price_output = "<span>$sale_price$currency <del>$price$currency</del></span>";
					}
				} else {
					if ($currency_position == 'left') {
						$price_output = "<span>$currency$price</span>";
					} else {
						$price_output = "<span>$price$currency</span>";
					}
				}
				return $price_output;
			}
		}
		// End Get visa price 

		public static function get_posts($post_type, $posts_per_page = 10, $meta_key = '', $meta_value = '', $tax_query = [])
		{
			$args = array(
				'post_type'      => $post_type,
				'posts_per_page' => -1,
				'meta_key'       => $meta_key,
				'meta_value'     => $meta_value,
				'tax_query'      => $tax_query,
			);
			return get_posts($args);
		}

		/**
		 * Return background color class based on the value of 'tour_featured_batch_bg'.
		 *
		 * @since 1.1.0
		 * 
		 * @return string Background color class.
		 */
		public static function getBackgroundColorClass()
		{
			$color = self::egns_tours_value('tour_featured_batch_bg');
			$class_name = '';

			switch ($color) {
				case 'green_color':
					$class_name = 'gr_bg';
					break;
				case 'yellow_color':
					$class_name = 'yel_bg';
					break;
				case 'black_color':
					$class_name = 'bl_bg';
					break;
				case 'white_color':
					$class_name = 'wh_bg';
					break;
				case 'orange_color':
					$class_name = 'or_bg';
					break;
				default:
					break;
			}

			return $class_name;
		}
	} //End Main Class


}//end if
