

 

<?php $__env->startSection('content'); ?>

 <!-- debut de modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="<?php echo e(url('/classe/index')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer Une Classe :</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name="classe_id" id="classe_id">
                    Vous êtes sûr de supprimer cet Classe !
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

    <?php if($message = Session::get('success')): ?>

<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>

<?php endif; ?>

<?php if(Auth::check()): ?>

<div class="container">
        <div class="row align-items-start">
            <div class="col-4">
                <div class="card mt-3">     
                    <div class="card-body p-2 border-info">
                        <h4 class="text-center text-warning">Ajouter une Classe :</h4>
            
                        <form action="#" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="form-group mb-3">
                                <label for="classe" class="mt-2 mb-2">La Classe :</label>
                                <input type="text" class="form-control" id="classe" placeholder="Son Classe" name="classe" value="<?php echo e(old ('classe')); ?>">
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
                        <!-- <a class="btn btn-info rounded-pill" href="/">Annuler</a> -->
                </form>
                </div>
                </div>
            </div> 
            <div class="col-2"></div>
            <div class="col">
                <div>
                    <table class="table table-bordered table-striped table-hover m-0 text-center">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Classe</th>
                            <th width="200px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $lesclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $lesclasse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($index+1); ?></td>
                                <td><?php echo e($lesclasse->classe); ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger deleteCategoryBtn" value="<?php echo e($lesclasse->id); ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $lesclasses->links(); ?>

                </div>
            </div>

        </div>
</div>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<footer class="card-footer">

</footer>

<?php $__env->startSection('scripts'); ?>


<script>
     $(document).ready(function() {
        $('.deleteCategoryBtn').click(function(e){
            e.preventDefault();

            var classe_id = $(this).val();
            $('#classe_id').val(classe_id);
            
            $('#deleteModal').modal('show');
        });
     });
     
</script>
<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projet\gestion_sortie\resources\views/classes/index.blade.php ENDPATH**/ ?>