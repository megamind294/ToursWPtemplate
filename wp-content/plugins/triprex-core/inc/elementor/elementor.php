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

if (!class_exists('Egns_Elementor')) {

	class Egns_Elementor
	{

		/*
		* $instance
		* @since 1.1.0
		* */
		private static $instance;

		/*
		* construct()
		* @since 1.1.0
		* */
		public function __construct()
		{

			add_action('elementor/elements/categories_registered', array($this, '_widget_categories'));

			//elementor widget registered
			add_action('elementor/widgets/register', array($this, '_widget_registered'));
		}

		/*
	   * getInstance()
	   * @since 1.1.0
	   * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * _widget_categories()
		 * @since 1.1.0
		 * */
		public function _widget_categories($elements_manager)
		{
			$elements_manager->add_category(
				'triprex_widgets',
				[
					'title' => esc_html__('Triprex Widgets', 'triprex-core'),
					'icon'  => 'fa fa-plug',
				]
			);
		}


		/**
		 * _widget_registered()
		 * @since 1.1.0
		 * */
		public function _widget_registered()
		{

			if (!class_exists('Elementor\Widget_Base')) {
				return;
			}

			$elementor_widgets = array(
				'about',
				'heading',
				'hero-banner',
				'feature',
				'banner',
				'newsletter',
				'activities',
				'testimonial',
				'facility',
				'custom-post-tab',
				'tour-package',
				'visa-processing',
				'blog',
				'destination-slider',
				'faq',
				'instagram-slider',
				'destination-masonary',
				'counter',
				'destination-slider',
				'team',
				'contact',
				'faq-two',
				'gallery',
				'activities-category-slider',
				'tour-by-destination',
				'map',
				'feature-tour-card',
				'tour-category',
				'tour-by-categories',
				'tour-activities',
			);

			$elementor_widgets = apply_filters('triprex_widgets', $elementor_widgets);

			if (is_array($elementor_widgets) && !empty($elementor_widgets)) {

				foreach ($elementor_widgets as $widget) {

					if (file_exists(EGNS_CORE_INC . '/elementor/widgets/class-' . $widget . '-elementor-widget.php')) {
						require_once EGNS_CORE_INC . '/elementor/widgets/class-' . $widget . '-elementor-widget.php';
					}
				}
			}
		}
	}
	if (class_exists('Egns_Elementor')) {
		Egns_Elementor::getInstance();
	}
}//end if