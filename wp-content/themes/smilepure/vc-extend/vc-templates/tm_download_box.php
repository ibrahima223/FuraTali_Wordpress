<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = $centered = $loop = $equal_height = $auto_play = $nav = $pagination = $el_class = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-download-box-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-download-box ' . $el_class, $this->settings['base'], $atts );

$css_class .= " style-$style";

$items = (array) vc_param_group_parse_atts( $items );
if ( count( $items ) < 1 ) {
	return;
}
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">

	<?php
	foreach ( $items as $item ) { ?>
		<div class="download-item">
			<?php if ( isset( $item['image'] ) ) : ?>
				<div class="image">
					<?php
					$image_url = wp_get_attachment_url( $item['image'] );
					?>
					<img src="<?php echo esc_url( $image_url ); ?>"
					     alt="<?php esc_attr_e( 'Download image', 'smilepure' ); ?>"/>
				</div>
			<?php endif; ?>

			<?php if ( isset( $item['heading'] ) ) { ?>
				<h4 class="title">
					<?php
					if ( isset( $item['link'] ) && $item['link'] !== '' ) {
					$link = vc_build_link( $item['link'] );
					if ( isset( $link['url'] ) && $link['url'] !== '' ) { ?>
					<a class="link" href="<?php echo esc_url( $link['url'] ) ?>"
						<?php if ( $link['target'] !== '' ) { ?>
							target="<?php echo esc_attr( $link['target'] ); ?>"
						<?php } ?>
					>
						<?php } ?>
						<?php } ?>
						<?php echo esc_html( $item['heading'] ); ?>

						<?php if ( isset( $item['link'] ) ) {
						if ( isset( $link['url'] ) && $link['url'] !== '' ) { ?>
					</a>
				<?php } ?>
				<?php } ?>
				</h4>
			<?php } ?>

			<?php if ( isset( $item['size'] ) ) { ?>
				<div class="size">
					<?php echo esc_html( $item['size'] ); ?>
				</div>
			<?php } ?>
		</div>
	<?php } ?>

</div>
