<?php
/**
 * HappenStance functions and definitions.
 * @package HappenStance
 * @since HappenStance 1.0.0
*/

/**
 * HappenStance theme variables.
 *  
*/    
$happenstance_themename = "HappenStance";	//Theme Name
$happenstance_themever = "1.1.1";					//Theme version
$happenstance_shortname = "happenstance";	//Shortname 
$happenstance_manualurl = get_template_directory_uri() . '/docs/documentation.html';	//Manual Url
// Set path to HappenStance Framework and theme specific functions
$happenstance_be_path = get_template_directory() . '/functions/be/';									//BackEnd Path
$happenstance_fe_path = get_template_directory() . '/functions/fe/';									//FrontEnd Path 
$happenstance_be_pathimages = get_template_directory_uri() . '/functions/be/images';		//BackEnd Path
$happenstance_fe_pathimages = get_template_directory_uri() . '';	//FrontEnd Path
//Include Framework [BE]  
require_once ($happenstance_be_path . 'fw-options.php');	 	 // Framework Init  
// Include Theme specific functionality [FE] 
require_once ($happenstance_fe_path . 'headerdata.php');		 // Include css and js
require_once ($happenstance_fe_path . 'library.php');	       // Include library, functions

/**
 * HappenStance theme basic setup.
 *  
*/
function happenstance_setup() {
	// Makes HappenStance available for translation.
	load_theme_textdomain( 'happenstance', get_template_directory() . '/languages' );
  // This theme styles the visual editor to resemble the theme style.
  $happenstance_font_url = add_query_arg( 'family', 'Oswald', "//fonts.googleapis.com/css" );
  add_editor_style( array( 'editor-style.css', $happenstance_font_url ) );
	// Adds RSS feed links to <head> for posts and comments.  
	add_theme_support( 'automatic-feed-links' );
	// This theme supports custom background color and image.
	$defaults = array(
	'default-color' => '', 
  'default-image' => '',
	'wp-head-callback' => '_custom_background_cb',
	'admin-head-callback' => '',
	'admin-preview-callback' => '' );  
  add_theme_support( 'custom-background', $defaults );
	// This theme supports post thumbnails.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1170, 9999 );
  // This theme supports a custom header image.
  $args = array(
	'width' => 2000,
  'flex-width' => true,
  'flex-height' => true,
  'header-text' => false,
  'random-default' => true,);
  add_theme_support( 'custom-header', $args );
  // This theme supports Post formats.
  add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'status', 'video' ) );
  // This theme supports the Title Tag feature.
  add_theme_support( 'title-tag' );
  // This theme supports the WooCommerce plugin.
  if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  add_theme_support( 'woocommerce' ); }
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 734; }
}
add_action( 'after_setup_theme', 'happenstance_setup' );

/**
 * Enqueues scripts and styles for front-end.
 *
*/
function happenstance_scripts_styles() {
	global $wp_styles, $wp_scripts, $happenstance_options_db;
	// Adds JavaScript
	  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
    if ( $happenstance_options_db['happenstance_post_entry_format'] == 'Grid - Masonry' ) {
    if ( is_home() || is_archive() || is_search() ) {
    wp_enqueue_script( 'jquery-masonry' );
    if ( !is_rtl() ) {
    wp_enqueue_script( 'happenstance-masonry-settings', get_template_directory_uri() . '/js/masonry-settings.js', array(), '1.0', true ); } else {
    wp_enqueue_script( 'happenstance-masonry-settings-rtl', get_template_directory_uri() . '/js/masonry-settings-rtl.js', array(), '1.0', true ); }}}
    wp_enqueue_script( 'happenstance-placeholders', get_template_directory_uri() . '/js/placeholders.js', array( 'jquery' ), '2.0.8', true );
    if ( $happenstance_options_db['happenstance_display_scroll_top'] != 'Hide' ) {
    wp_enqueue_script( 'happenstance-scroll-to-top', get_template_directory_uri() . '/js/scroll-to-top.js', array( 'jquery' ), '1.0', true ); }
    if ( !is_page_template('template-landing-page.php') ) {
    wp_enqueue_script( 'happenstance-menubox', get_template_directory_uri() . '/js/menubox.js', array(), '1.0', true ); }
    wp_enqueue_script( 'happenstance-selectnav', get_template_directory_uri() . '/js/selectnav.js', array(), '0.1', true );
    wp_enqueue_script( 'happenstance-responsive', get_template_directory_uri() . '/js/responsive.js', array(), '1.0', true );
    wp_enqueue_script( 'happenstance-html5-ie', get_template_directory_uri() . '/js/html5.js', array(), '3.6', false );
    $wp_scripts->add_data( 'happenstance-html5-ie', 'conditional', 'lt IE 9' );
	// Adds CSS
    wp_enqueue_style( 'happenstance-elegantfont', get_template_directory_uri() . '/css/elegantfont.css' );
    wp_enqueue_style( 'happenstance-google-font-default', '//fonts.googleapis.com/css?family=Oswald&amp;subset=latin,latin-ext' );
    if ( class_exists( 'woocommerce' ) ) { wp_enqueue_style( 'happenstance-woocommerce-custom', get_template_directory_uri() . '/css/woocommerce-custom.css' ); }
}
add_action( 'wp_enqueue_scripts', 'happenstance_scripts_styles' );

/**
 * Backwards compatibility for older WordPress versions which do not support the Title Tag feature.
 *  
*/
if ( ! function_exists( '_wp_render_title_tag' ) ) {
function happenstance_wp_title( $title, $sep ) {
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	return $title;
}
add_filter( 'wp_title', 'happenstance_wp_title', 10, 2 );
}

/**
 * Register our menu.
 *
 */
function happenstance_register_my_menu() {
  register_nav_menu( 'main-navigation', __( 'Main Header Menu', 'happenstance' ) ); 
}
add_action( 'after_setup_theme', 'happenstance_register_my_menu' );

/**
 * Register our sidebars and widgetized areas.
 *
*/
function happenstance_widgets_init() {
  register_sidebar( array(
		'name' => __( 'Right Sidebar', 'happenstance' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar which appears on all posts and pages.', 'happenstance' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => ' <p class="sidebar-headline"><span class="sidebar-headline-text">',
		'after_title' => '</span></p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer left widget area', 'happenstance' ),
		'id' => 'sidebar-2',
		'description' => __( 'Left column with widgets in footer.', 'happenstance' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline"><span class="footer-headline-text">',
		'after_title' => '</span></p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer middle widget area', 'happenstance' ),
		'id' => 'sidebar-3',
		'description' => __( 'Middle column with widgets in footer.', 'happenstance' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline"><span class="footer-headline-text">',
		'after_title' => '</span></p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer right widget area', 'happenstance' ),
		'id' => 'sidebar-4',
		'description' => __( 'Right column with widgets in footer.', 'happenstance' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline"><span class="footer-headline-text">',
		'after_title' => '</span></p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer notices', 'happenstance' ),
		'id' => 'sidebar-5',
		'description' => __( 'The line for copyright and other notices below the footer widget areas. Insert here one Text widget. The "Title" field at this widget should stay empty.', 'happenstance' ),
		'before_widget' => '<div class="footer-signature"><div class="footer-signature-content">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'happenstance_widgets_init' );

/**
 * Post excerpt settings.
 *
*/
function happenstance_custom_excerpt_length( $length ) {
global $happenstance_options_db; 
if ($happenstance_options_db['happenstance_excerpt_length'] != '') {
return $happenstance_options_db['happenstance_excerpt_length'];
} else { return 40; }
}
add_filter( 'excerpt_length', 'happenstance_custom_excerpt_length', 20 );
function happenstance_new_excerpt_more( $more ) {
global $post;
return '...<br /><a class="read-more-button" href="'. esc_url( get_permalink($post->ID) ) . '">' . __( 'Read more', 'happenstance' ) . '</a>';}
add_filter( 'excerpt_more', 'happenstance_new_excerpt_more' );

if ( ! function_exists( 'happenstance_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
*/
function happenstance_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $html_id; ?>" class="navigation" role="navigation">
    <div class="navigation-inner">
			<h2 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'happenstance' ); ?></h2>
      <div class="nav-wrapper">
			 <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'happenstance' ),
	'next_text' => __( 'Next &rarr;', 'happenstance' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
        </p>
      </div>
		</div>
    </div>
	<?php endif;
}
endif;

/**
 * Displays navigation to next/previous posts on single posts pages.
 *
*/
function happenstance_prev_next($nav_id) { ?>
<?php $happenstance_previous_post = get_adjacent_post( false, "", true );
$happenstance_next_post = get_adjacent_post( false, "", false ); ?>
<div id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
	<div class="nav-wrapper">
<?php if ( !empty($happenstance_previous_post) ) { ?>
  <p class="nav-previous"><a href="<?php echo esc_url(get_permalink($happenstance_previous_post->ID)); ?>" title="<?php echo esc_attr($happenstance_previous_post->post_title); ?>"><?php _e( '&larr; Previous post', 'happenstance' ); ?></a></p>
<?php } if ( !empty($happenstance_next_post) ) { ?>
	<p class="nav-next"><a href="<?php echo esc_url(get_permalink($happenstance_next_post->ID)); ?>" title="<?php echo esc_attr($happenstance_next_post->post_title); ?>"><?php _e( 'Next post &rarr;', 'happenstance' ); ?></a></p>
<?php } ?>
   </div>
</div>
<?php } 

if ( ! function_exists( 'happenstance_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
*/
function happenstance_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'happenstance' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'happenstance' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<span><b class="fn">%1$s</b> %2$s</span>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author)', 'happenstance' ) . '</span>' : ''
					);
					printf( '<time datetime="%2$s">%3$s</time>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						// translators: 1: date, 2: time
						sprintf( __( '%1$s at %2$s', 'happenstance' ), get_comment_date(''), get_comment_time() )
					);
				?>
			</div><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'happenstance' ); ?></p>
			<?php endif; ?>

			<div class="comment-content comment">
				<?php comment_text(); ?>
			 <div class="reply">
			   <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'happenstance' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			   <?php edit_comment_link( __( 'Edit', 'happenstance' ), '<p class="edit-link">', '</p>' ); ?>
			</div><!-- .comment-content -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch;
}
endif;

/**
 * Function for adding custom classes to the menu objects.
 *
*/
add_filter( 'wp_nav_menu_objects', 'happenstance_filter_menu_class', 10, 2 );
function happenstance_filter_menu_class( $objects, $args ) {

    $ids        = array();
    $parent_ids = array();
    $top_ids    = array();
    foreach ( $objects as $i => $object ) {

        if ( 0 == $object->menu_item_parent ) {
            $top_ids[$i] = $object;
            continue;
        }
 
        if ( ! in_array( $object->menu_item_parent, $ids ) ) {
            $objects[$i]->classes[] = 'first-menu-item';
            $ids[]          = $object->menu_item_parent;
        }
 
        if ( in_array( 'first-menu-item', $object->classes ) )
            continue;
 
        $parent_ids[$i] = $object->menu_item_parent;
    }
 
    $sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
 
    foreach ( $sanitized_parent_ids as $i => $id )
        $objects[$i]->classes[] = 'last-menu-item';
 
    return $objects; 
}

/**
 * Function for rendering CSS3 features in IE.
 *
*/
add_filter( 'wp_head' , 'happenstance_pie' );
function happenstance_pie() { ?>
<!--[if IE]>
<style type="text/css" media="screen">
#container-shadow {
        behavior: url("<?php echo get_template_directory_uri() . '/css/pie/PIE.php'; ?>");
        zoom: 1;
}
</style>
<![endif]-->
<?php }

/**
 * WooCommerce custom template modifications.
 *  
*/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
function happenstance_woocommerce_modifications() {
  remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 ); 
}  
add_action ( 'init', 'happenstance_woocommerce_modifications' );
add_filter ( 'woocommerce_show_page_title', '__return_false' );
} ?>