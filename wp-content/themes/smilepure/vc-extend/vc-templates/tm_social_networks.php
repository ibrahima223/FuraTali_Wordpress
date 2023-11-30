<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$el_class         = $style = $layout = $tooltip_enable = $tooltip_skin = $items = $target = '';
$tooltip_position = 'top';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-social-networks-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-social-networks ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style layout-$layout";

$css_class .= Smilepure_Helper::get_animation_classes();

$items = (array) vc_param_group_parse_atts( $items );

$link_class = 'link';

if ( $tooltip_enable === '1' ) {
	$link_class .= " hint--{$tooltip_position}";

	if ( $tooltip_skin !== '' ) {
		$link_class .= " hint--{$tooltip_skin}";
	}
}
?>
<?php if ( count( $items ) > 0 ) { ?>
	<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
		<?php if ( $title ) : ?>
			<h2 class="widgettitle">
				<?php echo esc_html( $title ); ?>
			</h2>
		<?php endif; ?>

		<ul class="list">
			<?php foreach ( $items as $item ) {
				$uid = uniqid( 'tm-social-networks-item-' );
				if ( isset( $item['item_custom_color'] ) && ( $item['item_custom_color'] === 'custom' ) ) {
					$item_style = '';
					if(isset( $item['item_custom_background_color'] )) {
						$item_style .= 'background-color: ' . $item['item_custom_background_color'] . ';';
					}
					if(isset( $item['item_custom_border_color'] )) {
						$item_style .= 'border-color: ' . $item['item_custom_border_color'] . ';';
					}
					Smilepure::apply_style( $item_style, '#' . $uid . ' a' );

					$item_style_hover ='';
					if(isset( $item['item_custom_background_hover_color'] )) {
						$item_style_hover .= 'background-color: ' . $item['item_custom_background_hover_color'] . ';';
					}
					if(isset( $item['item_custom_border_hover_color'] )) {
						$item_style_hover .= 'border-color: ' . $item['item_custom_border_hover_color'] . ';';
					}
					Smilepure::apply_style( $item_style_hover, '#' . $uid . ' a:hover' );

					$item_icon_style = '';
					if(isset( $item['item_custom_icon_color'] )) {
						$item_icon_style = 'color: ' . $item['item_custom_icon_color'] . ';';
					}
					Smilepure::apply_style( $item_icon_style, '#' . $uid . ' .link-icon' );

					$item_icon_style_hover = '';
					if(isset( $item['item_custom_icon_hover_color'] )) {
						$item_icon_style_hover = 'color: ' . $item['item_custom_icon_hover_color'] . ';';
					}
					Smilepure::apply_style( $item_icon_style_hover, '#' . $uid . ' a:hover .link-icon' );

					$item_text_style = '';
					if(isset( $item['item_custom_text_color'] )) {
						$item_text_style = 'color: ' . $item['item_custom_text_color'] . ';';
					}
					Smilepure::apply_style( $item_text_style, '#' . $uid . ' .link-text' );

					$item_text_style_hover = '';
					if(isset( $item['item_custom_text_hover_color'] )) {
						$item_text_style_hover = 'color: ' . $item['item_custom_text_hover_color'] . ';';
					}
					Smilepure::apply_style( $item_text_style_hover, '#' . $uid . ' a:hover .link-text' );
				}
				?>
				<li class="item" id="<?php echo esc_attr( $uid ); ?>">
					<?php
					$_icon = $link_content = '';

					$icon_class = '';
					if ( isset( $item['icon_type'] ) && isset( $item["icon_{$item['icon_type']}"] ) ) {
						$icon_class .= esc_attr( $item["icon_{$item['icon_type']}"] );
					}

					if ( $icon_class !== '' ) {
						$icon_class .= ' link-icon';
						$_icon      = '<i class="' . $icon_class . '"></i>';
					}

					if ( in_array( $style, array(
						'icons',
						'large-icons',
						'icon-title',
						'solid-square-icon',
						'solid-rounded-icon',
						'solid-rounded-icon-02',
						'solid-rounded-icon-03',
						'rounded-icon-title',
					) ) ) {
						$link_content .= $_icon;
					}

					if ( in_array( $style, array( 'title', 'icon-title', 'rounded-icon-title' ) ) ) {
						$link_content .= '<span class="link-text">' . $item['title'] . '</span>';
					}
					?>
					<a href="<?php echo esc_url( $item['link'] ); ?>"
						<?php if ( $target === '1' ): ?>
							target="_blank"
						<?php endif; ?>

						<?php if ( isset( $item['title'] ) ): ?>
							aria-label="<?php echo esc_attr( $item['title'] ); ?>"
						<?php endif; ?>

						<?php if ( $link_class !== '' ): ?>
							class="<?php echo esc_attr( $link_class ); ?>"
						<?php endif; ?>
					>
						<?php echo "{$link_content}"; ?>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
<?php }
