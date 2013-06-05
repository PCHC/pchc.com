<?php 

//add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
//function cmb_initialize_cmb_meta_boxes() {

//	if ( ! class_exists( 'cmb_Meta_Box' ) )
//		require_once 'metabox/init.php';

//}

$prefix = '_pchc_';

$pchc_meta_boxes = array(
	'id'		=>		'',
	'title'		=>		'',
	'pages'		=>		array( '', ), // Post type
	'context'	=>		'normal',
	'priority'	=>		'high',
	'fields'	=>		array(
		array(
			'name'		=>		'',
			'desc'		=>		'',
			'id'		=>		$prefix . '',
			'type'		=>		''
		),
	),
);

$meta_boxes = array();

foreach ( $meta_boxes as $meta_box ) {
	$my_box = new pchc_Meta_Mox( $meta_box );
}

class pchc_Meta_Box {
	protected $_meta_box;
	
	function __construct( $meta_box ) {
		if( !is_admin() ) return;
		
		$this->_meta_box = $meta_box;
		
		add_action( 'admin_menu', array( &$this, 'add' ) );
		add_action( 'save_post', array( &$this, 'save' ) );
	}
	
	function add() {
	
		foreach( $this->_meta_box['pages'] as $page ) {
			add_meta_box(
				$this->_meta_box['id'],		// @string ID
				$this->_meta_box['title'],		// @string Title
				array(&$this, 'show'),		// @callback Callback function for HTML of metabox
				$page,		// @string Post type to show metabox on
				$this->_meta_box['context'],		// @string Context - where to show (normal, advanced, side)
				$this->_meta_box['priority'],		// @string Priority (high, core, default, low)
				''		// @array Callback arguments	
			);
		}
	
		
	}
	
	function show() {
		
		global $post;
		
		// Use nonce for verification
		echo '<input type="hidden" name="wp_meta_box_nonce" value="', wp_create_nonce( basename(__FILE__) ), '" />';
		
		foreach ( $this->_meta_box['fields'] as $field ) {
		
			$meta = get_post_meta( $post->ID, $field['id'], $field['multiple'] /* if multicheck this can be multiple values */ );
			
		}
		
		echo '<label for="field_name">';
		_e('Description for this field');
		echo '</label>';
		echo '<input type="text" id="field_name" name="field_name" value="'.esc_attr($value).'" size="25" />';
	}
	
	function save( $post_id ) {
	
		// verify nonce
		if ( ! isset( $_POST['wp_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wp_meta_box_nonce'], basename(__FILE__) ) ) {
			return $post_id;
		}

		// check autosave
		if ( defined('DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// check permissions
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
		
		// get the post types applied to the metabox group
		// and compare it to the post type of the content
		$post_type = get_post_type($post_id);
		$meta_type = $this->_meta_box['pages'];
		$type_comp = in_array($post_type, $meta_type) ? true : false;
		
	}

}

?>
