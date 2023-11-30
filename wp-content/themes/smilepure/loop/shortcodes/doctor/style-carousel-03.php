<?php
while ( $Smilepure_query->have_posts() ) :
	$Smilepure_query->the_post();
	$classes = array( 'service-item swiper-slide' );

	$meta             = unserialize( get_post_meta( get_the_ID(), 'insight_service_options', true ) );
	$service_trending = Smilepure_Helper::get_the_post_meta( $meta, 'service_trending', '' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<div class="post-thumbnail">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php
					$image_url = get_the_post_thumbnail_url( null, 'full' );

					Smilepure_Helper::get_lazy_load_image( array(
						'url'    => $image_url,
						'width'  => 370,
						'height' => 410,
						'crop'   => true,
						'echo'   => true,
						'alt'    => get_the_title(),
					) );
					?>
				<?php } else { ?>
					<?php Smilepure_Templates::image_placeholder( 370, 370 ); ?>
				<?php } ?>
			</div>

			<div class="info">
				<?php
				$post_options = unserialize( get_post_meta( get_the_ID(), 'insight_doctor_options', true ) );
				if ( $post_options !== false && ( ( isset( $post_options['url_facebook'] ) && $post_options['url_facebook'] !== '' ) || ( isset( $post_options['url_twitter'] ) && $post_options['url_twitter'] !== '' ) || ( isset( $post_options['url_instagram'] ) && $post_options['url_instagram'] !== '' ) || ( isset( $post_options['url_google_plus'] ) && $post_options['url_google_plus'] !== '' ) || ( isset( $post_options['url_linkedin'] ) && $post_options['url_linkedin'] !== '' ) || ( isset( $post_options['url_pinterest'] ) && $post_options['url_pinterest'] !== '' ) ) ) { ?>
					<div class="social-networks">
						<?php
						$post_options = unserialize( get_post_meta( get_the_ID(), 'insight_doctor_options', true ) );
						if ( $post_options !== false && isset( $post_options['url_facebook'] ) && $post_options['url_facebook'] !== '' ) { ?>
							<a href="<?php echo esc_url( $post_options['url_facebook'] ); ?>"><i
									class="fab fa-facebook-f"></i></a>
						<?php }
						?>
						<?php
						if ( $post_options !== false && isset( $post_options['url_twitter'] ) && $post_options['url_twitter'] !== '' ) { ?>
							<a href="<?php echo esc_url( $post_options['url_twitter'] ); ?>"><i
									class="fab fa-twitter"></i></a>
						<?php }
						?>
						<?php
						if ( $post_options !== false && isset( $post_options['url_instagram'] ) && $post_options['url_instagram'] !== '' ) { ?>
							<a href="<?php echo esc_url( $post_options['url_instagram'] ); ?>"><i
									class="fab fa-instagram"></i></a>
						<?php }
						?>
						<?php
						if ( $post_options !== false && isset( $post_options['url_google_plus'] ) && $post_options['url_google_plus'] !== '' ) { ?>
							<a href="<?php echo esc_url( $post_options['url_google_plus'] ); ?>"><i
									class="fab fa-google-plus-g"></i></a>
						<?php }
						?>
						<?php
						if ( $post_options !== false && isset( $post_options['url_linkedin'] ) && $post_options['url_linkedin'] !== '' ) { ?>
							<a href="<?php echo esc_url( $post_options['url_linkedin'] ); ?>"><i
									class="fab fa-linkedin-in"></i></a>
						<?php }
						?>
						<?php
						if ( $post_options !== false && isset( $post_options['url_pinterest'] ) && $post_options['url_pinterest'] !== '' ) { ?>
							<a href="<?php echo esc_url( $post_options['url_pinterest'] ); ?>"><i
									class="fab fa-pinterest"></i></a>
						<?php }
						?>
					</div>
				<?php }
				?>

				<div class="doctor-header">
					<h5 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h5>

					<?php
					$post_options = unserialize( get_post_meta( get_the_ID(), 'insight_doctor_options', true ) );
					if ( $post_options !== false && isset( $post_options['position'] ) && $post_options['position'] !== '' ) { ?>
						<div class="position"><?php echo esc_html( $post_options['position'] ); ?></div>
					<?php }
					?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile;
