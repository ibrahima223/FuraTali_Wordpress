<?php
$section  = 'footer_simple';
$priority = 1;
$prefix   = 'footer_simple_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'textarea',
	'settings' => $prefix . 'text',
	'label'    => esc_html__( 'Copyright Text', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Copyright &copy; 2018 SmilePure WordPress Theme by ThemeMove', 'smilepure' ),
) );
