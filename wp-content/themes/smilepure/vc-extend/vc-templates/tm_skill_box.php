<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$el_class = $icon_type = $icon_svg_animate_type = $title = $animation = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-skill-box-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$items = (array) vc_param_group_parse_atts( $items );
if ( count( $items ) <= 0 ) {
	return;
}

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-skill-box ' . $el_class, $this->settings['base'], $atts );
$css_class .= Smilepure_Helper::get_animation_classes( $animation );

?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">

	<?php if ( $title ) : ?>
		<h4 class="title">
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

			<div class="title-text">
				<?php echo esc_html( $title ); ?>
			</div>
		</h4>
	<?php endif; ?>

	<?php foreach ( $items as $item ) { ?>
		<?php if ( isset( $item['text'] ) ) { ?>
			<div class="text"><?php echo esc_html( $item['text'] ); ?></div>
		<?php } ?>
	<?php } ?>
</div>
