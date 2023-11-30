<?php
defined( 'ABSPATH' ) || exit;

$style    = '01';
$el_class = $items = $animation = '';
$currency = $period = $heading = $feature_labels = '';
$atts     = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-pricing-table ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$css_class .= Smilepure_Helper::get_animation_classes( $animation );

$css_id = uniqid( 'tm-pricing-table-' );
$this->get_inline_css( '#' . $css_id, $atts );

$items = (array) vc_param_group_parse_atts( $items );
?>

<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<div class="inner">
		<table>
			<tr>
				<th>
					<div class="pricing-header">
						<div class="heading"><?php echo wp_kses( $heading, 'smilepure-default' ); ?></div>
					</div>
				</th>

				<?php

				foreach ( $items as $item ) {
					?>

					<?php
					$col_class = '';

					if(isset($item['featured']) && $item['featured'] === '1') {
						$col_class = 'col-featured';
					}
					?>
					<th class="<?php echo esc_attr($col_class); ?>">
						<div class="pricing-header">
							<div class="title">
								<?php echo esc_html( $item['title'] ); ?>
							</div>
						</div>
					</th>

					<?php
				}
				?>
			</tr>
			<tbody>
			<tr>
				<td>
					<ul class="pricing-feature-labels">
						<?php
						$features_labels = str_replace( '<br />', '', $features_labels );
						$_lables         = explode( "\n", $features_labels );

						foreach ( $_lables as $_label ):
							?>
							<li><?php echo esc_html( $_label ); ?></li>
						<?php endforeach; ?>
					</ul>
				</td>
				<?php
				foreach ( $items as $item ) {
					?>
					<?php
					$col_class = '';

					if(isset($item['featured']) && $item['featured'] === '1') {
						$col_class = 'col-featured';
					} ?>
					<td class="<?php echo esc_attr($col_class); ?>">
						<?php
						if ( $item['features'] !== '' ) {
							$_features = explode( "\n", $item['features'] );
							?>
							<ul>
								<?php
								foreach ( $_features as $_feature ) {
									?>
									<li>
										<?php if ( $_feature === '[check]' ) { ?>
											<?php echo '<span class="item-checked fa fa-check"></span>'; ?>
										<?php } elseif ( $_feature === '' ) { ?>
											<?php echo '&nbsp;'; ?>
										<?php } else { ?>
											<?php echo esc_html( $_feature ); ?>
										<?php } ?>
									</li>
									<?php
								}
								?>
							</ul>
						<?php } ?>
					</td>
					<?php
				}
				?>
			</tr>
			</tbody>
		</table>

	</div>
</div>
