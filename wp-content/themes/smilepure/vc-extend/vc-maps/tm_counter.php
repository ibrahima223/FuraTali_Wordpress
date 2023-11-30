<?php

class WPBakeryShortCode_TM_Counter extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		$align = 'center';

		extract( $atts );

		$tmp = "text-align: {$align}";

		$number_tmp     = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['number_color'], $atts['custom_number_color'] );
		$text_tmp       = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );
		$sub_text_tmp   = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['sub_text_color'], $atts['custom_sub_text_color'] );
		$icon_tmp       = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );
		$background_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['background_color'], $atts['custom_background_color'] );

		if ( $number_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .number-wrap { $number_tmp }";
		}

		if ( $text_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .text { $text_tmp }";
		}

		if ( $sub_text_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .sub-text { $sub_text_tmp }";
		}

		if ( $icon_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .icon { $icon_tmp }";
		}

		if ( $background_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .counter-wrap { $background_tmp }";
		}

		$Smilepure_shortcode_lg_css .= "$selector { $tmp }";

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$style_group = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Counter', 'smilepure' ),
	'base'                      => 'tm_counter',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-counter',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'smilepure' ) => '01',
				esc_html__( '02', 'smilepure' ) => '02',
				esc_html__( '03', 'smilepure' ) => '03',
			),
			'std'         => '01',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Counter Animation', 'smilepure' ),
			'param_name' => 'animation',
			'value'      => array(
				esc_html__( 'Counter Up', 'smilepure' ) => 'counter-up',
				esc_html__( 'Odometer', 'smilepure' )   => 'odometer',
			),
			'std'        => 'counter-up',
		),
		array(
			'heading'    => esc_html__( 'Text Align', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'align',
			'value'      => array(
				esc_html__( 'Left', 'smilepure' )   => 'left',
				esc_html__( 'Center', 'smilepure' ) => 'center',
				esc_html__( 'Right', 'smilepure' )  => 'right',
			),
			'std'        => 'center',
		),
		array(
			'group'      => esc_html__( 'Data', 'smilepure' ),
			'heading'    => esc_html__( 'Image', 'smilepure' ),
			'type'       => 'attach_image',
			'param_name' => 'image',
		),
		array(
			'group'       => esc_html__( 'Data', 'smilepure' ),
			'heading'     => esc_html__( 'Number', 'smilepure' ),
			'type'        => 'number',
			'admin_label' => true,
			'param_name'  => 'number',
		),
		array(
			'group'       => esc_html__( 'Data', 'smilepure' ),
			'heading'     => esc_html__( 'Number Prefix', 'smilepure' ),
			'description' => esc_html__( 'Prefix your number with a symbol or text.', 'smilepure' ),
			'type'        => 'textfield',
			'admin_label' => true,
			'param_name'  => 'number_prefix',
		),
		array(
			'group'       => esc_html__( 'Data', 'smilepure' ),
			'heading'     => esc_html__( 'Number Suffix', 'smilepure' ),
			'description' => esc_html__( 'Suffix your number with a symbol or text.', 'smilepure' ),
			'type'        => 'textfield',
			'admin_label' => true,
			'param_name'  => 'number_suffix',
		),
		array(
			'group'       => esc_html__( 'Data', 'smilepure' ),
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Text', 'smilepure' ),
			'admin_label' => true,
			'param_name'  => 'text',
		),
		array(
			'group'       => esc_html__( 'Data', 'smilepure' ),
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Sub text', 'smilepure' ),
			'admin_label' => true,
			'param_name'  => 'sub_text',
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'            => $style_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Number Color', 'smilepure' ),
			'param_name'       => 'number_color',
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
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Number Color', 'smilepure' ),
			'param_name'       => 'custom_number_color',
			'dependency'       => array(
				'element' => 'number_color',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text Color', 'smilepure' ),
			'param_name'       => 'text_color',
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
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Text Color', 'smilepure' ),
			'param_name'       => 'custom_text_color',
			'dependency'       => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Sub Text Color', 'smilepure' ),
			'param_name'       => 'sub_text_color',
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
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Sub Text Color', 'smilepure' ),
			'param_name'       => 'custom_sub_text_color',
			'dependency'       => array(
				'element' => 'sub_text_color',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Icon Color', 'smilepure' ),
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
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Icon Color', 'smilepure' ),
			'param_name'       => 'custom_icon_color',
			'dependency'       => array(
				'element' => 'icon_color',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Background Color', 'smilepure' ),
			'param_name'       => 'background_color',
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
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Background Color', 'smilepure' ),
			'param_name'       => 'custom_background_color',
			'dependency'       => array(
				'element' => 'background_color',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
	), Smilepure_VC::icon_libraries( array( 'allow_none' => true ) ), Smilepure_VC::get_vc_spacing_tab() ),
) );
