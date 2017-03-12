@if(Auth::check())
<div class="container" style="background: #2D322F">
    <div class="col-sm-6"><a href="/admin" class="btn btn-warning">admin</a></div>
    <div class="col-sm-6" style="text-align: right">
        <a href="{{ route('logout') }}" class="btn btn-warning"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            logout
        </a>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
@endif
<section class="logo-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="logo">
                    <a href="/"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                    <a href="/" class="title">
                        <h1>Optimal-tariff</h1>
                        <h2>{{ trans('header.system_search') }}</h2>
                    </a>
                    <div class="menu-bars">
                        <a href="#" onclick="showHide('main-nav', 'menu-bars')">
                            <i class="fa fa-bars" id="menu-bars" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="hidden-xs hidden-xsm hidden-sm col-md-6">
                <div class="cite">
                    <blockquote>
                        @if(!empty($headerText))
                            @foreach($headerText as $item)
                                <p>{!! $item->h_random_text !!}</p>
                                <cite>{{ $item->h_initials }}</cite>
                            @endforeach
                        @endif
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <!--<div class="container">-->
    <!--<div class="row">-->
    <!--<div class="col-xs-12">-->
    <nav class="main-nav" id="main-nav">
        <ul>
            <li><a href="/">{{ trans('menu.news') }}</a></li>
            <li><a href="/select-tariff">{{ trans('menu.search') }}</a></li>
            <li><a href="/tariffs">{{ trans('menu.tariff') }}</a></li>
            <li><a href="#">Тарифні пакети</a></li>
            <li><a href="/guest-book">{{ __('menu.guestbook') }}</a></li>
            <li class="set-region"><a href="#">{{ trans('menu.choose_region') }} <i class="fa fa-caret-down" aria-hidden="true"></i></a>
            </li>
            <li class="region" id="region">
                <ul>
                    @if(!empty($regions))
                        @foreach($regions as $region)
                            @if(Session::get('region') == $region->name_region_en)
                                <li><a href="#" class="active">{{ $region->$locale_region }}</a></li>
                            @else
                                <li><a href="/region/{{ $region->name_region_en }}">{{ $region->$locale_region }}</a></li>
                            @endif
                        @endforeach
                    @endif
                    {{--<li><a href="#">Вінницька</a></li>--}}
                    {{--<li><a href="#">Волинська</a></li>--}}
                    {{--<li><a href="#">Дніпропетровська</a></li>--}}
                    {{--<li><a href="#">Донецька</a></li>--}}
                    {{--<li><a href="#">Житомирська</a></li>--}}
                    {{--<li><a href="#">Закарпатська</a></li>--}}
                    {{--<li><a href="#">Запорізька</a></li>--}}
                    {{--<li><a href="#">Івано-Франківська</a></li>--}}
                    {{--<li><a href="#" class="active">Київська</a></li>--}}
                    {{--<li><a href="#">Кіровоградська</a></li>--}}
                    {{--<li><a href="#">Луганська</a></li>--}}
                    {{--<li><a href="#">Львівська</a></li>--}}
                    {{--<li><a href="#">Миколаївська</a></li>--}}
                    {{--<li><a href="#">Одеська</a></li>--}}
                    {{--<li><a href="#">Полтавська</a></li>--}}
                    {{--<li><a href="#">Рівненська</a></li>--}}
                    {{--<li><a href="#">Сумська</a></li>--}}
                    {{--<li><a href="#">Тернопільська</a></li>--}}
                    {{--<li><a href="#">Харківська</a></li>--}}
                    {{--<li><a href="#">Херсонська</a></li>--}}
                    {{--<li><a href="#">Хмельницька</a></li>--}}
                    {{--<li><a href="#">Черкаська</a></li>--}}
                    {{--<li><a href="#">Чернівецька</a></li>--}}
                    {{--<li><a href="#">Чернігівська</a></li>--}}
                </ul>
            </li>
            <li class="languages">
                <a href="#" class="set-language"><img src="assets/img/icons/{{ Session::get('locale') }}.png" alt=""></a>
                <div class="languages-hidden">
                    @if(isset($codeLanguage))
                        @foreach($codeLanguage as $item)
                            @if($item != Session::get('locale'))
                                <a href="/locale/{!! $item !!}"><img src="assets/img/icons/{!! $item !!}.png" alt=""></a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </li>
        </ul>
    </nav>

    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
</section>