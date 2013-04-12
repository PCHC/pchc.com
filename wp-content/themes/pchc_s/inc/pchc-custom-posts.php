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

function custom_practices() { 
	// creating (registering) the custom type 
	register_post_type( 'practice', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Practices', 'pchc'), /* This is the Title of the Group */
			'singular_name' => __('Practice', 'pchc'), /* This is the individual type */
			'all_items' => __('All Practices', 'pchc'), /* the all items menu item */
			'add_new' => __('Add New', 'pchc'), /* The add new menu item */
			'add_new_item' => __('Add New Practice', 'pchc'), /* Add New Display Title */
			'edit' => __( 'Edit', 'pchc' ), /* Edit Dialog */
			'edit_item' => __('Edit Practice', 'pchc'), /* Edit Display Title */
			'new_item' => __('New Practice', 'pchc'), /* New Display Title */
			'view_item' => __('View Practice', 'pchc'), /* View Display Title */
			'search_items' => __('Search Practice', 'pchc'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'pchc'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'pchc'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example practice', 'pchc' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icons/marker.png', /* the icon for the custom post type menu */
            'rewrite'	=> array( 'slug' => 'practices', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'practices', /* you can rename the slug here */
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
	add_action( 'init', 'custom_practices');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'practices_cat', 
    	array('practice'), /* if you change the name of register_post_type( 'practices', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Practice Categories', 'pchc' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Practice Category', 'pchc' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Practice Categories', 'pchc' ), /* search title for taxomony */
    			'all_items' => __( 'All Practice Categories', 'pchc' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Practice Category', 'pchc' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Practice Category:', 'pchc' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Practice Category', 'pchc' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Practice Category', 'pchc' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Practice Category', 'pchc' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Practice Category Name', 'pchc' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'practice-slug' ),
    	)
    );   
    
	// now let's add custom tags (these act like tags)
    register_taxonomy( 'practices_tag', 
    	array('practice'), /* if you change the name of register_post_type( 'practices', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Practice Tags', 'pchc' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Practice Tag', 'pchc' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Practice Tags', 'pchc' ), /* search title for taxomony */
    			'all_items' => __( 'All Practice Tags', 'pchc' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Practice Tag', 'pchc' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Practice Tag:', 'pchc' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Practice Tag', 'pchc' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Practice Tag', 'pchc' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Practice Tag', 'pchc' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Practice Tag Name', 'pchc' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );


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
			'name' => __('Services', 'pchc'), /* This is the Title of the Group */
			'singular_name' => __('Service', 'pchc'), /* This is the individual type */
			'all_items' => __('All Services', 'pchc'), /* the all items menu item */
			'add_new' => __('Add New', 'pchc'), /* The add new menu item */
			'add_new_item' => __('Add New Service', 'pchc'), /* Add New Display Title */
			'edit' => __( 'Edit', 'pchc' ), /* Edit Dialog */
			'edit_item' => __('Edit Service', 'pchc'), /* Edit Display Title */
			'new_item' => __('New Service', 'pchc'), /* New Display Title */
			'view_item' => __('View Service', 'pchc'), /* View Display Title */
			'search_items' => __('Search Service', 'pchc'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'pchc'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'pchc'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example service', 'pchc' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icons/medal.png', /* the icon for the custom post type menu */
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
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'services_cat', 
    	array('service'), /* if you change the name of register_post_type( 'practices', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Service Categories', 'pchc' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Service Category', 'pchc' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Service Categories', 'pchc' ), /* search title for taxomony */
    			'all_items' => __( 'All Service Categories', 'pchc' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Service Category', 'pchc' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Service Category:', 'pchc' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Service Category', 'pchc' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Service Category', 'pchc' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Service Category', 'pchc' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Service Category Name', 'pchc' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'service-slug' ),
    	)
    );   
    
	// now let's add custom tags (these act like tags)
    register_taxonomy( 'services_tag', 
    	array('service'), /* if you change the name of register_post_type( 'practices', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Service Tags', 'pchc' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Service Tag', 'pchc' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Service Tags', 'pchc' ), /* search title for taxomony */
    			'all_items' => __( 'All Service Tags', 'pchc' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Service Tag', 'pchc' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Service Tag:', 'pchc' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Service Tag', 'pchc' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Service Tag', 'pchc' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Service Tag', 'pchc' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Service Tag Name', 'pchc' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );

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
			'name' => __('Providers', 'pchc'), /* This is the Title of the Group */
			'singular_name' => __('Provider', 'pchc'), /* This is the individual type */
			'all_items' => __('All Providers', 'pchc'), /* the all items menu item */
			'add_new' => __('Add New', 'pchc'), /* The add new menu item */
			'add_new_item' => __('Add New Provider', 'pchc'), /* Add New Display Title */
			'edit' => __( 'Edit', 'pchc' ), /* Edit Dialog */
			'edit_item' => __('Edit Provider', 'pchc'), /* Edit Display Title */
			'new_item' => __('New Provider', 'pchc'), /* New Display Title */
			'view_item' => __('View Provider', 'pchc'), /* View Display Title */
			'search_items' => __('Search Provider', 'pchc'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'pchc'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'pchc'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example provider', 'pchc' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icons/user-medical.png', /* the icon for the custom post type menu */
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
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'providers_cat', 
    	array('provider'), /* if you change the name of register_post_type( 'practices', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Provider Categories', 'pchc' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Provider Category', 'pchc' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Provider Categories', 'pchc' ), /* search title for taxomony */
    			'all_items' => __( 'All Provider Categories', 'pchc' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Provider Category', 'pchc' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Provider Category:', 'pchc' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Provider Category', 'pchc' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Provider Category', 'pchc' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Provider Category', 'pchc' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Provider Category Name', 'pchc' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'provider-slug' ),
    	)
    );   
    
	// now let's add custom tags (these act like tags)
    register_taxonomy( 'providers_tag', 
    	array('provider'), /* if you change the name of register_post_type( 'practices', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Provider Tags', 'pchc' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Provider Tag', 'pchc' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Provider Tags', 'pchc' ), /* search title for taxomony */
    			'all_items' => __( 'All Provider Tags', 'pchc' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Provider Tag', 'pchc' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Provider Tag:', 'pchc' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Provider Tag', 'pchc' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Provider Tag', 'pchc' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Provider Tag', 'pchc' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Provider Tag Name', 'pchc' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );

/************************************************************
    End Providers
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
        'id'            =>  'practice_details',
        'title'         =>  'Practice Details',
        'pages'         =>  array( 'practice', ), // Post type
        'context'       =>  'normal',
        'priority'      =>  'high',
        'show_names'    =>  true, // Show field names on the left
        // 'show_on'    =>  array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields'        =>  array(
            array(
				'name' => 'Address',
				'desc' => '',
				'id'   => $prefix . 'practice_address',
				'type' => 'textarea_small',
			),
            array(
				'name' => 'Primary Phone Number',
				'desc' => '',
				'id'   => $prefix . 'practice_primary_phone',
				'type' => 'text',
			),
            array(
				'name' => 'Secondary Phone Number',
				'desc' => '',
				'id'   => $prefix . 'practice_secondary_phone',
				'type' => 'text',
			),
            array(
				'name' => 'Fax Number',
				'desc' => '',
				'id'   => $prefix . 'practice_fax',
				'type' => 'text',
			),
            array(
				'name' => 'Email',
				'desc' => '',
				'id'   => $prefix . 'practice_email',
				'type' => 'text',
			),
            array(
				'name' => 'Hours',
				'desc' => '',
				'id'   => $prefix . 'practice_hours',
				'type' => 'textarea_small',
			),
        ),
    );
    
    
    /*
        Providers Checkboxes
    */
    $meta_boxes[] = array(
        'id'            =>  'providers_list',
        'title'         =>  'Providers',
        'pages'         =>  array( 'practice', 'service', ), // Post type
        'context'       =>  'side',
        'priority'      =>  'default',
        'show_names'    =>  false, // Show field names on the left
        // 'show_on'    =>  array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields'        =>  array(
            array(
				'name' => 'Providers',
				'desc' => '',
				'id'   => $prefix . 'providers_list',
				'type' => 'posts_multicheck',
                'post_type' => 'provider',
			),
        ),
    );
    
    
    /*
        Practices Checkboxes
    */
    $meta_boxes[] = array(
        'id'            =>  'practices_list',
        'title'         =>  'Practices',
        'pages'         =>  array( 'provider', 'service', ), // Post type
        'context'       =>  'side',
        'priority'      =>  'default',
        'show_names'    =>  false, // Show field names on the left
        // 'show_on'    =>  array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields'        =>  array(
            array(
				'name' => 'Practices',
				'desc' => '',
				'id'   => $prefix . 'practices_list',
				'type' => 'posts_multicheck',
                'post_type' => 'practice',
			),
        ),
    );
    
    
    /*
        Services Checkboxes
    */
    $meta_boxes[] = array(
        'id'            =>  'services_list',
        'title'         =>  'Services',
        'pages'         =>  array( 'provider', 'practice', ), // Post type
        'context'       =>  'side',
        'priority'      =>  'default',
        'show_names'    =>  false, // Show field names on the left
        // 'show_on'    =>  array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields'        =>  array(
            array(
				'name' => 'Services',
				'desc' => '',
				'id'   => $prefix . 'services_list',
				'type' => 'posts_multicheck',
                'post_type' => 'service',
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
