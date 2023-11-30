<?php
/**
 * The template for displaying all single posts.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SmilePure
 * @since   1.0
 */
get_header();

?>
<?php Smilepure_Templates::title_bar(); ?>

<?php get_template_part( 'components/blog-single/content-single' ); ?>

<?php
get_footer();
