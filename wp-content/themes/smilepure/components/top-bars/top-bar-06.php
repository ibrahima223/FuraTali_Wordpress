<?php
$text = Smilepure::setting( 'top_bar_style_06_text' );
?>
<div <?php Smilepure::top_bar_class(); ?>>
	<div class="container-fluid">
		<div class="row row-eq-height">
			<div class="col-lg-4">
				<div class="top-bar-wrap top-bar-left">
					<?php Smilepure_Templates::top_bar_link_list(); ?>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="top-bar-wrap top-bar-right">
					<?php Smilepure_Templates::top_bar_info(); ?>
					<?php Smilepure_Templates::top_bar_language_switcher(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
