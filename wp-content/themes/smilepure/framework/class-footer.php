<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Smilepure_Footer' ) ) {

	class Smilepure_Footer {

		function __construct() {

		}

		public static function get_list_footers( $default = false ) {
			$args = array(
				'post_type'      => 'ic_footer',
				'posts_per_page' => - 1,
				'post_status'    => 'publish',
				'meta_query'     => array(
					'relation' => 'OR',
				),
				'no_found_rows'  => true,
			);

			$query   = new WP_Query( $args );
			$results = array();

			if ( $default === true ) {
				$results[''] = esc_html__( 'Default', 'smilepure' );
			}

			$results['none'] = esc_html__( 'None', 'smilepure' );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					global $post;
					$slug             = $post->post_name;
					$results[ $slug ] = get_the_title();
				}
				wp_reset_postdata();
			}

			return $results;
		}
	}

	new Smilepure_Footer();
}
