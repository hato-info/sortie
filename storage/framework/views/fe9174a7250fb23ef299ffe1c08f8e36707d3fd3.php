



<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<p class="alert alert-success"><?php echo e(session('success')); ?></p>
<?php endif; ?>

<?php if(Auth::check()): ?>
<div class="card">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
               
                <div class="col">
                    <input type="text" class="form-control" id="cherche" placeholder="Rechercher ici..." name="q" value="<?php echo e(old('cherche')); ?>">
                </div>
                <div class="col">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </div>
                <div class="col">   
                    <a class="btn btn-success" href="<?php echo e(url('eleve/create')); ?>">Ajouter Nouvelle Eleve</a>
                </div>
            </form>   
        </div>

        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-striped table-hover m-0 text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code Massar</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Classe</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $eleves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $eleve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($index+1); ?></td>
                    <td><?php echo e($eleve->code); ?></td>
                    <td><?php echo e($eleve->nom); ?></td>
                    <td><?php echo e($eleve->prenom); ?></td>
                    <td><?php echo e($eleve->classe); ?></td>
                    
                    <td>

                        <form action="<?php echo e(url('eleve/'. $eleve->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            
                            <a class="btn btn-info" href="<?php echo e(url('eleve/'. $eleve->id)); ?>">Code QR</a>
                            <a class="btn btn-primary" href="<?php echo e(url('eleve/'. $eleve->id .'/edit')); ?>">Modifier</a>
                            <?php if(Auth::check()): ?>
                            <?php if(Auth::user()->rolle == 'admin'): ?>
                                <button type="button" class="btn btn-danger deleteCategoryBtn" value="<?php echo e($eleve->id); ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
                            <?php endif; ?>
                            <?php endif; ?>  
                        </form>
                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo $eleves->links(); ?>

    </div>
    <footer class="card-footer">
    
    </footer>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

 <!-- debut de modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form action="<?php echo e(url('eleve/')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer Un Eleve :</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name="eleve_delete_id" id="eleve_id">
                    vous êtes sûr de supprimer cet Eleve !
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                
                        <button type="submit" class="btn btn-danger" id="deletemember">Oui Supprimer</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
    <!-- Fin de modal -->


<?php $__env->startSection('scripts'); ?>
<script>
     $(document).ready(function() {
        $('.deleteCategoryBtn').click(function(e){
            e.preventDefault();

            var eleve_id = $(this).val();
            $('#eleve_id').val(eleve_id);

            $('#deleteModal').modal('show');
        });
     });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Laravel9\gestion_sortie\resources\views/eleve/index.blade.php ENDPATH**/ ?>