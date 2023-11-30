<?php
$section  = 'header_style_16';
$priority = 1;
$prefix   = 'header_style_16_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'overlay',
	'label'    => esc_html__( 'Header Overlay', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'No', 'smilepure' ),
		'1' => esc_html__( 'Yes', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'logo',
	'label'    => esc_html__( 'Logo', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'dark',
	'choices'  => array(
		'light' => esc_html__( 'Light', 'smilepure' ),
		'dark'  => esc_html__( 'Dark', 'smilepure' ),
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

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'cart_enable',
	'label'    => esc_html__( 'Mini Cart', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'smilepure' ),
		'1' => esc_html__( 'Show', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'language_switcher_enable',
	'label'    => esc_html__( 'Language Switcher', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'smilepure' ),
		'1' => esc_html__( 'Show', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'social_networks_enable',
	'label'    => esc_html__( 'Social Networks', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'smilepure' ),
		'1' => esc_html__( 'Show', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'border_width',
	'label'     => esc_html__( 'Border Bottom Width', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.header-16 .page-header-inner',
			'property' => 'border-bottom-width',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'border_color',
	'label'       => esc_html__( 'Border Bottom Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the border bottom color.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(0, 0, 0, 0.16)',
	'output'      => array(
		array(
			'element'  => '.header-16 .page-header-inner',
			'property' => 'border-bottom-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'box_shadow',
	'label'       => esc_html__( 'Box Shadow', 'smilepure' ),
	'description' => esc_html__( 'Input box shadow for header, e.g 0 0 5px #ccc', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'output'      => array(
		array(
			'element'  => '.header-16 .page-header-inner',
			'property' => 'box-shadow',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'smilepure' ),
	'description' => esc_html__( 'Controls the background of header.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => 'rgba(0, 0, 0, 0)',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.header-16 .page-header-inner',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'header_icon_color',
	'label'       => esc_html__( 'Icon Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of icons on header.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.header-16 .page-open-main-menu,
			.header-16 .header-social-networks a,
			.header-16 .page-open-mobile-menu i,
			.header-16 .popup-search-wrap i,
			.header-16 .mini-cart .mini-cart-icon,
			.header-16 .header-right-more
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'header_icon_hover_color',
	'label'       => esc_html__( 'Icon Hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color when hover of icons on header.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.header-16 .page-open-main-menu:hover,
			.header-16 .header-social-networks a:hover,
			.header-16 .popup-search-wrap:hover i,
			.header-16 .mini-cart .mini-cart-icon:hover,
			.header-16 .page-open-mobile-menu:hover i,
			.header-16 .header-right-more:hover
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'cart_badge_background_color',
	'label'       => esc_html__( 'Cart Badge Background Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the background color of cart badge.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.header-16 .mini-cart .mini-cart-icon:after',
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'cart_badge_color',
	'label'       => esc_html__( 'Cart Badge Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of cart badge.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.header-16 .mini-cart .mini-cart-icon:after',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Button', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'button_text',
	'label'    => esc_html__( 'Button Text', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'button_icon',
	'label'    => esc_html__( 'Button Icon class', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'button_icon_align',
	'label'    => esc_html__( 'Button Icon Align', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => array(
		'left'  => esc_html__( 'Left', 'smilepure' ),
		'right' => esc_html__( 'Right', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'button_link',
	'label'    => esc_html__( 'Button link', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'button_link_target',
	'label'    => esc_html__( 'Open link in a new tab.', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'No', 'smilepure' ),
		'1' => esc_html__( 'Yes', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => $prefix . 'button_color',
	'label'       => esc_html__( 'Button Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of button.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'choices'     => array(
		'color'      => esc_attr__( 'Color', 'smilepure' ),
		'background' => esc_attr__( 'Background', 'smilepure' ),
		'border'     => esc_attr__( 'Border', 'smilepure' ),
	),
	'default'     => array(
		'color'      => '#fff',
		'background' => Smilepure::PRIMARY_COLOR,
		'border'     => Smilepure::PRIMARY_COLOR,
	),
	'output'      => array(
		array(
			'choice'   => 'color',
			'element'  => '.header-16 .tm-button',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-16 .tm-button',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-16 .tm-button',
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => $prefix . 'button_hover_color',
	'label'       => esc_html__( 'Button Hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of button when hover.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'choices'     => array(
		'color'      => esc_attr__( 'Color', 'smilepure' ),
		'background' => esc_attr__( 'Background', 'smilepure' ),
		'border'     => esc_attr__( 'Border', 'smilepure' ),
	),
	'default'     => array(
		'color'      => '#fff',
		'background' => Smilepure::SECONDARY_COLOR,
		'border'     => Smilepure::SECONDARY_COLOR,
	),
	'output'      => array(
		array(
			'choice'   => 'color',
			'element'  => '.header-16 .tm-button:hover',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-16 .tm-button:hover',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-16 .tm-button:hover',
			'property' => 'background-color',
		),
	),
) );

/*--------------------------------------------------------------
# Navigation
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
	'settings'  => $prefix . 'navigation_margin',
	'label'     => esc_html__( 'Menu Margin', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => array(
		'top'    => '0px',
		'bottom' => '0px',
		'left'   => '0px',
		'right'  => '0px',
	),
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-16 .menu__container',
			),
			'property' => 'margin',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'navigation_item_padding',
	'label'     => esc_html__( 'Item Padding', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => '47px',
		'bottom' => '47px',
		'left'   => '14px',
		'right'  => '14px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-16 .menu--primary .menu__container > li > a',
			),
			'property' => 'padding',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'navigation_item_margin',
	'label'     => esc_html__( 'Item Margin', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => '0px',
		'bottom' => '0px',
		'left'   => '0px',
		'right'  => '0px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-16  .menu--primary .menu__container > li',
			),
			'property' => 'margin',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'navigation_typography',
	'label'       => esc_html__( 'Typography', 'smilepure' ),
	'description' => esc_html__( 'These settings control the typography for menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'     => '',
		'variant'         => '600',
		'line-height'     => '1.26',
		'letter-spacing'  => '0em',
		'text-transform'  => 'none',
		'text-decoration' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.header-16 .menu--primary a',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'navigation_item_font_size',
	'label'       => esc_html__( 'Font Size', 'smilepure' ),
	'description' => esc_html__( 'Controls the font size for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 16,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.header-16 .menu--primary a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_color',
	'label'       => esc_html__( 'Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '
			.header-16 .menu--primary a
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_hover_color',
	'label'       => esc_html__( 'Hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color when hover for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(255, 255, 255, 0.38)',
	'output'      => array(
		array(
			'element'  => '
            .header-16 .menu--primary li:hover > a,
            .header-16 .menu--primary > ul > li > a:hover,
            .header-16 .menu--primary > ul > li > a:focus,
            .header-16 .menu--primary .current-menu-ancestor > a,
            .header-16 .menu--primary .current-menu-item > a',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_background_color',
	'label'       => esc_html__( 'Background Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the background color for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '.header-16 .menu--primary .menu__container > li > a',
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_hover_background_color',
	'label'       => esc_html__( 'Hover Background Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the background color when hover for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
            .header-16 .menu--primary .menu__container > li > a:hover,
            .header-16 .menu--primary .menu__container > li.current-menu-item > a',
			'property' => 'background-color',
		),
	),
) );
