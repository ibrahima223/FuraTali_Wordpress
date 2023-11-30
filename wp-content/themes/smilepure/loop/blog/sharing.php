<?php
if ( ! class_exists( 'InsightCore_Share' ) ) {
	return;
}
$social_items = Smilepure::setting( 'social_sharing_items' );
$social_order = Smilepure::setting( 'social_sharing_order' );
if ( ! empty( $social_items ) ) {
	?>
	<div class="post-share">
		<div class="post-share-title heading-color"><?php esc_html_e( 'Share', 'smilepure' ); ?></div>
		<div class="post-share-list">
			<?php InsightCore_Share::get_buttons( $social_items, $social_order ); ?>
		</div>
	</div>
	<?php
}
