@extends('app')

@section('content')

@if(session('success'))
<p class="alert alert-success">{{session('success')}}</p>
@endif

<div class="container">

    <div class="row align-items-center">

        <div class="col-md-2"></div>
            <div class="col-md-7 m-auto">

                <div class="card mt-3">
                    
                    <div class="card-body p-2 border-info">

                        <form action="{{ url('eleve') }}" method="POST" class="form-horizontal">
                            @csrf

                            <div class="row form-group mb-3 mt-2">
                                <div class="col-1"></div>
                                <label for="code" class="col-md-2 col-sm-6 col-form-label">Code Massar:</label>
                                <div class="col-md-8 col-sm-6">
                                    <input type="text" class="form-control" id="code" placeholder="Code Massar" name="code" value="{{ old ('code') }}">
                                    @error('code')
                                        <div class="text text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row form-group mb-3">
                            <div class="col-1"></div>
                                <label for="nom" class="col-md-2 col-sm-6 col-form-label">Nom :</label>
                                <div class="col-md-8 col-sm-6">
                                    <input type="text" class="form-control" id="nom" placeholder="Entrez le nom d'éleve" name="nom" value="{{ old ('nom') }}">
                                        @error('nom')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="row form-group mb-3">
                            <div class="col-1"></div>
                                <label for="prenom" class="col-md-2 col-sm-6 col-form-label">Prenom:</label>
                                <div class="col-md-8 col-sm-6">
                                    <input type="text" class="form-control" id="prenom" placeholder="Entrez le prenom d'éleve" name="prenom" value="{{ old ('prenom') }}">
                                    @error('prenom')
                                            <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group mb-3">
                            <div class="col-1"></div>
                                <label for="classe" class="col-md-2 col-sm-6 col-form-label">La Classe :</label>
                                <div class="col-md-8 col-sm-6">
                                    <select class="form-select" name="classe" id="pet-select">
                                        <option value="">--Veuillez choisir une Classe--</option>
                                            @foreach($lesclasses as $lesclasse)
                                            <option value="{{$lesclasse->classe}}">{{$lesclasse->classe}}</option>
                                            @endforeach
                                    </select>  
                                    @error('classe')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
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

            <form method="POST" action="{{ route('excel.import') }}" enctype="multipart/form-data" >
                        <!-- CSRF Token -->
                        @csrf
                        <input type="file" name="fichier" >
                        <button type="submit" >Importer</button>

                    </form>

                <div id="chek_box">
                <input type="checkbox" onChange="fonctionchange();" id="check"/>
                <label for=""> voulez vous vider la base de donnée ! </label> 
                </div>
                <div id="div1" style="display:none;">
                    
                    <form method="POST" action="{{ route('vider') }}" enctype="multipart/form-data" >
                          <!-- CSRF Token -->
                          @csrf
                        <label for=""> Vider la base de donnée ! </label> 
                        <button type="button" class="btn btn-danger deleteCategoryBtn" data-bs-toggle="modal" data-bs-target="#deleteModal">Vider</button>
                    </form>
                </div>
            </div> 
    </div>
</div>

@endsection

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
                
                <form action="{{ route('vider') }}" method="post">
                    @csrf
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