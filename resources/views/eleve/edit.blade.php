@extends('app')

@section('content')

<div class="row mt-2">
    <div class="col-md-3"></div>
    <div class="col-md-6 m-auto">
        <div class="card mt-3">
        
            <div class="card-body p-2 border-info">
                <h4 class="text-center text-warning">Editer un Eleve</h4>
                <form method="POST" action="{{route('eleve.update',$eleve)}}">
                @method('put')
                    @csrf

                    <div class="row mb-3 mt-3">
                        <label for="code" class="col-sm-3 col-form-label">Code Massar :</label>
                        <div class="col-sm-9">
                            <input type="text" name="code" value="{{$eleve->code}}" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nom" class="col-sm-3 col-form-label"> Nom :</label>
                        <div class="col-sm-9">
                            <input type="text" name="nom" value="{{$eleve->nom}}" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="prenom" class="col-sm-3 col-form-label">Prenom :</label>
                        <div class="col-sm-9">
                            <input type="text" name="prenom" value="{{$eleve->prenom}}" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="classe" class="col-sm-3 col-form-label">Classe :</label>
                        <div class="col-sm-9">
                            <input type="text" name="classe" value="{{$eleve->classe}}" class="form-control">
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="btn btn-success mt-1 rounded-pill">Acctualise</button>
                        <a class="btn btn-info rounded-pill" href="/eleve">Annuler</a>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
  </div>


@endsection