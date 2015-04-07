<?php
/**
 * Sets up single pages
 * @package neighborly
 */
?>

<?php get_header(); ?>
    
    <div class="row section">
        <section class="col grid-12 site-post" role="main">

    		<?php while ( have_posts() ) : the_post(); ?>

        		<?php get_template_part( 'content', 'single' ); ?>

        		<?php neighborly_post_nav(); ?>
		
				<?php $neighborly_author = get_the_author_meta('description'); ?>
				<?php $neighborly_image = get_post_format(); ?>
                
                <!-- if the author details have been completed -->
				<?php if ($neighborly_author): ?>
                
                    <div class="row section info-boxes">
                        
                         <div class="col grid-6 info">
                              <h2>Meta Data</h2>
                              <p>Title: <?php the_title(); ?><br />Date Posted: <?php the_date(); ?><br />Posted By: <?php is_multi_author() ? the_author_posts_link() : the_author(); ?><br />Category: <?php echo get_the_category_list(', '); ?><br /><?php the_tags(); ?><br /><?php edit_post_link('Edit'); ?></p>
                         </div><!-- close .info -->
                         
                        <div class="col grid-6 bio">
                            <h2><?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?></h2>
                            <span class="alignright"><?php echo get_avatar( get_the_author_meta('email'), '50', '', 'Photo of article author' ); ?></span>
                            <p><?php the_author_meta('description'); ?></p>
                        </div><!-- close .bio -->
            
                    </div>
                        
				<?php else: ?>
                
                	<div class="row section info-boxes">
                    
                        <div class="col grid-12 info">
                             <h2>Meta Data</h2>
                             <p>Title: <?php the_title(); ?><br />Date Posted: <?php the_date(); ?><br />Posted By: <?php the_author_posts_link(); ?><br />Category: <?php echo get_the_category_list(', '); ?><br /><?php the_tags(); ?><br /><?php edit_post_link('Edit'); ?></p>
                        </div><!-- close .info -->
                    
                    </div>
                
                <?php endif; ?>
                    
				<?php
                    if ( comments_open() || '0' != get_comments_number() ) :
                        comments_template('', true);
                    endif;
                ?>
        
    		<?php endwhile; ?>
    	
        </section><!-- close .site-post -->
    
    </div>
        
<?php get_footer(); ?>