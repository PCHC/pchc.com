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
		<?php if( get_field('title') ) : ?>
			<p class="byline vcard" itemprop="about"><?php echo get_field('title'); ?></p>
		<?php endif; ?>

	</header> <!-- end article header -->

	<section class="entry-content clearfix" itemprop="articleBody">
	
		<?php the_post_thumbnail( 'pchc-thumb-300w', array(
				'class'	=>	'alignright polaroid',
			)
		); ?>
	
		<?php the_content(); ?>
		
		<?php
			$fields = get_fields();
			
			if( $fields )
			{
				foreach( $fields as $field_name => $value )
				{
					// get_field_object( $field_name, $post_id, $options )
					// - $value has already been loaded for us, no point to load it again in the get_field_object function
					if( $value && $field_name != 'title' ) {
					
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
		
	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>
		
		<?php MRP_show_related_posts(); ?>
		
	</footer> <!-- end article footer -->

</article> <!-- end article -->