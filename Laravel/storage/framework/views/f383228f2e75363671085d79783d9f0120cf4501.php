<?php $__env->startSection('content'); ?>

<div class="container">
  <?php echo Form::open(['url'=>'/post/update']); ?>

  <div class="form-group">
    <h2 class="pageheader">投稿編集</h2>
    <?php echo Form::input('text','upPost',$post->post,['required','class'=>'form-control','placeholder'=>'投稿内容(120文字以内)']); ?>

    <?php if(isset($errormessage)): ?>
    <p class="error"><?php echo e($errormessage); ?></p>
    <?php endif; ?>
    <?php if(isset($emptymessage)): ?>
    <p class="error"><?php echo e($emptymessage); ?></p>
    <?php endif; ?>
    <?php echo Form::hidden('id',$post->id); ?>

  </div>
</div>
<button class="post-button" type="submit">更新</button>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Laravel_lesson19/Laravel/resources/views/posts/updateForm.blade.php ENDPATH**/ ?>