<header id="page-header" <?php Smilepure::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">
						<?php
						$info_icon_left      = Smilepure::setting( 'header_style_21_info_icon_left' );
						$info_text_left      = Smilepure::setting( 'header_style_21_info_text_left' );
						$info_sub_text_left  = Smilepure::setting( 'header_style_21_info_sub_text_left' );
						$info_link_text_left = Smilepure::setting( 'header_style_21_info_link_text_left' );

						$info_icon_right      = Smilepure::setting( 'header_style_21_info_icon_right' );
						$info_text_right      = Smilepure::setting( 'header_style_21_info_text_right' );
						$info_sub_text_right  = Smilepure::setting( 'header_style_21_info_sub_text_right' );
						$info_link_text_right = Smilepure::setting( 'header_style_21_info_link_text_right' );
						?>

						<?php if ( $info_text_left !== '' || $info_sub_text_left !== '' ): ?>
							<?php if ( $info_link_text_left !== '' ) : ?>
								<a href="<?php echo esc_url( $info_link_text_left ) ?>">
							<?php endif; ?>

							<div class="header-info header-info-left">
								<div class="info-wrap">
									<?php if ( $info_icon_left !== '' ): ?>
										<div class="info-icon">
											<span class="<?php echo esc_attr( $info_icon_left ); ?>"></span>
										</div>
									<?php endif; ?>

									<div class="info-content">
										<?php if ( $info_text_left !== '' ): ?>
											<div class="info-text"><?php echo esc_html( $info_text_left ); ?></div>
										<?php endif; ?>

										<?php if ( $info_sub_text_left !== '' ): ?>
											<h6 class="info-sub-text"><?php echo esc_html( $info_sub_text_left ); ?></h6>
										<?php endif; ?>
									</div>

								</div>
							</div>

							<?php if ( $info_link_text_left !== '' ) : ?>
								</a>
							<?php endif; ?>
						<?php endif; ?>

						<div class="header-wrap-content">
							<div class="header-wrap-above">
								<?php if ( $info_text_left !== '' || $info_sub_text_left !== '' ): ?>
									<?php if ( $info_link_text_left !== '' ) : ?>
										<a href="<?php echo esc_url( $info_link_text_left ) ?>">
									<?php endif; ?>

									<div class="header-info header-info-left">
										<div class="info-wrap">
											<?php if ( $info_icon_left !== '' ): ?>
												<div class="info-icon">
													<span class="<?php echo esc_attr( $info_icon_left ); ?>"></span>
												</div>
											<?php endif; ?>

											<div class="info-content">
												<?php if ( $info_text_left !== '' ): ?>
													<div class="info-text"><?php echo esc_html( $info_text_left ); ?></div>
												<?php endif; ?>

												<?php if ( $info_sub_text_left !== '' ): ?>
													<h6 class="info-sub-text"><?php echo esc_html( $info_sub_text_left ); ?></h6>
												<?php endif; ?>
											</div>

										</div>
									</div>

									<?php if ( $info_link_text_left !== '' ) : ?>
										</a>
									<?php endif; ?>
								<?php endif; ?>

								<?php get_template_part( 'components/branding' ); ?>

								<?php if ( $info_text_right !== '' || $info_sub_text_right !== '' ): ?>
									<?php if ( $info_link_text_right !== '' ) : ?>
										<a href="<?php echo esc_url( $info_link_text_right ) ?>">
									<?php endif; ?>
									<div class="header-info header-info-right">
										<div class="info-wrap">
											<div class="info-content">
												<?php if ( $info_text_right !== '' ): ?>
													<div class="info-text"><?php echo esc_html( $info_text_right ); ?></div>
												<?php endif; ?>

												<?php if ( $info_sub_text_right !== '' ): ?>
													<h6 class="info-sub-text"><?php echo esc_html( $info_sub_text_right ); ?></h6>
												<?php endif; ?>
											</div>

											<?php if ( $info_icon_right !== '' ): ?>
												<div class="info-icon">
													<span class="<?php echo esc_attr( $info_icon_right ); ?>"></span>
												</div>
											<?php endif; ?>
										</div>
									</div>
									<?php if ( $info_link_text_right !== '' ) : ?>
										</a>
									<?php endif; ?>
								<?php endif; ?>

								<?php Smilepure_Templates::header_open_mobile_menu_button(); ?>
							</div>

							<div class="header-wrap-below">
								<?php get_template_part( 'components/navigation' ); ?>
								<div class="header-right">
									<?php Smilepure_Templates::header_language_switcher(); ?>
									<?php Smilepure_Templates::header_search_button(); ?>
									<?php Smilepure_Woo::header_mini_cart(); ?>
								</div>
							</div>
						</div>

						<?php if ( $info_text_right !== '' || $info_sub_text_right !== '' ): ?>
							<?php if ( $info_link_text_right !== '' ) : ?>
								<a href="<?php echo esc_url( $info_link_text_right ) ?>">
							<?php endif; ?>
							<div class="header-info header-info-right">
								<div class="info-wrap">
									<div class="info-content">
										<?php if ( $info_text_right !== '' ): ?>
											<div class="info-text"><?php echo esc_html( $info_text_right ); ?></div>
										<?php endif; ?>

										<?php if ( $info_sub_text_right !== '' ): ?>
											<h6 class="info-sub-text"><?php echo esc_html( $info_sub_text_right ); ?></h6>
										<?php endif; ?>
									</div>

									<?php if ( $info_icon_right !== '' ): ?>
										<div class="info-icon">
											<span class="<?php echo esc_attr( $info_icon_right ); ?>"></span>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<?php if ( $info_link_text_right !== '' ) : ?>
								</a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
