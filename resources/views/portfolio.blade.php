@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="page_box portfolio">

        <div class="page_box__side">

            <div class="page_box__title">
                <h3>Портфолио</h3>
                <h5>святая святых</h5>
                <p></p>
            </div><!--.page_box__title-->

            <div class="scroll_bt scroll_bt_mb5">
                <span>крути вниз</span>
            </div><!--.scroll_bt-->

        </div><!--.page_box__side-->

        <div class="page_box__body">
@php
$counter = 1;
$colors = [
    'green',
    'purple',
    'yellow',
];
//max = 7
@endphp
            <div class="portfolio__list scroller">
                @foreach($firstItems as $Work)

                    <a href="{{action('MainController@getProject', $Work['id'])}}"
                       class="portfolio__item {{$colors[$counter%3]}} @if(!is_null($Work['mask'])) {{$Work['mask']['name']}} @endif text-white" data-title="{{$Work['title']}}">
                        <div class="portfolio__img">
                            <img src="{{asset(config('image.path.work.logo').$Work['logo'])}}" alt="{{$Work['title']}}">
                        </div><!--.portfolio__img-->

                        <div class="portfolio__txt">
                            <div class="portfolio__txt-in">
                                <h4>{!! str_replace(' ', '<br>', $Work['title']) !!}</h4>
                            </div><!--.portfolio__txt-in-->
                        </div><!--.portfolio__txt-->
                    </a><!--.portfolio__item-->
                    @php
                        $counter++;
                        if(7 <= $counter){
                            $counter = 1;
                        }
                    @endphp
                @endforeach

            </div><!--.portfolio__list-->

            <div class="portfolio__list scroller">

                @foreach($secondItems as $Work)
                    <a href="{{action('MainController@getProject', $Work['id'])}}"
                       class="portfolio__item {{$colors[$counter%3]}} @if(!is_null($Work['mask'])) {{$Work['mask']['name']}} @endif text-white" data-title="{{$Work['title']}}">
                        <div class="portfolio__img">
                            <img src="{{asset(config('image.path.work.logo').$Work['logo'])}}" alt="{{$Work['title']}}">
                        </div><!--.portfolio__img-->

                        <div class="portfolio__txt">
                            <div class="portfolio__txt-in">
                                <h4>{!! str_replace(' ', '<br>', $Work['title']) !!}</h4>
                            </div><!--.portfolio__txt-in-->
                        </div><!--.portfolio__txt-->
                    </a><!--.portfolio__item-->
                    @php
                        $counter++;
                        if(7 <= $counter){
                            $counter = 1;
                        }
                    @endphp
                @endforeach

            </div><!--.portfolio__list-->

        </div><!--.page_box__body-->

    </div><!--.portfolio-->
@endsection