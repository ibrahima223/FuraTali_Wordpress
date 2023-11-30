<?php
$number_post = Smilepure::setting( 'single_post_related_number' );
$results     = Smilepure_Query::get_related_posts( array(
	'post_id'      => get_the_ID(),
	'number_posts' => $number_post,
) );

if ( $results !== false && $results->have_posts() ) : ?>
	<div class="related-posts">
		<h3 class="related-title">
			<?php esc_html_e( 'Related posts', 'smilepure' ); ?>
		</h3>
		<div class="tm-swiper equal-height"
		     data-lg-items="3"
		     data-md-items="2"
		     data-sm-items="1"
		     data-lg-gutter="30"
		     data-nav="1"
		     data-slides-per-group="inherit"
		>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php while ( $results->have_posts() ) : $results->the_post(); ?>
						<div class="swiper-slide">
							<div class="related-post-item">
								<div class="post-item-wrapper">
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="post-thumbnail post-feature">
											<?php
											$Smilepure_thumbnail_w = 300;
											$Smilepure_thumbnail_h = 200;

											$full_image_size = get_the_post_thumbnail_url( null, 'full' );
											?>

											<a href="<?php the_permalink(); ?>">
												<?php
												Smilepure_Helper::get_lazy_load_image( array(
													'url'    => $full_image_size,
													'width'  => $Smilepure_thumbnail_w,
													'height' => $Smilepure_thumbnail_h,
													'crop'   => true,
													'echo'   => true,
													'alt'    => get_the_title(),
												) );
												?>
											</a>
										</div>
									<?php } ?>

									<div class="related-post-info">
										<?php get_template_part( 'loop/blog/title' ); ?>
										<div class="related-post-date">
											<?php echo get_the_date( 'M d, Y' ); ?>
										</div>
									</div>

								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif;
wp_reset_postdata();
