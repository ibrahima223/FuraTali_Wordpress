<?php
$section  = 'color_';
$priority = 1;
$prefix   = 'color_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'primary_color',
	'label'       => esc_html__( 'Primary Color', 'smilepure' ),
	'description' => esc_html__( 'A light color.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'secondary_color',
	'label'       => esc_html__( 'Secondary Color', 'smilepure' ),
	'description' => esc_html__( 'A dark color.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::SECONDARY_COLOR,
) );
