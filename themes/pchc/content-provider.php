<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<?php $the_meta = get_post_meta( $post->ID ); ?>

	<pre class="alert alert-help">content-provider.php</pre>

	<header class="article-header">

		<h1 class="entry-title single-title" itemprop="headline">
			<?php if( !is_single() ) : ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			<?php else: ?>
				<?php the_title(); ?>
			<?php endif; ?>
		</h1>
		<?php foreach( (array)$the_meta['_cmb_provider_title'] as $provider_title ) : ?>
			<p class="byline vcard" itemprop="about"><?php echo $provider_title; ?></p>
		<?php endforeach; ?>

	</header> <!-- end article header -->

	<section class="entry-content clearfix" itemprop="articleBody">
	
		<?php the_post_thumbnail( 'pchc-thumb-300w', array(
				'class'	=>	'alignright polaroid',
			)
		); ?>
	
		<?php the_content(); ?>
		
		<?php foreach( (array)$the_meta['_cmb_provider_education'] as $provider_education ) : ?>
			<section class="entry-details">
				<h3>Education</h3>
				<?php echo wpautop( $provider_education ); ?>
			</section>
		<?php endforeach; ?>
		
		<?php foreach( (array)$the_meta['_cmb_provider_affiliations'] as $provider_affiliations ) : ?>
			<section class="entry-details">
				<h3>Affiliations</h3>
				<?php echo wpautop( $provider_affiliations ); ?>
			</section>
		<?php endforeach; ?>
		
		<?php foreach( (array)$the_meta['_cmb_provider_credentials'] as $provider_credentials ) : ?>
			<section class="entry-details">
				<h3>Credentials</h3>
				<?php echo wpautop( $provider_credentials ); ?>
			</section>
		<?php endforeach; ?>
		
	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>
		
		<?php MRP_show_related_posts(); ?>
		
	</footer> <!-- end article footer -->

</article> <!-- end article -->