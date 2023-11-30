<?php

class WPBakeryShortCode_TM_Custom_Menu extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;

		$link_tmp       = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['link_color'], $atts['custom_link_color'] );
		$link_hover_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['link_hover_color'], $atts['custom_link_hover_color'] );

		if ( $link_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector a { $link_tmp }";
		}

		if ( $link_hover_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector a:hover { $link_hover_tmp }";
		}
	}
}

$custom_menus = array();
if ( 'vc_edit_form' === vc_post_param( 'action' ) && vc_verify_admin_nonce() ) {
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	if ( is_array( $menus ) && ! empty( $menus ) ) {
		foreach ( $menus as $single_menu ) {
			if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->slug ) ) {
				$custom_menus[ $single_menu->name ] = $single_menu->slug;
			}
		}
	}
}

$styling_tab = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'     => esc_html__( 'Custom Menu', 'smilepure' ),
	'base'     => 'tm_custom_menu',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-custom-menu',
	'class'    => 'wpb_vc_wp_widget',
	'params'   => array(
		array(
			'heading'     => esc_html__( 'Widget title', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'smilepure' ),
		),
		array(
			'heading'    => esc_html__( 'Style', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'style',
			'value'      => array(
				esc_html__( 'Normal', 'smilepure' )                => '1',
				esc_html__( 'With dot', 'smilepure' )              => '5',
				esc_html__( '2 Columns', 'smilepure' )             => '2',
				esc_html__( 'Inline with separator', 'smilepure' ) => '3',
				esc_html__( 'Inline with dot', 'smilepure' )       => '4',
			),
			'std'        => '1',
		),
		array(
			'heading'    => esc_html__( 'Menu desktop Align', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'align',
			'value'      => array(
				esc_html__( 'Left', 'smilepure' )   => 'left',
				esc_html__( 'Right', 'smilepure' )  => 'right',
				esc_html__( 'Center', 'smilepure' ) => 'center',
			),
			'std'        => 'left',
		),
		array(
			'heading'     => esc_html__( 'Menu', 'smilepure' ),
			'description' => empty( $custom_menus ) ? wp_kses( __( 'Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu.', 'smilepure' ), array(
				'b' => array(),

			) ) : esc_html__( 'Select menu to display.', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'nav_menu',
			'value'       => $custom_menus,
			'save_always' => true,
			'admin_label' => true,
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Link Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'link_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Custom Link Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_link_color',
			'dependency'       => array(
				'element' => 'link_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Link Hover Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'link_hover_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Custom Link Hover Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_link_hover_color',
			'dependency'       => array(
				'element' => 'link_hover_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
	),
) );
