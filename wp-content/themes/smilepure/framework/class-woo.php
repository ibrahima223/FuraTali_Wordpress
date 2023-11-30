<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom functions, filters, actions for WooCommerce.
 */
if ( ! class_exists( 'Smilepure_Woo' ) ) {
	class Smilepure_Woo {

		protected static $instance = null;
		const MINIMUM_PLUGIN_VERSION = '4.0.2';

		public function __construct() {
			// Disable Woocommerce cart fragments on home page.
			add_action( 'wp_enqueue_scripts', array( $this, 'dequeue_woocommerce_cart_fragments' ), 11 );

			add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'header_add_to_cart_fragment' ) );

			add_filter( 'woocommerce_checkout_fields', array( $this, 'override_checkout_fields' ) );

			add_action( 'wp_head', array( $this, 'init' ) );

			add_action( 'after_switch_theme', array( $this, 'change_woocommerce_image_dimensions' ), 1 );

			add_filter( 'woocommerce_pagination_args', array( $this, 'override_pagination_args' ) );

			// Add link to the product title
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			add_action( 'woocommerce_shop_loop_item_title', array(
				$this,
				'template_loop_product_title',
			), 10 );

			/* End hook for shop archive */

			/*
			 * Begin hooks for single product
			 */

			// Remove tab heading in on single product pages.
			add_filter( 'woocommerce_product_description_heading', array(
				$this,
				'remove_product_description_heading',
			) );
			add_filter( 'woocommerce_product_additional_information_heading', array(
				$this,
				'remove_product_additional_information_heading',
			) );

			add_filter( 'woocommerce_review_gravatar_size', array( $this, 'woocommerce_review_gravatar_size' ) );


			// Hide default smart wishlist button
			add_filter( 'woosw_button_position_archive', '__return_false' );
			add_filter( 'woosw_button_position_single', '__return_false' );
			add_filter( 'woosw_color_default', function() {
				return Smilepure::PRIMARY_COLOR;
			}, 10 );

			// Check old version installed.
			if ( defined( 'WOOSCP_VERSION' ) || ( defined( 'WOOSC_VERSION' ) && version_compare( WOOSC_VERSION, self::MINIMUM_PLUGIN_VERSION, '<' ) ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_compare_plugin_version' ] );
			}

			// Hide default smart compare button
			add_filter( 'woosc_button_position_archive', '__return_false' );
			add_filter( 'woosc_button_position_single', '__return_false' );
			add_filter( 'woosc_bar_btn_color_default', function() {
				return Smilepure::PRIMARY_COLOR;
			}, 10 );

			// Hide default smart quick view button
			add_filter( 'woosq_button_position', '__return_false' );

			// Fix Cart fragments issue with WC 7.8.0
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_wc_cart_fragments' ), 99 );
		}

		public function enqueue_wc_cart_fragments() {
			wp_enqueue_script( 'wc-cart-fragments' );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Custom product title instead of default product title
		 *
		 * @see woocommerce_template_loop_product_title()
		 */
		public function template_loop_product_title() {
			?>
			<h2 class="woocommerce-loop-product__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
			<?php
		}

		function change_woocommerce_image_dimensions() {
			global $pagenow;

			if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
				return;
			}

			$catalog = array(
				'width'  => '270',
				'height' => '350',
				'crop'   => 0,
			);

			$single = array(
				'width'  => '570',
				'height' => '9999',
				'crop'   => 0,
			);

			$thumbnail = array(
				'width'  => '150',
				'height' => '150',
				'crop'   => 1,
			);

			update_option( 'shop_catalog_image_size', $catalog );
			update_option( 'shop_single_image_size', $single );
			update_option( 'shop_thumbnail_image_size', $thumbnail );
		}

		function override_pagination_args( $args ) {
			$args['prev_text'] = sprintf( '<i class="far fa-angle-left"></i>' );
			$args['next_text'] = sprintf( '<i class="far fa-angle-right"></i>' );

			return $args;
		}

		public function remove_product_description_heading() {
			return '';
		}

		public function remove_product_additional_information_heading() {
			return '';
		}

		public function woocommerce_review_gravatar_size() {
			return 70;
		}

		public function init() {
			if ( Smilepure::setting( 'single_product_up_sells_enable' ) === '0' ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
			}

			if ( Smilepure::setting( 'single_product_related_enable' ) === '0' ) {
				add_filter( 'woocommerce_related_products_args', array( $this, 'wc_remove_related_products' ), 10 );
			}

			// Remove Cross Sells from default position at Cart. Then add them back UNDER the Cart Table.
			remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			if ( Smilepure::setting( 'shopping_cart_cross_sells_enable' ) === '1' ) {
				add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );
			}
		}

		/**
		 * wc_remove_related_products
		 *
		 * Clear the query arguments for related products so none show.
		 */
		function wc_remove_related_products( $args ) {
			return array();
		}

		public function override_checkout_fields( $fields ) {
			$fields['billing']['billing_first_name']['placeholder'] = esc_html__( 'First Name *', 'smilepure' );
			$fields['billing']['billing_last_name']['placeholder']  = esc_html__( 'Last Name *', 'smilepure' );
			$fields['billing']['billing_company']['placeholder']    = esc_html__( 'Company Name', 'smilepure' );
			$fields['billing']['billing_email']['placeholder']      = esc_html__( 'Email Address *', 'smilepure' );
			$fields['billing']['billing_phone']['placeholder']      = esc_html__( 'Phone *', 'smilepure' );
			$fields['billing']['billing_address_1']['placeholder']  = esc_html__( 'Address *', 'smilepure' );
			$fields['billing']['billing_address_2']['placeholder']  = esc_html__( 'Address', 'smilepure' );
			$fields['billing']['billing_city']['placeholder']       = esc_html__( 'Town / City *', 'smilepure' );
			$fields['billing']['billing_postcode']['placeholder']   = esc_html__( 'Zip *', 'smilepure' );

			$fields['shipping']['shipping_first_name']['placeholder'] = esc_html__( 'First Name *', 'smilepure' );
			$fields['shipping']['shipping_last_name']['placeholder']  = esc_html__( 'Last Name *', 'smilepure' );
			$fields['shipping']['shipping_company']['placeholder']    = esc_html__( 'Company Name', 'smilepure' );
			$fields['shipping']['shipping_city']['placeholder']       = esc_html__( 'Town / City *', 'smilepure' );
			$fields['shipping']['shipping_postcode']['placeholder']   = esc_html__( 'Zip *', 'smilepure' );

			return $fields;
		}

		public function dequeue_woocommerce_cart_fragments() {
			if ( is_front_page() && Smilepure_Helper::active_woocommerce() && add_theme_support( 'woo_speed' ) ) {
				wp_dequeue_script( 'wc-cart-fragments' );
			}
		}

		/**
		 * Ensure cart contents update when products are added to the cart via AJAX
		 * ========================================================================
		 *
		 * @param $fragments
		 *
		 * @return mixed
		 */
		function header_add_to_cart_fragment( $fragments ) {
			ob_start();
			$cart_html = self::get_minicart();
			echo '' . $cart_html;
			$fragments['.mini-cart__button'] = ob_get_clean();

			return $fragments;
		}

		/**
		 * Get mini cart HTML
		 * ==================
		 *
		 * @return string
		 */
		static function get_minicart() {
			$cart_html = '';
			$qty       = WC()->cart->get_cart_contents_count();
			$cart_html .= '<div class="mini-cart__button" title="' . esc_attr__( 'View your shopping cart', 'smilepure' ) . '">';
			$cart_html .= '<span class="mini-cart-icon" data-count="' . $qty . '"></span>';
			$cart_html .= '</div>';

			return $cart_html;
		}

		static function header_mini_cart() {
			$header_type = Smilepure_Global::instance()->get_header_type();

			$enabled = Smilepure::setting( "header_style_{$header_type}_cart_enable" );

			if ( Smilepure_Helper::active_woocommerce() && in_array( $enabled, array( '1' ) ) ) {
				global $woocommerce;
				$cart_url = '/cart';
				if ( isset( $woocommerce ) ) {
					$cart_url = wc_get_cart_url();
				}
				$classes = 'mini-cart';
				?>
				<div id="mini-cart" class="<?php echo esc_attr( $classes ); ?>"
				     data-url="<?php echo esc_url( $cart_url ); ?>">
					<?php echo self::get_minicart(); ?>
					<div class="widget_shopping_cart_content"></div>
				</div>
			<?php }
		}

		static function get_percentage_price() {
			global $product;

			if ( $product->is_type( 'simple' ) || $product->is_type( 'external' ) ) {
				$_regular_price = $product->get_regular_price();
				$_sale_price    = $product->get_sale_price();

				$percentage = round( ( ( $_regular_price - $_sale_price ) / $_regular_price ) * 100 );

				return "-{$percentage}%";
			} else {
				return esc_html__( 'Sale', 'smilepure' );
			}
		}

		static function get_quick_view_button_template( $args = array() ) {
			if ( ( Smilepure::setting( 'shop_archive_quick_view' ) !== '1' ) || ! class_exists( 'WPCleverWoosq' ) ) {
				return;
			}

			global $product;
			$product_id = $product->get_id();

			$defaults = array(
				'show_tooltip'     => true,
				'tooltip_position' => 'left',
			);
			$args     = wp_parse_args( $args, $defaults );

			$_wrapper_classes = 'product-action quick-view-btn';

			if ( $args['show_tooltip'] === true ) {
				$_wrapper_classes .= '';
				$_wrapper_classes .= " hint--{$args['tooltip_position']}";
			}
			?>
			<div class="<?php echo esc_attr( $_wrapper_classes ); ?>"
			     aria-label="<?php echo esc_attr__( 'Quick view', 'smilepure' ) ?>">
				<?php echo do_shortcode( '[woosq id="' . $product_id . '" type="link"]' ); ?>
			</div>
			<?php
		}

		static function get_wishlist_button_template( $args = array() ) {
			if ( ( Smilepure::setting( 'shop_archive_wishlist' ) !== '1' ) || ! class_exists( 'WPCleverWoosw' ) ) {
				return;
			}

			global $product;
			$product_id = $product->get_id();

			$defaults = array(
				'show_tooltip'     => true,
				'tooltip_position' => 'left',
			);
			$args     = wp_parse_args( $args, $defaults );

			$_wrapper_classes = 'product-action wishlist-btn';

			if ( $args['show_tooltip'] === true ) {
				$_wrapper_classes .= '';
				$_wrapper_classes .= " hint--{$args['tooltip_position']}";
			}
			?>
			<div class="<?php echo esc_attr( $_wrapper_classes ); ?>"
			     aria-label="<?php echo esc_attr__( 'Add to wishlist', 'smilepure' ) ?>">
				<?php echo do_shortcode( '[woosw id="' . $product_id . '" type="link"]' ); ?>
			</div>
			<?php
		}

		static function get_compare_button_template( $args = array() ) {
			if ( Smilepure::setting( 'shop_archive_compare' ) !== '1' || ! class_exists( 'WPCleverWoosc' ) ) {
				return;
			}

			global $product;
			$product_id = $product->get_id();

			$defaults = array(
				'show_tooltip'     => true,
				'tooltip_position' => 'left',
			);
			$args     = wp_parse_args( $args, $defaults );

			$_wrapper_classes = 'product-action compare-btn';

			if ( $args['show_tooltip'] === true ) {
				$_wrapper_classes .= '';
				$_wrapper_classes .= " hint--{$args['tooltip_position']}";
			}
			?>
			<div class="<?php echo esc_attr( $_wrapper_classes ); ?>"
			     aria-label="<?php echo esc_attr__( 'Compare', 'smilepure' ) ?>">
				<?php echo do_shortcode( '[woosc id="' . $product_id . '" type="link"]' ); ?>
			</div>
			<?php
		}

		public function admin_notice_minimum_compare_plugin_version() {
			smilepure_notice_required_plugin_version( 'WPC Smart Compare for WooCommerce', self::MINIMUM_PLUGIN_VERSION );
		}
	}

	new Smilepure_Woo();
}
