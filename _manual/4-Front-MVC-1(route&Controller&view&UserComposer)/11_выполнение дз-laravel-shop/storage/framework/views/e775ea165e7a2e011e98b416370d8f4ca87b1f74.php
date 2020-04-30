                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="<?php echo e(route('product', [$product->id])); ?>">
                        <img src="<?php echo e(asset('public/img/' . $product->image)); ?>" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p><?php echo e($product->price); ?></p>
                            <h4><?php echo e($product->name); ?></h4>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/front/brick-standard.blade.php ENDPATH**/ ?>