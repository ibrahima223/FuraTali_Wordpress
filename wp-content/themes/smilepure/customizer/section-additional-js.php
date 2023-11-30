<?php
$section  = 'additional_js';
$priority = 1;
$prefix   = 'additional_js_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'custom_js_enable',
	'label'       => esc_html__( 'Custom Javascript', 'smilepure' ),
	'description' => esc_html__( 'Turn on to enable custom javascript', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'code',
	'settings' => 'custom_js',
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'jQuery(document).ready(function ($) {

});',
	'choices'  => array(
		'language' => 'javascript',
		'theme'    => 'monokai',
	),
) );
