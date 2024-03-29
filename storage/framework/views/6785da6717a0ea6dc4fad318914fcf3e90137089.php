<?php $__env->startSection('css'); ?>
<style>
.form-group.has-error label{color:#dd4b39}
.form-group.has-error .help-block{color:#dd4b39}
</style>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            <?php if(session('message-ok')): ?>
                <?php $__env->startComponent('front.components.alert'); ?>
                    <?php $__env->slot('type'); ?>
                        success
                    <?php $__env->endSlot(); ?>
                    <?php echo session('message-ok'); ?>

                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    <?php echo $__env->yieldContent('form-open'); ?>
                    <div class="box-body">
                        <div class="">
                            <label for="name"><?php echo app('translator')->getFromJson('User Name'); ?></label>
                            <h4><?php echo e(auth()->user()->name); ?></h4>
                        </div>
                        <div class="">
                            <label for="name"><?php echo app('translator')->getFromJson('Date of visit'); ?></label>
                            <h4><?php echo e(date('Y-m-d')); ?></h4>
                        </div>                                              
                        <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                            <label for="name"><?php echo app('translator')->getFromJson('Title'); ?></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php if(old('title')): ?><?php echo e(old('title')); ?><?php endif; ?>" placeholder="Title"> 
                            <?php echo $errors->first('title', '<small class="help-block">:message</small>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('message') ? 'has-error' : ''); ?>">
                            <label for="name"><?php echo app('translator')->getFromJson('Message'); ?></label>
                            <input type="text" class="form-control" id="message" name="message" value="<?php if(old('message')): ?><?php echo e(old('message')); ?><?php endif; ?>" placeholder="Message"> 
                            <?php echo $errors->first('message', '<small class="help-block">:message</small>'); ?>

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


<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-message/resources/views/front/messages/template.blade.php ENDPATH**/ ?>