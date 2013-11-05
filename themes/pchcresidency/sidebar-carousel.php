<?php
$args = array( 'post_type' => 'pchc_slide' );
$loop = new WP_Query( $args );
if($loop->have_posts() ) :
?>
<div id="pchcCarousel" class="carousel slide">
	<div class="carousel-inner">
		<?php while( $loop->have_posts() ) : $loop->the_post() ?>
		<?php
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'pchc-carousel-slide' );
			$url = $thumb['0'];
		?>
		<div class="item<?php echo get_previous_post() ? '' : ' active'; ?>" style="background-image: url(<?php echo $url; ?>)">
			<div class="container">
				<div class="carousel-caption">
					<h1><?php echo the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<a class="left carousel-control" href="#pchcCarousel" data-slide="prev">&lsaquo;</a>
	<a class="right carousel-control" href="#pchcCarousel" data-slide="next">&rsaquo;</a>
</div><!-- end #pchcCarousel -->

<?php wp_reset_query();
endif; ?>
