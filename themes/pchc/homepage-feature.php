						<?php $args = array(
							'post_type' 		=>	'homefeature',
						);
						
						$feature_query = new WP_Query( $args );
						
						if( $feature_query->have_posts() ) : ?>
						
						<div id="homepage-features">
						
						<?php while( $feature_query->have_posts() ) : $feature_query->the_post(); ?>
						
						
							<?php if( !$feature_query->current_post % 3 ) : ?>
								<div class="homepage-feature-row clearfix">
							<?php endif; ?>
						
								<article class="homepage-feature">
									
									<?php the_post_thumbnail( 'pchc-feature-thumbnail' ); ?>
									
									<h3><?php the_title(); ?></h3>
									<div class="content">
										<?php the_content(); ?>
									</div>
							
								</article><!-- end .homepage-feature -->
							
							<?php if( !(($feature_query->current_post+1) % 3) || $feature_query->current_post+1 == $feature_query->post_count ) : ?>
								</div><!-- end .homepage-feature-row -->
							<?php endif; ?>
						
						<?php endwhile; ?>
						
						</div><!-- end $homepage-features -->
						
						<?php endif;
						
						wp_reset_postdata();
						?>