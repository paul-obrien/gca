<?php /* Smarty version Smarty-3.1.13, created on 2014-03-03 13:00:32
         compiled from "layouts/inline_buttons/html.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7117566785314df6044c236-18232709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d9f633c05ecc00e79fd9f91a8b04d53fe66cdd5' => 
    array (
      0 => 'layouts/inline_buttons/html.tpl',
      1 => 1386818941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7117566785314df6044c236-18232709',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'mobile' => 0,
    'screen_width' => 0,
    'website' => 0,
    'layout' => 0,
    'tooltip' => 0,
    'id' => 0,
    'toolstyle' => 0,
    'textcolor' => 0,
    'bgcolor' => 0,
    'icons' => 0,
    'counter' => 0,
    'socials' => 0,
    'message' => 0,
    'message_pos' => 0,
    'social_channels' => 0,
    'social_channel' => 0,
    'nocredits' => 0,
    'socials_target' => 0,
    'has_analytics' => 0,
    'shareid' => 0,
    'category' => 0,
    'original_url' => 0,
    'is_short' => 0,
    'url' => 0,
    'oneimage' => 0,
    'title' => 0,
    'description' => 0,
    'secure_question' => 0,
    'host_url' => 0,
    'extraz_inline_btns' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5314df607818f8_67312181',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5314df607818f8_67312181')) {function content_5314df607818f8_67312181($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("locale.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars($_smarty_tpl->tpl_vars['lang']->value, 'local'); ?>
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
<?php if ($_smarty_tpl->tpl_vars['mobile']->value=='true'){?><?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable("100", null, 0);?><?php }?>
<?php if ($_smarty_tpl->tpl_vars['screen_width']->value<='640'){?><?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable("100", null, 0);?><?php }?>
<script type="text/javascript">
if (!jQuery("link[href='<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
layouts/<?php echo $_smarty_tpl->tpl_vars['layout']->value;?>
/style.css']").length)
    jQuery('<link href="<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
layouts/<?php echo $_smarty_tpl->tpl_vars['layout']->value;?>
/style.css" rel="stylesheet">').appendTo("head");
</script>
<?php if (isset($_smarty_tpl->tpl_vars['tooltip']->value)&&$_smarty_tpl->tpl_vars['tooltip']->value=='yes'){?>
<script type="text/javascript">
jQuery('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 .cunjo_tooltip').poshytip({
	className: 'tip-<?php echo $_smarty_tpl->tpl_vars['toolstyle']->value;?>
',
	bgImageFrameSize: 11,
	showTimeout: 1,
	alignTo: 'target',
	alignX: 'inner-left',
	offsetX: 0,
	offsetY: 5,
	//alignY: 'top',
});
</script>
<?php }?>
<script type="text/javascript">
//modal-more

;(function($) {

	 // DOM Ready
	$(function() {

		// Binding a click event
		// From jQuery v.1.7.0 use .on() instead of .bind()
		$(document.body).on('click', '#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 a.cunjo_more_modal', function(e) {

			// Prevents the default action to be triggered. 
			e.preventDefault();
			var scrollpos = $(window).scrollTop();
			// Triggering bPopup when click event is fired
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal').bPopup({
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

//modal-email

;(function($) {

	 // DOM Ready
	$(function() {

		// Binding a click event
		// From jQuery v.1.7.0 use .on() instead of .bind()
		$(document.body).on('click', '#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 a.cunjo_email, #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal a.cunjo_email', function(e) {

			// Prevents the default action to be triggered. 
			e.preventDefault();
			var scrollpos = $(window).scrollTop();
			// Triggering bPopup when click event is fired
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email').bPopup({
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

</script>
<script type="text/javascript">
if (!jQuery("script[src='<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
layouts/<?php echo $_smarty_tpl->tpl_vars['layout']->value;?>
/script.js']").length)
	 jQuery("<script async='' src='<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
layouts/<?php echo $_smarty_tpl->tpl_vars['layout']->value;?>
/script.js' type='text/javascript'>").appendTo("head");
</script>
<style>
.bar_inline_btns ul.inline_btns li.cunjo_socials_holder_inline_btns:hover {
	background-color: transparent !important;
}
.bar_inline_btns .cunjo_socials_inline_btns .cunjo_messages_holder_inline_btns, .bar_inline_btns ul.inline_btns li.cunjo_socials a.email, .bar_inline_btns ul.inline_btns li.cunjo_credits_inline_btns a, 
.bar_inline_btns ul.inline_btns li.close_inline_btns, .bar_inline_btns ul.inline_btns li.container_inline_btns, .show_inline_btns {
	color: <?php echo $_smarty_tpl->tpl_vars['textcolor']->value;?>
 !important;
}
.bar_inline_btns .sh-counter {
	background-color: <?php echo $_smarty_tpl->tpl_vars['bgcolor']->value;?>
;
	color: <?php echo $_smarty_tpl->tpl_vars['textcolor']->value;?>
 !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 ul {
	list-style: none !important;
	margin: 0 !important;
	padding: 0 !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 ul li {
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
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 .email .iconz-envelop {
	line-height: 42px !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal .cunjo_modal_body a:hover {
	background: <?php echo $_smarty_tpl->tpl_vars['bgcolor']->value;?>
;
	color: <?php echo $_smarty_tpl->tpl_vars['textcolor']->value;?>
 !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal .cunjo_modal_header .cunjo_modal_close:hover, #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .cunjo_modal_header .cunjo_modal_close:hover {
	background: <?php echo $_smarty_tpl->tpl_vars['bgcolor']->value;?>
;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal .cunjo_modal_header .cunjo_modal_close:hover i, #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .cunjo_modal_header .cunjo_modal_close:hover i {
	color: <?php echo $_smarty_tpl->tpl_vars['textcolor']->value;?>
 !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal .cunjo_modal_body a .sprite {
	background-image: url(<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
layouts/images/icons-<?php echo $_smarty_tpl->tpl_vars['icons']->value;?>
-32.png) !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .email-message {
	display: inline-block;
	float: right;
	margin-top: 18px;
	margin-right: 10px;
	font-size: 22px;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .email-message .email-sent, #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .email-message .email-notsent, #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .email-message .email-sending {
	display: none;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .cunjo_modal_body {
	height: auto;
	overflow: visible;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .cunjo_modal_body #sendemail {
	width: 580px;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .cunjo_modal_body #sendemail label{
	width: 30% !important;
	display: inline-block !important;
	margin: 0 !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .cunjo_modal_body #sendemail input[type="text"], #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .cunjo_modal_body #sendemail textarea {
	width: 65% !important;
	height: 30px !important;
	display: inline-block !important;
	margin: 2px 0 !important;
	padding: 0 4px 0 !important;
	background: #fff !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .cunjo_modal_body #sendemail .cunjo-email-btn {
	padding: 8px;
	border: 1px solid #d2d2d1;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email .email-message {
	margin-top: 24px;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 .cunjo_socials.cunjo_counter {
	margin-right: 50px !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 li.cunjo_credits_inline_btns {
	display: inline-block !important;
}
#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 li.cunjo_credits_inline_btns a {
	opacity: 1 !important;
	display: inline-block !important;
	visibility: inherit !important;
}
</style>
<div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="Share-bar bar_inline_btns <?php echo $_smarty_tpl->tpl_vars['icons']->value;?>
_inline_btns <?php if ($_smarty_tpl->tpl_vars['counter']->value=='yes'){?>counter_format<?php }?>">
    <ul class="inline_btns">
        <?php if (isset($_smarty_tpl->tpl_vars['socials']->value)&&$_smarty_tpl->tpl_vars['socials']->value!=''){?>
        <li class="cunjo_socials_holder_inline_btns">
        	<ul class="cunjo_socials_inline_btns">
            	<?php if (isset($_smarty_tpl->tpl_vars['message']->value)&&$_smarty_tpl->tpl_vars['message']->value!=''){?>
                <li class="cunjo_messages_holder_inline_btns <?php echo $_smarty_tpl->tpl_vars['message_pos']->value;?>
">
                    <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

                </li>
                <?php }?>
                <?php  $_smarty_tpl->tpl_vars['social_channel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['social_channel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['social_channels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['social_channel']->key => $_smarty_tpl->tpl_vars['social_channel']->value){
$_smarty_tpl->tpl_vars['social_channel']->_loop = true;
?>
                     <?php echo $_smarty_tpl->tpl_vars['social_channel']->value;?>
 
                <?php } ?>
                <?php if ($_smarty_tpl->tpl_vars['nocredits']->value==false){?>
                    <li class="space_inline_btns"></li>
                <?php }else{ ?>
                    <li class="cunjo_credits_inline_btns <?php if (isset($_smarty_tpl->tpl_vars['tooltip']->value)&&$_smarty_tpl->tpl_vars['tooltip']->value=='yes'){?>cunjo_tooltip<?php }?>" title="!Share"><a href="http://share.cunjo.com" target="_blank" class="cunjo_more_modal"></a></li>
                <?php }?>
            </ul>
        </li>
        <?php }?>
    </ul>
</div>
<div class="show_inline_btns"><span class="iconz-expand"></span></div>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery(document.body).on('click', '#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 .cunjo_socials a, #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal .cunjo_modal_body a', function(event){

	<?php if ($_smarty_tpl->tpl_vars['socials_target']->value=='window'){?>
		
		var iframelink = jQuery(this).attr('href');
		if(iframelink == 'javascript:void(0)') {
			
		}
		else {
			event.preventDefault();
			window.open(this.getAttribute('href'),'windowNew','width=550,height=350,location=no,menubar=no,status=no,toolbar=no');
		}
		
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['has_analytics']->value)&&$_smarty_tpl->tpl_vars['has_analytics']->value=='yes'){?>
	
		var iframelink = jQuery(this).attr('href');
		if(iframelink != '#sendemail') {
			var data = 'url='+document.URL+'&api_key=<?php echo $_smarty_tpl->tpl_vars['shareid']->value;?>
&shared_on='+jQuery(this).attr('social-channel')+'&category=<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
';
			jQuery.ajax({
			  type: "POST",
			  url: "http://cunjo.com/socialanalytics/redirect.php",
			  crossDomain: true,
			  data: data
			}).done(function( response ) {});
		}
	
	<?php }?>
	
	});
	jQuery(document.body).on('hover', '.tip-inner .cunjo_socials_inline_btns li', function() { jQuery('.cunjo_tooltip').poshytip('show'); });
	
		<?php if (isset($_smarty_tpl->tpl_vars['counter']->value)&&$_smarty_tpl->tpl_vars['counter']->value=='yes'){?>
			
				jQuery.ajax({
				  type: "POST",
				  url: "<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
lib/get_counters.php",
				  crossDomain: true,
				  async: true,
				  dataType:"JSON",
				  data: "url=<?php echo $_smarty_tpl->tpl_vars['original_url']->value;?>
<?php if ($_smarty_tpl->tpl_vars['is_short']->value==true){?>&short_url=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php }?>"
				}).done(function( response ) {
					jQuery.each(response, function(key, value){
							if(jQuery('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 .cunjo_socials .'+ key +' .sh-counter')) {
								jQuery('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 .cunjo_socials .'+ key +' .sh-counter').html(value);
						}
					});
				});
			
		<?php }?>
	
});

</script>
<!--more modal-->
<div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal" class="cunjo_modal" style="display: none;">
    <div class="cunjo_modal_header"><span class="iconz-cunjo"></span> <?php echo $_smarty_tpl->getConfigVariable('share_with_friends');?>
<div class="cunjo_modal_close b-close close1"><i class="iconz-close"></i></div></div>
    <div class="cunjo_modal_subject">
        <div class="cunjo_thumb"><?php if (isset($_smarty_tpl->tpl_vars['oneimage']->value)&&$_smarty_tpl->tpl_vars['oneimage']->value!=''){?><img src="<?php echo $_smarty_tpl->tpl_vars['oneimage']->value;?>
" width="80" /><?php }?></div>
        <div class="cunjo_description">
            <cunjoTitle><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</cunjoTitle><br />
            <span class="cunjo_desc"><cunjoDescription><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</cunjoDescription></span><br />
            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
</a>
        </div>
        <div style="clear:both"></div>
        <div class="cunjo_modal_pointer"></div>
    </div>
    <div class="cunjo_modal_body">
    	 <?php if ($_smarty_tpl->tpl_vars['is_short']->value==true){?>
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_facebook');?>
" social-channel="Facebook" href="http://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;p[title]=cunjoTitle&amp;p[summary]=<?php echo rawurlencode($_smarty_tpl->tpl_vars['description']->value);?>
&amp;p[images][0]=<?php echo rawurlencode($_smarty_tpl->tpl_vars['oneimage']->value);?>
" target="_blank" ><span class="sprite facebook"></span> Facebook</a> 
         <?php }else{ ?>
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_facebook');?>
" social-channel="Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;t=cunjoTitle" target="_blank" ><span class="sprite facebook"></span> Facebook</a>
         <?php }?>
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_twitter');?>
" social-channel="Twitter" href="http://twitter.com/home?status=cunjoTitle+-+<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
" target="_blank" ><span class="sprite twitter"></span> Twitter</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_google');?>
" social-channel="Google" href="https://plus.google.com/share?url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
" target="_blank" ><span class="sprite google"></span> Google+</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_linkedin');?>
" social-channel="Linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;ro=false&amp;url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;title=cunjoTitle&amp;summary=<?php echo rawurlencode($_smarty_tpl->tpl_vars['description']->value);?>
" target="_blank" ><span class="sprite linkedin"></span> Linkedin</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_pinterest');?>
" social-channel="Pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;media=<?php echo rawurlencode($_smarty_tpl->tpl_vars['oneimage']->value);?>
&amp;description=cunjoTitle" target="_blank" ><span class="sprite pinterest"></span> Pinterest</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_myspace');?>
" social-channel="Myspace" href="http://www.myspace.com/Modules/PostTo/Pages/?c=%20&amp;u=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;t=cunjoTitle" target="_blank" ><span class="sprite myspace"></span> Myspace</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_bebo');?>
" social-channel="Bebo" href="http://bebo.com/c/share?Url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;Title=cunjoTitle" target="_blank" ><span class="sprite bebo"></span> Bebo</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_delicious');?>
" social-channel="Delicious" href="http://del.icio.us/post?v=4&amp;partner=[partner]&amp;noui&amp;url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;title=cunjoTitle" target="_blank" ><span class="sprite delicious"></span> Delicious</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_stumbleupon');?>
" social-channel="Stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;title=cunjoTitle" target="_blank" ><span class="sprite stumbleupon"></span> Stumbleupon</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_tumblr');?>
" social-channel="Tumblr" href="http://www.tumblr.com/share?v=3&amp;u=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;t=cunjoTitle" target="_blank" ><span class="sprite tumblr"></span> Tumblr</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_digg');?>
" social-channel="Digg" href="http://digg.com/submit?phase=2&amp;partner=[partner]&amp;url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;title=cunjoTitle" target="_blank" ><span class="sprite digg"></span> Digg</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_vk');?>
" social-channel="VK" href="http://vkontakte.ru/share.php?url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;title=cunjoTitle&amp;description=<?php echo rawurlencode($_smarty_tpl->tpl_vars['description']->value);?>
" target="_blank" ><span class="sprite vk"></span> VK</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_friendfeed');?>
" social-channel="Friendfeed" href="http://www.friendfeed.com/share?url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;title=cunjoTitle" target="_blank" ><span class="sprite friendfeed"></span> Friendfeed</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_diigo');?>
" social-channel="Diigo" href="http://www.diigo.com/post?url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;title=cunjoTitle" target="_blank" ><span class="sprite diigo"></span> Diigo</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_reddit');?>
" social-channel="Reddit" href="http://reddit.com/submit?url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;title=cunjoTitle" target="_blank" ><span class="sprite reddit"></span> Reddit</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_identi');?>
" social-channel="Identi" href="http://identi.ca/index.php?action=newnotice&amp;status_textarea=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
+-+cunjoTitle" target="_blank" ><span class="sprite identi"></span> Identi</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_netlog');?>
" social-channel="Netlog" href=" http://www.netlog.com/go/manage/blog/view=add&amp;origin=external&amp;title=cunjoTitle&amp;message=<?php echo rawurlencode($_smarty_tpl->tpl_vars['description']->value);?>
&amp;tags=&amp;referer=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
" target="_blank" ><span class="sprite netlog"></span> Netlog</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_technorati');?>
" social-channel="Technorati" href="http://technorati.com/faves?add=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;t=cunjoTitle" target="_blank" ><span class="sprite technorati"></span> Technorati</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_xing');?>
" social-channel="Xing" href="https://www.xing.com/social_plugins/share?url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;wtmc=cunjoTitle&amp;sc_p=xing-share" target="_blank" ><span class="sprite xing"></span> Xing</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_evernote');?>
" social-channel="Evernote" href="http://www.evernote.com/clip.action?url=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
&amp;title=cunjoTitle" target="_blank" ><span class="sprite evernote"></span> Evernote</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_blogger');?>
" social-channel="Blogger" href="http://www.blogger.com/blog_this.pyra?t=&amp;u=<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
" target="_blank" ><span class="sprite blogger"></span> Blogger</a> 
         <a title="<?php echo $_smarty_tpl->getConfigVariable('share_on_email');?>
" social-channel="Email" rel="leanModal" href="javascript:void(0)" class="cunjo_email"><span class="iconz-envelop"></span> Email</a> 
    </div>
    <div class="cunjo_modal_footer"><?php if ($_smarty_tpl->tpl_vars['nocredits']->value==true){?><a href="http://cunjo.com" target="_blank">powered by Cunjo</a><?php }?></div>
</div>
<!--send email modal-->
<div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_modal_email" class="cunjo_modal" style="display: none;">
    <div class="cunjo_modal_header"><span class="iconz-cunjo"></span> <?php echo $_smarty_tpl->getConfigVariable('share_on_email');?>
<div class="cunjo_modal_close b-close close2"><i class="iconz-close"></i></div></div>
    <div class="cunjo_modal_subject">
        <div class="cunjo_thumb"><?php if (isset($_smarty_tpl->tpl_vars['oneimage']->value)&&$_smarty_tpl->tpl_vars['oneimage']->value!=''){?><img src="<?php echo $_smarty_tpl->tpl_vars['oneimage']->value;?>
" width="80" /><?php }?></div>
        <div class="cunjo_description">
            <cunjoTitle><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</cunjoTitle><br />
            <span class="cunjo_desc"><cunjoDescription><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</cunjoDescription></span><br />
            <a href="<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
</a>
        </div>
        <div style="clear:both"></div>
        <div class="cunjo_modal_pointer"></div>
    </div>
    <div class="cunjo_modal_body">
    	 <div id="sendemail" class="send-email_inline_btns">
         <form id="cunjo_share_email">
         	<div class="cunjo-form-row">
            	<label><?php echo $_smarty_tpl->getConfigVariable('email_to');?>
</label>
                <input type="text" name="cunjo_receiver" id="cunjo_receiver" title="<?php echo $_smarty_tpl->getConfigVariable('email_to_tip');?>
"/>
            </div>
            <div class="cunjo-form-row">
            	<label><?php echo $_smarty_tpl->getConfigVariable('email_from');?>
</label>
                <input type="text" name="cunjo_sender" id="cunjo_sender" title="<?php echo $_smarty_tpl->getConfigVariable('email_from_tip');?>
"/>
            </div>
            <div class="cunjo-form-row">
            	<label><?php echo $_smarty_tpl->getConfigVariable('email_subject');?>
</label>
                <input type="text" name="cunjo_subject" id="cunjo_subject" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" title="<?php echo $_smarty_tpl->getConfigVariable('email_subject_tip');?>
"/>
            </div>
            <div class="cunjo-form-row">
            	<label><?php echo $_smarty_tpl->getConfigVariable('email_message');?>
</label>
                <textarea name="cunjo_message" id="cunjo_message" title="<?php echo $_smarty_tpl->getConfigVariable('email_message_tip');?>
"></textarea>
            </div>
            <div class="cunjo-form-row">
            	<div class="security-question"><?php echo $_smarty_tpl->tpl_vars['secure_question']->value;?>
<br />
                <input type="text" name="cunjo_validate" id="cunjo_validate" style="width: auto;" title="<?php echo $_smarty_tpl->getConfigVariable('type_security_answer');?>
"/> 
                </div>
                <?php if ($_smarty_tpl->tpl_vars['nocredits']->value==false){?><input type="hidden" name="crt" id="crt" value="1" /><?php }?>
                <div id="submitemail_inline_btns" class="cunjo-email-btn"><span class="iconz-mail-send"></span> <span><?php echo $_smarty_tpl->getConfigVariable('email_send');?>
</span></div>
                <div class="email-message"><span class="iconz-checkmark-circle email-sent" title="<?php echo $_smarty_tpl->getConfigVariable('email_sent');?>
"></span><span class="iconz-notification email-notsent" title="<?php echo $_smarty_tpl->getConfigVariable('email_notsent');?>
"></span><span class="iconz-busy email-sending" title="<?php echo $_smarty_tpl->getConfigVariable('email_sending');?>
"></span></div><div style="clear:both"></div>
            </div>
            <input type="hidden" name="host_url" id="host_url" value="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
" />
            <?php echo $_smarty_tpl->tpl_vars['extraz_inline_btns']->value;?>

        </form>
        </div>
    </div>
    <div class="cunjo_modal_footer"><?php if ($_smarty_tpl->tpl_vars['nocredits']->value==true){?><a href="http://cunjo.com" target="_blank">powered by Cunjo</a><?php }?></div>
</div>
<?php }} ?>