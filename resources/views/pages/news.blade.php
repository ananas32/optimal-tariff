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
                            @if(!empty($listNews))
                                @foreach($listNews as $item)
                                    <div class="col-xs-12 col-xsm-6 col-sm-5">
                                        <img class="img-responsive img-rounded" src="{{ $item->image }}" alt="{{ $item->image }}">
                                    </div>
                                    <div class="col-xs-12 col-xsm-6 col-sm-7">
                                        <p class="text-uppercase"><strong>{{ $item->title }}</strong></p>
                                        <div>
                                            <time datetime="{{ $item->created_at->format('Y-m-d H:i') }}">{{ $item->created_at->format('Y-m-d H:i') }}</time>
                                            Переглядів: 12
                                        </div>
                                        {!! $item->full !!}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-center">
{{--                    {!! $guestBookList->links() !!}--}}
                </div>
            </div>
        </section>

    </main>
@stop