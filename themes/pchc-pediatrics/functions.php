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

    function order_by_lastname( $orderby, $query ) {

	    // first you should check to make sure sure you're only filtering the particular query
	    // you want to hack. return $orderby if its not the correct query;
	    global $wpdb;

	    $orderby_statement = "SUBSTR( LTRIM({$wpdb->posts}.post_title), LOCATE(' ',LTRIM({$wpdb->posts}.post_title)))";
	    return $orderby_statement;

	}

	function peds_pre_get_posts( $query ) {
		// validate
		if( is_admin() ){
			return $query;
		}

		if( isset( $query->query_vars['post_type'] ) ) {
			if( $query->query_vars['post_type'] == 'staff' ) {
				add_filter( 'posts_orderby', 'order_by_lastname' );
			}
		}

		return $query;
	}
	add_action('pre_get_posts', 'peds_pre_get_posts');

    
	/* function pchc_custom_locations() {
		// Disables Locations custom posts -- remove this function to enable in this child theme.
	} */

	function pchc_custom_providers() {
		// Disables Providers custom posts -- remove this function to enable in this child theme.
	}

	/* function pchc_custom_services() {
		// Disables Services custom posts -- remove this function to enable in this child theme.
	} */

	function pchc_custom_staff() {
		// creating (registering) the custom type 
		register_post_type( 'staff', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		 	// let's now add all the options for this post type
			array('labels' => array(
				'name' => __('Staff', 'bonestheme'), /* This is the Title of the Group */
				'singular_name' => __('Staff', 'bonestheme'), /* This is the individual type */
				'all_items' => __('All Staff', 'bonestheme'), /* the all items menu item */
				'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
				'add_new_item' => __('Add New Staff', 'bonestheme'), /* Add New Display Title */
				'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
				'edit_item' => __('Edit Staff', 'bonestheme'), /* Edit Display Title */
				'new_item' => __('New Staff', 'bonestheme'), /* New Display Title */
				'view_item' => __('View Staff', 'bonestheme'), /* View Display Title */
				'search_items' => __('Search Staff', 'bonestheme'), /* Search Custom Type Title */ 
				'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'This is the example staff', 'bonestheme' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
				//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-providers.png', /* the icon for the custom post type menu */
				'menu_icon' => 'dashicons-id',
	            'rewrite'	=> array( 'slug' => 'staff', 'with_front' => false ), /* you can specify its url slug */
				'has_archive' => 'staff', /* you can rename the slug here */
				'capability_type' => 'post', /* Type of post -- Post or Page */
				'hierarchical' => false, /* Whether or not posts can be nested -- must have 'page' capability_type */
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 
	                'title', 
	                'editor', 
	                'author', 
	                'thumbnail', 
	                'excerpt', 
	                //'trackbacks', 
	                //'custom-fields', 
	                //'comments', 
	                'revisions', 
	                //'sticky', 
	                //'page-attributes',
	            )
		 	) /* end of options */
		); /* end of register post type */
	}
	add_action( 'init', 'pchc_custom_staff' );
?>
