<?php
/**
 * Template Name: Coming Soon
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SmilePure
 * @since   1.0
 */

get_header( 'blank' );

$logo             = Smilepure::setting( 'coming_soon_page_logo' );
$image            = Smilepure::setting( 'coming_soon_page_image' );
$title            = Smilepure::setting( 'coming_soon_title' );
$countdown        = Smilepure::setting( 'coming_soon_countdown' );
$mailchimp_enable = Smilepure::setting( 'coming_soon_mailchimp_enable' );
$social_enable    = Smilepure::setting( 'coming_soon_social_networks_enable' );
?>

<div class="cs-container">
	<div class="cs-col cs-col-left">
		<?php if ( $logo !== '' ): ?>
			<div class="coming-soon-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
				   rel="<?php esc_attr_e( 'home', 'smilepure' ); ?>">
					<img src="<?php echo esc_url( $logo ); ?>"
					     alt="<?php esc_attr_e( 'Logo', 'smilepure' ); ?>"/>
				</a>
			</div>
		<?php endif; ?>

		<div class="cs-content">
			<?php if ( $title !== '' ) : ?>
				<?php echo '<h2 class="cs-title">' . $title . '</h2>'; ?>
			<?php endif; ?>

			<?php if ( $countdown !== '' ) : ?>
				<?php echo do_shortcode( '[tm_countdown datetime="' . $countdown . '"]' ) ?>
			<?php endif; ?>

			<?php if ( $mailchimp_enable === '1' && function_exists( 'mc4wp_show_form' ) ) : ?>
				<div class="cs-form">
					<?php echo do_shortcode( '[tm_mailchimp_form style="5"]' ); ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $social_enable === '1' ) : ?>
			<div class="cs-social-networks">
				<div class="inner">
					<?php Smilepure_Templates::social_icons( array(
						'display'        => 'icon',
						'tooltip_enable' => false,
					) ); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>

	<div class="cs-col cs-col-right">
		<div class="cs-content">
			<?php if ( $image !== '' ): ?>
				<div class="cs-image">
					<img src="<?php echo esc_url( $image ); ?>"
					     alt="<?php esc_attr_e( 'Coming soon', 'smilepure' ); ?>"/>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer( 'blank' ); ?>
