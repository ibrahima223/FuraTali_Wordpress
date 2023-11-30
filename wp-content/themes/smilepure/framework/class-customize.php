<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup for customizer of this theme
 */
if ( ! class_exists( 'Smilepure_Customize' ) ) {
	class Smilepure_Customize {

		protected static $override_settings = array();

		public function __construct() {
			// Build URL for customizer.
			add_filter( 'kirki_values_get_value', array( $this, 'kirki_db_get_theme_mod_value' ), 10, 2 );

			add_filter( 'kirki_theme_stylesheet', array( $this, 'change_inline_stylesheet' ), 10, 3 );

			add_filter( 'kirki_load_fontawesome', '__return_false' );

			// Remove unused native sections and controls.
			add_action( 'customize_register', array( $this, 'remove_customizer_sections' ) );

			// Add custom font to font select
			add_filter( 'kirki_fonts_standard_fonts', array( $this, 'add_custom_font' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_custom_font_css' ) );

			// Load customizer sections when all widgets init.
			add_action( 'init', array( $this, 'load_customizer' ), 99 );

			add_action( 'customize_controls_init', array(
				$this,
				'customize_preview_css',
			) );

			add_action( 'wp', array( $this, 'init_global_variable' ) );
		}

		function init_global_variable() {
			if ( ! class_exists( 'Kirki' ) ) {
				return;
			}

			// Setup url.
			if ( empty( self::$override_settings ) ) {
				if ( ! empty( $_GET ) ) {

					foreach ( $_GET as $key => $query_value ) {
						if ( class_exists('Kirki') && ! empty( Kirki::$fields[ $key ] ) ) {

							if ( is_array( Kirki::$fields[ $key ] ) &&
							     ( 'kirki-preset' == Kirki::$fields[ $key ]['type'] || 'kirki-select' == Kirki::$fields[ $key ]['type'] ) &&
							     ! empty( Kirki::$fields[ $key ]['args']['choices'] ) &&
							     ! empty( Kirki::$fields[ $key ]['args']['choices'][ $query_value ] ) &&
							     ! empty( Kirki::$fields[ $key ]['args']['choices'][ $query_value ]['settings'] )
							) {
								$field_choice = Kirki::$fields[ $key ]['args']['choices'];
								foreach ( $field_choice[ $query_value ]['settings'] as $kirki_setting => $kirki_value ) {
									self::$override_settings[ $kirki_setting ] = $kirki_value;
								}
							} else {
								self::$override_settings[ $key ] = $query_value;
							}
						}
					}
				}
			}
		}

		public function change_inline_stylesheet() {
			return 'smilepure-style';
		}

		function add_custom_font( $fonts ) {
			$fonts['heebo'] = array(
				'label'    => 'Heebo',
				'variants' => array( 400, 500, 700, 800, 900 ),
				'stack'    => 'Heebo, sans-serif',
			);

			$fonts['nunito_sans'] = array(
				'label'    => 'Nunito Sans',
				'variants' => array( 300, '300italic', 'regular', 'italic',600, '600italic', 700, '700italic' ),
				'stack'    => 'Nunito Sans, sans-serif',
			);

			$fonts['playfair_display'] = array(
				'label'    => 'Playfair Display',
				'variants' => array( 'regular', 'italic', 700, '700italic' ),
				'stack'    => 'Playfair Display, serif',
			);

			return $fonts;
		}

		function add_custom_font_css() {
			$typo_fields = Smilepure_Kirki::get_typography_fields_id();

			if ( ! is_array( $typo_fields ) || empty( $typo_fields ) ) {
				return;
			}

			foreach ( $typo_fields as $field ) {
				$value = Smilepure::setting( $field );

				if ( is_array( $value ) && isset( $value['font-family'] ) && $value['font-family'] !== '' ) {
					if ( strpos( $value['font-family'], 'Heebo' ) !== false ) {
						wp_enqueue_style( 'heebo-font', SMILEPURE_THEME_URI . '/assets/fonts/Heebo/heebo.css', null, null );
					} elseif ( strpos( $value['font-family'], 'Nunito Sans' ) !== false ) {
						wp_enqueue_style( 'nunito-sans-font', SMILEPURE_THEME_URI . '/assets/fonts/nunito-sans/nunito-sans.css', null, null );
					} elseif ( strpos( $value['font-family'], 'Playfair Display' ) !== false ) {
						wp_enqueue_style( 'playfair-display-font', SMILEPURE_THEME_URI . '/assets/fonts/playfair-display/playfair-display.css', null, null );
					} else {
						do_action( 'Smilepure_enqueue_custom_font', $value['font-family'] ); // hook to custom do enqueue fonts
					}
				}
			}
		}

		/**
		 * Add customize preview css
		 */
		public function customize_preview_css() {
			wp_enqueue_style( 'kirki-custom-css', SMILEPURE_THEME_URI . '/assets/admin/css/customizer.min.css' );
		}

		/**
		 * Load Customizer.
		 */
		public function load_customizer() {
			Smilepure::require_file( SMILEPURE_THEME_DIR . '/customizer/customizer.php' );
		}

		/**
		 * Remove unused native sections and controls
		 *
		 * @since 0.9.3
		 *
		 * @param $wp_customize
		 */
		public function remove_customizer_sections( $wp_customize ) {
			$wp_customize->remove_section( 'nav' );
			$wp_customize->remove_section( 'colors' );
			$wp_customize->remove_section( 'background_image' );
			$wp_customize->remove_section( 'header_image' );

			$wp_customize->get_section( 'title_tagline' )->priority = '100';

			$wp_customize->remove_control( 'blogdescription' );
			$wp_customize->remove_control( 'display_header_text' );
		}

		/**
		 * Build URL for customizer
		 *
		 * @param $value
		 * @param $setting
		 *
		 * @return mixed
		 */
		public function kirki_db_get_theme_mod_value( $value, $setting ) {
			if ( ! is_customize_preview() && ! empty( self::$override_settings ) && isset( self::$override_settings["{$setting}"] ) ) {
				return self::$override_settings["{$setting}"];
			}

			return $value;
		}

		public static function field_social_networks_enable( $args = array() ) {
			$defaults = array(
				'type'        => 'radio-buttonset',
				'label'       => esc_html__( 'Social Networks', 'smilepure' ),
				'description' => '<a href="javascript:wp.customize.section( \'socials\' ).focus();">' . esc_html__( 'Edit social network links', 'smilepure' ) . '</a>',
				'choices'     => array(
					'0' => esc_html__( 'Hide', 'smilepure' ),
					'1' => esc_html__( 'Show', 'smilepure' ),
				),
			);

			$args = wp_parse_args( $args, $defaults );

			Smilepure_Kirki::add_field( 'theme', $args );
		}

		public static function field_language_switcher_enable( $args = array() ) {
			$defaults = array(
				'type'    => 'radio-buttonset',
				'label'   => esc_html__( 'Language Switcher', 'smilepure' ),
				'tooltip' => esc_html__( 'Show language switcher in header. Support for Polylang & WPML plugins.', 'smilepure' ),
				'choices' => array(
					'0' => esc_html__( 'Hide', 'smilepure' ),
					'1' => esc_html__( 'Show', 'smilepure' ),
				),
				'default' => '0',
			);

			$args = wp_parse_args( $args, $defaults );

			Smilepure_Kirki::add_field( 'theme', $args );
		}

	}

	new Smilepure_Customize();
}
