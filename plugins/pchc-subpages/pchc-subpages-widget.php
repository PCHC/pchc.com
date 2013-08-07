<?php
class PCHC_Subpages_Widget extends WP_Widget {

    /**
     * WP_Widget_Related_Posts - Constructor function 
     */
	function PCHC_Subpages_Widget() {
		$widget_ops = array('classname' => 'pchc_subpages_widget', 'description' => __( 'Displays the subpages of the current page.' ) );
		$this->WP_Widget('pchc_subpages', __('PCHC Subpage Listing'), $widget_ops);
	}
	
	/**
	 * widget - Standard function called to display widget contents
	 *
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
 	 * @param array $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		
		if( is_page() ) {
		
			$subpages = PCHC_subpage_peek( $instance['order'], $instance['orderby'], $instance['excerpt'], $instance['titletag'], $instance['page'] );
			
			if( $subpages ) {
				echo $before_widget;
				echo $before_title;	
				echo $instance['title'];
				echo $after_title;
				echo $subpages;
				echo $after_widget;
			}
			
		}
		
	}
	
	/**
	 * update - Save the settings for the widgets
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
 	 * @param array $old_instance Old settings for this instance
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = esc_attr($new_instance['title']);
		$instance['order'] = esc_attr($new_instance['order']);
		$instance['orderby'] = esc_attr($new_instance['orderby']);
		$instance['excerpt'] = esc_attr($new_instance['excerpt']);
		$instance['titletag'] = esc_attr($new_instance['titletag']);
		$instance['page'] = esc_attr($new_instance['page']);
		return $instance;
	}
	
	/**
	 * form - Create the form for the widget
	 *
	 * @param array $instance Current settings
	 */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title'		=> __('Sub Pages'),
			'order'		=> 'date',
			'orderby'	=> 'DESC',
			'excerpt'	=> 'true',
			'titletag'	=> 'h4',
			'page'		=> 'false',
		) );
		
		$title = esc_attr($instance['title']);
		$order = esc_attr($instance['order']);
		$orderby = esc_attr($instance['orderby']);
		$excerpt = esc_attr($instance['excerpt']);
		$titletag = esc_attr($instance['titletag']);
		$page = esc_attr($instance['page']);
		
		$args = array(
			'post_type'			=> 'page',
			'nopaging'			=> true,
			'orderby'			=> 'title',
			'order'				=> 'ASC',
		);
		
		$the_query = new WP_Query( $args );
		
		?>
		
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label><br>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order By:'); ?></label><br>
		<select name="<?php echo $this->get_field_name('orderby') ?>" id="<?php echo $this->get_field_id('orderby') ?>" class="widefat">
			<option value="date"<?php if( $orderby == 'date' ) : ?> selected="selected"<?php endif; ?>><?php _e('Publish Date') ?></option>
			<option value="modified"<?php if( $orderby == 'modified' ) : ?> selected="selected"<?php endif; ?>><?php _e('Modified Date') ?></option>
			<option value="title"<?php if( $orderby == 'title' ) : ?> selected="selected"<?php endif; ?>><?php _e('Page Title') ?></option>
			<option value="rand"<?php if( $orderby == 'rand' ) : ?> selected="selected"<?php endif; ?>><?php _e('Random') ?></option>
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order Direction:'); ?></label><br>
		<select name="<?php echo $this->get_field_name('order') ?>" id="<?php echo $this->get_field_id('order') ?>" class="widefat">
			<option value="DESC"<?php if( $order == 'DESC' ) : ?> selected="selected"<?php endif; ?>><?php _e('Descending (Z&rarr;A)') ?></option>
			<option value="ASC"<?php if( $order == 'ASC' ) : ?> selected="selected"<?php endif; ?>><?php _e('Ascending (A&rarr;Z)') ?></option>
		</select></p>
		
		<p><input type="radio" <?php checked( $excerpt, 'false' ); ?> name="<?php echo $this->get_field_name('excerpt') ?>" value="false" id="<?php echo $this->get_field_id('excerpt') ?>-2" /> <label for="<?php echo $this->get_field_id('excerpt') ?>-2"><?php _e( 'Hide Page Excerpt' ); ?></label><br>
			<input type="radio" <?php checked( $excerpt, 'true' ); ?> name="<?php echo $this->get_field_name('excerpt') ?>" value="true" id="<?php echo $this->get_field_id('excerpt') ?>-1" /> <label for="<?php echo $this->get_field_id('excerpt') ?>-1"><?php _e( 'Show Page Excerpt' ); ?></label>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('titletag'); ?>"><?php _e('Page Title Tag:'); ?></label><br>
		<select name="<?php echo $this->get_field_name('titletag') ?>" id="<?php echo $this->get_field_id('titletag') ?>" class="widefat">
			<option value="p"<?php if( $titletag == 'p' ) : ?> selected="selected"<?php endif; ?>><?php _e('Paragraph') ?></option>
			<option value="h3"<?php if( $titletag == 'h3' ) : ?> selected="selected"<?php endif; ?>><?php _e('Heading 3') ?></option>
			<option value="h4"<?php if( $titletag == 'h4' ) : ?> selected="selected"<?php endif; ?>><?php _e('Heading 4') ?></option>
			<option value="h5"<?php if( $titletag == 'h5' ) : ?> selected="selected"<?php endif; ?>><?php _e('Heading 5') ?></option>
		</select></p>
		
		<?php if( $the_query->have_posts() ) : ?>
		<p><label for="<?php echo $this->get_field_id('page'); ?>"><?php _e('Show Subpages of This Page:'); ?></label><br>
		<select name="<?php echo $this->get_field_name('page') ?>" id="<?php echo $this->get_field_id('page') ?>" class="widefat">
			<option value="false"<?php if( $page == 'false' ) : ?> selected="selected"<?php endif; ?>><?php _e('Current Page') ?></option>
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<option value="<?php echo get_the_ID(); ?>"<?php if( $page == get_the_ID() ) : ?> selected="selected"<?php endif; ?>><?php the_title(); ?></option>
			<?php endwhile; ?>
		</select></p>
		<?php endif; wp_reset_postdata(); ?>
	<?php
	}
	
}
?>