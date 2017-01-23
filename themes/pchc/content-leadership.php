<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">

		<h1 class="entry-title single-title" itemprop="headline">
			<?php if( !is_single() ) : ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			<?php else: ?>
				<?php the_title(); ?>
			<?php endif; ?>
		</h1>
    <?php if( get_field('title') ) : ?>
      <p class="byline vcard" itemprop="about"><?php echo get_field('title'); ?></p>
    <?php endif; ?>

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
		<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tagged:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>

		<?php
		$next = get_next_post();
		$prev = get_adjacent_post();

		if ( !empty($next) || !empty($prev) ) {
			echo '
			<nav class="wp-prev-next">
				<ul class="clearfix">';

			if (!empty($next)) echo '
					<li class="next-link"><a href="'.get_permalink( $next->ID ).'">'.$next->post_title.'</a> <i class="icon-chevron-right"></i></li>';

			if (!empty($prev)) echo '
					<li class="prev-link"><i class="icon-chevron-left"></i> <a href="'.get_permalink( $prev->ID ).'">'.$prev->post_title.'</a></li>';

			echo '
				</ul>
			</nav>';
		}
		?>
	</footer> <!-- end article footer -->

</article> <!-- end article -->
