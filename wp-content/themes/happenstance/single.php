<?php
/**
 * The post template file.
 * @package HappenStance
 * @since HappenStance 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if ( !has_post_format('aside') && !has_post_format('status') ) { ?>
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php the_title(); ?></span></h1>
<?php happenstance_get_breadcrumb(); ?>
    </div>
<?php } ?>
<?php happenstance_get_display_image_post(); ?>
<?php if ( $happenstance_options_db['happenstance_display_meta_post'] != 'Hide' ) { ?>
    <p class="post-meta">
      <span class="post-info-author"><i class="icon_pencil-edit" aria-hidden="true"></i><?php the_author_posts_link(); ?></span>
      <span class="post-info-date"><i class="icon_clock_alt" aria-hidden="true"></i><?php echo get_the_date(); ?></span>
<?php if ( comments_open() ) : ?>
      <span class="post-info-comments"><i class="icon_comment_alt" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'songwriter' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?></a></span>
<?php endif; ?>
    </p>
    <div class="post-info">
      <p class="post-category"><span class="post-info-category"><i class="icon_folder-alt" aria-hidden="true"></i><?php the_category(', '); ?></span></p>
<?php if ( has_tag() ) { ?>
      <p class="post-tags"><?php the_tags( '<span class="post-info-tags"><i class="icon_tag_alt" aria-hidden="true"></i>', ', ', '</span>' ); ?></p>
<?php } ?>
    </div>
<?php } ?>
    <div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'happenstance' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php edit_post_link( __( 'Edit', 'happenstance' ), '<p class="edit-link">', '</p>' ); ?>
<?php endwhile; endif; ?>
<?php if ( $happenstance_options_db['happenstance_next_preview_post'] != 'Hide' ) { ?>
<?php happenstance_prev_next('happenstance-post-nav'); ?>
<?php } ?>
<?php comments_template( '', true ); ?>
    </div>   
  </div> <!-- end of content -->
<?php if ($happenstance_options_db['happenstance_display_sidebar'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>