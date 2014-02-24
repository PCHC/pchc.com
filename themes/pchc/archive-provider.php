<?php get_header(); ?>
							
			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix archive" role="main">
							
							<h1 class="archive-title h2">
								<span><?php post_type_archive_title(); ?></span>
							</h1>
							
							<form name="providers-filter" method="get" action="">
							<div class="well">
								<button type="button" class="toggle" data-toggle-target="~ .providers-filter">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<h3 class="nomargin">Filter Providers</h3>
								<div class="providers-filter <?php echo ($_GET['filter']) ? '' : 'toggle-init-hide'; ?>">
									<div class="sixcol first clearfix">
										<p><strong>Filter Locations</strong></p>
										<?php
											$loc_args = array(
												'post_type'			=>	'location',
												'posts_per_page'	=>	-1,
												'orderby'			=>	'title',
												'order'				=>	'ASC'
											);
											
											$loc_query = new WP_Query( $loc_args );
											
											if( $loc_query->have_posts() ) :
											
												while( $loc_query->have_posts()) : $loc_query->the_post(); ?>
												
													<label><input <?php echo ( in_array($post->ID, (array)$_GET['filter']) ) ? 'checked' : ''; ?> type="checkbox" name="filter[]" value="<?php echo $post->ID; ?>"> <?php the_title() ?></label><br>
												
												<?php endwhile;
											endif;
										?>
									</div>
									
									<div class="sixcol last clearfix">
										<p><strong>Filter Services</strong></p>
										<?php
											$serv_args = array(
												'post_type'			=>	'service',
												'posts_per_page'	=>	-1,
												'orderby'			=>	'title',
												'order'				=>	'ASC'
											);
											
											$serv_query = new WP_Query( $serv_args );
											
											if( $serv_query->have_posts() ) :
											
												while( $serv_query->have_posts()) : $serv_query->the_post(); ?>
												
													<label><input <?php echo ( in_array($post->ID, (array)$_GET['filter']) ) ? 'checked' : ''; ?> type="checkbox" name="filter[]" value="<?php echo $post->ID; ?>"> <?php the_title() ?></label><br>
												
												<?php endwhile;
											endif;
										?>
									</div>
									
									<div class="clearfix"></div>
									
									<button class="button alignright" type="submit">Filter Providers</button>
									<button class="button alignright" type="reset">Clear</button>
									
									<div class="clearfix"></div>
								</div><!-- /.well -->
								
								</div><!-- /.providers-filter -->
							</form>
							
							<div class="clearfix"></div>

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
