<?php
$section  = 'coming_soon';
$priority = 1;
$prefix   = 'coming_soon_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'coming_soon_page_logo',
	'label'    => esc_html__( 'Logo', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => SMILEPURE_THEME_IMAGE_URI . '/logo-dark.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'smilepure' ),
	'description' => esc_html__( 'Controls the background of coming soon template.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => array(
		'background-color'      => '#fff',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.page-template-coming-soon-01',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'coming_soon_page_image',
	'label'    => esc_html__( 'Image', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => SMILEPURE_THEME_IMAGE_URI . '/coming-soon-image.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'title',
	'label'    => esc_html__( 'Title', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => esc_html__( 'Coming soon…', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'date',
	'settings' => $prefix . 'countdown',
	'label'    => esc_html__( 'Countdown', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => Smilepure_Helper::get_coming_soon_demo_date(),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'mailchimp_enable',
	'label'    => esc_html__( 'Mailchimp Form', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'smilepure' ),
		'1' => esc_html__( 'Show', 'smilepure' ),
	),
) );

Smilepure_Customize::field_social_networks_enable( array(
	'settings' => $prefix . 'social_networks_enable',
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '1',
) );
