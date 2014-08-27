jQuery(function($)

{

	//get preview of wp

	$('#preview_counter_buttons').on('show.bs.modal', function () {

		var wp_address = $(this).attr('wp_address');

	  	$('#preview_counter_buttons .modal-body').html('<iframe src="'+wp_address+'" frameborder="0" style="width: 100%;"></iframe>');

		preview_modal('#preview_counter_buttons');

	});

	$('#preview_counter_buttons').on('hide.bs.modal', function () {

		$(document.body).css('overflow', 'initial');

	});

		

	/*extra actions*/

	//init social icon styles dropdown

	$('#counter_buttons_buttons_layout_design').on('show.bs.modal', function () {

	  	icon_dropdowns('1,0,left_tab');

	});


	$('#counter_buttons_buttons_visibility_settings').on('show.bs.modal', function() {

		onload_checkbox_handler();

	});

});