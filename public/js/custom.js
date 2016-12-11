function historyJS(){
    // Prepare
    var History = window.History; // Note: We are using a capital H instead of a lower h
    if ( !History.enabled ) {
        // History.js is disabled for this browser.
        // This is because we can optionally choose to support HTML4 browsers or not.
        return false;
    }

    // Bind to StateChange Event
    History.Adapter.bind(window,'statechange',function() { // Note: We are using statechange instead of popstate
        var State = History.getState();
        var outJSON = false;
        var container = $('section.content');
        var sidebar = $('.sidebar__nav');
        console.log(container.offset().left, container.width());
        container.animate({
            left: container.width()
        },{
            duration: 1500,
            queue: true,
            easing: 'easeInOutCubic',
            start: function(){
                var submenu = sidebar.find('.nav__menu').prev();
                submenu.animate({
                    top: 0-window.innerHeight
                },{
                    duration: 500,
                    queue: true,
                    complete: function(){
                        submenu.remove()
                    }
                });
                $.ajax({
                    type: "GET",
                    async: false,
                    dataType: "json",
                    url: State.url,
                    error: function(msg){
                        alert( 'Error' );
                    },
                    success: function(result, status){
                        outJSON = result;
                    }
                });
            },
            complete: function(){
                //location.hash = '!'+url.split(location.origin)[1];
                var waitAjax = setInterval(function(){
                    if(false != outJSON){
                        clearInterval(waitAjax);
                        //console.log(collectionSlide);
                        container.html();
                        container.html(outJSON.html);

                        //fitTitleText();
                        scrollerInit();
                        main_accInit();
                        mapInit();

                        container.animate({
                            left: 0
                        },{
                            duration: 1000,
                            queue: true,
                            easing: 'easeInOutCubic',
                            start: function(){
                                $('.nav__menu a').parent().removeClass('active');
                                //$('.nav__menu').nextAll().remove();

                                sidebar.find('.nav__menu').before($(outJSON.submenu).css('top', -700));
                                sidebar.find('a[data-link="'+outJSON.link+'"]').parent().addClass('active');
                                var submenu = sidebar.find('.nav__menu').prev();
                                submenu.animate({
                                    top: 0
                                },{
                                    duration: 1000,
                                    queue: true,
                                    easing: 'easeOutCirc'
                                });
                            }
                        });
                    }
                }, 100);
            }
        });
        //$('section.content').load(State.url);
        // Instead of the line above, you could run the code below if the url returns the whole page instead of just the content (assuming it has a `#content`):
        /*$.ajax({
            type: "GET",
            async: false,
            dataType: "json",
            url: State.url,
            error: function(msg){
                alert( 'Error' );
            },
            success: function(result, status){
                $('section.content').html(result.html);
                $('.nav__menu a').parent().removeClass('active');
                $('.nav__menu').nextAll().remove();
                $('.nav__menu').after(result.submenu);
                fitTitleText();
                scrollerInit();
                main_accInit();
                mapInit();
            }
        });*/
        /*
         $.get(State.url, function(response) {
             console.log(response);
             $('section.content').html(response);
             fitTitleText();
         });*/

    });
/*
    History.Adapter.bind(window,'statechange',function() {
        var State = History.getState();
        console.log(State);
    });*/


    // Capture all the links to push their url to the history stack and trigger the StateChange Event
    $('.sidebar__nav, .top__logo').on('click','a',function(e) {
        e.preventDefault();
        History.pushState(null, $(this).data('title') ? $(this).data('title') : $(this).text(), $(this).attr('href'));
    });
    //Portfolio
    if(!$('body').hasClass('bg-grey-mob')){
        $('section.content').on('click','a.portfolio__item',function(e) {
            e.preventDefault();
            History.pushState(null, $(this).data('title') ? $(this).data('title') : $(this).text(), $(this).attr('href'));
        });
    }
}

// Fit title text
/*function fitTitleText(){
    if($('.page_box__title h3').length) {
        setTimeout(function(){
            $('.page_box__title h3').textfill();
        }, 100);

        $(window).resize(function(){
            $('.page_box__title h3').textfill();
        });
    }
}*/

// Scroller
function scrollerInit(){
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
}

function main_accInit(){
    if($('.main_acc').length){
        if(typeof acc_fit != 'function'){
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
            $(window).resize(function(){
                acc_fit();
            });
        }
        acc_fit();
    }
}

// Map init
function mapInit(){
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
}

function sendEmail(){
    $('.modal').on('submit', 'form', function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            error: function (msg) {
                alert('Error');
            },
            success: function (result, status) {
                $('.howmatch_modal').modal('hide');
            }
        });
    });
}

function redeclareDesign(){
    //Block 1 Animate
    $('body.bg-grey-mob').on('click', '.main_acc__box1.toggleOut', function(e){
        e.preventDefault();
        var container = $(this);
        var fullHeight = 0;
        container.children('.mobile_coub_block').each(function(){
            fullHeight += $(this).height();
        });
        container.data('height', container.height());
        container.animate({
            top: container.parent(),
            height: fullHeight
        },{
            start: function(){
                container.find('.main_acc__in, .main_acc__coub').animate({
                    top: -400,
                    opacity: 0
                },{
                    duration: 1000,
                    queue: true
                });
                container.find('.mobile_coub_block').animate({
                    opacity: 1
                },{
                    duration: 1000,
                    queue: true
                });
            },
            complete: function(){
                container.addClass('toggleIn');
                container.removeClass('toggleOut');
            }
        });
    });
    $('body.bg-grey-mob').on('click', '.main_acc__box1.toggleIn', function(e){
        e.preventDefault();
        if('A' == e.target.nodeName){
            location.href = e.target.href;
        }
        var container = $(this);
        container.animate({
            top: container.parent(),
            height: container.data('height')
        },{
            start: function(){
                container.find('.main_acc__in, .main_acc__coub').animate({
                    top: 0,
                    opacity: 1
                },{
                    duration: 1000,
                    queue: true
                });
                container.find('.mobile_coub_block').animate({
                    opacity: 0
                },{
                    duration: 1000,
                    queue: true
                });
            },
            complete: function(){
                container.data('height', container.height());
                container.addClass('toggleOut');
                container.removeClass('toggleIn');
            }
        });
    });

    //Block 2 Animate
    $('body.bg-grey-mob').on('click', '.main_acc__box2.toggleOut', function(e){
        e.preventDefault();
        var container = $(this);
        var fullHeight = 0;
        container.children('.mobile_coub_block').each(function(){
            fullHeight += $(this).height();
        });
        container.data('height', container.height());
        container.animate({
            //top: 0 - container.data('height'),
            height: fullHeight
        },{
            start: function(){
                container.css('position', 'relative');
                $('html, body').animate({
                    scrollTop: container.offset().top - 60
                }, 1000);
                container.find('.main_acc__in, .main_acc__coub').animate({
                    top: -400,
                    opacity: 0
                },{
                    duration: 1000,
                    queue: true
                });
                container.find('.mobile_coub_block').animate({
                    opacity: 1
                },{
                    duration: 1000,
                    queue: true
                });
            },
            complete: function(){
                container.addClass('toggleIn');
                container.removeClass('toggleOut');
            }
        });
    });
    $('body.bg-grey-mob').on('click', '.main_acc__box2.toggleIn', function(e){
        e.preventDefault();
        if('A' == e.target.nodeName){
            location.href = e.target.href;
        }
        var container = $(this);
        container.animate({
            //top: 0,
            height: container.data('height')
        },{
            start: function(){
                $('html, body').animate({
                    scrollTop: container.offset().top
                }, 1000);
                container.find('.main_acc__in, .main_acc__coub').animate({
                    top: 0,
                    opacity: 1
                },{
                    duration: 1000,
                    queue: true
                });
                container.find('.mobile_coub_block').animate({
                    opacity: 0
                },{
                    duration: 1000,
                    queue: true
                });
            },
            complete: function(){
                container.data('height', container.height());
                container.addClass('toggleOut');
                container.removeClass('toggleIn');
            }
        });
    });

    //Block 3 Animate
    $('body.bg-grey-mob').on('click', '.main_acc__box3.toggleOut', function(e){
        e.preventDefault();
        var container = $(this);
        var fullHeight = 0;
        container.children('.mobile_coub_block').each(function(){
            fullHeight += $(this).height();
        });
        container.data('height', container.height());
        container.animate({
            //top: 0 - 2*container.data('height'),
            height: fullHeight
        },{
            start: function(){
                container.css('position', 'relative');
                container.css('position', 'relative');
                $('html, body').animate({
                    scrollTop: container.offset().top
                }, 1000);
                container.find('.main_acc__in, .main_acc__coub').animate({
                    top: -400,
                    opacity: 0
                },{
                    duration: 1000,
                    queue: true
                });
                container.find('.mobile_coub_block').animate({
                    opacity: 1
                },{
                    duration: 1000,
                    queue: true
                });
            },
            complete: function(){
                container.addClass('toggleIn');
                container.removeClass('toggleOut');
            }
        });
    });
    $('body.bg-grey-mob').on('click', '.main_acc__box3.toggleIn', function(e){
        e.preventDefault();
        if('A' == e.target.nodeName){
            location.href = e.target.href;
        }
        var container = $(this);
        container.animate({
            //top: 0,
            height: container.data('height')
        },{
            start: function(){
                $('html, body').animate({
                    scrollTop: container.offset().top
                }, 1000);
                container.find('.main_acc__in, .main_acc__coub').animate({
                    top: 0,
                    opacity: 1
                },{
                    duration: 1000,
                    queue: true
                });
                container.find('.mobile_coub_block').animate({
                    opacity: 0
                },{
                    duration: 1000,
                    queue: true
                });
            },
            complete: function(){
                container.data('height', container.height());
                container.addClass('toggleOut');
                container.removeClass('toggleIn');
            }
        });
    });
/*
    $('.main_acc__box2').click(function(e){
        e.preventDefault();
        //window.location.href='/digital';
    });

    $('.main_acc__box3').click(function(e){
        e.preventDefault();
        //window.location.href='/production';
    });*/
}

$(function() {
    //fitTitleText();
    historyJS();
    redeclareDesign();
    sendEmail();
});