<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
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

				<div id="page-main-content" class="page-main-content">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'components/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						if ( ( comments_open() || get_comments_number() ) ) : ?>
							<div class="page-comment-form">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<?php Smilepure_Templates::comment_form(); ?>
										</div>
									</div>
								</div>
							</div>
						<?php endif;

					endwhile; // End of the loop.
					?>
				</div>

				<?php Smilepure_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>
<?php get_footer();
