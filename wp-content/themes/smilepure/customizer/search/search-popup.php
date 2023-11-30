<?php
$section  = 'search_popup';
$priority = 1;
$prefix   = 'search_popup_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => $prefix . 'close_button_color',
	'label'       => esc_html__( 'Close Button Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of close button.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'choices'     => array(
		'normal' => esc_attr__( 'Default Color', 'smilepure' ),
		'hover'  => esc_attr__( 'Hover Color', 'smilepure' ),
	),
	'default'     => array(
		'normal' => Smilepure::HEADING_COLOR,
		'hover'  => Smilepure::HEADING_COLOR,
	),
	'output'      => array(
		array(
			'choice'   => 'normal',
			'element'  => '.search-popup-close',
			'property' => 'color',
		),
		array(
			'choice'   => 'hover',
			'element'  => '.search-popup-close:hover',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'bg_color',
	'label'       => esc_html__( 'Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the background color of the search popup content.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-search-popup',
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'text_color',
	'label'       => esc_html__( 'Text Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the text color search field.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.page-search-popup .search-form,
			.page-search-popup .search-field:focus
			',
			'property' => 'color',
		),
		array(
			'element'  => '.page-search-popup .search-field:-webkit-autofill',
			'property' => '-webkit-text-fill-color',
			'suffix'   => '!important',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'border_color',
	'label'       => esc_html__( 'Border Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the Border color search field.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.page-search-popup .search-field,
			.page-search-popup .search-field:focus
			',
			'property' => 'border-color',
		),
	),
) );
