<?php if ( has_post_thumbnail() ) { ?>
	<?php
	$Smilepure_thumbnail_w = 1170;
	$Smilepure_thumbnail_h = 740;

	$full_image_size = get_the_post_thumbnail_url( null, 'full' );
	?>
	<div class="post-feature post-thumbnail">
		<?php
		Smilepure_Helper::get_lazy_load_image( array(
			'url'    => $full_image_size,
			'width'  => $Smilepure_thumbnail_w,
			'height' => $Smilepure_thumbnail_h,
			'crop'   => true,
			'echo'   => true,
			'alt'    => get_the_title(),
		) );
		?>

	</div>
<?php } ?>
