<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles.
 */
if ( ! class_exists( 'Smilepure_Enqueue' ) ) {
	class Smilepure_Enqueue {

		protected static $instance = null;

		public function __construct() {
			add_action( 'enqueue_block_editor_assets', array( $this, 'gutenberg_editor' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_libs' ), 1 );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

			/**
			 * Make it run after main style & components.
			 */
			add_action( 'wp_enqueue_scripts', [ $this, 'rtl_styles' ], 20 );

			// Disable all contact form 7 scripts.
			add_filter( 'wpcf7_load_js', '__return_false' );
			add_filter( 'wpcf7_load_css', '__return_false' );

			// Re queue contact form 7 scripts when used.
			add_action( 'wp_enqueue_scripts', array( $this, 'requeue_wpcf7_scripts' ), 99 );
		}

		function gutenberg_editor() {
			wp_enqueue_style( 'gutenberg-body-font', SMILEPURE_THEME_URI . '/assets/fonts/nunito-sans/nunito-sans.css', null, null );
			wp_enqueue_style( 'gutenberg-heading-font', SMILEPURE_THEME_URI . '/assets/fonts/Heebo/heebo.css', null, null );
			wp_enqueue_style( 'gutenberg-quote-font', SMILEPURE_THEME_URI . '/assets/fonts/playfair-display/playfair-display.css', null, null );
		}

		public function enqueue_libs() {
			if ( class_exists( 'WPCleverWoosc' ) ) {
				function dequeue_hint_css() {
					wp_dequeue_style( 'hint' );
				}

				add_action( 'wp_enqueue_scripts', 'dequeue_hint_css' );
			}
		}

		function requeue_wpcf7_scripts() {
			global $post;
			if ( is_a( $post, 'WP_Post' ) &&
			     ( has_shortcode( $post->post_content, 'contact-form-7' ) ||
			       has_shortcode( $post->post_content, 'tm_contact_form_7' ) ||
			       has_shortcode( $post->post_content, 'tm_contact_form_7_box' )
			     )
			) {
				if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
					wpcf7_enqueue_scripts();
				}

				if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
					wpcf7_enqueue_styles();
				}
			}
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Enqueue scripts & styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			$post_type = get_post_type();
			$min       = $this->get_min_suffix();

			// Remove font awesome from Visual Composer plugin.
			wp_deregister_style( 'font-awesome' );
			wp_dequeue_style( 'font-awesome' );

			wp_register_style( 'font-awesome', SMILEPURE_THEME_URI . '/assets/fonts/awesome/css/fontawesome-all.min.css', null, '6.2.0' );
			wp_register_style( 'font-awesome-v5', SMILEPURE_THEME_URI . '/assets/fonts/awesome/css/v5-font-face.min.css', null, '6.2.0' );

			wp_enqueue_style( 'font-flaticon', SMILEPURE_THEME_URI . '/assets/fonts/flaticon/font-flaticon.css', null, null );
			wp_enqueue_style( 'font-smilepure', SMILEPURE_THEME_URI . '/assets/fonts/smilepure/font-smilepure.css', null, null );
			wp_enqueue_style( 'font-icomoon', SMILEPURE_THEME_URI . '/assets/fonts/icomoon/font-icomoon.css', null, null );
			wp_register_style( 'font-ion', SMILEPURE_THEME_URI . '/assets/fonts/ion/font-ion.min.css', null, null );
			wp_register_style( 'font-icomoon', SMILEPURE_THEME_URI . '/assets/fonts/icomoon/font-icomoon.css', null, null );
			wp_register_style( 'font-linea', SMILEPURE_THEME_URI . '/assets/fonts/linea/font-linea.min.css', null, null );

			wp_register_style( 'spinkit', SMILEPURE_THEME_URI . '/assets/libs/spinkit/spinkit.css', null, null );

			wp_register_style( 'justified-gallery', SMILEPURE_THEME_URI . '/assets/libs/justified-gallery/justifiedGallery.min.css', null, '3.6.3' );
			wp_register_script( 'justified-gallery', SMILEPURE_THEME_URI . '/assets/libs/justified-gallery/jquery.justifiedGallery.min.js', array( 'jquery' ), '3.6.3', true );

			wp_register_script( 'picturefill', SMILEPURE_THEME_URI . '/assets/libs/picturefill/picturefill.min.js', array( 'jquery' ), null, true );
			wp_register_script( 'mousewheel', SMILEPURE_THEME_URI . "/assets/libs/mousewheel/jquery.mousewheel.js", array( 'jquery' ), SMILEPURE_THEME_VERSION, true );
			wp_enqueue_style( 'lightgallery', SMILEPURE_THEME_URI . '/assets/libs/light-gallery/css/lightgallery.min.css', null, '1.6.4' );
			wp_enqueue_script( 'lightgallery', SMILEPURE_THEME_URI . "/assets/libs/light-gallery/js/lightgallery-all.js", array(
				'jquery',
				'picturefill',
				'mousewheel',
			), null, true );

			wp_register_style( 'lightslider', SMILEPURE_THEME_URI . '/assets/libs/light-slider/css/lightslider.min.css', null, '1.1.6' );
			wp_register_script( 'lightslider', SMILEPURE_THEME_URI . "/assets/js/lightslider.js", array( 'jquery' ), '1.1.6', true );

			wp_register_style( 'swiper', SMILEPURE_THEME_URI . '/assets/libs/swiper/css/swiper.min.css', null, '4.5.0' );
			wp_register_script( 'swiper', SMILEPURE_THEME_URI . "/assets/libs/swiper/js/swiper.js", array(
				'jquery',
				'imagesloaded',
			), '4.5.0', true );

			wp_register_style( 'image-before-after', SMILEPURE_THEME_URI . '/assets/libs/twentytwenty/css/twentytwenty.css', null, null );

			// Fix VC waypoints.
			if ( ! wp_script_is( 'vc_waypoints', 'registered' ) ) {
				wp_register_script( 'vc_waypoints', SMILEPURE_THEME_URI . '/assets/libs/vc-waypoints/vc-waypoints.min.js', array( 'jquery' ), null, true );
			}

			// Register scripts
			wp_register_script( 'slimscroll', SMILEPURE_THEME_URI . '/assets/libs/slimscroll/jquery.slimscroll.min.js', array( 'jquery' ), '1.3.8', true );
			wp_register_script( 'easing', SMILEPURE_THEME_URI . '/assets/libs/easing/jquery.easing.min.js', array( 'jquery' ), '1.3', true );
			wp_register_script( 'matchheight', SMILEPURE_THEME_URI . '/assets/libs/matchheight/jquery.matchheight-min.js', array( 'jquery' ), SMILEPURE_THEME_VERSION, true );
			wp_register_script( 'gmap3', SMILEPURE_THEME_URI . '/assets/libs/gmap3/gmap3.min.js', array( 'jquery' ), SMILEPURE_THEME_VERSION, true );
			wp_register_script( 'countdown', SMILEPURE_THEME_URI . '/assets/libs/jquery.countdown/js/jquery.countdown.min.js', array( 'jquery' ), SMILEPURE_THEME_VERSION, true );
			wp_register_script( 'typed', SMILEPURE_THEME_URI . '/assets/libs/typed/typed.min.js', array( 'jquery' ), null, true );

			// Fix WordPress old version not registered this script
			if ( ! wp_script_is( 'imagesloaded', 'registered' ) ) {
				wp_register_script( 'imagesloaded', SMILEPURE_THEME_URI . '/assets/libs/imagesloaded/imagesloaded.min.js', array( 'jquery' ), null, true );
			}

			wp_register_script( 'isotope-masonry', SMILEPURE_THEME_URI . '/assets/libs/isotope/js/isotope.pkgd.min.js', array( 'jquery' ), SMILEPURE_THEME_VERSION, true );
			wp_register_script( 'isotope-packery', SMILEPURE_THEME_URI . '/assets/libs/packery-mode/packery-mode.pkgd.min.js', array(
				'jquery',
				'imagesloaded',
				'isotope-masonry',
			), SMILEPURE_THEME_VERSION, true );

			wp_register_script( 'smooth-scroll', SMILEPURE_THEME_URI . '/assets/libs/smooth-scroll-for-web/SmoothScroll.min.js', array(
				'jquery',
			), '1.4.6', true );

			wp_register_script( 'lazyload', SMILEPURE_THEME_URI . "/assets/libs/lazyload/lazyload.js", array(), SMILEPURE_THEME_VERSION, true );

			wp_register_script( 'tween-max', SMILEPURE_THEME_URI . '/assets/libs/tween-max/TweenMax.min.js', array(
				'jquery',
			), SMILEPURE_THEME_VERSION, true );

			wp_register_script( 'firefly', SMILEPURE_THEME_URI . "/assets/js/firefly.js", array(
				'jquery',
			), SMILEPURE_THEME_VERSION, true );

			wp_register_script( 'wavify', SMILEPURE_THEME_URI . "/assets/js/wavify.js", array(
				'jquery',
				'tween-max',
			), SMILEPURE_THEME_VERSION, true );

			wp_register_script( 'odometer', SMILEPURE_THEME_URI . '/assets/libs/odometer/odometer.min.js', array(
				'jquery',
			), SMILEPURE_THEME_VERSION, true );

			wp_register_script( 'counter-up', SMILEPURE_THEME_URI . '/assets/libs/countTo/jquery.countTo.js', array(
				'jquery',
			), SMILEPURE_THEME_VERSION, true );

			// Counter JS by SmilePure theme
			wp_register_script( 'smilepure-counter', SMILEPURE_THEME_URI . "/assets/js/counter.js", array(
				'jquery',
			), SMILEPURE_THEME_VERSION, true );

			wp_register_script( 'chart', SMILEPURE_THEME_URI . '/assets/libs/chart/chart.min.js', array(
				'jquery',
			), SMILEPURE_THEME_VERSION, true );

			// Chart JS by SmilePure theme
			wp_register_script( 'smilepure-chart', SMILEPURE_THEME_URI . "/assets/js/chart.js", array(
				'jquery',
				'vc_waypoints',
				'chart',
			), SMILEPURE_THEME_VERSION, true );

			wp_register_script( 'circle-progress', SMILEPURE_THEME_URI . '/assets/libs/circle-progress/circle-progress.min.js', array( 'jquery' ), null, true );

			// Circle Progress JS by SmilePure theme
			wp_register_script( 'smilepure-circle-progress', SMILEPURE_THEME_URI . "/assets/js/circle-progress.js", array(
				'jquery',
				'vc_waypoints',
				'circle-progress',
			), null, true );

			wp_register_script( 'smilepure-pricing', SMILEPURE_THEME_URI . "/assets/js/pricing.js", array(
				'jquery',
				'matchheight',
			), null, true );

			// Before After Image
			wp_register_script( 'twentytwenty', SMILEPURE_THEME_URI . '/assets/libs/twentytwenty/js/jquery.twentytwenty.js', array(
				'jquery',
			), null, true );
			wp_register_script( 'event-move', SMILEPURE_THEME_URI . '/assets/libs/twentytwenty/js/jquery.event.move.js', array(
				'jquery',
			), null, true );

			// Accordion JS by SmilePure theme
			wp_register_script( 'smilepure-accordion', SMILEPURE_THEME_URI . "/assets/js/accordion.js", array( 'jquery' ), SMILEPURE_THEME_VERSION, true );

			// Enqueue the theme's style.css
			wp_enqueue_style( 'font-ion' );
			wp_enqueue_style( 'font-icomoon' );
			wp_enqueue_style( 'font-linea' );
			wp_enqueue_style( 'font-awesome' );
			wp_enqueue_style( 'swiper' );
			wp_enqueue_style( 'spinkit' );

			if ( is_rtl() ) {
				wp_enqueue_style( 'smilepure-style', get_template_directory_uri() . "/style-rtl{$min}.css" );
			} else {
				wp_enqueue_style( 'smilepure-style', get_template_directory_uri() . "/style{$min}.css" );
			}

			// Register scripts
			if ( Smilepure::setting( 'header_sticky_enable' ) ) {
				wp_enqueue_script( 'headroom', SMILEPURE_THEME_URI . "/assets/js/headroom.js", array( 'jquery' ), SMILEPURE_THEME_VERSION, true );
			}

			if ( Smilepure::setting( 'smooth_scroll_enable' ) ) {
				// Smooth scroll bar
				wp_enqueue_script( 'smooth-scroll' );
			}

			// Smooth scroll link
			wp_enqueue_script( 'jquery-smooth-scroll', SMILEPURE_THEME_URI . '/assets/libs/smooth-scroll/jquery.smooth-scroll.min.js', array( 'jquery' ), SMILEPURE_THEME_VERSION, true );

			wp_enqueue_script( 'swiper' );
			wp_enqueue_script( 'matchheight' );
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_script( 'smartmenus', SMILEPURE_THEME_URI . "/assets/libs/smartmenus/jquery.smartmenus.js", array( 'jquery' ), SMILEPURE_THEME_VERSION, true );

			if ( Smilepure::setting( 'lazy_load_images' ) ) {
				wp_enqueue_script( 'lazyload' );
			}

			// The comment-reply script
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				if ( $post_type === 'post' ) {
					if ( Smilepure::setting( 'single_post_comment_enable' ) === '1' ) {
						wp_enqueue_script( 'comment-reply' );
					}
				} elseif ( $post_type === 'service' ) {
					if ( Smilepure::setting( 'single_service_comment_enable' ) === '1' ) {
						wp_enqueue_script( 'comment-reply' );
					}
				} else {
					wp_enqueue_script( 'comment-reply' );
				}
			}

			// Load Visual Composer JS above theme JS
			wp_enqueue_script( 'wpb_composer_front_js' );

			// Enqueue main JS
			wp_enqueue_script( 'smilepure-script', SMILEPURE_THEME_URI . "/assets/js/main.js", array(
				'jquery',
			), SMILEPURE_THEME_VERSION, true );

			if ( Smilepure_Helper::active_woocommerce() ) {
				wp_enqueue_script( 'smilepure-woo', SMILEPURE_THEME_URI . "/assets/js/woo.js", array(
					'smilepure-script',
				), SMILEPURE_THEME_VERSION, true );
			}

			// Enqueue custom variable JS
			$js_variables = array(
				'templateUrl'               => SMILEPURE_THEME_URI,
				'ajaxurl'                   => admin_url( 'admin-ajax.php' ),
				'primary_color'             => Smilepure::setting( 'primary_color' ),
				'header_sticky_enable'      => Smilepure::setting( 'header_sticky_enable' ),
				'header_sticky_height'      => Smilepure::setting( 'header_sticky_height' ),
				'scroll_top_enable'         => Smilepure::setting( 'scroll_top_enable' ),
				'lazyLoadImages'            => Smilepure::setting( 'lazy_load_images' ),
				'light_gallery_auto_play'   => Smilepure::setting( 'light_gallery_auto_play' ),
				'light_gallery_download'    => Smilepure::setting( 'light_gallery_download' ),
				'light_gallery_full_screen' => Smilepure::setting( 'light_gallery_full_screen' ),
				'light_gallery_zoom'        => Smilepure::setting( 'light_gallery_zoom' ),
				'light_gallery_thumbnail'   => Smilepure::setting( 'light_gallery_thumbnail' ),
				'light_gallery_share'       => Smilepure::setting( 'light_gallery_share' ),
				'mobile_menu_breakpoint'    => Smilepure::setting( 'mobile_menu_breakpoint' ),
				'isSingleProduct'           => is_singular( 'product' ),
				'like'                      => esc_html__( 'Like', 'smilepure' ),
				'unlike'                    => esc_html__( 'Unlike', 'smilepure' ),
				'isRTL'                     => is_rtl(),
			);
			wp_localize_script( 'smilepure-script', '$insight', $js_variables );

			// Custom JS
			if ( Smilepure::setting( 'custom_js_enable' ) == 1 ) {
				wp_add_inline_script( 'smilepure-script', html_entity_decode( Smilepure::setting( 'custom_js' ) ) );
			}
		}

		public function rtl_styles() {
			$min = $this->get_min_suffix();

			wp_register_style( 'smilepure-style-rtl-custom', SMILEPURE_THEME_URI . "/style-rtl-custom$min.css", [ 'smilepure-style' ], SMILEPURE_THEME_VERSION );

			if ( is_rtl() ) {
				wp_enqueue_style( 'smilepure-style-rtl-custom' );
			}
		}

		/**
		 * @return string
		 */
		public function get_min_suffix() {
			return defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ? '' : '.min';
		}
	}

	new Smilepure_Enqueue();
}
