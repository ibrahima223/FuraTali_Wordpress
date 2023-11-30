<?php

class WPBakeryShortCode_TM_Saving_Item extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Saving Item', 'smilepure' ),
	'base'                      => 'tm_saving_item',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-pricing',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'    => esc_html__( 'Image', 'smilepure' ),
			'type'       => 'attach_image',
			'param_name' => 'image',
		),
		array(
			'heading'     => esc_html__( 'Heading', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'heading',
			'admin_label' => true,
		),
		array(
			'heading'     => esc_html__( 'Price', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'price',
			'admin_label' => true,
		),
		array(
			'heading'     => esc_html__( 'Currency', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'currency',
			'admin_label' => true,
		),
		array(
			'heading'     => esc_html__( 'Sub text', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'sub_text',
			'admin_label' => true,
		),
	), array(
		Smilepure_VC::get_animation_field(),
		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_vc_spacing_tab(), Smilepure_VC::get_custom_style_tab() ),

) );
