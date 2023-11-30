<?php

class WPBakeryShortCode_TM_Office_Info extends WPBakeryShortCode {
}

vc_map( array(
	'name'     => esc_html__( 'Office Info', 'smilepure' ),
	'base'     => 'tm_office_info',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-info-boxes',
	'params'   => array(
		array(
			'heading'     => esc_html__( 'Image', 'smilepure' ),
			'type'        => 'attach_image',
			'param_name'  => 'image',
			'admin_label' => true,
		),
		array(
			'heading'     => esc_html__( 'Title', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'heading'     => esc_html__( 'Address', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'address',
			'admin_label' => true,
		),
		array(
			'heading'     => esc_html__( 'Email', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'email',
			'admin_label' => true,
		),
		array(
			'heading'     => esc_html__( 'Phone', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'phone',
			'admin_label' => true,
		),
		array(
			'heading'    => esc_html__( 'Link', 'smilepure' ),
			'type'       => 'vc_link',
			'param_name' => 'link',
		),
		Smilepure_VC::extra_class_field(),
		Smilepure_VC::get_animation_field()
	)
) );

