@extends('layouts.app')

@section('content')
<div class="content">
  <h2 class="page-header">プロフィール編集</h2>
  {!!Form::open(['url'=>'profile/edit'])!!}
  <div class="form-group">
    <p class="form-name">ユーザー名</p>
    {!!Form::input('text','upName',$profile->name,['class'=>'form-control','placeholder'=>'ユーザー名の編集'])!!}
    <p class="form-name">プロフィール文</p>
    {!!Form::input('text','upProfile',$profile->profile,['class'=>'form-control','placeholder'=>'プロフィール文の編集'])!!}
    {!!Form::hidden('id',Auth::user()->id)!!}
  </div>
  <button class="profile-button" type="submit">確定</button>
  {!! Form::close() !!}
</div>
@endsection
