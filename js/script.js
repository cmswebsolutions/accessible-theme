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




		// "Sticky" functionality

		if( !$('body').hasClass('full') ){
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
		}




		// Count up widths of all li's and set width of the UL
		var navw = 0;
		$('header nav ul > li').each(function(e){
			navw = navw + $(this).outerWidth(true);
		});
		//$('header nav ul').width(navw);




		// Custom Gallery

		$('.gallery dt a').on('focus blur', function(event){
			if(event.type == 'focus'){
				$(this).parent().parent().addClass('hover');
			}
			if(event.type == 'blur'){
				$(this).parent().parent().removeClass('hover');
			}
		});


	});

});