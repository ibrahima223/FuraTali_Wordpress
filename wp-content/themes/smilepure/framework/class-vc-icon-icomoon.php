<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Smilepure_VC_Icon_Icomoon' ) ) {
	class Smilepure_VC_Icon_Icomoon {

		public function __construct() {
			/*
			 * Add styles & script file only on add new or edit post type.
			 */
			add_action( 'load-post.php', array( $this, 'enqueue_scripts' ) );
			add_action( 'load-post-new.php', array( $this, 'enqueue_scripts' ) );

			add_filter( 'vc_iconpicker-type-icomoon', array( $this, 'add_fonts' ) );

			add_filter( 'Smilepure_vc_icon_libraries', array( $this, 'add_to_libraries' ) );
			add_filter( 'Smilepure_vc_icon_libraries_fields', array( $this, 'add_icon_picker_field' ), 10, 2 );

			add_action( 'vc_enqueue_font_icon_element', array( $this, 'vc_element_enqueue' ) );
		}

		public function add_to_libraries( $list ) {
			$list = $list + array( esc_html__( 'Icomoon', 'smilepure' ) => 'icomoon' );

			return $list;
		}

		public function add_icon_picker_field( $fields, $args ) {
			$fields[] = array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'smilepure' ),
				'param_name'  => 'icon_icomoon',
				'value'       => 'ion-alert',
				'settings'    => array(
					'emptyIcon'    => true,
					'type'         => 'icomoon',
					'iconsPerPage' => 400,
				),
				'dependency'  => array(
					'element' => $args['param_name'],
					'value'   => 'icomoon',
				),
				'description' => esc_html__( 'Select icon from library.', 'smilepure' ),
			);

			return $fields;
		}


		public function vc_element_enqueue( $font ) {
			switch ( $font ) {
				case 'icomoon':
					wp_enqueue_style( 'font-icomoon' );
					break;
			}
		}

		public function enqueue_scripts() {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		}

		function admin_enqueue_scripts() {
			wp_enqueue_style( 'font-icomoon', SMILEPURE_THEME_URI . '/assets/fonts/icomoon/font-icomoon.css', null, null );
		}

		public function add_fonts( $icons ) {
			$new_icons = array(
				array( 'icomoon-alarm-clock' => 'alarm clock' ),
				array( 'icomoon-atomic' => 'atomic' ),
				array( 'icomoon-bar-chart' => 'bar chart' ),
				array( 'icomoon-battery-1' => 'battery 1' ),
				array( 'icomoon-battery' => 'battery' ),
				array( 'icomoon-bell' => 'bell' ),
				array( 'icomoon-bluetooth' => 'bluetooth' ),
				array( 'icomoon-book' => 'book' ),
				array( 'icomoon-box' => 'box' ),
				array( 'icomoon-calculator' => 'calculator' ),
				array( 'icomoon-calendar' => 'calendar' ),
				array( 'icomoon-car' => 'car' ),
				array( 'icomoon-chat-1' => 'chat-1' ),
				array( 'icomoon-chat' => 'chat' ),
				array( 'icomoon-checked' => 'checked' ),
				array( 'icomoon-checked' => 'checked' ),
				array( 'icomoon-cloud-computing-1' => 'cloud computing 1' ),
				array( 'icomoon-cloud-computing' => 'cloud computing' ),
				array( 'icomoon-cloud' => 'cloud' ),
				array( 'icomoon-compass' => 'compass' ),
				array( 'icomoon-credit-card' => 'credit card' ),
				array( 'icomoon-cursor' => 'cursor' ),
				array( 'icomoon-cutlery' => 'cutlery' ),
				array( 'icomoon-download' => 'download' ),
				array( 'icomoon-edit' => 'edit' ),
				array( 'icomoon-envelope' => 'envelope' ),
				array( 'icomoon-eraser' => 'eraser' ),
				array( 'icomoon-eye' => 'eye' ),
				array( 'icomoon-fast-forward' => 'fast forward' ),
				array( 'icomoon-file-1' => 'file 1' ),
				array( 'icomoon-file-2' => 'file 2' ),
				array( 'icomoon-file-3' => 'file 3' ),
				array( 'icomoon-file' => 'file' ),
				array( 'icomoon-filter' => 'filter' ),
				array( 'icomoon-flag' => 'flag' ),
				array( 'icomoon-folder-1' => 'folder 1' ),
				array( 'icomoon-folder-2' => 'folder 2' ),
				array( 'icomoon-folder' => 'folder' ),
				array( 'icomoon-gamepad' => 'gamepad' ),
				array( 'icomoon-heart' => 'heart' ),
				array( 'icomoon-home' => 'home' ),
				array( 'icomoon-id-card' => 'id card' ),
				array( 'icomoon-image' => 'image' ),
				array( 'icomoon-information' => 'information' ),
				array( 'icomoon-laptop' => 'laptop' ),
				array( 'icomoon-layers' => 'layers' ),
				array( 'icomoon-like' => 'like' ),
				array( 'icomoon-line-chart' => 'line chart' ),
				array( 'icomoon-loupe' => 'loupe' ),
				array( 'icomoon-mail' => 'mail' ),
				array( 'icomoon-map' => 'map' ),
				array( 'icomoon-medal' => 'medal' ),
				array( 'icomoon-megaphone' => 'megaphone' ),
				array( 'icomoon-message-1' => 'message 1' ),
				array( 'icomoon-message-2' => 'message 2' ),
				array( 'icomoon-message' => 'message' ),
				array( 'icomoon-microphone' => 'microphone' ),
				array( 'icomoon-money' => 'money' ),
				array( 'icomoon-monitor' => 'monitor' ),
				array( 'icomoon-music' => 'music' ),
				array( 'icomoon-next' => 'next' ),
				array( 'icomoon-padlock-1' => 'padlock 1' ),
				array( 'icomoon-padlock' => 'padlock' ),
				array( 'icomoon-paint-brush' => 'paint brush' ),
				array( 'icomoon-pause' => 'pause' ),
				array( 'icomoon-phone-call' => 'phone call' ),
				array( 'icomoon-photo-camera' => 'photo camera' ),
				array( 'icomoon-placeholder' => 'placeholder' ),
				array( 'icomoon-planet-earth' => 'planet earth' ),
				array( 'icomoon-power-button' => 'power-button' ),
				array( 'icomoon-presentation' => 'presentation' ),
				array( 'icomoon-printer' => 'printer' ),
				array( 'icomoon-reload' => 'reload' ),
				array( 'icomoon-return' => 'return' ),
				array( 'icomoon-rss' => 'rss' ),
				array( 'icomoon-safebox' => 'safebox' ),
				array( 'icomoon-settings-1' => 'settings 1' ),
				array( 'icomoon-settings-2' => 'settings 2' ),
				array( 'icomoon-settings' => 'settings' ),
				array( 'icomoon-share' => 'share' ),
				array( 'icomoon-shield' => 'shield' ),
				array( 'icomoon-shopping-cart' => 'shopping-cart' ),
				array( 'icomoon-smartphone' => 'smartphone' ),
				array( 'icomoon-speaker' => 'speaker' ),
				array( 'icomoon-speakers' => 'speakers' ),
				array( 'icomoon-trash' => 'trash' ),
				array( 'icomoon-trophy' => 'trophy' ),
				array( 'icomoon-upload' => 'upload' ),
				array( 'icomoon-user-1' => 'user 1' ),
				array( 'icomoon-user-2' => 'user 2' ),
				array( 'icomoon-user-3' => 'user 3' ),
				array( 'icomoon-user' => 'user' ),
				array( 'icomoon-users' => 'users' ),
				array( 'icomoon-video-camera' => 'video camera' ),
				array( 'icomoon-wifi' => 'wifi' ),
				array( 'icomoon-zoom-in' => 'zoom-in' ),
				array( 'icomoon-zoom-out' => 'zoom-out' ),
			);

			return array_merge( $icons, $new_icons );
		}
	}

	new Smilepure_VC_Icon_Icomoon();
}
