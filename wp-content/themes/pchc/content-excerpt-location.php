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
	
		<?php if( get_field('address') ) : ?>
			<section class="entry-details">
				<h4>Address</h4>
				<?php echo wpautop( get_field('address') ); ?>
			</section>
		<?php endif; ?>

		<?php if( get_field('primary_phone_number') ) : ?>
			<section class="entry-details">
				<h4>Primary Phone</h4>
				<?php echo wpautop( get_field('primary_phone_number') ); ?>
			</section>
		<?php endif; ?>

	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

</article> <!-- end article -->