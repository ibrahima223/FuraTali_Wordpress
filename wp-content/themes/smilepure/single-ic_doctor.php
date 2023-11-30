<?php
/**
 * The template for displaying all single doctor posts.
 *
 * @package SmilePure
 * @since   1.0
 */
get_header();
?>
<?php Smilepure_Templates::title_bar(); ?>

	<div id="page-content" class="page-content">
		<div class="container">
			<div class="row">

				<?php Smilepure_Templates::render_sidebar( 'left' ); ?>

				<div class="page-main-content">
					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_content(); ?>
						</article>

					<?php endwhile; ?>
				</div>

				<?php Smilepure_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>

<?php
get_footer();
