<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'service-item grid-item' );

	$meta        = unserialize( get_post_meta( get_the_ID(), 'insight_service_options', true ) );
	$service_icon = Smilepure_Helper::get_the_post_meta( $meta, 'service_icon', '' );
	$service_trending = Smilepure_Helper::get_the_post_meta( $meta, 'service_trending', '' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<?php if ( $service_icon !== '' ) { ?>
				<div class="post-icon-wrap">
					<div class="post-icon">
						<i class="<?php echo esc_attr( $service_icon ); ?>"></i>
					</div>
					<div class="post-icon-overlay"></div>
				</div>
			<?php } ?>

			<h3 class="post-title">
				<?php
				if($service_trending === 'yes') { ?>
					<div class="trending-label2">
						<i class="fas fa-star"></i>
					</div>
				<?php }
				?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
		</div>
	</div>
<?php endwhile;
