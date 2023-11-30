<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$el_class = $style = $heading = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-doctor-search-form ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
	<?php if ( $style === '01' ) : ?>
		<?php if ( $heading ) : ?>
			<h4 class="heading">
				<?php echo esc_html( $heading ); ?>
			</h4>
		<?php endif; ?>
	<?php endif; ?>

	<div class="search-form">
		<?php if ( $style === '02' ) : ?>
			<?php if ( $heading ) : ?>
				<h4 class="heading">
					<?php echo esc_html( $heading ); ?>
				</h4>
			<?php endif; ?>
		<?php endif; ?>
		<form action="<?php echo get_post_type_archive_link( 'ic_doctor' ); ?>" method="GET">
			<div class="field">
				<div class="inner">
					<div class="label">
						<?php echo esc_html( 'Select your location', 'smilepure' ) ?>
					</div>
					<?php
					wp_dropdown_categories(
						array(
							'show_option_none' => esc_html__( 'Choose a location', 'smilepure' ),
							'taxonomy'         => 'ic_doctor_location',
							'name'             => 'lc',
							'selected'         => ( isset( $_GET['lc'] ) ? $_GET['lc'] : 0 ),
						)
					);
					?>
				</div>
			</div>

			<div class="field">
				<div class="inner">
					<div class="label">
						<?php echo esc_html( 'Select your service', 'smilepure' ) ?>
					</div>
					<?php
					wp_dropdown_categories(
						array(
							'show_option_none' => esc_html__( 'Choose a service', 'smilepure' ),
							'taxonomy'         => 'ic_doctor_service',
							'name'             => 'sv',
							'selected'         => ( isset( $_GET['sv'] ) ? $_GET['sv'] : 0 ),
						)
					);
					?>
				</div>
			</div>

			<?php
			if ( $button_text !== '' ) {
				$text = $button_text;
			} else {
				$text = 'Get care now';
			}
			?>
			<button type="submit"><?php echo esc_html( $text ); ?></button>
		</form>
	</div>
</div>
