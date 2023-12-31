<?php
extract( $Smilepure_shortcode_atts );
?>
<div class="content-wrap">
	<div class="content-inner">
		<div class="content-left">
			<?php if ( $image ) : ?>
				<div class="image">
					<?php
					$full_image_size = wp_get_attachment_url( $image );
					Smilepure_Helper::get_lazy_load_image( array(
						'url'    => $full_image_size,
						'width'  => 80,
						'height' => 80,
						'crop'   => true,
						'echo'   => true,
					) );
					?>
				</div>
			<?php endif; ?>

			<?php if ( isset( ${"icon_$icon_type"} ) && ${"icon_$icon_type"} !== '' ) { ?>
				<?php
				$_args = array(
					'type'        => $icon_type,
					'icon'        => ${"icon_$icon_type"},
					'svg_animate' => isset( $icon_svg_animate_type ) ? $icon_svg_animate_type : '',
				);

				Smilepure_Helper::get_vc_icon_template( $_args );
				?>
			<?php } ?>
		</div>

		<div class="content">

			<?php if ( $heading ) : ?>
				<h4 class="heading">
					<?php
					// Item Link.
					$link = vc_build_link( $link );
					if ( $link['url'] !== '' ) {
					?>
					<a class="link-secret" href="<?php echo esc_url( $link['url'] ); ?>"
						<?php if ( $link['target'] !== '' ): ?>
							target="<?php echo esc_attr( $link['target'] ); ?>"
						<?php endif; ?>
					>
						<?php } ?>

						<?php echo esc_html( $heading ); ?>

						<?php if ( $link['url'] !== '' ) { ?>
					</a>
				<?php } ?>

				</h4>
			<?php endif; ?>

			<?php if ( $text ) : ?>
				<?php echo '<div class="text">' . $text . '</div>'; ?>
			<?php endif; ?>

			<?php
			// Button.
			if ( $button && $button !== '' ) {
				$button = vc_build_link( $button );
				if ( $button['url'] !== '' ) {
					$button_classes = 'tm-button style-text tm-box-icon__btn';
					if ( $button_color === 'primary' ) {
						$button_classes .= ' tm-button-primary';
					} elseif ( $button_color === 'secondary' ) {
						$button_classes .= ' tm-button-secondary';
					}
					?>
					<a class="<?php echo esc_attr( $button_classes ); ?>"
					   href="<?php echo esc_url( $button['url'] ) ?>"
						<?php if ( $button['target'] !== '' ) { ?>
							target="<?php echo esc_attr( $button['target'] ); ?>"
						<?php } ?>
					>
						<span class="button-text" data-text="<?php echo esc_attr( $button['title'] ); ?>"><?php echo esc_html( $button['title'] ); ?></span>
						<span class="button-icon far fa-long-arrow-alt-right"></span>
					</a>
				<?php }
			} ?>
		</div>
	</div>
</div>
