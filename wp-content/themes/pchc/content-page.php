<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<pre class="alert alert-help">content-page.php</pre>

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

	</footer> <!-- end article footer -->

</article> <!-- end article -->