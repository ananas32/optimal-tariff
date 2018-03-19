@extends('layouts.app')
@section('body')

<main>
    <section class="slider">
        <div class="container">
            <div class="row">
                <div class="hidden-xs hidden-xsm col-sm-5 col-md-3">
                    @if(!empty($siteNews))
                        <a href="/news/{{ $siteNews->slug }}" class="slider-item">
                            <div class="last-news">
                                <img src="{{ $siteNews->image }}" alt="{!! $siteNews->title_news !!}">
                                <div class="content">
                                    <div class="title"><p>{!! $siteNews->title_news !!}</p></div>
                                    <div class="text">
                                        <p>
                                        {!! $siteNews->short_news !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-xs-12 col-xsm-12 col-sm-7 col-md-6">
                    <div class="slider-item">
                        <div id="slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @if(!empty($sliderImageList))
                                    @foreach($sliderImageList as $item)
                                        <div class="item{{ ($loop->first) ? ' active' : "" }}">
                                            <img src="{!! $item->image !!}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                                <i class="fa fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hidden-xs hidden-xsm hidden-sm col-md-3">
                    @if(!empty($operatorNews))
                        <a href="/news/{{ $operatorNews->slug }}" class="slider-item">
                            <div class="last-news">
                                <img src="{{ $operatorNews->image }}" alt="{!! $operatorNews->title !!}">
                                <div class="content">
                                    <div class="title">{!! $operatorNews->title_news !!}</div>
                                    <div class="text">
                                        {!! $operatorNews->short_news !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="info-block">
                        <div class="row">
                            <div class="hidden-xs hidden-xsm hidden-sm hidden-md col-lg-3">
                                <div class="info-item">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    {{ trans('pages.we_have_all_tariffs') }}
                                    <div class="count">{{ trans('pages.mobile_operators') }}</div>
                                </div>
                            </div>
                            <div class="hidden-xs hidden-xsm col-sm-3 col-lg-2">
                                <div class="info-item">
                                    <i class="fa fa-fire" aria-hidden="true"></i>
                                    {{ trans('pages.search_favorable_tariffs') }}
                                    <div class="count">{{ trans('pages.only_here') }}</div>
                                </div>
                            </div>
                            <div class="hidden-xs col-xsm-4 col-sm-3 col-lg-2">
                                <div class="info-item">
                                    <i class="fa fa-area-chart" aria-hidden="true"></i>
                                    {{ trans('pages.count_search_tariffs') }}
                                    <div class="count">228 {{ trans('pages.users') }}</div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-xsm-4 col-sm-3 col-lg-2">
                                <div class="info-item">
                                    <i class="fa fa-h-square" aria-hidden="true"></i>
                                    {{ trans('pages.total') }} {{ trans('pages.tariffs') }}
                                    <div class="count">20 {{ trans('pages.tariffs') }}</div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-xsm-4 col-sm-3 col-lg-3">
                                <div class="info-item">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                    {{ trans('pages.total') }} {{ trans('pages.comment') }}
                                    <div class="count">{{ $countMessage }} {{ trans('pages.comment') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                @if(!empty($blockContent))
                    @foreach($blockContent as $block)
                        @if($loop->first)
                            <div class="col-xs-12 col-xsm-6 hidden-sm col-md-3">
                                <div class="info-text-block">
                                    <h3><span>{!! $block->b_title !!}</span></h3>
                                    <div class="text">
                                        {!! $block->b_content !!}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($loop->remaining == 1)
                            <div class="col-xs-12 col-xsm-6 col-sm-5 col-md-push-6 col-md-3">
                                <div class="info-text-block">
                                    <h3><span>{!! $block->b_title !!}</span></h3>
                                    <div class="text">
                                        {!! $block->b_content !!}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($loop->last)
                            <div class="col-xs-12 col-sm-7 col-md-pull-3 col-md-6">
                                <div class="text-block">
                                    <h3><span>{!! $block->b_title !!}</span></h3>
                                    {!! $block->b_content !!}
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>

</main>
@stop