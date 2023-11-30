<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initial OneClick import for this theme
 */
if ( ! class_exists( 'Smilepure_Import' ) ) {
	class Smilepure_Import {

		public function __construct() {
			add_filter( 'insight_core_import_demos', array( $this, 'import_demos' ) );
			add_filter( 'insight_core_import_generate_thumb', '__return_true' );
			add_filter( 'insight_core_import_delete_exist_posts', '__return_true' );
		}

		public function import_demos() {
			return array(
				'smilepure'  => array(
					'screenshot' => SMILEPURE_THEME_URI . '/screenshot.jpg',
					'name'       => SMILEPURE_THEME_NAME,
					'url'        => 'https://www.dropbox.com/s/qqg9y5c15x22d58/smilepure-insightcore01-1.2.8.zip?dl=1',
				),
			);
		}
	}

	new Smilepure_Import();
}
