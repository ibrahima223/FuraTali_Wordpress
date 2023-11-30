<?php
$section  = 'header_style_11';
$priority = 1;
$prefix   = 'header_style_11_';

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
	'type'      => 'slider',
	'settings'  => $prefix . 'border_middle_width',
	'label'     => esc_html__( 'Border Middle Width', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 1,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.header-11 .header-below',
			'property' => 'border-top-width',
			'units'    => 'px',
		),
		array(
			'element'  => '.header-11 .header-right-below > div',
			'property' => 'border-left-width',
			'units'    => 'px',
		),
		array(
			'element'  => '.header-11 .header-right-below .header-search-form-wrap',
			'property' => 'border-right-width',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'border_middle_color',
	'label'       => esc_html__( 'Border Middle Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the border middle color.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#eee',
	'output'      => array(
		array(
			'element'  => '.header-11 .header-below',
			'property' => 'border-top-color',
		),
		array(
			'element'  => '.header-11 .header-right-below > div',
			'property' => 'border-left-color',
		),
		array(
			'element'  => '.header-11 .header-right-below .header-search-form-wrap',
			'property' => 'border-right-color',
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
			'element'  => '.header-11 .page-header-inner',
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
			'element'  => '.header-11 .page-header-inner',
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
			'element'  => '.header-11 .page-header-inner',
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
		'background-color'      => '#fff',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.header-11 .page-header-inner',
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
				.header-11 .page-open-mobile-menu i,
				.header-11 .header-right-more
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
				.header-11 .page-open-mobile-menu:hover i,
				.header-11 .header-right-more:hover
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'repeater',
	'settings'  => $prefix . 'link_list',
	'label'     => esc_html__( 'Link List', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'choices'   => array(
		'labels' => array(
			'add-new-row' => esc_html__( 'Add new link', 'smilepure' ),
		),
	),
	'row_label' => array(
		'type'  => 'field',
		'field' => 'text',
	),
	'default'   => array(
		array(
			'text'       => 'Call Us: (+00)888.666.88',
			'url'        => 'tel:18009777880',
			'icon_class' => 'fas fa-phone',
		),
		array(
			'text'       => 'Email: thememove@smilepure.com',
			'url'        => '',
			'icon_class' => 'fas fa-map-marker-alt',
		),
		array(
			'text'       => 'Mon - Fri: 9:00 - 19:00 / Closed on Weekends',
			'url'        => '',
			'icon_class' => 'fas fa-clock',
		),
	),
	'fields'    => array(
		'text'       => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Title', 'smilepure' ),
			'default' => '',
		),
		'url'        => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Link', 'smilepure' ),
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
	'type'        => 'slider',
	'settings'    => $prefix . 'link_list_font_size',
	'label'       => esc_html__( 'Info list Font Size', 'smilepure' ),
	'description' => esc_html__( 'Controls the font size for main info items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 14,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.header-11 .header-link-list .link-item',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'link_list__color',
	'label'       => esc_html__( 'Info list Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of text, link in Info list on header.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#486683',
	'output'      => array(
		array(
			'element'  => '
			.header-11 .header-link-list .link-item,
			.header-11 .header-link-list .link-item a',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'link_list_hover__color',
	'label'       => esc_html__( 'Info link hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of text, link in Info list on header.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.header-11 .header-link-list .link-item a:hover',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'link_list_icon__color',
	'label'       => esc_html__( 'Info icon Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of icon in Info list on header.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.header-11 .header-link-list .link-item i',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'textarea',
	'settings' => $prefix . 'text',
	'label'    => esc_html__( 'Text', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => wp_kses( __( 'Call (888)234-567 or <a href="#">Chat Now</a>', 'smilepure' ), 'smilepure-default' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'header_text__color',
	'label'       => esc_html__( 'Header text Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of header text on header.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.header-11 .header-text-wrap',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'header_text_link__color',
	'label'       => esc_html__( 'Header text link Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of link text on header.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.header-11 .header-text-wrap a',
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
	'type'      => 'spacing',
	'settings'  => $prefix . 'navigation_margin',
	'label'     => esc_html__( 'Menu Margin', 'smilepure' ),
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
				'.desktop-menu .header-11 .menu__container',
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
		'top'    => '45px',
		'bottom' => '45px',
		'left'   => '0px',
		'right'  => '0px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-11 .menu--primary .menu__container > li > a',
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
		'left'   => '20px',
		'right'  => '20px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-11  .menu--primary .menu__container > li',
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
		'variant'         => '500',
		'line-height'     => '1.26',
		'letter-spacing'  => '0px',
		'text-transform'  => 'capitalize',
		'text-decoration' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.header-11 .menu--primary .menu__container > li > a',
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
			'element'  => '.header-11 .menu--primary .menu__container > li > a',
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
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.header-11 .menu--primary a,
			.header-11 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle,
			.header-11 .popup-search-wrap i,
			.header-11 .mini-cart .mini-cart-icon,
			.header-11 .header-social-networks a,
			.header-11 .header-search-form-wrap .search-submit
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
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.header-11 .popup-search-wrap:hover i,
			.header-11 .mini-cart .mini-cart-icon:hover,
            .header-11 .menu--primary li:hover > a,
            .header-11 .menu--primary > ul > li > a:hover,
            .header-11 .menu--primary > ul > li > a:focus,
            .header-11 .menu--primary .current-menu-ancestor > a,
            .header-11 .menu--primary .current-menu-item > a',
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
			'element'  => '.header-11 .mini-cart .mini-cart-icon:after',
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
			'element'  => '.header-11 .mini-cart .mini-cart-icon:after',
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
			'element'  => '.header-11 .menu--primary .menu__container > li > a',
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
            .header-11 .menu--primary .menu__container > li > a:hover,
            .header-11 .menu--primary .menu__container > li.current-menu-item > a',
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_border_color',
	'label'       => esc_html__( 'Border Top Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the border top color for items.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
			.desktop-menu .header-11 .menu__container > li > a:after
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
	'default'  => '<div class="big_title">' . esc_html__( 'Button', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'button_text',
	'label'    => esc_html__( 'Button Text', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Get a free quote', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'button_link',
	'label'    => esc_html__( 'Button link', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#',
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
	'type'     => 'text',
	'settings' => $prefix . 'button_icon',
	'label'    => esc_html__( 'Button Icon class', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
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
			'element'  => '.header-11 .tm-button',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-11 .tm-button',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-11 .header-button:after',
			'property' => 'border-top-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-11 .tm-button',
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
			'element'  => '.header-11 .header-button:hover .tm-button',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-11 .header-button:hover .tm-button',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-11 .header-button:hover:after',
			'property' => 'border-top-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-11 .header-button:hover .tm-button',
			'property' => 'background-color',
		),
	),
) );
