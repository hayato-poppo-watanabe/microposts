@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
        <aside class="col-xs-4">
            @include('users.showprofile')
        </aside>
            <div class="col-xs-8">
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Micropostsへようこそ</h1>
                <h2>楽しく自由に使えるTwitterもどき</h2>
                <div class="botton-zone">
                {!! link_to_route('signup.get', '新規登録', null, ['class' => 'btn btn-lg btn-success']) !!}
                 {!! link_to_route('login', 'ログイン', null, ['class' => 'btn btn-lg btn-success']) !!}
                </div>
            </div>
        </div>
    @endif
@endsection