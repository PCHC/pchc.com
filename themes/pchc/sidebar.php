				<div id="sidebars" class="sidebar fourcol last clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar_top' ) ) : ?>
					
						<div id="sidebar-top">

							<?php if( is_post_type_archive( 'provider' ) ) :
								get_template_part( 'filter', 'provider' ); 
							endif; ?>
						
							<?php if( is_search() ) : ?>
								<div class="widget" id="refine-search">
									<h4 class="widgettitle toggle toggle-link" data-toggle-target="#refine-search">Refine Search Results</h4>
									<ul>
										<?php $post_types = get_post_types( array(
												'public'	=>	true,
												'exclude_from_search'	=>	false,
											), 'objects'
										);
										foreach( $post_types as $post_type ) : ?>
										<li>
											<label class="type-<?php echo $post_type->name; ?>">
												<input type="checkbox" name="refine-search-<?php echo $post_type->name; ?>" data-posttype="type-<?php echo $post_type->name; ?>" checked> <?php echo $post_type->label; ?>
											</label>
										</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php dynamic_sidebar( 'sidebar_top' ); ?>
						
						</div><!-- end #sidebar-top -->

					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'sidebar_middle' ) ) : ?>
					
						<div id="sidebar-middle" class="hidden-phone">

							<?php dynamic_sidebar( 'sidebar_middle' ); ?>
						
						</div><!-- end #sidebar-middle -->

					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'sidebar_bottom' ) ) : ?>
					
						<div id="sidebar-bottom" class="hidden-phone">

							<?php dynamic_sidebar( 'sidebar_bottom' ); ?>
						
						</div><!-- end #sidebar-bottom -->

					<?php endif; ?>

				</div><!-- end #sidebars -->