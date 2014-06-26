<form name="providers-filter" method="get" action="">
	<div class="well">
		<h3>Filter Providers</h3>
		<div class="providers-filter">
			<button class="button alignright" type="submit">Filter Providers</button>
			<button class="button alignright" type="reset">Clear</button>

			<div class="clear clearfix"></div>

			<button type="button" class="toggle" data-toggle-target="~ .locations-filter">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<h4>Locations:</h4>
			<div class="filter-section locations-filter clearfix <?php echo ($_GET['filter']) ? '' : 'toggle-init-hide'; ?>">
				<?php
					$loc_args = array(
						'post_type'			=>	'location',
						'posts_per_page'	=>	-1,
						'orderby'			=>	'title',
						'order'				=>	'ASC'
					);
					
					$loc_query = new WP_Query( $loc_args );
					
					if( $loc_query->have_posts() ) : ?>
						<ul>
						<?php while( $loc_query->have_posts()) : $loc_query->the_post(); ?>
						
							<li><label><input <?php echo ( in_array($post->ID, (array)$_GET['filter']) ) ? 'checked' : ''; ?> type="checkbox" name="filter[]" value="<?php echo $post->ID; ?>"> <?php the_title() ?></label></li>
						
						<?php endwhile; ?>
						</ul>
					<?php endif;
				?>
			</div>
			
			<button type="button" class="toggle" data-toggle-target="~ .services-filter">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<h4>Services:</h4>
			<div class="filter-section services-filter clearfix <?php echo ($_GET['filter']) ? '' : 'toggle-init-hide'; ?>">
				<?php
					$serv_args = array(
						'post_type'			=>	'service',
						'posts_per_page'	=>	-1,
						'orderby'			=>	'title',
						'order'				=>	'ASC'
					);
					
					$serv_query = new WP_Query( $serv_args );
					
					if( $serv_query->have_posts() ) : ?>
						<ul>
						<?php while( $serv_query->have_posts()) : $serv_query->the_post(); ?>
						
							<li><label><input <?php echo ( in_array($post->ID, (array)$_GET['filter']) ) ? 'checked' : ''; ?> type="checkbox" name="filter[]" value="<?php echo $post->ID; ?>"> <?php the_title() ?></label></li>
						
						<?php endwhile; ?>
						</ul>
					<?php endif;
				?>
			</div>
			
			<div class="clearfix"></div>
			
			<button class="button alignright" type="submit">Filter Providers</button>
			<button class="button alignright" type="reset">Clear</button>
			
			<div class="clearfix"></div>
		</div><!-- /.providers-filter -->
		
	</div><!-- /.well -->
</form>

<div class="clearfix"></div>
