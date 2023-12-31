<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

$page_sidebar1 = Smilepure_Global::instance()->get_sidebar_1();
$page_sidebar2 = Smilepure_Global::instance()->get_sidebar_2();

$category_per_page = 4;
if ( $page_sidebar1 !== 'none' || $page_sidebar2 !== 'none' ) {
	$category_per_page = 3;
}
?>

<?php Smilepure_Templates::title_bar(); ?>
	<div id="page-content" class="page-content">
		<div class="container">
			<div class="row">

				<?php Smilepure_Templates::render_sidebar( 'left' ); ?>

				<div class="page-main-content">

					<?php
					/**
					 * woocommerce_archive_description hook.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
					?>

					<?php if ( woocommerce_product_loop() ) : ?>

						<div class="archive-shop-actions row row-xs-center">
							<?php
							/**
							 * woocommerce_before_shop_loop hook.
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
							?>
						</div>

						<div class="tm-grid-wrapper style-grid">
							<div class="tm-grid has-animation move-up row tm-products">
								<?php while ( have_posts() ) {
									the_post(); ?>

									<?php wc_get_template_part( 'content', 'product' ); ?>
								<?php } ?>
							</div>
						</div>

						<?php
						/**
						 * woocommerce_after_shop_loop hook.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php else : ?>

						<?php
						/**
						 * woocommerce_no_products_found hook.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
						?>

					<?php endif; ?>
				</div>

				<?php Smilepure_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>
<?php get_footer();

