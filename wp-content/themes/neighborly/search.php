<?php
/**
 * Sets up the search pages
 * @package neighbourly
 */
?>

<?php get_header(); ?>

    <section class="site-content">

        <!-- The last bit here forces WordPress to show the error if a blank search is attempted -->
		<?php if ( have_posts() && strlen( trim(get_search_query()) ) != 0 ) : ?>
            
            <div class="row section">
                <div class="col grid-12 site-archive">
                    <?php $search = '"';
					$search .= get_search_query();
					$search .= '"'; ?>
                	<h2><?php printf( __( 'Search Results for %s', 'neighbourly' ), '<span>' . $search . '</span>' ); ?></h2>
                </div><!-- close .site-archive -->
            </div>

            <?php while ( have_posts() ) : the_post(); ?>

                <div class="row section">
                    <div class="col grid-12 site-post" role="main">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                    </div><!-- close .site-post -->
                </div>
            
            <?php endwhile; ?>

            <!-- Show older and newer posts -->
			<?php neighborly_paging_nav(); ?>

        <?php else : ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="row section">
                    <div class="col grid-12 site-archive">
                        <?php $search = '"';
						$search .= get_search_query();
						$search .= '"'; ?>
                		<h2><?php printf( __( 'Search Results for %s', 'neighbourly' ), '<span>' . $search . '</span>' ); ?></h2>
                    </div><!-- close .site-archive -->
                </div>
                
                <div class="row-no-margin section">
                    <header class="col grid-12 site-post">
                    	<p><?php _e( 'You have searched for something that could not be found. The following might be of assistance in finding whatever you are looking for:', 'neighbourly' ); ?></p>
                    </header><!-- close .site-post -->
                </div>
                
            </article><!-- close #post -->
            
            <div class="row section site-post">
                
                <div class="col grid-6 sidebar-widget">
                    <h3 class="sidebar-widget-title">Search</h3>
                    <?php get_search_form(); ?>
                </div><!-- close .sidebar-widget -->
                
                <div class="col grid-6">
                <?php the_widget('WP_Widget_Recent_Posts', array('number' => 5), array('before_widget' => '<div class="sidebar-widget">','after_widget' => '</div>','before_title' => '<h3 class="sidebar-widget-title">', 'after_title' => '</h3>')); ?>
                </div>
            
            </div>

        <?php endif; ?>

	</section><!-- close .site-content -->

<?php get_footer(); ?>