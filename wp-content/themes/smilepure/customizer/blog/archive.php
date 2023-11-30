<?php
$section  = 'blog_archive';
$priority = 1;
$prefix   = 'blog_archive_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => $prefix . 'style',
	'label'       => esc_html__( 'Blog Style', 'smilepure' ),
	'description' => esc_html__( 'Select blog style that display for archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'grid_classic_01',
	'choices'     => array(
		'list'            => esc_html__( 'List Large Image', 'smilepure' ),
		'grid_classic_01' => esc_html__( 'Grid Classic 01', 'smilepure' ),
		'grid_classic_02' => esc_html__( 'Grid Classic 02', 'smilepure' ),
		'grid_classic_03' => esc_html__( 'Grid Classic 03', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => 'blog_archive_columns',
	'label'       => esc_html__( 'Columns', 'smilepure' ),
	'description' => esc_html__( 'Columns of grid style', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'xs:1;sm:2;md:2;lg:2',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'number',
	'settings' => 'blog_archive_gutter',
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
	'settings' => 'blog_archive_row_gutter',
	'label'    => esc_html__( 'Row Gutter', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 30,
	'choices'  => array(
		'min'  => 0,
		'step' => 1,
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'blog_archive_animation',
	'label'       => esc_html__( 'Animation', 'smilepure' ),
	'description' => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'fall-perspective',
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

