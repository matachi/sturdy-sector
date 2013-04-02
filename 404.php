<?php
/**
 * @package WordPress
 * @subpackage Sturdy_Sector
 * @since Sturdy Sector 1.0
 */

get_header(); ?>

    <div id="main">

        <article id="post-0" class="post error404 no-results not-found">
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'sturdysector' ); ?></h1>
            </header>

            <div class="entry-content">
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sturdysector' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        </article><!-- #post-0 -->

    </div><!-- #main -->

<?php get_footer(); ?>
