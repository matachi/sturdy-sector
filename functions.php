<?php

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 700;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Sturdy Sector supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Sturdy Sector 1.0
 */
function sturdysector_setup() {
    /*
     * Makes Twenty Twelve available for translation.
     *
     * Translations can be added to the /languages/ directory.
     * If you're building a theme based on Twenty Twelve, use a find and replace
     * to change 'sturdysector' to the name of your theme in all the template files.
     */
    //load_theme_textdomain( 'sturdysector', get_template_directory() . '/languages' );

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // This theme supports a variety of post formats.
    //add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu( 'primary', __( 'Primary Menu', 'sturdysector' ) );

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 699, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'sturdysector_setup' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Sturdy Sector 1.0
 */
function sturdysector_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'sturdysector' ),
        'id' => 'sidebar-1',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'sturdysector' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'sturdysector_widgets_init' );

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Sturdy Sector 1.0
 */
function sturdysector_scripts_styles() {

    /*
     * Fonts.
     */
    wp_enqueue_style( 'sturdysector-fonts', 'http://fonts.googleapis.com/css?family=Geo|Racing+Sans+One|Open+Sans' );

    /*
     * Loads our main stylesheet.
     */
    wp_enqueue_style( 'sturdysector-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'sturdysector_scripts_styles' );

if ( ! function_exists( 'sturdysector_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own sturdysector_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function sturdysector_entry_meta() {
    // Translators: used between list items, there is a space after the comma.
    $categories_list = get_the_category_list( __( ', ', 'sturdysector' ) );

    // Translators: used between list items, there is a space after the comma.
    $tag_list = get_the_tag_list( '', __( ', ', 'sturdysector' ) );

    $date = sprintf( '<time class="entry-date" datetime="%1$s">%2$s</time>',
        esc_attr( get_the_date( 'c' ) ),
        esc_attr( get_the_date( 'F j, Y, H:i' ) )
    );

    $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'sturdysector' ), get_the_author() ) ),
        get_the_author()
    );

    // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
    if ( $tag_list ) {
        $utility_text = __( 'Posted on: %1$s by %2$s<br />Categories: %3$s<br />Tags: %4$s', 'sturdysector' );
    } elseif ( $categories_list ) {
        $utility_text = __( 'Posted on: %1$s by %2$s<br />Categories: %3$s', 'sturdysector' );
    } else {
        $utility_text = __( 'Posted on: %1$s by %2$s', 'sturdysector' );
    }

    printf(
        $utility_text,
        $date,
        $author,
        $categories_list,
        $tag_list
    );
    //printf(
    //    $utility_text,
    //    $categories_list,
    //    $tag_list,
    //    $date,
    //    $author
    //);
}
endif;

if ( ! function_exists( 'sturdysector_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function sturdysector_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'sturdysector' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'sturdysector' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'sturdysector' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'sturdysector_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own sturdysector_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function sturdysector_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'sturdysector' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'sturdysector' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'sturdysector' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'sturdysector' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'sturdysector' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'sturdysector' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'sturdysector' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;
?>
