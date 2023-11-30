<?php
$panel    = 'shortcode';
$priority = 1;

Smilepure_Kirki::add_section( 'shortcode_animation', array(
	'title'    => esc_html__( 'Animation', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
