<?php

function Smilepure_vc_wp_posts_get_inline_css( $selector, $atts ) {
	global $Smilepure_shortcode_lg_css;

	$link_tmp       = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['link_color'], $atts['custom_link_color'] );
	$link_hover_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['link_hover_color'], $atts['custom_link_hover_color'] );

	if ( $link_tmp !== '' ) {
		$Smilepure_shortcode_lg_css .= "$selector a { $link_tmp }";
	}

	if ( $link_hover_tmp !== '' ) {
		$Smilepure_shortcode_lg_css .= "$selector a:hover { $link_hover_tmp }";
	}
}

$styling_tab = esc_html__( 'Styling', 'smilepure' );

vc_add_params( 'vc_wp_posts', array(
	array(
		'heading'    => esc_html__( 'Sidebar Position', 'smilepure' ),
		'type'       => 'dropdown',
		'param_name' => 'sidebar_position',
		'value'      => array(
			esc_html__( 'Left', 'smilepure' )  => 'left',
			esc_html__( 'Right', 'smilepure' ) => 'right',
		),
		'std'        => 'right',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Link Color', 'smilepure' ),
		'type'             => 'dropdown',
		'param_name'       => 'link_color',
		'value'            => array(
			esc_html__( 'Default Color', 'smilepure' )   => '',
			esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
			esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
			esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
		),
		'std'              => '',
		'edit_field_class' => 'vc_col-sm-6 col-break',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Custom Link Color', 'smilepure' ),
		'type'             => 'colorpicker',
		'param_name'       => 'custom_link_color',
		'dependency'       => array(
			'element' => 'link_color',
			'value'   => array( 'custom' ),
		),
		'std'              => '#fff',
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Link Hover Color', 'smilepure' ),
		'type'             => 'dropdown',
		'param_name'       => 'link_hover_color',
		'value'            => array(
			esc_html__( 'Default Color', 'smilepure' )   => '',
			esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
			esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
			esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
		),
		'std'              => '',
		'edit_field_class' => 'vc_col-sm-6 col-break',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Custom Link Hover Color', 'smilepure' ),
		'type'             => 'colorpicker',
		'param_name'       => 'custom_link_hover_color',
		'dependency'       => array(
			'element' => 'link_hover_color',
			'value'   => array( 'custom' ),
		),
		'std'              => '#fff',
		'edit_field_class' => 'vc_col-sm-6',
	),
) );
