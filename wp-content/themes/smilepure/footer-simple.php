</div><!-- /.content-wrapper -->
<div class="page-footer simple-footer" id="page-footer">
	<div class="container">
		<div class="row row-xs-center">
			<div class="col-md-6">
				<div class="footer-text">
					<?php $copyright_text = Smilepure::setting( 'footer_simple_text' ); ?>
					<?php echo wp_kses( $copyright_text, 'smilepure-default' ); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="social-networks">
					<div class="inner">
						<?php Smilepure_Templates::social_icons(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div><!-- /.site -->
<?php wp_footer(); ?>
</body>
</html>
