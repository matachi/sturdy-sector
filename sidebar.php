<?php
/**
 * @package WordPress
 * @subpackage Sturdy_Sector
 * @since Sturdy Sector 1.0
 */
?>

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <div id="sidebar">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div><!-- #secondary -->
    <?php endif; ?>
