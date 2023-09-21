<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>
<!--div class="lesclasses justify-items-center text-center align-center"-->

           <div class="container mt-5">
            <div class="row row-li1 font-weight-bold">
              
                           <!--div class="card-clas justify-items-center text-center align-center"-->
                           <!--form class="row row-cols-lg-auto g-1"-->
                               <div class="col ">
                                 <label>La Classe :</label>
                               </div>
                               <div class="col">
                                 <select name="classe_selectd" id="classe_selectd" onchange="return remplissageAuto();" Selected>
                                     <option value="">choisie la classe</option>
                                     <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($classe->classe); ?>"><?php echo e($classe->classe); ?></option>
                                     
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>  
                                    
                               </div>
                             <!--/form-->
                           </div>  
                         </div> 
                        <div id="nom-charger">
                       
                        </div>
</div>
                        <div id="chat-part" class="row border border-3 m-5 img-container align-items-start">
                        
                        </div>

                       
              <script src="<?php echo e(asset('js/app.js')); ?>"></script>

              <script type="text/javascript">
    // function remplissageAuto() {
    //     var classeId = $('#classe_selectd').val();

    //     $.ajax({
    //         type: "GET",
    //         url: "/api/get-eleve-by-classe/" + classeId,
    //         success: function(response) {
    //             $('#nom-charger').text(response.nom);
    //         },
    //         error: function() {
    //             $('#nom-charger').text("Erreur lors de la récupération de l'élève.");
    //         }
    //     });
    // }


     Echo.channel('mychannel').listen('EvenemtStudent',
                    (e)=>{

                        var valeuselected = $('#classe_selectd').children("option:selected").val();
                        //  $('#classe_selectd').change(function(){
                        //  valeuselected = $(this).children("option:selected").val();
                        //  });
                      //   $('#nom-charger').append(valeuselected)
                     // let html = ' <div class="border col-3 m-2 pb-2 pt-2"> <h4> '+
                      let html = ' <div class="card border-info col-lg-2 col-md-3 col-sm-4 clascol"> <h4> '+
                      e.myeleve + '</h4> </div>';

                      if(e.class_student==valeuselected){
                        $('#chat-part').append(html)
                      }

                    });

</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\projet\gestion_sortie\resources\views/classes/show.blade.php ENDPATH**/ ?>