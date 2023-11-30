<?php

class WPBakeryShortCode_TM_Bar_Chart extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$legend_tab = esc_html__( 'Tooltips and Legends', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Bar Chart', 'smilepure' ),
	'base'                      => 'tm_bar_chart',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-processbar',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'X axis labels', 'smilepure' ),
			'description' => esc_html__( 'List of labels for X axis (separate labels with ";").', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'labels',
			'std'         => 'Jul; Aug; Sep; Oct; Nov; Dec',
		),
		array(
			'heading'    => esc_html__( 'Direction type', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'type',
			'value'      => array(
				esc_html__( 'Vertical', 'smilepure' )   => 'bar',
				esc_html__( 'Horizontal', 'smilepure' ) => 'horizontalBar',
			),
			'std'        => 'bar',
		),
		array(
			'heading'     => esc_html__( 'Border Width', 'smilepure' ),
			'description' => esc_html__( 'Border width of the bars', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'border_width',
			'std'         => 0,
			'min'         => 0,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'heading'    => esc_html__( 'Datasets', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'datasets',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Title', 'smilepure' ),
					'description' => esc_html__( 'Dataset title used in tooltips and legends.', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'     => esc_html__( 'Values', 'smilepure' ),
					'description' => esc_html__( 'text format for the tooltip (available placeholders: {d} dataset title, {x} X axis label, {y} Y axis value)', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'values',
				),
				array(
					'heading'    => esc_html__( 'Dataset Color', 'smilepure' ),
					'type'       => 'colorpicker',
					'param_name' => 'color',
				),
				array(
					'heading'     => esc_html__( 'Fill Color', 'smilepure' ),
					'description' => esc_html__( 'Leave blank to use color from dataset.', 'smilepure' ),
					'type'        => 'colorpicker',
					'param_name'  => 'fill_color',
				),
				array(
					'heading'     => esc_html__( 'Border Color', 'smilepure' ),
					'description' => esc_html__( 'Leave blank to use color from dataset.', 'smilepure' ),
					'type'        => 'colorpicker',
					'param_name'  => 'border_color',
				),
			),
			'value'      => rawurlencode( wp_json_encode( array(
				array(
					'title'  => esc_html__( 'Item 01', 'smilepure' ),
					'values' => '15; 10; 22; 19; 23; 17',
					'color'  => '#ff8585',

				),
				array(
					'title'  => esc_html__( 'Item 02', 'smilepure' ),
					'values' => '34; 38; 35; 33; 37; 40',
					'color'  => '#467bff',
				),
			) ) ),
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'      => $legend_tab,
			'heading'    => esc_html__( 'Enable legends', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'legend',
			'value'      => array(
				esc_html__( 'Yes', 'smilepure' ) => '1',
			),
			'std'        => '1',
		),
		array(
			'group'      => $legend_tab,
			'heading'    => esc_html__( 'Legends Style', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'legend_style',
			'value'      => array(
				esc_html__( 'Normal', 'smilepure' )          => 'normal',
				esc_html__( 'Use Point Style', 'smilepure' ) => 'point',
			),
			'std'        => 'normal',
		),
		array(
			'group'      => $legend_tab,
			'heading'    => esc_html__( 'Legends Position', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'legend_position',
			'value'      => array(
				esc_html__( 'Top', 'smilepure' )    => 'top',
				esc_html__( 'Right', 'smilepure' )  => 'right',
				esc_html__( 'Bottom', 'smilepure' ) => 'bottom',
				esc_html__( 'Left', 'smilepure' )   => 'left',
			),
			'std'        => 'bottom',
		),
		array(
			'group'       => $legend_tab,
			'heading'     => esc_html__( 'Click on legends', 'smilepure' ),
			'description' => esc_html__( 'Hide dataset on click on legend', 'smilepure' ),
			'type'        => 'checkbox',
			'param_name'  => 'legend_onclick',
			'value'       => array(
				esc_html__( 'Yes', 'smilepure' ) => '1',
			),
			'std'         => '1',
		),
		array(
			'group'      => esc_html__( 'Chart Options', 'smilepure' ),
			'heading'    => esc_html__( 'Aspect Ratio', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'aspect_ratio',
			'value'      => array(
				'1:1'  => '1:1',
				'21:9' => '21:9',
				'16:9' => '16:9',
				'4:3'  => '4:3',
				'3:4'  => '3:4',
				'9:16' => '9:16',
				'9:21' => '9:21',
			),
			'std'        => '4:3',
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
