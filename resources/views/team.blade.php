@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="page_box command">

        <div class="page_box__side clients__side">

            <div class="page_box__title">
                <h3>КОМАНДА</h3>
                <h5>лицом к лицу</h5>
                <p></p>
            </div><!--.page_box__title-->

        </div><!--.page_box__side-->

        <div class="page_box__body">

            <div class="page_box__list command__list scroller">

                <ul class="list-unstyled">
                    @foreach($Members as $Member)
                    <li>
                        <div class="thumb">
                            <img src="{{asset(config('image.path.member').$Member->image)}}" alt="{{$Member->name}}">
                        </div>

                        <div class="info">
                            <div class="info__in">
                                <h4>{{$Member->name}}</h4>
                                <p>{{$Member->post}}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>

            </div><!--.clients__list-->

        </div><!--.page_box__body-->

        <div class="more_box visible-xs">
            <a href="/about." class="btn btn-red">Об агентстве</a><br>
            <a href="/clients" class="btn btn-red">Клиенты</a>
        </div><!--.more_box-->

    </div><!--.clients-->
@endsection