<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'grid-item', 'post-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<div class="post-info">
				<?php get_template_part( 'loop/blog/title' ); ?>
				<div class="post-date">
					<?php echo get_the_date(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile;
