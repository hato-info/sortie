
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row align-items-center">

        <div class="col-md-1"></div>
            <div class="col-md-7 m-auto">

                <div class="card mt-3">
            
                    <div class="card-body p-2 border-info">
                        
                    <h4 class="text-center text-warning mt-2 mb-4">Ajouter un Utilisateur : </h4>

                        <form method="POST" action="<?php echo e(route('register.action')); ?>" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                                <label class="col-md-2 col-sm-6 col-form-label">Name <span class="text-danger"></span> </label>
                                <div class="col-md-8 col-sm-6">
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>" />
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="alert alert-danger"> <?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                        </div>

                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                            <label class="col-md-2 col-sm-6 col-form-label">Username <span class="text-danger"></span> </label>
                            <div class="col-md-8 col-sm-6">
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo e(old('username')); ?>" />
                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="alert alert-danger"> <?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                            <label class="col-md-2 col-sm-6 col-form-label"> Passsword </label>
                            <div class="col-md-8 col-sm-6">
                                <input type="password" class="form-control" placeholder="........." name="password" />
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="alert alert-danger"> <?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                            <label class="col-md-2 col-sm-6 col-form-label"> Passsword Confirmation  </label>
                            <div class="col-md-8 col-sm-6">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="........."/>
                            </div>
                        </div>

                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                                <label class="col-md-2 col-sm-6 col-form-label">E-mail </span> </label>
                                <div class="col-md-8 col-sm-6">
                                    <input type="text" class="form-control" name="email" placeholder="exemple@gmail.com" value="<?php echo e(old('email')); ?>" />
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="alert alert-danger"> <?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                        </div>

                <div class="mb-3">
                    <button class="btn btn-primary">Register</button>
                    <a href="<?php echo e(route('user')); ?>" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projet\gestion_sortie\resources\views/user/register.blade.php ENDPATH**/ ?>