<?php
/**
 * Template part for displaying comment form.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SmilePure
 * @since   1.0
 */

if ( post_password_required() ) {
	return;
}

if ( ! comments_open() ) {
	return;
}
?>
<div class="page-comment-form">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php Smilepure_Templates::comment_form(); ?>
			</div>
		</div>
	</div>
</div>
