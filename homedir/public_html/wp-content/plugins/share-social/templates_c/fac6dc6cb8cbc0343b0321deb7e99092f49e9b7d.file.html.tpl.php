<?php /* Smarty version Smarty-3.1.13, created on 2014-03-03 12:30:25
         compiled from "layouts/bottom_simple_tab/html.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9533641605314d851138f39-29077913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fac6dc6cb8cbc0343b0321deb7e99092f49e9b7d' => 
    array (
      0 => 'layouts/bottom_simple_tab/html.tpl',
      1 => 1386818941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9533641605314d851138f39-29077913',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'website' => 0,
    'layout' => 0,
    'tooltip' => 0,
    'toolstyle' => 0,
    'id' => 0,
    'bgcolor' => 0,
    'textcolor' => 0,
    'messagebtncolor' => 0,
    'messagebtntext' => 0,
    'icons' => 0,
    'shadow' => 0,
    'nocredits' => 0,
    'message' => 0,
    'message_pos' => 0,
    'messageicon' => 0,
    'messagelink' => 0,
    'messagebtn' => 0,
    'socials' => 0,
    'socials_pos' => 0,
    'social_channels' => 0,
    'social_channel' => 0,
    'socials_target' => 0,
    'has_analytics' => 0,
    'shareid' => 0,
    'category' => 0,
    'oneimage' => 0,
    'title' => 0,
    'description' => 0,
    'url' => 0,
    'is_short' => 0,
    'secure_question' => 0,
    'host_url' => 0,
    'extraz_btm_simple_tb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5314d851503e30_64963148',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5314d851503e30_64963148')) {function content_5314d851503e30_64963148($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("locale.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars($_smarty_tpl->tpl_vars['lang']->value, 'local'); ?>
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
layouts/<?php echo $_smarty_tpl->tpl_vars['layout']->value;?>
/style.css" type="text/css" />
<?php if (isset($_smarty_tpl->tpl_vars['tooltip']->value)&&$_smarty_tpl->tpl_vars['tooltip']->value=='yes'){?>
<script type="text/javascript">
jQuery('.bar_btm_simple_tb .cunjo_tooltip').poshytip({
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
	   modalColor: '<?php echo $_smarty_tpl->tpl_vars['bgcolor']->value;?>
',
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
	   modalColor: '<?php echo $_smarty_tpl->tpl_vars['bgcolor']->value;?>
',
	   positionStyle: 'fixed',
	   onOpen: function() {},
	   onClose: function() {},
	});

		});

	});

})(jQuery);

</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
layouts/<?php echo $_smarty_tpl->tpl_vars['layout']->value;?>
/script.js" type="text/javascript"></script>
<style>
.bar_btm_simple_tb {
	width: 100%; 
	background-color: <?php echo $_smarty_tpl->tpl_vars['bgcolor']->value;?>
; 
}
.show_btm_simple_tb {
	background-color: <?php echo $_smarty_tpl->tpl_vars['bgcolor']->value;?>
; 
	border-color: <?php echo $_smarty_tpl->tpl_vars['bgcolor']->value;?>
;
}
.bar_btm_simple_tb li.cunjo_messages_holder_btm_simple_tb li.cunjo_message_btm_simple_tb, .bar_btm_simple_tb li.cunjo_messages_holder_btm_simple_tb li.cunjo_message_btm_simple_tb a, .bar_btm_simple_tb ul.btm_simple_tb li.cunjo_socials a.email,
.bar_btm_simple_tb ul.btm_simple_tb li.cunjo_credits_btm_simple_tb a, .bar_btm_simple_tb ul.btm_simple_tb li.close_btm_simple_tb, .bar_btm_simple_tb ul.btm_simple_tb li.container_btm_simple_tb, .show_btm_simple_tb, .gotop_btm_simple_tb {
	color: <?php echo $_smarty_tpl->tpl_vars['textcolor']->value;?>
 !important;
}
.bar_btm_simple_tb li.cunjo_messages_holder_btm_simple_tb li.cunjo_message_btn_btm_simple_tb .cunjo_message_btn {
	background-color: <?php echo $_smarty_tpl->tpl_vars['messagebtncolor']->value;?>
;
	border-color: <?php echo $_smarty_tpl->tpl_vars['messagebtncolor']->value;?>
;
	color: <?php echo $_smarty_tpl->tpl_vars['messagebtntext']->value;?>
 !important;
}
.bar_btm_simple_tb ul.btm_simple_tb li.cunjo_messages_holder_btm_simple_tb li.cunjo_message_btn_btm_simple_tb:hover {
	background-color: transparent !important;
}
.bar_btm_ele_tb .sh-counter {
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
	margin: 0 !important;
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
layouts/images/icons-<?php if ($_smarty_tpl->tpl_vars['icons']->value=='white'||$_smarty_tpl->tpl_vars['icons']->value=='black'){?>icons<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['icons']->value;?>
<?php }?>-32.png) !important;
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
" class="Share-bar bar_btm_simple_tb <?php echo $_smarty_tpl->tpl_vars['shadow']->value;?>
_btm_simple_tb <?php echo $_smarty_tpl->tpl_vars['icons']->value;?>
_btm_simple_tb maxwidth_btm_simple_tb">
    <ul class="btm_simple_tb">
    		<li class="close_btm_simple_tb"><span class="iconz-contract"></span></li>
            <li class="gotop_btm_simple_tb"><span class="iconz-arrow-up"></span></li>
        <?php if ($_smarty_tpl->tpl_vars['nocredits']->value==false){?>
            <li class="space_btm_simple_tb"></li>
        <?php }else{ ?>
            <li class="cunjo_credits_btm_simple_tb <?php if (isset($_smarty_tpl->tpl_vars['tooltip']->value)&&$_smarty_tpl->tpl_vars['tooltip']->value=='yes'){?>cunjo_tooltip<?php }?>" title="!Share"><a href="http://share.cunjo.com" target="_blank" class="cunjo_more_modal"><span class="iconz-cunjo"></span></a></li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['message']->value)&&$_smarty_tpl->tpl_vars['message']->value!=''){?>
        <li class="cunjo_messages_holder_btm_simple_tb <?php echo $_smarty_tpl->tpl_vars['message_pos']->value;?>
">
        	<ul class="cunjo_messages_btm_simple_tb">
            	<li class="cunjo_message_icon <?php echo $_smarty_tpl->tpl_vars['messageicon']->value;?>
"></li>
                <li class="cunjo_message_btm_simple_tb">
                	<div class="cunjo_message_inner_btm_simple_tb" id="msg_btm_simple_tb">
                        <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

                	</div>
                </li>
                <li class="cunjo_message_btn_btm_simple_tb">
                	<?php if (isset($_smarty_tpl->tpl_vars['messagelink']->value)&&$_smarty_tpl->tpl_vars['messagelink']->value!=''){?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['messagelink']->value;?>
" class="cunjo_message_btn"><?php echo $_smarty_tpl->tpl_vars['messagebtn']->value;?>
</a>
                    <?php }?>
                </li>
            </ul>
        </li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['socials']->value)&&$_smarty_tpl->tpl_vars['socials']->value!=''){?>
        <li class="cunjo_socials_holder_btm_simple_tb <?php echo $_smarty_tpl->tpl_vars['socials_pos']->value;?>
">
        	<ul class="cunjo_socials_btm_simple_tb">
                <?php  $_smarty_tpl->tpl_vars['social_channel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['social_channel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['social_channels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['social_channel']->key => $_smarty_tpl->tpl_vars['social_channel']->value){
$_smarty_tpl->tpl_vars['social_channel']->_loop = true;
?>
                     <?php echo $_smarty_tpl->tpl_vars['social_channel']->value;?>
 
                <?php } ?>
            </ul>
        </li>
        <?php }?>
    </ul>
</div>
<div class="show_btm_simple_tb"><span class="iconz-expand"></span></div>
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
	jQuery(document.body).on('hover', '.tip-inner .cunjo_socials_btm_simple_tb li', function() { jQuery('.cunjo_tooltip').poshytip('show'); });
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
    	 <div id="sendemail" class="send-email_btm_simple_tb">
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
                <div id="submitemail_btm_simple_tb" class="cunjo-email-btn"><span class="iconz-mail-send"></span> <span><?php echo $_smarty_tpl->getConfigVariable('email_send');?>
</span></div>
                <div class="email-message"><span class="iconz-checkmark-circle email-sent" title="<?php echo $_smarty_tpl->getConfigVariable('email_sent');?>
"></span><span class="iconz-notification email-notsent" title="<?php echo $_smarty_tpl->getConfigVariable('email_notsent');?>
"></span><span class="iconz-busy email-sending" title="<?php echo $_smarty_tpl->getConfigVariable('email_sending');?>
"></span></div><div style="clear:both"></div>
            </div>
            <input type="hidden" name="host_url" id="host_url" value="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
" />
            <?php echo $_smarty_tpl->tpl_vars['extraz_btm_simple_tb']->value;?>

        </form>
        </div>
    </div>
    <div class="cunjo_modal_footer"><?php if ($_smarty_tpl->tpl_vars['nocredits']->value==true){?><a href="http://cunjo.com" target="_blank">powered by Cunjo</a><?php }?></div>
</div><?php }} ?>