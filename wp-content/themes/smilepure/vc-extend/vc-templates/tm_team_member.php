<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = $photo_effect = $el_class = $animation = $photo = $name = $profile = $social_networks = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-team-member-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-team-member ' . $el_class, $this->settings['base'], $atts );
$css_class .= "style-$style";

if ( $photo_effect !== '' ) {
	$css_class .= " effect-$photo_effect";
}

$css_class .= Smilepure_Helper::get_animation_classes( $animation );

$social_networks = (array) vc_param_group_parse_atts( $social_networks );
?>

<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">

	<?php if ( $style === '1' ) { ?>
		<div class="photo">
			<?php
			$full_image_size = wp_get_attachment_url( $photo );
			$image_url       = Smilepure_Helper::aq_resize( array(
				'url'    => $full_image_size,
				'width'  => 370,
				'height' => 237,
				'crop'   => true,
			) );
			?>
			<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $name ); ?>"/>
		</div>
		<div class="info">
			<div class="team-header">
				<h3 class="name">
					<?php
					if ( $profile != '' ) {
						echo '<a href="' . esc_attr( $profile ) . '">';
						echo esc_html( $name );
						echo '</a>';
					} else {
						echo esc_html( $name );
					}
					?>
				</h3>

				<?php if ( $position !== '' ) : ?>
					<div class="position"><?php echo esc_html( $position ); ?></div>
				<?php endif; ?>
			</div>

			<?php if ( $desc !== '' ) : ?>
				<div class="description"><?php echo esc_html( $desc ); ?></div>
			<?php endif; ?>

			<?php if ( $content !== '' ) : ?>
				<div class="sub-description"><?php echo wpb_js_remove_wpautop( $content, true ); ?></div>
			<?php endif; ?>

			<div class="team-footer">
				<?php if ( count( $social_networks ) > 0 ) { ?>
					<div class="social-networks">
						<?php
						foreach ( $social_networks as $data ) {
							$icon_classes = '';
							if ( isset( $data['icon_type'] ) && isset( $data["icon_{$data['icon_type']}"] ) && $data["icon_{$data['icon_type']}"] !== '' ) {

								$icon_classes .= esc_attr( $data["icon_{$data['icon_type']}"] );

								vc_icon_element_fonts_enqueue( $data['icon_type'] );
							}

							printf( '<a target="_blank" href="%s">
                                    <i class="%s"></i>
                                </a>', isset( $data['link'] ) ? esc_url( $data['link'] ) : '', $icon_classes );
						}
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } elseif ( $style === '2' ) { ?>
		<div class="inner">
			<?php if ( $photo ) : ?>
				<div class="photo">
					<?php
					$full_image_size = wp_get_attachment_url( $photo );
					$image_url       = Smilepure_Helper::aq_resize( array(
						'url'    => $full_image_size,
						'width'  => 144,
						'height' => 144,
						'crop'   => true,
					) );
					?>
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $name ); ?>"/>
				</div>
			<?php endif; ?>

			<div class="info">
				<div class="team-header">
					<h3 class="name">
						<?php
						if ( $profile != '' ) {
							echo '<a href="' . esc_attr( $profile ) . '">';
							echo esc_html( $name );
							echo '</a>';
						} else {
							echo esc_html( $name );
						}
						?>
					</h3>

					<?php if ( $position !== '' ) : ?>
						<div class="position"><?php echo esc_html( $position ); ?></div>
					<?php endif; ?>
				</div>

				<?php if ( $desc !== '' ) : ?>
					<div class="description"><?php echo esc_html( $desc ); ?></div>
				<?php endif; ?>

				<?php if ( $content !== '' ) : ?>
					<div class="sub-description"><?php echo wpb_js_remove_wpautop( $content, true ); ?></div>
				<?php endif; ?>

				<div class="team-footer">
					<?php if ( count( $social_networks ) > 0 ) { ?>
						<div class="social-networks">
							<?php
							foreach ( $social_networks as $data ) {
								$icon_classes = '';
								if ( isset( $data['icon_type'] ) && isset( $data["icon_{$data['icon_type']}"] ) && $data["icon_{$data['icon_type']}"] !== '' ) {

									$icon_classes .= esc_attr( $data["icon_{$data['icon_type']}"] );

									vc_icon_element_fonts_enqueue( $data['icon_type'] );
								}

								printf( '<a target="_blank" href="%s">
                                    <i class="%s"></i>
                                </a>', isset( $data['link'] ) ? esc_url( $data['link'] ) : '', $icon_classes );
							}
							?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } elseif ( $style === '3' ) { ?>
	<div class="inner">
		<?php if ( $photo ) : ?>
			<div class="photo">
				<?php
				$full_image_size = wp_get_attachment_url( $photo );
				$image_url       = Smilepure_Helper::aq_resize( array(
					'url'    => $full_image_size,
					'width'  => 370,
					'height' => 410,
					'crop'   => true,
				) );
				?>
				<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $name ); ?>"/>
			</div>
		<?php endif; ?>

		<div class="info">
			<?php if ( count( $social_networks ) > 0 ) { ?>
				<div class="social-networks">
					<?php
					foreach ( $social_networks as $data ) {
						$icon_classes = '';
						if ( isset( $data['icon_type'] ) && isset( $data["icon_{$data['icon_type']}"] ) && $data["icon_{$data['icon_type']}"] !== '' ) {

							$icon_classes .= esc_attr( $data["icon_{$data['icon_type']}"] );

							vc_icon_element_fonts_enqueue( $data['icon_type'] );
						}

						printf( '<a target="_blank" href="%s">
                                    <i class="%s"></i>
                                </a>', isset( $data['link'] ) ? esc_url( $data['link'] ) : '', $icon_classes );
					}
					?>
				</div>
			<?php } ?>

			<div class="team-header">
				<h3 class="name">
					<?php
					if ( $profile != '' ) {
						echo '<a href="' . esc_attr( $profile ) . '">';
						echo esc_html( $name );
						echo '</a>';
					} else {
						echo esc_html( $name );
					}
					?>
				</h3>

				<?php if ( $position !== '' ) : ?>
					<div class="position"><?php echo esc_html( $position ); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php } ?>

</div>
