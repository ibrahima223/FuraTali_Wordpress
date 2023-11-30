<?php
$text = Smilepure::setting( 'header_style_15_text' );
$header_top_enable = Smilepure::setting( "header_style_15_header_top_enable" );
?>

<header id="page-header" <?php Smilepure::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<?php if ( $header_top_enable === '1' ) : ?>
						<div class="header-wrap header-wrap-top">
							<div class="header-wrap-left">
								<?php echo '<div class="header-top-text">' . $text . '</div>' ?>
							</div>

							<div class="header-wrap-right">
								<?php Smilepure_Templates::header_link_list(); ?>
							</div>
						</div>
					<?php endif; ?>

					<div class="header-wrap">

						<?php get_template_part( 'components/branding' ); ?>

						<div class="header-right">
							<?php get_template_part( 'components/navigation' ); ?>

							<div id="header-right-inner" class="header-right-inner">
								<?php Smilepure_Templates::header_social_networks( array(
									'tooltip_position' => 'bottom',
								) ); ?>
								<?php Smilepure_Templates::header_language_switcher(); ?>
								<?php Smilepure_Templates::header_search_button(); ?>
								<?php Smilepure_Woo::header_mini_cart(); ?>
								<?php Smilepure_Templates::header_button( array( 'extra_class' => 'glint-effect' ) ); ?>
							</div>

							<?php Smilepure_Templates::header_open_mobile_menu_button(); ?>
							<?php Smilepure_Templates::header_more_tools_button(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
