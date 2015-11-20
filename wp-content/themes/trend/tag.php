<?php
/**
 * The template for displaying tags results pages.
 *
 * @package Trend
 */

get_header(); 


#Redux global variable
global $trend_redux;

$class = "";

if ( $trend_redux['trend_blog_layout'] == 'trend_blog_fullwidth' ) {
    $class = "vc_row";
}elseif ( $trend_redux['trend_blog_layout'] == 'trend_blog_right_sidebar' or $trend_redux['trend_blog_layout'] == 'trend_blog_left_sidebar') {
    $class = "vc_col-md-9";
}
$sidebar = $trend_redux['trend_blog_layout_sidebar'];
?>

<!-- Breadcrumbs -->
<div class="trend-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="vc_col-md-6">
                <h2>
                    <?php echo esc_attr__( 'Tag Archives: ', 'trend' ); ?>
                    <span><?php echo single_tag_title( '', false ); ?></span>
                </h2>
            </div>
            <div class="vc_col-md-6">
                <ol class="breadcrumb pull-right">
                    <?php trend_breadcrumb(); ?>
                </ol>
            </div>
        </div>
    </div>
</div>



<!-- Page content -->
<div class="high-padding">
    <!-- Blog content -->
    <div class="vc_container blog-posts">
        <div class="vc_row">

            <?php if ( $trend_redux['trend_blog_layout'] == 'trend_blog_left_sidebar' && is_active_sidebar( $sidebar ) ) { ?>
            <div class="vc_col-md-3 sidebar-content">
                <?php  dynamic_sidebar( $sidebar ); ?>
            </div>
            <?php } ?>

            <div class="<?php echo esc_attr($class); ?> main-content">
            <?php if ( have_posts() ) : ?>
                <div class="vc_row">
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );
                        ?>

                    <?php endwhile; ?>

                    <div class="trend-pagination pagination">             
                        <?php trend_pagination(); ?>
                    </div>
                </div>
            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>
            </div>

            <?php if ( $trend_redux['trend_blog_layout'] == 'trend_blog_right_sidebar' && is_active_sidebar( $sidebar )) { ?>
            <div class="vc_col-md-3 sidebar-content">
                <?php  dynamic_sidebar( $sidebar ); ?>
            </div>
            <?php } ?>
            
        </div>
    </div>



</div>

<?php get_footer(); ?>