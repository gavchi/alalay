@extends('layout.'.(!$empty ? 'main' : 'empty'), ['link' => $link])

@section('content')
    <div class="main_acc__coub main_acc__coub1"></div>
    <div class="main_acc">
        <div class="main_acc__box main_acc__box1 toggleOut">
            <div class="main_acc__in">
                <div class="main_acc__side">
                    <div class="main_acc__title">
                        <span>трогни<br> чтобы познать</span>
                        <div class="main_acc__title-img">
                            <img src="/images/txt-design.png" alt="Design">
                        </div>
                        <p>branding<br> &amp;graphics</p>
                    </div><!--.main_acc__title-->
                </div><!--.main_acc__side-->

                <div class="main_acc__body">

                    <div class="main_acc__txt">
                        <div class="main_acc__left">
                            <p><span class="sel sel_g">Мы любим графический дизайн</span> всем сердцем, и потому рисуем его хорошо. В основе каждой нашей работы лежат идеи - интересные, уникальные, вдохновляющие. Наш дизайн не просто работает эффективно, но и делает мир прекраснее.</p>
                        </div><!--.main_acc__left-->

                        <div class="main_acc__right">
                            <p>Мы занимаемся всеми видами брендинга, от разработки логотипа и отдельных элементов айдентики до создания полноценного брендбука компании. <span class="sel sel_w">Мы обладаем актуальной творческой экпертизой</span>, что позволяет сделать образ созданного нами бренда живым и привлекательным для потенциального клиента.</p>
                        </div><!--.main_acc__right-->
                    </div><!--.main_acc__txt-->

                    <div class="top_box"></div>
                    <div class="howmatch" data-toggle="modal" data-target="#howmatch_modal">Что<br> почём</div>

                </div><!--.main_acc__body-->
            </div><!--.main_acc__in-->

            <div class="main_acc__coub main_acc__coub2"></div>
            @if($isMobile)
                <div class="mobile_coub_block">
                    <div class="mob_info__title">
                        <h1>Design</h1>
                        <p>branding &amp;graphics</p>
                    </div><!--.mob_info__title-->

                    <div class="mob_info__txt">
                        <p><span class="sel sel_g">Мы любим графический дизайн</span> всем сердцем, и потому рисуем его хорошо. В основе каждой нашей работы лежат идеи - интересные, уникальные, вдохновляющие. Наш дизайн не просто работает эффективно, но и делает мир прекраснее.</p>

                        <p>Мы занимаемся всеми видами брендинга, от разработки логотипа и отдельных элементов айдентики до создания полноценного брендбука компании. <span class="sel sel_w">Мы обладаем актуальной творческой экпертизой</span>, что позволяет сделать образ созданного нами бренда живым и привлекательным для потенциального клиента.</p>

                        <p><a href="/portfolio" class="btn btn-red">Наши работы</a></p>
                    </div><!--.mob_info__txt-->
                </div>
            @endif
        </div><!--.main_acc__box1-->

        <div class="main_acc__box main_acc__box2 toggleOut">
            <div class="main_acc__in">

                <div class="main_acc__line"></div>

                <div class="main_acc__side">
                    <div class="main_acc__title">
                        <span>трогни<br> чтобы познать</span>
                        <div class="main_acc__title-img">
                            <img src="images/txt-digital.png" alt="Digital">
                        </div>
                        <p>web design<br> &amp;social media</p>
                    </div><!--.main_acc__title-->
                </div><!--.main_acc__side-->

                <div class="main_acc__body">

                    <div class="main_acc__txt">
                        <div class="main_acc__left">
                            <p><span class="sel sel_w">Передовые технологии</span> сферы Digital - <span class="sel sel_w">ключ к успеху</span> и процветанию каждого современного бизнеса. Мы позаботимся о позитивном имидже вашего бренда в сети, предложив целый ряд эффективных инструментов.</p>
                        </div><!--.main_acc__left-->

                        <div class="main_acc__right">
                            <p>Мы создаём корпоративные и промо сайты, стильные посадочные страницы, <span class="sel sel_w">разрабатываем продуктивные стратегии</span> продвижения в социальных сетях, осуществляем SEO-продвижения и настройку контекстной рекламы.</p>
                        </div><!--.main_acc__right-->
                    </div><!--.main_acc__txt-->

                    <div class="top_box"></div>
                    <div class="howmatch" data-toggle="modal" data-target="#howmatch_modal">Что<br> почём</div>

                </div><!--.main_acc__body-->
            </div><!--.main_acc__in-->

            <div class="main_acc__coub main_acc__coub3"></div>
            @if($isMobile)
                <div class="mobile_coub_block">
                    <div class="mob_info__title">
                        <h1>Digital</h1>
                        <p>web design &amp;social media</p>
                    </div><!--.mob_info__title-->

                    <div class="mob_info__txt">
                        <p><span class="sel sel_w">Передовые технологии</span> сферы Digital - <span class="sel sel_w">ключ к успеху</span> и процветанию каждого современного бизнеса. Мы позаботимся о позитивном имидже вашего бренда в сети, предложив целый ряд эффективных инструментов.</p>

                        <p>Мы создаём корпоративные и промо сайты, стильные посадочные страницы, <span class="sel sel_w">разрабатываем продуктивные стратегии</span> продвижения в социальных сетях, осуществляем SEO-продвижения и настройку контекстной рекламы.</p>

                        <p><a href="/portfolio" class="btn btn-red">Наши работы</a></p>
                    </div><!--.mob_info__txt-->
                </div>
            @endif

        </div><!--.main_acc__box2-->

        <div class="main_acc__box main_acc__box3 toggleOut">
            <div class="main_acc__in">

                <div class="main_acc__line">
                    <img src="images/r-line.png" alt="">
                </div>

                <div class="main_acc__side">
                    <div class="main_acc__title">
                        <p class="hidden-xs">prints, merch<br> &amp;posm</p>
                        <div class="main_acc__title-img">
                            <img src="images/txt-production.png" alt="Production">
                        </div>
                        <span>трогни<br> чтобы познать</span>
                        <p class="visible-xs">prints, merch<br> &amp;posm</p>
                    </div><!--.main_acc__title-->

                </div><!--.main_acc__side-->

                <div class="main_acc__body">

                    <div class="main_acc__txt">
                        <div class="main_acc__left">
                            <p><span class="sel sel_g">Мы не только придумываем</span> крутые идеи, <span class="sel sel_g">но и воплощаем</span> их в жизнь. Для этого у нас есть все необходимое. В нашем распоряжении современное оборудование, позволяющее осуществлять производство рекламной продукции самых разнообразных категорий.</p>
                        </div><!--.main_acc__left-->

                        <div class="main_acc__right">
                            <p>Бумага, стекло, металл, дерево, ткань и пластик. В сочетании с нашими идеями всё это приобретает очертания и формы, превращаясь в <span class="sel sel_g">эффективный рекламный продукт</span> для успешного продвижения вашего бизнеса.</p>
                        </div><!--.main_acc__right-->
                    </div><!--.main_acc__txt-->

                    <div class="top_box"></div>
                    <div class="howmatch" data-toggle="modal" data-target="#howmatch_modal">Что<br> почём</div>

                </div><!--.main_acc__body-->
            </div><!--.main_acc__in-->
            @if($isMobile)
                <div class="mobile_coub_block">
                    <div class="mob_info__title">
                        <h1>Production</h1>
                        <p>prints, merch &amp;posm</p>
                    </div><!--.mob_info__title-->

                    <div class="mob_info__txt">
                        <p><span class="sel sel_g">Мы не только придумываем</span> крутые идеи, <span class="sel sel_g">но и воплощаем</span> их в жизнь. Для этого у нас есть все необходимое. В нашем распоряжении современное оборудование, позволяющее осуществлять производство рекламной продукции самых разнообразных категорий.</p>

                        <p>Бумага, стекло, металл, дерево, ткань и пластик. В сочетании с нашими идеями всё это приобретает очертания и формы, превращаясь в <span class="sel sel_g">эффективный рекламный продукт</span> для успешного продвижения вашего бизнеса.</p>

                        <p><a href="/portfolio" class="btn btn-red">Наши работы</a></p>
                    </div><!--.mob_info__txt-->
                </div>
            @endif
        </div><!--.main_acc__box3-->



    </div><!--.main_acc-->
@endsection