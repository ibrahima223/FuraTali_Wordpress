<?php

class WPBakeryShortCode_TM_Timeline extends WPBakeryShortCode {
	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Timeline', 'smilepure' ),
	'base'                      => 'tm_timeline',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-timeline',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge(
		array(
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
				'group'      => esc_html__( 'Items', 'smilepure' ),
				'heading'    => esc_html__( 'Items', 'smilepure' ),
				'type'       => 'param_group',
				'param_name' => 'items',
				'params'     => array(
					array(
						'heading'    => esc_html__( 'Image', 'smilepure' ),
						'type'       => 'attach_image',
						'param_name' => 'image',
					),
					array(
						'heading'     => esc_html__( 'Title', 'smilepure' ),
						'type'        => 'textfield',
						'param_name'  => 'title',
						'admin_label' => true,
					),
					array(
						'heading'     => esc_html__( 'Date Time', 'smilepure' ),
						'description' => esc_html__( 'Date and time format (yyyy/mm/dd hh:mm).', 'smilepure' ),
						'type'        => 'datetimepicker',
						'param_name'  => 'datetime',
						'value'       => '',
						'admin_label' => true,
					),
					array(
						'heading'    => esc_html__( 'Text', 'smilepure' ),
						'type'       => 'textarea',
						'param_name' => 'text',
					),
				),

			),
		), Smilepure_VC::get_vc_spacing_tab()
	),
) );
