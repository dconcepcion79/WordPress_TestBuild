<?php
/**
 * The template used for displaying page content in page.php
 * @package neighborly
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <header class="page-header"><!-- this header is not centered like on posts -->
		<h2><?php the_title(); ?></h2>
	</header><!-- close .page-header -->

	<div class="content-full">
		<?php the_content(); ?>
		<p><?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Sections:', 'neighborly' ),
				'after'  => '</div>',
			) );
		?></p>
	</div><!-- close .content-full -->
	
	<!-- Add edit link -->
	<?php edit_post_link( __( 'Edit', 'neighborly' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article><!-- close #post -->