<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$el_class = $items = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-view-demo-' );
$this->get_inline_css( '#' . $css_id, $atts );
extract( $atts );

$items = (array) vc_param_group_parse_atts( $items );
if ( count( $items ) < 1 ) {
	return;
}

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-view-demo ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$css_class .= ' tm-grid-wrapper filter-style-1';
$grid_classes = 'tm-grid modern-grid';
$grid_classes .= Smilepure_Helper::get_grid_animation_classes();

$filters = array();
?>

<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<?php
	ob_start();
	?>

	<div class="<?php echo esc_attr( $grid_classes ); ?>">
		<?php
		foreach ( $items as $item ) {
			if ( ! isset( $item['image'] ) ) {
				continue;
			}

			$classes = 'grid-item';
			if ( isset( $item['category'] ) && $item['category'] !== '' ) {
				$categories = explode( ',', $item['category'] );
				foreach ( $categories as $cat ) {
					$cat = trim( $cat );
					$classes .= " $cat";
					$filters[] = $cat;
				}
			}

			$query = '';

			if ( isset( $item['page'] ) ) {
				$args = array(
					'post_type'   => 'page',
					'post_status' => 'publish',
					'name'        => $item['page'],
				);

				$query = new WP_Query( $args );
			}

			$link_before = '';
			$link_after  = '';
			$has_link    = false;
			$title       = '';

			if ( $query !== '' ) {

				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();

						$has_link = true;
						$link_before .= '<a href="' . esc_url( get_the_permalink() ) . '" target="_blank">';
						$link_after .= '</a>';

						$title = get_the_title();

					endwhile;
					wp_reset_postdata();
				endif;

			}

			if ( isset( $item['badge'] ) ) {
				if ( $item['badge'] === 'coming' ) {
					$classes .= ' coming-item';
				}
			}

			$alt = $title !== '' ? $title : esc_attr__( 'Demo Image', 'smilepure' );

			if ( $title === '' && ( isset( $item['title'] ) && $item['title'] !== '' ) ) {
				$title = $item['title'];
			}
			?>
			<div class="<?php echo esc_attr( $classes ); ?>">
				<div class="item-wrap">
					<?php echo "{$link_before}"; ?>

					<div class="frame-screen">
						<div class="dots">
							<div class="dot"></div>
							<div class="dot"></div>
							<div class="dot"></div>
						</div>

						<div class="thumbnail">
							<?php if ( isset( $item['image'] ) ) : ?>
								<?php
								$full_image_size = wp_get_attachment_url( $item['image'] );
								$image_url       = Smilepure_Helper::aq_resize( array(
									'url'    => $full_image_size,
									'width'  => 540,
									'height' => 9999,
									'crop'   => false,
								) );
								?>
								<img src="<?php echo esc_url( $image_url ); ?>"
								     alt="<?php echo esc_attr( $alt ); ?>"/>
							<?php endif ?>

							<div class="overlay">
								<div class="button-view-demo tm-button style-modern tm-button-nm">
									<?php esc_html_e( 'View Demo', 'smilepure' ); ?>
								</div>
							</div>

							<?php if ( isset( $item['badge'] ) ) : ?>
								<?php if ( $item['badge'] === 'coming' ) { ?>
									<div class="badge coming">
										<img
											src="<?php echo esc_url( SMILEPURE_THEME_IMAGE_URI . '/soon-badge.png' ); ?>"
											alt="<?php esc_attr_e( 'Coming Soon', 'smilepure' ); ?>"/>
									</div>
								<?php } ?>
							<?php endif; ?>
						</div>

						<?php if ( $title !== '' ): ?>
							<div class="info">
								<h3 class="heading">
									<?php echo esc_html( $title ); ?>
								</h3>
							</div>
						<?php endif; ?>
					</div>

					<?php echo "{$link_after}"; ?>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php
	$grid_output = ob_get_contents();
	ob_end_clean();
	?>

	<?php if ( $filter_enable === '1' && ! empty( $filters ) ) { ?>
		<?php
		$filters        = array_unique( $filters );
		$filter_align   = 'center';
		$filter_counter = 1;
		$filter_wrap    = '1';

		$filter_classes = array( 'tm-filter-button-group', $filter_align );
		if ( $filter_counter == 1 ) {
			$filter_classes[] = 'show-filter-counter';
		}
		?>

		<div class="<?php echo implode( ' ', $filter_classes ); ?>"
			<?php if ( $filter_counter == 1 ) : ?>
				data-filter-counter="true"
			<?php endif; ?>
		>
			<?php if ( $filter_wrap == '1' ) { ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php } ?>
						<a href="javascript:void(0);" class="btn-filter current"
						   data-filter="*">
							<span class="filter-text"><?php esc_html_e( 'All', 'smilepure' ); ?></span>
						</a>
						<?php
						foreach ( $filters as $filter_item ) {
							printf( '<a href="javascript:void(0);" class="btn-filter" data-filter=".%s"><span class="filter-text">%s</span></a>', esc_attr( $filter_item ), $filter_item );
						}
						?>
						<?php if ( $filter_wrap == '1' ) { ?>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	<?php } ?>

	<?php echo '' . $grid_output; ?>
</div>
