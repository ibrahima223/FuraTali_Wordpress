<?php
$panel    = 'navigation';
$priority = 1;

Smilepure_Kirki::add_section( 'navigation', array(
	'title'    => esc_html__( 'Desktop Menu', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'navigation_minimal', array(
	'title'    => esc_html__( 'Off Canvas Menu', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'navigation_mobile', array(
	'title'    => esc_html__( 'Mobile Menu', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
