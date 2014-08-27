jQuery(function($)
{
	$('#cunjoSettings a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	});
	$('[data-toggle="tooltip"]').tooltip();
	$('[plus-toggle="tooltip"]').tooltip();
	$('#cunjoWidgets a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
	$('.toggle-button').toggleButtons();
	function drag_socials() {
		if ($( ".connected" ).length)
		{
			$(".connected").sortable({
				placeholder: "ui-state-highlight",
				connectWith: ".connected"
			}).bind("sortupdate", function() {});
		}
	}
	//init colorpickers
	function init_palette() {
		$( ".palette" ).each(function( index ) {
		 	var opt_id = $(this).attr('target');
			$(this).farbtastic(opt_id);
		});
	}
	$(document).ready(function() {
	  drag_socials();
	  init_palette();
	  $("*[ui_select]").select2();
	  
	});
});
jQuery(function($) {

	// Find all YouTube videos
	var $allVideos = $("iframe[src^='http://www.youtube.com']"),

	    // The element that is fluid width
	    $fluidEl = $("#welcome-video");

	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {

		$(this)
			.data('aspectRatio', this.height / this.width)
			
			// and remove the hard coded width/height
			.removeAttr('height')
			.removeAttr('width');

	});

	// When the window is resized
	// (You'll probably want to debounce this)
	$(window).resize(function() {

		var newWidth = $fluidEl.width();
		
		// Resize all videos according to their own aspect ratio
		$allVideos.each(function() {

			var $el = $(this);
			$el
				.width(newWidth)
				.height(newWidth * $el.data('aspectRatio'));

		});

	// Kick off one resize to fix all videos on page load
	}).resize();

});