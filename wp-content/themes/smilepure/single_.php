<?php
/**
 * The template for displaying all single posts.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'components/content', 'single' );

						if ( Smilepure::setting( 'single_post_pagination_enable' ) === '1' ) {
							Smilepure_Templates::post_nav_links();
						}

						if ( Smilepure::setting( 'single_post_related_enable' ) ) {
							get_template_part( 'components/content', 'single-related-posts' );
						}

						// If comments are open or we have at least one comment, load up the comment template.
						if ( Smilepure::setting( 'single_post_comment_enable' ) === '1' && ( comments_open() || get_comments_number() ) ) :
							comments_template();
						endif;

						if ( Smilepure::setting( 'single_post_comment_enable' ) === '1' ) {
							get_template_part( 'components/comment-form' );
						}

					endwhile; // End of the loop.
					?>
				</div>

				<?php Smilepure_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>

<?php
get_footer();
