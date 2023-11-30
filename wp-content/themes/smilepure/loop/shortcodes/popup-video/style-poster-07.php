<?php
extract( $Smilepure_shortcode_atts );
?>

<a href="<?php echo esc_url( $video ); ?>">
	<div class="video-poster">
		<?php
		Smilepure_Helper::get_attachment_by_id( $poster, $image_size, $image_size_width, $image_size_height );
		?>
	</div>
	<div class="video-overlay">
		<div class="video-button">
			<div class="video-play">
				<svg viewBox="0 0 8 11" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<desc></desc>
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<g class="svg-stroke" transform="translate(-223.000000, -688.000000)">
							<g transform="translate(183.000000, 372.000000)">
								<g transform="translate(0.000000, 278.000000)">
									<g>
										<polygon points="40 49 40 38 48 43.5"></polygon>
									</g>
								</g>
							</g>
						</g>
					</g>
				</svg>
			</div>
		</div>
	</div>
</a>
