<?php
$panel    = 'blog';
$priority = 1;

Smilepure_Kirki::add_section( 'blog_archive', array(
	'title'    => esc_html__( 'Blog Archive', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'blog_single', array(
	'title'    => esc_html__( 'Blog Single Post', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
