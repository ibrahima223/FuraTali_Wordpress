<?php
extract( $Smilepure_shortcode_atts );
$slider_classes = 'tm-swiper';

$slider_classes .= " equal-height";

if ( $nav !== '' ) {
	$slider_classes .= " nav-style-$nav";
}

if ( $pagination !== '' ) {
	$slider_classes .= " pagination-style-$pagination";
}
?>

<div class="<?php echo esc_attr( trim( $slider_classes ) ); ?>"
	<?php if ( $carousel_items_display !== '' ) {
		$arr = explode( ';', $carousel_items_display );
		foreach ( $arr as $value ) {
			$tmp = explode( ':', $value );
			echo ' data-' . $tmp[0] . '-items="' . $tmp[1] . '"';
		}
	}
	?>

	<?php if ( $carousel_gutter !== '' ) {
		$arr = explode( ';', $carousel_gutter );
		foreach ( $arr as $value ) {
			$tmp = explode( ':', $value );
			echo ' data-' . $tmp[0] . '-gutter="' . $tmp[1] . '"';
		}
	}
	?>

	<?php if ( $nav !== '' ) : ?>
		data-nav="1"
	<?php endif; ?>

	<?php if ( $nav === 'custom' ) : ?>
		data-custom-nav="<?php echo esc_attr( $slider_button_id ); ?>"
	<?php endif; ?>

	<?php Smilepure_Helper::get_swiper_pagination_attributes( $pagination ); ?>

	<?php if ( $auto_play !== '' ) : ?>
		data-autoplay="<?php echo esc_attr( $auto_play ); ?>"
	<?php endif; ?>

	<?php if ( $loop === '1' ) : ?>
		data-loop="1"
	<?php endif; ?>

	 data-equal-height="1"

	 data-effect="fade"
>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php while ( $Smilepure_query->have_posts() ) :
				$Smilepure_query->the_post();

				$_meta = unserialize( get_post_meta( get_the_ID(), 'insight_testimonial_options', true ) );
				?>
				<div class="swiper-slide">

					<?php
					$_style = '';
					if ( has_post_thumbnail() ):
						$full_image_size = get_the_post_thumbnail_url( null, 'full' );
						$image_url       = Smilepure_Helper::aq_resize( array(
							'url'    => $full_image_size,
							'width'  => 1920,
							'height' => 650,
							'crop'   => true,
						) );

						$_style = "background-image: url( {$image_url} );";

					endif;
					?>
					<div class="testimonial-item"
						<?php if ( $_style !== '' ) : ?>
							style="<?php echo esc_attr( $_style ); ?>"
						<?php endif; ?>
					>
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-md-push-6 col-sm-9 col-sm-push-3 testimonial-content">
									<div class="testimonial-info">
										<svg width="88px" height="69px" viewBox="0 0 88 69" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
											<defs></defs>
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<g id="home_03_fix" transform="translate(-1407.000000, -5501.000000)" fill="#E12454">
													<g id="Group-17" transform="translate(960.000000, 5501.000000)">
														<g id="Group-6" transform="translate(447.000000, 0.000000)">
															<path d="M0,38.5888889 C0,27.0036458 3.09674323,17.6759613 9.29032258,10.6055556 C15.4839019,3.53514983 24.5160697,0 36.3870968,0 L36.3870968,16.1 C27.2687716,16.1 22.7096774,21.8925347 22.7096774,33.4777778 L22.7096774,37.3111111 L39.2258065,37.3111111 L39.2258065,69 L5.41935484,69 C1.80643355,58.7777267 0,48.640791 0,38.5888889 Z M49.0322581,38.5888889 C49.0322581,27.0036458 52.085991,17.6759613 58.1935484,10.6055556 C64.3011058,3.53514983 73.2902632,0 85.1612903,0 L85.1612903,16.1 C76.215009,16.1 71.7419355,21.8925347 71.7419355,33.4777778 L71.7419355,37.3111111 L88,37.3111111 L88,69 L54.1935484,69 C50.752671,58.6073554 49.0322581,48.4704198 49.0322581,38.5888889 Z" id="“" transform="translate(44.000000, 34.500000) rotate(-180.000000) translate(-44.000000, -34.500000) "></path>
														</g>
													</g>
												</g>
											</g>
										</svg>

										<?php if ( isset( $_meta['rating'] ) && $_meta['rating'] !== '' ): ?>
											<div class="testimonial-rating">
												<?php Smilepure_Templates::get_rating_template( $_meta['rating'] ); ?>
											</div>
										<?php endif; ?>

										<div class="testimonial-desc"><?php the_content(); ?></div>

										<div class="testimonial-footer">
											<div class="testimonial-main-info">
												<h6 class="testimonial-name"><?php the_title(); ?></h6>

												<?php if ( isset( $_meta['by_line'] ) ) : ?>
													<div class="testimonial-by-line">
														<?php echo esc_html( $_meta['by_line'] ); ?>
													</div>
												<?php endif; ?>

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
							</div>
						</div>
					</div>

				</div>

			<?php endwhile; ?>
		</div>
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
