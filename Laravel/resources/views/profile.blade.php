<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profile-content">
            <div class="profile-head">
                <h2 class="p-name">{{ $profile->name }}</h2>
                <div class="f-list">
                    <a href="/follow-list/{{ $user_id }}" class="follow-list">フォロー：{{ $followCount }}</a>
                    <a href="/follower-list/{{ $user_id }}" class="follower-list">フォロワー：{{ $followerCount }}</a>
                </div>
            </div>


            <div class="profile-about">
                <p class="profile">プロフィール</p>
                @if (!$profile->profile)
                    <p class="profile-text">プロフィール文が未設定です。</p>
                @else
                    <p class="profile-text">{{ $profile->profile }}</p>
                @endif
            </div>
            <div class="profile-about">
                @if (Auth::user()->id == $profile->id)
                    <p class="edit"><a href="/profile/edit-form/{{ $profile->id }}" class="edit-pro">プロフィール編集</a></p>
                @endif
            </div>
        </div>

        <div class="profile-posts">
            <h4>{{ $profile->name }}の投稿一覧</h4>
            @foreach ($profilePosts as $list)
                @if (!$list->post)
                    <P>まだ投稿がありません。</P>
                @else
                    <div class="posts">
                        <h3>
                            <p class="username">{{ $list->name }}</p>
                        </h3>
                        <p class="tweet">{{ $list->post }}</p>
                        <p class="time">{{ $list->created_at }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
