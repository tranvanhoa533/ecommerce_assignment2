<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Trend
 */

global $trend_redux;
get_header(); ?>

	<!-- Breadcrumbs -->
	<div class="trend-breadcrumbs">
	    <div class="vc_container">
	        <div class="vc_row">
	            <div class="vc_col-md-8">
	                <h2><?php esc_attr_e( '404 Page not found', 'trend' ); ?></h2>
	            </div>
	            <div class="vc_col-md-4">
	                <ol class="breadcrumb pull-right">
	                    <?php trend_breadcrumb(); ?>
	                </ol>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- Page content -->
	<div id="primary" class="content-area">
	    <main id="main" class="vc_container blog-posts high-padding site-main" role="main">
	        <div class="vc_col-md-12 main-content">
				<section class="error-404 not-found">
					<header class="page-header">
						<h2 class="page-title text-center"><?php esc_attr_e( 'Sorry, this page does not exist', 'trend' ); ?></h2>
						<h3 class="page-title text-center"><?php esc_attr_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'trend' ); ?></h3>
					</header>

					<div class="page-content">
						<img src="<?php echo esc_attr($trend_redux['img_404']['url']); ?>" alt="Not Found">
						<h1 class="text-center"><?php esc_attr_e( 'Page Not Found !', 'trend' ); ?></h1>
					</div>
				</section>
			</div>
		</main>
	</div>

<?php get_footer(); ?>