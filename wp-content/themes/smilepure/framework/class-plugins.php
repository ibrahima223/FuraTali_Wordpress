<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin installation and activation for WordPress themes
 */
if ( ! class_exists( 'Smilepure_Register_Plugins' ) ) {
	class Smilepure_Register_Plugins {

		public function __construct() {
			add_filter( 'insight_core_tgm_plugins', array( $this, 'register_required_plugins' ) );
		}

		public function register_required_plugins() {
			/*
			 * Array of plugin arrays. Required keys are name and slug.
			 * If the source is NOT from the .org repo, then source is also required.
			 */
			$plugins = array(
				array(
					'name'     => esc_html__( 'Insight Core', 'smilepure' ),
					'slug'     => 'insight-core',
					'source'   => 'https://www.dropbox.com/scl/fi/zn7u6igqmycybagfje2he/insight-core-2.6.5.zip?rlkey=7t4urvc2is33v9nddm3xiw68x&dl=1',
					'version'  => '2.6.5',
					'required' => true,
				),
				array(
					'name'     => esc_html__( 'WPBakery Page Builder', 'smilepure' ),
					'slug'     => 'js_composer',
					'source'   => 'https://www.dropbox.com/scl/fi/gl0f8ula71uosre960oap/js_composer-7.0.zip?rlkey=5hhq6bc48kcu9712lt97he6rz&dl=1',
					'version'  => '7.0',
					'required' => true,
				),
				array(
					'name'     => esc_html__( 'WPBakery Page Builder (Visual Composer) Clipboard', 'smilepure' ),
					'slug'     => 'vc_clipboard',
					'source'   => 'https://www.dropbox.com/scl/fi/qfc6uuv16t2qf4w9uovca/vc_clipboard-5.0.4.zip?dl=1&rlkey=z3si56i7cq3rotg15loekm6ma',
					'version'  => '5.0.4',
					'required' => false,
				),
				array(
					'name'     => esc_html__( 'QuickCal - Powerful appointment booking made simple', 'smilepure' ),
					'slug'     => 'quickcal',
					'source'   => 'https://www.dropbox.com/scl/fi/wtnfpux15qi9k89y33w33/quickcal-1.0.8.zip?rlkey=tnwhovul6ec6meyitzo3tqyry&dl=1',
					'version'  => '1.0.8',
					'required' => false,
				),
				array(
					'name'     => esc_html__( 'Timetable and Event Schedule', 'smilepure' ),
					'slug'     => 'mp-timetable',
					'required' => false,
				),
				array(
					'name'     => esc_html__( 'Contact Form 7', 'smilepure' ),
					'slug'     => 'contact-form-7',
					'required' => false,
				),
				array(
					'name'     => esc_html__( 'MailChimp for WordPress', 'smilepure' ),
					'slug'     => 'mailchimp-for-wp',
					'required' => false,
				),
				array(
					'name' => esc_html__( 'WooCommerce', 'smilepure' ),
					'slug' => 'woocommerce',
				),
				array(
					'name'     => esc_html__( 'WooCommerce Smart Quick View', 'smilepure' ),
					'slug'     => 'woo-smart-quick-view',
					'required' => false,
				),
				array(
					'name' => esc_html__( 'WPC Smart Compare for WooCommerce', 'smilepure' ),
					'slug' => 'woo-smart-compare',
				),
				array(
					'name' => esc_html__( 'WPC Smart Wishlist for WooCommerce', 'smilepure' ),
					'slug' => 'woo-smart-wishlist',
				),
				array(
					'name'     => esc_html__( 'Revolution Slider', 'smilepure' ),
					'slug'     => 'revslider',
					'source'   => 'https://www.dropbox.com/scl/fi/7wifai5o51532si07msi7/revslider-6.6.16.zip?rlkey=seumeoeswhcdiombkt54c9gp0&dl=1',
					'version'  => '6.6.16',
					'required' => true,
				),
				array(
					'name'    => esc_html__( 'Instagram Feed', 'smilepure' ),
					'slug'    => 'elfsight-instagram-feed-cc',
					'source'  => 'https://www.googleapis.com/drive/v3/files/10WhiFcWGxtWM7RADSdIl_9QQqGVTLLhK?alt=media&key=AIzaSyBQsxIg32Eg17Ic0tmRvv1tBZYrT9exCwk',
					'version' => '4.0.3',
				),
			);

			return $plugins;
		}

	}

	new Smilepure_Register_Plugins();
}
