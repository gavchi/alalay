$(document).ready(function() {

	// Mobile menu btn
	$('.btn-sandwich').click(function(){
        $(this).toggleClass('btn-sandwich--active');
    });

    $('#mobile_menu').on('show.bs.modal', function (e) {
        setTimeout(function(){
            $('body').addClass('mobile_menu--opened');
        });
    });

    $('#mobile_menu').on('hide.bs.modal', function (e) {
        setTimeout(function(){
            $('body').removeClass('mobile_menu--opened');
            $('.btn-sandwich').removeClass('btn-sandwich--active');
        }, 250);
    });

	// Random hover color nav menu
	$('.nav__menu li a').hover(function(e) {
		if(!$(this).parent().hasClass('active')) {
			$(this).parent().attr('class', getRandomClass());
        }
    }, function(){
    	if(!$(this).hasClass('active')) {
    		$('.nav__menu li').removeClass('g y p');
    	}
    });

    function getRandomClass() {
    	var classes = new Array('g','y','p');
    	
    	return classes[Math.floor(Math.random() * 3)];
	}

	if($('.main_acc').length){
		function acc_fit() {

			if($(window).width() >= 767) {

				// Main accordion
				$('.main_acc__box').click(function(){
					$(this).stop(true).parent().toggleClass('main_acc--opened');
					$(this).stop(true).toggleClass('main_acc__box--active');
					$('.main_acc__coub').stop(true).toggleClass('main_acc__coub--active');
				});

				acc_width = $('.main_acc').width();
				acc_content = $('.content').width();
				acc_width_side = Math.round(acc_width / 3);
				
				acc_2line = $('.main_acc__box2 .main_acc__title-img img').offset().top;
				acc_2line_h = $('.main_acc__box2 .main_acc__title-img img').height();
				acc_2line_pos = acc_2line + acc_2line_h - acc_2line_h - 1;
				acc_2line_pos = Math.round(acc_2line_pos);

				$('.main_acc__box3 .main_acc__line').css({top: acc_2line_pos, height: acc_2line_h});
				$('.main_acc__in').width(acc_content - 19);
				$('.main_acc__side').width(acc_width_side);


				// Coubs
				coub1_offset = $('.main_acc__box1 .main_acc__title-img img').offset().top - 17;
				coub1_offset = Math.round(coub1_offset);
				$('.main_acc__coub1').css({top: coub1_offset});

				coub2_offset = $('.main_acc__box2 .main_acc__title-img img').offset().top + acc_2line_h - 2;
				$('.main_acc__coub2').css({top: coub2_offset});

				acc_line3 = $('.main_acc__box3 .main_acc__title-img img').height();
				coub3_offset = $('.main_acc__box3 .main_acc__title-img img').offset().top + acc_line3;
				$('.main_acc__coub3').css({top: coub3_offset});
			}
		}
		acc_fit();

		$(window).resize(function(){
			acc_fit();
		});
	}


	// Scroller
	var scroller = $('.scroller');

	if(scroller.length) {

		function scr_init() {

			if($(window).width() <= 767) {
				$('.scroller').each(function() {
					var api = $(this).data('jsp');

					if($(this).hasClass('jspScrollable')) {
						api.destroy();
					}
				});
			} else {
				var apis = [];

				$('.scroller').each(
					function() {
						apis.push($(this).jScrollPane({
							autoReinitialise: true,
						}).data().jsp);
					}
				)

				$('.scroll_bt').hide();
				$('.scroller').bind('jsp-initialised', function(event, isScrollable) {
					if(isScrollable) {
						$('.scroll_bt').fadeIn(250);
					} else {
						$('.scroll_bt').hide();
					}
					
				});

			}
		}

		scr_init();

		$(window).resize(function(){
			scr_init();
		});
	}

	// Fit title text
	/*if($('.page_box__title h3').length) {
		setTimeout(function(){
			$('.page_box__title h3').textfill();
		}, 100);

		$(window).resize(function(){
			$('.page_box__title h3').textfill();
		});
	}*/



	// Map init
	if($('.contacts__map').length) {
		function initialize() {
			var isDraggable = $(document).width() > 767 ? true : false;
			var myLatlng = new google.maps.LatLng(55.759359,37.666006);
			var mapOptions = {
				scrollwheel: false,
			zoom: 15,
			center: myLatlng,
			mapTypeControl: false,
			streetViewControl: false,
			rotateControl: false,
			draggable: isDraggable,

			styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#faeb37"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"on"},{"saturation":"69"},{"lightness":"3"},{"gamma":"0.76"},{"weight":"4.80"}]},{"featureType":"poi.sports_complex","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"color":"#994cae"},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"off"},{"lightness":"63"},{"gamma":"8.17"},{"weight":"6.13"},{"color":"#a35353"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#75c0cc"},{"visibility":"on"}]}],
			}

			var contentString = '<div class="infowindow">'+
		      '<h3 class="infowindow__title">Наш уютный офис</h3>'+
		      '<div class="infowindow__body">'+
		      '<p>БЦ Деловой — самый деловой из самых деловых БЦ</p>'+
		      '</div>'+
		      '</div>';

			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});

			var map = new google.maps.Map(document.getElementById('contacts_map'), mapOptions);

			var image = {
				url: 'images/ico-marker.png',
				scaledSize: new google.maps.Size(57, 52),
			};

			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				icon: image,
			});

			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
		}

		google.maps.event.addDomListener(window, 'load', initialize);

		initialize();
	}
	


	function mobile() {
		if($(window).width() < 767) {

		// Main page
		if($('.main_acc').length) {
			var win_height = $(window).height();
			var menu_height = $('.mobile_top').height();

			var main_acc_in = (win_height - menu_height) / 3;

			$('.main_acc__side').css({minHeight: main_acc_in});
			
			/*
			$('.main_acc__box1').click(function(){
				window.location.href='design.html';
			});

			$('.main_acc__box2').click(function(){
				window.location.href='digital.html';
			});

			$('.main_acc__box3').click(function(){
				window.location.href='production.html';
			});*/

		}

	}

	}

	if($(window).width() < 767) {
		mobile();
	}

	$(window).resize(function(){
		mobile();
	});



	function mob_main() {
		win_width = $(window).width();

		if(win_width < 767) {
			$('.main_acc__box').click(function(){
				$('.main_acc__body').slideUp(250);
				$(this).find('.main_acc__body').slideToggle(250);
			});
		}
	}

	mob_main();

	$(window).resize(function(){
		mob_main();
	});


	// Portfolio
	/*if($('.portfolio__item').length) {
		$('.portfolio__item').css({height: $('.portfolio__item').width()});

		$(window).resize(function(){
			$('.portfolio__item').css({height: $('.portfolio__item').width()});
		});
	}*/


});