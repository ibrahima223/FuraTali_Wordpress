<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 */
if ( ! class_exists( 'Smilepure_Functions' ) ) {
	class Smilepure_Functions {

		protected static $instance = null;

		public function __construct() {
			add_action( 'wp_footer', array( $this, 'scroll_top' ) );
			add_action( 'wp_footer', array( $this, 'popup_search' ) );
			add_action( 'wp_footer', array( $this, 'mobile_menu_template' ) );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function popup_search() {
			?>
			<div id="page-search-popup" class="page-search-popup">
				<div id="search-popup-close" class="search-popup-close"></div>

				<div class="page-search-popup-content">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php
		}

		/**
		 * Add mobile to footer
		 */
		public function mobile_menu_template() {
			?>
			<div id="page-mobile-main-menu" class="page-mobile-main-menu">
				<div class="page-mobile-menu-header">
					<div class="page-mobile-menu-logo">
						<?php
						$logo_url = Smilepure::setting( 'mobile_logo' );
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( $logo_url ); ?>"
							     alt="<?php echo esc_attr__( 'Logo', 'smilepure' ); ?>"/>
						</a>
					</div>
					<div id="page-close-mobile-menu" class="page-close-mobile-menu">
						<span class="fal fa-times"></span>
					</div>
				</div>

				<div class="page-mobile-menu-content">
					<?php Smilepure::menu_mobile(); ?>
				</div>
			</div>
			<?php
		}

		/**
		 * Scroll to top JS
		 */
		public function scroll_top() {
			?>
			<?php if ( Smilepure::setting( 'scroll_top_enable' ) ) : ?>
				<a class="page-scroll-up" id="page-scroll-up"><i class="ion-android-arrow-up"></i></a>
			<?php endif; ?>
			<?php
		}

		/**
		 * Pass a PHP string to Javasript variable
		 **/
		public function esc_js( $string ) {
			return str_replace( "\n", '\n', str_replace( '"', '\"', addcslashes( str_replace( "\r", '', (string) $string ), "\0..\37" ) ) );
		}
	}

	new Smilepure_Functions();
}
