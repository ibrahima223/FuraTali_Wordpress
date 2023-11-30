<?php
$panel    = 'search';
$priority = 1;

Smilepure_Kirki::add_section( 'search_page', array(
	'title'    => esc_html__( 'Search Page', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'search_popup', array(
	'title'    => esc_html__( 'Search Popup', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
