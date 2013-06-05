<?php

class PCHC_Crosslist {

	var $post;
	
	public function __construct() {
	
		$post = $GLOBALS['post']
		
	}
	
	public function relatedLocations() {
		
		
		
	}
	
	public function relatedServices() {
		
		
		
	}
	
	public function relatedProviders( $postIDs, $postType ) {
		
		$args = array(
			'post_type'			=>	'providers',
			'meta_query'		=>	array(
					'key'			=>	'_cmb_' . $postType . '_list',
					'value'			=>	$postIDs,
			),
			'order'				=>	'ASC',
			'orderby'			=>	'title',
			'posts_per_page'	=>	-1,
		);
		
		$providersQuery = new WP_Query( $args );
		
		return $providersQuery;
		
	}
	
}

?>
