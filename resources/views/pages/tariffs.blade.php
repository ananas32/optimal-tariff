@extends('layouts.app')
@section('body')

<main>

<section>
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="content-block">
<h3><span>{{ trans('pages.tariff_plans') }}</span></h3>
<div class="info">{{ trans('pages.all_tariff_plan') }}</div>
<div class="row">
<div class="col-xs-12 col-xsm-offset-6 col-xsm-6 col-sm-offset-8 col-sm-4 col-md-offset-9 col-md-3">
    <form>
        <div class="form-group">
            <select name="operator" id="show-operator-tariffs" class="form-control input-sm">
                <option value="">Все</option>
                @if(!empty($operators))
                    @foreach($operators as $item)
                        <option value="{{ $item->operator_name }}">{{ $item->operator_name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </form>
</div>

<div class="col-xs-12 col-xsm-6 col-sm-4 col-md-3">
    <div class="tariff">
        <div class="content">
            <div class="recommendation">
                <span class="label kyivstar">Kyivstar</span>
            </div>
            <dl>
                <dt>Назва тарифу:</dt>
                <dd>Київстар розмови</dd>
                <dt>Хвилин в мережі:</dt>
                <dd>&infin;</dd>
                <dt>Інші мережі:</dt>
                <dd>30</dd>
                <dt>Смс повідомлень:</dt>
                <dd>0</dd>
                <dt>Мегабайт:</dt>
                <dd>0</dd>
                <dt>Місячний платіж:</dt>
                <dd>35 UAH</dd>
            </dl>
            <a href="#">Сайт постачальника</a>
        </div>
    </div>
</div>
<div class="col-xs-12 col-xsm-6 col-sm-4 col-md-3">
    <div class="tariff">
        <div class="content">
            <div class="recommendation">
                <span class="label mts">MTS</span>
            </div>
            <dl>
                <dt>Назва тарифу:</dt>
                <dd>Просто супер перший</dd>
                <dt>Хвилин в мережі:</dt>
                <dd>3000</dd>
                <dt>Інші мережі:</dt>
                <dd>0</dd>
                <dt>Смс повідомлень:</dt>
                <dd>0</dd>
                <dt>Мегабайт:</dt>
                <dd>0</dd>
                <dt>Місячний платіж:</dt>
                <dd>1 UAH</dd>
            </dl>
            <a href="#">Сайт постачальника</a>
        </div>
    </div>
</div>
<div class="col-xs-12 col-xsm-6 col-sm-4 col-md-3">
    <div class="tariff">
        <div class="content">
            <div class="recommendation">
                <span class="label lifecell">Lifecell</span>
            </div>
            <dl>
                <dt>Назва тарифу:</dt>
                <dd>Просто супер перший</dd>
                <dt>Хвилин в мережі:</dt>
                <dd>3000</dd>
                <dt>Інші мережі:</dt>
                <dd>0</dd>
                <dt>Смс повідомлень:</dt>
                <dd>0</dd>
                <dt>Мегабайт:</dt>
                <dd>0</dd>
                <dt>Місячний платіж:</dt>
                <dd>1 UAH</dd>
            </dl>
            <a href="#">Сайт постачальника</a>
        </div>
    </div>
</div>
<div class="col-xs-12 col-xsm-6 col-sm-4 col-md-3">
    <div class="tariff">
        <div class="content">
            <div class="recommendation">
                <span class="label mts">MTS</span>
            </div>
            <dl>
                <dt>Назва тарифу:</dt>
                <dd>Просто супер перший</dd>
                <dt>Хвилин в мережі:</dt>
                <dd>3000</dd>
                <dt>Інші мережі:</dt>
                <dd>0</dd>
                <dt>Смс повідомлень:</dt>
                <dd>0</dd>
                <dt>Мегабайт:</dt>
                <dd>0</dd>
                <dt>Місячний платіж:</dt>
                <dd>1 UAH</dd>
            </dl>
            <a href="#">Сайт постачальника</a>
        </div>
    </div>
</div>
<div class="col-xs-12 col-xsm-6 col-sm-4 col-md-3">
    <div class="tariff">
        <div class="content">
            <div class="recommendation">
                <span class="label kyivstar">Kyivstar</span>
            </div>
            <dl>
                <dt>Назва тарифу:</dt>
                <dd>Київстар розмови</dd>
                <dt>Хвилин в мережі:</dt>
                <dd>&infin;</dd>
                <dt>Інші мережі:</dt>
                <dd>30</dd>
                <dt>Смс повідомлень:</dt>
                <dd>0</dd>
                <dt>Мегабайт:</dt>
                <dd>0</dd>
                <dt>Місячний платіж:</dt>
                <dd>35 UAH</dd>
            </dl>
            <a href="#">Сайт постачальника</a>
        </div>
    </div>
</div>
<div class="col-xs-12 col-xsm-6 col-sm-4 col-md-3">
    <div class="tariff">
        <div class="content">
            <div class="recommendation">
                <span class="label mts">MTS</span>
            </div>
            <dl>
                <dt>Назва тарифу:</dt>
                <dd>Просто супер перший</dd>
                <dt>Хвилин в мережі:</dt>
                <dd>3000</dd>
                <dt>Інші мережі:</dt>
                <dd>0</dd>
                <dt>Смс повідомлень:</dt>
                <dd>0</dd>
                <dt>Мегабайт:</dt>
                <dd>0</dd>
                <dt>Місячний платіж:</dt>
                <dd>1 UAH</dd>
            </dl>
            <a href="#">Сайт постачальника</a>
        </div>
    </div>
</div>
<div class="col-xs-12 col-xsm-6 col-sm-4 col-md-3">
    <div class="tariff">
        <div class="content">
            <div class="recommendation">
                <span class="label lifecell">Lifecell</span>
            </div>
            <dl>
                <dt>Назва тарифу:</dt>
                <dd>Просто супер перший</dd>
                <dt>Хвилин в мережі:</dt>
                <dd>3000</dd>
                <dt>Інші мережі:</dt>
                <dd>0</dd>
                <dt>Смс повідомлень:</dt>
                <dd>0</dd>
                <dt>Мегабайт:</dt>
                <dd>0</dd>
                <dt>Місячний платіж:</dt>
                <dd>1 UAH</dd>
            </dl>
            <a href="#">Сайт постачальника</a>
        </div>
    </div>
</div>
<div class="col-xs-12 col-xsm-6 col-sm-4 col-md-3">
    <div class="tariff">
        <div class="content">
            <div class="recommendation">
                <span class="label mts">MTS</span>
            </div>
            <dl>
                <dt>Назва тарифу:</dt>
                <dd>Просто супер перший</dd>
                <dt>Хвилин в мережі:</dt>
                <dd>3000</dd>
                <dt>Інші мережі:</dt>
                <dd>0</dd>
                <dt>Смс повідомлень:</dt>
                <dd>0</dd>
                <dt>Мегабайт:</dt>
                <dd>0</dd>
                <dt>Місячний платіж:</dt>
                <dd>1 UAH</dd>
            </dl>
            <a href="#">Сайт постачальника</a>
        </div>
    </div>
</div>
</div>

</div>
</div>
</div>
</div>
</section>

</main>

@stop