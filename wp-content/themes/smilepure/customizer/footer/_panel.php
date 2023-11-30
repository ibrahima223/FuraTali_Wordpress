<?php
$panel    = 'footer';
$priority = 1;

Smilepure_Kirki::add_section( 'footer', array(
	'title'    => esc_html__( 'General', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'footer_01', array(
	'title'    => esc_html__( 'Style 01', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'footer_02', array(
	'title'    => esc_html__( 'Style 02', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'footer_simple', array(
	'title'    => esc_html__( 'Footer Simple', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
