<?php
$section  = 'advanced';
$priority = 1;
$prefix   = 'advanced_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'smooth_scroll_enable',
	'label'       => esc_html__( 'Smooth Scroll', 'smilepure' ),
	'description' => esc_html__( 'Smooth scrolling experience for websites.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'scroll_top_enable',
	'label'       => esc_html__( 'Go To Top Button', 'smilepure' ),
	'description' => esc_html__( 'Turn on to show go to top button.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'toggle',
	'settings' => 'lazy_load_images',
	'label'    => esc_html__( 'Lazy Load Images', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 0,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => 'gmap_api_key',
	'label'       => esc_html__( 'Google Map Api Key', 'smilepure' ),
	'description' => sprintf( wp_kses( __( 'Follow <a href="%s" target="_blank">this link</a> and click <strong>GET A KEY</strong> button.', 'smilepure' ), array(
		'a'      => array(
			'href'   => array(),
			'target' => array(),
		),
		'strong' => array(),
	) ), esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key' ) ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'AIzaSyA2gHgnwnas_j_283ngFLGzpVffPH9wiHM',
	'transport'   => 'postMessage',
) );
