<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix content-excerpt content-excerpt-location'); ?> role="article">
	
	<?php $the_meta = get_post_meta( $post->ID ); ?>

	<header class="article-header">
	
		<?php if( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'pchc-location-thumb', array(
					'class'	=>	'rounded',
				)
			); ?>
		</a>
		<?php endif; ?>

		<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

	</header> <!-- end article header -->

	<section class="entry-content">
	
		<?php foreach( (array)$the_meta['_cmb_location_address'] as $location_address ) : ?>
			<section class="entry-details">
				<h4>Address</h4>
				<?php echo wpautop( $location_address ); ?>
			</section>
		<?php endforeach; ?>

		<?php foreach( (array)$the_meta['_cmb_location_primary_phone'] as $location_primary_phone ) : ?>
			<section class="entry-details">
				<h4>Primary Phone</h4>
				<?php echo wpautop( $location_primary_phone ); ?>
			</section>
		<?php endforeach; ?>

	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

</article> <!-- end article -->