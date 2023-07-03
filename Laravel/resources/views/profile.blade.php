<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="pro-contents">
            <h2 class="p-name">{{ $profile->name }}</h2>
            <div class="f-list">
                <a href="/follow-list/{{ $user_id }}" class="follow-list">フォロー：{{ $followCount }}</a>
                <a href="/follower-list/{{ $user_id }}" class="follower-list">フォロワー：{{ $followerCount }}</a>
            </div>



            <p class="profile">プロフィール</p>
            @if (!$profile->profile)
                <p class="profile-text">プロフィール文が未設定です。</p>
            @else
                <p class="profile-text">{{ $profile->profile }}</p>
            @endif
            @if (Auth::user()->id == $profile->id)
                <p class="edit"><a href="/profile/edit-form/{{ $profile->id }}" class="edit-pro">プロフィールを編集</a></p>
            @endif

            <div class="profile-posts">
                @foreach($profilePosts as $list)
                <h3>
                    <p class="username">{{$list->name}}</p>
                </h3>
                <p class="tweet">{{$list->post}}</p>
                <p class="time">{{$list->created_at}}</p>
                @endforeach
            </div>

        </div>
    </div>
@endsection
