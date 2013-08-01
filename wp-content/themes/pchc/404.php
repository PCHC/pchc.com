<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="eightcol first clearfix" role="main">

						<article id="post-not-found" class="hentry clearfix">

							<header class="article-header">

								<h1><?php _e("404 - Page Not Found!", "bonestheme"); ?></h1>

							</header> <!-- end article header -->

							<section class="entry-content">

								<p><?php _e("You found the home of excellent medical care, but we didn't find that page!", "bonestheme"); ?></p>

							</section> <!-- end article section -->

							<section class="search">
							
									<h3>Try a Search:</h3>

									<p><?php get_search_form(); ?></p>
									
									<h3>Still can't find what you're looking for?</h3>
									
									<p><a href="?page_id=64">Contact us</a> anytime at 207-404-8000.</p>

							</section> <!-- end search section -->

							<footer class="article-footer">

									

							</footer> <!-- end article footer -->

						</article> <!-- end article -->

					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
