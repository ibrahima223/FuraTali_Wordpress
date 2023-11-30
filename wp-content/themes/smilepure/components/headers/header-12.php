<header id="page-header" <?php Smilepure::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1" data-header-position="left">
		<div class="header-wrap">
			<?php get_template_part( 'components/branding' ); ?>

			<?php Smilepure_Templates::header_search_form(); ?>
			<?php Smilepure_Templates::header_search_button(); ?>
			<?php Smilepure_Templates::header_language_switcher(); ?>
			<?php get_template_part( 'components/navigation', 'vertical' ); ?>

			<div class="header-bottom">
				<?php Smilepure_Templates::header_social_networks( array(
					'tooltip_position' => 'top',
					'tooltip_enable'   => false,
				) ); ?>

				<?php Smilepure_Templates::header_text(); ?>

				<?php Smilepure_Templates::header_open_mobile_menu_button(); ?>
			</div>
		</div>
	</div>
</header>
