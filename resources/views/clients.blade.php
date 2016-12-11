@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="page_box clients">

        <div class="page_box__side clients__side">

            <div class="page_box__title">
                <h3>Клиенты</h3>
                <h5>взаимная любовь</h5>
                <p></p>
            </div><!--.page_box__title-->

            <div class="scroll_bt scroll_bt_mb5">
                <span>крути вниз</span>
            </div><!--.scroll_bt-->

        </div><!--.page_box__side-->

        <div class="page_box__body">

            <div class="page_box__list clients__list scroller">

                <ul class="list-unstyled">
                    @foreach($Clients as $Client)
                    <li><img src="{{asset(config('image.path.client').$Client->image)}}" alt="{{$Client->title}}"></li>
                    @endforeach
                </ul>

            </div><!--.clients__list-->

        </div><!--.page_box__body-->

        <div class="more_box visible-xs">
            <a href="/about" class="btn btn-red">Об агентстве</a>
        </div><!--.more_box-->

    </div><!--.clients-->
@endsection