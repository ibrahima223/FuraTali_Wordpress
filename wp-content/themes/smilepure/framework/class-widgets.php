<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Smilepure_Widgets' ) ) {
	class Smilepure_Widgets {

		public function __construct() {
			// Register widget areas.
			add_action( 'widgets_init', array(
				$this,
				'register_sidebars',
			) );

			add_filter( 'widget_title', array( $this, 'repair_categories_empty_title' ), 10, 3 );
		}

		public function repair_categories_empty_title( $title, $instance, $base ) {
			if ( $base == 'categories' ) {
				if ( trim( $instance['title'] ) == '' ) {
					return '';
				}
			}

			return $title;
		}

		/**
		 * Register widget area.
		 *
		 * @access public
		 * @link   https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		public function register_sidebars() {

			$defaults = array(
				'before_widget' => '<div id="%1$s" class="widget tm-animation move-up %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			);

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'blog_sidebar',
				'name'        => esc_html__( 'Blog Sidebar', 'smilepure' ),
				'description' => esc_html__( 'Add widgets here.', 'smilepure' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'page_sidebar',
				'name'        => esc_html__( 'Page Sidebar', 'smilepure' ),
				'description' => esc_html__( 'Add widgets here.', 'smilepure' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'canvas_sidebar',
				'name'        => esc_html__( 'Canvas Sidebar', 'smilepure' ),
				'description' => esc_html__( 'Add widgets here.', 'smilepure' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'shop_sidebar',
				'name'        => esc_html__( 'Shop Sidebar', 'smilepure' ),
				'description' => esc_html__( 'Add widgets here.', 'smilepure' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'service_sidebar',
				'name'        => esc_html__( 'Service Sidebar', 'smilepure' ),
				'description' => esc_html__( 'Add widgets here.', 'smilepure' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'special_sidebar',
				'name'        => esc_html__( 'Special Sidebar', 'smilepure' ),
				'description' => esc_html__( 'Special sidebar will be display right after first sidebar.', 'smilepure' ),
			) ) );
		}

	}

	new Smilepure_Widgets();
}
