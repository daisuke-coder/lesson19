@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="page-name">投稿編集</h2>
        {!! Form::open(['url' => '/post/update']) !!}
        <div class="form-group">
            {!! Form::textarea('upPost', $post->post, ['class' => 'tweetbox', 'placeholder' => '投稿内容(150文字以内)']) !!}
            @if ($errors->has('upPost'))
                <p class="error">{{ $errors->first('upPost') }}</p>
            @endif
            {!! Form::hidden('id', $post->id) !!}
        </div>
        <button class="post-button" type="submit">更新</button>
        {!! Form::close() !!}
    </div>
@endsection
