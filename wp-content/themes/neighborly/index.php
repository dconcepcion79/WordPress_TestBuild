<?php
/**
 * The template for displaying the so-called blog pages
 * @package neighborly
 */
?>

<?php get_header(); ?>
    
	<?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
        
        	<div class="row section">
                <div class="col grid-12 site-post">
                	<?php get_template_part( 'content', get_post_format() ); ?>
                </div><!-- close .site-post -->
            </div>

        <?php endwhile; ?>
        
        <?php if(function_exists('wp_pagenavi')) { ?>
  
			<?php wp_pagenavi(); ?>
  
		<?php } else { ?>
  
        	<!-- call links to older and newer posts -->
			<?php neighborly_paging_nav(); ?>
        
    	<?php } ?>

    <?php else : ?>

        <!-- If there are no posts -->
		<?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>
        
<?php get_footer(); ?>