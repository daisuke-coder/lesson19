<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="f-list">フォローされているユーザー</h2>
  @if($followerList->isEmpty())
  <p class="error">フォローされているユーザーはいません。</p>
  @endif
  @foreach($followerList as $followerList)
  <div class="user-list">
    <p class="f-user"><a href="/profile/{{$followerList->id}}" class="f-user">{{$followerList->name}}</a></p>
  </div>
  @endforeach
</div>
@endsection
