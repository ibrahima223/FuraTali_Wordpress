<?php

?>
<div class="timeline-list">
	<?php foreach ( $items as $item ) { ?>
		<div class="timeline-item">

			<div class="content-wrap">

				<?php if ( isset( $item['image'] ) ) : ?>
					<div class="photo">
						<?php
						$full_image_size = wp_get_attachment_url( $item['image'] );
						Smilepure_Helper::get_lazy_load_image( array(
							'url'    => $full_image_size,
							'width'  => 160,
							'height' => 160,
							'crop'   => true,
							'echo'   => true,
						) );
						?>

					</div>
				<?php endif; ?>

				<div class="content-body">
					<h6 class="heading">
						<?php
						$_year = $_title = '';
						if ( isset( $item['datetime'] ) ) {
							$_year = date( 'Y', strtotime( $item['datetime'] ) );
						}

						if ( isset( $item['title'] ) ) {
							$_title = $item['title'];
						}

						if ( $_year !== '' && $_title !== '' ) {
							echo esc_html( "$_year - $_title" );
						} else {
							echo esc_html( "{$_year}{$_title}" );
						}
						?>
					</h6>

					<?php if ( isset( $item['text'] ) ) : ?>
						<div class="text">
							<?php echo wp_kses( $item['text'], 'smilepure-default' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	<?php } ?>
</div>
