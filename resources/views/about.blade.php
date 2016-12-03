@extends('layout.main')

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

                <p><span class="sel sel_g">Мы уникальная команда творческих единомышленников.</span> Мы реализуем самые разнообразные рекламные проекты по таким направлениям как графический и веб-дизайн и оказываем полный комплекс производственных услуг.</p>

                <p>Алалай - яркий пример того, как сравнительно молодое агентство успешно сотрудничает с целым рядом крупнейших брендов, представляющих различные сферы бизнеса. <span class="sel sel_g">Мы не боимся играть по-крупному</span> и смело берёмся за самые сложные задачи.</p>

            </div><!--.about__txt-->

        </div><!--.page_box__body-->

        <div class="more_box visible-xs">
            <a href="clients.html" class="btn btn-red">Клиенты</a>
        </div><!--.more_box-->

    </div><!--.about-->
@endsection