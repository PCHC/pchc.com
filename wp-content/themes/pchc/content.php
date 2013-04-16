<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<pre class="alert alert-help">content.php</pre>

	<header class="article-header">

		<h1 class="entry-title single-title" itemprop="headline">
			<?php if( !is_single() ) : ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			<?php else: ?>
				<?php the_title(); ?>
			<?php endif; ?>
		</h1>
		<p class="byline vcard"><?php
			printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
		?></p>

	</header> <!-- end article header -->

	<section class="entry-content clearfix" itemprop="articleBody">
		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>
		
		<?php get_template_part( 'related-posts', 'index' ); ?>
		
	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->