<?php
extract( $Smilepure_shortcode_atts );
?>
<a href="<?php echo esc_url( $video ); ?>">
	<div class="inner">
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

			<div class="video-mark">
				<div class="wave-pulse wave-pulse-1"></div>
				<div class="wave-pulse wave-pulse-2"></div>
				<div class="wave-pulse wave-pulse-3"></div>
			</div>
		</div>

		<div class="video-text heading-font">
			<?php echo esc_html( $video_text ); ?>
		</div>
	</div>
</a>
