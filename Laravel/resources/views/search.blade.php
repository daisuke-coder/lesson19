<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="page-name">ユーザー検索</h2>
        <form method="GET" action="/search">
            <input type="text" name="search" placeholder="ユーザー名で検索" class="s-text"
                value="@if (isset($search)) {{ $search }} @endif">
            <button class="s-btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="userlist">
            @if ($uList->isEmpty())
                <p class="error">検索結果は0件です。</p>
            @endif
            @foreach ($uList as $user)
                <div class="user">
                    <p class="name"><a href="/profile/{{ $user->id }}" class="name">{{ $user->name }}</a></p>
                    <p class="pro-text">{{ $user->profile }}</p>
                    @if($isFollowing[$user->id])
                    <!-- ↑フォローしているユーザーの場合 -->
                    <a class="btn btn-primary" href="/follow/{{ $user->id }}/unfollowing">フォロー解除</a>
                    @else
                    <!-- ↑フォローしていないユーザーの場合 -->
                    <a class="btn btn-primary" href="/follow/{{ $user->id }}/following">フォロー</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
