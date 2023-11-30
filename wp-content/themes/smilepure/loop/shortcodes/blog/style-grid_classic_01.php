<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'post-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>

		<div class="post-item-wrap">
			<div class="post-feature-wrap">
				<?php get_template_part( 'loop/blog-classic/format' ); ?>
			</div>

			<div class="post-info">
				<?php get_template_part( 'loop/blog/title' ); ?>

				<div class="post-date">
					<?php echo get_the_date( 'M d, Y' ); ?>
				</div>
			</div>
		</div>

	</div>
<?php endwhile;
