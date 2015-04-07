<?php
/** 
Template Name: Portfolio One Col.
**/
?>
<?php if (get_post_meta($post->ID, 'header_choice_select', true));{ get_header(get_post_meta($post->ID, 'header_choice_select', true)); } ?>
<div id="container_bg">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/portfolio_effects.js"></script>

<div id="portfolio" >

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="portfolio_page_content">
<?php the_content(); ?>
</div>
<?php endwhile; ?>

	<?php $args=array('post_type' => 'portfolio', 'posts_per_page' => -1);
	$loop = new WP_Query($args); 
	 ?>

	<!-- Filter-->
	<ul id="filter">
	<li class="current">
		<a class="all_cats" href="javascript:void(0);"><?php if (get_option_tree('portfolio_all_txt')) { get_option_tree('portfolio_all_txt', '', true);} else {_e( 'All', 'promotion' );} ?></a>
	</li>
	<?php wp_list_categories('taxonomy=services_rendered&title_li=' ); ?>
	</ul>
	<!-- End of Filter-->

	<?php while ($loop->have_posts()) : $loop->the_post(); 	?>
	<div class="portfolio-item">

	<?php if (has_post_thumbnail ()) : ?>
	<?php 
	$post_term = wp_get_post_terms( $post->ID, 'services_rendered' );
	$category_slug = $post_term[0]->slug;
	$style = get_post_meta($post->ID, 'pf_meta_box_select', true);
	?>

	<ul class="portfolio-one">
	<li class="<?php if($category_slug) { echo $category_slug; } else { echo 'all';} ?>">
	<div class="mosaic-block <?php echo $style; ?>">
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
	<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>"><?php the_post_thumbnail('portfolio', array('title' => "")); ?></a>
	<?php } else { ?>
	<?php the_post_thumbnail('portfolio', array('title' => "")); ?> 
	<?php } ?>
	</div>	<!-- end mosaic-backdrop -->
	</div>	<!-- end mosaic-block -->
	
	<div class="portfolio-item-text">
	<h2 class="pf_decription_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<div class="pf_decription">
	<?php echo do_shortcode(html_entity_decode (get_post_meta($post->ID, 'pf_meta_box_text7', true))); ?>
	</div><!--#pf_decription-->	

	</div> <!-- end portfolio-item text-->
	</li>
	</ul>
	<?php endif; ?> <!-- end of loop -->
	</div>	<!-- end portfolio-item -->
<?php endwhile; ?>
<div class="clear"></div>
</div><!--#portfolio-->
<br/><br/>
</div><!--#container-->
<?php get_footer(); ?>