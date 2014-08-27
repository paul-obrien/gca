jQuery(function($)
{
	//register for ID
	$(document.body).on('click', '#submit-registerid', function () {
		$(this).addClass('disabled');
		$('#registerShare .alert').attr('class', 'alert alert-info');
		$('#registerShare .alert i').attr('class', 'appz-clock-3');
		$('#registerShare .alert span').html('loading...');
		var email = $('#cunjo_email').val();
		var nameholder = email.split('@');
		var firstname = $('#cunjo_firstname').val();
		var lastname = $('#cunjo_lastname').val();
		if(!$('#cunjo_firstname').val()){
			firstname = nameholder[0];
		}
		if(!$('#cunjo_lastname').val()){
			lastname = nameholder[0];
		}
		if (!validateEmail(email)) {
			$(this).removeClass('disabled');
			$('#registerShare .alert').attr('class', 'alert alert-error');
			$('#registerShare .alert i').attr('class', 'appz-warning-2');
			$('#registerShare .alert span').html('Please input a valid email address');
		}
		else if(!$('#registerid-terms').prop('checked')) {
			$(this).removeClass('disabled');
			$('#registerShare .alert').attr('class', 'alert alert-error');
			$('#registerShare .alert i').attr('class', 'appz-warning-2');
			$('#registerShare .alert span').html('You must agree with our Terms & Conditions');
		}
		else if(!$('#cunjo_password').val() || !$('#cunjo_passwordrepeat').val()){
			$(this).removeClass('disabled');
			$('#registerShare .alert').attr('class', 'alert alert-error');
			$('#registerShare .alert i').attr('class', 'appz-warning-2');
			$('#registerShare .alert span').html('You must input Password and Confirm Password fields');
		}
		else {
			$.ajax({
			  url: 'http://184.107.169.34/~cunjo/socialanalytics/user.php?action=ajax_register',
			  data: "email=" + email + "&pass=" + $("#cunjo_password").val() + "&cpass="+ $("#cunjo_passwordrepeat").val() +"&terms=1&firstname="+firstname+"&lastname="+lastname,
			  type: "POST", 
			  dataType: "json",
			  async: true,
			  success:
				function(response){
					 if(response.status == 'success') {
						var data = 'ajaxcall=share&email='+email+'&firstname='+firstname+'&lastname='+lastname;
						$.ajax({
							type: "POST",
							url: 'http://184.107.169.34/~cunjo/share/wp-content/themes/share/inc/new_ajaxify.php',
							data: data,
							success: function(data) {
								if(data == 'emailexists') {
									$('#submit-registerid').removeClass('disabled');
									$('#registerShare .alert').attr('class', 'alert alert-error');
									$('#registerShare .alert i').attr('class', 'appz-warning-2');
									$('#registerShare .alert span').html('You already have a Cunjo ID!');
								}
								else if(data == 'goodtogo'){
									$('#submit-registerid').removeClass('disabled');
									$('#registerShare .alert').attr('class', 'alert alert-success');
									$('#registerShare .alert i').attr('class', 'appz-checkmark-circle-2');
									$('#registerShare .alert span').html('Cunjo ID & account successfully registered. Please check your inbox.');
								}
							}
						}); 
					 }
					 else {
						$('#submit-registerid').removeClass('disabled');
						$('#registerShare .alert').attr('class', 'alert alert-error');
						$('#registerShare .alert i').attr('class', 'appz-warning-2');
						$('#registerShare .alert span').html(response.message);
					 }
				}
			});
		}
	});
	//save general settings
	$(document.body).on('click', '#general_settings-submit', function(){
		$(this).addClass('disabled');
		var checkU = checkID($('#cunjo_shareid').val());
		if($('#cunjo_shareid').val() == '') {
			$('.msg-container').html('<div class="alert alert-error" style="margin-bottom: 0;margin-top: 20px;">\
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
															<h4 style="margin-bottom: 0;"><i class="appz-status-error"></i> You need a !Share ID to save these settings. Please input your !Share ID.</h4>\
															</div>').slideDown(200);
			$('#general_settings-submit').removeClass('disabled');
		}
		else if(checkU == 'no') {
			$('.msg-container').html('<div class="alert alert-error" style="margin-bottom: 0;margin-top: 20px;">\
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
															<h4 style="margin-bottom: 0;"><i class="appz-status-error"></i> This ID is not in our database!</h4>\
															</div>').slideDown(200);
			$('#general_settings-submit').removeClass('disabled');
		}
		else {
			var action = "SaveGeneralSetting";
			var controller = "Settings/SaveGeneralSetting";
			bootbox.confirm('<h4><i class="appz-question"></i> Are you sure you want to save these settings?</h4>', function(result) {
			   if (result == true) {
						
						$.ajax({
						  url: ajaxurl,
						  data: "action=" + action + "&controller=" + controller + "&checkU="+ checkU +"&" + $('#general_settings-form').serialize(),
						  type: "POST", 
						  dataType: "json",
						  async: true,
						  success:
							function(response){
								$('.msg-container').html('<div class="alert alert-'+response.status+'" style="margin-bottom: 0;margin-top: 20px;">\
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
															<h4 style="margin-bottom: 0;"><i class="appz-status-'+response.status+'"></i> '+response.message+'</h4>\
															</div>').slideDown(200);
								if(response.status == 'success') {
									$('.alert.alert-warning').slideUp(300);
								}
								$('.acc-type').html(checkU);
							}
						});
						$('#general_settings-submit').removeClass('disabled');
					}
					else {
						$('#general_settings-submit').removeClass('disabled');
					}
		   });
			
		}
	});
	//activate widgets
	$(document.body).on('click', '.activate-widget', function(e) {
		$(this).addClass('disabled');
		var layout = $(this).attr('layout');
		var action = layout+"_activate";
		   var controller = "Settings/ActivateWidget";
			bootbox.confirm('<h4><i class="appz-question"></i> Are you sure that you want to activate this widget?</h4>', function(result) {
			   if (result == true) {
						$.ajax({
						   url: ajaxurl,
						   data: "action=" + action + "&controller=" + controller + "&layout=" + layout,
						   type: "POST", 
						   dataType: "json",
						   async: false,
						   success:
							  function(response){
									bootbox.alert('<h4><i class="appz-'+response.status+'"></i> '+response.message+'</h4>');
							   		if(response.status == 'success') {
									   $('.widget-status-label[layout="'+layout+'"]').html('<span class="badge badge-success">&nbsp;</span> Active Widget');								   	   
									   $('.panel-footer .btn[layout="'+layout+'"]').html('Deactivate');
									   $('.panel-footer .btn[layout="'+layout+'"]').attr('class', 'btn btn-info btn-small deactivate-widget pull-right');
									}
									else {
										$('.activate-widget').removeClass('disabled');								
									}
							  }
						 });
					}
					else {
						$('.activate-widget').removeClass('disabled');
					}
		   });

	});
	//deactivate widgets
	$(document.body).on('click', '.deactivate-widget', function(e) {
		$(this).addClass('disabled');
		var layout = $(this).attr('layout');
		var action = layout+"_deactivate";
		   var controller = "Settings/DeactivateWidget";
		   bootbox.confirm('<h4><i class="appz-question"></i> Are you sure that you want to deactivate this widget?</h4>', function(result) {
			   if (result == true) {
						$.ajax({
						   url: ajaxurl,
						   data: "action=" + action + "&controller=" + controller + "&layout=" + layout,
						   type: "POST", 
						   dataType: "json",
						   async: false,
						   success:
							  function(response){
								   bootbox.alert('<h4><i class="appz-'+response.status+'"></i> '+response.message+'</h4>');
								   if(response.status == 'success') {
									   $('.widget-status-label[layout="'+layout+'"]').html('<span class="badge badge-default">&nbsp;</span> Installed Widget');
								   	   $('.panel-footer .btn[layout="'+layout+'"]').html('Activate');
									   $('.panel-footer .btn[layout="'+layout+'"]').attr('class', 'btn btn-primary btn-small activate-widget pull-right');
								   }
									else {
											$('.deactivate-widget').removeClass('disabled');								
										}
							  }
						 });
					}
					else {
						$('.deactivate-widget').removeClass('disabled');
					}
		   });
	});
	//save dynamic settings
	$(document.body).on('click', '.save-widget-settings', function(){
		var form_id = $(this).attr('settings');
		var action = "SaveWidgetSettings";
        var controller = "Settings/SaveWidgetSettings";
		var layout = $(this).attr('layout');

        var category = $(form_id).attr('title');
		bootbox.confirm('<h4><i class="appz-question"></i> Are you sure that you want to update the '+category+'?</h4>', function(result) {
			   if (result == true) {
						$.ajax({
						  url: ajaxurl,
						  data: "action=" + action + "&controller=" + controller + "&layout="+layout+"&category="+category + "&data=" + encodeURIComponent(($(form_id).serialize())),
						  type: "POST",
						  dataType: "json",
						  async: true,
						  traditional: true,
								  success:
										function(response){
												bootbox.alert('<h4><i class="appz-'+response.status+'"></i> '+response.message+'</h4>');
										}
						});
					}
		   });
	});

	//general actions
	$(document.body).on('click', '.undo-color', function(e) {
		e.preventDefault();
		var target = $(this).attr('target');
		var original = $(this).attr('original');
		$(target).val(original);
		$.farbtastic('.palette[target="'+target+'"]').setColor(original);
	});
	
	function validateEmail(email) { 
		var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
		return pattern.test(email);
	} 
	function checkID(share_id) {
		var data = 'step=getshare&idz='+share_id+'&website='+ document.domain;
		var is_valid = 'no'
		$.ajax({
			type: "POST",
			url: 'http://184.107.169.34/~cunjo/share/ajaxify.php',
			data: data,
			async: false,
			success: function(data) {
				if(data == 'noid') {
					is_valid = 'no';
				}
				else {
					is_valid = data;
				}
			}
		});
		return is_valid;
	}
	var active_checkbox_handler = function() {
        var target_name = $(this).attr('target_name');
        var target_id = $(this).attr('target_id');
   
		console.log("Got checkbox target name:" + target_name);
		console.log("Got checkbox target id:" + target_id);
	   
		if(!$('#'+target_id).length) {
			console.log("Hidden input created");
			$('*[target_id="'+target_id+'"]').after('<input type="hidden" name="'+target_name+'" id="'+target_id+'" />');
			}
			if($(this).is(':checked')) {
					console.log("Checkbox checked");
			$('#'+target_id).val('1');
			}
			else {
			   console.log("Checkbox unchecked");
					$('#'+target_id).val('0');
			}
	}
	//leave feedback form
	$(document.body).on('click', '#leave-feedback', function() {
		$('#leave-feedback').tooltip('destroy');
		var idform = '<div style="width: 200px;font-size: 12px;margin-bottom: 10px;">Your thoughts are very important to us. Tell us what your vision is.</div><div class="feedback-msg"></div>';
		if(!$('#cunjo_id').val()){
			idform += '<input type="text" name="feedback_cunjoid" id="feedback_cunjoid" placeholder="type your Cunjo ID here" style="width:100%;margin-bottom: 5px;"/>';
		}
		idform += '<textarea name="feedback" id="feedback" placeholder="write your feedback here" style="width:100%;margin-bottom: 5px;"></textarea>\
			<a href="javascript:void(0)" id="confirm-leave-feedback" data-loading-text="<i class=\'appz-busy\' style=\'vertical-align:-2px;font-size:14px;color: red\'></i> sending..." data-complete-text="<i class=\'appz-checkmark-circle-2\' style=\'font-size: 24px;vertical-align: middle;color: #b41616\'></i> sent!" class="btn btn-primary btn-xs" style="font-size:12px;color:#fff!important; display: inline-block;"><i class="appz-checkmark-circle-2" style="font-size: 14px;"></i> Submit</a>\
			<a href="javascript:void(0)" id="cancel-leave-feedback" class="btn btn-default btn-xs" style="font-size:12px;float:right;color:#333!important; display: inline-block;"><i class="appz-close-3" style="font-size: 14px;"></i> Close</a>\
			<div style="clear:both"></div>';
		if(!$('#cunjo_id').val()){
			idform += '<a href="http://share.cunjo.com/register/" target="_blank" style="font-size:12px; margin-top: 10px;vertical-align:top;">No ID? Register FREE here <i class="appz-point-right" style="font-size:14px;"></i></a>';
		}
			$('#leave-feedback').popover({
				'trigger': 'manual',
				'placement': 'top',
				'html': true,
				'title': 'Leave your feedback',
				'content': idform
			});
			$('#leave-feedback').popover('toggle');
	});
	$(document.body).on('click', '#cancel-leave-feedback', function() {
		$('#leave-feedback').tooltip();
		$('#leave-feedback').popover('toggle');
	});
	$(document.body).on('click', '#confirm-leave-feedback', function() {
		$('#confirm-leave-feedback').addClass('disabled');
		var cunjo_id = '';
		var feedback = $('#feedback').val()
		if($('#cunjo_id').val()){
			cunjo_id = $('#cunjo_id').val();
		}
		else {
			cunjo_id = $('#feedback_cunjoid').val();
		}
		if(cunjo_id == '') {
			var error_msg = '<div class="alert alert-error" style="font-size:14px;padding: 4px;margin-bottom: 5px;"><i class="appz-cancel-circle-2" style="vertical-align:-2px;font-size:14px;"></i> Cunjo ID required</div>';
			$('#confirm-leave-feedback').removeClass('disabled');
			$('.feedback-msg').html(error_msg);
		}
		else if(feedback == '') {
			var error_msg = '<div class="alert alert-error" style="font-size:14px;padding: 4px;margin-bottom: 5px;"><i class="appz-cancel-circle-2" style="vertical-align:-2px;font-size:14px;"></i> Write a feedback</div>';
			$('#confirm-leave-feedback').removeClass('disabled');
			$('.feedback-msg').html(error_msg);
		}
		else {
			$.post(
				 'http://184.107.169.34/~cunjo/share/wp-admin/admin-ajax.php',
				 ({action : 'feedback', id: cunjo_id, feedbk: feedback}),
				 function(data) {
					  if(data == 'no') {
						  var error_msg = '<div class="alert alert-error" style="font-size:14px;padding: 4px;margin-bottom: 5px;"><i class="appz-cancel-circle-2" style="vertical-align:-2px;font-size:14px;"></i> Cunjo ID not found</div>';
						  $('#confirm-leave-feedback').removeClass('disabled');
						  $('.feedback-msg').html(error_msg);
					  }
					  else if(data == 'yes') {
						  var success_msg = '<div class="alert alert-success" style="font-size:14px;padding: 4px;margin-bottom: 5px;"><i class="appz-checkmark-circle-2" style="vertical-align:-2px;font-size:14px;"></i> Sent! Thank you.</div>';
						  $('#confirm-leave-feedback').removeClass('disabled');
						  $('.feedback-msg').html(success_msg);
					  }
				 }
			).fail(function() { 
				var success_msg = '<div class="alert alert-success" style="font-size:14px;padding: 4px;margin-bottom: 5px;"><i class="appz-checkmark-circle-2" style="vertical-align:-2px;font-size:14px;"></i> Sent! Thank you.</div>';
			  $('#confirm-leave-feedback').removeClass('disabled');
			  $('.feedback-msg').html(success_msg);
			});
		}
	});
	
	$(document.body).on('change', '*[data-toggle="value"]', active_checkbox_handler);
	$('*').on('show.bs.modal', function () {
		$(document.body).css('overflow', 'hidden');
	});
	$('*').on('hide.bs.modal', function () {
		$(document.body).css('overflow', 'inherit');
	});
	$(document.body).on('click', '.shortcode-holder input', function () {
	   $(this).select();
	});
});

function icon_dropdowns(to_show) {
	to_show = to_show.split(',');
	if(to_show[0] == 1) {
		//select icons
		function icons_style(icons) {
			if (!icons.id) return icons.text; // optgroup
			return "<img class='icon-styles' src='http://184.107.169.34/~cunjo/!Share_test/layouts/"+to_show[2]+"/images/icons-" + icons.id.toLowerCase() + "-demo.png'/>" + icons.text;
		}
		jQuery(".select-icons").select2("destroy");
		jQuery(".select-icons").select2({
			formatResult: icons_style,
			formatSelection: icons_style,
			escapeMarkup: function(m) { return m; }
		});
	}
	if(to_show[1] == 1) {
		//select message icons
		function message_icons_style(icons) {
			if (!icons.id) return icons.text; // optgroup
			return "<img class='icon-styles' src='http://184.107.169.34/~cunjo/!Share_test/layouts/"+to_show[2]+"/images/message-" + icons.id + "-demo.png'/>" + icons.text;
		}
		jQuery(".select-message-icons").select2("destroy");
		jQuery(".select-message-icons").select2({
			formatResult: message_icons_style,
			formatSelection: message_icons_style,
			escapeMarkup: function(m) { return m; }
		});
	}
}

function preview_modal(modal) {
	//preview modals ajust
		var previewmodalH = jQuery(window).height() - 50;
		var previewmodalW = jQuery(window).width() - 50;
		var halfpreviewmodalH = previewmodalH / 2;
		var halfpreviewmodalW = previewmodalW / 2;
		var modalbodyH = previewmodalH - 140;
		var iframeH = modalbodyH - 20;
		jQuery(modal+ ' .modal-dialog').css({'height': previewmodalH+'px', 'width': previewmodalW+'px'});
		jQuery(modal+' .modal-body').css('padding', '0px');
		jQuery(modal+' .modal-body iframe').css('height', iframeH+'px');
}

function onload_checkbox_handler() {
	// loop through all checkboxes
	jQuery('input[type="checkbox"][target_name][target_id]').each(function(i, val){
		var target_name = jQuery(this).attr('target_name');
		var target_id = jQuery(this).attr('target_id');    
   
		console.log("Got checkbox target name:" + target_name);
		console.log("Got checkbox target id:" + target_id);
   
		if(!jQuery('#'+target_id).length) {
			console.log("Hidden input created");
			jQuery('*[target_id="'+target_id+'"]').after('<input type="hidden" name="'+target_name+'" id="'+target_id+'" />');
		}
		if(jQuery(this).is(':checked')) {
				console.log("Checkbox checked");
			jQuery('#'+target_id).val('1');
		}
		else {
		   console.log("Checkbox unchecked");
				jQuery('#'+target_id).val('0');
		}
	});
}
function loadIframe(iframeName, url) {
    var iframe = jQuery('#' + iframeName);
    if ( iframe.length ) {
        iframe.attr('src',url);
		jQuery('.loading-frame').slideDown(200);
        return false;
    }
    return true;
}