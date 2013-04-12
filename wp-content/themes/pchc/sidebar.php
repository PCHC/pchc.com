				<div id="sidebars" class="sidebar fourcol last clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar_top' ) ) : ?>
					
						<div id="sidebar-top">

							<?php dynamic_sidebar( 'sidebar_top' ); ?>
						
						</div><!-- end #sidebar-top -->

					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'sidebar_bottom' ) ) : ?>
					
						<div id="sidebar-bottom">

							<?php dynamic_sidebar( 'sidebar_bottom' ); ?>
						
						</div><!-- end #sidebar-bottom -->

					<?php endif; ?>

				</div><!-- end #sidebars -->