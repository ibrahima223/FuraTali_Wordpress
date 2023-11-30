<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SmilePure
 * @since   1.0
 */

get_header( 'blank' );

$logo  = Smilepure::setting( 'error404_page_logo' );
$image = Smilepure::setting( 'error404_page_image' );
$title = Smilepure::setting( 'error404_page_title' );
$text  = Smilepure::setting( 'error404_page_text' );
?>

	<div class="full-height">
		<?php if ( $logo !== '' ): ?>
			<div class="error-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="<?php esc_attr_e( 'home', 'smilepure' ); ?>">
					<img src="<?php echo esc_url( $logo ); ?>"
					     alt="<?php esc_attr_e( 'Logo', 'smilepure' ); ?>"/>
				</a>
			</div>
		<?php endif; ?>

		<div class="container">
			<div class="row row-xs-center">
				<div class="col-md-4">
					<?php if ( $image !== '' ): ?>
						<div class="error-image">
							<img src="<?php echo esc_url( $image ); ?>"
							     alt="<?php esc_attr_e( 'Not Found Image', 'smilepure' ); ?>"/>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-8">
					<div class="error-404-content">
						<?php if ( $title !== '' ): ?>
							<h3 class="error-404-title">
								<?php echo wp_kses( $title, 'smilepure-default' ); ?>
							</h3>
						<?php endif; ?>

						<?php if ( $text !== '' ): ?>
							<div class="error-404-text">
								<?php echo wp_kses( $text, 'smilepure-default' ); ?>
							</div>
						<?php endif; ?>

						<div class="error-buttons">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
							   class="tm-button style-modern tm-button-grey"
							   id="tm-btn-go-back">
								<span><?php esc_html_e( 'Go back', 'smilepure' ); ?></span>
							</a>

							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
							   class="tm-button style-modern tm-button-primary">
								<span><?php esc_html_e( 'Home Page', 'smilepure' ); ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer( 'blank' );
