<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Smilepure_Post' ) ) {
	class Smilepure_Post {

		public function __construct() {
			add_action( 'wp_ajax_post_infinite_load', array( $this, 'infinite_load' ) );
			add_action( 'wp_ajax_nopriv_post_infinite_load', array( $this, 'infinite_load' ) );
		}

		public function infinite_load() {
			$args = array(
				'post_type'      => $_POST['post_type'],
				'posts_per_page' => $_POST['posts_per_page'],
				'orderby'        => $_POST['orderby'],
				'order'          => $_POST['order'],
				'paged'          => $_POST['paged'],
				'post_status'    => 'publish',
			);

			if ( ! empty( $_POST['taxonomies'] ) ) {
				$args = Smilepure_VC::get_tax_query_of_taxonomies( $args, $_POST['taxonomies'] );
			}

			if ( ! empty( $_POST['extra_taxonomy'] ) ) {
				$args = Smilepure_VC::get_tax_query_of_taxonomies( $args, $_POST['extra_taxonomy'] );
			}

			$style        = isset( $_POST['style'] ) ? $_POST['style'] : 'grid_classic_01';
			$metro_layout = isset( $_POST['metro_layout'] ) ? $_POST['metro_layout'] : '';

			$Smilepure_query = new WP_Query( $args );
			$count         = $Smilepure_query->post_count;

			$response = array(
				'max_num_pages' => $Smilepure_query->max_num_pages,
				'found_posts'   => $Smilepure_query->found_posts,
				'count'         => $Smilepure_query->post_count,
			);

			ob_start();

			if ( $Smilepure_query->have_posts() ) {
				set_query_var( 'Smilepure_query', $Smilepure_query );
				set_query_var( 'count', $count );
				set_query_var( 'metro_layout', $metro_layout );

				get_template_part( 'loop/shortcodes/blog/style', $style );
				wp_reset_postdata();
			}

			$template = ob_get_contents();
			ob_clean();

			$response['template'] = $template;

			echo json_encode( $response );

			wp_die();
		}

		public static function get_the_post_format() {
			$format = '';
			if ( get_post_format() !== false ) {
				$format = get_post_format();
			}

			return $format;
		}
	}

	new Smilepure_Post();
}
