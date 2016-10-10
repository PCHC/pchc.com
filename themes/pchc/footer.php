			<footer id="footer" role="contentinfo">

				<div class="footer-top">
					<div id="inner-footer-top" class="inner-footer wrap clearfix">
						<p class="source-org copyright">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
						<p class="accreditation hidden-phone">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/ncqa-2011.png" alt="NCQA"> <img src="<?php echo get_template_directory_uri(); ?>/library/images/aaahc-2015.png" alt="AAAHC"><br>
							PCHC is nationally accredited for quality.<br>
							PCHC is a FTCA Deemed Facility
						</p>

					</div>
				</div>

				<?php if( has_nav_menu( 'footer-links' ) ) : ?>
				<div class="footer-mid">
					<div id="inner-footer-mid" class="inner-footer wrap clearfix">
						<nav role="navigation">
								<?php bones_footer_links(); ?>
						</nav>
					</div>
				</div>
				<?php endif; ?>

				<div class="footer-bottom">

					<div id="inner-footer-bottom" class="inner-footer wrap clearfix">

						<?php if ( is_active_sidebar( 'footer_top' ) ) : ?>
							<div id="footer-top-widget" class="footer-widget clearfix">
								<?php dynamic_sidebar( 'footer_top' ); ?>
							</div><!-- end #footer-top-widget -->
						<?php endif; ?>
						
						<?php
						$args = array(
							'post_type'			=>	'location',
							'orderby'			=>	'title',
							'order'				=>	'ASC',
							'posts_per_page'	=>	-1,
						);

						$locations = new WP_Query( $args );

						if( $locations->have_posts() ) : ?>

							<ul id="footer-locations" class="clearfix">

							<?php while( $locations->have_posts() ) : $locations->the_post(); ?>

								<li class="footer-location">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<?php

										echo wpautop( get_field('address') );

										echo wpautop( get_field('primary_phone_number') );

										echo wpautop( get_field('secondary_phone_number') );

									?>

								</li>

							<?php endwhile; ?>

							</ul>
							<div class="clearfix"></div>

						<?php endif;

						wp_reset_postdata();
						?>

						<?php if ( is_active_sidebar( 'footer_bottom' ) ) : ?>
							<div id="footer-bottom-widget" class="footer-widget clearfix">
								<?php dynamic_sidebar( 'footer_bottom' ); ?>
							</div><!-- end #footer-bottom-widget -->
						<?php endif; ?>

					</div> <!-- end #inner-footer-bottom -->

				</div> <!-- end footer -->

			</footer>

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
