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
            @foreach ($uList as $uList)
                <div class="user">
                    <p class="name"><a href="/profile/{{ $uList->id }}" class="name">{{ $uList->name }}</a></p>
                    <p class="pro-text">{{ $uList->profile }}</p>
                    <button onclick="follow({{ $uList->id }})">フォローする</button>
                    <button onclick="unFollow({{ $uList->id }})">フォロー解除</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    function follow(userId) {
        $.ajax({

                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: `/follow/${userId}`,
                type: "POST",
            })
            .done((data) => {
                console.log(data);
            })
            .fail((data) => {
                console.log(data);
            });
    }

    function unFollow(userId) {
        $.ajax({

                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: `/follow/${userId}/destroy`,
                type: "POST",
            })
            .done((data) => {
                console.log(data);
            })
            .fail((data) => {
                console.log(data);
            });
    }
</script>
