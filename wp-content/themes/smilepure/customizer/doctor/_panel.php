<?php
$panel    = 'doctor';
$priority = 1;

Smilepure_Kirki::add_section( 'archive_doctor', array(
	'title'    => esc_html__( 'Doctor Archive', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
