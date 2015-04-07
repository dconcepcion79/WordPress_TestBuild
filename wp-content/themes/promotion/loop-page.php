<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'promotion' ), 'after' => '</div>' ) ); ?>
<?php edit_post_link( __( 'Edit', 'promotion' ), '<span class="edit-link">', '</span>' ); ?>

<div class="clear"></div>
</div><!-- .entry-content -->
</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>
