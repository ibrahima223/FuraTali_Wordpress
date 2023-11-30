<?php
$section  = 'navigation';
$priority = 1;
$prefix   = 'navigation_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Main Menu Dropdown', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'dropdown_link_typography',
	'label'       => esc_html__( 'Typography', 'smilepure' ),
	'description' => esc_html__( 'Controls the typography for all dropdown menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'     => Smilepure::PRIMARY_FONT,
		'variant'         => '600',
		'line-height'     => '1.2',
		'letter-spacing'  => '0em',
		'text-transform'  => 'none',
		'text-decoration' => 'none',
	),
	'output'      => array(
		array(
			'element' => '
			.sm-simple .sub-menu a,
			.sm-simple .children a,
			.sm-simple .sub-menu .menu-item-title,
			.sm-simple .tm-list .item-wrapper
			',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'dropdown_link_font_size',
	'label'       => esc_html__( 'Font Size', 'smilepure' ),
	'description' => esc_html__( 'Controls the font size for dropdown menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 15,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.sm-simple .sub-menu a, .sm-simple .children a, .sm-simple .tm-list .item-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Styling
--------------------------------------------------------------*/

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'dropdown_bg_color',
	'label'       => esc_html__( 'Background', 'smilepure' ),
	'description' => esc_html__( 'Controls the background color for dropdown menu', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => array(
				'.sm-simple .sub-menu',
				'.sm-simple .children',
			),
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'dropdown_border_bottom_width',
	'label'       => esc_html__( 'Border Bottom Width', 'smilepure' ),
	'description' => esc_html__( 'Controls the border bottom width for dropdown menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 0,
		'max'  => 10,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '
			.desktop-menu .sm-simple .sub-menu,
			.desktop-menu .sm-simple .children
			',
			'property' => 'border-bottom-width',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'dropdown_border_bottom_color',
	'label'       => esc_html__( 'Border Bottom', 'smilepure' ),
	'description' => esc_html__( 'Controls the border bottom color for dropdown menu', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => array(
				'.desktop-menu .sm-simple .sub-menu,
                .desktop-menu .sm-simple .children',
			),
			'property' => 'border-bottom-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'dropdown_link_color',
	'label'       => esc_html__( 'Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color for dropdown menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(0, 35, 69, 0.5)',
	'output'      => array(
		array(
			'element'  => array(
				'.sm-simple .sub-menu a',
				'.sm-simple .children a',
				'.sm-simple .tm-list .item-wrapper',
			),
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'dropdown_link_hover_color',
	'label'       => esc_html__( 'Hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color when hover for dropdown menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => array(
				'.sm-simple .sub-menu li:hover > a',
				'.sm-simple .children li:hover > a',
				'.sm-simple .tm-list li:hover .item-wrapper',
				'.sm-simple .sub-menu li:hover > a:after',
				'.sm-simple .children li:hover > a:after',
				'.sm-simple .sub-menu li.current-menu-item > a',
				'.sm-simple .sub-menu li.current-menu-ancestor > a',
			),
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'dropdown_link_hover_bg_color',
	'label'       => esc_html__( 'Hover Background', 'smilepure' ),
	'description' => esc_html__( 'Controls the background color when hover for dropdown menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba( 255, 255, 255, 0 )',
	'output'      => array(
		array(
			'element'  => array(
				'.sm-simple .sub-menu li:hover > a',
				'.sm-simple .children li:hover > a',
				'.sm-simple .tm-list li:hover > a',
				'.sm-simple .sub-menu li.current-menu-item > a',
				'.sm-simple .sub-menu li.current-menu-ancestor > a',
			),
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Mega Menu Dropdown', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'dropdown_widget_title_color',
	'label'       => esc_html__( 'Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color for widget title.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => array(
				'.desktop-menu .sm-simple .widgettitle',
			),
			'property' => 'color',
		),
	),
) );
