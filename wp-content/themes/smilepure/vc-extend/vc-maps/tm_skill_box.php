<?php

class WPBakeryShortCode_TM_Skill_Box extends WPBakeryShortCode {
	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Skill Box', 'smilepure' ),
	'base'     => 'tm_skill_box',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-info-boxes',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Title', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'title',
			'admin_label' => true,
			'std'         => '',
		),
		Smilepure_VC::get_animation_field(),
		Smilepure_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Items', 'smilepure' ),
			'heading'    => esc_html__( 'Items', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Text', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'text',
					'admin_label' => true,
				),
			),
		),
	), Smilepure_VC::icon_libraries( array( 'allow_none' => true ) ), Smilepure_VC::get_vc_spacing_tab() ),
) );

