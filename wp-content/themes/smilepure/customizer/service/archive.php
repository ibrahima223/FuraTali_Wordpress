<?php
$section  = 'archive_service';
$priority = 1;
$prefix   = 'archive_service_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'archive_service_style',
	'label'    => esc_html__( 'Style', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'grid_classic_01',
	'choices'  => array(
		'grid_classic_01' => esc_attr__( 'Grid Classic 01', 'smilepure' ),
		'grid_classic_02' => esc_attr__( 'Grid Classic 02', 'smilepure' ),
		'grid_classic_03' => esc_attr__( 'Grid Classic 03', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'archive_service_thumbnail_size',
	'label'    => esc_html__( 'Thumbnail Size', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '370x250',
	'choices'  => array(
		'480x480' => esc_attr__( '480x480', 'smilepure' ),
		'370x250' => esc_attr__( '370x250', 'smilepure' ),
		'570x385' => esc_attr__( '570x385', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'number',
	'settings' => 'archive_service_gutter',
	'label'    => esc_html__( 'Gutter', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 30,
	'choices'  => array(
		'min'  => 0,
		'step' => 1,
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'number',
	'settings' => 'archive_service_row_gutter',
	'label'    => esc_html__( 'Gutter', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 35,
	'choices'  => array(
		'min'  => 0,
		'step' => 1,
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => 'archive_service_columns',
	'label'    => esc_html__( 'Columns', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'xs:1;sm:2;md:3;lg:3',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'archive_service_animation',
	'label'       => esc_html__( 'Animation', 'smilepure' ),
	'description' => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'helix',
	'choices'     => array(
		'none'             => esc_attr__( 'None', 'smilepure' ),
		'fade-in'          => esc_attr__( 'Fade In', 'smilepure' ),
		'move-up'          => esc_attr__( 'Move Up', 'smilepure' ),
		'scale-up'         => esc_attr__( 'Scale Up', 'smilepure' ),
		'fall-perspective' => esc_attr__( 'Fall Perspective', 'smilepure' ),
		'fly'              => esc_attr__( 'Fly', 'smilepure' ),
		'flip'             => esc_attr__( 'Flip', 'smilepure' ),
		'helix'            => esc_attr__( 'Helix', 'smilepure' ),
		'pop-up'           => esc_attr__( 'Pop Up', 'smilepure' ),
	),
) );
