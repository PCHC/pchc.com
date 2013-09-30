<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">

		<h1 class="page-title" itemprop="headline">
			<?php the_title(); ?>
		</h1>

	</header> <!-- end article header -->

	<section class="entry-content clearfix" itemprop="articleBody">
		<?php if( has_post_thumbnail() ) {
			$image_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			$imgwidth = $image_data[1];
			$imgheight = $image_data[2];
			
			if( $imgwidth / $imgheight < 1.7 ) {
				the_post_thumbnail( 'pchc-thumb-300w', array(
						'class'	=>	'rounded alignright',
					)
				);
			} else {
				the_post_thumbnail( 'pchc-thumb-750w', array(
						'class'	=>	'rounded',
					)
				);
			}
		
		} ?>
		
		<?php the_content(); ?>
</section> <!-- end article section -->

	<footer class="article-footer">
		<?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?>
		
		<?php
		if( is_page() && $post->post_parent ) :
			if( function_exists('next_page_not_post') && function_exists('next_page_not_post') ) {
				$nextPage = next_page_not_post('%title', 'true', 'sort_column=menu_order&sort_order=asc');
				$prevPage = previous_page_not_post('%title', 'true', 'sort_column=menu_order&sort_order=asc');
			}
	 
			if ( !empty($nextPage) || !empty($prevPage) ) {
				echo '
				<nav class="wp-prev-next">
					<ul class="clearfix">';
			
				if (!empty($nextPage)) echo '
						<li class="next-link">'.$nextPage.' <i class="icon-chevron-right"></i></li>';
				
				if (!empty($prevPage)) echo '
						<li class="prev-link"><i class="icon-chevron-left"></i> '.$prevPage.'</li>';
				
				echo '
					</ul>
				</nav>';
			}
		endif;
		?>

	</footer> <!-- end article footer -->

</article> <!-- end article -->
