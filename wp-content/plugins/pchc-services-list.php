<?php 
/**
 * Plugin Name: PCHC Services List
 * Description: A widget that displays all the services PCHC offers.
 * Version: 0.1
 * Author: Chris Violette
 * Author URI: http://www.cv-designs.com/
 */

add_action( 'widgets_init', 'pchc_services_list' );


function pchc_services_list() {
	register_widget( 'PCHC_Services_List' );
}

class PCHC_Services_List extends WP_Widget {

	function PCHC_Services_List() {
		$widget_ops = array( 
			'classname' => 'pchcserviceslist', 
			'description' => __('A widget that displays all the services PCHC offers.', 'pchcserviceslist') 
		);
		
		$control_ops = array( 
			//'width' => 300, 
			//'height' => 350, 
			'id_base' => 'pchc-services-list'
		);
		
		// $GLOBALS['show_services_list'] = true;
		
		$this->WP_Widget( 'pchc-services-list', __('PCHC Services List', 'pchcserviceslist'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		
		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		
		echo $before_widget;

		// Display the widget title 
		if ( $title ) {
			
			if ( $instance['toggle'] ) {
			echo '<button type="button" class="toggle" data-toggle-target="~ .allservices">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>';
			}
					
			echo $before_title . $title . $after_title;
			
		}

	

        $args = array(
            'post_type'         =>  'service',
            'post_status'       =>  'publish',
            'posts_per_page'    =>  -1,
            'orderby'           =>  'title',
            'order'				=>	'ASC',
        );

        $the_posts = new WP_Query( $args );
        
        //print_r($the_posts);

        if( $the_posts->have_posts() ) { 
        
			if( $instance['toggle'] ) {
				echo '<ul class="toggle-init-hide allservices">';
	        } else {
		        echo '<ul class="allservices">';
	        }
	      
	        while( $the_posts->have_posts() ) { $the_posts->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php }
           
            echo '</ul>';
         
        }
        
        echo $after_widget;
	    
	    wp_reset_postdata();
	
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = esc_attr($new_instance['title']);
		$instance['toggle'] = esc_attr($new_instance['toggle']);
		
		//print_r($new_instance);
		//exit;

		//Strip tags from title and name to remove HTML 
		// $instance['title'] = strip_tags( $new_instance['title'] );
		// $instance['post_type'] = $new_instance['post_type'];

		return $instance;
	}

	
	function form( $instance ) {
		$title = esc_attr($instance['title']);
		$toggle = esc_attr($instance['toggle']);
		?>
		
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label><br>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><input type="checkbox" <?php checked( $toggle, 'true' ); ?> name="<?php echo $this->get_field_name('toggle') ?>" value="false" id="<?php echo $this->get_field_id('toggle') ?>" /> <label for="<?php echo $this->get_field_id('toggle') ?>"><?php _e( 'Make widget toggle open & closed' ); ?></label>
		</p>

	<?php }
} ?>