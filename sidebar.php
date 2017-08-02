<?php
/**
 * Alternate sidebar.php for twentyseventeen-jer child theme
 * 
 * Purpose: Output sidebar-summary sidebar on non-homepage screens then include parent template
 * @see header.php which displays sidebar-summary for is_home and is_front_page
 */
if (!is_home() AND !is_front_page()) :
	if ( is_active_sidebar( 'sidebar-summary' ) ):
		echo '<aside class="widget-area" id="secondary" role="complementary">';
		if ( is_active_sidebar( 'sidebar-summary' ) ) :
			echo '<div class="widget-column footer-widget-1">';
			dynamic_sidebar( 'sidebar-summary' );
			echo '</div><!-- .widget-column -->';
			echo '</aside><!-- .widget-area -->';
		endif;
	endif;
endif; 

/**
 * Import the rest of the sidebar
 */
require_once ( get_template_directory() . '/sidebar.php' );