<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<?php $the_meta = get_post_meta( $post->ID ); ?>

	<pre class="alert alert-help">content-location.php</pre>

	<header class="article-header">

		<h1 class="entry-title single-title" itemprop="headline">
			<?php if( !is_single() ) : ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			<?php else: ?>
				<?php the_title(); ?>
			<?php endif; ?>
		</h1>
		
		<?php if( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'pchc-location', array(
					'class'	=>	'rounded',
				)
			); ?>
		<?php endif; ?>

	</header> <!-- end article header -->

	<section class="entry-content clearfix" itemprop="articleBody">
	
		<?php if( get_post_meta( $post->ID, '_cmb_location_map', true ) && $the_meta['_cmb_location_address'] ) {
			$the_map = true;
		} ?>
	
		<section class="<?php echo ($the_map) ? 'sevencol' : 'twelvecol'; ?> first">
		
			<?php foreach( (array)$the_meta['_cmb_location_address'] as $location_address ) : ?>
				<div class="byline vcard" itemprop="about"><?php echo wpautop( $location_address ); ?></div>
			<?php endforeach; ?>
	
			<?php the_content(); ?>
			
			<?php foreach( (array)$the_meta['_cmb_location_primary_phone'] as $location_primary_phone ) : ?>
				<section class="entry-details">
					<h3>Primary Phone</h3>
					<?php echo wpautop( $location_primary_phone ); ?>
				</section>
			<?php endforeach; ?>
			
			<?php foreach( (array)$the_meta['_cmb_location_secondary_phone'] as $location_secondary_phone ) : ?>
				<section class="entry-details">
					<h3>Secondary Phone</h3>
					<?php echo wpautop( $location_secondary_phone ); ?>
				</section>
			<?php endforeach; ?>
			
			<?php foreach( (array)$the_meta['_cmb_location_fax'] as $location_fax ) : ?>
				<section class="entry-details">
					<h3>Fax</h3>
					<?php echo wpautop( $location_fax ); ?>
				</section>
			<?php endforeach; ?>
			
			<?php foreach( (array)$the_meta['_cmb_location_email'] as $location_email ) : ?>
				<section class="entry-details">
					<h3>Email</h3>
					<?php echo wpautop( '<a href="mailto:'.$location_email.'">'.$location_email.'</a>' ); ?>
				</section>
			<?php endforeach; ?>
			
			<?php foreach( (array)$the_meta['_cmb_location_hours'] as $location_hours ) : ?>
				<section class="entry-details">
					<h3>Hours</h3>
					<?php echo wpautop( $location_hours ); ?>
				</section>
			<?php endforeach; ?>
		
		</section>
		
		<section class="fivecol last">
		
			<?php if( $the_map ) {
				foreach( (array)$the_meta['_cmb_location_address'] as $location_address ) : ?>
					<section class="entry-details">
						<h3>Map</h3>
						<?php 
							
							$location_address = trim(preg_replace('/\s\s+/', ' ', $location_address));
							
							echo do_shortcode('[map id="map1" z="14" w="auto" marker="yes" address="'.$location_address.'"]');
							
							$directions_url = 'https://maps.google.com/maps?q='.urlencode($location_address).'&daddr='.urlencode($location_address).'&gl=us&t=w&z=14';
							
							echo '<a href="'.$directions_url.'" target="_blank">Get Directions</a>';
		
						?>
						
					</section>
			<?php endforeach;
			
			}
			
			?>
		
		</section>
		
	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>
		
		<?php MRP_show_related_posts(); ?>
		
	</footer> <!-- end article footer -->

</article> <!-- end article -->