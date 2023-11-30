<?php
$section  = 'logo';
$priority = 1;
$prefix   = 'logo_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'logo',
	'label'       => esc_html__( 'Default Logo', 'smilepure' ),
	'description' => esc_html__( 'Choose default logo.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'logo_dark',
	'choices'     => array(
		'logo_dark'  => esc_html__( 'Dark Logo', 'smilepure' ),
		'logo_light' => esc_html__( 'Light Logo', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'logo_dark',
	'label'    => esc_html__( 'Dark Logo', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => SMILEPURE_THEME_IMAGE_URI . '/logo-dark.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'logo_dark_retina',
	'label'    => esc_html__( 'Dark Logo Retina', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => SMILEPURE_THEME_IMAGE_URI . '/logo-dark-retina.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'logo_light',
	'label'    => esc_html__( 'Light Logo', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => SMILEPURE_THEME_IMAGE_URI . '/logo-light.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'logo_light_retina',
	'label'    => esc_html__( 'Light Logo Retina', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => SMILEPURE_THEME_IMAGE_URI . '/logo-light-retina.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => $prefix . 'width',
	'label'       => esc_html__( 'Logo Width', 'smilepure' ),
	'description' => esc_html__( 'E.g 200px', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '199px',
	'output'      => array(
		array(
			'element'  => '.branding__logo img,
			.error404--header .branding__logo img
			',
			'property' => 'width',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'spacing',
	'settings'    => $prefix . 'padding',
	'label'       => esc_html__( 'Logo Padding', 'smilepure' ),
	'description' => esc_html__( 'E.g 30px 0px 30px 0px', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'top'    => '15px',
		'right'  => '0px',
		'bottom' => '15px',
		'left'   => '0px',
	),
	'output'      => array(
		array(
			'element'  => '.branding__logo img',
			'property' => 'padding',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Sticky Logo', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => 'sticky_logo_width',
	'label'       => esc_html__( 'Logo Width', 'smilepure' ),
	'description' => esc_html__( 'Controls the width of sticky header logo, e.g 120px', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '199px',
	'output'      => array(
		array(
			'element'  => '
			.header-sticky-both .headroom.headroom--not-top .branding img,
			.header-sticky-up .headroom.headroom--not-top.headroom--pinned .branding img,
			.header-sticky-down .headroom.headroom--not-top.headroom--unpinned .branding img
			',
			'property' => 'width',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'spacing',
	'settings'    => 'sticky_logo_padding',
	'label'       => esc_html__( 'Logo Padding', 'smilepure' ),
	'description' => esc_html__( 'Controls the padding of sticky header logo.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'top'    => '0',
		'right'  => '0',
		'bottom' => '0',
		'left'   => '0',
	),
	'output'      => array(
		array(
			'element'  => '.headroom--not-top .branding__logo .sticky-logo',
			'property' => 'padding',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Mobile Menu Logo', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'image',
	'settings'    => 'mobile_logo',
	'label'       => esc_html__( 'Logo', 'smilepure' ),
	'description' => esc_html__( 'Select an image file for mobile menu logo.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => SMILEPURE_THEME_IMAGE_URI . '/logo-dark.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'image',
	'settings'    => 'mobile_logo_retina',
	'label'       => esc_html__( 'Logo Retina', 'smilepure' ),
	'description' => esc_html__( 'Select an image file for mobile menu logo.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => SMILEPURE_THEME_IMAGE_URI . '/logo-dark-retina.png',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => 'mobile_logo_width',
	'label'       => esc_html__( 'Logo Width', 'smilepure' ),
	'description' => esc_html__( 'Controls the width of mobile menu logo, e.g 120px', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '199px',
	'output'      => array(
		array(
			'element'  => '.page-mobile-menu-logo img',
			'property' => 'width',
		),
	),
) );
