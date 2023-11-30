<?php

class WPBakeryShortCode_TM_Pricing extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Pricing Box', 'smilepure' ),
	'base'                      => 'tm_pricing',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-pricing',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'smilepure' ) => '1',
				esc_html__( '02', 'smilepure' ) => '2',
				esc_html__( '03', 'smilepure' ) => '3',
			),
			'std'         => '1',
		),
		array(
			'heading'     => esc_html__( 'Featured', 'smilepure' ),
			'description' => esc_html__( 'Checked the box if you want make this item featured', 'smilepure' ),
			'type'        => 'checkbox',
			'param_name'  => 'featured',
			'value'       => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
		),
		array(
			'heading'    => esc_html__( 'Image', 'smilepure' ),
			'type'       => 'attach_image',
			'param_name' => 'image',
		),
		array(
			'heading'     => esc_html__( 'Title', 'smilepure' ),
			'type'        => 'textfield',
			'admin_label' => true,
			'param_name'  => 'title',
		),
		array(
			'heading'     => esc_html__( 'Description', 'smilepure' ),
			'description' => esc_html__( 'Controls the text that display under price', 'smilepure' ),
			'type'        => 'textarea',
			'param_name'  => 'desc',
		),
		array(
			'heading'          => esc_html__( 'Currency', 'smilepure' ),
			'type'             => 'textfield',
			'param_name'       => 'currency',
			'value'            => '$',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'heading'          => esc_html__( 'Price', 'smilepure' ),
			'type'             => 'textfield',
			'param_name'       => 'price',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'heading'          => esc_html__( 'Period', 'smilepure' ),
			'type'             => 'textfield',
			'param_name'       => 'period',
			'value'            => 'per hour',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'       => 'vc_link',
			'heading'    => esc_html__( 'Button', 'smilepure' ),
			'param_name' => 'button',
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
					'heading'    => esc_html__( 'Icon', 'smilepure' ),
					'type'       => 'iconpicker',
					'param_name' => 'icon',
					'settings'   => array(
						'emptyIcon'    => true,
						'type'         => 'ion',
						'iconsPerPage' => 400,
					),
					'value'      => '',
				),
				array(
					'heading'     => esc_html__( 'Text', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'text',
					'admin_label' => true,
				),
			),
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
