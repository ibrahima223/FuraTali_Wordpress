<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = $hover_style = $el_class = $columns = $animation = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-gallery-slider-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

if ( $images === '' ) {
	return;
}

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-gallery-slider tm-grid-wrapper ' . $el_class, $this->settings['base'], $atts );

$css_class .= ' tm-light-slider-wrap';
$grid_classes = 'tm-light-slider';

wp_enqueue_style( 'lightslider' );
wp_enqueue_script( 'lightslider' );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<div class="<?php echo esc_attr( $grid_classes ); ?>">

		<?php
		$images = explode( ',', $images );
		foreach ( $images as $image ) {

			$image_full = Smilepure_Helper::get_attachment_info( $image );

			$full_image_size = wp_get_attachment_url( $image, 'full' );
			$image_thumb_url = Smilepure_Helper::aq_resize( array(
				'url'    => $full_image_size,
				'width'  => 170,
				'height' => 100,
				'crop'   => true,
			) );
			?>

			<div data-thumb="<?php echo esc_url( $image_thumb_url ); ?>">
				<?php Smilepure_Helper::get_attachment_by_id( $image, $image_size, $image_size_width, $image_size_height, true ); ?>
				<?php if ( isset( $image_full['caption'] ) && $image_full['caption'] !== '' ): ?>
					<div class="caption">
						<?php echo esc_html( $image_full['caption'] ); ?>
					</div>
				<?php endif; ?>
			</div>
			<?php
		} ?>

	</div>
</div>
