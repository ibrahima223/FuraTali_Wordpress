<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'post-item swiper-slide' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<div class="post-info">
				<div class="post-info-top">
					<?php get_template_part( 'loop/blog/category' ); ?>
					<?php get_template_part( 'loop/blog/title' ); ?>
					<div class="post-excerpt">
						<?php Smilepure_Templates::excerpt( array(
							'limit' => 110,
							'type'  => 'character',
						) ); ?>
					</div>
				</div>

				<div class="post-date">
					<?php echo get_the_date( 'M d, Y' ); ?>
				</div>
			</div>

			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post-feature post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php
						$full_image_size = get_the_post_thumbnail_url( null, 'full' );
						Smilepure_Helper::get_lazy_load_image( array(
							'url'    => $full_image_size,
							'width'  => 240,
							'height' => 350,
							'crop'   => true,
							'echo'   => true,
							'alt'    => get_the_title(),
						) );
						?>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
<?php endwhile;
