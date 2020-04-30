                                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="<?php echo e(asset('public/img/' . $cart->image)); ?>" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo e($cart->name); ?></h5>
                                        </td>
                                        <td class="price">
                                            <span>$<?php echo e($cart->price); ?></span>
                                        </td>
                                        <td class="center">
                                            <!-- <a class="btn btn-danger listbuttonremove" id="" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                                            <button class="btn btn-danger listbuttonremove" id="<?php echo e($cart->id); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        <!-- <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div> -->
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/laravel-shop/resources/views/front/cart-standard.blade.php ENDPATH**/ ?>