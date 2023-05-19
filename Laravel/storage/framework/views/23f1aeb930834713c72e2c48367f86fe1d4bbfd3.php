<?php $__env->startSection('content'); ?>
<div class="container">
  <p class="c-btn"><a href="/create-form" class="btn">新規投稿</a></p>
  <p class="s-btn"><a href="/search" class="btn fa fa-search"></a></p>
  <h2 class="page-name">タイムライン</h2>
  <div class="timeline">
    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="posts">
      <p class="username"><?php echo e($list->name); ?></p>
      <p class="tweet"><?php echo e($list->post); ?></p>
      <p class="time"><?php echo e($list->created_at); ?></p>
      <p class="update"><a href="/post/<?php echo e($list->id); ?>/update-form" class="btn-update">編集</a></p>
      <p class="delete"><a href="/post/<?php echo e($list->id); ?>/delete" class="delete-btn">削除</a></p>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Laravel_lesson19/Laravel/resources/views/posts/index.blade.php ENDPATH**/ ?>