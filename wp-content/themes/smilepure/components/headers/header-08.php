<header id="page-header" <?php Smilepure::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="header-above">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="header-above-inner">
							<div class="header-above-left">
								<?php Smilepure_Templates::header_search_form(); ?>
							</div>

							<?php get_template_part( 'components/branding' ); ?>

							<div class="header-above-right">

								<div id="header-right-inner" class="header-right-inner">
									<?php Smilepure_Templates::header_language_switcher(); ?>

									<?php Smilepure_Woo::header_mini_cart(); ?>

									<?php Smilepure_Templates::header_button(); ?>
								</div>

								<?php Smilepure_Templates::header_open_mobile_menu_button(); ?>
								<?php Smilepure_Templates::header_more_tools_button(); ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="header-below">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">

						<div class="header-below-inner">
							<div class="header-below-left">
								<?php get_template_part( 'components/navigation' ); ?>
							</div>
							<div class="header-below-right">
								<?php Smilepure_Templates::header_social_networks( array(
									'tooltip_position' => 'bottom',
								) ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
