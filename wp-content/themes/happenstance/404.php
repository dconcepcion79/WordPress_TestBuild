<?php
/**
 * The 404 page (Not Found) template file.
 * @package HappenStance
 * @since HappenStance 1.0.0
*/
get_header(); ?>
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php _e( 'Nothing Found', 'happenstance' ); ?></span></h1>
<?php happenstance_get_breadcrumb(); ?>
    </div>
    <div class="entry-content">
<p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'happenstance' ); ?></p>
<?php get_search_form(); ?>
    </div>   
  </div> <!-- end of content -->
<?php if ($happenstance_options_db['happenstance_display_sidebar'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>