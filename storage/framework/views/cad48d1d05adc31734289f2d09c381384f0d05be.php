

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-6">

    <form action="<?php echo e(url('eleve')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group mb-3">

        <label for="code">Code:</label>
        <input type="text" class="form-control" id="code" placeholder="Code Massar" name="code" value="<?php echo e(old ('code')); ?>">
                <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text text-danger"> <?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group mb-3">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrez le nom d'éleve" name="nom" value="<?php echo e(old ('nom')); ?>">
                    <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group mb-3">
            <label for="prenom">Prenom:</label>
            <input type="text" class="form-control" id="prenom" placeholder="Entrez le prenom d'éleve" name="prenom" value="<?php echo e(old ('prenom')); ?>">
                <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group mb-3">
            <label for="classe">La Classe :</label>
            <select name="classe" id="pet-select">
                <option value="">--Veuillez choisir une Classe--</option>
                <?php $__currentLoopData = $lesclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesclasse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($lesclasse->classe); ?>"><?php echo e($lesclasse->classe); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>  
            <?php $__errorArgs = ['classe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        <button type="submit" class="btn btn-primary">Enregister</button>
        <a class="btn btn-info rounded-pill" href="/">Annuler</a>

    </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Laravel9\gestion_sortie\resources\views/eleve/create.blade.php ENDPATH**/ ?>