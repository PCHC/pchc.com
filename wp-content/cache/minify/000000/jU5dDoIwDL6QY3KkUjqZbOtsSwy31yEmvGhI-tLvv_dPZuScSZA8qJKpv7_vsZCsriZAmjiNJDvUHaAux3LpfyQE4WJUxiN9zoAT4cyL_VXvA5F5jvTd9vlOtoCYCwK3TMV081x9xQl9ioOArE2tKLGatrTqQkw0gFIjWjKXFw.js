/*! http://mths.be/placeholder v2.0.7 by @mathias */(function(e,t,n){function l(e){var t={},r=/^jQuery\d+$/;n.each(e.attributes,function(e,n){n.specified&&!r.test(n.name)&&(t[n.name]=n.value)});return t}function c(e,r){var i=this,s=n(i);if(i.value==s.attr("placeholder")&&s.hasClass("placeholder"))if(s.data("placeholder-password")){s=s.hide().next().show().attr("id",s.removeAttr("id").data("placeholder-id"));if(e===!0)return s[0].value=r;s.focus()}else{i.value="";s.removeClass("placeholder");i==t.activeElement&&i.select()}}function h(){var e,t=this,r=n(t),i=this.id;if(t.value==""){if(t.type=="password"){if(!r.data("placeholder-textinput")){try{e=r.clone().attr({type:"text"})}catch(s){e=n("<input>").attr(n.extend(l(this),{type:"text"}))}e.removeAttr("name").data({"placeholder-password":r,"placeholder-id":i}).bind("focus.placeholder",c);r.data({"placeholder-textinput":e,"placeholder-id":i}).before(e)}r=r.removeAttr("id").hide().prev().attr("id",i).show()}r.addClass("placeholder");r[0].value=r.attr("placeholder")}else r.removeClass("placeholder")}var r="placeholder"in t.createElement("input"),i="placeholder"in t.createElement("textarea"),s=n.fn,o=n.valHooks,u=n.propHooks,a,f;if(r&&i){f=s.placeholder=function(){return this};f.input=f.textarea=!0}else{f=s.placeholder=function(){var e=this;e.filter((r?"textarea":":input")+"[placeholder]").not(".placeholder").bind({"focus.placeholder":c,"blur.placeholder":h}).data("placeholder-enabled",!0).trigger("blur.placeholder");return e};f.input=r;f.textarea=i;a={get:function(e){var t=n(e),r=t.data("placeholder-password");return r?r[0].value:t.data("placeholder-enabled")&&t.hasClass("placeholder")?"":e.value},set:function(e,r){var i=n(e),s=i.data("placeholder-password");if(s)return s[0].value=r;if(!i.data("placeholder-enabled"))return e.value=r;if(r==""){e.value=r;e!=t.activeElement&&h.call(e)}else i.hasClass("placeholder")?c.call(e,!0,r)||(e.value=r):e.value=r;return i}};if(!r){o.input=a;u.value=a}if(!i){o.textarea=a;u.value=a}n(function(){n(t).delegate("form","submit.placeholder",function(){var e=n(".placeholder",this).each(c);setTimeout(function(){e.each(h)},10)})});n(e).bind("beforeunload.placeholder",function(){n(".placeholder").each(function(){this.value=""})})}})(this,document,jQuery);
;jQuery(document).ready(function(e){e(".woocommerce textarea[placeholder], .woocommerce-page textarea[placeholder], .woocommerce input[placeholder], .woocommerce-page input[placeholder]").placeholder();e("select.orderby").change(function(){e(this).closest("form").submit()});e("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass("buttons_added").append('<input type="button" value="+" class="plus" />').prepend('<input type="button" value="-" class="minus" />');e("input.qty:not(.product-quantity input.qty)").each(function(){var t=parseFloat(e(this).attr("min"));t&&t>0&&parseFloat(e(this).val())<t&&e(this).val(t)});e(document).on("click",".plus, .minus",function(){var t=e(this).closest(".quantity").find(".qty"),n=parseFloat(t.val()),r=parseFloat(t.attr("max")),i=parseFloat(t.attr("min")),s=t.attr("step");if(!n||n==""||n=="NaN")n=0;if(r==""||r=="NaN")r="";if(i==""||i=="NaN")i=0;if(s=="any"||s==""||s==undefined||parseFloat(s)=="NaN")s=1;e(this).is(".plus")?r&&(r==n||n>r)?t.val(r):t.val(n+parseFloat(s)):i&&(i==n||n<i)?t.val(i):n>0&&t.val(n-parseFloat(s));t.trigger("change")});var t=woocommerce_params.countries.replace(/&quot;/g,'"'),n=e.parseJSON(t);e("select.country_to_state").change(function(){var t=e(this).val(),r=e(this).closest("div").find("#billing_state, #shipping_state, #calc_shipping_state"),i=r.parent(),s=r.attr("name"),o=r.attr("id"),u=r.val(),a=r.attr("placeholder");if(n[t])if(n[t].length==0){r.parent().hide().find(".chzn-container").remove();r.replaceWith('<input type="hidden" class="hidden" name="'+s+'" id="'+o+'" value="" placeholder="'+a+'" />');e("body").trigger("country_to_state_changed",[t,e(this).closest("div")])}else{var f="",l=n[t];for(var c in l)f=f+'<option value="'+c+'">'+l[c]+"</option>";r.parent().show();if(r.is("input")){r.replaceWith('<select name="'+s+'" id="'+o+'" class="state_select" placeholder="'+a+'"></select>');r=e(this).closest("div").find("#billing_state, #shipping_state, #calc_shipping_state")}r.html('<option value="">'+woocommerce_params.i18n_select_state_text+"</option>"+f);r.val(u);e("body").trigger("country_to_state_changed",[t,e(this).closest("div")])}else if(r.is("select")){i.show().find(".chzn-container").remove();r.replaceWith('<input type="text" class="input-text" name="'+s+'" id="'+o+'" placeholder="'+a+'" />');e("body").trigger("country_to_state_changed",[t,e(this).closest("div")])}else if(r.is(".hidden")){i.show().find(".chzn-container").remove();r.replaceWith('<input type="text" class="input-text" name="'+s+'" id="'+o+'" placeholder="'+a+'" />');e("body").trigger("country_to_state_changed",[t,e(this).closest("div")])}e("body").trigger("country_to_state_changing",[t,e(this).closest("div")])})});
;jQuery(document).ready(function(e){function i(){r&&r.abort();if(e("select#shipping_method").size()>0||e("input#shipping_method").size()>0)var t=e("#shipping_method").val();else var t=e("input[name=shipping_method]:checked").val();var n=e("#order_review input[name=payment_method]:checked").val(),i=e("#billing_country").val(),s=e("#billing_state").val(),o=e("input#billing_postcode").val(),u=e("input#billing_city").val(),a=e("input#billing_address_1").val(),f=e("input#billing_address_2").val();if(e("#shiptobilling input").is(":checked")||e("#shiptobilling input").size()==0)var l=i,c=s,h=o,p=u,d=a,v=f;else var l=e("#shipping_country").val(),c=e("#shipping_state").val(),h=e("input#shipping_postcode").val(),p=e("input#shipping_city").val(),d=e("input#shipping_address_1").val(),v=e("input#shipping_address_2").val();e("#order_methods, #order_review").block({message:null,overlayCSS:{background:"#fff url("+woocommerce_params.ajax_loader_url+") no-repeat center",backgroundSize:"16px 16px",opacity:.6}});var m={action:"woocommerce_update_order_review",security:woocommerce_params.update_order_review_nonce,shipping_method:t,payment_method:n,country:i,state:s,postcode:o,city:u,address:a,address_2:f,s_country:l,s_state:c,s_postcode:h,s_city:p,s_address:d,s_address_2:v,post_data:e("form.checkout").serialize()};r=e.ajax({type:"POST",url:woocommerce_params.ajax_url,data:m,success:function(t){if(t){var n=e(t);e("#order_review").html(n.html());e("body").trigger("updated_checkout")}}})}function s(){var t=!0;if(e(n).size()){$required_siblings=e(n).closest(".form-row").siblings(".address-field.validate-required");$required_siblings.size()&&$required_siblings.each(function(){if(e(this).find("input.input-text").val()==""||e(this).find("input.input-text").val()=="undefined")t=!1})}if(t){n=!1;e("body").trigger("update_checkout")}}var t,n=!1,r;e("body").bind("update_checkout",function(){clearTimeout(t);i()});e("p.password, form.login, .checkout_coupon, div.shipping_address").hide();e("input.show_password").change(function(){e("p.password").slideToggle()});e("a.showlogin").click(function(){e("form.login").slideToggle();return!1});e("a.showcoupon").click(function(){e(".checkout_coupon").slideToggle();e("#coupon_code").focus();return!1});e("#shiptobilling input").change(function(){e("div.shipping_address").hide();e(this).is(":checked")||e("div.shipping_address").slideDown()}).change();if(woocommerce_params.option_guest_checkout=="yes"){e("div.create-account").hide();e("input#createaccount").change(function(){e("div.create-account").hide();e(this).is(":checked")&&e("div.create-account").slideDown()}).change()}e("#order_review").on("click",".payment_methods input.input-radio",function(){if(e(".payment_methods input.input-radio").length>1){e("div.payment_box").filter(":visible").slideUp(250);e(this).is(":checked")&&e("div.payment_box."+e(this).attr("ID")).slideDown(250)}else e("div.payment_box").show()}).find("input[name=payment_method]:checked").click();e("form.checkout").on("change","select#shipping_method, input[name=shipping_method], #shiptobilling input, .update_totals_on_change select",function(){clearTimeout(t);n=!1;e("body").trigger("update_checkout")}).on("change",".address-field input.input-text, .update_totals_on_change input.input-text",function(){n&&s()}).on("change",".address-field select",function(){n=this;s()}).on("keydown",".address-field input.input-text, .update_totals_on_change input.input-text",function(e){var r=e.keyCode||e.which;if(r=="9")return;n=this;clearTimeout(t);t=setTimeout(s,"1000")}).on("blur change",".input-text, select",function(){var t=e(this),n=t.closest(".form-row"),r=!0;if(n.is(".validate-required")&&t.val()==""){n.removeClass("woocommerce-validated").addClass("woocommerce-invalid woocommerce-invalid-required-field");r=!1}if(n.is(".validate-email")&&t.val()){var i=new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);if(!i.test(t.val())){n.removeClass("woocommerce-validated").addClass("woocommerce-invalid woocommerce-invalid-email");r=!1}}r&&n.removeClass("woocommerce-invalid woocommerce-invalid-required-field").addClass("woocommerce-validated")}).submit(function(){clearTimeout(t);var n=e(this);if(n.is(".processing"))return!1;if(n.triggerHandler("checkout_place_order")!==!1&&n.triggerHandler("checkout_place_order_"+e("#order_review input[name=payment_method]:checked").val())!==!1){n.addClass("processing");var r=n.data();r["blockUI.isBlocked"]!=1&&n.block({message:null,overlayCSS:{background:"#fff url("+woocommerce_params.ajax_loader_url+") no-repeat center",backgroundSize:"16px 16px",opacity:.6}});e.ajax({type:"POST",url:woocommerce_params.checkout_url,data:n.serialize(),success:function(t){var r="";try{t.indexOf("<!--WC_START-->")>=0&&(t=t.split("<!--WC_START-->")[1]);t.indexOf("<!--WC_END-->")>=0&&(t=t.split("<!--WC_END-->")[0]);r=e.parseJSON(t);if(r.result!="success")throw r.result=="failure"?"Result failure":"Invalid response";window.location=decodeURI(r.redirect)}catch(i){e(".woocommerce-error, .woocommerce-message").remove();r.messages?n.prepend(r.messages):n.prepend(t);n.removeClass("processing").unblock();n.find(".input-text, select").blur();e("html, body").animate({scrollTop:e("form.checkout").offset().top-100},1e3);r.refresh=="true"&&e("body").trigger("update_checkout");e("body").trigger("checkout_error")}},dataType:"html"})}return!1});e("form.checkout_coupon").submit(function(){var t=e(this);if(t.is(".processing"))return!1;t.addClass("processing").block({message:null,overlayCSS:{background:"#fff url("+woocommerce_params.ajax_loader_url+") no-repeat center",backgroundSize:"16px 16px",opacity:.6}});var n={action:"woocommerce_apply_coupon",security:woocommerce_params.apply_coupon_nonce,coupon_code:t.find("input[name=coupon_code]").val()};e.ajax({type:"POST",url:woocommerce_params.ajax_url,data:n,success:function(n){e(".woocommerce-error, .woocommerce-message").remove();t.removeClass("processing").unblock();if(n){t.before(n);t.slideUp();e("body").trigger("update_checkout")}},dataType:"html"});return!1});var o=woocommerce_params.locale.replace(/&quot;/g,'"'),u=e.parseJSON(o),a=' <abbr class="required" title="'+woocommerce_params.i18n_required_text+'">*</abbr>';e("body").bind("country_to_state_changing",function(t,n,r){var i=r;if(typeof u[n]!="undefined")var s=u[n];else var s=u["default"];var o={address_1:"#billing_address_1_field, #shipping_address_1_field",address_2:"#billing_address_2_field, #shipping_address_2_field",state:"#billing_state_field, #shipping_state_field",postcode:"#billing_postcode_field, #shipping_postcode_field",city:"#billing_city_field, #shipping_city_field"};e.each(o,function(e,t){var n=i.find(t);if(s[e]){s[e].label&&n.find("label").html(s[e].label);s[e].placeholder&&n.find("input").attr("placeholder",s[e].placeholder);n.find("label abbr").remove();typeof s[e]["required"]=="undefined"&&u["default"][e]["required"]==1?n.find("label").append(a):s[e]["required"]==1&&n.find("label").append(a);e!=="state"&&(s[e]["hidden"]==1?n.hide().find("input").val(""):n.show())}else if(u["default"][e]){u["default"][e]["required"]==1&&n.find("label abbr").size()==0&&n.find("label").append(a);e!=="state"&&(typeof u["default"][e]["hidden"]=="undefined"||u["default"][e]["hidden"]==0)&&n.show()}});var f=i.find("#billing_postcode_field, #shipping_postcode_field"),l=i.find("#billing_city_field, #shipping_city_field"),c=i.find("#billing_state_field, #shipping_state_field");if(!f.attr("data-o_class")){f.attr("data-o_class",f.attr("class"));l.attr("data-o_class",l.attr("class"));c.attr("data-o_class",c.attr("class"))}if(s.postcode_before_city){f.add(l).add(c).removeClass("form-row-first form-row-last").addClass("form-row-wide");f.insertBefore(l)}else{f.attr("class",f.attr("data-o_class"));l.attr("class",l.attr("data-o_class"));c.attr("class",c.attr("data-o_class"));f.insertAfter(c)}}).bind("init_checkout",function(){e("#billing_country, #shipping_country, .country_to_state").change();e("body").trigger("update_checkout")});woocommerce_params.is_checkout==1&&e("body").trigger("init_checkout")});
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
