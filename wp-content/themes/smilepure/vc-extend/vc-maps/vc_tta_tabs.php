<?php
$_color_field                                                = WPBMap::getParam( 'vc_tta_tabs', 'color' );
$_color_field['value'][ esc_html__( 'Primary', 'smilepure' ) ] = 'primary';
$_color_field['std']                                         = 'primary';
vc_update_shortcode_param( 'vc_tta_tabs', $_color_field );

vc_update_shortcode_param( 'vc_tta_tabs', array(
	'param_name' => 'style',
	'value'      => array(
		esc_html__( 'SmilePure 01', 'smilepure' ) => 'smilepure-01',
		esc_html__( 'SmilePure 02', 'smilepure' ) => 'smilepure-02',
		esc_html__( 'SmilePure 03', 'smilepure' ) => 'smilepure-03',
		esc_html__( 'Classic', 'smilepure' )    => 'classic',
		esc_html__( 'Modern', 'smilepure' )     => 'modern',
		esc_html__( 'Flat', 'smilepure' )       => 'flat',
		esc_html__( 'Outline', 'smilepure' )    => 'outline',
	),
) );
