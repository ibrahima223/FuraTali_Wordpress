<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper functions
 */
if ( ! class_exists( 'Smilepure_Helper' ) ) {
	class Smilepure_Helper {
		static $preloader_style = array();

		function __construct() {
			self::$preloader_style = array(
				'rotating-plane'  => esc_attr__( 'Rotating Plane', 'smilepure' ),
				'double-bounce'   => esc_attr__( 'Double Bounce', 'smilepure' ),
				'three-bounce'    => esc_attr__( 'Three Bounce', 'smilepure' ),
				'wave'            => esc_attr__( 'Wave', 'smilepure' ),
				'wandering-cubes' => esc_attr__( 'Wandering Cubes', 'smilepure' ),
				'pulse'           => esc_attr__( 'Pulse', 'smilepure' ),
				'chasing-dots'    => esc_attr__( 'Chasing dots', 'smilepure' ),
				'circle'          => esc_attr__( 'Circle', 'smilepure' ),
				'cube-grid'       => esc_attr__( 'Cube Grid', 'smilepure' ),
				'fading-circle'   => esc_attr__( 'Fading Circle', 'smilepure' ),
				'folding-cube'    => esc_attr__( 'Folding Cube', 'smilepure' ),
				'image'           => esc_attr__( 'Image', 'smilepure' ),
			);
		}

		public static function e( $var = '' ) {
			echo "{$var}";
		}

		public static function get_preloader_list() {
			$list = self::$preloader_style + array( 'random' => esc_attr__( 'Random', 'smilepure' ) );

			return $list;
		}

		public static function get_post_meta( $name, $default = false ) {
			global $Smilepure_page_options;
			if ( $Smilepure_page_options != false && isset( $Smilepure_page_options[ $name ] ) ) {
				return $Smilepure_page_options[ $name ];
			}

			return $default;
		}

		public static function get_the_post_meta( $options, $name, $default = false ) {
			if ( $options != false && isset( $options[ $name ] ) ) {
				return $options[ $name ];
			}

			return $default;
		}

		/**
		 * @return array
		 */
		public static function get_list_revslider() {
			global $wpdb;
			$revsliders = array(
				'' => esc_html__( 'Select a slider', 'smilepure' ),
			);

			if ( function_exists( 'rev_slider_shortcode' ) ) {

				$table_name = $wpdb->prefix . "revslider_sliders";
				$query      = $wpdb->prepare( "SELECT * FROM $table_name WHERE type != %s ORDER BY title ASC", 'template' );
				$results    = $wpdb->get_results( $query );
				if ( ! empty( $results ) ) {
					foreach ( $results as $result ) {
						$revsliders[ $result->alias ] = $result->title;
					}
				}
			}

			return $revsliders;
		}

		/**
		 * @return array|int|WP_Error
		 */
		public static function get_all_menus() {
			$args = array(
				'hide_empty' => true,
			);

			$menus   = get_terms( 'nav_menu', $args );
			$results = array();

			foreach ( $menus as $key => $menu ) {
				$results[ $menu->slug ] = $menu->name;
			}
			$results[''] = esc_html__( 'Default Menu', 'smilepure' );

			return $results;
		}

		/**
		 * @param bool $default_option
		 *
		 * @return array
		 */
		public static function get_registered_sidebars( $default_option = false, $empty_option = true ) {
			global $wp_registered_sidebars;
			$sidebars = array();
			if ( $empty_option == true ) {
				$sidebars['none'] = esc_html__( 'No Sidebar', 'smilepure' );
			}
			if ( $default_option == true ) {
				$sidebars['default'] = esc_html__( 'Default', 'smilepure' );
			}
			foreach ( $wp_registered_sidebars as $sidebar ) {
				$sidebars[ $sidebar['id'] ] = $sidebar['name'];
			}

			return $sidebars;
		}

		/**
		 * Get list sidebar positions
		 *
		 * @return array
		 */
		public static function get_list_sidebar_positions( $default = false ) {
			if ( $default == true ) {
				$positions['default'] = esc_html__( 'Default', 'smilepure' );
			}

			$positions['left']  = esc_html__( 'Left', 'smilepure' );
			$positions['right'] = esc_html__( 'Right', 'smilepure' );

			return $positions;
		}

		/**
		 * Get content of file
		 *
		 * @param string $path
		 *
		 * @return mixed
		 */
		static function get_file_contents( $path = '' ) {
			$content = '';
			if ( $path === '' || ! file_exists( $path ) ) {
				return $content;
			}

			global $wp_filesystem;
			Smilepure::require_file( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
			$content = $wp_filesystem->get_contents( $path );

			return $content;
		}

		static function the_file_contents( $path ) {
			$content = self::get_file_contents( $path );

			echo "{$content}";
		}

		/**
		 * @param $var
		 *
		 * Output anything in debug bar.
		 */
		public static function d( $var ) {
			if ( ! class_exists( 'Debug_Bar' ) || ! function_exists( 'kint_debug_ob' ) ) {
				return;
			}
			ob_start( 'kint_debug_ob' );
			d( $var );
			ob_end_flush();
		}

		public static function strposa( $haystack, $needle, $offset = 0 ) {
			if ( ! is_array( $needle ) ) {
				$needle = array( $needle );
			}
			foreach ( $needle as $query ) {
				if ( strpos( $haystack, $query, $offset ) !== false ) {
					return true;
				} // stop on first true result
			}

			return false;
		}

		/**
		 * Get size information for all currently-registered image sizes.
		 *
		 * @global $_wp_additional_image_sizes
		 * @uses   get_intermediate_image_sizes()
		 * @return array $sizes Data for all currently-registered image sizes.
		 */
		public static function get_image_sizes() {
			global $_wp_additional_image_sizes;

			$sizes = array( 'full' => 'full' );

			foreach ( get_intermediate_image_sizes() as $_size ) {
				if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
					$_size_w                               = get_option( "{$_size}_size_w" );
					$_size_h                               = get_option( "{$_size}_size_h" );
					$sizes["$_size {$_size_w}x{$_size_h}"] = $_size;
				} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
					$sizes["$_size {$_wp_additional_image_sizes[ $_size ]['width']}x{$_wp_additional_image_sizes[ $_size ]['height']}"] = $_size;
				}
			}

			return $sizes;
		}

		public static function get_attachment_info( $attachment_id ) {
			$attachment     = get_post( $attachment_id );
			$attachment_url = wp_get_attachment_url( $attachment_id );

			if ( $attachment === null ) {
				return false;
			}

			$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );

			if ( $alt === '' ) {
				$alt = $attachment->post_title;
			}

			return array(
				'alt'         => $alt,
				'caption'     => $attachment->post_excerpt,
				'description' => $attachment->post_content,
				'href'        => get_permalink( $attachment->ID ),
				'src'         => $attachment_url,
				'title'       => $attachment->post_title,
			);
		}

		public static function w3c_iframe( $iframe ) {
			$iframe = str_replace( 'frameborder="0"', '', $iframe );
			$iframe = str_replace( 'frameborder="no"', '', $iframe );
			$iframe = str_replace( 'scrolling="no"', '', $iframe );
			$iframe = str_replace( 'gesture="media"', '', $iframe );
			$iframe = str_replace( 'allow="encrypted-media"', '', $iframe );

			return $iframe;
		}

		public static function get_md_media_query() {
			return '@media (max-width: 991px)';
		}

		public static function get_sm_media_query() {
			return '@media (max-width: 767px)';
		}

		public static function get_xs_media_query() {
			return '@media (max-width: 554px)';
		}

		public static function aq_resize( $args = array() ) {
			$defaults = array(
				'url'     => '',
				'width'   => null,
				'height'  => null,
				'crop'    => true,
				'single'  => true,
				'upscale' => false,
				'echo'    => false,
			);

			$args  = wp_parse_args( $args, $defaults );
			$image = aq_resize( $args['url'], $args['width'], $args['height'], $args['crop'], $args['single'], $args['upscale'] );

			if ( empty( $image ) ) {
				$image = $args['url'];
			}

			return $image;
		}

		public static function get_lazy_load_image( $args = array() ) {
			$defaults = array(
				'url'         => '',
				'width'       => null,
				'height'      => null,
				'crop'        => true,
				'single'      => true,
				'upscale'     => false,
				'echo'        => false,
				'placeholder' => '',
				'src'         => '',
				'alt'         => '',
				'full_size'   => false,
			);

			$image_id = attachment_url_to_postid( $args['url'] );

			$image_full = self::get_attachment_info( $image_id );

			$alt = ! empty( $args['alt'] ) ? $args['alt'] : $image_full['alt'];

			$args = wp_parse_args( $args, $defaults );

			if ( ! isset( $args['lazy'] ) ) {
				$lazy_load_enable = Smilepure::setting( 'lazy_image_enable' );

				if ( $lazy_load_enable ) {
					$args['lazy'] = true;
				} else {
					$args['lazy'] = false;
				}
			}

			$image      = false;
			$attributes = array();

			if ( $args['full_size'] === false ) {
				$image = aq_resize( $args['url'], $args['width'], $args['height'], $args['crop'], $args['single'], $args['upscale'] );
			}

			if ( $image === false ) {
				$image = $args['url'];
			}

			$output   = '';
			$_classes = '';

			if ( $args['lazy'] === true ) {
				if ( $args['full_size'] === false ) {
					$placeholder_w = round( $args['width'] / 10 );
					$placeholder_h = $args['height'];

					if ( $args['height'] !== 9999 ) {
						$placeholder_h = round( $args['height'] / 10 );
					}
				} else {
					$placeholder_w = 50;
					$placeholder_h = 9999;
					$args['crop']  = false;
				}

				$placeholder_image = aq_resize( $image, $placeholder_w, $placeholder_h, $args['crop'], $args['single'], $args['upscale'] );

				$attributes[] = 'src="' . esc_url( $placeholder_image ) . '"';
				$attributes[] = 'data-src="' . esc_url( $image ) . '"';

				if ( $args['width'] !== '' && $args['width'] !== null ) {
					$attributes[] = 'width="' . $args['width'] . '"';
				}

				if ( $args['height'] !== '' && $args['height'] !== null && $args['height'] !== 9999 ) {
					$attributes[] = 'height="' . $args['height'] . '"';
				}

				$_classes .= ' tm-lazy-load';
			} else {
				$attributes[] = 'src="' . esc_url( $image ) . '"';
			}

			$attributes[] = 'alt="' . esc_attr( $alt ) . '"';

			if ( $_classes !== '' ) {
				$attributes[] = 'class="' . esc_attr( $_classes ) . '"';
			}

			$output .= '<img ' . implode( ' ', $attributes ) . ' />';

			if ( $args['echo'] === true ) {
				echo '' . $output;
			} else {
				return $output;
			}
		}

		public static function get_attachment_url_by_id( $args = array() ) {
			$id = $size = $width = $height = $crop = '';

			$defaults = array(
				'id'      => '',
				'size'    => 'full',
				'width'   => '',
				'height'  => '',
				'crop'    => true,
				'details' => false,
			);

			$args = wp_parse_args( $args, $defaults );
			extract( $args );

			if ( $id === '' ) {
				return '';
			}

			if ( $details === false ) {
				$url           = wp_get_attachment_image_url( $id, 'full' );
				$image_cropped = self::get_image_cropped_url( $url, $args );

				return $image_cropped[0];
			} else {
				$image_full = self::get_attachment_info( $id );
				$url        = $image_full['src'];

				$image_cropped = self::get_image_cropped_url( $url, $args );

				$full_details                  = $image_full;
				$full_details['cropped_image'] = $image_cropped[0];

				return $full_details;
			}
		}

		public static function get_attachment_by_id( $id = '', $size = 'full', $width = '', $height = '', $echo = true ) {
			$url = wp_get_attachment_image_url( $id, 'full' );

			self::get_attachment_by_url( $url, $size, $width, $height, $echo );
		}

		/**
		 * @param string $url Original image url.
		 * @param array  $args Array attributes.
		 *
		 * @return array|bool|string
		 */
		public static function get_image_cropped_url( $url, $args = array() ) {
			extract( $args );

			if ( $url === false ) {
				return array( 0 => '' );
			}

			if ( $size === 'full' ) {
				return array( 0 => $url );
			}

			if ( $size !== 'custom' ) {
				$_sizes = explode( 'x', $size );
				$width  = $_sizes[0];
				$height = $_sizes[1];
			}

			if ( $width !== '' && $height !== '' && function_exists( 'aq_resize' ) ) {
				$crop_image = aq_resize( $url, $width, $height, $crop, false );

				if ( is_array( $crop_image ) && $crop_image[0] !== '' ) {
					return $crop_image;
				}
			}

			return array( 0 => $url );
		}

		public static function get_attachment_by_url( $url = '', $size = 'full', $width = '', $height = '', $echo = true ) {
			$image = false;

			if ( $url === false || $url === '' ) {
				return false;
			}

			if ( $size !== 'full' && $size !== 'custom' ) {
				$_sizes = explode( 'x', $size );
				$width  = $_sizes[0];
				$height = $_sizes[1];
			}

			if ( $size !== 'full' && $width !== '' && $height !== '' ) {
				$image = Smilepure_Helper::get_lazy_load_image( array(
					'url'    => $url,
					'width'  => $width,
					'height' => $height,
					'crop'   => true,
					'echo'   => false,

				) );
			} else {
				$image = Smilepure_Helper::get_lazy_load_image( array(
					'url'       => $url,
					'echo'      => false,
					'full_size' => true,
				) );
			}

			if ( $echo ) {
				echo '' . $image;
			} else {
				return $image;
			}
		}

		public static function get_animation_list( $args = array() ) {
			return array(
				'none'             => esc_html__( 'None', 'smilepure' ),
				'fade-in'          => esc_html__( 'Fade In', 'smilepure' ),
				'move-up'          => esc_html__( 'Move Up', 'smilepure' ),
				'move-down'        => esc_html__( 'Move Down', 'smilepure' ),
				'move-left'        => esc_html__( 'Move Left', 'smilepure' ),
				'move-right'       => esc_html__( 'Move Right', 'smilepure' ),
				'scale-up'         => esc_html__( 'Scale Up', 'smilepure' ),
				'fall-perspective' => esc_html__( 'Fall Perspective', 'smilepure' ),
				'fly'              => esc_html__( 'Fly', 'smilepure' ),
				'flip'             => esc_html__( 'Flip', 'smilepure' ),
				'helix'            => esc_html__( 'Helix', 'smilepure' ),
				'pop-up'           => esc_html__( 'Pop Up', 'smilepure' ),
			);
		}

		public static function get_animation_classes( $animation = 'move-up' ) {
			$classes = '';
			if ( $animation === '' ) {
				$animation = 'move-up';
			}

			if ( $animation !== 'none' ) {
				$classes .= " tm-animation $animation";
			}

			return $classes;
		}

		public static function get_grid_animation_classes( $animation = 'move-up' ) {
			$classes = '';
			if ( $animation === '' ) {
				$animation = 'move-up';
			}

			if ( $animation !== 'none' ) {
				$classes .= " has-animation $animation";
			}

			return $classes;
		}

		public static function get_css_prefix( $property, $value ) {
			$css = '';
			switch ( $property ) {
				case 'border-radius' :
					$css = "-moz-border-radius: {$value};-webkit-border-radius: {$value};border-radius: {$value};";
					break;

				case 'box-shadow' :
					$css = "-moz-box-shadow: {$value};-webkit-box-shadow: {$value};box-shadow: {$value};";
					break;

				case 'order' :
					$css = "-webkit-order: $value; -moz-order: $value; order: $value;";
					break;
			}

			return $css;
		}

		public static function get_shortcode_css_color_inherit( $attr = 'color', $color = '', $custom = '', $gradient = '' ) {
			$primary_color   = Smilepure::setting( 'primary_color' );
			$secondary_color = Smilepure::setting( 'secondary_color' );

			$gradient = isset( $gradient ) ? $gradient : '';

			$css = '';
			switch ( $color ) {
				case 'primary' :
					$css = "$attr: {$primary_color};";
					break;

				case 'secondary' :
					$css = "$attr: {$secondary_color};";
					break;

				case 'custom' :
					if ( $custom !== '' ) {
						$css = "$attr: {$custom};";
					}

					break;

				case 'transparent' :
					$css = "$attr: transparent;";
					break;

				case 'gradient' :
					$css = $gradient;

					if ( $attr === 'color' ) {
						$css .= 'color:transparent;-webkit-background-clip: text;background-clip: text;';
					}

					break;

			}

			return $css;
		}

		public static function get_list_hotspot() {
			$Smilepure_post_args = array(
				'post_type'      => 'points_image',
				'posts_per_page' => - 1,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'post_status'    => 'publish',
			);

			$results = array();

			$Smilepure_query = new WP_Query( $Smilepure_post_args );

			if ( $Smilepure_query->have_posts() ) :
				while ( $Smilepure_query->have_posts() ) : $Smilepure_query->the_post();
					$title             = get_the_title();
					$results[ $title ] = get_the_ID();
				endwhile;
				wp_reset_postdata();
			endif;

			return $results;
		}

		public static function get_vc_icon_template( $args = array() ) {

			$defaults = array(
				'type'         => '',
				'icon'         => '',
				'class'        => '',
				'parent_hover' => '',
			);

			$args         = wp_parse_args( $args, $defaults );

			vc_icon_element_fonts_enqueue( $args['type'] );

			switch ( $args['type'] ) {
				case 'linea_svg':
					$icon = str_replace( 'linea-', '', $args['icon'] );
					$_svg = SMILEPURE_THEME_URI . "/assets/svg/linea/{$icon}.svg";
					?>
					<div class="icon">
						<div class="tm-svg"
						     data-svg="<?php echo esc_url( $_svg ); ?>"
							<?php if ( isset( $args['svg_animate'] ) ): ?>
								data-type="<?php echo esc_attr( $args['svg_animate'] ); ?>"
							<?php endif; ?>
							<?php if ( $args['parent_hover'] !== '' ) : ?>
								data-hover="<?php echo esc_attr( $args['parent_hover'] ); ?>"
							<?php endif; ?>
						></div>
					</div>
					<?php
					break;
				default:
					?>
					<div class="icon">
						<span class="<?php echo esc_attr( $args['icon'] ); ?>"></span>
					</div>
					<?php
					break;
			}
		}

		public static function get_top_bar_list( $default_option = false ) {

			$results = array(
				'none' => esc_html__( 'Hide', 'smilepure' ),
				'01'   => esc_html__( 'Top Bar 01', 'smilepure' ),
				'02'   => esc_html__( 'Top Bar 02', 'smilepure' ),
				'03'   => esc_attr__( 'Top Bar 03', 'smilepure' ),
				'04'   => esc_attr__( 'Top Bar 04', 'smilepure' ),
				'05'   => esc_attr__( 'Top Bar 05', 'smilepure' ),
				'06'   => esc_attr__( 'Top Bar 06', 'smilepure' ),
				'07'   => esc_attr__( 'Top Bar 07', 'smilepure' ),
				'08'   => esc_attr__( 'Top Bar 08', 'smilepure' ),
				'09'   => esc_attr__( 'Top Bar 09', 'smilepure' ),
				'10'   => esc_attr__( 'Top Bar 10', 'smilepure' ),
				'11'   => esc_attr__( 'Top Bar 11', 'smilepure' ),
				'12'   => esc_attr__( 'Top Bar 12', 'smilepure' ),
			);

			if ( $default_option === true ) {
				$results = array( '' => esc_html__( 'Default', 'smilepure' ) ) + $results;
			}

			return $results;
		}

		public static function get_header_list( $default_option = false ) {

			$headers = array(
				'none' => esc_html__( 'Hide', 'smilepure' ),
				'01'   => esc_html__( '01. Header Info Slide, Nav bottom 01 - Dark', 'smilepure' ),
				'02'   => esc_html__( '02. Header Info Slide, Nav bottom 02 - Dark', 'smilepure' ),
				'06'   => esc_attr__( '03 .Header Info Slide, Nav bottom 03 - Dark', 'smilepure' ),
				'14'   => esc_attr__( '04. Header Info Slide, Nav bottom 04 - Dark', 'smilepure' ),
				'07'   => esc_attr__( '05. Header Info Slide Bottom - Dark', 'smilepure' ),
				'03'   => esc_attr__( '06. Header Standard - Dark', 'smilepure' ),
				'04'   => esc_attr__( '07. Header Standard 02 - Dark', 'smilepure' ),
				'17'   => esc_attr__( '08. Header Standard 03 - Dark', 'smilepure' ),
				'09'   => esc_attr__( '09. Header Standard - Light - Overlay', 'smilepure' ),
				'05'   => esc_attr__( '10. Header With Off canvas sidebar - Dark - Overlay', 'smilepure' ),
				'08'   => esc_attr__( '11. Header Logo Center, Nav Bottom - Dark', 'smilepure' ),
				'11'   => esc_attr__( '12. Header Modern, Info Bottom - Dark', 'smilepure' ),
				'19'   => esc_attr__( '13. Header Modern, Info Right - Dark', 'smilepure' ),
				'12'   => esc_attr__( '14. Header Left', 'smilepure' ),
				'13'   => esc_attr__( '15. Header Simple', 'smilepure' ),
				'15'   => esc_attr__( '16. Header Right Nav - Light - Overlay', 'smilepure' ),
				'18'   => esc_attr__( '17. Header Right Nav - Dark', 'smilepure' ),
				'16'   => esc_attr__( '18. Header minimal - Dark', 'smilepure' ),
				'21'   => esc_attr__( '19. Header Centered - Dark', 'smilepure' ),
				'22'   => esc_attr__( '20. Header Info Right Style 01 - Dark', 'smilepure' ),
				'23'   => esc_attr__( '21. Header Info Right Style 02 - Light - Overlay', 'smilepure' ),
			);

			if ( $default_option === true ) {
				$headers = array( '' => esc_html__( 'Default', 'smilepure' ) ) + $headers;
			}

			return $headers;
		}

		public static function get_title_bar_list( $default_option = false ) {

			$results = array(
				'none' => esc_html__( 'Hide', 'smilepure' ),
				'01'   => esc_html__( 'Style 01', 'smilepure' ),
				'02'   => esc_html__( 'Style 02', 'smilepure' ),
				'03'   => esc_attr__( 'Style 03', 'smilepure' ),
				'04'   => esc_attr__( 'Style 04', 'smilepure' ),
				'05'   => esc_attr__( 'Style 05', 'smilepure' ),
				'06'   => esc_attr__( 'Style 06', 'smilepure' ),
				'07'   => esc_attr__( 'Style 07', 'smilepure' ),
			);

			if ( $default_option === true ) {
				$results = array( 'default' => esc_html__( 'Default', 'smilepure' ) ) + $results;
			}

			return $results;
		}

		public static function get_coming_soon_demo_date() {
			$date = date( 'm/d/Y', strtotime( '+2 months', strtotime( date( 'Y/m/d' ) ) ) );

			return $date;
		}

		/**
		 * process aspect ratio fields
		 */
		public static function process_chart_aspect_ratio( $ar = '4:3', $width = 500 ) {
			$AR = explode( ':', $ar );

			$rat1 = $AR[0];
			$rat2 = $AR[1];

			$height = ( $width / $rat1 ) * $rat2;

			return $height;
		}

		public static function get_body_font() {
			$font = Smilepure::setting( 'typography_body' );

			if ( isset( $font['font-family'] ) ) {
				return "{$font['font-family']} Helvetica, Arial, sans-serif";
			}

			return 'Helvetica, Arial, sans-serif';
		}

		/**
		 * Check woocommerce plugin active
		 *
		 * @return boolean true if plugin activated
		 */
		public static function active_woocommerce() {
			if ( class_exists( 'WooCommerce' ) ) {
				return true;
			}

			return false;
		}

		public static function get_swiper_pagination_attributes( $pagination = '' ) {
			$attrs = '';

			if ( isset( $pagination ) && $pagination !== '' ) {
				$attrs .= ' data-pagination="1"';

				if ( $pagination === '8' ) {
					$attrs .= ' data-pagination-type="fraction"';
				} elseif ( in_array( $pagination, array( '7', '9' ), true ) ) {
					$attrs .= ' data-pagination-bullets="number"';
				}
			}

			echo "{$attrs}";
		}

		public static function break_words( $text ) {
			$text_arr = explode( ' ', trim( $text ) );

			if ( count( $text_arr ) > 1 ) {
				$first_word = array_shift( $text_arr );

				return '<span>' . $first_word . '</span> ' . implode( ' ', $text_arr );
			}

			return $text;
		}

		public static function number_with_zero( $num ) {
			if ( $num < 10 ) {
				return '0' . $num;
			}

			return $num;
		}

		public static function nice_class( $class ) {
			return trim( preg_replace( '/\s+/', ' ', $class ) );
		}
	}

	new Smilepure_Helper();
}
