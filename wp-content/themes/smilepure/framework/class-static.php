<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Smilepure {

	const PRIMARY_FONT = 'Nunito Sans';
	const HEADING_FONT = 'Heebo';
	const PRIMARY_COLOR = '#52CBCB';
	const SECONDARY_COLOR = '#002345';
	const HEADING_COLOR = '#002345';
	const BODY_COLOR = '#486683';

	public static function is_tablet() {
		if ( ! class_exists( 'Mobile_Detect' ) ) {
			return false;
		}

		return Mobile_Detect::instance()->isTablet();
	}

	public static function is_mobile() {
		if ( ! class_exists( 'Mobile_Detect' ) ) {
			return false;
		}

		if ( self::is_tablet() ) {
			return false;
		}

		return Mobile_Detect::instance()->isMobile();
	}

	public static function is_handheld() {
		return ( self::is_mobile() || self::is_tablet() );
	}

	public static function is_desktop() {
		return ! self::is_handheld();
	}

	/**
	 * Requirement one file.
	 *
	 * @param string $file path of file
	 */
	public static function require_file( $file = '' ) {
		if ( file_exists( $file ) ) {
			require_once $file;
		} else {
			wp_die( esc_html__( 'Could not load theme file: ', 'smilepure' ) . $file );
		}
	}

	/**
	 * Requirement multi files.
	 *
	 * @param array $files array path of files
	 */
	public static function require_files( $files = array() ) {
		if ( empty( $files ) ) {
			return;
		}

		foreach ( $files as $file ) {
			if ( file_exists( $file ) ) {
				require_once $file;
			} else {
				wp_die( esc_html__( 'Could not load theme file: ', 'smilepure' ) . $file );
			}
		}
	}

	/**
	 * Mobile Menu
	 */
	public static function menu_mobile() {
		$args = array(
			'theme_location' => 'mobile',
			'container'      => 'ul',
			'menu_class'     => 'menu__container',
			'menu_id'        => 'mobile-menu-primary',
		);

		if ( ! has_nav_menu( 'mobile' ) && has_nav_menu( 'primary' ) ) {
			$args['theme_location'] = 'primary';
		}

		if ( ( has_nav_menu( 'mobile' ) || has_nav_menu( 'primary' ) ) && class_exists( 'Smilepure_Walker_Nav_Menu' ) ) {
			$args['walker'] = new Smilepure_Walker_Nav_Menu;
		}

		wp_nav_menu( $args );
	}

	/**
	 * Off Canvas Menu
	 */
	public static function off_canvas_menu_primary() {
		self::menu_primary( array(
			'menu_id'    => 'off-canvas-menu-primary',
		) );
	}

	/**
	 * Primary Menu
	 */
	public static function menu_primary( $args = array() ) {
		$defaults = array(
			'theme_location' => 'primary',
			'container'      => 'ul',
			'menu_class'     => 'menu__container sm sm-simple',
		);
		$args     = wp_parse_args( $args, $defaults );

		if ( has_nav_menu( 'primary' ) && class_exists( 'Smilepure_Walker_Nav_Menu' ) ) {
			$args['walker'] = new Smilepure_Walker_Nav_Menu;
		}

		$menu = Smilepure_Helper::get_post_meta( 'menu_display', '' );

		if ( $menu !== '' ) {
			$args['menu'] = $menu;
		}

		wp_nav_menu( $args );
	}

	/**
	 * Logo
	 */
	public static function branding_logo() {
		$logo_url              = Smilepure_Helper::get_post_meta( 'custom_logo', '' );
		$logo_retina_url       = Smilepure_Helper::get_post_meta( 'custom_logo_retina', '' );
		$logo_light_url        = Smilepure::setting( 'logo_light' );
		$logo_light_retina_url = Smilepure::setting( 'logo_light_retina' );
		$logo_dark_url         = Smilepure::setting( 'logo_dark' );
		$logo_dark_retina_url  = Smilepure::setting( 'logo_dark_retina' );
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="<?php esc_attr_e( 'home', 'smilepure' ); ?>">
			<?php if ( $logo_url !== '' ) { ?>
				<img src="<?php echo esc_url( $logo_url ); ?>"
				     alt="<?php bloginfo( 'name' ); ?>" class="custom-logo"
					<?php echo( ( $logo_retina_url != '' ) ? 'srcset="' . esc_url( $logo_retina_url ) . ' 2x"' : '' ); ?>/>
			<?php } else { ?>
				<img src="<?php echo esc_url( $logo_light_url ); ?>"
				     alt="<?php bloginfo( 'name' ); ?>" class="light-logo"
					<?php echo( ( $logo_light_retina_url != '' ) ? 'srcset="' . esc_url( $logo_light_retina_url ) . ' 2x"' : '' ); ?>/>
				<img src="<?php echo esc_url( $logo_dark_url ); ?>"
				     alt="<?php bloginfo( 'name' ); ?>" class="dark-logo"
					<?php echo( ( $logo_dark_retina_url != '' ) ? 'srcset="' . esc_url( $logo_dark_retina_url ) . ' 2x"' : '' ); ?>/>
			<?php } ?>
		</a>
		<?php
	}

	/**
	 * Get settings for Kirki
	 *
	 * @param string $setting
	 *
	 * @return mixed
	 */
	public static function setting( $setting = '' ) {
		$settings = Smilepure_Kirki::get_option( 'theme', $setting );

		return $settings;
	}

	/**
	 * Adds custom attributes to the body tag.
	 */
	public static function body_attributes() {
		$attrs = apply_filters( 'Smilepure_body_attributes', array() );

		$attrs_string = '';
		if ( ! empty( $attrs ) ) {
			foreach ( $attrs as $attr => $value ) {
				$attrs_string .= " {$attr}=" . '"' . esc_attr( $value ) . '"';
			}
		}

		echo '' . $attrs_string;
	}

	/**
	 * Adds custom classes to the header.
	 *
	 * @param string $class extra class
	 */
	public static function top_bar_class( $class = '' ) {
		$classes = array( 'page-top-bar' );

		$type = Smilepure_Global::instance()->get_top_bar_type();

		$classes[] = "top-bar-{$type}";

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'Smilepure_top_bar_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}

	/**
	 * Adds custom classes to the header.
	 */
	public static function header_class( $class = '' ) {
		$classes = array( 'page-header' );

		$header_type = Smilepure_Global::instance()->get_header_type();

		$classes[] = "header-{$header_type}";

		$_overlay_enable = Smilepure::setting( "header_style_{$header_type}_overlay" );

		if ( $_overlay_enable === '1' ) {
			$classes[] = 'header-layout-fixed';
		}

		$_logo     = Smilepure::setting( "header_style_{$header_type}_logo" );
		$classes[] = "{$_logo}-logo-version";

		$_sticky_logo = Smilepure::setting( "header_sticky_logo" );
		$classes[]    = " header-sticky-$_sticky_logo-logo";

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'Smilepure_header_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}

	/**
	 * Adds custom classes to the branding.
	 */
	public static function branding_class( $class = '' ) {
		$classes = array( 'branding' );

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'Smilepure_branding_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}

	/**
	 * Adds custom classes to the navigation.
	 */
	public static function navigation_class( $class = '' ) {
		$classes = array( 'navigation page-navigation' );

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'Smilepure_navigation_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}

	/**
	 * Adds custom classes to the footer.
	 */
	public static function footer_class( $class = '' ) {
		$classes = array( 'page-footer' );

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'Smilepure_footer_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}

	public static function apply_style( $style, $selector, $echo = true ) {
		if ( empty( $style ) ) {
			return;
		}
		$style = $selector . '{' . $style . '}';
		if ( $echo ) {
			echo self::add_style_to_head( $style );
		} else {
			return $style;
		}
	}

	public static function add_style_to_head( $style ) {
		$script = '<script id=\'' . uniqid( 'custom-style-', false ) . '\' type=\'text/javascript\'>';
		$script .= '(function($) {';
		$script .= '$(document).ready(function() {';
		$script .= '$("head").append("<style>' . str_replace( '"', "'", $style ) . '</style>");';
		$script .= '});';
		$script .= '})(jQuery);';
		$script .= '</script>';

		return $script;
	}
}
