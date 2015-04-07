<?php
/**
 * neighborly main content template
 * used for standard posts
 * @package neighborly
 *
 */?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="row-half-margin section">
        <header class="col grid-12 content-header">
            <?php neighborly_format_images('standard-post'); ?>
            <p>Standard post by <?php is_multi_author() ? the_author_posts_link() : the_author(); ?> on <?php the_time( get_option( 'date_format' ) ); ?><br /><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?></p>
            <p><?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( '<p>This post has been divided into separate sections.<br />Sections:', 'neighborly' ),
                'after'  => '</div>',
            ) );
            ?></p>
        </header><!-- close .content-header -->
    </div>
    
    <hr />
    
	<!-- Show featured image if there is one -->
	<?php if ( has_post_thumbnail()) : ?>
        
        <div class="row-half-margin section">
            
            <div class="col grid-4 site-thumb">
                <a class="linked-image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'alignnone featured', 'alt' => 'Featured image attached to ' . the_title('', '', false), 'title' => 'Permalink to the post ' . the_title('', '', false) )); ?></a>
            </div>
            
            <div class="col grid-8 content-full">
                <?php the_content(__( '<span class="more-link">Continue reading </span>', 'neighborly' ) . the_title('', ' &raquo;', false)); ?>
            </div>	
            
        </div>
    
    <!-- No featured image -->
	<?php else : ?>
    
        <div class="row-half-margin section">
            <div class="col grid-12 content-full">
                <?php the_content(__( '<span class="more-link">Continue reading </span>', 'neighborly' ) . the_title('', ' &raquo;', false)); ?>
            </div><!-- close .content-full -->	
        </div>
    
    <?php endif ; ?>
    
</article><!-- close #post -->