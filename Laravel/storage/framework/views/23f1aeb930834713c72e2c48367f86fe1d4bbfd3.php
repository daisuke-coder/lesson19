<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="info">
            <h2 class="page-name">タイムライン</h2>
            <div class="timeline">
                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="posts">
                        <h3>
                            <p class="username"><a href="/profile/<?php echo e($list->user_id); ?>"
                                    class="username"><?php echo e($list->name); ?></a>
                        </h3>
                        </p>
                        <p class="tweet"><?php echo e($list->post); ?></p>
                        <p class="time"><?php echo e($list->created_at); ?></p>
                        <p class="post-edit">
                            <?php if($authUser == $list->name): ?>
                                <a href="/post/<?php echo e($list->id); ?>/update-form" class="btn-update">編集</a>
                            <?php endif; ?>
                            <?php if($authUser == $list->name): ?>
                                <a href="/post/<?php echo e($list->id); ?>/delete" class="btn-delete"
                                    onclick="return confirm('こちらの投稿を削除しますか？')">削除</a>
                            <?php endif; ?>
                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Laravel_lesson19/Laravel/resources/views/posts/index.blade.php ENDPATH**/ ?>