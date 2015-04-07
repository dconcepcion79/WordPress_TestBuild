<?php
/**
 * Neighbourly video post format content
 * @package neighbourly
 *
 */?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="row-half-margin section">
        <header class="col grid-12 content-header">
    		<?php neighborly_format_images('video-post'); ?>
            <p><a href="<?php echo get_post_format_link( get_post_format() ) ?>"><?php echo get_post_format_string( get_post_format() ) ?></a> post by <?php is_multi_author() ? the_author_posts_link() : the_author(); ?> on <?php the_time( get_option( 'date_format' ) ); ?><br /><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?></p>
        </header><!-- close .content-header -->
    </div>
    
    <hr />
    
    <div class="row-half-margin section">
        <div id="content-full" class="col grid-12 content-full">
            <?php echo neighborly_first_media( array( 'type' => 'video', 'split_media' => true ) ); ?>
        </div><!-- close .content-full -->
    </div>
    <!-- Add transcript link if transcript has been added to the excerpt -->
    <div class="transcript-link">
        <?php if ( !empty( $post->post_excerpt ) ) : ?>
            <p><a href="<?php echo get_permalink(); ?>/#transcript">Text transcript for the <?php the_title();?> video</a></p>
        <?php endif; ?>	
     </div><!-- close .transcript-link -->
    
</article><!-- close #post -->