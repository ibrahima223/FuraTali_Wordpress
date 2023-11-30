<?php

class WPBakeryShortCode_TM_Pricing_Table extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Saving Plan Table', 'smilepure' ),
	'base'                      => 'tm_pricing_table',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-pricing',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Heading', 'smilepure' ),
			'type'        => 'textarea',
			'admin_label' => true,
			'param_name'  => 'heading',
		),
		array(
			'heading'     => esc_html__( 'Feature Labels', 'smilepure' ),
			'description' => esc_html__( 'Input each feature label per line.', 'smilepure' ),
			'type'        => 'textarea',
			'param_name'  => 'features_labels',
			'admin_label' => true,
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
					'heading'     => esc_html__( 'Featured', 'smilepure' ),
					'description' => esc_html__( 'Checked the box if you want make this item featured', 'smilepure' ),
					'type'        => 'checkbox',
					'param_name'  => 'featured',
					'value'       => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
				),
				array(
					'heading'     => esc_html__( 'Title', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'     => esc_html__( 'Feature List', 'smilepure' ),
					'type'        => 'textarea',
					'param_name'  => 'features',
					'description' => esc_html__( 'Input each feature per line, use [check] for check icon.', 'smilepure' ),
				),
			),
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
