<?php
/**
 * Implement Custom Header functionality for neighborly
 *
 * @package WordPress
 * @subpackage neighborly
 * @since neighborly 1.0
 */

/**
 * Set up the WordPress core custom header settings.
 *
 * @since neighborly 1.0
 *
 * @uses neighborly_header_style()
 * @uses neighborly_admin_header_style()
 * @uses neighborly_admin_header_image()
 */
function neighborly_custom_header_setup() {
	/**
	 * Filter neighborly custom-header support arguments.
	 *
	 * @since neighborly 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type bool   $header_text            Whether to display custom header text. Default false.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 1260.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 240.
	 *     @type bool   $flex_height            Whether to allow flexible-height header images. Default true.
	 *     @type string $admin_head_callback    Callback function used to style the image displayed in
	 *                                          the Appearance > Header screen.
	 *     @type string $admin_preview_callback Callback function used to create the custom header markup in
	 *                                          the Appearance > Header screen.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'neighborly_custom_header_args', array(
		'default-text-color'     	=> '000',
		'width'                  	=> 960,
		'height'                 	=> 200,
		'flex-width'    			=> true,
		'flex-height'    			=> true,
		'wp-head-callback'       	=> 'neighborly_header_style',
		'admin-head-callback'    	=> 'neighborly_admin_header_style',
		'admin-preview-callback' 	=> 'neighborly_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'neighborly_custom_header_setup' );

if ( ! function_exists( 'neighborly_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see neighborly_custom_header_setup().
 *
 */
function neighborly_header_style() {
	$text_color = get_header_textcolor();

	// If no custom color for text is set, let's bail.
	if ( display_header_text() && $text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="neighborly-header-css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php
		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-title a {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // neighborly_header_style


if ( ! function_exists( 'neighborly_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header screen.
 *
 * @see neighborly_custom_header_setup()
 *
 * @since neighborly 1.0
 */
function neighborly_admin_header_style() {
?>
	<style type="text/css" id="neighborly-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
		max-width: 960px;
		min-height: 48px;
		background: #f5f5f5;
		text-align: center;
	}
	#headimg h1 {
		margin: 10px 0 0 0;
		background: #f5f5f5;
		color: #000;
		text-align: center;
		padding: 0;
	}
	#headimg h1 a {
		text-decoration: none;
		color: #000;
	}
	#headimg h2 {
		margin: 10px 0 40px 0;
		color: #474747;
		background: #f5f5f5;
		text-align: center;
		padding: 0;
	}
	#headimg img {
		vertical-align: middle;
	}
	</style>
<?php
}
endif; // neighborly_admin_header_style

if ( ! function_exists( 'neighborly_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 *
 * @see neighborly_custom_header_setup()
 *
 * @since neighborly 1.0
 */
function neighborly_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name"<?php echo sprintf( ' style="color:#%s;"', get_header_textcolor() ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="displaying-header-text"><?php bloginfo( 'description' ); ?></h2>
    </div>
<?php
}
endif; // neighborly_admin_header_image