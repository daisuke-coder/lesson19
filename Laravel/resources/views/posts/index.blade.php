@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="c-btn"><a href="/create-form" class="btn">新規投稿</a></p>
        <p class="s-btn"><a href="/search" class="btn fa fa-search"></a></p>
        <h2 class="page-name">タイムライン</h2>
        <div class="timeline">
            @foreach ($list as $list)
                <div class="posts">
                    <p class="username">{{ $list->name }}</p>
                    <p class="tweet">{{ $list->post }}</p>
                    <p class="time">{{ $list->created_at }}</p>
                    @if ($authUser == $list->name)
                        <p class="update"><a href="/post/{{ $list->id }}/update-form" class="btn-update">編集</a></p>
                    @endif
                    @if ($authUser == $list->name)
                        <p class="delete"><a href="/post/{{ $list->id }}/delete" class="delete-btn">削除</a></p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
