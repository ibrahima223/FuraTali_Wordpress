<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$list_style = $align = $_global_icon = $_global_icon_class = $marker_color = $custom_marker_color = $title_color = $custom_title_color = $desc_color = $custom_desc_color = $animation = '';
$atts       = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );
$css_id = uniqid( 'tm-list-' );
$this->get_inline_css( '#' . $css_id, $atts );
$items = (array) vc_param_group_parse_atts( $items );

if ( count( $items ) < 1 ) {
	return;
}
$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-list ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$list_style";
$css_class .= " align-$align";

// Global icon class.
if ( isset( $icon_type ) && isset( ${"icon_" . $icon_type} ) ) {
	$_global_icon_class .= esc_attr( ${"icon_" . $icon_type} );
}

$css_class .= Smilepure_Helper::get_animation_classes( $animation );
?>

<?php if ( $widget_title !== '' ) : ?>
<div class="widget">
	<h2 class="widgettitle"><?php echo esc_html( $widget_title ); ?></h2>
	<?php endif; ?>

	<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
		<?php
		$auto_number = 0;
		foreach ( $items as $item ) {
			$output = '';

			$_icon      = '';
			$icon_class = '';

			if ( isset( $item['icon'] ) && $item['icon'] !== '' ) {
				$icon_class .= $item['icon'];
			}

			?>
			<div class="list-item">

				<div class="list-header">
					<div class="marker">

						<?php
						if ( in_array( $list_style, array(
							'icon',
							'icon-02',
							'icon-03',
							'modern-icon',
							'modern-icon-02',
							'modern-icon-03',
							'inline',
						) ) ) { // Icon.
							$list_icon_class = 'tm-list__icon';

							$icon_class = '';
							if ( isset( $item['icon_type'] ) && isset( $item["icon_{$item['icon_type']}"] ) ) {
								$icon_class .= esc_attr( $item["icon_{$item['icon_type']}"] );
							}

							if ( $icon_class !== '' ) {
								$icon_class .= ' link-icon';
								$_icon = '<i class="' . $icon_class . '"></i>';
							}

							if ( $icon_class && $icon_class !== '' ) {
								$list_icon_class .= " $icon_class";
							} else {
								$list_icon_class .= " $_global_icon_class";
							}
							?>
							<i class="<?php echo esc_attr( $list_icon_class ); ?>"></i>
						<?php } elseif ( $list_style === 'auto-numbered' ) { // Numbered.
							$auto_number ++;
							$_number = str_pad( $auto_number, 2, '0', STR_PAD_LEFT );
							echo '<span class="number heading-font">' . esc_html( "{$_number}" ) . '</span>';
						} elseif ( $list_style === 'manual-numbered' && isset( $item['item_number'] ) ) { // Manual Number.
							echo '<span class="number heading-font">' . esc_html( "{$item['item_number']}" ) . '</span>';
						}
						?>

					</div>

					<div class="title-wrap">
						<?php if ( isset( $item['item_title'] ) ) { ?>
							<h6 class="title">
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
									<?php echo esc_html( $item['item_title'] ); ?>

									<?php if ( isset( $item['item_sub_title'] ) && $item['item_sub_title'] !== '' ) : ?>
										<span
											class="sub-title"><?php echo esc_html( $item['item_sub_title'] ); ?></span>
									<?php endif; ?>

									<?php if ( isset( $item['link'] ) ) {
									if ( isset( $link['url'] ) && $link['url'] !== '' ) { ?>
								</a>
							<?php } ?>
							<?php } ?>
							</h6>
						<?php } ?>

						<?php if ( isset( $item['item_desc'] ) ) { ?>
							<div class="desc">
								<?php echo esc_html( $item['item_desc'] ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php if ( $widget_title !== '' ) : ?>
</div>
<?php endif; ?>
