<?php

class WPBakeryShortCode_TM_Contact_Form_7 extends WPBakeryShortCode {

}

/**
 * Add Shortcode To Visual Composer
 */
$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

$contact_forms = array();
if ( $cf7 ) {
	foreach ( $cf7 as $cform ) {
		$contact_forms[ $cform->post_title ] = $cform->ID;
	}
} else {
	$contact_forms[ esc_html__( 'No contact forms found', 'smilepure' ) ] = 0;
}

vc_map( array(
	'name'                      => esc_html__( 'Contact Form 7', 'smilepure' ),
	'base'                      => 'tm_contact_form_7',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-contact-form-7',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Form', 'smilepure' ),
			'param_name'  => 'id',
			'value'       => $contact_forms,
			'save_always' => true,
			'admin_label' => true,
			'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'smilepure' ),
		),
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01 - Fill Grey, Button Primary', 'smilepure' )   => '01',
				esc_html__( '02 - Fill Grey, Button Secondary', 'smilepure' ) => '04',
				esc_html__( '03 - Fill White, Border', 'smilepure' )          => '02',
				esc_html__( '04 - Fill White, Shadow', 'smilepure' )          => '03',
				esc_html__( '05 - Fill White, Label white', 'smilepure' )     => '05',
			),
			'std'         => '01',
		),
		array(
			'heading'     => esc_html__( 'Form Box Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'wrap_style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'None', 'smilepure' ) => '',
				esc_html__( '01', 'smilepure' )   => '01',
				esc_html__( '02', 'smilepure' )   => '02',
			),
			'std'         => '',
		),
		array(
			'heading'     => esc_html__( 'Gutter', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'gutter',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Default 30px', 'smilepure' ) => '30',
				esc_html__( '20px', 'smilepure' )         => '20',
				esc_html__( '40px', 'smilepure' )         => '40',
			),
			'std'         => '30',
		),
		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_custom_style_tab() ),
) );
