<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/datatables/datatables.min.css')); ?>">
<style>
.content {
width: 50%;  
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
                    <?php if(session('message-updated')): ?>
                        <?php $__env->startComponent('back.components.alert'); ?>
                            <?php $__env->slot('type'); ?>
                                success
                            <?php $__env->endSlot(); ?>
                            <?php echo session('message-updated'); ?>

                        <?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>  
                    
                    <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?> 
                      <div class="row margin">
                          <div class="col-md-3 col-sm-4 col-xs-12">
                              <div class="form-group">
                                  <label for="type" class="size">Select messages of user</label>
                                  <select class="form-control input-size" style="height: auto;" name="user_id" id="user_id">
                                      <option value="0" class="input-size" 
                                         >-----</option> 
                                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                                  </select>
                              </div>
                          </div>
                      </div>   
                    <?php endif; ?>  

                      <table class="table-wrapper">
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>

                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">User Name</td>
                                   <td ><a href="#" class="sort" data-order="user_id" data-direction="asc"> <!-- like config\parameters.php -->
                                      <img src="<?php echo e(asset('public/images/top.jpg')); ?>" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="user_id" data-direction="desc"> <!-- like config\parameters.php -->
                                      <img src="<?php echo e(asset('public/images/bottom.jpg')); ?>" alt />
                                   </a></td>  
                                 </tr>
                               </table>                    
                            </td>

                            <td>Title</td>                            
                            <td>Message</td>

                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">Date of visit</td>
                                   <td ><a href="#" class="sort" data-order="datevisit" data-direction="asc"> <!-- like config\parameters.php -->
                                      <img src="<?php echo e(asset('public/images/top.jpg')); ?>" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="datevisit" data-direction="desc"> <!-- like config\parameters.php -->
                                      <img src="<?php echo e(asset('public/images/bottom.jpg')); ?>" alt />
                                   </a></td>  
                                 </tr>
                               </table>                    
                            </td>

                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             <?php echo $__env->make('back.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<script src="<?php echo e(asset('public/datatables/datatables.min.js')); ?>"></script> 
<script src="<?php echo e(asset('public/js/mine.js')); ?>"></script>
<script>
   //var messages='<?php echo json_encode($messages); ?>';
   $(document).ready(function(){
      //BaseRecord.datatable();
      $('.listbuttonremove').click(function(){
         BaseRecord.destroy($(this).attr('id'));
         return false;
      });
      $('#user_id').change(function(){
         BaseRecord.userSelect($(this).val(), './dashboard');
      }); 
      $('.sort').click(function(){
         BaseRecord.order=$(this).attr('data-order');
         BaseRecord.direction=$(this).attr('data-direction');
         BaseRecord.userSelect(0, './dashboard');
         return false;
      });           
   });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-message/resources/views/back/index.blade.php ENDPATH**/ ?>