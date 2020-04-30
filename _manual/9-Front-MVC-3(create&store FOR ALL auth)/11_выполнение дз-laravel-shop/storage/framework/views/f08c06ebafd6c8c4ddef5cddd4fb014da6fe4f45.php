<?php $__env->startSection('css'); ?>
<style>
.upload_field {
opacity:0.0;
z-index:2;
position:absolute;
}
.upload_submit {
z-index:1;
display:none;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            <?php if(session('product-ok')): ?>
                <?php $__env->startComponent('back.components.alert'); ?>
                    <?php $__env->slot('type'); ?>
                        success
                    <?php $__env->endSlot(); ?>
                    <?php echo session('product-ok'); ?>

                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">       <!-- !!!/img/bg-img/ - custom -->    
                          <img class="img_product" src="<?php if(isset($image)): ?><?php echo e(asset('public/img/bg-img/' . $image)); ?><?php elseif(isset($product)): ?><?php echo e(asset('public/img/' . $product->image)); ?><?php else: ?><?php echo e(asset('public/img/bg-img/nophoto.jpg')); ?><?php endif; ?>" alt="" style="width: 150px; margin-top: 5px;" />
                          <?php if(\Request::is('products/create')): ?>                          
                          <form method="post" action="<?php echo e(route('upload')); ?>" name="form_upload" enctype="multipart/form-data">
                                            <?php echo e(csrf_field()); ?>    
                              <input type="file" name="image" class="upload_field">
                              <button type="submit" class="upload_submit">Go</button>
                              <button type="button" class="btn btn-primary" style="width: 150px; margin-top: 5px;">Select</button>
                          </form>  
                          <?php endif; ?>       
                        </div>
                        <?php echo $__env->yieldContent('form-open'); ?>  
                        <!-- 'bg-img/' . - custom -->
                           <input type="hidden" id="image" name="image" value="<?php if(isset($image)): ?><?php echo e('bg-img/' . $image); ?><?php elseif(isset($product)): ?><?php echo e($product->image); ?><?php else: ?><?php echo e('bg-img/nophoto.jpg'); ?><?php endif; ?>">
                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label for="name"><?php echo app('translator')->getFromJson('Name'); ?></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($product)): ?><?php echo e($product->name); ?><?php elseif(old('name')): ?><?php echo e(old('name')); ?><?php endif; ?>" placeholder="Big Table"> 
                            <?php echo $errors->first('name', '<small class="help-block">:message</small>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                            <label for="name"><?php echo app('translator')->getFromJson('Price'); ?></label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php if(isset($product)): ?><?php echo e($product->price); ?><?php elseif(old('price')): ?><?php echo e(old('price')); ?><?php endif; ?>" placeholder="177.77"> 
                            <?php echo $errors->first('price', '<small class="help-block">:message</small>'); ?>

                        </div>
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->getFromJson('Top9'); ?></label>
                            <input name='top9' type='hidden' value='0'>
                            <input type="checkbox" id="top9" name="top9" <?php if(isset($product) && $product->top9 == 1): ?><?php echo e('checked'); ?><?php endif; ?> style="vertical-align: top;"> 
                        </div>                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('Submit'); ?></button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function(){
  $("body").on("change", ".upload_field", function(){
    //alert('hi');
    $(".upload_submit").click();
  });
});       
</script>
<?php $__env->stopSection(); ?>  



<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/back/products/template.blade.php ENDPATH**/ ?>