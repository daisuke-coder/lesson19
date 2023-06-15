<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="pro-contents">
    <h2 class="p-name">{{$profile->name}}</h2>
    @if(Auth::user()->id !=$profile->id)
    <form action="/follow/{{$user_id}}" class="follow-form">
      @csrf
      @if($isFollowing)
      <button type="button" onclick="unFollow({{$profile->id}})">フォロー解除</button>
      @else
      <button type="button" onclick="follow({{$profile->id}})">フォローする</button>
      @endif
      </form>
    @endif

    @if(Auth::user()->id==$profile->id)
    <p class="p-text">{{$profile->profile}}</p>
    <p class="edit"><a href="/profile/edit-form/{{$profile->id}}" class="edit-pro">編集</a></p>
    @endif
  </div>
  <div class="f-list">
    <p class="follow-user"><a href="/follow-list/{{$user_id}}" class="follow-list">フォロー：{{$followCount}}</a></p>
    <p class="follower-user"><a href="/follower-list/{{$user_id}}" class="follower-list">フォロワー：{{$followerCount}}</a></p>
  </div>
</div>
@endsection
