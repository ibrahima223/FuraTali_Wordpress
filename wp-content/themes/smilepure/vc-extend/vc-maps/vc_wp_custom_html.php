<?php

class WPBakeryShortCode_VC_Wp_Custom_HTML extends WPBakeryShortCode {

}

vc_map( array(
	'name'     => esc_html__( 'WP Custom HTML', 'smilepure' ),
	'base'     => 'vc_wp_custom_html',
	'category' => esc_html__( 'WordPress Widgets', 'smilepure' ),
	'icon'     => 'icon-wpb-wp',
	'class'    => 'wpb_vc_wp_widget',
	'params'   => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'smilepure' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'smilepure' ),
		),
		array(
			'type'       => 'textarea_raw_html',
			'holder'     => 'div',
			'heading'    => esc_html__( 'Text', 'smilepure' ),
			'param_name' => 'content',
		),
		Smilepure_VC::extra_id_field(),
		Smilepure_VC::extra_class_field(),
	),
) );
