<div class="page-off-canvas-sidebar">
	<div id="page-close-canvas-sidebar" class="page-close-canvas-sidebar">
		<span class="fal fa-times"></span>
	</div>
	<?php
	if ( is_active_sidebar( 'canvas_sidebar' ) ) {
		dynamic_sidebar( 'canvas_sidebar' );
	} ?>
</div>
