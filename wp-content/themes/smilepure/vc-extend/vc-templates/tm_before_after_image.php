<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$el_class = $image = $animation = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-before-after-image-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-before-after-image ' . $el_class, $this->settings['base'], $atts );

$css_class .= Smilepure_Helper::get_animation_classes( $animation );

wp_enqueue_style( 'image-before-after' );
wp_enqueue_script( 'twentytwenty' );
wp_enqueue_script( 'event-move' );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<?php if ( $image_before ) : ?>
		<?php
		$_image_full_url        = wp_get_attachment_image_url( $image_before, 'full' );
		$_image_before_template = Smilepure_Helper::get_attachment_by_url( $_image_full_url, $image_size, $image_size_width, $image_size_height, false );

		$_image_before_template = '<div class="image">' . $_image_before_template . '</div>';

		echo '' . $_image_before_template;
		?>
	<?php endif; ?>
	<?php if ( $image_after ) : ?>
		<?php
		$_image_full_url       = wp_get_attachment_image_url( $image_after, 'full' );
		$_image_after_template = Smilepure_Helper::get_attachment_by_url( $_image_full_url, $image_size, $image_size_width, $image_size_height, false );

		$_image_after_template = '<div class="image">' . $_image_after_template . '</div>';

		echo '' . $_image_after_template;
		?>
	<?php endif; ?>
</div>
