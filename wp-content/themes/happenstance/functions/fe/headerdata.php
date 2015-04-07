<?php
/**
 * Headerdata of Theme options.
 * @package HappenStance
 * @since HappenStance 1.0.0
*/  

// additional CSS
if(	!is_admin()){
function happenstance_fonts_include () {
global $happenstance_options_db;
// Google Fonts
$bodyfont = $happenstance_options_db['happenstance_body_google_fonts'];
$headingfont = $happenstance_options_db['happenstance_headings_google_fonts'];
$descriptionfont = $happenstance_options_db['happenstance_description_google_fonts'];
$headlinefont = $happenstance_options_db['happenstance_headline_google_fonts'];
$postentryfont = $happenstance_options_db['happenstance_postentry_google_fonts'];
$sidebarfont = $happenstance_options_db['happenstance_sidebar_google_fonts'];
$menufont = $happenstance_options_db['happenstance_menu_google_fonts'];

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('happenstance-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('happenstance-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('happenstance-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('happenstance-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('happenstance-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('happenstance-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('happenstance-google-font8', $menufonturl);
		 } 
}
add_action( 'wp_enqueue_scripts', 'happenstance_fonts_include' );
}

// additional CSS
function happenstance_css_include () {
global $happenstance_options_db;
		if ( $happenstance_options_db['happenstance_css'] == 'Gray' ){
			wp_enqueue_style('happenstance-style-gray', get_template_directory_uri().'/css/colors/gray.css');
		}
    
		if ( $happenstance_options_db['happenstance_css'] == 'Green' ){
			wp_enqueue_style('happenstance-style-green', get_template_directory_uri().'/css/colors/green.css');
		}
    
    if ( $happenstance_options_db['happenstance_css'] == 'Purple' ){
			wp_enqueue_style('happenstance-style-purple', get_template_directory_uri().'/css/colors/purple.css');
		}
    
    if ( $happenstance_options_db['happenstance_layout'] == 'Wide' ){
			wp_enqueue_style('happenstance-wide-layout', get_template_directory_uri().'/css/wide-layout.css');
		}
}
add_action( 'wp_enqueue_scripts', 'happenstance_css_include' );

// Outputs additional CSS based on the Theme Options panel custom settings.
function happenstance_styles_method() {
  global $happenstance_options_db;
	wp_enqueue_style( 'happenstance-style', get_stylesheet_uri() );
        $background_color = get_background_color();
        $layout_style = $happenstance_options_db['happenstance_layout'];
        $background_pattern_opacity = $happenstance_options_db['happenstance_background_pattern_opacity'];
        $display_main_shadow = $happenstance_options_db['happenstance_display_main_shadow'];
        $display_sidebar = $happenstance_options_db['happenstance_display_sidebar'];
        $display_sidebar_archives = $happenstance_options_db['happenstance_display_sidebar_archives'];
        $display_search_form = $happenstance_options_db['happenstance_display_search_form'];
        $display_meta_post_entry = $happenstance_options_db['happenstance_display_meta_post_entry'];
        $bodyfont = $happenstance_options_db['happenstance_body_google_fonts'];
        $headingfont = $happenstance_options_db['happenstance_headings_google_fonts'];
        $descriptionfont = $happenstance_options_db['happenstance_description_google_fonts'];
        $headlinefont = $happenstance_options_db['happenstance_headline_google_fonts'];
        $postentryfont = $happenstance_options_db['happenstance_postentry_google_fonts'];
        $sidebarfont = $happenstance_options_db['happenstance_sidebar_google_fonts'];
        $menufont = $happenstance_options_db['happenstance_menu_google_fonts'];
        $own_css = $happenstance_options_db['happenstance_own_css']; 

// User defined Custom CSS
if ($own_css != '') {
        $own_css_custom_css = esc_html($own_css);
        wp_add_inline_style( 'happenstance-style', $own_css_custom_css );
}

// Background color - Entry headlines background
if ($background_color != '' && $layout_style == 'Wide') {
        $background_color_custom_css = ".entry-headline .entry-headline-text, .sidebar-headline .sidebar-headline-text { background-color: #$background_color; }";
        wp_add_inline_style( 'happenstance-style', $background_color_custom_css );
}

// Background Pattern Opacity
if ($background_pattern_opacity != '' && $background_pattern_opacity != '100' && $background_pattern_opacity != 'Default') {
        $background_pattern_opacity_custom_css = "#wrapper .pattern { opacity: 0.$background_pattern_opacity; filter: alpha(opacity=$background_pattern_opacity); }";
        wp_add_inline_style( 'happenstance-style', $background_pattern_opacity_custom_css );
}
elseif ($background_pattern_opacity == '100') {
        $background_pattern_opacity_custom_css = "#wrapper .pattern { opacity: 1; filter: alpha(opacity=100); }";
        wp_add_inline_style( 'happenstance-style', $background_pattern_opacity_custom_css );
}

// Display Shadow
if ($display_main_shadow == 'Hide') {
        $display_main_shadow_custom_css = "#wrapper #container-shadow { -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none; }";
        wp_add_inline_style( 'happenstance-style', $display_main_shadow_custom_css );
}

// Display Sidebar on Posts/Pages
if ($display_sidebar == 'Hide') {
        $display_sidebar_custom_css = ".page #container #main-content #content, .single #container #main-content #content, .error404 #container #main-content #content, .tribe-events-page-template #container #main-content #content { width: 100%; }";
        wp_add_inline_style( 'happenstance-style', $display_sidebar_custom_css );
}

// Display Sidebar on Archives
if ($display_sidebar_archives == 'Hide') {
        $display_sidebar_archives_custom_css = ".blog #container #main-content #content, .archive #container #main-content #content, .search #container #main-content #content { width: 100%; } .archive #sidebar { display: none; }";
        wp_add_inline_style( 'happenstance-style', $display_sidebar_archives_custom_css );
}

// Display header Search Form - header content width
if ($display_search_form == 'Hide') {
        $display_search_form_custom_css = "#wrapper #header .header-content .site-title, #wrapper #header .header-content .site-description, #wrapper #header .header-content .header-logo { max-width: 100%; }";
        wp_add_inline_style( 'happenstance-style', $display_search_form_custom_css );
}

// Display Meta Box on post entries - styling
if ($display_meta_post_entry == 'Hide') {
        $display_meta_post_entry_custom_css = "#wrapper #main-content .post-entry .attachment-post-thumbnail { margin-bottom: 17px; } #wrapper #main-content .post-entry .post-entry-content { margin-bottom: -4px; }";
        wp_add_inline_style( 'happenstance-style', $display_meta_post_entry_custom_css );
}

// Body font
if ($bodyfont != 'default' && $bodyfont != '') {
        $bodyfont_custom_css = "html body, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper textarea, #wrapper button, #wrapper select, #wrapper #content .breadcrumb-navigation, #wrapper #main-content .post-meta, html #wrapper .tribe-events-schedule h3, html #wrapper .tribe-events-schedule span, #wrapper #tribe-events-content .tribe-events-calendar .tribe-events-month-event-title { font-family: $bodyfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'happenstance-style', $bodyfont_custom_css );
}

// Site title font
if ($headingfont != 'default' && $headingfont != '') {
        $headingfont_custom_css = "#wrapper #header .site-title { font-family: $headingfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'happenstance-style', $headingfont_custom_css );
}

// Site description font
if ($descriptionfont != 'default' && $descriptionfont != '') {
        $descriptionfont_custom_css = "#wrapper #header .site-description {font-family: $descriptionfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'happenstance-style', $descriptionfont_custom_css );
}

// Page/post headlines font
if ($headlinefont != 'default' && $headlinefont != '') {
        $headlinefont_custom_css = "#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading, #wrapper #comments .entry-headline { font-family: $headlinefont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'happenstance-style', $headlinefont_custom_css );
}

// Post entry headline font
if ($postentryfont != 'default' && $postentryfont != '') {
        $postentryfont_custom_css = "#wrapper #main-content .post-entry .post-entry-headline, #wrapper #main-content .grid-entry .grid-entry-headline, html #wrapper #main-content .tribe-events-list-event-title { font-family: $postentryfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'happenstance-style', $postentryfont_custom_css );
}

// Sidebar and Footer widget headlines font
if ($sidebarfont != 'default' && $sidebarfont != '') {
        $sidebarfont_custom_css = "#wrapper #container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: $sidebarfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'happenstance-style', $sidebarfont_custom_css );
}

// Main Header menu font
if ($menufont != 'default' && $menufont != '') {
        $menufont_custom_css = "#wrapper #header .menu-box ul li a { font-family: $menufont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'happenstance-style', $menufont_custom_css );
}

}
add_action( 'wp_enqueue_scripts', 'happenstance_styles_method' );
?>