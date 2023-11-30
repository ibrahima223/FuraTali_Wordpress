<?php

class WPBakeryShortCode_TM_Icon extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		global $Smilepure_shortcode_md_css;
		global $Smilepure_shortcode_sm_css;
		global $Smilepure_shortcode_xs_css;

		$wrapper_tmp = $tmp = '';

		if ( $atts['align'] !== '' ) {
			$wrapper_tmp .= "text-align: {$atts['align']};";
		}

		if ( $atts['md_align'] !== '' ) {
			$Smilepure_shortcode_md_css .= "$selector { text-align: {$atts['md_align']} }";
		}

		if ( $atts['sm_align'] !== '' ) {
			$Smilepure_shortcode_sm_css .= "$selector { text-align: {$atts['sm_align']} }";
		}

		if ( $atts['xs_align'] !== '' ) {
			$Smilepure_shortcode_xs_css .= "$selector { text-align: {$atts['xs_align']} }";
		}

		$tmp .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );

		if ( $wrapper_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector  { $wrapper_tmp }";
		}

		if ( $tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .icon { $tmp }";
		}

		if ( isset( $atts['font_size'] ) ) {
			Smilepure_VC::get_responsive_css( array(
				'element' => "$selector .icon",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$params = array_merge( Smilepure_VC::icon_libraries( array(
	'allow_none' => true,
	'group'      => '',
) ), Smilepure_VC::get_alignment_fields(), array(
	array(
		'heading'     => esc_html__( 'Style', 'smilepure' ),
		'type'        => 'dropdown',
		'param_name'  => 'style',
		'value'       => array(
			esc_html__( 'Circle Icon', 'smilepure' ) => '01',
			esc_html__( 'Normal', 'smilepure' )      => '02',
		),
		'admin_label' => true,
		'std'         => '02',
	),
	array(
		'heading'     => esc_html__( 'Font Size', 'smilepure' ),
		'type'        => 'number_responsive',
		'param_name'  => 'font_size',
		'min'         => 8,
		'suffix'      => 'px',
		'media_query' => array(
			'lg' => '',
			'md' => '',
			'sm' => '',
			'xs' => '',
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Icon Color', 'smilepure' ),
		'type'       => 'dropdown',
		'param_name' => 'icon_color',
		'value'      => array(
			esc_html__( 'Default Color', 'smilepure' )   => '',
			esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
			esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
			esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
		),
		'std'        => '',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Custom Icon Color', 'smilepure' ),
		'type'       => 'colorpicker',
		'param_name' => 'custom_icon_color',
		'dependency' => array(
			'element' => 'icon_color',
			'value'   => 'custom',
		),
		'std'        => '#fff',
	),
	Smilepure_VC::get_animation_field(),
	Smilepure_VC::extra_class_field(),
), Smilepure_VC::get_vc_spacing_tab() );

vc_map( array(
	'name'                      => esc_html__( 'Icon', 'smilepure' ),
	'base'                      => 'tm_icon',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-icons',
	'allowed_container_element' => 'vc_row',
	'params'                    => $params,
) );
