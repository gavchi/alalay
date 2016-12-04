@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="page_box project">

        <div class="page_box__side clients__side">

            <div class="page_box__title">
                <h3><span>{{$Work->title}}</span></h3>
                <h5>{{$Work->work_type}}</h5>
                <p>{{$Work->description}}</p>
            </div><!--.page_box__title-->

        </div><!--.page_box__side-->

        <div class="page_box__body">

            <div class="page_box__list project__list scroller">

                <div class="project__items">
                    <div class="project__item">
                        <img src="/images/work/main/{{$Work->image}}" alt="">
                    </div><!--.project__item-->
                </div><!--.project__items-->

            </div><!--.page_box__list-->

        </div><!--.page_box__body-->

    </div><!--.project-->
@endsection