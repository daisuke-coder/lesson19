<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <div class="container">
        <h2 class=>ユーザー検索</h2>
        <form method="GET" action="/search">
            <input type="text" name="search" placeholder="ユーザー名で検索" class="s-text"
                value="<?php if(isset($search)): ?> <?php echo e($search); ?> <?php endif; ?>">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="userlist">
            <?php if($uList->isEmpty()): ?>
                <p class="error">検索結果は0件です。</p>
            <?php endif; ?>
            <?php $__currentLoopData = $uList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="user">
                    <p class="name search-name"><a href="/profile/<?php echo e($user->id); ?>"
                            class="name"><?php echo e($user->name); ?></a></p>
                    <p class="pro-text"><?php echo e($user->profile); ?></p>
                    <div class="btn-box-follow">
                        <?php if($isFollowing[$user->id]): ?>
                            <!-- ↑フォローしているユーザーの場合 -->
                            <a class="btn btn-primary btn-unfollow" href="/follow/<?php echo e($user->id); ?>/unfollowing"
                                onclick="return confirm('<?php echo e($user->name); ?>のフォローを解除しますか？')">フォロー中</a>
                        <?php else: ?>
                            <!-- ↑フォローしていないユーザーの場合 -->
                            <a class="btn btn-primary btn-follow" href="/follow/<?php echo e($user->id); ?>/following">フォロー</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Laravel_lesson19/Laravel/resources/views/search.blade.php ENDPATH**/ ?>