<?php
$section  = 'footer_01';
$priority = 1;
$prefix   = 'footer_01_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Widget Title', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'widget_title_typography',
	'label'       => esc_html__( 'Widget Title Font', 'smilepure' ),
	'description' => esc_html__( 'Controls the font for the Widget title.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => Smilepure::HEADING_FONT,
		'variant'        => '700',
		'line-height'    => '1.6',
		'letter-spacing' => '0px',
		'text-transform' => 'capitalize',
	),
	'output'      => array(
		array(
			'element' => '.footer-style-01 .widgettitle, .footer-style-01 .tm-mailchimp-form .title',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'widget_title_font_size',
	'label'     => esc_html__( 'Widget Title Font Size', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 18,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.footer-style-01 .widgettitle, .footer-style-01 .tm-mailchimp-form .title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'widget_title_color',
	'label'     => esc_html__( 'Widget Title Color', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => Smilepure::PRIMARY_COLOR,
	'output'    => array(
		array(
			'element'  => '.footer-style-01 .widgettitle, .footer-style-01 .tm-mailchimp-form .title',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'widget_title_margin_bottom',
	'label'     => esc_html__( 'Widget Title Margin Bottom', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 26,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.footer-style-01 .widgettitle, .footer-style-01 .tm-mailchimp-form .title',
			'property' => 'margin-bottom',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Text', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'body_font_size',
	'label'     => esc_html__( 'Footer Font Size', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 15,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.footer-style-01 .page-footer',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'text_color',
	'label'     => esc_html__( 'Text Color', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#fff',
	'output'    => array(
		array(
			'element'  => '.footer-style-01, .footer-style-01 .widget_text, .footer-style-01 .tm-mailchimp-form.style-11 input[type=\'email\']',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'link_color',
	'label'     => esc_html__( 'Link Color', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#fff',
	'output'    => array(
		array(
			'element'  => '
			.footer-style-01 a,
            .footer-style-01 .widget_recent_entries li a,
            .footer-style-01 .widget_recent_comments li a,
            .footer-style-01 .widget_archive li a,
            .footer-style-01 .widget_categories li a,
            .footer-style-01 .widget_meta li a,
            .footer-style-01 .widget_product_categories li a,
            .footer-style-01 .widget_rss li a,
            .footer-style-01 .widget_pages li a,
            .footer-style-01 .widget_nav_menu li a,
            .footer-style-01 .insight-core-bmw li a
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'link_hover_color',
	'label'     => esc_html__( 'Link Hover Color', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#fff',
	'output'    => array(
		array(
			'element'  => '
			.footer-style-01 a:hover,
            .footer-style-01 .widget_recent_entries li a:hover,
            .footer-style-01 .widget_recent_comments li a:hover,
            .footer-style-01 .widget_archive li a:hover,
            .footer-style-01 .widget_categories li a:hover,
            .footer-style-01 .widget_meta li a:hover,
            .footer-style-01 .widget_product_categories li a:hover,
            .footer-style-01 .widget_rss li a:hover,
            .footer-style-01 .widget_pages li a:hover,
            .footer-style-01 .widget_nav_menu li a:hover,
            .footer-style-01 .insight-core-bmw li a:hover 
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
	'default'  => '<div class="big_title">' . esc_html__( 'Twitter shortcode', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'twitter_text_color',
	'label'     => esc_html__( 'Text Color', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => 'rgba(255,255,255,1)',
	'output'    => array(
		array(
			'element'  => '
			.footer-style-01 .tm-twitter
			',
			'property' => 'color',
		),
	),
) );
