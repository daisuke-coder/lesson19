@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="f-list">フォロー中のユーザー</h2>
  @if($followList->isEmpty())
  <p class="error">フォローしているユーザーはいません。</p>
  @endif
  @foreach($followList as $followList)
  <div class="user-list">
    <p class="f-user"><a href="/profile/{{$user_id}}" class="f-user">{{$followList->name}}</a></p>
    <!-- <form action="/follow/{{$user_id}}" class="follow-form">
      @if($isFollowing)
      <button class="submit" type="submit">アンフォロー</button>
    </form> -->
    <!-- フォロー、アンフォローボタン -->
  </div>
  @endforeach
</div>
@endsection
