<header id="page-header" <?php Smilepure::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">

						<?php get_template_part( 'components/branding' ); ?>

						<div class="header-right">
							<?php get_template_part( 'components/navigation' ); ?>
							<div class="header-right-wrap">
								<div id="header-right-inner" class="header-right-inner">
									<?php Smilepure_Templates::header_search_form(); ?>

									<?php Smilepure_Templates::header_language_switcher(); ?>

									<?php Smilepure_Templates::header_social_networks( array(
										'tooltip_position' => 'bottom',
										'tooltip_skin'     => 'primary',
										'link_classes'     => 'circle-style',
									) ); ?>

									<?php Smilepure_Woo::header_mini_cart(); ?>
								</div>

								<?php Smilepure_Templates::header_open_mobile_menu_button(); ?>
								<?php Smilepure_Templates::header_more_tools_button(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
