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
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icons/marker.png', /* the icon for the custom post type menu */
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
                //'revisions', 
                //'sticky', 
                //'page-attributes',
            )
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'practice');
	
    /* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'practice');
	
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
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icons/medal.png', /* the icon for the custom post type menu */
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
                //'revisions', 
                //'sticky', 
                //'page-attributes',
            )
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'practice');
	
    /* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'practice');
	
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
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icons/user-medical.png', /* the icon for the custom post type menu */
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
                //'revisions', 
                //'sticky', 
                //'page-attributes',
            )
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'practice');
	
    /* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'practice');
	
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
	add_action( 'init', 'custom_homefeatures');
	

/************************************************************
    End Providers
************************************************************/


/************************************************************
    Start Job Postings
************************************************************/

function custom_jobs() { 
	// creating (registering) the custom type 
	register_post_type( 'job', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Job Postings', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Job Posting', 'bonestheme'), /* This is the individual type */
			'all_items' => __('Job Postings', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Job Posting', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Job Posting', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Job Posting', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Job Posting', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Job Posting', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example job posting', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icons/user-medical.png', /* the icon for the custom post type menu */
            'rewrite'	=> array( 'slug' => 'jobs', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'jobs', /* you can rename the slug here */
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
                'sticky', 
                //'page-attributes',
            )
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'practice');
	
    /* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'practice');
	
} 

	// adding the function to the Wordpress init
//	add_action( 'init', 'custom_jobs');
	
	
	
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'jobs_cat', 
    	array('job'), /* if you change the name of register_post_type( 'practices', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Job Categories', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Job Category', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Job Posting Categories', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Job Categories', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Job Category', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Job Category:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Job Category', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Job Category', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Job Category', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Job Category Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'job-slug' ),
    	)
    );   
    
	// now let's add custom tags (these act like tags)
    register_taxonomy( 'jobs_tag', 
    	array('job'), /* if you change the name of register_post_type( 'practices', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Job Tags', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Job Tag', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Job Tags', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Job Tags', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Job Tag', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Job Tag:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Job Tag', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Job Tag', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Job Tag', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Job Tag Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );

/************************************************************
    End Job Postings
************************************************************/


/*   
    Meta Boxes
*/
add_filter( 'cmb_meta_boxes', 'custom_metaboxes' );

function custom_metaboxes( array $meta_boxes ) {
    
    // Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';
    
    
    /*
        Practice Details
    */
    $meta_boxes[] = array(
        'id'            =>  'location_details',
        'title'         =>  'Location Details',
        'pages'         =>  array( 'location', ), // Post type
        'context'       =>  'normal',
        'priority'      =>  'high',
        'show_names'    =>  true, // Show field names on the left
        // 'show_on'    =>  array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields'        =>  array(
            array(
				'name' => 'Address',
				'desc' => '',
				'id'   => $prefix . 'location_address',
				'type' => 'textarea_small',
			),
			array(
				'name'    => 'Map Display',
				'desc'    => '',
				'id'      => $prefix . 'location_map',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Show Map', 'value' => '1', ),
					array( 'name' => 'Hide Map', 'value' => '0', ),
				),
			),
            array(
				'name' => 'Primary Phone Number',
				'desc' => '',
				'id'   => $prefix . 'location_primary_phone',
				'type' => 'text',
			),
            array(
				'name' => 'Secondary Phone Number',
				'desc' => '',
				'id'   => $prefix . 'location_secondary_phone',
				'type' => 'text',
			),
            array(
				'name' => 'Fax Number',
				'desc' => '',
				'id'   => $prefix . 'location_fax',
				'type' => 'text',
			),
            array(
				'name' => 'Email Address',
				'desc' => '',
				'id'   => $prefix . 'location_email',
				'type' => 'text',
			),
            array(
				'name' => 'Hours',
				'desc' => '',
				'id'   => $prefix . 'location_hours',
				'type' => 'textarea_small',
			),
        ),
    );
    
    
    /*
    	Providers Details
    */
    $meta_boxes[] = array(
    	'id'			=>	'provider_details',
    	'title'			=>	'Provider Details',
    	'pages'			=>	array( 'provider', ),
    	'context'		=>	'normal',
    	'priority'		=>	'high',
    	'show_names'	=>	true,
    	'fields'		=>	array(
    		array(
    			'name'	=>	'Title',
    			'desc'	=>	'',
    			'id'	=>	$prefix . 'provider_title',
    			'type'	=>	'text',
    		),
    		array(
    			'name'	=>	'Email Address',
    			'desc'	=>	'',
    			'id'	=>	$prefix . 'provider_email',
    			'type'	=>	'text',
    		),
    		array(
    			'name'	=>	'Education',
    			'desc'	=>	'',
    			'id'	=>	$prefix . 'provider_education',
    			'type'	=>	'textarea_small',
    		),
    		array(
    			'name'	=>	'Affiliations',
    			'desc'	=>	'',
    			'id'	=>	$prefix . 'provider_affiliations',
    			'type'	=>	'textarea_small',
    		),
    		array(
    			'name'	=>	'Credentials',
    			'desc'	=>	'',
    			'id'	=>	$prefix . 'provider_credentials',
    			'type'	=>	'textarea_small',
    		),
    	),
    );
    
    
    return $meta_boxes;
    
}


add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'metabox/init.php';

}

?>
