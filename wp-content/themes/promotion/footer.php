</div><!-- #wrapper -->

<?php get_sidebar('footer'); ?>

<div id="bottom_elements_background">
<div id="bottom_elements" class="size-wrap">
<?php if (get_option_tree('copyright_area_text')) { ?>
	<div id="copyright" >
	<?php get_option_tree('copyright_area_text', '', true); ?>
	</div>
<?php } ?>
<div id="footer_navigation">
<?php wp_nav_menu( array('theme_location' => 'footer', 'container' => false, 'before' => '/', 'fallback_cb' => false)); ?>  
</div><!--#footer_navigation-->
<div class="clear"></div>
</div><!--#bottom_elements-->
</div><!--#bottom_elements_background-->

<?php if (get_option_tree('disable_sliding_sidebar_opt', '')) {} else { ?>
	<div class="sliding_sidebar closed" >  
		<div class="sliding_sidebar_content">
		<a class="handle" href="http://link-for-non-js-users"></a>
		<?php get_sidebar('sliding'); ?>
		</div>
	</div>

	<script>
		var $j = jQuery.noConflict();
		$j(function(){
		$j('.sliding_sidebar').tabSlideOut({
		pathToTabImage: '<?php bloginfo('stylesheet_directory'); ?>/images/sliding_sidebar_buttons.png' });
		});
	</script>
<?php }?>	
	 

<?php wp_footer(); ?>
<?php $detect = new Mobile_Detect(); if ($detect->isMobile() && get_option_tree('disable_cufon_font_for_mobile_devices')) {} else{
if (!get_option_tree('disable_cufon_fonts', '')) { ?>
	<?php if (get_option_tree('use_custom_font', '')) { ?>
		<script type="text/javascript" src="<?php get_option_tree('upload_custom_cufon_font', '', true); ?>"></script>
	<?php } else { ?>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fonts/<?php get_option_tree('choose_cufon_font', '', true); ?>.js"></script>
<?php } ?>
<script type="text/javascript">
Cufon.replace('h1,h2,h3,h4,h5,h6,.recent_post-title, .su-service-title, .lb_heading, .su-heading-shell, .su_au_name, .su-pricing-title, .su-pricing-value', {hover: true });
</script>
<script type="text/javascript"> Cufon.now(); </script>
<?php } }?>
<script>
if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) { 
    var viewportmeta = document.querySelector('meta[name="viewport"]'); 
    if (viewportmeta) { 
        viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0'; 
        document.body.addEventListener('gesturestart', function () { 
            viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6'; 
        }, false); 
    } 
} 
</script>
</body>
</html>