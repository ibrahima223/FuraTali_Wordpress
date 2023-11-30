<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Content Block Class
 *
 * @package Core
 */
class Smilepure_Posttypes {

	/**
	 * The constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ), 9 );
	}

	public function init() {
		add_filter( 'insight_posttypes', array( $this, 'posttypes' ) );
		add_filter( 'insight_taxonomy', array( $this, 'taxonomies' ) );
	}

	public function posttypes() {

		if ( empty( $posttypes ) ) {
			$posttypes = array();
		}

		$posttypes['ic_doctor'] = array(
			'labels'        => array(
				'name' => apply_filters( 'insight_doctor_name', esc_html__( 'Doctor', 'smilepure' ) ),
			),
			'public'        => true,
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => apply_filters( 'insight_doctor_slug', 'doctor' ) ),
			'menu_position' => 4,
			'menu_icon'     => 'dashicons-clipboard',
			'show_ui'       => true,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		);

		return $posttypes;
	}

	public function taxonomies() {

		if ( empty( $taxonomies ) ) {
			$taxonomies = array();
		}

		$taxonomies['ic_doctor_location'] = array(
			array( 'ic_doctor' ),
			array(
				'hierarchical' => true,
				'labels'       => array(
					'name' => apply_filters( 'insight_doctor_location_name', esc_html__( 'Location', 'smilepure' ) ),
				),
				'show_ui'      => true,
				'query_var'    => true,
				'rewrite'      => array( 'slug' => apply_filters( 'insight_doctor_location_slug', 'doctor-location' ) ),
			)
		);

		$taxonomies['ic_doctor_service'] = array(
			array( 'ic_doctor' ),
			array(
				'hierarchical' => true,
				'labels'       => array(
					'name' => apply_filters( 'insight_doctor_service_name', esc_html__( 'Service', 'smilepure' ) ),
				),
				'show_ui'      => true,
				'query_var'    => true,
				'rewrite'      => array( 'slug' => apply_filters( 'insight_doctor_service_slug', 'doctor-service' ) ),
			)
		);

		$taxonomies['service_tag'] = array(
			array( 'service' ),
			array(
				'hierarchical' => false,
				'labels'       => array(
					'name' => apply_filters( 'service_tag_name', esc_html__( 'Tags', 'smilepure' ) ),
				),
				'query_var'    => true,
			)
		);

		return $taxonomies;
	}

}

new Smilepure_Posttypes;
