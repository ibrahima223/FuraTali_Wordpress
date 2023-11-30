<?php
extract( $Smilepure_shortcode_atts );

$testimonial_slides_template = '';
$testimonial_thumbs_template = '';
?>

<?php while ( $Smilepure_query->have_posts() ) : $Smilepure_query->the_post(); ?>
	<?php

	$image_url = SMILEPURE_THEME_IMAGE_URI . '/avatar-placeholder.jpg';

	if ( has_post_thumbnail() ):
		$full_image_size = get_the_post_thumbnail_url( null, 'full' );
		$image_url       = Smilepure_Helper::aq_resize( array(
			'url'    => $full_image_size,
			'width'  => 85,
			'height' => 85,
			'crop'   => true,
		) );
	endif;

	$testimonial_thumbs_template .= '<div class="swiper-slide"><div class="post-thumbnail"><img src="' . esc_url( $image_url ) . '" alt="' . esc_attr__( 'Slide Image', 'smilepure' ) . '"/></div></div>';

	?>

	<?php ob_start(); ?>

	<div class="swiper-slide">

		<?php $_meta = unserialize( get_post_meta( get_the_ID(), 'insight_testimonial_options', true ) ); ?>
		<div class="testimonial-item">
			<div class="testimonial-desc heading-color"><?php the_content(); ?></div>

			<?php if ( isset( $_meta['rating'] ) && $_meta['rating'] !== '' ): ?>
				<div class="testimonial-rating">
					<?php Smilepure_Templates::get_rating_template( $_meta['rating'] ); ?>
				</div>
			<?php endif; ?>

			<div class="testimonial-main-info">
				<h6 class="testimonial-name">
					<?php the_title(); ?>
					<?php if ( isset( $_meta['by_line'] ) ) : ?>
						<span class="testimonial-by-line"><?php echo esc_html( $_meta['by_line'] ); ?></span>
					<?php endif; ?>
				</h6>
			</div>

		</div>

	</div>

	<?php
	$testimonial_slides_template .= ob_get_contents();
	ob_end_clean();
	?>

<?php endwhile; ?>

<div class="tm-swiper tm-testimonial-pagination equal-height v-center h-center"
     data-lg-items="3"
     data-lg-gutter="10"
     data-centered="1"
     data-queue-init="0"
>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php echo "{$testimonial_thumbs_template}"; ?>
		</div>
	</div>
</div>

<div class="swiper-container">
	<div class="swiper-wrapper">
		<?php echo "{$testimonial_slides_template}"; ?>
	</div>
</div>
