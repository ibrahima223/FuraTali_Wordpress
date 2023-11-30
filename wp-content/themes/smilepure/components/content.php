<?php
/**
 * Template part for displaying posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SmilePure
 * @since   1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="screen-reader-text"><?php echo esc_html( get_the_title() ); ?></h2>
	<header class="entry-header">
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="' . esc_attr( 'bookmark', 'smilepure' ) . '">', '</a></h2>' );
		}
		?>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="entry-content">
		<?php
		the_content( sprintf( wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'smilepure' ), array( 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );

		Smilepure_Templates::page_links();
		?>
	</div>
	<?php Smilepure_Templates::post_author(); ?>
</article>
