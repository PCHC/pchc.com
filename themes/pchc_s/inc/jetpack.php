<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package PCHC
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function pchc_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'pchc_infinite_scroll_setup' );
