@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container">
        <h2 class="f-list">フォロー中のユーザー</h2>
        @if ($followList->isEmpty())
            <p class="error">フォローしているユーザーはいません。</p>
        @endif
        <div class="userlist">
            @foreach ($followList as $followList)
                <div class="user">
                    <p class="name search-name"><a
                            href="/profile/{{ $followList->id }}"class="name">{{ $followList->name }}</a>
                    </p>
                    <p class="pro-text">{{ $followList->profile }}</p>
                    <div class="btn-box-follow">
                        @if (Auth::user()->id != $followList->id)
                            <a class="btn btn-primary btn-unfollow" href="/follow/{{ $followList->id }}/unfollowing"
                                onclick="return confirm('{{ $followList->name }}のフォローを解除しますか？')">フォロー解除</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
