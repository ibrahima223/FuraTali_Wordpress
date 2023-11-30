<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initialize Global Variables
 */
if ( ! class_exists( 'Smilepure_Global' ) ) {
	class Smilepure_Global {
		protected static $instance = null;
		protected static $slider = '';
		protected static $slider_position = 'below';
		protected static $top_bar_type = '01';
		protected static $header_type = '01';
		protected static $title_bar_type = '01';
		protected static $sidebar_1 = '';
		protected static $sidebar_2 = '';
		protected static $sidebar_position = '';
		protected static $sidebar_special = '';
		protected static $sidebar_status = 'none';
		protected static $single_sidebar_width = '';
		protected static $dual_sidebar_width = '';
		protected static $footer_type = '';
		protected static $footer_post = '';


		function __construct() {
			add_action( 'wp', array( $this, 'init_global_variable' ) );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function init_global_variable() {
			global $Smilepure_page_options;
			if ( is_singular( 'post' ) ) {
				$Smilepure_page_options = unserialize( get_post_meta( get_the_ID(), 'insight_post_options', true ) );
			} elseif ( is_singular( 'page' ) ) {
				$Smilepure_page_options = unserialize( get_post_meta( get_the_ID(), 'insight_page_options', true ) );
			} elseif ( is_singular( 'service' ) ) {
				$Smilepure_page_options = unserialize( get_post_meta( get_the_ID(), 'insight_service_options', true ) );
			} elseif ( is_singular( 'ic_doctor' ) ) {
				$Smilepure_page_options = unserialize( get_post_meta( get_the_ID(), 'insight_doctor_options', true ) );
			}

			$this->set_slider();
			$this->set_top_bar_type();
			$this->set_header_type();
			$this->set_title_bar_type();
			$this->set_sidebars();
			$this->set_footer_type();
			$this->set_footer_post();
		}

		function set_slider() {
			$alias    = Smilepure_Helper::get_post_meta( 'revolution_slider', '' );
			$position = Smilepure_Helper::get_post_meta( 'slider_position', '' );

			if ( $alias === '' ) {
				if ( is_search() && ! is_post_type_archive( 'product' ) ) {
					$alias    = Smilepure::setting( 'search_page_rev_slider' );
					$position = Smilepure::setting( 'search_page_slider_position' );
				} elseif ( is_post_type_archive( 'product' ) || ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() ) ) {
					$alias    = Smilepure::setting( 'product_archive_page_rev_slider' );
					$position = Smilepure::setting( 'product_archive_page_slider_position' );
				} elseif ( is_archive() ) {
					$alias    = Smilepure::setting( 'blog_archive_page_rev_slider' );
					$position = Smilepure::setting( 'blog_archive_page_slider_position' );
				} elseif ( is_home() ) {
					$alias    = Smilepure::setting( 'home_page_rev_slider' );
					$position = Smilepure::setting( 'home_page_slider_position' );
				}
			}

			self::$slider          = $alias;
			self::$slider_position = $position;
		}

		function get_slider_alias() {
			return self::$slider;
		}

		function get_slider_position() {
			return self::$slider_position;
		}

		function set_top_bar_type() {
			$type = Smilepure_Helper::get_post_meta( 'top_bar_type', '' );

			if ( $type === '' ) {
				$type = Smilepure::setting( 'global_top_bar' );
			}

			self::$top_bar_type = $type;
		}

		function get_top_bar_type() {
			return self::$top_bar_type;
		}

		function set_header_type() {
			$header_type = Smilepure_Helper::get_post_meta( 'header_type', '' );
			if ( $header_type === '' ) {
				if ( is_singular( 'post' ) ) {
					$header_type = Smilepure::setting( 'single_post_header_type' );
				} elseif ( is_singular( 'service' ) ) {
					$header_type = Smilepure::setting( 'single_service_header_type' );
				} elseif ( is_singular( 'product' ) ) {
					$header_type = Smilepure::setting( 'single_product_header_type' );
				} elseif ( is_singular( 'page' ) ) {
					$header_type = Smilepure::setting( 'single_page_header_type' );
				} else {
					$header_type = Smilepure::setting( 'global_header' );
				}
			}

			if ( $header_type === '' ) {
				$header_type = Smilepure::setting( 'global_header' );
			}

			self::$header_type = $header_type;
		}

		function get_header_type() {
			return self::$header_type;
		}

		function set_title_bar_type() {
			$title_bar_layout = Smilepure_Helper::get_post_meta( 'page_title_bar_layout', 'default' );

			if ( $title_bar_layout === 'default' ) {
				if ( is_singular( 'post' ) ) {
					$title_bar_layout = Smilepure::setting( 'single_post_title_bar_layout' );
				} elseif ( is_singular( 'page' ) ) {
					$title_bar_layout = Smilepure::setting( 'single_page_title_bar_layout' );
				} elseif ( is_singular( 'product' ) ) {
					$title_bar_layout = Smilepure::setting( 'single_product_title_bar_layout' );
				} elseif ( is_singular( 'service' ) ) {
					$title_bar_layout = Smilepure::setting( 'single_service_title_bar_layout' );
				} else {
					$title_bar_layout = Smilepure::setting( 'title_bar_layout' );
				}

				if ( $title_bar_layout === 'default' ) {
					$title_bar_layout = Smilepure::setting( 'title_bar_layout' );
				}
			}

			self::$title_bar_type = $title_bar_layout;
		}

		function get_title_bar_type() {
			return self::$title_bar_type;
		}

		function set_sidebars() {
			$sidebar_special      = 'none';
			$single_sidebar_width = '';

			if ( is_search() && ! is_post_type_archive( 'product' ) ) {
				$page_sidebar1    = Smilepure::setting( 'search_page_sidebar_1' );
				$page_sidebar2    = Smilepure::setting( 'search_page_sidebar_2' );
				$sidebar_position = Smilepure::setting( 'search_page_sidebar_position' );
				$sidebar_special  = Smilepure::setting( 'search_page_sidebar_special' );
			} elseif ( is_post_type_archive( 'product' ) || ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() ) ) {
				$page_sidebar1    = Smilepure::setting( 'product_archive_page_sidebar_1' );
				$page_sidebar2    = Smilepure::setting( 'product_archive_page_sidebar_2' );
				$sidebar_position = Smilepure::setting( 'product_archive_page_sidebar_position' );
				$sidebar_special  = Smilepure::setting( 'product_archive_page_sidebar_special' );
			} elseif ( is_post_type_archive( 'ic_doctor' ) || is_tax( get_object_taxonomies( 'ic_doctor' ) ) ) {
				$page_sidebar1    = Smilepure::setting( 'doctor_archive_page_sidebar_1' );
				$page_sidebar2    = Smilepure::setting( 'doctor_archive_page_sidebar_2' );
				$sidebar_position = Smilepure::setting( 'doctor_archive_page_sidebar_position' );
				$sidebar_special  = Smilepure::setting( 'doctor_archive_page_sidebar_special' );
			} elseif ( is_post_type_archive( 'service' ) || is_tax( get_object_taxonomies( 'service' ) ) ) {
				$page_sidebar1    = Smilepure::setting( 'service_archive_page_sidebar_1' );
				$page_sidebar2    = Smilepure::setting( 'service_archive_page_sidebar_2' );
				$sidebar_position = Smilepure::setting( 'service_archive_page_sidebar_position' );
				$sidebar_special  = Smilepure::setting( 'service_archive_page_sidebar_special' );
			} elseif ( is_archive() ) {
				$page_sidebar1    = Smilepure::setting( 'blog_archive_page_sidebar_1' );
				$page_sidebar2    = Smilepure::setting( 'blog_archive_page_sidebar_2' );
				$sidebar_position = Smilepure::setting( 'blog_archive_page_sidebar_position' );
				$sidebar_special  = Smilepure::setting( 'blog_archive_page_sidebar_special' );
			} elseif ( is_home() ) {
				$page_sidebar1    = Smilepure::setting( 'home_page_sidebar_1' );
				$page_sidebar2    = Smilepure::setting( 'home_page_sidebar_2' );
				$sidebar_position = Smilepure::setting( 'home_page_sidebar_position' );
				$sidebar_special  = Smilepure::setting( 'home_page_sidebar_special' );
			} elseif ( is_singular( 'post' ) ) {
				$page_sidebar1    = Smilepure_Helper::get_post_meta( 'page_sidebar_1', 'default' );
				$page_sidebar2    = Smilepure_Helper::get_post_meta( 'page_sidebar_2', 'default' );
				$sidebar_position = Smilepure_Helper::get_post_meta( 'page_sidebar_position', 'default' );
				$sidebar_special  = Smilepure::setting( 'post_page_sidebar_special' );

				if ( $page_sidebar1 === 'default' ) {
					$page_sidebar1 = Smilepure::setting( 'post_page_sidebar_1' );
				}

				if ( $page_sidebar2 === 'default' ) {
					$page_sidebar2 = Smilepure::setting( 'post_page_sidebar_2' );
				}

				if ( $sidebar_position === 'default' ) {
					$sidebar_position = Smilepure::setting( 'post_page_sidebar_position' );
				}
			} elseif ( is_singular( 'ic_doctor' ) ) {
				$page_sidebar1    = Smilepure_Helper::get_post_meta( 'page_sidebar_1', 'default' );
				$page_sidebar2    = Smilepure_Helper::get_post_meta( 'page_sidebar_2', 'default' );
				$sidebar_position = Smilepure_Helper::get_post_meta( 'page_sidebar_position', 'default' );
				$sidebar_special  = Smilepure::setting( 'doctor_page_sidebar_special' );

				if ( $page_sidebar1 === 'default' ) {
					$page_sidebar1 = Smilepure::setting( 'doctor_page_sidebar_1' );
				}

				if ( $page_sidebar2 === 'default' ) {
					$page_sidebar2 = Smilepure::setting( 'doctor_page_sidebar_2' );
				}

				if ( $sidebar_position === 'default' ) {
					$sidebar_position = Smilepure::setting( 'doctor_page_sidebar_position' );
				}
			} elseif ( is_singular( 'service' ) ) {
				$page_sidebar1        = Smilepure_Helper::get_post_meta( 'page_sidebar_1', 'default' );
				$page_sidebar2        = Smilepure_Helper::get_post_meta( 'page_sidebar_2', 'default' );
				$sidebar_position     = Smilepure_Helper::get_post_meta( 'page_sidebar_position', 'default' );
				$sidebar_special      = Smilepure::setting( 'service_page_sidebar_special' );
				$single_sidebar_width = Smilepure::setting( 'service_page_single_sidebar_width' );

				if ( $page_sidebar1 === 'default' ) {
					$page_sidebar1 = Smilepure::setting( 'service_page_sidebar_1' );
				}

				if ( $page_sidebar2 === 'default' ) {
					$page_sidebar2 = Smilepure::setting( 'service_page_sidebar_2' );
				}

				if ( $sidebar_position === 'default' ) {
					$sidebar_position = Smilepure::setting( 'service_page_sidebar_position' );
				}
			} elseif ( is_singular( 'product' ) ) {
				$page_sidebar1    = Smilepure_Helper::get_post_meta( 'page_sidebar_1', 'default' );
				$page_sidebar2    = Smilepure_Helper::get_post_meta( 'page_sidebar_2', 'default' );
				$sidebar_position = Smilepure_Helper::get_post_meta( 'page_sidebar_position', 'default' );
				$sidebar_special  = Smilepure::setting( 'product_page_sidebar_special' );

				if ( $page_sidebar1 === 'default' ) {
					$page_sidebar1 = Smilepure::setting( 'product_page_sidebar_1' );
				}

				if ( $page_sidebar2 === 'default' ) {
					$page_sidebar2 = Smilepure::setting( 'product_page_sidebar_2' );
				}

				if ( $sidebar_position === 'default' ) {
					$sidebar_position = Smilepure::setting( 'product_page_sidebar_position' );
				}

			} else {
				$page_sidebar1    = Smilepure_Helper::get_post_meta( 'page_sidebar_1', 'default' );
				$page_sidebar2    = Smilepure_Helper::get_post_meta( 'page_sidebar_2', 'default' );
				$sidebar_position = Smilepure_Helper::get_post_meta( 'page_sidebar_position', 'default' );
				$sidebar_special  = Smilepure::setting( 'page_sidebar_special' );

				if ( $page_sidebar1 === 'default' ) {
					$page_sidebar1 = Smilepure::setting( 'page_sidebar_1' );
				}

				if ( $page_sidebar2 === 'default' ) {
					$page_sidebar2 = Smilepure::setting( 'page_sidebar_2' );
				}

				if ( $sidebar_position === 'default' ) {
					$sidebar_position = Smilepure::setting( 'page_sidebar_position' );
				}
			}

			if ( ! is_active_sidebar( $page_sidebar1 ) ) {
				$page_sidebar1 = 'none';
			}

			if ( ! is_active_sidebar( $page_sidebar2 ) ) {
				$page_sidebar2 = 'none';
			}

			if ( $single_sidebar_width === '' ) {
				$single_sidebar_width = Smilepure::setting( 'single_sidebar_width' );
			}

			self::$sidebar_1            = $page_sidebar1;
			self::$sidebar_2            = $page_sidebar2;
			self::$sidebar_position     = $sidebar_position;
			self::$sidebar_special      = $sidebar_special;
			self::$single_sidebar_width = $single_sidebar_width;

			if ( $page_sidebar1 !== 'none' || $page_sidebar2 !== 'none' ) {
				self::$sidebar_status = 'one';
			}

			if ( $page_sidebar1 !== 'none' && $page_sidebar2 !== 'none' ) {
				self::$sidebar_status = 'both';
			}
		}

		function get_sidebar_1() {
			return self::$sidebar_1;
		}

		function get_sidebar_2() {
			return self::$sidebar_2;
		}

		function get_sidebar_position() {
			return self::$sidebar_position;
		}

		function get_sidebar_special() {
			return self::$sidebar_special;
		}

		function get_sidebar_status() {
			return self::$sidebar_status;
		}

		function get_single_sidebar_width() {
			return self::$single_sidebar_width;
		}

		function set_footer_type() {
			$footer = Smilepure_Helper::get_post_meta( 'footer_page', '' );

			if ( $footer === 'default' || $footer === '' ) {
				if ( is_singular( 'service' ) ) {
					$footer = Smilepure::setting( 'single_service_footer_page' );
				} else {
					$footer = Smilepure::setting( 'footer_page' );
				}
			}

			self::$footer_type = $footer;
		}

		function get_footer_type() {
			return self::$footer_type;
		}

		function set_footer_post() {
			$footer_page = self::get_footer_type();

			if ( $footer_page === 'none' ) {
				return;
			}

			$footer = get_page_by_path( $footer_page, OBJECT, 'ic_footer' );
			if ( empty( $footer->ID ) ) {
				return;
			}

			$_smilepure_args = array(
				'post_type'   => 'ic_footer',
				'post_status' => 'publish',
				'p'           => $footer->ID,
			);

			$_smilepure_query = new WP_Query( $_smilepure_args );

			if ( is_a( $_smilepure_query, 'WP_Query' ) ) {
				self::$footer_post = $_smilepure_query;
			}
		}

		function get_footer_post() {
			return self::$footer_post;
		}
	}

	new Smilepure_Global();
}
