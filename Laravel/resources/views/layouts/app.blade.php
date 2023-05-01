<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>webcritter</title>
</head>
<body>
  <header>
    <h1 class="page-header">WEBCRITTER</h1>
  </header>

  @yield('content')

  <footer>
    <small>webcritter@webcreate.curriculum</small>
  </footer>

  <script src=//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js></script>
</body>
</html>
