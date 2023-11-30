<?php if ( has_post_thumbnail() ) { ?>
	<div class="post-feature post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php
			$full_image_size = get_the_post_thumbnail_url( null, 'full' );
			Smilepure_Helper::get_lazy_load_image( array(
				'url'    => $full_image_size,
				'width'  => 1170,
				'height' => 653,
				'crop'   => true,
				'echo'   => true,
				'alt'    => get_the_title(),
			) );
			?>
		</a>
	</div>
<?php } ?>

