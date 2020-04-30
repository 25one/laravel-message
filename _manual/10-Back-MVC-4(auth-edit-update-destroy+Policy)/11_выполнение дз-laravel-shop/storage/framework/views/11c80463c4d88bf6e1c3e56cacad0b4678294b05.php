<?php $__env->startSection('form-open'); ?>
    <form method="post" action="<?php echo e(route('products.store')); ?>">
                    <?php echo e(csrf_field()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.products.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/back/products/create.blade.php ENDPATH**/ ?>