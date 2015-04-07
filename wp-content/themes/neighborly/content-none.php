<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package neighborly
 */
?>

<section class="no-results not-found">
	
    <!-- Warn the user that nothing was found -->
    <header class="content-header">
		<h2><?php _e( 'No Posts As Yet', 'neighborly' ); ?></h2>
	</header><!-- close .content-header -->

	<div class="content-full">
		
		<!-- If the user can post articles let him do so -->
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'neighborly' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<!-- If no, just inform the user that there are no posts as yet -->
		<?php else: ?>
			<p><?php printf( __( 'It appears as if you are in a bit of a rush, no posts have been posted as yet.', 'neighborly' )) ; ?>
		<?php endif; ?>
        
	</div><!-- close .content-full -->

</section><!-- close .no-results -->
