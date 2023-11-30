<?php
$section  = 'social_sharing';
$priority = 1;
$prefix   = 'social_sharing_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'multicheck',
	'settings'    => $prefix . 'items',
	'label'       => esc_attr__( 'Sharing Links', 'smilepure' ),
	'description' => esc_html__( 'Check to the box to enable social share links.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array( 'facebook', 'twitter', 'linkedin', 'google_plus', 'tumblr', 'email' ),
	'choices'     => array(
		'facebook'    => esc_attr__( 'Facebook', 'smilepure' ),
		'twitter'     => esc_attr__( 'Twitter', 'smilepure' ),
		'linkedin'    => esc_attr__( 'Linkedin', 'smilepure' ),
		'google_plus' => esc_attr__( 'Google+', 'smilepure' ),
		'tumblr'      => esc_attr__( 'Tumblr', 'smilepure' ),
		'email'       => esc_attr__( 'Email', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'sortable',
	'settings'    => $prefix . 'order',
	'label'       => esc_attr__( 'Order', 'smilepure' ),
	'description' => esc_html__( 'Controls the order of social share links.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'facebook',
		'twitter',
		'google_plus',
		'tumblr',
		'linkedin',
		'email',
	),
	'choices'     => array(
		'facebook'    => esc_attr__( 'Facebook', 'smilepure' ),
		'twitter'     => esc_attr__( 'Twitter', 'smilepure' ),
		'google_plus' => esc_attr__( 'Google+', 'smilepure' ),
		'tumblr'      => esc_attr__( 'Tumblr', 'smilepure' ),
		'linkedin'    => esc_attr__( 'Linkedin', 'smilepure' ),
		'email'       => esc_attr__( 'Email', 'smilepure' ),
	),
) );
