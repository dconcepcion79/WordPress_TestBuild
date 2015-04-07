<?php
/**
 * neighborly Error 404 page
 * @package neighborly
 *
 */?>
<?php get_header(); ?>
        
   <section class="site-content">
        
        <div class="row section">
            
            <!-- Warn the user that something has gone wrong -->
            <div class="col grid-12 site-archive">
                <h2 class="archive"><?php _e( 'Oops!', 'neighborly' ); ?></h2>
                <p><?php _e( 'It looks like nothing was found at this location, something must have been moved for some or other reason. The following should help you find that which you are looking for:', 'neighborly' ); ?></p>
            </div><!-- close .site-archive -->
            
        </div>
        
        <div class="row section site-post">
        
            <!-- Show search form to assist in finding that which they are looking for -->
            <div class="col grid-6 sidebar-widget">
                <h3 class="sidebar-widget-title">Search</h3>
                <?php get_search_form(); ?>
            </div><!-- close .sidebar-widget -->
            
            <!-- The recent posts might also help in finding that whih is being looked for -->
            <div class="col grid-6">
            <?php the_widget('WP_Widget_Recent_Posts', array('number' => 5), array('before_widget' => '<div class="sidebar-widget">','after_widget' => '</div>','before_title' => '<h3 class="sidebar-widget-title">', 'after_title' => '</h3>')); ?>
            </div>
        
        </div><!-- close .site-post -->
                
    </section><!-- close .site-content -->
    
<?php get_footer(); ?>