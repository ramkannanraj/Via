jQuery(function($) {
	
	$("a.topopup").click(function() {
		
		$.fancybox.showLoading();  // show loading
		// $.fancybox.hideActivity(); // remove loading
		
		setTimeout(function(){ // then show popup, deley in .5 second
				
				$.fancybox({
					'transitionIn' : 'fade',
					'transitionOut' : 'fade',
					'overlayColor' : '#000',
					'overlayOpacity' : '.6',
					'href' : '#popup_content',
					'onCleanup' : function() {
									// close event
								  }
				});
				
		}, 500); // .5 second
		
	}); // click end
	
}); // jQuery End