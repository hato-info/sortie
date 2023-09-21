
@extends('app')


@section('content')

@if(session('success'))
<p class="alert alert-success">{{session('success')}}</p>
@endif

@if(Auth::check())

<div class="card">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
               
                <div class="col">
                    <input type="text" class="form-control" id="cherche" placeholder="Rechercher ici..." name="q" value="{{ old('cherche')}}">
                </div>
                <div class="col">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </div>
                <div class="col">   
                    <a class="btn btn-success" href="{{ url('eleve/create') }}">Ajouter Nouvelle Eleve</a>
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
            @foreach ($eleves as $index => $eleve)

                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $eleve->code }}</td>
                    <td>{{ $eleve->nom }}</td>
                    <td>{{ $eleve->prenom }}</td>
                    <td>{{ $eleve->classe }}</td>
                    
                    <td>

                        <form action="{{ url('eleve/'. $eleve->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            
                            <a class="btn btn-info" href="{{ url('eleve/'. $eleve->id) }}">Code QR</a>
                            <a class="btn btn-primary" href="{{ url('eleve/'. $eleve->id .'/edit') }}">Modifier</a>
                            @if(Auth::check())
                            @if(Auth::user()->rolle == 'admin')
                                <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{ $eleve->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
                            @endif
                            @endif  
                        </form>
                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>
        
    </div>
    <footer class="card-footer">
    
    {{ $eleves->links() }}
    </footer>
</div>
@endif

@endsection

@section('scripts')
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
@endsection

 <!-- debut de modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form action="{{ url('eleve/') }}" method="post">
                    @csrf
                    @method('DELETE')
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

    @section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
    </style>
@endsection

