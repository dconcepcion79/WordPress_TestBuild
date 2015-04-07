<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="description" content="<?php bloginfo('description'); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="hfeed site"><!-- closed in footer.php -->
        
        <div class="site-wrapper"><!-- closed in footer.php -->
        
            <header class="main-header">
            	<!-- This will have to be changed to a list should you require more than one skip-link -->
                <div class="row-no-margin section skip-links">
                    <div class="col grid-12">
                         <p><a class="screen-reader-text" href="#content"><?php _e( 'Skip to Content', 'neighborly' ); ?></a></p>
                    </div>  
                </div><!-- close .skip-links -->
                
                <?php if ( get_header_image() ) : ?>
                    <!-- The margins differ if there is header text along with the header image or not -->
					<?php if (display_header_text()): ?>
                        <div class="row-half-margin section header-image">
                    <?php else: ?>
                        <div class="row-half-margin section header-image-alone">
                     <?php endif; ?>
                        <div class="col grid-12 site-header">
                            <a class="linked-image" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="Return to the home page"></a>
                        </div><!-- close .site-header -->
                    </div><!-- close .header-image or header-image-alone -->
                <?php endif; ?>
                
                <?php if (display_header_text()): ?>
                    <div id="masthead" class="row-half-margin section site-header" role="banner">
                        <div class="col grid-12 header-main">
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/#page' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                        </div><!-- close .header-main -->
                    </div><!-- close .site-header -->
                <?php endif; ?>
                
                <div class="row-half-margin section">
                    <div class="col grid-12 site-search" role="search">
                        <?php get_search_form(); ?>
                    </div><!-- close .site-search -->
                </div>
                
            </header><!-- close .main-header -->
            
            <div class="row section">
                <nav id="site-navigation" class="col grid-12 main-navigation" role="navigation">
                    <button class="menu-toggle"><?php _e( 'Menu', 'neighborly' ); ?></button>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => '-1' ) ); ?>
                </nav><!-- close .main-navigation -->
            </div>
            
            <?php if (!is_home()): ?>
                
				<?php if ( function_exists( 'breadcrumb_trail' )): ?>
                    <div class="site-breadcrumb">
                    	<?php breadcrumb_trail(); ?>
                    </div>
                <?php endif; ?>
            
			<?php endif; ?>
            
            <section id="content" class="site-main" role="main"><!-- closed in footer.php -->