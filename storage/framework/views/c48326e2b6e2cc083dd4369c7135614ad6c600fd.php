<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <title>Login</title>
</head>
<body>
    
<section>
    <div class="form-container">
   <h1>login form</h1>
        <?php if(Session::has('success')): ?>
            <p class="alert alert-success"> <?php echo e(Session::get('success')); ?></p>
        <?php endif; ?>
          
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="alert alert-danger"> <?php echo e($err); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('login.action')); ?>">
                <?php echo csrf_field(); ?>
                
                <div class="control">
                    <label for="name">User Name <span class="text-danger"></span> </label>
                    <input type="text" class="form-control" id="name" name="username" value="<?php echo e(old('username')); ?>" />
                </div>
                <div class="control">
                    <label for="psw">Passsword <span class="text-danger"></span> </label>
                    <input type="password" id="psw" class="form-control" name="password" />
                </div>
                <span><input type="checkbox">Remember me.</span>
                <div class="control">
                    <input type="submit" value="Login">
                </div>
            </form>
            <div class="link">
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </div>
</section>

</body>
</html><?php /**PATH C:\xampp\htdocs\projet\gestion_sortie\resources\views/user/login.blade.php ENDPATH**/ ?>