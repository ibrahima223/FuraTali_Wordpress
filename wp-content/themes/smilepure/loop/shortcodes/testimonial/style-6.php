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

					<div class="testimonial-content">
						<?php if ( isset( $_meta['rating'] ) && $_meta['rating'] !== '' ): ?>
							<div class="testimonial-rating">
								<?php Smilepure_Templates::get_rating_template( $_meta['rating'] ); ?>
							</div>
						<?php endif; ?>

						<div class="testimonial-desc"><?php the_content(); ?></div>
					</div>

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

				</div>

			</div>

		<?php endwhile; ?>
	</div>
</div>
