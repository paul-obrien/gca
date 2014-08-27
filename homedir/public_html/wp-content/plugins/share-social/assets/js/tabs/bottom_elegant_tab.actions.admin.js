jQuery(function($)
{
	//get preview of wp
	$('#preview_bottom_elegant_tab').on('show.bs.modal', function () {
		var wp_address = $(this).attr('wp_address');
	  	$('#preview_bottom_elegant_tab .modal-body').html('<iframe src="'+wp_address+'" frameborder="0" style="width: 100%;"></iframe>');
		preview_modal('#preview_bottom_elegant_tab');
	});
	$('#preview_bottom_elegant_tab').on('hide.bs.modal', function () {
		$(document.body).css('overflow', 'initial');
	});
		
	/*extra actions*/
	//init social icon styles dropdown
	$('#bottom_elegant_tab_bar_layout_design').on('show.bs.modal', function () {
	  	icon_dropdowns('1,0,bottom_elegant_tab');
	});
	$('#bottom_elegant_tab_visibility_settings').on('show.bs.modal', function() {
		onload_checkbox_handler();
	});
});