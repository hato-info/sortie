
 
<?php $__env->startSection('content'); ?>
    
    <div class="container p-2 border-info">
           

    </div>

    <div class="container">
    <div class="row mt-5" id="qrcode">
            <div class="col-2">
        
            </div>

            <div class="col-6">
                <div class="card">
                <form action="<?php echo e(url('/eleve/'.$eleve->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                            <div class="md-4">
                                <label for="code">Code Massar : <?php echo e($eleve->code); ?></label>
                            </div>
                            <div class="mb-2">
                                <label for="nom">Nom : <?php echo e($eleve->nom .' ' .$eleve->prenom); ?></label>
                            </div>
                            <div class="mb-2">
                                <label for="prenom">La Classe : <?php echo e($eleve->classe); ?></label>
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
            </div>
            <div class="col-2 border-info">
            <?php if($listecodes != null): ?>
                <img width="120" height="120" src="<?php echo e(asset('storage/images/-'.$eleve->code .'.png')); ?>"> 
              <br>
                <!-- a class="btn btn-success mt-2" href="<?php echo e(url('/listecode')); ?>" >Imprimer</a> -->
                <button class="btn btn-outline-primary mt-2" onclick="imprimer()">Imprimer ce Qrcode</button>
            <?php endif; ?>
            </div>  
            <div>
            <a class="btn btn-info rounded-pill" href="/eleve">Reteur</a>
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
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Laravel9\gestion_sortie\resources\views/eleve/show.blade.php ENDPATH**/ ?>