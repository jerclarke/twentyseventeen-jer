<?php
/**
 * Alternate header.php for twentyseventeen-jer child theme
 * 
 * Purpose: Include parent template, then add an extra widget section below header
 * @see sidebar.php which displays sidebar-summary for !is_home and !is_front_page
 */
require_once ( get_template_directory() . '/header.php' );

// Only show extra content on homepage
if (is_home() OR is_front_page()) :
	
	// If summary sidebar is active, display it with full-width wrapping to match content below
	if ( is_active_sidebar( 'sidebar-summary' ) ):
		echo "<div class='wrap header-widgets-wrap'>";
		echo "<aside class='widget-area' role='complementary'>";
		echo "<div class='widget-column footer-widget-1'>";
		dynamic_sidebar( 'sidebar-summary' ); 
		echo "</div><!-- .widget-column -->";
		echo "</aside><!-- .widget-area -->";
		echo "</div><!-- .header-widgets-wrap -->";
	endif; 
endif; 

