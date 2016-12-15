@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="page_box journal">

        <div class="page_box__side">

            <div class="page_box__title">
                <h3>Журнал</h3>
                <h5>то, сё, пятое, десятое</h5>
                <p>Жизнь рекламного агентства - это целая череда ярких и интересных событий, многие из которых остаются за кадром  официальных новостей и громких проектов. Всё это мы собрали здесь в нашем журнале.</p>
            </div><!--.page_box__title-->

        </div><!--.page_box__side-->

        <div class="page_box__body">
            @include('parts.news', ['News' => $News])
        </div><!--.page_box__body-->

    </div><!--.journal-->
@endsection
