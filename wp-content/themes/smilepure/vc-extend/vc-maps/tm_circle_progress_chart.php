<?php

class WPBakeryShortCode_TM_Circle_Progress_Chart extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;

		if ( isset( $atts['number_font_size'] ) ) {
			Smilepure_VC::get_responsive_css( array(
				'element' => "$selector .chart-number",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['number_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		$icon_tmp      = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );
		$title_tmp     = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['title_color'], $atts['custom_title_color'] );
		$sub_title_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['sub_title_color'], $atts['custom_sub_title_color'] );

		if ( $icon_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .chart-icon { $icon_tmp }";
		}

		if ( $title_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .title { $title_tmp }";
		}

		if ( $sub_title_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .subtitle { $sub_title_tmp }";
		}
	}
}

$content_group = esc_html__( 'Content', 'smilepure' );
$style_group   = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Circle Progress Chart', 'smilepure' ),
	'base'                      => 'tm_circle_progress_chart',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-pie-chart',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'smilepure' ) => '01',
				esc_html__( 'Style 02', 'smilepure' ) => '02',
			),
			'std'         => '01',
		),
		array(
			'heading'     => esc_html__( 'Number', 'smilepure' ),
			'description' => esc_html__( 'Controls the number you would like to display in pie chart.', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'number',
			'min'         => 1,
			'max'         => 100,
			'std'         => 75,
		),
		array(
			'heading'     => esc_html__( 'Circle Size', 'smilepure' ),
			'description' => esc_html__( 'Controls the size of the pie chart circle. Default: 220', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'size',
			'suffix'      => 'px',
			'std'         => 220,
		),
		array(
			'heading'     => esc_html__( 'Measuring unit', 'smilepure' ),
			'description' => esc_html__( 'Controls the unit of chart.', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'unit',
			'std'         => '%',
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'      => $content_group,
			'heading'    => esc_html__( 'Title', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'title',
		),
		array(
			'group'      => $content_group,
			'heading'    => esc_html__( 'Subtitle', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'subtitle',
		),
	), Smilepure_VC::icon_libraries( array( 'allow_none' => true, ) ), array(
		array(
			'group'      => $style_group,
			'heading'    => esc_html__( 'Line Cap', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'line_cap',
			'value'      => array(
				esc_html__( 'Butt', 'smilepure' )   => 'butt',
				esc_html__( 'Round', 'smilepure' )  => 'round',
				esc_html__( 'Square', 'smilepure' ) => 'square',
			),
			'std'        => 'square',
		),
		array(
			'group'       => $style_group,
			'heading'     => esc_html__( 'Line Width', 'smilepure' ),
			'description' => esc_html__( 'Controls the line width of chart.', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'line_width',
			'suffix'      => 'px',
			'min'         => 1,
			'max'         => 50,
			'std'         => 6,
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Bar Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'bar_color',
			'value'            => array(
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => 'primary',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Bar Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_bar_color',
			'dependency'       => array( 'element' => 'bar_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Track Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'track_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Track Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_track_color',
			'dependency'       => array( 'element' => 'track_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Icon Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'icon_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Icon Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_icon_color',
			'dependency'       => array( 'element' => 'icon_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Title Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'title_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Title Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_title_color',
			'dependency'       => array( 'element' => 'title_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Sub Title Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'sub_title_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Sub Title Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_sub_title_color',
			'dependency'       => array( 'element' => 'sub_title_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'       => $style_group,
			'heading'     => esc_html__( 'Number Font Size', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'number_font_size',
			'min'         => 8,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
	) ),
) );
