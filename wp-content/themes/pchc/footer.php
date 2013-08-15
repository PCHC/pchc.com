			<?php if ( is_active_sidebar( 'sidebar_below_content' ) ) : ?>
			
				<div id="below-content">

					<div id="inner-below-content" class="wrap clearfix">

				<?php dynamic_sidebar( 'sidebar_below_content' ); ?>
				
					</div><!-- end #inner-below-content -->
					
				</div><!-- end #below-content -->

			<?php endif; ?>
			
			<footer id="footer" role="contentinfo">
			
				<div class="footer-top">
					<div id="inner-footer-top" class="inner-footer wrap clearfix">
						<p class="source-org copyright">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
						<p class="accreditation hidden-phone">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/ncqa-2011.png">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/joint-commission.png"><br>
							PCHC is nationally accredited for quality.
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
									<?php $location_meta = get_post_meta( $post->ID );
										
										foreach( (array)$location_meta['_cmb_location_address'] as $address ) {
											echo wpautop($address);
										}
										
										foreach( (array)$location_meta['_cmb_location_primary_phone'] as $primary_phone ) {
											echo wpautop($primary_phone);
										}
										
										foreach( (array)$location_meta['_cmb_location_secondary_phone'] as $secondary_phone ) {
											echo wpautop($secondary_phone);
										}
										
									?>
									
								</li>
							
							<?php endwhile; ?>
							
							</ul>
							<div class="clearfix"></div>
						
						<?php endif; 
						
						wp_reset_postdata();
						?>
	
					</div> <!-- end #inner-footer-bottom -->
	
				</div> <!-- end footer -->
			
			</footer>

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
