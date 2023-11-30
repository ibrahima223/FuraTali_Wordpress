<?php

class WPBakeryShortCode_TM_Blockquote extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$content_tab = esc_html__( 'Content', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Blockquote', 'smilepure' ),
	'base'                      => 'tm_blockquote',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-blockquote',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'smilepure' ) => '1',
				esc_html__( 'Style 02', 'smilepure' ) => '2',
			),
			'std'         => '1',
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Heading', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'heading',
		),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Text', 'smilepure' ),
			'type'       => 'textarea',
			'param_name' => 'text',
		),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Photo', 'smilepure' ),
			'type'       => 'attach_image',
			'param_name' => 'photo',
		),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Position', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'position',
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
