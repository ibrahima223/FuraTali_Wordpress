<?php
/**
 * Template part for displaying blog content in home.php, archive.php.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SmilePure
 * @since   1.0
 */
$style = 'list';

if ( have_posts() ) : ?>

	<div class="tm-grid-wrapper tm-blog style-list">
		<div class="tm-grid has-animation move-up"
		     data-grid-has-gallery="true"
		>
			<?php
			global $wp_query;
			$Smilepure_query = $wp_query;
			set_query_var( 'Smilepure_query', $Smilepure_query );

			get_template_part( 'loop/shortcodes/doctor/style', 'grid-01' );
			?>
		</div>
	</div>
	<div class="tm-grid-pagination">
		<?php Smilepure_Templates::paging_nav(); ?>
	</div>
<?php else : get_template_part( 'components/content', 'none' ); ?>
<?php endif; ?>
