<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function custom_post_slide() { 
	// creating image size for slide image
	add_image_size( 'pchc-carousel-slide', 1140, 500, false );
	// creating (registering) the custom type 
	register_post_type( 'pchc_slide', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Slides', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Slide', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Slides', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Slide', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Slides', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Slide', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Slides', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Slide', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'These are slides that appear in an image carousel on the homepage', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'slide', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'slide', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'pchc_slide');
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'pchc_slide');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_slide');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'pchc_slide_cat', 
    	array('pchc_slide'), /* if you change the name of register_post_type( 'pchc_slide', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Slide Categories', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Slide Category', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Slide Categories', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Slide Categories', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Slide Category', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Slide Category:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Slide Category', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Slide Category', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Slide Category', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Slide Category Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'slide' ),
    	)
    );   
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
	

?>
