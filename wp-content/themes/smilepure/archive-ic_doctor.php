<?php
/**
 * The template for displaying archive pages.
 *
 * @link     https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  SmilePure
 * @since    1.0
 */
get_header();

$style       = Smilepure::setting( 'archive_doctor_style' );
$animation   = Smilepure::setting( 'archive_doctor_animation' );

$form_enable = Smilepure::setting( 'archive_doctor_form_enable' );
$form_title  = Smilepure::setting( "archive_doctor_form_title" );
$button_text = Smilepure::setting( "archive_doctor_button_text" );

$result_class = 'search-result';
$result_class .= " style-$style";
?>
<?php Smilepure_Templates::title_bar(); ?>
	<div id="page-content" class="page-content">
		<div class="container">
			<div class="row">

				<?php Smilepure_Templates::render_sidebar( 'left' ); ?>

				<div class="page-main-content">
					<?php if ( $form_enable === '1' ) : ?>
						<h3 class="search-title"><?php echo esc_html( $form_title ); ?></h3>
						<div class="search-form">
							<form action="<?php echo get_post_type_archive_link( 'ic_doctor' ); ?>" method="GET">
								<?php
								wp_dropdown_categories(
									array(
										'show_option_none' => esc_html__( 'Choose a location', 'smilepure' ),
										'taxonomy'         => 'ic_doctor_location',
										'name'             => 'lc',
										'selected'         => ( isset( $_GET['lc'] ) ? $_GET['lc'] : 0 ),
									)
								);
								wp_dropdown_categories(
									array(
										'show_option_none' => esc_html__( 'Choose a service', 'smilepure' ),
										'taxonomy'         => 'ic_doctor_service',
										'name'             => 'sv',
										'selected'         => ( isset( $_GET['sv'] ) ? $_GET['sv'] : 0 ),
									)
								);
								?>
								<button type="submit"><?php echo esc_html( $button_text ) ?></button>
							</form>
						</div>
					<?php endif; ?>

					<div class="<?php echo esc_attr( $result_class ); ?>">
						<div class="row">
							<?php
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							if ( isset( $_GET['lc'] ) || isset( $_GET['sv'] ) ) {
								$args = array(
									'post_type' => 'ic_doctor',
									'paged'     => $paged,
									'tax_query' => array(
										'relation' => 'AND',
									),
								);
								if ( isset( $_GET['lc'] ) && ( $_GET['lc'] != '-1' ) ) {
									$args['tax_query'][] = array(
										'taxonomy' => 'ic_doctor_location',
										'field'    => 'id',
										'terms'    => array( $_GET['lc'] ),
									);
								}
								if ( isset( $_GET['sv'] ) && ( $_GET['sv'] != '-1' ) ) {
									$args['tax_query'][] = array(
										'taxonomy' => 'ic_doctor_service',
										'field'    => 'id',
										'terms'    => array( $_GET['sv'] ),
									);
								}
								$query = new WP_Query( $args );
								if ( $query->have_posts() ) {
									echo '<div class="result-count">' . sprintf( _n( 'Success! We have found %s matching your needs.', 'Success! We have found %s matching your needs.', $query->found_posts, 'smilepure' ), number_format_i18n( $query->found_posts ) ) . '</div>';
									while ( $query->have_posts() ) {
										$query->the_post();
										get_template_part( 'loop/doctor/style', $style );
									}
									wp_reset_postdata();
									Smilepure_Templates::paging_nav( $query );
								} else {
									echo '<div class="result-count">' . esc_html( 'Success! We have found 0 matching your needs.', 'smilepure' ) . '</div>';
								}
							} else {
								if ( have_posts() ) {
									while ( have_posts() ) {
										the_post();
										get_template_part( 'loop/doctor/style', $style );
									}
									Smilepure_Templates::paging_nav();
									wp_reset_postdata();
								}
							}
							?>
						</div>
					</div>
				</div>

				<?php Smilepure_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>
<?php get_footer();
