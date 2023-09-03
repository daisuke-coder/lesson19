<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="page-name">投稿編集</h2>
        <?php echo Form::open(['url' => '/post/update']); ?>

        <div class="form-group">
            <?php echo Form::textarea('upPost', $post->post, ['class' => 'tweetbox', 'placeholder' => '投稿内容(150文字以内)']); ?>

            <?php if($errors->has('upPost')): ?>
                <p class="error"><?php echo e($errors->first('upPost')); ?></p>
            <?php endif; ?>
            <?php echo Form::hidden('id', $post->id); ?>

        </div>
        <button class="post-button" type="submit">更新</button>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Laravel_lesson19/Laravel/resources/views/posts/updateForm.blade.php ENDPATH**/ ?>