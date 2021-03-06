<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    @if($Seo && $Seo->title)
    <title>{{$Seo->title}}</title>
    @else
    <title>Алалай!</title>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    @if($Seo)
        @if($Seo->keywords)<meta name="keywords" content="{{$Seo->keywords}}">@endif
        @if($Seo->description)<meta name="description" content="{{$Seo->description}}">@endif
        @if($Seo->robots)<meta name="robots" content="{{$Seo->robots}}">@endif
        @if($Seo->copyright)<meta name="copyright" content="{{$Seo->copyright}}">@endif
    @endif
    <link rel="stylesheet" media="screen" href="/css/jquery.jscrollpane.css">
    <link rel="stylesheet" media="screen" href="/style.css?{{config('app.version')}}">
    <link rel="stylesheet" media="screen" href="/css/custom.css?{{config('app.version')}}">
</head>

<body @if($isMobile) class="bg-grey-mob" isMobile @endif>
@if('production' == config('app.env')) @include('parts.counter') @endif
<div class="mobile_top">
    <div class="mobile_top__logo">
        <a href="{{action('MainController@getIndex')}}"><img src="/images/logo3.png" alt="Алалай!"></a>
    </div><!--.mobile_top__logo-->

    <div class="btn-sandwich" data-dismiss="modal" data-toggle="modal" data-target="#mobile_menu">
        <i></i><i></i><i></i>
    </div><!--.mobile_top__snd-->
</div><!--.mobile_top-->

<aside class="sidebar">
    <div class="top__logo">
        <a href="{{action('MainController@getIndex')}}" data-title="Алалай!"><img src="/images/logo.png" alt="Алалай! ad&design"></a>
    </div><!--.top__logo-->

    <nav class="sidebar__nav">

        @include('layout.submenu', ['link' => $link])

        <div class="nav__menu">
            <ul class="list-unstyle">
                <li @if('about' === $link) class="active" @endif><a href="{{action('MainController@getAbout')}}" data-link="about">Кто мы</a></li>
                <li @if('portfolio' === $link) class="active" @endif><a href="{{action('MainController@getPortfolio')}}" data-link="portfolio">Портфолио</a></li>
                <li @if('news' === $link) class="active" @endif><a href="{{action('MainController@getNews')}}" data-link="news">Журнал</a></li>
                <li @if('contacts' === $link) class="active" @endif><a href="{{action('MainController@getContacts')}}" data-link="contacts">Контакты</a></li>
            </ul>
        </div><!--.nav__menu-->

    </nav><!--.sidebar__nav-->

</aside><!--.sidebar-->

<section class="content">
    @yield('content')
</section><!--.content-->

<!-- Modal Info -->
<div class="modal modal_vam howmatch_modal fade" id="howmatch_modal" tabindex="-1" role="dialog" aria-labelledby="howmatch_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>-->
            <div class="modal_box__body">
                <form action="{{action('FeedbackController@postSend')}}" method="post">

                    <div class="inp-group">
                        <input type="text" name="name" placeholder="Ваше имя" class="inp-style">
                    </div><!--.inp-group-->

                    <div class="inp-group">
                        <input type="text" name="email" placeholder="Ваш e-mail" class="inp-style">
                    </div><!--.inp-group-->

                    <div class="inp-group">
                        <textarea name="text" rows="6" placeholder="Текст сообщения" class="inp-style"></textarea>
                    </div><!--.inp-group-->

                    <div class="inp-group">
                        <input type="submit" value="Узнать что и почём" class="inp-submit">
                    </div><!--.inp-group-->

                </form>
            </div><!--.modal_box__body-->

        </div>
    </div>
</div>
<!-- end Modal Info -->

<div class="modal fade mobile_menu" id="mobile_menu" tabindex="-1" role="dialog" aria-labelledby="mobile_menu">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="mobile_menu__nav">
                <ul class="list-unstyled">
                    <li @if('about' === $link) class="active" @endif><a href="{{action('MainController@getAbout')}}" data-link="about">Кто мы</a></li>
                    <li @if('portfolio' === $link) class="active" @endif><a href="{{action('MainController@getPortfolio')}}" data-link="portfolio">Портфолио</a></li>
                    <li @if('news' === $link) class="active" @endif><a href="{{action('MainController@getNews')}}" data-link="news">Журнал</a></li>
                    <li @if('contacts' === $link) class="active" @endif><a href="{{action('MainController@getContacts')}}" data-link="contacts">Контакты</a></li>
                </ul>
            </div><!--.mobile_menu__nav-->

            <div class="contacts__social">
                <ul class="list-unstyled">
                    <li class="fb"><a href="https://www.facebook.com/alalay.agency" target="_blank">Facebook</a></li>
                    <li class="vk"><a href="https://vk.com/alalay_agency" target="_blank">ВКонтакте</a></li>
                    <li class="in"><a href="https://www.instagram.com/alalay_agency/" target="_blank">Instagram</a></li>
                </ul>
            </div><!--.contacts__social-->

        </div><!--.modal-content-->
    </div><!--.modal-dialog-->

</div><!--.mobile_menu-->

<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.history.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/mwheelIntent.js"></script>
<script src="/js/jquery.mousewheel.js"></script>
<script src="/js/jquery.jscrollpane.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyABJQBZV_AyH7jw9qD-46wLXLqmbitRobw"></script>
<script src="/js/jquery.textfill.min.js"></script>
<script src="/js/bootstrap.modal.min.js"></script>
<script src="/js/design.js?{{config('app.version')}}"></script>
<script src="/js/custom.js?{{config('app.version')}}"></script>

</body>
</html>