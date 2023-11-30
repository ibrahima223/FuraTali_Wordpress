<?php
$title_text = Smilepure_Helper::get_post_meta( 'page_title_bar_custom_text', '' );
?>
<div id="page-title-bar" class="page-title-bar page-title-bar-05">
	<div class="page-title-bar-overlay"></div>

	<div class="page-title-bar-inner">
		<div class="container">
			<div class="row row-xs-center">
				<div class="col-md-12">
					<?php Smilepure_Templates::get_title_bar_title(); ?>
					<?php if($title_text !== '') { ?>
						<div class="title-bar-text"><?php echo esc_html( $title_text ); ?></div>
					<?php } ?>
				</div>
			</div>
		</div>

		<?php
		$enabled = Smilepure::setting( "title_bar_05_breadcrumb_enable" );

		if ( '1' === $enabled ) {
			?>
			<div class="breadcrumb-wrap">
				<div class="container">
					<div class="row row-xs-center">
						<div class="col-md-12">
							<?php get_template_part( 'components/breadcrumb' ); ?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>

	</div>
</div>
