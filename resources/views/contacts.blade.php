@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="page_box contacts">

        <div class="page_box__side">

            <div class="page_box__title hidden-xs">
                <div class="page_box__title-title">
                    <img src="images/txt-contacts.png" alt="Контакты">
                </div>
                <h5>позвони нам,<br> позвони</h5>
                <p></p>
            </div><!--.page_box__title-->

        </div><!--.page_box__side-->

        <div class="page_box__body">

            <div class="contacts__in">

                <div class="contacts__info">
                    <div class="contacts__left">
                        <h4>Наши телефоны:</h4>
                        <ul class="list-unstyled">
                            <li><a href="tel:84953800602">8 (495) 380-06-02</a></li>
                            <li><a href="tel:88007752650">8 (800) 775-26-50</a></li>
                        </ul>
                    </div><!--.contacts__left-->

                    <div class="contacts__right">
                        <h4>Электронная почта:</h4>
                        <ul class="list-unstyled">
                            <li><a href="mailto:alalay@alalay.ru">alalay@alalay.ru</a></li>
                        </ul>
                    </div><!--.contacts__right-->

                </div><!--.contacts__info-->

                <div class="contacts__txt">
                    <p>Нижний Сусальный переулок, дом 5, строение 19,<br> БЦ Деловой, территория бизнес-квартала АРМА</p>
                </div><!--.contacts__txt-->

                <div class="contacts__map" id="contacts_map"></div>

            </div><!--.contacts__in-->

            <div class="contacts__social">
                <ul class="list-unstyled">
                    <li class="fb"><a href="#">Facebook</a></li>
                    <li class="vk"><a href="#">ВКонтакте</a></li>
                    <li class="in"><a href="#">Instagram</a></li>
                </ul>
            </div><!--.contacts__social-->

        </div><!--.page_box__body-->

    </div><!--.contacts-->
@endsection