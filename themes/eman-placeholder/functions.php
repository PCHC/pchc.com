<?php

add_action('after_setup_theme','theme_ahoy', 16);

function theme_ahoy() {

    // launching operation cleanup
    add_action('init', 'theme_head_cleanup');
    // remove WP version from RSS
    add_filter('the_generator', 'theme_rss_version');

    // enqueue base scripts and styles
    add_action('wp_enqueue_scripts', 'theme_scripts_and_styles', 999);

} /* end theme ahoy */

function theme_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
  // remove WP version from css
  // add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
  // remove Wp version from scripts
  // add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );

} /* end theme head cleanup */

// remove WP version from RSS
function theme_rss_version() { return ''; }

/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function theme_scripts_and_styles() {
  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  if (!is_admin()) {

    // modernizr (without media query polyfill)
    wp_register_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3', false );
    wp_register_script( 'html5shiv', 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js', array(), '3.7.2', false );

    // register stylesheets
    wp_register_style( 'eman-stylesheet', get_template_directory_uri() . '/css/style.css', array(), '1', 'all' );
    wp_register_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.2/normalize.min.css', array(), '3.0.2', 'all' );
    
    wp_register_style( 'google-webfonts', 'https://fonts.googleapis.com/css?family=Bitter:400,700', array(), '' );

    // enqueue styles and scripts
   	wp_enqueue_style( 'normalize' );
    wp_enqueue_style( 'eman-stylesheet' );
    wp_enqueue_style('google-webfonts');
    wp_enqueue_script( 'modernizr' );
    wp_enqueue_script( 'html5shiv' );

    /*
    I recommend using a plugin to call jQuery
    using the google cdn. That way it stays cached
    and your site will load faster.
    */

    wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, null);
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'pchc-js' );

  }
}
