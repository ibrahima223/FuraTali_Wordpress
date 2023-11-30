<?php

class WPBakeryShortCode_TM_Doctor_Search_Form extends WPBakeryShortCode {

}

vc_map( array(
	'name'                      => esc_html__( 'Doctor search form', 'smilepure' ),
	'base'                      => 'tm_doctor_search_form',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-contact-form-7',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Heading', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'heading',
			'admin_label' => true,
		),
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'smilepure' ) => '01',
				esc_html__( '02', 'smilepure' ) => '02',
			),
			'std'         => '01',
		),
		array(
			'heading'    => esc_html__( 'Button Text', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'button_text',
		),

		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_custom_style_tab() ),
) );
