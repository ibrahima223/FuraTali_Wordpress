<?php
$panel    = 'advanced';
$priority = 1;

Smilepure_Kirki::add_section( 'advanced', array(
	'title'    => esc_html__( 'Advanced', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'preloader', array(
	'title'    => esc_html__( 'Pre Loader', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'light_gallery', array(
	'title'    => esc_html__( 'Light Gallery', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
