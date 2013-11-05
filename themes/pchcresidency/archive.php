<?php get_header(); ?>
		<div class="container">

			<div class="row">
				
				<div class="span8" id="main" role="main">

					<?php if (is_category()) { ?>
						<header class="page-header">
							<h1 class="archive-title h2">
								<?php single_cat_title(); ?>
							</h1>
						</header>
					
					<?php } elseif (is_tag()) { ?> 
						<header class="page-header">
							<h1 class="archive-title h2">
								<?php _e("Tag:", "bonestheme"); ?> <small><?php single_tag_title(); ?></small>
							</h1>
						</header>
					
					<?php } elseif (is_author()) { 
						global $post;
						$author_id = $post->post_author;
					?>
						<header class="page-header">
							<h1 class="archive-title h2">	
								<?php _e("Posts By:", "bonestheme"); ?> <small><?php echo get_the_author_meta('display_name', $author_id); ?></small>
							</h1>
						</header>
					<?php } elseif (is_day()) { ?>
						<header class="page-header">
							<h1 class="archive-title h2">
								<?php _e("Day:", "bonestheme"); ?> <small><?php the_time('l, F j, Y'); ?></small>
							</h1>
						</header>
		
					<?php } elseif (is_month()) { ?>
					<header class="page-header">
						<h1 class="archive-title h2">
							<?php _e("Month:", "bonestheme"); ?> <small><?php the_time('F Y'); ?></small>
						</h1>
					</header>
					
					<?php } elseif (is_year()) { ?>
						<header class="page-header">
							<h1 class="archive-title h2">
								<?php _e("Year:", "bonestheme"); ?> <small><?php the_time('Y'); ?></small>
							</h1>
						</header>
					<?php } ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header class="page-header">
							<?php
							if( has_post_thumbnail() ) :
								$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'pchc-resident-photo' );
								?>
								<img src="<?php echo $thumbnail['0']; ?>" class="pull-right img-polaroid img-rounded pchc-resident-photo-thumb">
							<?php endif; ?>

							<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						
						</header> <!-- end article header -->
					
						<section class="entry-content clearfix">
						
							<?php the_content('Read More <i class="icon-chevron-right"></i>'); ?>
					
						</section> <!-- end article section -->
						
						<footer class="article-footer">
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('bones_page_navi')) { ?>
						<?php bones_page_navi(); ?>
					<?php } else { ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>
					
					<?php else : ?>
					
					<article id="post-not-found" class="hentry clearfix">
						<header class="page-header">
							<h3><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h3>
						</header>
						<section class="entry-content">
							<p class="lead"><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
						</section>
					</article>
					
					<?php endif; ?>

				</div> <!-- end #main.span8 -->

				<?php get_sidebar(); ?>

			</div> <!-- end .row -->

		</div> <!-- end .container -->

<?php get_footer(); ?>
