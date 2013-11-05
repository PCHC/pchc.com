<?php
/*
Plugin Name: PCHC's Custom Posts
Description: Enables Provider, Service and Location post types.
Author: Chris Violette
Version: 0.1
Author URI: http://www.cv-designs.com
*/

// let's create the function for the custom type

/************************************************************
    Start Practices
************************************************************/

function custom_locations() { 
	// creating (registering) the custom type 
	register_post_type( 'location', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Locations', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Location', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Locations', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Location', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Location', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Location', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Location', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Location', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example location', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-locations.png', /* the icon for the custom post type menu */
            'rewrite'	=> array( 'slug' => 'locations', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'locations', /* you can rename the slug here */
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
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'practice');
	
    /* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'practice');
	flush_rewrite_rules( false );
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_locations');
	
/************************************************************
    End Practices
************************************************************/



/************************************************************
    Start Services
************************************************************/

function custom_services() { 
	// creating (registering) the custom type 
	register_post_type( 'service', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Services', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Service', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Services', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Service', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Service', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Service', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Service', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Service', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example service', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-services.png', /* the icon for the custom post type menu */
            'rewrite'	=> array( 'slug' => 'services', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'services', /* you can rename the slug here */
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
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'practice');
	
    /* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'practice');
	flush_rewrite_rules( false );
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_services');
	

/************************************************************
    End Services
************************************************************/



/************************************************************
    Start Providers
************************************************************/

function custom_providers() { 
	// creating (registering) the custom type 
	register_post_type( 'provider', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Providers', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Provider', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Providers', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Provider', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Provider', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Provider', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Provider', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Provider', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example provider', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-providers.png', /* the icon for the custom post type menu */
            'rewrite'	=> array( 'slug' => 'providers', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'providers', /* you can rename the slug here */
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
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'practice');
	
    /* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'practice');
	flush_rewrite_rules( false );
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_providers');
	

/************************************************************
    End Providers
************************************************************/


/************************************************************
    Start Home Features
************************************************************/

function custom_homefeatures() { 
	// creating (registering) the custom type 
	register_post_type( 'homefeature', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Homepage Features', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Homepage Feature', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Homepage Features', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Homepage Feature', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Homepage Feature', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Homepage Feature', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Homepage Feature', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Homepage Feature', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example homepage feature', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icons/user-medical.png', /* the icon for the custom post type menu */
            'rewrite'	=> array( 'slug' => 'homefeatures', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'homefeatures', /* you can rename the slug here */
			'capability_type' => 'post', /* Type of post -- Post or Page */
			'hierarchical' => false, /* Whether or not posts can be nested -- must have 'page' capability_type */
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 
                'title', 
                'editor', 
                //'author', 
                'thumbnail',
                //'excerpt', 
                //'trackbacks', 
                //'custom-fields', 
                //'comments', 
                //'revisions', 
                //'sticky', 
                'page-attributes',
            )
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'practice');
	
    /* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'practice');
	
} 

	// adding the function to the Wordpress init
//	add_action( 'init', 'custom_homefeatures');
	

/************************************************************
    End Providers
************************************************************/


?>
