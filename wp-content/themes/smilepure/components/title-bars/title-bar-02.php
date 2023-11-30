<div id="page-title-bar" class="page-title-bar page-title-bar-02">
	<div class="page-title-bar-overlay"></div>

	<div class="page-title-bar-inner">
		<div class="container">
			<div class="row row-xs-center">
				<div class="col-md-12">
					<?php Smilepure_Templates::get_title_bar_title(); ?>
				</div>
			</div>
		</div>

		<?php
		$enabled = Smilepure::setting( "title_bar_01_breadcrumb_enable" );

		if ( '1' === $enabled ) {
			?>
			<?php get_template_part( 'components/breadcrumb' ); ?>
			<?php
		}
		?>
	</div>
</div>
