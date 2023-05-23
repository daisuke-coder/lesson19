@extends('layouts.app')

@section('content')

<div class="container">
  {!! Form::open(['url'=>'/post/update']) !!}
  <div class="form-group">
    <h2 class="page-name">投稿編集</h2>
    {!!Form::input('text','upPost',$post->post,['required','class'=>'form-control','placeholder'=>'投稿内容(120文字以内)'])!!}
    @if($errors->has('newPost'))
    <p class="error">{{$error->first('newPost')}}</p>
    @endif
    {!! Form::hidden('id',$post->id) !!}
  </div>
<button class="post-button" type="submit">更新</button>
{!! Form::close() !!}
</div>
@endsection
