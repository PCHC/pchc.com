<?php 
/**
 * Plugin Name: PCHC Related Posts
 * Description: A widget that displays related practices, providers, & services.
 * Version: 0.1
 * Author: Chris Violette
 * Author URI: 
 */

add_action( 'widgets_init', 'pchc_related_posts' );


function pchc_related_posts() {
	register_widget( 'PCHC_Related_Posts' );
}

class PCHC_Related_Posts extends WP_Widget {

	function PCHC_Related_Posts() {
		$widget_ops = array( 
			'classname' => 'pchcrelatedposts', 
			'description' => __('A widget that displays related locations, providers, & services. ', 'pchcrelatedposts') 
		);
		
		$control_ops = array( 
			//'width' => 300, 
			//'height' => 350, 
			'id_base' => 'pchc-related-posts' 
		);
		
		$GLOBALS['show_services_list'] = true;
		
		$this->WP_Widget( 'pchc-related-posts', __('PCHC Related Posts', 'pchcrelatedposts'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$post = $GLOBALS['post'];
		
		$post_ids = get_post_meta( $post->ID, $instance['post_type'], false );

        if( !empty( $post_ids ) && is_single() ) {
        
        	$GLOBALS['show_services_list'] = false;

			//Our variables from the widget settings.
			$title = apply_filters('widget_title', $instance['title'] );
			
			echo $before_widget;
	
			// Display the widget title 
			if ( $title )
				echo $before_title . $title . $after_title;

		

	        $args = array(
	            'post__in'          =>  $post_ids,
	            'post_type'         =>  'any',
	            'post_status'       =>  'publish',
	            'posts_per_page'    =>  -1,
	            'orderby'           =>  'title',
	        );
	
	        $the_posts = new WP_Query( $args );
	        
	        //print_r($the_posts);
	
	        if( $the_posts->have_posts() ) { 
	        
		        echo '<ul>';
		      
		        while( $the_posts->have_posts() ) { $the_posts->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php }
               
                echo '</ul>';
             
            }
            
            echo $after_widget;
	        
	    } else {
		    if( $GLOBALS['show_services_list'] ) {
		    
		    	$GLOBALS['show_services_list'] = false;

				//Our variables from the widget settings.
				$title = apply_filters('widget_title', 'Services' );
				
				echo $before_widget;
		
				// Display the widget title 
				if ( $title )
					echo $before_title . $title . $after_title;
	
			
	
		        $args = array(
		            'post_type'         =>  'service',
		            'post_status'       =>  'publish',
		            'posts_per_page'    =>  -1,
		            'orderby'           =>  'title',
		        );
		
		        $the_posts = new WP_Query( $args );
		        
		        //print_r($the_posts);
		
		        if( $the_posts->have_posts() ) { 
		        
			        echo '<ul>';
			      
			        while( $the_posts->have_posts() ) { $the_posts->the_post(); ?>
	                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	                <?php }
	               
	                echo '</ul>';
	             
	            }
	            
	            echo $after_widget;
            
		    }
	    }
	    
	    wp_reset_postdata();
	
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		//print_r($new_instance);
		//exit;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['post_type'] = $new_instance['post_type'];

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 
			'title' => __('', 'pchcrelatedposts'), 
			'post_type' => __('_cmb_locations_list', 'pchcrelatedposts'), 
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'pchcrelatedposts'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e('Post Type:', 'pchcrelatedposts'); ?></label>
			<select class="select" id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>">
				<option value="_cmb_locations_list" <?php echo $instance['post_type'] == '_cmb_locations_list' ? 'selected="selected"' : ''; ?>>Locations</option>
				<option value="_cmb_providers_list" <?php echo $instance['post_type'] == '_cmb_providers_list' ? 'selected="selected"' : ''; ?>>Providers</option>
				<option value="_cmb_services_list" <?php echo $instance['post_type'] == '_cmb_services_list' ? 'selected="selected"' : ''; ?>>Services</option>
			</select>
		</p>

	<?php }
} ?>