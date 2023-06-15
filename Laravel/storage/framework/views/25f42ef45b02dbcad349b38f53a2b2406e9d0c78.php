<!DOCTYPE html>
<html lang="ja">
<head>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
  <script src=//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


  <title>webcritter</title>
</head>
<body>
  <header>
    <h1 class="page-header"><a href="/index" class="page-header">WEBCRITTER</a></h1>
    <ul class="nav-menu">
      <?php if(auth()->guard()->guest()): ?>
      <li class="nav-item"><a href="<?php echo e(route('login')); ?>" class="nav-link"><?php echo e(__('Login')); ?></a></li>
      <li class="nav-item"><a href="<?php echo e(route('register')); ?>" class="nav-link"><?php echo e(__('登録')); ?></a></li>
      <?php else: ?>
      <li class="nav-item"><a href="<?php echo e(route('profile', ['user_id' => Auth::user()->id])); ?>" class="nav-link">ユーザー名：<?php echo e(Auth::user()->name); ?></a></li>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
       <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <?php echo e(__('Logout')); ?></a>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?> </form>
      </div>
      </li>
      <?php endif; ?>
    </ul>
  </header>

  <?php echo $__env->yieldContent('content'); ?>

  <footer>
    <small>webcritter@webcreate.curriculum</small>
  </footer>

  <script src="<?php echo e(asset('js/follow.js')); ?>" defer></script>
  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</body>
<div id="app"></div>
</html>
<?php /**PATH /Applications/MAMP/htdocs/Laravel_lesson19/Laravel/resources/views/layouts/app.blade.php ENDPATH**/ ?>