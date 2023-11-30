<?php
$section  = 'top_bar';
$priority = 1;
$prefix   = 'top_bar_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'global_top_bar',
	'label'    => esc_html__( 'Default Top Bar', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'none',
	'choices'  => Smilepure_Helper::get_top_bar_list(),
) );
