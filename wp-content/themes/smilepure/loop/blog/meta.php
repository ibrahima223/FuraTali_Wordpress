<div class="post-meta">
	<div class="post-date"><?php echo get_the_date(); ?></div>

	<div class="post-author-meta">
		<?php echo esc_html__( 'By', 'smilepure' ) . ' '; ?>
		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
	</div>

	<div class="post-comments-number">
		<?php
		$comment_count = get_comments_number();
		printf( esc_html( _n( '%1$s Comment', '%1$s Comments', $comment_count, 'smilepure' ) ), $comment_count );
		?>
	</div>

	<?php if ( class_exists( 'InsightCore_View' ) ) : ?>
		<div class="post-view">
			<?php
			$views = InsightCore_View::get_views();
			printf( esc_html( _n( '%1$s View', '%1$s Views', $views, 'smilepure' ) ), $views );
			?>
		</div>
	<?php endif; ?>

	<?php Smilepure_Templates::post_likes(); ?>

</div>
