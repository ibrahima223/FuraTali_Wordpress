<?php
$section  = 'shop_single';
$priority = 1;
$prefix   = 'single_product_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_product_categories_enable',
	'label'       => esc_html__( 'Categories', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the categories.', 'smilepure' ),
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
	'settings'    => 'single_product_tags_enable',
	'label'       => esc_html__( 'Tags', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the tags.', 'smilepure' ),
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
	'settings'    => 'single_product_sharing_enable',
	'label'       => esc_html__( 'Sharing', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the sharing.', 'smilepure' ),
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
	'settings'    => 'single_product_up_sells_enable',
	'label'       => esc_html__( 'Up-sells products', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the up-sells products section.', 'smilepure' ),
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
	'settings'    => 'single_product_related_enable',
	'label'       => esc_html__( 'Related products', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the related products section.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );
