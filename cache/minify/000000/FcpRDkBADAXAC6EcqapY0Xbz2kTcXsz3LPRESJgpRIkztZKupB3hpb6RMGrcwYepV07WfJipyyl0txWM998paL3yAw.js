jQuery(document).ready(function(e){$supports_html5_storage="sessionStorage"in window&&window.sessionStorage!==null;$fragment_refresh={url:woocommerce_params.ajax_url,type:"POST",data:{action:"woocommerce_get_refreshed_fragments"},success:function(t){if(t&&t.fragments){e.each(t.fragments,function(t,n){e(t).replaceWith(n)});if($supports_html5_storage){sessionStorage.setItem("wc_fragments",JSON.stringify(t.fragments));sessionStorage.setItem("wc_cart_hash",t.cart_hash)}e("body").trigger("wc_fragments_refreshed")}}};if($supports_html5_storage){e("body").bind("added_to_cart",function(e,t,n){sessionStorage.setItem("wc_fragments",JSON.stringify(t));sessionStorage.setItem("wc_cart_hash",n)});try{var t=e.parseJSON(sessionStorage.getItem("wc_fragments")),n=sessionStorage.getItem("wc_cart_hash"),r=e.cookie("woocommerce_cart_hash");if(n==null||n==undefined||n=="")n="";if(r==null||r==undefined||r=="")r="";if(!t||!t["div.widget_shopping_cart_content"]||n!=r)throw"No fragment";e.each(t,function(t,n){e(t).replaceWith(n)});e("body").trigger("wc_fragments_loaded")}catch(i){e.ajax($fragment_refresh)}}else e.ajax($fragment_refresh);e.cookie("woocommerce_items_in_cart")>0?e(".hide_cart_widget_if_empty").closest(".widget_shopping_cart").show():e(".hide_cart_widget_if_empty").closest(".widget_shopping_cart").hide();e("body").bind("adding_to_cart",function(){e(".hide_cart_widget_if_empty").closest(".widget_shopping_cart").show()})});
;/*
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
//	$('.toggle').toggle(function(){
//		$('~ .nav, ~ ul', this).slideDown();
//	}, function(){
//		$('~ .nav, ~ ul', this).slideUp();
//	});
	
	$('.toggle').each(function(){
		var toggleTarget = $(this).data('toggleTarget');
		if($(toggleTarget, this).length > 0) {
			$(this).toggle(function(){
				$(toggleTarget, this).addClass('toggle-show').removeClass('toggle-hide');
			}, function(){
				$(toggleTarget, this).addClass('toggle-hide').removeClass('toggle-show');
			});
		} else if($(this).parent().find(toggleTarget).length > 0) {
			$(this).toggle(function(){
				$(this).parent().find(toggleTarget).addClass('toggle-show').removeClass('toggle-hide');
			}, function(){
				$(this).parent().find(toggleTarget).addClass('toggle-hide').removeClass('toggle-show');
			});
		} else {
			$(this).toggle(function(){
				$(toggleTarget).addClass('toggle-show').removeClass('toggle-hide');
			}, function(){
				$(toggleTarget).addClass('toggle-hide').removeClass('toggle-show');
			});
		}
	});
	
	$('.toggle-init-hide').addClass('toggle-hide').removeClass('toggle-show');
	
	$('button[type=reset]').click(function(){
		var $form = $(this).parents('form');
		$form.find('input').removeAttr('checked');
		$form.submit();
	});
	
	
	// fix the main navigation to the top of the window if you scroll below.
	
	var headerHeight = 206;
	
	function headerNavScroll( scrollTop ){
	
		if( responsive_viewport < 481 ) {
			headerHeight = 145;
		}
		
		if( scrollTop > headerHeight ) {
			$('#header-nav').addClass('fixed');
		} else {
			$('#header-nav').removeClass('fixed');
		}
	}
	
	headerNavScroll( $(document).scrollTop() );
	
	$(document).scroll(function(){
		headerNavScroll( $(this).scrollTop() );
	});
	
	$('#refine-search input').change(function(){
		
		var posttype = $(this).data('posttype');
		
		if($(this).is(':checked')) {
			$('#main .' + posttype).fadeIn();
		} else {
			$('#main .' + posttype).fadeOut();
		}
		
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