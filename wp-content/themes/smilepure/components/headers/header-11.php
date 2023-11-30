<?php
$text = Smilepure::setting( 'header_style_11_text' );
?>
<header id="page-header" <?php Smilepure::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="header-above">
			<?php get_template_part( 'components/branding' ); ?>

			<?php get_template_part( 'components/navigation' ); ?>

			<div class="header-right">
				<div id="header-right-inner" class="header-right-inner">
					<?php Smilepure_Templates::header_language_switcher(); ?>
					<?php Smilepure_Templates::header_button( array(
						'extra_class' => 'has-triangle-top-bottom',
					) ); ?>
					<?php Smilepure_Templates::header_social_networks( array(
						'tooltip_position' => 'bottom',
					) ); ?>
					<?php Smilepure_Woo::header_mini_cart(); ?>
				</div>

				<?php Smilepure_Templates::header_open_mobile_menu_button(); ?>
				<?php Smilepure_Templates::header_more_tools_button(); ?>
			</div>
		</div>

		<div class="header-below">
			<?php Smilepure_Templates::header_link_list(); ?>

			<div class="header-right-below">
				<?php Smilepure_Templates::header_search_form(); ?>

				<?php echo '<div class="header-text-wrap"><div class="header-text">' . $text . '</div></div>' ?>
			</div>
		</div>
	</div>
</header>
