<?php
$section  = 'archive_doctor';
$priority = 1;
$prefix   = 'archive_doctor_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'archive_doctor_style',
	'label'    => esc_html__( 'Style', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'grid-02',
	'choices'  => array(
		'grid-01'           => esc_attr__( 'Grid 01', 'smilepure' ),
		'grid-02'           => esc_attr__( 'Grid 02', 'smilepure' ),
		'grid-03'           => esc_attr__( 'Grid 03', 'smilepure' ),
		'grid-04'           => esc_attr__( 'Grid 04', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'form_enable',
	'label'       => esc_html__( 'Form search enable', 'smilepure' ),
	'description' => esc_html__( 'Turn on to form search doctor', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'form_title',
	'label'    => esc_html__( 'Form title', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Find a Doctor', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'button_text',
	'label'    => esc_html__( 'Button Text', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Find now', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'archive_doctor_animation',
	'label'       => esc_html__( 'Animation', 'smilepure' ),
	'description' => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'move-up',
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
