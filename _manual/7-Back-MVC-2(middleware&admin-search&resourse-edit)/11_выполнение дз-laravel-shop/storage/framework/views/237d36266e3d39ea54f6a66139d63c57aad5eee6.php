<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div id="spinner" class="text-center"></div>

                      <div class="row">
                         <div class="col-md-3 col-sm-3 col-xs-8">  
                            <input type="text" class="form-control search_text" placeholder="Search for Messages" />
                         </div>   
                         <div class="col-md-3 col-sm-3 col-xs-4">    
                            <button type="button" class="btn btn-primary search_button">Search</button> 
                          </div> 
                      </div>        

                    <div class="table-responsive">
                      <?php if(session('message-updated')): ?>
                          <?php $__env->startComponent('back.components.alert'); ?>
                              <?php $__env->slot('type'); ?>
                                  success
                              <?php $__env->endSlot(); ?>
                              <?php echo session('message-updated'); ?>

                          <?php echo $__env->renderComponent(); ?>
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
                          <tbody id="pannel" class="back-pannel">
                             <?php echo $__env->make('front.messages.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
   $('.search_button').click(function(){
      BaseRecord.searchMessages($('.search_text').val());
   });
});
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.messages.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/front/messages/index.blade.php ENDPATH**/ ?>