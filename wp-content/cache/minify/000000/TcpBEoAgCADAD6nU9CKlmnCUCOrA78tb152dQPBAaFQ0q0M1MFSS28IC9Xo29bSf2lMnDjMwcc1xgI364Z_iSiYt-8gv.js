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
;/*!
 * jQuery Form Plugin
 * version: 2.73 (03-MAY-2011)
 * @requires jQuery v1.3.2 or later
 *
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
(function(b){b.fn.ajaxSubmit=function(t){if(!this.length){a("ajaxSubmit: skipping submit process - no element selected");return this}if(typeof t=="function"){t={success:t}}var h=this.attr("action");var d=(typeof h==="string")?b.trim(h):"";if(d){d=(d.match(/^([^#]+)/)||[])[1]}d=d||window.location.href||"";t=b.extend(true,{url:d,success:b.ajaxSettings.success,type:this[0].getAttribute("method")||"GET",iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},t);var u={};this.trigger("form-pre-serialize",[this,t,u]);if(u.veto){a("ajaxSubmit: submit vetoed via form-pre-serialize trigger");return this}if(t.beforeSerialize&&t.beforeSerialize(this,t)===false){a("ajaxSubmit: submit aborted via beforeSerialize callback");return this}var f,p,m=this.formToArray(t.semantic);if(t.data){t.extraData=t.data;for(f in t.data){if(t.data[f] instanceof Array){for(var i in t.data[f]){m.push({name:f,value:t.data[f][i]})}}else{p=t.data[f];p=b.isFunction(p)?p():p;m.push({name:f,value:p})}}}if(t.beforeSubmit&&t.beforeSubmit(m,this,t)===false){a("ajaxSubmit: submit aborted via beforeSubmit callback");return this}this.trigger("form-submit-validate",[m,this,t,u]);if(u.veto){a("ajaxSubmit: submit vetoed via form-submit-validate trigger");return this}var c=b.param(m);if(t.type.toUpperCase()=="GET"){t.url+=(t.url.indexOf("?")>=0?"&":"?")+c;t.data=null}else{t.data=c}var s=this,l=[];if(t.resetForm){l.push(function(){s.resetForm()})}if(t.clearForm){l.push(function(){s.clearForm()})}if(!t.dataType&&t.target){var r=t.success||function(){};l.push(function(n){var k=t.replaceTarget?"replaceWith":"html";b(t.target)[k](n).each(r,arguments)})}else{if(t.success){l.push(t.success)}}t.success=function(w,n,x){var v=t.context||t;for(var q=0,k=l.length;q<k;q++){l[q].apply(v,[w,n,x||s,s])}};var g=b("input:file",this).length>0;var e="multipart/form-data";var j=(s.attr("enctype")==e||s.attr("encoding")==e);if(t.iframe!==false&&(g||t.iframe||j)){if(t.closeKeepAlive){b.get(t.closeKeepAlive,o)}else{o()}}else{b.ajax(t)}this.trigger("form-submit-notify",[this,t]);return this;function o(){var v=s[0];if(b(":input[name=submit],:input[id=submit]",v).length){alert('Error: Form elements must not have name or id of "submit".');return}var D=b.extend(true,{},b.ajaxSettings,t);D.context=D.context||D;var G="jqFormIO"+(new Date().getTime()),A="_"+G;var x=b('<iframe id="'+G+'" name="'+G+'" src="'+D.iframeSrc+'" />');var B=x[0];x.css({position:"absolute",top:"-1000px",left:"-1000px"});var y={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(n){var O=(n==="timeout"?"timeout":"aborted");a("aborting upload... "+O);this.aborted=1;x.attr("src",D.iframeSrc);y.error=O;D.error&&D.error.call(D.context,y,O,O);K&&b.event.trigger("ajaxError",[y,D,O]);D.complete&&D.complete.call(D.context,y,O)}};var K=D.global;if(K&&!b.active++){b.event.trigger("ajaxStart")}if(K){b.event.trigger("ajaxSend",[y,D])}if(D.beforeSend&&D.beforeSend.call(D.context,y,D)===false){if(D.global){b.active--}return}if(y.aborted){return}var J=0,C;var z=v.clk;if(z){var H=z.name;if(H&&!z.disabled){D.extraData=D.extraData||{};D.extraData[H]=z.value;if(z.type=="image"){D.extraData[H+".x"]=v.clk_x;D.extraData[H+".y"]=v.clk_y}}}function I(){var Q=s.attr("target"),O=s.attr("action");v.setAttribute("target",G);if(v.getAttribute("method")!="POST"){v.setAttribute("method","POST")}if(v.getAttribute("action")!=D.url){v.setAttribute("action",D.url)}if(!D.skipEncodingOverride){s.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"})}if(D.timeout){C=setTimeout(function(){J=true;F(true)},D.timeout)}var P=[];try{if(D.extraData){for(var R in D.extraData){P.push(b('<input type="hidden" name="'+R+'" value="'+D.extraData[R]+'" />').appendTo(v)[0])}}x.appendTo("body");B.attachEvent?B.attachEvent("onload",F):B.addEventListener("load",F,false);v.submit()}finally{v.setAttribute("action",O);if(Q){v.setAttribute("target",Q)}else{s.removeAttr("target")}b(P).remove()}}if(D.forceSync){I()}else{setTimeout(I,10)}var M,N,L=50,w;function F(T){if(y.aborted||w){return}if(T===true&&y){y.abort("timeout");return}var S=B.contentWindow?B.contentWindow.document:B.contentDocument?B.contentDocument:B.document;if(!S||S.location.href==D.iframeSrc){if(!J){return}}B.detachEvent?B.detachEvent("onload",F):B.removeEventListener("load",F,false);var P=true;try{if(J){throw"timeout"}var U=D.dataType=="xml"||S.XMLDocument||b.isXMLDoc(S);a("isXml="+U);if(!U&&window.opera&&(S.body==null||S.body.innerHTML=="")){if(--L){a("requeing onLoad callback, DOM not available");setTimeout(F,250);return}}y.responseText=S.body?S.body.innerHTML:S.documentElement?S.documentElement.innerHTML:null;y.responseXML=S.XMLDocument?S.XMLDocument:S;if(U){D.dataType="xml"}y.getResponseHeader=function(W){var V={"content-type":D.dataType};return V[W]};var R=/(json|script|text)/.test(D.dataType);if(R||D.textarea){var O=S.getElementsByTagName("textarea")[0];if(O){y.responseText=O.value}else{if(R){var Q=S.getElementsByTagName("pre")[0];var n=S.getElementsByTagName("body")[0];if(Q){y.responseText=Q.textContent}else{if(n){y.responseText=n.innerHTML}}}}}else{if(D.dataType=="xml"&&!y.responseXML&&y.responseText!=null){y.responseXML=E(y.responseText)}}M=k(y,D.dataType,D)}catch(T){a("error caught:",T);P=false;y.error=T;D.error&&D.error.call(D.context,y,"error",T);K&&b.event.trigger("ajaxError",[y,D,T])}if(y.aborted){a("upload aborted");P=false}if(P){D.success&&D.success.call(D.context,M,"success",y);K&&b.event.trigger("ajaxSuccess",[y,D])}K&&b.event.trigger("ajaxComplete",[y,D]);if(K&&!--b.active){b.event.trigger("ajaxStop")}D.complete&&D.complete.call(D.context,y,P?"success":"error");w=true;if(D.timeout){clearTimeout(C)}setTimeout(function(){x.removeData("form-plugin-onload");x.remove();y.responseXML=null},100)}var E=b.parseXML||function(n,O){if(window.ActiveXObject){O=new ActiveXObject("Microsoft.XMLDOM");O.async="false";O.loadXML(n)}else{O=(new DOMParser()).parseFromString(n,"text/xml")}return(O&&O.documentElement&&O.documentElement.nodeName!="parsererror")?O:null};var q=b.parseJSON||function(n){return window["eval"]("("+n+")")};var k=function(S,Q,P){var O=S.getResponseHeader("content-type")||"",n=Q==="xml"||!Q&&O.indexOf("xml")>=0,R=n?S.responseXML:S.responseText;if(n&&R.documentElement.nodeName==="parsererror"){b.error&&b.error("parsererror")}if(P&&P.dataFilter){R=P.dataFilter(R,Q)}if(typeof R==="string"){if(Q==="json"||!Q&&O.indexOf("json")>=0){R=q(R)}else{if(Q==="script"||!Q&&O.indexOf("javascript")>=0){b.globalEval(R)}}}return R}}};b.fn.ajaxForm=function(c){if(this.length===0){var d={s:this.selector,c:this.context};if(!b.isReady&&d.s){a("DOM not ready, queuing ajaxForm");b(function(){b(d.s,d.c).ajaxForm(c)});return this}a("terminating; zero elements found by selector"+(b.isReady?"":" (DOM not ready)"));return this}return this.ajaxFormUnbind().bind("submit.form-plugin",function(f){if(!f.isDefaultPrevented()){f.preventDefault();b(this).ajaxSubmit(c)}}).bind("click.form-plugin",function(j){var i=j.target;var g=b(i);if(!(g.is(":submit,input:image"))){var f=g.closest(":submit");if(f.length==0){return}i=f[0]}var h=this;h.clk=i;if(i.type=="image"){if(j.offsetX!=undefined){h.clk_x=j.offsetX;h.clk_y=j.offsetY}else{if(typeof b.fn.offset=="function"){var k=g.offset();h.clk_x=j.pageX-k.left;h.clk_y=j.pageY-k.top}else{h.clk_x=j.pageX-i.offsetLeft;h.clk_y=j.pageY-i.offsetTop}}}setTimeout(function(){h.clk=h.clk_x=h.clk_y=null},100)})};b.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")};b.fn.formToArray=function(q){var p=[];if(this.length===0){return p}var d=this[0];var g=q?d.getElementsByTagName("*"):d.elements;if(!g){return p}var k,h,f,r,e,m,c;for(k=0,m=g.length;k<m;k++){e=g[k];f=e.name;if(!f){continue}if(q&&d.clk&&e.type=="image"){if(!e.disabled&&d.clk==e){p.push({name:f,value:b(e).val()});p.push({name:f+".x",value:d.clk_x},{name:f+".y",value:d.clk_y})}continue}r=b.fieldValue(e,true);if(r&&r.constructor==Array){for(h=0,c=r.length;h<c;h++){p.push({name:f,value:r[h]})}}else{if(r!==null&&typeof r!="undefined"){p.push({name:f,value:r})}}}if(!q&&d.clk){var l=b(d.clk),o=l[0];f=o.name;if(f&&!o.disabled&&o.type=="image"){p.push({name:f,value:l.val()});p.push({name:f+".x",value:d.clk_x},{name:f+".y",value:d.clk_y})}}return p};b.fn.formSerialize=function(c){return b.param(this.formToArray(c))};b.fn.fieldSerialize=function(d){var c=[];this.each(function(){var h=this.name;if(!h){return}var f=b.fieldValue(this,d);if(f&&f.constructor==Array){for(var g=0,e=f.length;g<e;g++){c.push({name:h,value:f[g]})}}else{if(f!==null&&typeof f!="undefined"){c.push({name:this.name,value:f})}}});return b.param(c)};b.fn.fieldValue=function(h){for(var g=[],e=0,c=this.length;e<c;e++){var f=this[e];var d=b.fieldValue(f,h);if(d===null||typeof d=="undefined"||(d.constructor==Array&&!d.length)){continue}d.constructor==Array?b.merge(g,d):g.push(d)}return g};b.fieldValue=function(c,j){var e=c.name,p=c.type,q=c.tagName.toLowerCase();if(j===undefined){j=true}if(j&&(!e||c.disabled||p=="reset"||p=="button"||(p=="checkbox"||p=="radio")&&!c.checked||(p=="submit"||p=="image")&&c.form&&c.form.clk!=c||q=="select"&&c.selectedIndex==-1)){return null}if(q=="select"){var k=c.selectedIndex;if(k<0){return null}var m=[],d=c.options;var g=(p=="select-one");var l=(g?k+1:d.length);for(var f=(g?k:0);f<l;f++){var h=d[f];if(h.selected){var o=h.value;if(!o){o=(h.attributes&&h.attributes.value&&!(h.attributes.value.specified))?h.text:h.value}if(g){return o}m.push(o)}}return m}return b(c).val()};b.fn.clearForm=function(){return this.each(function(){b("input,select,textarea",this).clearFields()})};b.fn.clearFields=b.fn.clearInputs=function(){return this.each(function(){var d=this.type,c=this.tagName.toLowerCase();if(d=="text"||d=="password"||c=="textarea"){this.value=""}else{if(d=="checkbox"||d=="radio"){this.checked=false}else{if(c=="select"){this.selectedIndex=-1}}}})};b.fn.resetForm=function(){return this.each(function(){if(typeof this.reset=="function"||(typeof this.reset=="object"&&!this.reset.nodeType)){this.reset()}})};b.fn.enable=function(c){if(c===undefined){c=true}return this.each(function(){this.disabled=!c})};b.fn.selected=function(c){if(c===undefined){c=true}return this.each(function(){var d=this.type;if(d=="checkbox"||d=="radio"){this.checked=c}else{if(this.tagName.toLowerCase()=="option"){var e=b(this).parent("select");if(c&&e[0]&&e[0].type=="select-one"){e.find("option").selected(false)}this.selected=c}}})};function a(){if(b.fn.ajaxSubmit.debug){var c="[jquery.form] "+Array.prototype.join.call(arguments,"");if(window.console&&window.console.log){window.console.log(c)}else{if(window.opera&&window.opera.postError){window.opera.postError(c)}}}}})(jQuery);
;function ninja_forms_before_submit(e,t,n){var r=jQuery(t).triggerHandler("beforeSubmit",[e,t,n]);if(r!==false){r=jQuery("body").triggerHandler("beforeSubmit",[e,t,n])}if(r!==false){r=jQuery(document).triggerHandler("beforeSubmit",[e,t,n])}return r}function ninja_forms_response(e,t,n,r){if(ninja_forms_settings.ajax_msg_format=="inline"){var i=jQuery(r).triggerHandler("submitResponse",[e]);if(i!==false){i=jQuery("body").triggerHandler("submitResponse",[e])}if(i!==false){i=jQuery(document).triggerHandler("submitResponse",[e])}return i}}function ninja_forms_register_response_function(e,t){if(typeof window["ninja_forms_response_function_list"][e]=="undefined"){window["ninja_forms_response_function_list"][e]={}}window["ninja_forms_response_function_list"][e][t]=t}function ninja_forms_register_before_submit_function(e,t){if(typeof window["ninja_forms_before_submit_function_list"][e]=="undefined"){window["ninja_forms_before_submit_function_list"][e]={}}window["ninja_forms_before_submit_function_list"][e][t]=t}function ninja_forms_default_before_submit(e,t,n){var r=jQuery(t).prop("id").replace("ninja_forms_form_","");jQuery("#ninja_forms_form_"+r+"_process_msg").show();jQuery("#ninja_forms_form_"+r+"_response_msg").prop("innerHTML","");jQuery("#ninja_forms_form_"+r+"_response_msg").removeClass("ninja-forms-error-msg");jQuery("#ninja_forms_form_"+r+"_response_msg").removeClass("ninja-forms-success-msg");jQuery(".ninja-forms-field-error").prop("innerHTML","");jQuery(".ninja-forms-error").removeClass("ninja-forms-error");return true}function ninja_forms_default_response(e){var t=e.form_id;jQuery("#ninja_forms_form_"+t+"_process_msg").hide();ninja_forms_update_error_msgs(e);ninja_forms_update_success_msg(e);return true}function ninja_forms_update_success_msg(e){var t="";var n=e.form_id;var r=e.success;var i=e.form_settings;var s=i.hide_complete;var o=i.clear_complete;if(r!=false){for(var u in r){t+="<p>"+r[u]+"</p>"}if(t!=""){jQuery("#ninja_forms_form_"+n+"_response_msg").removeClass("ninja-forms-error-msg");jQuery("#ninja_forms_form_"+n+"_response_msg").addClass("ninja-forms-success-msg");jQuery("#ninja_forms_form_"+n+"_response_msg").prop("innerHTML",t)}if(s==1){jQuery("#ninja_forms_form_"+n).hide()}if(o==1){jQuery("#ninja_forms_form_"+n).resetForm()}}}function ninja_forms_update_error_msgs(e){var t="";var n=e.form_id;var r=e.errors;var n=e.form_id;if(r!=false){for(var i in r){if(r[i]["location"]=="general"){t+="<p>"+r[i]["msg"]+"</p>"}else{var s=r[i]["location"];jQuery("#ninja_forms_field_"+s+"_error").show();jQuery("#ninja_forms_field_"+s+"_error").prop("innerHTML",r[i]["msg"]);jQuery("#ninja_forms_field_"+s+"_div_wrap").addClass("ninja-forms-error")}}if(t!=""){jQuery("#ninja_forms_form_"+n+"_response_msg").removeClass("ninja-forms-success-msg");jQuery("#ninja_forms_form_"+n+"_response_msg").addClass("ninja-forms-error-msg");jQuery("#ninja_forms_form_"+n+"_response_msg").prop("innerHTML",t)}}}function ninja_forms_html_decode(e){if(e){var t=jQuery("<div />").html(e).text();t=jQuery("<div />").html(t).text();return t}else{return""}}function ninja_forms_toggle_login_register(e,t){var n="ninja_forms_form_"+t+"_"+e+"_form";if(e=="login"){var r="ninja_forms_form_"+t+"_register_form"}else{var r="ninja_forms_form_"+t+"_login_form"}var i=document.getElementById(n);var s=document.getElementById(r);if(i.style.display=="block"){i.style.display="none"}else{i.style.display="block";s.style.display="none"}}function ninja_forms_get_form_id(e){var t=jQuery(e).closest("form").prop("id");t=t.replace("ninja_forms_form_","");if(t==""||t=="ninja_forms_admin"){t=jQuery("#_form_id").val()}return t}function check_pass_strength(e,t){jQuery("#pass-strength-result").removeClass("short bad good strong");if(!e){jQuery("#pass-strength-result").html(ninja_forms_password_strength.empty);return}strength=passwordStrength(e,t);switch(strength){case 2:jQuery("#pass-strength-result").addClass("bad").html(ninja_forms_password_strength["bad"]);break;case 3:jQuery("#pass-strength-result").addClass("good").html(ninja_forms_password_strength["good"]);break;case 4:jQuery("#pass-strength-result").addClass("strong").html(ninja_forms_password_strength["strong"]);break;case 5:jQuery("#pass-strength-result").addClass("short").html(ninja_forms_password_strength["mismatch"]);break;default:jQuery("#pass-strength-result").addClass("short").html(ninja_forms_password_strength["short"])}}function passwordStrength(e,t){var n=1,r=2,i=3,s=4,o=5,u=0,a,f;if(e!=t&&t.length>0)return o;if(e.length<4)return n;if(e.match(/[0-9]/))u+=10;if(e.match(/[a-z]/))u+=26;if(e.match(/[A-Z]/))u+=26;if(e.match(/[^a-zA-Z0-9]/))u+=31;a=Math.log(Math.pow(u,e.length));f=a/Math.LN2;if(f<40)return r;if(f<56)return i;return s}function ninja_forms_find_opposite_op(e){switch(e){case"add":return"subtract";case"subtract":return"add";case"multiply":return"divide";case"divide":return"multiply"}}function ninja_forms_var_operator(e){this.operation=e;this.evaluate=function(t,n){switch(this.operation){case"add":return t+n;case"subtract":return t-n;case"multiply":return t*n;case"divide":return t/n}}}jQuery(document).ready(function(jQuery){window["ninja_forms_response_function_list"]={};window["ninja_forms_before_submit_function_list"]={};jQuery(".ninja-forms-form input").bind("keypress",function(e){if(e.keyCode==13){var t=jQuery(this).attr("type");if(t!="textarea"){return false}}});jQuery("div.label-inside input, div.label-inside textarea").focus(function(){var e=jQuery("#"+this.id+"_label_hidden").val();if(this.value==e){this.value=""}});jQuery("div.label-inside input, div.label-inside textarea").blur(function(){var e=jQuery("#"+this.id+"_label_hidden").val();if(this.value==""){this.value=e}});if(jQuery.fn.mask){jQuery(".ninja-forms-mask").each(function(){var e=this.title;jQuery(this).mask(e)});jQuery(".ninja-forms-date").mask("99/99/9999")}if(jQuery.fn.datepicker){jQuery(".ninja-forms-datepicker").datepicker({dateFormat:ninja_forms_settings.date_format})}if(jQuery.fn.autoNumeric){jQuery(".ninja-forms-currency").autoNumeric({aSign:ninja_forms_settings.currency_symbol})}if(jQuery.fn.qtip){jQuery(".ninja-forms-help-text").qtip({style:{classes:"qtip-shadow qtip-dark"}})}jQuery(".ninja-forms-form").each(function(){var e=this.id.replace("ninja_forms_form_","");var t=window["ninja_forms_form_"+e+"_settings"];ajax=t.ajax;if(ajax==1){var n={beforeSubmit:ninja_forms_before_submit,success:ninja_forms_response,dataType:"json"};jQuery(this).ajaxForm(n);jQuery(this).on("submitResponse.default",function(e,t){return ninja_forms_default_response(t)});jQuery(this).on("beforeSubmit.default",function(e,t,n,r){return ninja_forms_default_before_submit(t,n,r)})}else{jQuery(this).submit(function(e){var t=jQuery(this).serialize();var n=this;var r="";return ninja_forms_before_submit(t,n,r)})}});jQuery(".pass1").val("").keyup(function(){var e=this.value;var t=this.id.replace("pass1","pass2");t=jQuery("#"+t).val();check_pass_strength(e,t)});jQuery(".pass2").val("").keyup(function(){var e=this.value;var t=this.id.replace("pass2","pass1");t=jQuery("#"+t).val();check_pass_strength(t,e)});var calc_fields=jQuery(".ninja-forms-field-calc-listen");calc_fields.each(function(e,t){if(this.type=="checkbox"){if(this.checked){var n="checked"}else{var n="unchecked"}}else{if(typeof this.type==="undefined"){var n=jQuery(this).prop("innerHTML")}else{var n=jQuery(this).val()}}var r=ninja_forms_get_form_id(this);var i=jQuery(this).attr("rel");var s=window["ninja_forms_form_"+r+"_calc_settings"];for(calc_id in s.calc_fields){if(calc_id!=i){jQuery(t).data(calc_id+"-oldValue",n)}}});jQuery("body").on("focus",".ninja-forms-field-list-options-span-calc-listen",function(e){var t=jQuery(this).attr("rel");if(jQuery("#ninja_forms_field_"+t+"_type").val()=="list"&&jQuery("#ninja_forms_field_"+t+"_list_type").val()=="radio"){var n=ninja_forms_get_form_id(this);var r=window["ninja_forms_form_"+n+"_calc_settings"];for(calc_id in r.calc_fields){if(calc_id!=t){jQuery(this).data(calc_id+"-oldValue",jQuery("input[name='ninja_forms_field_"+t+"']:checked").val())}}}});jQuery("body").on("mousedown",".ninja-forms-field-list-options-span-calc-listen",function(e){var t=jQuery(this).attr("rel");if(jQuery("#ninja_forms_field_"+t+"_type").val()=="list"&&jQuery("#ninja_forms_field_"+t+"_list_type").val()=="radio"){var n=ninja_forms_get_form_id(this);var r=window["ninja_forms_form_"+n+"_calc_settings"];for(calc_id in r.calc_fields){if(calc_id!=t){jQuery(this).data(calc_id+"-oldValue",jQuery("input[name='ninja_forms_field_"+t+"']:checked").val())}}}});jQuery("body").on("change",".ninja-forms-field-calc-listen",function(event){if(this==event.target){var form_id=ninja_forms_get_form_id(this);var field_id=jQuery(this).attr("rel");var calc_settings=window["ninja_forms_form_"+form_id+"_calc_settings"];var visible=jQuery("#ninja_forms_field_"+field_id+"_div_wrap").data("visible");for(calc_id in calc_settings.calc_fields){if(calc_id!=field_id){var calc_method=calc_settings.calc_fields[calc_id]["method"];var calc_places=calc_settings.calc_fields[calc_id]["places"];if(calc_method=="fields"){var change=false;for(var i=calc_settings.calc_fields[calc_id]["fields"].length-1;i>=0;i--){if(calc_settings.calc_fields[calc_id]["fields"][i]["field"]==field_id){change=true;break}}}else if(calc_method=="eq"){var change=false;if(typeof calc_settings.calc_fields[calc_id]["fields"]!=="undefined"){for(var i=calc_settings.calc_fields[calc_id]["fields"].length-1;i>=0;i--){if(calc_settings.calc_fields[calc_id]["fields"][i]==field_id){change=true;break}}}}if((calc_method=="fields"||calc_method=="eq")&&change||calc_method=="auto"){if(calc_method=="auto"||calc_method=="fields"){var key=jQuery(this).val();var new_value="";old_value=jQuery(this).data(calc_id+"-oldValue");if(jQuery("#ninja_forms_field_"+field_id+"_type").val()=="list"){var key=jQuery(this).val();if(jQuery("#ninja_forms_field_"+field_id+"_list_type").val()=="checkbox"){if(this.checked){jQuery(this).data(calc_id+"-oldValue","checked")}else{jQuery(this).data(calc_id+"-oldValue","unchecked")}if(this.checked&&visible==1){old_value=0}else if(this.checked&&visible!=1){old_value=key;new_value=0}else if(!this.checked&&visible==1){if(old_value=="checked"){old_value=key}else{old_value=0}new_value=0}else if(!this.checked&&visible!=1){if(old_value=="checked"){old_value=key}else{old_value=0}new_value=0}}else if(jQuery("#ninja_forms_field_"+field_id+"_list_type").val()=="radio"){var span=jQuery(this).parent().parent().parent().parent();old_value=jQuery(span).data(calc_id+"-oldValue");if(typeof old_value==="undefined"){if(this.checked){old_value=jQuery(this).val()}}if(this.checked&&visible==1){if(old_value==key){old_value=0}}else if(this.checked&&visible!=1){new_value=0}else if(!this.checked){old_value=0;new_value=0}if(this.checked){jQuery(span).data(calc_id+"-oldValue",key)}}else if(jQuery("#ninja_forms_field_"+field_id+"_list_type").val()=="multi"){if(jQuery.isArray(key)){var tmp=0;for(var i=key.length-1;i>=0;i--){if(typeof calc_settings.calc_value[field_id][key[i]]!=="undefined"){tmp+=parseFloat(calc_settings.calc_value[field_id][key[i]])}}new_value=tmp}if(jQuery.isArray(old_value)){var tmp=0;for(var i=old_value.length-1;i>=0;i--){if(typeof calc_settings.calc_value[field_id][old_value[i]]!=="undefined"){tmp+=parseFloat(calc_settings.calc_value[field_id][old_value[i]])}}old_value=tmp}}else{var old_value=jQuery(this).data(calc_id+"-oldValue")}}else if(jQuery("#ninja_forms_field_"+field_id+"_type").val()=="checkbox"){if(this.checked&&visible==1){var key="checked";old_value="unchecked"}else if(this.checked&&visible!=1){var key="unchecked";if(jQuery(this).data(calc_id+"-oldValue")=="checked"||typeof jQuery(this).data(calc_id+"-oldValue")==="undefined"){old_value="checked"}else{old_value=0}}else if(!this.checked&&visible!=1){var key="unchecked";old_value=0}else{var key="unchecked";if(jQuery(this).data(calc_id+"-oldValue")=="checked"||typeof jQuery(this).data(calc_id+"-oldValue")==="undefined"){old_value="checked"}else{old_value=0}}}else if(jQuery("#ninja_forms_field_"+field_id+"_type").val()=="calc"){if(key==""){key=jQuery("#ninja_forms_field_"+field_id).prop("innerHTML")}}if(new_value===""){if(typeof calc_settings.calc_value[field_id]!=="undefined"&&typeof calc_settings.calc_value[field_id][key]!=="undefined"){var new_value=calc_settings.calc_value[field_id][key]}else{if(typeof this.type==="undefined"){var new_value=this.innerHTML}else{var new_value=this.value}if(typeof ninja_forms_settings.currency_symbol!=="undefined"){new_value=new_value.replace(ninja_forms_settings.currency_symbol,"");new_value=new_value.replace(/,/g,"")}if(isNaN(new_value)){new_value=0}}}console.log(field_id+":"+old_value);if(typeof calc_settings.calc_value[field_id]!=="undefined"&&typeof calc_settings.calc_value[field_id][old_value]!=="undefined"){old_value=calc_settings.calc_value[field_id][old_value]}else{if(old_value==""||typeof old_value==="undefined"){old_value=0}else{if(isNaN(old_value)){if(typeof ninja_forms_settings.currency_symbol!=="undefined"){old_value=old_value.replace(ninja_forms_settings.currency_symbol,"");old_value=old_value.replace(/,/g,"")}}}}if(jQuery("#ninja_forms_field_"+calc_id).attr("type")=="text"){var current_value=jQuery("#ninja_forms_field_"+calc_id).val()}else{var current_value=jQuery("#ninja_forms_field_"+calc_id).html()}if(typeof ninja_forms_settings.currency_symbol!=="undefined"){current_value=current_value.replace(ninja_forms_settings.currency_symbol,"");current_value=current_value.replace(/,/g,"")}if(!isNaN(current_value)){current_value=parseFloat(current_value)}else{current_value=0}if(calc_method=="auto"){var old_op="subtract";var new_op="add";if(!jQuery(this).hasClass("ninja-forms-field-calc-auto")){old_value="";new_value=""}}else if(calc_method=="fields"){for(var i=calc_settings.calc_fields[calc_id]["fields"].length-1;i>=0;i--){if(calc_settings.calc_fields[calc_id]["fields"][i]["field"]==field_id){var old_op=ninja_forms_find_opposite_op(calc_settings.calc_fields[calc_id]["fields"][i]["op"]);var new_op=calc_settings.calc_fields[calc_id]["fields"][i]["op"]}}}if(old_value&&!isNaN(old_value)&&old_value!=0&&old_value!=""&&!jQuery(this).hasClass("ninja-forms-field-calc-no-old-op")){old_value=parseFloat(old_value);var asdf=current_value;tmp=new ninja_forms_var_operator(old_op);current_value=tmp.evaluate(current_value,old_value)}if(new_value&&!isNaN(new_value)&&new_value!=0&&new_value!=""&&!jQuery(this).hasClass("ninja-forms-field-calc-no-new-op")){new_value=parseFloat(new_value);tmp=new ninja_forms_var_operator(new_op);var calc_value=tmp.evaluate(current_value,new_value)}else{var calc_value=current_value}}else if(calc_method=="eq"){var tmp_eq=calc_settings.calc_fields[calc_id]["eq"];for(var i=calc_settings.calc_fields[calc_id]["fields"].length-1;i>=0;i--){var f_id=calc_settings.calc_fields[calc_id]["fields"][i];var key=jQuery("#ninja_forms_field_"+f_id).val();var f_value="";if(jQuery("#ninja_forms_field_"+f_id+"_type").val()=="list"){if(jQuery("#ninja_forms_field_"+f_id+"_list_type").val()=="radio"){key=jQuery(".ninja-forms-field-"+f_id+"-options :checked").val()}else if(jQuery("#ninja_forms_field_"+f_id+"_list_type").val()=="multi"){if(jQuery.isArray(key)){var tmp=0;for(var x=key.length-1;x>=0;x--){if(typeof calc_settings.calc_value[f_id][key[x]]!=="undefined"){tmp+=parseFloat(calc_settings.calc_value[f_id][key[x]])}}f_value=tmp}}else if(jQuery("#ninja_forms_field_"+f_id+"_list_type").val()=="checkbox"){var tmp=0;jQuery(".ninja-forms-field-"+f_id+"-options :checked").each(function(){if(typeof calc_settings.calc_value[f_id][this.value]!=="undefined"){tmp+=parseFloat(calc_settings.calc_value[f_id][this.value])}});f_value=tmp}}else if(jQuery("#ninja_forms_field_"+f_id+"_type").val()=="checkbox"){if(jQuery("#ninja_forms_field_"+f_id).attr("checked")){var key="checked"}else{var key="unchecked"}}else if(jQuery("#ninja_forms_field_"+f_id+"_type").val()=="calc"){if(key==""){f_value=jQuery("#ninja_forms_field_"+f_id).prop("innerHTML")}}if(f_value==""){if(typeof calc_settings.calc_value[f_id]!=="undefined"&&typeof calc_settings.calc_value[f_id][key]!=="undefined"){f_value=calc_settings.calc_value[f_id][key]}else{f_value=key}}if(typeof f_value!=="undefined"&&typeof f_value==="string"){if(f_value.indexOf("%")>=0){f_value=f_value.replace("%","");if(!isNaN(f_value)){f_value=parseFloat(f_value)/100}}}if(typeof this.type==="undefined"&&key==""){f_value=this.innerHTML}if(typeof ninja_forms_settings.currency_symbol!=="undefined"&&isNaN(f_value)){f_value=f_value.replace(ninja_forms_settings.currency_symbol,"");f_value=f_value.replace(/,/g,"")}if(isNaN(f_value)||f_value==""||!f_value||typeof f_value==="undefined"){f_value=0}var find="field_"+f_id;var re=new RegExp(find,"g");tmp_eq=tmp_eq.replace(re,f_value)}var calc_value=eval(tmp_eq)}if(jQuery("#ninja_forms_field_"+calc_id).attr("type")=="text"){var current_value=jQuery("#ninja_forms_field_"+calc_id).val()}else{var current_value=jQuery("#ninja_forms_field_"+calc_id).html()}if(typeof ninja_forms_settings.currency_symbol!=="undefined"){current_value=current_value.replace(ninja_forms_settings.currency_symbol,"")}if(!isNaN(current_value)){current_value=parseFloat(current_value)}else{current_value=0}if(current_value!==calc_value){if(jQuery("#ninja_forms_field_"+field_id+"_list_type").val()!="checkbox"){console.log("set old value "+field_id+":"+key);jQuery(this).data(calc_id+"-oldValue",key)}if(jQuery("#ninja_forms_field_"+field_id+"_list_type").val()=="checkbox"||jQuery("#ninja_forms_field_"+field_id+"_list_type").val()=="radio"){jQuery("#ninja_forms_field_"+field_id+"_div_wrap").find(".ninja-forms-field").each(function(){jQuery(this).removeClass("ninja-forms-field-calc-no-old-op")})}else{jQuery(this).removeClass("ninja-forms-field-calc-no-old-op")}calc_value=calc_value.toFixed(calc_places);if(jQuery("#ninja_forms_field_"+calc_id).attr("type")=="text"){jQuery("#ninja_forms_field_"+calc_id).val(calc_value)}else{jQuery("#ninja_forms_field_"+calc_id).html(calc_value)}jQuery("#ninja_forms_field_"+calc_id).trigger("change")}}}}}})})