jQuery(document).ready(function($){


	// Details/Sumary Polyfill
		$('details').details();


	// remove inline widths and heights
		$('img').each(function(){
			$(this).removeAttr('width')
			$(this).removeAttr('height');
		});

		$('.wp-caption').each(function(){
			$(this).removeAttr('style');
		});

	// remove empty paragraphs
		$("p").each(function() {
			if ($(this).html() == " ") {
				$(this).remove();
			}
		});




	$(window).load(function() {

		// Navigation
		$('nav ul li:first-child').addClass('first');
		$('nav ul li:last-child').addClass('last');

		$('nav ul li').mouseleave(function() {
			$(this).removeClass('hover');
		});

		$('nav ul > li > a').on('focus mouseover', function (e){
			$(this).parent().addClass('hover').siblings().removeClass('hover');
		});


		 // Masonry.js
		var $container = $('.gallery');
		$container.masonry({
			itemSelector: '.gallery-item'
		});






		var tall = false;

		var headerHeight = $('header').outerHeight();

		var windowHeight = $(window).outerHeight();
		var mainHeight = $('main').outerHeight();
		var footerHeight = $('footer').outerHeight();
		windowHeight = windowHeight - footerHeight;

		if( (windowHeight > headerHeight) && (mainHeight > headerHeight) ){
			tall = true;
		}

		if(!tall) {
			$('header').css('position', 'static').css('float', 'left');
		} else {
			var header = $('header');
			var offset = header.offset();
			var offsetX = offset.left;
			var offsetY = offset.top;

			function onScroll(e) {
				window.scrollY >= offsetY ? header.addClass('sticky').css('padding-top', '2em') :
				header.removeClass('sticky');
				header.css('padding-top', '2em');
			}

			document.addEventListener('scroll', onScroll);
		}



		// Count up widths of all li's and set width of the UL
		var navw = 0;
		$('header nav ul > li').each(function(e){
			navw = navw + $(this).outerWidth(true);
		});
		//$('header nav ul').width(navw);




		// Custom Gallery

		// Gallery caption hover
		$('.gallery dt a').on('focus blur', function(event){
			if(event.type == 'focus'){
				$(this).parent().parent().addClass('hover');
			}
			if(event.type == 'blur'){
				$(this).parent().parent().removeClass('hover');
			}
		});

		// lightboxMe
		$('.gallery dt a').on('click keypress', function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13' || event.type == 'click'){
				event.preventDefault();
				$(this).parent().parent().lightboxMe();
			}
		});


		$.fn.extend({
			lightboxMe: function(){

				// remove all <br /> tags from the gallery
				var gallery = $(this).parent().parent().parent();
				$('.gallery').find('br').remove();

				$('#img-box #photo').css('max-height', ( $(window).outerHeight() * 0.8 ) ) ;

				// Find the number of images in the gallery
				var gallerysize = gallery.find('.gallery-item');
				gallerysize = gallerysize.length;

				// get the index of the image that initialized the gallery
				var currentitem = $('.gallery-item').index($(this));

				// save the last element with focus, so we can restore later
				var focuspos = $(':focus');

				// grab the src, alt, and caption of the requested image
				var src = 		$(this).find('a').attr('href');
				var alt = 		$(this).find('img').attr('alt');
				var caption = 	$(this).find('dd').text();

				// If already loaded, just show the lightbox
				if( $('#lightbox #photo').attr('src') == src ){
					$('#lightbox').addClass('active');
					$('#lightbox').focus();
				}

				// Set the attributes
				$('#lightbox #photo').attr('src', src).attr('alt', alt);
				$('#lightbox .caption').text(caption);

				// Once the photo loads, show the lightbox
				$('#lightbox #photo').on('load', function(e){
					$('#lightbox').addClass('active');
				});

				// Set focus to the lightbox
				$('#lightbox').focus();


				// Next photo button
				$('#lightbox #next').on('click', function(e){

					currentitem++;

					var nextslide = currentitem + 1;

					if ( currentitem + 1 >= gallerysize ){
						nextslide = gallerysize;
						currentitem = -1;
					}

					var nextitem = gallery.find('.gallery-item:nth-of-type(' + nextslide + ')');

					var src = 		nextitem.find('a').attr('href');
					var alt = 		nextitem.find('img').attr('alt');
					var caption = 	nextitem.find('dd').text();

					$('#lightbox #photo').attr('src', src).attr('alt', alt);
					$('#lightbox .caption').text(caption);

				});

				// Previous image button
				$('#lightbox #prev').on('click', function(e){

					currentitem--;

					var nextslide = currentitem + 1;

					if( currentitem <= -1 ){
						nextslide = gallerysize;
						currentitem = gallerysize - 1;
					}


					var nextitem = gallery.find('.gallery-item:nth-of-type(' + nextslide + ')');

					var src = 		nextitem.find('a').attr('href');
					var alt = 		nextitem.find('img').attr('alt');
					var caption = 	nextitem.find('dd').text();

					$('#lightbox #photo').attr('src', src).attr('alt', alt);
					$('#lightbox .caption').text(caption);

				});


				// Close Button
				$('#lightbox #close').on('click keypress', function(event){
					$('#lightbox').removeClass('active');
					var keycode = (event.keyCode ? event.keyCode : event.which);

					if(keycode == '13'){
						focuspos.focus();
					}
				});

			}
		});

	});

});