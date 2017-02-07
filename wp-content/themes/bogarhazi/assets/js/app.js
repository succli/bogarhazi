var menuOnScroll = function(){
	$(document).scroll(function() {
	    if( !$('html').hasClass('nav-open') ) {
	        var scrollDistance = 40;
	        $('body').toggleClass('scrolled', $(window).scrollTop() > scrollDistance);
	    }
	});
}

$(document).ready(function() {
	// Add slideDown animation to dropdown
	$('.dropdown').on('show.bs.dropdown', function(e){
	  $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});

	// Add slideUp animation to dropdown
	$('.dropdown').on('hide.bs.dropdown', function(e){
	  $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});

	// Add puppy subject
	if($('section.puppy').length && $('[name="subject"]').length){
		$('[name="subject"]').val(translations.puppysubject+$('section.puppy h2').text()).prop('disabled', true);
	}

	$(function(){
		$.stellar({
			horizontalScrolling: false,
			verticalOffset: 0,
			horizontalOffset: 0,
			responsive: true,
			parallaxBackgrounds: true
		});
	});

	menuOnScroll();

	$('#thumbnail-gallery').lightGallery({
		thumbnail: true,
		selector: '.item'
	});

	if($('[data-trigger="gallery"]').length){
		$('[data-trigger="gallery"]').click(function(e){
			e.preventDefault();
			console.log($(this).next('.thumb-gallery'))
			$(this).next('.thumb-gallery').find('.item').click();
		});
	}

	if($('.thumb-gallery').length){
		$('.thumb-gallery').each(function(){
			$(this).lightGallery({
				thumbnail: true,
				selector: '.item'
			});
		});
	}
});

$(function(){
  if($('#jvectorMap').length){
		$('#jvectorMap').vectorMap({
			map: 'world_mill_en',
			scaleColors: ['#C8EEFF', '#0071A4'],
	    normalizeFunction: 'polynomial',
	    hoverOpacity: 0.7,
	    hoverColor: false,
	    markerStyle: {
	      initial: {
	        fill: '#F8E23B',
	        stroke: '#383f47'
	      }
	    },
	    backgroundColor: '#383f47',
			markers: jvectorMarkers
		});
	}
});
