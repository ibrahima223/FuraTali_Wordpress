<?php
$section  = 'footer';
$priority = 1;
$prefix   = 'footer_';

$footers = array();

if ( is_customize_preview() ) {
	$footers = Smilepure_Footer::get_list_footers( true );
}

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => $prefix . 'page',
	'label'       => esc_html__( 'Footer', 'smilepure' ),
	'description' => esc_html__( 'Select a default footer for all pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 'footer-01',
	'choices'     => $footers,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_service_footer_page',
	'label'       => esc_html__( 'Single Service', 'smilepure' ),
	'description' => esc_html__( 'Select default footer that displays on all single service pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'footer-01',
	'choices'     => $footers,
) );
