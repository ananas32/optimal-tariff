@if(count($tariffs))
    @foreach($tariffs as $tariff)
        <div class="col-xs-12 col-xsm-6 col-sm-3">
            <div class="result">
                <div class="content">
                    <div class="recommendation">
                        <span class="label {{ $tariff['class'] }}">{{ $tariff['recommendation'] }}</span>
                    </div>
                    <div class="{{ $tariff['operator1']->operators->operator_name }}">{{ $tariff['operator1']->tariffNames->tariff_name }}</div> &
                    <div class="{{ $tariff['operator2']->operators->operator_name }}">{{ $tariff['operator2']->tariffNames->tariff_name }}</div>
                    <div class="price">Ціна в місяць: {{ $tariff['price'] }}</div>
                    <a href="#">Детальна інформація</a>
                </div>
            </div>
        </div>
    @endforeach
@endif
