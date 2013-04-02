<?php
/**
 * @package WordPress
 * @subpackage Sturdy_Sector
 * @since Sturdy Sector 1.0
 */

get_header(); ?>

    <div id="main">

        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'page' ); ?>
            <?php comments_template( '', true ); ?>
        <?php endwhile; // end of the loop. ?>

    </div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
