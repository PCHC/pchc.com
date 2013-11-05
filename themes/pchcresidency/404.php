<?php get_header(); ?>
		<div class="container">

			<div class="row">
				
				<div class="span8" id="main" role="main">
					<article id="post-not-found" class="hentry clearfix">
						
						<header class="article-header">
						
							<h1><?php _e("Epic 404 - Article Not Found", "bonestheme"); ?></h1>
					
						</header> <!-- end article header -->
				
						<section class="entry-content">
						
							<p><?php _e("The article you were looking for was not found, but maybe try looking again!", "bonestheme"); ?></p>
				
						</section> <!-- end article section -->

						<section class="search">
			
						    <p><?php get_search_form(); ?></p>
			
						</section> <!-- end search section -->
				
					</article> <!-- end article -->
				</div> <!-- end #main.span8 -->

				<?php get_sidebar(); ?>

			</div> <!-- end .row -->

		</div> <!-- end .container -->

<?php get_footer(); ?>
