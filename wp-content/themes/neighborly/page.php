<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package neighborly
 */

get_header(); ?>
		
    <div class="row section">
        
        <div id="primary" class="col grid-12 content-area">
    
            <?php while ( have_posts() ) : the_post(); ?>
        
                <?php get_template_part( 'content', 'page' ); ?>
        
                <?php
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
                ?>
        
            <?php endwhile; ?>
    
        </div><!-- close #primary -->
    
    </div>

<?php get_footer(); ?>
