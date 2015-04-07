<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="entry-content">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'promotion' ), 'after' => '</div>' ) ); ?>

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
<h3 class="authorbox_title">About the author</h3>
<div id="authorarea">
<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'promotion_author_bio_avatar_size', 80 ) ); ?>
<div class="authorinfo">
<span class="authorinfo_title"><?php printf( get_the_author() ); ?></span>
<p><?php the_author_meta( 'description' ); ?></p>
</div>
<div class="clear"></div>
</div>
<?php endif; ?>

</div><!-- #post-## -->
<div class="entry-utility">
<?php promotion_posted_on(); ?>

<!-- Category -->
<?php if (get_option_tree('hide_category_from_meta', '')) {} else{ 
if(get_option_tree('blog_in_cat', '')) {$blog_in_cat = get_option_tree('blog_in_cat', ''); } else {$blog_in_cat =  __('in', 'promotion');}
echo '<span class="cat-links">', $blog_in_cat . '&nbsp;'; ?>
<?php printf( __( '%2$s', 'promotion' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
</span>
 <?php } ?> 
<!-- Category END -->


<?php edit_post_link( __( ' Edit', 'promotion' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>

<!-- Tags -->
<?php if (get_option_tree('hide_tags_from_meta', '')) {} else{ if( has_tag() ) { ?>
<div class="tag-link">
<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
</div>
<?php }} ?> 
<!-- Tags END -->
</div><!-- .entry-utility -->


<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>
</div>