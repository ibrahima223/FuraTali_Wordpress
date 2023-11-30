<?php
$section  = 'preloader';
$priority = 1;
$prefix   = 'preloader_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'enable',
	'label'    => esc_html__( 'Enable Preloader', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'No', 'smilepure' ),
		'1' => esc_html__( 'Yes', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => $prefix . 'style',
	'label'    => esc_html__( 'Style', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'image',
	'choices'  => Smilepure_Helper::get_preloader_list(),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'background_color',
	'label'       => esc_html__( 'Background Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the background color for pre loader', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-loading',
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'shape_color',
	'label'       => esc_html__( 'Shape Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the background color for pre loader', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.page-loading .sk-bg-self,
			.page-loading .sk-bg-child > div,
			.page-loading .sk-bg-child-before > div:before
			',
			'property' => 'background-color',
			'suffix'   => '!important',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'preloader_image',
	'label'    => esc_html__( 'Image (for Image style)', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => SMILEPURE_THEME_IMAGE_URI . '/preloader.gif',
) );
