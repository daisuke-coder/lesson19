<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="f-list">フォロー中のユーザー</h2>
  @if($followList->isEmpty())
  <p class="error">フォローしているユーザーはいません。</p>
  @endif
  @foreach($followList as $followList)
  <div class="user-list">
    <p class="f-user"><a href="/profile/{{$followList->id}}" class="f-user">{{$followList->name}}</a></p>
    <button onclick="unfollow({{$followList->id}})">フォロー解除</button>
  </div>
  @endforeach
</div>
@endsection
