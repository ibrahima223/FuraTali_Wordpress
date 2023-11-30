<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'service-item swiper-slide' );

	$meta                    = unserialize( get_post_meta( get_the_ID(), 'insight_service_options', true ) );
	$service_image_small_url = Smilepure_Helper::get_the_post_meta( $meta, 'service_image_small', '' );
	$service_trending        = Smilepure_Helper::get_the_post_meta( $meta, 'service_trending', '' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<?php
			if ( $service_trending === 'yes' ) { ?>
				<div class="trending-label">
					<i class="fas fa-star"></i>
				</div>
			<?php }
			?>

			<div class="title-wrap">
				<?php if ( $service_image_small_url !== '' ) { ?>
					<img src="<?php echo esc_url( $service_image_small_url ); ?>"
					     alt="<?php echo esc_attr( get_the_title() ); ?>"
					     class="service-image-small"/>
				<?php } ?>

				<h3 class="post-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>
			</div>

			<div class="post-info">
				<div class="post-excerpt text-color">
					<?php Smilepure_Templates::excerpt( array(
						'limit' => 80,
						'type'  => 'character',
					) ); ?>
				</div>

				<div class="post-read-more heading-font">
					<a href="<?php the_permalink(); ?>" class="tm-button style-text">
						<span class="button-text" data-text="<?php echo esc_attr( 'More Details', 'smilepure' ); ?>">
							<?php esc_html_e( 'More Details', 'smilepure' ); ?>
						</span>
						<span class="button-icon far fa-long-arrow-alt-right"></span>
					</a>
				</div>

			</div>
		</div>
	</div>
<?php endwhile;
