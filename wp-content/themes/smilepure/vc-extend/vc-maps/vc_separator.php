<?php

vc_add_params( 'vc_separator', array(
	array(
		'heading'     => esc_html__( 'Position', 'smilepure' ),
		'description' => esc_html__( 'Make the separator position absolute with column', 'smilepure' ),
		'type'        => 'dropdown',
		'param_name'  => 'position',
		'value'       => array(
			esc_html__( 'None', 'smilepure' )   => '',
			esc_html__( 'Top', 'smilepure' )    => 'top',
			esc_html__( 'Bottom', 'smilepure' ) => 'bottom',
		),
		'std'         => '',
	),
) );
