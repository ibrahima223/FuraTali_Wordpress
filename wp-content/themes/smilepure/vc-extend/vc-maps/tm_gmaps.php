<?php

class WPBakeryShortCode_TM_Gmaps extends WPBakeryShortCode {

	public function convertAttributesToNewMarker( $atts ) {
		if ( isset( $atts['markers'] ) && strlen( $atts['markers'] ) > 0 ) {
			$markers = vc_param_group_parse_atts( $atts['markers'] );

			if ( ! is_array( $markers ) ) {
				$temp         = explode( ',', $atts['markers'] );
				$paramMarkers = array();

				foreach ( $temp as $marker ) {
					$data = explode( '|', $marker );

					$newMarker            = array();
					$newMarker['address'] = isset( $data[0] ) ? $data[0] : '';
					$newMarker['icon']    = isset( $data[1] ) ? $data[1] : '';
					$newMarker['title']   = isset( $data[2] ) ? $data[2] : '';
					$newMarker['info']    = isset( $data[3] ) ? $data[3] : '';

					$paramMarkers[] = $newMarker;
				}

				$atts['markers'] = urlencode( json_encode( $paramMarkers ) );

			}

			return $atts;
		}
	}
}

vc_map( array(
	'name'     => esc_html__( 'Google Maps', 'smilepure' ),
	'base'     => 'tm_gmaps',
	'icon'     => 'insight-i insight-i-map',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'params'   => array(
		array(
			'heading'     => esc_html__( 'Height', 'smilepure' ),
			'description' => esc_html__( 'Enter map height (in pixels or %)', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'map_height',
			'value'       => '480',
		),
		array(
			'heading'     => esc_html__( 'Width', 'smilepure' ),
			'description' => esc_html__( 'Enter map width (in pixels or %)', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'map_width',
			'value'       => '100%',
		),
		array(
			'heading'    => esc_html__( 'Button', 'smilepure' ),
			'type'       => 'vc_link',
			'param_name' => 'button',
			'value'      => esc_html__( 'Button', 'smilepure' ),
		),
		array(
			'heading'     => esc_html__( 'Zoom Level', 'smilepure' ),
			'description' => esc_html__( 'Map zoom level', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'zoom',
			'value'       => 16,
			'max'         => 17,
			'min'         => 0,
		),
		array(
			'type'       => 'checkbox',
			'param_name' => 'zoom_enable',
			'value'      => array(
				esc_html__( 'Enable mouse scroll wheel zoom', 'smilepure' ) => 'yes',
			),
		),
		array(
			'heading'     => esc_html__( 'Map Type', 'smilepure' ),
			'description' => esc_html__( 'Choose a map type', 'smilepure' ),
			'type'        => 'dropdown',
			'admin_label' => true,
			'param_name'  => 'map_type',
			'value'       => array(
				esc_html__( 'Roadmap', 'smilepure' )   => 'roadmap',
				esc_html__( 'Satellite', 'smilepure' ) => 'satellite',
				esc_html__( 'Hybrid', 'smilepure' )    => 'hybrid',
				esc_html__( 'Terrain', 'smilepure' )   => 'terrain',
			),
		),
		array(
			'heading'     => esc_html__( 'Map Style', 'smilepure' ),
			'description' => esc_html__( 'Choose a map style. This approach changes the style of the Roadmap types (base imagery in terrain and satellite views is not affected, but roads, labels, etc. respect styling rules)', 'smilepure' ),
			'type'        => 'image_radio',
			'admin_label' => true,
			'param_name'  => 'map_style',
			'value'       => array(
				'default'                 => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/default.png',
					'title' => esc_attr__( 'Default', 'smilepure' ),
				),
				'grayscale'               => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/greyscale.png',
					'title' => esc_attr__( 'Grayscale', 'smilepure' ),
				),
				'subtle_grayscale'        => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/subtle-grayscale.png',
					'title' => esc_attr__( 'Subtle Grayscale', 'smilepure' ),
				),
				'apple_paps_esque'        => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/apple-maps-esque.png',
					'title' => esc_attr__( 'Apple Maps-esque', 'smilepure' ),
				),
				'pale_dawn'               => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/pale-dawn.png',
					'title' => esc_attr__( 'Pale Dawn', 'smilepure' ),
				),
				'midnight_commander'      => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/midnight-commander.png',
					'title' => esc_attr__( 'Midnight Commander', 'smilepure' ),
				),
				'blue_water'              => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/blue-water.png',
					'title' => esc_attr__( 'Blue Water', 'smilepure' ),
				),
				'retro'                   => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/retro.png',
					'title' => esc_attr__( 'Retro', 'smilepure' ),
				),
				'paper'                   => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/paper.png',
					'title' => esc_attr__( 'Paper', 'smilepure' ),
				),
				'ultra_light_with_labels' => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/ultra-light-with-labels.png',
					'title' => esc_attr__( 'Ultra Light with Labels', 'smilepure' ),
				),
				'shades_of_grey'          => array(
					'url'   => SMILEPURE_THEME_IMAGE_URI . '/maps/shades-of-grey.png',
					'title' => esc_attr__( 'Shades Of Grey', 'smilepure' ),
				),
			),
			'std'         => 'default',
		),
		array(
			'type'       => 'checkbox',
			'param_name' => 'overlay_enable',
			'value'      => array(
				esc_html__( 'Use overlay instead of marker items', 'smilepure' ) => '1',
			),
		),
		array(
			'heading'    => esc_html__( 'Overlay Style', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'overlay_style',
			'value'      => array(
				esc_html__( 'Style 01', 'smilepure' ) => '01',
				esc_html__( 'Style 02', 'smilepure' ) => '02',
			),
			'std'        => '01',
		),
		array(
			'group'       => esc_html__( 'Markers', 'smilepure' ),
			'heading'     => esc_html__( 'Markers', 'smilepure' ),
			'description' => esc_html__( 'You can add multiple markers to the map', 'smilepure' ),
			'type'        => 'param_group',
			'param_name'  => 'markers',
			'value'       => urlencode( json_encode( array(
				array(
					'address' => '40.7590615,-73.969231',
				),
			) ) ),
			'params'      => array(
				array(
					'heading'     => esc_html__( 'Address or Coordinate', 'smilepure' ),
					'description' => sprintf( wp_kses( __( 'Enter address or coordinate. Find coordinates using the name and/or address of the place using <a href="%s" target="_blank">this simple tool here.</a>', 'smilepure' ), array(
						'a' => array(
							'href'   => array(),
							'target' => array(),
						),
					) ), esc_url( 'http://universimmedia.pagesperso-orange.fr/geo/loc.htm' ) ),
					'type'        => 'textfield',
					'param_name'  => 'address',
					'admin_label' => true,
				),
				array(
					'heading'     => esc_html__( 'Marker icon', 'smilepure' ),
					'description' => esc_html__( 'Choose a image for marker address', 'smilepure' ),
					'type'        => 'attach_image',
					'param_name'  => 'icon',
				),
				array(
					'heading'    => esc_html__( 'Marker Title', 'smilepure' ),
					'type'       => 'textfield',
					'param_name' => 'title',
				),
				array(
					'heading'     => esc_html__( 'Marker Information', 'smilepure' ),
					'description' => esc_html__( 'Content for info window', 'smilepure' ),
					'type'        => 'textarea',
					'param_name'  => 'info',
				),
			),
		),
	),
) );
