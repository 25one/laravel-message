<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" id="<?php echo e($message->id); ?>" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="#"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
<td><?php echo e($message->user->name); ?></td>
<td><?php echo e($message->title); ?></td>  
<td class="message-width"><?php echo e($message->message); ?></td>
<td><?php echo e($message->datevisit); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/front/messages/brick-standard.blade.php ENDPATH**/ ?>