<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- W3TC-include-css -->
		

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

		<meta property="og:image" content="http://pchc.com/wp-content/themes/pchc/screenshot.png">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="300">
		<meta property="og:image:height" content="225">
		
		<!-- Pingdom monitoring -->
		<script>
		var _prum = [['id', '52713701abe53d4463000000'],
		             ['mark', 'firstbyte', (new Date()).getTime()]];
		(function() {
		    var s = document.getElementsByTagName('script')[0]
		      , p = document.createElement('script');
		    p.async = 'async';
		    p.src = '//rum-static.pingdom.net/prum.min.js';
		    s.parentNode.insertBefore(p, s);
		})();
		</script>
		
		<!-- W3TC-include-js-head -->

	</head>

	<body <?php body_class(); ?>>

		<div id="container">
		
			<!--[if lt IE 8]>
			<div class="browser-alert">
				<p>It looks like you are using an out-of-date web browser. PCHC.com may not display correctly in older browsers. Please consider updating. <a href="http://www.browsehappy.com/">Learn More ></a>
			</div>
			<![endif]-->

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

							<?php if( get_theme_mod( 'pchc_head_links' ) ) : ?>
								<a href="<?php echo home_url(); ?>/providers/">
										<i class="icon-user-md"></i>
									<span>Find a Physician</span>
								</a>
								
								<a href="<?php echo home_url(); ?>/patient-resources/pchc-ehealth/">
									<i class="icon-medkit"></i>
									<span>eHealth Login</span>
								</a>
								
								<a href="<?php echo home_url(); ?>/online-billpay/">
									<i class="icon-money"></i>
									<span>Online Billpay</span>
								</a>
								
								<a href="<?php echo home_url(); ?>/donate-online/">
									<i class="icon-gift"></i>
									<span>Donate Online</span>
								</a>
							<?php endif; ?>
							
							<a href="<?php echo get_theme_mod( 'pchc_facebook_url' ) ? get_theme_mod( 'pchc_facebook_url' ) : 'https://www.facebook.com/PenobscotCommunityHealthCare'; ?>" target="_blank">
								<i class="icon-facebook-sign"></i>
							</a>

							<?php if( get_theme_mod( 'pchc_twitter_url' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'pchc_twitter_url' ); ?>" target="_blank">
									<i class="icon-twitter-sign"></i>
								</a>
							<?php endif; ?>

							<?php if( get_theme_mod( 'pchc_linkedin_url' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'pchc_linkedin_url' ); ?>" target="_blank">
									<i class="icon-linkedin-sign"></i>
								</a>
							<?php endif; ?>

							<?php if( get_theme_mod( 'pchc_google_url' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'pchc_google_url' ); ?>" target="_blank">
									<i class="icon-google-plus-sign"></i>
								</a>
							<?php endif; ?>
							
							<?php if( get_theme_mod( 'pchc_youtube_url' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'pchc_youtube_url' ); ?>" target="_blank">
									<i class="icon-youtube-sign"></i>
								</a>
							<?php endif; ?>
						</div>
						
						<?php get_search_form( ); ?>
						
						<p class="header-contact clearfix">
							<?php echo get_theme_mod( 'pchc_phone_number' ); ?> <?php if( get_theme_mod( 'pchc_locations_hours' ) ) : ?>
								&bull; <a href="<?php echo home_url(); ?>/locations/">Locations &amp; Hours</a>
							<?php endif; ?>
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
			
			<?php 
				if( function_exists( 'wpmd_is_phone' ) ) {
					$is_phone = wpmd_is_phone();
				}
			?>
			
			<?php if ( ( is_active_sidebar( 'sidebar_above_content' ) || is_front_page() ) && !$is_phone ) : ?>
				
				<div id="above-content" class="hidden-phone">

					<div id="inner-above-content" class="wrap clearfix">

						<?php dynamic_sidebar( 'sidebar_above_content' ); ?>
				
					</div><!-- end #inner-above-content -->
					
				</div><!-- end #above-content -->

			<?php endif; ?>
