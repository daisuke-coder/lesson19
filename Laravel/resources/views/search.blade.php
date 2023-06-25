@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container">
        <h2 class=>ユーザー検索</h2>
        <form method="GET" action="/search">
            <input type="text" name="search" placeholder="ユーザー名で検索" class="s-text"
                value="@if (isset($search)) {{ $search }} @endif">
            <button class=type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="userlist">
            @if ($uList->isEmpty())
                <p class="error">検索結果は0件です。</p>
            @endif
            @foreach ($uList as $user)
                <div class="user">
                    <p class="name search-name"><a href="/profile/{{ $user->id }}"
                            class="name">{{ $user->name }}</a></p>
                    <p class="pro-text">{{ $user->profile }}</p>
                    <div class="btn-box-follow">
                        @if ($isFollowing[$user->id])
                            <!-- ↑フォローしているユーザーの場合 -->
                            <a class="btn btn-primary btn-unfollow" href="/follow/{{ $user->id }}/unfollowing"
                                onclick="return confirm('{{ $user->name }}のフォローを解除しますか？')">フォロー中</a>
                        @else
                            <!-- ↑フォローしていないユーザーの場合 -->
                            <a class="btn btn-primary btn-follow" href="/follow/{{ $user->id }}/following">フォロー</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
