<?php
$section  = 'navigation_minimal_01';
$priority = 1;
$prefix   = 'navigation_minimal_01_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'menu_title',
	'label'       => esc_html__( 'Menu Title', 'smilepure' ),
	'description' => esc_html__( 'Input a text that displays next to open button. Fox Ex: Menu', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'smilepure' ),
	'description' => esc_html__( 'Controls the background of canvas menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '#222',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.page-off-canvas-main-menu',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'close_button_color',
	'label'       => esc_html__( 'Close Button Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of close button.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-close-main-menu:before, .page-close-main-menu:after',
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'heading_color',
	'label'       => esc_html__( 'Heading Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the heading color in canvas menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '
			.page-off-canvas-main-menu h1,
			.page-off-canvas-main-menu h2,
			.page-off-canvas-main-menu h3,
			.page-off-canvas-main-menu h4,
			.page-off-canvas-main-menu h5,
			.page-off-canvas-main-menu h6
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'search_color',
	'label'       => esc_html__( 'Search Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the search color in canvas menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '
			.page-off-canvas-main-menu .search-field,
			.page-off-canvas-main-menu .search-field:focus
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'link_color',
	'label'       => esc_html__( 'Link Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the link color in canvas menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#999',
	'output'      => array(
		array(
			'element'  => '.page-off-canvas-main-menu a',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the link color when hover in canvas menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-off-canvas-main-menu a:hover',
			'property' => 'color',
		),
	),
) );

/*--------------------------------------------------------------
# Level 1
--------------------------------------------------------------*/
Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Main Menu Level 1', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'nav_margin',
	'label'     => esc_html__( 'Menu Margin', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => '-10px',
		'bottom' => '-10px',
		'left'   => '-24px',
		'right'  => '-24px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.page-off-canvas-main-menu .menu__container',
			),
			'property' => 'margin',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'item_padding',
	'label'     => esc_html__( 'Item Padding', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => '10px',
		'bottom' => '10px',
		'left'   => '24px',
		'right'  => '24px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.page-off-canvas-main-menu .menu__container > li > a',
				'.page-off-canvas-main-menu .menu__container > ul > li > a',
			),
			'property' => 'padding',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'typography',
	'label'       => esc_html__( 'Typography', 'smilepure' ),
	'description' => esc_html__( 'These settings control the typography for menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'     => Smilepure::HEADING_FONT,
		'variant'         => '500',
		'line-height'     => '1.4',
		'letter-spacing'  => '',
		'text-transform'  => '',
		'text-decoration' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.page-off-canvas-main-menu .menu__container > li > a',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'item_font_size',
	'label'       => esc_html__( 'Font Size', 'smilepure' ),
	'description' => esc_html__( 'Controls the font size for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 48,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.page-off-canvas-main-menu .menu__container > li > a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'item_color',
	'label'       => esc_html__( 'Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-off-canvas-main-menu .menu__container > li > a',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'item_hover_color',
	'label'       => esc_html__( 'Hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color when hover for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
            .page-off-canvas-main-menu .menu__container  > li > a:hover,
            .page-off-canvas-main-menu .menu__container  > li > a:focus
            ',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'search_enable',
	'label'    => esc_html__( 'Search', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'smilepure' ),
		'1' => esc_html__( 'Show', 'smilepure' ),
	),
) );

Smilepure_Customize::field_social_networks_enable( array(
	'settings' => $prefix . 'social_networks_enable',
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'textarea',
	'settings' => $prefix . 'left_text',
	'label'    => esc_html__( 'Left text', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<h4>Connect</h4>
					<div>2005 Stokes Isle Apt. 896, Venaville 10010, USA</div>
					<div><a href="mailto:info@yourdomain.com">info@yourdomain.com</a></div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'textarea',
	'settings' => $prefix . 'right_text',
	'label'    => esc_html__( 'Right text', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( '&copy; 2019 smilepure. All Rights Reserved.', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'text_color',
	'label'       => esc_html__( 'Text Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(255,255,255,0.5)',
	'output'      => array(
		array(
			'element'  => '
			.page-off-canvas-main-menu .off-canvas-extra-info,
			.page-off-canvas-main-menu .off-canvas-extra-info a,
			.page-off-canvas-main-menu .off-canvas-copyright
			',
			'property' => 'color',
		),
	),
) );
