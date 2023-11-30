<?php

class WPBakeryShortCode_TM_Callout_Box extends WPBakeryShortCodesContainer {

}

vc_map( array(
	'name'                    => esc_html__( 'Callout Box', 'smilepure' ),
	'base'                    => 'tm_callout_box',
	'content_element'         => true,
	'show_settings_on_create' => false,
	'is_container'            => true,
	'category'                => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                    => 'insight-i insight-i-contact-form-7',
	'js_view'                 => 'VcColumnView',
	'params'                  => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'smilepure' ) => '01',
			),
			'std'         => '01',
		),
		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_custom_style_tab() ),
) );
