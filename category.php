<?php
/**
 * @package WordPress
 * @subpackage Sturdy_Sector
 * @since Sturdy Sector 1.0
 */

get_header(); ?>

    <div id="main">

    <?php if ( have_posts() ) : ?>
        <header class="archive-header">
            <h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'sturdysector' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

        <?php if ( category_description() ) : // Show an optional category description ?>
            <div class="archive-meta"><?php echo category_description(); ?></div>
        <?php endif; ?>
        </header><!-- .archive-header -->

        <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post();

            /* Include the post format-specific template for the content. If you want to
             * this in a child theme then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );

        endwhile;

        sturdysector_content_nav( 'nav-below' );
        ?>

    <?php else : ?>
        <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>

    </div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
