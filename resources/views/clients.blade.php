@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="page_box clients">

        <div class="page_box__side clients__side">

            <div class="page_box__title">
                <div class="page_box__title-title">
                    <img src="/images/txt-clients.png" alt="Клиенты">
                </div>
                <h5>взаимная любовь</h5>
                <p></p>
            </div><!--.page_box__title-->

        </div><!--.page_box__side-->

        <div class="page_box__body">

            <div class="page_box__list clients__list scroller">

                <ul class="list-unstyled">
                    <li><a href="#"><img src="/images/clients/tinkoff.jpg" alt=""></a></li>
                    <li><a href="#"><img src="/images/clients/gazprom.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/clients/subway.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/clients/metro.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/clients/cummins.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/clients/solid.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/clients/ikoraf.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/clients/sabre.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/clients/major.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/clients/beloil.png" alt=""></a></li>
                </ul>

            </div><!--.clients__list-->

        </div><!--.page_box__body-->

        <div class="more_box visible-xs">
            <a href="/about" class="btn btn-red">Об агентстве</a>
        </div><!--.more_box-->

    </div><!--.clients-->
@endsection