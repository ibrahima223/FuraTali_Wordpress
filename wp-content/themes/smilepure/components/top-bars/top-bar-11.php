<?php
$text = Smilepure::setting( 'top_bar_style_11_text' );
?>
<div id="top-bar-notice" <?php Smilepure::top_bar_class(); ?>>
	<div class="container-fluid">
		<div class="row row-eq-height">
			<div class="col-md-12">
				<div class="top-bar-wrap">
					<?php echo '<div class="top-bar-text">' . $text . '<span id="topbar-remove" class="remove"></span>' . '</div>' ?>
				</div>
			</div>
		</div>
	</div>
</div>
