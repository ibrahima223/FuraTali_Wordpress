<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$post_type  = 'testimonial';
$style      = $el_class = '';
$categories = $meta_key = $main_query = $pagination = $animation = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-testimonial-metro-' );
$this->get_inline_css( "#$css_id", $atts );
Smilepure_VC::get_shortcode_custom_css( "#$css_id", $atts );
extract( $atts );

$Smilepure_post_args = array(
	'post_type'      => $post_type,
	'posts_per_page' => $number,
	'orderby'        => $orderby,
	'order'          => $order,
	'paged'          => 1,
	'post_status'    => 'publish',
);

if ( in_array( $orderby, array( 'meta_value', 'meta_value_num' ) ) ) {
	$Smilepure_post_args['meta_key'] = $meta_key;
}

if ( get_query_var( 'paged' ) ) {
	$Smilepure_post_args['paged'] = get_query_var( 'paged' );
} elseif ( get_query_var( 'page' ) ) {
	$Smilepure_post_args['paged'] = get_query_var( 'page' );
}

$Smilepure_post_args = Smilepure_VC::get_tax_query_of_taxonomies( $Smilepure_post_args, $taxonomies );

if ( $main_query === '1' ) {
	global $wp_query;
	$Smilepure_query = $wp_query;
} else {
	$Smilepure_query = new WP_Query( $Smilepure_post_args );
}

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-testimonial-metro ' . $el_class, $this->settings['base'], $atts );


$grid_classes = 'tm-grid';
$grid_classes .= ' modern-grid';
$grid_classes .= Smilepure_Helper::get_grid_animation_classes( $animation );
?>

<?php if ( $Smilepure_query->have_posts() ) : ?>
	<div class="tm-grid-wrapper <?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
		<?php if ( $pagination !== '' && $Smilepure_query->found_posts > $number ) : ?>
			data-pagination="<?php echo esc_attr( $pagination ); ?>"
		<?php endif; ?>
	>
		<?php
		$count = $Smilepure_query->post_count;

		$tm_grid_query                  = $Smilepure_post_args;
		$tm_grid_query['action']        = "{$post_type}_infinite_load";
		$tm_grid_query['max_num_pages'] = $Smilepure_query->max_num_pages;
		$tm_grid_query['found_posts']   = $Smilepure_query->found_posts;
		$tm_grid_query['taxonomies']    = $taxonomies;
		$tm_grid_query['style']         = $style;
		$tm_grid_query['pagination']    = $pagination;
		$tm_grid_query['count']         = $count;
		$tm_grid_query['metro_layout']  = $metro_layout;
		$tm_grid_query                  = htmlspecialchars( wp_json_encode( $tm_grid_query ) );
		?>

		<input type="hidden" class="tm-grid-query" value="<?php echo '' . $tm_grid_query; ?>"/>

		<div class="<?php echo esc_attr( $grid_classes ); ?>">
			<?php
			set_query_var( 'Smilepure_query', $Smilepure_query );
			set_query_var( 'count', $count );
			set_query_var( 'metro_layout', $metro_layout );

			get_template_part( 'loop/shortcodes/testimonial-metro/style-metro' );
			?>
		</div>

		<?php Smilepure_Templates::grid_pagination( $Smilepure_query, $number, $pagination, $pagination_align, $pagination_button_text ); ?>

	</div>
	<?php
	wp_reset_postdata();
endif; ?>
