<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Beardy
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function rey_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'infinityscroll',
		'footer'    => false,
		'posts_per_page'    => 6,
		'type'           => 'scroll',		
	) );
}
add_action( 'after_setup_theme', 'rey_jetpack_setup' );
