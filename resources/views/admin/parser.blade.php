@if(count($listLinks))
    <h4>Список тарифов котрых не найдено в базе данных:</h4>
    @foreach($listLinks as $link)
        {{ $loop->iteration }}. <a href="{{ $link }}" target="_blank">{{ $link }}</a><br>
    @endforeach
@else
    <h4>Новых тарифов не обнаружено!</h4>
@endif
@if(isset($tarifLink))
    <h4>Произошла ошыбка! Все тарифы нахотятся здесь:</h4>
    <a href="{{ $tarifLink }}" target="_blank">{{ $tarifLink }}</a>
@endif
<br>
<br>

@if(count($tariffs))
    <h4>Список тарифов котрые есть в базе:</h4>
    @foreach($tariffs as $tariff)
        {{ $loop->iteration }}. {{ $tariff->tariffNames->tariff_name }} <a href="{{ $tariff->link }}" target="_blank">{{ $tariff->link }}</a><br>
    @endforeach
@else
    <h4>У нас нет тарифов этого оператора</h4>
@endif