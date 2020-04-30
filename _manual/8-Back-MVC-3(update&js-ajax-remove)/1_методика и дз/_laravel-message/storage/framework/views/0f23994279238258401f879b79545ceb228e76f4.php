<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?></title>

    <!-- Styles CSS -->
    <!-- bootstrap css -->    
    <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">
    <!-- bootstrap css -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->    
    <link rel="stylesheet" href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>">
    <!-- awesome css -->  
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/fontawesome.min.css')); ?>">
    <!-- my brick.css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/brick.css')); ?>">    
    <!-- my mine.css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/mine.css')); ?>">

    <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css"> -->    

    <?php echo $__env->yieldContent('css'); ?>

</head>
<body>
    <div class="wrapper">
        <?php echo $__env->make('front.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content-wrapper">
            <?php echo $__env->yieldContent('main'); ?>
        </div>
    </div>
<!-- Scripts JS -->   
<!-- bootstrap script -->
<script src="<?php echo e(asset('public/js/app.js')); ?>"></script>
<!-- jquery scripts -->
<script src="<?php echo e(asset('public/js/jQuery-2.2.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/jquery-ui.min.js')); ?>"></script>  
<!-- Sweet Alert script -->
<!-- <script src="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.js"></script> -->

<?php echo $__env->yieldContent('js'); ?>

</body>
</html>
<?php /**PATH /var/www/html/laravel-message/resources/views/front/layout.blade.php ENDPATH**/ ?>