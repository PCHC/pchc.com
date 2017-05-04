<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<?php $the_meta = get_post_meta( $post->ID ); ?>

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

		<?php if( get_field('show_map') ) {
			$the_map = true;
		} ?>

		<section class="<?php echo ($the_map) ? 'sevencol' : 'twelvecol'; ?> first">

			<?php if( get_field('address') ) { ?>
				<div class="byline vcard" itemprop="about"><?php echo wpautop( get_field( 'address' ) ); ?></div>
			<?php } ?>

			<?php the_content(); ?>

      <?php if( get_field('answering_service') ) { ?>
        <section class="entry-details">
          <div class="well">
            <strong>Calls are routed to our answering service after 5pm.</strong>
          </div>
        </section>
      <?php } ?>

			<?php
			$fields = get_fields();

			if( $fields )
			{
				foreach( $fields as $field_name => $value )
				{
					// get_field_object( $field_name, $post_id, $options )
					// - $value has already been loaded for us, no point to load it again in the get_field_object function
					if( $value && $field_name != 'address' && $field_name != 'show_map' && $field_name != 'answering_service' ) {

						$field = get_field_object($field_name, false, array('load_value' => false));
            ?>

  						<section class="entry-details">
  							<h3><?php echo $field['label']; ?></h3>
  							<?php echo wpautop( $value ); ?>
  						</section>

						<?php
					}
				}
			}
			?>

		</section>

		<section class="fivecol last">

			<?php if( $the_map ) {
				$location_address = get_field('address'); ?>
					<section class="entry-details">
						<h3>Map</h3>
						<?php

							$location_address = trim(preg_replace('/\s\s+/', ' ', $location_address));

							echo do_shortcode('[map id="map1" z="14" w="auto" marker="yes" address="'.$location_address.'"]');

							$directions_url = 'https://maps.google.com/maps?q='.urlencode($location_address).'&daddr='.urlencode($location_address).'&gl=us&t=w&z=14';

							echo '<a href="'.$directions_url.'" target="_blank">Get Directions</a>';

						?>

					</section>
			<?php
			}

			?>

		</section>

	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>

		<?php MRP_show_related_posts(); ?>

	</footer> <!-- end article footer -->

</article> <!-- end article -->
