<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$image = $heading = $price = $sub_text = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-saving-item-' );
$this->get_inline_css( '#' . $css_id, $atts );
Smilepure_VC::get_shortcode_custom_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-saving-item ' . $el_class, $this->settings['base'], $atts );

$css_class .= Smilepure_Helper::get_animation_classes( $animation );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<div class="content-wrap">

		<?php if ( $image ) : ?>
			<div class="image">
				<?php
				$full_image_size = wp_get_attachment_url( $image );
				Smilepure_Helper::get_lazy_load_image( array(
					'url'    => $full_image_size,
					'crop'   => true,
					'echo'   => true,
				) );
				?>
			</div>
		<?php endif; ?>

		<?php if ( $heading ) : ?>
			<h4 class="heading">
				<?php echo esc_html( $heading ); ?>
			</h4>
		<?php endif; ?>

		<?php if ( $price ) : ?>
			<h5 class="price">
				<?php if ( $currency ) : ?>
					<span class="currency">
						<?php echo esc_html( $currency ); ?>
					</span>
				<?php endif; ?>
				<?php echo esc_html( $price ); ?>
			</h5>
		<?php endif; ?>

		<?php if ( $sub_text ) : ?>
			<span class="sub-text">
				<?php echo esc_html( $sub_text ); ?>
			</span>
		<?php endif; ?>
	</div>
</div>
