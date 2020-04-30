<?php $__env->startSection('form-open'); ?>
    <form method="post" action="<?php echo e(route('restmessages.store')); ?>">
                    <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('POST')); ?>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.messages.restmessages.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/front/messages/restmessages/create.blade.php ENDPATH**/ ?>