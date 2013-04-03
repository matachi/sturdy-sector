<?php
/**
 * @package WordPress
 * @subpackage Sturdy_Sector
 * @since Sturdy Sector 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
    <header id="page">
        <div class="wrapper">
            <section id="title">
                <?php bloginfo( 'name' ); ?>
            </section>
                <?php if ( get_option( 'sturdysector_display_twitter_icon' ) == 'true' ) : ?>
                <section class="social-media-button" id="twitter">
                    <a href="https://twitter.com/<?php echo get_option( 'sturdysector_twitter_username' ); ?>">Twitter</a>
                </section>
                <?php endif; ?>
                <section class="social-media-button" id="rss">
                    <a href="<?php bloginfo('rss2_url'); ?>">RSS</a>
                </section>
            <nav id="page">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav>
        </div>
    </header>
    <section id="content">
        <div class="wrapper">
