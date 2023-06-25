@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>新規投稿</h2>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::textarea('newPost', '', [
                'class' => 'tweetbox',
                'placeholder' => '投稿内容(150文字以内)',
            ]) !!}
            @if ($errors->has('newPost'))
                <p class="error caution">{{ $errors->first('newPost') }}</p>
            @endif

            {!! Form::hidden('newName', Auth::user()->name) !!}
        </div>
        <button class="post-button" type="submit">ツイート</button>
        {!! Form::close() !!}
    </div>
@endsection
