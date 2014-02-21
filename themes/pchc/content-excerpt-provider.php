<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix content-excerpt content-excerpt-provider'); ?> role="article">

	<?php $the_meta = get_post_meta( $post->ID ); ?>

	<header class="article-header">
	
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<?php if( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'pchc-thumb-provider', array(
					'class'	=>	'rounded thumb-provider',
				)
			); ?>
		<?php else : ?>
			<img src="<?php echo get_template_directory_uri() . '/library/images/no-provider.jpg'; ?>" alt="<?php the_title(); ?>" class="rounded thumb-provider">
		<?php endif; ?>
		</a>

		<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		<?php if( get_field('title') ) : ?>
			<p class="byline vcard" itemprop="about"><?php echo get_field('title'); ?></p>
		<?php endif; ?>

	</header> <!-- end article header -->

	<section class="entry-content">
	
			

	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php if( function_exists('MRP_get_related_posts') ) {

			$related_services = MRP_get_related_posts( $post->ID, true, true, 'service' );
			if( $related_services ) { ?>
			<div class="provider-archive-related">
				<span class="related-title">Services: </span>
				<?php
				$num_services = count( $related_services );
				$i = 1;
				foreach( $related_services as $service ) { ?>
					<a href="<?php echo get_permalink( $service->ID ); ?>"><?php echo $service->post_title; ?></a><?php echo ( $num_services != $i ) ? ', ' : ''; 
				$i++;
				} ?>
			</div>
			<?php }

			$related_locations = MRP_get_related_posts( $post->ID, true, true, 'location' );
			if( $related_locations ) { ?>
			<div class="provider-archive-related">
				<span class="related-title">Locations: </span>
				<?php
				$num_locations = count( $related_locations );
				$i = 1;
				foreach( $related_locations as $location ) { ?>
					<a href="<?php echo get_permalink( $location->ID ); ?>"><?php echo $location->post_title; ?></a><?php echo ( $num_locations != $i ) ? ', ' : ''; 
				$i++;
				} ?>
			</div>
			<?php }
		} ?>
	</footer> <!-- end article footer -->

</article> <!-- end article -->