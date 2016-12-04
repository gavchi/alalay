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
            easing: 'easeInOutBack',
            start: function(){
                var submenu = sidebar.find('.nav__menu').next();
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
                        container.animate({
                            left: 0
                        },{
                            duration: 1000,
                            queue: true,
                            easing: 'easeOutCirc',
                            start: function(){
                                $('.nav__menu a').parent().removeClass('active');
                                //$('.nav__menu').nextAll().remove();

                                sidebar.find('.nav__menu').after($(outJSON.submenu).css('top', -700));
                                sidebar.find('a[data-link="'+outJSON.link+'"]').parent().addClass('active');
                                var submenu = sidebar.find('.nav__menu').next();
                                submenu.animate({
                                    top: 0
                                },{
                                    duration: 1000,
                                    queue: true,
                                    easing: 'easeOutCirc'
                                });
                            }
                        });
                        fitTitleText();
                        scrollerInit();
                        main_accInit();
                        mapInit();
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
    $('section.content').on('click','a.portfolio__item',function(e) {
        e.preventDefault();
        History.pushState(null, $(this).data('title') ? $(this).data('title') : $(this).text(), $(this).attr('href'));
    });
}

// Fit title text
function fitTitleText(){
    if($('.page_box__title h3').length) {
        setTimeout(function(){
            $('.page_box__title h3').textfill();
        }, 100);

        $(window).resize(function(){
            $('.page_box__title h3').textfill();
        });
    }
}

// Scroller
function scrollerInit(){
    if($('.scroller').length) {
        $('.scroller').jScrollPane({
            autoReinitialise: true,
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
                    acc_width_side = acc_width / 3;

                    acc_2line = $('.main_acc__box2 .main_acc__title-img img').offset().top;
                    acc_2line_h = $('.main_acc__box2 .main_acc__title-img img').height();
                    acc_2line_pos = acc_2line + acc_2line_h - acc_2line_h - 1;

                    $('.main_acc__box3 .main_acc__line').css({top: acc_2line_pos, height: acc_2line_h});
                    $('.main_acc__in').width(acc_content - 19);
                    $('.main_acc__side').width(acc_width_side);

                    // Coubs
                    coub1_offset = $('.main_acc__box1 .main_acc__title-img img').offset().top - 18;
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

$(function() {
    //fitTitleText();
    historyJS();
    sendEmail();
});