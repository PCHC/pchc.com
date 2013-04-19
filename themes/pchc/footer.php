			<?php if ( is_active_sidebar( 'sidebar_below_content' ) ) : ?>
			
				<div id="below-content">

					<div id="inner-below-content" class="wrap clearfix">

				<?php dynamic_sidebar( 'sidebar_below_content' ); ?>
				
					</div><!-- end #inner-below-content -->
					
				</div><!-- end #below-content -->

			<?php endif; ?>

			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">

					<nav role="navigation">
							<?php bones_footer_links(); ?>
									</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>

				</div> <!-- end #inner-footer -->

			</footer> <!-- end footer -->

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
