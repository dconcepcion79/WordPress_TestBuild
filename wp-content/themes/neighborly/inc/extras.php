<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package neighborly
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function neighborly_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'neighborly_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function neighborly_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'neighborly_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function neighborly_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'neighborly' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'neighborly_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function neighborly_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'neighborly_setup_author' );

// If more than one page exists, return TRUE.
// Used to show pagination only when required
function neighborly_show_posts_nav() {
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}

// Get first image in a post, used on image post formats
function neighborly_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  {
$first_img = $matches[1][0];
}
  return $first_img;
}
//Function to display copyright notice in footer
function neighborly_copyright_notice() {
	$notice = 'Copyright &copy; ';
	$firstdate = intval( get_theme_mod( 'neighborly_first_date_setting' ) );
	if ( $firstdate < date('Y') && $firstdate != 0 ){
		$notice .= $firstdate;
		$notice .= ' - ';
	}
	$notice .= date('Y');
	
	$owner = esc_attr( get_theme_mod( 'neighborly_copyright_owner_setting' ) );
	if ($owner != '') {
		$notice .= ' ' . $owner;
	} else {
		$notice .= ' ' . get_bloginfo();
	}
	
	echo $notice;
}
// Function to add blockquote to format quote posts if they are not there.
add_filter( 'the_content', 'neighborly_quote_content' );
function neighborly_quote_content( $content ) {
	if ( has_post_format( 'quote' ) ) {
		preg_match( '/<blockquote.*?>/', $content, $matches );
		if ( empty( $matches ) )
			$content = "<blockquote>{$content}</blockquote>";
	}
	return $content;
}
//Function to add post format images to posts
function neighborly_format_images($format) {
	if ( is_sticky() ){
      	$images = '<h2><a href="' . get_permalink() . '" title="Permalink to the post ' . get_the_title() . '"><span class="sticky-post"></span><span class="'. $format . '"></span>' . get_the_title() . '</a></h2>';
   	} else {
      	$images = '<h2><a href="' . get_permalink() . '" title="Permalink to the post ' . get_the_title() . '"><span class="'. $format . '"></span>' . get_the_title() . '</a></h2>';
    }
	echo $images;
}
//Create a shortcode for buttons in posts and pages
function neighborly_button($atts, $content = null) {
   extract(shortcode_atts(array('url' => '#'), $atts));
   return '<a class="button" href="'.$url.'"><span>' . do_shortcode($content) . '</span></a>';
}
add_shortcode('button', 'neighborly_button');