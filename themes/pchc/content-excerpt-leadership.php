<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

	<?php if( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('', array(
					'class'	=>	'rounded',
				)
			); ?>
		</a>
	<?php endif; ?>

	<header class="article-header">
		<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		<?php if( get_field('title') ) : ?>
			<p class="byline vcard" itemprop="about"><?php echo get_field('title'); ?></p>
		<?php endif; ?>
	</header> <!-- end article header -->

</article> <!-- end article -->
