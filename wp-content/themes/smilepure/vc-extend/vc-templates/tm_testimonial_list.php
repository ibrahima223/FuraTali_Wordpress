<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = $el_class = '';
$style = $el_class = $order = $animation = $pagination_align = $pagination_button_text = '';


$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-testimonial-list-' );
$this->get_inline_css( '#' . $css_id, $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-testimonial-list ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$Smilepure_post_args = array(
	'post_type'      => 'testimonial',
	'posts_per_page' => $number,
	'orderby'        => $orderby,
	'order'          => $order,
	'paged'          => 1,
	'post_status'    => 'publish',
);

if ( in_array( $orderby, array( 'meta_value', 'meta_value_num' ), true ) ) {
	$Smilepure_post_args['meta_key'] = $meta_key;
}

if ( get_query_var( 'paged' ) ) {
	$Smilepure_post_args['paged'] = get_query_var( 'paged' );
} elseif ( get_query_var( 'page' ) ) {
	$Smilepure_post_args['paged'] = get_query_var( 'page' );
}

$Smilepure_post_args = Smilepure_VC::get_tax_query_of_taxonomies( $Smilepure_post_args, $taxonomies );

$Smilepure_query = new WP_Query( $Smilepure_post_args );

$css_class .= Smilepure_Helper::get_animation_classes();
?>
<?php if ( $Smilepure_query->have_posts() ) : ?>


	<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
		<?php if ( $pagination !== '' && $Smilepure_query->found_posts > $number ) : ?>
			data-pagination="<?php echo esc_attr( $pagination ); ?>"
		<?php endif; ?>
	>
		<?php $tm_grid_query['pagination'] = $pagination; ?>

		<?php
		set_query_var( 'Smilepure_shortcode_atts', $atts );
		set_query_var( 'Smilepure_query', $Smilepure_query );
		get_template_part( 'loop/shortcodes/testimonial-list/style', $style );
		?>

	</div>

	<?php Smilepure_Templates::grid_pagination( $Smilepure_query, $number, $pagination, $pagination_align, $pagination_button_text ); ?>
	<?php
	wp_reset_postdata();
endif; ?>
