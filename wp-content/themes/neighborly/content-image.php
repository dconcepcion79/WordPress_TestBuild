<?php
/**
 * neighborly image post format content
 * @package neighborly
 *
 */?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="row-half-margin section">
        <header class="col grid-12 content-header">
    		<?php neighborly_format_images('image-post'); ?>
            <p><a href="<?php echo get_post_format_link( get_post_format() ) ?>"><?php echo get_post_format_string( get_post_format() ) ?></a> post by <?php is_multi_author() ? the_author_posts_link() : the_author(); ?> on <?php the_time( get_option( 'date_format' ) ); ?><br /><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?></p>
    	</header><!-- close .content-header -->
    </div>
    
    <hr />
    
    <!-- Show just the first image in the post -->
    <div class="content-full">
    	<img class="full-image" src="<?php echo neighborly_first_image(); ?>" alt="First image attached to the post <?php echo get_the_title() ?>" width="760" height="506" >
    </div><!-- close .content-full -->
    
</article><!-- close #post -->