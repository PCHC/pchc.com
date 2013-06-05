<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

	<pre class="alert alert-help">content-excerpt.php</pre>

	<header class="article-header">

		<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		<p class="byline vcard"><?php
			printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(__('F jS, Y', 'bonestheme')), bones_get_the_author_posts_link(), get_the_category_list(', '));
		?></p>

	</header> <!-- end article header -->

	<section class="entry-content">
			<?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'bonestheme') . '</span>'); ?>

	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

</article> <!-- end article -->