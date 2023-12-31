<?php
/**
 * The template for displaying archive service pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SmilePure
 * @since   1.0
 */
get_header();

$style      = Smilepure::setting( 'archive_service_style' );
$columns    = Smilepure::setting( 'archive_service_columns' );
$gutter     = Smilepure::setting( 'archive_service_gutter' );
$row_gutter = Smilepure::setting( 'archive_service_row_gutter' );
$image_size = Smilepure::setting( 'archive_service_thumbnail_size' );
$animation  = Smilepure::setting( 'archive_service_animation' );
?>
<?php Smilepure_Templates::title_bar(); ?>
	<div id="page-content" class="page-content">
		<div class="container">
			<div class="row">

				<?php Smilepure_Templates::render_sidebar( 'left' ); ?>

				<div class="page-main-content">
					<?php if ( have_posts() ) : ?>
						<?php
						$args = array();

						$args[] = 'style="' . $style . '"';
						$args[] = 'columns="' . $columns . '"';
						$args[] = 'gutter="' . $gutter . '"';
						$args[] = 'row_gutter="' . $row_gutter . '"';
						$args[] = 'image_size="' . $image_size . '"';
						$args[] = 'animation="' . $animation . '"';
						$args[] = 'pagination="pagination"';
						$args[] = 'pagination_align="center"';
						$args[] = 'main_query="1"';

						$shortcode_string = '[tm_service ' . implode( ' ', $args ) . ']';

						echo do_shortcode( $shortcode_string );
						?>
					<?php else :
						get_template_part( 'components/content', 'none' );
					endif; ?>
				</div>

				<?php Smilepure_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>
<?php get_footer();
