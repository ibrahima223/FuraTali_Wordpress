<?php
$section  = 'error404_page';
$priority = 1;
$prefix   = 'error404_page_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'error404_page_logo',
	'label'    => esc_html__( 'Logo', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => SMILEPURE_THEME_IMAGE_URI . '/logo-dark.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'error404_page_image',
	'label'    => esc_html__( 'Image', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => SMILEPURE_THEME_IMAGE_URI . '/image_404.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'textarea',
	'settings'    => 'error404_page_title',
	'label'       => esc_html__( 'Title', 'smilepure' ),
	'description' => esc_html__( 'Controls the title that display on error 404 page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => wp_kses( __( '<strong>OOPS!</strong> Page not found!', 'smilepure' ), 'smilepure-default' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'textarea',
	'settings'    => 'error404_page_text',
	'label'       => esc_html__( 'Text', 'smilepure' ),
	'description' => esc_html__( 'Controls the sub title that display on error 404 page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => wp_kses( __( 'You could either go back or go to homepage', 'smilepure' ), 'smilepure-default' ),
) );
