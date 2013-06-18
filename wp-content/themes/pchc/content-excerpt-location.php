<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix content-excerpt content-excerpt-location'); ?> role="article">

	<pre class="alert alert-help">content-excerpt-location.php</pre>
	
	<?php $the_meta = get_post_meta( $post->ID ); ?>

	<header class="article-header">

		<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'pchc-thumb-300w', array(
					'class'	=>	'aligncenter polaroid',
				)
			); ?>
		</a>

	</header> <!-- end article header -->

	<section class="entry-content">
			<?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'bonestheme') . '</span>'); ?>

	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

</article> <!-- end article -->