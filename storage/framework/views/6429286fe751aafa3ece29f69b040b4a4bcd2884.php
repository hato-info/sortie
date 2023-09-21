
 
<?php $__env->startSection('content'); ?>
    
<div class="container p-2 border-info">
   
            <div class="row mt-3">
                <div class="col-2">
                </div>
                <div class="col-9">
                    <div class="card border-success">
                        <div class="card-header bg-transparent border-success">  
                            <h4 class="text-center text-warning mt-2 mb-4"> Generation de QR code d'un Elève : </h4>
                        </div>
                        <div class="card-body border-info" id="qrcode">
                            <div class="row">
                            <div class="col-1">
                            </div> 
                                <div class="col-8">
                                    <form action="<?php echo e(url('/eleve/'.$eleve->id)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                            <div class="md-4">
                                              <h3> <label for="code">Code Massar :  <?php echo e($eleve->code); ?></label> </h3>
                                            </div>
                                            <div class="mb-2">
                                               <h3> <label for="nom">Nom : <?php echo e($eleve->nom .' ' .$eleve->prenom); ?></label></h3>
                                            </div>
                                            <div class="mb-2">
                                             <h3> <label for="prenom">La Classe : <?php echo e($eleve->classe); ?></label></h3>
                                            </div>
                                            <div>
                                                <input type="text" class="form-control" id="eleve_id" placeholder="Son Classe" name="eleve_id" value="<?php echo e($eleve->id); ?>" hidden>
                                                <input type="text" class="form-control" id="code" placeholder="Son Classe" name="code" value="<?php echo e($eleve->code); ?>" hidden>
                                                <?php if($listecodes == null): ?>
                                                    <button type="submit" class="btn btn-primary">Generer code QR</button>
                                                <?php endif; ?>
                                            </div>
                                    </form> 
                                </div>   
                                <div class="col-2 pt-2 pb-2 card border-info">
                                        <?php if($listecodes != null): ?>
                                            <!--img width="120" height="120" src="<?php echo e(asset('storage/images/-'.$eleve->code .'.png')); ?>"--> 
                                            <img width="120" height="120" src="<?php echo e(asset('uploads/images/-'.$eleve->code .'.png')); ?>">
                                      <?php endif; ?>
                                </div> 
                            </div> 
                        </div>
                        <?php if($listecodes != null): ?>
                        <div class="card-footer bg-transparent border-success">
                            <button class="btn btn-primary m-2" onclick="imprimer()">Imprimer ce Qrcode</button>
                        </div>
                        <?php endif; ?>
                                       
                    </div>
                </div>
                <div class="col-1">
                </div>
            </div>
</div>



    <script type="text/javascript">
        function imprimer()
        {
            var partiImrimer = document.getElementById('qrcode');  
            var newFenetre = window.open('','Print-Window');
            newFenetre.document.open();
            newFenetre.document.write('<html><body onload="window.print()">'+partiImrimer.innerHTML+'</body></html>');
            newFenetre.document.close();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projet\gestion_sortie\resources\views/eleve/show.blade.php ENDPATH**/ ?>