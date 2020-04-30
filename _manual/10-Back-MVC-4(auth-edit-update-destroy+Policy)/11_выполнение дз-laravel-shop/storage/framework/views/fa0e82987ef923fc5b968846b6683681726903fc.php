<?php $__env->startSection('main'); ?>

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">

<?php
//print_r($products);
?>
            
            <div class="amado-pro-catagory clearfix">

               <?php echo $__env->make('front.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
        <!-- Product Catagories Area End -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- <script src="<?php echo e(asset('public/js/main.js')); ?>"></script> -->
<script>
$(document).ready(function(){
   $('.button_search').click(function(){
   	  BaseRecord.search($('#search').val());
   });
});   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/front/index.blade.php ENDPATH**/ ?>