<?php
extract( $Smilepure_shortcode_atts );
?>
<div class="testimonial-list">
	<?php while ( $Smilepure_query->have_posts() ) :
		$Smilepure_query->the_post();

		$_meta = unserialize( get_post_meta( get_the_ID(), 'insight_testimonial_options', true ) );
		?>

		<div class="testimonial-item">
			<div class="testimonial-item-wrap">
				<?php
				$_style = '';

				if ( has_post_thumbnail() ): ?>
					<?php
					$full_image_size = get_the_post_thumbnail_url( null, 'full' );
					$image_url       = Smilepure_Helper::aq_resize( array(
						'url'    => $full_image_size,
						'width'  => 960,
						'height' => 630,
						'crop'   => true,
					) );

					$_style = "background-image: url( {$image_url} );";
					?>
				<?php endif; ?>

				<div class="testimonial-thumb"
					<?php if ( $_style !== '' ) : ?>
						style="<?php echo esc_attr( $_style ); ?>"
					<?php endif; ?>
				>
				</div>

				<div class="testimonial-info">
					<div class="quote-icon">
						<svg width="35px" height="29px" viewBox="0 0 35 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<defs></defs>
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g id="service_detail_04" transform="translate(-1099.000000, -3165.000000)" fill="#FF875F" fill-rule="nonzero">
									<g id="right-quotation-mark" transform="translate(1099.000000, 3165.000000)">
										<path d="M12.0002189,0 L4.00007297,0 C2.88881186,0 1.9444333,0.384513966 1.16649944,1.15332547 C0.388930441,1.92228126 0,2.855936 0,3.95465039 L0,11.8636626 C0,12.9623048 0.388711531,13.8958153 1.16649944,14.6646268 C1.94436033,15.4333662 2.88903078,15.8180244 4.00007297,15.8180244 L8.66672748,15.8180244 C9.22210263,15.8180244 9.69443786,16.0103535 10.0833683,16.3947232 C10.4722987,16.7788765 10.666691,17.2459924 10.666691,17.7954939 L10.666691,18.4542175 C10.666691,19.9098157 10.1457577,21.1520916 9.10418301,22.1821273 C8.06253534,23.2116581 6.80569896,23.7266038 5.33323604,23.7266038 L4.00007297,23.7266038 C3.63872521,23.7266038 3.32634037,23.8573962 3.06233468,24.1181155 C2.7985479,24.3788347 2.66654505,24.6878887 2.66654505,25.0449168 L2.66654505,27.6816149 C2.66654505,28.0380658 2.7985479,28.3476969 3.06233468,28.6084883 C3.32655928,28.8691354 3.63865224,29 4.00007297,29 L5.33330901,29 C6.77789737,29 8.15637485,28.721534 9.46896036,28.1656119 C10.7814729,27.6096177 11.9168141,26.8576152 12.8752029,25.9101093 C13.8333729,24.9625312 14.5938669,23.8402987 15.1563201,22.5426182 C15.7187004,21.2450098 16,19.8822577 16,18.4542897 L16,3.95436182 C16,2.85564743 15.6110696,1.92206484 14.8334276,1.15325333 C14.0557856,0.384441824 13.1111881,0 12.0002189,0 Z" id="Shape"></path>
										<path d="M33.8330414,1.15332547 C33.0554583,0.384513966 32.1109895,0 30.9997081,0 L22.9997081,0 C21.8884267,0 20.9440309,0.384513966 20.1663748,1.15332547 C19.3887916,1.9223534 19,2.855936 19,3.95465039 L19,11.8636626 C19,12.9623048 19.3887916,13.8958153 20.1663748,14.6646268 C20.9440309,15.4333662 21.8884997,15.8180244 22.9997081,15.8180244 L27.6664478,15.8180244 C28.221833,15.8180244 28.6945417,16.0103535 29.0834063,16.3947232 C29.471906,16.7790929 29.6667396,17.2459924 29.6667396,17.7954939 L29.6667396,18.4542175 C29.6667396,19.9098157 29.1457968,21.1520916 28.1039842,22.1821273 C27.0623905,23.2116581 25.8058231,23.7266038 24.3331874,23.7266038 L22.9997081,23.7266038 C22.6386457,23.7266038 22.3259632,23.8573962 22.0622446,24.1181155 C21.7983071,24.3788347 21.6661559,24.6878887 21.6661559,25.0449168 L21.6661559,27.6816149 C21.6661559,28.0380658 21.7983071,28.3476969 22.0622446,28.6084883 C22.3258903,28.8691354 22.6385727,29 22.9997081,29 L24.3331874,29 C25.7775832,29 27.1560128,28.721534 28.4687682,28.1656119 C29.7810858,27.6096177 30.9163018,26.8576152 31.8747811,25.9101093 C32.8331874,24.9625312 33.5941331,23.8400101 34.1562318,22.5426182 C34.7185493,21.2452984 35,19.8822577 35,18.4542897 L35,3.95436182 C34.9997811,2.85564743 34.6112084,1.92206484 33.8330414,1.15332547 Z" id="Shape"></path>
									</g>
								</g>
							</g>
						</svg>
					</div>

					<div class="testimonial-desc heading-font"><?php the_content(); ?></div>


					<div class="testimonial-main-info">
						<div class="inner">
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

							<div class="testimonial-main-info-text">
								<h6 class="testimonial-name"><?php the_title(); ?></h6>
								<?php if ( isset( $_meta['by_line'] ) ) : ?>
									<div
										class="testimonial-by-line"><?php echo esc_html( $_meta['by_line'] ); ?></div>
								<?php endif; ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	<?php endwhile; ?>
</div>
