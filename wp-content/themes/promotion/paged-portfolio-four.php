<?php
/** 
Template Name: Paged Portfolio Four Col.
**/
?>
<?php if (get_post_meta($post->ID, 'header_choice_select', true));{ get_header(get_post_meta($post->ID, 'header_choice_select', true)); } ?>
<div id="container_bg">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/portfolio_effects.js"></script>

<div id="portfolio-four" >

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="portfolio_page_content">
<?php the_content(); ?>
</div>
<?php endwhile; ?>

	<?php
	  $portfoli_cat = get_post_meta($post->ID, 'portfolio_cat_id_value', true);
	  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	  $args=array(
		'post_type' => 'portfolio',
		'services_rendered' => $portfoli_cat,
		'post_status' => 'publish',
		'paged' => $paged,
		//'posts_per_page' => 1,
		//'caller_get_posts'=> 1
	  );
	  $temp = $wp_query;
	  $wp_query = null;
	  $wp_query = new WP_Query();
	  $wp_query->query($args);
	?>

	<?php while ( have_posts() ) : the_post();?>
	<div class="portfolio-four-item">

	<?php if (has_post_thumbnail ()) : 
	// Get portfolio item hover style
	$style = get_post_meta($post->ID, 'pf_meta_box_select', true); ?>
	
	<div class="portfolio-four">
	<div class="mosaic-block-four <?php echo $style; ?>">
	<?php if ($style != 'magnifier' && $style != 'magnifier2') {?>
	<a href="<?php the_permalink() ?>" class="mosaic-overlay">  
		<div class="details">
		<div class="pf_item_title"><?php the_title(); ?></div>
		<?php the_excerpt(); ?>
		</div>
	<?php } else {?> <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" class="mosaic-overlay"> <?php }?>
	</a> 
	<?php if ($style == 'magnifier2') {?>
		<div class="details">
		<a class="pf_title_link" href="<?php the_permalink() ?>" ><?php the_title(); ?></a>
		</div>
	<?php } ?>
	
	<div class="mosaic-backdrop">
	<?php if ($style != 'magnifier' && $style != 'magnifier2') {?>
	<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>"><?php the_post_thumbnail('portfolio-four', array('title' => "")); ?></a>
	<?php } else { ?>
	<?php the_post_thumbnail('portfolio-four', array('title' => "")); ?> 
	<?php } ?>
	</div>	<!-- end mosaic-backdrop -->
	</div>	<!-- end mosaic-block -->
	</div>
	<?php endif; ?> <!-- end of loop -->

	</div>	<!-- end portfolio-four-item -->

<?php endwhile; ?>
<div class="clear"></div>
</div><!--#portfolio-four-->
<br/>
<?php SEO_pager() ?>
<br/><br/>
</div><!--#container-->
<?php get_footer(); ?>