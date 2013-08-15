<?php
/*
Template Name: Landing Page
*/
?>
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="twelve first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php get_template_part( 'content', 'page' ); ?>

							<?php endwhile; else : ?>

									<?php get_template_part( 'no-results', 'index' ); ?>

							<?php endif; ?>

						</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
