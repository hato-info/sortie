

<?php $__env->startSection('content'); ?>

<div class="row mt-2">
    <div class="col-md-4"></div>
    <div class="col-md-4 m-auto">
        <div class="card mt-3">
        
            <div class="card-body p-2 border-info">
                <h4 class="text-center text-warning">Editer un Eleve</h4>
                <form method="POST" action="<?php echo e(route('eleve.update',$eleve)); ?>">
                <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>

                    <div class="mb-2">
                        <label for="code">Code:</label>
                        <input type="text" name="code" value="<?php echo e($eleve->code); ?>" class="form-control" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" value="<?php echo e($eleve->nom); ?>" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="prenom">Prenom :</label>
                        <input type="text" name="prenom" value="<?php echo e($eleve->prenom); ?>" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="classe">Classe :</label>
                        <input type="text" name="classe" value="<?php echo e($eleve->classe); ?>" class="form-control">
                    </div>
                    <div class="buttons">
                        <button class="btn btn-success mt-1 rounded-pill">Acctualise</button>
                        <a class="btn btn-info rounded-pill" href="/eleve">Annuler</a>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Laravel9\gestion_sortie\resources\views/eleve/edit.blade.php ENDPATH**/ ?>