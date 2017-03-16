@extends('layouts.app')
@section('body')
<main>

<section>
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="content-block">
<h3><span>{{ trans('pages.search_tariff_plan') }}</span></h3>
<div class="info">{{ trans('pages.error_site') }}"<a href="/gbook">{{ trans('menu.guestbook') }}</a>".
    {{ trans('pages.line') }}
</div>

{{--<div class="row">--}}
    {{--<div class="col-xs-12 col-xsm-6 col-sm-3">--}}
        {{--<div class="result">--}}
            {{--<div class="content">--}}
                {{--<div class="recommendation">--}}
                    {{--<span class="label label-success">Найкращий тариф</span>--}}
                {{--</div>--}}
                {{--<div class="kyivstar">Kyivstar: Смартфон 3G Український</div>--}}
                {{--<div class="mts">MTS: Київстар онлайн екстра</div>--}}
                {{--<div class="price">Ціна в місяць: 114</div>--}}
                {{--<a href="#">Детальна інформація</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-xs-12 col-xsm-6 col-sm-3">--}}
        {{--<div class="result">--}}
            {{--<div class="content">--}}
                {{--<div class="recommendation">--}}
                    {{--<span class="label label-info">Нічо так тариф</span>--}}
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
{{--</div>--}}

{{-- результат обработки AJAX--}}
<div id="resultPostTariffForm"></div>
{{-- !результат обработки AJAX--}}
{!! Form::open(array('id' => 'formSearchTariffSelectOption')) !!}
{{ csrf_field() }}
<div class="row">
<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="col-xs-12 col-xsm-4 col-sm-3" style="text-align: center">
            <div class="title">Оператор 1</div>
        </div>
        <div class="col-xs-12 col-xsm-8 col-sm-3">
            <div class="form-group" id="list_operator_div">
                <!--<label for="exampleInputName2" class="visible">Виберіть оператора 1</label>-->
                <select name="list_operator" id="list_operator" class="form-control input-sm">
                    <option value=""></option>
                    @if(!empty($operatorList))
                        @foreach($operatorList as $item)
                            <option value="{{ $item->id }}">{{ $item->operator_name }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3" style="text-align: center">
            <div class="title">Оператор 2</div>
        </div>
        <div class="col-xs-12 col-xsm-8 col-sm-3">
            <div class="form-group" id="list_operator_div_2">
                <!--<label for="exampleInputName1" class="visible">Виберіть оператора 2</label>-->
                <select id="list_operator_2" name="list_operator_2" class="form-control input-sm" disabled="disabled">
                    <option value=""></option>
                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row" style="text-align: center">
        <div class="hidden-xs col-xsm-4 col-sm-offset-3 col-sm-3">
            <span class="b">Середня кількість дзвінків на день</span>
        </div>
        <div class="hidden-xs col-xsm-4 col-sm-3">
            <span class="b">Середня довжина дзвінків</span>
        </div>
        <div class="hidden-xs col-xsm-4 col-sm-3">
            <span class="b">Частота використань в місяць</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="col-xs-12 col-xsm-12 col-sm-3" style="text-align: center">
            <hr>
            <div class="title kyivstar">kurwaSTAR</div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group" id="select_1_1">
                <label for="exampleInputName3">Кількість дзвінків на день (в сер.)</label>
                <select id="exampleInputName3" name="select_1_1" class="form-control input-sm">
                    <option value=""></option>
                    <option value="1">test</option>
                    @if(isset($CountCall))
                        @foreach($CountCall as $count_call)
                            <option>{{ $count_call->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group" id="select_1_2">
                <label for="exampleInputName4">Довжина дзвінків (в сер.)</label>
                <select id="exampleInputName4" name="select_1_2" class="form-control input-sm">
                    <option value=""></option>
                    <option value="1">test 1_2</option>
                    @if(isset($LengthCall))
                        @foreach($LengthCall as $length_call)
                            <option>{{ $length_call->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group" id="select_1_3">
                <label for="exampleInputName5">Часто використання в місяць (в сер.)</label>
                <select id="exampleInputName5" name="select_1_3" class="form-control input-sm">
                    <option value=""></option>
                    @if(isset($FreUse))
                        @foreach($FreUse as $fre_use)
                            <option>{{ $fre_use->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="col-xs-12 col-xsm-12 col-sm-3" style="text-align: center">
            <div class="title lifecell">Lifecell</div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group" id="select_2_1">
                <label for="exampleInputName3">Кількість дзвінків на день (в сер.)</label>
                <select id="exampleInputName6" name="select_2_1" class="form-control input-sm">
                    <option value=""></option>
                    <option value="select_2_1">select_2_1</option>
                    @if(isset($CountCall))
                        @foreach($CountCall as $count_call)
                            <option>{{ $count_call->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group" id="select_2_2">
                <label for="exampleInputName4">Довжина дзвінків (в сер.)</label>
                <select id="exampleInputName7" name="select_2_2" class="form-control input-sm">
                    @if(isset($LengthCall))
                        @foreach($LengthCall as $length_call)
                            <option>{{ $length_call->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group" id="select_2_3">
                <label for="exampleInputName5">Часто використання в місяць (в сер.)</label>
                <select id="exampleInputName8" name="select_2_3" class="form-control input-sm">
                    @if(isset($FreUse))
                        @foreach($FreUse as $fre_use)
                            <option>{{ $fre_use->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="col-xs-12 col-xsm-12 col-sm-3" style="text-align: center">
            <div class="title mts">MTS</div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group">
                <label for="exampleInputName3">Кількість дзвінків на день (в сер.)</label>
                <select id="exampleInputName9" class="form-control input-sm">
                    @if(isset($CountCall))
                        @foreach($CountCall as $count_call)
                            <option>{{ $count_call->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group">
                <label for="exampleInputName4">Довжина дзвінків (в сер.)</label>
                <select id="exampleInputName10" class="form-control input-sm">
                    @if(isset($LengthCall))
                        @foreach($LengthCall as $length_call)
                            <option>{{ $length_call->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group">
                <label for="exampleInputName5">Часто використання в місяць (в сер.)</label>
                <select id="exampleInputName11" class="form-control input-sm">
                    @if(isset($FreUse))
                        @foreach($FreUse as $fre_use)
                            <option>{{ $fre_use->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="col-xs-12 col-xsm-12 col-sm-3" style="text-align: center">
            <div class="title">Fixit number</div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group">
                <label for="exampleInputName3">Кількість дзвінків на день (в сер.)</label>
                <select id="exampleInputName12" class="form-control input-sm">
                    @if(isset($CountCall))
                        @foreach($CountCall as $count_call)
                            <option>{{ $count_call->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group">
                <label for="exampleInputName4">Довжина дзвінків (в сер.)</label>
                <select id="exampleInputName13" class="form-control input-sm">
                    @if(isset($LengthCall))
                        @foreach($LengthCall as $length_call)
                            <option>{{ $length_call->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group">
                <label for="exampleInputName5">Часто використання в місяць (в сер.)</label>
                <select id="exampleInputName14" class="form-control input-sm">
                    @if(isset($FreUse))
                        @foreach($FreUse as $fre_use)
                            <option>{{ $fre_use->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="hidden-xs col-xsm-8 col-sm-offset-3 col-sm-6" style="text-align: center">
            <span class="b">Пакети (в середньому на день)</span>
        </div>
        <div class="hidden-xs col-xsm-4 col-sm-3" style="text-align: center">
            <span class="b">Частота використань в місяць</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="col-xs-12 col-xsm-12 col-sm-3" style="text-align: center">
            <hr>
            <div class="title">Мегабайт</div>
        </div>
        <div class="col-xs-12 col-xsm-8 col-sm-6">
            <div class="form-group">
                <label for="exampleInputName15">В середньому на день</label>
                <select id="exampleInputName15" class="form-control input-sm">
                    @if(isset($RefPacket))
                        @foreach($RefPacket as $ref_packet)
                            <option>{{ $ref_packet->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group">
                <label for="exampleInputName17">Частота використання в місяць</label>
                <select id="exampleInputName17" class="form-control input-sm">
                    @if(isset($FreUse))
                        @foreach($FreUse as $fre_use)
                            <option>{{ $fre_use->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="col-xs-12 col-xsm-12 col-sm-3" style="text-align: center">
            <div class="title">Смс-повідомлення</div>
        </div>
        <div class="col-xs-12 col-xsm-8 col-sm-6">
            <div class="form-group">
                <label for="exampleInputName18">В середньому на день</label>
                <select id="exampleInputName18" class="form-control input-sm">
                    @if(isset($RefPacket))
                        @foreach($RefPacket as $ref_packet)
                            <option>{{ $ref_packet->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group">
                <label for="exampleInputName17">Частота використання в місяць</label>
                <select id="exampleInputName19" class="form-control input-sm">
                    @if(isset($FreUse))
                        @foreach($FreUse as $fre_use)
                            <option>{{ $fre_use->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="col-xs-12 col-xsm-12 col-sm-3" style="text-align: center">
            <div class="title">MMS-повідомлення</div>
        </div>
        <div class="col-xs-12 col-xsm-8 col-sm-6">
            <div class="form-group">
                <label for="exampleInputName20">В середньому на день</label>
                <select id="exampleInputName20" class="form-control input-sm">
                    @if(isset($RefPacket))
                        @foreach($RefPacket as $ref_packet)
                            <option>{{ $ref_packet->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-3">
            <div class="form-group">
                <label for="exampleInputName17">Частота використання в місяць</label>
                <select id="exampleInputName21" class="form-control input-sm">
                    @if(isset($FreUse))
                        @foreach($FreUse as $fre_use)
                            <option>{{ $fre_use->text_option }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-md-offset-2 col-md-8">
    <div class="row">
        <div class="col-xs-12 col-xsm-8 col-sm-3" style="text-align: center">
            <div class="title">Ваші витрати (в сер.)?</div>
        </div>
        <div class="col-xs-12 col-xsm-4 col-sm-9">
            <div class="form-group" id="costs-div">
                <input type="text" name="costs" class="form-control input-sm" id="exampleInputName22"
                       placeholder="22.50">
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-md-offset-2 col-md-8" style="text-align: right">
    <button type="reset" class="btn btn-default btn-sm">Відміна</button>
    <button type="button" id="sendFormSearchTariffSelectOption" class="btn btn-default btn-sm">Знайти</button>
</div>
</div>
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</section>

</main>
@stop