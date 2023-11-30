<?php
$section  = 'shortcode_animation';
$priority = 1;
$prefix   = 'shortcode_animation_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'enable',
	'label'       => esc_html__( 'Mobile Animation', 'smilepure' ),
	'description' => esc_html__( 'Controls the animations on mobile & tablet.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'desktop',
	'choices'     => array(
		'none'    => esc_html__( 'None', 'smilepure' ),
		'mobile'  => esc_html__( 'Only Mobile', 'smilepure' ),
		'desktop' => esc_html__( 'Only Desktop', 'smilepure' ),
		'both'    => esc_html__( 'Both', 'smilepure' ),
	),
) );
