

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<p class="alert alert-success"><?php echo e(session('success')); ?></p>
<?php endif; ?>

<div class="container">

    <div class="row align-items-center">

        <div class="col-md-2"></div>
            <div class="col-md-7 m-auto">

                <div class="card mt-3">
                    
                    <div class="card-body p-2 border-info">

                        <form action="<?php echo e(url('eleve')); ?>" method="POST" class="form-horizontal">
                            <?php echo csrf_field(); ?>

                            <div class="row form-group mb-3 mt-2">
                                <div class="col-1"></div>
                                <label for="code" class="col-md-2 col-sm-6 col-form-label">Code Massar:</label>
                                <div class="col-md-8 col-sm-6">
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
                            </div>
                            
                            <div class="row form-group mb-3">
                            <div class="col-1"></div>
                                <label for="nom" class="col-md-2 col-sm-6 col-form-label">Nom :</label>
                                <div class="col-md-8 col-sm-6">
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
                            </div>

                            <div class="row form-group mb-3">
                            <div class="col-1"></div>
                                <label for="prenom" class="col-md-2 col-sm-6 col-form-label">Prenom:</label>
                                <div class="col-md-8 col-sm-6">
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
                            </div>

                            <div class="row form-group mb-3">
                            <div class="col-1"></div>
                                <label for="classe" class="col-md-2 col-sm-6 col-form-label">La Classe :</label>
                                <div class="col-md-8 col-sm-6">
                                    <select class="form-select" name="classe" id="pet-select">
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
                            </div>

                            <div class="row form-group mb-8">
                            <div class="col-sm-7"></div>
                            <div class="col-sm-4 m-1">
                                <button type="submit" class="btn btn-primary">Enregister</button>
                                <a class="btn btn-info rounded-pill" href="/eleve">Annuler</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-3">

            <form method="POST" action="<?php echo e(route('excel.import')); ?>" enctype="multipart/form-data" >
                        <!-- CSRF Token -->
                        <?php echo csrf_field(); ?>
                        <input type="file" name="fichier" >
                        <button type="submit" >Importer</button>

                    </form>

                <div id="chek_box">
                <input type="checkbox" onChange="fonctionchange();" id="check"/>
                <label for=""> voulez vous vider la base de donnée ! </label> 
                </div>
                <div id="div1" style="display:none;">
                    
                    <form method="POST" action="<?php echo e(route('vider')); ?>" enctype="multipart/form-data" >
                          <!-- CSRF Token -->
                          <?php echo csrf_field(); ?>
                        <label for=""> Vider la base de donnée ! </label> 
                        <button type="button" class="btn btn-danger deleteCategoryBtn" data-bs-toggle="modal" data-bs-target="#deleteModal">Vider</button>
                    </form>
                </div>
            </div> 
    </div>
</div>

<?php $__env->stopSection(); ?>

    <style>
        #chek_box {
            justify-content: center;
            align-items: center;
            font-family: auto;
            font-size: 1.2em;
            color: palevioletred;
        }
    </style>
   <script type="text/javascript">

function fonctionchange()
        {
            var etat = document.getElementById('check').checked;
             
            if(etat)
            {
                document.getElementById('div1').className = 'off';
                 
                document.getElementById('div1').style.display = 'block';
            }
            else
            {
                document.getElementById('div1').className = 'on';
                 
                document.getElementById('div1').style.display = 'none';
            }
        }

    // var chckd = document.getElementById("test").checked;
    // var d1 = document.getElementById("div1");

    // chckd.addEventListener("change", function(){
    //     var d1 = document.getElementById("div1");
    //     d1.style.display = "block";
    // });
 

    </script>


 <!-- debut de modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form action="<?php echo e(route('vider')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Vider la base de donnée :</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    Vous êtes sûr de vider la base de donnée !
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
                        <button type="submit" class="btn btn-danger" id="deletemember">Yes Delete</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
    <!-- Fin de modal -->
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projet\gestion_sortie\resources\views/eleve/create.blade.php ENDPATH**/ ?>