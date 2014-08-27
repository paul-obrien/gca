{config_load file="locale.conf" section=$lang}
<script type="text/javascript">
jQuery('cunjoTitle').html(document.title);
jQuery('meta').each(function(i, obj) {
	if (obj.getAttribute("name") == "description") {
		jQuery('cunjoDescription').html(obj.getAttribute("content"));
	}
});
jQuery("a[social-channel]").each(function(i, obj) {
	var thelink = obj.getAttribute('href');
	var newlink = thelink.replace("cunjoTitle", encodeURIComponent(document.title));
	obj.setAttribute('href', newlink);
});
</script>
{if $mobile == 'true'}{assign var="width" value="100"}{/if}
{if $screen_width <= '640'}{assign var="width" value="100"}{/if}
<script type="text/javascript">
if (!jQuery("link[href='{$website}layouts/{$layout}/style.css']").length)
    jQuery('<link href="{$website}layouts/{$layout}/style.css" rel="stylesheet">').appendTo("head");
</script>
{if isset($tooltip) && $tooltip == 'yes'}
<script type="text/javascript">
jQuery('#{$id} .cunjo_tooltip').poshytip({
	className: 'tip-{$toolstyle}',
	bgImageFrameSize: 11,
	showTimeout: 1,
	alignTo: 'target',
	alignX: 'inner-left',
	offsetX: 0,
	offsetY: 5,
	//alignY: 'top',
});
</script>
{/if}
<script type="text/javascript">
//modal-more
{literal}
;(function($) {

	 // DOM Ready
	$(function() {

		// Binding a click event
		// From jQuery v.1.7.0 use .on() instead of .bind()
		$(document.body).on('click', '#{/literal}{$id}{literal} a.cunjo_more_modal', function(e) {

			// Prevents the default action to be triggered. 
			e.preventDefault();
			var scrollpos = $(window).scrollTop();
			// Triggering bPopup when click event is fired
			$('#{/literal}{$id}{literal}_modal').bPopup({
		speed: 450,
		opacity: 0.9,
		transition: 'slideIn',
		closeClass:'close1',
	   modalColor: '#6e737b',
	   positionStyle: 'fixed',
	   onOpen: function() {},
	   onClose: function() {},
	});

		});

	});

})(jQuery);
{/literal}
//modal-email
{literal}
;(function($) {

	 // DOM Ready
	$(function() {

		// Binding a click event
		// From jQuery v.1.7.0 use .on() instead of .bind()
		$(document.body).on('click', '#{/literal}{$id}{literal} a.cunjo_email, #{/literal}{$id}{literal}_modal a.cunjo_email', function(e) {

			// Prevents the default action to be triggered. 
			e.preventDefault();
			var scrollpos = $(window).scrollTop();
			// Triggering bPopup when click event is fired
			$('#{/literal}{$id}{literal}_modal_email').bPopup({
		speed: 450,
		opacity: 0.9,
		transition: 'slideIn',
		closeClass:'close2',
	   modalColor: '#6e737b',
	   positionStyle: 'fixed',
	   onOpen: function() {},
	   onClose: function() {},
	});

		});

	});

})(jQuery);
{/literal}
</script>
<script type="text/javascript">
if (!jQuery("script[src='{$website}layouts/{$layout}/script.js']").length)
	 jQuery("<script async='' src='{$website}layouts/{$layout}/script.js' type='text/javascript'>").appendTo("head");
</script>
<style>
.bar_inline_btns ul.inline_btns li.cunjo_socials_holder_inline_btns:hover {
	background-color: transparent !important;
}
.bar_inline_btns .cunjo_socials_inline_btns .cunjo_messages_holder_inline_btns, .bar_inline_btns ul.inline_btns li.cunjo_socials a.email, .bar_inline_btns ul.inline_btns li.cunjo_credits_inline_btns a, 
.bar_inline_btns ul.inline_btns li.close_inline_btns, .bar_inline_btns ul.inline_btns li.container_inline_btns, .show_inline_btns {
	color: {$textcolor} !important;
}
.bar_inline_btns .sh-counter {
	background-color: {$bgcolor};
	color: {$textcolor} !important;
}
#{$id} ul {
	list-style: none !important;
	margin: 0 !important;
	padding: 0 !important;
}
#{$id} ul li {
	list-style: none !important;
	padding: 0 !important;
}
.tip-table {
	background: none !important;
	border: none !important;
}
.tip-table tr {
	background: none !important;
}
.tip-table td {
	margin: 0 !important;
	padding: 0 !important;
	border-width: 0 !important;
}
.tip-table h6 {
	margin: 0 0 10px !important;
}
#{$id} .email .iconz-envelop {
	line-height: 42px !important;
}
#{$id}_modal .cunjo_modal_body a:hover {
	background: {$bgcolor};
	color: {$textcolor} !important;
}
#{$id}_modal .cunjo_modal_header .cunjo_modal_close:hover, #{$id}_modal_email .cunjo_modal_header .cunjo_modal_close:hover {
	background: {$bgcolor};
}
#{$id}_modal .cunjo_modal_header .cunjo_modal_close:hover i, #{$id}_modal_email .cunjo_modal_header .cunjo_modal_close:hover i {
	color: {$textcolor} !important;
}
#{$id}_modal .cunjo_modal_body a .sprite {
	background-image: url({$website}layouts/images/icons-{$icons}-32.png) !important;
}
#{$id}_modal_email .email-message {
	display: inline-block;
	float: right;
	margin-top: 18px;
	margin-right: 10px;
	font-size: 22px;
}
#{$id}_modal_email .email-message .email-sent, #{$id}_modal_email .email-message .email-notsent, #{$id}_modal_email .email-message .email-sending {
	display: none;
}
#{$id}_modal_email .cunjo_modal_body {
	height: auto;
	overflow: visible;
}
#{$id}_modal_email .cunjo_modal_body #sendemail {
	width: 580px;
}
#{$id}_modal_email .cunjo_modal_body #sendemail label{
	width: 30% !important;
	display: inline-block !important;
	margin: 0 !important;
}
#{$id}_modal_email .cunjo_modal_body #sendemail input[type="text"], #{$id}_modal_email .cunjo_modal_body #sendemail textarea {
	width: 65% !important;
	height: 30px !important;
	display: inline-block !important;
	margin: 2px 0 !important;
	padding: 0 4px 0 !important;
	background: #fff !important;
}
#{$id}_modal_email .cunjo_modal_body #sendemail .cunjo-email-btn {
	padding: 8px;
	border: 1px solid #d2d2d1;
}
#{$id}_modal_email .email-message {
	margin-top: 24px;
}
#{$id} .cunjo_socials.cunjo_counter {
	margin-right: 50px !important;
}
#{$id} li.cunjo_credits_inline_btns {
	display: inline-block !important;
}
#{$id} li.cunjo_credits_inline_btns a {
	opacity: 1 !important;
	display: inline-block !important;
	visibility: inherit !important;
}
</style>
<div id="{$id}" class="Share-bar bar_inline_btns {$icons}_inline_btns {if $counter eq 'yes'}counter_format{/if}">
    <ul class="inline_btns">
        {if isset($socials) && $socials != ''}
        <li class="cunjo_socials_holder_inline_btns">
        	<ul class="cunjo_socials_inline_btns">
            	{if isset($message) && $message != ''}
                <li class="cunjo_messages_holder_inline_btns {$message_pos}">
                    {$message}
                </li>
                {/if}
                {foreach $social_channels as $social_channel}
                     {$social_channel} 
                {/foreach}
                {if $nocredits eq FALSE}
                    <li class="space_inline_btns"></li>
                {else}
                    <li class="cunjo_credits_inline_btns {if isset($tooltip) && $tooltip == 'yes'}cunjo_tooltip{/if}" title="!Share"><a href="http://share.cunjo.com" target="_blank" class="cunjo_more_modal"></a></li>
                {/if}
            </ul>
        </li>
        {/if}
    </ul>
</div>
<div class="show_inline_btns"><span class="iconz-expand"></span></div>
<script type="text/javascript">
{literal}jQuery(document).ready(function() {
	jQuery(document.body).on('click', '#{/literal}{$id}{literal} .cunjo_socials a, #{/literal}{$id}{literal}_modal .cunjo_modal_body a', function(event){
{/literal}
	{if $socials_target == 'window'}
		{literal}
		var iframelink = jQuery(this).attr('href');
		if(iframelink == 'javascript:void(0)') {
			
		}
		else {
			event.preventDefault();
			window.open(this.getAttribute('href'),'windowNew','width=550,height=350,location=no,menubar=no,status=no,toolbar=no');
		}
		{/literal}
	{/if}
	{if isset($has_analytics) && $has_analytics == 'yes'}
	{literal}
		var iframelink = jQuery(this).attr('href');
		if(iframelink != '#sendemail') {
			var data = 'url='+document.URL+'&api_key={/literal}{$shareid}{literal}&shared_on='+jQuery(this).attr('social-channel')+'&category={/literal}{$category}{literal}';
			jQuery.ajax({
			  type: "POST",
			  url: "http://cunjo.com/socialanalytics/redirect.php",
			  crossDomain: true,
			  data: data
			}).done(function( response ) {});
		}
	{/literal}
	{/if}
	{literal}
	});
	jQuery(document.body).on('hover', '.tip-inner .cunjo_socials_inline_btns li', function() { jQuery('.cunjo_tooltip').poshytip('show'); });
	{/literal}
		{if isset($counter) && $counter == 'yes'}
			{literal}
				jQuery.ajax({
				  type: "POST",
				  url: "{/literal}{$website}{literal}lib/get_counters.php",
				  crossDomain: true,
				  async: true,
				  dataType:"JSON",
				  data: "url={/literal}{$original_url}{if $is_short == true}{literal}&short_url={/literal}{$url}{/if}{literal}"
				}).done(function( response ) {
					jQuery.each(response, function(key, value){
							if(jQuery('#{/literal}{$id}{literal} .cunjo_socials .'+ key +' .sh-counter')) {
								jQuery('#{/literal}{$id}{literal} .cunjo_socials .'+ key +' .sh-counter').html(value);
						}
					});
				});
			{/literal}
		{/if}
	{literal}
});
{/literal}
</script>
<!--more modal-->
<div id="{$id}_modal" class="cunjo_modal" style="display: none;">
    <div class="cunjo_modal_header"><span class="iconz-cunjo"></span> {#share_with_friends#}<div class="cunjo_modal_close b-close close1"><i class="iconz-close"></i></div></div>
    <div class="cunjo_modal_subject">
        <div class="cunjo_thumb">{if isset($oneimage) && $oneimage != ''}<img src="{$oneimage}" width="80" />{/if}</div>
        <div class="cunjo_description">
            <cunjoTitle>{$title}</cunjoTitle><br />
            <span class="cunjo_desc"><cunjoDescription>{$description}</cunjoDescription></span><br />
            <a href="{$url}">{$url}</a>
        </div>
        <div style="clear:both"></div>
        <div class="cunjo_modal_pointer"></div>
    </div>
    <div class="cunjo_modal_body">
    	 {if $is_short == true}
         <a title="{#share_on_facebook#}" social-channel="Facebook" href="http://www.facebook.com/sharer.php?s=100&amp;p[url]={$url|escape:'url'}&amp;p[title]=cunjoTitle&amp;p[summary]={$description|escape:'url'}&amp;p[images][0]={$oneimage|escape:'url'}" target="_blank" ><span class="sprite facebook"></span> Facebook</a> 
         {else}
         <a title="{#share_on_facebook#}" social-channel="Facebook" href="http://www.facebook.com/sharer.php?u={$url|escape:'url'}&amp;t=cunjoTitle" target="_blank" ><span class="sprite facebook"></span> Facebook</a>
         {/if}
         <a title="{#share_on_twitter#}" social-channel="Twitter" href="http://twitter.com/home?status=cunjoTitle+-+{$url|escape:'url'}" target="_blank" ><span class="sprite twitter"></span> Twitter</a> 
         <a title="{#share_on_google#}" social-channel="Google" href="https://plus.google.com/share?url={$url|escape:'url'}" target="_blank" ><span class="sprite google"></span> Google+</a> 
         <a title="{#share_on_linkedin#}" social-channel="Linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;ro=false&amp;url={$url|escape:'url'}&amp;title=cunjoTitle&amp;summary={$description|escape:'url'}" target="_blank" ><span class="sprite linkedin"></span> Linkedin</a> 
         <a title="{#share_on_pinterest#}" social-channel="Pinterest" href="http://pinterest.com/pin/create/button/?url={$url|escape:'url'}&amp;media={$oneimage|escape:'url'}&amp;description=cunjoTitle" target="_blank" ><span class="sprite pinterest"></span> Pinterest</a> 
         <a title="{#share_on_myspace#}" social-channel="Myspace" href="http://www.myspace.com/Modules/PostTo/Pages/?c=%20&amp;u={$url|escape:'url'}&amp;t=cunjoTitle" target="_blank" ><span class="sprite myspace"></span> Myspace</a> 
         <a title="{#share_on_bebo#}" social-channel="Bebo" href="http://bebo.com/c/share?Url={$url|escape:'url'}&amp;Title=cunjoTitle" target="_blank" ><span class="sprite bebo"></span> Bebo</a> 
         <a title="{#share_on_delicious#}" social-channel="Delicious" href="http://del.icio.us/post?v=4&amp;partner=[partner]&amp;noui&amp;url={$url|escape:'url'}&amp;title=cunjoTitle" target="_blank" ><span class="sprite delicious"></span> Delicious</a> 
         <a title="{#share_on_stumbleupon#}" social-channel="Stumbleupon" href="http://www.stumbleupon.com/submit?url={$url|escape:'url'}&amp;title=cunjoTitle" target="_blank" ><span class="sprite stumbleupon"></span> Stumbleupon</a> 
         <a title="{#share_on_tumblr#}" social-channel="Tumblr" href="http://www.tumblr.com/share?v=3&amp;u={$url|escape:'url'}&amp;t=cunjoTitle" target="_blank" ><span class="sprite tumblr"></span> Tumblr</a> 
         <a title="{#share_on_digg#}" social-channel="Digg" href="http://digg.com/submit?phase=2&amp;partner=[partner]&amp;url={$url|escape:'url'}&amp;title=cunjoTitle" target="_blank" ><span class="sprite digg"></span> Digg</a> 
         <a title="{#share_on_vk#}" social-channel="VK" href="http://vkontakte.ru/share.php?url={$url|escape:'url'}&amp;title=cunjoTitle&amp;description={$description|escape:'url'}" target="_blank" ><span class="sprite vk"></span> VK</a> 
         <a title="{#share_on_friendfeed#}" social-channel="Friendfeed" href="http://www.friendfeed.com/share?url={$url|escape:'url'}&amp;title=cunjoTitle" target="_blank" ><span class="sprite friendfeed"></span> Friendfeed</a> 
         <a title="{#share_on_diigo#}" social-channel="Diigo" href="http://www.diigo.com/post?url={$url|escape:'url'}&amp;title=cunjoTitle" target="_blank" ><span class="sprite diigo"></span> Diigo</a> 
         <a title="{#share_on_reddit#}" social-channel="Reddit" href="http://reddit.com/submit?url={$url|escape:'url'}&amp;title=cunjoTitle" target="_blank" ><span class="sprite reddit"></span> Reddit</a> 
         <a title="{#share_on_identi#}" social-channel="Identi" href="http://identi.ca/index.php?action=newnotice&amp;status_textarea={$url|escape:'url'}+-+cunjoTitle" target="_blank" ><span class="sprite identi"></span> Identi</a> 
         <a title="{#share_on_netlog#}" social-channel="Netlog" href=" http://www.netlog.com/go/manage/blog/view=add&amp;origin=external&amp;title=cunjoTitle&amp;message={$description|escape:'url'}&amp;tags=&amp;referer={$url|escape:'url'}" target="_blank" ><span class="sprite netlog"></span> Netlog</a> 
         <a title="{#share_on_technorati#}" social-channel="Technorati" href="http://technorati.com/faves?add={$url|escape:'url'}&amp;t=cunjoTitle" target="_blank" ><span class="sprite technorati"></span> Technorati</a> 
         <a title="{#share_on_xing#}" social-channel="Xing" href="https://www.xing.com/social_plugins/share?url={$url|escape:'url'}&amp;wtmc=cunjoTitle&amp;sc_p=xing-share" target="_blank" ><span class="sprite xing"></span> Xing</a> 
         <a title="{#share_on_evernote#}" social-channel="Evernote" href="http://www.evernote.com/clip.action?url={$url|escape:'url'}&amp;title=cunjoTitle" target="_blank" ><span class="sprite evernote"></span> Evernote</a> 
         <a title="{#share_on_blogger#}" social-channel="Blogger" href="http://www.blogger.com/blog_this.pyra?t=&amp;u={$url|escape:'url'}" target="_blank" ><span class="sprite blogger"></span> Blogger</a> 
         <a title="{#share_on_email#}" social-channel="Email" rel="leanModal" href="javascript:void(0)" class="cunjo_email"><span class="iconz-envelop"></span> Email</a> 
    </div>
    <div class="cunjo_modal_footer">{if $nocredits eq TRUE}<a href="http://cunjo.com" target="_blank">powered by Cunjo</a>{/if}</div>
</div>
<!--send email modal-->
<div id="{$id}_modal_email" class="cunjo_modal" style="display: none;">
    <div class="cunjo_modal_header"><span class="iconz-cunjo"></span> {#share_on_email#}<div class="cunjo_modal_close b-close close2"><i class="iconz-close"></i></div></div>
    <div class="cunjo_modal_subject">
        <div class="cunjo_thumb">{if isset($oneimage) && $oneimage != ''}<img src="{$oneimage}" width="80" />{/if}</div>
        <div class="cunjo_description">
            <cunjoTitle>{$title}</cunjoTitle><br />
            <span class="cunjo_desc"><cunjoDescription>{$description}</cunjoDescription></span><br />
            <a href="{$url|escape:'url'}">{$url}</a>
        </div>
        <div style="clear:both"></div>
        <div class="cunjo_modal_pointer"></div>
    </div>
    <div class="cunjo_modal_body">
    	 <div id="sendemail" class="send-email_inline_btns">
         <form id="cunjo_share_email">
         	<div class="cunjo-form-row">
            	<label>{#email_to#}</label>
                <input type="text" name="cunjo_receiver" id="cunjo_receiver" title="{#email_to_tip#}"/>
            </div>
            <div class="cunjo-form-row">
            	<label>{#email_from#}</label>
                <input type="text" name="cunjo_sender" id="cunjo_sender" title="{#email_from_tip#}"/>
            </div>
            <div class="cunjo-form-row">
            	<label>{#email_subject#}</label>
                <input type="text" name="cunjo_subject" id="cunjo_subject" value="{$title}" title="{#email_subject_tip#}"/>
            </div>
            <div class="cunjo-form-row">
            	<label>{#email_message#}</label>
                <textarea name="cunjo_message" id="cunjo_message" title="{#email_message_tip#}"></textarea>
            </div>
            <div class="cunjo-form-row">
            	<div class="security-question">{$secure_question}<br />
                <input type="text" name="cunjo_validate" id="cunjo_validate" style="width: auto;" title="{#type_security_answer#}"/> 
                </div>
                {if $nocredits eq FALSE}<input type="hidden" name="crt" id="crt" value="1" />{/if}
                <div id="submitemail_inline_btns" class="cunjo-email-btn"><span class="iconz-mail-send"></span> <span>{#email_send#}</span></div>
                <div class="email-message"><span class="iconz-checkmark-circle email-sent" title="{#email_sent#}"></span><span class="iconz-notification email-notsent" title="{#email_notsent#}"></span><span class="iconz-busy email-sending" title="{#email_sending#}"></span></div><div style="clear:both"></div>
            </div>
            <input type="hidden" name="host_url" id="host_url" value="{$host_url}" />
            {$extraz_inline_btns}
        </form>
        </div>
    </div>
    <div class="cunjo_modal_footer">{if $nocredits eq TRUE}<a href="http://cunjo.com" target="_blank">powered by Cunjo</a>{/if}</div>
</div>
