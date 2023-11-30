<?php

class WPBakeryShortCode_TM_Line_Chart extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$legend_tab = esc_html__( 'Tooltips and Legends', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Line Chart', 'smilepure' ),
	'base'                      => 'tm_line_chart',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-accordion',
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
					'heading'     => esc_html__( 'Area filling', 'smilepure' ),
					'description' => esc_html__( 'How to fill the area below the line', 'smilepure' ),
					'type'        => 'dropdown',
					'param_name'  => 'fill',
					'value'       => array(
						esc_html__( 'Custom', 'smilepure' ) => 'custom',
						esc_html__( 'None', 'smilepure' )   => 'none',
					),
					'std'         => 'none',
				),
				array(
					'heading'    => esc_html__( 'Fill Color', 'smilepure' ),
					'type'       => 'colorpicker',
					'param_name' => 'fill_color',
					'dependency' => array(
						'element' => 'fill',
						'value'   => array( 'custom' ),
					),
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'point_style',
					'heading'    => esc_html__( 'Point Style', 'smilepure' ),
					'value'      => array(
						esc_html__( 'none', 'smilepure' )              => 'none',
						esc_html__( 'circle', 'smilepure' )            => 'circle',
						esc_html__( 'triangle', 'smilepure' )          => 'triangle',
						esc_html__( 'rectangle', 'smilepure' )         => 'rect',
						esc_html__( 'rotated rectangle', 'smilepure' ) => 'rectRot',
						esc_html__( 'cross', 'smilepure' )             => 'cross',
						esc_html__( 'rotated cross', 'smilepure' )     => 'crossRot',
						esc_html__( 'star', 'smilepure' )              => 'star',
					),
					'std'        => 'circle',
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'line_type',
					'heading'    => esc_html__( 'Line type', 'smilepure' ),
					'value'      => array(
						esc_html__( 'normal', 'smilepure' )  => 'normal',
						esc_html__( 'stepped', 'smilepure' ) => 'step',
					),
					'std'        => 'normal',
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'line_style',
					'heading'    => esc_html__( 'Line style', 'smilepure' ),
					'value'      => array(
						esc_html__( 'solid', 'smilepure' )  => 'solid',
						esc_html__( 'dashed', 'smilepure' ) => 'dashed',
						esc_html__( 'dotted', 'smilepure' ) => 'dotted',
					),
					'std'        => 'solid',
				),
				array(
					'heading'     => esc_html__( 'Thickness', 'smilepure' ),
					'description' => esc_html__( 'line and points thickness', 'smilepure' ),
					'type'        => 'dropdown',
					'param_name'  => 'thickness',
					'value'       => array(
						esc_html__( 'thin', 'smilepure' )    => 'thin',
						esc_html__( 'normal', 'smilepure' )  => 'normal',
						esc_html__( 'thick', 'smilepure' )   => 'thick',
						esc_html__( 'thicker', 'smilepure' ) => 'thicker',
					),
					'std'         => 'normal',
				),
				array(
					'heading'     => esc_html__( 'Line tension', 'smilepure' ),
					'description' => esc_html__( 'tension of the line ( 100 for a straight line )', 'smilepure' ),
					'type'        => 'number',
					'param_name'  => 'line_tension',
					'std'         => 10,
					'min'         => 0,
					'max'         => 100,
					'step'        => 1,
				),
			),
			'value'      => rawurlencode( wp_json_encode( array(
				array(
					'title'        => esc_html__( 'Item 01', 'smilepure' ),
					'values'       => '15; 10; 22; 19; 23; 17',
					'color'        => 'rgba(105, 59, 255, 0.55)',
					'fill'         => 'none',
					'thickness'    => 'normal',
					'point_style'  => 'circle',
					'line_style'   => 'solid',
					'line_tension' => 10,

				),
				array(
					'title'        => esc_html__( 'Item 02', 'smilepure' ),
					'values'       => '34; 38; 35; 33; 37; 40',
					'color'        => 'rgba(0, 110, 253, 0.56)',
					'fill'         => 'none',
					'thickness'    => 'normal',
					'point_style'  => 'circle',
					'line_style'   => 'solid',
					'line_tension' => 10,
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
