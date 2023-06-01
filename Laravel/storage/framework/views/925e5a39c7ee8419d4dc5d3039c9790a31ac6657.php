<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="page-name">ユーザー検索</h2>
        <form method="GET" action="/search">
            <input type="text" name="search" placeholder="ユーザー名で検索" class="s-text"
                value="<?php if(isset($search)): ?> <?php echo e($search); ?> <?php endif; ?>">
            <button class="s-btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="userlist">
            <?php if($uList->isEmpty()): ?>
                <p class="error">検索結果は0件です。</p>
            <?php endif; ?>
            <?php $__currentLoopData = $uList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="user">
                    <p class="name"><a href="/search/<?php echo e($uList->id); ?>" class="name"><?php echo e($uList->name); ?></a></p>
                    <p class="pro-text"><?php echo e($uList->profile); ?></p>
                    <button onclick="follow(<?php echo e($uList->id); ?>)">フォローする</button>
                    <button onclick="unFollow(<?php echo e($uList->id); ?>)">フォロー解除</button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>



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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Laravel_lesson19/Laravel/resources/views/search.blade.php ENDPATH**/ ?>