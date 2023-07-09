@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container">
        <h2 class="f-list">フォローされているユーザー</h2>
        @if ($followerList->isEmpty())
            <p class="error">フォローされているユーザーはいません。</p>
        @endif
        <div class="user-list">
            @foreach ($followerList as $followerList)
                <div class="user">
                    <p class="name search-name"><a href="/profile/{{ $followerList->id }}"
                            class="name">{{ $followerList->name }}</a>
                    </p>
                    <p class="pro-text">{{ $followerList->profile }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
