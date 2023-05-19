@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="page-header">新規投稿</h2>
  {!!Form::open(['url'=>'post/create']) !!}
  <div class="form-group">
    {!! Form::input('text','newPost','null',['class'=>'form-control','placeholder'=>'投稿内容(120文字以内)']) !!}
    @if(isset($e-message))
    <p class="error">{{$e-message}}</p>
    @endif
    @if(isset($emptymessage))
    <p class="error">{{$emptymessage}}</p>
    @endif

    {!! Form:hidden('newName',Auth::user()->name) !!}
  </div>
  <button class="post-button" type="submit">ツイート</button>
  {!! Form::close() !!}
</div>

@endsection
