<?php

class WPBakeryShortCode_TM_Team_Member extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Team Member', 'smilepure' ),
	'base'                      => 'tm_team_member',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'allowed_container_element' => 'vc_row',
	'icon'                      => 'insight-i insight-i-member',
	'params'                    => array_merge( array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '1', 'smilepure' ) => '1',
				esc_html__( '2', 'smilepure' ) => '2',
				esc_html__( '3', 'smilepure' ) => '3',
			),
			'std'         => '1',
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Photo of member', 'smilepure' ),
			'param_name'  => 'photo',
			'admin_label' => true,
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Photo Effect', 'smilepure' ),
			'param_name' => 'photo_effect',
			'value'      => array(
				esc_html__( 'None', 'smilepure' )      => '',
				esc_html__( 'Grayscale', 'smilepure' ) => 'grayscale',
			),
			'std'        => '',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Name', 'smilepure' ),
			'admin_label' => true,
			'param_name'  => 'name',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Position', 'smilepure' ),
			'param_name'  => 'position',
			'description' => esc_html__( 'Example: CEO/Founder', 'smilepure' ),
		),
		array(
			'type'       => 'textarea',
			'heading'    => esc_html__( 'Description', 'smilepure' ),
			'param_name' => 'desc',
		),
		array(
			'type'       => 'textarea_html',
			'heading'    => esc_html__( 'Sub Description', 'smilepure' ),
			'param_name' => 'content',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Profile url', 'smilepure' ),
			'param_name' => 'profile',
		),
		Smilepure_VC::get_animation_field(),
		Smilepure_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Social Networks', 'smilepure' ),
			'type'       => 'param_group',
			'heading'    => esc_html__( 'Social Networks', 'smilepure' ),
			'param_name' => 'social_networks',
			'params'     => array_merge( Smilepure_VC::icon_libraries_no_depend(), array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Link', 'smilepure' ),
					'param_name'  => 'link',
					'admin_label' => true,
				),
			) ),
			'value'      => rawurlencode( wp_json_encode( array(
				array(
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'fab fa-twitter',
				),
				array(
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'fab fa-facebook-f',
				),
				array(
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'fab fa-google-plus-g',
				),
				array(
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'fab fa-linkedin-in',
				),
			) ) ),
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
