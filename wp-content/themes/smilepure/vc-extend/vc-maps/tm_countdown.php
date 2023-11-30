<?php

class WPBakeryShortCode_TM_CountDown extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		$skin = '';
		extract( $atts );

		if ( $skin === 'custom' ) {
			$number_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['number_color'], $atts['custom_number_color'] );
			$text_tmp   = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );

			if ( $number_tmp !== '' ) {
				$Smilepure_shortcode_lg_css .= "$selector .number { $number_tmp }";
			}

			if ( $text_tmp !== '' ) {
				$Smilepure_shortcode_lg_css .= "$selector .text { $text_tmp }";
			}
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Countdown', 'smilepure' ),
	'base'                      => 'tm_countdown',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-countdownclock',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'smilepure' ) => '1',
				esc_html__( '02', 'smilepure' ) => '2',
			),
			'std'         => '1',
		),
		array(
			'heading'     => esc_html__( 'Skin', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'skin',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Custom', 'smilepure' ) => 'custom',
				esc_html__( 'Dark', 'smilepure' )   => 'dark',
				esc_html__( 'Light', 'smilepure' )  => 'light',
			),
			'std'         => 'dark',
		),
		array(
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Number Color', 'smilepure' ),
			'param_name'       => 'number_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => 'secondary',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'skin',
				'value'   => array( 'custom' ),
			),
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Number Color', 'smilepure' ),
			'param_name'       => 'custom_number_color',
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'       => array(
				'element' => 'number_color',
				'value'   => array( 'custom' ),
			),
		),
		array(
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text Color', 'smilepure' ),
			'param_name'       => 'text_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => 'custom',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'skin',
				'value'   => array( 'custom' ),
			),
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Text Color', 'smilepure' ),
			'param_name'       => 'custom_text_color',
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'       => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#ababab',
		),
		array(
			'heading'     => esc_html__( 'Date Time', 'smilepure' ),
			'description' => esc_html__( 'Date and time format (yyyy/mm/dd hh:mm).', 'smilepure' ),
			'type'        => 'datetimepicker',
			'param_name'  => 'datetime',
			'value'       => '',
			'admin_label' => true,
			'settings'    => array(
				'minDate' => 0,
			),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( '"Days" text', 'smilepure' ),
			'param_name' => 'days',
			'value'      => esc_attr( 'Days', 'smilepure' ),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( '"Hours" text', 'smilepure' ),
			'param_name' => 'hours',
			'value'      => 'Hours',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( '"Minutes" text', 'smilepure' ),
			'param_name' => 'minutes',
			'value'      => esc_attr( 'Minutes', 'smilepure' ),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( '"Seconds" text', 'smilepure' ),
			'param_name' => 'seconds',
			'value'      => esc_attr( 'Seconds', 'smilepure' ),
		),
		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );

