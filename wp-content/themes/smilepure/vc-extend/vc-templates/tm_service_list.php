<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$items = (array) vc_param_group_parse_atts( $items );
if ( count( $items ) < 1 ) {
	return;
}
?>
<div class="tm-service-list">

	<?php
	foreach ( $items as $item ) { ?>
		<div class="service-list-item">
			<?php
			if ( isset( $item['item_image'] ) && isset( $item["icon_smilepure"] ) ) { ?>
				<?php $image_url = wp_get_attachment_url( $item['item_image'] ); ?>
				<img src="<?php echo esc_url( $image_url ); ?>" class="service-list-item-img"
				     alt="<?php esc_attr_e( 'Service List Image', 'smilepure' ); ?>"/>
			<?php } elseif ( isset( $item['item_image'] ) || isset( $item["icon_smilepure"] ) ) { ?>
				<?php if ( isset( $item['item_image'] ) ) {
					?>
					<?php $image_url = wp_get_attachment_url( $item['item_image'] ); ?>
					<img src="<?php echo esc_url( $image_url ); ?>" class="service-list-item-img"
					     alt="<?php esc_attr_e( 'Service List Image', 'smilepure' ); ?>"/>
				<?php } ?>

				<?php $icon_type = isset( $item['icon_type'] ) ? $item['icon_type'] : ''; ?>
				<?php if ( isset( $item["icon_smilepure"] ) ) { ?>
					<div class="icon">
						<span class="<?php echo esc_attr( $item["icon_smilepure"] ) ?>"></span>
					</div>
				<?php } ?>
			<?php }
			?>

			<?php if ( isset( $item['item_title'] ) ) { ?>
				<h4 class="title">
					<?php
					if ( isset( $item['item_link'] ) && $item['item_link'] !== '' ) {
					$link = vc_build_link( $item['item_link'] );
					if ( isset( $link['url'] ) && $link['url'] !== '' ) { ?>
					<a class="link" href="<?php echo esc_url( $link['url'] ) ?>"
						<?php if ( $link['target'] !== '' ) { ?>
							target="<?php echo esc_attr( $link['target'] ); ?>"
						<?php } ?>
					>
						<?php } ?>
						<?php } ?>
						<?php echo esc_html( $item['item_title'] ); ?>

						<?php if ( isset( $item['item_link'] ) ) {
						if ( isset( $link['url'] ) && $link['url'] !== '' ) { ?>
					</a>
				<?php } ?>
				<?php } ?>
				</h4>
			<?php } ?>
		</div>
	<?php } ?>

</div>
