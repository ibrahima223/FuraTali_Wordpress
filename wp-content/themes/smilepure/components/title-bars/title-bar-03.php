<?php
$enabled = Smilepure::setting( "title_bar_03_breadcrumb_enable" );

if ( '1' === $enabled ) {
	$col_class = 'col-md-6';
} else {
	$col_class = 'col-md-12';
}
?>

<div id="page-title-bar" class="page-title-bar page-title-bar-03">
	<div class="page-title-bar-overlay"></div>

	<div class="page-title-bar-inner">
		<div class="container">
			<div class="row row-xs-center">
				<div class="<?php echo esc_attr( $col_class ); ?>">
					<?php Smilepure_Templates::get_title_bar_title(); ?>
				</div>

				<?php
				if ( '1' === $enabled ) {
					?>
					<div class="col-md-6">
						<?php get_template_part( 'components/breadcrumb' ); ?>
					</div>
					<?php
				}
				?>

			</div>
		</div>
	</div>
</div>
