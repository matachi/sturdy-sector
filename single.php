<?php
/**
 * @package WordPress
 * @subpackage Sturdy_Sector
 * @since Sturdy Sector 1.0
 */

get_header(); ?>

    <div id="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', get_post_format() ); ?>

            <nav class="nav-single">
                <h3 class="assistive-text"><?php _e( 'Post navigation', 'sturdysector' ); ?></h3>
                <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'sturdysector' ) . '</span> %title' ); ?></span>
                <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'sturdysector' ) . '</span>' ); ?></span>
            </nav><!-- .nav-single -->

            <?php comments_template( '', true ); ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
