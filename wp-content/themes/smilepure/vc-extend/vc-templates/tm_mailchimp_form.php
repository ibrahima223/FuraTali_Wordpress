<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$form_id  = '';
$el_class = $style = $title = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-mailchimp-form ' . $el_class, $this->settings['base'], $atts );

if ( $title !== '' ) {
	$css_class .= ' widget';
}

if ( $style !== '' ) {
	$css_class .= " style-$style";
}

if ( $form_id === '' && function_exists( 'mc4wp_get_forms' ) ) {
	$mc_forms = mc4wp_get_forms();
	if ( count( $mc_forms ) > 0 ) {
		$form_id = $mc_forms[0]->ID;
	}
}

$css_class .= Smilepure_Helper::get_animation_classes();
?>
<?php if ( function_exists( 'mc4wp_show_form' ) && $form_id !== '' ) : ?>
	<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
		<?php if ( $title !== '' ): ?>
			<div class="title"><?php echo esc_html( $title ); ?></div>
		<?php endif; ?>
		<div class="form">
			<?php mc4wp_show_form( $form_id ); ?>
		</div>
	</div>
<?php endif; ?>
