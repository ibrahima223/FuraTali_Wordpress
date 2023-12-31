<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see           https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>

	<div class="up-sells upsells products">
		<h2><?php esc_html_e( 'You may also like&hellip;', 'smilepure' ) ?></h2>

		<div class="tm-swiper tm-products equal-height"
		     data-lg-items="4"
		     data-md-items="3"
		     data-sm-items="2"
		     data-xs-items="1"
		     data-pagination="1"
		>
			<div class="swiper-container">
				<div class="swiper-wrapper">

					<?php foreach ( $upsells as $upsell ) : ?>

						<?php
						$post_object = get_post( $upsell->get_id() );
						setup_postdata( $GLOBALS['post'] =& $post_object );
						?>
						<div class="swiper-slide">
							<?php wc_get_template_part( 'content', 'product' ); ?>
						</div>

					<?php endforeach; ?>

				</div>
			</div>
		</div>

	</div>

<?php endif;

wp_reset_postdata();
