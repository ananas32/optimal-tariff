@if(count($tariffs))
    @foreach($tariffs as $tariff)
        <div class="col-xs-12 col-xsm-6 col-sm-3">
            <div class="result">
                <div class="content">
                    <div class="recommendation">
                        <span class="label {{ $tariff->class }}">{{ $tariff->recommendation }}</span>
                    </div>
                    <div class="{{ $tariff->operators->operator_name }}">{{ $tariff->tariffNames->tariff_name }}</div>
                    <div class="price">Цена в месяц: {{ $tariff->interimAmount }}</div>
                    <a href="{{ $tariff->link }}" target="_blank">Подробная информация</a>
                </div>
            </div>
        </div>
    @endforeach
@endif
