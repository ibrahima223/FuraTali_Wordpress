<?php
$section  = 'header_sticky';
$priority = 1;
$prefix   = 'header_sticky_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => $prefix . 'enable',
	'label'       => esc_html__( 'Enable', 'smilepure' ),
	'description' => esc_html__( 'Enable this option to turn on header sticky feature.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'behaviour',
	'label'       => esc_html__( 'Behaviour', 'smilepure' ),
	'description' => esc_html__( 'Controls the behaviour of header sticky when you scroll down to page', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'both',
	'choices'     => array(
		'both' => esc_html__( 'Sticky on scroll up/down', 'smilepure' ),
		'up'   => esc_html__( 'Sticky on scroll up', 'smilepure' ),
		'down' => esc_html__( 'Sticky on scroll down', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'logo',
	'label'    => esc_html__( 'Logo', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => 'dark',
	'choices'  => array(
		'light' => esc_html__( 'Light', 'smilepure' ),
		'dark'  => esc_html__( 'Dark', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'smilepure' ),
	'description' => esc_html__( 'Controls the background of header when sticky.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => array(
		'background-color'      => '#fff',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.page-header.headroom--not-top .page-header-inner',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'height',
	'label'     => esc_html__( 'Height', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 91,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.headroom--not-top .page-header-inner',
			'property' => 'height',
			'units'    => 'px',
		),
	),
) );


Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'padding_top',
	'label'     => esc_html__( 'Padding top', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.headroom--not-top .page-header-inner',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'padding_bottom',
	'label'     => esc_html__( 'Padding bottom', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.headroom--not-top .page-header-inner',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__( 'Navigation', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'spacing',
	'settings'    => $prefix . 'item_padding',
	'label'       => esc_html__( 'Item Padding', 'smilepure' ),
	'description' => esc_html__( 'Controls the navigation item level 1 padding of navigation when sticky.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'top'    => '35px',
		'bottom' => '35px',
		'left'   => '0px',
		'right'  => '0px',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => array(
				'.desktop-menu .headroom--not-top:not(.header-15) .menu--primary .menu__container > li > a',
				'.desktop-menu .headroom--not-top:not(.header-15) .menu--primary .menu__container > ul > li > a',
			),
			'property' => 'padding',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'spacing',
	'settings'    => $prefix . 'item_margin',
	'label'       => esc_html__( 'Item Margin', 'smilepure' ),
	'description' => esc_html__( 'Controls the navigation item level 1 margin of navigation when sticky.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'top'    => '0px',
		'bottom' => '0px',
		'left'   => '20px',
		'right'  => '20px',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => array(
				'.desktop-menu .headroom--not-top:not(.header-15) .menu--primary .menu__container > li',
				'.desktop-menu .headroom--not-top:not(.header-15) .menu--primary .menu__container > ul > li',
			),
			'property' => 'margin',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => $prefix . 'navigation_link_color',
	'label'       => esc_html__( 'Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color for main menu items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'choices'     => array(
		'default' => esc_attr__( 'Default', 'smilepure' ),
		'hover'   => esc_attr__( 'Hover', 'smilepure' ),
	),
	'default'     => array(
		'default' => Smilepure::HEADING_COLOR,
		'hover'   => Smilepure::PRIMARY_COLOR,
	),
	'output'      => array(
		array(
			'choice'   => 'default',
			'element'  => '.page-header.headroom--not-top .menu--primary a, .page-header.headroom--not-top .header-text-info .info-sub-text',
			'property' => 'color',
		),
		array(
			'choice'   => 'hover',
			'element'  => '
            .page-header.headroom--not-top .menu--primary li:hover > a,
            .page-header.headroom--not-top .menu--primary > ul > li > a:hover,
            .page-header.headroom--not-top .menu--primary > ul > li > a:focus,
            .page-header.headroom--not-top .menu--primary .current-menu-ancestor > a,
            .page-header.headroom--not-top .menu--primary .current-menu-item > a',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_border_color',
	'label'       => esc_html__( 'Border Bottom Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the border bottom color for items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.desktop-menu .page-header.headroom--not-top .menu__container > li > a:after
			',
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Header Info', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'info_icon_color',
	'label'       => esc_html__( 'Info Icon Color', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.page-header.headroom--not-top .info-icon
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'info_text_color',
	'label'       => esc_html__( 'Info Text Color', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#486683',
	'output'      => array(
		array(
			'element'  => '
			.page-header.headroom--not-top .info-text
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'info_sub_text_color',
	'label'       => esc_html__( 'Info Sub Text Color', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.page-header.headroom--not-top .info-sub-text
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Header Icon', 'smilepure' ) . '</div>',
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
			.page-header.headroom--not-top .header-social-networks a,
			.page-header.headroom--not-top .wpml-ls-item-toggle,
			.page-header.headroom--not-top .page-open-mobile-menu i,
			.page-header.headroom--not-top .popup-search-wrap i,
			.page-header.headroom--not-top .mini-cart .mini-cart-icon,
			.page-header.headroom--not-top .header-right-more
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
			.page-header.headroom--not-top .header-social-networks a:hover,
			.page-header.headroom--not-top .wpml-ls-item-toggle:hover,
			.page-header.headroom--not-top .popup-search-wrap:hover i,
			.page-header.headroom--not-top .page-open-mobile-menu:hover i,
			.page-header.headroom--not-top .mini-cart .mini-cart-icon:hover,
			.page-header.headroom--not-top .header-right-more:hover
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Header Button', 'smilepure' ) . '</div>',
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
			'element'  => '.page-header.headroom--not-top .tm-button',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.page-header.headroom--not-top .tm-button',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.page-header.headroom--not-top .tm-button, .page-header.headroom--not-top .tm-button.modern-effect:hover',
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
			'element'  => '.page-header.headroom--not-top .tm-button:hover',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.page-header.headroom--not-top .tm-button:hover',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.page-header.headroom--not-top .tm-button:hover, .page-header.headroom--not-top .tm-button.modern-effect:after',
			'property' => 'background-color',
		),
	),
) );
