<header id="page-header" <?php Smilepure::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">

						<?php get_template_part( 'components/branding' ); ?>

						<?php get_template_part( 'components/navigation' ); ?>

						<div class="header-right">
							<div id="header-right-inner" class="header-right-inner">
								<?php
								$info_icon     = Smilepure::setting( 'header_style_22_info_icon' );
								$info_text     = Smilepure::setting( 'header_style_22_info_text' );
								$info_sub_text = Smilepure::setting( 'header_style_22_info_sub_text' );
								?>

								<?php if ( $info_text !== '' || $info_sub_text !== '' ): ?>
									<div class="header-right-info">
										<div class="info-wrap">
											<?php if ( $info_icon !== '' ): ?>
												<div class="info-icon">
													<span class="<?php echo esc_attr( $info_icon ); ?>"></span>
												</div>
											<?php endif; ?>

											<div class="info-content">
												<?php if ( $info_text !== '' ): ?>
													<div class="info-text"><?php echo esc_html( $info_text ); ?></div>
												<?php endif; ?>

												<?php if ( $info_sub_text !== '' ): ?>
													<h6 class="info-sub-text"><?php echo esc_html( $info_sub_text ); ?></h6>
												<?php endif; ?>
											</div>

										</div>
									</div>
								<?php endif; ?>

								<?php Smilepure_Templates::header_social_networks( array(
									'tooltip_position' => 'bottom',
								) ); ?>
								<?php Smilepure_Templates::header_language_switcher(); ?>
								<?php Smilepure_Woo::header_mini_cart(); ?>
								<?php Smilepure_Templates::header_search_form(); ?>
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
