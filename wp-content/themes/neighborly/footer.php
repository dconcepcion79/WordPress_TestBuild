<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content section and all content after.
 * Also adds the footer widget areas should widgets be added there.
 * @package neighborly
**/
?>
		</section><!-- close #content opened in header.php -->
        
		<!--Nothing will happen if no widgets have been added to any of the footer widget areas -->
		<?php if(is_active_sidebar( 'footer-sidebar-1') || is_active_sidebar( 'footer-sidebar-2')): ?>
            <div class="row-no-margin section site-post">
				<?php get_template_part( 'inc/footer-widgets' ); ?>
            </div><!-- close .site-post -->
        <?php endif; ?>
        
        <footer id="footer" class="site-footer" role="contentinfo">
            
           <!-- Add the copyright notice -->
           <div class="row-no-margin section">
                <div id="colophon" class="col grid-12 colophon">
                    <p><?php neighborly_copyright_notice(); ?><br/>
                    <!-- You are welcome to remove the link below should you so wish -->
                    <a class="external" href="http://arnoldgoodway.co.za/free-wordpress-theme/">Neighborly</a><?php _e( ' WordPress Theme is licensed under the GNU GPL', 'neighborly' ); ?></p>
                </div>
            </div>
            
            <!-- Add the 'return to top' link -->
            <div class="row-half-margin section">
                <div class="col grid-12">
                      <span><a href="#page"><?php _e( 'Return to Top', 'neighborly' ); ?></a></span>
                </div>
            </div>
        
        </footer><!-- close #footer -->
        
	</div><!-- close .site-wrapper opened in header.php -->
    </div><!-- close #page opened in header.php -->

	<?php wp_footer(); ?>

</body>
</html>