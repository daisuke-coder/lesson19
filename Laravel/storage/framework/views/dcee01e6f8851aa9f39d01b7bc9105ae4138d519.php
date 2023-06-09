<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>新規投稿</h2>
        <?php echo Form::open(['url' => 'post/create']); ?>

        <div class="form-group">
            <?php echo Form::textarea('newPost', '', [
                'class' => 'tweetbox',
                'placeholder' => '投稿内容(150文字以内)',
            ]); ?>

            <?php if($errors->has('newPost')): ?>
                <p class="error caution"><?php echo e($errors->first('newPost')); ?></p>
            <?php endif; ?>

            <?php echo Form::hidden('newName', Auth::user()->name); ?>

        </div>
        <button class="post-button" type="submit">ツイート</button>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Laravel_lesson19/Laravel/resources/views/posts/createForm.blade.php ENDPATH**/ ?>