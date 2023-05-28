<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts.app')
@section('content')
    @foreach ($users as $user)
        <div>
            <div>{{ $user->name }}</div>
            <button onclick="follow({{ $user->id }})">フォローする</button>
            <button onclick="unFollow({{ $user->id }})">フォロー解除</button>
        </div>
    @endforeach

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
@endsection
