jQuery(document).ready(function(e){e(".woocommerce textarea[placeholder], .woocommerce-page textarea[placeholder], .woocommerce input[placeholder], .woocommerce-page input[placeholder]").placeholder();e("select.orderby").change(function(){e(this).closest("form").submit()});e("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass("buttons_added").append('<input type="button" value="+" class="plus" />').prepend('<input type="button" value="-" class="minus" />');e("input.qty:not(.product-quantity input.qty)").each(function(){var t=parseFloat(e(this).attr("min"));t&&t>0&&parseFloat(e(this).val())<t&&e(this).val(t)});e(document).on("click",".plus, .minus",function(){var t=e(this).closest(".quantity").find(".qty"),n=parseFloat(t.val()),r=parseFloat(t.attr("max")),i=parseFloat(t.attr("min")),s=t.attr("step");if(!n||n==""||n=="NaN")n=0;if(r==""||r=="NaN")r="";if(i==""||i=="NaN")i=0;if(s=="any"||s==""||s==undefined||parseFloat(s)=="NaN")s=1;e(this).is(".plus")?r&&(r==n||n>r)?t.val(r):t.val(n+parseFloat(s)):i&&(i==n||n<i)?t.val(i):n>0&&t.val(n-parseFloat(s));t.trigger("change")});var t=woocommerce_params.countries.replace(/&quot;/g,'"'),n=e.parseJSON(t);e("select.country_to_state").change(function(){var t=e(this).val(),r=e(this).closest("div").find("#billing_state, #shipping_state, #calc_shipping_state"),i=r.parent(),s=r.attr("name"),o=r.attr("id"),u=r.val(),a=r.attr("placeholder");if(n[t])if(n[t].length==0){r.parent().hide().find(".chzn-container").remove();r.replaceWith('<input type="hidden" class="hidden" name="'+s+'" id="'+o+'" value="" placeholder="'+a+'" />');e("body").trigger("country_to_state_changed",[t,e(this).closest("div")])}else{var f="",l=n[t];for(var c in l)f=f+'<option value="'+c+'">'+l[c]+"</option>";r.parent().show();if(r.is("input")){r.replaceWith('<select name="'+s+'" id="'+o+'" class="state_select" placeholder="'+a+'"></select>');r=e(this).closest("div").find("#billing_state, #shipping_state, #calc_shipping_state")}r.html('<option value="">'+woocommerce_params.i18n_select_state_text+"</option>"+f);r.val(u);e("body").trigger("country_to_state_changed",[t,e(this).closest("div")])}else if(r.is("select")){i.show().find(".chzn-container").remove();r.replaceWith('<input type="text" class="input-text" name="'+s+'" id="'+o+'" placeholder="'+a+'" />');e("body").trigger("country_to_state_changed",[t,e(this).closest("div")])}else if(r.is(".hidden")){i.show().find(".chzn-container").remove();r.replaceWith('<input type="text" class="input-text" name="'+s+'" id="'+o+'" placeholder="'+a+'" />');e("body").trigger("country_to_state_changed",[t,e(this).closest("div")])}e("body").trigger("country_to_state_changing",[t,e(this).closest("div")])})});
;/*!
 * jQuery Cookie Plugin v1.3.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */(function(e){typeof define=="function"&&define.amd&&define.amd.jQuery?define(["jquery"],e):e(jQuery)})(function(e){function n(e){return e}function r(e){return decodeURIComponent(e.replace(t," "))}function i(e){e.indexOf('"')===0&&(e=e.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));return s.json?JSON.parse(e):e}var t=/\+/g,s=e.cookie=function(t,o,u){if(o!==undefined){u=e.extend({},s.defaults,u);if(typeof u.expires=="number"){var a=u.expires,f=u.expires=new Date;f.setDate(f.getDate()+a)}o=s.json?JSON.stringify(o):String(o);return document.cookie=[encodeURIComponent(t),"=",s.raw?o:encodeURIComponent(o),u.expires?"; expires="+u.expires.toUTCString():"",u.path?"; path="+u.path:"",u.domain?"; domain="+u.domain:"",u.secure?"; secure":""].join("")}var l=s.raw?n:r,c=document.cookie.split("; "),h=t?undefined:{};for(var p=0,d=c.length;p<d;p++){var v=c[p].split("="),m=l(v.shift()),g=l(v.join("="));if(t&&t===m){h=i(g);break}t||(h[m]=i(g))}return h};s.defaults={};e.removeCookie=function(t,n){if(e.cookie(t)!==undefined){e.cookie(t,"",e.extend(n,{expires:-1}));return!0}return!1}});
;jQuery(document).ready(function(e){$supports_html5_storage="sessionStorage"in window&&window.sessionStorage!==null;$fragment_refresh={url:woocommerce_params.ajax_url,type:"POST",data:{action:"woocommerce_get_refreshed_fragments"},success:function(t){if(t&&t.fragments){e.each(t.fragments,function(t,n){e(t).replaceWith(n)});if($supports_html5_storage){sessionStorage.setItem("wc_fragments",JSON.stringify(t.fragments));sessionStorage.setItem("wc_cart_hash",t.cart_hash)}e("body").trigger("wc_fragments_refreshed")}}};if($supports_html5_storage){e("body").bind("added_to_cart",function(e,t,n){sessionStorage.setItem("wc_fragments",JSON.stringify(t));sessionStorage.setItem("wc_cart_hash",n)});try{var t=e.parseJSON(sessionStorage.getItem("wc_fragments")),n=sessionStorage.getItem("wc_cart_hash"),r=e.cookie("woocommerce_cart_hash");if(n==null||n==undefined||n=="")n="";if(r==null||r==undefined||r=="")r="";if(!t||!t["div.widget_shopping_cart_content"]||n!=r)throw"No fragment";e.each(t,function(t,n){e(t).replaceWith(n)});e("body").trigger("wc_fragments_loaded")}catch(i){e.ajax($fragment_refresh)}}else e.ajax($fragment_refresh);e.cookie("woocommerce_items_in_cart")>0?e(".hide_cart_widget_if_empty").closest(".widget_shopping_cart").show():e(".hide_cart_widget_if_empty").closest(".widget_shopping_cart").hide();e("body").bind("adding_to_cart",function(){e(".hide_cart_widget_if_empty").closest(".widget_shopping_cart").show()})});
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
;var wpfbFileInfos = [];

function wpfilebase_filedetails(id) {
	id = 'wpfilebase-filedetails' + id;
	if('undefined' != typeof jQuery && jQuery('#'+id).length > 0) { jQuery('#'+id).slideToggle(); }
	else {
		var dtls = document.getElementById('wpfilebase-filedetails' + id);
		if(dtls) dtls.style.display = (dtls.style.display!='none') ? 'none' : 'block';
	}
	return false;	
}

function wpfb_getFileInfo(url)
{
	var i,fi,uesc=unescape(url);
	for(i = 0; i < wpfbFileInfos.length; i++) {
		fi = wpfbFileInfos[i];
		if(fi.url == url || fi.url == uesc)	return fi;
	}
	try{// to get url by ajax request
		// wpfbfid
		fi = jQuery.parseJSON(jQuery.ajax({url:wpfbConf.ajurl,data:{action:"fileinfo",url:uesc},async:false}).responseText);
		if(typeof(fi) == 'object' && fi.id > 0) {
			wpfbFileInfos.push(fi);
			return fi;		
		}
	}
	catch(err){}	
	return null;
}

function wpfb_ondownload(url) {
	if(typeof(url) == 'object') url = url.data;
	if(typeof(wpfb_ondl) == 'function' && 'string' == typeof(url) && url.length < 1024) { // on img load fail, url is the response body (404 ERROR page)??
		var fi = wpfb_getFileInfo(url);
		if(fi != null) {
			try { wpfb_ondl(fi.id,'/'+wpfbConf.db+'/'+fi.path,fi.path); }
			catch(err){}
		}
	}
}

function wpfb_onclick(event) {
	wpfb_ondownload(event);	
	if(wpfbConf.hl) { window.location=event.data; return false; } // hide links
	return true;
}

function wpfb_processlink(index, el) {
	var url=el.getAttribute('href'),i;
	el = jQuery(el);
	if((i=url.indexOf('#')) > 0) {
		var fid = url.substr(i);
		fid = fid.substr(fid.lastIndexOf('-')+1);
		el.attr('wpfbfid', fid);
		url = url.substr(0, i); // remove hash, not actually needed
	}
	el.unbind('click').click(url, wpfb_onclick); // bind onclick
	if(wpfbConf.cm && typeof(wpfb_addContextMenu) == 'function') wpfb_addContextMenu(el, url);
	if(wpfbConf.hl) url = 'javascript:;';
	el.attr('href', url);
}

function wpfb_processimg(index, el)
{
	jQuery(el).unbind('load').load(el.src, wpfb_ondownload);
}

function wpfb_setupLinks() {
	var i,els,h,rePl,reQs,reHs;
	if(!wpfbConf.ql) return;

	reQs = /\?wpfb_dl=([0-9]+)$/;
	reHs = /#wpfb-file-([0-9]+)$/;
	rePl = new RegExp('^'+wpfbConf.hu+wpfbConf.db+'/');	
	
	els = document.getElementsByTagName('a');
	for(i=0;i<els.length;i++){
		h = els[i].getAttribute('href');
		if(h && (h.search(reQs)>0 || h.search(reHs)>0 || h.search(rePl)==0)) {
			if('undefined' != typeof els[i].wpfbProcessed) continue;
			els[i].wpfbProcessed = true;
			wpfb_processlink(i,els[i]);
		}
	}
	
	els = document.getElementsByTagName('img');
	for(i=0;i<els.length;i++){
		h = els[i].getAttribute('src');
		if(h && (h.search(reQs)>0 || h.search(rePl)==0)) {
			if('undefined' != typeof els[i].wpfbProcessed) continue;
			els[i].wpfbProcessed = true;
			wpfb_processimg(i,els[i]);
		}
	}
}

if(typeof(jQuery) != 'undefined') {
	jQuery(document).ready(function() {
		wpfb_setupLinks();
		setInterval(wpfb_setupLinks, 300);
	});
}
