<?php	/* If no posts.	 */ ?>

<?php if ( ! have_posts() ) : ?>
<div id="post-0" class="post not-found">
	<h2 class="post-entry-title"><?php _e( 'Not Found', 'promotion' ); ?></h2>
	<div class="entry-content">
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'promotion' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</div><!-- #post-0 -->
<?php endif; ?>

<?php	/* Start the Loop.	 */ ?>

<?php while ( have_posts() ) : the_post();?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'promotion' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

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

<!-- Comments -->
<?php if (get_option_tree('hide_comments_from_meta', '')) {} else{
if(get_option_tree('blog_comment', '')) {$comment = get_option_tree('blog_comment', ''); } else {$comment =  __('Comment', 'promotion');}
if(get_option_tree('blog_comments', '')) {$comments = get_option_tree('blog_comments', ''); } else {$comments =  __('Comments', 'promotion');}
if(get_option_tree('blog_leave', '')) {$leave_comments = get_option_tree('blog_leave', ''); } else {$leave_comments =  __('Leave a comment', 'promotion');}

echo '<span class="comments-link">'; comments_popup_link( ''.$leave_comments, '1 '.$comment, '% '.$comments);  echo '</span>'; 
 ?>
 <?php } ?> 
<!-- Comments END -->

<?php edit_post_link( __( ' Edit', 'promotion' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>

<!-- Tags -->
<?php if (get_option_tree('hide_tags_from_meta', '')) {} else{ if( has_tag() ) { ?>
<div class="tag-link">
<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
</div>
<?php }} ?> 
<!-- Tags END -->
</div><!-- .entry-utility -->
<div class="entry-content">
<?php
$read_more = get_option_tree('blog_read', ''); 
if ($read_more){ the_content( __( $read_more , 'promotion' ) ); }
else{ the_content( __( 'Read more', 'promotion' ) ); }?>

<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'promotion' ), 'after' => '</div>' ) ); ?>

<div class="clear"></div>
</div><!-- .entry-content -->
</div><!-- #post-## -->
<br/>	
<?php comments_template( '', true ); ?>
<?php endwhile; // End the loop. Whew. ?>
<?php SEO_pager() ?> 