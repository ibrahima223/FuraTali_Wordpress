<?php

class WPBakeryShortCode_TM_Gradation extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Gradation', 'smilepure' ),
	'base'                      => 'tm_gradation',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-list',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'list_style',
			'value'       => array(
				esc_html__( 'Basic', 'smilepure' )      => 'basic',
				esc_html__( 'No number', 'smilepure' )  => 'no_number',
				esc_html__( 'With image', 'smilepure' ) => 'with_image',
			),
			'admin_label' => true,
			'std'         => 'basic',
		),
		array(
			'group'      => esc_html__( 'Items', 'smilepure' ),
			'heading'    => esc_html__( 'Items', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Image', 'smilepure' ),
					'type'        => 'attach_image',
					'param_name'  => 'image',
					'admin_label' => true,
					'description' => esc_html__( 'Only display in With image style', 'smilepure' ),
				),
				array(
					'heading'     => esc_html__( 'Title', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Description', 'smilepure' ),
					'type'       => 'textarea',
					'param_name' => 'text',
				),
			),

		),

	), Smilepure_VC::get_vc_spacing_tab() ),
) );
