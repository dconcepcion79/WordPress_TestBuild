<?php 
/**
 * Library of Theme options functions.
 * @package HappenStance
 * @since HappenStance 1.0.0
*/

// Display Breadcrumb navigation
function happenstance_get_breadcrumb() { 
global $happenstance_options_db;
		if ($happenstance_options_db['happenstance_display_breadcrumb'] != 'Hide') { ?>
<?php if (function_exists( 'bcn_display' ) && !is_front_page()) { echo '<p class="breadcrumb-navigation">'; ?><?php bcn_display(); ?><?php echo '</p>'; } ?>
<?php } 
} 

// Display featured images on single posts
function happenstance_get_display_image_post() { 
global $happenstance_options_db;
		if ($happenstance_options_db['happenstance_display_image_post'] == '' || $happenstance_options_db['happenstance_display_image_post'] == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
}

// Display featured images on pages
function happenstance_get_display_image_page() { 
global $happenstance_options_db;
		if ($happenstance_options_db['happenstance_display_image_page'] == '' || $happenstance_options_db['happenstance_display_image_page'] == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
} ?>