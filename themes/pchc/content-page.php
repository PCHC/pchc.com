<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<pre class="alert alert-help">content-page.php</pre>

	<header class="article-header">

		<h1 class="page-title" itemprop="headline">
			<?php if( !is_single() ) : ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			<?php else: ?>
				<?php the_title(); ?>
			<?php endif; ?>
		</h1>
		<p class="byline vcard"><?php
			printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(__('F jS, Y', 'bonestheme')), bones_get_the_author_posts_link());
		?></p>


	</header> <!-- end article header -->

	<section class="entry-content clearfix" itemprop="articleBody">
		<?php the_content(); ?>
</section> <!-- end article section -->

	<footer class="article-footer">
		<?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?>

	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->