<?php

class WPBakeryShortCode_TM_Pricing_Group extends WPBakeryShortCodesContainer {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                    => esc_html__( 'Pricing Group', 'smilepure' ),
	'base'                    => 'tm_pricing_group',
	'as_parent'               => array( 'only' => 'tm_pricing' ),
	'content_element'         => true,
	'show_settings_on_create' => false,
	'is_container'            => true,
	'category'                => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                    => 'insight-i insight-i-pricing-group',
	'js_view'                 => 'VcColumnView',
	'params'                  => array_merge( array(
		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );

