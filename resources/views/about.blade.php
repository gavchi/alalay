@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="page_box about">

        <div class="page_box__side">

            <div class="page_box__title">
                <h3><span>Кто мы</span></h3>
                <h5>кто есть кто</h5>
                <p></p>
            </div><!--.page_box__title-->

        </div><!--.page_box__side-->

        <div class="page_box__body">

            <div class="about__txt">
                <p><span class="sel sel_g">Мы создаём бренды.</span><br> В нашей команде только профессионалы и уникальные специалисты. Разрабатываем индивидуальные рекламные проекты от идеи до полного воплощения. <span class="sel sel_g">Играем по-крупному и смело.</span></p>
            </div><!--.about__txt-->

        </div><!--.page_box__body-->

        <div class="more_box visible-xs">
            <a href="/clients" class="btn btn-red">Клиенты</a>
        </div><!--.more_box-->

    </div><!--.about-->
@endsection