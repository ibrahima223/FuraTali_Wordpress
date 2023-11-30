<?php
$panel    = 'shop';
$priority = 1;

Smilepure_Kirki::add_section( 'shop_archive', array(
	'title'    => esc_html__( 'Shop Archive', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'shop_single', array(
	'title'    => esc_html__( 'Shop Single', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'shopping_cart', array(
	'title'    => esc_html__( 'Shopping Cart', 'smilepure' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
