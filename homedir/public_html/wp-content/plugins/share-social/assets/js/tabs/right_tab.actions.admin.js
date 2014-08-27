jQuery(function($)
{
	//get preview of wp
	$('#preview_right_tab').on('show.bs.modal', function () {
		var wp_address = $(this).attr('wp_address');
	  	$('#preview_right_tab .modal-body').html('<iframe src="'+wp_address+'" frameborder="0" style="width: 100%;"></iframe>');
		preview_modal('#preview_right_tab');
	});
	$('#preview_right_tab').on('hide.bs.modal', function () {
		$(document.body).css('overflow', 'initial');
	});
		
	/*extra actions*/
	//init social icon styles dropdown
	$('#right_tab_bar_layout_design').on('show.bs.modal', function () {
	  	icon_dropdowns('1,0,right_tab');
	});
	$('#right_tab_visibility_settings').on('show.bs.modal', function() {
		onload_checkbox_handler();
	});
});