<?php
/**
 * @package WordPress
 * @subpackage Sturdy_Sector
 * @since Sturdy Sector 1.0
 */

get_header(); ?>
    <div id="main">
    <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content' ); ?>
        <?php endwhile; ?>

        <?php sturdysector_content_nav( 'nav-below' ); ?>

    <?php else : ?>

        <article id="post-0" class="post no-results not-found">

        <?php if ( current_user_can( 'edit_posts' ) ) :
            // Show a different message to a logged-in user who can add posts.
        ?>
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'No posts to display', 'sturdysector' ); ?></h1>
            </header>

            <div class="entry-content">
                <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'sturdysector' ), admin_url( 'post-new.php' ) ); ?></p>
            </div><!-- .entry-content -->

        <?php else :
            // Show the default message to everyone else.
        ?>
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing Found', 'sturdysector' ); ?></h1>
            </header>

            <div class="entry-content">
                <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'sturdysector' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        <?php endif; // end current_user_can() check ?>

        </article><!-- #post-0 -->

    <?php endif; // end have_posts() check ?>

    </div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
