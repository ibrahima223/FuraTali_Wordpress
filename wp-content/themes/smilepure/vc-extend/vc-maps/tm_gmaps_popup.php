<?php

class WPBakeryShortCode_TM_Gmaps_Popup extends WPBakeryShortCode {
	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;

		if ( isset( $atts['map_height'] ) && $atts['map_height'] !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector { height: " . $atts['map_height'] . "px }";
		}

		if ( isset( $atts['map_width'] ) && $atts['map_width'] !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector { width: " . $atts['map_width'] . " }";
		}

		if ( $atts['map_image'] !== '' ) {
			$_url = wp_get_attachment_image_url( $atts['map_image'], 'full' );
			if ( $_url !== false ) {
				$Smilepure_shortcode_lg_css .= "$selector {background-image: url( $_url ) }";
			}
		}
	}
}

vc_map( array(
	'name'     => esc_html__( 'Google Maps Popup', 'smilepure' ),
	'base'     => 'tm_gmaps_popup',
	'icon'     => 'insight-i insight-i-map',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'params'   => array(
		array(
			'heading'     => esc_html__( 'Height', 'smilepure' ),
			'description' => esc_html__( 'Enter map height (in pixels)', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'map_height',
			'value'       => '550',
			'admin_label' => true
		),
		array(
			'heading'     => esc_html__( 'Width', 'smilepure' ),
			'description' => esc_html__( 'Enter map width in pixels or % (e.g 900px or 100%)', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'map_width',
			'value'       => '100%',
			'admin_label' => true
		),
		array(
			'heading'     => esc_html__( 'Image', 'smilepure' ),
			'description' => esc_html__( 'Choose a image for map', 'smilepure' ),
			'type'        => 'attach_image',
			'param_name'  => 'map_image',
			'admin_label' => true
		),
		array(
			'heading'     => esc_html__( 'Google Map URL', 'smilepure' ),
			'description' => esc_html__( 'Enter map URL to open in popup', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'map_src',
			'value'       => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6044.015315992222!2d-73.9902677!3d40.7618563!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2s!4v1534319098314',
		),
	),
) );
