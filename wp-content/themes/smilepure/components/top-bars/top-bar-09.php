<?php
$text = Smilepure::setting( 'top_bar_style_09_text' );
?>
<div <?php Smilepure::top_bar_class(); ?>>
	<div class="container-fluid">
		<div class="row row-eq-height">
			<div class="col-md-6">
				<div class="top-bar-wrap top-bar-left">
					<?php Smilepure_Templates::top_bar_link_list(); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="top-bar-wrap top-bar-right">
					<?php echo '<div class="top-bar-text-wrap"><div class="top-bar-text">' . $text . '</div></div>' ?>
				</div>
			</div>
		</div>
	</div>
</div>
