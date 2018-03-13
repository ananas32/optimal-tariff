@extends('layouts.app')

@section('body')
<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="content-block">
                        <h3><span>{{ trans('pages.guestbook') }}</span></h3>
                        <div class="info">{{ trans('pages.your_question_or_comment') }}</div>

                        @if(!empty($guestBookList))
                            @foreach($guestBookList as $item)
                                <div class="comment">
                                    <div class="author">{{ $item->username }}</div>
                                    <time datetime="{{ $item->created_at }}">{{ $item->created_at }}</time>
                                    <div class="text">
                                        {{ $item->message }}
                                    </div>
                                    <div class="answer">
                                        @if(!empty($item->answer))
                                            <div class="author">#{{ trans('answer_representative') }}</div>
                                            <div class="text">
                                                {!! $item->answer !!}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="comment">
                                {{ trans('pages.you_can_leave_your_review_first') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
                                <div id="alert">
                                </div>
                                <div id="resultSendForm"></div>
                                <form class="write-to-us" role="form" method="POST" id="guest-book-form">
                                    {{ csrf_field() }}
                                    <div class="form-group" id="username-div">
                                        <label for="exampleInputName">{{ trans('pages.name') }}</label>
                                        <input id="exampleInputName" type="text" class="form-control" name="username"
                                                autofocus placeholder="{{ trans('pages.input_name') }}">
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="form-group" id="email-div">
                                        <label for="exampleInputEmail">Email</label>
                                        <input id="exampleInputEmail" type="email" class="form-control" name="email"
                                               autofocus placeholder="user@mail.com">
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="form-group" id="message-div">
                                        <label for="exampleInputText">{{ trans('pages.message_text') }}</label>
                                        <textarea id="exampleInputText" class="form-control" name="message" rows="4"
                                                autofocus placeholder="{{ trans('pages.textarea_message') }}"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group" id="g-recaptcha-response-div">
                                        {!! NoCaptcha::display() !!}
                                        <span class="help-block"></span>
                                    </div>
                                    <script src='https://www.google.com/recaptcha/api.js'></script>
                                    <button class="btn btn-warning" type="submit" id="send-form-guest-book">{{ trans('pages.send') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                {!! $guestBookList->links() !!}
            </div>
        </div>
    </section>

</main>
@stop