<?php
$section  = 'navigation_mobile';
$priority = 1;
$prefix   = 'mobile_menu_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => $prefix . 'breakpoint',
	'label'       => esc_html__( 'Breakpoint', 'smilepure' ),
	'description' => esc_html__( 'Controls the breakpoint of the mobile menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'postMessage',
	'default'     => 1199,
	'choices'     => array(
		'min'  => 460,
		'max'  => 1300,
		'step' => 10,
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'bg_type',
	'label'       => esc_html__( 'Background Type', 'smilepure' ),
	'description' => esc_html__( 'Controls the background type of the mobile menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'solid',
	'choices'     => array(
		'solid'    => esc_html__( 'Solid', 'smilepure' ),
		'gradient' => esc_html__( 'Gradient', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'            => 'multicolor',
	'settings'        => $prefix . 'bg_color_gradient',
	'label'           => esc_attr__( 'Background Gradient', 'smilepure' ),
	'section'         => $section,
	'priority'        => $priority ++,
	'choices'         => array(
		'from' => esc_attr__( 'From', 'smilepure' ),
		'to'   => esc_attr__( 'To', 'smilepure' ),
	),
	'default'         => array(
		'from' => Smilepure::SECONDARY_COLOR,
		'to'   => Smilepure::PRIMARY_COLOR,
	),
	'active_callback' => array(
		array(
			'setting'  => $prefix . 'bg_type',
			'operator' => '==',
			'value'    => 'gradient',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'bg_color_1',
	'label'       => esc_html__( 'Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the background color of the mobile menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => Smilepure::HEADING_COLOR,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'radio-buttonset',
	'settings'  => $prefix . 'text_align',
	'label'     => esc_html__( 'Text Align', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => 'left',
	'choices'   => array(
		'left'   => esc_html__( 'Left', 'smilepure' ),
		'center' => esc_html__( 'Center', 'smilepure' ),
		'right'  => esc_html__( 'Right', 'smilepure' ),
	),
	'output'    => array(
		array(
			'element'  => '.page-mobile-main-menu .menu__container',
			'property' => 'text-align',
		),
	),
) );

// Level 1.

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Level 1', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'typo',
	'label'       => esc_html__( 'Typography', 'smilepure' ),
	'description' => esc_html__( 'Controls the typography for all mobile menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'     => '',
		'variant'         => '600',
		'line-height'     => '1.5',
		'letter-spacing'  => '0em',
		'text-transform'  => 'none',
		'text-decoration' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.page-mobile-main-menu .menu__container a',
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
		'top'    => '18px',
		'bottom' => '18px',
		'left'   => '0',
		'right'  => '0',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.page-mobile-main-menu .menu__container > li > a',
			),
			'property' => 'padding',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'item_font_size',
	'label'       => esc_html__( 'Font Size', 'smilepure' ),
	'description' => esc_html__( 'Controls the font size of items level 1.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 18,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 8,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .menu__container > li > a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_color',
	'label'       => esc_html__( 'Link Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of items level 1.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(255, 255, 255, 1)',
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .menu__container > li > a, .page-mobile-main-menu .menu__container > li .tm-box-icon.style-2 .heading, .page-mobile-main-menu .menu__container > li .tm-box-icon.style-2 .heading a, .page-mobile-main-menu .menu__container > li .vc_tta.vc_general .vc_tta-panel-title, .page-mobile-main-menu .menu__container > li .tm-view-demo .heading',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color when hover of items level 1.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(255, 255, 255, 0.7)',
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .menu__container > li > a:hover,
            .page-mobile-main-menu .menu__container > li.opened > a',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'divider_color',
	'label'       => esc_html__( 'Divider Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the divider color between items level 1', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(255, 255, 255, 0.1)',
	'output'      => array(
		array(
			'element'  => '
			.page-mobile-main-menu .menu__container > li + li > a,
			.page-mobile-main-menu .menu__container > li.opened > a',
			'property' => 'border-color',
		),
		array(
			'element'  => '.page-mobile-main-menu .widget-title, .page-mobile-main-menu .widgettitle',
			'property' => 'border-bottom-color',
		),
	),
) );

// Mobile Menu Drop down Menu.

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Sub Items', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'sub_item_padding',
	'label'     => esc_html__( 'Item Padding', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => '10px',
		'bottom' => '10px',
		'left'   => '0',
		'right'  => '0',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.page-mobile-main-menu .sub-menu a,
				.page-mobile-main-menu .children a',
			),
			'property' => 'padding',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'sub_item_typo',
	'label'       => esc_html__( 'Typography', 'smilepure' ),
	'description' => esc_html__( 'Controls the typography for sub items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '500',
		'line-height'    => '1.5',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '
			.page-mobile-main-menu .sub-menu a,
			.page-mobile-main-menu .children a',
		),
	),
) );


Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'sub_item_font_size',
	'label'       => esc_html__( 'Font Size', 'smilepure' ),
	'description' => esc_html__( 'Controls the font size of sub items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 15,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 8,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '
			.page-mobile-main-menu .sub-menu a,
			.page-mobile-main-menu .children a,
			.page-mobile-main-menu .tm-list__item
			',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'sub_link_color',
	'label'       => esc_html__( 'Link Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of sub items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(255, 255, 255, 1)',
	'output'      => array(
		array(
			'element'  => '
			.page-mobile-main-menu .sub-menu a,
			.page-mobile-main-menu .children a,
			.page-mobile-main-menu .tm-list__item',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'sub_link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color when hover of sub items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(255, 255, 255, 0.7)',
	'output'      => array(
		array(
			'element'  => '
			.page-mobile-main-menu .sub-menu a:hover,
			.page-mobile-main-menu .children a:hover,
            .page-mobile-main-menu .tm-list__item:hover,
            .page-mobile-main-menu .sub-menu .opened > a',
			'property' => 'color',
		),
	),
) );

// Widget Title

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'widget_title_typo',
	'label'       => esc_html__( 'Typography', 'smilepure' ),
	'description' => esc_html__( 'Controls the typography for all mobile menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '500',
		'line-height'    => '1.5',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.page-mobile-main-menu .widgettitle',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'widget_title_font_size',
	'label'       => esc_html__( 'Font Size', 'smilepure' ),
	'description' => esc_html__( 'Controls the font size of widget title in sub mega menu.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 16,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 8,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .widgettitle',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'widget_title_color',
	'label'       => esc_html__( 'Widget Title Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of widget title.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .widgettitle',
			'property' => 'color',
		),
	),
) );
