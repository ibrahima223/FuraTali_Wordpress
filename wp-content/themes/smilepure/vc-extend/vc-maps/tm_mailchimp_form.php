<?php

class WPBakeryShortCode_TM_Mailchimp_Form extends WPBakeryShortCode {

}

vc_map( array(
	'name'                      => esc_html__( 'Mailchimp Form', 'smilepure' ),
	'base'                      => 'tm_mailchimp_form',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-mailchimp-form',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'smilepure' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'smilepure' ),
		),
		array(
			'heading'     => esc_html__( 'Form ID', 'smilepure' ),
			'description' => esc_html__( 'Input the id of form. Leave blank to show default form.', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'form_id',
		),
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '1', 'smilepure' )  => '1',
				esc_html__( '2', 'smilepure' )  => '2',
				esc_html__( '3', 'smilepure' )  => '3',
				esc_html__( '4', 'smilepure' )  => '4',
				esc_html__( '5', 'smilepure' )  => '5',
			),
			'std'         => '1',
		),
		Smilepure_VC::extra_class_field(),
	),
) );
