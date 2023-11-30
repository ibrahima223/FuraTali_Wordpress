<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$el_class = $this->getExtraClass( $el_class );
$el_class .= Smilepure_Helper::get_animation_classes( $animation ) . ' tm-office-info';
$link     = vc_build_link( $link );
?>
<div class="<?php echo esc_attr( trim( $el_class ) ); ?>">
	<?php if ( $image ) : ?>
		<div class="image">
			<?php
			$full_image_size = wp_get_attachment_url( $image );
			Smilepure_Helper::get_lazy_load_image( array(
				'url'    => $full_image_size,
				'width'  => 500,
				'height' => 287,
				'crop'   => true,
				'echo'   => true,
			) );
			?>
		</div>
	<?php endif; ?>
	<?php
	if ( $title != '' ) {
		echo '<h3 class="title">' . esc_html( $title ) . '</h3>';
	}
	?>
	<div class="info">
		<?php
		if ( $address != '' ) {
			echo '<div class="address">' . esc_html( $address ) . '</div>';
		}
		if ( $email != '' ) {
			echo '<div class="email">' . esc_html( $email ) . '</div>';
		}
		if ( $phone != '' ) {
			echo '<div class="phone">' . esc_html( $phone ) . '</div>';
		}
		?>
	</div>
	<?php if ( ( $link['title'] != '' ) && ( $link['url'] != '' ) ) { ?>
		<div class="link">
			<a class="tm-button style-border-text tm-button-secondary" href="<?php echo esc_url( $link['url'] ); ?>"
			   target="<?php echo esc_attr( $link['target'] ); ?>" rel="<?php esc_attr( $link['rel'] ); ?>">
				<span class="button-text"><?php echo esc_html( $link['title'] ); ?></span>
			</a>
		</div>
	<?php } ?>
</div>
