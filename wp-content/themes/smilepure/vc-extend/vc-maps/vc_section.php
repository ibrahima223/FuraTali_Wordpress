<?php
$styling_tab = esc_html__( 'Styling', 'smilepure' );

vc_remove_param( 'vc_section', 'css' );

vc_add_params( 'vc_section', array_merge( Smilepure_VC::get_vc_spacing_tab(), array(
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Border Radius', 'smilepure' ),
		'description' => esc_html__( 'E.g 5px or 50%', 'smilepure' ),
		'type'        => 'textfield',
		'param_name'  => 'border_radius',
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Box Shadow', 'smilepure' ),
		'description' => esc_html__( 'E.g 0 20px 30px #ccc', 'smilepure' ),
		'type'        => 'textfield',
		'param_name'  => 'box_shadow',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Color', 'smilepure' ),
		'type'       => 'dropdown',
		'param_name' => 'background_color',
		'value'      => array(
			esc_html__( 'None', 'smilepure' )            => '',
			esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
			esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
			esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
		),
		'std'        => '',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Custom Background Color', 'smilepure' ),
		'type'       => 'colorpicker',
		'param_name' => 'custom_background_color',
		'dependency' => array(
			'element' => 'background_color',
			'value'   => array( 'custom' ),
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Image', 'smilepure' ),
		'type'       => 'attach_image',
		'param_name' => 'background_image',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Hide Background Image', 'smilepure' ),
		'type'       => 'dropdown',
		'param_name' => 'hide_background_image',
		'value'      => array(
			esc_html__( 'Always show', 'smilepure' )             => '',
			esc_html__( 'Medium Device Down', 'smilepure' )      => 'md',
			esc_html__( 'Small Device Down', 'smilepure' )       => 'sm',
			esc_html__( 'Extra Small Device Down', 'smilepure' ) => 'xs',
		),
		'std'        => '',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Repeat', 'smilepure' ),
		'type'       => 'dropdown',
		'param_name' => 'background_repeat',
		'value'      => array(
			esc_html__( 'No repeat', 'smilepure' )         => 'no-repeat',
			esc_html__( 'Tile', 'smilepure' )              => 'repeat',
			esc_html__( 'Tile Horizontally', 'smilepure' ) => 'repeat-x',
			esc_html__( 'Tile Vertically', 'smilepure' )   => 'repeat-y',
		),
		'std'        => 'no-repeat',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Size', 'smilepure' ),
		'type'       => 'dropdown',
		'param_name' => 'background_size',
		'value'      => array(
			esc_html__( 'Auto', 'smilepure' )    => 'auto',
			esc_html__( 'Cover', 'smilepure' )   => 'cover',
			esc_html__( 'Contain', 'smilepure' ) => 'contain',
			esc_html__( 'Manual', 'smilepure' )  => 'manual',
		),
		'std'        => 'cover',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Background Size (Manual Setting)', 'smilepure' ),
		'description' => esc_html__( 'E.g 50% 100%', 'smilepure' ),
		'type'        => 'textfield',
		'param_name'  => 'background_size_manual',
		'dependency'  => array(
			'element' => 'background_size',
			'value'   => 'manual',
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Background Position', 'smilepure' ),
		'description' => esc_html__( 'E.g left center', 'smilepure' ),
		'type'        => 'textfield',
		'param_name'  => 'background_position',
		'dependency'  => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Scroll Effect', 'smilepure' ),
		'type'       => 'dropdown',
		'param_name' => 'background_attachment',
		'value'      => array(
			esc_html__( 'Move with the content', 'smilepure' ) => 'scroll',
			esc_html__( 'Fixed at its position', 'smilepure' ) => 'fixed',
			esc_html__( 'Marque', 'smilepure' )                => 'marque',
		),
		'std'        => 'scroll',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Marque Direction', 'smilepure' ),
		'type'       => 'dropdown',
		'param_name' => 'marque_direction',
		'value'      => array(
			esc_html__( 'To Left', 'smilepure' )  => 'to-left',
			esc_html__( 'To Right', 'smilepure' ) => 'to-right',
		),
		'std'        => 'to-right',
		'dependency' => array(
			'element' => 'background_attachment',
			'value'   => 'marque',
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Marque Pause On Hover.', 'smilepure' ),
		'type'       => 'checkbox',
		'param_name' => 'marque_pause_on_hover',
		'value'      => array(
			esc_html__( 'Yes', 'smilepure' ) => '1',
		),
		'dependency' => array(
			'element' => 'background_attachment',
			'value'   => 'marque',
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Background Overlay', 'smilepure' ),
		'description' => esc_html__( 'Choose an overlay background color.', 'smilepure' ),
		'type'        => 'dropdown',
		'param_name'  => 'overlay_background',
		'value'       => array(
			esc_html__( 'None', 'smilepure' )            => '',
			esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
			esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
			esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Custom Background Overlay', 'smilepure' ),
		'description' => esc_html__( 'Choose an custom background color overlay.', 'smilepure' ),
		'type'        => 'colorpicker',
		'param_name'  => 'overlay_custom_background',
		'std'         => '#000000',
		'dependency'  => array(
			'element' => 'overlay_background',
			'value'   => array( 'custom' ),
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Opacity', 'smilepure' ),
		'type'       => 'number',
		'param_name' => 'overlay_opacity',
		'value'      => 100,
		'min'        => 0,
		'max'        => 100,
		'step'       => 1,
		'suffix'     => '%',
		'std'        => 80,
		'dependency' => array(
			'element'   => 'overlay_background',
			'not_empty' => true,
		),
	),
) ) );
