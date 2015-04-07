<?php
/**
 * Neighbourly gallery post format content
 * @package neighbourly
 *
 */?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="row-half-margin section">
        <header class="col grid-12 content-header">
    		<?php neighborly_format_images('gallery-post'); ?>
            <p><a href="<?php echo get_post_format_link( get_post_format() ) ?>"><?php echo get_post_format_string( get_post_format() ) ?></a> post by <?php is_multi_author() ? the_author_posts_link() : the_author(); ?> on <?php the_time( get_option( 'date_format' ) ); ?><br /><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?></p>
    	</header><!-- close .content-header -->
    </div>
    
    <hr />
    
    <div class="row-half-margin section">
        <!-- Only show gallery if one exists -->
        <div class="col grid-12 content-full">
        	<?php if ( get_post_gallery() ) :
        		echo get_post_gallery();
    		endif;  ?>
        	<p><?php
        	wp_link_pages( array(
            'before' => '<div class="page-links">' . __( '<p>This post has been divided into separate sections.<br />Sections:', 'neighborly' ),
            'after'  => '</div>',
        	) );
        	?></p>
        </div><!-- close .content-full -->	
    </div>
    
</article><!-- close #post -->