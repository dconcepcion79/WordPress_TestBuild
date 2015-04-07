<?php
/**
 * There are two widget areas just above the footer.
 * If you add widgets to just one of these areas the widget(s) added will stretch across the full-width of the screen.
 * If you add widgets to both of these areas the widget(s) added will stretch across half of the width of the screen.
 * @package neighborly
**/
 ?>

			<?php
			// Just how many sidebars are active?
			$active_sidebars = 0;
			for ( $count=1; $count<=2; $count++ ) {
				if ( is_active_sidebar( 'footer-sidebar-' . $count ) ) {
					$active_sidebars++;
				}
			}
			// How many grids are needed
			if ( $active_sidebars > 0 ): ?>
				<?php $grid_class = "col grid-" . 12 / $active_sidebars;
				// Display the active footer sidebars
				for ( $count=1; $count<=2; $count++ ) {
					if ( is_active_sidebar( 'footer-sidebar-'. $count ) ) : ?>
						<div class="<?php echo $grid_class; ?>">
							<?php dynamic_sidebar( 'footer-sidebar-'. $count ); ?>
						</div>
					<?php endif;
				}

			endif; ?>