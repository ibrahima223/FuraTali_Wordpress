<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$style = $align = $text_position = $el_class = $video = $video_text = $poster = $image_size = $image_size_width = $image_size_height = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-popup-video-' );
$this->get_inline_css( "#$css_id", $atts );
Smilepure_VC::get_shortcode_custom_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-popup-video ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";
$css_class .= " align-$align";
$css_class .= " text-position-$text_position";

$css_class .= Smilepure_Helper::get_animation_classes();
?>
<?php if ( $video !== '' ) : ?>
	<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">

		<?php
		set_query_var( 'Smilepure_shortcode_atts', $atts );

		get_template_part( 'loop/shortcodes/popup-video/style', $style );
		?>

	</div>
<?php endif;
