<?php
/**
 * neighborly Archive Pages
 * @package neighborly
 *
 */?>

<?php get_header(); ?>
        
    <section class="site-content">
		
		<?php if ( have_posts() ) : ?>
    
            <div class="row section">
                
                <div class="col grid-12 site-archive">
                    
                    <h2>
					<?php
                    if ( is_category() ) :
                        _e( 'Archive for the ', 'neighborly') . single_cat_title() . _e( ' category', 'neighborly');

                    elseif ( is_tag() ) :
                        _e( 'Archive for the ', 'neighborly') . single_tag_title() . _e( ' tag', 'neighborly');
                        
                    elseif ( is_author() ) :
                       _e( 'Posts by ', 'neighborly') . the_author();

                    elseif ( is_day() ) :
                        printf( __( 'Day: %s', 'neighborly' ), '<span>' . get_the_date() . '</span>' );

                    elseif ( is_month() ) :
                        printf( __( 'Month: %s', 'neighborly' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'neighborly' ) ) . '</span>' );

                    elseif ( is_year() ) :
                        printf( __( 'Year: %s', 'neighborly' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'neighborly' ) ) . '</span>' );

                    elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                        _e( 'Archive for Asides', 'neighborly' );

                    elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                        _e( 'Archive for Galleries', 'neighborly');

                    elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                        _e( 'Archive for Images', 'neighborly');

                    elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                        _e( 'Archive for Videos', 'neighborly' );

                    elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                        _e( 'Archive for Quotes', 'neighborly' );

                    elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                        _e( 'Archive for Links', 'neighborly' );

                    elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                        _e( 'Archive for Statuses', 'neighborly' );

                    elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                        _e( 'Archive for Audios', 'neighborly' );

                    elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                        _e( 'Archive for Chats', 'neighborly' );

                    else :
                        _e( 'Archives', 'neighborly' );

                    endif;
                    ?>
                    </h2>
                    <?php
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) : ?>
                        <?php printf( '%s', $term_description ); ?>
                    <?php endif;
                    ?>
                
                </div><!-- close .site-archive -->
            
            </div>
                
            <?php while ( have_posts() ) : the_post(); ?>
    
                <div class="row section">
                    <div class="col grid-12 site-post" role="main">
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    </div><!-- close site-post -->
                </div>
    
            <?php endwhile; ?>
    
            <?php neighborly_paging_nav(); ?>
    
        <?php else : ?>
    
            <?php get_template_part( 'content', 'none' ); ?>
    
		<?php endif; ?>
        
   </section><!-- close .site-content -->

<?php get_footer(); ?>