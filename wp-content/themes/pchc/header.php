<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">

					<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
					<p id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>

					<!-- if you'd like to use the site description you can un-comment it below -->
					<?php // bloginfo('description'); ?>
					
					<div class="header-right">
					
						<?php if( has_nav_menu('header-mobile-nav') ) : ?>
							<?php pchc_header_mobile_nav(); ?>
						<?php endif; ?>

						<div id="header-icons" class="visible-desktop clearfix">
							<a href="<?php echo home_url(); ?>/providers/">
									<i class="icon-user-md"></i>
								<span>Find a Physician</span>
							</a>
							
							<a href="<?php echo home_url(); ?>/patient-resources/pchc-ehealth/">
								<i class="icon-medkit"></i>
								<span>eHealth Login</span>
							</a>
							
							<a href="<?php echo home_url(); ?>/shop/online-billpay/">
								<i class="icon-money"></i>
								<span>Online Billpay</span>
							</a>
							
							<a href="<?php echo home_url(); ?>/shop/donate-online/">
								<i class="icon-gift"></i>
								<span>Donate Online</span>
							</a>
							
							<a href="http://www.facebook.com/PenobscotCommunityHealthCare" target="_blank">
								<i class="icon-facebook-sign"></i>
							</a>
							
							<a href="http://www.youtube.com/pchcvideo" target="_blank">
								<i class="icon-youtube-sign"></i>
							</a>
							
						</div>
						
						<?php get_search_form( ); ?>
						
						<p class="header-contact clearfix">
							<a href="tel:+12074048000">207-404-8000</a> &bull; <a href="<?php echo home_url(); ?>/?post_type=location">Locations &amp; Hours</a>
						</p>
					
					</div>
					

				</div> <!-- end #inner-header -->
				
				<?php if( has_nav_menu('main-nav') ) : ?>
				
				<div id="header-nav">
				
					<div class="wrap clearfix">
				
						<nav role="navigation">
							<span class="hidden-desktop nav-title">Main Menu</span>
							<button type="button" class="hidden-desktop nav-toggle toggle" data-toggle-target="~ .nav">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="clearfix"></div>
							<?php bones_main_nav(); ?>
						</nav>
					
					</div>
					
				</div>
					
				<?php endif; ?>

			</header> <!-- end header -->
			
			<?php if ( is_active_sidebar( 'sidebar_above_content' ) || is_front_page() ) : ?>
			
				<div id="above-content" class="hidden-phone">

					<div id="inner-above-content" class="wrap clearfix">
					
						<?php //get_template_part( 'homepage', 'feature' ); ?>
						<?php echo do_shortcode("[metaslider id=73]"); ?>

						<?php dynamic_sidebar( 'sidebar_above_content' ); ?>
				
					</div><!-- end #inner-above-content -->
					
				</div><!-- end #above-content -->

			<?php endif; ?>
