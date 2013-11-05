		<div class="container">
			<footer class="footer" role="contentinfo">
			
				<div id="inner-footer" class="wrap clearfix">
					
					<nav role="navigation">
    					<?php bones_footer_links(); ?>
	                </nav>
	                		
					<p class="source-org copyright muted">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end .container -->
		
		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

		<!-- drop Google Analytics Here -->
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-37581302-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<!-- end analytics -->

		<!-- Browser check script -->
		<script>
		  (function(d, t) {
		    var e = d.createElement(t);
		    e.src = d.location.protocol + '//www.browserawarenessday.com/widget/50f5c5369c1b7ef2630000c8';
		    e.async = true;
		    var n = d.getElementsByTagName(t)[0]; n.parentNode.insertBefore(e, n);
		  })(document, 'script');  
		</script>

	</body>

</html> <!-- end page. what a ride! -->
