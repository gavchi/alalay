@if('index' === $link)
    <div class="sidebar__circle"></div>
@else
    <div class="nav__info">
        <ul class="list-unstyle">
            <li class="ico1"><a href="/" data-title="Алалай!">на главную</a></li>
            @if(substr_count($link, 'project'))
            <li class="ico2"><a href="/portfolio">назад</a></li>
            @endif
            @if($submenu = config('submenu.'.$link))
            @foreach($submenu as $page)
            <li class="{{$page['class']}} @if($page['link'] === $link) active @endif"><a href="/{{$page['link']}}">{{$page['text']}}</a></li>
            @endforeach()
            @endif
        </ul>
    </div>
@endif