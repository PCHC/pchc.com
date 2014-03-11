<?php get_header(); ?>
							
			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix archive" role="main">
							
							<h1 class="archive-title h2">
								<span><?php post_type_archive_title(); ?></span>
							</h1>

							<?php if( $_GET['flash'] ) : ?>
								<div class="alert-error"><?php echo $_GET['flash']; ?></div>
							<?php endif; ?>

							<?php
							
							if (have_posts()) : ?>
							
								<div class="archive-posts clearfix">
							
								<?php while (have_posts()) : the_post(); ?>
	
										<?php get_template_part( 'content-excerpt', get_post_type() ); ?>
	
								<?php endwhile; ?>
							
								</div>

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

									<?php get_template_part( 'no-results', 'index' ); ?>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar(); ?>

								</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
