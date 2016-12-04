@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="page_box portfolio">

        <div class="page_box__side">

            <div class="page_box__title">
                <h3><span>Портфолио</span></h3>
                <h5>святая святых</h5>
                <p></p>
            </div><!--.page_box__title-->

        </div><!--.page_box__side-->

        <div class="page_box__body">
@php
$counter = 1;
//max = 12
@endphp
            <div class="portfolio__list scroller">
                @foreach($firstItems as $Work)
                <a href="{{action('MainController@getProject', $Work['id'])}}" class="portfolio__item portfolio__item{{$counter}}" data-title="{{$Work['title']}}">
                    <div class="portfolio__bg">
                        <img src="/images/bg-prj{{$counter}}.png" alt="">
                    </div><!--.portfolio__bg-->

                    <div class="portfolio__txt">
                        <div class="portfolio__txt-in">
                            <h4>{!! str_replace(' ', '<br>', $Work['title']) !!}</h4>
                        </div><!--.portfolio__txt-in-->
                    </div><!--.portfolio__txt-->
                </a><!--.portfolio__item-->
                    @php
                        $counter++;
                        if(12 <= $counter){
                            $counter = 1;
                        }
                    @endphp
                @endforeach

            </div><!--.portfolio__list-->

            <div class="portfolio__list scroller">

                @foreach($secondItems as $Work)
                    <a href="{{action('MainController@getProject', $Work['id'])}}" class="portfolio__item portfolio__item{{$counter}}">
                        <div class="portfolio__bg">
                            <img src="/images/bg-prj{{$counter}}.png" alt="">
                        </div><!--.portfolio__bg-->

                        <div class="portfolio__txt">
                            <div class="portfolio__txt-in">
                                <h4>{!! str_replace(' ', '<br>', $Work['title']) !!}</h4>
                            </div><!--.portfolio__txt-in-->
                        </div><!--.portfolio__txt-->
                    </a><!--.portfolio__item-->
                    @php
                        $counter++;
                        if(12 <= $counter){
                            $counter = 1;
                        }
                    @endphp
                @endforeach

            </div><!--.portfolio__list-->

        </div><!--.page_box__body-->

    </div><!--.portfolio-->
@endsection