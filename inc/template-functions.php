<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package 16th_Purley_Scout_Group
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function purley_scouts_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'purley_scouts_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function purley_scouts_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'purley_scouts_pingback_header' );


function purley_scouts_generate_ga() {

	$ga = get_theme_mod( 'analytics_google_tracking_id' );

	if ( $ga ):
		echo '<!-- Global site tag (gtag.js) - Google Analytics -->';
		echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . $ga . '"></script>';
		echo '<script>';
		echo 'window.dataLayer = window.dataLayer || [];';
		echo 'function gtag(){dataLayer.push(arguments);}';
		echo 'gtag("js", new Date());';
		echo 'gtag("config", "' . $ga . '");';
		echo '</script>';
	endif;

}
add_action( 'wp_head', 'purley_scouts_generate_ga' );