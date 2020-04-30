<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" id="<?php echo e($product->id); ?>" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="<?php echo e(route('products.edit', $product->id)); ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
<td><img src="<?php echo e(asset('public/img/' . $product->image)); ?>" alt /></td>
<td><?php echo e($product->name); ?></td>  
<td><?php echo e($product->price); ?></td>
<td><?php echo e($product->top9); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/back/brick-standard.blade.php ENDPATH**/ ?>