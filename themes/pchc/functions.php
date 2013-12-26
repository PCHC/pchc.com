<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'pchc-thumb-provider', 205, 205, true );
add_image_size( 'pchc-thumb-300w', 300, 9999 );
add_image_size( 'pchc-thumb-750w', 750, 9999 );
add_image_size( 'pchc-location', 750, 420, true );
add_image_size( 'pchc-location-thumb', 350, 195, true );
add_image_size( 'pchc-feature-thumbnail', 350, 350, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/



/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar_top',
		'name' => __('Right Sidebar (top)', 'bonestheme'),
		'description' => __('This area appears at the top of the right column. Visible on mobile.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'sidebar_middle',
		'name' => __('Right Sidebar (middle)', 'bonestheme'),
		'description' => __('This area appears in the middle of the right column. Hidden on mobile.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'sidebar_bottom',
		'name' => __('Right Sidebar (bottom)', 'bonestheme'),
		'description' => __('This area appears at the bottom of the right column. Hidden on mobile.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'sidebar_above_content',
		'name' => __('Above Content', 'bonestheme'),
		'description' => __('This area appears above the main content.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'sidebar_below_content',
		'name' => __('Below Content', 'bonestheme'),
		'description' => __('This area appears below the main content.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	add_filter('widget_text', 'do_shortcode');

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'bonestheme'),
		'description' => __('The second (secondary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* EMAIL FILTERS *********************/

function new_mail_from( $old ) {
	return 'noreply@pchc.com';
}

function new_mail_from_name( $old ) {
	return 'PCHC.com';
}

add_filter( 'wp_mail_from', 'new_mail_from' );
add_filter( 'wp_mail_from_name', 'new_mail_from_name' );

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

function pchc_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here


	// ANALYTICS SECTION
	$wp_customize->add_section( 'pchc_analytics' , array(
		'title'      => __( 'Google Analytics', 'pchc' ),
		'priority'   => 1000,
	) );

	$wp_customize->add_setting( 'analytics_code' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'analytics_code',
		array(
			'label'          => __( 'Drop analytics code here:', 'pchc' ),
			'section'        => 'pchc_analytics',
			'settings'       => 'analytics_code',
			'type'           => 'text',
		)
	) );


	// HEADER LINKS SECTION
	$wp_customize->add_section( 'pchc_header_links', array(
		'title'	=> __( 'Header Links', 'pchc' ),
		'priority'	=> 1001,
	) );

	$wp_customize->add_setting( 'pchc_facebook_url' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'pchc_facebook_url',
		array(
			'label'          => __( 'Facebook URL', 'pchc' ),
			'section'        => 'pchc_header_links',
			'settings'       => 'pchc_facebook_url',
			'type'           => 'text',
		)
	) );

	$wp_customize->add_setting( 'pchc_twitter_url' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'pchc_twitter_url',
		array(
			'label'          => __( 'Twitter URL', 'pchc' ),
			'section'        => 'pchc_header_links',
			'settings'       => 'pchc_twitter_url',
			'type'           => 'text',
		)
	) );

	$wp_customize->add_setting( 'pchc_youtube_url' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'pchc_youtube_url',
		array(
			'label'          => __( 'YouTube URL', 'pchc' ),
			'section'        => 'pchc_header_links',
			'settings'       => 'pchc_youtube_url',
			'type'           => 'text',
		)
	) );

	$wp_customize->add_setting( 'pchc_google_url' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'pchc_google_url',
		array(
			'label'          => __( 'Google+ URL', 'pchc' ),
			'section'        => 'pchc_header_links',
			'settings'       => 'pchc_google_url',
			'type'           => 'text',
		)
	) );

	$wp_customize->add_setting( 'pchc_head_links' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'pchc_head_links',
		array(
			'label'          => __( 'Show Find Physician / eHealth / Billpay / Donate links', 'pchc' ),
			'section'        => 'pchc_header_links',
			'settings'       => 'pchc_head_links',
			'type'           => 'checkbox',
			'choices'	=> array(
				'1'	=> __('')
			)
		)
	) );

	$wp_customize->add_setting( 'pchc_phone_number' , array(
		'default'     => '207-404-8000',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'pchc_phone_number',
		array(
			'label'          => __( 'Phone Number', 'pchc' ),
			'section'        => 'pchc_header_links',
			'settings'       => 'pchc_phone_number',
			'type'           => 'text',
		)
	) );

	$wp_customize->add_setting( 'pchc_locations_hours' , array(
		'default'     => '1',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'pchc_locations_hours',
		array(
			'label'          => __( 'Show Locations / Hours Link', 'pchc' ),
			'section'        => 'pchc_header_links',
			'settings'       => 'pchc_locations_hours',
			'type'           => 'checkbox',
			'choices'	=> array(
				'1'	=> __('')
			)
		)
	) );

}
add_action( 'customize_register', 'pchc_customize_register' );

function pchc_customize_analytics() {
	echo get_theme_mod( 'analytics_code' );
}

add_action( 'wp_head', 'pchc_customize_analytics', 999);

?>
