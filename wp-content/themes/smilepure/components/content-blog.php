<?php
/**
 * Template part for displaying blog content in home.php, archive.php.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SmilePure
 * @since   1.0
 */
$style      = Smilepure::setting( 'blog_archive_style' );
$columns    = Smilepure::setting( 'blog_archive_columns' );
$gutter     = Smilepure::setting( 'blog_archive_gutter' );
$row_gutter = Smilepure::setting( 'blog_archive_row_gutter' );
$animation  = Smilepure::setting( 'blog_archive_animation' );

if ( have_posts() ) : ?>

	<?php if ( class_exists( 'Vc_Manager' ) ) { ?>
		<?php
		$args = array();

		$args[] = 'style="' . $style . '"';
		$args[] = 'columns="' . $columns . '"';
		$args[] = 'gutter="' . $gutter . '"';
		$args[] = 'row_gutter="' . $row_gutter . '"';
		$args[] = 'animation="' . $animation . '"';
		$args[] = 'pagination="pagination"';
		$args[] = 'pagination_align="center"';
		$args[] = 'main_query="1"';

		$shortcode_string = '[tm_blog ' . implode( ' ', $args ) . ']';

		echo do_shortcode( $shortcode_string );
		?>
	<?php } else { ?>
		<div class="tm-grid-wrapper tm-blog style-list">
			<div class="tm-grid has-animation move-up"
			     data-grid-has-gallery="true"
			>
				<?php
				global $wp_query;
				$Smilepure_query = $wp_query;
				set_query_var( 'Smilepure_query', $Smilepure_query );

				get_template_part( 'loop/shortcodes/blog/style', 'list' );
				?>
			</div>
		</div>
		<div class="tm-grid-pagination">
			<?php Smilepure_Templates::paging_nav(); ?>
		</div>
	<?php } ?>
<?php else : get_template_part( 'components/content', 'none' ); ?>
<?php endif; ?>
