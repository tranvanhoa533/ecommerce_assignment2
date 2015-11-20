<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Trend
 */
?>

<section class="no-results not-found">
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<h3 class="page-title"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'trend' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h3>

		<?php elseif ( is_search() ) : ?>

			<h2 class="page-title"><?php _e( 'Nothing Found', 'trend' ); ?></h2>
			<?php get_search_form(); ?>
			<h3 class="page-title"><?php _e( 'Try to search using another term via the form above', 'trend' ); ?></h3>

		<?php elseif ( is_author() ) : ?>

			<h2 class="page-title"><?php _e( 'Nothing Found', 'trend' ); ?></h2>
			<h3 class="page-title"><?php _e( 'Try to search for posts via the form above', 'trend' ); ?></h3>
			<?php get_search_form(); ?>

		<?php else : ?>

			<h3 class="page-title"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'trend' ); ?></h3>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
