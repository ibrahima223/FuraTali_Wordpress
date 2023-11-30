<?php
/**
 * Template part for displaying single post pages.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SmilePure
 * @since   1.0
 */

$format = Smilepure_Post::get_the_post_format();
$_post_title = Smilepure::setting( 'single_post_title_enable' );
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<h2 class="screen-reader-text"><?php echo esc_html( get_the_title() ); ?></h2>

		<?php if ( Smilepure::setting( 'single_post_feature_enable' ) === '1' ) : ?>
			<?php get_template_part( 'loop/blog-single/format', $format ); ?>
		<?php endif; ?>

		<div class="entry-header">
			<?php if ( $_post_title === '1' ) : ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php endif; ?>

			<?php get_template_part( 'loop/blog-single/meta' ); ?>
		</div>

		<div class="entry-content">
			<?php
			the_content( sprintf( wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'smilepure' ), array( 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );

			Smilepure_Templates::page_links();
			?>
		</div>

		<?php if ( ( Smilepure::setting( 'single_post_tags_enable' ) === '1' && has_tag() ) || ( Smilepure::setting( 'single_post_share_enable' ) === '1' && ( class_exists( 'InsightCore_Share' ) ) ) ) : ?>
			<?php
			if ( ( Smilepure::setting( 'single_post_tags_enable' ) === '1' && has_tag() ) && Smilepure::setting( 'single_post_share_enable' ) === '1' && ( class_exists( 'InsightCore_Share' ) ) ) {
				$entry_footer_col = 'col-md-6';
			} else {
				$entry_footer_col = 'col-md-12';
			}
			?>
			<div class="entry-footer">
				<div class="row row-xs-center">
					<?php if ( Smilepure::setting( 'single_post_tags_enable' ) === '1' && has_tag() ) : ?>
						<div class="<?php echo esc_attr( $entry_footer_col ); ?>">
							<div class="post-tags">
								<span class="heading-color heading-font"><?php esc_html_e( 'Tags:', 'smilepure' ); ?></span>
								<?php the_tags( '', ', ', '' ); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ( Smilepure::setting( 'single_post_share_enable' ) === '1' && ( class_exists( 'InsightCore_Share' ) ) ) : ?>
						<div class="<?php echo esc_attr( $entry_footer_col ); ?>">
							<?php Smilepure_Templates::post_sharing(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

	</article>
<?php
$author_desc = get_the_author_meta( 'description' );
if ( Smilepure::setting( 'single_post_author_box_enable' ) === '1' && ! empty( $author_desc ) ) {
	Smilepure_Templates::post_author();
}

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
