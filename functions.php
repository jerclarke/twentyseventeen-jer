<?php
/*
 * Jer's Twenty Seventeen Child Theme 
 * 
 * Various alterations of Twenty Seventeen for Simian Uprising
 * 
 * This file is part of simian-uprising-twenty-seventeen, twentyseventeen child theme.
 * 
 * All functions of this file will be loaded before of parent theme functions.
 * Learn more at https://codex.wordpress.org/Child_Themes.
 */

/**
 * Note: this function loads the parent stylesheet before, then child theme stylesheet
 * 
 * (leave it in place unless you know what you are doing.)
 */
function simian_uprising_twenty_seventeen_enqueue_child_styles() {
$parent_style = 'parent-style'; 
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 
		'child-style', 
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version') );
	}
add_action( 'wp_enqueue_scripts', 'simian_uprising_twenty_seventeen_enqueue_child_styles' );

/**
 * Enable shortcodes in widgets
 */
add_filter('widget_text', 'do_shortcode');

/**
 * TODO: Find a way to automatically insert widgets from sidebar-summary into the sidebar sidebar
 * when !is_home/!is_front_page so that we don't have weird style stuff happening
 */

/**
 * Register widget area for sidebar-summary 
 * 
 * Should show on homepage below header and in sidebar of articles
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simian_uprising_twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Summary Promo Widgets', 'twentyseventeen' ),
		'id'            => 'sidebar-summary',
		'description'   => __( 'Widgets added here will show in header of homepage and sidebar of articles.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'simian_uprising_twentyseventeen_widgets_init' );

/**
 * wp_head action to output Javascript etc.
 * 
 * Currently disabled
 * 
 * @param type $param
 */
function jer_twentyseventeen_wp_head($param) {
	$output = "";
	$output .= "<script type='text/javascript'>		
	jQuery(document).ready(function($) {

	 footer_widgets = $('.footer-widget-2').html()
//console.log (footer_widgets);
				
//$('.site-content').prepend('<div class=\"wrap header-widgets-wrap\"></div>');
//$('.header-widgets-wrap').prepend(footer_widgets);

$('.hideable').on('click', function() {
    $(this).hide();
  })
	
});
</script>";
	
	echo $output;
}
//add_action('wp_head', 'jer_twentyseventeen_wp_head');