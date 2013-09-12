<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix content-excerpt content-excerpt-provider'); ?> role="article">

	<?php $the_meta = get_post_meta( $post->ID ); ?>

	<header class="article-header">
	
		<?php if( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'pchc-thumb-128w', array(
					'class'	=>	'alignright polaroid',
				)
			); ?>
		</a>
		<?php endif; ?>

		<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		<?php if( get_field('title') ) : ?>
			<p class="byline vcard" itemprop="about"><?php echo get_field('title'); ?></p>
		<?php endif; ?>

	</header> <!-- end article header -->

	<section class="entry-content">
	
			<?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'bonestheme') . '</span>'); ?>

	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

</article> <!-- end article -->