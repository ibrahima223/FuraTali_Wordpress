<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$style = $el_class = $items = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-gradation-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$items = (array) vc_param_group_parse_atts( $items );
if ( count( $items ) < 1 ) {
	return;
}

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-gradation ' . $el_class, $this->settings['base'], $atts );
$css_class .= " tm-gradation--$list_style";
$css_class .= ' tm-animation-queue';
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
     data-animation-delay="400"
>
	<?php
	$count = 0;
	foreach ( $items as $item ) {
		$_item_classes = 'item';
		$count ++;
		?>
		<div class="<?php echo esc_attr( $_item_classes ); ?>">

			<?php if ( $list_style == 'with_image' ) : ?>
				<?php
				if ( isset( $item['image'] ) && ($item['image'] !== '') ) {
					$image_class = 'has-image';
				} else {
					$image_class = '';
				}
				?>
				<div class="image-wrap <?php echo esc_attr( $image_class ); ?>">
					<div class="count heading-font"><span
							class="number"><?php echo str_pad( $count, 2, '0', STR_PAD_LEFT ); ?></span></div>
					<?php if ( isset( $item['image'] ) ) {
						$image_url = wp_get_attachment_url( $item['image'] );

						$image_url = Smilepure_Helper::aq_resize( array(
							'url'    => $image_url,
							'width'  => 200,
							'height' => 200,
							'crop'   => true,
						) );
						?>
						<img src="<?php echo esc_url( $image_url ); ?>"
						     alt="<?php esc_attr_e( 'Gradation Image', 'smilepure' ); ?>"/>
					<?php } ?>
				</div>
			<?php endif; ?>

			<?php if ( $list_style !== 'with_image' ) : ?>
				<div class="count-wrap">
					<?php if ( $list_style == 'no_number' ) : ?>
						<div class="dot"></div>
					<?php endif; ?>

					<?php if ( $list_style == 'basic' ) : ?>
						<div class="count heading-font">
							<span class="number"><?php echo str_pad( $count, 2, '0', STR_PAD_LEFT ); ?></span>
							<div class="wave"></div>
						</div>
						<div class="line"></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="content-wrap">
				<?php if ( isset( $item['title'] ) ) : ?>
					<h5 class="title"><?php echo esc_html( $item['title'] ); ?></h5>
				<?php endif; ?>

				<?php if ( isset( $item['text'] ) ) : ?>
					<div class="text"><?php echo esc_html( $item['text'] ); ?></div>
				<?php endif; ?>
			</div>
		</div>
	<?php } ?>
</div>
