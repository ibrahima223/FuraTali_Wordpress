<?php
$panel    = 'service';
$priority = 1;

Smilepure_Kirki::add_section( 'archive_service', array(
	'title'    => esc_html__( 'Service Archive', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'single_service', array(
	'title'    => esc_html__( 'Service Single', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
