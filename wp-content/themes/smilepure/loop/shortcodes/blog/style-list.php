<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'grid-item', 'post-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>

		<?php get_template_part( 'loop/blog/format' ); ?>

		<div class="post-info">
			<?php get_template_part( 'loop/blog/title' ); ?>

			<div class="post-meta">
				<div class="post-author-meta">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
					<span><?php echo esc_html( 'By', 'smilepure' ); ?></span>
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
						<?php the_author(); ?>
					</a>
				</div>

				<?php if ( has_category() ) : ?>
					<div class="post-categories">
						<?php the_category( ', ' ); ?>
					</div>
				<?php endif; ?>

				<div class="post-date">
					<?php echo get_the_date(); ?>
				</div>

				<div class="post-comments-number">
					<?php
					$comment_count = get_comments_number();
					printf( esc_html( _n( '%1$s Comment', '%1$s Comments', $comment_count, 'smilepure' ) ), $comment_count );
					?>
				</div>
				<?php get_template_part( 'loop/blog/sticky' ); ?>
			</div>

			<div class="post-excerpt">
				<?php Smilepure_Templates::excerpt( array(
					'limit' => 55,
					'type'  => 'word',
				) ); ?>
			</div>

			<div class="row row-xs-center">
				<div class="col-md-12">
					<div class="post-read-more">
						<a href="<?php the_permalink(); ?>">
							<span class="btn-text heading-font">
								<?php esc_html_e( 'Read More', 'smilepure' ); ?>
							</span>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
<?php endwhile;
