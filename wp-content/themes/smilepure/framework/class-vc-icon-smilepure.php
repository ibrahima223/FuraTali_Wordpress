<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Smilepure_VC_Icon_smilepure' ) ) {
	class Smilepure_VC_Icon_smilepure {

		public function __construct() {
			/*
			 * Add styles & script file only on add new or edit post type.
			 */
			add_action( 'load-post.php', array( $this, 'enqueue_scripts' ) );
			add_action( 'load-post-new.php', array( $this, 'enqueue_scripts' ) );

			add_filter( 'vc_iconpicker-type-smilepure', array( $this, 'add_fonts' ) );
			add_filter( 'Smilepure_vc_icon_libraries', array( $this, 'add_to_libraries' ) );
			add_filter( 'Smilepure_vc_icon_libraries_fields', array( $this, 'add_icon_picker_field' ), 10, 2 );

			add_action( 'vc_enqueue_font_icon_element', array( $this, 'vc_element_enqueue' ) );
		}

		public function add_to_libraries( $list ) {
			$list = $list + array( esc_html__( 'smilepure', 'smilepure' ) => 'smilepure' );

			return $list;
		}

		public function add_icon_picker_field( $fields, $args ) {
			$fields[] = array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'smilepure' ),
				'param_name'  => 'icon_smilepure',
				'value'       => 'smilepure-001-clock-1',
				'settings'    => array(
					'emptyIcon'    => true,
					'type'         => 'smilepure',
					'iconsPerPage' => 400,
				),
				'dependency'  => array(
					'element' => $args['param_name'],
					'value'   => 'smilepure',
				),
				'description' => esc_html__( 'Select icon from library.', 'smilepure' ),
			);

			return $fields;
		}


		public function vc_element_enqueue( $font ) {
			switch ( $font ) {
				case 'smilepure':
					wp_enqueue_style( 'font-smilepure', SMILEPURE_THEME_URI . '/assets/fonts/smilepure/font-smilepure.css', null, null );
					break;
			}
		}

		public function enqueue_scripts() {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		}

		function admin_enqueue_scripts() {
			wp_enqueue_style( 'font-smilepure', SMILEPURE_THEME_URI . '/assets/fonts/smilepure/font-smilepure.css', null, null );
		}

		public function add_fonts( $icons ) {
			$new_icons = array(
				array( 'smilepure-tooth' => 'tooth' ),
				array( 'smilepure-broken-tooth' => 'broken-tooth' ),
				array( 'smilepure-teeth' => 'teeth' ),
				array( 'smilepure-implant' => 'implant' ),
				array( 'smilepure-teeth-1' => 'teeth-1' ),
				array( 'smilepure-tooth-1' => 'tooth-1' ),
				array( 'smilepure-drilling' => 'drilling' ),
				array( 'smilepure-dental-veneer' => 'dental-veneer' ),
				array( 'smilepure-dentist-chair' => 'dentist-chair' ),
				array( 'smilepure-mouthwash' => 'mouthwash' ),
				array( 'smilepure-open-mouth' => 'open-mouth' ),
				array( 'smilepure-dentist' => 'dentist' ),
				array( 'smilepure-tooth-2' => 'tooth-2' ),
				array( 'smilepure-tooth-3' => 'tooth-3' ),
				array( 'smilepure-braces' => 'braces' ),
				array( 'smilepure-braces-1' => 'braces-1' ),
				array( 'smilepure-tooth-4' => 'tooth-4' ),
				array( 'smilepure-removal' => 'removal' ),
				array( 'smilepure-crown' => 'crown' ),
				array( 'smilepure-tooth-5' => 'tooth-5' ),
				array( 'smilepure-tooth-6' => 'tooth-6' ),
				array( 'smilepure-floss' => 'floss' ),
				array( 'smilepure-tools' => 'tools' ),
				array( 'smilepure-toothbrush' => 'toothbrush' ),
				array( 'smilepure-tooth-drill' => 'tooth-drill' ),
				array( 'smilepure-dentist-1' => 'dentist-1' ),
				array( 'smilepure-magnifying-glass' => 'magnifying-glass' ),
				array( 'smilepure-dentist-chair-1' => 'dentist-chair-1' ),
				array( 'smilepure-health-report' => 'health-report' ),
				array( 'smilepure-dentures' => 'dentures' ),
				array( 'smilepure-crown-1' => 'crown-1' ),
				array( 'smilepure-plaque' => 'plaque' ),
				array( 'smilepure-tooth-extraction' => 'tooth-extraction' ),
				array( 'smilepure-x-ray' => 'x-ray' ),
				array( 'smilepure-forceps' => 'forceps' ),
				array( 'smilepure-teeth-brushing' => 'teeth-brushing' ),
				array( 'smilepure-toothbrush-1' => 'toothbrush-1' ),
				array( 'smilepure-toothbrush-2' => 'toothbrush-2' ),
				array( 'smilepure-calcium' => 'calcium' ),
				array( 'smilepure-tooth-7' => 'tooth-7' ),
				array( 'smilepure-tooth-8' => 'tooth-8' ),
				array( 'smilepure-tooth-9' => 'tooth-9' ),
				array( 'smilepure-tooth-11' => 'tooth-11' ),
				array( 'smilepure-tooth-12' => 'tooth-12' ),
				array( 'smilepure-smartphone' => 'smartphone' ),
				array( 'smilepure-braces-2' => 'braces-2' ),
				array( 'smilepure-suction' => 'suction' ),
				array( 'smilepure-tooth-fairy' => 'tooth-fairy' ),
				array( 'smilepure-floss-1' => 'floss-1' ),
			);

			return array_merge( $icons, $new_icons );
		}
	}

	new Smilepure_VC_Icon_smilepure();
}
