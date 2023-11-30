<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'service-item grid-item' );

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

			<?php if ( $service_image_small_url !== '' ) { ?>
				<div class="service-image-small">
					<img src="<?php echo esc_url( $service_image_small_url ); ?>"
					     alt="<?php echo esc_attr( get_the_title() ); ?>" />
				</div>
			<?php } ?>

			<h3 class="post-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
		</div>
	</div>
<?php endwhile;
