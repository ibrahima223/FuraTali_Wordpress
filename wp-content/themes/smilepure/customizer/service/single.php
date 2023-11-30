<?php
$section  = 'single_service';
$priority = 1;
$prefix   = 'single_service_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'single_service_style',
	'label'    => esc_html__( 'Style', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '02',
	'choices'  => array(
		'01' => esc_attr__( 'Style 01', 'smilepure' ),
		'02' => esc_attr__( 'Style 02', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'comment_enable',
	'label'       => esc_html__( 'Comments', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display comments on single service posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );
