<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix archive" role="main">

							<h1 class="archive-title">
								<span><?php post_type_archive_title(); ?></span>
							</h1>

							<?php $post_type = 'leadership';

							// Get all the taxonomies for this post type
							$taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );

							foreach( $taxonomies as $taxonomy ) {

							    // Gets every "category" (term) in this taxonomy to get the respective posts
							    $terms = get_terms( $taxonomy, array(
										'orderby' => 'id',
										'order' => 'ASC',
									) );

							    foreach( $terms as $term ) { ?>

										<h2><?php echo $term->name; ?></h2>
										<div class="leadership-role-group clearfix">
											<?php
							        $posts = new WP_Query( "taxonomy=$taxonomy&term=$term->slug&posts_per_page=0&orderby=menu_order&order=ASC" );

							        if( $posts->have_posts() ):
												while( $posts->have_posts() ) : $posts->the_post();
													get_template_part( 'content-excerpt', get_post_type() );
							        	endwhile;
											endif; ?>
										</div>
							    <?php }

							}
							?>

						</div> <!-- end #main -->

						<?php get_sidebar(); ?>

								</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
