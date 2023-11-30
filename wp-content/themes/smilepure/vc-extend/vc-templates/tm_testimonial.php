<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$pagination = $title = $nav = $auto_play = $loop = $text_color = $name_color = $by_line_color = $style = $el_class = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-testimonial-' );
$this->get_inline_css( '#' . $css_id, $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-testimonial tm-swiper ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$css_class .= " equal-height";

if ( $title !== '' ) {
	$css_class .= " has-title";
}

if ( $nav !== '' ) {
	$css_class .= " nav-style-$nav";
}

if ( $pagination !== '' ) {
	$css_class .= " pagination-style-$pagination";
}

$Smilepure_post_args = array(
	'post_type'      => 'testimonial',
	'posts_per_page' => $number,
	'orderby'        => $orderby,
	'order'          => $order,
);

if ( in_array( $orderby, array( 'meta_value', 'meta_value_num' ), true ) ) {
	$Smilepure_post_args['meta_key'] = $meta_key;
}

$Smilepure_post_args = Smilepure_VC::get_tax_query_of_taxonomies( $Smilepure_post_args, $taxonomies );

$Smilepure_query = new WP_Query( $Smilepure_post_args );
$css_class .= Smilepure_Helper::get_animation_classes();
?>
<?php if ( $Smilepure_query->have_posts() ) : ?>

	<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
		<?php if ( $carousel_items_display !== '' ) {
			$arr = explode( ';', $carousel_items_display );
			foreach ( $arr as $value ) {
				$tmp = explode( ':', $value );
				echo ' data-' . $tmp[0] . '-items="' . $tmp[1] . '"';
			}
		}
		?>

		<?php if ( $carousel_gutter !== '' ) {
			$arr = explode( ';', $carousel_gutter );
			foreach ( $arr as $value ) {
				$tmp = explode( ':', $value );
				echo ' data-' . $tmp[0] . '-gutter="' . $tmp[1] . '"';
			}
		}
		?>

		<?php if ( $nav !== '' ) : ?>
			data-nav="1"
		<?php endif; ?>

		<?php if ( $nav === 'custom' ) : ?>
			data-custom-nav="<?php echo esc_attr( $slider_button_id ); ?>"
		<?php endif; ?>

		<?php Smilepure_Helper::get_swiper_pagination_attributes( $pagination ); ?>

		<?php if ( $auto_play !== '' ) : ?>
			data-autoplay="<?php echo esc_attr( $auto_play ); ?>"
		<?php endif; ?>

		<?php if ( $loop === '1' ) : ?>
			data-loop="1"
		<?php endif; ?>

		<?php if ( $centered === '1' ) : ?>
			data-centered="1"
		<?php endif; ?>

		<?php if ( $style === '2' || $style === '8' ) : ?>
			data-effect="fade"
		<?php endif; ?>

		 data-equal-height="1"
	>

		<?php if ( $title !== '' ) { ?>
			<h3 class="testimonial-title">
				<?php echo esc_html( $title ); ?>
			</h3>
		<?php } ?>

		<?php
		set_query_var( 'Smilepure_shortcode_atts', $atts );
		set_query_var( 'Smilepure_query', $Smilepure_query );
		set_query_var( 'css_id', $css_id );

		get_template_part( 'loop/shortcodes/testimonial/style', $style );
		?>

	</div>
	<?php
	wp_reset_postdata();
endif; ?>
