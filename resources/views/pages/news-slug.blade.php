@extends('layouts.app')

@section('meta_title', $fullNews->title)
@section('meta_description', $fullNews->news)

@section('body')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-block">
                            @if(!empty($fullNews))
                                <h3><span>News - {{ $fullNews->title }}</span></h3>
                                <div class="row text-justify"  style="padding: 10px">
                                        <div class="row">
                                            <div class="text-uppercase">
                                                <strong class="left-line">{{ $fullNews->title }}</strong>
                                            </div>
                                            <p>
                                                <time datetime="{{ $fullNews->created_at->format('Y-m-d H:i') }}" style="margin-right: 10px">
                                                    {{ $fullNews->created_at->format('Y-m-d H:i') }}
                                                </time>
                                                Переглядів: <b>{{ $fullNews->number_of_views }}</b>
                                                <span style="float: right"><a href="{{ url()->previous() }}" class="link-news">назад</a></span>
                                            </p>
                                            <hr style="border: 1px solid #DFDFDF; margin: 0; padding: 0">
                                            <div>
                                                <p style="max-width: 600px">
                                                    <img class="img-responsive img-thumbnail minimized" style="float: left; margin: 0 10px 7px 0;" src="{{ asset($fullNews->image) }}" alt="{{ asset($fullNews->image) }}">
                                                </p>
                                                <p class="">{!! $fullNews->full !!}</p>
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