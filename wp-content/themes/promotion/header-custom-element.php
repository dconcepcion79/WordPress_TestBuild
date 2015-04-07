<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="<?php get_option_tree('favicon', '', true); ?>" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
<?php if (get_option_tree('responsive_layout') == 'Responsive layout only for smartphones') {?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/mobile.css" type="text/css" media="screen" />
<?php } elseif (get_option_tree('responsive_layout') == 'Responsive layout for smartphones and tablets') { ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/mobile-all.css" type="text/css" media="screen" />
<?php } ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if IE 7 ]>
<link href="<?php bloginfo('template_url'); ?>/ie7.css" media="screen" rel="stylesheet" type="text/css">
<![endif]-->
<!--[if IE 8 ]>
<link href="<?php bloginfo('template_url'); ?>/ie8.css" media="screen" rel="stylesheet" type="text/css">
<![endif]-->
<!--[if lte IE 6]>
<div id="ie-message">Your browser is obsolete and does not support this webpage. Please use newer version of your browser or visit <a href="http://www.ie6countdown.com/" target="_new">Internet Explorer 6 countdown page</a>  for more information. </div>
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
wp_head(); 
?>

<?php include 'var.php'; ?> 
<?php get_option_tree('analytics_code', '', true); ?> 
</head>
<body <?php body_class(); ?>>

<!-- *******************************Logo & Menu****************************** -->
<div id="horiz_m_bg">
<?php get_sidebar('top') ?>
<div id="horiz_m" class="size-wrap">

<div id="logo">
<?php if (!get_option_tree('logo_uploud')){ ?><a href="<?php bloginfo('url'); ?>"><h1><?php bloginfo('name'); ?></h1></a> <?php } else { ?>
<a href="<?php bloginfo('url'); ?>"><img src="<?php get_option_tree('logo_uploud', '', true); ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } ?>
</div><!--#logo-->

<div id="main_menu" class="slidemenu">
<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'items_wrap' => '<ul id="primary-main-menu" class=%2$s>%3$s</ul>', 'fallback_cb' => false)); ?>  
</div><!--#main_menu-->

</div><!--#horiz_m-->
</div><!--#horiz_m_bg-->
<div class="menu_shadow"></div>


<!-- *******************************Subhead********************************** -->
<?php if ( get_post_meta($post->ID, 'custom_header_id', true) ) : ?>
	<div id="custom_header" class="size-wrap">
	<img src="<?php echo wp_get_attachment_url(get_post_meta($post->ID, 'custom_header_id', true)); ?> " alt="<?php bloginfo('name'); ?>" />
	</div><!--#custom_header-->
<?php else : ?>
	<?php if ( get_post_meta($post->ID, 'custom_header_html', true) ) : ?>
	<div id="subhead_no_bg">
		<div id="custom_header" class="size-wrap">
		<?php echo do_shortcode (get_post_meta($post->ID, 'custom_header_html', true)); ?>
		</div><!--#custom_header-->
	</div><!--#subhead_no_bg-->
	<?php endif; ?>
<?php endif; ?>
<?php if (  is_home() || is_category() || is_tag() ) { echo '<div id="subhead_no_bg"><div id="custom_header" class="size-wrap">', do_shortcode( get_option_tree('blog_header_html')) . '</div></div>'; } ?>

<!-- *******************************Before wrapper*************************** -->
<?php if ( is_home() || is_category() || is_tag() ) {if (get_option_tree('before_content_blog')) { get_sidebar('content');} } elseif ( get_post_meta($post->ID, 'content_sidebar_check', true) == 'on' ) { get_sidebar('content'); } ?>

<!-- *******************************Wrapper********************************** -->
<div id="wrapper">