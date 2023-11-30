<?php
$section  = 'header';
$priority = 1;
$prefix   = 'header_';

$headers = Smilepure_Helper::get_header_list( true );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'global_header',
	'label'       => esc_html__( 'Default Header', 'smilepure' ),
	'description' => esc_html__( 'Select default header type for your site.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '18',
	'choices'     => Smilepure_Helper::get_header_list(),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_page_header_type',
	'label'       => esc_html__( 'Single Page', 'smilepure' ),
	'description' => esc_html__( 'Select default header type that displays on all single pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $headers,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_post_header_type',
	'label'       => esc_html__( 'Single Blog', 'smilepure' ),
	'description' => esc_html__( 'Select default header type that displays on all single blog post pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $headers,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_product_header_type',
	'label'       => esc_html__( 'Single Product', 'smilepure' ),
	'description' => esc_html__( 'Select default header type that displays on all single product pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $headers,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_service_header_type',
	'label'       => esc_html__( 'Single Service', 'smilepure' ),
	'description' => esc_html__( 'Select default header type that displays on all single service pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $headers,
) );
