<?php
	add_action('wp_enqueue_scripts', 'child_theme_scripts_and_styles', 1000);
	
	function child_theme_scripts_and_styles(){
		global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
		if (!is_admin()) {
			// register child theme stylesheet
		    wp_register_style( 'pchc-child-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
		    wp_enqueue_style( 'pchc-child-stylesheet' );
	    }
    }
?>
