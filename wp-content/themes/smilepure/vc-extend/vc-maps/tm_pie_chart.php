<?php

class WPBakeryShortCode_TM_Pie_Chart extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$legend_tab = esc_html__( 'Tooltips and Legends', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Pie Chart', 'smilepure' ),
	'base'                      => 'tm_pie_chart',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-pie-chart',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Cutting percentage', 'smilepure' ),
			'description' => esc_html__( 'amount of the inner surface to be cut off (0 for pie and 80 for example for a doughnut)', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'cutout',
			'std'         => 0,
			'min'         => 0,
			'max'         => 95,
			'step'        => 1,
			'suffix'      => '%',
		),
		array(
			'heading'     => esc_html__( 'Border Width', 'smilepure' ),
			'description' => esc_html__( 'Border width of the arcs in the dataset', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'border_width',
			'std'         => 0,
			'min'         => 0,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'heading'    => esc_html__( 'Data', 'smilepure' ),
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
					'heading'    => esc_html__( 'Value', 'smilepure' ),
					'type'       => 'textfield',
					'param_name' => 'value',
				),
				array(
					'heading'    => esc_html__( 'Color', 'smilepure' ),
					'type'       => 'colorpicker',
					'param_name' => 'color',
				),
			),
			'value'      => rawurlencode( wp_json_encode( array(
				array(
					'title' => esc_html__( 'Item 01', 'smilepure' ),
					'value' => '25',
					'color' => '#75dfaa',
				),
				array(
					'title' => esc_html__( 'Item 02', 'smilepure' ),
					'value' => '45',
					'color' => '#6b6cfe',
				),
				array(
					'title' => esc_html__( 'Item 03', 'smilepure' ),
					'value' => '30',
					'color' => '#71aefe',
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
