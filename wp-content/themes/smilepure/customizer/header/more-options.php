<?php
$section  = 'header_more_options';
$priority = 1;
$prefix   = 'header_more_options_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'smilepure' ),
	'description' => esc_html__( 'Controls the background of header more options.', 'smilepure' ),
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
			'element' => '.header-more-tools-opened .header-right-inner',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => $prefix . 'icon_color',
	'label'       => esc_html__( 'Icon Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of icons on header.', 'smilepure' ),
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
			'element'  => '
			.header-more-tools-opened .header-right-inner .header-right-more,
			.header-more-tools-opened .header-right-inner .page-open-off-sidebar,
			.header-more-tools-opened .header-right-inner .wpml-ls-item-toggle,
			.header-more-tools-opened .header-right-inner .page-open-main-menu,
			.header-more-tools-opened .header-right-inner .page-open-mobile-menu i,
			.header-more-tools-opened .header-right-inner .popup-search-wrap i,
			.header-more-tools-opened .header-right-inner .mini-cart .mini-cart-icon',
			'property' => 'color',
		),
		array(
			'choice'   => 'hover',
			'element'  => '
			.header-more-tools-opened .header-right-inner .header-right-more:hover,
			.header-more-tools-opened .header-right-inner .page-open-off-sidebar:hover,
			.header-more-tools-opened .header-right-inner .page-open-main-menu:hover,
			.header-more-tools-opened .header-right-inner .page-open-mobile-menu:hover i,
			.header-more-tools-opened .header-right-inner .popup-search-wrap:hover i,
			.header-more-tools-opened .header-right-inner .mini-cart .mini-cart-icon:hover
			',
			'property' => 'color',
		),
		array(
			'choice'   => 'hover',
			'element'  => '.header-more-tools-opened .header-right-inner .wpml-ls-slot-shortcode_actions:hover > .js-wpml-ls-item-toggle',
			'property' => 'color',
			'suffix'   => '!important',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'multicolor',
	'settings'  => $prefix . 'social_networks_color',
	'label'     => esc_html__( 'Social Networks Color', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority++,
	'transport' => 'auto',
	'choices'   => array(
		'text'       => esc_attr__( 'Text', 'smilepure' ),
		'background' => esc_attr__( 'Background', 'smilepure' ),
		'border'     => esc_attr__( 'Border', 'smilepure' ),
	),
	'default'   => array(
		'text'       => Smilepure::HEADING_COLOR,
		'background' => 'rgba(0, 0, 0, 0)',
		'border'     => '#e7e7e7',
	),
	'output'    => array(
		array(
			'choice'   => 'text',
			'element'  => '.header-more-tools-opened .header-right-inner .header-social-networks a',
			'property' => 'color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-more-tools-opened .header-right-inner .header-social-networks a',
			'property' => 'background',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-more-tools-opened .header-right-inner .header-social-networks a',
			'property' => 'border-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'multicolor',
	'settings'  => $prefix . 'social_networks_hover_color',
	'label'     => esc_html__( 'Social Networks Hover Color', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority++,
	'transport' => 'auto',
	'choices'   => array(
		'text'       => esc_attr__( 'Text', 'smilepure' ),
		'background' => esc_attr__( 'Background', 'smilepure' ),
		'border'     => esc_attr__( 'Border', 'smilepure' ),
	),
	'default'   => array(
		'text'       => Smilepure::PRIMARY_COLOR,
		'background' => 'rgba(0,0,0,0)',
		'border'     => Smilepure::PRIMARY_COLOR,
	),
	'output'    => array(
		array(
			'choice'   => 'text',
			'element'  => '.header-more-tools-opened .header-right-inner .header-social-networks a:hover',
			'property' => 'color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-more-tools-opened .header-right-inner .header-social-networks a:hover',
			'property' => 'background',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-more-tools-opened .header-right-inner .header-social-networks a:hover',
			'property' => 'border-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__( 'Info list', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'info_list_color',
	'label'       => esc_html__( 'Info List Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of info list.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => Smilepure::SECONDARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.header-more-tools-opened .header-right-inner .header-info-list, .header-more-tools-opened .header-right-inner .header-info-list a',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'info_list_border_color',
	'label'       => esc_html__( 'Info List Border Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the border color of info list.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => 'red',
	'output'      => array(
		array(
			'element'  => '.header-more-tools-opened .header-right-inner .header-info-list .info-item:before',
			'property' => 'background-color',
		),
		array(
			'element'  => '.header-more-tools-opened .header-right-inner .header-info-list .info-item, .header-more-tools-opened .header-right-inner .header-info-list .info-icon',
			'property' => 'border-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'info_list_icon_color',
	'label'       => esc_html__( 'Info List Icon Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of info list icon.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => Smilepure::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.header-more-tools-opened .header-right-inner .header-info-list .info-icon',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__( 'Button', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'            => 'multicolor',
	'settings'        => $prefix . 'button_custom_color',
	'label'           => esc_html__( 'Button Color', 'smilepure' ),
	'description'     => esc_html__( 'Controls the color of button.', 'smilepure' ),
	'section'         => $section,
	'priority'        => $priority++,
	'transport'       => 'auto',
	'choices'         => array(
		'color'      => esc_attr__( 'Color', 'smilepure' ),
		'background' => esc_attr__( 'Background', 'smilepure' ),
		'border'     => esc_attr__( 'Border', 'smilepure' ),
	),
	'default'         => array(
		'color'      => '#fff',
		'background' => Smilepure::SECONDARY_COLOR,
		'border'     => Smilepure::SECONDARY_COLOR,
	),
	'output'          => array(
		array(
			'choice'   => 'color',
			'element'  => '.header-more-tools-opened .header-right-inner .header-on-top-button',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-more-tools-opened .header-right-inner .header-on-top-button',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-more-tools-opened .header-right-inner .header-on-top-button',
			'property' => 'background',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'            => 'multicolor',
	'settings'        => $prefix . 'button_hover_custom_color',
	'label'           => esc_html__( 'Button Hover Color', 'smilepure' ),
	'description'     => esc_html__( 'Controls the color of button when hover.', 'smilepure' ),
	'section'         => $section,
	'priority'        => $priority++,
	'transport'       => 'auto',
	'choices'         => array(
		'color'      => esc_attr__( 'Color', 'smilepure' ),
		'background' => esc_attr__( 'Background', 'smilepure' ),
		'border'     => esc_attr__( 'Border', 'smilepure' ),
	),
	'default'         => array(
		'color'      => '#000',
		'background' => Smilepure::SECONDARY_COLOR,
		'border'     => Smilepure::SECONDARY_COLOR,
	),
	'output'          => array(
		array(
			'choice'   => 'color',
			'element'  => '.header-more-tools-opened .header-right-inner .header-on-top-button:hover',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-more-tools-opened .header-right-inner .header-on-top-button:hover',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-more-tools-opened .header-right-inner .header-on-top-button:hover',
			'property' => 'background',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__( 'Button Sticky', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'            => 'multicolor',
	'settings'        => $prefix . 'sticky_button_custom_color',
	'label'           => esc_html__( 'Button Color', 'smilepure' ),
	'description'     => esc_html__( 'Controls the color of button.', 'smilepure' ),
	'section'         => $section,
	'priority'        => $priority++,
	'transport'       => 'auto',
	'choices'         => array(
		'color'      => esc_attr__( 'Color', 'smilepure' ),
		'background' => esc_attr__( 'Background', 'smilepure' ),
		'border'     => esc_attr__( 'Border', 'smilepure' ),
	),
	'default'         => array(
		'color'      => Smilepure::SECONDARY_COLOR,
		'background' => 'rgba(0, 0, 0, 0)',
		'border'     => '#eee',
	),
	'output'          => array(
		array(
			'choice'   => 'color',
			'element'  => '.header-more-tools-opened .header-right-inner .header-sticky-button.tm-button',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-more-tools-opened .header-right-inner .header-sticky-button.tm-button',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-more-tools-opened .header-right-inner .header-sticky-button.tm-button',
			'property' => 'background',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'            => 'multicolor',
	'settings'        => $prefix . 'sticky_button_hover_custom_color',
	'label'           => esc_html__( 'Button Hover Color', 'smilepure' ),
	'description'     => esc_html__( 'Controls the color of button when hover.', 'smilepure' ),
	'section'         => $section,
	'priority'        => $priority++,
	'transport'       => 'auto',
	'choices'         => array(
		'color'      => esc_attr__( 'Color', 'smilepure' ),
		'background' => esc_attr__( 'Background', 'smilepure' ),
		'border'     => esc_attr__( 'Border', 'smilepure' ),
	),
	'default'         => array(
		'color'      => '#fff',
		'background' => Smilepure::SECONDARY_COLOR,
		'border'     => Smilepure::SECONDARY_COLOR,
	),
	'output'          => array(
		array(
			'choice'   => 'color',
			'element'  => '.header-more-tools-opened .header-right-inner .header-sticky-button.tm-button:hover',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-more-tools-opened .header-right-inner .header-sticky-button.tm-button:hover',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-more-tools-opened .header-right-inner .header-sticky-button.tm-button:hover',
			'property' => 'background',
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
			.header-more-tools-opened .header-right-inner .info-icon
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
			.header-more-tools-opened .header-right-inner .info-text
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
			.header-more-tools-opened .header-right-inner .info-sub-text
			',
			'property' => 'color',
		),
	),
) );
