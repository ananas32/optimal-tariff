@extends('layouts.app')

@section('meta_title', $page->meta_title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)

@section('body')

<main>

<section>
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="content-block">
<h3><span>{{ trans('pages.tariff_plans') }}</span></h3>
<div class="info">{{ trans('pages.all_tariff_plan') }}</div>
<div>
    <style>
        .color{
            background: #6a6a6a;
            color: #ffffff;
        }
        .op1 {
            background: {{ $op2->operator_color }};
        }
        .op2 {
            background: {{ $op1->operator_color }};
        }
    </style>
    <table class="table">
        <tr>
            <td class="color">Тариф/Оператор</td>
            <td class="op1">{{ $op2->tariffNames->tariff_name }}/{{ $op2->operator_name }}</td>
            <td class="op2">{{ $op1->tariffNames->tariff_name }}/{{ $op1->operator_name }}</td>
        </tr>
        <tr>
            <td class="color">{{ __('Минут в сети') }}</td>
            <td>{{ ($op2->networkCalls->unlimited) ? '&infin;' : $op2->networkCalls->tariff_minute }}</td>
            <td>{{ ($op1->networkCalls->unlimited) ? '&infin;' : $op1->networkCalls->tariff_minute }}</td>
        </tr>
        <tr>
            <td class="color">{{ __('Другие сети') }}</td>
            <td>{{ ($op2->otherCalls->unlimited) ? '&infin;' : $op2->otherCalls->tariff_minute }}</td>
            <td>{{ ($op1->otherCalls->unlimited) ? '&infin;' : $op1->otherCalls->tariff_minute }}</td>
        </tr>
        <tr>
            <td class="color">{{ __('Cмс сообщений') }}</td>
            <td>{{ ($op2->messages->unlimited) ? '&infin;' : $op2->messages->tariff_message }}</td>
            <td>{{ ($op1->messages->unlimited) ? '&infin;' : $op1->messages->tariff_message }}</td>
        </tr>
        <tr>
            <td class="color">{{ __('Мегабайт') }}</td>
            <td>{{ ($op2->internetPackages->unlimited) ? '&infin;' : $op2->internetPackages->tariff_package }}</td>
            <td>{{ ($op1->internetPackages->unlimited) ? '&infin;' : $op1->internetPackages->tariff_package }}</td>
        </tr>
        <tr>
            <td class="color">{{ __('mesyats') }}</td>
            <td>{{ $op2->regularPayments->name_payment }}: {{ $op2->price }} UAH</td>
            <td>{{ $op1->regularPayments->name_payment }}: {{ $op1->price }} UAH</td>
        </tr>
        <tr>
            <td class="color">{{ __('postachalnik') }}</td>
            <td><a href="{{ $op2->link }}" target="_blank">{{ __('Сайт поставщика') }}</a></td>
            <td><a href="{{ $op1->link }}" target="_blank">{{ __('Сайт поставщика') }}</a></td>
        </tr>
    </table>

</div>
</div>

</div>
</div>
</div>
</section>

</main>

@stop