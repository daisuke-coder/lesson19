@extends('layouts.app')

@section('content')
<div class="container">
  <div class="pro-contents">
    <h2 class="p-name">{{$profile->name}}</h2>
    <p class="p-text">{{$profile->profile}}</p>
    <p class="edit"><a href="/profile/edit/{{$profile->id}}" class="edit-pro">編集</a></p>
  </div>
  <div class="f-list">
    <p class="follow-user"><a href="/follow-list/{{$user_id}}" class="follow-list">フォロー：{{$followCount}}</a></p>
    <p class="follower-user"><a href="/follower-list/{{$user_id}}" class="follower-list">フォロワー：{{$followerCount}}</a></p>
  </div>
</div>

@endsection
