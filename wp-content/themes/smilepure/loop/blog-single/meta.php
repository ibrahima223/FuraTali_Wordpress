<div class="post-meta">
	<?php if ( Smilepure::setting( 'single_post_author_enable' ) === '1' ) : ?>
		<div class="post-author-meta">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
			<span><?php echo esc_html( 'By', 'smilepure' ); ?></span>
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
				<?php the_author(); ?>
			</a>
		</div>
	<?php endif; ?>

	<?php if ( Smilepure::setting( 'single_post_categories_enable' ) === '1' && has_category() ) : ?>
		<div class="post-categories">
			<?php the_category( ', ' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( Smilepure::setting( 'single_post_date_enable' ) === '1' ) : ?>
		<div class="post-date">
			<?php echo get_the_date(); ?>
		</div>
	<?php endif; ?>

	<?php if ( Smilepure::setting( 'single_post_comment_count_enable' ) ) : ?>
		<div class="post-comments-number">
			<?php
			$comment_count = get_comments_number();
			printf( esc_html( _n( '%1$s Comment', '%1$s Comments', $comment_count, 'smilepure' ) ), $comment_count );
			?>
		</div>
	<?php endif; ?>
</div>
