<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do nothing if not an admin page
if ( ! is_admin() ) {
	return;
}

/**
 * Hook & filter that run only on admin pages.
 */
if ( ! class_exists( 'Smilepure_Admin' ) ) {
	class Smilepure_Admin {
		protected static $instance = null;

		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Enqueue scrips & styles.
		 *
		 * @access public
		 */
		public function enqueue_scripts() {
			wp_enqueue_style( 'smilepure-admin', SMILEPURE_THEME_URI . '/assets/admin/css/style.css' );
			wp_enqueue_script( 'smilepure-admin', SMILEPURE_THEME_URI . '/assets/admin/js/admin.js', array( 'jquery' ), null, true );
		}
	}

	new Smilepure_Admin();
}
