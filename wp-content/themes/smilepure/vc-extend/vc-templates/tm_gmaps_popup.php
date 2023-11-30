<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$css_id = uniqid( 'tm-map-popup-' );

$this->get_inline_css( "#$css_id", $atts );
?>
<div class="tm-maps-popup"
     id="<?php echo esc_attr( $css_id ); ?>" data-iframe="true" data-src="<?php echo esc_url( $map_src ); ?>>">
	<div class="tm-maps-popup-text">
		<?php esc_html_e( 'Click to open the map!', 'smilepure' ); ?>
	</div>
	<div class="tm-maps-popup-marker">
		<div class="animated-dot">
			<div class="middle-dot"></div>
			<div class="signal"></div>
			<div class="signal2"></div>
		</div>
	</div>
</div>
