<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<article class="brick entry format-standard animate-this margin-top">

    <div class="entry-text">
        <div class="entry-header">
            <h5 class="entry-title"><a href="#"><?php echo e($message->title); ?></a> <span class="red">(<?php echo e($message->user->name); ?>)</span></h5>
        </div>
        <h3><?php echo e($message->datevisit); ?></h3>        
        <div class="entry-excerpt">
            <?php echo e($message->message); ?>

        </div>
    </div>

</article>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/html/laravel-message/resources/views/front/brick-standard.blade.php ENDPATH**/ ?>