<?php
$section  = 'shop_archive';
$priority = 1;
$prefix   = 'shop_archive_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'shop_archive_new_days',
	'label'       => esc_html__( 'New Badge (Days)', 'smilepure' ),
	'description' => esc_html__( 'If the product was published within the newness time frame display the new badge.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '90',
	'choices'     => array(
		'0'  => esc_html__( 'None', 'smilepure' ),
		'1'  => esc_html__( '1 day', 'smilepure' ),
		'2'  => esc_html__( '2 days', 'smilepure' ),
		'3'  => esc_html__( '3 days', 'smilepure' ),
		'4'  => esc_html__( '4 days', 'smilepure' ),
		'5'  => esc_html__( '5 days', 'smilepure' ),
		'6'  => esc_html__( '6 days', 'smilepure' ),
		'7'  => esc_html__( '7 days', 'smilepure' ),
		'8'  => esc_html__( '8 days', 'smilepure' ),
		'9'  => esc_html__( '9 days', 'smilepure' ),
		'10' => esc_html__( '10 days', 'smilepure' ),
		'15' => esc_html__( '15 days', 'smilepure' ),
		'20' => esc_html__( '20 days', 'smilepure' ),
		'25' => esc_html__( '25 days', 'smilepure' ),
		'30' => esc_html__( '30 days', 'smilepure' ),
		'60' => esc_html__( '60 days', 'smilepure' ),
		'90' => esc_html__( '90 days', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'shop_archive_quick_view',
	'label'       => esc_html__( 'Quick view', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the quick view button', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'shop_archive_compare',
	'label'       => esc_html__( 'Compare', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the compare button', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'shop_archive_wishlist',
	'label'       => esc_html__( 'Wishlist', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the wishlist button', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'shop_archive_number_item',
	'label'       => esc_html__( 'Number items', 'smilepure' ),
	'description' => esc_html__( 'Controls the number of products display on shop archive page', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 8,
	'choices'     => array(
		'min'  => 1,
		'max'  => 30,
		'step' => 1,
	),
) );
