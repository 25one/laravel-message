<?php $__env->startSection('form-open'); ?>
    <form method="post" action="<?php echo e(route('newmessages.store')); ?>">
                    <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('POST')); ?>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.messages.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ag248566/25one.com.ua/fullstack/resources/views/front/messages/create.blade.php ENDPATH**/ ?>