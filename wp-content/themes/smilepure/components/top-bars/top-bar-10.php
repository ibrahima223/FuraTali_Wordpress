<?php $text = Smilepure::setting( 'top_bar_style_01_text' ); ?>
<div <?php Smilepure::top_bar_class(); ?>>
	<div class="container-fluid">
		<div class="row row-eq-height">
			<div class="col-md-12">
				<div class="top-bar-wrap">
					<div class="top-bar-left">
						<?php echo '<div class="top-bar-text-wrap"><div class="top-bar-text">' . $text . '</div></div>' ?>
					</div>

					<div class="top-bar-right">
						<?php Smilepure_Templates::top_bar_info(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
