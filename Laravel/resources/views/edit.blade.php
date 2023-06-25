@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <h2>プロフィール編集</h2>
            {!! Form::open(['url' => 'profile/edit']) !!}
            <div class="form-group">
                <p class="form-name">ユーザー名</p>
                {!! Form::input('text', 'upName', $profile->name, [
                    'class' => 's-text',
                    'placeholder' => 'ユーザー名の編集',
                ]) !!}
                <p class="form-name">プロフィール文</p>
                {!! Form::textarea('upProfile', $profile->profile, [
                    'class' => 'tweetbox',
                    'placeholder' => 'プロフィール文の編集',
                ]) !!}
                {!! Form::hidden('id', Auth::user()->id) !!}
            </div>
            <button class="btn-submit" type="submit">確定</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
