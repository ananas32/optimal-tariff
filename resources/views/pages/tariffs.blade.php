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
<div class="col-xs-6 col-xsm-offset-6 col-xsm-6 col-sm-offset-8 col-sm-4 col-md-offset-9 col-md-3">
    <form class="form-inline">
        <button type="button" class="btn btn-primary btn-sm">{{ __('Сравнить') }}</button>
        <div class="form-group">
            <select name="operator" id="show-operator-tariffs" class="form-control input-sm" style="width: 100%">
                <option value="">Все</option>
                @if(!empty($operators))
                    @foreach($operators as $item)
                        <option value="{{ $item->operator_name }}"
                                @if(isset($operator) && $operator == $item->operator_name) selected @endif>
                            {{ $item->operator_name }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
    </form>
</div>

@if(count($tariffs))
    @foreach($tariffs as $tariff)
        <div class="col-xs-12 col-xsm-6 col-sm-4 col-md-3">
            <div class="tariff">
                <div class="content">
                    <input type="checkbox" class="compare" name="{{ $tariff->id }}">
                    <div class="recommendation">
                        <span class="label {{ $tariff->operator_name }}">{{ ucfirst($tariff->operator_name) }}</span>
                    </div>
                    <dl>
                        <dt>{{ __('Название тарифа') }}:</dt>
                        <dd>{{ $tariff->tariffNames->tariff_name }}</dd>
                        <dt>{{ __('Минут в сети') }}:</dt>
                        <dd>{{ ($tariff->networkCalls->unlimited) ? '&infin;' : $tariff->networkCalls->tariff_minute }}</dd>
                        <dt>{{ __('Другие сети') }}:</dt>
                        <dd>{{ ($tariff->otherCalls->unlimited) ? '&infin;' : $tariff->otherCalls->tariff_minute }}</dd>
                        <dt>{{ __('Cмс сообщений') }}:</dt>
                        <dd>{{ ($tariff->messages->unlimited) ? '&infin;' : $tariff->messages->tariff_message }}</dd>
                        <dt>{{ __('Мегабайт') }}:</dt>
                        <dd>{{ ($tariff->internetPackages->unlimited) ? '&infin;' : $tariff->internetPackages->tariff_package }}</dd>
                        <dt>{{ $tariff->regularPayments->name_payment }}:</dt>
                        <dd>{{ $tariff->price }} UAH</dd>
                    </dl>
                    <a href="{{ $tariff->link }}" target="_blank">{{ __('Сайт поставщика') }}</a>
                </div>
            </div>
        </div>
    @endforeach
@endif
</div>
</div>

</div>
</div>
</div>
</div>
</section>

</main>

@stop