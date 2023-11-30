<?php

class WPBakeryShortCode_TM_Download_Box extends WPBakeryShortCode {
	public function get_inline_css( $selector, $atts ) {
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Download Box', 'smilepure' ),
	'base'                      => 'tm_download_box',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-icons',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'Style 01', 'smilepure' ) => '1',
				esc_html__( 'Style 02', 'smilepure' ) => '2',
			),
			'std'         => '1',
			'admin_label' => true,
		),
		Smilepure_VC::extra_class_field(),
		array(
			'heading'    => esc_html__( 'Items', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Image', 'smilepure' ),
					'type'        => 'attach_image',
					'param_name'  => 'image',
					'admin_label' => true,
				),
				array(
					'heading'     => esc_html__( 'Heading', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'heading',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Link', 'smilepure' ),
					'type'       => 'vc_link',
					'param_name' => 'link',
				),
				array(
					'heading'     => esc_html__( 'File size', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'size',
					'admin_label' => true,
				),
			),
		),
	) ),
) );
