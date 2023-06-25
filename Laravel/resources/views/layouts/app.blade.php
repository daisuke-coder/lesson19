<!DOCTYPE html>
<html lang="ja">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
    <script src=//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <title>webcritter</title>
</head>

<body>
    <header>
        <h1 class="page-header"><a href="/index" class="page-header">WEBCRITTER</a></h1>
        <nav class="pc-nav">
            <ul class="nav-menu">
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">{{ __('ログイン') }}</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">{{ __('新規登録') }}</a></li>
                @else
                    <li class="nav-item s-btn"><a href="/create-form" class="btn nav-link">新規投稿</a></li>
                    <li class="nav-item s-btn"><a class="nav-link" href="/search" class="btn fa fa-search">ユーザー検索</a></li>
                    <li class="nav-item"><a href="{{ route('profile', ['user_id' => Auth::user()->id]) }}"
                            class="nav-link">{{ Auth::user()->name }}</a></li>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item nav-link logout-btn"
                                href="{{ route('logout') }}"onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}</a>
                        </li>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf </form>
                    </div>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>

    @yield('content')

    <footer>
        <small>webcritter@webcreate.curriculum</small>
    </footer>

    <script src="{{ asset('js/follow.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
<div id="app"></div>

</html>
