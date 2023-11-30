<?php
$section  = 'layout';
$priority = 1;
$prefix   = 'site_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'layout',
	'label'       => esc_html__( 'Layout', 'smilepure' ),
	'description' => esc_html__( 'Controls the site layout.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'wide',
	'choices'     => array(
		'boxed' => esc_html__( 'Boxed', 'smilepure' ),
		'wide'  => esc_html__( 'Wide', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => $prefix . 'width',
	'label'       => esc_html__( 'Site Width', 'smilepure' ),
	'description' => esc_html__( 'Controls the overall site width. Enter value including any valid CSS unit, e.g 1200px.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1200px',
) );
