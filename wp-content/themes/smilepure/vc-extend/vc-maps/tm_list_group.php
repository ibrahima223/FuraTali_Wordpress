<?php

class WPBakeryShortCode_TM_List_Group extends WPBakeryShortCodesContainer {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'            => esc_html__( 'List Group', 'smilepure' ),
	'base'            => 'tm_list_group',
	'category'        => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'            => 'insight-i insight-i-list',
	'as_parent'       => array( 'only' => array( 'tm_box_icon', 'tm_card' ) ),
	'content_element' => true,
	'is_container'    => true,
	'js_view'         => 'VcColumnView',
	'params'          => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'smilepure' ) => '01',
			),
			'std'         => '01',
		),
		Smilepure_VC::get_animation_field( array(
			'std' => 'move-up',
		) ),
		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
