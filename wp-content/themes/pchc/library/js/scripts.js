/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {

    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */
    
    /* getting viewport width */
    var responsive_viewport = $(window).width();
    
    /* if is below 481px */
    if (responsive_viewport < 481) {
    
    } /* end smallest screen */
    
    /* if is larger than 481px */
    if (responsive_viewport > 481) {
        
    } /* end larger than 481px */
    
    /* if is above or equal to 768px */
    if (responsive_viewport >= 768) {
    
        /* load gravatars */
        $('.comment img[data-gravatar]').each(function(){
            $(this).attr('src',$(this).attr('data-gravatar'));
        });
        
    }
    
    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {
        
    }
    
	
	// add all your scripts here
	$('.toggle').toggle(function(){
		$('~ .nav, ~ ul', this).slideDown();
	}, function(){
		$('~ .nav, ~ ul', this).slideUp();
	});
	
	$('.pchcrelatedposts ul').hide();
	
	$('#layerslider').layerSlider({
		// User settings (can be modified)
		
		autoStart			: true,						// If true, slideshow will automatically start after loading the page.
		firstLayer			: 1,						// LayerSlider will begin with this layer.
		twoWaySlideshow		: false,					// If true, slideshow will go backwards if you click the prev button.
		keybNav				: true,						// Keyboard navigation. You can navigate with the left and right arrow keys.

		// NEW FEATURES v2.0 touchNav
		
		touchNav			: true,						// Touch-control (on mobile devices)

		imgPreload			: true,						// Image preload. Preloads all images and background-images of the next layer.
		navPrevNext			: true,						// If false, Prev and Next buttons will be invisible.
		navStartStop		: true,						// If false, Start and Stop buttons will be invisible.
		navButtons			: true,						// If false, slide buttons will be invisible.
		skin				: 'borderlesslight3d',				// You can change the skin of the Slider, use 'noskin' to hide skin and buttons. (Pre-defined skins are: 'deafultskin', 'lightskin', 'darkskin', 'glass' and 'minimal'.)
		skinsPath			: 'wp-content/themes/pchc/library/layerslider/skins/',	// You can change the default path of the skins folder. Note, that you must use the slash at the end of the path.
		pauseOnHover		: true,						// SlideShow will pause when mouse pointer is over LayerSlider.

		// NEW FEATURES v1.6 optional globalBGColor & globalBGImage

		globalBGColor		: 'transparent',			// Background color of LayerSlider. You can use all CSS methods, like hexa colors, rgb(r,g,b) method, color names, etc. Note, that background sublayers are covering the background.
		globalBGImage		: false,					// Background image of LayerSlider. This will be a fixed background image of LayerSlider by default. Note, that background sublayers are covering the global background image.

		// NEW FEATURES v1.7 animateFirstLayer & yourLogo

		animateFirstLayer	: false,					// If true, first layer will animate (slide in) instead of fading
		yourLogo			: false,					// This is a fixed image that will be shown above of LayerSlider container. For example if you want to display your own logo, etc. You have to add the correct path to your image file.
		yourLogoStyle		: 'position: absolute; z-index: 1001; left: 10px; top: 10px;', // You can style your logo. You are allowed to use any CSS properties, for example add left and top properties to place the image inside the LayerSlider container anywhere you want.

		// NEW FEATURES v1.8 yourLogoLink & yourLogoTarget
		
		yourLogoLink		: false,					// You can add a link to your logo. Set false is you want to display only an image without a link.
		yourLogoTarget		: '_blank',					// If '_blank', the clicked url will open in a new window.

		// NEW FEATURES v2.0 loops, forceLoopNum, autoPlayVideos, autoPauseSlideshow & youtubePreview
		
		loops				: 0,						// Number of loops if autoStart set true (0 means infinite!)
		forceLoopNum		: true,						// If true, the slider will always stop at the given number of loops even if the user restarts the slideshow
		autoPlayVideos		: true,						// If true, slider will autoplay youtube / vimeo videos - you can use it with autoPauseSlideshow
		autoPauseSlideshow	: 'auto',					// 'auto', true or false. 'auto' means, if autoPlayVideos is set to true, slideshow will stop UNTIL the video is playing and after that it continues. True means slideshow will stop and it won't continue after video is played.
		youtubePreview		: 'maxresdefault.jpg',		// Default thumbnail picture of YouTube videos. Can be 'maxresdefault.jpg', 'hqdefault.jpg', 'mqdefault.jpg' or 'default.jpg'. Note, that 'maxresdefault.jpg' os not available to all (not HD) videos.

		// LayerSlider API callback functions

		cbInit				: function(){},				// Calling when LayerSlider loads.
		cbStart				: function(){},				// Calling when you click the slideshow start button.
		cbStop				: function(){},				// Calling when click the slideshow stop / pause button.
		cbPause				: function(){},				// Calling when slideshow pauses (if pauseOnHover is true).
		cbAnimStart			: function(){},				// Calling when animation starts.
		cbAnimStop			: function(){},				// Calling when the animation of current layer ends, but the sublayers of this layer still may be animating.
		cbPrev				: function(){},				// Calling when you click the previous button (or if you use keyboard or touch navigation).
		cbNext				: function(){},				// Calling when you click the next button (or if you use keyboard or touch navigation).

		// The following global settings can be override separately by each layers and / or sublayers local settings (see the documentation for more information).
		
		slideDirection		: 'right',					// Slide direction. New layers will sliding FROM(!) this direction.
		slideDelay			: 4000,						// Time before the next slide will be loading.
		parallaxIn			: .45,						// Modifies the parallax-effect of the slide-in animation.
		parallaxOut			: .45,						// Modifies the parallax-effect of the slide-out animation.
		durationIn			: 1500,						// Duration of the slide-in animation.
		durationOut			: 1500,						// Duration of the slide-out animation.
		easingIn			: 'easeInOutQuint',			// Easing (type of transition) of the slide-in animation.
		easingOut			: 'easeInOutQuint',			// Easing (type of transition) of the slide-out animation.
		delayIn				: 0,						// Delay time of the slide-in animation.
		delayOut			: 0							// Delay time of the slide-out animation.
	});
	
 
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );