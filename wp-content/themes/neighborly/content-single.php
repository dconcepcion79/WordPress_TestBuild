<?php
/**
 * The template used for displaying content on the single pages
 * @package neighborly
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="row-no-margin section">
        <header class="col grid-12 content-header">
    		<h2><?php the_title() ; ?></h2>
    	</header><!-- close .content-header -->
    </div>
	
	<div class="row-half-margin section">
        <div id="content-full" class="col grid-12 content-full">
			<?php the_content(); ?>
            <!-- Show transcript if it is a video post and if there is a transcript in the excerpt -->
			<?php if (has_post_format('video')) : ?>
            	<?php if ( !empty( $post->post_excerpt ) ) : ?>
                    <div id="transcript">
                        <h2>Video Transcript</h2>
                        <?php the_excerpt(); ?>
                    </div>
            	<?php endif; ?>
            <?php endif; ?>
            <!-- Show transcript if it is a audio post and if there is a transcript in the excerpt -->
			<?php if (has_post_format('audio')) : ?>
            	<?php if ( !empty( $post->post_excerpt ) ) : ?>
                    <div id="transcript">
                        <h2>Audio Transcript</h2>
                        <?php the_excerpt(); ?>
                    </div>
            	<?php endif; ?>
            <?php endif; ?>
    		<p><?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( '<p>This post has been divided into separate sections.<br />Sections:', 'neighborly' ),
				'after'  => '</div>',
			) );
			?></p>
    	</div><!-- close .content-full -->
    </div>
    
</article><!-- close #post -->