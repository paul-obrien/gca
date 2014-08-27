jQuery(function($)

{

	//get preview of wp

	$('#preview_inline_buttons').on('show.bs.modal', function () {

		var wp_address = $(this).attr('wp_address');

	  	$('#preview_inline_buttons .modal-body').html('<iframe src="'+wp_address+'" frameborder="0" style="width: 100%;"></iframe>');

		preview_modal('#preview_inline_buttons');

	});

	$('#preview_inline_buttons').on('hide.bs.modal', function () {

		$(document.body).css('overflow', 'initial');

	});

		

	/*extra actions*/

	//init social icon styles dropdown

	$('#inline_buttons_buttons_layout_design').on('show.bs.modal', function () {

	  	icon_dropdowns('1,0,left_tab');

	});


	$('#inline_buttons_buttons_visibility_settings').on('show.bs.modal', function() {

		onload_checkbox_handler();

	});

});