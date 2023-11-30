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
					<div class="testimonial-info">
						<?php if ( has_post_thumbnail() ): ?>
							<?php
							$full_image_size = get_the_post_thumbnail_url( null, 'full' );
							$image_url       = Smilepure_Helper::aq_resize( array(
								'url'    => $full_image_size,
								'width'  => 76,
								'height' => 76,
								'crop'   => true,
							) );
							?>
							<div class="post-thumbnail">
								<img src="<?php echo esc_url( $image_url ); ?>"
								     alt="<?php echo esc_attr( get_the_title() ); ?>"/>
							</div>
						<?php endif; ?>

						<div class="testimonial-main-info">
							<h6 class="testimonial-name"><?php the_title(); ?></h6>

							<?php if ( isset( $_meta['by_line'] ) ) : ?>
								<div
									class="testimonial-by-line"><?php echo esc_html( $_meta['by_line'] ); ?></div>
							<?php endif; ?>
						</div>
					</div>

					<div class="testimonial-content-wrap">
						<div class="quote-icon">
							<svg width="41px" height="32px" viewBox="0 0 41 32" version="1.1"
							     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<defs></defs>
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<g transform="translate(-387.000000, -4170.000000)" fill="#E12454">
										<g transform="translate(380.000000, 4050.000000)">
											<g>
												<g transform="translate(27.500000, 136.000000) scale(-1, 1) translate(-27.500000, -136.000000) translate(7.000000, 120.000000)">
													<path
														d="M0,17.8962963 C0,12.5234299 1.44280082,8.19754726 4.32844575,4.91851852 C7.21409067,1.63948978 11.4222597,0 16.9530792,0 L16.9530792,7.46666667 C12.7047686,7.46666667 10.5806452,10.1530596 10.5806452,15.5259259 L10.5806452,17.3037037 L18.2756598,17.3037037 L18.2756598,32 L2.52492669,32 C0.841633812,27.2592356 0,22.558048 0,17.8962963 Z M22.8445748,17.8962963 C22.8445748,12.5234299 24.2673367,8.19754726 27.1129032,4.91851852 C29.9584698,1.63948978 34.1465999,0 39.6774194,0 L39.6774194,7.46666667 C35.5092656,7.46666667 33.4252199,10.1530596 33.4252199,15.5259259 L33.4252199,17.3037037 L41,17.3037037 L41,32 L25.2492669,32 C23.6461308,27.1802228 22.8445748,22.4790353 22.8445748,17.8962963 Z"
														transform="translate(20.500000, 16.000000) rotate(-180.000000) translate(-20.500000, -16.000000) "></path>
												</g>
											</g>
										</g>
									</g>
								</g>
							</svg>
						</div>

						<div class="testimonial-content">
							<div class="testimonial-desc"><?php the_content(); ?></div>
							<?php if ( isset( $_meta['rating'] ) && $_meta['rating'] !== '' ): ?>
								<div class="testimonial-rating">
									<?php Smilepure_Templates::get_rating_template( $_meta['rating'] ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

			</div>

		<?php endwhile; ?>
	</div>
</div>
