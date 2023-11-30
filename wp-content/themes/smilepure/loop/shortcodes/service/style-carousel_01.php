<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'service-item swiper-slide' );

	$meta             = unserialize( get_post_meta( get_the_ID(), 'insight_service_options', true ) );
	$service_trending = Smilepure_Helper::get_the_post_meta( $meta, 'service_trending', '' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<?php
			if($service_trending === 'yes') { ?>
				<div class="trending-label">
					<i class="fas fa-star"></i>
				</div>
			<?php }
			?>

			<a href="<?php the_permalink(); ?>">
				<div class="post-thumbnail">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php
						$image_url = get_the_post_thumbnail_url( null, 'full' );

						if ( $image_size !== '' ) {
							$_sizes  = explode( 'x', $image_size );
							$_width  = $_sizes[0];
							$_height = $_sizes[1];

							Smilepure_Helper::get_lazy_load_image( array(
								'url'    => $image_url,
								'width'  => $_width,
								'height' => $_height,
								'crop'   => true,
								'echo'   => true,
								'alt'    => get_the_title(),
							) );
						}
						?>
					<?php } else { ?>
						<?php Smilepure_Templates::image_placeholder( 370, 277 ); ?>
					<?php } ?>
				</div>
			</a>

			<div class="post-info">

				<h3 class="post-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>

				<div class="post-excerpt text-color">
					<?php Smilepure_Templates::excerpt( array(
						'limit' => 79,
						'type'  => 'character',
					) ); ?>
				</div>

				<div class="post-read-more heading-font">
					<a href="<?php the_permalink(); ?>">
						<span class="btn-text" data-hover="<?php echo esc_attr( 'Learn More', 'smilepure' ); ?>">
							<?php esc_html_e( 'Learn More', 'smilepure' ); ?>
						</span>
						<span class="btn-icon far fa-long-arrow-alt-right"></span>
					</a>
				</div>

			</div>
		</div>
	</div>
<?php endwhile;
