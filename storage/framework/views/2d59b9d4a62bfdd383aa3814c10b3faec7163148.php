<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
   <div class="container">
       <a class="navbar-brand size" href="<?php echo e(route('home')); ?>">
           <?php echo e(config('app.name')); ?>

       </a>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Left Side Of Navbar -->
           <ul class="navbar-nav mr-auto">

           </ul>
           <!-- Center Side Of Navbar -->
           <ul class="navbar-nav mr-auto">

           </ul>

           <!-- Right Side Of Navbar -->
           <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                      <a class="nav-link" href="<?php echo e(route('home')); ?>">Home </a>
                   </li> 
                   <?php if(auth()->guard()->check()): ?>  
                   <li class="nav-item">
                      <a class="nav-link" href="<?php echo e(route('newmessages.create')); ?>">New Message </a>
                   </li>   
                   <?php endif; ?>                        
                   <!-- Authentication Links -->
                   <?php if(auth()->guard()->guest()): ?>
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                     </li>
                   <?php else: ?>
                   <li class="nav-item dropdown">
                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                       </a>

                       <div class="dropdown-menu dropdown-menu-right size" aria-labelledby="navbarDropdown">
                              <?php if(auth()->guard()->check()): ?>
                              <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                              <?php endif; ?>
                           <a class="dropdown-item" href="#"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               <?php echo e(__('Logout')); ?>

                           </a>

                           <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                               <?php echo csrf_field(); ?>
                           </form>
                       </div>
                   </li>
                   <?php endif; ?>
           </ul>
       </div>
   </div>
  </nav><?php /**PATH /home/alex/www/laravel-message/resources/views/front/navbar.blade.php ENDPATH**/ ?>