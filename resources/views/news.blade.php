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

            <div class="journal__entries scroller">

                @foreach($News as $Item)
                <div class="journal__entry">
                    <div class="journal__entry-title">
                        <h3>{!! nl2br($Item->title) !!}</h3>
                    </div><!--.journal__entry-title-->

                    @if(trim($Item->description))
                    <div class="journal__entry-body">
                        <p>{!! nl2br($Item->description) !!}</p>
                    </div><!--.journal__entry-body-->
                    @endif

                    @if(count($Item->tags))
                    <div class="journal__entry-tags">
                        <ul class="list-unstyle">
                            @foreach($Item->tags as $Tag)
                            <li><a href="#">#{{$Tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </div><!--.journal__entry-tags-->
                    @endif

                    @if($Item->image)
                    <div class="journal__entry-thumbs">
                        <ul>
                            <li><img src="{{asset(config('image.path.news').$Item->image)}}" alt=""></li>
                        </ul>
                    </div><!--.journal__entry-thumbs-->
                    @endif
                </div><!--.journal__entry-->
                @endforeach
{{--

                <div class="journal__entry">
                    <div class="journal__entry-title">
                        <h3>Всем пятницы и хурьмы!</h3>
                    </div><!--.journal__entry-title-->
                </div><!--.journal__entry-->


                <div class="journal__entry">
                    <div class="journal__entry-title">
                        <h3>Или<br> двойной крутой заголовок</h3>
                    </div><!--.journal__entry-title-->

                    <div class="journal__entry-body">
                        <p>Печать на 3D-принтере - это невероятно простое и быстро моделирование, позволяющее воссоздать практически любые объемные предметы, сохраняя высокий уровень их детализации. Напечатаем на 3D-принтере индивидуально для вас.</p>
                    </div><!--.journal__entry-body-->

                    <div class="journal__entry-tags">
                        <ul class="list-unstyle">
                            <li><a href="#">#хэштэг</a></li>
                            <li><a href="#">#хэштэг</a></li>
                            <li><a href="#">#ещехэштэг</a></li>
                            <li><a href="#">#иеще</a></li>
                            <li><a href="#">#ещеодин</a></li>
                            <li><a href="#">#хэштэг</a></li>
                            <li><a href="#">#кваква</a></li>
                        </ul>
                    </div><!--.journal__entry-tags-->

                    <div class="journal__entry-thumbs">
                        <ul>
                            <li><a href="#"><img src="images/img-jthumb1.jpg" alt=""></a></li>
                        </ul>
                    </div><!--.journal__entry-thumbs-->
                </div><!--.journal__entry-->


                <div class="journal__entry">
                    <div class="journal__entry-title">
                        <h3>Крутой заголовок</h3>
                    </div><!--.journal__entry-title-->

                    <div class="journal__entry-body">
                        <p>Печать на 3D-принтере - это невероятно простое и быстро моделирование, позволяющее воссоздать практически любые объемные предметы, сохраняя высокий уровень их детализации. Напечатаем на 3D-принтере индивидуально для вас.</p>
                    </div><!--.journal__entry-body-->

                    <div class="journal__entry-tags">
                        <ul class="list-unstyle">
                            <li><a href="#">#хэштэг</a></li>
                            <li><a href="#">#хэштэг</a></li>
                            <li><a href="#">#ещехэштэг</a></li>
                            <li><a href="#">#иеще</a></li>
                            <li><a href="#">#ещеодин</a></li>
                            <li><a href="#">#хэштэг</a></li>
                            <li><a href="#">#кваква</a></li>
                        </ul>
                    </div><!--.journal__entry-tags-->

                    <div class="journal__entry-thumbs">
                        <ul>
                            <li><a href="#"><img src="images/img-jthumb1.jpg" alt=""></a></li>
                        </ul>
                    </div><!--.journal__entry-thumbs-->
                </div><!--.journal__entry-->
--}}
            </div><!--.journal__entries-->

        </div><!--.page_box__body-->

    </div><!--.journal-->
@endsection