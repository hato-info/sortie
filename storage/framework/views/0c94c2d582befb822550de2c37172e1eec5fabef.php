
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
        <?php if(Session::has('success')): ?>
            <p class="alert alert-success"> <?php echo e(Session::get('success')); ?></p>
        <?php endif; ?>

          
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="alert alert-danger"> <?php echo e($err); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('password.action')); ?>">
                <?php echo csrf_field(); ?>
               
                <div class="mb-3">
                    <label>Old Passsword <span class="text-danger">*</span> </label>
                    <input type="password" class="form-control" name="old_password" />
                </div>

                <div class="mb-3">
                    <label>New Passsword <span class="text-danger">*</span> </label>
                    <input type="password" class="form-control" name="new_password" />
                </div>

                <div class="mb-3">
                    <label>New Passsword Confirmation<span class="text-danger">*</span> </label>
                    <input type="password" class="form-control" name="new_password_confirmation" />
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary">Change</button>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Laravel9\gestion_sortie\resources\views/user/password.blade.php ENDPATH**/ ?>