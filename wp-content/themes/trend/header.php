<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Trend
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php 
#Redux global variable
global $trend_redux;
?>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo esc_attr($trend_redux['trend_favicon']['url']); ?>">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <style type="text/css">
        /* From CSS Editor */
        <?php echo esc_attr( $trend_redux['css-code'] ); ?>    

        .breadcrumb a::after {
            content: "<?php echo esc_attr($trend_redux['breadcrumbs-delimitator']); ?>";
        }
    </style>
    <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<?php get_template_part( 'templates/header-template' ); ?>
