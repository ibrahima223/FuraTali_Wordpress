<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$style = $el_class = $heading = $text = $photo = $position = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-blockquote-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-blockquote ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";
$css_class .= Smilepure_Helper::get_animation_classes();
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<?php

	if ( $text !== '' ) { ?>
		<?php if ( $style === '1' ) { ?>
			<blockquote>
				<?php echo '<div class="quote-text">' . $text . '</div>'; ?>
			</blockquote>

			<div class="quote-footer">
				<div class="quote-photo">
					<?php
					$full_image_size = wp_get_attachment_url( $photo );
					$image_url       = Smilepure_Helper::aq_resize( array(
						'url'    => $full_image_size,
						'width'  => 70,
						'height' => 70,
						'crop'   => true,
					) );
					?>
					<img src="<?php echo esc_url( $image_url ); ?>"
					     alt="<?php esc_attr_e( 'Blockquote Image', 'smilepure' ); ?>"/>
				</div>

				<div class="quote-info">
					<?php if ( $heading !== '' ) : ?>
						<h6 class="heading"><?php echo esc_html( $heading ); ?></h6>
					<?php endif; ?>

					<?php if ( $position !== '' ) : ?>
						<?php echo '<div class="quote-position">' . $position . '</div>'; ?>
					<?php endif; ?>
				</div>
			</div>
		<?php } elseif ( $style === '2' ) { ?>
			<div class="quote-photo">
				<?php
				$full_image_size = wp_get_attachment_url( $photo );
				$image_url       = Smilepure_Helper::aq_resize( array(
					'url'    => $full_image_size,
					'width'  => 600,
					'height' => 370,
					'crop'   => true,
				) );
				?>
				<img src="<?php echo esc_url( $image_url ); ?>"
				     alt="<?php esc_attr_e( 'Blockquote Image', 'smilepure' ); ?>"/>
			</div>

			<div class="quote-content">
				<blockquote>
					<?php echo '<div class="quote-text">' . $text . '</div>'; ?>
				</blockquote>

				<div class="quote-footer">
					<div class="quote-info">
						<?php if ( $heading !== '' ) : ?>
							<h6 class="heading"><?php echo esc_html( $heading ); ?></h6>
						<?php endif; ?>

						<?php if ( $position !== '' ) : ?>
							<?php echo '<div class="quote-position">' . $position . '</div>'; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</div>
