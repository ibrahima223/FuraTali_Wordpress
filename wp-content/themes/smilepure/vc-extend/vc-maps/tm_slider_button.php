<?php

class WPBakeryShortCode_TM_Slider_Button extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		global $Smilepure_shortcode_md_css;
		global $Smilepure_shortcode_sm_css;
		global $Smilepure_shortcode_xs_css;

		$wrapper_tmp = '';

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

		if ( $wrapper_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector { $wrapper_tmp }";
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Slider Button', 'smilepure' ),
	'base'                      => 'tm_slider_button',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-carousel',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( '01 - Square 1', 'smilepure' ) => '01',
				esc_html__( '02 - Square 2', 'smilepure' ) => '02',
				esc_html__( '03 - Circle', 'smilepure' )   => '03',
				esc_html__( '04 - Arrow', 'smilepure' )    => '04',
			),
			'admin_label' => true,
			'std'         => '01',
		),
		Smilepure_VC::extra_id_field(),
	), Smilepure_VC::get_alignment_fields(), Smilepure_VC::get_vc_spacing_tab() ),
) );
