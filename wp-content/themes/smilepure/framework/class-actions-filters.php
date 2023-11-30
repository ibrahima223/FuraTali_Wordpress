<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom filters that act independently of the theme templates
 */
if ( ! class_exists( 'Smilepure_Actions_Filters' ) ) {
	class Smilepure_Actions_Filters {

		protected static $instance = null;

		public function __construct() {
			add_filter( 'wp_kses_allowed_html', array( $this, 'wp_kses_allowed_html' ), 2, 99 );

			/* Move post count inside the link */
			add_filter( 'wp_list_categories', array( $this, 'move_post_count_inside_link_category' ) );

			/* Move post count inside the link */
			add_filter( 'get_archives_link', array( $this, 'move_post_count_inside_link_archive' ) );

			add_filter( 'comment_form_fields', array( $this, 'move_comment_field_to_bottom' ) );

			add_filter( 'embed_oembed_html', array( $this, 'add_wrapper_for_video' ), 10, 3 );
			add_filter( 'video_embed_html', array( $this, 'add_wrapper_for_video' ) ); // Jetpack

			add_filter( 'excerpt_length', array(
				$this,
				'custom_excerpt_length',
			), 999 ); // Change excerpt length is set to 55 words by default

			// Adds custom classes to the array of body classes
			add_filter( 'body_class', array( $this, 'body_classes' ) );

			// Adds custom attributes to body tag
			add_filter( 'Smilepure_body_attributes', array( $this, 'add_attributes_to_body' ) );

			if ( ! is_admin() ) {
				add_action( 'pre_get_posts', array( $this, 'alter_search_loop' ), 1 );
				add_filter( 'pre_get_posts', array( $this, 'search_filter' ) );
				add_filter( 'pre_get_posts', array( $this, 'empty_search_filter' ) );
			}

			// Add inline style for shortcode
			add_action( 'wp_footer', array( $this, 'shortcode_style' ), 9999 );

			add_filter( 'insightcore_bmw_nav_args', array( $this, 'add_extra_params_to_insightcore_bmw' ) );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function wp_kses_allowed_html( $allowedtags, $context ) {

			$basic_atts = array(
				'id'    => array(),
				'class' => array(),
				'style' => array(),
			);

			switch ( $context ) {
				case 'smilepure-img':
					$allowedtags = array(
						'img' => array(
							'id'     => array(),
							'class'  => array(),
							'style'  => array(),
							'src'    => array(),
							'width'  => array(),
							'height' => array(),
							'alt'    => array(),
							'srcset' => array(),
							'sizes'  => array(),
						),
					);
					break;
				case 'smilepure-a':
					$allowedtags = array(
						'a' => array(
							'id'     => array(),
							'class'  => array(),
							'style'  => array(),
							'href'   => array(),
							'target' => array(),
							'rel'    => array(),
							'title'  => array(),
						),
					);
					break;
				case 'smilepure-default' :
					$allowedtags = array(
						'a'      => array(
							'id'     => array(),
							'class'  => array(),
							'style'  => array(),
							'href'   => array(),
							'target' => array(),
							'rel'    => array(),
							'title'  => array(),
						),
						'img'    => array(
							'id'     => array(),
							'class'  => array(),
							'style'  => array(),
							'src'    => array(),
							'width'  => array(),
							'height' => array(),
							'alt'    => array(),
							'srcset' => array(),
							'sizes'  => array(),
						),
						'br'     => array(),
						'ul'     => array(
							'id'    => array(),
							'class' => array(),
							'style' => array(),
							'type'  => array(),
						),
						'ol'     => array(
							'id'    => array(),
							'class' => array(),
							'style' => array(),
							'type'  => array(),
						),
						'li'     => $basic_atts,
						'h1'     => $basic_atts,
						'h2'     => $basic_atts,
						'h3'     => $basic_atts,
						'h4'     => $basic_atts,
						'h5'     => $basic_atts,
						'h6'     => $basic_atts,
						'div'    => $basic_atts,
						'strong' => $basic_atts,
						'b'      => $basic_atts,
						'i'      => $basic_atts,
						'del'    => $basic_atts,
						'ins'    => $basic_atts,
						'span'   => array(
							'class'     => array(),
							'id'        => array(),
							'style'     => array(),
							'data-text' => array(),
						),
					);
					break;
			}

			return $allowedtags;
		}

		function add_extra_params_to_insightcore_bmw( $args ) {
			$args['walker'] = new Smilepure_Walker_Nav_Menu;

			return $args;
		}

		function move_post_count_inside_link_category( $links ) {
			// First remove span that added by woocommerce.
			$links = str_replace( '<span class="count">', '', $links );
			$links = str_replace( '</span>', '', $links );

			// Then add span again for both blog & shop
			$links = str_replace( '</a> ', ' <span class="count">', $links );
			$links = str_replace( ')', '</span></a>', $links );
			$links = str_replace( '<span class="count">(', '<span class="count">', $links );

			return $links;
		}

		function move_post_count_inside_link_archive( $links ) {
			$links = str_replace( '</a>&nbsp;(', '<span class="count">', $links );
			$links = str_replace( ')', '</span></a>', $links );

			return $links;
		}


		function change_widget_tag_cloud_args( $args ) {
			// Set the smallest & largest size in px
			$args['separator'] = ', ';

			return $args;
		}

		function move_comment_field_to_bottom( $fields ) {
			$comment_field = $fields['comment'];
			unset( $fields['comment'] );
			$fields['comment'] = $comment_field;

			return $fields;
		}

		function shortcode_style() {
			global $Smilepure_shortcode_xl_css;
			global $Smilepure_shortcode_lg_css;
			global $Smilepure_shortcode_md_css;
			global $Smilepure_shortcode_sm_css;
			global $Smilepure_shortcode_xs_css;
			$css = '';

			if ( $Smilepure_shortcode_lg_css && $Smilepure_shortcode_lg_css !== '' ) {
				$css .= $Smilepure_shortcode_lg_css;
			}

			if ( $Smilepure_shortcode_xl_css && $Smilepure_shortcode_xl_css !== '' ) {
				$css .= "@media (min-width: 1600px) { $Smilepure_shortcode_xl_css }";
			}

			if ( $Smilepure_shortcode_md_css && $Smilepure_shortcode_md_css !== '' ) {
				$css .= "@media (max-width: 1199px) { $Smilepure_shortcode_md_css }";
			}

			if ( $Smilepure_shortcode_sm_css && $Smilepure_shortcode_sm_css !== '' ) {
				$css .= "@media (max-width: 992px) { $Smilepure_shortcode_sm_css }";
			}

			if ( $Smilepure_shortcode_xs_css && $Smilepure_shortcode_xs_css !== '' ) {
				$css .= "@media (max-width: 767px) { $Smilepure_shortcode_xs_css }";
			}

			if ( $css !== '' ) : ?>
				<script>
					var mainStyle = document.getElementById( 'smilepure-style-inline-css' );
					if ( mainStyle !== null ) {
						mainStyle.textContent += '<?php echo '' . $css; ?>';
					}
				</script>
			<?php endif;
		}

		public function alter_search_loop( $query ) {
			if ( $query->is_main_query() && $query->is_search() ) {
				$number_results = Smilepure::setting( 'search_page_number_results' );
				$query->set( 'posts_per_page', $number_results );
			}
		}

		/**
		 * Apply filters to the search query.
		 * Determines if we only want to display posts/pages and changes the query accordingly
		 */
		public function search_filter( $query ) {
			if ( $query->is_main_query() && $query->is_search ) {
				$filter = Smilepure::setting( 'search_page_filter' );
				if ( $filter !== 'all' ) {
					$query->set( 'post_type', $filter );
				}
			}

			return $query;
		}

		/**
		 * Make wordpress respect the search template on an empty search
		 */
		public function empty_search_filter( $query ) {
			if ( isset( $_GET['s'] ) && empty( $_GET['s'] ) && $query->is_main_query() ) {
				$query->is_search = true;
				$query->is_home   = false;
			}

			return $query;
		}

		public function custom_excerpt_length() {
			return 999;
		}

		/**
		 * Add responsive container to embeds
		 */
		public function add_wrapper_for_video( $html, $url ) {
			$array = array(
				'youtube.com',
				'wordpress.tv',
				'vimeo.com',
				'dailymotion.com',
				'hulu.com',
			);

			if ( Smilepure_Helper::strposa( $url, $array ) ) {
				$html = '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
			}

			return $html;
		}

		public function add_attributes_to_body( $attrs ) {
			$site_width = Smilepure_Helper::get_post_meta( 'site_width', '' );
			if ( $site_width === '' ) {
				$site_width = Smilepure::setting( 'site_width' );
			}
			$attrs['data-site-width']    = $site_width;
			$attrs['data-content-width'] = 1200;

			$font = Smilepure_Helper::get_body_font();

			$attrs['data-font'] = $font;

			return $attrs;
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 *
		 * @return array
		 */
		public function body_classes( $classes ) {
			$classes[] = 'smilepure';

			// Adds a class of group-blog to blogs with more than 1 published author
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			// Adds a class of hfeed to non-singular pages
			if ( ! is_singular() ) {
				$classes[] = 'hfeed';
			}

			if ( wp_is_mobile() ) {
				$classes[] = 'mobile';
			} else {
				$classes[] = 'desktop';
				$classes[] = 'desktop-menu';
			}

			$custom_body_class = Smilepure_Helper::get_post_meta( 'body_class', '' );

			if ( $custom_body_class !== '' ) {
				$classes[] = $custom_body_class;
			}

			if ( Smilepure_Helper::active_woocommerce() ) {
				$classes[] = 'woocommerce';
			}

			$post_type = get_post_type();
			$classes[] = "post-type-$post_type";


			$css_animation = Smilepure::setting( 'shortcode_animation_enable' );

			if ( $css_animation === 'both'
			     || ( $css_animation === 'desktop' && ! Smilepure::is_handheld() )
			     || ( $css_animation === 'mobile' && Smilepure::is_handheld() )
			) {
				$classes[] = 'page-has-animation';
			}

			$one_page_enable = Smilepure_Helper::get_post_meta( 'menu_one_page', '' );
			if ( $one_page_enable === '1' ) {
				$classes[] = 'one-page';
			}

			$header_position = Smilepure_Helper::get_post_meta( 'header_position', '' );
			if ( $header_position !== '' ) {
				$classes[] = "page-header-$header_position";
			}

			if ( Smilepure::setting( 'header_sticky_enable' ) ) {
				$classes[] = 'header-sticky';
				$classes[] = 'header-sticky-' . Smilepure::setting( 'header_sticky_behaviour' );
			}

			$site_layout = Smilepure_Helper::get_post_meta( 'site_layout', '' );
			if ( $site_layout === '' ) {
				$site_layout = Smilepure::setting( 'site_layout' );
			}
			$classes[] = $site_layout;

			$title_bar_type = Smilepure_Global::instance()->get_title_bar_type();
			if ( $title_bar_type === '06' ) {
				$classes[] = 'has-title-bar-06';
			}
			if ( $title_bar_type === '07' ) {
				$classes[] = 'has-title-bar-07';
			}

			$sidebar_status = Smilepure_Global::instance()->get_sidebar_status();

			if ( $sidebar_status === 'one' ) {
				$classes[] = 'page-has-sidebar page-one-sidebar';
			} elseif ( $sidebar_status === 'both' ) {
				$classes[] = 'page-has-sidebar page-both-sidebar';
			} else {
				$classes[] = 'page-has-no-sidebar';
			}

			return $classes;
		}
	}

	new Smilepure_Actions_Filters();
}
