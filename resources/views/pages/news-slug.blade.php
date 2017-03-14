@extends('layouts.app')

@section('body')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-block">
                            @if(!empty($fullNews[0]))
                                <h3><span>News - {{ $fullNews[0]->title }}</span></h3>
                                <div class="row text-justify"  style="padding: 10px">
                                        <div class="row">
                                            <div class="text-uppercase">
                                                <strong class="left-line">{{ $fullNews[0]->title }}</strong>
                                            </div>
                                            <p>
                                                <time datetime="{{ $fullNews[0]->created_at->format('Y-m-d H:i') }}" style="margin-right: 10px">
                                                    {{ $fullNews[0]->created_at->format('Y-m-d H:i') }}
                                                </time>
                                                Переглядів: <b>{{ $fullNews[0]->number_of_views }}</b>
                                                <span style="float: right"><a href="{{ url()->previous() }}" class="link-news">назад</a></span>
                                            </p>
                                            <hr style="border: 1px solid #DFDFDF; margin: 0; padding: 0">
                                            <div>
                                                <p style="max-width: 600px">
                                                    <img class="img-responsive img-thumbnail minimized" style="float: left; margin: 0 10px 7px 0;" src="{{ asset($fullNews[0]->image) }}" alt="{{ asset($fullNews[0]->image) }}">
                                                </p>
                                                <p class="">{!! $fullNews[0]->full !!}</p>
                                            </div>
                                        </div>
                                    comments
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@stop