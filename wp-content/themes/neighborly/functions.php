<?php
/**
 * Neighborly functions and definitions
 *
 * @package neighborly
 */

if ( ! function_exists( 'neighborly_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function neighborly_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) { 
		$content_width = 760; 
	}
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on neighborly, use a find and replace
	 * to change 'neighborly' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'neighborly', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'neighborly' ),
		
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'video' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'neighborly_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	
   // Add theme support for the JetPack infinity scroll.
    add_theme_support( 'infinite-scroll', array(
      	'posts_per_page' => 20,
   		'container'      => 'post',
      	'footer_widgets' => array( 'footer-sidebar-1', 'footer-sidebar-2', 'footer-sidebar-3', ),
      	'footer'         => 'page',
    ) );
	//Add theme support for the JetPack featured ontent.
	add_theme_support( 'featured-content', array(
    'filter'     => 'neighborly_get_featured_content',
    'max_posts'  => 4,
) );
}
endif; // neighborly_setup
add_action( 'after_setup_theme', 'neighborly_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
 add_action( 'widgets_init', 'neighborly_widgets_init' );
 
function neighborly_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 1', 'neighborly' ),
		'id'            => 'footer-sidebar-1',
		'description'   => __( 'You can add widget(s) in up to 3 widget areas just above the footer. (See inc/footer-widgets.php for more details).', 'neighborly' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="sidebar-widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'neighborly' ),
		'id'            => 'footer-sidebar-2',
		'description'   => __( 'You can add widget(s) in up to 3 widget areas just above the footer. (See inc/footer-widgets.php for more details).', 'neighborly' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="sidebar-widget-title">',
		'after_title'   => '</h3>',
	) );
}
// Enqueue scripts and styles.
function neighborly_scripts() {
	wp_enqueue_style( 'neighborly-reset', get_template_directory_uri() . '/css/reset.css' );
	wp_enqueue_style( 'neighborly-grid', get_template_directory_uri() . '/css/grid.css' );
	wp_enqueue_style( 'neighborly-genericons', get_template_directory_uri().'/css/genericons/genericons.css' );
	wp_enqueue_style( 'neighborly-style', get_stylesheet_uri() );
	wp_enqueue_script( 'neighborly-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'neighborly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'neighborly_scripts' );
// Load custom editor styles
function neighborly_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/css/custom-edit-style.css' );
}
/**
 * Implement the Custom Header feature.
 * All relevant fustions to implement the custom header inluded here.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 * The paging_nav, post_nav and comments untions included here.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 * Includes the ilter for wp_title as well as the paginate,
 * first_image and copyright_notice functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 * All the necessary stuff for the settings etc. as used by the options setup in the customizer.
 * Sanitization functions used included here as well.
 */
require get_template_directory() . '/inc/customizer.php';
/* Load media file to fetch first video or audio from posts */
require get_template_directory() . '/inc/media.php';
/**
 /* Remove title attributes from category lists */
function neighborly_list_categories_remove_title_attributes($output) {
	$output = preg_replace('` title="(.+)"`', '', $output);
	return $output;
}
add_filter('wp_list_categories', 'neighborly_list_categories_remove_title_attributes');
/**
 * Function for featured content 
 */
function neighborly_get_featured_content() {
    return apply_filters( 'neighborly_get_featured_content', array() );
}
/**
 * Add class external to comment authors url 
 */
add_filter( "get_comment_author_link", "neighborly_comment_author_link" );
function neighborly_comment_author_link( $author_link ){
    return str_replace( "<a", "<a class='external'", $author_link );
}
/*
 * Force error on blank search
 */
function neighborly_search_filter($query) {
    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
        $query->is_search = true;
        $query->is_home = false;
    }
    return $query;
}
add_filter('pre_get_posts','neighborly_search_filter');
/**
 * Add exif data
 */
function neighborly_post_thumbnail_exif_data($postID = NULL) {
    // if $postID not specified, then get global post and assign ID
    if (!$postID) {
        global $post;
        $postID = $post->ID;
    }
    if (has_post_thumbnail($postID)) {
        // get the meta data from the featured image
        $postThumbnailID = get_post_thumbnail_id( $postID );
        $photoMeta = wp_get_attachment_metadata( $postThumbnailID );
        // if the shutter speed is not equal to 0
        if ($photoMeta['image_meta']['shutter_speed'] != 0) {
            // Convert the shutter speed to a fraction
            if ((1 / $photoMeta['image_meta']['shutter_speed']) > 1) {
                if ((number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1)) == 1.3
                or number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1) == 1.5
                or number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1) == 1.6
                or number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1) == 2.5) {
                    $photoShutterSpeed = "1/" . number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1, '.', '') . " second";
                } else {
                    $photoShutterSpeed = "1/" . number_format((1 / $photoMeta['image_meta']['shutter_speed']), 0, '.', '') . " second";
                }
            } else {
                $photoShutterSpeed = $photoMeta['image_meta']['shutter_speed'] . " seconds";
            }
            // print our definition list
        ?>Aperture: f/<?php echo $photoMeta['image_meta']['aperture']; ?><br /><?php _e('ISO:', 'neighborly'); ?> <?php echo $photoMeta['image_meta']['iso']; ?><br /><?php _e('Shutter Speed:', 'neighborly'); ?> <?php echo $photoShutterSpeed; ?>.</p>
        <?php
        // if shutter speed exif is 0 then echo error message
        } else { ?>
            <div id="exif"><p><em><?php _e('EXIF data not found', 'neighborly'); ?></em></p></div>
        <?php }
    // if no featured image, echo error message
    } else { ?>
        <div id="exif"><p><?php _e('Featured image not found', 'neighborly'); ?></p></div>
    <?php }
}
// Exclude pages from search results 
add_filter( 'pre_get_posts', 'neighborly_exclude_pages' );
function neighborly_exclude_pages( $query ) {
    if ( $query->is_search )
		$query->set( 'post_type', 'post' );
    return $query;
}