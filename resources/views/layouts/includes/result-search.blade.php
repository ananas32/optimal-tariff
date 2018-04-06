@if(count($tariffs))
    @foreach($tariffs as $tariff)
        <div class="col-xs-12 col-xsm-6 col-sm-3">
            <div class="result">
                <div class="content">
                    <div class="recommendation">
                        <span class="label {{ $tariff->class }}">{{ $tariff->recommendation }}</span>
                    </div>
                    <div class="{{ $tariff->operators->operator_name }}">{{ $tariff->tariffNames->tariff_name }}</div>
                    {{--<div class="mts">MTS:&nbsp;Просто&nbsp;супер&nbsp;перший</div>--}}
                    <div class="price">Ціна в місяць: {{ $tariff->interimAmount }}</div>
                    <a href="#">Детальна інформація</a>
                </div>
            </div>
        </div>
    @endforeach
@endif

{{--@if(count($tariffInfo))--}}
    {{--@foreach($tariffInfo as $info => $value)--}}
        {{--<div class="col-xs-12 col-xsm-6 col-sm-3">--}}
            {{--<div class="result">--}}
                {{--<div class="content">--}}
                    {{--<div class="recommendation">--}}
                        {{--<span class="label label-success">{{ $value }}</span>--}}
                    {{--</div>--}}
                    {{--<div class="kyivstar">Kyivstar: Смартфон 3G Український</div>--}}
                    {{--<div class="mts">MTS: Київстар онлайн екстра</div>--}}
                    {{--<div class="price">Ціна в місяць: 114</div>--}}
                    {{--<a href="#">Детальна інформація</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--@endif--}}

{{--<div class="col-xs-12 col-xsm-6 col-sm-3">--}}
    {{--<div class="result">--}}
        {{--<div class="content">--}}
            {{--<div class="recommendation">--}}
                {{--<span class="label label-info">Тож нічо такий тариф</span>--}}
            {{--</div>--}}
            {{--<div class="kyivstar">Kyivstar:&nbsp;Київстар&nbsp;Онлайн&nbsp;+</div>--}}
            {{--<div class="mts">MTS:&nbsp;Просто&nbsp;супер&nbsp;перший</div>--}}
            {{--<div class="price">Ціна в місяць: 114</div>--}}
            {{--<a href="#">Детальна інформація</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="col-xs-12 col-xsm-6 col-sm-3">--}}
    {{--<div class="result">--}}
        {{--<div class="content">--}}
            {{--<div class="recommendation">--}}
                {{--<span class="label label-warning">Хєроватінький тариф</span>--}}
            {{--</div>--}}
            {{--<div class="kyivstar">Kyivstar:&nbsp;Київстар&nbsp;Онлайн&nbsp;+</div>--}}
            {{--<div class="mts">MTS:&nbsp;Просто&nbsp;супер&nbsp;перший</div>--}}
            {{--<div class="price">Ціна в місяць: 114</div>--}}
            {{--<a href="#">Детальна інформація</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}