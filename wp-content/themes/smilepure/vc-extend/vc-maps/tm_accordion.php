<?php

class WPBakeryShortCode_TM_Accordion extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Accordion', 'smilepure' ),
	'base'                      => 'tm_accordion',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-accordion',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'smilepure' ) => '1',
				esc_html__( 'Style 02', 'smilepure' ) => '2',
				esc_html__( 'Style 03', 'smilepure' ) => '3',
				esc_html__( 'Style 04', 'smilepure' ) => '4',
			),
			'std'         => '1',
		),
		array(
			'heading'     => esc_html__( 'Color style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'color_style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Dark', 'smilepure' )  => 'dark',
				esc_html__( 'Light', 'smilepure' ) => 'light',
			),
			'std'         => 'dark',
		),
		array(
			'heading'    => esc_html__( 'Multi Open', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'multi_open',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
		),
		array(
			'heading'    => esc_html__( 'Item Open Default', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'item_open',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
		),
		array(
			'heading'    => esc_html__( 'Auto number', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'auto_number_style',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Items', 'smilepure' ),
			'heading'    => esc_html__( 'Items', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Title', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Content', 'smilepure' ),
					'type'       => 'textarea',
					'param_name' => 'content',
				),
			),
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
