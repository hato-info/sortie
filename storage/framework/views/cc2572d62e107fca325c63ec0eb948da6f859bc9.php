
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="alert alert-danger"> <?php echo e($err); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('register.action')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label>Name <span class="text-danger"></span> </label>
                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" />
                </div>
                <div class="mb-3">
                    <label>User Name <span class="text-danger"></span> </label>
                    <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" />
                </div>
                <div class="mb-3">
                    <label>Passsword <span class="text-danger"></span> </label>
                    <input type="password" class="form-control" name="password" />
                </div>

                <div class="mb-3">
                    <label>Passsword Confirmation <span class="text-danger"></span> </label>
                    <input type="password" class="form-control" name="password_confirmation" />
                </div>

                <div class="mb-3">
                    <label>E-mail <span class="text-danger"></span> </label>
                    <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" />
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary">Register</button>
                    <a href="<?php echo e(route('user')); ?>" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Laravel9\gestion_sortie\resources\views/user/register.blade.php ENDPATH**/ ?>