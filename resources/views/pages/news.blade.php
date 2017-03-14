@extends('layouts.app')

@section('body')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-block">
                            <h3><span>News</span></h3>
                            {{--col-xs-12 col-xsm-6 col-sm-3--}}
                            <div class="row"  style="padding: 5px">
                            @if(!empty($listNews))
                                @foreach($listNews as $item)
                                    <div class="row">
                                        <div class="col-xs-12 col-xsm-5 col-sm-5">
                                            <a href="/news/{{ $item->slug }}">
                                                <img class="img-responsive img-thumbnail" src="{{ $item->image }}" alt="{{ $item->image }}">
                                            </a>
                                        </div>
                                        <div class="col-xs-12 col-xsm-7 col-sm-7 text-justify">
                                            <p class="text-uppercase">
                                                <a href="/news/{{ $item->slug }}" class="link-news">
                                                    <strong class="left-line">{{ $item->title }}</strong>
                                                </a>
                                            </p>
                                            <p>
                                                <time datetime="{{ $item->created_at->format('Y-m-d H:i') }}" style="margin-right: 10px">
                                                    {{ $item->created_at->format('Y-m-d H:i') }}
                                                </time>
                                                Переглядів: <b>{{ $item->number_of_views }}</b>
                                            </p>
                                            {!! substr($item->full,0, strpos($item->full,'</p>')-1 )  !!}
                                            <div class="text-right">
                                                <a href="/news/{{ $item->slug }}" class="btn btn-warning">more</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!$loop->last)
                                        <hr>
                                    @endif
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    {!! $listNews->links() !!}
                </div>
            </div>
        </section>

    </main>
@stop