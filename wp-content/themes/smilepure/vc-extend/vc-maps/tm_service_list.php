<?php

class WPBakeryShortCode_TM_Service_List extends WPBakeryShortCode {
}

vc_map( array(
	'name'                      => esc_html__( 'Service List', 'smilepure' ),
	'base'                      => 'tm_service_list',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-icons',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'heading'    => esc_html__( 'Items', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Image', 'smilepure' ),
					'type'        => 'attach_image',
					'param_name'  => 'item_image',
					'admin_label' => true,
				),
				array(
					'heading'     => esc_html__( 'Title', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'item_title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Link', 'smilepure' ),
					'type'       => 'vc_link',
					'param_name' => 'item_link',
				),
				array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'smilepure' ),
					'param_name'  => 'icon_smilepure',
					'settings'    => array(
						'emptyIcon'    => true,
						'type'         => 'smilepure',
						'iconsPerPage' => 400,
					),
					'description' => esc_html__( 'Select icon from library.', 'smilepure' ),
				),
			),
		),
	),
) );
