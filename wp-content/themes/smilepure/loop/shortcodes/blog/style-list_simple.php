<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'grid-item', 'post-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php
						$Smilepure_thumbnail_w = 80;
						$Smilepure_thumbnail_h = 80;

						$full_image_size = get_the_post_thumbnail_url( null, 'full' );
						?>
						<?php
						Smilepure_Helper::get_lazy_load_image( array(
							'url'    => $full_image_size,
							'width'  => $Smilepure_thumbnail_w,
							'height' => $Smilepure_thumbnail_h,
							'crop'   => true,
							'echo'   => true,
							'alt'    => get_the_title(),
						) );
						?>
					<?php } ?>
				</a>
			</div>

			<div class="post-info">
				<?php get_template_part( 'loop/blog/title' ); ?>
				<div class="post-date">
					<?php echo get_the_date(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile;
