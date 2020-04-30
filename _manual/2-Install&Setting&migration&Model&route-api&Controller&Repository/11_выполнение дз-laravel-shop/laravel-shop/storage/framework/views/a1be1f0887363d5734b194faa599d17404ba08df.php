<?php $__env->startSection('css'); ?>
<style>
.back-pannel img {
width: 120px; 
}
</style>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div id="spinner" class="text-center"></div>
                    <div class="table-responsive">
                      <?php if(session('product-updated')): ?>
                          <?php $__env->startComponent('back.components.alert'); ?>
                              <?php $__env->slot('type'); ?>
                                  success
                              <?php $__env->endSlot(); ?>
                              <?php echo session('product-updated'); ?>

                          <?php echo $__env->renderComponent(); ?>
                      <?php endif; ?>                      
                      <table>
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            <td>Image</td>
                            <td>Name</td>                            
                            <td>Price</td>
                            <td>Top9</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel" class="back-pannel">
                             <?php echo $__env->make('back.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                             <?php
                             //print_r($products)
                             ?>
                         </tbody>    
                       </table>
                     </div>
                     <hr>                       
                   </div>  
                 </div>
              </div> 
           </div>         
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('public/js/main.js')); ?>"></script>
<script>
$(document).ready(function(){
    $('.listbuttonremove').click(function(){
       BaseRecord.destroy($(this).attr('id'));
       return false;
    });
});
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/back/index.blade.php ENDPATH**/ ?>