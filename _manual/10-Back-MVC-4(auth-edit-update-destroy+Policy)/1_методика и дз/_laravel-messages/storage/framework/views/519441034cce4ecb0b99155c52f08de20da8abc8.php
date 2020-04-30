<?php $__env->startSection('css'); ?>
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

                      <table>
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            <td>User Name</td>
                            <td>Title</td>                            
                            <td>Message</td>
                            <td>Date of visit</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             <?php echo $__env->make('back.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<script src="<?php echo e(asset('public/js/mine.js')); ?>"></script>
<script>
   $(document).ready(function(){
      $('.listbuttonremove').click(function(){
         BaseRecord.destroy($(this).attr('id'));
         return false;
      });
      $('#user_id').change(function(){
         BaseRecord.userSelect($(this).val(), './dashboard');
      });      
   });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-message/resources/views/back/index.blade.php ENDPATH**/ ?>