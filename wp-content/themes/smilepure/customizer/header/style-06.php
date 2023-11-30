<?php
$section  = 'header_style_06';
$priority = 1;
$prefix   = 'header_style_06_';

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
			'element'  => '.header-06 .mini-cart .mini-cart-icon:after',
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
			'element'  => '.header-06 .mini-cart .mini-cart-icon:after',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'social_networks_enable',
	'label'    => esc_html__( 'Social Networks', 'smilepure' ),
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
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'smilepure' ),
		'1' => esc_html__( 'Show', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'info_enable',
	'label'    => esc_html__( 'Info', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'smilepure' ),
		'1' => esc_html__( 'Show', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'repeater',
	'settings'  => $prefix . 'info',
	'label'     => esc_html__( 'Info List', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'choices'   => array(
		'labels' => array(
			'add-new-row' => esc_html__( 'Add new info', 'smilepure' ),
		),
	),
	'row_label' => array(
		'type'  => 'field',
		'field' => 'title',
	),
	'default'   => array(
		array(
			'title'      => 'Mon-fri: 8am-7pm',
			'sub_title'  => 'Open Time',
			'icon_class' => 'fas fa-clock',
		),
		array(
			'title'      => '(+00)888.666.88',
			'sub_title'  => 'Free Call',
			'icon_class' => 'fas fa-phone',
		),
		array(
			'title'      => '183 Donato Parkways',
			'sub_title'  => 'CA, United State',
			'icon_class' => 'fas fa-map-marker-alt',
		),
		array(
			'title'      => '+122 123 4567',
			'sub_title'  => 'Sales Department',
			'icon_class' => 'fas fa-comments',
		),
	),
	'fields'    => array(
		'title'      => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Title', 'smilepure' ),
			'default' => '',
		),
		'sub_title'  => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Sub Title', 'smilepure' ),
			'default' => '',
		),
		'icon_class' => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Icon Class', 'smilepure' ),
			'default' => '',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'info_list_title_color',
	'label'       => esc_html__( 'Info title Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the info title color.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => '.header-06 .header-info .info-title',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'info_list_sub_title_color',
	'label'       => esc_html__( 'Info Sub title Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the info sub title color.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::BODY_COLOR,
	'output'      => array(
		array(
			'element'  => '.header-06 .header-info .info-sub-title',
			'property' => 'color',
		),
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
			'element'  => '.header-06 .page-header-inner',
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
	'default'     => '#eee',
	'output'      => array(
		array(
			'element'  => '.header-06 .page-header-inner',
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
			'element'  => '.header-06 .page-header-inner',
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
		'background-color'      => 'rgba(255, 255, 255, 1)',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.header-06 .page-header-inner',
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
			.header-06 .page-open-mobile-menu i,
			.header-06 .mini-cart .mini-cart-icon,
			.header-06 .popup-search-wrap i
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
			.header-06 .page-open-mobile-menu:hover i,
			.header-06 .mini-cart .mini-cart-icon:hover,
			.header-06 .popup-search-wrap:hover i
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'header_info_icon_color',
	'label'       => esc_html__( 'Info Icon Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of info icons.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.header-06 .header-info .info-icon',
			'property' => 'color',
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
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'navigation_background_type',
	'label'    => esc_html__( 'Background Type', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'gradient',
	'choices'  => array(
		'solid'    => esc_html__( 'Solid', 'smilepure' ),
		'gradient' => esc_html__( 'Gradient', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'            => 'color-alpha',
	'settings'        => $prefix . 'navigation_background',
	'label'           => esc_html__( 'Background Color', 'smilepure' ),
	'description'     => esc_html__( 'Controls the background color for main menu', 'smilepure' ),
	'section'         => $section,
	'priority'        => $priority ++,
	'transport'       => 'auto',
	'default'         => '#37b102',
	'output'          => array(
		array(
			'element'  => '.header-06 .header-below',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => $prefix . 'navigation_background_type',
			'operator' => '==',
			'value'    => 'solid',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'            => 'multicolor',
	'settings'        => $prefix . 'navigation_background_gradient',
	'label'           => esc_attr__( 'Background Gradient', 'smilepure' ),
	'section'         => $section,
	'priority'        => $priority ++,
	'choices'         => array(
		'from' => esc_attr__( 'From', 'smilepure' ),
		'to'   => esc_attr__( 'To', 'smilepure' ),
	),
	'default'         => array(
		'from' => Smilepure::PRIMARY_COLOR,
		'to'   => Smilepure::SECONDARY_COLOR,
	),
	'active_callback' => array(
		array(
			'setting'  => $prefix . 'navigation_background_type',
			'operator' => '==',
			'value'    => 'gradient',
		),
	),
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
				'.desktop-menu .header-06 .menu__container',
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
		'top'    => '21px',
		'bottom' => '21px',
		'left'   => '0px',
		'right'  => '0px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-06 .menu--primary .menu__container > li > a',
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
		'right'  => '30px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-06  .menu--primary .menu__container > li',
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
		'font-family'     => Smilepure::HEADING_FONT,
		'variant'         => '700',
		'line-height'     => '1.26',
		'letter-spacing'  => '0em',
		'text-transform'  => 'none',
		'text-decoration' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.header-06 .menu--primary a',
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
	'default'     => 15,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.header-06 .menu--primary a',
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
			.header-06 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle,
			.header-06 .header-social-networks a,
			.header-06 .menu--primary a
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
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '
			.header-06 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover,
			.header-06 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:focus,
			.header-06 .wpml-ls-legacy-dropdown-click .wpml-ls-current-language:hover>a,
			.header-06 .header-social-networks a:hover,
            .header-06 .menu--primary li:hover > a,
            .header-06 .menu--primary > ul > li > a:hover,
            .header-06 .menu--primary > ul > li > a:focus,
            .header-06 .menu--primary .current-menu-ancestor > a,
            .header-06 .menu--primary .current-menu-item > a',
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
			'element'  => '.header-06 .menu--primary .menu__container > li > a',
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
            .header-06 .menu--primary .menu__container > li > a:hover,
            .header-06 .menu--primary .menu__container > li.current-menu-item > a',
			'property' => 'background-color',
		),
	),
) );
