<?php
$footer_page = Smilepure_Global::instance()->get_footer_type();

if ( $footer_page === 'none' ) {
	return;
}

$_Smilepure_query = Smilepure_Global::instance()->get_footer_post();
?>
<?php if ( $_Smilepure_query !== '' && $_Smilepure_query->have_posts() ) { ?>
	<?php while ( $_Smilepure_query->have_posts() ) : $_Smilepure_query->the_post(); ?>
		<?php
		$footer_options      = unserialize( get_post_meta( get_the_ID(), 'insight_footer_options', true ) );
		$_effect             = Smilepure_Helper::get_the_post_meta( $footer_options, 'effect', '' );
		$_style              = Smilepure_Helper::get_the_post_meta( $footer_options, 'style', '01' );
		$footer_wrap_classes = "page-footer-wrapper $footer_page footer-style-$_style";

		if ( $_effect !== '' ) {
			$footer_wrap_classes .= " {$_effect}";
		}
		?>
		<div id="page-footer-wrapper" class="<?php echo esc_attr( $footer_wrap_classes ); ?>">
			<div id="page-footer" <?php Smilepure::footer_class(); ?>>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="page-footer-inner">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	endwhile;
	wp_reset_postdata();
}
