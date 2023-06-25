@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="info">
            <h2 class="page-name">タイムライン</h2>
            <div class="timeline">
                @foreach ($list as $list)
                    <div class="posts">
                        <h3>
                            <p class="username"><a href="/profile/{{ $list->user_id }}"
                                    class="username">{{ $list->name }}</a>
                        </h3>
                        </p>
                        <p class="tweet">{{ $list->post }}</p>
                        <p class="time">{{ $list->created_at }}</p>
                        <p class="post-edit">
                            @if ($authUser == $list->name)
                                <a href="/post/{{ $list->id }}/update-form" class="btn-update">編集</a>
                            @endif
                            @if ($authUser == $list->name)
                                <a href="/post/{{ $list->id }}/delete" class="btn-delete"
                                    onclick="return confirm('こちらの投稿を削除しますか？')">削除</a>
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
