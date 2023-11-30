<?php
$section  = 'typography';
$priority = 1;
$prefix   = 'typography_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="desc"><strong class="insight-label insight-label-info">' . esc_html__( 'IMPORTANT NOTE: ', 'smilepure' ) . '</strong>' . esc_html__( 'This section contains general typography options. Additional typography options for specific areas can be found within other sections. Example: For breadcrumb typography options go to the breadcrumb section.', 'smilepure' ) . '</div>',
) );

/*--------------------------------------------------------------
# Link color
--------------------------------------------------------------*/
Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Link', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'link_color',
	'label'       => esc_html__( 'Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of all links.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => 'a, .tm-button.style-text',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'link_color_hover',
	'label'       => esc_html__( 'Hover Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of all links when hover.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => 'a:hover, a:focus',
			'property' => 'color',
		),
	),
) );

/*--------------------------------------------------------------
# Body Typography
--------------------------------------------------------------*/
Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Body Typography', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'body',
	'label'       => esc_html__( 'Font family', 'smilepure' ),
	'description' => esc_html__( 'These settings control the typography for all body text.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => Smilepure::PRIMARY_FONT,
		'variant'        => '600',
		'line-height'    => '1.8',
		'letter-spacing' => '0em',
	),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => 'body, .gmap-marker-wrap',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'body_color',
	'label'       => esc_html__( 'Body Text Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of body text.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::BODY_COLOR,
	'output'      => array(
		array(
			'element'  => '
				body
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'body_font_size',
	'label'     => esc_html__( 'Font size', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 15,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => 'body',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Heading typography
--------------------------------------------------------------*/
Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Heading Typography', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'heading',
	'label'       => esc_html__( 'Font family', 'smilepure' ),
	'description' => esc_html__( 'These settings control the typography for all heading text.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => Smilepure::HEADING_FONT,
		'variant'        => '800',
		'line-height'    => '1.44',
		'letter-spacing' => '0em',
	),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => '
			h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6,th,
			.heading-font, 
			.widget_recent_entries a,
			.widget_rss .rsswidget, 
			.wpb-js-composer .vc_tta.vc_general .vc_tta-tab > a,
			.single-product div.product form.cart label
			',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'heading_color',
	'label'       => esc_html__( 'Heading Color', 'smilepure' ),
	'description' => esc_html__( 'Controls the color of heading.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Smilepure::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6,th,.heading-font,form label,
			.heading-color,b,strong,dt, .header-search-form-wrap .search-submit
			',
			'property' => 'color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'heading_font_sensitive',
	'label'       => esc_html__( 'Font sensitivity', 'smilepure' ),
	'description' => esc_html__( 'Values below 1 decrease rate of resizing, values above 1 increase rate of resizing.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0.7,
	'choices'     => array(
		'min'  => 0.5,
		'max'  => 1,
		'step' => 0.05,
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h1_font_size',
	'label'       => esc_html__( 'Font size', 'smilepure' ),
	'description' => esc_html__( 'H1', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 56,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h1,.h1',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h2_font_size',
	'description' => esc_html__( 'H2', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 48,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h2,.h2',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h3_font_size',
	'description' => esc_html__( 'H3', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 36,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h3,.h3',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h4_font_size',
	'description' => esc_html__( 'H4', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 24,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h4,.h4',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h5_font_size',
	'description' => esc_html__( 'H5', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 18,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h5,.h5',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h6_font_size',
	'description' => esc_html__( 'H6', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 14,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h6,.h6',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Button Color
--------------------------------------------------------------*/
Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Button', 'smilepure' ) . '</div>',
) );

$button_selector = '
button, input[type="button"], input[type="reset"], input[type="submit"],
.woocommerce #respond input#submit.disabled,
.woocommerce #respond input#submit:disabled,
.woocommerce #respond input#submit:disabled[disabled],
.woocommerce a.button.disabled,
.woocommerce a.button:disabled,
.woocommerce a.button:disabled[disabled],
.woocommerce button.button.disabled,
.woocommerce button.button:disabled,
.woocommerce button.button:disabled[disabled],
.woocommerce input.button.disabled,
.woocommerce input.button:disabled,
.woocommerce input.button:disabled[disabled],
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce a.button.alt,
.woocommerce input.button.alt,
.woocommerce button.button.alt,
.button
';

$button_hover_selector = '
button:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover,
.woocommerce #respond input#submit.disabled:hover,
.woocommerce #respond input#submit:disabled:hover,
.woocommerce #respond input#submit:disabled[disabled]:hover,
.woocommerce a.button.disabled:hover,
.woocommerce a.button:disabled:hover,
.woocommerce a.button:disabled[disabled]:hover,
.woocommerce button.button.disabled:hover,
.woocommerce button.button:disabled:hover,
.woocommerce button.button:disabled[disabled]:hover,
.woocommerce input.button.disabled:hover,
.woocommerce input.button:disabled:hover,
.woocommerce input.button:disabled[disabled]:hover,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button:hover,
.woocommerce a.button.alt:hover,
.woocommerce input.button.alt:hover,
.button:hover
';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => 'button_typography',
	'label'       => esc_html__( 'Font family', 'smilepure' ),
	'description' => esc_html__( 'These settings control the typography for all buttons.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'     => Smilepure::HEADING_FONT,
		'variant'         => '700',
		'line-height'     => '',
		'letter-spacing'  => '0.9px',
		'text-transform'  => 'uppercase',
		'text-decoration' => 'none',
	),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => '
				.tm-button,
				button, input[type="button"], input[type="reset"], input[type="submit"],
				.woocommerce #respond input#submit.disabled,
				.woocommerce #respond input#submit:disabled,
				.woocommerce #respond input#submit:disabled[disabled],
				.woocommerce a.button.disabled,
				.woocommerce a.button:disabled,
				.woocommerce a.button:disabled[disabled],
				.woocommerce button.button.disabled,
				.woocommerce button.button:disabled,
				.woocommerce button.button:disabled[disabled],
				.woocommerce input.button.disabled,
				.woocommerce input.button:disabled,
				.woocommerce input.button:disabled[disabled],
				.woocommerce #respond input#submit,
				.woocommerce a.button,
				.woocommerce button.button,
				.woocommerce input.button,
				.woocommerce a.button.alt,
				.woocommerce input.button.alt,
				.woocommerce button.button.alt,
				.button
			',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'button_font_size',
	'description' => esc_html__( 'Button font size', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 14,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => $button_selector,
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => 'button_color',
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
		'background' => Smilepure::SECONDARY_COLOR,
		'border'     => Smilepure::SECONDARY_COLOR,
	),
	'output'      => array(
		array(
			'choice'   => 'color',
			'element'  => $button_selector,
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => $button_selector,
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => $button_selector,
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => 'button_hover_color',
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
		'background' => Smilepure::PRIMARY_COLOR,
		'border'     => Smilepure::PRIMARY_COLOR,
	),
	'output'      => array(
		array(
			'choice'   => 'color',
			'element'  => $button_hover_selector,
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => $button_hover_selector,
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => $button_hover_selector,
			'property' => 'background-color',
		),
	),
) );
