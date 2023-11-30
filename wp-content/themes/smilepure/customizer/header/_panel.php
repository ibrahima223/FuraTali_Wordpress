<?php
$panel    = 'header';
$priority = 1;

Smilepure_Kirki::add_section( 'header', array(
	'title'    => esc_html__( 'General', 'smilepure' ),
	'panel'    => $panel,
	'description' => '<div class="desc">
			<strong class="insight-label insight-label-info">' . esc_html__( 'IMPORTANT NOTE: ', 'smilepure' ) . '</strong>
			<p>' . esc_html__( 'These settings can be overridden by settings from Page Options Box in separator page.', 'smilepure' ) . '</p>
			<p><img src="' . SMILEPURE_THEME_IMAGE_URI . '/customize/header-settings.jpg" alt="' . esc_attr__( 'header-settings', 'smilepure' ) . '"/></p>
			<strong class="insight-label insight-label-info">' . esc_html__( 'Powerful header control: ', 'smilepure' ) . '</strong>
			<p>' . esc_html__( 'You can use different header style for different post type.', 'smilepure' ) . '</p>
		</div>',
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'header_sticky', array(
	'title'    => esc_html__( 'Header Sticky', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'header_more_options', array(
	'title'    => esc_html__( 'Header More Options', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header01
Smilepure_Kirki::add_section( 'header_style_01', array(
	'title'    => esc_html__( 'Header Style 01', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header02
Smilepure_Kirki::add_section( 'header_style_02', array(
	'title'    => esc_html__( 'Header Style 02', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header03
Smilepure_Kirki::add_section( 'header_style_06', array(
	'title'    => esc_html__( 'Header Style 03', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header04
Smilepure_Kirki::add_section( 'header_style_14', array(
	'title'    => esc_html__( 'Header Style 04', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header05
Smilepure_Kirki::add_section( 'header_style_07', array(
	'title'    => esc_html__( 'Header Style 05', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header06
Smilepure_Kirki::add_section( 'header_style_03', array(
	'title'    => esc_html__( 'Header Style 06', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header07
Smilepure_Kirki::add_section( 'header_style_04', array(
	'title'    => esc_html__( 'Header Style 07', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header08
Smilepure_Kirki::add_section( 'header_style_17', array(
	'title'    => esc_html__( 'Header Style 08', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header09
Smilepure_Kirki::add_section( 'header_style_09', array(
	'title'    => esc_html__( 'Header Style 09', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header10
Smilepure_Kirki::add_section( 'header_style_05', array(
	'title'    => esc_html__( 'Header Style 10', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header11
Smilepure_Kirki::add_section( 'header_style_08', array(
	'title'    => esc_html__( 'Header Style 11', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header12
Smilepure_Kirki::add_section( 'header_style_11', array(
	'title'    => esc_html__( 'Header Style 12', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header13
Smilepure_Kirki::add_section( 'header_style_19', array(
	'title'    => esc_html__( 'Header Style 13', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header14
Smilepure_Kirki::add_section( 'header_style_12', array(
	'title'    => esc_html__( 'Header Style 14', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header15
Smilepure_Kirki::add_section( 'header_style_13', array(
	'title'    => esc_html__( 'Header Style 15', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header16
Smilepure_Kirki::add_section( 'header_style_15', array(
	'title'    => esc_html__( 'Header Style 16', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header17
Smilepure_Kirki::add_section( 'header_style_18', array(
	'title'    => esc_html__( 'Header Style 17', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header18
Smilepure_Kirki::add_section( 'header_style_16', array(
	'title'    => esc_html__( 'Header Style 18', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header19
Smilepure_Kirki::add_section( 'header_style_21', array(
	'title'    => esc_html__( 'Header Style 19', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header20
Smilepure_Kirki::add_section( 'header_style_22', array(
	'title'    => esc_html__( 'Header Style 20', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

// Header21
Smilepure_Kirki::add_section( 'header_style_23', array(
	'title'    => esc_html__( 'Header Style 21', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
