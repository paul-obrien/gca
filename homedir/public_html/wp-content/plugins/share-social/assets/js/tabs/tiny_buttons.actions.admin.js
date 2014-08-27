jQuery(function($)

{

	//get preview of wp

	$('#preview_tiny_buttons').on('show.bs.modal', function () {

		var wp_address = $(this).attr('wp_address');

	  	$('#preview_tiny_buttons .modal-body').html('<iframe src="'+wp_address+'" frameborder="0" style="width: 100%;"></iframe>');

		preview_modal('#preview_tiny_buttons');

	});

	$('#preview_tiny_buttons').on('hide.bs.modal', function () {

		$(document.body).css('overflow', 'initial');

	});

		

	/*extra actions*/

	//init social icon styles dropdown

	$('#tiny_buttons_buttons_layout_design').on('show.bs.modal', function () {

	  	icon_dropdowns('1,0,left_tab');

	});


	$('#tiny_buttons_buttons_visibility_settings').on('show.bs.modal', function() {

		onload_checkbox_handler();

	});

});