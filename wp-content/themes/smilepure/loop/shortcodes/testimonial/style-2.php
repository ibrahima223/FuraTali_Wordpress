<?php
extract( $Smilepure_shortcode_atts );
?>
<div class="swiper-container">
	<div class="swiper-wrapper">
		<?php while ( $Smilepure_query->have_posts() ) :
			$Smilepure_query->the_post();

			$_meta = unserialize( get_post_meta( get_the_ID(), 'insight_testimonial_options', true ) );
			?>
			<div class="swiper-slide">

				<div class="testimonial-item">


					<div class="testimonial-header">
						<div class="quote-icon">
							<i class="fas fa-quote-left"></i>
						</div>

						<?php if ( isset( $_meta['rating'] ) && $_meta['rating'] !== '' ): ?>
							<div class="testimonial-rating">
								<?php Smilepure_Templates::get_rating_template( $_meta['rating'] ); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="testimonial-desc"><?php the_content(); ?></div>

					<div class="testimonial-footer">
						<div class="testimonial-main-info">
							<?php if ( has_post_thumbnail() ): ?>
								<?php
								$full_image_size = get_the_post_thumbnail_url( null, 'full' );
								$image_url       = Smilepure_Helper::aq_resize( array(
									'url'    => $full_image_size,
									'width'  => 70,
									'height' => 70,
									'crop'   => true,
								) );
								?>
								<div class="post-thumbnail">
									<img src="<?php echo esc_url( $image_url ); ?>"
									     alt="<?php echo esc_attr( get_the_title() ); ?>"/>
								</div>
							<?php endif; ?>

							<div class="info-wrap">
								<h6 class="testimonial-name"><?php the_title(); ?></h6>

								<?php if ( isset( $_meta['by_line'] ) ) : ?>
									<div class="testimonial-by-line">
										<?php echo esc_html( $_meta['by_line'] ); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<div class="swiper-custom-action-wrap">
							<a class="swiper-custom-btn btn-prev-slider">
								<span class="fal fa-chevron-left"></span>
							</a>
							<a class="swiper-custom-btn btn-next-slider">
								<span class="fal fa-chevron-right"></span>
							</a>
						</div>
					</div>

				</div>

			</div>

		<?php endwhile; ?>
	</div>
</div>

<script>
	(
		function( $ ) {
			$( window ).on( 'load', function() {
				var $slider = $( '<?php echo "#$css_id"; ?>' );
				var $sliderInstance = $slider.find( '.swiper-container' ).first()[ 0 ].swiper;

				$slider.on( 'click', '.swiper-custom-btn', function() {
					if ( $( this ).hasClass( 'btn-prev-slider' ) ) {
						$sliderInstance.slidePrev();
					} else {
						$sliderInstance.slideNext();
					}
				} );
			} );
		}( jQuery )
	);
</script>
