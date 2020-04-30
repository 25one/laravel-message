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

                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">Price</td>
                                   <td ><a href="#" class="sort" data-order="price" data-direction="asc"> <!-- like config\parameters.php -->
                                      <img src="<?php echo e(asset('public/images/top.jpg')); ?>" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="price" data-direction="desc"> <!-- like config\parameters.php -->
                                      <img src="<?php echo e(asset('public/images/bottom.jpg')); ?>" alt />
                                   </a></td>  
                                 </tr>
                               </table>                    
                            </td>

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
                     <div id="pagination" class="box-footer">
                        <?php echo e($links); ?>

                     </div>
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
    $('.sort').click(function(){
       BaseRecord.order=$(this).attr('data-order');
       BaseRecord.direction=$(this).attr('data-direction');
       BaseRecord.dashboardparameters();
       return false;
    });
});
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/back/index.blade.php ENDPATH**/ ?>