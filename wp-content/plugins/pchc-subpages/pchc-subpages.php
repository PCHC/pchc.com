<?php
/*
Plugin Name: PCHC's Subpage Listing
Description: Displays the subpages of the current page.
Author: Chris Violette
Version: 0.2
Author URI: http://www.cv-designs.com
*/

# Add [subpages] shortcode support
add_shortcode('subpages', 'PCHC_subpage_shortcode');

# Load widgets
add_action("widgets_init", "PCHC_subpage_load_widget");

# Include the widget class
require( "pchc-subpages-widget.php" );

function PCHC_subpage_peek( $order = 'DESC', $orderby = 'date', $excerpt = 'true', $titletag = 'h4', $page = 'false' ) {
	global $post;
	
	if( $orderby != 'date' && $orderby != 'modified' ) {
		$order = 'ASC';
	}
	
	//query subpages
	$args = array(
		'post_parent'	=> $post->ID,
		'post_type'		=> 'page',
		'order'			=> $order,
		'orderby'		=> $orderby,
	);
	
	if( $page != 'false' ) {
		$args['post_parent'] = $page;
	}
	
	$subpages = new WP_query($args);
	
	// create output
	if ($subpages->have_posts()) :
		$output = '<ul>';
		while ($subpages->have_posts()) : $subpages->the_post();
			$output .= '<li><'.$titletag.'><a href="'.get_permalink().'">'.get_the_title().'</a></'.$titletag.'>';
			if( $excerpt == 'true' ) {
				$output .= '<p>'.get_the_excerpt().'</p></li>';
			}
			$output .= '</li>';
		endwhile;
		$output .= '</ul>';
	else :
		$output = false;
	endif;
	
	// reset the query
	wp_reset_postdata();
	
	// return something
	return $output;
}

function PCHC_subpage_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'order'		=>	'DESC',
		'orderby'	=>	'date',
		'excerpt'	=>	'true',
		'titletag'	=>	'h4',
	), $atts ) );
	
	$output = PCHC_subpage_peek( $order, $orderby, $excerpt, $titletag );
	
	return $output;
}

/**
 * PCHC_subpage_load_widget - Register the subpage widget
 */
function PCHC_subpage_load_widget() {
	register_widget("pchc_subpages_widget");		
}

?>