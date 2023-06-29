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
                    @if($user_id == Auth::user()->id)
                    <div class="btn-box-follow">
                        <a href="/follow/{{$followList->id}}/list-unfollow" class="btn btn-primary btn-unfollow" onclick="return confirm('{{ $followList->name }}のフォローを解除しますか？')">フォロー解除</a>
                    </div>
                    @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
