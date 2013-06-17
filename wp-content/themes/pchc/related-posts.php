<div class="related-posts">
<?php 

	$locations = pchc_get_related_posts( 'locations', $post->ID );
	
	if( $locations->have_posts() ) : $have_locations = true; ?>
		<div class="sixcol first">
		<h3>Locations</h3>
		<ul>
            <?php while( $locations->have_posts() ) : $locations->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
		</div>
	<?php endif;
	wp_reset_postdata(); 


	$providers = pchc_get_related_posts( 'providers', $post->ID );
	
	if( $providers->have_posts() ) : ?>
		<div class="sixcol<?php echo ($have_locations) ? '' : ' first'; ?>">
		<h3>Providers</h3>
		<ul>
            <?php while( $providers->have_posts() ) : $providers->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
		</div>
	<?php endif;
	wp_reset_postdata(); 


	$services = pchc_get_related_posts( 'services', $post->ID );
	
	if( $services->have_posts() ) : ?>
		<div class="sixcol">
		<h3>Services</h3>
		<ul>
            <?php while( $services->have_posts() ) : $services->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
		</div>
	<?php endif;
	wp_reset_postdata(); 
?>
</div>
