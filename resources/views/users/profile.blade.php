@extends('layouts.app')

@section('content')
    <h1>Profile編集ページ</h1>
    <?php $user = Auth::user(); ?>
    {!! Form::model($user, ['route' => ['users.update'], 'method' => 'put']) !!}
        <p>Profile</p>
        {!! Form::textarea('profile', null, ['class' => 'form-control', 'placeholder' => 'profile', 'rows' => '5']) !!}
    <br>
       <p>Birthday</p>
        {!! Form::date('birthday', null,['class' => 'form-control', 'placeholder' => 'birthday']) !!}
    <br>
        <p>リンク先</p>
        {!! Form::text('web_link',null,['class' => 'form-control', 'placeholder' => 'web_link']) !!}
    <br>           
        {!! Form::submit('update', ['class' => 'btn btn-success btn-md']) !!}
    {!! Form::close() !!}
@endsection